<?php


namespace AppBundle\Services;


use Pimcore\Bundle\AdminBundle\Helper\GridHelperService;
use Pimcore\Db;
use Pimcore\Model;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition;

class CustomGridHelperService extends GridHelperService
{
    public function prepareListingForGrid(array $requestParams, string $requestedLanguage, $adminUser): DataObject\Listing\Concrete
    {
        $folder = Model\DataObject::getById($requestParams['folderId']);
        $class = ClassDefinition::getById($requestParams['classId']);
        $className = $class->getName();

        $listClass = '\\Pimcore\\Model\\DataObject\\' . ucfirst($className) . '\\Listing';
        /** @var DataObject\Listing\Concrete $list */
        $list = new $listClass();

        $colMappings = [
            'key' => 'o_key',
            'filename' => 'o_key',
            'fullpath' => ['o_path', 'o_key'],
            'id' => 'oo_id',
            'published' => 'o_published',
            'modificationDate' => 'o_modificationDate',
            'creationDate' => 'o_creationDate'
        ];

        $start = 0;
        $limit = 20;
        $orderKey = 'o_id';
        $order = 'ASC';

        $fields = [];
        $bricks = [];
        if (!empty($requestParams['fields'])) {
            $fields = $requestParams['fields'];
            $bricks = $this->extractBricks($fields);
        }

        if (isset($requestParams['limit'])) {
            $limit = $requestParams['limit'];
        }
        if (isset($requestParams['start'])) {
            $start = $requestParams['start'];
        }

        $sortingSettings = \Pimcore\Bundle\AdminBundle\Helper\QueryParams::extractSortingSettings($requestParams);
        $doNotQuote = false;

        if ($sortingSettings['order']) {
            $order = $sortingSettings['order'];
        }
        if ($sortingSettings['orderKey'] !== null && strlen($sortingSettings['orderKey']) > 0) {
            $orderKey = $sortingSettings['orderKey'];
            if (!(substr($orderKey, 0, 1) == '~')) {
                if (array_key_exists($orderKey, $colMappings)) {
                    $orderKey = $colMappings[$orderKey];
                } elseif ($class->getFieldDefinition($orderKey) instanceof ClassDefinition\Data\QuantityValue) {
                    $orderKey = 'concat(' . $orderKey . '__unit, ' . $orderKey . '__value)';
                    $doNotQuote = true;
                } elseif ($class->getFieldDefinition($orderKey) instanceof ClassDefinition\Data\RgbaColor) {
                    $orderKey = 'concat(' . $orderKey . '__rgb, ' . $orderKey . '__a)';
                    $doNotQuote = true;
                } elseif (strpos($orderKey, '~') !== false) {
                    $orderKeyParts = explode('~', $orderKey);

                    if (strpos($orderKey, '?') !== false) {
                        $brickDescriptor = substr($orderKeyParts[0], 1);
                        $brickDescriptor = json_decode($brickDescriptor, true);
                        $db = Db::get();
                        $orderKey = $db->quoteIdentifier($brickDescriptor['containerKey'] . '_localized') . '.' . $db->quoteIdentifier($brickDescriptor['brickfield']);
                        $doNotQuote = true;
                    } else {
                        if (count($orderKeyParts) == 2) {
                            $orderKey = $orderKeyParts[1];
                        }
                    }
                }
            }
        }

        $conditionFilters = [];
        if (isset($requestParams['only_direct_children']) && $requestParams['only_direct_children'] === 'true') {
            $conditionFilters[] = 'o_parentId = ' . $folder->getId();
        } else {
            $quotedPath = $list->quote($folder->getRealFullPath());
            $quotedWildcardPath = $list->quote(str_replace('//', '/', $folder->getRealFullPath() . '/') . '%');
            $conditionFilters[] = '(o_path = ' . $quotedPath . ' OR o_path LIKE ' . $quotedWildcardPath . ')';
        }

        if (!$adminUser->isAdmin()) {
            $userIds = $adminUser->getRoles();
            $userIds[] = $adminUser->getId();
            if($this->isWorkspaceQueryNeeded($folder,$className,$adminUser)){
                $conditionFilters[] = ' (
                                                        (select list from users_workspaces_object where userId in (' . implode(',', $userIds) . ') and LOCATE(CONCAT(o_path,o_key),cpath)=1  ORDER BY LENGTH(cpath) DESC LIMIT 1)=1
                                                        OR
                                                        (select list from users_workspaces_object where userId in (' . implode(',', $userIds) . ') and LOCATE(cpath,CONCAT(o_path,o_key))=1  ORDER BY LENGTH(cpath) DESC LIMIT 1)=1
                                                     )';
            }
        }

        $featureJoins = [];
        $slugJoins = [];
        $featureAndSlugFilters = [];

        // create filter condition
        if (!empty($requestParams['filter'])) {
            $conditionFilters[] = $this->getFilterCondition($requestParams['filter'], $class);
            $featureAndSlugFilters = $this->getFeatureAndSlugFilters($requestParams['filter'], $class, $requestedLanguage);
            if ($featureAndSlugFilters) {
                $featureJoins = array_merge($featureJoins, $featureAndSlugFilters['featureJoins']);
                $slugJoins = array_merge($slugJoins, $featureAndSlugFilters['slugJoins']);
            }
        }

        // Customization -- related to access to sql editor on grid
        if (!empty($requestParams['condition']) && $this->isAllowSQLEditor($adminUser) ) {
            $conditionFilters[] = '(' . $requestParams['condition'] . ')';
        }

        if (!empty($requestParams['query'])) {
            $query = $this->filterQueryParam($requestParams['query']);
            if (!empty($query)) {
                $conditionFilters[] = 'oo_id IN (SELECT id FROM search_backend_data WHERE MATCH (`data`,`properties`) AGAINST (' . $list->quote($query) . ' IN BOOLEAN MODE))';
            }
        }

        if (!empty($bricks)) {
            foreach ($bricks as $b) {
                $brickType = $b;
                if (is_array($brickType)) {
                    $brickType = $brickType['containerKey'];
                }
                $list->addObjectbrick($brickType);
            }
        }

        $list->setCondition(implode(' AND ', $conditionFilters));
        if (empty($requestParams['batch']) && empty($requestParams['ids'])) {
            $list->setLimit($limit);
            $list->setOffset($start);
        }

        if (isset($sortingSettings['isFeature']) && $sortingSettings['isFeature']) {
            $orderKey = 'cskey_' . $sortingSettings['fieldname'] . '_' . $sortingSettings['groupId'] . '_' . $sortingSettings['keyId'];
            $list->setOrderKey($orderKey);
            $list->setGroupBy('o_id');

            $parts = explode('_', $orderKey);

            $fieldname = $parts[1];
            /** @var DataObject\ClassDefinition\Data\Classificationstore $csFieldDefinition */
            $csFieldDefinition = $class->getFieldDefinition($fieldname);
            $sortingSettings['language'] = $csFieldDefinition->isLocalized() ? $requestedLanguage : 'default';
            $featureJoins[] = $sortingSettings;
        } else {
            $list->setOrderKey($orderKey, !$doNotQuote);
        }
        $list->setOrder($order);

        //parameters specified in the objects grid
        if (!empty($requestParams['ids'])) {
            $quotedIds = [];
            foreach ($requestParams['ids'] as $id) {
                $quotedIds[] = $list->quote($id);
            }
            if (!empty($quotedIds)) {
                //add a condition if id numbers are specified
                $list->addConditionParam('oo_id IN (' . implode(',', $quotedIds) . ')');
            }
        }

        if ($class->getShowVariants()) {
            $list->setObjectTypes([DataObject\AbstractObject::OBJECT_TYPE_OBJECT, DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);
        }

        $this->addGridFeatureJoins($list, $featureJoins, $class, $featureAndSlugFilters);
        $this->addSlugJoins($list, $slugJoins, $featureAndSlugFilters);

        $list->setLocale($requestedLanguage);

        if (empty($requestParams['filter']) && empty($requestParams['condition']) && empty($requestParams['sort'])) {
            $list->setIgnoreLocalizedFields(true);
        }

        return $list;
    }

    /**
     * sql editor should be visible to admin or ApplicationAdmin only
     *
     * @param $adminUser
     * @return bool
     */
    public function isAllowSQLEditor($adminUser) : bool
    {
        foreach(GRID_SQL_EDITOR_ALLOWED_ROLES as $roleName){
            $appliicationAdminRole = Model\User\Role::getByName($roleName);

            $adminRoles = $adminUser->getRoles();
            if(in_array($appliicationAdminRole->getId(), $adminRoles) || $adminUser->isAdmin()){
                return true;
            }
        }
        return false;
    }

    private function isWorkspaceQueryNeeded(DataObject $requestedRootObject,string $requestedClass,Model\User $user) : bool
    {
        $returnValue = true;
        $pathsForCustomizedWorkspaceQuery = ["/MaterialMaster","/MaterialMaster/PlantMaterialMaster","/MaterialMaster/SalesMaterialMaster"];
        $classesForCustomizedWorkspaceQuery = ["PlantMaterialMaster","SalesMaterialMaster"];

        $requestedPath = $requestedRootObject->getFullPath();
        if(in_array($requestedPath,$pathsForCustomizedWorkspaceQuery) && in_array($requestedClass,$classesForCustomizedWorkspaceQuery) ){
            $db = \Pimcore\Db::get();
            $userIds = $user->getRoles();
            $userIds[] = $user->getId();

            if($this->isListAllowedOnPath($requestedPath,$userIds,$db)){
                $returnValue = false;
            }
        }
        return $returnValue;
    }

    /**
     * check if current folder exist in user workspace for this user/role
     * if it exist then check whether it has the permission to list and return accordingly
     *
     * if current folder does not exist in user workspace then get this folder's parent and
     * repeat the above step
     *
     */
    private function isListAllowedOnPath(string $path,array $userIds,$db) : bool
    {
        if($path === "/"){
            return false;
        }
        $query = 'SELECT list FROM users_workspaces_object WHERE cpath = \''. $path .'\' AND userId IN (' . implode(',', $userIds) . ')';
        $result = $db->fetchFirstColumn($query);

        if(count($result) == 0){
            // there is no entry for this path for this user/role, need to check for immidiate parent
            $parentPath = dirname($path);
            return $this->isListAllowedOnPath($parentPath,$userIds,$db);
        }else{
            $sum = array_sum($result);
            return $sum > 0 ? true : false;
        }
    }
}