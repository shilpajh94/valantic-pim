<?php

namespace B2BTranslationBundle\PimDataExport\B2B\IFSPTG;


use Pimcore\Db;
use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\PimDataExport\IDataExport;
use B2BTranslationBundle\PimDataExport\PimDataExportHelper;

class CategoryDataExport implements IDataExport
{
    private $db;
    private $bu;
    private $helper; 
    private $languages;
    private $categoryAttributeConfig;
    private $headerMapping;
    private $bUCategoryClassTableID = [
        'IFS_PTG_US' => array('categoryClassId'=>'2'),
        'CS' => array('categoryClassId'=>'CSHierarchy'),
        'PTG_EU' => array('categoryClassId'=>'39'),
        'IFS_EMEA' => array('categoryClassId'=>'IFSEUProductCategory'),
    ];

    public function __construct($bu)
    {
        $this->bu = $bu;
        $this->db = Db::get();
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
                                // if($categoryFilteredNonLocalizedAttributeField)
                                // {
                                    $nonLocalizedResultSet = $this->getRecordsWithFilteredMasterFields($categoryFilteredNonLocalizedAttributeField, $categoryIds);
                                // }

                                # Categories's localized field
                                $localizedResultSet = [];
                                $localizeData1 = [];
                                if($categoryFilteredAttributeField)
                                {
                                    $localizedResultSet = $this->getRecordsWithFilteredFieldsCategory($categoryFilteredAttributeField, $categoryIds);
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
                                // p_r($finalPritingList);
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
                            $this->helper->logMessage($message, LogLevel::INFO());
                        }
                        else{
                            echo $message = "{$this->bu}: B2B category data not found to export";
                            $this->helper->logMessage($message, LogLevel::ERROR());
                        }
                    }
                    else{
                        echo $message = "{$this->bu}: B2B salesforce attribute not mapped to any of the PIM category";
                        $this->helper->logMessage($message, LogLevel::ERROR());
                    }
                }
                else{
                    echo $message = "{$this->bu}: B2B category salesforce mapping not found";
                    $this->helper->logMessage($message, LogLevel::ERROR());
                }
            }
            else{
                echo $message = "{$this->bu}: B2B Category config not found";
                $this->helper->logMessage($message, LogLevel::ERROR());
            }
            
        } catch(\Throwable $e) {
            $message = $e->getMessage();
            echo $message = "{$this->bu}: Exception while trying to export the data"." ".$message;
            $this->helper->logMessage($message, LogLevel::CRITICAL());
            return;
        }
    }

    public function uploadFile()
    {
        $customFileName = "{$this->bu}_Product_".date('M')."_".date('d')."_".date('Y').".csv";
        $this->helper->uploadFile($customFileName);
    }

    public function getRecordsWithFilteredMasterFields($fields, $b2bProducts)
    {
        $config = $this->bUCategoryClassTableID[$this->bu];
        $categoryClassId = $config['categoryClassId'];

        $columnsString = 'o_id';

        if($fields)
        {
            $columnsString .= ",". implode(',', $fields);
        }
        
        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_{$categoryClassId} where o_id IN ($ids)";
        return $this->db->fetchAll($sql);
    }

    public function getRecordsWithFilteredFieldsCategory($columnsList, $b2bProducts)
    {
        $config = $this->bUCategoryClassTableID[$this->bu];
        $categoryClassId = $config['categoryClassId'];

        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $selectedFields = [];
        foreach ($columnsList as $key => $columm) {
            $selectedFields[] = "$columm";
        }

        $columnsString = implode(',', $selectedFields);
        $ids = implode(',', $b2bProducts);
        $sql = "select ooo_id, language, {$columnsString} from object_localized_data_{$categoryClassId} where ooo_id IN ($ids) AND language IN ($languages)";
        return $this->db->fetchAll($sql);
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