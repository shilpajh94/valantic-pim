<?php

namespace ImportBundle\Services\Model;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;

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
    
    const LOGGER_MODULE = 'SIOP IMPORT SHEET';
    const FILE_LAST_COL = 'D';
    const MAX_TOP_CAT_LVL = 6;
    const MIN_TOP_CAT_LVL = 4;
    
    public function __construct()
    {
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        // $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        $this->tblImpHelper = \Pimcore::getContainer()->get('app.product_import_helper');
        $this->productHelper = \Pimcore::getContainer()->get('app.product_helper');
//        $this->catHelper = \Pimcore::getContainer()->get('app.category_helper');
//        $this->catInstance = \Pimcore::getContainer()->get('import.category_service');
        $this->prdConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getProductConfig();
        $this->brickMappingService = \Pimcore::getContainer()->get('AppBundle\Services\CategoryBrickMappingService');
//        $this->startRow = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'startRow');
        $this->columnName = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'columnName');
    }
    
    /**
     * Update table name in import table class
     */
    private function initImportTable()
    {
        $this->langArr = ['de', 'en', 'es_MX', 'fr_CA', 'pt'];
        $tables = $this->common->getParameter($this->prdConfigData, 'table');
        $tables['fileColumns'] = $this->csvHeader;
        $tables['mappingCsvColumn'] = $this->columnName;
        $tables['keyColumns'] = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'keyColumns');
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
                'fullPath'  =>  $cat['o_path'].$cat['o_key']
            );
            unset($fullCode);
        }
    }
    
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            // $this->instance = \Pimcore::getContainer()->get($this->validatorService);
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
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
    }
    
    public function import($csvData)
    {
        $this->tblImpHelper->truncateTempTable();
        $this->tblImpHelper->insertDataInTemp($csvData);
        
        $this->initiatePTGProductsProcess();
        
        $this->initiateIFSProductsProcess();
        
        $this->tblImpHelper->updateMaster();
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
    
    
    public function initiateIFSProductsProcess() {
        $a = time();
        $delta = $this->tblImpHelper->getDelta('ifs');
        
        $this->setVariablesToEmpty();
        $deltaCount = count($delta);
        $j = 1;
        
        $this->logArray = [];
        $i = 0;
        $length = 5000;
        while ($i<$deltaCount) {
            $offset = $i;
            $diff = $deltaCount-$i;
            if ($diff < $length) {
                $length = $diff;
            }
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
    }
    
    public function initiatePTGProductsProcess() {
        $a = time();
        $delta = $this->tblImpHelper->getDelta('ptg');
        $this->setVariablesToEmpty();
        $deltaCount = count($delta);
        $j = 1;
        
        $this->logArray = [];
        $i = 0;
        $length = 5000;
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
        $this->products = [];
        $this->logArray = [];
        $this->objectsTableData = [];
        $this->queryTableDataArray = [];
        $this->storeTableDataArray = [];
        $this->localisedQueryTableDataArray = [];
        $this->localisedDataTableDataArray = [];
        $this->relationTableDataArray = [];
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
            $fullPath = $prod['o_path'].$prod['o_key'];
            $this->products[$fullPath] = $prod['oo_id'];
            unset($fullPath);
        }
    }
    
    public function processIFSProducts($data) {
        foreach ($data as $row) {
            $this->processSingleRecord($row['siopfullcode'], $row, 'IFS');
        }
        $this->insertDataInDB();
        $this->tblImpHelper->insertDataToLogTable($this->logArray);
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
    
    public function createIFSObject($record, $parentId, $parentPath, $levelInfo, $type) {
        $oldMaterialCode = $record[$this->getRecordIndexByKey('oldMaterial')];
        if ($type=='base') {
            $objectKey = substr($oldMaterialCode, 0,6);
        } elseif ($type == 'skeleton') {
            $objectKey = substr($oldMaterialCode, 0,9);
        } else {
            $objectKey = $record[$this->getRecordIndexByKey('material')];
        }
        $objectArr = [
            'parentId' => $parentId,
            'o_key' => $objectKey,
            'path' => $parentPath.'/',
            'o_className' => PRODUCT_CLASS_NAME
        ];
        $currentLevelPath = $parentPath.'/'.$objectKey;
        if (!array_key_exists($currentLevelPath, $this->products)) {
            $objId = $this->tblImpHelper->insertInObjects($objectArr);

            $this->products[$currentLevelPath] = $objId;
            $this->getQueryTableData($objId, $record, $levelInfo, 4, $type, 'IFS');
            $this->getStoreTableData($objId, $record, $levelInfo, 4, $type, 'IFS');
            $this->getRelationTableData($objId, $record, $levelInfo, 4);
            $this->getLocalizedQueryData($objId, $record);
            $this->getDependencyTableData($objId, $record, $levelInfo, 4);
            $fertLevelCode = $levelInfo[4]['levelFullCode'];
            $groupNames = $this->categories[$fertLevelCode]['data']['RelatedObjectBrick'];
            $groupNames = trim($groupNames, ',');
            if (!empty($groupNames)) {
                $groupNamesArray = explode(',', $groupNames);
                $bricksList = $this->brickMappingService->getMappedBrickKeys($groupNamesArray, $type);
                $this->setBricksData($objId, $bricksList, $type);
            }
        } else {
            $objId = $this->products[$currentLevelPath];
        }
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
            $objectKey = $record[0];
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
            $objId = $this->tblImpHelper->insertInObjects($objectArr);
            $this->products[$currentLevelPath] = $objId;
            $this->getQueryTableData($objId, $record, $levelInfo, $objectIndex, $type, 'PTG');
            $this->getStoreTableData($objId, $record, $levelInfo, $objectIndex, $type, 'PTG');
            $this->getRelationTableData($objId, $record, $levelInfo, $objectIndex);
            $this->getLocalizedQueryData($objId, $record);
            $this->getDependencyTableData($objId, $record, $levelInfo, $objectIndex);
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
        if (array_key_exists($siopCode, $this->categories)) {
            $buCatCode = substr($siopCode, 2, 4);
            if (($buCatCode == 3000 && strlen($siopCode) == 18) || (($buCatCode == 1000 || $buCatCode == 1500) && strlen($siopCode) == 13)) {
                $record = array(
                    'code'  =>  $siopCode,
                    'description'   =>  $recData['2'],
                    'material'  =>  $recData['0']
                );
                $levelInfo = $this->productHelper->getLevels($record['code'], $record);
                if ($levelInfo['status']) {
                    if (strtolower($bu) == 'ifs') {
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
                        $oldMaterialCode = $recData[6];
                        if (empty($oldMaterialCode) || $oldMaterialCode == 'NA' || $oldMaterialCode == 'N/A') {
                            $this->createIFSObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'fert');
                        } else {
                            $levelArray = $this->createIFSObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'base');
                            $levelArray = $this->createIFSObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'skeleton');
                            $levelArray = $this->createIFSObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'fert');
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
                    }
                    $status = 'Success';
                    $msg = 'Object Id is: '.$levelArray[0];
                }
                unset($buCatCode, $record, $levelInfo, $folderIndex, $folderCode, $folderId, $folderPath, $levelArray);
            } else {
                $msg = 'Siop Category code and its length does not match.';
            }
        } else {
            $msg = 'SIOP Category not exists.';
        }
        $logRow = [
            'id' => $recData[0],
            'siopfullcode' => $siopCode,
            'record' => $row['record'],
            'statusCode' => $status,
            'failedReason' => $msg
        ];
        $this->logArray[] = $logRow; 
        $logRow = null;
        unset($logRow);
    }
    
    public function getLocalizedQueryData($objId, $record) {
        
        foreach ($this->langArr as $lang) {
            $value = null;
            if ($lang == 'en') {
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
                'sapDescription' => $record['2']
            ];
        }
    }

    public function getQueryTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert', $businessUnit = 'IFS') {
        $siopData = [];
        for ($k=1; $k<=$level; $k++) {
            $index = 'SIOPLevel'.$k;
            $catCode = $levelInfo[$k]['levelFullCode'];
            $siopData[$index] = $this->categories[$catCode]['id'];
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
            'materialGroup' => null,
            'baseUOM' => null,
            'oldMaterialCode' => null,
            'industryStandard' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'eanUpc' => null,
            'stccCode' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null
        ];
        if (strtolower($productType) == 'fert') {
            $queryTableData['articleNumber'] = trim($record['0']);
            $queryTableData['materialGroup'] = trim($record['3']);
            $queryTableData['baseUOM'] = trim($record['5']);
            $queryTableData['oldMaterialCode'] = trim($record['6']);
            $queryTableData['industryStandard'] = trim($record['19']);
            $queryTableData['manufacturer'] = trim($record['20']);
            $queryTableData['manufacturerPartNumber'] = trim($record['21']);
            $queryTableData['eanUpc'] = trim($record['22']);
            $queryTableData['stccCode'] = trim($record['23']);
            $queryTableData['grossWeight'] = trim($record['25']);
            $queryTableData['netWeight'] = trim($record['26']);
            $queryTableData['weightUnit'] = trim($record['27']);
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
            'materialGroup' => null,
            'baseUOM' => null,
            'oldMaterialCode' => null,
            'industryStandard' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'eanUpc' => null,
            'stccCode' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null
        ];
        if (strtolower($productType) == 'fert') {
            $storeTableDataArray['articleNumber'] = trim($record['0']);
            $storeTableDataArray['materialGroup'] = trim($record['3']);
            $storeTableDataArray['baseUOM'] = trim($record['5']);
            $storeTableDataArray['oldMaterialCode'] = trim($record['6']);
            $storeTableDataArray['industryStandard'] = trim($record['19']);
            $storeTableDataArray['manufacturer'] = trim($record['20']);
            $storeTableDataArray['manufacturerPartNumber'] = trim($record['21']);
            $storeTableDataArray['eanUpc'] = trim($record['22']);
            $storeTableDataArray['stccCode'] = trim($record['23']);
            $storeTableDataArray['grossWeight'] = trim($record['25']);
            $storeTableDataArray['netWeight'] = trim($record['26']);
            $storeTableDataArray['weightUnit'] = trim($record['27']);
        }
        $this->storeTableDataArray[] = $storeTableDataArray;
    }

    public function getRelationTableData($objId, $record, $levelInfo, $level=4) {
        for ($k=1; $k<=$level; $k++) {
            $index = 'SIOPLevel'.$k;
            $catCode = $levelInfo[$k]['levelFullCode'];
            $targetId = $this->categories[$catCode]['id'];
            $this->relationTableDataArray[] = [
                'src_id' => $objId,
                'dest_id' => $targetId,
                'type' => 'object',
                'fieldname' => $index,
                'ownertype' => 'object'
            ];
        }
    }
    public function getDependencyTableData($objId, $record, $levelInfo, $level=4) {
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
}
