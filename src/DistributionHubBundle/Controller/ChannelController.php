<?php

namespace DistributionHubBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Carbon\Carbon;
use Pimcore\Model;
use Pimcore\Model\DataObject;
use Pimcore\Tool\Admin as AdminTool;
use phpseclib\Net\SFTP;
use ZipArchive;
use Pimcore\Model\Metadata;

class ChannelController extends AdminController {

    protected $logger;
    public $className;
    public $mappingObjectId = '';

    public function init() {
        parent::init();
    }

    /**
     * @Route("/distribution_hub")
     */
    public function indexAction() {

        // reachable via http://your.domain/plugin/DistributionHub/channel/index
    }

    /**
     * @Route("/channel/is-retailer")
     */
    public function isRetailerAction() {
        try {
            $isRetailer = FALSE;
            $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
            $retailerRole = \Pimcore\Model\User\Role\Folder::getByName("Retailers");
            if ($retailerRole) {
                $retailerRoleId = $retailerRole->getId();
            } else {
                $retailerRoleId = 43;
            }
            if ($currentUser instanceof Model\User && (!$currentUser->isAdmin())) {
                $roles = $currentUser->getRoles();
                if (is_array($roles) && count($roles) > 0) {
                    foreach ($roles as $roleId) {
                        $role = Model\User\Role::getById($roleId);
                        if ($role instanceof Model\User\Role) {
                            $roleParent = $role->getParentId();
                            if ($roleParent == $retailerRoleId) {
                                $isRetailer = TRUE;
                            }
                        }
                    }
                }
            }
            return $this->json([
                        "success" => true,
                        "isRetailer" => $isRetailer,
            ]);
        } catch (\Exception $excp) {
            return $this->json(["success" => false, 'msg' => $excp->getMessage()]);
        }
    }

    /**
     * Function to return all the available Channels
     *
     * @Route("/channel/tree")
     *
     */
    public function treeAction() {

        try {

            $availableChannels = [];

            $channelObj = new \Pimcore\Model\DataObject\Channel\Listing();
            $channelObj->load();

            $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
            if ($currentUser instanceof \Pimcore\Model\User) {
                $currentUserRole = $currentUser->getRoles();
            }

            $objectClass = "Retailer";
            $className = '\\Pimcore\\Model\\DataObject\\' . ucfirst($objectClass);
            $retailerClassExists = \Pimcore\Tool::classExists($className);

            $key = 0;
            foreach ($channelObj as $channel) {

                $retailer = $channel->getRetailer();

                $mapping = $channel->getMapping();
                if ($mapping) {
                    $class = $mapping->getClassUsed();
                }



                if ($retailerClassExists && $class) {
                    $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName($class);

                    $retailerDefinition = $classDef->getFieldDefinition("retailer");

                    if ($retailerDefinition instanceof DataObject\ClassDefinition\Data) {
                        $retailerClassExists = true;
                    } else {
                        $retailerClassExists = false;
                    }
                }

                if ($currentUser->isAdmin() || (!$retailerClassExists)) {
                    $availableChannels[$key]['id'] = $channel->getId();
                    $availableChannels[$key]['text'] = $channel->getKey();
                    $key++;
                } else if ($retailerClassExists && $retailer && $retailer != "") {

                    $retailer = DataObject\Retailer::getById($channel->getRetailer());
                    if ($retailer instanceof DataObject\Retailer) {
                        $role = $retailer->getRole();

                        if (is_array($currentUserRole) && in_array($role, $currentUserRole)) {
                            if ($channel->getShareWithUser()) {
                                $availableChannels[$key]['id'] = $channel->getId();
                                $availableChannels[$key]['text'] = $channel->getKey();
                                $key++;
                            }
                        }
                    }
                }
            }

            return $this->json([
                        "tree" => $availableChannels,
            ]);
        } catch (\Exception $excp) {
            return $this->json(["success" => false, 'msg' => $excp->getMessage()]);
        }
    }

    /**
     * @Route("/channel/get-channel-detail")
     * @param Request $request
     * @return type
     */
    public function getChannelDetailAction(Request $request) {

        try {
            $isRetailer = false;
            $isAdmin = false;
            $mappingName = "";

            $objectClass = "Retailer";
            $className = '\\Pimcore\\Model\\DataObject\\' . ucfirst($objectClass);
            $retailerClassExists = \Pimcore\Tool::classExists($className);

            $id = $request->query->get('id');
            $channelObj = \Pimcore\Model\DataObject::getById($id);
            $thresholdFieldNeeded = false;
            $qualityCheckNeeded = false;

            $mapping = $channelObj->getMapping();
            $mappingId = '';
            if ($mapping) {
                $mappingId = $mapping->getId();
                $mappingName = $mapping->getName();

                $class = $mapping->getClassUsed();

                $classDefinition = DataObject\ClassDefinition::getByName($class);
                if ($classDefinition instanceof DataObject\ClassDefinition) {
                    $fieldDeinition = $classDefinition->getFieldDefinition($mapping->getName() . "Completeness");
                    if ($fieldDeinition instanceof DataObject\ClassDefinition\Data) {
                        $thresholdFieldNeeded = true;
                    }
                    $qualityFieldDefinition = $classDefinition->getFieldDefinition(trim($mapping->getName()) . "DataQuality");
                    if ($qualityFieldDefinition instanceof DataObject\ClassDefinition\Data) {
                        $qualityCheckNeeded = true;
                    }
                }

                if ($retailerClassExists) {
                    $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName($class);

                    $retailerDefinition = $classDef->getFieldDefinition("retailer");

                    if ($retailerDefinition instanceof DataObject\ClassDefinition\Data) {
                        $retailerRetailerExists = true;
                    } else {
                        $retailerRetailerExists = false;
                    }
                }
            } else {
                $retailerRetailerExists = false;
            }


            $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
            if ($currentUser) {
                $currentUserRole = $currentUser->getRoles();
            }

            $retailer = $channelObj->getRetailer();

            if ($currentUser->isAdmin()) {
                $isAdmin = true;
            } else if ($retailerClassExists && $retailer && $retailer != "") {
                $retailer = DataObject\Retailer::getById($channelObj->getRetailer());
                if ($retailer instanceof DataObject\Retailer) {
                    $role = $retailer->getRole();
                    if (is_array($currentUserRole) && in_array($role, $currentUserRole)) {
                        if ($channelObj->getShareWithUser() == 1) {
                            $isRetailer = true;
                        }
                    }
                }
            }

            $creatorId = $channelObj->getUserOwner();
            $modifiedById = $channelObj->getUserModification();

            $creator = Model\User::getById($creatorId);
            if ($creator instanceof Model\User) {
                $creator = ucfirst($creator->getName());
            } else {
                $creator = "System";
            }

            $modifiedBy = Model\User::getById($modifiedById);
            if ($modifiedBy instanceof Model\User) {
                $modifiedBy = ucfirst($modifiedBy->getName());
            } else {
                $modifiedBy = "System";
            }

            $defaultLanguage = \Pimcore\Tool::getDefaultLanguage();
            $qualityCheck = $channelObj->getQualityCheck() ? TRUE : FALSE;
            return $this->json([
                        "success" => true,
                        'filter' => json_encode(unserialize($channelObj->getFilterConditions())),
                        'mapping' => (int) $mappingId,
                        'id' => $id,
                        'key' => $channelObj->getKey(),
//                        'ftpFileType' => $channelObj->getFtpFileType(),
                        'retailer' => $channelObj->getRetailer(),
                        'language' => $channelObj->getLanguageUsed(),
                        'shareWithUser' => $channelObj->getShareWithUser(),
                        'isAdmin' => $isAdmin,
                        'isRetailer' => $isRetailer,
                        'retailerClassExists' => $retailerRetailerExists,
                        'assetMetadata' => $channelObj->getAssetMetadata(),
                        'thumbnail' => $channelObj->getThumbnail(),
                        'downloadTypes' => $channelObj->getDownloadOptions(),
                        "name" => ucfirst($channelObj->getO_key()),
                        "modificationDate" => date('m/d/Y H:i:s', $channelObj->getModificationDate()),
                        "creationDate" => date('m/d/Y H:i:s', $channelObj->getCreationDate()),
                        "createdBy" => $creator,
                        "modifiedBy" => $modifiedBy,
                        "downloadStats" => $channelObj->getDownloadStatistics(),
                        "defaultLanguage" => $defaultLanguage,
                        "thresholdValue" => $channelObj->getCompletenessThreshold(),
                        "objectTypeValue" => $channelObj->getDownloadObjectType(),
                        "thresholdFieldNeeded" => $thresholdFieldNeeded,
                        "qualityCheck" => $qualityCheck,
                        "qualityCheckNeeded" => $qualityCheckNeeded,
                        "qualityFieldName" => $mappingName . "DataQuality"
            ]);
        } catch (\Exception $excp) {
            return $this->json([
                        "success" => false,
                        'msg' => $excp->getMessage()
            ]);
        }
    }

    /**
     * @Route("/channel/add")
     * @param Request $request
     */
    public function addAction(Request $request) {
        try {

            // Creating System Folder
            $parentFolderPath = "/System Configuration/Distribution Hub/Channel";
            $pathExists = \Pimcore\Model\DataObject\Service::pathExists($parentFolderPath);
            if (empty($pathExists)) {
                $folder = \Pimcore\Model\DataObject\Service::createFolderByPath($parentFolderPath);
            }
            $parentFolderPath = "/System Configuration/Distribution Hub/Channel";
            $folderName = "Channel";
            $folderName = \Pimcore\File::getValidFilename($folderName);
            $parentFolder = \Pimcore\Model\DataObject::getByPath($parentFolderPath);

            if (!$parentFolder) {
                $folder = \Pimcore\Model\DataObject\Folder::create(array(
                            "o_parentId" => 1,
                            "o_creationDate" => time(),
                            "o_userOwner" => 1,
                            "o_userModification" => 1,
                            "o_key" => $folderName,
                            "o_published" => true
                ));
            }

            $parentFolderId = \Pimcore\Model\DataObject::getByPath($parentFolderPath)->getId();
            $channelObj = new \Pimcore\Model\DataObject\Channel();
            $keyName = $request->query->get('name');
            $keyName = \Pimcore\File::getValidFilename($keyName);
//            $objectId =
            $channelObj->setParentId($parentFolderId);
            $channelObj->setPublished(true);
            $channelObj->setKey($keyName);
            $channelObj->save();

            $success = true;
            $id = $channelObj->getId();

            return $this->json(
                            [
                                "success" => $success,
                                "id" => $id
                            ]
            );
        } catch (\Exception $excp) {
            return $this->json([
                        "success" => false,
                        'msg' => $excp->getMessage()
            ]);
        }
    }

    /**
     * @Route("/channel/delete")
     * @param Request $request
     */
    public function deleteAction(Request $request) {
        try {
            $id = $request->query->get("name");
            $channel = \Pimcore\Model\DataObject\Channel::getById($id);
            if ($channel instanceof \Pimcore\Model\DataObject\Channel) {
                $channel->delete();
            }
            return $this->json(['success' => true]);
        } catch (\Exception $excp) {
            return $this->json([
                        "success" => false,
                        'msg' => $excp->getMessage()
            ]);
        }
    }

    /**
     * @Route("/channel/get-mapping-combo-store")
     */
    public function getMappingComboStoreAction() {

        $mappList = new \Pimcore\Model\DataObject\Mapping\Listing();
        $mappList->load();

        $storeArray = array();
        if (is_array($storeArray))
            foreach ($mappList as $map) {
                $tempArray = array();
                $tempArray['id'] = $map->getId();
                $tempArray['name'] = $map->getName();
                $tempArray['classUsed'] = $map->getClassUsed();
                $storeArray[] = $tempArray;
            }

        return $this->json(["mappingStore" => $storeArray]);


        $this->disableViewAutoRender();
    }

    /**
     * @Route("/channel/get-channel-grid-column-data")
     * @param Request $request
     */
    public function getChannelGridColumnDataAction(Request $request) {

        $id = $request->request->get('id');
        $obj = \Pimcore\Model\DataObject::getById($id);

        $thresholdFieldNeeded = false;
        $qualityCheckNeeded = false;

        if ($obj->getClassUsed() != null) {
            $classUsed = $obj->getClassUsed();
        } else {
            $classUsed = null;
        }

        $configObj = new \DistributionHubBundle\DistributionHubBundle();
        $config = $configObj->getConfig();
        $showFiltersArray = $config['showFilters'];


        $language = '';

        $columnData = $obj->getColumns();

        $storeArray = array();
        $brickArray = array();
        $availableFields = array();

        if ($classUsed)
            $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName($classUsed);
        if ($classDef instanceof DataObject\ClassDefinition) {

            $thresholdFieldName = trim($obj->getName()) . "Completeness";
            $fieldDeinition = $classDef->getFieldDefinition($thresholdFieldName);
            if ($fieldDeinition instanceof DataObject\ClassDefinition\Data) {
                $thresholdFieldNeeded = true;
            }
            $qualityFieldName = trim($obj->getName()) . "DataQuality";
            $qualityFieldDefinition = $classDef->getFieldDefinition($qualityFieldName);
            if ($qualityFieldDefinition instanceof DataObject\ClassDefinition\Data) {
                $qualityCheckNeeded = true;
            }

            $fields = $classDef->getFieldDefinitions();
            $gridType = "grid";
            $xmlFileClassFieldMapping = array();

            $allowedfields = array();
            $withoutMappingFields = array();
            $labelFieldArray = array();

            if (is_array($columnData) && count($columnData) > 0) {
                foreach ($columnData as $data) {
                    if (1 == $data[4]) {
                        $temp = explode(' (', $data[1]);
                        $data[1] = $temp[0];

                        if (strpos($data[1], '~')) {
                            $temp = explode('~', $data[1]);
                            $allowedfields[$temp[0] . '~' . $temp[1] . '~' . $temp[2]] = array($temp[0], $temp[1], $temp[2]);
                        } else {
                            $allowedfields[$data[1]] = $data[1];
                            if ($data[1] == "IgnoreField") {
                                $withoutMappingFields[] = $data[0];
                            }
                        }

                        // creating labelfieldarray for base class fields
                        if (!strpos($data[1], '~') && !strpos($data[1], '#') && $data[2] == true) {
                            $fieldDef = $classDef->getFieldDefinition($data[1]);

                            if ($fieldDef) {
//                        $labelFieldArray[$data[1]] = $fieldDef->getTitle();
                                $labelFieldArray[$data[1] . '_clabel'] = $data[0];
                            }
                        }

                        if ($data[2] == false || $data[2] == NULL) {
                            $xmlFileClassFieldMapping[$data[1]] = $data[0];
                        }
                    }
                }
            }

            $count = 1;
            $availableFields[] = array('key' => 'id', 'label' => 'Id', 'position' => 0);
            $availableFields[] = array('key' => 'filename', 'label' => 'filename', 'position' => 1);


            foreach ($allowedfields as $key => $value) {
                if (strpos($key, '~')) {
                    $fieldArray = explode('~', $key);
                    $fieldName = $fieldArray[0];
                    $field = $classDef->getFieldDefinition($fieldName);
                } else if (strpos($key, '#')) {
                    $fieldArray = explode('#', $key);
                    $fieldName = $fieldArray[0];
                    $field = $classDef->getFieldDefinition($fieldName);
                } else {
                    $field = $classDef->getFieldDefinition($key);
                    if ($field == false) {
                        $localizedFields = $classDef->getFieldDefinition("localizedfields");
                        if ($localizedFields->getFieldDefinition($key)) {
                            $field["localisedFields"] = $localizedFields;
                            $field["key"] = $key;
                        }
                    }
                }

                if ($field) {
                    if (is_array($field)) {
                        if ($field["localisedFields"] instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields) {
                            $field = $field["localisedFields"]->getFieldDefinition($field["key"]);

                            if (in_array($field->getName(), $allowedfields) && $field->getName() != "IgnoreField") {
                                // handling label field --- open
                                //echo $field->getName().'\n';
                                if (array_key_exists($field->getName() . '_clabel', $labelFieldArray)) {
                                    if ($field instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\ExternalImage) {
                                        $field->setFieldtype('input');
                                    }
                                    $fieldConfig = $this->getFieldGridConfig($field, $gridType, $count, !empty($types));

                                    $fieldConfig['xmlField'] = ucfirst($labelFieldArray[$fieldConfig['key'] . '_clabel']);
//                                    $fieldConfig['showFilter'] = array_key_exists($field->getName(), $showFiltersArray) ? true : false;
                                    $fieldConfig['showFilter'] = true;
                                    $fieldConfig['labelField'] = true;
                                    $fieldConfig['key'] = $fieldConfig['key'] . '_clabel';
                                    $availableFields[] = $fieldConfig;

                                    $count++;
                                }
                                // handling label field --- closed

                                $fieldConfig = $this->getFieldGridConfig($field, $gridType, $count, !empty($types));
                                $fieldConfig['xmlField'] = ucfirst($xmlFileClassFieldMapping[$fieldConfig['key']]);
//                                $fieldConfig['showFilter'] = array_key_exists($field->getName(), $showFiltersArray) ? true : false;
                                $fieldConfig['showFilter'] = true;
                                $availableFields[] = $fieldConfig;
                                $count++;
                            }
                        }
                    } else if ($field instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields) {
                        foreach ($field->getFieldDefinitions() as $fd) {
                            if (in_array($fd->getName(), $allowedfields)) {
                                $fieldConfig = $this->getFieldGridConfig($fd, $gridType, $count);
                                if (!empty($fieldConfig)) {
                                    $fieldConfig['xmlField'] = ucfirst($xmlFileClassFieldMapping[$fieldConfig['key']]);
//                                    $fieldConfig['showFilter'] = array_key_exists($field->getName(), $showFiltersArray) ? true : false;
                                    $fieldConfig['showFilter'] = true;
                                    $availableFields[] = $fieldConfig;
                                    $count++;
                                }
                            }
                        }
                    } else if ($field instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks) {

                        $allowedTypes = $field->getAllowedTypes();
                        if (!empty($allowedTypes)) {
                            foreach ($allowedTypes as $t) {
                                $brickClass = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($t);
                                $brickFields = $brickClass->getFieldDefinitions();
                                if (!empty($brickFields)) {
                                    foreach ($brickFields as $bf) {

                                        if (($field->getName() . '~' . $bf->getName() . '~' . $t) == $key) {
                                            $fieldConfig = $this->getFieldGridConfig($bf, $gridType, $count, false, $t, $field->getName());
                                            if (!empty($fieldConfig)) {
                                                $fieldConfig['xmlField'] = ucfirst($xmlFileClassFieldMapping[$fieldConfig['key']]);
//                                                $fieldConfig['showFilter'] = array_key_exists($field->getName(), $showFiltersArray) ? true : false;
                                                $fieldConfig['showFilter'] = true;
                                                $availableFields[] = $fieldConfig;
                                                $count++;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else if (in_array($field->getName(), $allowedfields) && $field->getName() != "IgnoreField") {
                        // handling label field --- open
                        //echo $field->getName().'\n';
                        if (array_key_exists($field->getName() . '_clabel', $labelFieldArray)) {
                            if ($field instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\ExternalImage) {
                                $field->setFieldtype('input');
                            }
                            $fieldConfig = $this->getFieldGridConfig($field, $gridType, $count, !empty($types));

                            $fieldConfig['xmlField'] = ucfirst($labelFieldArray[$fieldConfig['key'] . '_clabel']);
//                            $fieldConfig['showFilter'] = array_key_exists($field->getName(), $showFiltersArray) ? true : false;
                            $fieldConfig['showFilter'] = true;
                            $fieldConfig['labelField'] = true;
                            $fieldConfig['key'] = $fieldConfig['key'] . '_clabel';
                            $availableFields[] = $fieldConfig;

                            $count++;
                        }
                        // handling label field --- closed

                        $fieldConfig = $this->getFieldGridConfig($field, $gridType, $count, !empty($types));
                        $fieldConfig['xmlField'] = ucfirst($xmlFileClassFieldMapping[$fieldConfig['key']]);
//                        $fieldConfig['showFilter'] = array_key_exists($field->getName(), $showFiltersArray) ? true : false;
                        $fieldConfig['showFilter'] = true;
                        $availableFields[] = $fieldConfig;
                        $count++;
                    } else if ($field->getName() == "IgnoreField") {

                        for ($i = 0; $i < count($withoutMappingFields); $i++) {
                            $fieldConfig = $this->getFieldGridConfig($field, $gridType, $count, !empty($types));
                            $fieldConfig['xmlField'] = ucfirst($withoutMappingFields[$i]);
                            $fieldConfig['showFilter'] = array_key_exists($field->getName(), $showFiltersArray) ? true : false;

                            $availableFields[] = $fieldConfig;

                            $count++;
                        }
                    }
                }
            }
        }

        return $this->json([
                    "sortinfo" => isset($gridConfig['sortinfo']) ? $gridConfig['sortinfo'] : false,
                    "language" => $language,
                    "availableFields" => $availableFields,
                    "onlyDirectChildren" => isset($gridConfig['onlyDirectChildren']) ? $gridConfig['onlyDirectChildren'] : false,
                    "pageSize" => 25,
                    "mappingId" => $id,
                    "classUsed" => $classUsed,
                    "thresholdNeeded" => $thresholdFieldNeeded,
                    "qualityCheckNeeded" => $qualityCheckNeeded
        ]);
    }

    protected function reorderFields($csvColumnsArr, $outputFieldsArr) {
        $outputArr = array();

        $outputArr[] = array('key' => 'id', 'label' => 'Id', 'position' => 0);
        $outputArr[] = array('key' => 'filename', 'label' => 'filename', 'position' => 1);
        foreach ($csvColumnsArr as $col) {
            $csvFieldName = $col[0];
            foreach ($outputFieldsArr as $oArr) {
                if (isset($oArr['xmlField']) && $oArr['xmlField'] == $csvFieldName) {
                    $outputArr[] = $oArr;
                    break;
                }
            }
        }

        return $outputArr;
    }

    protected function getFieldGridConfig($field, $gridType, $position, $force = false, $keyPrefix = null, $brickName = null) {
        $key = ($keyPrefix != null) ? ($brickName . "~" . $field->getName() . "~" . $keyPrefix) : ($keyPrefix . $field->getName());

        $config = null;
        $title = $field->getName();
        if (method_exists($field, "getTitle")) {
            if ($field->getTitle()) {
                $title = $field->getTitle();
            }
        }

        if ($field->getFieldtype() == "slider") {
            $config["minValue"] = $field->getMinValue();
            $config["maxValue"] = $field->getMaxValue();
            $config["increment"] = $field->getIncrement();
        }

        if (method_exists($field, "getWidth")) {
            $config["width"] = $field->getWidth();
        }
        if (method_exists($field, "getHeight")) {
            $config["height"] = $field->getHeight();
        }

        $visible = false;
        if ($gridType == "search") {
            $visible = $field->getVisibleSearch();
        } elseif ($gridType == "grid") {
            $visible = $field->getVisibleGridView();
        } elseif ($gridType == "all") {
            $visible = true;
        }

        \Pimcore\Model\DataObject\Service::enrichLayoutDefinition($field);

        return [
            "key" => $key,
            "type" => $field->getFieldType(),
            "label" => $title,
            "config" => $config,
            "layout" => $field,
            "position" => $position
        ];
    }

    public function getBrickFieldType($brickName, $fieldKey) {

        $bricks = new \Pimcore\Model\DataObject\Objectbrick\Definition\Listing();
        $bricks = $bricks->load();
        $type = '';

        foreach ($bricks as $brick) {
            if ($brick->getKey() == $brickName) {
                $fieldDefs = $brick->getFieldDefinitions();

                foreach ($fieldDefs as $fieldDef) {
                    if ($fieldDef->getName() == $fieldKey) {
                        $type = $fieldDef->getFieldtype();
                    }
                }
            }
        }
        return $type;
    }

    public function getFieldType($fieldName) {
        $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName($this->className);

        $gridFilterType = '';

        if (strpos($fieldName, '>')) {

            $gridFilterType = "string";
        } else if (strpos($fieldName, '~')) {
            $field = explode('~', $fieldName);
            exit;
            $gridFilterType = $this->getBrickKeyByAttribute($field[0], $field[1]);
        } else {

            $fieldDef = $classDef->getFieldDefinition($fieldName);

            if (!$fieldDef) {
                if ($locFields = $classDef->getFieldDefinition("localizedfields")) {
                    $fieldDef = $locFields->getFieldDefinition($fieldName);
                }
            }

            $fieldType = $fieldDef->getFieldtype();
            if ($fieldType == 'objects' || $fieldType == 'input' || $fieldType == 'textarea' || $fieldType == 'wysiwyg') {
                $gridFilterType = "string";
            } else if ($fieldType == "numeric") {
                $gridFilterType = "numeric";
            } else if ($fieldType == "select") {
                $gridFilterType = "list";
            }
        }

        return $gridFilterType;
    }

    public function getBrickKeyByAttribute($brickName, $attribute) {
        $bricks = new \Pimcore\Model\DataObject\Objectbrick\Definition\Listing();
        $bricks = $bricks->load();
        $gridFilterType = '';


        foreach ($bricks as $brick) {
            if ($brick->getKey() == $brickName) {
                $fieldDefs = $brick->getFieldDefinitions();
                foreach ($fieldDefs as $fieldDef) {
                    if ($fieldDef->getName() == $attribute) {
                        $fieldType = $fieldDef->getFieldtype();
                        if ($fieldType == 'objects' || $fieldType == 'input' || $fieldType == 'textarea' || $fieldType == 'wysiwyg') {
                            $gridFilterType = "string";
                        } else if ($fieldType == "numeric") {
                            $gridFilterType = "numeric";
                        } else if ($fieldType == "select") {
                            $gridFilterType = "list";
                        }
                    }
                }
            }
        }
        return $gridFilterType;
    }

    /**
     * @Route("/channel/get-channel-grid-proxy-data/{classUsed}")
     * @param Request $request
     */
    public function getChannelGridProxyDataAction($classUsed = null, Request $request) {

        $completeFieldData = json_decode($request->request->get('completeFieldData'));
        $objectsArray = array();

        if ($completeFieldData == false) {
            return $this->adminJson(["data" => array(), "success" => true, "total" => 0]);
        }

        foreach ($completeFieldData as $fieldData) {
            if ($fieldData->type == "objects") {
                $objectsArray[] = $fieldData->key;
            }
        }

        $requestedLanguage = $request->request->get("language");

        $requestedRetailer = $request->request->get("retailer");

        $objectType = $request->request->get("downloadObjectType");

        $threshold = $request->request->get("threshold");
        $qualityCheck = $request->request->get("qualityCheck");

        if (!$requestedLanguage) {
            $requestedLanguage = \Pimcore\Tool::getDefaultLanguage();
        }

        $class = \Pimcore\Model\DataObject\ClassDefinition::getByName($classUsed);
        if ($class) {
            $className = $class->getName();

            $colMappings = [
                "filename" => "o_key",
                "fullpath" => ["o_path", "o_key"],
                "id" => "oo_id",
                "published" => "o_published",
                "modificationDate" => "o_modificationDate",
                "creationDate" => "o_creationDate"
            ];

            $start = 0;
            $limit = 20;
            $orderKey = "o_modificationDate";
            $order = "DESC";

            $fields = [];
            $bricks = [];
            $labelFieldArray = array();

            if ($request->request->get("fields")) {
                $fields = $request->request->get("fields");

                $objectsArray1 = array();

                foreach ($fields as $field) {
                    if (strpos($field, '-')) {
                        $tempField = explode('-', $field);
                        $field = $tempField[1] . '~' . $tempField[2];
                    }
                    if (strpos($field, '_clabel')) {
                        $temp = explode('_', $field);
                        $labelFieldArray[] = $temp[0];
                    }
                }
            }

            if ($request->request->get("limit")) {
                $limit = $request->request->get("limit");
            }
            if ($request->request->get("start")) {
                $start = $request->request->get("start");
            }

            $sortingSettings = \Pimcore\Bundle\AdminBundle\Helper\QueryParams::extractSortingSettings($request->request->all());

            $doNotQuote = false;

            if ($sortingSettings['order']) {
                $order = $sortingSettings['order'];
            }
            if (strlen($sortingSettings['orderKey']) > 0) {
                $orderKey = $sortingSettings['orderKey'];
                if (!(substr($orderKey, 0, 1) == "~")) {
                    if (array_key_exists($orderKey, $colMappings)) {
                        $orderKey = $colMappings[$orderKey];
                    } elseif ($class->getFieldDefinition($orderKey) instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue) {
                        $orderKey = "concat(" . $orderKey . "__unit, " . $orderKey . "__value)";
                        $doNotQuote = true;
                    } elseif (strpos($orderKey, "~") !== false) {
                        $orderKeyParts = explode("~", $orderKey);
                        if (count($orderKeyParts) == 2) {
                            $orderKey = $orderKeyParts[1];
                        }
                    }
                }
            }

            $listClass = "\\Pimcore\\Model\\DataObject\\" . ucfirst($classUsed) . "\\Listing";
            $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName($classUsed);
            $conditionFilters = [];

            $featureJoins = [];
            $featureFilters = false;
            // create filter condition
            if ($request->request->get("filter")) {
                $conditionFilters[] = \Pimcore\Bundle\AdminBundle\Helper\GridHelperService::getFilterCondition($request->request->get("filter"), $classDef);
                $featureFilters = $this->getFeatureFilters($request->request->get("filter"), $class, $requestedLanguage);
                if ($featureFilters) {
                    $featureJoins = array_merge($featureJoins, $featureFilters["joins"]);
                }
            }
            if ($request->request->get("condition")) {
                $conditionFilters[] = "(" . $request->request->get("condition") . ")";
            }

            if ($request->request->get("filter")) {
                
            }

            $conditionFilters[] = " o_published = 1 ";

            $objectClass = "Retailer";
            $className = '\\Pimcore\\Model\\DataObject\\' . ucfirst($objectClass);
            $retailerClassExists = \Pimcore\Tool::classExists($className);

            if ($retailerClassExists) {
                $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName($classUsed);
                $retailerDefinition = $classDef->getFieldDefinition("retailer");

                if ($retailerDefinition instanceof DataObject\ClassDefinition\Data) {
                    $retailerClassExists = true;
                } else {
                    $retailerClassExists = false;
                }
            }

            if ($retailerClassExists && $requestedRetailer && $requestedRetailer != "") {
                $vendorDefinition = $classDef->getFieldDefinition("retailer");
                if ($vendorDefinition instanceof DataObject\ClassDefinition\Data) {
                    $conditionFilters[] = " retailer LIKE '%,$requestedRetailer,%' ";
                }
            }

            //customization for channel threshold value - start- neha-chugh
            $mappingId = $request->request->get("mapping");
            $mappingObject = DataObject::getById($mappingId);
            if ($mappingObject) {
                $name = ucfirst($mappingObject->getName());
                $exportCheckBoxName = "publishOn" . $name;
                $fieldDefinition = $classDef->getFieldDefinition($exportCheckBoxName);
                if ($fieldDefinition instanceof DataObject\ClassDefinition\Data) {
                    $conditionFilters[] = " $exportCheckBoxName =  '1' ";
                }



//                $websiteConfig = \Pimcore\Tool\Frontend::getWebsiteConfig();
//                $thresholdFieldName = $name . "CompletenessThreshold";
//                $thresholdValue = $websiteConfig->get($thresholdFieldName);
//                if ($thresholdValue != null && $thresholdValue != "") {
//                    $thresholdValue = floatval($thresholdValue);
//                    $conditionFilters[] = "$name >=  $thresholdValue ";
//                }

                if ($threshold && $threshold != "" && is_numeric($threshold)) {
                    $thresholdFieldName = $name . "Completeness";
                    $nameFieldDefinition = $classDef->getFieldDefinition($thresholdFieldName);
                    if ($nameFieldDefinition instanceof DataObject\ClassDefinition\Data) {
                        $conditionFilters[] = "( $thresholdFieldName  > '$threshold' OR $thresholdFieldName  = '$threshold' )";
                    }
                }

                if ($qualityCheck && $qualityCheck != "false") {
                    $qualityFieldName = $name . "DataQuality";
                    $qualityfieldDefinition = $classDef->getFieldDefinition($qualityFieldName);
                    if ($qualityfieldDefinition instanceof DataObject\ClassDefinition\Data) {
                        $conditionFilters[] = "(`$qualityFieldName` IS NULL OR `$qualityFieldName` = '' )";
                    }
                }
            }



            //customization for channel threshold value - end- neha-chugh

            $list = new $listClass();
            if (!empty($bricks)) {
                foreach ($bricks as $b) {
                    $list->addObjectbrick($b);
                }
            }

            /*
             * Showing data based on object type
             */
            if ($objectType == "object") {
                $list->setObjectTypes([\Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_OBJECT]);
            } else if ($objectType == "objectAndVariant") {
                $list->setObjectTypes([DataObject\AbstractObject::OBJECT_TYPE_VARIANT, DataObject\AbstractObject::OBJECT_TYPE_OBJECT]);
            } else {
                $list->setObjectTypes([\Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);
            }


            $list->setCondition(implode(" AND ", $conditionFilters));

//            $list->setObjectTypes([DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);

            $list->setLimit($limit);
            $list->setOffset($start);

            if (isset($sortingSettings["isFeature"]) && $sortingSettings["isFeature"]) {
                $orderKey = "cskey_" . $sortingSettings["fieldname"] . "_" . $sortingSettings["groupId"] . "_" . $sortingSettings["keyId"];
                $list->setOrderKey($orderKey);
                $list->setGroupBy("o_id");

                $featureJoins[] = $sortingSettings;
            } else {
                $list->setOrderKey($orderKey);
            }
            $list->setOrder($order);


            /*
              if ($class->getShowVariants()) {
              $list->setObjectTypes([\Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);
              }
             *
             */

            $this->addGridFeatureJoins($list, $featureJoins, $class, $featureFilters, $requestedLanguage);

            $list->load();
//var_dump($list->getQuery()->getSQL());
//die;
            $objects = [];

            foreach ($list->getObjects() as $object) {
                $o = $this->gridObjectData($object, $fields, $requestedLanguage);

                foreach ($labelFieldArray as $fieldName) {
                    $fieldDefinition = $classDef->getFieldDefinition($fieldName);

                    if ($fieldDefinition) {
                        $o[$fieldName . '_clabel'] = $fieldDefinition->getTitle();
                    }
                }

                // if the data is of object relation type than get object key instead of object path
                foreach ($o as $key => $obj) {
                    if (in_array($key, $objectsArray)) {
                        $tempArray = array();
                        foreach ($obj as $objFullPath) {
                            $object = \Pimcore\Model\DataObject::getByPath($objFullPath);
//                            if ($object instanceof \Pimcore\Model\DataObject\ProductCategory) {
//                                $tempArray[] = $object->getCategoryName();
//                            } else if ($object instanceof \Pimcore\Model\DataObject\Vendor) {
//                                $tempArray[] = $object->getVendorName();
//                            } else
                            {
                                $tempArray[] = $objFullPath;
                            }
                        }
                        $o[$key] = $tempArray;
                    }
//                if ($obj->type === "image") {
//                    $o[$key] = "http://".$_SERVER["HTTP_HOST"] . $obj->path . $obj->filename;
//                }
                }

                $objects[] = $o;
            }

            return $this->adminJson(["data" => $objects, "success" => true, "total" => $list->getTotalCount()]);
        } else {
            return $this->adminJson(["data" => array(), "success" => true, "total" => 0]);
        }
    }

    /**
     *
     * @param string $filterJson
     * @param ClassDefinition $class
     * @param $requestedLanguage
     *
     * @return string
     */
    public static function getFeatureFilters($filterJson, $class, $requestedLanguage) {
        $joins = [];
        $conditions = [];

        if ($filterJson) {
            $filters = json_decode($filterJson, true);
            foreach ($filters as $filter) {
                $operator = '=';

                $filterField = $filter['property'];
                $filterOperator = $filter['operator'];

                if ($filter['type'] == 'string') {
                    $operator = 'LIKE';
                } elseif ($filter['type'] == 'numeric') {
                    if ($filterOperator == 'lt') {
                        $operator = '<';
                    } elseif ($filterOperator == 'gt') {
                        $operator = '>';
                    } elseif ($filterOperator == 'eq') {
                        $operator = '=';
                    }
                } elseif ($filter['type'] == 'date') {
                    if ($filterOperator == 'lt') {
                        $operator = '<';
                    } elseif ($filterOperator == 'gt') {
                        $operator = '>';
                    } elseif ($filterOperator == 'eq') {
                        $operator = '=';
                    }
                    $filter['value'] = strtotime($filter['value']);
                } elseif ($filter['type'] == 'list') {
                    $operator = '=';
                } elseif ($filter['type'] == 'boolean') {
                    $operator = '=';
                    $filter['value'] = (int) $filter['value'];
                }

                $keyParts = explode('~', $filterField);

                if (substr($filterField, 0, 1) != '~') {
                    continue;
                }

                $type = $keyParts[1];
                if ($type != 'classificationstore') {
                    continue;
                }

                $fieldName = $keyParts[2];
                $groupKeyId = explode('-', $keyParts[3]);

                /** @var $csFieldDefinition Model\DataObject\ClassDefinition\Data\Classificationstore */
                $csFieldDefinition = $class->getFieldDefinition($fieldName);

                $language = $requestedLanguage;
                if (!$csFieldDefinition->isLocalized()) {
                    $language = 'default';
                }

                $groupId = $groupKeyId[0];
                $keyid = $groupKeyId[1];

                $keyConfig = Model\DataObject\Classificationstore\KeyConfig::getById($keyid);
                $type = $keyConfig->getType();
                $definition = json_decode($keyConfig->getDefinition());
                $field = \Pimcore\Model\DataObject\Classificationstore\Service::getFieldDefinitionFromJson($definition, $type);

                if ($field instanceof ClassDefinition\Data) {
                    $mappedKey = 'cskey_' . $fieldName . '_' . $groupId . '_' . $keyid;
                    $joins[] = ['fieldname' => $fieldName, 'groupId' => $groupId, 'keyId' => $keyid, 'language' => $language];
                    $condition = $field->getFilterConditionExt(
                            $filter['value'], $operator, [
                        'name' => $mappedKey]
                    );

                    $conditions[$mappedKey] = $condition;
                }
            }
        }

        $result = [
            'joins' => $joins,
            'conditions' => $conditions
        ];

        return $result;
    }

    /** Adds all the query stuff that is needed for displaying, filtering and exporting the feature grid data.
     * @param $list list
     * @param $featureJoins
     * @param $class
     * @param $featureFilters
     */
    public static function addGridFeatureJoins($list, $featureJoins, $class, $featureFilters) {
        if ($featureJoins) {
            $me = $list;
            $list->onCreateQuery(function (QueryBuilder $select) use ($list, $featureJoins, $class, $featureFilters, $me) {
                $db = \Pimcore\Db::get();

                $alreadyJoined = [];

                foreach ($featureJoins as $featureJoin) {
                    $fieldname = $featureJoin['fieldname'];
                    $mappedKey = 'cskey_' . $fieldname . '_' . $featureJoin['groupId'] . '_' . $featureJoin['keyId'];
                    if (isset($alreadyJoined[$mappedKey]) && $alreadyJoined[$mappedKey]) {
                        continue;
                    }
                    $alreadyJoined[$mappedKey] = 1;

                    $table = $me->getDao()->getTableName();
                    $select->joinLeft(
                            [$mappedKey => 'object_classificationstore_data_' . $class->getId()], '('
                            . $mappedKey . '.o_id = ' . $table . '.o_id'
                            . ' and ' . $mappedKey . '.fieldname = ' . $db->quote($fieldname)
                            . ' and ' . $mappedKey . '.groupId=' . $featureJoin['groupId']
                            . ' and ' . $mappedKey . '.keyId=' . $featureJoin['keyId']
                            . ' and ' . $mappedKey . '.language = ' . $db->quote($featureJoin['language'])
                            . ')', [
                        $mappedKey => 'value'
                            ]
                    );
                }

                $havings = $featureFilters['conditions'];
                if ($havings) {
                    $havings = implode(' AND ', $havings);
                    $select->having($havings);
                }
            });
        }
    }

    /**
     * @Route("/channel/save-channel")
     * @param Request $request
     */
    public function saveChannelAction(Request $request) {
        $filters = json_decode($request->request->get('filters'));
        $mappingObjectId = $request->request->get('mappingObjectId');
        $channelObjectId = $request->request->get('channelObjectId');
//        $ftpFileType = $request->request->get('ftpFileType');
        $retailerId = $request->request->get('retailer');

        $objectType = $request->request->get('downloadObjectType');
        $language = $request->request->get('language');
        $share = $request->request->get('share') == "true" ? 1 : 0;
        $downloadTypes = json_decode($request->request->get('downloadTypes'));
        $thumbnail = json_decode($request->request->get('thumbnail'));
        $metadata = json_decode($request->request->get('metadata'));

        $thresholdValue = $request->request->get('thresholdValue');
        $qualityCheck = $request->request->get('qualityCheck');

        $mappingObject = \Pimcore\Model\DataObject::getById($mappingObjectId);
        $object = \Pimcore\Model\DataObject::getById($channelObjectId);
        if ($object && $mappingObject) {
            $object->setFilterConditions(serialize($filters));
            $object->setMapping($mappingObject);
//            $object->setFtpFileType($ftpFileType);
            $object->setRetailer($retailerId);
            $object->setLanguageUsed($language);
            $object->setDownloadOptions($downloadTypes);
            $object->setAssetMetadata($metadata);
            $object->setThumbnail($thumbnail);
            $object->setShareWithUser($share);
            $object->setDownloadObjectType($objectType);
            $object->setCompletenessThreshold($thresholdValue);
            $object->setQualityCheck($qualityCheck);

            $object->save();
            return $this->json(["success" => true]);
        } else {
            return $this->json(["success" => false, "msg" => "Error saving channel"]);
        }
    }

    // function to convert an array to XML using SimpleXML
    public function jsonToXml($array, &$xml, $headerMeta, $headerData) {

        $completeHeaderData = array();
        $count = 0;

        foreach ($headerData as $headerName) {
//            $tempArray = array();
            $tempArray = $headerMeta[$count];
            $count++;
            $completeHeaderData[$headerName] = $tempArray;
        }

        // Create some elements.
        $catalog = $xml->createElement("PRODUCTS");
        $websiteName = \Pimcore\Tool::getHostUrl();
        foreach ($array as $key => $value) {
            $product = $xml->createElement("PRODUCT");
            if ($value !== null) {
                foreach ($value as $key1 => $value1) {
                    if (is_array($value1)) {
                        // Condition for Image
                        if ($value1[0] instanceof \Pimcore\Model\Asset\Image && $value1[0]->getFilename() != null) {
                            $imagePath = $websiteName . $value1[0]->getPath() . $value1[0]->getFilename();
                            $header = str_replace(" ", "_", $key1);
                            $header = str_replace("/", " or ", $header);
                            $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
                            $data = $xml->createElement("$header", "$imagePath");
                            $product->appendChild($data);
                        }
                        //Condition for Quantity values
                        else if ($value1[0]->value !== null) {
                            $quantityValueData = ($value1[0]->unit->abbreviation . $value1[0]->value);
                            $header = str_replace(" ", "_", $key1);
                            $header = str_replace("/", " or ", $header);
                            $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
                            $data = $xml->createElement("$header", "$quantityValueData");
                            $product->appendChild($data);
                        } else if ($value1[0] instanceof \Pimcore\Model\DataObject) {
                            $objectValue = $value1[0]->getFullpath();
                            $header = str_replace(" ", "_", $key1);
                            $header = str_replace("/", " or ", $header);
                            $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
                            $data = $xml->createElement("$header", "$objectValue");
                            $product->appendChild($data);
                        } else {
                            $header = str_replace(" ", "_", $key1);
                            $header = str_replace("/", " or ", $header);
                            $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
                            $data = $xml->createElement("$header", implode(',', $value1));
                            $product->appendChild($data);
                        }
                    } else {
                        $value1 = array($value1);
                        if ($value1[0] instanceof \Pimcore\Model\DataObject\QuantityValue) {
                            $abbr = "";
                            if ($value1[0]->getUnit() && $value1[0]->getUnit()->getAbbreviation()) {
                                $abbr = " " . $value1[0]->getUnit()->getAbbreviation();
                            }
                            $quantityValueData = $value1[0]->getValue() . $abbr;


                            // $quantityValueData = $value1[0]->getValue() . " " . $value1[0]->getUnit()->getAbbreviation();
                            $header = str_replace(" ", "_", $key1);
                            $header = str_replace("/", " or ", $header);
                            $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
                            $data = $xml->createElement($header, $quantityValueData);
                            $product->appendChild($data);
                        } else if ($value1[0] instanceof \Pimcore\Model\Asset\Image && $value1[0]->getFilename() != null) {
                            $imagePath = (string) $websiteName . $value1[0]->getPath() . $value1[0]->getFilename();
                            $header = str_replace(" ", "_", $key1);
                            $header = str_replace("/", " or ", $header);
                            $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
                            $data = $xml->createElement("$header", "$imagePath");
                            $product->appendChild($data);
                        } else if ($value1[0] instanceof \Pimcore\Model\DataObject) {
                            $objectValue = $value1[0]->getFullpath();
                            $header = str_replace(" ", "_", $key1);
                            $header = str_replace("/", " or ", $header);
                            $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
                            $data = $xml->createElement("$header", "$objectValue");
                            $product->appendChild($data);
                        } else if ($value1[0] !== null) {
                            $value1[0] = str_ireplace('&nbsp', ' ', $value1[0]);
                            $value1[0] = str_ireplace('&nbsp;', ' ', $value1[0]);
                            $value1[0] = str_ireplace('<p>', '', $value1[0]);
                            $value1[0] = str_ireplace('</p>', '', $value1[0]);
                            $value1[0] = str_ireplace('&', ' and ', $value1[0]);
                            $value1[0] = str_ireplace('amp;', '', $value1[0]);
                            $value1[0] = trim(strip_tags(rtrim($value1[0])));
                            $header = str_replace(" ", "_", $key1);
                            $header = str_replace("/", " or ", $header);
                            $header = preg_replace('/[^A-Za-z0-9\-]/', '', $header);
                            // $header = \Pimcore\File::getValidFilename($header);
                            $data = $xml->createElement($header, $value1[0]);
                            $product->appendChild($data);
                        }
                    }
                }
            }
            if ($product !== null) {
                $catalog->appendChild($product);
            }
        }
        if ($catalog !== null) {
            $xml->appendChild($catalog);
        }
        $xml->appendChild($catalog);
    }

    /**
     * @Route("/channel/download-xml")
     * @param Request $request
     */
    public function downloadXmlAction(Request $request) {

        $channelID = $request->request->get("channelObjectId");
        $headerData = json_decode($request->request->get('headerData'));
        $headerMetaData = json_decode($request->request->get('headerMeta'));

        $gridAllData = $this->getGridData($request);

        $now = new Carbon();
        $timestampValue = $now->getTimestamp();

        $j = 0;
        $sampleArray = array();
        foreach ($gridAllData as $key => $value) {
            $sampleArray[$j] = $value;
            $j++;
        }
        $count = count(array_values($sampleArray[0]));

        $gridJsonData = array();
        foreach ($sampleArray as $key) {
            $tempArray = array();
            $i = 0;
            foreach ($key as $value) {
                if ($i < $count) {
                    $header = $headerData[$i];

                    if (is_array($value) && ($value[0] instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata || $value[0] instanceof \Pimcore\Model\DataObject || $value[0] instanceof \AppBundle\Model\ShopCategory)) {
                        $objectData = "";
                        
                        for ($j = 0; $j < count($value); $j++) {
                            if ($value[$j] instanceof \AppBundle\Model\ShopCategory) {
                                $objectData .= $value[$j]->getFullPath() . ",";
                            } else {
                                $objectData .= $value[$j]->getFullPath() . ",";
                            }
                        }
                        $objectData = rtrim($objectData, ',');
                        $tempArray[$header] = $objectData;
                    } else if ($value instanceof \Carbon\Carbon) {
                        $timestamp = explode(" ", $value->date);
                        $tempArray[$header] = $timestamp[0];
                    } else {
                        $tempArray[$header] = $value;
                    }
                    $i++;
                }
            }
            array_push($gridJsonData, $tempArray);
        }

        // Converting grid data to XML
        $xml = new \DOMDocument();
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

        $this->jsonToXml($gridJsonData, $xml, $headerMetaData, $headerData);

        $outXML = $xml->saveXML();

        $channelObject = \Pimcore\Model\DataObject\Channel::getById($channelID);
        $channelName = $channelObject->getKey();

        //check whether the xml of the current object exists
        $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . $timestampValue . ".xml");
        $file = \Pimcore\Model\Asset::getByPath("/" . $filename);

        //if no asset exists create new asset
        if ($file == NULL) {
            $file = new \Pimcore\Model\Asset();
            $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . $timestampValue . ".xml");
            $file->setFilename($filename);
            $file->setParent(\Pimcore\Model\Asset\Folder::getByPath("/"));
            $file->setData($outXML);
        } else {
            $file->setData($outXML);  //updating xml file
        }

        // Save file
        $file->save();
        try {
            $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
            $downloadData = array();
            $downloadData[] = $currentUser->getName();
            $downloadData [] = date("d-m-Y h:i:sa");
            $downloadData [] = "Data XML";
            $channelObject->getDownloadStatistics();
            $DownloadStatistics = $channelObject->getDownloadStatistics();
            if (!is_array($DownloadStatistics)) {
                $DownloadStatistics = array();
            }
            $DownloadStatistics[] = $downloadData;
            $channelObject->setDownloadStatistics($DownloadStatistics);
            $channelObject->save();
        } catch (Exception $ex) {
            
        }


        return $this->json(
                        [
                            "success" => true,
                            "id" => $file->getId()
        ]);
    }

    /**
     * @Route("/channel/download-csv")
     * @param Request $request
     * @throws Exception
     */
    public function downloadCsvAction(Request $request) {
        $channelID = $request->request->get("channelObjectId");
        $mappingObjectId = $request->request->get('mappingObjectId');
        $headerData = json_decode($request->request->get('headerData'));
        $headerMetaData = json_decode($request->request->get('headerMeta'));
        $classUsed = $request->request->get('classnameUsed');
        $retailer = $request->request->get('retailer');
        $language = $request->request->get('language');

        $this->mappingObjectId = $mappingObjectId;

        $gridAllData = $this->getGridData($request);
        unset($headerData[0]); // remove ID
        unset($headerData[1]); // remove filename
        //  unset($headerData[2]); // remove ID
        // unset($headerData[3]); // remove filename
        // unset($headerData[4]); // remove ID



        $collections = $this->getCollectionDefinition($mappingObjectId);
        if (count($collections)) {
            foreach ($collections as $collection) {
                $headerData[] = $collection['csvColumnName'];
            }
        }

        try {
            $csvfile = $this->createCsvFile($classUsed, $headerMetaData, $gridAllData, $collections, $headerData);

            //check whether the csv of the current object exists
            $channelObject = \Pimcore\Model\DataObject\Channel::getById($channelID);
            $channelName = $channelObject->getKey();
            $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . time() . ".csv");
            $file = \Pimcore\Model\Asset::getByPath("/" . $filename);

            //if no asset exists create new asset
            if ($file == NULL) {
                $file = new \Pimcore\Model\Asset();
                $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . time() . ".csv");
                $file->setFilename($filename);
                $file->setParent(\Pimcore\Model\Asset\Folder::getByPath("/"));
                $file->setData(file_get_contents(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $csvfile));
            } else {
                $file->setData(file_get_contents(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $csvfile));
            }

            $file->save();

            if (file_exists(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $csvfile)) {
                unlink(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $csvfile);
            }

            try {
                $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
                $downloadData = array();
                $downloadData[] = $currentUser->getName();
                $downloadData [] = date("d-m-Y h:i:sa");
                $downloadData [] = "Data CSV";
                $channelObject->getDownloadStatistics();
                $DownloadStatistics = $channelObject->getDownloadStatistics();
                if (!is_array($DownloadStatistics)) {
                    $DownloadStatistics = array();
                }
                $DownloadStatistics[] = $downloadData;
                $channelObject->setDownloadStatistics($DownloadStatistics);
                $channelObject->save();
            } catch (Exception $ex) {
                
            }


            return $this->json([
                        "success" => true,
                        "id" => $file->getId()
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @Route("/channel/download-xls")
     * @param Request $request
     * @throws Exception
     */
    public function downloadXlsAction(Request $request) {
        $channelID = $request->request->get("channelObjectId");
        $mappingObjectId = $request->request->get('mappingObjectId');
        $headerData = json_decode($request->request->get('headerData'));
        $headerMetaData = json_decode($request->request->get('headerMeta'));
        $classUsed = $request->request->get('classnameUsed');

        $this->mappingObjectId = $mappingObjectId;

        $gridAllData = $this->getGridData($request);

        unset($headerData[0]); // remove ID
        unset($headerData[1]); // remove filename
        //  unset($headerData[2]); // remove ID
        //  unset($headerData[3]); // remove filename
        //  unset($headerData[4]); // remove ID

        $collections = $this->getCollectionDefinition($mappingObjectId);
        if (count($collections)) {
            foreach ($collections as $collection) {
                $headerData[] = $collection['csvColumnName'];
            }
        }

        try {
            $csvfile = $this->createCsvFile($classUsed, $headerMetaData, $gridAllData, $collections, $headerData);

            $excelfile = "export" . time() . ".xlsx";
            $filePath = PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/";

            $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
            $objReader->setInputEncoding("UTF-8");
            $objPHPExcel = $objReader->load($filePath . $csvfile);
            $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Xlsx');
            $objWriter->save($filePath . $excelfile);

            //check whether the csv of the current object exists
            $channelObject = \Pimcore\Model\DataObject\Channel::getById($channelID);
            $channelName = $channelObject->getKey();
            $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . time() . ".xlsx");
            $file = \Pimcore\Model\Asset::getByPath("/" . $filename);

            //if no asset exists create new asset
            if ($file == NULL) {
                $file = new \Pimcore\Model\Asset();
                $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . time() . ".xlsx");
                $file->setFilename($filename);
                $file->setParent(\Pimcore\Model\Asset\Folder::getByPath("/"));
                $file->setData(file_get_contents($filePath . $excelfile));
            } else {
                $file->setData(file_get_contents($filePath . $excelfile));
            }

            $file->save();

            if (file_exists($filePath . $excelfile)) {
                //unlink($filePath . $excelfile);
            }

            try {
                $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
                $downloadData = array();
                $downloadData[] = $currentUser->getName();
                $downloadData [] = date("d-m-Y h:i:sa");
                $downloadData [] = "Data Excel";
                $channelObject->getDownloadStatistics();
                $DownloadStatistics = $channelObject->getDownloadStatistics();
                if (!is_array($DownloadStatistics)) {
                    $DownloadStatistics = array();
                }
                $DownloadStatistics[] = $downloadData;
                $channelObject->setDownloadStatistics($DownloadStatistics);
                $channelObject->save();
            } catch (Exception $ex) {
                return $this->json([
                            "success" => false,
                            "message" => $e->getMessage()
                ]);
            }

            return $this->json([
                        "success" => true,
                        "id" => $file->getId()
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function reorderHeaderData($headerData, $mappingObjectId) {
        $columnsArr = array_column(\Pimcore\Model\DataObject\Mapping::getById($mappingObjectId)->getColumns(), 0);

        $outputArr = array();
        $outputArr[] = "aaa";
        $outputArr[] = "bbb";
        foreach ($columnsArr as $col) {
            foreach ($headerData as $col1) {
                if ($col1 == $col) {
                    $outputArr[] = $col1;
                    break;
                }
            }
        }
        unset($outputArr[0]); // remove ID
        unset($outputArr[1]); // remove filename

        return $outputArr;
    }

    public function createCsvFile($classUsed = null, $headerMeta = null, $rowData, $collections, $headerData) {

        unset($headerMeta[0]); // remove ID
        unset($headerMeta[1]); // remove filename


        $class = "\\Pimcore\\Model\\DataObject\\" . ucfirst($classUsed);

        $websiteName = \Pimcore\Tool::getHostUrl();
        $filename = "export" . time() . ".csv";
        $file = fopen(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $filename, 'w');
        fputcsv($file, $headerData);

        foreach ($rowData as $row) {

            $newRow = [];
            $part = $class::getById($row[0], true);
            $index = 2;

            foreach ($headerData as $key => $header) {
                if (in_array($header, array_column($collections, "csvColumnName"))) {
                    $index = $this->search($collections, $header);
                    if ($index !== null) {
                        if ($part) {
                            $collectionInfo = $collections[$index];
                            $getter = "get{$collectionInfo['collectionName']}";
                            $collectionData = $part->$getter();
                            if ($collectionData) {
                                $items = $collectionData->getItems();
                                if (count($items)) {
                                    if (empty($collectionInfo['dependentFieldName'])) {
                                        $collectionDataGetter = "get{$collectionInfo['fieldName']}";
                                        $newItems = array();
                                        if (strpos($header, "Unstructured Attribute") !== FALSE) {
                                            foreach ($items as $itm) {
                                                if (!(strpos($itm->getAttributeId(), "Feature") !== FALSE)) {
                                                    $newItems[] = $itm;
                                                }
                                            }
                                        } else {
                                            $newItems = $items;
                                        }

                                        $newRow[] = isset($newItems[$collectionInfo['collectionIndex'] - 1]) ? $newItems[$collectionInfo['collectionIndex'] - 1]->$collectionDataGetter() : null;
                                    } else {
                                        $checkSet = false;
                                        foreach ($items as $itm) {
                                            $expectedVal = $collectionInfo['dependentFieldValue'];
                                            $dependentFieldGetter = "get{$collectionInfo['dependentFieldName']}";
                                            if (method_exists($itm, $dependentFieldGetter)) {
                                                $val = $itm->$dependentFieldGetter();
                                                if ($expectedVal == $val) {
                                                    $collectionDataGetter = "get{$collectionInfo['fieldName']}";
                                                    $newRow[] = $itm->$collectionDataGetter();
                                                    $checkSet = true;
                                                    break;
                                                }
                                            }
                                        }

                                        if (!$checkSet)
                                            $newRow[] = "";
                                    }
                                } else {
                                    $newRow[] = "";
                                }
                            } else {
                                $newRow[] = "";
                            }
                        } else {
                            $newRow[] = "";
                        }
                    } else {
                        $newRow[] = "";
                    }
                } else {

                    if (isset($headerMeta[$index]) && isset($headerMeta[$index][1])) {


                        if ($headerMeta[$index][1] === "image") {
                            if (isset($row[$key]) && $row[$key]->getFilename()) {
                                $newRow[] = $row[$key];
                            } else {
                                $newRow[] = "";
                            }
                        } elseif ($headerMeta[$index][1] === "wysiwyg") {
                            if (isset($row[$key])) {
                                $row[$key] = str_replace("<p>", "", $row[$key]);
                                $row[$key] = str_replace("</p>", "", $row[$key]);
                                $newRow[] = $row[$key];
                            } else {
                                $newRow[] = "";
                            }
                        } elseif ($headerMeta[$index][1] === "date") {
                            if (isset($row[$key])) {
                                $tempData = explode(" ", $row[$key]);
                                $newRow[] = $tempData[0];
                            } else {
                                $newRow[] = "";
                            }
                        } elseif ($headerMeta[$index][1] === "quantityValue") {
                            if (isset($row[$key]) && $row[$key] instanceof DataObject\ClassDefinition\Data\QuantityValue) {

                                $abbr = "";
                                if ($row[$key] && $row[$key]->getUnit() instanceof DataObject\QuantityValue\Unit && $row[$key]->getUnit()->getAbbreviation()) {
                                    $abbr = " " . $row[$key]->getUnit()->getAbbreviation();
                                }
                                $value = $row[$key]->getValue() . $abbr;

                                // $value = $row[$key]->getValue() . " ". $row[$key]->getUnit()->getAbbreviation();
                                $newRow[] = $value;
                            } else {
                                $newRow[] = "";
                            }
                        } elseif (($headerMeta[$index][1] === "countriesmultiselect") || ($headerMeta[$index][1] === "multiselect")) {
                            if (is_array($row[$key]) && count($row[$key]) > 0) {
                                $newRow[] = implode(", ", $row[$key]);
                            } else {
                                $newRow[] = "";
                            }
                        } elseif ($headerMeta[$index][1] === "manyToManyObjectRelation") {
                            if (is_array($row[$key]) && count($row[$key]) > 0) {

                                foreach ($row[$key] as $obejctRelation) {
                                    $objectRelationData [] = $obejctRelation->getFullPath();
                                }
                                $newRow[] = implode(",", $objectRelationData);
                            } else {
                                $newRow[] = "";
                            }
                        } elseif ($headerMeta[$index][1] === "advancedManyToManyObjectRelation") {
                            if (is_array($row[$key]) && isset($row[$key][0])) {
                                $objectString = "";
                                for ($index1 = 0; $index1 < count($row[$key]); $index1++) {
                                    $objectString .= $row[$key][$index1]->getObject()->getFullPath() . ", ";
                                }
                                $objectString = rtrim($objectString, ", ");
                                $newRow[] = $objectString;
                            } else {
                                $newRow[] = "";
                            }
                        } elseif ($headerMeta[$index][1] === "href") {
                            $hrefPath = $row[$key];
                            if (gettype($hrefPath)) {
                                $newRow[] = $hrefPath;
                            } else if ($hrefPath) {
                                $asset = \Pimcore\Model\Asset::getByPath($hrefPath);
                                if ($asset) {
                                    $newRow[] = $asset->getFilename();
                                } else {
                                    $newRow[] = "";
                                }
                            } else {
                                $newRow[] = "";
                            }
                        } elseif ($headerMeta[$index][1] === "video") {
                            $asset = \Pimcore\Model\Asset::getById($row[$key]);
                            if ($asset) {
                                $newRow[] = $asset->getFilename();
                            } else {
                                $newRow[] = "";
                            }
                        } else {
                            if (is_array($row[$key])) {
                                if ($row[$key][0] instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata) {
                                    $objectString = "";
                                    for ($index = 0; $index < count($row[$key]); $index++) {

                                        if ($row[$key][$index] instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata) {
                                            $objectString .= $row[$key][$index]->getObject()->getFullPath() . ", ";
                                        } else {
                                            $objectString .= $row[$key][$index]->getFullPath() . ", ";
                                        }
                                    }
                                    $objectString = rtrim($objectString, ", ");
                                    $newRow[] = $objectString;
                                } else {
                                    $newRow[] = "";
                                }
                            } else {
                                $newRow[] = isset($row[$key]) ? $row[$key] : "";
                            }
                        }
                    } else {
                        $newRow[] = "";
                    }
                }
                $index++;
            }
            fputcsv($file, $newRow);
        }
        fclose($file);

        return $filename;
    }

    protected function getDataAccordingToType($row, $header, $headerMeta) {

        $destColumn = $this->getMappedDestColumn($header);
        $index = 0;
        foreach ($headerMeta as $meta) {
            if (strpos($destColumn, $meta[0]) !== false) {
                break;
            }
            $index++;
        }
        if (isset($headerMeta[$index]) && isset($headerMeta[$index][1])) {
            if ($headerMeta[$index][1] === "image") {
                if (isset($row[$header]) && $row[$header]->getFilename()) {
                    $value = $row[$header]->getFilename();
                } else {
                    $value = "";
                }
            } elseif ($headerMeta[$index][1] === "wysiwyg") {
                if (isset($row[$header])) {
                    $row[$header] = str_replace("<p>", "", $row[$header]);
                    $row[$header] = str_replace("</p>", "", $row[$header]);
                    $value = $row[$header];
                } else {
                    $value = "";
                }
            } elseif ($headerMeta[$index][1] === "date") {
                if (isset($row[$header])) {
                    $tempData = explode(" ", $row[$header]);
                    $value = $tempData[0];
                } else {
                    $value = "";
                }
            } elseif ($headerMeta[$index][1] === "quantityValue") {
                if (isset($row[$header])) {
                    $value = $row[$header]->unit->abbreviation . $row[$header]->value;
                } else {
                    $value = "";
                }
            } elseif (($headerMeta[$index][1] === "countriesmultiselect") || ($headerMeta[$index][1] === "multiselect")) {
                if (is_array($row[$header]) && count($row[$header]) > 0) {
                    $value = implode(", ", $row[$header]);
                } else {
                    $value = "";
                }
            } elseif ($headerMeta[$index][1] === "objects") {
                if (is_array($row[$header]) && isset($row[$header][0])) {
                    //$newRow[] = $row[$key][0]->getFullPath();
//                    if ($row[$header][0] instanceof \Pimcore\Model\DataObject\ProductCategory) {
//                        $value = $row[$header][0]->getCategoryName();
//                    } else if ($row[$header][0] instanceof \Pimcore\Model\DataObject\Vendor) {
//                        $value = $row[$header][0]->getVendorName();
//                    } else
                    {
                        $value = $row[$header][0]->getFullPath();
                    }
                } else {
                    $value = "";
                }
            } elseif ($headerMeta[$index][1] === "objectsMetadata") {
                if (is_array($row[$header]) && isset($row[$header][0])) {
                    $objectString = "";
                    for ($index = 0; $index < count($row[$header]); $index++) {
                        $objectString .= $row[$header][0]->getFullPath() . ", ";
                    }
                    $objectString = rtrim($objectString, ", ");
                    $value = $objectString;
                } else {
                    $value = "";
                }
            } elseif ($headerMeta[$index][1] === "href") {
                $hrefPath = $row[$header];
                if ($hrefPath) {
                    $asset = \Pimcore\Model\Asset::getByPath($hrefPath);
                    if ($asset) {
                        $value = $asset->getFilename();
                    } else {
                        $value = '';
                    }
                } else {
                    $value = '';
                }
            } elseif ($headerMeta[$index][1] === "video") {
                $asset = \Pimcore\Model\Asset::getById($row[$header]);
                if ($asset) {
                    $value = $asset->getFilename();
                } else {
                    $value = "";
                }
            } else if ($headerMeta[$index][1] === "externalImage") {

                if (is_object($row[$header])) {
                    $value = $row[$header]->getUrl();
                } else {
                    $value = $row[$header];
                }
            } else {
                if (is_array($row[$header])) {
                    if ($row[$header][0] instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata) {
                        $objectString = "";
                        for ($index = 0; $index < count($row[$header]); $index++) {
                            $objectString .= $row[$header][$index]->getFullPath() . ", ";
                        }
                        $objectString = rtrim($objectString, ", ");
                        $value = $objectString;
                    } else {
                        $value = '';
                    }
                } else {
                    $value = isset($row[$header]) ? $row[$header] : '';
                }
            }
        } else {
            $value = '';
        }
        return $value;
    }

    protected function getSourceColumns() {
        $sourceColumns = [];
        $mapping = \Pimcore\Model\DataObject\Mapping::getById($this->mappingObjectId);
        if ($mapping) {
            $mappingColumns = $mapping->getColumns();
            if (is_array($mappingColumns)) {
                foreach ($mappingColumns as $column) {
                    $sourceColumns[] = $column[0];
                }
            }
        }
        return $sourceColumns;
    }

    public function createXlsFile($classUsed = null, $headerMeta = null, $rowData, $collections, $headerData) {

        //$object = \Pimcore\Model\DataObject::getById($this->mappingObjectId);
        $csvfile = $this->createCsvFile($classUsed, $headerMeta, $rowData, $collections, $headerData, $this->mappingObjectId);

        return $csvfile;
        /* $object = \Pimcore\Model\DataObject::getById($this->mappingObjectId);
          $headerColData = unserialize($object->getHeaderData());

          $sourceHeaders = $this->getSourceColumns();

          //unset($headerMeta[0]); // remove ID
          //unset($headerMeta[1]); // remove filename
          //unset($headerMeta[2]); // remove categoryname
          //unset($headerMeta[3]); // remove vendorname
          //unset($headerMeta[4]); // remove modifiedData


          $class = "\\Pimcore\\Model\\DataObject\\" . ucfirst($classUsed);

          $filename = "export" . time() . ".csv";
          $file = fopen(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $filename, 'w');
          if (count($headerColData)) {
          foreach ($headerColData as $hdata) {
          fputcsv($file, $hdata);
          }
          }
          fputcsv($file, $sourceHeaders);

          foreach ($rowData as $row) {
          $newRow = [];
          $part = $class::getById($row["ID"], true);
          //$index = 5;
          //echo '<pre>'; print_r($sourceHeaders); exit;
          //echo '<pre>'; print_r($collections); exit;
          $newCol = [];
          foreach ($collections as $col) {
          $newCol[$col['csvColumnName']] = $col;
          }
          //echo '<pre>'; print_r($newCol); exit;
          foreach ($sourceHeaders as $header) {
          //if (in_array($header, array_column($collections, "csvColumnName"))) {
          if (array_key_exists($header, $newCol)) {
          //$index = $this->search($collections, $header);
          //if ($index !== null) {
          //$collectionData = null;
          if ($part) {//object exists or not
          //$collectionInfo = $collections[$index];
          $collectionInfo = $newCol[$header];

          $getter = "get{$collectionInfo['collectionName']}";
          $collectionData = $part->$getter();
          if ($collectionData) {
          $items = $collectionData->getItems();

          if (count($items)) {
          if (empty($collectionInfo['dependentFieldName'])) {
          $collectionDataGetter = "get".ucfirst($collectionInfo['fieldName']);

          $newItems = array();
          if (strpos($header, "Unstructured Attribute") !== FALSE) {
          foreach ($items as $itm) {
          if (!(strpos($itm->getAttributeId(), "Feature") !== FALSE)) {
          $newItems[] = $itm;
          }
          }
          } else {
          $newItems = $items;
          }
          //                                        if ($collectionInfo['collectionIndex'] == 0) {
          //                                            $collectionInfo['collectionIndex'] = 1;
          //                                        }


          if (isset($newItems[$collectionInfo['collectionIndex'] - 1]) && !empty($newItems[$collectionInfo['collectionIndex'] - 1])) {
          if($collectionInfo['collectionName'] == 'FeatureBenefit') {
          //echo '<pre>'; echo count($newItems)."\n".($collectionInfo['collectionIndex'] - 1)."\n"; //exit;
          //echo '<pre>'; print_r($collectionInfo); //exit;
          }

          if(is_object($newItems[$collectionInfo['collectionIndex'] - 1])) {
          $dataObj = $newItems[$collectionInfo['collectionIndex'] - 1]->$collectionDataGetter();
          if (is_object($dataObj)) {
          $keyVal = get_object_vars($dataObj);
          foreach ($keyVal as $keyValue) {
          $newRow[] = $keyValue;
          }
          } else {
          //echo $dataObj."\n";
          $newRow[] = $dataObj;
          }
          } else {
          $newRow[] = '';
          }
          } else {
          $newRow[] = '';
          }
          //$newRow[] = isset($newItems[$collectionInfo['collectionIndex'] - 1]) ? $newItems[$collectionInfo['collectionIndex'] - 1]->$collectionDataGetter() : null;
          } else {
          $checkSet = false;
          foreach ($items as $itm) {
          $expectedVal = $collectionInfo['dependentFieldValue'];
          $dependentFieldGetter = "get{$collectionInfo['dependentFieldName']}";
          if (method_exists($itm, $dependentFieldGetter)) {
          $val = $itm->$dependentFieldGetter();
          if ($expectedVal == $val) {
          $collectionDataGetter = "get{$collectionInfo['fieldName']}";
          $newRow[] = $itm->$collectionDataGetter();
          $checkSet = true;
          break;
          }
          }
          }

          if (!$checkSet)
          $newRow[] = "";
          }
          } else {
          $newRow[] = "";
          }
          } else {
          $newRow[] = "";
          }
          } else {
          $newRow[] = "";
          }
          /*} else {
          $newRow[] = "";
          } */
        /* } else {
          if (array_key_exists($header, $row)) {
          $newRow[] = $this->getDataAccordingToType($row, $header, $headerMeta);
          } else {
          $newRow[] = "";
          }
          }
          }
          for ($i = 0; $i < count($newRow); $i++) {
          $newRow[$i] = utf8_decode(trim($newRow[$i]));
          }

          fputcsv($file, $newRow);
          }
          fclose($file);

          return $filename; */
    }

    public function getCollectionDefinition($mappingObjectId) {
        $collectionDefinitionArr = array();
        $mappingObj = \Pimcore\Model\DataObject\Mapping::getById($mappingObjectId);
        $columns = $mappingObj->getColumns();

        foreach ($columns as $colRow) {
            if (strpos($colRow[1], "#") !== false) {
                $parts = explode(" ", $colRow[1]);
                $collectionParts = explode("#", $parts[0]);
                $fieldName = $collectionParts[0];
                $collectionName = $collectionParts[1];
                $outCsvClumn = $colRow[0];
                $collectionIndex = (int) $colRow[2];

                $dependentFieldName = $dependentFieldValue = "";
                if ($this->isJSON($colRow[3])) {
                    $arr = json_decode($colRow[3], true);
                    if (!empty(key($arr)) != "" && !empty($arr[key($arr)])) {
                        $dependentFieldName = trim(key($arr));
                        $dependentFieldValue = trim($arr[key($arr)]);
                    }
                }

                $collectionDefinitionArr[] = array(
                    "collectionName" => $collectionName,
                    "fieldName" => $fieldName,
                    "csvColumnName" => $outCsvClumn,
                    "collectionIndex" => $collectionIndex,
                    "dependentFieldName" => $dependentFieldName,
                    "dependentFieldValue" => $dependentFieldValue
                );
            }
        }
        return $collectionDefinitionArr;
    }

    function isJSON($string) {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

    protected function search($array, $value) {
        $index = null;
        foreach ($array as $key => $subArray) {
            foreach ($subArray as $k => $v) {
                if ($k == "csvColumnName" && $v == $value) {
                    $index = $key;
                }
            }
        }
        return $index;
    }

    /**
     * @Route ("/channel/download-json")
     * @param Request $request
     */
    public function downloadJsonAction(Request $request) {
        $channelID = $request->request->get("channelObjectId");
        $headerData = json_decode($request->request->get('headerData'));

        $gridAllData = $this->getGridData($request);

        $now = new Carbon();
        $timestampValue = $now->getTimestamp();

        $j = 0;
        $sampleArray = array();

        foreach ($gridAllData as $key => $value) {
            $sampleArray[$j] = $value;
            $j++;
        }

        $count = count(array_values($sampleArray[0]));
        $websiteName = \Pimcore\Tool::getHostUrl();
        $gridJsonData = array();
        foreach ($sampleArray as $key) {
            $tempArray = array();
            $i = 0;
            foreach ($key as $value) {
                if ($i < $count) {
                    $header = $headerData[$i];
                    /*
                     * Condition for Object
                     */
                    if (is_array($value) && ($value[0] instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata || $value[0] instanceof \Pimcore\Model\DataObject || $value[0] instanceof \AppBundle\Model\ShopCategory)) {
                        $objectData = "";
                        for ($j = 0; $j < count($value); $j++) {
                            $objectData .= $value[$j]->getFullPath() . ",";
                        }
                        $objectData = rtrim($objectData, ',');
                        $tempArray[$header] = $objectData;
                    } else if ($value instanceof \Pimcore\Model\Asset && $value->getFilename() != null) {
                        $tempArray[$header] = $websiteName . $value->getPath() . $value->getFilename();
                        ;
                    } else if ($value instanceof \Pimcore\Model\DataObject\Data\QuantityValue) {
                        $abbr = "";
                        if ($value->getUnit() && $value->getUnit()->getAbbreviation()) {
                            $abbr = " " . $value->getUnit()->getAbbreviation();
                        }
                        $tempArray[$header] = $value->getValue() . $abbr;
                    } else if ($value instanceof \Carbon\Carbon) {
                        $timestamp = explode(" ", $value->getDate());
                        $tempArray[$header] = $timestamp[0];
                    } else {
                        $tempArray[$header] = $value;
                    }
                    $i++;
                }
            }
            array_push($gridJsonData, $tempArray);
        }

        $gridJsonData = array_filter($gridJsonData);

        $jsonData = json_encode($gridJsonData, JSON_PRETTY_PRINT);

        $outJson = '{ "products": ' . $jsonData . ' }';

        $channelObject = \Pimcore\Model\DataObject\Channel::getById($channelID);
        $channelName = $channelObject->getKey();

        //check whether the xml of the current object exists
        $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . $timestampValue . ".json");
        $file = \Pimcore\Model\Asset::getByPath("/" . $filename);

        //if no asset exists create new asset
        if ($file == NULL) {
            $file = new \Pimcore\Model\Asset();
            $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . $timestampValue . ".json");
            $file->setFilename($filename);
            $file->setParent(\Pimcore\Model\Asset\Folder::getByPath("/"));
            $file->setData($outJson);
        } else {
            $file->setData($outJson);
        }

        // Save file
        $file->save();

        try {
            $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
            $downloadData = array();
            $downloadData[] = $currentUser->getName();
            $downloadData [] = date("d-m-Y h:i:sa");
            $downloadData [] = "Data JSON";
            $channelObject->getDownloadStatistics();
            $DownloadStatistics = $channelObject->getDownloadStatistics();
            if (!is_array($DownloadStatistics)) {
                $DownloadStatistics = array();
            }
            $DownloadStatistics[] = $downloadData;
            $channelObject->setDownloadStatistics($DownloadStatistics);
            $channelObject->save();
        } catch (Exception $ex) {
            
        }

        return $this->adminJson(
                        [
                            "success" => true,
                            "id" => $file->getId()
        ]);
    }

    /**
     * @Route("/channel/download-image")
     * @param Request $request
     */
    public function downloadImageAction(Request $request) {
        //$this->disableViewAutoRender();

        $gridAllData = $this->getGridData($request);
        $success = false;

        $now = new Carbon();
        $timestampValue = $now->getTimestamp();

        $temp = array();
        $image = array();

        $list = array
            (
            "Id,File Name,Image",
        );

        foreach ($gridAllData as $key => $value) {
            $imageData = "";
            $imageData .= $value[0];
            $imageData .= ",";
            $imageData .= $value[1];
            $imageData .= ",";

            foreach ($value as $key1 => $value1) {

                if ($value1 instanceof \Pimcore\Model\Asset) {
                    $temp['filename'] = $value1->getFilename();
                    $temp['path'] = PIMCORE_PROJECT_ROOT . "/web/var/assets" . $value1->getPath();
                    $imageData .= $temp['filename'];
                    $list[] = $imageData;
                    array_push($image, $temp);
                }
            }
        }

        $user = \Pimcore\Tool\Admin::getCurrentUser();
        //$user = \Pimcore\Model\User::getById(12);
        if ($user) {
            $filename = "productData_" . $user->getName() . ".csv";
        } else {
            $filename = "productData.csv";
        }

        $file = fopen($filename, "w");

        foreach ($list as $line) {
            fputcsv($file, explode(',', $line));
        }

        fclose($file);

        $imageArray = $image;

        if (count($image) <= 0) {
            $success = false;
        } else {
            $result = $this->createZip($image, $filename);
            $success = true;
        }

        return $this->json(
                        [
                            "success" => $success,
                            'zip' => $result
        ]);
    }

    public function createZip($imageArray, $filename) {
        $archive_file_name = 'Product_Images.zip';
        $archive_file_name = 'Product_Images' . time() . '.zip';

        $path = $this->zipFilesAndDownload($imageArray, $archive_file_name, $filename);
        return $path;
    }

    public function zipFilesAndDownload($file_names, $archive_file_name, $filename) {

        if (file_exists($archive_file_name)) {
            unlink($archive_file_name);
        }
        $zip = new \ZipArchive();
        //create the file and throw the error if unsuccessful
        if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE) !== TRUE) {
            exit("cannot open <$archive_file_name>\n");
        }
        //add each files of $file_name array to archive
        if (is_array($file_names) && count($file_names) > 0) {
            foreach ($file_names as $files) {

                /*
                 * External Image Check
                 */
                if (strpos($files['path'], "http:") !== false || strpos($files['path'], "https:") !== false) {
                    $download_file = file_get_contents($files['path']);
                    $zip->addFromString($files['filename'], $download_file);
                } else {
                    if (file_exists($files['path']) && is_file($files['path'])) {
                        $zip->addFile($files['path'], $files['filename']);
                    }
                }
            }
        }

        fopen($filename, 'r');
        $zip->addFile($filename, "manifest.csv");

        $zip->close();

        return $_SERVER["HTTP_ORIGIN"] . "/" . $archive_file_name;
    }

    /**
     * @Route("/channel/delete-file")
     * @param Request $request
     */
    public function deleteFileAction(Request $request) {
        $id = $request->query->get('assetId');
        $asset = \Pimcore\Model\Asset::getById($id);

        $asset->delete();
        die();
    }

    // Function to upload XML file to Asset folder
    public function uploadXmlFile($xml, $id) {
        $parent = \Pimcore\Model\Asset\Folder::getByPath("/Output XML Files");

        $channelObject = \Pimcore\Model\DataObject\Channel::getById($id);
        $channelName = $channelObject->getKey();

        $child = \Pimcore\Model\Asset\Folder::getByPath("/Output XML Files/" . $channelName);

        $now = new Carbon();
        $timestampValue = $now->getTimestamp();

        // Created Output XML File Folder
        if ($parent == NULL) {
            $parent = new \Pimcore\Model\Asset\Folder();
            $parent->setFilename("Output XML Files");
            $parent->setParent(\Pimcore\Model\Asset::getByPath("/"));
            $parent->save();
        }

        if ($child == NULL) {
            $child = new \Pimcore\Model\Asset\Folder();
            $child->setFilename($channelName);
            $child->setParent(\Pimcore\Model\Asset::getByPath("/Output XML Files"));
            $child->save();
        }

        //check whether the xml of the current object exists
        $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . $timestampValue . ".xml");
        $file = \Pimcore\Model\Asset::getByPath("/Output XML Files/$channelName" . $filename);


        //if no asset exists create new asset
        if ($file == NULL) {
            $file = new \Pimcore\Model\Asset();
            $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . $timestampValue . ".xml");
            $file->setFilename($filename);
            $file->setParent(\Pimcore\Model\Asset\Folder::getByPath("/Output XML Files/$channelName"));
            $file->setData($xml);
        } else {
            $file->setData($xml);  //updating xml file
        }

        // Save file
        $file->save();
    }

    /*
     * @param Request request
     * @desc  Get each row data of grid
     */

    public function getGridData($request) {
        $recordCount = $request->request->get('recordCount');
        $headerMetaData = json_decode($request->request->get('headerMeta'));
        $classUsed = $request->request->get('classnameUsed');
        $language = $request->request->get('language');
        $requestedRetailer = $request->request->get('retailer');
        $objectType = $request->request->get('downloadObjectType');
        $mappingObjectId = $request->request->get('mappingObjectId');
        $mappingObject = DataObject::getById($mappingObjectId);
        $threshold = $request->request->get('threshold');
        $qualityCheck = $request->request->get('qualityCheck');


        $classDefinition = \Pimcore\Model\DataObject\ClassDefinition::getByName(ucfirst($classUsed));

        $featureJoins = $conditionFilters = [];
        if ($request->get('filterData')) {
            $filter = $request->request->get('filterData');
            $conditionFilters[] = \Pimcore\Bundle\AdminBundle\Helper\GridHelperService ::getFilterCondition($filter, $classDefinition);
            $featureFilters = \Pimcore\Bundle\AdminBundle\Helper\GridHelperService::getFeatureFilters($filter, $classDefinition, $language);
            if ($featureFilters) {
                $featureJoins = array_merge($featureJoins, $featureFilters['joins']);
            }
        }
        $conditionFilters[] = " o_published = 1 ";

//        if ($requestedRetailer && $requestedRetailer != "") {
//            $vendorDefinition = $classDefinition->getFieldDefinition("retailer");
//            if ($vendorDefinition instanceof DataObject\ClassDefinition\Data) {
//                $conditionFilters[] = " retailer LIKE '%,$requestedRetailer,%' ";
//            }
//        }

        $websiteConfig = \Pimcore\Tool\Frontend::getWebsiteConfig();
        $numberOfRecords = $websiteConfig->get("dataExportMaxLimit");

        /*
         * Customizable number of records check
         */
        if (is_numeric($numberOfRecords) && $numberOfRecords > 0) {
            $limit = $numberOfRecords;
        } else {
            $limit = $recordCount;
        }


        //customization for channel threshold value - start- neha-chugh
        if ($mappingObject) {
            $name = ucfirst($mappingObject->getName());
            $exportCheckBoxName = "publishOn" . $name;
            $fieldDefinition = $classDefinition->getFieldDefinition($exportCheckBoxName);
            if ($fieldDefinition instanceof DataObject\ClassDefinition\Data) {
                $conditionFilters[] = "$exportCheckBoxName =  '1' ";
            }

            if ($threshold && $threshold != "" && is_numeric($threshold)) {
                $thresholdFieldName = $name . "Completeness";
                $nameFieldDefinition = $classDefinition->getFieldDefinition($thresholdFieldName);
                if ($nameFieldDefinition instanceof DataObject\ClassDefinition\Data) {
                    $conditionFilters[] = "$thresholdFieldName >=  '$threshold' ";
                }
            }

            if ($qualityCheck && $qualityCheck != "false") {
                $qualityFieldName = $name . "DataQuality";
                $qualityfieldDefinition = $classDefinition->getFieldDefinition($qualityFieldName);
                if ($qualityfieldDefinition instanceof DataObject\ClassDefinition\Data) {
                    $conditionFilters[] = "( $qualityFieldName IS NULL OR $qualityFieldName = '' )";
                }
            }
        }
        //customization for channel threshold value - end- neha-chugh
        $class = "\\Pimcore\\Model\\DataObject\\" . ucfirst($classUsed) . "\\Listing";
        $productListing = new $class();
        $productListing->setLimit($limit);
        $productListing->setCondition(implode(' AND ', $conditionFilters));
        $productListing->setOrderKey("o_modificationDate");
        $productListing->setOrder("desc");
        $productListing->setObjectTypes([\Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);

        if ($objectType == "object") {
            $productListing->setObjectTypes([\Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_OBJECT]);
        } else if ($objectType == "objectAndVariant") {
            $productListing->setObjectTypes([DataObject\AbstractObject::OBJECT_TYPE_VARIANT, DataObject\AbstractObject::OBJECT_TYPE_OBJECT]);
        } else {
            $productListing->setObjectTypes([\Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);
        }


        $this->addGridFeatureJoins(
                $productListing, $featureJoins, $classDefinition, $featureFilters, $language
        );

        $classColumns = array();
        foreach ($headerMetaData as $key => $value) {
            if ($value[0] != "IgnoreField") {
                if ($value[0] != "" && $value[0] != "id" && $value[0] != "filename" && $value[0] !== "vendorName" && $value[0] !== "modifiedDate") {
                    array_push($classColumns, $value[0]);
                }
            }
        }

        $gridAllData = array();
        foreach ($productListing as $data) {
            $data->setGetInheritedValues(true);
            $gridAllData[] = $this->rowData($data, $classColumns, $language);
        }

        return $gridAllData;
    }

    public function rowData($data, $classColumns, $language) {
        $tempArray = array();
        $tempArray[0] = $data->getO_Id();
        $tempArray[1] = $data->getO_Key();
        for ($j = 0; $j < count($classColumns); $j++) {
            $i = 2;
            foreach ($classColumns as $values) {
                if (preg_match('/[~]/', $values)) {
                    $brick = explode("~", $values);
                    $classAttributeName = "get" . ucfirst($brick[0]);
                    $brickFieldName = "get" . ucfirst($brick[1]);
                    $brickName = "get" . ucfirst($brick[2]);

                    if ($data->{$classAttributeName}()->{$brickName}() != null) {
                        $column = $data->{$classAttributeName}()->{$brickName}()->{$brickFieldName}();
                        if ($column != null) {
                            $tempArray[$i++] = $column;
                        }
                    }
                } else {
                    $column = "get" . ucfirst($values);
                    $tempArray[$i++] = $data->{$column}($language);
                }
            }
        }
        return $tempArray;
    }

    protected function getMappedSourceColumn($key) {
        $mappings = \Pimcore\Model\DataObject\Mapping::getById($this->mappingObjectId);
        $source = null;
        if ($mappings) {
            foreach ($mappings->getColumns() as $mapping) {
                $fieldArray = explode('_', $key);
                if (isset($mapping[1]) && strpos($key, '_clabel') && $mapping[2] == true && $mapping[1] == $fieldArray[0]) {
                    $source = $mapping[0];
                    break;
                } else if (isset($mapping[1]) && strpos($mapping[1], $key) !== false && $mapping[2] != true) {
                    $source = $mapping[0];
                    break;
                }
            }
        }
        return $source;
    }

    protected function getMappedDestColumn($key) {
        $mapping = \Pimcore\Model\DataObject\Mapping::getById($this->mappingObjectId);
        $dest = null;
        if ($mapping) {
            foreach ($mapping->getColumns() as $mapping) {
                if (isset($mapping[0]) && strpos($mapping[0], $key) !== false) {
                    $dest = $mapping[1];
                    break;
                }
            }
        }
        return $dest;
    }

    /**
     * @Route("/channel/get-available-languages")
     */
    public function getAvailableLanguagesAction() {

        $locales = \Pimcore\Tool::getSupportedLocales();
        $availableLanguages = \Pimcore\Tool::getValidLanguages();
        $fieldArray = array();

        foreach ($availableLanguages as $language) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['name'] = $locales[$language];
            $fieldArrayTemp['value'] = $language;
            $fieldArray[] = $fieldArrayTemp;
        }

        return $this->json(["languages" => $fieldArray]);
    }

    /**
     * @Route("/channel/get-channels-folder-id")
     */
    public function getChannelsFolderIdAction() {
        $folderName = "Channel";
//        $folderName = \Pimcore\File::getValidFilename($folderName);
        $folderPath = '/System Configuration/Distribution Hub/' . $folderName;
        $folderObject = \Pimcore\Model\DataObject\Folder::getByPath($folderPath);
        if ($folderObject) {
            $folderObjectId = $folderObject->getId();
            return $this->json(["success" => true, "channelFolderId" => $folderObjectId]);
        } else {
            return $this->json(["success" => false, "msg" => "Mapping folder not found in objects."]);
        }
    }

    /**
     * @Route("/channel/rename")
     */
    public function renameAction(Request $request) {
        $object = \Pimcore\Model\DataObject::getById($request->request->get("id"));
        if ($object instanceof \Pimcore\Model\DataObject\Concrete) {
            $object->setOmitMandatoryCheck(true);
        }
        $values = json_decode($request->request->get("values"), true);
        if ($values["key"]) {
            $object->setKey($values["key"]);
            $object->save();
            return $this->json(["success" => true]);
        } elseif ($values["key"] != $object->getKey()) {
            \Pimcore\Logger::debug("prevented renaming object because of missing permissions ");
        }
        return $this->json(["success" => false, 'message' => 'Please add a valid key']);
    }

    /**
     * @Route("/channel/copy-info")
     * @param Request $request
     */
    public function copyInfoAction(Request $request) {
        $transactionId = time();
        $pasteJobs = [];

        \Pimcore\Tool\Session::useSession(function ($session) use ($transactionId) {
            $session->$transactionId = ["idMapping" => []];
        }, "pimcore_copy");

        if ($request->query->get("type") == "child") {
            // the object itself is the last one
            $pasteJobs[] = [[
            "url" => "/admin/DistributionHub/channel/copy",
            "params" => [
                "sourceId" => $request->query->get("sourceId"),
                "targetId" => $request->query->get("targetId"),
                "type" => $request->query->get("type"),
                "transactionId" => $transactionId
            ]
            ]];
        }


        return $this->json([
                    "pastejobs" => $pasteJobs
        ]);
    }

    /**
     * @Route("/channel/push-to-ftp")
     * @param Request $request
     */
    public function pushToFtpAction(Request $request) {

        $channelID = $request->request->get("channelObjectId");
        $headerData = json_decode($request->request->get('headerData'));
        $headerMetaData = json_decode($request->request->get('headerMeta'));
        $mappingObjectId = $request->request->get('mappingObjectId');
        $ftpFileType = $request->request->get('ftpFileType');
        $websiteConfig = \Pimcore\Config::getWebsiteConfig();

        $host = $websiteConfig->ftpHost;
        $username = $websiteConfig->ftpUserName;
        $password = $websiteConfig->ftpPassword;

        if ($host == null || $host == "" || $username == "" || $username == null || $password == "" || $password == null) {
            return $this->json(["success" => false, "nodetails" => true, "message" => "Incorrect or no FTP Configuration found."]);
        }


        $this->mappingObjectId = $mappingObjectId;


        $gridAllData = $this->getGridData($request);

        $now = new Carbon();
        $timestampValue = $now->getTimestamp();

        $mappingObjectId = $request->request->get('mappingObjectId');
        $classUsed = $request->request->get("classnameUsed");
        $collections = $this->getCollectionDefinition($mappingObjectId);

        if (count($collections)) {
            foreach ($collections as $collection) {
                $headerData[] = $collection['csvColumnName'];
            }
        }


        unset($headerData[0]); // remove ID
        unset($headerData[1]); // remove filename
        //    unset($headerData[2]); // remove ID
        //   unset($headerData[3]); // remove filename
        //  unset($headerData[4]); // remove ID

        if ($ftpFileType === 'Json') {


            $j = 0;
            $sampleArray = array();

            foreach ($gridAllData as $key => $value) {
                $sampleArray[$j] = $value;
                $j++;
            }

            $count = count(array_values($sampleArray[0]));

            $gridJsonData = array();
            foreach ($sampleArray as $key) {
                $tempArray = array();
                $i = 0;
                foreach ($key as $value) {
                    if ($i < $count) {
                        $header = $headerData[$i];
                        /*
                         * Condition for Object
                         */
                        if (is_array($value) && ($value[0] instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata || $value[0] instanceof \Pimcore\Model\DataObject || $value[0] instanceof \AppBundle\Model\ShopCategory)) {
                            $objectData = "";
                            for ($j = 0; $j < count($value); $j++) {
                                $objectData .= $value[$j]->getFullPath() . ",";
                            }
                            $objectData = rtrim($objectData, ',');
                            $tempArray[$header] = $objectData;
                        } else if ($value instanceof \Pimcore\Model\Asset && $value->getFilename() != null) {
                            $tempArray[$header] = $value->getFilename();
                        } else if ($value instanceof \Pimcore\Model\DataObject\Data\QuantityValue) {

                            $abbr = "";
                            if ($value->getUnit() && $value->getUnit()->getAbbreviation()) {
                                $abbr = " " . $value->getUnit()->getAbbreviation();
                            }
                            $tempArray[$header] = $value->getValue() . $abbr;

                            // $tempArray[$header] = $value->getUnit()->getAbbreviation() . "" . $value->getValue();
                        } else if ($value instanceof \Carbon\Carbon) {
                            $timestamp = explode(" ", $value->getDate());
                            $tempArray[$header] = $timestamp[0];
                        } else {
                            $tempArray[$header] = $value;
                        }
                        $i++;
                    }
                }
                array_push($gridJsonData, $tempArray);
            }

            $gridJsonData = array_filter($gridJsonData);

            $jsonData = json_encode($gridJsonData, JSON_PRETTY_PRINT);

            $outJson = '{ "products": ' . $jsonData . ' }';
            $filename = "export" . time() . ".json";
            $soucefile = PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $filename;


            $fp = fopen("$soucefile", 'w');
            fwrite($fp, json_encode($outJson));
            fclose($fp);
        } elseif ($ftpFileType === 'Xml') {

            $j = 0;
            $sampleArray = array();
            foreach ($gridAllData as $key => $value) {
                $sampleArray[$j] = $value;
                $j++;
            }
            $count = count(array_values($sampleArray[0]));
            $gridJsonData = array();
            foreach ($sampleArray as $key) {
                $tempArray = array();
                $i = 2;
                foreach ($key as $value) {
                    if ($i < $count) {
                        $header = $headerData[$i];

                        if (is_array($value) && ($value[0] instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata || $value[0] instanceof \Pimcore\Model\DataObject || $value[0] instanceof \AppBundle\Model\ShopCategory)) {
                            $objectData = "";
                            for ($j = 0; $j < count($value); $j++) {
                                $objectData .= $value[$j]->getFullPath() . ",";
                            }
                            $objectData = rtrim($objectData, ',');
                            $tempArray[$header] = $objectData;
                        } else if ($value instanceof \Carbon\Carbon) {
                            $timestamp = explode(" ", $value->date);
                            $tempArray[$header] = $timestamp[0];
                        } else {
                            $tempArray[$header] = $value;
                        }
                        $i++;
                    }
                }
                array_push($gridJsonData, $tempArray);
            }

            // Converting grid data to XML
            $xml = new \DOMDocument();
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;

            $this->jsonToXml($gridJsonData, $xml, $headerMetaData, $headerData);

            $outXML = $xml->saveXML();

            $channelObject = \Pimcore\Model\DataObject\Channel::getById($channelID);
            $channelName = $channelObject->getKey();

            //check whether the xml of the current object exists
            $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . $timestampValue . ".xml");
//            $file = \Pimcore\Model\Asset::getByPath("/" . $filename);
//
//            //if no asset exists create new asset
//            if ($file == NULL) {
//                $file = new \Pimcore\Model\Asset();
//                $filename = \Pimcore\File::getValidFilename("Product_Catalog_" . $channelName . "_" . $timestampValue . ".xml");
//                $file->setFilename($filename);
//                $file->setParent(\Pimcore\Model\Asset\Folder::getByPath("/"));
//                $file->setData($outXML);
//            } else {
//                $file->setData($outXML);  //updating xml file
//            }
//
//            // Save file
//            $file->save();

            $soucefile = PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $filename;
            $xml->save("$soucefile");
        } else {
            $filename = $this->createCsvFile($classUsed, $headerMetaData, $gridAllData, $collections, $headerData);

            if ($ftpFileType === 'Excel') {

                $filePath = PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/";

                $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
                $objPHPExcel = $objReader->load($filePath . $filename);
                $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Xlsx');
                $filename = "export" . time() . ".xlsx";
                $objWriter->save($filePath . $filename);
            }
        }

        $soucefile = PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $filename;

        $remote_file = '/SFTP/' . $filename;

        $sftp = new SFTP($host);

        if (!$sftp->login($username, $password)) {
            throw new \Exception('Cannot login into your server !');
        } else {
            $success = $sftp->put($remote_file, $soucefile, SFTP::SOURCE_LOCAL_FILE);
        }

        return $this->json(["success" => $success]);
    }

    /**
     * @Route("/channel/copy")
     * @param Request $request
     */
    public function copyAction(Request $request) {
        $success = false;
        $message = "";
        $sourceId = intval($request->request->get("sourceId"));
        $session = \Pimcore\Tool\Session::get("pimcore_copy");
        $targetId = intval($request->request->get("targetId"));
        $target = \Pimcore\Model\DataObject::getById($targetId);
        $source = \Pimcore\Model\DataObject::getById($sourceId);
        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $objectService = new \Pimcore\Model\DataObject\Service($user);
        if ($source != null) {
            try {
                if ($request->request->get("type") == "child") {
                    $newObject = $objectService->copyAsChild($target, $source);

                    $session->{$request->request->get("transactionId")}["idMapping"][(int) $source->getId()] = (int) $newObject->getId();
                }
                $success = true;
            } catch (\Exception $e) {
                \Pimcore\Logger::err($e);
                $success = false;
                $message = $e->getMessage() . " in object " . $source->getRealFullPath() . " [id: " . $source->getId() . "]";
            }
        } else {
            \Pimcore\Logger::error("could not execute copy/paste, source object with id [ $sourceId ] not found");
            $this->json(["success" => false, "message" => "source object not found"]);
        }

        return $this->json(["success" => $success, "message" => $message]);
    }

    /**
     * @Route("/channel/open-xml/{mappingId}/{channelId}", requirements={"mappingId"= "\d+","channelId"="\d+"})
     * @param Request $request
     */
    public function openXmlAction(Request $request) {

        //headerData    ["ID","FILENAME","NAME","SEO","DESCRIPTION","BRANDS","IMAGE"]
        $headerMetaData = [];
        $headerData = [];
        $headerData[] = "ID";
        $headerData[] = "FILENAME";

        $headerMetaData[] = array(
            0 => 'id',
            1 => ''
        );
        $headerMetaData[] = array(
            0 => 'filename',
            1 => ''
        );
        //$channelID = $request->request->get("channelObjectId");
        $channelID = $request->get('channelId');
        $mappingID = $request->get('mappingId');
        $hData = \Pimcore\Model\DataObject\Mapping::getById($mappingID);

        $def = \Pimcore\Model\DataObject\ClassDefinition::getByName('Product');
        $def = $def->getFieldDefinitions();

        if (!empty($hData->getColumns())) {
            foreach ($hData->getColumns() as $fkey => $fvalue) {
                foreach ($fvalue as $hkey => $hvalue) {
                    $headerData[] = $hvalue;
                    break;
                }
            }
            foreach ($hData->getColumns() as $mkey => $mvalue) {
                $newValue = explode(' ', $mvalue[1]);
                if (array_key_exists($newValue[0], $def)) {
                    $type = $def[$newValue[0]]->fieldtype;
                }

                $headerMetaData[] = array(
                    0 => $newValue[0],
                    1 => $type
                );
            }
        } else {
            return false;
        }

        $gridAllData = $this->openXmlGridData($channelID, $headerMetaData);

        $now = new Carbon();
        $timestampValue = $now->getTimestamp();

        $j = 0;
        $sampleArray = array();
        foreach ($gridAllData as $key => $value) {
            $sampleArray[$j] = $value;
            $j++;
        }
        $count = count(array_values($sampleArray[0]));

        $gridJsonData = array();

        foreach ($sampleArray as $key) {
            $tempArray = array();
            $i = 0;
            foreach ($key as $value) {
                if ($i < $count) {
                    $header = $headerData[$i];
                    /*
                     * Condition for Object
                     */
                    if (is_array($value) && ($value[0] instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata || $value[0] instanceof \Pimcore\Model\DataObject)) {
                        $tempArray[$header] = $value[0]->getFullPath();
                    } else if ($value instanceof \Carbon\Carbon) {
                        $timestamp = explode(" ", $value->date);
                        $tempArray[$header] = $timestamp[0];
                    } else {
                        $tempArray[$header] = $value;
                    }
                    $i++;
                }
            }
            array_push($gridJsonData, $tempArray);
        }

        // Converting grid data to XML
        $xml = new \DOMDocument();
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

        $this->jsonToXml($gridJsonData, $xml, $headerMetaData, $headerData);

        $outXML = $xml->saveXML();
        header('Content-Type: text/xml');
        die($outXML);
    }

    /*
     * @param Request request
     * @desc  Get each row data of grid
     */

    public function openXmlGridData($channelId, $headerMetaData) {
        //$channelId = $request->request->get('channelObjectId');
        //$headerMetaData = json_decode($request->request->get('headerMeta'));
        $channelObject = \Pimcore\Model\DataObject::getById($channelId);
        $distributionChannelId = $channelObject->getDistributionChannel();
        if ($distributionChannelId) {
            $distributionChannelObject = \Pimcore\Model\DataObject::getById($distributionChannelId);
            $products = $distributionChannelObject->getProducts();

            $productIdArray = array();
            foreach ($products as $key => $value) {
                $productIdArray[] = $value->getId();
            }
            if (count($productIdArray) > 1) {
                $productIds = implode(",", $productIdArray);
            } else {
                $productIds = $productIdArray[0];
            }
        }
        $productListing = new \Pimcore\Model\DataObject\Product\Listing();
        if (count($productIdArray) > 0) {
            $productListing->setCondition("oo_id IN (" . $productIds . ")");
            $productListing->load();
        }
        $productListing->load();

        $classColumns = array();

        foreach ($headerMetaData as $key => $value) {
            if ($value[0] != "IgnoreField") {
                if ($value[0] != "" && $value[0] != "id" && $value[0] != "filename") {
                    array_push($classColumns, $value[0]);
                }
            }
        }

        $gridAllData = array();
        foreach ($productListing as $data) {
            $tempArray = array();
            $tempArray[0] = $data->getO_Id();
            $tempArray[1] = $data->getO_Key();
            for ($j = 0; $j < count($classColumns); $j++) {
                $i = 2;
                foreach ($classColumns as $values) {
                    if (preg_match('/[~]/', $values) && $i <= 8) {
                        $brick = explode("~", $values);
                        $brickName = "get" . ucfirst($brick[1]);
                        $brickFieldName = "get" . ucfirst($brick[0]);
                        if ($data->getSpecification()->{$brickName}() != null) {
                            $column = $data->getSpecification()->{$brickName}()->{$brickFieldName}();
                            if ($column != null) {
                                $tempArray[$i++] = $column;
                            }
                        }
                    } else {
                        $column = "get" . ucfirst($values);
                        $tempArray[$i++] = $data->{$column}();
                    }
                }
            }
            $gridAllData[] = $tempArray;
        }

        return $gridAllData;
    }

    /*
     * Overridden function for \Pimcore\Model\Service
     */

    public static function gridObjectData($object, $fields = null, $requestedLanguage = null) {
        $localizedPermissionsResolved = false;

        $data = \Pimcore\Model\Element\Service::gridElementData($object);
        if ($object instanceof \Pimcore\Model\DataObject\Concrete) {
            $context = ['object' => $object];
            $data['classname'] = $object->getClassName();
            $data['idPath'] = \Pimcore\Model\Element\Service::getIdPath($object);
            $data['inheritedFields'] = [];

            $user = AdminTool::getCurrentUser();


            //TODO keep this for later!
            //            if (!$user->isAdmin()) {
            //                $permissionSet = $object->getPermissions(null, $user);
            //                $fieldPermissions = self::getFieldPermissions($object, $permissionSet);
            //            }

            if (empty($fields)) {
                $fields = array_keys($object->getclass()->getFieldDefinitions());
            }
            foreach ($fields as $key) {
                $brickType = null;
                $brickGetter = null;
                $dataKey = $key;
                $keyParts = explode('~', $key);

                $def = $object->getClass()->getFieldDefinition($key);

                if (substr($key, 0, 1) == '~') {
                    $type = $keyParts[1];
                    if ($type == 'classificationstore') {
                        $field = $keyParts[2];
                        $groupKeyId = explode('-', $keyParts[3]);

                        $groupId = $groupKeyId[0];
                        $keyid = $groupKeyId[1];
                        $getter = 'get' . ucfirst($field);
                        if (method_exists($object, $getter)) {
                            /** @var $classificationStoreData Classificationstore */
                            $classificationStoreData = $object->$getter();
                            $fielddata = $classificationStoreData->getLocalizedKeyValue($groupId, $keyid, $requestedLanguage, true, true);

                            $keyConfig = \Pimcore\Model\DataObject\Classificationstore\KeyConfig::getById($keyid);
                            $type = $keyConfig->getType();
                            $definition = json_decode($keyConfig->getDefinition());
                            $definition = \Pimcore\Model\DataObject\Classificationstore\Service::getFieldDefinitionFromJson($definition, $type);

                            if (method_exists($definition, 'getDataForGrid')) {
                                $fielddata = $definition->getDataForGrid($fielddata, $object);
                            }
                            $data[$key] = $fielddata;
                        }
                    }
                } elseif (count($keyParts) > 1) {
                    // brick
                    $classAttribute = $keyParts[0];
                    $brickKey = $keyParts[1];
                    $brickType = $keyParts[2];

                    // $key = \Pimcore\Model\DataObject\Service::getFieldForBrickType($object->getclass(), $brickType);
                    $key = $classAttribute;
                    $brickClass = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($brickType);

                    $context['outerFieldname'] = $key;
                    $def = $brickClass->getFieldDefinition($brickKey, $context);
                }

                if (!empty($key)) {

                    // some of the not editable field require a special response

                    $getter = 'get' . ucfirst($key);

                    $needLocalizedPermissions = false;

                    // if the definition is not set try to get the definition from localized fields
                    if (!$def) {
                        if ($locFields = $object->getClass()->getFieldDefinition('localizedfields')) {
                            $def = $locFields->getFieldDefinition($key, $context);
                            if ($def) {
                                $needLocalizedPermissions = true;
                            }
                        }
                    }

                    //relation type fields with remote owner do not have a getter
                    if (method_exists($object, $getter)) {

                        //system columns must not be inherited
                        if (in_array($key, \Pimcore\Model\DataObject\Concrete::$systemColumnNames)) {
                            $data[$dataKey] = $object->$getter();
                        } else {
                            $valueObject = self::getValueForObject($object, $key, $brickType, $brickKey, $def, $context, $requestedLanguage);

                            $data['inheritedFields'][$dataKey] = ['inherited' => $valueObject->objectid != $object->getId(), 'objectid' => $valueObject->objectid];

                            if (method_exists($def, 'getDataForGrid')) {
                                if ($brickKey) {
                                    $context['containerType'] = 'objectbrick';
                                    $context['containerKey'] = $brickType;
                                    $context['outerFieldname'] = $key;
                                }

                                $params = ['context' => $context, 'purpose' => 'gridview'];
                                $tempData = $def->getDataForGrid($valueObject->value, $object, $params);

                                if ($def instanceof Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields) {
                                    $needLocalizedPermissions = true;
                                    foreach ($tempData as $tempKey => $tempValue) {
                                        $data[$tempKey] = $tempValue;
                                    }
                                } else if (($def->getFieldType() == "select" ) && $def->getOptionsProviderClass() != "" && $def->getOptionsProviderClass() != null) {
                                    if ($tempData["value"] != null) {
                                        $data[$dataKey] = $tempData["value"];
                                    } else {
                                        $data[$dataKey] = '';
                                    }
                                } else if ($def->getFieldType() == "multiselect" && $def->getOptionsProviderClass() != "" && $def->getOptionsProviderClass() != null) {
                                    $data[$dataKey] = $tempData;
                                } else {
                                    $data[$dataKey] = $tempData;
                                }
                            } else {
                                if ($valueObject->value == null) {
                                    $data[$dataKey] = "";
                                } else {
                                    $data[$dataKey] = $valueObject->value;
                                }
                            }
                        }
                    }

                    if ($needLocalizedPermissions) {
                        if (!$user->isAdmin()) {
                            $locale = \Pimcore::getContainer()->get('pimcore.locale')->findLocale();

                            $permissionTypes = ['View', 'Edit'];
                            foreach ($permissionTypes as $permissionType) {
                                //TODO, this needs refactoring! Ideally, call it only once!
                                $languagesAllowed = \Pimcore\Model\DataObject\Service::getLanguagePermissions($object, $user, 'l' . $permissionType);

                                if ($languagesAllowed) {
                                    $languagesAllowed = array_keys($languagesAllowed);

                                    if (!in_array($locale, $languagesAllowed)) {
                                        $data['metadata']['permission'][$key]['no' . $permissionType] = 1;
                                        if ($permissionType == 'View') {
                                            $data[$key] = null;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $data;
    }

    /*
     * Overridden function for \Pimcore\Model\Service
     */

    private static function getValueForObject($object, $key, $brickType = null, $brickKey = null, $fieldDefinition = null, $context = [], $requestedLanguage = null) {

        $getter = 'get' . ucfirst($key);
        $value = $object->$getter($requestedLanguage);

        if (!empty($value) && !empty($brickType)) {
            $getBrickType = 'get' . ucfirst($brickType);
            $value = $value->$getBrickType();
            if (!empty($value) && !empty($brickKey)) {
                $brickGetter = 'get' . ucfirst($brickKey);
                $value = $value->$brickGetter();
            }
        }
        if (!$fieldDefinition) {
            $fieldDefinition = $object->getClass()->getFieldDefinition($key, $context);
        }

        if (!empty($brickType) && !empty($brickKey)) {
            $brickClass = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($brickType);
            $context = ['object' => $object, 'outerFieldname' => $key];
            $fieldDefinition = $brickClass->getFieldDefinition($brickKey, $context);
        }

        if ($fieldDefinition->isEmpty($value)) {
            $parent = \Pimcore\Model\DataObject\Service::hasInheritableParentObject($object);
            if (!empty($parent)) {
                return self::getValueForObject($parent, $key, $brickType, $brickKey, $fieldDefinition, $context, $requestedLanguage);
            }
        }

        $result = new \stdClass();
        $result->value = $value;
        $result->objectid = $object->getId();

        return $result;
    }

    /**
     * @Route("/channel/get-available-retailers")
     */
    public function getAvailableRetailersAction() {


        $objectClass = "Retailer";
        $className = '\\Pimcore\\Model\\DataObject\\' . ucfirst($objectClass);
        $retailerClassExists = \Pimcore\Tool::classExists($className);


        if ($retailerClassExists) {
            $availableReatilers = array();
            $retailerListing = new \Pimcore\Model\DataObject\Retailer\Listing();
            $retailerListing->Load();
            $retailers = $retailerListing->getObjects();
            $availableReatilers[] = array('name' => "(Empty)", 'value' => "");

            if (is_array($retailers) && count($retailers) > 0) {
                foreach ($retailers as $retailer) {
                    $availableReatilers[] = array('name' => $retailer->getName(), 'value' => $retailer->getId());
                }
            }
        }
        return $this->json(["retailers" => $availableReatilers]);
    }

    /**
     * @Route("/channel/get-available-download-types")
     */
    public function getAvailableDownloadTypesAction() {

        $class = DataObject\ClassDefinition::getByName("channel");
        $fieldDefinition = $class->getFieldDefinition("downloadOptions");
        $options = $fieldDefinition->getOptions();

        if (is_array($options) && count($options) > 0) {
            foreach ($options as $option) {
                $result[] = array(
                    'name' => $option["key"],
                    'value' => $option["value"]
                );
            }
        }
        return $this->json(["downloadTypes" => $result]);
    }

    /**
     * @Route("/channel/get-allowed-download-types")
     */
    public function getAllowedDownloadTypesAction(Request $request) {
        $options = array();
        $channelID = $request->request->get("channelId");
        $channel = DataObject\Channel::getById($channelID);
        if ($channel instanceof DataObject\Channel) {
            $options = $channel->getDownloadOptions();
            return $this->json(["success" => true, "options" => $options]);
        }
        return $this->json(["success" => false, "options" => $options]);
    }

    /**
     * @Route("/channel/get-all-predefined-asset-metadata")
     */
    public function getAllPredefinedAssetMetadata() {
        $type = "asset";
        $list = Metadata\Predefined\Listing::getByTargetType($type, [$subType]);
        $result = [];
        foreach ($list as $item) {
            /** @var $item Metadata\Predefined */
            $item->expand();
            if ($item instanceof \Pimcore\Model\Metadata\Predefined) {
                if (!($item->getLanguage() == "" || $item->getLanguage() == null)) {
                    $name = $item->getName() . " (" . $item->getLanguage() . ")";
                } else {
                    $name = $item->getName();
                }
                $result[] = array(
                    'name' => $name,
                    'value' => $item->getId()
                );
            }
        }
        return $this->adminJson(['metadata' => $result, 'success' => true]);
    }

    /**
     * @Route("/channel/download-assets")
     * @param Request $request
     * @throws Exception
     */
    public function downloadAssetsAction(Request $request) {
        $channelID = $request->request->get("channelObjectId");
        $mappingObjectId = $request->request->get('mappingObjectId');
        $headerData = json_decode($request->request->get('headerData'));
        $headerMetaData = json_decode($request->request->get('headerMeta'));
        $classUsed = $request->request->get('classnameUsed');

        $channelObject = \Pimcore\Model\DataObject\Channel::getById($channelID);

        $thumbnailNames = $channelObject->getThumbnail();


        if ($thumbnailNames == null) {

            $thumbnailNameObject = \Pimcore\Model\WebsiteSetting::getByName('defaultThumbnailName');
            $thumbnailNames = array($thumbnailNameObject->getData());

            /*
              return $this->json(
              [
              "success" => false,
              'noTransformation' => true,
              'msg' => "No transformation found for generating images"
              ]);
              //throw new \Exception("No transformation found for generating images");
             */
        }

        $this->mappingObjectId = $mappingObjectId;

        $gridAllData = $this->getGridData($request);

        unset($headerData[0]); // remove ID
        unset($headerData[1]); // remove filename
        unset($headerData[2]); // remove ID
        unset($headerData[3]); // remove filename
        unset($headerData[4]); // remove ID


        $collections = $this->getCollectionDefinition($mappingObjectId);
        if (is_array($$collections) && count($collections)) {
            foreach ($collections as $collection) {
                $headerData[] = $collection['csvColumnName'];
            }
        }

        try {


            $files = $this->createAssetFiles($channelID, $classUsed, $headerMetaData, $gridAllData, $collections, $headerData, $thumbnailNames);

            if (count($files['zipImages']) == 0) {
                return $this->json([
                            "success" => false,
                ]);
            }

            $zip = $this->createZip($files["zipImages"], PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $files["csv"]);

            if (file_exists(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $files["csv"])) {
                unlink(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $files["csv"]);
            }

            try {
                $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
                $downloadData = array();
                $downloadData[] = $currentUser->getName();
                $downloadData [] = date("d-m-Y h:i:sa");
                $downloadData [] = "Assets";
                $channelObject->getDownloadStatistics();
                $DownloadStatistics = $channelObject->getDownloadStatistics();
                if (!is_array($DownloadStatistics)) {
                    $DownloadStatistics = array();
                }
                $DownloadStatistics[] = $downloadData;
                $channelObject->setDownloadStatistics($DownloadStatistics);
                $channelObject->save();
            } catch (Exception $ex) {
                
            }

            return $this->json(
                            [
                                "success" => true,
                                'zip' => $zip
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @Route("/channel/create-asset-files")
     * @param Request $request
     * @throws Exception
     */
    public function createAssetFiles($channelID = null, $classUsed = null, $headerMeta = null, $rowData, $collections, $headerData, $thumbnailNames = null, $mappingId = null) {

        if ($mappingId != null) {
            $this->mappingObjectId = $mappingId;
        }

        $object = \Pimcore\Model\DataObject::getById($this->mappingObjectId);
        $object->setGetInheritedValues(true);
        $headerColData = unserialize($object->getHeaderData());

        $sourceHeaders = $this->getSourceColumns();

        $channel = DataObject\Channel::getById($channelID);


//        if (is_array($thumbnailNames) && count($thumbnailNames) == 0) {
//            throw new \Exception("No transformation found for generating images");
//        }

        $class = "\\Pimcore\\Model\\DataObject\\" . ucfirst($classUsed);
        $fields = array();
        $classDefinition = DataObject\ClassDefinition::getByName($classUsed);
        $fieldDefintions = $classDefinition->getFieldDefinitions();

        $headerColumns = array();
        $headerColumns [] = "ProductId";

        $nameDefinition = $classDefinition->getFieldDefinition("name");
        if ($nameDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data) {
            $headerColumns [] = "ProductName";
            $nameDefinition = true;
        } else {
            $nameDefinition = false;
        }

        $headerColumns [] = "AssetType";
        $headerColumns [] = "AssetSubType";

        $metaColumns = array();

        if (is_array($thumbnailNames)) {
            foreach ($thumbnailNames as $key => $value) {
                $headerColumns [] = $value;
            }
        }

        if ($channel instanceof DataObject\Channel) {
            $assetMetadata = $channel->getAssetMetadata();
            if (is_array($assetMetadata) && count($assetMetadata) > 0) {
                foreach ($assetMetadata as $metadata) {
                    $data = Metadata\Predefined::getById($metadata);
                    if ($data instanceof Metadata\Predefined) {
                        $headerColumns [] = $data->getName();
                        $metaColumns [] = $data->getName();
                    }
                }
            }
        }

        if (is_array($fieldDefintions)) {
            foreach ($fieldDefintions as $fieldDefintion) {
                if ($fieldDefintion->getFieldtype() == 'image' || $fieldDefintion->getFieldtype() == 'externalImage') {
                    $fields['images'][] = $fieldDefintion->getName();
                } else if ($fieldDefintion->getFieldtype() == 'localizedfields') {
                    $fields['localizedfields'][] = $fieldDefintion;
                } else if ($fieldDefintion->getFieldtype() == 'objectbricks') {
                    $fields['objectbricks'][] = $fieldDefintion;
                } else if ($fieldDefintion->getFieldtype() == 'fieldcollections') {
                    $fields['fieldcollections'][] = $fieldDefintion;
                }
            }
        }


        $filename = "manifest" . time() . ".csv";
        $file = fopen(PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $filename, 'w');
        fputcsv($file, $headerColumns);

        $imageArray = array();
        if (is_array($rowData)) {
            foreach ($rowData as $row) {
                $newRow = [];
                $object = $class::getById($row[0], true);
                if ($object instanceof DataObject) {
                    $object->setGetInheritedValues(TRUE);
                    if (is_array($fields['images']) && count($fields['images']) > 0) {
                        foreach ($fields['images'] as $imageAttribute) {
                            $getter = "get" . ucfirst($imageAttribute);
                            if (method_exists($object, $getter)) {
                                $image = $object->$getter();

                                if ($image instanceof Model\Asset\Image /*|| $image instanceof Model\DataObject\Data\ExternalImage*/) {
                                    $imageresult = $this->createImageData($object, $nameDefinition, $image, $metaColumns, $thumbnailNames, "Primary Image");

                                    if (is_array($imageresult) && array_key_exists("temp", $imageresult) && $imageresult["temp"]) {
                                        $imageTemp = $imageresult["temp"];
                                        foreach ($imageTemp as $key => $temp) {
                                            array_push($imageArray, $temp);
                                            fputcsv($file, $imageresult["newRow"]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if (is_array($fields['localizedfields']) && count($fields['localizedfields']) > 0) {
                        foreach ($fields['localizedfields'] as $localisedFieldsArray) {
                            $localisedFields = $localisedFieldsArray->getChildren();
                            foreach ($localisedFields as $imageAttribute) {
                                $getter = "get" . ucfirst($imageAttribute->getName());
                                if (method_exists($object, $getter)) {
                                    $image = $object->$getter($language);
//                               $image = $object->$getter()->getThumbnail("myThumbnailName");

                                    if ($image instanceof Model\Asset\Image || $image instanceof Model\DataObject\Data\ExternalImage) {
//                                    $expired = false;
//                                    $assetMetaData = DataObject\AssetMetaData::getByAssetId($image->getId(), 1);
//                                    if ($assetMetaData instanceof DataObject\AssetMetaData) {
//                                        $expiryDate = $assetMetaData->getAssetExpiryDate();
//                                        if ($expiryDate instanceof \Carbon\Carbon) {
//                                            $today = Carbon::today();
//                                            if (($expiryDate->lessThanOrEqualTo($today))) {
//                                                $expired = true;
//                                            }
//                                        }
//                                    }
//                                    if (!$expired) {
                                        $imageresult = $this->createImageData($object, $nameDefinition, $image, $metaColumns, $thumbnailNames, "Primary Image");

                                        if (is_array($imageresult) && array_key_exists("temp", $imageresult) && $imageresult["temp"]) {
                                            $imageTemp = $imageresult["temp"];
                                            foreach ($imageTemp as $key => $temp) {
                                                array_push($imageArray, $temp);
                                                fputcsv($file, $imageresult["newRow"]);
                                            }
                                        }

//                                    }
                                    }
                                }
                            }
                        }
                    }
//                if (is_array($fields['objectbricks']) && count($fields['objectbricks']) > 0) {
//
//                }
                    if (is_array($fields['fieldcollections']) && count($fields['fieldcollections']) > 0) {

                        foreach ($fields['fieldcollections'] as $fieldcollections) {
                            $fieldCollectionName = $fieldcollections->getName();
                            $fielCollectionGetter = "get" . ucfirst($fieldCollectionName);
                            $collectionData = $object->$fielCollectionGetter();

                            if ($collectionData instanceof \Pimcore\Model\DataObject\Fieldcollection) {

                                $allowedTypes = $fieldcollections->getAllowedTypes();
                                if (is_array($allowedTypes)) {
                                    foreach ($allowedTypes as $allowedType) {
                                        $collection = \Pimcore\Model\DataObject\Fieldcollection\Definition::getByKey($allowedType);
                                        if ($collection instanceof \Pimcore\Model\DataObject\Fieldcollection\Definition) {
                                            $collectionDefinitions = $collection->getFieldDefinitions();


                                            if (is_array($collectionDefinitions) && count($collectionDefinitions) > 0) {
                                                foreach ($collectionDefinitions as $collectionDefinition) {
                                                    if ($collectionDefinition->getFieldtype() == "image") {
                                                        $collectionattributeName = $collectionDefinition->getName();
                                                        $fielCollectionGetter = "get" . ucfirst($fieldCollectionName);
                                                        $collectionData = ($object->$fielCollectionGetter());
                                                        $items = $collectionData->getItems();
                                                        if (is_array($items)) {
                                                            foreach ($items as $item) {

                                                                if ($item->getType() == $allowedType) {
                                                                    $get = "get" . $collectionattributeName;
                                                                    $mainItem = $item->$get();
                                                                    if ($mainItem instanceof \Pimcore\Model\Asset\Image || $mainItem instanceof Model\DataObject\Data\ExternalImage) {
                                                                        $imageresult = $this->createImageData($object, $nameDefinition, $mainItem, $metaColumns, $thumbnailNames, "Alternate Image");
                                                                        if (is_array($imageresult) && array_key_exists("temp", $imageresult) && $imageresult["temp"]) {
                                                                            $imageTemp = $imageresult["temp"];
                                                                            foreach ($imageTemp as $key => $temp) {
                                                                                array_push($imageArray, $temp);
                                                                                fputcsv($file, $imageresult["newRow"]);
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        fclose($file);
        $result = array();
        $result["zipImages"] = $imageArray;
        $result["csv"] = $filename;

        return $result;
    }

    /**
     * @Route("/channel/write-in-image-csv")
     * @param Request $request
     * @throws Exception
     */
    public function createImageData($object, $nameDefinition, $image, $metaColumns, $thumbnailNames, $subtype) {

        $newRow = array();
        $newRow [] = $object->getId();
        if ($nameDefinition) {
            $newRow[] = $object->getName();
        }
        $newRow[] = "Image";
        $newRow[] = $subtype;
        $temp = array();

        /*
         * External Image Check
         */
        if (method_exists($image, "getUrl")) {

            $typeString = null;
            if ($image->getUrl()) {
                $imageUrl = str_replace("https", "http", $image->getUrl());

                $typeInt = exif_imagetype($imageUrl);
                switch ($typeInt) {
                    case 1:
                        $fileExt = 'gif';
                        break;
                    case 2:
                        $fileExt = 'jpg';
                        break;
                    case 4:
                        $fileExt = 'png';
                        break;
                    case 8:
                        $fileExt = 'wbmp';
                        break;
                    case 16:
                        $fileExt = 'xpm';
                        break;
                    default:
                        $fileExt = '';
                }

                $fileName = basename($image->getUrl(), "." . $fileExt);

                if (is_array($thumbnailNames)) {
                    foreach ($thumbnailNames as $key => $thumbnailName) {
                        $newRow[] = $fileName . '_' . $thumbnailName . "." . $fileExt;
                    }

                    foreach ($thumbnailNames as $key => $thumbnailName) {
                        if ($thumbnailName != "") {
                            $temp[$key]['filename'] = $fileName . '_' . $thumbnailName . "." . $fileExt;
                            $temp[$key]['path'] = $imageUrl;
                        } else {
                            $temp[$key]['path'] = $imageUrl;
                        }
                    }
                } else {
                    $temp[$key]['path'] = $imageUrl;
                }
            }
        } else {

            $websiteUrl = \Pimcore\Tool::getHostUrl();
            $fileExt = pathinfo($image->getFilename(), PATHINFO_EXTENSION);
            $fileName = basename($image->getFilename(), "." . $fileExt);
            if (is_array($thumbnailNames)) {
                foreach ($thumbnailNames as $key => $thumbnailName) {
//                $newRow[] = $fileName . '_' . $thumbnailName . "." . $fileExt;
                    $newRow[] = $websiteUrl . $image->getThumbnail("$thumbnailName", false)->getPath();
                }
            }


            if (is_array($metaColumns) && count($metaColumns) > 0) {
                foreach ($metaColumns as $metaColumn) {
                    $newRow[] = $image->getMetadata($metaColumn);
                }
            }
            if (is_array($thumbnailNames)) {

                foreach ($thumbnailNames as $key => $thumbnailName) {
                    if ($thumbnailName != "") {
                        $temp[$key]['filename'] = $fileName . '_' . $thumbnailName . "." . $fileExt;
                        $temp[$key]['path'] = PIMCORE_PROJECT_ROOT . "/web/var/tmp/image-thumbnails" . $image->getThumbnail($thumbnailName, false)->getPath();
                        $temp[$key]['path'] = urldecode($temp[$key]['path']);
                    } else {
                        $temp[$key]['path'] = PIMCORE_PROJECT_ROOT . "/web/var/assets" . $image->getPath() . $image->getFilename();
                    }
                }
            }
        }

        return ([
            "temp" => $temp,
            "newRow" => $newRow,
        ]);
    }

    /**
     * @Route("/channel/get-available-thumbnails")
     * @param Request $request
     */
    public function getAvailableThumbnailsAction(Request $request) {


//        $objectClass = "Retailer";
//        $className = '\\Pimcore\\Model\\DataObject\\' . ucfirst($objectClass);
//        $retailerClassExists = \Pimcore\Tool::classExists($className);
//
//        if ($retailerClassExists) {
//            $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName($objectClass);
//            $retailerDefinition = $classDef->getFieldDefinition("retailer");
//
//            if ($retailerDefinition instanceof DataObject\ClassDefinition\Data) {
//                $retailerClassExists = true;
//            } else {
//                $retailerClassExists = false;
//            }
//        }
//
//        if ($retailerClassExists) {
//            $retailerId = $request->query->get('retailerId');
//            $retailer = DataObject\Retailer::getById($retailerId);
//            if ($retailer) {
//                $retailThumbnails = $retailer->getThumbnail();
//            }
//        }

        $availableThumbnails = array();

        $list = new \Pimcore\Model\Asset\Image\Thumbnail\Config\Listing();
        $list->load();
        $thumbnaillist = $list->getThumbnails();
        if (is_array($thumbnaillist)) {
            foreach ($thumbnaillist as $thumbnail) {
                if ($thumbnail instanceof \Pimcore\Model\Asset\Image\Thumbnail\Config) {
//                if (isset($retailThumbnails) && !in_array($thumbnail->getName(), $retailThumbnails)) {
//                    continue;
//                }

                    $availableThumbnails[] = array(
                        'name' => $thumbnail->getName(),
                        'id' => $thumbnail->getName()
                    );
                }
            }
        }

        return $this->json(["thumbnails" => $availableThumbnails]);
    }

    /**
     * @Route("/channel/get-download-stats")
     * @param Request $request
     */
    public function getDownloadStatsAction(Request $request) {
        $channelID = $request->get("channelId");
        $noOfStats = 0;
        $start = $request->get("start");
        if (!$start) {
            $start = 0;
        }

        $limit = $request->get("limit");
        if (!$limit) {
            $limit = 25;
        }

        $downloadStats = array();
        $success = false;

        if ($channelID) {
            $channel = DataObject\Channel::getById($channelID);
            if ($channel instanceof DataObject\Channel) {
                $channelDownloadStats = $channel->getDownloadStatistics();
                if (is_array($channelDownloadStats)) {
                    $success = true;
                    $channelDownloadStats = array_reverse($channelDownloadStats);
                    if ($limit >= count($channelDownloadStats)) {
                        $end = count($channelDownloadStats);
                    } else {
                        $end = $start + $limit;
                    }

//                    $filterJson = $request->get("filter");
//                    if ($filterJson) {
//                        $filters = json_decode($filterJson, true);
//                        foreach ($filters as $filter) {
//                            if ($filter["property"] == "downloadby") {
//                                $allowedDownloadBy = $filter ["value"];
//                            }
//
//                            if ($filter["property"] == "downloadtype") {
//                                $allowedDownloadType = $filter ["value"];
//                            }
//                        }
//                    }
                    for ($i = $start; $i < $end; $i ++) {
                        if ($i >= count($channelDownloadStats)) {
                            break;
                        }
//                        $allowed = true;
//                        if ($filterJson) {
//                            if (is_array($allowedDownloadBy) && $allowed) {
//                                if (!(in_array($channelDownloadStats [$i] [0], $allowedDownloadBy))) {
//                                    $allowed = false;
//                                }
//                            }
//
//                            if (is_array($allowedDownloadType) && $allowed) {
//                                if (!(in_array($channelDownloadStats [$i] [2], $allowedDownloadType))) {
//                                    $allowed = false;
//                                }
//                            }
//                        }
//                        if ($allowed) {
                        $downloadStats [] = array(
                            "downloadby" => $channelDownloadStats [$i] [0],
                            "downloaddate" => $channelDownloadStats [$i] [1],
                            "downloadtype" => $channelDownloadStats [$i] [2]
                        );
//                        }
                    }
                    $noOfStats = count($channelDownloadStats);
                }
            }
        }

        return $this->adminJson(["data" => $downloadStats, "success" => $success, "total" => $noOfStats]);
    }

}
