<?php

namespace ImportBundle\Services\Model;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;
use AppBundle\Lib\UnitConversion;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductSQLModel
{
    
    public $name; // Command Name
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    public $configuredData; // We will pull the data from configured class for this variable
    private $mappedService;
    private $validatorService;
    private $logFileName;
    private $monitoringItem;
    private $totalSteps;
    private $currentStep;
    private $currentLevel;
    private $errors;
    private $reader;
    private $level;
    private $cek; // Current Error Key
    private $productModel;
    private $siop;
    private $catInstance;
    private $instance;
    private $catHelper;
    private $rowStatus;
    private $tblImpHelper;
    private $prdHelper;
    private $prdConfigData;
    private $common;
    private $startRow;
    private $columnName;
    private $csvHeader;
    private $data;
    private $bricks;
    private $brickMappingService;
    private $fileHandle;
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
    private $allBaseProducts;
    private $appService;
    private $weightConversionService;
    private $container;
    private $productHelper;
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
    
    const LOGGER_MODULE = 'SAP IMPORT SHEET';
    const FILE_LAST_COL = 'D';
    const MAX_TOP_CAT_LVL = 6;
    const MIN_TOP_CAT_LVL = 4;

    // According to client(Mark) if Weight Unit is LB then we will consider as LBS_PER_FT & if KG is given then we will consider as KG_PER_M and do their conversion respectively.
    const GROSS_WEIGHT_UNITS = [
        "LB" => UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT,
        "KG" => UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_M,
        "G" => UnitConversion\WeightPerLengthConverter::UNIT_G_PER_FT,
    ];
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        // $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
        $this->common = $this->container->get('app.common_helper');

        $this->appService = $this->container->get('AppBundle\Services\AppService');
        $this->tblImpHelper = $this->container->get('app.product_import_helper');
        $this->productHelper = $this->container->get('app.product_helper');
//        $this->catHelper = $this->container->get('app.category_helper');
//        $this->catInstance = $this->container->get('import.category_service');
        $this->prdConfigData = $this->container->get('app.config_provider_service')->getProductConfig();
        $this->brickMappingService = $this->container->get('AppBundle\Services\CategoryBrickMappingService');
//        $this->startRow = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'startRow');
        $this->columnName = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'columnName');
        $this->weightConversionService = new UnitConversion\WeightPerLengthConverter();
        $this->baseSIOPMapping = [];
        $this->baseSIOPArticleMapping = [];
        $this->baseSiopMismatchLog = [];
    }
    
    /**
     * Update table name in import table class
     */
    private function initImportTable()
    {
        // $this->langArr = ['de', 'en', 'es_MX', 'fr_CA', 'pt'];
        $this->langArr = \Pimcore\Tool::getValidLanguages();
        $this->langArr = array_unique($this->langArr);
        $tables = $this->common->getParameter($this->prdConfigData, 'table');
        $tables['fileColumns'] = $this->csvHeader;
        $tables['mappingCsvColumn'] = $this->columnName;
        $tables['keyColumns'] = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'keyColumns');
        $this->baseSiopMismatchEmailTemplate = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'baseSIOPMismatchEmailTemplate');
        
        $this->tblImpHelper->init($tables);
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
        $catList = $this->tblImpHelper->getCategories();
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
        $materialGrpList = $this->tblImpHelper->getMaterialGroupData();
        foreach($materialGrpList as $materialGrp) {
            $code = $materialGrp['code'];
            $this->materialGroup[$code] = $materialGrp['oo_id'];
            unset($code);
        }
    }
    
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            // $this->instance = $this->container->get($this->validatorService);
            /**
             * Get spreadsheet object by calling load function
             * Pass file path directly or send array with sheet configuration
             * eg: Start row to read, end row to read, number of columns to read etc.
             */
            $sheetConfig = array(
                'filePath' => $this->filePath,
                'startRow'  =>  $this->startRow
            );
            $csvInfo = Import::getCSVData($this->filePath);
            
            $this->csvHeader = array_flip($csvInfo['header']);
            /**
             * Setting up import table
             */
            $this->initImportTable();
            $this->import($csvInfo['data']);
        } catch (\Throwable $th) {
            p_r($th);
            //throw $th;
            Logger::error($this->logFileName, $th);
            die;
        }
    }
    
    public function import($csvData)
    {

        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("SAP import started"); 
        $this->tblImpHelper->truncateTempTable();
        $this->tblImpHelper->insertDataInTemp($csvData);
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("Data Sheet imported in temp table");
        $this->processDeletedProducts();
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("Removed records in data sheet, marked as unpublished.");
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("PTG import started");
        $this->initiatePTGProductsProcess();
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("PTG import completed");
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("IFS import started");
        $this->initiateIFSProductsProcess();
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("IFS import completed");
        $this->tblImpHelper->getRecordsSiopCodeDigitsNot13And18();
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("SIOP code other than 13 and 18 digit inserted in Log Table and delted from temp table");
        $this->tblImpHelper->updateMaster();
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("Data copied from temp table to master table");
        if (!empty($this->updatedArticlesArray) && count($this->updatedArticlesArray)>0) {
            echo "Object Saving started for completeness.";         
            $this->saveProducts($this->updatedArticlesArray);
            echo "Object Saving completed for completeness.";
        }
        if (!empty($this->baseSiopMismatchLog) && count($this->baseSiopMismatchLog)>0) {
            $this->tblImpHelper->removeArticlesFromMaster($this->baseSiopMismatchLog);
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("failed records removed from master table.");
            $this->sendSkippedArticlesEmailNotification($this->baseSiopMismatchLog, $this->baseSiopMismatchEmailTemplate);
        }
    }
    public function sendSkippedArticlesEmailNotification($skippedArticles, $emailTemplate) {
        try {
            if (!empty($skippedArticles) && count($skippedArticles)>0) {
                $fileName = "SAP_import_skipped_articles_" . '-' . date('YmdHis') . '.csv';
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
                        throw new \Exception("Base SIOP mismatch email template not found.");
                    }
                } else {
                    throw new \Exception("Base SIOP mismatch email template not configured.");
                }
            }
        } catch (\Throwable $th) {
            p_r($th);
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($th);
//            Logger::error("sap_import_log", $th);
        }
    }
    
    /* This function will override the default configuration */
    private function updateDefaults($params)
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                if (property_exists($this, $k)) {
                    $this->$k = $v;
                }
            }
        }
    }
    
    public function saveProducts($updatedArticlesArray) {
        foreach ($updatedArticlesArray as $objectId) {
            if (!empty($objectId)) {
                $object = DataObject\Product::getById($objectId);
                if (!empty($object) && $object instanceof \Pimcore\Model\DataObject\Product) {
                    $object->save();
                }
            }
        }
    }
    public function processDeletedProducts() {
        $deletedProducts = $this->tblImpHelper->getDeletedProducts();
        if (!empty($deletedProducts[0]) && count($deletedProducts[0])>0) {
            $keysArray = [];
            foreach ($deletedProducts as $product) {
                if(!empty($product['id']))
                    $keysArray[] = $product['id'];
            }
            if(!empty($keysArray)){
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
    }
    public function getBaseSiopMapping() {
        $ifsData = $this->tblImpHelper->getIFSLoad();
        $mappingArray = [];
        $logArray = [];
        foreach ($ifsData as $row) {
            $recData =  (array) json_decode($row['record']);
            $oldMaterialCode = trim($recData[6]);
            if (!empty($oldMaterialCode) && $oldMaterialCode != 'NA' && $oldMaterialCode != 'N/A' && strlen($oldMaterialCode) == 14 && (!strstr($oldMaterialCode,' ')) && (!strstr($oldMaterialCode,'-'))) {
                $sixDigitCode = substr($oldMaterialCode, 0, 6); 
                if (empty($this->baseSIOPMapping[$sixDigitCode])) {
                    $this->baseSIOPMapping[$sixDigitCode] = $row['siopfullcode'];
                    $this->baseSIOPArticleMapping[$sixDigitCode] = $row['id'];
                }
            }
        }
    }
    
    
    public function initiateIFSProductsProcess() {
        $a = time();
        $delta = $this->tblImpHelper->getDelta('ifs');
        $this->setVariablesToEmpty();
        $deltaCount = count($delta);
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("IFS Delta count: ".$deltaCount);
        $j = 1;
        $this->getBaseSiopMapping();
        $this->allBaseProducts = $this->tblImpHelper->getAllBaseProducts();
        $this->logArray = [];
        $i = 0;
        
        $length = 1000;
        while ($i<$deltaCount) {
            $offset = $i;
            $diff = $deltaCount-$i;
            if ($diff < $length) {
                $length = $diff;
            }
            $this->setVariablesToEmpty();
            $partialData = array_slice($delta, $i, $length);
            $this->processIFSProducts($partialData);
            $partialData = null;
            $i = $i+$length;
            echo PHP_EOL;
            echo "Record Processed: ".$i;
            $b = time();
            echo "Part ".$j." completed in time: ".$a."====".$b.PHP_EOL;
            \Pimcore::collectGarbage();
            gc_collect_cycles();
            $a = time();
            $j++;
        }
        
//        print_r($this->baseSiopMismatchLog); die;
    }
    
    public function initiatePTGProductsProcess() {
        $a = time();
        $delta = $this->tblImpHelper->getDelta('ptg');
        $this->setVariablesToEmpty();
        $deltaCount = count($delta);
        \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("PTG Delta count: ".$deltaCount);
        $j = 1;
        
        $this->logArray = [];
        $i = 0;
        $length = 1000;
        while ($i<$deltaCount) {
            $offset = $i;
            $diff = $deltaCount-$i;
            if ($diff < $length) {
                $length = $diff;
            }
            $partialData = array_slice($delta, $i, $length);
            $this->processPTGProducts($partialData);
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
        //gc_collect_cycles();
    }
    
    public function updateProductsList() {
        $productList = $this->tblImpHelper->getProducts();
        foreach($productList as $prod) {
            $fullPath = $prod['path'].$prod['key'];
            $this->products[$fullPath] = $prod['oo_id'];
            unset($fullPath);
        }
    }
    
    public function processIFSProducts($data) {
        $i = 1;
        foreach ($data as $row) {
            echo "Index: ".$i.PHP_EOL;
            $this->processSingleRecord($row['siopfullcode'], $row, 'IFS');
            $i = $i + 1;
        }
        $this->insertDataInDB();
        echo "inserting data into log";
        $this->tblImpHelper->insertDataToLogTable($this->logArray);
        unset($data, $row);
        $this->setVariablesToEmpty();
    }
    
    
    public function processPTGProducts($data) {
        foreach ($data as $row) {
            $this->processSingleRecord($row['siopfullcode'], $row, 'PTG');
        }
        $this->insertDataInDB();
        $this->tblImpHelper->insertDataToLogTable($this->logArray);
        unset($data, $row);
        $this->setVariablesToEmpty();
    }
    
    
    public function insertDataInDB() {
        if(!empty($this->queryTableDataArray)) {
            $this->tblImpHelper->insertIntoProductTable($this->queryTableDataArray, 'object_query_1');
        }
        if(!empty($this->storeTableDataArray)) {
            $this->tblImpHelper->insertIntoProductTable($this->storeTableDataArray, 'object_store_1');
        }
        if (!empty($this->relationTableDataArray)) {
            $this->tblImpHelper->deleteRelationTableRecords($this->relationTableDataDeleteArray);
            $this->tblImpHelper->insertIntoProductTable($this->relationTableDataArray, 'object_relations_1');
        }
        
        foreach ($this->langArr as $lang) {
            if (!empty($this->localisedQueryTableDataArray[$lang])) {
                $tbl = 'object_localized_query_1_'.($lang);
                $this->tblImpHelper->insertIntoProductTable($this->localisedQueryTableDataArray[$lang], $tbl);    
            }
        }
        if (!empty($this->localisedDataTableDataArray)) {
            $this->tblImpHelper->insertIntoProductTable($this->localisedDataTableDataArray, 'object_localized_data_1');
        }
        if (!empty($this->dependencyTableDataArray)) {
            $this->tblImpHelper->insertIntoProductTable($this->dependencyTableDataArray, 'dependencies');
        }
        if (!empty($this->bricksDataArray)) {
            foreach ($this->bricksDataArray as $tbl => $data) {
                if (!empty($data)) {
                    $this->tblImpHelper->insertIntoProductTable($data, $tbl);
                }
            }
        }
    }
    
    private function getRecordIndexByKey($key) {
        return $this->csvHeader[$this->columnName[$key]];
    }
    
    public function createIFSObject($record, $parentId, $parentPath, $levelInfo, $type, $outsideProductFlag = false) {
        $oldMaterialCode = $record[$this->getRecordIndexByKey('oldMaterial')];
        if ($type=='base') {
            $objectKey = substr($oldMaterialCode, 0,6);
        } elseif ($type == 'skeleton') {
            $objectKey = substr($oldMaterialCode, 0,9);
        } else {
            $objectKey = $record[$this->getRecordIndexByKey('material')];
            $description = \Pimcore\File::getValidFilename($record[$this->getRecordIndexByKey('description')]);
            if (!empty($description)) {
                $objectKey = $objectKey."-".$description;
            }
        }
        $objectArr = [
            'parentId' => $parentId,
            'key' => $objectKey,
            'path' => $parentPath.'/',
            'className' => PRODUCT_CLASS_NAME
        ];
        $currentLevelPath = $parentPath.'/'.$objectKey;
        if (!array_key_exists($currentLevelPath, $this->products)) {
            if ($type == 'fert') {
                $articleNumber = $record[$this->getRecordIndexByKey('material')];
		$data = $this->tblImpHelper->checkIfArticleExists($articleNumber);
		if (!empty($data) && count($data)>0) {
                    $objId = $data[0]['oo_id'];
                    $objectArr['id'] = $objId;
                    //if ($oldMaterialCode != $data[0]['oldMaterialCode']) {
		    $distributionFlag = $this->tblImpHelper->getDistributionChainFlagByMaterial($objId);
		    $fittingFamilyFlag = $this->tblImpHelper->getFittingFamilyFlagByMaterial($objId);
                    var_dump($distributionFlag);
                    var_dump($fittingFamilyFlag);
                    if (!empty($distributionFlag) || !empty($fittingFamilyFlag)) {
                        if (!empty($distributionFlag)) {
                            $catCode = $levelInfo[3]['levelFullCode'];
                            $catFullPath = $this->categories[$catCode]['fullPath'];
                            $productPath = $this->convertCategoryPathToProduct($catFullPath);
                            $quoteFolderPath = $productPath."/Quote/";
                            $quoteFolderId = $this->getFolderByPath($quoteFolderPath);
                            $objectArr['parentId'] = $quoteFolderId;
                            $objectArr['path'] = $quoteFolderPath;
                        } else {
                            $pathArray = explode("/", $data[0]['path']);
                            if (count($pathArray)>=6) {
                                $fittingFamilyPathArray = array_slice($pathArray, 6);
                                $subPath = '';
                                if (!empty($fittingFamilyPathArray[0])) {
                                    $subPath = implode("/", $fittingFamilyPathArray);
                                }
                                $catCode = $levelInfo[4]['levelFullCode'];
                                $catFullPath = $this->categories[$catCode]['fullPath'];
                                $productPath = $this->convertCategoryPathToProduct($catFullPath);
                                $fittingFamilyFolderPath = $productPath."/".$subPath;
                                $fittingFamilyFolderId = $this->getFolderByPath($fittingFamilyFolderPath);
                                $objectArr['parentId'] = $fittingFamilyFolderId;
                                $objectArr['path'] = $fittingFamilyFolderPath;
                            }
                        }
                    }
			//}
                }
                
            } else {
                if (array_key_exists($objectKey, $this->allBaseProducts)) {
                    $objectArr['id'] = $this->allBaseProducts[$objectKey];
                }
            }
            
            $objId = $this->tblImpHelper->insertInObjects($objectArr);
            if (is_array($objId) && empty($objId[0])) {
                return $objId;
            }
            $this->products[$currentLevelPath] = $objId;
            $this->getQueryTableData($objId, $record, $levelInfo, 4, $type, 'IFS');
            $this->getStoreTableData($objId, $record, $levelInfo, 4, $type, 'IFS');
            $this->getRelationTableData($objId, $record, $levelInfo, 4, $type);
            $this->getLocalizedQueryData($objId, $record, $type);
            $this->getDependencyTableData($objId, $record, $levelInfo, 4);
            $fertLevelCode = $levelInfo[4]['levelFullCode'];
            $groupNames = $this->categories[$fertLevelCode]['data']['RelatedObjectBrick'];
            $groupNames = trim($groupNames, ',');
            if (!empty($groupNames)) {
                $groupNamesArray = explode(',', $groupNames);
                if (!empty($outsideProductFlag)) {
                    $typeArray = ['base', 'skeleton', 'fert'];
                    foreach ($typeArray as $typeS) {
                        $bricksList = $this->brickMappingService->getMappedBrickKeys($groupNamesArray, $typeS);
                        $this->setBricksData($objId, $bricksList, $typeS);
                    }
                } else {
                    $bricksList = $this->brickMappingService->getMappedBrickKeys($groupNamesArray, $type);
                    $this->setBricksData($objId, $bricksList, $type);
                }
                unset($groupNames, $groupNamesArray, $bricksList);
            }
        } else {
            $objId = $this->products[$currentLevelPath];
        }

        echo "ID: = ".$objId.PHP_EOL;
        return [$objId, $currentLevelPath];
    }
    
    public function createPTGObject($record, $parentId, $parentPath, $levelInfo, $type) {
        if ($type == 'base') {
            $objectIndex = count($levelInfo)-1;
        } elseif ($type == 'skeleton' || $type == 'fert') {
            $objectIndex = count($levelInfo);
        }
        $currentLevelCode = $levelInfo[$objectIndex]['levelFullCode'];
        $fertLevelCode = $levelInfo[count($levelInfo)]['levelFullCode'];
        $categoryPath = $this->categories[$currentLevelCode]['fullPath'];
        
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
            'key' => $objectKey,
            'path' => $parentPath.'/',
            'className' => 'Product'
        ];
        $currentLevelPath = $parentPath.'/'.$objectKey;
        if (!array_key_exists($currentLevelPath, $this->products)) {
            if ($type == 'fert') {
                $articleNumber = $record[$this->getRecordIndexByKey('material')];
                $data = $this->tblImpHelper->checkIfArticleExists($articleNumber);
                if (!empty($data) && count($data)>0) {
                    $objId = $data[0]['oo_id'];
                    $objectArr['id'] = $objId;
                    $objectArr['parentId'] = $data[0]['parentId'];
                }
            }
            
            $objId = $this->tblImpHelper->insertInObjects($objectArr);
            $this->products[$currentLevelPath] = $objId;
            $this->getQueryTableData($objId, $record, $levelInfo, $objectIndex, $type, 'PTG');
            $this->getStoreTableData($objId, $record, $levelInfo, $objectIndex, $type, 'PTG');
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
    public function processSingleRecord($siopCode, $row, $bu) {
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
                        
                        if (strtolower($bu) == 'ifs') {
                            $oldMaterialCode = trim($recData[6]);
                            if (empty($oldMaterialCode) || $oldMaterialCode == 'NA' || $oldMaterialCode == 'N/A' || (strlen($oldMaterialCode)!= 14) || strstr($oldMaterialCode,' ') || strstr($oldMaterialCode,'-')) {
                                $recData[6] = '';
                                $sixDigitCode = '';
                            } else {
                                $sixDigitCode = substr($oldMaterialCode, 0, 6); 
                            }
                            if (!empty($sixDigitCode) && !empty($this->baseSIOPMapping[$sixDigitCode]) && $this->baseSIOPMapping[$sixDigitCode] != $siopCode) {
                                $msg = 'SIOP Code does not match with previous records of same Six digit code. (Article Number: '.$this->baseSIOPArticleMapping[$sixDigitCode].' )';
                                $this->baseSiopMismatchLog[$recData['0']] = [
                                    'articleNumber' => $recData['0'],
                                    'siop' => $siopCode,
                                    '6digit' => $sixDigitCode,
                                    'mismatchedSiopCode' => $this->baseSIOPMapping[$sixDigitCode],
                                    'mismatchedArticleNumber' => $this->baseSIOPArticleMapping[$sixDigitCode]
                                ]; 
                                $errorFlag = true;
                            } else {
                                $this->baseSIOPMapping[$sixDigitCode] = $siopCode;
                                $folderIndex = count($levelInfo['levels']);
                                $folderCode = $levelInfo['levels'][$folderIndex]['levelFullCode'];
                                $folderPath = $this->categories[$folderCode]['fullPath'];
                                $folderPath = $this->convertCategoryPathToProduct($folderPath);
                                $folderId = $this->getFolderByPath($folderPath);
                                if (!array_key_exists($folderPath, $this->products)) {
                                    $folderId = $this->getFolderByPath($folderPath);
                                    $this->products[$folderPath] = $folderId;
                                } else {
                                    $folderId = $this->products[$folderPath];
                                }
                                if (empty($oldMaterialCode) || $oldMaterialCode == 'NA' || $oldMaterialCode == 'N/A' || (strlen($oldMaterialCode)!= 14) || strstr($oldMaterialCode,' ') || strstr($oldMaterialCode,'-')) {
                                    $levelArray = $this->createIFSObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'fert', true);
                                } else {
                                    $levelArray = $this->createIFSObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'base');
                                    if (empty($levelArray[0])) {
                                        $msg = $levelArray[1];
                                    } else {
                                        $levelArray = $this->createIFSObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'skeleton');
                                        if (empty($levelArray[0])) {
                                            $msg = $levelArray[1];
                                        } else {
                                            $levelArray = $this->createIFSObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'fert');
                                        }
                                    }
                                }
                                if (empty($levelArray[0])) {
                                    $msg = $levelArray[1];
                                } else {
                                    $status = 'Success';
                                    $msg = 'Object Id is: '.$levelArray[0];
                                }
                            }
                        } else if(strtolower($bu) == 'ptg') {
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
                        }
                        if (!$errorFlag) {
                            $this->updatedArticlesArray[] = $levelArray[0]; //$recData[$this->getRecordIndexByKey('material')];
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

    public function getQueryTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert', $businessUnit = 'IFS') {
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
        $siopFullCode = trim($record['4']);
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
            'externalID' => null,
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
            $queryTableData['externalID'] = trim($record[$this->getRecordIndexByKey('externalID')]);
            if (!empty($grossWeight)) {
                if (!empty($weightUnit)) {
                    $queryTableData['weightKg'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_M, $grossWeight);
                    $queryTableData['weightg'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_G_PER_M, $grossWeight);
                    $queryTableData['WeightLbsPerFTUOM'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT, $grossWeight);
//                    $sourceUnit = new UnitConversion\WeightPerLengthConverter(self::GROSS_WEIGHT_UNITS[$weightUnit]);
//                    $converter = UnitConversion\ConverterFactory::getConverterByUnit($grossWeight, $sourceUnit);
//                    $queryTableData['weightKg'] = round($converter->getValue(new Unit(Unit::KG)), 5);
//                    $queryTableData['weightg'] = round($converter->getValue(new Unit(Unit::G)), 5);
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

    public function getStoreTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert', $businessUnit = 'IFS') {
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
            'externalID' => null,
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
            $storeTableDataArray['externalID'] = trim($record[$this->getRecordIndexByKey('externalID')]);
            if (!empty($grossWeight)) {
                if (!empty($weightUnit)) {
                    $storeTableDataArray['weightKg'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_M, $grossWeight);
                    $storeTableDataArray['weightg'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_G_PER_M, $grossWeight);
                    $storeTableDataArray['WeightLbsPerFTUOM'] = $this->weightConversionService->convert(self::GROSS_WEIGHT_UNITS[$weightUnit], UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT, $grossWeight);
//                    $sourceUnit = new UnitConversion\Unit(self::GROSS_WEIGHT_UNITS[$weightUnit]);
//                    $converter = UnitConversion\ConverterFactory::getConverterByUnit($grossWeight, $sourceUnit);
//                    $storeTableDataArray['weightKg'] = round($converter->getValue(new Unit(Unit::KG)), 5);
//                    $storeTableDataArray['weightg'] = round($converter->getValue(new Unit(Unit::G)), 5);
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
                        'id' => $objId,
                        'fieldname' => ucfirst($type)
                    ];
                }
            }
        }
    }
    public function convertCategoryPathToProduct($categoryPath) {
        $search = '/Master List/SIOP Master List/SIOP Engineered Products';
        $replace = '/Products Master';
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
}
