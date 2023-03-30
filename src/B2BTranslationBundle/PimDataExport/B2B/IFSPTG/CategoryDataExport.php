<?php

namespace B2BTranslationBundle\PimDataExport\B2B\IFSPTG;

use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\PimDataExport\IDataExport;
use B2BTranslationBundle\PimDataExport\PimDataExportHelper;
use \Pimcore\Model\Asset;

class CategoryDataExport implements IDataExport
{
    private $bu;
    private $helper; 
    private $languages;
    private $categoryAttributeConfig;
    private $headerMapping;
    
    public function __construct($bu)
    {
        $this->bu = $bu;
        $this->helper = new PimDataExportHelper;
    }

    public function exportData()
    {
        $this->helper->logMessage("{$this->bu}: Script Execution Started", LogLevel::DEBUG());
        try{
            # Get valid languages
            $this->languages = \Pimcore\Tool::getValidLanguages(); 

            $this->categoryAttributeConfig = $this->helper->getLocalizedAttribute($this->bu,'Category');
            if($this->categoryAttributeConfig)
            {
                $b2bCategoryMapping = $this->helper->getB2BTranslationMapping('Category', $this->bu);

                if($b2bCategoryMapping)
                {
                    $b2bCategoryMappingRows = explode(PHP_EOL,$b2bCategoryMapping);
                    $headerMapping = [];
                    if($b2bCategoryMappingRows)
                    {
                        foreach ($b2bCategoryMappingRows as $key => $row) {
                            $list = explode('|',$row);

                            if(isset($list[1]) && $list[1])
                            {
                                $headerMapping[$list[0]] = $list[1];
                            }
                        }
                    }

                    if($headerMapping)
                    {
                        $this->headerMapping = $headerMapping;

                        $b2bCategories = $this->helper->getAllB2BCategory($this->bu);

                        if($b2bCategories)
                        {
                            $categoryFilteredAttribute = $this->getFilteredAttribute('class', 'ProductCategory');
                            $categoryFilteredAttributeField = array_keys($categoryFilteredAttribute);

                            $categoryFilteredNonLocalizedAttribute = $this->getFilteredAttribute('class', 'ProductCategory', false);
                            $categoryFilteredNonLocalizedAttributeField = array_keys($categoryFilteredNonLocalizedAttribute);
                            
                            $b2bCategoriesChucks = array_chunk($b2bCategories,50);

                            // $filePath = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."{$this->bu}_Category_".date('M')."_".date('d')."_".date('Y').".csv";
                            // $file = fopen($filePath,"w+");

                            $filePath1 = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."SFPIM_PRODUCTCATEGORY_TRANSLATION_INSERT.csv";
                            $file1 = fopen($filePath1,"w+");

                            $filePath2 = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."SFPIM_PRODUCTCATEGORY_TRANSLATION_UPDATE.csv";
                            $file2 = fopen($filePath2,"w+");


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
                                $localizeData1 = [];
                                if($categoryFilteredAttributeField)
                                {
                                    $localizedResultSet = $this->helper->getRecordsWithFilteredFieldsCategory($this->bu, $this->languages, $categoryFilteredAttributeField, $categoryIds);
                                }

                                foreach ($localizedResultSet as $key => $fields) {
                                    foreach ($fields as $fkey => $field) {
                                        if(!in_array($fkey, ['ooo_id','language']))
                                        {
                                            $localizeData1[$fields['ooo_id']][$fkey][$fields['language']] = $field;
                                        }
                                    }
                                }
                                
                                $finalPritingList = [];
                                if($localizeData1)
                                {
                                    $header_Keys = array_keys($this->headerMapping);
                                    foreach($this->languages as $lang => $language)
                                    {
                                        foreach ($categoryIds as $key => $id) {

                                            $rawData = [];

                                            foreach ($nonLocalizedResultSet as $rkey => $rvalue) {
                                                if($id == $rvalue['o_id'])
                                                {
                                                    unset($rvalue['o_id']);
                                                    $rvalue['language'] = $language;
                                                    $rawData = $rvalue;
                                                }
                                            }

                                            $common_header_list1 = array_intersect($header_Keys, $categoryFilteredAttributeField);

                                            if($localizeData1)
                                            {
                                                foreach ($common_header_list1 as $key => $field) {
                                                    if(isset($localizeData1[$id][$field][$language]))
                                                    {
                                                        $rawData[$field] = $localizeData1[$id][$field][$language];
                                                    }
                                                    else{
                                                        $rawData[$field] = '';
                                                    }
                                                }
                                            }
                                            else{
                                                foreach ($common_header_list1 as $key => $field) {
                                                    $rawData[$field] = '';
                                                }
                                            }

                                            $finalPritingList[] = $rawData;
                                        }
                                    }
                                }
                                else{
                                    foreach ($nonLocalizedResultSet as $rkey => $rvalue) {
                                        unset($rvalue['o_id']);
                                        $finalPritingList[] = $rvalue;
                                    }
                                }

                                if($finalPritingList)
                                {
                                    if(!$areHeadersAlreadyAdded)
                                    {
                                        //dd($headerMapping);
                                        $keys = array_keys($finalPritingList[0]);
                                        $displayKeys = [];
                                        $staticHeaderMappingArr=['language'=>'Language','BussinessUnit'=>'BussinessUnit'];
                                        foreach ($headerMapping as $headerIndex => $headerName) {
                                                $displayKeys[$headerIndex] = $headerName;
                                        }
                                        $displayKeys=array_merge($staticHeaderMappingArr,$displayKeys);
                                        fputcsv($file1, $displayKeys);
                                        fputcsv($file2, $displayKeys);
                                        $areHeadersAlreadyAdded = true;
                                    }

                                    foreach($finalPritingList as $key=>$record){
                                        foreach ($displayKeys as $keyHeader => $keyHeaderValue) {
                                            if(array_key_exists($keyHeader,$record)){
                                                $mapping_record[$keyHeaderValue] = $record[$keyHeader];
                                                if($keyHeader!='SalesForce_ID'){
                                                    unset($record[$keyHeader]);
                                                }
                                                
                                            }else if($keyHeaderValue=='BussinessUnit'){
                                                $mapping_record[$keyHeaderValue]=$this->bu;
                                            }else if($keyHeaderValue=='Language'){
                                                $mapping_record[$keyHeaderValue]='';
                                            }
                                        }
                                        $record=array_merge($mapping_record,$record);
                                        if($record['SalesForce_ID'])
                                        {
                                            unset($record['SalesForce_ID']);
                                            fputcsv($file2, $record);
                                        }
                                        else{
                                            fputcsv($file1, $record);
                                        }
                                    }
                                }
                            }

                            // fclose($file);
                            fclose($file1);
                            fclose($file2);

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
        // $customFileName = "{$this->bu}_Category_".date('M')."_".date('d')."_".date('Y').".csv";
        $customFileName1 = "SFPIM_PRODUCTCATEGORY_TRANSLATION_UPDATE.csv";
        $this->helper->uploadFile($customFileName1);

        $customFileName2 = "SFPIM_PRODUCTCATEGORY_TRANSLATION_INSERT.csv";
        $this->helper->uploadFile($customFileName2);
    }

    public function getFilteredAttribute($fieldLocation, $className, $isLocalized=true)
    {
        $filteredAttribute = [];
        if($this->categoryAttributeConfig)
        {
            foreach ($this->categoryAttributeConfig as $key => $attributeConfig) {
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
}