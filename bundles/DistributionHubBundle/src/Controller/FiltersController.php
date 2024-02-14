<?php

namespace DistributionHubBundle\Controller;

use Pimcore\Controller\Traits\JsonHelperTrait;
use Pimcore\Controller\UserAwareController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Pimcore\Model\DataObject;
use Pimcore\Tool;
use DistributionHubBundle\Services\FilterService;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Filter;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Pimcore\Bundle\AdminBundle\Event\AdminEvents;
use DistributionHubBundle\Lib\Utils;
use DistributionHubBundle\Lib\DHubLogger;

/**
* @package DistributionHubBundle\Controller
* @Route("/admin/distributionhub/filters")
*/
class FiltersController extends UserAwareController
{
    use JsonHelperTrait;

    /**
     * @Route("/get_filter_config")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws RequestParameterNotValidException
     */
    public function getFilterConfigAction(Request $request)
    {
        $filterConfig = null;
        try {
            $channelId = $request->get('channelId');
            $session = $request->getSession();
            $channel = Channel::getById($channelId);
            if ($channel) {
                $filterConfig = $this->getSavedFilters($channel, $session);
            }
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            return $this->json(['result' => false, 'data' => [], "msg" => $msg]);
        }

        return $this->json(['success' => true, 'filterConfig' => $filterConfig]);
    }


    /**
     * @Route("/get-fields")
     *
     * @param Request $request
     * @param FilterService
     * @return JsonResponse
     * @throws RequestParameterNotValidException
     */
    public function getFieldsAction(Request $request, FilterService $service)
    {

        $type = strip_tags($request->get("type"));

        $allowInheritance = false;

        $classID = $request->get("class_id");

        $fieldTypes = $request->get("allowedFields") ? $request->get("allowedFields") : null;

        if (!empty($classID)) {
            switch ($type) {
                case "class":
                    $classId = strip_tags($request->get("class_id"));
                    $definition = DataObject\ClassDefinition::getById($classId);
                    $allowInheritance = $definition->getAllowInherit();
                    break;

                case "fieldcollection":
                    $key = strip_tags($request->get("key"));
                    $definition = DataObject\Fieldcollection\Definition::getByKey($key);
                    $allowInheritance = false;
                    break;

                case "objectbrick":
                    $key = strip_tags($request->get("key"));
                    $definition = DataObject\Objectbrick\Definition::getByKey($key);

                    $classId = strip_tags($request->get("class_id"));
                    $classDefinition = DataObject\ClassDefinition::getById($classId);
                    $allowInheritance = $classDefinition->getAllowInherit();
                    break;

                default:
                    throw new \Exception("Invalid type '$type''");
            }
        } else {
            DHubLogger::log("Pimcore Class id not found in channel .", DHubLogger::CRITICAL);
            return $this->jsonResponse(['success' => 'false']);
        }

        $fieldSelectionInformationEntries = $service->getFieldSelectionInformationForClassDefinition($definition, $fieldTypes, $allowInheritance);

        $fields = [];

        foreach ($fieldSelectionInformationEntries as $entry) {
            if ($type === "fieldcollection" || $type === "objectbrick") {
                if ($entry->getfieldName() === "id" || $entry->getfieldName() === "published" || $entry->getfieldName() === "path") {
                    continue;
                }
            }
            $fields[] = $entry->toArray();
        }

        return $this->jsonResponse(['data' => $fields]);
    }


    /**
     * @Route("/save")
     *
     * @param Request $request
     * @param FilterService
     * @return JsonResponse
     * @throws RequestParameterNotValidException
     */
    public function saveAction(Request $request, FilterService $service)
    {

        $data = json_decode($request->get("data"));
        $filterByList = $request->get("filterByList") === "true" ? 1 : 0;
        $type = $request->get("type");

        $config = ['type' => $type, 'conditions' => $data->conditions];

        $id = (intval($request->get("id")));
        if ($id) {
            $savedChannel = Channel::getById($id);
        }

        if ($savedChannel instanceof Channel) {
            if (empty($savedChannel->getFilter())) {
                $filter = new Filter();
                $filter->setObjectType($type);
                $filter->setFilterByList($filterByList);
                if (!empty($request->get("listFileAssetId"))) {
                    $filter->setListFileAssetId($request->get("listFileAssetId"));
                }
                $filter->setFilterByAttribute($request->get("filterByAttribute"));
                if (!empty($request->get("listFileSavePath"))) {
                    $filter->setListFileSavePath($request->get("listFileSavePath"));
                }
                $filter->setFilterConfig(json_encode($config));
                $filter->save();
                $savedChannel->setFilter($filter);
                $savedChannel->save();
            } else {
                $filter = $savedChannel->getFilter();
                $filter->setObjectType($type);
                $filter->setFilterConfig(json_encode($config));
                $filter->setFilterByList($filterByList);
                if (!empty($request->get("listFileAssetId"))) {
                    $filter->setListFileAssetId($request->get("listFileAssetId"));
                }
                $filter->setFilterByAttribute($request->get("filterByAttribute"));
                if (!empty($request->get("listFileSavePath"))) {
                    $filter->setListFileSavePath($request->get("listFileSavePath"));
                }
                $filter->save();
                $savedChannel->setFilter($filter);
                $savedChannel->save();
            }
        } else {
            DHubLogger::log("Invalid Channel.", DHubLogger::ERROR);
        }

        return $this->jsonResponse(["success" => true, "id" => $filter->getId()]);
    }

    /**
     * Returns current saved filter in channel object
     * @param channel Object
     * @return array
     * @throws RequestParameterNotValidException
     */
    public function getSavedFilters($channelObject, $session)
    {
        $filter = $channelObject->getFilter();

        if ($filter) {
            $config = json_decode($filter->getFilterConfig(), true);

            $classDefinition = DataObject\ClassDefinition::getById($channelObject->getPimcoreClassId());

            if (array_key_exists("gridConfig", $config) && !empty( $config["gridConfig"]["columns"])) {
                $helperColumns = [];

                foreach ($config["gridConfig"]["columns"] as &$column) {
                    if (!($column["isOperator"] ?? false)) {
                        $fieldDefinition = $classDefinition->getFieldDefinition($column['key']);
                        if ($fieldDefinition) {
                            $width = isset($column["layout"]["width"]) ? $column["layout"]["width"] : null;
                            $column["layout"] = json_decode(json_encode($fieldDefinition), true);
                            if ($width) {
                                $column["layout"]["width"] = $width;
                            }
                        }
                    }

                    if (!DataObject\Service::isHelperGridColumnConfig($column["key"])) {
                        continue;
                    }

                    // columnconfig has to be a stdclass
                    $helperColumns[$column["key"]] = json_decode(json_encode($column));
                }

                // store the saved columns in the session, otherwise they won't work
                Tool\Session::useBag(
                    $session,
                    function (AttributeBagInterface $attributeBagInterface) use ($helperColumns) {
                    $existingColumns = $attributeBagInterface->get('helpercolumns', []);
                    $helperColumns = array_merge($existingColumns, $helperColumns);
                    $attributeBagInterface->set('helpercolumns', $helperColumns);
                }, 'pimcore_gridconfig');
            }
            return  [
                'success' => true,
                'id' => $filter->getId(),
                'classId' => $channelObject->getPimcoreClassId(),
                'type' => $filter->getObjectType(),
                'filterByList' => $filter->getFilterByList(),
                'listFileAssetId' => $filter->getListFileAssetId(),
                'filterByAttribute' => $filter->getFilterByAttribute(),
                'listFileSavePath' => $filter->getListFileSavePath(),
                'conditions' => $config['conditions'],
                'gridConfig' => array_key_exists("gridConfig", $config) ? $config['gridConfig'] : null
            ];
        } else {
            DHubLogger::log("No saved filter found for channel Id".$channelObject->getId(), DHubLogger::CRITICAL);
            return json_encode(["success" => false, "message" => "No saved filter found not found."]);
        }
    }

    /**
     * @Route("/grid-proxy")
     *
     * @param Request $request
     * @param FilterService $service
     * @param EventDispatcherInterface $eventDispatcher
     *
     * @return JsonResponse
     * @throws RequestParameterNotValidException
     */
    public function gridProxyAction(Request $request, FilterService $service, EventDispatcherInterface $eventDispatcher)
    {
        $allParams = array_merge($request->request->all(), $request->query->all());

        $requestedLanguage = $request->get("language");
        if ($requestedLanguage) {
            if ($requestedLanguage != "default") {
                $request->setLocale($requestedLanguage);
            }
        } else {
            $requestedLanguage = $request->getLocale();
        }

        if ($request->get("data")) {
            return $this->forward("PimcoreAdminBundle:Admin/DataObject/DataObject:gridProxy", [], $request->query->all());
        } else {
            // get list of objects
            $className = $request->get("class");

            $fields = array();
            if ($request->get("fields")) {
                $fields = $request->get("fields");
            }

            $start = 0;
            $limit = 25;

            if ($request->get("start")) {
                $start = $request->get("start");
            }
            if ($request->get("limit")) {
                $limit = $request->get("limit");
            }

            $listClass = "\\Pimcore\\Model\\DataObject\\" . ucfirst($className) . "\\Listing";

            //get ID list from Filter Service
            $data = json_decode($request->get("filter"), true);

            /**
             * @var $list \Pimcore\Model\DataObject\Listing
             */
            $list = new $listClass();

            $results = $service->getFilteredList($data, $list);

            $conditionFilters = [];
            if (!$this->getPimcoreUser()->isAdmin()) {
                $userIds = $this->getPimcoreUser()->getRoles();
                $userIds[] = $this->getPimcoreUser()->getId();
                $conditionFilters[] .= ' (
                    (select list from users_workspaces_object where userId in (' . implode(',', $userIds) . ') and LOCATE(CONCAT(path,key),cpath)=1  ORDER BY LENGTH(cpath) DESC LIMIT 1)=1
                    OR
                    (select list from users_workspaces_object where userId in (' . implode(',', $userIds) . ') and LOCATE(cpath,CONCAT(path,key))=1  ORDER BY LENGTH(cpath) DESC LIMIT 1)=1
                 )';
            }

            if ($limit) {
                $results->setLimit($limit);
            }
            if ($start) {
                $results->setOffset($start);
            }

            $beforeListLoadEvent = new GenericEvent($this, [
                'list' => $results,
                'context' => $allParams
            ]);
            $eventDispatcher->dispatch($beforeListLoadEvent, AdminEvents::OBJECT_LIST_BEFORE_LIST_LOAD);
            $results = $beforeListLoadEvent->getArgument('list');

            try {
                $results->load();
            } catch (\Exception $ex) {
                throw new \Exception("Applied Filter combination is not currently supported. Please contact the administrator");
            }

            $objects = array();
            foreach ($results->getObjects() as $object) {
                $o = DataObject\Service::gridObjectData($object, $fields, $requestedLanguage);
                $objects[] = $o;
                if ($object->isAllowed('list')) {
                    $objects[] = $o;
                }
            }

            $result = ['data' => $objects, 'success' => true, 'total' => $results->getTotalCount()];

            $afterListLoadEvent = new GenericEvent($this, [
                'list' => $result,
                'context' => $allParams
            ]);
            $eventDispatcher->dispatch($afterListLoadEvent, AdminEvents::OBJECT_LIST_AFTER_LIST_LOAD);
            $result = $afterListLoadEvent->getArgument('list');

            return $this->jsonResponse($result);
        }
    }

    /**
     * @Route("/get-updated-channel-details")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws RequestParameterNotValidException
     */
    public function getUpdatedContent(Request $request)
    {

        //check channel class available or not
        $channelId = $request->get("id");

        if (!empty($channelId)) {
            $channel = Channel::getById($channelId);
            if (!empty($channel->getPimcoreClassId())) {
                return $this->jsonResponse(['success' => true, 'classId' => $channel->getPimcoreClassId(), 'showInGrid' => $channel->getShowInGridMapping(), "lang" => $channel->getLanguage()]);
            } else {
                return $this->jsonResponse(['success' => false]);
            }
        } else {
            DHubLogger::log("Channel Id not found", DHubLogger::CRITICAL);
            return $this->jsonResponse(['success' => false, 'error' => "channel Id not found"]);
        }
    }
}
