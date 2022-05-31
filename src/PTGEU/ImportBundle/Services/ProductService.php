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

class ProductService
{    
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    public $configuredData; // We will pull the data from configured class for this variable
    private $logFileName;
    private $productModel;
    private $catHelper;
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
    
    const LOGGER_MODULE = 'SAP IMPORT SHEET';
    const FILE_LAST_COL = 'D';
    const MAX_TOP_CAT_LVL = 6;
    const MIN_TOP_CAT_LVL = 4;
    const GROSS_WEIGHT_UNITS = [
        "LB" => UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT,
        "KG" => UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_FT,
        "G" => UnitConversion\WeightPerLengthConverter::UNIT_G_PER_FT
    ];
    
    public function __construct()
    {
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->logFileName          = 'PTGEU_Material' . date('Ymdhis');
        $this->common               = \Pimcore::getContainer()->get('import.common_helper');
        $this->productModel         = new ProductModel;
        $this->productHelper        = \Pimcore::getContainer()->get('import.product_helper');
        $this->materialConfigData   = \Pimcore::getContainer()->get('import.config_provider_service')->getProductConfig();
        $this->catConfigData        = \Pimcore::getContainer()->get('import.config_provider_service')->getCategoryConfig();
        $this->businessUnit         = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->catHelper            = \Pimcore::getContainer()->get('import.category_helper');
        $this->brickMappingService  = \Pimcore::getContainer()->get('import.category_brick_mapping_service');
        $this->columnName           = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'columnName');
        $this->baseSiopMismatchLog  = [];
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
        $this->baseSiopMismatchEmailTemplate = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'baseSIOPMismatchEmailTemplate');
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
                'fullPath'  =>  $cat['o_path'].$cat['o_key']
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
        $sapFileFeeder  = \Pimcore::getContainer()->get('import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('material');

        $csvInfo = ImportService::getCSVData($this->filePath);
        $this->csvHeader = array_flip($csvInfo['header']);

        try {
            $this->initImportTable();
            Logger::log(self::LOGGER_MODULE)->info("SAP import started"); 
            $this->productModel->truncateTempTable();
            $this->productModel->insertDataInTemp($csvInfo['data']);
            Logger::log(self::LOGGER_MODULE)->info("Data Sheet imported in temp table");
            $this->processDeletedProducts();
            Logger::log(self::LOGGER_MODULE)->info("Removed records in data sheet, marked as unpublished.");
            Logger::log(self::LOGGER_MODULE)->info("Product import started");
            $this->initiateProductsProcess();
            Logger::log(self::LOGGER_MODULE)->info("Product import completed");
            $this->productModel->updateMaster();
            Logger::log(self::LOGGER_MODULE)->info("Data copied from temp table to master table");

            if (!empty($this->updatedArticlesArray) && count($this->updatedArticlesArray)>0) {
                echo "Object Saving started for completeness.";         
                $this->saveProducts($this->updatedArticlesArray);
                echo "Object Saving completed for completeness.";
            }

            if (!empty($this->baseSiopMismatchLog) && count($this->baseSiopMismatchLog)>0) {
                $this->productModel->removeArticlesFromMaster($this->baseSiopMismatchLog);
                Logger::log(self::LOGGER_MODULE)->info("failed records removed from master table.");
                $this->sendSkippedArticlesEmailNotification($this->baseSiopMismatchLog, $this->baseSiopMismatchEmailTemplate);
            }
        } catch (\Throwable $th) {
            Logger::error($this->logFileName, $th);
            die;
        }
            
    }

    public function sendSkippedArticlesEmailNotification($skippedArticles, $emailTemplate) {
        try {
            if (!empty($skippedArticles) && count($skippedArticles)>0) {
                $fileName = "PTGEU_SAP_import_skipped_articles_" . '-' . date('YmdHis') . '.csv';
                $logFilePath = PIMCORE_TEMPORARY_DIRECTORY."/".$fileName;
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
                        $this->emailService = \Pimcore::getContainer()->get('email.email_notification_service');
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
    
    public function saveProducts($updatedArticlesArray) {
        foreach ($updatedArticlesArray as $objectId) {
            if (!empty($objectId)) {
                $object = DataObject\PTGEUProduct::getById($objectId, true);
                if (!empty($object) && $object instanceof \Pimcore\Model\DataObject\PTGEUProduct) {
                    $object->save();
                }
            }
        }
    }

    public function processDeletedProducts() {
        $deletedProducts = $this->productModel->getDeletedProducts();
        if (!empty($deletedProducts) && count($deletedProducts)>0) {
            $keysArray = [];
            foreach ($deletedProducts as $product) {
                $keysArray[] = $product['id'];
            }
            $obj = new DataObject\PTGEUProduct\Listing();
            $obj->setCondition("articleNumber IN (". implode(', ' , $keysArray).")");
            $obj->load();
            foreach($obj as $product) {
                echo "Mark Product unpublished for id = ".$product->getId()." and article number = ".$product->getArticleNumber().PHP_EOL;
                $product->setPublished(false);
                $product->save();
            }
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
            echo "Record Processed: ".$i;
            $b = time();
            echo "Part ".$j." completed in time: ".$a."====".$b.PHP_EOL;
            \Pimcore::collectGarbage();
            gc_collect_cycles();
            $a = time();
            $j++;
        }
    }    
    
    public function setVariablesToEmpty() {
        unset($this->products, $this->logArray, $this->objectsTableData, $this->queryTableDataArray, $this->storeTableDataArray, $this->localisedQueryTableDataArray, $this->localisedDataTableDataArray, $this->dependencyTableDataArray);
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
            $objectIndex = count($levelInfo);
        }
        $objectArr = [
            'parentId' => $parentId,
            'o_key' => $objectKey,
            'path' => $parentPath.'/',
            'o_className' => 'PTGEUProduct'
        ];
        $currentLevelPath = $parentPath.'/'.$objectKey;
        if (!array_key_exists($currentLevelPath, $this->products)) {
            if ($type == 'fert') {
                $articleNumber = $record[$this->getRecordIndexByKey('material')];
                $data = $this->productModel->checkIfArticleExists($articleNumber);
                if (!empty($data)) {
                    $objId = $data[0]['oo_id'];
                    $objectArr['o_id'] = $objId;
                    $objectArr['parentId'] = $data[0]['o_parentId'];
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
                $this->setBricksData($objId, $bricksList, $type);
                unset($groupNames, $groupNamesArray, $bricksList);
            }
        } else {
            $objId = $this->products[$currentLevelPath];
        }
        unset($objectIndex, $currentLevelCode, $fertLevelCode, $categoryPath, $type, $currentLevelArray, $objectKey, $objectArr, $parentPath);
        return [$objId, $currentLevelPath];
    }

    public function processSingleRecord($siopCode, $row) {
        $recData =  (array) json_decode($row['record']);
        $status = 'Failed';
        $errorFlag = false;
        if (array_key_exists($siopCode, $this->categories)) {
            
            if ($this->productHelper->isValidCategoryCode($siopCode)) {
                if (!empty(trim($recData[$this->getRecordIndexByKey('group')]))) {
                    echo $recData['0'].PHP_EOL;
                    $record = array(
                        'code'  =>  $siopCode,
                        'description'   =>  $recData[$this->getRecordIndexByKey('description')],
                        'material'  =>  $recData[$this->getRecordIndexByKey('material')]
                    );
                    
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
                        $levelArray = $this->createPTGObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'skeleton');
                        $levelArray = $this->createPTGObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'fert');
                        $status = 'Success';
                        $msg = 'Object Id is: '.$levelArray[0];

                        if (!$errorFlag) {
                            $this->updatedArticlesArray[] = $levelArray[0]; 
                        }
                    }
                    unset($record, $levelInfo, $folderIndex, $folderCode, $folderId, $folderPath, $levelArray);
                } else {
                    $msg = 'Material Group code can not be empty.';
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
        if ($status =='Failed' && !array_key_exists($recData[$this->getRecordIndexByKey('material')], $this->baseSiopMismatchLog)) {
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

    public function getLocalizedQueryData($objId, $record, $productType = 'fert') {
        
        foreach ($this->langArr as $lang) {
            $sapDescription     = null;
            $industryStandard   = null;
            if ($lang == 'en' && strtolower($productType) == 'fert') {
                $sapDescription     = $record['2'];
                $industryStandard   = $record['19'];
            }
            $this->localisedDataTableDataArray[] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $sapDescription,
                'industryStandard' => $industryStandard
            ];
            $this->localisedQueryTableDataArray[$lang][] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $sapDescription,
                'industryStandard' => $industryStandard
            ];
        }
    }

    public function getQueryTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert', $businessUnit = 'PTGEU') {
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
        $siopFullCode = trim($record['6']);
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
            'weightUnit' => null
        ];

        if (strtolower($productType) == 'fert') {
            $queryTableData['articleNumber'] = trim($record['0']);
            $queryTableData['oldMaterialCode'] = trim($record['4']);
            $queryTableData['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            $queryTableData['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey('manufacturePartNumber')]);
            if (!empty(trim($record[$this->getRecordIndexByKey('eanUPC')]))) {
                $queryTableData['eanUpc'] = "0".trim($record[$this->getRecordIndexByKey('eanUPC')]);
            } else {
                $queryTableData['eanUpc'] = trim($record[$this->getRecordIndexByKey('eanUPC')]);
            }
            
            $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            $queryTableData['grossWeight'] = $grossWeight;
            $queryTableData['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            $queryTableData['weightUnit'] = $weightUnit;

            $materialGrpId = $this->getOrCreateMaterialGroupCodeId(trim($record['3']));
            if(!empty($materialGrpId)) {
                $queryTableData['materialGroup__id'] = $materialGrpId;
                $queryTableData['materialGroup__type'] = 'object';
            }
        }
        $this->queryTableDataArray[] = array_merge($queryTableData, $siopData);
    }

    public function getStoreTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert', $businessUnit = 'PTGEU') {
        $siopFullCode = trim($record['6']);
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
            'weightUnit' => null
        ];
        if (strtolower($productType) == 'fert') {
            $storeTableDataArray['articleNumber'] = trim($record['0']);
            $storeTableDataArray['oldMaterialCode'] = trim($record['4']);
            $storeTableDataArray['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            $storeTableDataArray['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey('manufacturePartNumber')]);
            if (!empty(trim($record[$this->getRecordIndexByKey('eanUPC')]))) {
                $storeTableDataArray['eanUpc'] = "0".trim($record[$this->getRecordIndexByKey('eanUPC')]);
            } else {
                $storeTableDataArray['eanUpc'] = trim($record[$this->getRecordIndexByKey('eanUPC')]);
            }

            $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            $storeTableDataArray['grossWeight'] = $grossWeight;
            $storeTableDataArray['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            $storeTableDataArray['weightUnit'] = $weightUnit;            
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
        if (strtolower($productType) == 'fert') {
            $materialGroupCode = trim($record['5']);
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
        if (strtolower($productType) == 'fert') {
            $materialGroupCode = trim($record['5']);
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
    
    public function setBricksData($objId, $bricks, $type) {        
        foreach ($bricks as $brick) {
            if (in_array($brick, $this->allBricksList)) {
                foreach ($this->brickTablePrefixArray  as $brickPrefix) {
                    $tblName = $brickPrefix.ucfirst($brick)."_38";
                    $this->bricksDataArray[$tblName][] = [
                        'o_id' => $objId,
                        'fieldname' => ucfirst($type)
                    ];
                }
            }
        }
    }
    
    public function getOrCreateMaterialGroupCodeId($materialGroupCode) {
        if (!empty($materialGroupCode)) {
            if (!empty($this->materialGroup[$materialGroupCode])) {
                return $this->materialGroup[$materialGroupCode];
            } else {
                $obj = new \Pimcore\Model\DataObject\MaterialGroup();
                $obj->setCode($materialGroupCode);
                $obj->setKey(\Pimcore\File::getValidFilename($materialGroupCode));
                $parentFolder = $this->productHelper->getFolderByPath('/Master List/Material Group');
                $obj->setPublished(true);
                $obj->setParentId($parentFolder);
                $obj->save();
                $materialGroupId = $obj->getId();
                $this->materialGroup[$materialGroupCode] = $materialGroupId;
                return $materialGroupId;
                
            }
        }
        return null;
    }
}
