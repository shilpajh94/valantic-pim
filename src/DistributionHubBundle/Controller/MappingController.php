<?php

namespace DistributionHubBundle\Controller;

use Pimcore\Tool;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MappingController extends AdminController {

    /**
     *
     * @var array
     */
    public $config;
    public $productClsName = 'Product';
    public $className = null;
    public $headerData = [];

    /**
     *
     * @var object
     */
    public $conObj;

    /**
     * Initialize configuration and log
     */
    public function init() {
        
    }

    /**
     * Get mapping tree listing
     * @Route("/mapping/tree")
     * @return json
     */
    public function treeAction() {
        try {

            $reports = [];
            $channelObj = new \Pimcore\Model\DataObject\Mapping\Listing();
            $channelObj->load();
            $key = 0;
            foreach ($channelObj as $channel) {
                $reports[$key]['id'] = $channel->getId();
                $reports[$key]['text'] = $channel->getKey();
                $key++;
            }

            return $this->json($reports);
        } catch (\Exception $excp) {
//            \Pimcore::getEventManager()->trigger(
//                    "dataimport.log", [
//                "type" => "error",
//                "msg" => "Error : " . $excp->getMessage()
//                    ]
//            );
            return $this->json(
                            [
                                "success" => false,
                                'msg' => $excp->getMessage()
                            ]
            );
        }
    }

    /**
     * Add mapping
     * @Route("/mapping/add")
     * @return json
     *
     */
    public function addAction(Request $request) {
        try {

            // Creating Mapping folder
            $parentFolderPath = "/System Configuration/Distribution Hub/Channel Source Mapping";

            $pathExists = \Pimcore\Model\DataObject\Service::pathExists($parentFolderPath);
            if (empty($pathExists)) {
                $folder = \Pimcore\Model\DataObject\Service::createFolderByPath($parentFolderPath);
            } else {
                $folder = \Pimcore\Model\DataObject\Service::getElementByPath('object', $parentFolderPath);
            }

            $parentFolderId = $folder->getId();

            $channelObj = new \Pimcore\Model\DataObject\Mapping();
            $keyName = $request->query->get('name');
            $keyName = \Pimcore\File::getValidFilename($keyName);

            $channelObj->setParentId($parentFolderId);
            $channelObj->setPublished(true);
            $channelObj->setKey($keyName);
            $channelObj->setName($keyName);
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
     * Delete mapping
     * @Route("/mapping/delete")
     * @return json
     */
    public function deleteAction(Request $request) {
        try {
            $id = $request->query->get("name");
            $channel = \Pimcore\Model\DataObject\Mapping::getById($id);
            if ($channel instanceof \Pimcore\Model\DataObject\Mapping) {
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
     * Get connector details
     * @Route("/mapping/get-channel-detail")
     * @return json
     */
    public function getChannelDetailAction(Request $request) {
        try {
            $id = $request->query->get('id');
            $channelObj = \Pimcore\Model\DataObject::getById($id);

            return $this->json([
                        "success" => true,
                        'name' => $channelObj->getName(),
                        'id' => $id,
                        'key' => $channelObj->getKey(),
                        'type' => $channelObj->getMappingType(),
            ]);
        } catch (\Exception $excp) {
            $this->json([
                "success" => false,
                'msg' => $excp->getMessage()
            ]);
        }
    }

    public function gridGetColumnConfigAction(Request $request) {
        if ($request->query->get("id")) {
            $class = \Pimcore\Model\DataObject\ClassDefinition::getById($request->query->get("id"));
        } elseif ($request->query->get("name")) {
            $class = \Pimcore\Model\DataObject\ClassDefinition::getByName($request->query->get("name"));
        }

        $gridType = "search";
        if ($request->query->get("gridtype")) {
            $gridType = $request->query->get("gridtype");
        }

        $objectId = $request->query->get("objectId");

        if ($objectId) {
            $fields = \Pimcore\Model\DataObject\Service::getCustomGridFieldDefinitions($class->getId(), $objectId);
        }

        if (!$fields) {
            $fields = $class->getFieldDefinitions();
        }

        $types = [];
        if ($request->query->get("types")) {
            $types = explode(",", $request->query->get("types"));
        }

        // grid config
        $gridConfig = [];
        if ($objectId) {
            $searchType = $request->query->get("searchType");
            $postfix = $searchType && $searchType != "folder" ? "_" . $request->query->get("searchType") : "";

            $configFiles["configFileClassUser"] = PIMCORE_CONFIGURATION_DIRECTORY . "/object/grid/" . $request->query->get("objectId") . "_" . $class->getId() . $postfix . "-user_" . $this->getUser()->getId() . ".psf";
            $configFiles["configFileUser"] = PIMCORE_CONFIGURATION_DIRECTORY . "/object/grid/" . $request->query->get("objectId") . $postfix . "-user_" . $this->getUser()->getId() . ".psf";

            foreach ($configFiles as $configFile) {
                if (is_file($configFile)) {
                    $gridConfig = \Pimcore\Tool\Serialize::unserialize(file_get_contents($configFile));
                    if (is_array($gridConfig) && array_key_exists("classId", $gridConfig)) {
                        if ($gridConfig["classId"] == $class->getId()) {
                            break;
                        } else {
                            $gridConfig = [];
                        }
                    } else {
                        break;
                    }
                }
            }
        }

        $localizedFields = [];
        $objectbrickFields = [];
        foreach ($fields as $key => $field) {
            if ($field instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields) {
                $localizedFields[] = $field;
            } elseif ($field instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks) {
                $objectbrickFields[] = $field;
            }
        }

        $availableFields = [];
        $systemColumns = ["id", "fullpath", "published", "creationDate", "modificationDate", "filename", "classname"];
        if (empty($gridConfig)) {
            $count = 0;

            if (!$this->getParam("no_system_columns")) {
                $vis = $class->getPropertyVisibility();
                foreach ($systemColumns as $sc) {
                    $key = $sc;
                    if ($key == "fullpath") {
                        $key = "path";
                    }

                    if (empty($types) && ($vis[$gridType][$key] || $gridType == "all")) {
                        $availableFields[] = [
                            "key" => $sc,
                            "type" => "system",
                            "label" => $sc,
                            "position" => $count];
                        $count++;
                    }
                }
            }

            $includeBricks = !$request->query->get("no_brick_columns");

            foreach ($fields as $key => $field) {
                if ($field instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields) {
                    foreach ($field->getFieldDefinitions() as $fd) {
                        if (empty($types) || in_array($fd->getFieldType(), $types)) {
                            $fieldConfig = $this->getFieldGridConfig($fd, $gridType, $count);
                            if (!empty($fieldConfig)) {
                                $availableFields[] = $fieldConfig;
                                $count++;
                            }
                        }
                    }
                } elseif ($field instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks && $includeBricks) {
                    if (in_array($field->getFieldType(), $types)) {
                        $fieldConfig = $this->getFieldGridConfig($field, $gridType, $count);
                        if (!empty($fieldConfig)) {
                            $availableFields[] = $fieldConfig;
                            $count++;
                        }
                    } else {
                        $allowedTypes = $field->getAllowedTypes();
                        if (!empty($allowedTypes)) {
                            foreach ($allowedTypes as $t) {
                                $brickClass = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($t);
                                $brickFields = $brickClass->getFieldDefinitions();
                                if (!empty($brickFields)) {
                                    foreach ($brickFields as $bf) {
                                        $fieldConfig = $this->getFieldGridConfig($bf, $gridType, $count, false, $t . "~");
                                        if (!empty($fieldConfig)) {
                                            $availableFields[] = $fieldConfig;
                                            $count++;
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if (empty($types) || in_array($field->getFieldType(), $types)) {
                        $fieldConfig = $this->getFieldGridConfig($field, $gridType, $count, !empty($types));
                        if (!empty($fieldConfig)) {
                            $availableFields[] = $fieldConfig;
                            $count++;
                        }
                    }
                }
            }
        } else {
            $savedColumns = $gridConfig['columns'];
            foreach ($savedColumns as $key => $sc) {
                if (!$sc['hidden']) {
                    if (in_array($key, $systemColumns)) {
                        $colConfig = [
                            "key" => $key,
                            "type" => "system",
                            "label" => $key,
                            "position" => $sc['position']];
                        if (isset($sc['width'])) {
                            $colConfig['width'] = $sc['width'];
                        }
                        $availableFields[] = $colConfig;
                    } else {
                        $keyParts = explode("~", $key);

                        if (substr($key, 0, 1) == "~") {
                            $type = $keyParts[1];
                            $groupAndKeyId = explode("-", $keyParts[3]);
                            $keyId = $groupAndKeyId[1];

                            if ($type == "classificationstore") {
                                $keyDef = \Pimcore\Model\DataObject\Classificationstore\KeyConfig::getById($keyId);
                                if ($keyDef) {
                                    $keyFieldDef = json_decode($keyDef->getDefinition(), true);
                                    if ($keyFieldDef) {
                                        $keyFieldDef = \Pimcore\Model\DataObject\Classificationstore\Service::getFieldDefinitionFromJson($keyFieldDef, $keyDef->getType());
                                        $fieldConfig = $this->getFieldGridConfig($keyFieldDef, $gridType, $sc['position'], true);
                                        if ($fieldConfig) {
                                            $fieldConfig["key"] = $key;
                                            $fieldConfig["label"] = "#" . $keyFieldDef->getTitle();
                                            $availableFields[] = $fieldConfig;
                                        }
                                    }
                                }
                            }
                        } elseif (count($keyParts) > 1) {
                            $brick = $keyParts[0];
                            $key = $keyParts[1];

                            $brickClass = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($brick);
                            $fd = $brickClass->getFieldDefinition($key);
                            if (!empty($fd)) {
                                $fieldConfig = $this->getFieldGridConfig($fd, $gridType, $sc['position'], true, $brick . "~");
                                if (!empty($fieldConfig)) {
                                    if (isset($sc['width'])) {
                                        $fieldConfig['width'] = $sc['width'];
                                    }
                                    $availableFields[] = $fieldConfig;
                                }
                            }
                        } else {
                            $fd = $class->getFieldDefinition($key);
                            //if not found, look for localized fields
                            if (empty($fd)) {
                                foreach ($localizedFields as $lf) {
                                    $fd = $lf->getFieldDefinition($key);
                                    if (!empty($fd)) {
                                        break;
                                    }
                                }
                            }

                            if (!empty($fd)) {
                                $fieldConfig = $this->getFieldGridConfig($fd, $gridType, $sc['position'], true);
                                if (!empty($fieldConfig)) {
                                    if (isset($sc['width'])) {
                                        $fieldConfig['width'] = $sc['width'];
                                    }

                                    $availableFields[] = $fieldConfig;
                                }
                            }
                        }
                    }
                }
            }
        }
        usort($availableFields, function ($a, $b) {
            if ($a["position"] == $b["position"]) {
                return 0;
            }

            return ($a["position"] < $b["position"]) ? -1 : 1;
        });

        $config = \Pimcore\Config::getSystemConfig();
        $frontendLanguages = \Pimcore\Tool\Admin::reorderWebsiteLanguages(\Pimcore\Tool\Admin::getCurrentUser(), $config->general->validLanguages);
        if ($frontendLanguages) {
            $language = explode(',', $frontendLanguages)[0];
        } else {
            $language = $this->getLanguage();
        }

        if (!Tool::isValidLanguage($language)) {
            $validLanguages = Tool::getValidLanguages();
            $language = $validLanguages[0];
        }


        if (!empty($gridConfig) && !empty($gridConfig['language'])) {
            $language = $gridConfig['language'];
        }
        $this->json([
            "sortinfo" => isset($gridConfig['sortinfo']) ? $gridConfig['sortinfo'] : false,
            "language" => $language,
            "availableFields" => $availableFields,
            "onlyDirectChildren" => isset($gridConfig['onlyDirectChildren']) ? $gridConfig['onlyDirectChildren'] : false,
            "pageSize" => isset($gridConfig['pageSize']) ? $gridConfig['pageSize'] : false
        ]);
    }

    private function getData(Request $request, $params = array(), $gridFlag = false) {
        $requestedLanguage = "default";
        if ($requestedLanguage) {
            if ($requestedLanguage != "default") {
                $this->setLanguage($requestedLanguage, true);
            }
        } else {
            $requestedLanguage = $this->getLanguage();
        }
        $class = \Pimcore\Model\DataObject\ClassDefinition::getById($request->query->get['classId']);
        $className = $class->getName();

        $colMappings = [
            "filename" => "o_key",
            "fullpath" => ["o_path", "o_key"],
            "id" => "o_id",
            "published" => "o_published",
            "modificationDate" => "o_modificationDate",
            "creationDate" => "o_creationDate"
        ];

        if ($gridFlag) {
            $start = 0;
            $limit = 20;
            if ($params["limit"]) {
                $limit = $params["limit"];
            }
            if ($params["start"]) {
                $start = $params["start"];
            }
        }
        $orderKey = "`object_" . $params['classId'] . "`.o_id";
        $order = "ASC";

        $fields = [];
        $bricks = [];
        if ($params["fields"]) {
            $fields = $params["fields"];
            foreach ($fields as $f) {
                $parts = explode("~", $f);
                $sub = substr($f, 0, 1);
                if (substr($f, 0, 1) == "~") {
                    $type = $parts[1];
                    if ($type == "classificationstore") {
                        
                    }
                } elseif (count($parts) > 1) {
                    $bricks[$parts[0]] = $parts[0];
                }
            }
        }
        try {

            $sortingSettings = \Pimcore\Admin\Helper\QueryParams::extractSortingSettings($params);

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

            $listClass = "\\Pimcore\\Model\\DataObject\\" . ucfirst($className) . "\\Listing";

            $conditionFilters = [];
            $featureJoins = [];
            $featureFilters = false;

            // create filter condition
            if ($params["filter"]) {
                $conditionFilters[] = \Pimcore\Model\DataObject\Service::getFilterCondition($params["filter"], $class);
                $featureFilters = \Pimcore\Model\DataObject\Service::getFeatureFilters($params["filter"], $class);
                if ($featureFilters) {
                    $featureJoins = array_merge($featureJoins, $featureFilters["joins"]);
                }
            }
            if ($params["condition"]) {
                $conditionFilters[] = "(" . $params["condition"] . ")";
            }

            $list = new $listClass();
            if (!empty($bricks)) {
                foreach ($bricks as $b) {
                    $list->addObjectbrick($b);
                }
            }

            $list->setCondition(implode(" AND ", $conditionFilters));
            if ($gridFlag) {
                $list->setLimit($limit);
                $list->setOffset($start);
            }

            if (isset($sortingSettings["isFeature"]) && $sortingSettings["isFeature"]) {
                $orderKey = "cskey_" . $sortingSettings["fieldname"] . "_" . $sortingSettings["groupId"] . "_" . $sortingSettings["keyId"];
                $list->setOrderKey($orderKey);
                $list->setGroupBy("o_id");

                $featureJoins[] = $sortingSettings;
            } else {
                $list->setOrderKey($orderKey, false);
            }
            $list->setOrder($order);
            if ($class->getShowVariants()) {
                $list->setObjectTypes([\Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_OBJECT, \Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_VARIANT]);
            }
            \Pimcore\Model\DataObject\Service::addGridFeatureJoins($list, $featureJoins, $class, $featureFilters, $requestedLanguage);
            $list->load();
            $objects = [];
            foreach ($list->getObjects() as $object) {
                $o = \Pimcore\Model\DataObject\Service::gridObjectData($object, $fields, $requestedLanguage);
                $objects[] = $o;
            }
            $returnArr = ["data" => $objects, "success" => true, "total" => count($list)];
            return $returnArr;
        } catch (\Exception $err) {
            print_r($err->getMessage());
            die;
        }
    }

    public function gridProxyAction() {
        $returnArr = $this->getData($this->getAllParams());
        $this->json($returnArr);
    }

    /**
     * @Route("/mapping/upload-file")
     * @param Request $request
     * @throws Exception
     */
    public function uploadFileAction(Request $request) {
        $gridId = $request->request->get('id');
        $file = $request->request->get('file');
        $className = $request->request->get('classname');
        $mappingType = $request->request->get('mappingType');


        $uploadPathfolder = PIMCORE_PROJECT_ROOT . '/web/var/TempXmlFileFolder/';
        $uploadPathfol = PIMCORE_PROJECT_ROOT . '/web/var/';
        $uploadPath = $uploadPathfolder . basename($_FILES['file']['name']);

        $upload = move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath);

        $per = chmod($uploadPath, 0777);

        $fileName = '';
        try {
            //$upload->receive();
            $fileName = $_FILES['file']['name'];

            if (pathinfo($fileName)['extension'] == "csv") {
                $array = $this->csv2array($fileName, $mappingType);
            } else if (pathinfo($fileName)['extension'] == "xml") {
                $array = $this->xml2array(file_get_contents($uploadPath));
            } else if (pathinfo($fileName)['extension'] == "xlsx" || pathinfo($fileName)['extension'] == "xls") {
                $extension = pathinfo($fileName)['extension'];
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader(ucfirst($extension));
                $spreadsheet = $reader->load($uploadPath);
                $fileName = pathinfo($fileName, PATHINFO_FILENAME) . '.csv';
                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Csv");
                $writer->save($uploadPathfolder . $fileName);
                chmod($uploadPathfolder . $fileName, 0777);
                $array = $this->csv2array($fileName, $mappingType);
            }
            $object = \Pimcore\Model\DataObject::getById($gridId);
            $object->setMappingType($mappingType);
            $object->setHeaderData(serialize($this->headerData));
            $object->save();
            unlink($uploadPath);
        } catch (\Exception $e) {
            throw new \Exception('Bad image data: ' . $e->getMessage());
        }
        $columnFieldArray = array();
        if (pathinfo($fileName)['extension'] == "xml") {
            $columnTempFieldArray = $this->fetchAllTags($array["PRODUCTS"]);
        } else if (pathinfo($fileName)['extension'] == "csv") {
            $columnTempFieldArray = $this->fetchAllTags($array["Products"]);
        }


        $columnFieldsUniqueArray = array_unique($columnTempFieldArray);
        foreach ($columnFieldsUniqueArray as $val) {
            array_push($columnFieldArray, utf8_decode(trim($val)));
        }

        $classFields = json_decode($this->getClassFieldsAction($className)->getContent());
        $fieldArray = $classFields->fields;
        $clsFields = $classFields->clsFields;
        return $this->json(
                        [
                            "success" => true,
                            "xmlData" => $array,
                            "columns" => $columnFieldArray,
                            "fields" => $fieldArray,
                            "gridId" => $gridId,
                            "clsFields" => (array) $clsFields
                        ]
        );
    }

    public function fetchAllTags($array) {
        $returnArr = [];
        foreach ($array as $key => $fieldName) {
            if (is_array($fieldName)) {
                $returnArr = array_merge($returnArr, $this->fetchAllTags($fieldName));
            } else if ($key !== "ID" && $key !== "FILENAME") {
                $returnArr[] = $key;
            }
        }
        return $returnArr;
    }

    public function csv2array($fileName, $type = null) {
        $csv = array();
        $fileName = PIMCORE_PROJECT_ROOT . "/web/var/TempXmlFileFolder/" . $fileName;

        $file = fopen($fileName, 'r');
        $col = 0;
        if ($type === 'amazon') {
            $col = 2;
        } else if ($type === 'staple') {
            $col = 1;
        }

        $i = 0;
        while (($result = fgetcsv($file)) !== false) {

            if ($col == $i) {
                for ($i = 0; $i < count($result); $i++) {
                    $result[$i] = utf8_decode(trim($result[$i]));
                }
                $csv['Products'] = array_flip($result);
                break;
            } else {

                $this->headerData[$i] = $result;
            }

            $i++;
        }

        fclose($file);
        return $csv;
    }

    public function xml2array($contents, $get_attributes = 1, $priority = 'tag') {
        if (!$contents)
            return array();

        if (!function_exists('xml_parser_create')) {
            return array();
        }

        //Get the XML parser of PHP - PHP must have this module for the parser to work
        $parser = xml_parser_create('');
        xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, trim($contents), $xml_values);
        xml_parser_free($parser);

        if (!$xml_values)
            return;

        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();

        $current = &$xml_array; //Refference
        //Go through the tags.
        $repeated_tag_index = array(); //Multiple tags with same name will be turned into an array
        foreach ($xml_values as $data) {
            unset($attributes, $value); //Remove existing values, or there will be trouble
            //This command will extract these variables into the foreach scope
            // tag(string), type(string), level(int), attributes(array).
            extract($data); //We could use the array by itself, but this cooler.

            $result = array();
            $attributes_data = array();

            if (isset($value)) {
                if ($priority == 'tag')
                    $result = $value;
                else
                    $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
            }

            //Set the attributes too.
            if (isset($attributes) and $get_attributes) {
                foreach ($attributes as $attr => $val) {
                    if ($priority == 'tag')
                        $attributes_data[$attr] = $val;
                    else
                        $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
                }
            }

            //See tag status and do the needed.
            if ($type == "open") {//The starting of the tag '<tag>'
                $parent[$level - 1] = &$current;
                if (!is_array($current) or ( !in_array($tag, array_keys($current)))) { //Insert New tag
                    $current[$tag] = $result;
                    if ($attributes_data)
                        $current[$tag . '_attr'] = $attributes_data;
                    $repeated_tag_index[$tag . '_' . $level] = 1;

                    $current = &$current[$tag];
                } else { //There was another element with the same tag name
                    if (isset($current[$tag][0])) {//If there is a 0th element it is already an array
                        $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
                        $repeated_tag_index[$tag . '_' . $level] ++;
                    } else {//This section will make the value an array if multiple tags with the same name appear together
                        $current[$tag] = array($current[$tag], $result); //This will combine the existing item and the new item together to make an array
                        $repeated_tag_index[$tag . '_' . $level] = 2;

                        if (isset($current[$tag . '_attr'])) { //The attribute of the last(0th) tag must be moved as well
                            $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                            unset($current[$tag . '_attr']);
                        }
                    }
                    $last_item_index = $repeated_tag_index[$tag . '_' . $level] - 1;
                    $current = &$current[$tag][$last_item_index];
                }
            } elseif ($type == "complete") { //Tags that ends in 1 line '<tag />'
                //See if the key is already taken.
                if (!isset($current[$tag])) { //New Key
                    $current[$tag] = $result;
                    $repeated_tag_index[$tag . '_' . $level] = 1;
                    if ($priority == 'tag' and $attributes_data)
                        $current[$tag . '_attr'] = $attributes_data;
                } else { //If taken, put all things inside a list(array)
                    if (isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...
                        // ...push the new element into that array.
                        $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;

                        if ($priority == 'tag' and $get_attributes and $attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                        }
                        $repeated_tag_index[$tag . '_' . $level] ++;
                    } else { //If it is not an array...
                        $current[$tag] = array($current[$tag], $result); //...Make it an array using using the existing value and the new value
                        $repeated_tag_index[$tag . '_' . $level] = 1;
                        if ($priority == 'tag' and $get_attributes) {
                            if (isset($current[$tag . '_attr'])) { //The attribute of the last(0th) tag must be moved as well
                                $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                                unset($current[$tag . '_attr']);
                            }

                            if ($attributes_data) {
                                $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                            }
                        }
                        $repeated_tag_index[$tag . '_' . $level] ++; //0 and 1 index is already taken
                    }
                }
            } elseif ($type == 'close') { //End of tag '</tag>'
                $current = &$parent[$level - 1];
            }
        }

        return($xml_array);
    }

    /**
     * @Route("/mapping/save-mapping")
     * @param Request $request
     */
    public function saveMappingAction(Request $request) {
        $mapping = json_decode($request->request->get('mapping'));
        $id = $request->request->get('id');
        $name = $request->request->get('name');
        $className = $request->request->get('classname');
        $dataArray = array();
        foreach ($mapping as $maps) {
            $tempArray = array();
            foreach($maps as $key => $map) {
                $tempArray[] = $map;       
            }

            $dataArray[] = $tempArray;
        }
        $object = \Pimcore\Model\DataObject::getById($id);
        $object->setName($name);
        $object->setClassUsed($className);
        $object->setColumns($mapping);
//        $object->setLanguageUsed($languageUsed);
        $object->save();

        return $this->json([ "success" => true]);
    }

    /**
     * @Route("/mapping/get-table-data/{id}")
     * @param Request $request
     */
    public function getTableDataAction($id = null, Request $request) {

        $obj = \Pimcore\Model\DataObject::getById($id);
        $columnData = $obj->getColumns();
        $storeArray = array();
        $source = 0;
        if ($columnData != NULL) {
            foreach ($columnData as $dataCol) {
                $tempArray = array();
                $tempArray[] = $source;
                foreach($dataCol as $key => $data ) {               
                    $tempArray[] = $data;       
                }
                $storeArray[] = $tempArray;
                $source++;
            }
            return $this->json([ "columnData" => $storeArray]);
        } else {
            return $this->json([ "columnData" => NULL]);
        }
    }

    /**
     * @param Request $request
     * @Route("/mapping/get-class-fields/{className}")
     */
    public function getClassFieldsAction($className = null) {

        if ($className != null) {
            $clsName = "\\Pimcore\\Model\\DataObject\\" . $className;
        } else {
            $clsName = "\\Pimcore\\Model\\DataObject\\Mapping";
        }
        $obj = new $clsName();
        $classDef = $obj->getClass();
        $fieldDef = $classDef->getFieldDefinitions();
        $fieldArray = array();
        $clsFields = [];
        foreach ($fieldDef as $fieldName => $field) {
            $fieldArrayTemp = array();
            $definition = $field;

            if ($definition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\ObjectsMetadata) {
                $title = $field->getTitle();
                $fieldArrayTemp[] = trim($field->getName() . " (" . $title . ")");
                $fieldArrayTemp[] = trim($title);
                $fieldArray[] = $fieldArrayTemp;
                $clsFields[strtolower(trim($field->getName()))] = trim($field->getName() . " (" . $title . ")");
            } else if ($definition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\FieldCollections) {

                $classAttributeName = $definition->getName();

                foreach ($definition->getAllowedTypes() as $asAllowedType) {
                    $collectionDef = \Pimcore\Model\DataObject\Fieldcollection\Definition::getByKey($asAllowedType);

                    foreach ($collectionDef->getFieldDefinitions() as $lfd) {
                        $fieldArrayTemp = array();
                        $value = null;
                        $title2 = $lfd->getTitle() . " - " . ucfirst($asAllowedType);
                        $newTitle = $lfd->getTitle() . "#" . ucfirst($asAllowedType);
                        $fieldArrayTemp[] = trim($lfd->getName() . "#" . $asAllowedType . " (" . $title2 . ")");
                        $fieldArrayTemp[] = trim($newTitle);
                        $fieldArray[] = $fieldArrayTemp;
                    }
                }
            } else if ($definition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields) {
                $fieldArrayTemp = array();
                foreach ($definition->getFieldDefinitions() as $lfd) {
                    $fieldArrayTemp = array();
                    $title1 = $lfd->getTitle();
                    //$fieldArrayTemp[] = trim($lfd->getName() . " (" . $title1 . ")");
                    $fieldArrayTemp[] = trim($lfd->getName());
                    $fieldArrayTemp[] = trim($title1);
                    $fieldArray[] = $fieldArrayTemp;
                    //$clsFields[strtolower(trim($lfd->getName()))] = trim($lfd->getName() . " (" . $title1 . ")");
                    $clsFields[strtolower(trim($lfd->getName()))] = trim($lfd->getName());
                }
            } else if ($definition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks) {
                $classAttributeName = $definition->getName();

                foreach ($definition->getAllowedTypes() as $asAllowedType) {
                    $collectionDef = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($asAllowedType);

                    foreach ($collectionDef->getFieldDefinitions() as $lfd) {
                        $fieldArrayTemp = array();
                        $value = null;
                        $bricks = $obj->{"get" . ucfirst($fieldName)}();
                        if ($bricks) {
                            $brickValue = $bricks->{"get" . $asAllowedType}();
                            if ($brickValue) {
                                $value = $lfd->getVersionPreview($brickValue->getValueForFieldName($lfd->getName()));
                            }
                        }
                        if (!$bricks) {
                            continue;
                        }
                        $title2 = $lfd->getTitle() . " - " . ucfirst($asAllowedType);
                        $fieldArrayTemp[] = trim($field->getName() . "~" . $lfd->getName() . "~" . $asAllowedType . " (" . $title2 . ")");
                        $fieldArrayTemp[] = trim($title2);
                        $fieldArray[] = $fieldArrayTemp;
                    }
                }
            } else if ($field->getName() !== "classificationType" &&
                    $field->getName() !== "completenessPercentage" &&
                    $field->getName() !== "badQualityFields") {
                $title3 = $field->getTitle();
                //$fieldArrayTemp[] = trim($field->getName() . " (" . $title3 . ")");
                $fieldArrayTemp[] = trim($field->getName());
                $fieldArrayTemp[] = trim($title3);
                $fieldArray[] = $fieldArrayTemp;
                //$clsFields[strtolower(trim($field->getName()))] = trim($field->getName() . " (" . $title3 . ")");
                $clsFields[strtolower(trim($field->getName()))] = trim($field->getName());
            }
        }
        $fieldArrayTemp = array();
        $fieldArrayTemp[] = "ignore" . "(Ignore)";
        $fieldArrayTemp[] = "Ignore";
        $fieldArray[] = $fieldArrayTemp;
        return $this->json([ "fields" => $fieldArray, 'clsFields' => $clsFields]);
    }

    /**
     * @Route("/mapping/get-mapping-folder-id")
     */
    public function getMappingFolderIdAction() {

        $folderName = "Channel Source Mapping";
        $folderPath = '/System Configuration/Distribution Hub/' . $folderName;
        $folderObject = \Pimcore\Model\DataObject\Folder::getByPath($folderPath);
        if ($folderObject) {
            $folderObjectId = $folderObject->getId();
            return $this->json(["success" => true, "mappingFolderId" => $folderObjectId]);
        } else {
            return $this->json(["success" => false, "msg" => "Mapping folder not found in objects."]);
        }
    }

    /**
     * @Route("/mapping/get-available-classes")
     */
    public function getAvailableClassesAction() {

        $list = new \Pimcore\Model\DataObject\ClassDefinition\Listing();
        $list->load();
        $availableClasses = $list->getClasses();

        $fieldArray = array();
        foreach ($availableClasses as $classes) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['name'] = $classes->getName();
            $fieldArray[] = $fieldArrayTemp;
        }

        return $this->json(["classes" => $fieldArray]);
    }

    /**
     * @Route("/mapping/get-class-name")
     * @param Request $request
     */
    public function getClassNameAction(Request $request) {
        $mappingId = $request->request->get('id');
        $mapping = \Pimcore\Model\DataObject::getById($mappingId);
        
        if ($mapping->getClassUsed() == null) {
            $classArray = json_decode($this->getAvailableClassesAction()->getContent())->classes;
            $className = $classArray[0]->name;
        } else {
            $className = $mapping->getClassUsed();
        }
        
        return $this->json(["success" => true, "classname" => $className]);
    }

    /**
     * Method to object copied
     * @Route("/mapping/copy-info")
     * @access public
     */
    public function copyInfoAction(Request $request) {
        $transactionId = time();
        $pasteJobs = [];

        \Pimcore\Tool\Session::useSession(function ($session) use ($transactionId) {
            $session->$transactionId = ["idMapping" => []];
        }, "pimcore_copy");

        if ($request->get('type') == "child") {
            // the object itself is the last one
            $pasteJobs[] = [[
            "url" => "/admin/DistributionHub/mapping/copy",
            "params" => [
                "sourceId" => $request->get("sourceId"),
                "targetId" => $request->get("targetId"),
                "type" => $request->get("type"),
                "transactionId" => $transactionId
            ]
            ]];
        }
        return $this->adminjson([
                    "pastejobs" => $pasteJobs
        ]);
    }

    /**
     * Method to copy object
     * @Route("/mapping/copy")
     * @access public
     */
    /*
      public function copyAction(Request $request) {
      $success = false;
      $message = "";
      $sourceId = intval($request->request->get("sourceId"));
      $session = \Pimcore\Tool\Session::get("pimcore_copy");
      $targetId = intval($request->request->get("targetId"));
      $target = Object::getById($targetId);
      $source = Object::getById($sourceId);
      $objectService = new Object\Service($this->getUser());
      if ($source != null) {
      try {
      if ($request->request->get("type") == "child") {
      $newObject = $objectService->copyAsChild($target, $source);

      $session->{$request->request->get("transactionId")}["idMapping"][(int) $source->getId()] = (int) $newObject->getId();
      }
      $success = true;
      } catch (\Exception $e) {
      Logger::err($e);
      $success = false;
      $message = $e->getMessage() . " in object " . $source->getRealFullPath() . " [id: " . $source->getId() . "]";
      }
      } else {
      Logger::error("could not execute copy/paste, source object with id [ $sourceId ] not found");
      return $this->json(["success" => false, "message" => "source object not found"]);
      }

      return $this->json(["success" => $success, "message" => $message]);
      }
     */

    /**
     * @Route("/mapping/copy")
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
     * @Route("/mapping/set-show-in-grid")
     * @param Request $request
     */
    /*
    public function setShowInGridAction(Request $request) {
        $id = $request->request->get('id');
        $showInGridValue = $request->request->get('value');
        
        $mappingObject = \Pimcore\Model\DataObject::getById($id);
        $mappingColumns = $mappingObject->getColumns();
        $tempArray = array();
                        
        if ($mappingColumns != NULL) {
            foreach ($mappingColumns as $dataCol) {
                $dataCol[4] = $showInGridValue;
                $tempArray[] = $dataCol;
            }
            
            $mappingObject->setColumns($tempArray);
            $mappingObject->save();                        


            return $this->json([ "success" => true]);
        } else {
            return $this->json([ "success" => false]);
        }
    }
     * 
     */

}
