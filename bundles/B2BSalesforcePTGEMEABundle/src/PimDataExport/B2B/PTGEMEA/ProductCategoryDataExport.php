<?php

namespace B2BSalesforcePTGEMEABundle\PimDataExport\B2B\PTGEMEA;

use B2BSalesforcePTGEMEABundle\Logger\LogLevel;
use B2BSalesforcePTGEMEABundle\PimDataExport\IDataExport;
use B2BSalesforcePTGEMEABundle\PimDataExport\PimDataExportHelper;
use \Pimcore\Model\Asset;
use Pimcore\Db;

class ProductCategoryDataExport implements IDataExport
{
    private $bu;
    private $helper; 
    private $categoryAttributeConfig;
    private $categoryAttributeConfig1;
    private $headerMapping;
    protected $db;
    
    public function __construct($bu)
    {
        $this->db = Db::get();
        $this->bu = $bu;
        $this->helper = new PimDataExportHelper;
    }

    public function exportData()
    {
        $this->helper->logMessage("{$this->bu}: Script Execution Started", LogLevel::DEBUG());
        try{

            $this->categoryAttributeConfig = $this->helper->getLocalizedAttribute($this->bu,'Category');
            $this->categoryAttributeConfig1 = $this->helper->getLocalizedAttribute1($this->bu,'Category');
            
            if($this->categoryAttributeConfig)
            {
                if(isset($this->categoryAttributeConfig))
                {
                    $headerMapping = $this->categoryAttributeConfig;

                    if($headerMapping)
                    {
                        $this->headerMapping = $headerMapping;

                        $b2bCategories = $this->helper->getAllB2BCategory($this->bu);

                        if($b2bCategories)
                        {
                            $categoryFilteredAttribute = $this->getFilteredAttribute('class', 'PTGEUProductHierarchy');
                            $categoryFilteredAttributeField = array_keys($categoryFilteredAttribute);

                            $categoryFilteredNonLocalizedAttribute = $this->getFilteredAttribute('class', 'PTGEUProductHierarchy', false);
                            $categoryFilteredNonLocalizedAttributeField = array_keys($categoryFilteredNonLocalizedAttribute);
                            
                            $b2bCategoriesChucks = array_chunk($b2bCategories,50);


                            $filePath1 = PTGEU_B2B_SFTP_DOWNLOAD_TEMP_DIR."PIM_Salesforce_B2B_ProductCategory_P61.csv";
                            $file1 = fopen($filePath1,"w+");
                            $areHeadersAlreadyAdded = false;
                            foreach ($b2bCategoriesChucks as $batchNum => $categoryIds) 
                            {
                                # Categories's non-localized field
                                $nonLocalizedResultSet = [];
                                $nonLocalizedResultSet = $this->helper->getRecordsWithFilteredMasterFields($this->bu, $categoryFilteredNonLocalizedAttributeField, $categoryIds);

                                if($this->headerMapping['image'])
                                {
                                    foreach ($nonLocalizedResultSet as $key => $value) {
                                        if(isset($value['image']) && $value['image'])
                                        {
                                            $asset = Asset::getById($value['image']);
                                            $sourcePath = '';
                                            if($asset)
                                            {
                                                $sourcePath = \S3CustomizationBundle\Lib\Utils::getAssetFullPathCompatibleToS3($asset);
                                            }
                                            $nonLocalizedResultSet[$key]['image'] = $sourcePath;
                                        }
                                    }
                                }
                                
                                # Categories's localized field
                                $localizedResultSet = [];

                                if($categoryFilteredAttributeField)
                                {
                                    $localizedResultSet = $this->helper->getRecordsWithFilteredFieldsCategory($this->bu, "en", $categoryFilteredAttributeField, $categoryIds);
                                }

                                $finalPritingList = [];

                                $finalPritingList = $nonLocalizedResultSet;

                                foreach ($finalPritingList as $key1 => $value1) {
                                    $dataFound = [];
                                    foreach($localizedResultSet as $key2 => $value2){
                                        $value1_id = isset($value1['id'])? $value1['id'] : null;
                                        if($value1_id == $value2['ooo_id'])
                                        {
                                            unset($value1['id']);
                                            $dataFound = array_merge($dataFound,$value2);
                                            // break;
                                        }
                                    }
                                    if($dataFound)
                                        {
                                            unset($dataFound['ooo_id'], $dataFound['language'] );
                                            $finalPritingList[$key1] = array_merge($value1,$dataFound);
                                        }
                                        else{
                                            $finalPritingList[$key1] = array_merge($value1,$finalPritingList);
                                        }
                                }

                                if($finalPritingList)
                                {
                                    if(!$areHeadersAlreadyAdded)
                                    {
                                        $keys = array_keys($finalPritingList[0]);
                                        $displayKeys = [];
                                        foreach ($headerMapping as $headerIndex => $headerName) {
                                                $displayKeys[$headerIndex] = $headerName;
                                        }
                                        fputcsv($file1, $displayKeys);
                                        $areHeadersAlreadyAdded = true;
                                    }
                                    foreach($finalPritingList as $key=>$record){
                                        foreach ($displayKeys as $keyHeader => $keyHeaderValue) {
                                            if($keyHeaderValue == 'B2B_External_Id__c'){
                                                $fullcode = strip_tags($record[$keyHeader]);
                                                $fullcodeLength = strlen($fullcode);
                                                $parentCategoryId = $fullcodeLength == '6' ? substr($fullcode,0,-2) : substr($fullcode,0,-3);
                                            }
                                            if(array_key_exists($keyHeader,$record)){
                                                if($keyHeader == 'description' && $record['description'] == ""){
                                                    $fullcode = $record['fullCode'];
                                                    $sql = "select ParentObjectId from object_39 where fullCode = '$fullcode'";
                                                    $parentObjectId = $this->db->fetchAllAssociative($sql);
                                                    $id = $parentObjectId[0]['ParentObjectId'];
                                                    $description = $this->getDescription($id);
                                                    if($description == '' || $description == null){
                                                        $description = $this->getParentIdDescription($id);
                                                    }
                                                    $mapping_record[$keyHeaderValue] = $description;
                                                }
                                                else{
                                                    $mapping_record[$keyHeaderValue] = strip_tags($record[$keyHeader]);
                                                }
                                                if($keyHeader!='SalesForce_ID'){
                                                    unset($record[$keyHeader]);
                                                }
                                            }
                                            else if($keyHeaderValue == 'ParentCategoryId'){
                                                $mapping_record[$keyHeaderValue] = $parentCategoryId;
                                            }
                                            else if($keyHeaderValue == 'IsNavigational'){
                                                $mapping_record[$keyHeaderValue]='TRUE';
                                            }
                                            else if($keyHeaderValue == 'CatalogId'){
                                                $mapping_record[$keyHeaderValue]='ContiTech catalog';
                                            }

                                        }
                                        $record=array_merge($mapping_record,$record);
                                        unset($record['SalesForce_ID']);
                                        fputcsv($file1, $record);
                                    }
                                }
                            }

                            fclose($file1);

                            echo $message = "{$this->bu}: B2B category data csv file created";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::INFO());
                        }
                        else{
                            echo $message = "{$this->bu}: B2B category data not found to export";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::ERROR());
                        }
                    }
                    else{
                        echo $message = "{$this->bu}: B2B salesforce attribute not mapped to any of the PIM category attribute";
                        echo PHP_EOL;
                        $this->helper->logMessage($message, LogLevel::ERROR());
                    }
                }
                else{
                    echo $message = "{$this->bu}: B2B category salesforce mapping not found";
                    echo PHP_EOL;
                    $this->helper->logMessage($message, LogLevel::ERROR());
                }
            }
            else{
                echo $message = "{$this->bu}: B2B Category config not found";
                echo PHP_EOL;
                $this->helper->logMessage($message, LogLevel::ERROR());
            }
            
        } catch(\Throwable $e) {
            $message = $e->getMessage();
            echo $message = "{$this->bu}: Exception while trying to export the data"." ".$message;
            echo PHP_EOL;
            $this->helper->logMessage($message, LogLevel::CRITICAL());
            return;
        }
    }

    public function uploadFile()
    {

        $customFileName2 = "PIM_Salesforce_B2B_ProductCategory_P61.csv";
        $this->helper->uploadFile($customFileName2);
    }

    public function getFilteredAttribute($fieldLocation, $className, $isLocalized=true)
    {
        $filteredAttribute = [];
        if($this->categoryAttributeConfig1)
        {
            foreach ($this->categoryAttributeConfig1 as $key => $attributeConfig) {
                if($attributeConfig['fieldLocation'] == $fieldLocation && $attributeConfig['className'] == $className && $attributeConfig['isLocalized'] == $isLocalized)
                {
                    if(isset($this->headerMapping[$key]))
                    {
                        $filteredAttribute[$key] = $attributeConfig;
                    }
                }
            }
        }
        return $filteredAttribute;
    }

    public function getDescription($id){
        $parentId = $id;
        $sql = "select description from object_localized_data_39 where ooo_id = '$parentId' AND language = 'en'";
        $parentDescription = $this->db->fetchAllAssociative($sql);
        $description = $parentDescription[0]['description'];
        return $description;
    }

    public function getParentIdDescription($id){
        $sql = "select ParentObjectId from object_39 where oo_id = '$id'";
        $parentObjectId = $this->db->fetchAllAssociative($sql);
        $parentId = $parentObjectId[0]['ParentObjectId'];
        if($parentId == null || $parentId == '' ){
            $description = '';
        }
        else{
            $description = $this->getDescription($parentId);
            if(empty($description)){
                $this->getParentIdDescription($parentId);
            }
        }
        return $description;
    }
}