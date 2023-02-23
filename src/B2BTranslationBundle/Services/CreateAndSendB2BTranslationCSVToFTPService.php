<?php
namespace B2BTranslationBundle\Services;

use Pimcore\Db;
use B2BTranslationBundle\Tool\Utils;
use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\B2BTranslationConstants;
use \Pimcore\Model\DataObject;

class CreateAndSendB2BTranslationCSVToFTPService
{
    private $db;
    private $bu;
    private $common;
    private $productAttributeConfig;
    private $categoryAttributeConfig;
    private $bUProductClassTableID = [
        'IFS_PTG_US' => array('productClassId'=>'1', 'salesMaterialMasterClassId'=>'10'),
        'CS_US' => 'CSProducts',
        'PTG_EU' => 'PTGEUProduct',
        'IFS_EU' => 'IFSEUProduct',
    ];

    public function __construct()
    {
        $this->db = Db::get();
        $this->common = \Pimcore::getContainer()->get('b2b_translation.common_helper');
    }
    
    public function getB2BTranslationMapping()
    {
        $sqlMapping="select TranslationDataType, AVBVendorData from object_query_B2BTranslationMapping Where BusinessUnit='{$this->bu}'";
        return $this->db->fetchPairs($sqlMapping);
    }

    public function getLocalizedAttribute($className)
    {
        $businessUnitFileName = '';

        if($this->bu == 'IFS_PTG_US')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_PTG_US_FILE_NAME;
        }
        else if($this->bu == 'CS_US')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_CS_US_FILE_NAME;
        }
        else if($this->bu == 'PTG_EU')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_PTG_EU_FILE_NAME;
        }
        else if($this->bu == 'IFS_EU')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_EU_FILE_NAME;
        }

        $b2bTranslationList = [];
        $b2bTranslationConfig = \Pimcore::getContainer()->get('b2b_translation.config_provider_service')->getBusinessUnitTranslationConfig($businessUnitFileName);
        $b2bTranslationList = $this->common->getParameter($b2bTranslationConfig, $className);

        return $b2bTranslationList;
    }

    public function getFilteredAttribute($fieldLocation, $className)
    {
        $filteredAttribute = [];
        if($this->productAttributeConfig)
        {
            foreach ($this->productAttributeConfig as $key => $attributeConfig) {
                if($attributeConfig['fieldLocation'] == $fieldLocation && $attributeConfig['className'] == $className)
                {
                    $filteredAttribute[$key] = $attributeConfig;
                }
            }
        }
        return $filteredAttribute;
    }

    public function getRecordsWithFilteredFields($columnsList, $headerMapping, $b2bProducts)
    {
        $selectedFields = [];
        foreach ($columnsList as $key => $columm) {

            if(isset($headerMapping[$columm]))
            {   
                $alias = $headerMapping[$columm];
                $selectedFields[] = "$columm AS $alias";
            }
        }

        $columnsString = implode(',', $selectedFields);
        $ids = implode(',', $b2bProducts);
        $sql = "select language, {$columnsString} from object_localized_data_1 where ooo_id IN ($ids)";
        return $this->db->fetchAll($sql);
    }

    public function import($bu)
    {
        $this->logMessage('Script Execution Started', LogLevel::DEBUG());
        try{

            $this->bu = $bu;

            $b2bProducts = $this->getAllB2BProduct();
            $b2bProducts = array_slice($b2bProducts, 0, 5);
            // p_r($b2bProducts);
            // count($b2bProducts);
            $b2bMapping = $this->getB2BTranslationMapping();
            $b2bProductMapping = $b2bMapping['Product'];
            // $b2bCategoryMapping = $b2bMapping['Category'];
            $this->productAttributeConfig = $this->getLocalizedAttribute('Product');
            $productFilteredAttribute = $this->getFilteredAttribute('class', 'Product');
            // p_r($productFilteredAttribute);
            
            $columnsList = array_keys($productFilteredAttribute);
            if($columnsList)
            {
                $b2bProductMappingRows = explode(PHP_EOL,$b2bProductMapping);
                $headerMapping = [];
                $headerMapping['language'] = 'language';
                if($b2bProductMappingRows)
                {
                    foreach ($b2bProductMappingRows as $key => $row) {
                        $list = explode('|',$row);

                        if($list[1])
                        {
                            $headerMapping[$list[0]] = $list[1];
                        }
                    }

                    if($headerMapping)
                    {
                        $result = $this->getRecordsWithFilteredFields($columnsList, $headerMapping, $b2bProducts);
                        $filePath = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."{$this->bu}_Product_".date('M').".csv";
                        $file = fopen($filePath,"w+");
                        $firstRecord = $result[0];
                        $headers = array_keys($firstRecord);
                        fputcsv($file, $headerMapping);

                        foreach($result as $key=>$record){

                            fputcsv($file, $record);
                        }

                        fclose($file);
                    }
                }
            }
            
            // fclose($file);
        } catch(\Throwable $e) {
            $message = $e->getMessage();
            $message = "Exception while trying to export the data"." ".$message;
            $this->logMessage($message, LogLevel::CRITICAL());
            return;
        }
    }    

    public function getAllB2BProduct()
    {
        $config = $this->bUProductClassTableID[$this->bu];
        $productClassId = $config['productClassId'];
        $salesMaterialMasterClassId = $config['salesMaterialMasterClassId'];
        
        $sql = "SELECT DISTINCT
                    product.o_id
                FROM
                    object_{$salesMaterialMasterClassId} salesMaster
                        JOIN
                    object_{$productClassId} product ON product.o_id = SUBSTRING(salesMaster.Material,
                        2,
                        (LENGTH(salesMaster.Material) - 2))
                WHERE
                    salesMaster.epixFlag = '001'
                        AND salesMaster.o_published = 1
                        AND product.o_published = 1
                ORDER BY product.o_id ASC;";

        return $this->db->fetchCol($sql);
    }
    
    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(PRODUCT_LOCALIZATION_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}