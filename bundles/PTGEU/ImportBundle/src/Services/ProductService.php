<?php

namespace PTGEU\ImportBundle\Services;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use PTGEU\ImportBundle\Services\ImportService;
use PTGEU\ImportBundle\Services\ImportConstants;
use AppBundle\Lib\UnitConversion;
use PTGEU\ImportBundle\Model\ProductModel;
use PTGEU\ProductBundle\Services\CompletenessPercentageService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductService
{
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    public $configuredData; // We will pull the data from configured class for this variable
    private $logFileName;
    private $productModel;
    private $configProviderService;
    private $materialConfigData;
    private $common;
    private $columnName;
    private $csvHeader;
    private $brickMappingService;
    private $langArr;
    private $allBricksList;
    private $brickTablePrefixArray;
    private $categories;
    private $products;
    private $materialGroup;
    private $baseSiopMismatchLog;
    private $baseSiopMismatchEmailTemplate;
    private $updatedArticlesArray;
    public $percentageCompletionService;
    private $productHelper;
    private $catConfigData;
    public $businessUnit;
    private $emailService;
    private $logArray;
    private $objectsTableData;
    private $queryTableDataArray;
    private $storeTableDataArray;
    private $localisedQueryTableDataArray;
    private $localisedDataTableDataArray;
    private $dependencyTableDataArray;
    private $bricksDataArray;
    private $relationTableDataArray;
    private $relationTableDataDeleteArray;
    private $container;

    const LOGGER_MODULE = 'SAP IMPORT SHEET';


    public function __construct(CompletenessPercentageService $percentageCompletionService,
     ContainerInterface $container)
    {
        $this->container = $container;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->logFileName          = 'ptgeu-products-log-' . date('Ymdhis');
        $this->common               = $this->container->get('import.common_helper');
        $this->productModel         = new ProductModel($this->container);
        $this->configProviderService= $this->container->get('import.config_provider_service');
        $this->productHelper        = $this->container->get('import.product_helper');
        $this->materialConfigData   = $this->configProviderService->getProductConfig();
        $this->catConfigData        = $this->configProviderService->getCategoryConfig();
        $this->businessUnit         = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->brickMappingService  = $this->container->get('import.category_brick_mapping_service');
        $this->columnName           = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'columnName');
        $this->baseSiopMismatchLog  = [];
        $this->percentageCompletionService = $percentageCompletionService;
    }

    /**
     * Update table name in import table class
     */
    private function initImportTable()
    {
        $this->langArr = ['en'];
        $tables = $this->common->getParameter($this->materialConfigData, 'table');
        $tables['fileColumns'] = $this->csvHeader;
        $tables['mappingCsvColumn'] = $this->columnName;
        $tables['keyColumns'] = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'keyColumns');
        $this->baseSiopMismatchEmailTemplate = $this->common->getParameterItem(
            $this->materialConfigData, 'sheet', 'baseSIOPMismatchEmailTemplate');
        $this->productModel->init($tables);
        $bricksList = new \Pimcore\Model\DataObject\Objectbrick\Definition\Listing();
        $bricks     = $bricksList->load();
        foreach ($bricks as $brickObj) {
            $this->allBricksList[] = $brickObj->getKey();
        }
        $this->brickTablePrefixArray = [
            'queryTable' => 'object_brick_query_',
            'storeTable' => 'object_brick_store_'
        ];
        $this->products = [];
        $this->categories = [];
        $catList = $this->productModel->getCategories();
        foreach($catList as $cat) {
            $fullCode = $cat['fullCode'];
            $this->categories[$fullCode] = array(
                'data' =>  $cat,
                'id'    =>  $cat['oo_id'],
                'fullPath'  =>  $cat['path'].$cat['key']
            );
            unset($fullCode);
        }
        $this->materialGroup = [];
        $materialGrpList = $this->productModel->getMaterialGroupData();
        foreach($materialGrpList as $materialGrp) {
            $code = $materialGrp['code'];
            $this->materialGroup[$code] = $materialGrp['oo_id'];
            unset($code);
        }
    }

    public function import()
    {
        $sapFileFeeder  = $this->container->get('import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('product');
        if($this->filePath){
            $csvInfo = ImportService::getCSVData($this->filePath);
            $this->csvHeader = array_flip($csvInfo['header']);

            try {
                $this->initImportTable();
                Logger::log(self::LOGGER_MODULE)->info("SAP import started");
                $this->productModel->truncateTempTable();
                $this->productModel->insertDataInTemp($csvInfo['data']);
                Logger::log(self::LOGGER_MODULE)->info("Data Sheet imported in temp table");
                $this->productModel->processDeletedProducts();
                Logger::log(self::LOGGER_MODULE)->info("Removed records in data sheet, marked as unpublished.");
                Logger::log(self::LOGGER_MODULE)->info("Product import started");
                $this->initiateProductsProcess();
                Logger::log(self::LOGGER_MODULE)->info("Product import completed");
                $this->productModel->updateMaster();
                Logger::log(self::LOGGER_MODULE)->info("Data copied from temp table to master table");

                if (!empty($this->updatedArticlesArray) && count($this->updatedArticlesArray)>0) {
                    echo "Object Saving started for completeness.".PHP_EOL;
                    $this->saveProducts($this->updatedArticlesArray);
                    echo "Object Saving completed for completeness.".PHP_EOL;
                }

                if (!empty($this->baseSiopMismatchLog) && count($this->baseSiopMismatchLog)>0) {
                    $this->productModel->removeArticlesFromMaster($this->baseSiopMismatchLog);
                    Logger::log(self::LOGGER_MODULE)->info("failed records removed from master table.");
                    $this->sendSkippedArticlesEmailNotification($this->baseSiopMismatchLog,
                     $this->baseSiopMismatchEmailTemplate);
                }
            } catch (\Throwable $th) {
                Logger::error($this->logFileName, $th);
                die;
            }

        }else{
            die;
        }

    }

    public function sendSkippedArticlesEmailNotification($skippedArticles, $emailTemplate) {
        try {
            if (!empty($skippedArticles) && count($skippedArticles)>0) {
                $fileName = "PTGEU_SAP_import_skipped_articles_" . '-' . date('YmdHis') . '.csv';
                $logFilePath = PIMCORE_SYSTEM_TEMP_DIRECTORY."/".$fileName;
                $fp = fopen($logFilePath, 'wb');
                fputcsv($fp, ['articleNumber', 'siop', '6digit', 'mismatchedSiopCode', 'mismatchedArticleNumber']);
                foreach ($skippedArticles as $article) {
                    fputcsv($fp, $article);
                }
                fclose($fp);
                if (!empty($emailTemplate)) {
                    $doc = \Pimcore\Model\Document::getByPath($emailTemplate);
                    if (!empty($doc)) {
                        // Sending the mail
                        $emailParams = [
                            'templateName' => $emailTemplate,
                            'attachment' => $logFilePath
                        ];
                        $this->emailService = $this->container->get('email.email_notification_service');
                        $this->emailService->sendNotificationsEmail($emailParams);
                    }else {
                        throw \Exception("Base SIOP mismatch email template not found.");
                    }
                } else {
                    throw \Exception("Base SIOP mismatch email template not configured.");
                }
            }
        } catch (\Throwable $th) {
            Logger::log(self::LOGGER_MODULE)->error($th);
        }
    }

    public function initiateProductsProcess() {
        $a = time();
        $delta = $this->productModel->getDelta();
        $this->setVariablesToEmpty();
        $deltaCount = count($delta);
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("Product Delta count: ".$deltaCount);
        $j = 1;

        $this->logArray = [];
        $i = 0;
        $length = 1000;
        while ($i<$deltaCount) {
            $diff = $deltaCount-$i;
            if ($diff < $length) {
                $length = $diff;
            }
            $partialData = array_slice($delta, $i, $length);
            $this->processProducts($partialData);
            $partialData = null;
            unset($partialData);
            $i = $i+$length;
            echo "Record Processed: ".$i.". ";
            $b = time();
            echo "Part ".$j." completed in time: ".$a."====".$b.PHP_EOL;
            \Pimcore::collectGarbage();
            gc_collect_cycles();
            $a = time();
            $j++;
        }
    }

    public function setVariablesToEmpty() {
        unset($this->products, $this->logArray, $this->objectsTableData,
         $this->queryTableDataArray, $this->storeTableDataArray, $this->localisedQueryTableDataArray,
         $this->localisedDataTableDataArray, $this->dependencyTableDataArray);
        unset($this->bricksDataArray);
        $this->products = [];
        $this->logArray = [];
        $this->objectsTableData = [];
        $this->queryTableDataArray = [];
        $this->storeTableDataArray = [];
        $this->localisedQueryTableDataArray = [];
        $this->localisedDataTableDataArray = [];
        $this->relationTableDataArray = [];
        $this->relationTableDataDeleteArray = [];
        $this->dependencyTableDataArray = [];
        $this->bricksDataArray = [];
        foreach ($this->langArr as $lang) {
            $this->localisedQueryTableDataArray[$lang] = [];
        }
        echo "Memory usage before garbage collector: ". memory_get_usage().PHP_EOL;
        \Pimcore::collectGarbage();
    }

    public function processProducts($data) {
        foreach ($data as $row) {
            $this->processSingleRecord($row['siopfullcode'], $row);
        }
        $this->insertDataInDB();
        $this->productModel->insertDataToLogTable($this->logArray);
        unset($data, $row);
        $this->setVariablesToEmpty();
    }

    public function insertDataInDB() {
        if(!empty($this->queryTableDataArray)) {
            $this->productModel->insertIntoProductTable($this->queryTableDataArray, 'object_query_38');
        }
        if(!empty($this->storeTableDataArray)) {
            $this->productModel->insertIntoProductTable($this->storeTableDataArray, 'object_store_38');
        }
        if (!empty($this->relationTableDataArray)) {
            $this->productModel->deleteRelationTableRecords($this->relationTableDataDeleteArray);
            $this->productModel->insertIntoProductTable($this->relationTableDataArray, 'object_relations_38');
        }

        foreach ($this->langArr as $lang) {
            if (!empty($this->localisedQueryTableDataArray[$lang])) {
                $tbl = 'object_localized_query_38_'.($lang);
                $this->productModel->insertIntoProductTable($this->localisedQueryTableDataArray[$lang], $tbl);
            }
        }
        if (!empty($this->localisedDataTableDataArray)) {
            $this->productModel->insertIntoProductTable($this->localisedDataTableDataArray, 'object_localized_data_38');
        }
        if (!empty($this->dependencyTableDataArray)) {
            $this->productModel->insertIntoProductTable($this->dependencyTableDataArray, 'dependencies');
        }
        if (!empty($this->bricksDataArray)) {
            foreach ($this->bricksDataArray as $tbl => $data) {
                if (!empty($data)) {
                    $this->productModel->insertIntoProductTable($data, $tbl);
                }
            }
        }
    }

    private function getRecordIndexByKey($key) {
        return $this->csvHeader[$this->columnName[$key]];
    }

    public function createPTGObject($record, $parentId, $parentPath, $levelInfo, $type)
    {

        $objectIndex        = $this->productHelper->getObjectIndex($type, $levelInfo);

        $currentLevelCode   = $levelInfo[$objectIndex]['levelFullCode'];

        $fertLevelCode      = $levelInfo[count($levelInfo)]['levelFullCode'];

        $categoryPath       = $this->categories[$currentLevelCode]['fullPath'];

        if ($type == 'base' || $type == 'skeleton') {
            $currentLevelPath = $this->productHelper->convertCategoryPathToProduct($categoryPath);
            $currentLevelArray = explode('/', $currentLevelPath);
            $objectKey = $currentLevelArray[count($currentLevelArray)-1];
        } elseif ($type == 'fert') {
            $objectKey = $record[$this->getRecordIndexByKey('material')];
            $description = \Pimcore\File::getValidFilename($record[$this->getRecordIndexByKey('description')]);
            if (!empty($description)) {
                $objectKey = $objectKey."-".$description;
            }
            $objectKey = \Pimcore\Model\Element\Service::getValidKey($objectKey, 'object');
            $objectIndex = count($levelInfo);
        }
        $objectArr = [
            'parentId' => $parentId,
            'key' => $objectKey,
            'path' => $parentPath.'/',
            'className' => 'PTGEUProduct'
        ];
        $currentLevelPath = $parentPath.'/'.$objectKey;

        if (!array_key_exists($currentLevelPath, $this->products)) {
            if ($type == 'fert') {
                // Need to check the current path of fert, changed or not
                $newPath = explode("/", $currentLevelPath);
                array_pop($newPath);
                $newPath = implode("/", $newPath);

                $productObj = new \Pimcore\Model\DataObject\PTGEUProduct;
                $currentPathId = $productObj->getByPath($newPath)->getId();

                $articleNumber = $record[$this->getRecordIndexByKey('material')];
                $data = $this->productModel->checkIfArticleExists($articleNumber);

                if (!empty($data)) {
                    $objId = $data[0]['oo_id'];
                    $objectArr['id'] = $objId;
                    $objectArr['parentId'] = $currentPathId;
                }
            }
            $objId = $this->productModel->insertInObjects($objectArr);
            $this->products[$currentLevelPath] = $objId;
            $this->getQueryTableData($objId, $record, $levelInfo, $objectIndex, $type, 'PTGEU');
            $this->getStoreTableData($objId, $record, $levelInfo, $objectIndex, $type, 'PTGEU');
            $this->getRelationTableData($objId, $record, $levelInfo, $objectIndex, $type);
            $this->getLocalizedQueryData($objId, $record, $type);
            $this->getDependencyTableData($objId, $record, $levelInfo, $objectIndex, $type);
            $groupNames = $this->categories[$fertLevelCode]['data']['RelatedObjectBrick'];
            $groupNames = trim($groupNames, ',');
            if (!empty($groupNames)) {
                $groupNamesArray = explode(',', $groupNames);
                $bricksList = $this->brickMappingService->getMappedBrickKeys($groupNamesArray, $type);
                $this->setBricksData($objId, $bricksList, $type, $record);
                unset($groupNames, $groupNamesArray, $bricksList);
            }
        } else {

            $objId = $this->products[$currentLevelPath];
        }
        unset($objectIndex, $currentLevelCode, $fertLevelCode, $categoryPath,
         $type, $currentLevelArray, $objectKey, $objectArr, $parentPath);
        return [$objId, $currentLevelPath];
    }

    public function processSingleRecord($siopCode, $row) {
        $recData =  (array) json_decode($row['record']);
        $status = 'Failed';
        $errorFlag = false;
        $prodHier5 = $recData[$this->getRecordIndexByKey('prodHier5')];
        $prodHier7 = $recData[$this->getRecordIndexByKey('prodHier7')];

        if (array_key_exists($siopCode, $this->categories)) {

            if ($this->productHelper->isValidCategoryCode($siopCode)) {

                if($this->productModel->checkHierarchyExistAtLevel($prodHier5, 5) &&
                $this->productModel->checkHierarchyExistAtLevel($prodHier7, 7)) {

                    if (!empty(trim($recData[$this->getRecordIndexByKey('group')]))) {
                        echo $recData['0'].PHP_EOL;
                        $record = array(
                            'code'  =>  $siopCode,
                            'description'   =>  $recData[$this->getRecordIndexByKey('description')],
                            'material'  =>  $recData[$this->getRecordIndexByKey('material')]
                        );

                        $result = $this->processLevelInfo($record, $recData, $errorFlag);
                        $status = $result['status'];
                        $msg    = $result['msg'];
                    } else {
                        $msg = 'Material Group code can not be empty.';
                    }
                }
                else
                {
                    $msg = '5th or 7th level hierarchy does not exists.';
                }
            } else {
                $msg = 'Siop Category code and its length does not match.';
            }
        } else {
            $msg = 'SIOP Category not exists.';
        }

        $logRow = [
            'id' => $recData[$this->getRecordIndexByKey('material')],
            'siopfullcode' => $siopCode,
            'record' => $row['record'],
            'statusCode' => $status,
            'failedReason' => $msg
        ];
        if ($status =='Failed' && !array_key_exists($recData[$this->getRecordIndexByKey(
            'material')], $this->baseSiopMismatchLog)) {
            $this->baseSiopMismatchLog[$recData[$this->getRecordIndexByKey('material')]] = [
                'articleNumber' => $recData[$this->getRecordIndexByKey('material')],
                'siop' => $siopCode,
                '6digit' => null,
                'mismatchedSiopCode' => null,
                'mismatchedArticleNumber' => null
            ];
        }
        $this->logArray[] = $logRow;
        $logRow = null;
        unset($logRow);
    }

    private function processLevelInfo($record, $recData, $errorFlag)
    {
        $levelInfo = $this->productHelper->getLevels($record['code'], $record);
        if ($levelInfo['status']) {
            $folderIndex = count($levelInfo['levels'])-3;
            $folderCode = $levelInfo['levels'][$folderIndex]['levelFullCode'];
            $folderPath = $this->categories[$folderCode]['fullPath'];

            $folderPath = $this->productHelper->convertCategoryPathToProduct($folderPath);

            if (!array_key_exists($folderPath, $this->products)) {
                $folderId = $this->productHelper->getFolderByPath($folderPath);
                $this->products[$folderPath] = $folderId;
            } else {
                $folderId = $this->products[$folderPath];
            }
            $levelArray = $this->createPTGObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'base');
            if (!$errorFlag) {
                $this->updatedArticlesArray[] = $levelArray[0];
            }
            $levelArray = $this->createPTGObject($recData, $levelArray[0],
             $levelArray[1], $levelInfo['levels'], 'skeleton');
            if (!$errorFlag) {
                $this->updatedArticlesArray[] = $levelArray[0];
            }
            $levelArray = $this->createPTGObject($recData, $levelArray[0],
             $levelArray[1], $levelInfo['levels'], 'fert');

            $status = 'Success';
            $msg = 'Object Id is: '.$levelArray[0];

            if (!$errorFlag) {
                $this->updatedArticlesArray[] = $levelArray[0];
            }
            $this->updatedArticlesArray = array_unique($this->updatedArticlesArray);
        }
        unset($record, $levelInfo, $folderIndex, $folderCode, $folderId, $folderPath, $levelArray);

        return ['status' => $status,
                'msg' => $msg
            ];
    }

    public function getLocalizedQueryData($objId, $record, $productType = 'fert') {

        foreach ($this->langArr as $lang) {
            $sapDescription     = null;

            if ($lang == 'en' && strtolower($productType) == 'fert') {
                $sapDescription     = trim($record[$this->getRecordIndexByKey('description')]);
            }
            $this->localisedDataTableDataArray[] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $sapDescription
            ];
            $this->localisedQueryTableDataArray[$lang][] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $sapDescription
            ];
        }
    }

    public function getBeltTypeId($beltType) {
        if(empty($beltType))
        {
            return null;
        }

        $beltTypeList = new \Pimcore\Model\DataObject\PTGEUBeltType\Listing();
        $beltTypeList->setCondition("beltType = ". $beltTypeList->quote(trim($beltType)));

        foreach ($beltTypeList as $belt) {
            return $belt->getId();
        }
    }

    public function getQueryTableData($objId, $record, $levelInfo, $level=4,
    $productType = 'fert', $businessUnit = 'PTGEU') {
        $siopData = [];
        for ($k=1; $k<=7; $k++) {
            $index = 'hierarchyLevel'.$k;
            if ($k<=$level) {
                $catCode = $levelInfo[$k]['levelFullCode'];
                $siopData[$index] = ",".$this->categories[$catCode]['id'].",";
            } else {
                $siopData[$index] = null;
            }
        }
        $siopFullCode = trim($record[$this->getRecordIndexByKey('code')]);
        if ($productType == 'base') {
            $siopFullCode = $levelInfo[$level]['levelFullCode'];
        }
        $queryTableData = [
            'oo_id' => $objId,
            'oo_classId' => 38,
            'oo_className' => 'PTGEUProduct',
            'productType' => strtolower($productType),
            'businessUnit' => strtoupper($businessUnit),
            'siopFullCode' => $siopFullCode,
            'articleNumber' => null,
            'materialGroup__id' => null,
            'materialGroup__type' => null,
            'oldMaterialCode' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'eanUpc' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null,
            'profile' => null,
            'ProductName' => null,
            'Color' => null,
            'fabricType' => null,
            'fabricColor' => null,
            'quality' => null,
            'performance' => null,
            'beltAngle' => null,
            'beltType' => null,
            'material' => null,
            'nominalLength' => null,
            'maxSpeed' => null,
            'matchMakerLL' => null,
            'din' => null,
            'heatAndOilResistant' => null,
            'minimumTemperatureC' => null,
            'minimumTemperatureF' => null,
            'maximumTemperatureC' => null,
            'maximumTemperatureF' => null,
            'industryStandard' => null,
            'reinforcement' => null,
            'staticConductive' => null,
            'beltHardness' => null,
            'beltTolerance' => null,
            'minPulleyDia' => null,
            'minOutsidePulleyDia' => null,
            'sapDescriptionLanguage' => null,
            'materialType' => null,
            'priceRef' => null,
            // 'vtlStatus' => null
        ];

        if (strtolower($productType) == 'base') {
            $queryTableData['ProductName'] = trim($record[$this->getRecordIndexByKey('ProductName')]);
            $queryTableData['fabricType'] = trim($record[$this->getRecordIndexByKey('fabricType')]);
            $queryTableData['fabricColor'] = trim($record[$this->getRecordIndexByKey('fabricColor')]);
            $queryTableData['quality'] = trim($record[$this->getRecordIndexByKey('quality')]);
            $queryTableData['heatAndOilResistant'] = trim($record[$this->getRecordIndexByKey('heatAndOilResistant')]);
            $queryTableData['minimumTemperatureC'] = trim($record[$this->getRecordIndexByKey('minimumTemperatureC')]);
            $queryTableData['minimumTemperatureF'] = trim($record[$this->getRecordIndexByKey('minimumTemperatureF')]);
            $queryTableData['maximumTemperatureC'] = trim($record[$this->getRecordIndexByKey('maximumTemperatureC')]);
            $queryTableData['maximumTemperatureF'] = trim($record[$this->getRecordIndexByKey('maximumTemperatureF')]);
            $queryTableData['beltHardness'] = trim($record[$this->getRecordIndexByKey('beltHardness')]);

            $materialGroupCode  = trim($record[$this->getRecordIndexByKey('group')]);
            $materialGrpId      = $this->getOrCreateMaterialGroupCodeId($materialGroupCode);
            if(!empty($materialGrpId)) {
                $queryTableData['materialGroup__id'] = $materialGrpId;
                $queryTableData['materialGroup__type'] = 'object';
            }

            $beltType                   = trim($record[$this->getRecordIndexByKey('beltType')]);
            $queryTableData['beltType'] = $this->getBeltTypeId($beltType);

            $baseObject = DataObject\PTGEUProduct::getById($objId);

            $reinforcementValuesToBeMapped = [];
            $reinforcementValue     = trim($record[$this->getRecordIndexByKey('reinforcement')]);
            $reinforcementValueArr  = explode('|', $reinforcementValue);
            $fd = $baseObject->getClass()->getFieldDefinition("reinforcement");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                foreach($reinforcementValueArr as $eachReinforcementValue){
                    if(strtolower($eachOptions['value']) == strtolower($eachReinforcementValue)){
                        array_push($reinforcementValuesToBeMapped,$eachOptions['value']);
                    }
                }

            }
            $reinforcements  = implode(',', $reinforcementValuesToBeMapped);
            $queryTableData['reinforcement'] = $reinforcements;

            $performance = trim($record[$this->getRecordIndexByKey('performance')]);
            $fd = $baseObject->getClass()->getFieldDefinition("performance");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if(strtolower($eachOptions['value']) == strtolower($performance)){
                    echo $eachOptions['value'].PHP_EOL;
                    $queryTableData['performance'] = trim($eachOptions['value']);
                }
            }

            $materialCompound = trim($record[$this->getRecordIndexByKey('materialCompound')]);
            $fd = $baseObject->getClass()->getFieldDefinition("material");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if($eachOptions['value'] == $materialCompound){
                    $queryTableData['material'] = trim($record[$this->getRecordIndexByKey('materialCompound')]);
                }
            }

            $color = trim($record[$this->getRecordIndexByKey('Color')]);
            $fd = $baseObject->getClass()->getFieldDefinition("Color");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if(strtolower($eachOptions['value']) == strtolower($color)){
                    $queryTableData['Color'] = trim($eachOptions['value']);
                }
            }

            $staticConductive = trim($record[$this->getRecordIndexByKey('staticConductive')]);
            $fd = $baseObject->getClass()->getFieldDefinition("staticConductive");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if(strtolower($eachOptions['value']) == strtolower($staticConductive)){
                    $queryTableData['staticConductive'] = trim($eachOptions['value']);
                }
            }

        }

        if (strtolower($productType) == 'skeleton') {
            $queryTableData['profile'] = trim($record[$this->getRecordIndexByKey('profile')]);
            $queryTableData['beltAngle'] = trim($record[$this->getRecordIndexByKey('beltAngle')]);
            $queryTableData['maxSpeed'] = trim($record[$this->getRecordIndexByKey('maxSpeed')]);
            $queryTableData['minPulleyDia'] = trim($record['61']);
            $queryTableData['minOutsidePulleyDia'] = trim($record['62']);
            $queryTableData['nominalLength'] = trim($record[$this->getRecordIndexByKey('nominalLength')]);
        }

        if (strtolower($productType) == 'fert') {
            $queryTableData['articleNumber'] = trim($record[$this->getRecordIndexByKey('material')]);
            $queryTableData['oldMaterialCode'] = trim($record[$this->getRecordIndexByKey('oldMaterial')]);
            $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            $queryTableData['grossWeight'] = $grossWeight;
            $queryTableData['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            $queryTableData['din'] = trim($record[$this->getRecordIndexByKey('din')]);
            $queryTableData['industryStandard'] = trim($record[$this->getRecordIndexByKey('industryStandard')]);
            $queryTableData['eanUpc'] = trim($record[$this->getRecordIndexByKey('eanUPC')]);
            $queryTableData['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            $queryTableData['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey(
                'manufacturePartNumber')]);
            $queryTableData['matchMakerLL'] = trim($record[$this->getRecordIndexByKey('matchMakerLL')]);
            $queryTableData['beltTolerance'] = trim($record[$this->getRecordIndexByKey('beltTolerance')]);
            $queryTableData['sapDescriptionLanguage'] = trim($record[$this->getRecordIndexByKey('language')]);
            $queryTableData['materialType'] = trim($record[$this->getRecordIndexByKey('materialType')]);
            $queryTableData['priceRef'] = trim($record[$this->getRecordIndexByKey('priceRef')]);

            $fertObject = DataObject\PTGEUProduct::getById($objId);

            $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            $fd = $fertObject->getClass()->getFieldDefinition("weightUnit");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if($eachOptions['value'] == $weightUnit){
                    $queryTableData['weightUnit'] = trim($record[$this->getRecordIndexByKey('weightUnit')]);
                }
            }
            // $vtlstatus = trim($record[$this->getRecordIndexByKey('vtlStatus')]);
            // $vtlObject = $this->getVtlStatus($vtlstatus);
            // if($vtlObject !=''){
            //     $queryTableData['vtlStatus'] = trim($vtlObject);
            // }
        }

        $this->queryTableDataArray[] = array_merge($queryTableData, $siopData);
    }

    private function getVtlStatus(string $value)
    {
        $objVtl = new DataObject\PTGEUVTL\Listing();
        $objVtl->setCondition("description = ?", $value);
        if(!empty($objVtl))
        {
            foreach ($objVtl as $object) {
                return $object->getId();
            }
        }
        return '';

    }

    public function getStoreTableData($objId, $record, $levelInfo, $level=4,
     $productType = 'fert', $businessUnit = 'PTGEU') {
        $siopFullCode = trim($record[$this->getRecordIndexByKey('code')]);
        if ($productType == 'base') {
            $siopFullCode = $levelInfo[$level]['levelFullCode'];
        }
        $storeTableDataArray = [
            'oo_id' => $objId,
            'ProductType' => strtolower($productType),
            'businessUnit' => strtoupper($businessUnit),
            'siopFullCode' => $siopFullCode,
            'articleNumber' => null,
            'oldMaterialCode' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'eanUpc' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null,
            'profile' => null,
            'ProductName' => null,
            'Color' => null,
            'fabricType' => null,
            'fabricColor' => null,
            'quality' => null,
            'performance' => null,
            'beltAngle' => null,
            'beltType' => null,
            'material' => null,
            'nominalLength' => null,
            'maxSpeed' => null,
            'matchMakerLL' => null,
            'din' => null,
            'heatAndOilResistant' => null,
            'minimumTemperatureC' => null,
            'minimumTemperatureF' => null,
            'maximumTemperatureC' => null,
            'maximumTemperatureF' => null,
            'industryStandard' => null,
            'reinforcement' => null,
            'staticConductive' => null,
            'beltHardness' => null,
            'beltTolerance' => null,
            'minPulleyDia' => null,
            'minOutsidePulleyDia' => null,
            'sapDescriptionLanguage' => null,
            'materialType' => null,
            'priceRef' => null,
            // 'vtlStatus' => null

        ];

        if (strtolower($productType) == 'base') {
            $storeTableDataArray['ProductName'] = trim($record[$this->getRecordIndexByKey('ProductName')]);
            $storeTableDataArray['fabricType'] = trim($record[$this->getRecordIndexByKey('fabricType')]);
            $storeTableDataArray['fabricColor'] = trim($record[$this->getRecordIndexByKey('fabricColor')]);
            $storeTableDataArray['quality'] = trim($record[$this->getRecordIndexByKey('quality')]);
            $storeTableDataArray['heatAndOilResistant'] = trim($record[$this->getRecordIndexByKey(
                'heatAndOilResistant')]);
            $storeTableDataArray['minimumTemperatureC'] = trim($record[$this->getRecordIndexByKey(
                'minimumTemperatureC')]);
            $storeTableDataArray['minimumTemperatureF'] = trim($record[$this->getRecordIndexByKey(
                'minimumTemperatureF')]);
            $storeTableDataArray['maximumTemperatureC'] = trim($record[$this->getRecordIndexByKey(
                'maximumTemperatureC')]);
            $storeTableDataArray['maximumTemperatureF'] = trim($record[$this->getRecordIndexByKey(
                'maximumTemperatureF')]);
            $storeTableDataArray['beltHardness'] = trim($record[$this->getRecordIndexByKey('beltHardness')]);

            $beltType                       = trim($record[$this->getRecordIndexByKey('beltType')]);
            $storeTableDataArray['beltType']= $this->getBeltTypeId($beltType);

            $baseObject = DataObject\PTGEUProduct::getById($objId);

            $reinforcementValuesToBeMapped = [];
            $reinforcementValue     = trim($record[$this->getRecordIndexByKey('reinforcement')]);
            $reinforcementValueArr  = explode('|', $reinforcementValue);
            $fd = $baseObject->getClass()->getFieldDefinition("reinforcement");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                foreach($reinforcementValueArr as $eachReinforcementValue){
                    if(strtolower($eachOptions['value']) == strtolower($eachReinforcementValue)){
                        array_push($reinforcementValuesToBeMapped,$eachOptions['value']);
                    }
                }

            }
            $reinforcements  = implode(',', $reinforcementValuesToBeMapped);
            $storeTableDataArray['reinforcement'] = $reinforcements;


            $performance = trim($record[$this->getRecordIndexByKey('performance')]);
            $fd = $baseObject->getClass()->getFieldDefinition("performance");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if(strtolower($eachOptions['value']) == strtolower($performance)){
                    $storeTableDataArray['performance'] = trim($eachOptions['value']);
                }
            }

            $materialCompound = trim($record[$this->getRecordIndexByKey('materialCompound')]);
            $fd = $baseObject->getClass()->getFieldDefinition("material");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if(strtolower($eachOptions['value']) == strtolower($materialCompound)){
                    $storeTableDataArray['material'] = trim($eachOptions['value']);
                }

            }

            $color = trim($record[$this->getRecordIndexByKey('Color')]);
            $fd = $baseObject->getClass()->getFieldDefinition("Color");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if(strtolower($eachOptions['value']) == strtolower($color)){
                    $storeTableDataArray['Color'] = trim($eachOptions['value']);
                }
            }

            $staticConductive = trim($record[$this->getRecordIndexByKey('staticConductive')]);
            $fd = $baseObject->getClass()->getFieldDefinition("staticConductive");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if(strtolower($eachOptions['value']) == strtolower($staticConductive)){
                    $storeTableDataArray['staticConductive'] = trim($eachOptions['value']);
                }
            }
        }

        if (strtolower($productType) == 'skeleton') {
            $storeTableDataArray['profile'] = trim($record[$this->getRecordIndexByKey('profile')]);
            $storeTableDataArray['beltAngle'] = trim($record[$this->getRecordIndexByKey('beltAngle')]);
            $storeTableDataArray['maxSpeed'] = trim($record[$this->getRecordIndexByKey('maxSpeed')]);
            $storeTableDataArray['minPulleyDia'] = trim($record['61']);
            $storeTableDataArray['minOutsidePulleyDia'] = trim($record['62']);
            $storeTableDataArray['nominalLength'] = trim($record[$this->getRecordIndexByKey('nominalLength')]);

        }

        if (strtolower($productType) == 'fert') {
            $storeTableDataArray['articleNumber'] = trim($record[$this->getRecordIndexByKey('material')]);
            $storeTableDataArray['oldMaterialCode'] = trim($record[$this->getRecordIndexByKey('oldMaterial')]);
            $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            $storeTableDataArray['grossWeight'] = $grossWeight;
            $storeTableDataArray['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            $storeTableDataArray['din'] = trim($record[$this->getRecordIndexByKey('din')]);
            $storeTableDataArray['industryStandard'] = trim($record[$this->getRecordIndexByKey('industryStandard')]);
            $storeTableDataArray['eanUpc'] = trim($record[$this->getRecordIndexByKey('eanUPC')]);
            $storeTableDataArray['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            $storeTableDataArray['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey(
                'manufacturePartNumber')]);
            $storeTableDataArray['matchMakerLL'] = trim($record[$this->getRecordIndexByKey('matchMakerLL')]);
            $storeTableDataArray['beltTolerance'] = trim($record[$this->getRecordIndexByKey('beltTolerance')]);
            $storeTableDataArray['sapDescriptionLanguage'] = trim($record[$this->getRecordIndexByKey('language')]);
            $storeTableDataArray['materialType'] = trim($record[$this->getRecordIndexByKey('materialType')]);
            $storeTableDataArray['priceRef'] = trim($record[$this->getRecordIndexByKey('priceRef')]);

            $fertObject = DataObject\PTGEUProduct::getById($objId);

            $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            $fd = $fertObject->getClass()->getFieldDefinition("weightUnit");
            $options = $fd->getOptions();
            foreach($options as $eachOptions){
                if($eachOptions['value'] == $weightUnit){
                    $storeTableDataArray['weightUnit'] = trim($record[$this->getRecordIndexByKey('weightUnit')]);
                }
            }
            // $vtlstatus = trim($record[$this->getRecordIndexByKey('vtlStatus')]);
            // $vtlObject = $this->getVtlStatus($vtlstatus);
            // if($vtlObject !=''){
            //     $storeTableDataArray['vtlStatus'] = trim($vtlObject);
            // }
        }

        $this->storeTableDataArray[] = $storeTableDataArray;
    }

    public function getRelationTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert') {
        for ($k=1; $k<=$level; $k++) {
            $index = 'hierarchyLevel'.$k;
            $catCode = $levelInfo[$k]['levelFullCode'];
            $targetId = $this->categories[$catCode]['id'];
            $this->relationTableDataDeleteArray[$index][] = $objId;
            $this->relationTableDataArray[] = [
                'src_id' => $objId,
                'dest_id' => $targetId,
                'type' => 'object',
                'fieldname' => $index,
                'ownertype' => 'object',
                'index' => 0,
                'ownername' => '',
                'position' => 0
            ];
        }
        if (strtolower($productType) == 'base') {
            $materialGroupCode = trim($record[$this->getRecordIndexByKey('group')]);
            $materialGroupId = $this->getOrCreateMaterialGroupCodeId($materialGroupCode);
            if (!empty($materialGroupId)) {
                $this->relationTableDataArray[] = [
                    'src_id' => $objId,
                    'dest_id' => $materialGroupId,
                    'type' => 'object',
                    'fieldname' => "materialGroup",
                    'ownertype' => 'object',
                    'index' => 0,
                    'ownername' => '',
                    'position' => 0
                ];
            }
        }
    }

    public function getDependencyTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert') {
        for ($k=1; $k<=$level; $k++) {
            $catCode = $levelInfo[$k]['levelFullCode'];
            $targetId = $this->categories[$catCode]['id'];
            $this->dependencyTableDataArray[] = [
                'sourceid' => $objId,
                'targetid' => $targetId,
                'sourcetype' => 'object',
                'targettype' => 'object'
            ];
        }
        if (strtolower($productType) == 'base') {
            $materialGroupCode = trim($record[$this->getRecordIndexByKey('group')]);
            $materialGroupId = $this->getOrCreateMaterialGroupCodeId($materialGroupCode);
            if (!empty($materialGroupId)) {
                $this->dependencyTableDataArray[] = [
                    'sourceid' => $objId,
                    'targetid' => $materialGroupId,
                    'sourcetype' => 'object',
                    'targettype' => 'object'
                ];
            }
        }
    }

    public function setBricksData($objId, $bricks, $type, $record) {
        $csvHeader      = array_flip($this->csvHeader);
        $rowData        = array_combine($csvHeader, $record);
        $bricksUnitData = $this->productHelper->processBricksUnitData();
        foreach ($bricks as $brick) {
            $bricksData     = $this->productHelper->processBricksData($rowData, $brick);
            if (in_array($brick, $this->allBricksList) && $brick!='PTGEUVBeltsBase') {
                foreach ($this->brickTablePrefixArray  as $brickPrefix) {
                    $tblName    = $brickPrefix.ucfirst($brick)."_38";
                    $unitData   = $this->productHelper->checkBrickUnitData($bricksUnitData, $brick);
                    $tableData  = array_merge(['id' => $objId, 'fieldname' => ucfirst($type)],
                    $bricksData, $unitData);
                    $this->bricksDataArray[$tblName][] = $tableData;
                }
            }
        }
    }

    public function getOrCreateMaterialGroupCodeId($materialGroupCode) {
        if (!empty($materialGroupCode) && !empty($this->materialGroup[$materialGroupCode])) {
            return $this->materialGroup[$materialGroupCode];
        }
        return null;
    }

    public function saveProducts($updatedArticlesArray) {
            foreach ($updatedArticlesArray as $objectId) {
                if (!empty($objectId)) {
                    $object = DataObject\PTGEUProduct::getById($objectId);
                    if (!empty($object) && $object instanceof \Pimcore\Model\DataObject\PTGEUProduct) {
                        $object->save();
                    }
                }
            }
    }
}
