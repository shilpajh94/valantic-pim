<?php
namespace IFSEU\ImportBundle\Services;

use Exception;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use AppBundle\Lib\UnitConversion;
use IFSEU\ImportBundle\Model\ProductModel;
use IFSEU\ProductBundle\Services\CompletenessPercentageService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Services\ImportProcessEmailNotificationService;

class ProductService
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
    private $container;
    private $importProcessEmailNotificationObj;

    const LOGGER_MODULE = 'SAP IMPORT SHEET';
    const GROSS_WEIGHT_UNITS = [
        "LB" => UnitConversion\WeightPerLengthConverter::UNIT_LBS_PER_FT,
        "KG" => UnitConversion\WeightPerLengthConverter::UNIT_KG_PER_M,
        "G" => UnitConversion\WeightPerLengthConverter::UNIT_G_PER_FT
    ];

    public function __construct(CompletenessPercentageService $percentageCompletionService, ContainerInterface $container)
    {
        $this->container = $container;
        $this->percentageCompletionService = $percentageCompletionService;

        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->logFileName          = 'ifseu-products-log-' . date('Ymdhis');
        $this->common               = $this->container->get('ifs_eu_import.common_helper');
        $this->productModel         = $this->container->get('ifs_eu_import.product_model');
        $this->configProviderService= $this->container->get('ifs_eu_import.config_provider_service');
        $this->productHelper        = $this->container->get('ifs_eu_import.product_helper');
        $this->materialConfigData   = $this->configProviderService->getProductConfig();
        $this->catConfigData        = $this->configProviderService->getCategoryConfig();
        $this->businessUnit         = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->brickMappingService  = $this->container->get('ifs_eu_import.category_brick_mapping_service');
        $this->columnName           = $this->common->getParameterItem($this->materialConfigData, 'sheet', 'columnName');
        $this->weightConversionService = new UnitConversion\WeightPerLengthConverter();
        $this->importProcessEmailNotificationObj = new ImportProcessEmailNotificationService;
        $this->baseSiopMismatchLog  = [];
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
        \AppBundle\Helper\Common::clearAndDisablePimCache();
        $sapFileFeeder  = $this->container->get('ifs_eu_import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('product');
        if($this->filePath){
            try{
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
                    // $this->sendSkippedArticlesEmailNotification($this->baseSiopMismatchLog, $this->baseSiopMismatchEmailTemplate);
                }
            } catch (\Throwable $th) {
                p_r($th);
                Logger::error($this->logFileName, $th);
                die;
            }
        } catch(\Throwable $th) {
            Logger::log(self::LOGGER_MODULE)->error($th);
            Logger::error($this->logFileName, $th);
            $this->importProcessEmailNotificationObj->sendMailNotification(
                "IFSEU Product Import not performed - Error occured while reading CSV \n".$th->getMessage()
            );
            die;
        }

        }else{
            die;
        }
        \AppBundle\Helper\Common::endablePimCache();
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
            'key' => $objectKey,
            'path' => $parentPath.'/',
            'className' => 'IFSEUProduct'
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
                    $objectArr['id'] = $objId;
                    $objectArr['parentId'] = $currentPathId;
                }
            }
            $objId = $this->productModel->insertInObjects($objectArr);

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
        $prodHier6 = substr($recData[$this->getRecordIndexByKey('prodHier7')],0,13);
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

        foreach ($this->langArr as $lang) {
            $value = null;
            if ($lang == 'en' && strtolower($productType) == 'fert') {
                $value = $record[$this->getRecordIndexByKey('description')];
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
        $siopFullCode = trim($record[$this->getRecordIndexByKey('prodHier7')]);
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
            'baseUOM' => null,
            'oldMaterialCode' => null,
            'industryStandard' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'EANCode' => null,
            'stccCode' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null,
            'weightKg' => null,
            'weightg' => null,
            'b2BexternalID' => null,
            'WeightLbsPerFTUOM' => null
        ];
        if (strtolower($productType) == 'fert') {
            $queryTableData['materialNumber'] = trim($record[$this->getRecordIndexByKey('material')]);
            $queryTableData['baseUOM'] = trim($record[$this->getRecordIndexByKey('baseUOM')]);
            $queryTableData['oldMaterialCode'] = trim($record[$this->getRecordIndexByKey('oldMaterial')]);
            $queryTableData['industryStandard'] = trim($record[$this->getRecordIndexByKey('industryStandard')]);
            $queryTableData['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            $queryTableData['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey('manufacturePartNumber')]);

            if (!empty(trim($record[$this->getRecordIndexByKey('EANCode')]))) {
                $queryTableData['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            } else {
                $queryTableData['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            }
            $queryTableData['stccCode'] = trim($record[$this->getRecordIndexByKey('stccCode')]);
            $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            $queryTableData['grossWeight'] = $grossWeight;
            $queryTableData['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            $queryTableData['weightUnit'] = $weightUnit;
            $queryTableData['b2BexternalID'] = trim($record[$this->getRecordIndexByKey('b2BexternalID')]);

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


            $materialGrpId = $this->getOrCreateMaterialGroupCodeId(trim($record[$this->getRecordIndexByKey('group')]));
            if(!empty($materialGrpId)) {
                $queryTableData['materialGroup__id'] = $materialGrpId;
                $queryTableData['materialGroup__type'] = 'object';
            }

        }
        $this->queryTableDataArray[] = array_merge($queryTableData, $siopData);
    }

    public function getStoreTableData($objId, $record, $levelInfo, $level=5, $productType = 'fert', $businessUnit = 'IFSEU') {
        $siopFullCode = trim($record[$this->getRecordIndexByKey('prodHier7')]);
        if ($productType == 'base') {
            $siopFullCode = $levelInfo[$level]['levelFullCode'];
        }
        $storeTableDataArray = [
            'oo_id' => $objId,
            'ProductType' => strtolower($productType),
            'BusinessUnit' => strtoupper($businessUnit),
            'siopFullCode' => $siopFullCode,
            'materialNumber' => null,
            'baseUOM' => null,
            'oldMaterialCode' => null,
            'industryStandard' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'EANCode' => null,
            'stccCode' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null,
            'weightKg' => null,
            'weightg' => null,
            'b2BexternalID' => null,
            'WeightLbsPerFTUOM' => null
        ];
        if (strtolower($productType) == 'fert') {
            $storeTableDataArray['materialNumber'] = trim($record[$this->getRecordIndexByKey('material')]);
            $storeTableDataArray['baseUOM'] = trim($record[$this->getRecordIndexByKey('baseUOM')]);
            $storeTableDataArray['oldMaterialCode'] = trim($record[$this->getRecordIndexByKey('oldMaterial')]);
            $storeTableDataArray['industryStandard'] = trim($record[$this->getRecordIndexByKey('industryStandard')]);
            $storeTableDataArray['manufacturer'] = trim($record[$this->getRecordIndexByKey('manufacture')]);
            $storeTableDataArray['manufacturerPartNumber'] = trim($record[$this->getRecordIndexByKey('manufacturePartNumber')]);
            if (!empty(trim($record[$this->getRecordIndexByKey('EANCode')]))) {
                $storeTableDataArray['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            } else {
                $storeTableDataArray['EANCode'] = trim($record[$this->getRecordIndexByKey('EANCode')]);
            }
            $storeTableDataArray['stccCode'] = trim($record[$this->getRecordIndexByKey('stccCode')]);
            $grossWeight = trim($record[$this->getRecordIndexByKey('grossWeight')]);
            $weightUnit = trim($record[$this->getRecordIndexByKey('weightUnit')]);
            $storeTableDataArray['grossWeight'] = $grossWeight;
            $storeTableDataArray['netWeight'] = trim($record[$this->getRecordIndexByKey('netWeight')]);
            $storeTableDataArray['weightUnit'] = $weightUnit;
            $storeTableDataArray['b2BexternalID'] = trim($record[$this->getRecordIndexByKey('b2BexternalID')]);
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
    public function getBricksDataForMapping($objId){
        $this->mapBricksArray['object_brick_query_IFSEUHoseBase_IFSEUProduct'] = array(array('id'=>$objId,'fieldname'=>'Base','BaseBrickMapping'=>'test'));
        $this->mapBricksArray['object_brick_store_IFSEUHoseBase_IFSEUProduct'] = array(array('id'=>$objId,'fieldname'=>'Base','BaseBrickMapping'=>'test'));

        $this->mapBricksArray['object_brick_query_IFSEUHoseSkeleton_IFSEUProduct'][] = array('id'=>$objId,'fieldname'=>'Skeleton','SkeletonBrickMapping'=>'test');
        $this->mapBricksArray['object_brick_store_IFSEUHoseSkeleton_IFSEUProduct'][] = array('id'=>$objId,'fieldname'=>'Skeleton','SkeletonBrickMapping'=>'test');
    }
    public function setBricksData($objId, $bricks, $type) {
        if($bricks){
            foreach ($bricks as $brick) {
                if (in_array($brick, $this->allBricksList)) {
                    foreach ($this->brickTablePrefixArray  as $brickPrefix) {
                        $tblName = $brickPrefix.ucfirst($brick)."_IFSEUProduct";
                        $this->bricksDataArray[$tblName][] = [
                            'id' => $objId,
                            'fieldname' => ucfirst($type)
                        ];
                    }
                }
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

    public function saveProducts($updatedArticlesArray) {
        foreach ($updatedArticlesArray as $objectId) {
            if (!empty($objectId)) {
                $object = DataObject\IFSEUProduct::getById($objectId);
                if (!empty($object) && $object instanceof \Pimcore\Model\DataObject\IFSEUProduct) {
                    $object->save();
                    // $this->percentageCompletionService->completenessPercentage($object, 'import');
                }
            }
        }
    }

}
