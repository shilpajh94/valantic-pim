<?php
namespace IFSEU\ImportBundle\Services;

use Exception;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use AppBundle\Lib\UnitConversion;
use IFSEU\ImportBundle\Model\ProductModel;
use IFSEU\ProductBundle\Services\CompletenessPercentageService;


class EhoseProductLocalizationImportService
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
    private $Localizedlanguage;
    private $fertLevelSiopCode;
    
    const LOGGER_MODULE = 'SAP IMPORT SHEET';
    const GROSS_WEIGHT_UNITS = [
        "LB" => UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT,
        "KG" => UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_M,
        "G" => UnitConversion\WeightPerLengthConverter::UNIT_G_PER_FT
    ];
    
    public function __construct(
        CompletenessPercentageService $percentageCompletionService
    ) {
        $this->percentageCompletionService = $percentageCompletionService;        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->logFileName          = 'ifseu-products-log-' . date('Ymdhis');
        $this->common               = \Pimcore::getContainer()->get('ifs_eu_import.common_helper');
        $this->productModel         = new ProductModel;
        $this->configProviderService= \Pimcore::getContainer()->get('ifs_eu_import.config_provider_service');
        $this->productHelper        = \Pimcore::getContainer()->get('ifs_eu_import.product_helper');
        $this->materialConfigData   = $this->configProviderService->getProductImportConfig();
        $this->catConfigData        = $this->configProviderService->getCategoryConfig();
        $this->businessUnit         = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->brickMappingService  = \Pimcore::getContainer()->get('ifs_eu_import.category_brick_mapping_service');
        $this->columnName           = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'columnName');
        $this->weightConversionService = new UnitConversion\WeightPerLengthConverter();

        $this->baseSiopMismatchLog  = [];
        $this->unitConversionService= \Pimcore::getContainer()->get('ifs_eu_import.unit_conversion_import_service');
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

        $materialGrpList = $this->productModel->getMaterialGroupData();
        $countryOriginList = $this->productModel->getCountryOriginData();
        //$baseLevelCategoryList = $this->productModel->getCatagoryData();
        $baseLevelCategoryList= $this->productModel->getCatagoryLanguageData($this->localizedLanguage);
        $propertiesList = $this->productModel->getPropertiesLanguageData($this->localizedLanguage);
        $fieldsOfApplicationList = $this->productModel->getfieldsOfApplicationLanguageData($this->localizedLanguage);
        $flowMediumList = $this->productModel->getflowMediumLanguageData($this->localizedLanguage);
        $standardsList = $this->productModel->getstandardsLanguageData($this->localizedLanguage);
        $BrandNameList = $this->productModel->getBrandsData();
        $subCategoryList = $this->productModel->getSubCategoryData();

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
            $categoryName = $baseLevelCategoryData['CategoryName'];
            $this->BaseLevelCategory[$categoryName] = $baseLevelCategoryData['oo_id'];
            unset($categoryName);
        }
        foreach($propertiesList as $propertiesListData){
            $propertyType=$propertiesListData['TypeName'];
            $propertyValue=$propertiesListData['PropertyName'];
            $this->productProperties[$propertyType][$propertyValue]=$propertiesListData['oo_id'];
        }
        foreach($fieldsOfApplicationList as $fieldsOfApplicationData) {
            $applicationName = $fieldsOfApplicationData['ApplicationName'];
            $this->fieldsOfApplication[$applicationName] = $fieldsOfApplicationData['oo_id'];
            unset($applicationName);
        }
        foreach($flowMediumList as $flowMediumData) {
            $flowMediumName = $flowMediumData['FlowMedium'];
            $this->flowMedium[$flowMediumName] = $flowMediumData['oo_id'];
            unset($flowMediumName);
        }
        foreach($standardsList as $standardsData) {
            $standardsName = $standardsData['Norm'];
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
      
    public function import($filePath,$lang)
    {
        $this->filePath = $filePath;
        $this->localizedLanguage=$lang;
        if($this->filePath){
            $csvInfo = ImportService::getCSVData($this->filePath);
            
            $this->csvHeader = array_flip($csvInfo['header']);
            try {
                $this->initImportTable();
                $this->initiateProductsProcess($csvInfo['data']);
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
                $logFilePath = PIMCORE_TEMPORARY_DIRECTORY."/".$fileName;
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
                        $this->emailService = \Pimcore::getContainer()->get('email.email_notification_service');
                        $this->emailService->sendNotificationsEmail($emailParams);
                    }else {
                        throw new Exception("Base SIOP mismatch email template not found.");
                    }
                } else {
                    throw new Exception("Base SIOP mismatch email template not configured.");
                }
            }
        } catch (\Throwable $th) {
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($th);
//            Logger::error("sap_import_log", $th);
        }
    }    
    
    public function initiateProductsProcess($partialData) {
        $this->setVariablesToEmpty();
        $this->processProducts($partialData);
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
            $this->processSingleRecord($row);
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
            $this->productModel->deleteRelationTableRecords($this->relationTableDataDeleteArray);
            $this->productModel->insertIntoProductTable($this->relationTableDataArray, 'object_relations_IFSEUProduct');
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
    private function getRecordIndexByKey($key) {
        return $this->csvHeader[$this->columnName[$key]];
    }
    public function createIFSEUObject($record, $parentId, $parentPath, $levelInfo, $type) 
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
            $description = $this->fertLevelSiopCode['description'];
            if (!empty($description)) {
                $objectKey = $description;
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
            $bricksList = $this->brickMappingService->getMappedBrickKeys($groupNamesArray, $type);
            $this->setBricksData($objId, $bricksList, $type, $record);
            unset($groupNames, $groupNamesArray, $bricksList);
        }

        unset($objectIndex, $currentLevelCode, $fertLevelCode, $categoryPath, $type, $currentLevelArray, $objectKey, $objectArr, $parentPath);

        return [$objId, $currentLevelPath];
    }


    public function processSingleRecord($row) {
        $recData =  $row;
        $status = 'Failed';
        $errorFlag = false;
        $materialNumber = $recData[$this->getRecordIndexByKey('material')];
        $ObjectDetails=$this->productModel->checkIfArticleExists($materialNumber);
        if (!empty($ObjectDetails)) {
            $siopCode=$ObjectDetails[0]['siopFullCode'];
            $o_key=$ObjectDetails[0]['o_key'];
            
            if ($this->productHelper->isValidCategoryCode($siopCode)) {
                echo $recData['0'].PHP_EOL;
                $record = array(
                    'code'  =>  $siopCode,
                    'description'=>$o_key,
                    'material'  =>  $recData[$this->getRecordIndexByKey('material')]
                );
                $this->fertLevelSiopCode=$record;
                $result = $this->processLevelInfo($record, $recData, $errorFlag);
                $status = $result['status'];
                $msg    = $result['msg'];
                
            } else {
                $msg = 'Siop Category code and its length does not match.';
            }
        } else {
            $msg = 'Material Number not exists.';
        }
        
        $logRow = [
            'id' => $recData[$this->getRecordIndexByKey('material')],
            'record' => json_encode($row),
            'statusCode' => $status,
            'failedReason' => $msg
        ];
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
        foreach ($this->langArr as $lang) {
            $value = $ConditionsValue=$minimumOrder=$shippingConditions=$headlineWeb=$marking1=$marking2=$note2InformationBelowTable=$productBrandNamePerLanguage=$BrandShortText2=$commercialDescription=$technicalDescription=$sapDescription=$manufacturingLength=null;
            if ($lang == $this->localizedLanguage && strtolower($productType) == 'fert') {
                $ConditionsValue = $record[$this->getRecordIndexByKey('Conditions')];
                $minimumOrder = $record[$this->getRecordIndexByKey('minimumOrder')];
                $shippingConditions = $record[$this->getRecordIndexByKey('shippingConditions')];
            }

            if($lang == $this->localizedLanguage && strtolower($productType) == 'base') {
                $headlineWeb = $record[$this->getRecordIndexByKey('headlineWeb')];
                $marking1 = $record[$this->getRecordIndexByKey('Marking1')];
                $marking2 = $record[$this->getRecordIndexByKey('Marking2')];
                $note2InformationBelowTable = $record[$this->getRecordIndexByKey('Note2InformationBelowTable')];
            }

            if($lang == $this->localizedLanguage){
                $this->localisedDataTableDataArray[] = [
                    'ooo_id' => $objId,
                    'language' => $lang,
                    'Conditions'=>$ConditionsValue,
                    'minimumOrder'=>$minimumOrder,
                    'shippingConditions'=>$shippingConditions,
                    'headlineWeb'=>$headlineWeb,
                    'Marking2'=>$marking2,
                    'Marking1'=>$marking1,
                    'Note2InformationBelowTable'=>$note2InformationBelowTable
                ];
                $this->localisedQueryTableDataArray[$lang][] = [
                    'ooo_id' => $objId,
                    'language' => $lang,
                    'Conditions'=>$ConditionsValue,
                    'minimumOrder'=>$minimumOrder,
                    'shippingConditions'=>$shippingConditions,
                    'headlineWeb'=>$headlineWeb,
                    'Marking2'=>$marking2,
                    'Marking1'=>$marking1,
                    'Note2InformationBelowTable'=>$note2InformationBelowTable
                ];
            }
        }
    }

    public function getQueryTableData($objId, $record, $levelInfo, $level=5, $productType = 'fert', $businessUnit = 'IFSEU') {

        $queryTableData = [
            'oo_id' => $objId,
            'oo_classId' => 'IFSEUProduct',
            'oo_className' => 'IFSEUProduct',
            'ProductType' => strtolower($productType),
            'BusinessUnit' => strtoupper($businessUnit),
            'EANCode' => null,
            'weightg' => null,
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
            'WebsiteLink' => null,
            'additionalDiscount' => null
        ];
        
        if (strtolower($productType) == 'fert') {
            
            $queryTableData['productLength'] = trim($record[$this->getRecordIndexByKey('productLength')]);
            $queryTableData['productionLength'] = trim($record[$this->getRecordIndexByKey('productionLength')]);
            $queryTableData['additionalDiscount'] = trim($record[$this->getRecordIndexByKey('additionalDiscount')]);
            $queryTableData['EhoseID'] = trim($record[$this->getRecordIndexByKey('EhoseID')]);
            $queryTableData['ProductLengthUnit'] = trim($record[$this->getRecordIndexByKey('ProductLengthUnit')]);
            $queryTableData['MinimumQuantityMeasurementUnit'] = trim($record[$this->getRecordIndexByKey('MinimumQuantityMeasurementUnit')]);
            $queryTableData['priceDate'] = trim($record[$this->getRecordIndexByKey('priceDate')]);
            $queryTableData['minimumQuantityUnit'] = trim($record[$this->getRecordIndexByKey('minimumQuantityUnit')]);
            $queryTableData['Spezi'] = trim($record[$this->getRecordIndexByKey('Spezi')]);
            $queryTableData['GrossPrice'] = trim($record[$this->getRecordIndexByKey('GrossPrice')]);
            $queryTableData['Discount'] = trim($record[$this->getRecordIndexByKey('Discount')]);
            $queryTableData['WebsiteLink'] = trim($record[$this->getRecordIndexByKey('WebsiteLink')]);
            if(!empty(trim($record[$this->getRecordIndexByKey('OnStock')]))){
                $OnStockValue =  trim($record[$this->getRecordIndexByKey('OnStock')]);
                $queryTableData['OnStock'] = $this->getBooleanValue($OnStockValue);
            }
            $queryTableData['CustomsTariffNumber'] = trim($record[$this->getRecordIndexByKey('CustomsTariffNumber')]);
            $queryTableData['Note'] = trim($record[$this->getRecordIndexByKey('Note')]);
            $queryTableData['Department'] = trim($record[$this->getRecordIndexByKey('Department')]);
            $queryTableData['ConnectionType'] = trim($record[$this->getRecordIndexByKey('ConnectionType')]);
            $queryTableData['weightg'] = trim($record[$this->getRecordIndexByKey('weightg')]);

            if (!empty(trim($record[$this->getRecordIndexByKey('EANCode')]))) {
                $queryTableData['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            } else {
                $queryTableData['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            }
            
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

            $queryTableData['temporaryUntilC'] = trim($record[$this->getRecordIndexByKey('temporaryUntilC')]);
            $queryTableData['temporaryUntilT'] = trim($record[$this->getRecordIndexByKey('temporaryUntilT')]);
            $queryTableData['DampableUntil1C'] = trim($record[$this->getRecordIndexByKey('DampableUntil1C')]);
            $queryTableData['DampableUntil1T'] = trim($record[$this->getRecordIndexByKey('DampableUntil1T')]);
            $queryTableData['DampableUntil2C'] = trim($record[$this->getRecordIndexByKey('DampableUntil2C')]);
            $queryTableData['DampableUntil2T'] = trim($record[$this->getRecordIndexByKey('DampableUntil2T')]);

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
            $minimumTemperatureC = trim($record[$this->getRecordIndexByKey('minimumTemperatureC')]);
            $maximumTemperatureC = trim($record[$this->getRecordIndexByKey('maximumTemperatureC')]);

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
        
        $this->queryTableDataArray[] = array_merge($queryTableData);
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
            'EANCode' => null,
            'weightg' => null,
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
            'WebsiteLink' => null,
            'additionalDiscount' => null
        ];
        if (strtolower($productType) == 'fert') {
    
            $storeTableDataArray['productLength'] = trim($record[$this->getRecordIndexByKey('productLength')]);
            $storeTableDataArray['productionLength'] = trim($record[$this->getRecordIndexByKey('productionLength')]);
            $storeTableDataArray['additionalDiscount'] = trim($record[$this->getRecordIndexByKey('additionalDiscount')]);
            $storeTableDataArray['EhoseID'] = trim($record[$this->getRecordIndexByKey('EhoseID')]);
            $storeTableDataArray['ProductLengthUnit'] = trim($record[$this->getRecordIndexByKey('ProductLengthUnit')]);
            $storeTableDataArray['MinimumQuantityMeasurementUnit'] = trim($record[$this->getRecordIndexByKey('MinimumQuantityMeasurementUnit')]);
            $storeTableDataArray['priceDate'] = trim($record[$this->getRecordIndexByKey('priceDate')]);
            $storeTableDataArray['minimumQuantityUnit'] = trim($record[$this->getRecordIndexByKey('minimumQuantityUnit')]);
            $storeTableDataArray['Spezi'] = trim($record[$this->getRecordIndexByKey('Spezi')]);
            $storeTableDataArray['GrossPrice'] = trim($record[$this->getRecordIndexByKey('GrossPrice')]);
            $storeTableDataArray['Discount'] = trim($record[$this->getRecordIndexByKey('Discount')]);
            $storeTableDataArray['WebsiteLink'] = trim($record[$this->getRecordIndexByKey('WebsiteLink')]);
            $storeTableDataArray['CustomsTariffNumber'] = trim($record[$this->getRecordIndexByKey('CustomsTariffNumber')]);
            $storeTableDataArray['Note'] = trim($record[$this->getRecordIndexByKey('Note')]);
            $storeTableDataArray['Department'] = trim($record[$this->getRecordIndexByKey('Department')]);
            $storeTableDataArray['ConnectionType'] = trim($record[$this->getRecordIndexByKey('ConnectionType')]);
            $storeTableDataArray['weightg'] = trim($record[$this->getRecordIndexByKey('weightg')]);

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

            $minimumTemperatureC = trim($record[$this->getRecordIndexByKey('minimumTemperatureC')]);
            $maximumTemperatureC = trim($record[$this->getRecordIndexByKey('maximumTemperatureC')]);
            $storeTableDataArray['temporaryUntilC'] = trim($record[$this->getRecordIndexByKey('temporaryUntilC')]);
            $storeTableDataArray['temporaryUntilT'] = trim($record[$this->getRecordIndexByKey('temporaryUntilT')]);
            $storeTableDataArray['DampableUntil1C'] = trim($record[$this->getRecordIndexByKey('DampableUntil1C')]);
            $storeTableDataArray['DampableUntil1T'] = trim($record[$this->getRecordIndexByKey('DampableUntil1T')]);
            $storeTableDataArray['DampableUntil2C'] = trim($record[$this->getRecordIndexByKey('DampableUntil2C')]);
            $storeTableDataArray['DampableUntil2T'] = trim($record[$this->getRecordIndexByKey('DampableUntil2T')]);

            if(trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]) == '1' || trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]) == '0'){
                $onlyOpenSystem =  trim($record[$this->getRecordIndexByKey('onlyOpenSystem')]);
                $storeTableDataArray['onlyOpenSystem'] = $this->getBooleanValue($onlyOpenSystem);
            }

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
        $this->storeTableDataArray[] = $storeTableDataArray;
    }

    public function getRelationTableData($objId, $record, $levelInfo, $level=5, $productType = 'fert') {
        
        if (strtolower($productType) == 'fert') {
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
        
        if (strtolower($productType) == 'fert') {

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
                            $bricksData=$this->hoseBaseBricksAttribute($bricksData,$brick);
                        }
                        $tableData  = array_merge(['o_id' => $objId, 'fieldname' => ucfirst($type)], $bricksData);
                        $this->bricksDataArray[$tblName][] = $tableData;
                    }
                }
            }
        }catch(\Throwable $th){
            print_r($th);
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
                                    }
                                }
                            }
                            if(!empty($propertyIdsArr)){
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
                                }
                            }
                        }
                        if(!empty($fieldsApplicationIdsArr)){
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
                                }
                            }
                        }
                        if(!empty($flowMediumIdsArr)){
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
                                }
                            }
                        }
                        if(!empty($standardsIdsArr)){
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
