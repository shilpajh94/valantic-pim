<?php

namespace B2BTranslationBundle\PimDataExport\B2B\IFSPTG;

use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\PimDataExport\IDataExport;
use B2BTranslationBundle\PimDataExport\PimDataExportHelper;

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
                            $filePath = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."{$this->bu}_Category_".date('M')."_".date('d')."_".date('Y').".csv";
                            $file = fopen($filePath,"w+");
                            $areHeadersAlreadyAdded = false;
                            foreach ($b2bCategoriesChucks as $batchNum => $categoryIds) 
                            {
                                # Categories's non-localized field
                                $nonLocalizedResultSet = [];
                                $nonLocalizedResultSet = $this->helper->getRecordsWithFilteredMasterFields($this->bu, $categoryFilteredNonLocalizedAttributeField, $categoryIds);

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
                                        $keys = array_keys($finalPritingList[0]);
                                        $displayKeys = [];

                                        foreach ($keys as $keyIndex => $keyName) {
                                            $displayKeys[$keyName] = (isset($this->headerMapping[$keyName])) ? $this->headerMapping[$keyName] : 'Language';
                                        }

                                        fputcsv($file, $displayKeys);
                                        $areHeadersAlreadyAdded = true;
                                    }
                                    
                                    foreach($finalPritingList as $key=>$record){
                                        fputcsv($file, $record);
                                    }
                                }
                            }

                            fclose($file);

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
                        echo $message = "{$this->bu}: B2B salesforce attribute not mapped to any of the PIM category";
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
        $customFileName = "{$this->bu}_Category_".date('M')."_".date('d')."_".date('Y').".csv";
        $this->helper->uploadFile($customFileName);
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