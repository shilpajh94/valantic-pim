<?php

namespace B2BSalesforcePTGEMEABundle\PimDataExport\B2B\PTGEMEA;


use Pimcore\Db;
use B2BSalesforcePTGEMEABundle\Tool\Utils;
use B2BSalesforcePTGEMEABundle\Logger\LogLevel;
use B2BSalesforcePTGEMEABundle\PimDataExport\IDataExport;
use B2BSalesforcePTGEMEABundle\PimDataExport\PimDataExportHelper;
class ProductDataExport implements IDataExport
{
    private $db;
    private $bu;
    private $common;
    private $helper;
    private $productAttributeConfig;
    private $productAttributeConfig1;
    private $headerMapping;
    private $bUProductClassTableID = [
        'IFS_PTG_US' => array('productClassId' => '1', 'salesMaterialMasterClassId' => '10'),
        'CS_US' => 'CSProducts',
        'PTG_EU' => array('productClassId' => '38', 'salesMaterialMasterClassId' => '41'),
        'IFS_EU' => 'IFSEUProduct',
    ];

    public function __construct($bu)
    {
        $this->bu = $bu;
        $this->db = Db::get();
        $this->helper = new PimDataExportHelper;
        $this->common = \Pimcore::getContainer()->get('b2bsalesforceptgemea.common_helper');
    }

    public function exportData()
    {

        $this->helper->logMessage("{$this->bu}: Script Execution Started", LogLevel::DEBUG());
        try {

            $this->productAttributeConfig = $this->helper->getLocalizedAttribute($this->bu, 'Product');
            $this->productAttributeConfig1 = $this->helper->getLocalizedAttribute1($this->bu, 'Product');
            if (isset($this->productAttributeConfig)) {
                $headerMapping = $this->productAttributeConfig;
                $this->productAttributeConfig = $this->helper->getLocalizedAttribute($this->bu, 'Product');
                $this->productAttributeConfig1 = $this->helper->getLocalizedAttribute1($this->bu, 'Product');
                if ($this->productAttributeConfig) {

                    if (isset($this->productAttributeConfig)) {
                        $headerMapping = $this->productAttributeConfig;

                        if ($headerMapping) {
                            $this->headerMapping = $headerMapping;

                            # Fetch all products satisfying condition productType = fert AND product.published = 1"
                            $b2bProducts = $this->helper->getAllB2BProduct($this->bu);
                            if ($b2bProducts) {
                                # Product's non localized field
                                $productNonLocalisedSelectFilteredAttribute =
                                 $this->getFilteredAttribute('class', 'PTGEUProduct', false);

                                # Product's localized field
                                $productFilteredAttribute = $this->getFilteredAttribute('class', 'PTGEUProduct');

                                # Products attached objectbrick's non localized field
                                $productNonLocalizedFilteredOjbectbrickAttribute =
                                 $this->getFilteredAttribute('objectbrick', '', false);

                                $areHeadersAlreadyAdded = false;
                                $b2bProductsChucks = array_chunk($b2bProducts, 1000);

                                $filePath1 =
                                 PTGEU_B2B_SFTP_DOWNLOAD_TEMP_DIR . "PIM_Salesforce_B2B_Product2_P61_V2.csv";
                                $file1 = fopen($filePath1, "w+");
                                foreach ($b2bProductsChucks as $batchNum => $productIds) {
                                    # Product's non-localized field data
                                    $productNonLocalizedAttributesDataArray = [];
                                    $productLocalizedAndNonLocalizedAttributesDataArray = [];
                                    $allProductDataArray = [];

                                    foreach ($productIds as $eachProductId) {
                                        foreach ($productNonLocalisedSelectFilteredAttribute as $eachAttributes) {
                                            $productId['oo_id'] = $eachProductId;
                                            if ($eachAttributes['level'] == 'base') {
                                                $baseData[$eachAttributes['fieldName']] =
                                                 $this->getBaseData($eachAttributes['fieldName'], $eachProductId);
                                            } elseif ($eachAttributes['level'] == 'skeleton') {
                                                $skeletonData[$eachAttributes['fieldName']] =
                                                 $this->getSkeletonData($eachAttributes['fieldName'], $eachProductId);
                                            } else {
                                                $fertData[$eachAttributes['fieldName']] =
                                                 $this->getFertData($eachAttributes['fieldName'], $eachProductId);
                                            }
                                        }
                                        $productNonLocalizedAttributesDataArray[] =
                                         array_merge($productId, $baseData, $skeletonData, $fertData);
                                    }
                                    echo "Processing Batch - " . ($batchNum + 1) .
                                     ", It holds " . count($productIds) . " products " . PHP_EOL;

                                    # Product's localized field data
                                    $localizeData = [];
                                    $productFilteredAttributeField = array_keys($productFilteredAttribute);

                                    $productLocalizedAttributesData =
                                     $this->getRecordsWithFilteredFields($productFilteredAttributeField, $productIds);
                                    if ($productLocalizedAttributesData) {
                                        foreach ($productNonLocalizedAttributesDataArray as $key1 => $value1) {
                                            $dataFound = [];
                                            foreach ($productLocalizedAttributesData as $key2 => $value2) {
                                                if ($value1['oo_id'] == $value2['oo_id']) {
                                                    $dataFound = array_merge($dataFound, $value2);
                                                }
                                            }
                                            if ($dataFound) {
                                                unset($dataFound['id']);
                                                $productLocalizedAndNonLocalizedAttributesDataArray[$key1] =
                                                 array_merge($value1, $dataFound);
                                            } else {
                                                $productLocalizedAndNonLocalizedAttributesDataArray[$key1] =
                                                 array_merge($value1, $localizeData);
                                            }
                                        }
                                    }
                                    $localizeDataNonLocalized = [];
                                    $objectBricksNonLocalisedFields = [];
                                    foreach ($productNonLocalizedFilteredOjbectbrickAttribute as $key => $columm) {
                                        $fkey = $columm['fieldName'];
                                        $localizeDataNonLocalized[$key] = '';

                                        $objectBricksNonLocalisedFields[$columm['objectBrickClassName']][] =
                                         "TRIM(BOTH ',' FROM $fkey) AS $key";
                                    }
                                    if ($objectBricksNonLocalisedFields) {
                                        $productObjectBrickDataArray =
                                         $this->getRecordsWithFilteredObjectbrickMasterFields(
                                            $objectBricksNonLocalisedFields, $productIds);
                                        if ($productObjectBrickDataArray) {
                                            foreach ($productLocalizedAndNonLocalizedAttributesDataArray as
                                             $key1 => $value1) {
                                                $dataFound = [];
                                                foreach ($productObjectBrickDataArray as $key2 => $value2) {
                                                    if ($value1['oo_id'] == $value2['id']) {
                                                        $dataFound = array_merge($dataFound, $value2);
                                                    }
                                                }

                                                if ($dataFound) {
                                                    unset($dataFound['id']);
                                                    $allProductDataArray[$key1] = array_merge($value1, $dataFound);
                                                } else {
                                                    $allProductDataArray[$key1] =
                                                     array_merge($value1, $localizeDataNonLocalized);
                                                }
                                            }
                                        }
                                        // else
                                        // {
                                        //     foreach ($productNonLocalizedAttributesData as $key => $value) {
                                        //         $productNonLocalizedAttributesData[$key] =
                                        //  array_merge($value,$localizeDataNonLocalized);
                                        //     }
                                        // }
                                    }
                                    $finalPritingList = [];
                                    $finalPritingList = $allProductDataArray;
                                    if ($finalPritingList) {
                                        if (!$areHeadersAlreadyAdded) {
                                            $displayKeys = [];
                                            $booleanFields = $this->getBooleanAttribute();
                                            foreach ($headerMapping as $headerIndex => $headerName) {
                                                $displayKeys[$headerIndex] = $headerName;
                                            }
                                            fputcsv($file1, $displayKeys);
                                            $areHeadersAlreadyAdded = true;
                                        }
                                        $colorMastersList = $this->getColorMasterList();
                                        $staticConductiveMastersList = $this->getStaticConductiveMasterList();
                                        $performanceMastersList = $this->getPerformanceMasterList();
                                        foreach ($finalPritingList as $key => $record) {
                                            $record = array_map(function ($value) {
                                                return trim($value, ',');
                                            }, $record);
                                            foreach($record as $key => $val) {
                                                if ($val == "0" || $val == "0.0" || $val == "0.00" ||
                                                 $val == "0.000" || $val == "0.0000") {
                                                    $record[$key] = '';
                                                }
                                            }
                                            $articleNumber = $record['articleNumber'];
                                            foreach ($displayKeys as $keyHeader => $keyHeaderValue) {
                                                if (array_key_exists($keyHeader, $record)) {
                                                    $mapping_record[$keyHeaderValue] = strip_tags($record[$keyHeader]);
                                                    if (array_key_exists($keyHeader, $booleanFields)) {
                                                        $booleanValue = $record[$keyHeader];
                                                        $fieldBooleanValue = $this->getBooleanValue($booleanValue);
                                                        $mapping_record[$keyHeaderValue] = $fieldBooleanValue;
                                                    }
                                                    if ($keyHeader == 'color' && $record[$keyHeader] != null &&
                                                     is_numeric($record[$keyHeader])) {
                                                        $colorId = $record[$keyHeader];
                                                        if ($colorId != 1 && !empty($colorMastersList) &&
                                                         array_key_exists($colorId, $colorMastersList)) {
                                                            $mapping_record[$keyHeaderValue] =
                                                             $colorMastersList[$colorId];
                                                        } else {
                                                            $mapping_record[$keyHeaderValue] = null;
                                                        }
                                                    }
                                                    if ($keyHeader == 'staticConductive' && $record[$keyHeader] != null
                                                     && is_numeric($record[$keyHeader])) {
                                                        $staticConductiveId = $record[$keyHeader];
                                                        if ($staticConductiveId != 1 &&
                                                         !empty($staticConductiveMastersList) &&
                                                          array_key_exists($staticConductiveId,
                                                           $staticConductiveMastersList)) {
                                                            $mapping_record[$keyHeaderValue] =
                                                             $staticConductiveMastersList[$staticConductiveId];
                                                        } else {
                                                            $mapping_record[$keyHeaderValue] = null;
                                                        }
                                                    }
                                                    if ($keyHeader == 'performance' && $record[$keyHeader] != null  && is_numeric($record[$keyHeader])) {
                                                        $performanceId = $record[$keyHeader];
                                                        if ($performanceId != 1 && !empty($performanceMastersList) && array_key_exists($performanceId, $performanceMastersList)) {
                                                            $mapping_record[$keyHeaderValue] = $performanceMastersList[$performanceId];
                                                        } else {
                                                            $mapping_record[$keyHeaderValue] = null;
                                                        }
                                                    }
                                                }elseif($keyHeaderValue == 'B2B_External_Id__c'){
                                                    $mapping_record[$keyHeaderValue] = '06-'.$articleNumber;
                                                }elseif($keyHeaderValue == 'B2B_Part_Number__c'){
                                                    $mapping_record[$keyHeaderValue] = $articleNumber;
                                                } elseif ($keyHeaderValue == 'IsActive') {
                                                    $mapping_record[$keyHeaderValue] = 'true';
                                                } elseif ($keyHeaderValue == 'RecordTypeId') {
                                                    $mapping_record[$keyHeaderValue] = 'B2B Product';
                                                } else {
                                                    $mapping_record[$keyHeaderValue] = '';
                                                }
                                                if ($keyHeader != 'SalesForce_ID') {
                                                    unset($record[$keyHeader]);
                                                }
                                            }
                                            $record = $mapping_record;
                                            fputcsv($file1, $record);
                                        }
                                    }

                                }
                                fclose($file1);
                                echo $message = "{$this->bu}: B2B Product data csv file created";
                                echo PHP_EOL;
                                $this->helper->logMessage($message, LogLevel::INFO());

                            } else {
                                echo $message = "{$this->bu}: B2B Product data not found to export";
                                echo PHP_EOL;
                                $this->helper->logMessage($message, LogLevel::ERROR());
                            }
                        } else {
                            echo $message =
                            "{$this->bu}: B2B salesforce attribute not mapped to any of the PIM Product attribute";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::ERROR());
                        }
                    }
                }
            } else {
                echo $message = "{$this->bu}: B2B Product config not found";
                echo PHP_EOL;
                $this->helper->logMessage($message, LogLevel::ERROR());
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            echo $message = "{$this->bu}: Exception while trying to export the data" . " " . $message;
            echo PHP_EOL;
            $this->helper->logMessage($message, LogLevel::CRITICAL());
            return;
        }
    }

    public function getColorMasterList()
    {
        $stmt = "SELECT ooo_id, color FROM object_localized_data_PTGEUColor WHERE language = 'en';";
        $results = $this->db->fetchAllAssociative($stmt);

        $nameIdInKeyValuePairArray = [];
        if (isset($results)) {
            foreach ($results as $eachResult) {
                $nameIdInKeyValuePairArray[$eachResult['ooo_id']] = $eachResult['color'];
            }
        }

        return $nameIdInKeyValuePairArray;
    }

    public function getStaticConductiveMasterList()
    {
        $stmt =
        "SELECT ooo_id, staticConductive FROM object_localized_data_PTGEUStaticConductive WHERE language = 'en';";
        $results = $this->db->fetchAllAssociative($stmt);

        $nameIdInKeyValuePairArray = [];
        if (isset($results)) {
            foreach ($results as $eachResult) {
                $nameIdInKeyValuePairArray[$eachResult['ooo_id']] = $eachResult['staticConductive'];
            }
        }

        return $nameIdInKeyValuePairArray;
    }

    public function getPerformanceMasterList(){
        $stmt = "SELECT ooo_id, performance FROM object_localized_data_PTGEUPerformance WHERE language = 'en';";
        $results = $this->db->fetchAllAssociative($stmt);

        $nameIdInKeyValuePairArray = [];
        if (isset($results)) {
            foreach ($results as $eachResult) {
                $nameIdInKeyValuePairArray[$eachResult['ooo_id']] = $eachResult['performance'];
            }
        }

        return $nameIdInKeyValuePairArray;

    }

    public function getFilteredAttribute($fieldLocation, $className, $isLocalized=true)
    {
        $filteredAttribute = [];
        if ($this->productAttributeConfig1) {
            foreach ($this->productAttributeConfig1 as $key => $attributeConfig) {
                $attributeConfig_className =
                 isset($attributeConfig['className']) ? $attributeConfig['className'] : null;
                if ($attributeConfig['fieldLocation'] == $fieldLocation &&
                 $attributeConfig_className == $className && $attributeConfig['isLocalized'] == $isLocalized) {
                    if (isset($this->headerMapping[$key])) {
                        $filteredAttribute[$key] = $attributeConfig;
                    }
                }
            }
        }
        return $filteredAttribute;
    }

    public function getBaseData($attributeName, $fertProductId)
    {

        $getSkeletonId = "Select parentId from object_38 where oo_id = $fertProductId";
        $skeletonId = $this->db->fetchOne($getSkeletonId);

        $getBaseId = "Select parentId from object_38 where oo_id = $skeletonId";
        $baseId = $this->db->fetchOne($getBaseId);

        $sql = "Select $attributeName from object_38 where oo_id = $baseId";
        return $this->db->fetchOne($sql);

    }

    public function getSkeletonData($attributeName, $fertProductId)
    {
        $getSkeletonId = "Select parentId from object_38 where oo_id = $fertProductId";
        $skeletonId = $this->db->fetchOne($getSkeletonId);

        $sql = "Select $attributeName from object_38 where oo_id = $skeletonId";
        return $this->db->fetchOne($sql);

    }

    public function getFertData($attributeName, $fertProductId)
    {

        $sql = "Select $attributeName from object_38 where oo_id = $fertProductId";
        return $this->db->fetchOne($sql);

    }

    public function getRecordsWithFilteredFields($columnsList, $b2bProducts)
    {
        $selectedFields = [];
        $selectedFields[] = 'oo_id';
        foreach ($columnsList as $key => $columm) {
            $selectedFields[] = "$columm";
        }

        $columnsString = implode(',', $selectedFields);
        $ids = implode(',', $b2bProducts);
        $tableName = 'object_localized_38_en';
        $sql = "select {$columnsString} from $tableName where oo_id IN ($ids)";
        return $this->db->fetchAllAssociative($sql);

    }

    public function getRecordsWithFilteredObjectbrickMasterFields($multiObjectbrickColumnsList, $b2bProducts)
    {
        $allObjectBrickData = [];
        $config = $this->bUProductClassTableID[$this->bu];
        $productClassId = $config['productClassId'];

        foreach ($multiObjectbrickColumnsList as $brickName => $fields) {
            $columnsString = implode(',', $fields);
            $ids = implode(',', $b2bProducts);
            $sql =
            "select `id`, {$columnsString} from object_brick_query_{$brickName}_{$productClassId} where `id` IN ($ids)";

            $resultSet = $this->db->fetchAllAssociative($sql);

            $allObjectBrickData = array_merge($allObjectBrickData, $resultSet);
        }

        return $allObjectBrickData;
    }

    public function getBooleanAttribute()
    {
        $b2bAttributeBooleanList = [];
        $b2bAttributeBooleanConfig = \Pimcore::getContainer()->get(
            'b2bsalesforceptgemea.config_provider_service')->getBooleanConfigFile();
        $b2bAttributeBooleanList = $this->common->getBooleanParameter($b2bAttributeBooleanConfig);

        return $b2bAttributeBooleanList;
    }

    public function getBooleanValue($data)
    {
        $value = '';
        if ($value != '') {
            dd($data);
        }
        switch ($data) {
            case 'Y':
                $value = 'Yes';
                return $value;
            case 'N':
                $value = 'No';
                return $value;
            case 1:
                $value = 'Yes';
                return $value;
            case -1:
                $value = 'No';
                return $value;
            default:
                $value = '';
                return $value;
        }
        return $value;
    }

    public function uploadFile()
    {
        $customFileName2 = "PIM_Salesforce_B2B_Product2_P61_V2.csv";
        $this->helper->uploadFile($customFileName2);
    }

    public function logMessage(string $msg, LogLevel $logLevel)
    {
        Utils::log(PTGEMEA_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}
