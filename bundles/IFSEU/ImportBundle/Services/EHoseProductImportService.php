<?php
namespace IFSEU\ImportBundle\Services;

use Exception;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use AppBundle\Lib\UnitConversion;
use DateTime;
use IFSEU\ImportBundle\Model\ProductModel;
use IFSEU\ProductBundle\Services\CompletenessPercentageService;
use Symfony\Component\DependencyInjection\ContainerInterface;


class EHoseProductImportService
{
    
    public $name; // Command Name
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    public $configuredData; // We will pull the data from configured class for this variable
    private $logFileName;
    private $productModel;
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
    private $weightConversionService;
    private $configProviderService;
    private $productHelper;
    private $catConfigData;
    private $businessUnit;
    private $emailService;
    private $logArray;
    private $objectsTableData;
    private $queryTableDataArray;
    private $storeTableDataArray;
    private $localisedQueryTableDataArray;
    private $localisedDataTableDataArray;
    private $relationTableDataArray;
    private $relationTableDataDeleteArray;
    private $dependencyTableDataArray;
    private $bricksDataArray;
    private $mapBricksArray;
    private $percentageCompletionService;
    private $unitConversionService;
    private $countryOrigin;
    private $productProperties;
    private $fieldsOfApplication;
    private $flowMedium;
    private $standards;
    private $BaseLevelCategory;
    private $BrandName;
    private $SubCategory;
    private $minimumOrderIdArray;
    private $shippingConditionsIdArray;
    private $manufacturingLengthIdArray;
    private $ConditionsIdArray;
    private $productionLengthIdArray;
    private $noteInfoIdArray;
    private $container;

    const LOGGER_MODULE = 'SAP IMPORT SHEET';
    const GROSS_WEIGHT_UNITS = [
        "LB" => UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT,
        "KG" => UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_M,
        "G" => UnitConversion\WeightPerLengthConverter::UNIT_G_PER_FT
    ];
    
    public function __construct(CompletenessPercentageService $percentageCompletionService, ContainerInterface $container)
    {
            $this->container = $container;
        $this->percentageCompletionService = $percentageCompletionService;        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->logFileName          = 'ifseu-products-log-' . date('Ymdhis');
        $this->common               = $this->container->get('ifs_eu_import.common_helper');
        $this->productModel         = $this->container->get('ifs_eu_import.product_model');
        $this->configProviderService= $this->container->get('ifs_eu_import.config_provider_service');
        $this->productHelper        = $this->container->get('ifs_eu_import.product_helper');
        $this->materialConfigData   = $this->configProviderService->getProductImportConfig();
        $this->catConfigData        = $this->configProviderService->getCategoryConfig();
        $this->businessUnit         = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->brickMappingService  = $this->container->get('ifs_eu_import.category_brick_mapping_service');
        $this->columnName           = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'columnName');
        $this->weightConversionService = new UnitConversion\WeightPerLengthConverter();

        $this->baseSiopMismatchLog  = [];
        $this->unitConversionService= $this->container->get('ifs_eu_import.unit_conversion_import_service');
    }
    
    /**
     * Update table name in import table class
     */
    private function initImportTable()
    {
        $this->langArr = ['de', 'en', 'es', 'fr', 'pt', 'ru_RU', 'it_IT','zh','da','fi_FI','nl_NL','nn_NO','pl_PL','sv_SE','en_GB'];
        $tables = $this->common->getParameter($this->materialConfigData, 'table');
        $tables['fileColumns'] = $this->csvHeader;
        $tables['mappingCsvColumn'] = $this->columnName;
        $tables['keyColumns'] = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'keyColumns');
        $this->baseSiopMismatchEmailTemplate = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'baseSIOPMismatchEmailTemplate');
        
        $this->productModel->init($tables);
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
        $this->countryOrigin = [];
        $this->productProperties = [];
        $this->fieldsOfApplication = [];
        $this->flowMedium = [];
        $this->standards = [];
        $this->BaseLevelCategory = [];
        $this->BrandName = [];
        $this->SubCategory = [];
        $this->minimumOrderIdArray = [];
        $this->shippingConditionsIdArray = [];
        // $this->manufacturingLengthIdArray = [];
        $this->ConditionsIdArray = [];
        $this->productionLengthIdArray = [];
        $this->noteInfoIdArray = [];

        $materialGrpList = $this->productModel->getMaterialGroupData();
        $countryOriginList = $this->productModel->getCountryOriginData();
        $baseLevelCategoryList = $this->productModel->getCatagoryData();
        $propertiesList = $this->productModel->getPropertiesData();
        $fieldsOfApplicationList = $this->productModel->getfieldsOfApplicationData();
        $flowMediumList = $this->productModel->getflowMediumData();
        $standardsList = $this->productModel->getstandardsData();
        $BrandNameList = $this->productModel->getBrandsData();
        $subCategoryList = $this->productModel->getSubCategoryData();
        $minimumOrderList = $this->productModel->getMinimumOrderLanguageData();
        $shippingConditionsList = $this->productModel->getShippingConditionsData();
        // $manufacturingLengthList = $this->productModel->getManufacturingLengthData();
        $ConditionsList = $this->productModel->getConditionsData();
        $productionLengthList = $this->productModel->getProductionLengthData();
        $NoteInfoList = $this->productModel->getNoteInfoBelowTableData();

        foreach($minimumOrderList as $minimumOrderData) {
            $id = $minimumOrderData['MinimumOrder'];
            $this->minimumOrderIdArray[$id] = $minimumOrderData['oo_id'];
            unset($id);
        }

        foreach($ConditionsList as $ConditionsData) {
            $id = $ConditionsData['Conditions'];
            $this->ConditionsIdArray[$id] = $ConditionsData['oo_id'];
            unset($id);
        }

        // foreach($manufacturingLengthList as $manufacturingLengthData) {
        //     $id = $manufacturingLengthData['ManufacturingLength'];
        //     $this->manufacturingLengthIdArray[$id] = $manufacturingLengthData['oo_id'];
        //     unset($id);
        // }

        foreach($productionLengthList as $productionLengthData) {
            $id = $productionLengthData['ProductionLength'];
            $this->productionLengthIdArray[$id] = $productionLengthData['oo_id'];
            unset($id);
        }

        foreach($NoteInfoList as $NoteInfoData) {
            $id = $NoteInfoData['NoteInformationBelowTable'];
            $this->noteInfoIdArray[$id] = $NoteInfoData['oo_id'];
            unset($id);
        }

        foreach($materialGrpList as $materialGrp) {
            $code = $materialGrp['code'];
            $this->materialGroup[$code] = $materialGrp['oo_id'];
            unset($code);
        }
        foreach($countryOriginList as $countryOriginData) {
            $countryName = $countryOriginData['CountryName'];
            $this->countryOrigin[$countryName] = $countryOriginData['oo_id'];
            unset($countryName);
        }
        foreach($baseLevelCategoryList as $baseLevelCategoryData) {
            $categoryName = $baseLevelCategoryData['o_key'];
            $this->BaseLevelCategory[$categoryName] = $baseLevelCategoryData['oo_id'];
            unset($categoryName);
        }
        foreach($propertiesList as $propertiesListData){
            $propertyType=$propertiesListData['TypeName'];
            $propertyValue=$propertiesListData['o_key'];
            $this->productProperties[$propertyType][$propertyValue]=$propertiesListData['oo_id'];
        }
        foreach($fieldsOfApplicationList as $fieldsOfApplicationData) {
            $applicationName = $fieldsOfApplicationData['o_key'];
            $this->fieldsOfApplication[$applicationName] = $fieldsOfApplicationData['oo_id'];
            unset($applicationName);
        }
        foreach($flowMediumList as $flowMediumData) {
            $flowMediumName = $flowMediumData['o_key'];
            $this->flowMedium[$flowMediumName] = $flowMediumData['oo_id'];
            unset($flowMediumName);
        }
        foreach($standardsList as $standardsData) {
            $standardsName = $standardsData['o_key'];
            $this->standards[$standardsName] = $standardsData['oo_id'];
            unset($standardsName);
        }
        foreach($subCategoryList as $subCategoryData) {
            $subCategoryName = $subCategoryData['o_key'];
            $this->SubCategory[$subCategoryName] = $subCategoryData['oo_id'];
            unset($subCategoryName);
        }
        foreach($BrandNameList as $brandNameData) {
            $brandName = $brandNameData['o_key'];
            $this->BrandName[$brandName] = $brandNameData['oo_id'];
            unset($brandName);
        }

    }
      
    public function import()
    {
        $sapFileFeeder  = $this->container->get('ifs_eu_import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('eHoseProduct');
        if($this->filePath){
            $csvInfo = ImportService::getCSVData($this->filePath);
            $this->csvHeader = array_flip($csvInfo['header']);
            try {
                $this->initImportTable();
                Logger::log(self::LOGGER_MODULE)->info("Product import started");
                
                $this->productModel->truncateTempTable();
                $this->productModel->insertDataInTemp($csvInfo['data']);
                Logger::log(self::LOGGER_MODULE)->info("Data Sheet imported in temp table");
                // $this->productModel->processDeletedProducts();
                // Logger::log(self::LOGGER_MODULE)->info("Removed records in data sheet, marked as unpublished.");
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
                    $this->sendSkippedArticlesEmailNotification($this->baseSiopMismatchLog, $this->baseSiopMismatchEmailTemplate);
                }
            } catch (\Throwable $th) {
                p_r($th);
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
                $fileName = "IFSEU_SAP_import_skipped_articles_" . '-' . date('YmdHis') . '.csv';
                $logFilePath = PIMCORE_SYSTEM_TEMP_DIRECTORY."/".$fileName;
                $fp = fopen($logFilePath, 'wb');
                fputcsv($fp, ['materialNumber', 'siop', '6digit', 'mismatchedSiopCode', 'mismatchedMatrialNumber']);
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
                        throw new Exception("Base SIOP mismatch email template not found.");
                    }
                } else {
                    throw new Exception("Base SIOP mismatch email template not configured.");
                }
            }
        } catch (\Throwable $th) {
            p_r($th);
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($th);
//            Logger::error("sap_import_log", $th);
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
        $this->mapBricksArray = [];
        foreach ($this->langArr as $lang) {
            $this->localisedQueryTableDataArray[$lang] = [];    
        }
        echo "Memory usage before garbage collector: ". memory_get_usage().PHP_EOL;
        \Pimcore::collectGarbage();
        //gc_collect_cycles();
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
            $this->productModel->insertIntoProductTable($this->queryTableDataArray, 'object_query_IFSEUProduct');
        }
        if(!empty($this->storeTableDataArray)) {
            $this->productModel->insertIntoProductTable($this->storeTableDataArray, 'object_store_IFSEUProduct');
        }
        if (!empty($this->relationTableDataArray)) {
            $this->productModel->insertDataInRelationalTable($this->relationTableDataArray, 'object_relations_IFSEUProduct');
        }
        
        foreach ($this->langArr as $lang) {
            if (!empty($this->localisedQueryTableDataArray[$lang])) {
                $tbl = 'object_localized_query_IFSEUProduct_'.($lang);
                $this->productModel->insertIntoProductTable($this->localisedQueryTableDataArray[$lang], $tbl);    
            }
        }
        if (!empty($this->localisedDataTableDataArray)) {
            $this->productModel->insertIntoProductTable($this->localisedDataTableDataArray, 'object_localized_data_IFSEUProduct');
        }
        if (!empty($this->dependencyTableDataArray)) {
            $this->productModel->insertIntoProductTable($this->dependencyTableDataArray, 'dependencies');
        }
        if (!empty($this->mapBricksArray)) {
            foreach ($this->mapBricksArray as $tbl => $data) {
                if (!empty($data)) {
                    $this->productModel->insertIntoProductTable($data, $tbl);
                }
            }
        }
        if (!empty($this->bricksDataArray)) {
            foreach ($this->bricksDataArray as $tbl => $data) {
                if (!empty($data)) {
                    $this->productModel->insertIntoProductTable($data, $tbl);
                }
            }
        }
    }

    // public function getmanufacturingLengthID($eachmanufacturingLengthValue){
    //     foreach ($this->manufacturingLengthIdArray as $manufacturingLengthName => $manufacturingLengthId) {
    //         if ($manufacturingLengthName == $eachmanufacturingLengthValue) {
    //             return $manufacturingLengthId;
    //         }
    //     }
    // }

    public function getMinimumOrderID($eachMinimumOrderValue){
        foreach ($this->minimumOrderIdArray as $minimumOrderName => $minId) {
            if ($minimumOrderName == $eachMinimumOrderValue) {
                return $minId;
            }
        }
    }
    public function getConditionsID($eachConditionsValue){
        foreach ($this->ConditionsIdArray as $ConditionsName => $ConditionId) {
            if ($ConditionsName == $eachConditionsValue) {
                return $ConditionId;
            }
        }
    }
    public function getShippingConditionsID($eachshippingConditionsValue){
        foreach ($this->shippingConditionsIdArray as $shippingConditionsName => $ShippingId) {
            if ($shippingConditionsName == $eachshippingConditionsValue) {
                return $ShippingId;
            }
        }
    }
    public function getproductionLengthID($eachproductionLengthValue){
        foreach ($this->productionLengthIdArray as $productionLengthName => $productionLengthId) {
            if ($productionLengthName == $eachproductionLengthValue) {
                return $productionLengthId;
            }
        }
    }
    public function getNoteInfoBelowTableID($eachnoteInfoValue){
        foreach ($this->noteInfoIdArray as $noteInfoName => $noteInfoId) {
            if ($noteInfoName == $eachnoteInfoValue) {
                return $noteInfoId;
            }
        }
    }

    private function getRecordIndexByKey($key) {
        return $this->csvHeader[$this->columnName[$key]];
    }
    public function createIFSEUObject($record, $parentId, $parentPath, $levelInfo, $type) 
    {
        $bricksList = '';

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
            'o_key' => $objectKey,
            'path' => $parentPath.'/',
            'o_className' => 'IFSEUProduct'
        ];
        $currentLevelPath = $parentPath.'/'.$objectKey;
        if (!array_key_exists($currentLevelPath, $this->products)) {
            if ($type == 'fert') {
                // Need to check the current path of fert, changed or not
                $newPath = explode("/", $currentLevelPath);
                array_pop($newPath);
                $newPath = implode("/", $newPath);
                
                $productObj = new \Pimcore\Model\DataObject\IFSEUProduct;
                $currentPathId = $productObj->getByPath($newPath)->getId();
                
                $materialNumber = $record[$this->getRecordIndexByKey('material')];
                $data = $this->productModel->checkIfArticleExists($materialNumber);
                
                if (!empty($data)) {
                    $objId = $data[0]['oo_id'];
                    $objectArr['o_id'] = $objId;
                    $objectArr['parentId'] = $currentPathId;
                }
            }
            $objId = $this->productModel->insertInObjects($objectArr);
        } else {
            $objId = $this->products[$currentLevelPath];
        }
        $this->products[$currentLevelPath] = $objId;
        $this->getQueryTableData($objId, $record, $levelInfo, $objectIndex, $type, 'IFSEU');
        $this->getStoreTableData($objId, $record, $levelInfo, $objectIndex, $type, 'IFSEU');
        $this->getRelationTableData($objId, $record, $levelInfo, $objectIndex, $type);
        $this->getLocalizedQueryData($objId, $record, $type);
        $this->getDependencyTableData($objId, $record, $levelInfo, $objectIndex, $type);
        $this->getBricksDataForMapping($objId);

        $groupNames = $this->categories[$fertLevelCode]['data']['RelatedObjectBrick'];
        $groupNames = trim($groupNames, ',');
        if (!empty($groupNames)) {
            $groupNamesArray = explode(',', $groupNames);
            if($type != 'fert'){
                $bricksList = $this->brickMappingService->getMappedBrickKeys($groupNamesArray, $type);
            }
            
            $this->setBricksData($objId, $bricksList, $type, $record);
            unset($groupNames, $groupNamesArray, $bricksList);
        }

        unset($objectIndex, $currentLevelCode, $fertLevelCode, $categoryPath, $type, $currentLevelArray, $objectKey, $objectArr, $parentPath);

        return [$objId, $currentLevelPath];
    }


    public function processSingleRecord($siopCode, $row) {
        $recData =  (array) json_decode($row['record']);
        $status = 'Failed';
        $errorFlag = false;
        $prodHier6 = $recData[$this->getRecordIndexByKey('prodHier6')];
        $prodHier7 = $recData[$this->getRecordIndexByKey('prodHier7')];

        if (array_key_exists($siopCode, $this->categories)) {
            
            if ($this->productHelper->isValidCategoryCode($siopCode)) {

                if($this->productModel->checkHierarchyExistAtLevel($prodHier6, 6) && $this->productModel->checkHierarchyExistAtLevel($prodHier7, 7)) {
                    
                    // if (!empty(trim($recData[$this->getRecordIndexByKey('group')]))) {
                        echo $recData['0'].PHP_EOL;
                        $record = array(
                            'code'  =>  $siopCode,
                            'description'   =>  $recData[$this->getRecordIndexByKey('description')],
                            'material'  =>  $recData[$this->getRecordIndexByKey('material')]
                        );

                        $result = $this->processLevelInfo($record, $recData, $errorFlag);

                        $status = $result['status'];
                        $msg    = $result['msg'];
                    // } else {
                    //     $msg = 'Material Group code can not be empty.';
                    // }
                }
                else
                {
                    $msg = '6th or 7th level hierarchy does not exists.'; 
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
                'materialNumber' => $recData[$this->getRecordIndexByKey('material')],
                'siop' => $siopCode,
                '6digit' => null,
                'mismatchedSiopCode' => null,
                'mismatchedMaterialNumber' => null
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
            $folderIndex = count($levelInfo['levels'])-2;
            $folderCode = $levelInfo['levels'][$folderIndex]['levelFullCode'];
            $folderPath = $this->categories[$folderCode]['fullPath'];
            
            $folderPath = $this->productHelper->convertCategoryPathToProduct($folderPath);
            
            if (!array_key_exists($folderPath, $this->products)) {
                $folderId = $this->productHelper->getFolderByPath($folderPath);
                $this->products[$folderPath] = $folderId;
            } else {
                $folderId = $this->products[$folderPath];
            }

            $levelArray = $this->createIFSEUObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'base');
            if (!$errorFlag) {
                $this->updatedArticlesArray[] = $levelArray[0]; 
            }

            $levelArray = $this->createIFSEUObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'skeleton');
            if (!$errorFlag) {
                $this->updatedArticlesArray[] = $levelArray[0]; 
            }

            $levelArray = $this->createIFSEUObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'fert');

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
        $noteInfoIds = '';

        foreach ($this->langArr as $lang) {
            $value =$headlineWeb=$marking1=$marking2=$noteInformationBelowTable= null;
            if ($lang == 'en' && strtolower($productType) == 'fert') {
                $value = $record[$this->getRecordIndexByKey('description')];
            }

            if($lang == 'en' && strtolower($productType) == 'base') {
                $headlineWeb = $record[$this->getRecordIndexByKey('headlineWeb')];
                $marking1 = $record[$this->getRecordIndexByKey('Marking1')];
                $marking2 = $record[$this->getRecordIndexByKey('Marking2')];

                if(!empty(trim($record[$this->getRecordIndexByKey('NoteInformationBelowTable')]))){

                    $noteInfoValue=trim($record[$this->getRecordIndexByKey('NoteInformationBelowTable')]);
                    $noteInfoValueArr=explode(',',$noteInfoValue);
                    foreach($noteInfoValueArr as $eachnoteInfoValueArr){
                        if(!empty($eachnoteInfoValueArr)){
                            $eachnoteInfoValue=trim($eachnoteInfoValueArr);
                            $noteInfoIdsArr[] = $this->getNoteInfoBelowTableID($eachnoteInfoValue);
                        }
                    }
                    if(!empty($noteInfoIdsArr)){
                        $noteInfoIds=implode(',',$noteInfoIdsArr);
                    }
                }
            }
            $this->localisedDataTableDataArray[] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $value,
                'headlineWeb'=>$headlineWeb,
                'Marking2'=>$marking2,
                'Marking1'=>$marking1,
                'NoteInformationBelowTable'=>$noteInfoIds
            ];
            $this->localisedQueryTableDataArray[$lang][] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $value,
                'headlineWeb'=>$headlineWeb,
                'Marking2'=>$marking2,
                'Marking1'=>$marking1,
                'NoteInformationBelowTable'=>$noteInfoIds
            ];
        }
    }

    public function getQueryTableData($objId, $record, $levelInfo, $level=5, $productType = 'fert', $businessUnit = 'IFSEU') {

        $siopData = [];
        for ($k=1; $k<=7; $k++) {
            $index = 'SIOPLevel'.$k;
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
            'oo_classId' => 'IFSEUProduct',
            'oo_className' => 'IFSEUProduct',
            'ProductType' => strtolower($productType),
            'BusinessUnit' => strtoupper($businessUnit),
            'siopFullCode' => $siopFullCode,
            'materialNumber' => null,
            'materialGroup__id' => null,
            'materialGroup__type' => null,
            // 'baseUOM' => null,
            // 'oldMaterialCode' => null,
            // 'industryStandard' => null,
            // 'manufacturer' => null,
            // 'manufacturerPartNumber' => null,
            'EANCode' => null,
            // 'stccCode' => null,
            // 'grossWeight' => null,
            // 'netWeight' => null,
            // 'weightUnit' => null,
            'weightKg' => null,
            'weightg' => null,
            // 'b2BexternalID' => null,
            'WeightLbsPerFTUOM' => null,
            'productLength' => null,
            'EhoseID' => null,
            'ProductLengthUnit' => null,
            'MinimumQuantityMeasurementUnit' => null,
            'productionLength' => null,
            'priceDate' => null,
            'minimumQuantityUnit' => null,
            'Spezi' => null,
            'GrossPrice' => null,
            'Discount' => null,
            'OnStock' => null,
            'CustomsTariffNumber' => null,
            'Note' => null,
            'Department' => null,
            'ConnectionType' => null,
            'countryOfOrigin__id' => null,
            'countryOfOrigin__type' => null,
            'eHoseProduct' => null,
            'additionalDiscount' => null
        ];
        
        if (strtolower($productType) == 'fert') {
            $queryTableData['materialNumber'] = trim($record[$this->getRecordIndexByKey('material')]);
            // $queryTableData['baseUOM'] = trim($record[$this->getRecordIndexByKey('baseUOM')]);
            // $queryTableData['oldMaterialCode'] = trim($record[$this->getRecordIndexByKey('oldMaterial')]);
            // $queryTableData['industryStandard'] = trim($record[$this->getRecordIndexByKey('industryStandard')]);
            // $queryTableData['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            // $queryTableData['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey('manufacturePartNumber')]);
            $queryTableData['productLength'] = trim($record[$this->getRecordIndexByKey('productLength')]);
            $queryTableData['additionalDiscount'] = trim($record[$this->getRecordIndexByKey('additionalDiscount')]);
            $queryTableData['EhoseID'] = trim($record[$this->getRecordIndexByKey('EhoseID')]);
            $queryTableData['ProductLengthUnit'] = trim($record[$this->getRecordIndexByKey('ProductLengthUnit')]);
            $queryTableData['MinimumQuantityMeasurementUnit'] = trim($record[$this->getRecordIndexByKey('MinimumQuantityMeasurementUnit')]);
            $priceDateData = trim($record[$this->getRecordIndexByKey('priceDate')]);
            $priceDate = strtotime($priceDateData);
            $queryTableData['priceDate'] = $priceDate;
            $queryTableData['minimumQuantityUnit'] = trim($record[$this->getRecordIndexByKey('minimumQuantityUnit')]);
            $queryTableData['Spezi'] = trim($record[$this->getRecordIndexByKey('Spezi')]);
            $queryTableData['GrossPrice'] = trim($record[$this->getRecordIndexByKey('GrossPrice')]);
            $queryTableData['Discount'] = trim($record[$this->getRecordIndexByKey('Discount')]);
            $queryTableData['OnStock'] = trim($record[$this->getRecordIndexByKey('OnStock')]);
            $queryTableData['CustomsTariffNumber'] = trim($record[$this->getRecordIndexByKey('CustomsTariffNumber')]);
            $queryTableData['Note'] = trim($record[$this->getRecordIndexByKey('Note')]);
            $queryTableData['Department'] = trim($record[$this->getRecordIndexByKey('Department')]);
            $queryTableData['ConnectionType'] = trim($record[$this->getRecordIndexByKey('ConnectionType')]);
            $queryTableData['eHoseProduct'] = true;
            // $queryTableData['stccCode'] = trim($record[$this->getRecordIndexByKey('stccCode')]);
            // $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            // $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            // $queryTableData['grossWeight'] = $grossWeight;
            // $queryTableData['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            // $queryTableData['weightUnit'] = $weightUnit;
            // $queryTableData['b2BexternalID'] = trim($record[$this->getRecordIndexByKey('b2BexternalID')]);
            $queryTableData['weightg'] = trim($record[$this->getRecordIndexByKey('weightg')]);

            if(!empty(trim($record[$this->getRecordIndexByKey('productionLength')]))){

                $productionLengthValue=trim($record[$this->getRecordIndexByKey('productionLength')]);
                $productionLengthValueArr=explode(',',$productionLengthValue);
                foreach($productionLengthValueArr as $eachproductionLengthValueArr){
                    if(!empty($eachproductionLengthValueArr)){
                        $eachproductionLengthValue=trim($eachproductionLengthValueArr);
                        $productionLengthIdsArr[] = $this->getproductionLengthID($eachproductionLengthValue);
                    }
                }
                if(!empty($productionLengthIdsArr)){
                    $productionLengthIds=implode(',',$productionLengthIdsArr);
                    $queryTableData['productionLength']=$productionLengthIds;
                }
            }

            if (!empty(trim($record[$this->getRecordIndexByKey('EANCode')]))) {
                $queryTableData['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            } else {
                $queryTableData['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            }
            
            // $materialGrpId = $this->getOrCreateMaterialGroupCodeId(trim($record[$this->getRecordIndexByKey('group')]));
            // if(!empty($materialGrpId)) {
            //     $queryTableData['materialGroup__id'] = $materialGrpId;
            //     $queryTableData['materialGroup__type'] = 'object';
            // }
            $countryOriginId = $this->getCountryOriginCodeId(trim($record[$this->getRecordIndexByKey('countryOfOrigin')]));
            if(!empty($countryOriginId)) {
                $queryTableData['countryOfOrigin__id'] = $countryOriginId;
                $queryTableData['countryOfOrigin__type'] = 'object';
            }
        }
        if(strtolower($productType) == 'base'){
            $queryTableData['Category'] = null;
            $queryTableData['minimumTemperatureC'] = null;
            $queryTableData['maximumTemperatureC'] = null;
            $queryTableData['FeaturesBenefitsBulletPoint'] = null;
            $queryTableData['productBrandName'] = null;
            $queryTableData['Sub_Category'] = null;
            $queryTableData['WebsiteLink'] = null;
            $queryTableData['minimumOrder'] = null;
            $queryTableData['Conditions'] = null;
            $queryTableData['shippingConditions'] = null;
            // $queryTableData['ManufacturingLength'] = null;

            $queryTableData['temporaryUntilC'] = trim($record[$this->getRecordIndexByKey('temporaryUntilC')]);
            $queryTableData['temporaryUntilT'] = trim($record[$this->getRecordIndexByKey('temporaryUntilT')]);
            $queryTableData['DampableUntil1C'] = trim($record[$this->getRecordIndexByKey('DampableUntil1C')]);
            $queryTableData['DampableUntil1T'] = trim($record[$this->getRecordIndexByKey('DampableUntil1T')]);
            $queryTableData['DampableUntil2C'] = trim($record[$this->getRecordIndexByKey('DampableUntil2C')]);
            $queryTableData['DampableUntil2T'] = trim($record[$this->getRecordIndexByKey('DampableUntil2T')]);
            $queryTableData['WebsiteLink']     = trim($record[$this->getRecordIndexByKey('WebsiteLink')]);

            $queryTableData['eHoseProduct'] = true;

            // if(!empty(trim($record[$this->getRecordIndexByKey('ManufacturingLength')]))){

            //     $manufacturingLengthValue=trim($record[$this->getRecordIndexByKey('ManufacturingLength')]);
            //     $manufacturingLengthValueArr=explode(',',$manufacturingLengthValue);
            //     foreach($manufacturingLengthValueArr as $eachManufacturingLengthValueArr){
            //         if(!empty($eachManufacturingLengthValueArr)){
            //             $eachManufacturingLengthValue=trim($eachManufacturingLengthValueArr);
            //             $manufacturingLengthIdsArr[] = $this->getManufacturingLengthID($eachManufacturingLengthValue); 
            //         }
            //     }
            //     if(!empty($manufacturingLengthIdsArr)){
            //         $manufacturingLengthIds=implode(',',$manufacturingLengthIdsArr);
            //         $queryTableData['ManufacturingLength']=$manufacturingLengthIds;
            //     }
            // }

            if(!empty(trim($record[$this->getRecordIndexByKey('minimumOrder')]))){

                $minimumOrderValue=trim($record[$this->getRecordIndexByKey('minimumOrder')]);
                $minimumOrderValueArr=explode(',',$minimumOrderValue);
                foreach($minimumOrderValueArr as $eachMinimumOrderValueArr){
                    if(!empty($eachMinimumOrderValueArr)){
                        $eachMinimumOrderValue=trim($eachMinimumOrderValueArr);
                        $minimumOrderIdsArr[] = $this->getMinimumOrderID($eachMinimumOrderValue);
                    }
                }
                if(!empty($minimumOrderIdsArr)){
                    $minOrderIds=implode(',',$minimumOrderIdsArr);
                    $queryTableData['minimumOrder']=$minOrderIds;
                }
            }

            if(!empty(trim($record[$this->getRecordIndexByKey('Conditions')]))){

                $ConditionsValue=trim($record[$this->getRecordIndexByKey('Conditions')]);
                $ConditionsValueArr=explode(',',$ConditionsValue);
                foreach($ConditionsValueArr as $eachConditionsValueArr){
                    if(!empty($eachConditionsValueArr)){
                        $eachConditionsValue=trim($eachConditionsValueArr);
                        $ConditionsIdsArr[] = $this->getConditionsID($eachConditionsValue);
                    }
                }
                if(!empty($ConditionsIdsArr)){
                    $ConditionsIds=implode(',',$ConditionsIdsArr);
                    $queryTableData['Conditions']=$ConditionsIds;
                }
            }

            if(!empty(trim($record[$this->getRecordIndexByKey('shippingConditions')]))){

                $shippingConditionsValue=trim($record[$this->getRecordIndexByKey('shippingConditions')]);
                $shippingConditionsValueArr=explode(',',$shippingConditionsValue);
                foreach($shippingConditionsValueArr as $eachshippingConditionsValueArr){
                    if(!empty($eachshippingConditionsValueArr)){
                        $eachshippingConditionsValue=trim($eachshippingConditionsValueArr);
                        $shippingConditionsIdsArr[] = $this->getShippingConditionsID($eachshippingConditionsValue); 
                    }
                }
                if(!empty($shippingConditionsIdsArr)){
                    $shippingConditionsIds=implode(',',$shippingConditionsIdsArr);
                    $queryTableData['shippingConditions']=$shippingConditionsIds;
                }
            }

            if(trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]) == '1' || trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]) == '0'){
                $onlyOpenSystem =  trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]);
                $queryTableData['onlyOpenSystem'] = $this->getBooleanValue($onlyOpenSystem);
            }
            
            $category = trim($record[$this->getRecordIndexByKey('Category')]);
            $categoryDataInSheet = str_replace(" / ", " - ", $category);
            $getCatagoryID = $this->getCategoryCodeId($categoryDataInSheet);
            $conversionAttributeArr=[];
            if(!empty($getCatagoryID)) {
                $queryTableData['Category'] = $getCatagoryID;
            }

            $productBrandName = trim($record[$this->getRecordIndexByKey('productBrandName')]);
            $productBrandNameId = $this->getproductBrandNameId($productBrandName);
            $queryTableData['productBrandName'] = $productBrandNameId;

            $subCategory = trim($record[$this->getRecordIndexByKey('Sub_Category')]);
            $subCategoryId = $this->getSubCategoryId($subCategory);
            $queryTableData['Sub_Category'] = $subCategoryId;

            $minimumTemperatureC = trim($record[$this->getRecordIndexByKey('minimumTemperatureC')]);
            $maximumTemperatureC = trim($record[$this->getRecordIndexByKey('maximumTemperatureC')]);
            $queryTableData['minimumTemperatureC'] = $minimumTemperatureC;
            $queryTableData['maximumTemperatureC'] = $maximumTemperatureC;
            // $queryTableData['minimumTemperatureF'] =  trim($record[$this->getRecordIndexByKey('minimumTemperatureF')]);
            // $queryTableData['maximumTemperatureF'] =  trim($record[$this->getRecordIndexByKey('maximumTemperatureF')]);

            $queryTableData['minimumTemperatureC'] = $minimumTemperatureC;
            $queryTableData['maximumTemperatureC'] = $maximumTemperatureC;
            // $queryTableData['minimumTemperatureF'] =  trim($record[$this->getRecordIndexByKey('minimumTemperatureF')]);
            // $queryTableData['maximumTemperatureF'] =  trim($record[$this->getRecordIndexByKey('maximumTemperatureF')]);

            if(!empty($minimumTemperatureC)){
                $attributeGroupName = $this->unitConversionService->getAttributeGroupName('minimumTemperatureC');
                if($attributeGroupName && !empty($minimumTemperatureC)){
                    $conversionAttributeArr= $this->unitConversionService->getGroupWithValues('minimumTemperatureC', floatval($minimumTemperatureC));
                    foreach($conversionAttributeArr as $key=>$convertValues){
                        $queryTableData[$key]=$convertValues;
                    }
                }
            }
            if(!empty($maximumTemperatureC)){
                $attributeGroupName = $this->unitConversionService->getAttributeGroupName('maximumTemperatureC');
                if($attributeGroupName && !empty($maximumTemperatureC)){
                    $conversionAttributeArr= $this->unitConversionService->getGroupWithValues('maximumTemperatureC', floatval($maximumTemperatureC));
                    foreach($conversionAttributeArr as $key=>$convertValues){
                        $queryTableData[$key]=$convertValues;
                    }
                }
            }

            if(isset($queryTableData['maximumTemperatureC']) && isset($queryTableData['minimumTemperatureC'])){
                $queryTableData['rangeTemperatureC']=$queryTableData['minimumTemperatureC'] . "°C" ." to " . $queryTableData['maximumTemperatureC'] . "°C";

            }
            // if(isset($queryTableData['minimumTemperatureF']) && isset($queryTableData['maximumTemperatureF'])){
            //     $queryTableData['rangeTemperatureF']=$queryTableData['minimumTemperatureF'] . "°F" ." to " . $queryTableData['maximumTemperatureF'] . "°F";

            // }

            // if(isset($queryTableData['minimumTemperatureC']) && isset($queryTableData['maximumTemperatureC'])){
            //     $queryTableData['temperatureRangeFAndC']= $queryTableData['rangeTemperatureF']. " ( ".$queryTableData['rangeTemperatureC']." )";
            // }



            if(!empty(trim($record[$this->getRecordIndexByKey('FeaturesBenefitsBulletPoint')]))){

                $propertyType='propertiesGeneral';
                $fieldValue=trim($record[$this->getRecordIndexByKey('FeaturesBenefitsBulletPoint')]);
                $fieldsValueArr=explode(',',$fieldValue);
                $propertyIdsArr=[];
                foreach($fieldsValueArr as $values){
                    if(!empty($values)){
                        $values=trim($values);
                        if(array_key_exists($values,$this->productProperties[$propertyType])){
                            $propertyIdsArr[]=$this->productProperties[$propertyType][$values];
                        }
                    }
                }
                if(!empty($propertyIdsArr)){
                    $propertyIds=implode(',',$propertyIdsArr);
                    $queryTableData['FeaturesBenefitsBulletPoint']=$propertyIds;
                }
            }

        }
        if(strtolower($productType) == 'skeleton'){
            $queryTableData['eHoseProduct'] = true;
        }
        $this->queryTableDataArray[] = array_merge($queryTableData, $siopData);
    }

    public function getStoreTableData($objId, $record, $levelInfo, $level=5, $productType = 'fert', $businessUnit = 'IFSEU') {
        $siopFullCode = trim($record[$this->getRecordIndexByKey('code')]);
        if ($productType == 'base') {
            $siopFullCode = $levelInfo[$level]['levelFullCode'];
        }
        $storeTableDataArray = [
            'oo_id' => $objId,
            'ProductType' => strtolower($productType),
            'BusinessUnit' => strtoupper($businessUnit),
            'siopFullCode' => $siopFullCode,
            'materialNumber' => null,
            // 'baseUOM' => null,
            // 'oldMaterialCode' => null,
            // 'industryStandard' => null,
            // 'manufacturer' => null,
            // 'manufacturerPartNumber' => null,
            'EANCode' => null,
            // 'stccCode' => null,
            // 'grossWeight' => null,
            // 'netWeight' => null,
            // 'weightUnit' => null,
            'weightKg' => null,
            'weightg' => null,
            // 'b2BexternalID' => null,
            'WeightLbsPerFTUOM' => null,
            'productLength' => null,
            'EhoseID' => null,
            'ProductLengthUnit' => null,
            'MinimumQuantityMeasurementUnit' => null,
            'productionLength' => null,
            'priceDate' => null,
            'minimumQuantityUnit' => null,
            'Spezi' => null,
            'GrossPrice' => null,
            'Discount' => null,
            'OnStock' => null,
            'CustomsTariffNumber' => null,
            'Note' => null,
            'Department' => null,
            'ConnectionType' => null,
            'eHoseProduct' => null,
            'additionalDiscount' => null
        ];
        if (strtolower($productType) == 'fert') {
            $storeTableDataArray['materialNumber'] = trim($record[$this->getRecordIndexByKey('material')]);
            // $storeTableDataArray['baseUOM'] = trim($record[$this->getRecordIndexByKey('baseUOM')]);
            // $storeTableDataArray['oldMaterialCode'] = trim($record[$this->getRecordIndexByKey('oldMaterial')]);
            // $storeTableDataArray['industryStandard'] = trim($record[$this->getRecordIndexByKey('industryStandard')]);
            // $storeTableDataArray['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            // $storeTableDataArray['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey('manufacturePartNumber')]);
            $storeTableDataArray['productLength'] = trim($record[$this->getRecordIndexByKey('productLength')]);
            $storeTableDataArray['additionalDiscount'] = trim($record[$this->getRecordIndexByKey('additionalDiscount')]);
            $storeTableDataArray['EhoseID'] = trim($record[$this->getRecordIndexByKey('EhoseID')]);
            $storeTableDataArray['ProductLengthUnit'] = trim($record[$this->getRecordIndexByKey('ProductLengthUnit')]);
            $storeTableDataArray['MinimumQuantityMeasurementUnit'] = trim($record[$this->getRecordIndexByKey('MinimumQuantityMeasurementUnit')]);
            $priceDateData = trim($record[$this->getRecordIndexByKey('priceDate')]);
            $priceDate = strtotime($priceDateData);
            $storeTableDataArray['priceDate'] = $priceDate;
            $storeTableDataArray['minimumQuantityUnit'] = trim($record[$this->getRecordIndexByKey('minimumQuantityUnit')]);
            $storeTableDataArray['Spezi'] = trim($record[$this->getRecordIndexByKey('Spezi')]);
            $storeTableDataArray['GrossPrice'] = trim($record[$this->getRecordIndexByKey('GrossPrice')]);
            $storeTableDataArray['Discount'] = trim($record[$this->getRecordIndexByKey('Discount')]);
            $storeTableDataArray['eHoseProduct'] = true;
            $storeTableDataArray['CustomsTariffNumber'] = trim($record[$this->getRecordIndexByKey('CustomsTariffNumber')]);
            $storeTableDataArray['Note'] = trim($record[$this->getRecordIndexByKey('Note')]);
            $storeTableDataArray['Department'] = trim($record[$this->getRecordIndexByKey('Department')]);
            $storeTableDataArray['ConnectionType'] = trim($record[$this->getRecordIndexByKey('ConnectionType')]);
            // $storeTableDataArray['stccCode'] = trim($record[$this->getRecordIndexByKey('stccCode')]);
            // $storeTableDataArray['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            // $storeTableDataArray['b2BexternalID'] = trim($record[$this->getRecordIndexByKey('b2BexternalID')]);
            $storeTableDataArray['weightg'] = trim($record[$this->getRecordIndexByKey('weightg')]);
            // $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            // $storeTableDataArray['grossWeight'] = $grossWeight;
            // $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            // $storeTableDataArray['weightUnit'] = $weightUnit;

            if(!empty(trim($record[$this->getRecordIndexByKey('productionLength')]))){

                $productionLengthValue=trim($record[$this->getRecordIndexByKey('productionLength')]);
                $productionLengthValueArr=explode(',',$productionLengthValue);
                foreach($productionLengthValueArr as $eachproductionLengthValueArr){
                    if(!empty($eachproductionLengthValueArr)){
                        $eachproductionLengthValue=trim($eachproductionLengthValueArr);
                        $productionLengthIdsArr[] = $this->getproductionLengthID($eachproductionLengthValue);
                    }
                }
                if(!empty($productionLengthIdsArr)){
                    $productionLengthIds=implode(',',$productionLengthIdsArr);
                    $storeTableDataArray['productionLength']=$productionLengthIds;
                }
            }

            if(!empty(trim($record[$this->getRecordIndexByKey('OnStock')]))){
                $OnStockValue =  trim($record[$this->getRecordIndexByKey('OnStock')]);
                $storeTableDataArray['OnStock'] = $this->getBooleanValue($OnStockValue);
            }

            if (!empty(trim($record[$this->getRecordIndexByKey('EANCode')]))) {
                $storeTableDataArray['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            } else {
                $storeTableDataArray['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            }
        }
        if(strtolower($productType) == 'base'){
            $category = trim($record[$this->getRecordIndexByKey('Category')]);
            $categoryDataInSheet = str_replace(" / ", " - ", $category);
            $getCatagoryID = $this->getCategoryCodeId($categoryDataInSheet);
            $conversionAttributeArr=[];
            $storeTableDataArray['Category'] = null;
            $storeTableDataArray['minimumTemperatureC'] = null;
            $storeTableDataArray['maximumTemperatureC'] = null;
            $storeTableDataArray['FeaturesBenefitsBulletPoint'] = null;
            $storeTableDataArray['productBrandName'] = null;
            $storeTableDataArray['Sub_Category'] = null;
            $storeTableDataArray['WebsiteLink'] = null;
            $storeTableDataArray['WebsiteLink'] = null;
            $storeTableDataArray['minimumOrder'] = null;
            $storeTableDataArray['Conditions'] = null;
            $storeTableDataArray['shippingConditions'] = null;
            // $storeTableDataArray['ManufacturingLength'] = null;
            

            $minimumTemperatureC = trim($record[$this->getRecordIndexByKey('minimumTemperatureC')]);
            $maximumTemperatureC = trim($record[$this->getRecordIndexByKey('maximumTemperatureC')]);
            $storeTableDataArray['minimumTemperatureC'] = $minimumTemperatureC;
            $storeTableDataArray['maximumTemperatureC'] = $maximumTemperatureC;
            // $storeTableDataArray['minimumTemperatureF'] =  trim($record[$this->getRecordIndexByKey('minimumTemperatureF')]);
            // $storeTableDataArray['maximumTemperatureF'] =  trim($record[$this->getRecordIndexByKey('maximumTemperatureF')]);
            $storeTableDataArray['temporaryUntilC'] = trim($record[$this->getRecordIndexByKey('temporaryUntilC')]);
            $storeTableDataArray['temporaryUntilT'] = trim($record[$this->getRecordIndexByKey('temporaryUntilT')]);
            $storeTableDataArray['DampableUntil1C'] = trim($record[$this->getRecordIndexByKey('DampableUntil1C')]);
            $storeTableDataArray['DampableUntil1T'] = trim($record[$this->getRecordIndexByKey('DampableUntil1T')]);
            $storeTableDataArray['DampableUntil2C'] = trim($record[$this->getRecordIndexByKey('DampableUntil2C')]);
            $storeTableDataArray['DampableUntil2T'] = trim($record[$this->getRecordIndexByKey('DampableUntil2T')]);
            $storeTableDataArray['WebsiteLink']     = trim($record[$this->getRecordIndexByKey('WebsiteLink')]);
            $storeTableDataArray['eHoseProduct']    = true; 

            // if(!empty(trim($record[$this->getRecordIndexByKey('ManufacturingLength')]))){

            //     $manufacturingLengthValue=trim($record[$this->getRecordIndexByKey('ManufacturingLength')]);
            //     $manufacturingLengthValueArr=explode(',',$manufacturingLengthValue);
            //     foreach($manufacturingLengthValueArr as $eachManufacturingLengthValueArr){
            //         if(!empty($eachManufacturingLengthValueArr)){
            //             $eachManufacturingLengthValue=trim($eachManufacturingLengthValueArr);
            //             $manufacturingLengthIdsArr[] = $this->getManufacturingLengthID($eachManufacturingLengthValue);
            //         }
            //     }
            //     if(!empty($manufacturingLengthIdsArr)){
            //         $manufacturingLengthIds=implode(',',$manufacturingLengthIdsArr);
            //         $storeTableDataArray['ManufacturingLength']=$manufacturingLengthIds;
            //     }
            // }


            if(!empty(trim($record[$this->getRecordIndexByKey('minimumOrder')]))){

                $minimumOrderValue=trim($record[$this->getRecordIndexByKey('minimumOrder')]);
                $minimumOrderValueArr=explode(',',$minimumOrderValue);
                foreach($minimumOrderValueArr as $eachMinimumOrderValueArr){
                    if(!empty($eachMinimumOrderValueArr)){
                        $eachMinimumOrderValue=trim($eachMinimumOrderValueArr);
                        $minimumOrderIdsArr[] = $this->getMinimumOrderID($eachMinimumOrderValue);
                    }
                }
                if(!empty($minimumOrderIdsArr)){
                    $minOrderIds=implode(',',$minimumOrderIdsArr);
                    $storeTableDataArray['minimumOrder']=$minOrderIds;
                }
            }
            
            if(!empty(trim($record[$this->getRecordIndexByKey('Conditions')]))){

                $ConditionsValue=trim($record[$this->getRecordIndexByKey('Conditions')]);
                $ConditionsValueArr=explode(',',$ConditionsValue);
                foreach($ConditionsValueArr as $eachConditionsValueArr){
                    if(!empty($eachConditionsValueArr)){
                        $eachConditionsValue=trim($eachConditionsValueArr);
                        $ConditionsIdsArr[] = $this->getConditionsID($eachConditionsValue);
                    }
                }
                if(!empty($ConditionsIdsArr)){
                    $ConditionsIds=implode(',',$ConditionsIdsArr);
                    $storeTableDataArray['Conditions']=$ConditionsIds;
                }
            }

            if(!empty(trim($record[$this->getRecordIndexByKey('shippingConditions')]))){

                $shippingConditionsValue=trim($record[$this->getRecordIndexByKey('shippingConditions')]);
                $shippingConditionsValueArr=explode(',',$shippingConditionsValue);
                foreach($shippingConditionsValueArr as $eachshippingConditionsValueArr){
                    if(!empty($eachshippingConditionsValueArr)){
                        $eachshippingConditionsValue=trim($eachshippingConditionsValueArr);
                        $shippingConditionsIdsArr[] = $this->getShippingConditionsID($eachshippingConditionsValue);
                    }
                }
                if(!empty($shippingConditionsIdsArr)){
                    $shippingConditionsIds=implode(',',$shippingConditionsIdsArr);
                    $storeTableDataArray['shippingConditions']=$shippingConditionsIds;
                }
            }

            if(trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]) == '1' || trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]) == '0'){
                $onlyOpenSystem =  trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]);
                $storeTableDataArray['onlyOpenSystem'] = $this->getBooleanValue($onlyOpenSystem);
            }

            $productBrandName = trim($record[$this->getRecordIndexByKey('productBrandName')]);
            $productBrandNameId = $this->getproductBrandNameId($productBrandName);
            $storeTableDataArray['productBrandName'] = $productBrandNameId;

            $subCategory = trim($record[$this->getRecordIndexByKey('Sub_Category')]);
            $subCategoryId = $this->getSubCategoryId($subCategory);
            $storeTableDataArray['Sub_Category'] = $subCategoryId;

            if(!empty($getCatagoryID)) {
                $storeTableDataArray['Category'] = $getCatagoryID;
            }

            if(!empty($minimumTemperatureC)){
                $attributeGroupName = $this->unitConversionService->getAttributeGroupName('minimumTemperatureC');
                if($attributeGroupName && !empty($minimumTemperatureC)){
                    $conversionAttributeArr= $this->unitConversionService->getGroupWithValues('minimumTemperatureC', floatval($minimumTemperatureC));
                    foreach($conversionAttributeArr as $key=>$convertValues){
                        $storeTableDataArray[$key]=$convertValues;
                    }
                }
            }

            if(!empty($maximumTemperatureC)){
                $attributeGroupName = $this->unitConversionService->getAttributeGroupName('maximumTemperatureC');
                if($attributeGroupName && !empty($maximumTemperatureC)){
                    $conversionAttributeArr= $this->unitConversionService->getGroupWithValues('maximumTemperatureC', floatval($maximumTemperatureC));
                    foreach($conversionAttributeArr as $key=>$convertValues){
                        $storeTableDataArray[$key]=$convertValues;
                    }
                }
            }
            if(isset($storeTableDataArray['maximumTemperatureC']) && isset($storeTableDataArray['minimumTemperatureC'])){
                $storeTableDataArray['rangeTemperatureC']=$storeTableDataArray['minimumTemperatureC'] . "°C" ." to " . $storeTableDataArray['maximumTemperatureC'] . "°C";

            }
            // if(isset($storeTableDataArray['minimumTemperatureF']) && isset($storeTableDataArray['maximumTemperatureF'])){
            //     $storeTableDataArray['rangeTemperatureF']=$storeTableDataArray['minimumTemperatureF'] . "°F" ." to " . $storeTableDataArray['maximumTemperatureF'] . "°F";

            // }

            // if(isset($storeTableDataArray['minimumTemperatureC']) && isset($storeTableDataArray['maximumTemperatureC'])){
            //     $storeTableDataArray['temperatureRangeFAndC']= $storeTableDataArray['rangeTemperatureF']. " ( ".$storeTableDataArray['rangeTemperatureC']." )";
            // }

            if(!empty(trim($record[$this->getRecordIndexByKey('FeaturesBenefitsBulletPoint')]))){

                $propertyType='propertiesGeneral';
                $fieldValue=trim($record[$this->getRecordIndexByKey('FeaturesBenefitsBulletPoint')]);
                $fieldsValueArr=explode(',',$fieldValue);
                $propertyIdsArr=[];
                foreach($fieldsValueArr as $values){
                    if(!empty($values)){
                        $values=trim($values);
                        if(array_key_exists($values,$this->productProperties[$propertyType])){
                            $propertyIdsArr[]=$this->productProperties[$propertyType][$values];
                        }
                    }
                }
                if(!empty($propertyIdsArr)){
                    $propertyIds=implode(',',$propertyIdsArr);
                    $storeTableDataArray['FeaturesBenefitsBulletPoint']=$propertyIds;
                }
            }
        }
        if(strtolower($productType) == 'skeleton'){
            $storeTableDataArray['eHoseProduct'] = true;
        }

        $this->storeTableDataArray[] = $storeTableDataArray;
    }
    public function getRelationTableData($objId, $record, $levelInfo, $level=5, $productType = 'fert') {
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
            // $materialGroupCode = trim($record[$this->getRecordIndexByKey('group')]);
            // $materialGroupId = $this->getOrCreateMaterialGroupCodeId($materialGroupCode);
            // if (!empty($materialGroupId)) {
            //     $this->relationTableDataArray[] = [
            //         'src_id' => $objId,
            //         'dest_id' => $materialGroupId,
            //         'type' => 'object',
            //         'fieldname' => "materialGroup",
            //         'ownertype' => 'object',
            //         'index' => 0,
            //         'ownername' => '',
            //         'position' => 0
            //     ];
            // }
            $countryOriginName = trim($record[$this->getRecordIndexByKey('countryOfOrigin')]);
            $countryOriginId = $this->getCountryOriginCodeId($countryOriginName);
            if (!empty($countryOriginId)) {
                $this->relationTableDataArray[] = [
                    'src_id' => $objId,
                    'dest_id' => $countryOriginId,
                    'type' => 'object',
                    'fieldname' => "countryOfOrigin",
                    'ownertype' => 'object',
                    'index' => 0,
                    'ownername' => '',
                    'position' => 0
                ];
            }
        }
    }
    public function getDependencyTableData($objId, $record, $levelInfo, $level=5, $productType = 'fert') {
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
            // $materialGroupCode = trim($record[$this->getRecordIndexByKey('group')]);
            // $materialGroupId = $this->getOrCreateMaterialGroupCodeId($materialGroupCode);
            // if (!empty($materialGroupId)) {
            //     $this->dependencyTableDataArray[] = [
            //         'sourceid' => $objId,
            //         'targetid' => $materialGroupId,
            //         'sourcetype' => 'object',
            //         'targettype' => 'object'
            //     ];
            // }

            $countryOriginName = trim($record[$this->getRecordIndexByKey('countryOfOrigin')]);
            $countryOriginId = $this->getCountryOriginCodeId($countryOriginName);
            if (!empty($countryOriginId)) {
                $this->dependencyTableDataArray[] = [
                    'sourceid' => $objId,
                    'targetid' => $countryOriginId,
                    'sourcetype' => 'object',
                    'targettype' => 'object'
                ];
            }
        }
    }
    public function getBricksDataForMapping($objId){
        $this->mapBricksArray['object_brick_query_IFSEUHoseBase_IFSEUProduct'] = array(array('o_id'=>$objId,'fieldname'=>'Base','BaseBrickMapping'=>'test'));
        $this->mapBricksArray['object_brick_store_IFSEUHoseBase_IFSEUProduct'] = array(array('o_id'=>$objId,'fieldname'=>'Base','BaseBrickMapping'=>'test'));

        $this->mapBricksArray['object_brick_query_IFSEUHoseSkeleton_IFSEUProduct'][] = array('o_id'=>$objId,'fieldname'=>'Skeleton','SkeletonBrickMapping'=>'test');
        $this->mapBricksArray['object_brick_store_IFSEUHoseSkeleton_IFSEUProduct'][] = array('o_id'=>$objId,'fieldname'=>'Skeleton','SkeletonBrickMapping'=>'test');
    }
    public function setBricksData($objId, $bricks, $type,$record) {
        if($bricks){
            try{
                $csvHeader      = array_flip($this->csvHeader); 
        
                $rowData        = array_combine($csvHeader, $record);
                foreach ($bricks as $brick) {
                    $bricksData     = $this->productHelper->processBricksData($rowData, $brick); 
                    
                    if (in_array($brick, $this->allBricksList)) {
                        foreach ($this->brickTablePrefixArray  as $brickPrefix) {
                            $tblName = $brickPrefix.ucfirst($brick)."_IFSEUProduct";
                            //$tableData  =['o_id' => $objId, 'fieldname' => ucfirst($type)];
                            if($brick=='IFSEUHoseBase'){
                                
                                $hoseBricksData=$this->hoseBaseBricksAttribute($bricksData,$brick);
                                $tableData  = array_merge(['o_id' => $objId, 'fieldname' => ucfirst($type)], $hoseBricksData);
    
                            }else{
                                $tableData  = array_merge(['o_id' => $objId, 'fieldname' => ucfirst($type)], $bricksData);
    
                            }
                            $this->bricksDataArray[$tblName][] = $tableData;
                        }
                    }
                }
            }catch(\Throwable $th){
                print_r($th);
            }    
        }
    }
    
    public function getOrCreateMaterialGroupCodeId($materialGroupCode) {
        if (!empty($materialGroupCode)) {
            if (!empty($this->materialGroup[$materialGroupCode])) {
                return $this->materialGroup[$materialGroupCode];
            } 
        }
        return null;
    }

    public function hoseBaseBricksAttribute($bricksData,$brick){
        $brickAttributesConfigData  = $this->configProviderService->getBrickAttributesConfig();
        $propertiesAttributeArr=['InnerLining'=>'innerlining','colorInnerLining'=>'colorInn','Reinforcement'=>'reinforcements','Helix'=>'helix','propertiesInnerLayer'=>'propertiesInn','ColorOuterLayer'=>'colorOut','CoverOuterLayer'=>'cover','Haptic'=>'haptic','PropertiesOuterLayer'=>'propertiesOut'];
        foreach ($brickAttributesConfigData as $attributeLabel => $brickAttributeConfig) 
        {
            $fieldMasterType=''; 
            $fieldName  = $brickAttributeConfig['fieldName'];
            $fieldType = $brickAttributeConfig['fieldType'];
            $objectType = $brickAttributeConfig['objectType'];
            $attributeLabel  = trim($attributeLabel);
            if(($objectType==$brick) && ($fieldType=='Select' || $fieldType=='Multiselection'))
            {
                
                if(isset($brickAttributeConfig['fieldMasterType'])){

                    $fieldMasterType=$brickAttributeConfig['fieldMasterType'];
                    $fieldValue = $bricksData[$fieldName];
                    if($fieldMasterType=='Properties'){
                        if(array_key_exists($fieldName,$propertiesAttributeArr)){
                            $propertyType=$propertiesAttributeArr[$fieldName];
                            $fieldsValueArr=explode(',',$fieldValue);
                            $propertyIdsArr=[];
                            foreach($fieldsValueArr as $values){
                                if(!empty($values)){
                                    $values=trim($values);
                                    if(array_key_exists($values,$this->productProperties[$propertyType])){
                                        $propertyIdsArr[]=$this->productProperties[$propertyType][$values];
                                    }else{
                                        $propertyIdsArr[] = "";
                                    }
                                }
                            }
                            if(!empty($propertyIdsArr)){
                                $propertyIdsArr = array_filter($propertyIdsArr);
                                $propertyIds=implode(',',$propertyIdsArr);
                                $bricksData[$fieldName]=$propertyIds;
                            }
                        }
                    }
                    if($fieldMasterType=='Application'){
                        $fieldsValueArr=explode(',',$fieldValue);
                        $fieldsApplicationIdsArr=[];
                        foreach($fieldsValueArr as $values){
                            if(!empty($values)){
                                $values=trim($values);
                                if(array_key_exists($values,$this->fieldsOfApplication)){
                                    $fieldsApplicationIdsArr[]=$this->fieldsOfApplication[$values];
                                }else{
                                    $fieldsApplicationIdsArr[] = "";
                                }
                            }
                        }
                        if(!empty($fieldsApplicationIdsArr)){
                            $fieldsApplicationIdsArr = array_filter($fieldsApplicationIdsArr);
                            $fieldsApplicationIds=implode(',',$fieldsApplicationIdsArr);
                            $bricksData[$fieldName]=$fieldsApplicationIds;
                        }
                    }
                    if($fieldMasterType=='FlowMedium'){
                        $fieldsValueArr=explode(',',$fieldValue);
                        $flowMediumIdsArr=[];
                        foreach($fieldsValueArr as $values){
                            $values=trim($values);
                            if(!empty($values)){
                                if(array_key_exists($values,$this->flowMedium)){
                                    $flowMediumIdsArr[]=$this->flowMedium[$values];
                                }else{
                                    $flowMediumIdsArr[] = ""; 
                                }
                            }
                        }
                        if(!empty($flowMediumIdsArr)){
                            $flowMediumIdsArr = array_filter($flowMediumIdsArr);
                            $flowMediumIds=implode(',',$flowMediumIdsArr);
                            $bricksData[$fieldName]=$flowMediumIds;
                        }
                    }
                    if($fieldMasterType=='Standards'){
                        $fieldsValueArr=explode(',',$fieldValue);
                        $standardsIdsArr=[];
                        foreach($fieldsValueArr as $values){
                            $values=trim($values);
                            $values = str_replace("/", "-", $values);
                            if(!empty($values)){
                                if(array_key_exists($values,$this->standards)){
                                    $standardsIdsArr[]=$this->standards[$values];
                                }else{
                                    $standardsIdsArr[] = "";
                                }
                            }
                        }
                        if(!empty($standardsIdsArr)){
                            $standardsIdsArr = array_filter($standardsIdsArr);
                            $standardsIds=implode(',',$standardsIdsArr);
                            $bricksData[$fieldName]=$standardsIds;
                        }
                    }
                }
            }
        }
        return $bricksData;
    }

    public function getCountryOriginCodeId($countryOriginName){

        if (!empty($countryOriginName)) {
            if (!empty($this->countryOrigin[$countryOriginName])) {
                return $this->countryOrigin[$countryOriginName];
            } 
        }
        return null;
    }
    public function getCategoryCodeId($categoryName){

        if (!empty($categoryName)) {
            if (!empty($this->BaseLevelCategory[$categoryName])) {
                return $this->BaseLevelCategory[$categoryName];
            } 
        }
        return null;
    }

    public function getproductBrandNameId($productBrandName){
        if (!empty($productBrandName)) {
            if (!empty($this->BrandName[$productBrandName])) {
                return $this->BrandName[$productBrandName];
            } 
        }
        return null;
    }

    public function getSubCategoryId($subCategory){
        if (!empty($subCategory)) {
            if (!empty($this->SubCategory[$subCategory])) {
                return $this->SubCategory[$subCategory];
            } 
        }
        return null;
    }

    public function saveProducts($updatedArticlesArray) {
        foreach ($updatedArticlesArray as $objectId) {
            if (!empty($objectId)) {
                $object = DataObject\IFSEUProduct::getById($objectId, true);
                if (!empty($object) && $object instanceof \Pimcore\Model\DataObject\IFSEUProduct) {
                    // $object->save();
                    $this->percentageCompletionService->completenessPercentage($object, 'import');
                }
            }
        }
    }
    private function getBooleanValue($data)
    {
        switch ($data) {
            case 'Y':
                return 1;
            case 'Yes':
                return 1;
            case 'N':
                return -1;
            case 'No':
                return -1;
            case 'FALSE':
                return -1;
            case 'TRUE':
                return 1;
            case '1':
                return 1;
            case '0':
                return -1;
            default:
                return;
        }
    } 

}
