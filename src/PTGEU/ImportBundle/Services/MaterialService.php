<?php

namespace PTGEU\ImportBundle\Services;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use PTGEU\ImportBundle\Services\ImportService;
use PTGEU\ImportBundle\Services\ImportConstants;
use AppBundle\Lib\UnitConversion;
use PTGEU\ImportBundle\Model\MaterialModel;

class MaterialService
{    
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    public $configuredData; // We will pull the data from configured class for this variable
    private $logFileName;
    private $materialModel;
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
    private $baseSIOPMapping;
    private $baseSIOPArticleMapping;
    private $baseSiopMismatchLog;
    private $baseSiopMismatchEmailTemplate;
    private $updatedArticlesArray;
    private $weightConversionService;
    
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
        $this->materialModel        = new MaterialModel;
        $this->materialConfigData   = \Pimcore::getContainer()->get('import.config_provider_service')->getMaterialConfig();
        $this->catConfigData        = \Pimcore::getContainer()->get('import.config_provider_service')->getCategoryConfig();
        $this->businessUnit         = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->catHelper            = \Pimcore::getContainer()->get('import.category_helper');
        $this->brickMappingService  = \Pimcore::getContainer()->get('import.category_brick_mapping_service');
        $this->columnName           = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'columnName');
        $this->weightConversionService = new UnitConversion\WeightPerLengthConverter();
        $this->baseSIOPMapping      = [];
        $this->baseSIOPArticleMapping = [];
        $this->baseSiopMismatchLog  = [];
    }

    /**
     * Update table name in import table class
     */
    private function initImportTable()
    {
        $this->langArr = ['de', 'en', 'es_MX', 'fr_CA', 'pt'];
        $tables = $this->common->getParameter($this->materialConfigData, 'table');
        $tables['fileColumns'] = $this->csvHeader;
        $tables['mappingCsvColumn'] = $this->columnName;
        $tables['keyColumns'] = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'keyColumns');
        $this->baseSiopMismatchEmailTemplate = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'baseSIOPMismatchEmailTemplate');
        $this->materialModel->init($tables);
        $allBricksList = new \Pimcore\Model\DataObject\Objectbrick\Definition\Listing();
        $allBricksList = $allBricksList->load();
        foreach ($allBricksList as $brickObj) {
            $this->allBricksList[] = $brickObj->getKey();
        }
        $this->brickTablePrefixArray = [
            'queryTable' => 'object_brick_query_',
            'storeTable' => 'object_brick_store_'
        ];
        $this->products = [];
        $this->categories = [];
        $catList = $this->materialModel->getCategories();
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
        $materialGrpList = $this->materialModel->getMaterialGroupData();
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
        $this->initImportTable();
        Logger::log(self::LOGGER_MODULE)->info("SAP import started"); 
        $this->materialModel->truncateTempTable();
        $this->materialModel->insertDataInTemp($csvInfo['data']);
        Logger::log(self::LOGGER_MODULE)->info("Data Sheet imported in temp table");
        $this->processDeletedProducts();
        Logger::log(self::LOGGER_MODULE)->info("Removed records in data sheet, marked as unpublished.");
        Logger::log(self::LOGGER_MODULE)->info("PTGEU import started");
        $this->initiateProductsProcess();
        Logger::log(self::LOGGER_MODULE)->info("PTGEU import completed");
        $this->materialModel->updateMaster();
        Logger::log(self::LOGGER_MODULE)->info("Data copied from temp table to master table");
        if (!empty($this->updatedArticlesArray) && count($this->updatedArticlesArray)>0) {
            echo "Object Saving started for completeness.";         
            $this->saveProducts($this->updatedArticlesArray);
            echo "Object Saving completed for completeness.";
        }

        if (!empty($this->baseSiopMismatchLog) && count($this->baseSiopMismatchLog)>0) {
            $this->materialModel->removeArticlesFromMaster($this->baseSiopMismatchLog);
            Logger::log(self::LOGGER_MODULE)->info("failed records removed from master table.");
            $this->sendSkippedArticlesEmailNotification($this->baseSiopMismatchLog, $this->baseSiopMismatchEmailTemplate);
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
            //Logger::error("sap_import_log", $th);
        }
    }
    
    public function saveProducts($updatedArticlesArray) {
        foreach ($updatedArticlesArray as $objectId) {
            if (!empty($objectId)) {
                $object = DataObject\Product::getById($objectId, true);
                if (!empty($object) && $object instanceof \Pimcore\Model\DataObject\Product) {
                    $object->save();
                }
            }
        }
    }

    public function processDeletedProducts() {
        $deletedProducts = $this->materialModel->getDeletedProducts();
        if (!empty($deletedProducts) && count($deletedProducts)>0) {
            $keysArray = [];
            foreach ($deletedProducts as $product) {
                $keysArray[] = $product['id'];
            }
            $obj = new DataObject\Product\Listing();
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
        $delta = $this->materialModel->getDelta();
        $this->setVariablesToEmpty();
        $deltaCount = count($delta);
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("PTGEU Delta count: ".$deltaCount);
        $j = 1;
        
        $this->logArray = [];
        $i = 0;
        $length = 1000;
        while ($i<$deltaCount) {
            $offset = $i;
            dd($delta);
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
    
    public function updateProductsList() {
        $productList = $this->materialModel->getProducts();
        foreach($productList as $prod) {
            $fullPath = $prod['o_path'].$prod['o_key'];
            $this->products[$fullPath] = $prod['oo_id'];
            unset($fullPath);
        }
    }    
    
    public function processProducts($data) {
        foreach ($data as $row) {
            $this->processSingleRecord($row['siopfullcode'], $row);
        }
        $this->insertDataInDB();
        $this->materialModel->insertDataToLogTable($this->logArray);
        unset($data, $row);
        $this->setVariablesToEmpty();
    }
    
    
    public function insertDataInDB() {
        if(!empty($this->queryTableDataArray)) {
            $this->materialModel->insertIntoProductTable($this->queryTableDataArray, 'object_query_1');
        }
        if(!empty($this->storeTableDataArray)) {
            $this->materialModel->insertIntoProductTable($this->storeTableDataArray, 'object_store_1');
        }
        if (!empty($this->relationTableDataArray)) {
            $this->materialModel->deleteRelationTableRecords($this->relationTableDataDeleteArray);
            $this->materialModel->insertIntoProductTable($this->relationTableDataArray, 'object_relations_1');
        }
        
        foreach ($this->langArr as $lang) {
            if (!empty($this->localisedQueryTableDataArray[$lang])) {
                $tbl = 'object_localized_query_1_'.($lang);
                $this->materialModel->insertIntoProductTable($this->localisedQueryTableDataArray[$lang], $tbl);    
            }
        }
        if (!empty($this->localisedDataTableDataArray)) {
            $this->materialModel->insertIntoProductTable($this->localisedDataTableDataArray, 'object_localized_data_1');
        }
        if (!empty($this->dependencyTableDataArray)) {
            $this->materialModel->insertIntoProductTable($this->dependencyTableDataArray, 'dependencies');
        }
        if (!empty($this->bricksDataArray)) {
            foreach ($this->bricksDataArray as $tbl => $data) {
                if (!empty($data)) {
                    $this->materialModel->insertIntoProductTable($data, $tbl);
                }
            }
        }
    }
    
    private function getRecordIndexByKey($key) {
        return $this->csvHeader[$this->columnName[$key]];
    }
    
    public function createPTGObject($record, $parentId, $parentPath, $levelInfo, $type) {
        if ($type == 'base') {
            $objectIndex = count($levelInfo)-1;
        } elseif ($type == 'skeleton' || $type == 'fert') {
            $objectIndex = count($levelInfo);
        }
        $currentLevelCode   = $levelInfo[$objectIndex]['levelFullCode'];
        $fertLevelCode      = $levelInfo[count($levelInfo)]['levelFullCode'];
        $categoryPath       = $this->categories[$currentLevelCode]['fullPath'];
        
        if ($type == 'base' || $type == 'skeleton') {
            $currentLevelPath = $this->convertCategoryPathToProduct($categoryPath);
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
            'o_className' => 'Product'
        ];
        $currentLevelPath = $parentPath.'/'.$objectKey;
        if (!array_key_exists($currentLevelPath, $this->products)) {
            if ($type == 'fert') {
                $articleNumber = $record[$this->getRecordIndexByKey('material')];
                $data = $this->materialModel->checkIfArticleExists($articleNumber);
                if (!empty($data) && count($data)>0) {
                    $objId = $data[0]['oo_id'];
                    $objectArr['o_id'] = $objId;
                    $objectArr['parentId'] = $data[0]['o_parentId'];
                }
            }
            
            $objId = $this->materialModel->insertInObjects($objectArr);
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
            
            $buCatCode = substr($siopCode, 2, 4);
            if ($this->isValidCategoryCode($buCatCode, $siopCode)) {
                if (!empty(trim($recData[$this->getRecordIndexByKey('group')]))) {
                    echo $recData['0'].PHP_EOL;
                    $record = array(
                        'code'  =>  $siopCode,
                        'description'   =>  $recData[$this->getRecordIndexByKey('description')],
                        'material'  =>  $recData[$this->getRecordIndexByKey('material')]
                    );
                    $levelInfo = $this->productHelper->getLevels($record['code'], $record);
                    
                    if ($levelInfo['status']) {

                        $folderIndex = count($levelInfo['levels'])-2;
                        $folderCode = $levelInfo['levels'][$folderIndex]['levelFullCode'];
                        $folderPath = $this->categories[$folderCode]['fullPath'];
                        $folderPath = $this->convertCategoryPathToProduct($folderPath);
                        if (!array_key_exists($folderPath, $this->products)) {
                            $folderId = $this->getFolderByPath($folderPath);
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
                    unset($buCatCode, $record, $levelInfo, $folderIndex, $folderCode, $folderId, $folderPath, $levelArray);
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
    
    public function isValidCategoryCode($buCatCode, $siopCode) {
        if ($buCatCode == 3000) {
            if (strlen($siopCode) == 18) {
                return true;
            }
        } else {
            if (strlen($siopCode) == 13) {
                return true;
            }
        }
        return false;
    }
    public function getLocalizedQueryData($objId, $record, $productType = 'fert') {
        
        foreach ($this->langArr as $lang) {
            $value = null;
            if ($lang == 'en' && strtolower($productType) == 'fert') {
                $value = $record['2'];
            }
            $this->localisedDataTableDataArray[] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $value
            ];
            $this->localisedQueryTableDataArray[$lang][] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $value
            ];
        }
    }

    public function getQueryTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert', $businessUnit = 'PTGEU') {
        $siopData = [];
        for ($k=1; $k<=6; $k++) {
            $index = 'SIOPLevel'.$k;
            if ($k<=$level) {
                $catCode = $levelInfo[$k]['levelFullCode'];
                $siopData[$index] = ",".$this->categories[$catCode]['id'].",";
            } else {
                $siopData[$index] = null;
            }
        }
        $siopFullCode = trim($record['5']);
        if ($productType == 'base') {
            $siopFullCode = $levelInfo[$level]['levelFullCode'];
        }
        $queryTableData = [
            'oo_id' => $objId,
            'oo_classId' => 1,
            'oo_className' => 'Product',
            'ProductType' => strtolower($productType),
            'BusinessUnit' => strtoupper($businessUnit),
            'siopFullCode' => $siopFullCode,
            'articleNumber' => null,
            'materialGroup__id' => null,
            'materialGroup__type' => null,
            'baseUOM' => null,
            'oldMaterialCode' => null,
            'industryStandard' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'eanUpc' => null,
            'stccCode' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null,
            'weightKg' => null,
            'weightg' => null,
            'WeightLbsPerFTUOM' => null
        ];
        if (strtolower($productType) == 'fert') {
            $queryTableData['articleNumber'] = trim($record['0']);
            $queryTableData['baseUOM'] = trim($record['5']);
            $queryTableData['oldMaterialCode'] = trim($record['6']);
            $queryTableData['industryStandard'] = trim($record[$this->getRecordIndexByKey('industryStandard')]);
            $queryTableData['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            $queryTableData['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey('manufacturePartNumber')]);
            if (!empty(trim($record[$this->getRecordIndexByKey('eanUPC')]))) {
                $queryTableData['eanUpc'] = "0".trim($record[$this->getRecordIndexByKey('eanUPC')]);
            } else {
                $queryTableData['eanUpc'] = trim($record[$this->getRecordIndexByKey('eanUPC')]);
            }
            $queryTableData['stccCode'] = trim($record[$this->getRecordIndexByKey('stccCode')]);
            $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            $queryTableData['grossWeight'] = $grossWeight;
            $queryTableData['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            $queryTableData['weightUnit'] = $weightUnit;
            if (!empty($grossWeight)) {
                if (!empty($weightUnit)) {
                    $queryTableData['weightKg'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_M, $grossWeight);
                    $queryTableData['weightg'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_G_PER_M, $grossWeight);
                    $queryTableData['WeightLbsPerFTUOM'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT, $grossWeight);
                }
            } else {
                $queryTableData['weightKg'] = null;
                $queryTableData['weightg'] = null;
                $queryTableData['WeightLbsPerFTUOM'] = null;
            }
            
            $materialGrpId = $this->getOrCreateMaterialGroupCodeId(trim($record['3']));
            if(!empty($materialGrpId)) {
                $queryTableData['materialGroup__id'] = $materialGrpId;
                $queryTableData['materialGroup__type'] = 'object';
            }
        }
        $this->queryTableDataArray[] = array_merge($queryTableData, $siopData);
    }

    public function getStoreTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert', $businessUnit = 'PTGEU') {
        $siopFullCode = trim($record['4']);
        if ($productType == 'base') {
            $siopFullCode = $levelInfo[$level]['levelFullCode'];
        }
        $storeTableDataArray = [
            'oo_id' => $objId,
            'ProductType' => strtolower($productType),
            'BusinessUnit' => strtoupper($businessUnit),
            'siopFullCode' => $siopFullCode,
            'articleNumber' => null,
            'baseUOM' => null,
            'oldMaterialCode' => null,
            'industryStandard' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'eanUpc' => null,
            'stccCode' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null,
            'weightKg' => null,
            'weightg' => null,
            'WeightLbsPerFTUOM' => null
        ];
        if (strtolower($productType) == 'fert') {
            $storeTableDataArray['articleNumber'] = trim($record['0']);
            $storeTableDataArray['baseUOM'] = trim($record['5']);
            $storeTableDataArray['oldMaterialCode'] = trim($record['6']);
            $storeTableDataArray['industryStandard'] = trim($record[$this->getRecordIndexByKey('industryStandard')]);
            $storeTableDataArray['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            $storeTableDataArray['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey('manufacturePartNumber')]);
            if (!empty(trim($record[$this->getRecordIndexByKey('eanUPC')]))) {
                $storeTableDataArray['eanUpc'] = "0".trim($record[$this->getRecordIndexByKey('eanUPC')]);
            } else {
                $storeTableDataArray['eanUpc'] = trim($record[$this->getRecordIndexByKey('eanUPC')]);
            }
            $storeTableDataArray['stccCode'] = trim($record[$this->getRecordIndexByKey('stccCode')]);
            $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            $storeTableDataArray['grossWeight'] = $grossWeight;
            $storeTableDataArray['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            $storeTableDataArray['weightUnit'] = $weightUnit;
            if (!empty($grossWeight)) {
                if (!empty($weightUnit)) {
                    $storeTableDataArray['weightKg'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_M, $grossWeight);
                    $storeTableDataArray['weightg'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_G_PER_M, $grossWeight);
                    $storeTableDataArray['WeightLbsPerFTUOM'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT, $grossWeight);
                }
            } else {
                $storeTableDataArray['weightKg'] = null;
                $storeTableDataArray['weightg'] = null;
                $storeTableDataArray['WeightLbsPerFTUOM'] = null;
            }
        }
        $this->storeTableDataArray[] = $storeTableDataArray;
    }

    public function getRelationTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert') {
        for ($k=1; $k<=$level; $k++) {
            $index = 'SIOPLevel'.$k;
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
            $materialGroupCode = trim($record['3']);
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
            $index = 'SIOPLevel'.$k;
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
            $materialGroupCode = trim($record['3']);
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
                    $tblName = $brickPrefix.ucfirst($brick)."_1";
                    $this->bricksDataArray[$tblName][] = [
                        'o_id' => $objId,
                        'fieldname' => ucfirst($type)
                    ];
                }
            }
        }
    }
    public function convertCategoryPathToProduct($categoryPath) {
        $search = '/Master List/SIOP Master List/SIOP Engineered Products';
        $replace = '/PTGEU';
        return str_replace($search, $replace, $categoryPath);
    }
    
    public function getFolderByPath($folderPath) {
        $pathExists = \Pimcore\Model\DataObject\Service::pathExists($folderPath);
        if (empty($pathExists)) {
            $folder = \Pimcore\Model\DataObject\Service::createFolderByPath($folderPath);
        } else {
            $folder = \Pimcore\Model\DataObject\Service::getElementByPath('object', $folderPath);
        }
        return $folder->getId();
    }
    
    public function getOrCreateMaterialGroupCodeId($materialGroupCode) {
        if (!empty($materialGroupCode)) {
            if (!empty($this->materialGroup[$materialGroupCode])) {
                return $this->materialGroup[$materialGroupCode];
            } else {
                $obj = new \Pimcore\Model\DataObject\MaterialGroup();
                $obj->setCode($materialGroupCode);
                $obj->setKey(\Pimcore\File::getValidFilename($materialGroupCode));
                $parentFolder = $this->getFolderByPath('/Master List/Material Group');
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

    public function getLevels($code, $reader = array())
    {
        $buCode = $this->catHelper->isValidCategoryFormat($code);
        $bu = $this->businessUnit[$buCode];
        /* Replace product hierarchy descrioption for level 1 with business unit*/
        $reader['prodHier1Desc'] = $bu;
        if (!$this->catHelper->isValideCodeLength($code)) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" length is not valid'
            );
        }
        if (!$buCode) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" does not belong to any valid category'
            );
        }
        $len = strlen($code);
        $level = $this->catHelper->getLevelByLength($len);
        $levels = array();
        for ($i = $level; $i >= 1; $i--) {
            $objectKey = empty($reader) ?: $reader[$this->level[$i]['key']];
            $parentLevel = $this->catHelper->getParentLevel($i);
            $levelFullCode = $this->catHelper->extractFullCodeLevelWise($i, $code);
            $parentFullCode = $this->catHelper->extractFullCodeLevelWise(($i - 1), $code);
            $parentPath = $parentLevel ? $this->getParentPath($parentLevel, $buCode, $reader) : $this->root['fullPath'];
            $objectPath = $parentPath . '/' . $objectKey;
            $levels[$i] = array(
                'code'          =>  $this->catHelper->extractCodeLevelWise($i, $code),
                'parentCode'    =>  $this->catHelper->extractCodeLevelWise($parentLevel, $code),
                'fullCode'      =>  $code,
                'levelFullCode' =>  $levelFullCode,
                'parentFullCode' =>  $parentFullCode,
                'level'         =>  $i,
                'bu'            =>  $bu,
                'objectKey'     =>  $objectKey,
                'parentObjectKey'   =>  empty($reader) ?: $reader[$this->level[$parentLevel]['key']],
                'objectPath'    =>  $objectPath,
                'parentPath'    =>  $parentPath
            );
            // p_r($levels);die;
        }

        return array(
            'status'    =>  true,
            'levels'    =>  $levels
        );
    }

    public function getParentPath($lvl, $buCode, $reader)
    {
        $bu = $this->businessUnit[$buCode];
        $path = '';
        if ($lvl == 1) {
            $path = '';
        } else {
            for ($i = 1; $i <= $lvl; $i++) {
                if (empty($path))
                    $path = \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                else {
                    $path .= '/' . \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                }
            }
        }
        if (empty($path)) {
            $path = $this->root['fullPath'] . '/' . $bu;
        } else {
            $path = $this->root['fullPath'] . '/' . $path;
        }
        return $path;
    }
}
