<?php

namespace B2BTranslationBundle\PimDataExport\B2B\IFSPTG;

use Pimcore\Db;
use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\PimDataExport\IDataExport;
use B2BTranslationBundle\PimDataExport\PimDataExportHelper;
use \Pimcore\Model\Asset;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CategoryDataExport implements IDataExport
{
    private $bu;
    private $helper;
    private $languages;
    private $categoryAttributeConfig;
    private $headerMapping;
    private $container;
    private $db;

    public function __construct($bu, ContainerInterface $container)
    {
        $this->bu = $bu;
        $this->container = $container;
        $this->db = Db::get();
        $this->helper = new PimDataExportHelper($this->container);
    }

    public function exportData()
    {
        $this->helper->logMessage("{$this->bu}: Script Execution Started", LogLevel::DEBUG());
        try {
            # Get valid languages
            $this->languages = \Pimcore\Tool::getValidLanguages();
            $this->languages = array_unique($this->languages);

            $this->categoryAttributeConfig = $this->helper->getLocalizedAttribute($this->bu, 'Category');
            if ($this->categoryAttributeConfig) {
                $b2bCategoryMapping = $this->helper->getB2BTranslationMapping('Category', $this->bu);

                if ($b2bCategoryMapping) {
                    $b2bCategoryMappingRows = explode(PHP_EOL, $b2bCategoryMapping);
                    $headerMapping = [];
                    if ($b2bCategoryMappingRows) {
                        foreach ($b2bCategoryMappingRows as $key => $row) {
                            $list = explode('|', $row);

                            if (isset($list[1]) && $list[1]) {
                                $headerMapping[$list[0]] = $list[1];
                            }
                        }
                    }

                    if ($headerMapping) {
                        $this->headerMapping = $headerMapping;

                        $b2bCategories = $this->helper->getAllB2BCategory($this->bu);

                        if ($b2bCategories) {
                            $categoryFilteredAttribute = $this->getFilteredAttribute('class', 'ProductCategory');
                            // $categoryFilteredAttributeField = array_keys($categoryFilteredAttribute);
                            $categoryFilteredAttributeField = $this->getSqlFieldName($categoryFilteredAttribute);

                            $categoryFilteredNonLocalizedAttribute = $this->getFilteredAttribute(
                                'class',
                                'ProductCategory',
                                false
                            );
                            // $categoryFilteredNonLocalizedAttributeField =
                            // array_keys($categoryFilteredNonLocalizedAttribute);
                            $categoryFilteredNonLocalizedAttributeField = $this->getSqlFieldName(
                                $categoryFilteredNonLocalizedAttribute
                            );

                            $b2bCategoriesChucks = array_chunk($b2bCategories, 50);

                            $filePath1 = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR ."$this->bu".
                                "_SFPIM_PRODUCTCATEGORY_TRANSLATION_INSERT.csv";
                            $file1 = fopen($filePath1, "w+");

                            $filePath2 = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR ."$this->bu".
                                "_SFPIM_PRODUCTCATEGORY_TRANSLATION_UPDATE.csv";
                            $file2 = fopen($filePath2, "w+");


                            $areHeadersAlreadyAdded = false;
                            foreach ($b2bCategoriesChucks as $categoryIds) {
                                # Categories's non-localized field
                                $nonLocalizedResultSet = [];
                                $nonLocalizedResultSet = $this->helper->getRecordsWithFilteredMasterFields(
                                    $this->bu,
                                    $categoryFilteredNonLocalizedAttributeField,
                                    $categoryIds
                                );
                                if (isset($this->headerMapping['image'])) {
                                    foreach ($nonLocalizedResultSet as $key => $value) {
                                        if (isset($value['image']) && $value['image']) {
                                            $asset = Asset::getById($value['image']);
                                            $sourcePath = '';
                                            if ($asset) {
                                                $sourcePath = \S3CustomizationBundle\Lib\Utils::
                                                    getAssetFullPathCompatibleToS3($asset);
                                            }
                                            $nonLocalizedResultSet[$key]['image'] = $sourcePath;
                                        }
                                    }
                                }

                                # Categories's localized field
                                $localizedResultSet = [];
                                $localizeData1 = [];
                                if ($categoryFilteredAttributeField) {
                                    $localizedResultSet = $this->helper->getRecordsWithFilteredFieldsCategory(
                                        $this->bu,
                                        $this->languages,
                                        $categoryFilteredAttributeField,
                                        $categoryIds
                                    );
                                }

                                foreach ($localizedResultSet as $key => $fields) {
                                    foreach ($fields as $fkey => $field) {
                                        if (!in_array($fkey, ['ooo_id', 'language'])) {
                                            $localizeData1[$fields['ooo_id']][$fkey][$fields['language']] = $field;
                                        }
                                    }
                                }

                                $finalPritingList = [];
                                if ($localizeData1) {
                                    $header_Keys = array_keys($this->headerMapping);

                                    foreach ($this->languages as $language) {
                                        foreach ($categoryIds as $key => $id) {

                                            $rawData = [];

                                            foreach ($nonLocalizedResultSet as $rvalue) {
                                                if ($id == $rvalue['id']) {
                                                    unset($rvalue['id']);
                                                    $rvalue['language'] = $language;
                                                    $rawData = $rvalue;
                                                }
                                            }

                                            $common_header_list1 = array_intersect(
                                                $header_Keys,
                                                $categoryFilteredAttributeField
                                            );

                                            if ($localizeData1) {
                                                foreach ($common_header_list1 as $key => $field) {
                                                    if (isset($localizeData1[$id][$field][$language])) {
                                                        $rawData[$field] = $localizeData1[$id][$field][$language];
                                                    } else {
                                                        $rawData[$field] = '';
                                                    }
                                                }
                                            } else {
                                                foreach ($common_header_list1 as $key => $field) {
                                                    $rawData[$field] = '';
                                                }
                                            }

                                            $finalPritingList[] = $rawData;
                                        }
                                    }
                                } else {
                                    foreach ($nonLocalizedResultSet as $rvalue) {
                                        unset($rvalue['id']);
                                        $finalPritingList[] = $rvalue;
                                    }
                                }

                                if ($finalPritingList) {
                                    if (!$areHeadersAlreadyAdded) {
                                        $displayKeys = [];
                                        if ($this->bu == 'PTG_EU') {
                                            $staticHeaderMappingArr = [
                                                'language' => 'Language'
                                            ];
                                        } else {
                                            $staticHeaderMappingArr = [
                                                'language' => 'Language',
                                                'BussinessUnit' => 'BussinessUnit'
                                            ];
                                        }
                                        foreach ($headerMapping as $headerIndex => $headerName) {
                                            $displayKeys[$headerIndex] = $headerName;
                                        }
                                        $displayKeys = array_merge($staticHeaderMappingArr, $displayKeys);
                                        fputcsv($file1, $displayKeys);
                                        fputcsv($file2, $displayKeys);
                                        $areHeadersAlreadyAdded = true;
                                    }

                                    foreach ($finalPritingList as $key => $record) {
                                        foreach ($displayKeys as $keyHeader => $keyHeaderValue) {
                                            if (isset($record['language'])) {
                                                $lang = $record['language'];
                                            }
                                            if (array_key_exists($keyHeader, $record)) {
                                                $mapping_record[$keyHeaderValue] = strip_tags($record[$keyHeader]);
                                                if($keyHeader == 'Description' && $record['Description'] == ""){
                                                    $fullcode = $record['fullCode'];
                                                    $sql = "select ParentObjectId from object_39 where fullCode = '$fullcode'";
                                                    $parentObjectId = $this->db->fetchAllAssociative($sql);
                                                    $id = $parentObjectId[0]['ParentObjectId'];
                                                    if ($id != null) {
                                                        $description = $this->getDescription($id, $lang);
                                                        if ($description == '' || $description == null) {
                                                            $description = $this->getParentIdDescription($id, $lang);
                                                        }
                                                    } else {
                                                        $description = '';
                                                    }
                                                    $mapping_record[$keyHeaderValue] = $description;
                                                }
                                                if ($keyHeader != 'SalesForce_ID') {
                                                    unset($record[$keyHeader]);
                                                }
                                            } elseif ($keyHeader == 'externalID_PTGEU') {
                                                $externalId = $record['fullCode'] . '_' . $lang;
                                                $mapping_record[$keyHeaderValue] = $externalId;
                                            } elseif ($keyHeaderValue == 'BussinessUnit') {
                                                $mapping_record[$keyHeaderValue] = $this->bu;
                                            } elseif ($keyHeaderValue == 'Language') {
                                                $mapping_record[$keyHeaderValue] = '';
                                            } elseif ($keyHeaderValue == 'Category.B2B_External_Id__c') {
                                                $mapping_record[$keyHeaderValue] = $record['fullCode'];
                                            }
                                        }
                                        $record = array_merge($mapping_record, $record);
                                        if (array_key_exists('fullCode', $record)) {
                                            unset($record['fullCode']);
                                        }
                                        // if($record['SalesForce_ID'])
                                        // {
                                        //     unset($record['SalesForce_ID']);
                                        //     fputcsv($file2, $record);
                                        // }
                                        // else{
                                        //     unset($record['SalesForce_ID']);
                                        fputcsv($file1, $record);
                                        // }
                                    }
                                }
                            }
                            fclose($file1);
                            // fclose($file2);

                            echo $message = "{$this->bu}: B2B category data csv file created";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::INFO());
                        } else {
                            echo $message = "{$this->bu}: B2B category data not found to export";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::ERROR());
                        }
                    } else {
                        echo $message = "{$this->bu}: B2B salesforce attribute not mapped to
                        any of the PIM category attribute";
                        echo PHP_EOL;
                        $this->helper->logMessage($message, LogLevel::ERROR());
                    }
                } else {
                    echo $message = "{$this->bu}: B2B category salesforce mapping not found";
                    echo PHP_EOL;
                    $this->helper->logMessage($message, LogLevel::ERROR());
                }
            } else {
                echo $message = "{$this->bu}: B2B Category config not found";
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

    public function uploadFile($bu)
    {
        $customFileName1 = $bu."_SFPIM_PRODUCTCATEGORY_TRANSLATION_UPDATE.csv";
        $this->helper->uploadFile($customFileName1);

        $customFileName2 = $bu."_SFPIM_PRODUCTCATEGORY_TRANSLATION_INSERT.csv";
        $this->helper->uploadFile($customFileName2);
    }

    public function getFilteredAttribute($fieldLocation, $className, $isLocalized = true)
    {
        $filteredAttribute = [];
        if ($this->categoryAttributeConfig) {
            foreach ($this->categoryAttributeConfig as $key => $attributeConfig) {
                if (
                    $attributeConfig['fieldLocation'] == $fieldLocation
                    && $attributeConfig['className'] == $className
                    && $attributeConfig['isLocalized'] == $isLocalized
                    && isset($this->headerMapping[$key])
                ) {
                    $filteredAttribute[$key] = $attributeConfig;
                }
            }
        }
        return $filteredAttribute;
    }

    private function getSqlFieldName(array $attribute): array
    {
        $fieldNames = [];
        foreach ($attribute as $key => $value) {
            $fieldNames[] = $value['sqlQuery'];
        }
        return $fieldNames;
    }

    public function getDescription($id, $lang){
        $parentId = $id;
        $sql = "select description from object_localized_data_39 where ooo_id = '$parentId' AND language = '$lang'";
        $parentDescription = $this->db->fetchAllAssociative($sql);
        if($parentDescription != null){
            $description = $parentDescription[0]['description'];
        } else {
            $description = '';
        }
        return $description;
    }

    public function getParentIdDescription($id, $lang){
        $sql = "select ParentObjectId from object_39 where oo_id = '$id'";
        $parentObjectId = $this->db->fetchAllAssociative($sql);
        $parentId = $parentObjectId[0]['ParentObjectId'];
        if($parentId == null || $parentId == '' ){
            $description = '';
        }
        else{
            $description = $this->getDescription($parentId, $lang);
            if(empty($description)){
                $description = $this->getParentIdDescription($parentId, $lang);
            }
        }
        return $description;
    }
}
