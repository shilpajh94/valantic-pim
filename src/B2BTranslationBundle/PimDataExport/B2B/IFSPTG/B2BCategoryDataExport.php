<?php

namespace B2BTranslationBundle\PimDataExport\B2B\IFSPTG;


use Pimcore\Db;
use B2BTranslationBundle\Tool\Utils;
use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\B2BTranslationConstants;
use B2BTranslationBundle\PimDataExport\IDataExport;

class B2BCategoryDataExport implements IDataExport
{
    private $db;
    private $bu;
    private $common;
    private $languages;
    private $categoryAttributeConfig;
    private $headerMapping;

    public function __construct($bu)
    {
        $this->bu = $bu;
        $this->db = Db::get();
        $this->common = \Pimcore::getContainer()->get('b2b_translation.common_helper');
    }

    public function exportData()
    {
        $this->logMessage('Script Execution Started', LogLevel::DEBUG());
        try{

            # Get valid languages
            $this->languages = \Pimcore\Tool::getValidLanguages(); 
            $b2bCategoryMapping = $this->getB2BTranslationMapping('Category');
            
            $b2bCategoryMappingRows = explode(PHP_EOL,$b2bCategoryMapping);
            $headerMapping = [];
            if($b2bCategoryMappingRows)
            {
                foreach ($b2bCategoryMappingRows as $key => $row) {
                    $list = explode('|',$row);

                    if($list[1])
                    {
                        $headerMapping[$list[0]] = $list[1];
                    }
                }
            }
            
            $this->headerMapping = $headerMapping;
            $this->categoryAttributeConfig = $this->getLocalizedAttribute('Category');

            $b2bCategories = $this->getAllB2BCategory();
            if($b2bCategories)
            {
                $b2bCategoriesChucks = array_chunk($b2bCategories,50);
                $filePath = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."{$this->bu}_Category_".date('M').".csv";
                $file = fopen($filePath,"w+");
                $areHeadersAlreadyAdded = false;
                foreach ($b2bCategoriesChucks as $batchNum => $categoryIds) 
                {
                    $this->categoryAttributeConfig = $this->getLocalizedAttribute('Category');

                    # Categories's localized field
                    $categoryFilteredAttribute = $this->getFilteredAttribute('class', 'ProductCategory');
                    $categoryFilteredAttributeField = array_keys($categoryFilteredAttribute);
                    $result1 = $this->getRecordsWithFilteredFieldsCategory($categoryFilteredAttributeField, $categoryIds);

                    foreach ($result1 as $key => $fields) {
                        unset($fields['ooo_id']);
                        
                        if(!$areHeadersAlreadyAdded && $key ==0)
                        {
                            $keys = array_keys($fields);
                            $displayKeys = [];

                            foreach ($keys as $keyIndex => $keyName) {
                                $displayKeys[$keyName] = (isset($this->headerMapping[$keyName])) ? $this->headerMapping[$keyName] : 'Language';
                            }

                            fputcsv($file, $displayKeys);
                            $areHeadersAlreadyAdded = true;
                        }
                        else{
                            fputcsv($file, $fields);
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

    public function getRecordsWithFilteredFieldsCategory($columnsList, $b2bProducts)
    {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $selectedFields = [];
        foreach ($columnsList as $key => $columm) {
            $selectedFields[] = "$columm";
        }

        $columnsString = implode(',', $selectedFields);
        $ids = implode(',', $b2bProducts);
        $sql = "select ooo_id, language, {$columnsString} from object_localized_data_2 where ooo_id IN ($ids) AND language IN ($languages)";
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

    public function getB2BTranslationMapping($type)
    {
        $sqlMapping="select AVBVendorData from object_query_B2BTranslationMapping Where TranslationDataType ='{$type}' AND BusinessUnit='{$this->bu}' ORDER BY oo_id DESC";
        return $this->db->fetchOne($sqlMapping);
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

    public function getAllB2BCategory()
    {
        $sql = "SELECT o_id FROM salesforce_integration_b2b_category_master";
        return $this->db->fetchCol($sql);
    }

    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(PRODUCT_LOCALIZATION_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}