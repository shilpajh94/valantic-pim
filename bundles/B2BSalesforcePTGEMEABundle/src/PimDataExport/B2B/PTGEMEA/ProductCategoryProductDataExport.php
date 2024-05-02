<?php

namespace B2BSalesforcePTGEMEABundle\PimDataExport\B2B\PTGEMEA;


use Pimcore\Db;
use B2BSalesforcePTGEMEABundle\Tool\Utils;
use B2BSalesforcePTGEMEABundle\Logger\LogLevel;
use B2BSalesforcePTGEMEABundle\PTGEUB2BConstants;
use B2BSalesforcePTGEMEABundle\PimDataExport\IDataExport;
use B2BSalesforcePTGEMEABundle\PimDataExport\PimDataExportHelper;
use Pimcore\Model\DataObject;

class ProductCategoryProductDataExport implements IDataExport
{
    private $db;
    private $bu;
    private $common;
    private $helper;
    private $languages;
    private $productAttributeConfig;
    private $productAttributeConfig1;
    private $productSapCode;
    private $siopFullCodeLevel5;
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
            # Get valid languages
            $this->languages = \Pimcore\Tool::getValidLanguages();

            $this->productAttributeConfig = $this->helper->getLocalizedAttribute($this->bu, 'ProductCategoryProduct');
            $this->productAttributeConfig1 = $this->helper->getLocalizedAttribute1($this->bu, 'Product');

            if ($this->productAttributeConfig) {
                if (isset($this->productAttributeConfig)) {
                    $headerMapping = $this->productAttributeConfig;

                    if ($headerMapping) {
                        $this->headerMapping = $headerMapping;

                        # Fetch all products satisfying condition "salesMaster.epixFlag = '001' AND salesMaster.published = 1 AND product.published = 1"
                        $b2bProducts = $this->helper->getAllB2BProduct($this->bu);

                        if ($b2bProducts) {
                            # Product's non localized field
                            $productNonLocalisedFilteredAttribute = $this->getFilteredAttribute('class', 'PTGEUProduct', false);

                            $areHeadersAlreadyAdded = false;
                            $b2bProductsChucks = array_chunk($b2bProducts, 1000);

                            $filePath1 = PTGEU_B2B_SFTP_DOWNLOAD_TEMP_DIR . "PIM_Salesforce_B2B_ProductCategoryProduct_P61.csv";
                            $file1 = fopen($filePath1, "w+");

                            foreach ($b2bProductsChucks as $batchNum => $productIds) {
                                echo "Processing Batch - " . ($batchNum + 1) . ", It holds " . count($productIds) . " products " . PHP_EOL;

                                if ($this->headerMapping) {
                                    # Product's non localized field
                                    $productNonLocalisedFilteredAttributeField = array_keys($productNonLocalisedFilteredAttribute);

                                    $result0 = $this->getRecordsWithFilteredMasterFields($productNonLocalisedFilteredAttributeField, $productIds);

                                    $finalPritingList = [];

                                    foreach ($result0 as $rkey => $rvalue) {
                                        unset($rvalue['oo_id']);
                                        $finalPritingList[] = $rvalue;
                                    }

                                    if ($finalPritingList) {
                                        if (!$areHeadersAlreadyAdded) {
                                            $keys = array_keys($finalPritingList[0]);

                                            $displayKeys = [];

                                            foreach ($headerMapping as $headerIndex => $headerName) {
                                                $displayKeys[$headerIndex] = $headerName;
                                            }

                                            fputcsv($file1, $displayKeys);
                                            $areHeadersAlreadyAdded = true;
                                        }

                                        foreach ($finalPritingList as $key => $record) {
                                            foreach ($displayKeys as $keyHeader => $keyHeaderValue) {
                                                if ($keyHeaderValue == 'Product2.B2B_External_Id__c') {
                                                    $this->productSapCode = "06-" . (strip_tags($record[$keyHeader]));
                                                    $mapping_record[$keyHeaderValue] = $this->productSapCode;
                                                    if ($keyHeader != 'SalesForce_ID') {
                                                        unset($record[$keyHeader]);
                                                    }
                                                } else if ($keyHeaderValue == 'Category.B2B_External_Id__c') {
                                                    $this->siopFullCodeLevel5 = substr(strip_tags($record[$keyHeader]), 0, -6);
                                                    unset($record[$keyHeader]);
                                                    $mapping_record[$keyHeaderValue] = $this->siopFullCodeLevel5;
                                                } else if ($keyHeaderValue == 'IsPrimaryCategory') {
                                                    $mapping_record[$keyHeaderValue] = 'false';
                                                } else if ($keyHeaderValue == 'B2B_External_Id__c') {
                                                    $mapping_record[$keyHeaderValue] = $this->productSapCode . "_" . $this->siopFullCodeLevel5;
                                                }
                                            }
                                            $record = array_merge($mapping_record, $record);
                                            unset($record['SalesForce_ID']);
                                            fputcsv($file1, $record);
                                        }
                                    }
                                }
                            }

                            fclose($file1);

                            echo $message = "{$this->bu}: B2B ptgeu product data csv file created";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::INFO());
                        } else {
                            echo $message = "{$this->bu}: B2B  ptgeu product data not found to export";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::ERROR());
                        }
                    } else {
                        echo $message = "{$this->bu}: B2B ptgeu salesforce attribute not mapped to any of the PIM product attribute";
                        echo PHP_EOL;
                        $this->helper->logMessage($message, LogLevel::ERROR());
                    }
                } else {
                    echo $message = "{$this->bu}: B2B ptgeu product salesforce mapping not found";
                    echo PHP_EOL;
                    $this->helper->logMessage($message, LogLevel::ERROR());
                }
            } else {
                echo $message = "{$this->bu}: B2B ptgeu Product config not found";
                echo PHP_EOL;
                $this->helper->logMessage($message, LogLevel::ERROR());
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            $message = "Exception while trying to export the data" . " " . $message;
            $this->logMessage($message, LogLevel::CRITICAL());
            return;
        }
    }

    public function uploadFile()
    {
        $customFileName2 = "PIM_Salesforce_B2B_ProductCategoryProduct_P61.csv";
        $this->helper->uploadFile($customFileName2);
    }

    public function getFilteredAttribute($fieldLocation, $className, $isLocalized = true)
    {
        $filteredAttribute = [];
        if ($this->productAttributeConfig1) {
            foreach ($this->productAttributeConfig1 as $key => $attributeConfig) {
                if ($attributeConfig['fieldLocation'] == $fieldLocation && $attributeConfig['className'] == $className && $attributeConfig['isLocalized'] == $isLocalized) {
                    if (isset($this->headerMapping[$key])) {
                        $filteredAttribute[$key] = $attributeConfig;
                    }
                }
            }
        }
        return $filteredAttribute;
    }

    public function getRecordsWithFilteredMasterFields($fields, $b2bProducts)
    {
        $config = $this->bUProductClassTableID[$this->bu];

        $productClassId = $config['productClassId'];

        $columnsString = 'oo_id';

        if ($fields) {
            $columnsString .= "," . implode(',', $fields);
        }

        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_query_{$productClassId} where oo_id IN ($ids)";

        return $this->db->fetchAllAssociative($sql);
    }

    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(PTGEMEA_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}
