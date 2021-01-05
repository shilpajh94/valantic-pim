<?php

namespace DistributionHubBundle\Controller;

use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\ChannelConfigShare;
use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use Pimcore\Model\Element;
use Pimcore\Model\DataObject;
use DistributionHubBundle\Services;
use Exception;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Pimcore\Tool\Admin;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Pimcore\Tool;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use DistributionHubBundle\Lib\DHubLogger;

/**
 * @package DistributionHubBundle\Controller
 * @Route("/admin/distributionhub/channel")
 */
class ChannelController extends AdminController
{
    public const CONFIG_NAME = 'plugin_distribution_hub';
    protected const SUCCESS = 'success';
    protected const ERROR = 'error';
    protected const LIMIT = 'limit';
    protected const CLASS_NAME = 'Channel';
    protected const MESSAGE = 'message';

    /**
     * mapping listing
     * @Route("/tree")
     * @param Request $request
     * @return JsonResponse
     */
    public function listAction(Request $request)
    {
        $mappings = [];
        $user = Admin::getCurrentUser();
        $userOwner = (int) $user->getId();
        $params = array_merge($request->request->all(), $request->query->all());
        $filter = $params['filter'] ?? '';
        $shared = $params['type'] ?? '';
        $start = $params['start'] ?? 0;
        $fromPaging = $params['fromPaging'] ?? 0;
        $limit = $params[self::LIMIT] ?? 0;
        $obj = new Channel\Listing();
        $userIds = [$userOwner];
        $userIds = array_merge($userIds, $user->getRoles());
        $userIds = implode(',', $userIds);
        if (!empty($shared)) {
            $sharedObj = new ChannelConfigShare\Listing();
            $sharedObj->setCondition("sharedWithUserId IN (".$userIds.")");
            $sharedChannel = array_column($sharedObj->load(), 'channelId');
            $sharedChannel = (count($sharedChannel)>0)?"id IN (".implode(',', $sharedChannel).")":"id IN ('')";
            if (!empty($filter)) {
                $obj->setCondition("( $sharedChannel OR shareGlobally = 1) AND (expiryDate=0 OR expiryDate=null OR expiryDate > CURRENT_DATE()) AND name LIKE ? ", ["%$filter%"]);
            } else {
                $obj->setCondition("$sharedChannel OR shareGlobally = ? AND (expiryDate=0 OR expiryDate=null OR expiryDate > CURRENT_DATE())", [1]);
            }
        } else {
            if (!empty($filter)) {
                $obj->setCondition("userOwner = ? AND name LIKE ? ", [$userOwner, "%$filter%"]);
            } else {
                $obj->setCondition("userOwner = ? ", [$userOwner]);
            }
        }
        $total = count($obj->load());
        $obj->setOffset($request->get('start', $start));
        $obj->setLimit($request->get(self::LIMIT, $limit));
        $channel = $obj->load();
        foreach ($channel as $row) {
            $mappings[] = $this->buildItem($row);
        }
        return $this->json(['nodes' => $mappings, 'total' => (int)$total, 'filter' => $filter, self::LIMIT => (int)$limit, 'inSearch' => (int)(!empty($filter)), 'offset' => (int)$start, 'overflow' => false, 'fromPaging' => (int)$fromPaging]);
    }

    /**
     * @param Channel $channel
     *
     * @return array
     */
    private function buildItem($channel): array
    {

        $bundleService = $this->get(Services\BundleService::class);
        $defaultAssetFolderPathForExportedFiles = $bundleService->getDefaultAssetFolderPathForExportedFiles();

        $savedExportFilePath = $channel->getExportFilePath();
        if ($savedExportFilePath == $defaultAssetFolderPathForExportedFiles) {
            $savedExportFilePath = null;
        }

        $defaultMappingFileCSVDelimiter = $bundleService->getConfig('default_mapping_file_csv_delimiter');
        $defaultExportFileCSVDelimiter = $bundleService->getConfig('default_export_file_csv_delimiter');
        $scheduleScreenRefreshTime = $bundleService->getConfig('schedule_screen_refresh_time');

        $userIds = ChannelConfigShare::getUserByChannelId($channel->getId());
        $expiryDate = ($channel->getExpiryDate())?$channel->getExpiryDate()->format('m/d/y'):"";
        return [
            'id' => $channel->getId(),
            'text' => $channel->getName(),
            'key' => $channel->getName(),
            'language' => $channel->getLanguage(),
            'type' => 'channel',
            'allowChildren' => false,
            'iconCls' => 'pimcore_icon_routes',
            'expandable' => false,
            'parent_id'=>1,
            'leaf' => true,
            'elementType' => 'channel',
            'qtipCfg' => [
                'title' => 'ID: ' . $channel->getId()
            ],
            'qtip'=> 'ID: ' . $channel->getId(),
            'pimcoreClassId' => $channel->getPimcoreClassId(),
            'headerMappingFileAssetId' => $channel->getHeaderMappingFileAssetId(),
            'headerMappingFileType' => $channel->getHeaderMappingFileType(),
            'sheetNumberInMappingFile' => $channel->getSheetNumberInMappingFile(),
            'headerRowNumberInMappingFile' => $channel->getHeaderRowNumberInMappingFile(),
            'mappingFileCsvDelimiter' => $channel->getMappingFileCSVDelimiter(),
            'exportFilePath' => $savedExportFilePath,
            'description' => $channel->getDescription(),
            'shareGlobally' => $channel->getShareGlobally(),
            'sharedUserIds' => $userIds,
            'sharedRolesIds' => $userIds,
            'expiryDate' => $expiryDate,
            'exportFileCSVDelimiter' => $channel->getExportFileCSVDelimiter(),
            'defaultMappingFileCSVDelimiter' => $defaultMappingFileCSVDelimiter,
            'defaultExportFileCSVDelimiter' => $defaultExportFileCSVDelimiter,
            'scheduleScreenRefreshTime' => $scheduleScreenRefreshTime
        ];
    }

    /**
     * @Route("/get")
     * @param Request $request
     * @return JsonResponse
     */
    public function getAction(Request $request)
    {
        $data = [];
        try {
            $object = Channel::getById($request->get('id'));

            $basicConfigService = $this->get(Services\BasicConfigService::class);

            $data[] = $this->buildItem($object);
            $data['lang'] = !empty($object->getLanguage()) ? $object->getLanguage() : Admin::getCurrentUser()->getLanguage();
            $data['columnAttributeMapping'] = json_decode(json_encode($object->getColumnAttributeMapping()), true);
            $data['showInGridMapping'] = json_decode($object->getShowInGridMapping(), true);
            $data['extraConfigs'] = $basicConfigService->getExtraConfigForBasicTab($object);
        } catch (Exception $e) {
            $msg = $e->getMessage();
            return $this->json(['result' => false, 'data' => [], "msg" => $msg]);
        }
        return $this->json(['result' => true, 'general' => ['o_id' => $object->getId(), 'o_key' => $object->getName()], 'data' => $data, "msg" => '']);
    }

    /**
     * add mapping
     * @Route("/add")
     * @param Request $request
     * @return JsonResponse
     */
    public function addAction(Request $request)
    {
        $this->checkPermission(self::CONFIG_NAME);
        try {
            $name = $request->get('name');
            $object = Channel::getByName(trim($name));
            if (!$object instanceof Channel) {
                $newObject = new Channel();
                $newObject->setName($name);
                $mappingAttributes = $this->encodeJson(Services\ChannelService::getMappingInfo([]));
                $newObject->setLanguage(Admin::getCurrentUser()->getLanguage());
                $newObject->setColumnAttributeMapping($mappingAttributes);
                $userOwner = (int)Admin::getCurrentUser()->getId();
                $newObject->setUserOwner($userOwner);
                $newObject->save();
                return $this->json([self::SUCCESS => true, "id" => $newObject->getId(), 'message' => '']);
            } else {
                $message = 'prevented creating object because object with same path+key already exists';
                return $this->json([self::SUCCESS => false, self::MESSAGE => $message, 'id' => $object->getId()]);
            }
        } catch (Exception $ex) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $ex->getMessage()]);
        }
    }

    /**
     * delete mapping
     * @Route("/delete")
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction(Request $request)
    {
        $this->checkPermission(self::CONFIG_NAME);
        try {
            $id = intval($request->query->get('id'));
            $object = Channel::getById($id);
            $object->delete();
            return $this->json([self::SUCCESS => true]);
        } catch (Exception $ex) {
            return $this->json([self::SUCCESS => false]);
        }
    }

    /**
     * rename mapping
     * @Route("/rename")
     * @param Request $request
     * @return JsonResponse
     */
    public function renameAction(Request $request)
    {
        $this->checkPermission(self::CONFIG_NAME);
        try {
            $id = intval($request->query->get('id'));
            $name = trim($request->query->get('name'));
            $object = Channel::getByName(trim($name));
            if (!$object instanceof Channel) {
                $object = Channel::getById($id);
                $object->setName($name);
                $object->save();
                return $this->json([self::SUCCESS => true, "id" => $object->getId(), self::MESSAGE => '']);
            } else {
                $message = 'prevented renaming object because object with same path+key already exists';
                return $this->json([self::SUCCESS => false, self::MESSAGE => $message, 'id' => $object->getId(),]);
            }
        } catch (Exception $ex) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $ex->getMessage()]);
        }
    }

    /**
     * @Route("/clone")
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Exception
     *
     */
    public function cloneAction(Request $request)
    {
        try {
            $id = intval($request->get('id'));
            $name = trim($request->get('name'));
            $channel  = Channel::getById($id);
            $filter =  $channel->getFilter();
            if ($filter) {
                $filter->setId(null);
                $filter->save();
            }

            if ($channel instanceof Channel) {
                $newObject = new Channel();
                $newObject->setName(Services\ChannelService::getUniqueCopyName(self::CLASS_NAME, $name, 'object'));
                $userOwner = (int)Admin::getCurrentUser()->getId();
                $newObject->setColumnAttributeMapping($channel->getColumnAttributeMapping());
                $newObject->setExportFilePath($channel->getExportFilePath());
                $newObject->setHeaderMappingFileAssetId($channel->getHeaderMappingFileAssetId());
                $newObject->setHeaderMappingFileType($channel->getHeaderMappingFileType());
                $newObject->setHeaderRowNumberInMappingFile($channel->getHeaderRowNumberInMappingFile());
                $newObject->setMappingFileCSVDelimiter($channel->getMappingFileCSVDelimiter());
                $newObject->setPimcoreClassId($channel->getPimcoreClassId());
                $newObject->setLanguage($channel->getLanguage());
                $newObject->setExportFileCSVDelimiter($channel->getExportFileCSVDelimiter());
                $newObject->setShowInGridMapping($channel->getShowInGridMapping());
                $newObject->setSheetNumberInMappingFile($channel->getSheetNumberInMappingFile());
                $newObject->setUserOwner($userOwner);
                if ($filter) {
                    $newObject->setFilter($filter);
                }
                $newObject->setColumnAttributeMapping($channel->getColumnAttributeMapping());
                $newObject->save();
                return $this->json([self::SUCCESS => true, "id" => $newObject->getId(), self::MESSAGE => '']);
            } else {
                return $this->createNotFoundException('Channel configuration not found');
            }
        } catch (Exception $e) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $e->getMessage()]);
        }
    }

    /**
     * @Route("/getGroupKeys")
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return JsonResponse
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getGroupKeysAction(Request $request, TranslatorInterface $translator)
    {
        $params = array_merge($request->request->all(), $request->query->all());
        $filter = $params['filter'] ?? '';
        $start = $params['start'] ?? 0;
        $fromPaging = $params['fromPaging'] ?? 0;
        $limit = $params['limit'] ?? 0;
        $storeId = $params['storeId'] ?? 0;
        $editor = $params['editor'] ?? 0;
        $name = $params['name'] ?? '';
        $classificationStoreService = $this->get(Services\ClassificationStoreService::class);
        $result = $classificationStoreService->getGroupKeys($filter, $start, $limit, $storeId, $name, $editor, $translator);
        return $this->json(['nodes' => $result['key'], 'total' => (int) $result['count'], 'filter' => $filter, 'limit' => (int) $limit, 'inSearch' => (int) (!empty($filter)), 'offset' => (int) $start, 'overflow' => false, 'fromPaging' => (int) $fromPaging]);
    }

    /**
     * Get sheet header columns
     * @Route("/column-header-import")
     * @param Request $request
     * @return string|JsonResponse
     */
    public function columnHeaderImportAction(Request $request)
    {
        $channelId = intval($request->get('id'));
        $rowsColumns = array();
        $success = false;
        $config = [];
        try {
            $rowsColumns = Services\ChannelService::getSheetColumns($channelId);
        } catch (\Exception $e) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $e->getMessage()]);
        }
        $success = ((isset($rowsColumns['col']) && count($rowsColumns['col']) > 0));
        $msg = (isset($rowsColumns['col']) && count($rowsColumns['col']) > 0) ? $success : "dHub_invalid_header_row_no";
        return $this->json([self::SUCCESS => $success, 'rowColumns' => $rowsColumns['col'], "config" => $rowsColumns['config'], self::MESSAGE => $msg]);
    }

    /**
     * @Route("/mapping/save", methods={"post"})
     * @param Request $request
     * @return JsonResponse
     */
    public function saveMapping(Request $request)
    {
        $objectId = (int) $request->get('objectId');
        
        try {
            $data = $request->request->all();
            $data['mapping'] = json_encode(Services\ChannelService::gridConfigToPimConfig($data));
            $data['mappingJson'] = json_encode(Services\ChannelService::filterAttributeMappingConfig($data['mappingJson']));

            $data['showInGrid'] = json_encode(\DistributionHubBundle\Services\FilterService::getShowInGridMapping($data));

            Services\ChannelService::updateChannelMapping($data, $objectId);
            return $this->json([self::SUCCESS => true, self::MESSAGE => "Mapping Save successfully"]);
        } catch (\Exception $e) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $e->getMessage()]);
        }
    }

    /**
     * @Route("/get-available-languages")
     * @return JsonResponse
     */
    public function getAvailableLanguagesAction()
    {

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
     * @Route("/get-class-definition-for-column-config", methods={"GET"})
     *
     * @param Request $request
     *
     * @return \Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse
     * @throws Exception
     */
    public function getClassDefinitionForColumnConfigAction(Request $request)
    {
        $class = DataObject\ClassDefinition::getById($request->get('id'));
        $objectId = intval($request->get('oid'));
        $loadChilds = boolval($request->get('loadChilds'));
        
        $filteredDefinitions = DataObject\Service::getCustomLayoutDefinitionForGridColumnConfig($class, $objectId);
        if ($loadChilds) {
            $layoutDefinitions = isset($filteredDefinitions['layoutDefinition']) ? $filteredDefinitions['layoutDefinition'] : false;
        }
        $filteredFieldDefinition = isset($filteredDefinitions['fieldDefinition']) ? $filteredDefinitions['fieldDefinition'] : false;
        $class->setFieldDefinitions([]);
        $result = [];
        $result['objectColumns']['childs'] = $loadChilds ? $layoutDefinitions->getChilds() : [];
        $result['objectColumns']['nodeLabel'] = 'object_columns';
        $result['objectColumns']['nodeType'] = 'object';

        if (!$loadChilds) {
            Services\ClassificationStoreService::updateObjectLayout($filteredDefinitions);
            Services\ClassificationStoreService::setBricksLayout($class, $result, $filteredFieldDefinition);
        }
        
        return $this->adminJson($result);
    }
    /**
     * @Route("/get-classification-store-for-column-config", methods={"GET"})
     *
     * @param Request $request
     *
     * @return \Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse
     * @throws Exception
     */
    public function getClassificationStoreForColumnConfigAction(Request $request)
    {
        $request =  Services\ClassificationStoreService::getStore($request->get('id'));
        return $this->adminJson($request);
    }
    
     /**
      * @Route("/get-brick-attributes", methods={"GET"})
      *
      *  Load Object Bricks layout
      * @param $request
      */
    public function getBrickAttributes(Request $request)
    {
        $classId = intval($request->get('id'));
        $brickName = $request->get('brickName');
        $class = DataObject\ClassDefinition::getById($classId);
        $list = new DataObject\Objectbrick\Definition\Listing();
        $list = $list->load();
        $result = [];
        foreach ($list as $brickDefinition) {
            $classDefs = $brickDefinition->getClassDefinitions();
            if (!empty($classDefs)) {
                foreach ($classDefs as $classDef) {
                    if ($classDef['classname'] === $class->getName()) {
                        $fieldName = $classDef['fieldname'];
                        $key = $brickDefinition->getKey();
                        $result[$key]['nodeLabel'] = $key;
                        $result[$key]['brickField'] = $fieldName;
                        $result[$key]['nodeType'] = 'objectbricks';
                        $result[$key]['childs'] = $brickDefinition->getLayoutDefinitions()->getChildren();
                        break;
                    }
                }
            }
        }
        return $this->adminJson($result[$brickName]);
    }
}
