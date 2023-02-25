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

    public function getMultiSelectMasterList()
    {
        $sqlMapping = "select oo_id, masterType, language, name, Description, CustomerFacingVersion from object_query_22  oq_22 
                    left join object_localized_data_22 old_22 ON oq_22.oo_id = old_22.ooo_id";
        return $this->db->fetchAll($sqlMapping);
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
        $sql = "select ooo_id, language, {$columnsString} from object_localized_data_1 where ooo_id IN ($ids)";
        return $this->db->fetchAll($sql);
    }

    public function getRecordsWithFilteredMasterFields($columnsList, $b2bProducts)
    {
        $config = $this->bUProductClassTableID[$this->bu];
        $productClassId = $config['productClassId'];

        $columnsString = implode(',', $columnsList);
        $ids = implode(',', $b2bProducts);
        $sql = "select oo_id, {$columnsString} from object_query_{$productClassId} where oo_id IN ($ids)";
        return $this->db->fetchAll($sql);
    }

    public function getRecordsWithFilteredObjectbrickMasterFields($multiObjectbrickColumnsList, $b2bProducts)
    {
        $allObjectBrickData = [];
        $config = $this->bUProductClassTableID[$this->bu];
        $productClassId = $config['productClassId'];

        foreach ($multiObjectbrickColumnsList as $brickName => $columnsList) {
            $columnsString = implode(',', $columnsList);
            $ids = implode(',', $b2bProducts);
            $sql = "select o_id, {$columnsString} from object_brick_query_{$brickName}_{$productClassId} where o_id IN ($ids)";
            $resultSet = $this->db->fetchAll($sql);

            $allObjectBrickData = array_merge($allObjectBrickData, $resultSet);
        }
        
        return $allObjectBrickData;
    }

    

    public function import($bu)
    {
        $this->logMessage('Script Execution Started', LogLevel::DEBUG());
        try{

            $this->bu = $bu;

            $b2bMapping = $this->getB2BTranslationMapping();
            $multiSelectMasters = $this->getMultiSelectMasterList();
            $multiSelectMastersGroupList = [];
            if($multiSelectMasters)
            {
                foreach ($multiSelectMasters as $key => $value) {
                    $multiSelectMastersGroupList[$value['masterType']][$value['oo_id']][$value['language']]= $value['name'];
                }
                unset($multiSelectMasters);
            }

            $b2bProductMapping = $b2bMapping['Product'];
            // $b2bCategoryMapping = $b2bMapping['Category'];
            $this->productAttributeConfig = $this->getLocalizedAttribute('Product');
            $productFilteredAttribute = $this->getFilteredAttribute('class', 'Product');
            $productMultiSelectFilteredAttribute = $this->getFilteredAttribute('class', 'MultiselectMaster');
            $productMultiSelectFilteredOjbectbrickAttribute = $this->getFilteredAttribute('objectbrick', 'MultiselectMaster');

            $b2bProducts = $this->getAllB2BProduct();
            if($b2bProducts)
            {
                $areHeadersAlreadyAdded = false;
                $b2bProducts = array_slice($b2bProducts, 0, 1000);
                $b2bProductsChucks = array_chunk($b2bProducts,100);
                
                $filePath = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."{$this->bu}_Product_".date('M').".csv";
                $file = fopen($filePath,"w+");

                foreach ($b2bProductsChucks as $batchNum => $productIds) 
                {
                    echo "Processing Batch - ".($batchNum+1). ", It holds ".count($productIds)." products ".PHP_EOL;
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
                                $result = $this->getRecordsWithFilteredFields($columnsList, $headerMapping, $productIds);

                                # Getting MultiSelectMaster's localized data for product class field
                                if($productMultiSelectFilteredAttribute)
                                {
                                    $mappingAvailableMasters = [];
                                    $multiSelectKeys = [];

                                    foreach ($productMultiSelectFilteredAttribute as $key => $columm) {

                                        if(isset($headerMapping[$key]))
                                        {   
                                            $alias = $headerMapping[$key];
                                            $mappingAvailableMasters[] = "TRIM(BOTH ',' FROM $key) AS $alias";
                                            $multiSelectKeys[] = $alias;
                                        }
                                    }

                                    $customList = [];
                                    if($mappingAvailableMasters)
                                    {
                                        $result2 = $this->getRecordsWithFilteredMasterFields($mappingAvailableMasters, $productIds);
                                        
                                        foreach ($result2 as $key => $fields) {
                                            foreach ($fields as $fkey => $field) {
                                                $masterType = $productMultiSelectFilteredAttribute[$fkey]['masterType'];
                                                if(isset($multiSelectMastersGroupList[$masterType][$field]))
                                                {
                                                    $master = $multiSelectMastersGroupList[$masterType][$field];
                                                    foreach ($master as $mkey => $value) {
                                                        $customList[$fields['oo_id']][$fkey][$mkey] = $value;
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if($customList)
                                    {
                                        foreach ($result as $key => $value) 
                                        {
                                            foreach ($multiSelectKeys as $nkey => $nvalue) {
                                                $result[$key][$nvalue] = '';
                                            }

                                            if($customList[$value['ooo_id']])
                                            {
                                                foreach ($customList[$value['ooo_id']] as $rkey => $rvalue) {
                                                    $result[$key][$rkey] = $rvalue[$value['language']];
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        foreach ($result as $key => $value) 
                                        {
                                            foreach ($multiSelectKeys as $nkey => $nvalue) {
                                                $result[$key][$nvalue] = '';
                                            }
                                        }
                                    }
                                }

                                # Getting MultiSelectMaster's localized data for objectbrick field
                                if($productMultiSelectFilteredOjbectbrickAttribute)
                                {
                                    $mappingAvailableMasters = [];
                                    $multiSelectKeys = [];

                                    foreach ($productMultiSelectFilteredOjbectbrickAttribute as $key => $columm) {

                                        if(isset($headerMapping[$key]))
                                        {   
                                            $alias = $headerMapping[$key];
                                            $mappingAvailableMasters[$columm['objectBrickClassName']][] = "TRIM(BOTH ',' FROM $key) AS $alias";
                                            $multiSelectKeys[] = $alias;
                                        }
                                    }

                                    $customList2 = [];
                                    if($mappingAvailableMasters)
                                    {
                                        $result3 = $this->getRecordsWithFilteredObjectbrickMasterFields($mappingAvailableMasters, $productIds);

                                        foreach ($result3 as $key => $fields) {
                                            foreach ($fields as $fkey => $field) {
                                                $masterType = $productMultiSelectFilteredOjbectbrickAttribute[$fkey]['masterType'];
                                                if(isset($multiSelectMastersGroupList[$masterType][$field]))
                                                {
                                                    $master = $multiSelectMastersGroupList[$masterType][$field];
                                                    foreach ($master as $mkey => $value) {
                                                        $customList2[$fields['o_id']][$fkey][$mkey] = $value;
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if($customList2)
                                    {
                                        foreach ($result as $key => $value) 
                                        {
                                            foreach ($multiSelectKeys as $nkey => $nvalue) {
                                                $result[$key][$nvalue] = '';
                                            }

                                            if($customList2[$value['ooo_id']])
                                            {
                                                foreach ($customList2[$value['ooo_id']] as $rkey => $rvalue) {
                                                    $result[$key][$rkey] = $rvalue[$value['language']];
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        foreach ($result as $key => $value) 
                                        {
                                            foreach ($multiSelectKeys as $nkey => $nvalue) {
                                                $result[$key][$nvalue] = '';
                                            }
                                        }
                                    }
                                }

                                if($result)
                                {
                                    if(!$areHeadersAlreadyAdded)
                                    {
                                        $headers = array_keys($result[0]);
                                        fputcsv($file, $headers);
                                        $areHeadersAlreadyAdded = true;
                                    }
                                    
                                    foreach($result as $key=>$record){

                                        fputcsv($file, $record);
                                    }
                                }
                            }
                        }
                    }
                }
                fclose($file);
            }
            
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