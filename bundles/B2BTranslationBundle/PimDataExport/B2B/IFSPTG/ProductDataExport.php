<?php

namespace B2BTranslationBundle\PimDataExport\B2B\IFSPTG;


use Pimcore\Db;
use B2BTranslationBundle\Tool\Utils;
use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\B2BTranslationConstants;
use B2BTranslationBundle\PimDataExport\IDataExport;
use B2BTranslationBundle\PimDataExport\PimDataExportHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductDataExport implements IDataExport
{
    private $db;
    private $bu;
    private $common;
    private $helper;
    private $languages;
    private $productAttributeConfig;
    private $headerMapping;
    private $bUProductClassTableID = [
        'IFS_PTG_US' => array('productClassId'=>'1', 'salesMaterialMasterClassId'=>'10'),
        'CS_US' => 'CSProducts',
        'PTG_EU' => 'PTGEUProduct',
        'IFS_EU' => 'IFSEUProduct',
    ];

    private $container;

    public function __construct($bu, ContainerInterface $container)
    {
        $this->container = $container;
        $this->bu = $bu;
        $this->db = Db::get();
        $this->helper = new PimDataExportHelper;
        $this->common = $this->container->get('b2b_translation.common_helper');
    }

    public function exportData()
    {
        $languageNameDisplayArray = array('en' => 'en_US', 'fi_FI' => 'fi', 'it_IT' => 'it',
         'nn_NO' => 'no', 'pl_PL' => 'pl', 'pt' => 'pt_PT', 'ro_RO' => 'ro', 'ru_RU' => 'ru',
          'sv_SE' => 'sv', 'zh' => 'zh_CN');

        $this->helper->logMessage("{$this->bu}: Script Execution Started", LogLevel::DEBUG());
        try{
            # Get valid languages
            $this->languages = \Pimcore\Tool::getValidLanguages();

            $this->productAttributeConfig = $this->helper->getLocalizedAttribute($this->bu,'Product');
            if($this->productAttributeConfig)
            {
                $b2bProductMapping = $this->helper->getB2BTranslationMapping('Product', $this->bu);

                if($b2bProductMapping)
                {
                    $b2bProductMappingRows = explode(PHP_EOL,$b2bProductMapping);
                    $headerMapping = [];
                    if($b2bProductMappingRows)
                    {
                        foreach ($b2bProductMappingRows as $key => $row) {
                            $list = explode('|',$row);

                            if($list[1])
                            {
                                $headerMapping[$list[0]] = $list[1];
                            }
                        }
                    }
                    
                    if($headerMapping)
                    {
                        $this->headerMapping = $headerMapping;

                        # Fetch all products satisfying condition "salesMaster.epixFlag = '001' AND
                        # salesMaster.o_published = 1 AND product.o_published = 1"
                        $b2bProducts = $this->helper->getAllB2BProduct($this->bu);
                        
                        if($b2bProducts)
                        {
                            $fitingFamilyMasters = $this->getFittingFamilyMasterList();
                            $fittingEndFamilyTypeMasters = $this->getFittingEndFamilyTypeMasterList();
                            $multiSelectMasters = $this->getMultiSelectMasterList();
                            $featuresMasters = $this->getFeaturesMasterList();
                            $nomenClatures = $this->getNomenClatureList();
                            $threadMastersList = $this->getThreadList();
                            $fittingFamilyMastersList = $this->getFittingFamilyList();
                            $brandMastersList = $this->getBrandMasterList();
                            
                            $multiSelectMastersGroupList = [];
                            $fitingFamilyMastersGroupList = [];
                            $fittingEndFamilyTypeGroupList = [];
                            $featuresMastersGroupList = [];
                            $nomenClatureList = [];
                            if($multiSelectMasters)
                            {
                                foreach ($multiSelectMasters as $key => $value) {
                                    $multiSelectMastersGroupList[$value['masterType']][$value['oo_id']]
                                    [$value['language']]= $value['name'];
                                }
                                unset($multiSelectMasters);
                            }

                            if($fitingFamilyMasters)
                            {
                                foreach ($fitingFamilyMasters as $key => $value) {
                                    $fitingFamilyMastersGroupList[$value['oo_id']][$value['language']]
                                    = $value['Description'];
                                }
                                unset($fitingFamilyMasters);
                            }

                            if($fittingEndFamilyTypeMasters)
                            {
                                foreach ($fittingEndFamilyTypeMasters as $key => $value) {
                                    $fittingEndFamilyTypeGroupList[$value['oo_id']][$value['language']]
                                    = $value['Description'];
                                }
                                unset($fittingEndFamilyTypeMasters);
                            }

                            if($featuresMasters)
                            {
                                foreach ($featuresMasters as $key => $value) {
                                    $featuresMastersGroupList[$value['oo_id']][$value['language']]= $value['name'];
                                }
                                unset($featuresMasters);
                            }

                            if($nomenClatures)
                            {
                                foreach ($nomenClatures as $key => $value) {
                                    $nomenClatureList[$value['oo_id']] = $value;
                                }
                                unset($nomenClatures);
                            }

                            # Product's non localized field
                            $productNonLocalisedSelectFilteredAttribute =
                            $this->getFilteredAttribute('class', 'Product', false);
                            
                            # Product's localized field
                            $productFilteredAttribute = $this->getFilteredAttribute('class', 'Product');
                            
                            # Product's localized multiselect localized field
                            $productMultiSelectFilteredAttribute =
                            $this->getFilteredAttribute('class', 'MultiselectMaster');

                            # Products attached objectbrick's localized multiselect localized field
                            $productNonLocalizedFilteredOjbectbrickAttribute =
                            $this->getFilteredAttribute('objectbrick', '', false);
                            
                            # Products attached objectbrick's localized multiselect localized field
                            $productNomenClatureRelationalNonLocalizedAttribute =
                            $this->getFilteredAttribute('relational', '', false);

                            # Products attached objectbrick's localized multiselect localized field
                            $productMultiSelectFilteredOjbectbrickAttribute =
                            $this->getFilteredAttribute('objectbrick', 'MultiselectMaster');

                            # Products attached objectbrick's FittingFamily class localized field
                            $productFittingFamilyFilteredOjbectbrickAttribute =
                            $this->getFilteredAttribute('objectbrick', 'FittingFamily');

                            # Products attached objectbrick's FittingEndFamilyType class localized field
                            $productFittingEndFamilyTypeFilteredOjbectbrickAttribute =
                            $this->getFilteredAttribute('objectbrick', 'FittingEndFamilyType');

                            $fittingAttributeList = array_merge($productFittingFamilyFilteredOjbectbrickAttribute,
                             $productFittingEndFamilyTypeFilteredOjbectbrickAttribute);
                            
                            
                            $areHeadersAlreadyAdded = false;
                            $b2bProductsChucks = array_chunk($b2bProducts,1000);
                            $filePath1 = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."SFPIM_PRODUCT_TRANSLATION_INSERT".
                            date('M')."_".date('d')."_".date('Y').".csv";
                            $file1 = fopen($filePath1,"w+");

                            foreach ($b2bProductsChucks as $batchNum => $productIds)
                            {
                                echo "Processing Batch - ".($batchNum+1). ", It holds ".count($productIds).
                                " products ".PHP_EOL;
                                
                                if($this->headerMapping)
                                {
                                    # Product's non localized field
                                    $productNonLocalisedSelectFilteredAttributeField =
                                    array_keys($productNonLocalisedSelectFilteredAttribute);
                                    $result0 = $this->getRecordsWithFilteredMasterFields(
                                        $productNonLocalisedSelectFilteredAttributeField, $productIds);
                                    if(isset($result0[0]['brandName']))
                                    {
                                        foreach ($result0 as $key => $value) {
                                            $brandId = $value['brandName'];
                                            if($brandId)
                                            {
                                                $result0[$key]['brandName'] = $brandMastersList[$brandId];
                                            }
                                        }
                                    }
                                    
                                    # Product's localized field data
                                    $localizeData1 = [];
                                    $productFilteredAttributeField = array_keys($productFilteredAttribute);
                                    $result1 = $this->getRecordsWithFilteredFields($productFilteredAttributeField,
                                     $productIds);
                                    foreach ($result1 as $key => $fields) {
                                        foreach ($fields as $fkey => $field) {
                                            if(!in_array($fkey, ['oo_id','language']))
                                            {

                                                if($fkey == 'FeaturesBenefitsBulletPoint')
                                                {
                                                    $featureStringList = [];
                                                    if($field)
                                                    {
                                                        $featureFields = explode(',', $field);
                                                        
                                                        foreach ($featureFields as $key => $featureId) {
                                                            if(isset($featuresMastersGroupList[$featureId]))
                                                            {
                                                                $featureStringList[] =
                                                                $featuresMastersGroupList[$featureId]
                                                                [$fields['language']];
                                                            }
                                                        }
                                                    }

                                                    $localizeData1[$fields['oo_id']][$fkey][$fields['language']] = (
                                                        $featureStringList) ? implode("|", $featureStringList) : '';
                                                }
                                                elseif($fkey == 'productShortDescription' && $field == ''){
                                                    $productShortDescription_en =
                                                    $this->getProductShortDescriptionValueInEnglish($result1,
                                                     $fields['oo_id']);
                                                    $localizeData1[$fields['oo_id']][$fkey][$fields['language']] =
                                                     $productShortDescription_en;
                                                }
                                                else{
                                                    $localizeData1[$fields['oo_id']][$fkey][$fields['language']] =
                                                     $field;
                                                }
                                                
                                            }
                                        }
                                    }
                                    
                                    # Product's localized multiselect localized field data
                                    $localizeData2 = [];
                                    $objectBricksLocalisedFields = [];
                                    foreach ($productMultiSelectFilteredAttribute as $key => $columm) {
                                        $fkey = $columm['fieldName'];
                                        $objectBricksLocalisedFields[] = "TRIM(BOTH ',' FROM $fkey) AS $key";
                                    }
                                    if($objectBricksLocalisedFields)
                                    {
                                        $result2 = $this->getRecordsWithFilteredMasterFields(
                                            $objectBricksLocalisedFields, $productIds);
                                        
                                        if($result2)
                                        {
                                            foreach ($result2 as $key => $fields) {
                                                foreach ($fields as $fkey => $field) {
                                                    $masterType = isset($productMultiSelectFilteredAttribute[$fkey]
                                                    ['masterType']) ? $productMultiSelectFilteredAttribute[$fkey][
                                                        'masterType'] : null;
                                                    if(isset($multiSelectMastersGroupList[$masterType][$field]))
                                                    {
                                                        $master = $multiSelectMastersGroupList[$masterType][$field];
                                                        foreach ($master as $mkey => $value) {
                                                            $localizeData2[$fields['oo_id']][$fkey][$mkey] = $value;
                                                        }
                                                    }
                                                }
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
                                    
                                    if($objectBricksNonLocalisedFields)
                                    {
                                        $resultNonLocalized = $this->getRecordsWithFilteredObjectbrickMasterFields(
                                            $objectBricksNonLocalisedFields, $productIds);
                                        if($resultNonLocalized)
                                        {

                                            foreach ($result0 as $key1 => $value1) {
                                                $dataFound = [];
                                                foreach ($resultNonLocalized as $value2) {
                                                    if($value1['oo_id'] == $value2['o_id'])
                                                    {
                                                        $dataFound = array_merge($dataFound,$value2);
                                                    }
                                                }

                                                if($dataFound)
                                                {
                                                    unset($dataFound['o_id']);
                                                    $result0[$key1] = array_merge($value1,$dataFound);
                                                }
                                                else{
                                                    $result0[$key1] = array_merge($value1,$localizeDataNonLocalized);
                                                }
                                            }
                                        }
                                        else
                                        {
                                            foreach ($result0 as $key => $value) {
                                                $result0[$key] = array_merge($value,$localizeDataNonLocalized);
                                            }
                                        }
                                    }
                                    
                                    if($productNomenClatureRelationalNonLocalizedAttribute)
                                    {
                                        $localizeDataNonLocalized = [];
                                        $objectBricksNonLocalisedFields = [];
                                        foreach ($productNomenClatureRelationalNonLocalizedAttribute as $key
                                         => $columm) {
                                            $localizeDataNonLocalized[$key] = '';
                                        }
                                        
                                        $objectBricksNonLocalisedFields[$columm['objectBrickClassName']][] =
                                        "TRIM(BOTH ',' FROM nomenclatureDetails) AS nomenclatureDetails";
                                        $nomenClature = $this->getRecordsWithFilteredObjectbrickMasterFields(
                                            $objectBricksNonLocalisedFields, $productIds);

                                        if($nomenClature)
                                        {
                                            foreach ($result0 as $key1 => $value1) {

                                                $dataFound = [];
                                                foreach ($nomenClature as $value2)
                                                {
                                                    if($value1['oo_id'] == $value2['o_id'])
                                                    {
                                                        $dataFound = $value2;
                                                        break;
                                                    }
                                                }
                                                if($dataFound)
                                                {
                                                    if(isset($nomenClatureList[$dataFound['nomenclatureDetails']]))
                                                    {
                                                        $nomenClatureValues = $nomenClatureList[$dataFound[
                                                            'nomenclatureDetails']];

                                                        foreach ($nomenClatureValues as $key => $value) {
                                                            if(!isset($localizeDataNonLocalized[$key]))
                                                            {
                                                                unset($nomenClatureValues[$key]);
                                                            }
                                                        }

                                                        if(isset($nomenClatureValues['Thread']))
                                                        {
                                                            $threadId = $nomenClatureValues['Thread'];
                                                            $nomenClatureValues['Thread']=$threadMastersList[$threadId];
                                                        }

                                                        if(isset($nomenClatureValues['FittingFamily']))
                                                        {
                                                            $fittingFamilyId = $nomenClatureValues['FittingFamily'];
                                                            $nomenClatureValues['FittingFamily'] =
                                                            $fittingFamilyMastersList[$fittingFamilyId];
                                                        }

                                                        unset($nomenClatureValues['oo_id']);
                                                        $result0[$key1] = array_merge($value1,$nomenClatureValues);
                                                    }
                                                    else{
                                                        $result0[$key1]= array_merge($value1,$localizeDataNonLocalized);
                                                    }
                                                }
                                                else{
                                                    $result0[$key1] = array_merge($value1,$localizeDataNonLocalized);
                                                }
                                            }
                                        }
                                        else{
                                            foreach ($result0 as $key => $value) {
                                                $result0[$key] = array_merge($value,$localizeDataNonLocalized);
                                            }
                                        }
                                    }

                                    # Products attached objectbrick's localized multiselect localized field
                                    $localizeData3 = [];
                                    $objectBricksLocalisedFields = [];
                                    foreach ($productMultiSelectFilteredOjbectbrickAttribute as $key => $columm) {
                                        $fkey = $columm['fieldName'];
                                        $objectBricksLocalisedFields[$columm['objectBrickClassName']][] =
                                        "TRIM(BOTH ',' FROM $fkey) AS $key";
                                    }

                                    if($objectBricksLocalisedFields)
                                    {
                                        $result3 = $this->getRecordsWithFilteredObjectbrickMasterFields(
                                            $objectBricksLocalisedFields, $productIds);

                                        if($result3)
                                        {
                                            foreach ($result3 as $key => $fields) {
                                                foreach ($fields as $fkey => $field) {
                                                    $masterType = isset(
                                                    $productMultiSelectFilteredOjbectbrickAttribute[$fkey][
                                                    'masterType']) ?
                                                    $productMultiSelectFilteredOjbectbrickAttribute[$fkey]['masterType']
                                                        : null;
                                                    if(isset($multiSelectMastersGroupList[$masterType][$field]))
                                                    {
                                                        $master = $multiSelectMastersGroupList[$masterType][$field];
                                                        foreach ($master as $mkey => $value) {
                                                            $localizeData3[$fields['o_id']][$fkey][$mkey] = $value;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    
                                    # Products attached objectbrick's FittingFamily and FittingEndFamilyType
                                    # class localized field
                                    $localizeData4 = [];
                                    $objectBricksLocalisedFittingFields = [];
                                    foreach ($fittingAttributeList as $key => $columm) {
                                        $fkey = $columm['fieldName'];
                                        $objectBricksLocalisedFittingFields[$columm['objectBrickClassName']][]
                                         = "TRIM(BOTH ',' FROM $fkey) AS $key";
                                    }

                                    if($objectBricksLocalisedFittingFields)
                                    {
                                        $result4 = $this->getRecordsWithFilteredObjectbrickMasterFields(
                                            $objectBricksLocalisedFittingFields, $productIds);

                                        if($result4)
                                        {
                                            foreach ($result4 as $key => $fields)
                                            {
                                                foreach ($fields as $fkey => $field)
                                                {
                                                    if(isset($fitingFamilyMastersGroupList[$field]))
                                                    {
                                                        $master = $fitingFamilyMastersGroupList[$field];
                                                        foreach ($master as $mkey => $value) {
                                                            $localizeData4[$fields['o_id']][$fkey][$mkey] = $value;
                                                        }
                                                    }

                                                    if(isset($fittingEndFamilyTypeGroupList[$field]))
                                                    {
                                                        $master = $fittingEndFamilyTypeGroupList[$field];
                                                        foreach ($master as $mkey => $value) {
                                                            $localizeData4[$fields['o_id']][$fkey][$mkey] = $value;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    $finalPritingList = [];
                                    if($localizeData1 || $localizeData2 || $localizeData3 || $localizeData4)
                                    {
                                        $header_Keys = array_keys($this->headerMapping);
                                        foreach($this->languages as $lang => $language)
                                        {
                                            foreach ($productIds as $key => $id) {

                                                $rawData = [];
                                                foreach ($result0 as $rvalue) {
                                                    if($id == $rvalue['oo_id'])
                                                    {
                                                        unset($rvalue['oo_id']);
                                                        if (array_key_exists($language,$languageNameDisplayArray)){
                                                            $rvalue['language'] = $languageNameDisplayArray[$language];
                                                        }else{
                                                            $rvalue['language'] = $language;
                                                        }
                                                        $rawData = $rvalue;
                                                    }
                                                }
                                                $common_header_list1 = array_intersect($header_Keys,
                                                $productFilteredAttributeField);
                                                if($localizeData1)
                                                {
                                                    foreach ($common_header_list1 as $key => $field) {
                                                        if(isset($localizeData1[$id][$field][$language]))
                                                        {
                                                            $rawData[$field] = $localizeData1[$id][$field][$language];
                                                        }
                                                        else{
                                                            if($field == 'productShortDescription'){
                                                                $rawData[$field] = $localizeData1[$id][$field]['en'];
                                                            }else{
                                                                $rawData[$field] = '';
                                                            }
                                                        }
                                                    }
                                                }
                                                else{
                                                    foreach ($common_header_list1 as $key => $field) {
                                                        $rawData[$field] = '';
                                                    }
                                                }

                                                $localizeData2Keys = array_keys($productMultiSelectFilteredAttribute);
                                                $common_header_list2 = array_intersect($header_Keys,
                                                $localizeData2Keys);
                                                if($localizeData2)
                                                {
                                                    foreach ($common_header_list2 as $key => $field) {
                                                        if(isset($localizeData2[$id][$field][$language]))
                                                        {
                                                            $rawData[$field] = $localizeData2[$id][$field][$language];
                                                        }
                                                        else{
                                                            $rawData[$field] = '';
                                                        }
                                                    }
                                                }
                                                else{
                                                    foreach ($common_header_list2 as $key => $field) {
                                                        $rawData[$field] = '';
                                                    }
                                                }

                                                $localizeData3Keys =
                                                array_keys($productMultiSelectFilteredOjbectbrickAttribute);
                                                $common_header_list3 = array_intersect($header_Keys,
                                                 $localizeData3Keys);
                                                if($localizeData3)
                                                {
                                                    
                                                    foreach ($common_header_list3 as $key => $field) {
                                                        if(isset($localizeData3[$id][$field][$language]))
                                                        {
                                                            $rawData[$field] = $localizeData3[$id][$field][$language];
                                                        }
                                                        else{
                                                            $rawData[$field] = '';
                                                        }
                                                    }
                                                }
                                                else{
                                                    foreach ($common_header_list3 as $key => $field) {
                                                        $rawData[$field] = '';
                                                    }
                                                }

                                                $localizeData4Keys = array_keys($fittingAttributeList);
                                                $common_header_list4 = array_intersect($header_Keys,
                                                 $localizeData4Keys);
                                                if($localizeData4)
                                                {
                                                    foreach ($common_header_list4 as $key => $field) {
                                                        if(isset($localizeData4[$id][$field][$language]))
                                                        {
                                                            $rawData[$field] = $localizeData4[$id][$field][$language];
                                                        }
                                                        else{
                                                            $rawData[$field] = '';
                                                        }
                                                    }
                                                }
                                                else{
                                                    foreach ($common_header_list4 as $key => $field) {
                                                        $rawData[$field] = '';
                                                    }
                                                }

                                                $finalPritingList[] = $rawData;
                                            }
                                        }
                                    }
                                    else{
                                        foreach ($result0 as $rvalue) {
                                            unset($rvalue['oo_id']);
                                            $finalPritingList[] = $rvalue;
                                        }
                                    }

                                    if($finalPritingList)
                                    {
                                        if(!$areHeadersAlreadyAdded)
                                        {
                                            $displayKeys = [];
                                            $staticHeaderMappingArr=['language'=>'Language','Product.B2B_External_Id__c'
                                            =>'Product.B2B_External_Id__c','catalog_id' =>'ContiTech_catalog'];
                                            $booleanFields=$this->getBooleanAttribute();
                                            foreach ($headerMapping as $headerIndex => $headerName) {
                                                $displayKeys[$headerIndex] = $headerName;
                                            }
                                            $displayKeys=array_merge($staticHeaderMappingArr,$displayKeys);

                                            fputcsv($file1, $displayKeys);
                                            $areHeadersAlreadyAdded = true;
                                        }
                                        foreach($finalPritingList as $key=>$record){
                                            foreach ($displayKeys as $keyHeader => $keyHeaderValue) {
                                                if(array_key_exists($keyHeader,$record)){
                                                    if(isset($record['language'])){
                                                        if (array_key_exists($record['language'],
                                                        $languageNameDisplayArray)){
                                                            $lang = $languageNameDisplayArray[$record['language']];
                                                        }else{
                                                            $lang = $record['language'];
                                                        }
                                                    }
                                                    $mapping_record[$keyHeaderValue] = strip_tags($record[$keyHeader]);
                                                    if(array_key_exists($keyHeader,$booleanFields)){
                                                        $booleanValue=$record[$keyHeader];
                                                        $fieldBooleanValue=$this->getBooleanValue($booleanValue);
                                                        $mapping_record[$keyHeaderValue] = $fieldBooleanValue;
                                                    }
                                                    if($keyHeader == 'externalID' && $record[$keyHeader]){
                                                        $mapping_record[$keyHeaderValue]= $record[$keyHeader].'-'.$lang;
                                                    }
                                                    if($keyHeader!='SalesForce_ID'){
                                                        unset($record[$keyHeader]);
                                                    }
                                                    
                                                }elseif($keyHeaderValue=='Language'){
                                                    $mapping_record[$keyHeaderValue]='';
                                                }
                                                elseif($keyHeaderValue == 'Product.B2B_External_Id__c'){
                                                    $mapping_record[$keyHeaderValue] = $record['externalID'];
                                                }
                                                elseif($keyHeaderValue == 'catalog_id'){
                                                    $mapping_record[$keyHeaderValue] = 'ContiTech_catalog';
                                                }
                                            }
                                            $record=array_merge($mapping_record,$record);
                                            // if($record['SalesForce_ID'])
                                            // {
                                            //     unset($record['SalesForce_ID']);
                                            //     fputcsv($file2, $record);
                                            // }
                                            // else{
                                                unset($record['SalesForce_ID']);
                                                fputcsv($file1, $record);
                                            // }
                                        }
                                    }
                                }
                            }
                            fclose($file1);

                            echo $message = "{$this->bu}: B2B product data csv file created";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::INFO());
                        }
                        else{
                            echo $message = "{$this->bu}: B2B product data not found to export";
                            echo PHP_EOL;
                            $this->helper->logMessage($message, LogLevel::ERROR());
                        }
                    }
                    else{
                        echo $message = "{$this->bu}: B2B salesforce attribute not mapped to any of the
                         PIM product attribute";
                        echo PHP_EOL;
                        $this->helper->logMessage($message, LogLevel::ERROR());
                    }
                }
                else{
                    echo $message = "{$this->bu}: B2B product salesforce mapping not found";
                    echo PHP_EOL;
                    $this->helper->logMessage($message, LogLevel::ERROR());
                }
            }
            else{
                echo $message = "{$this->bu}: B2B Product config not found";
                echo PHP_EOL;
                $this->helper->logMessage($message, LogLevel::ERROR());
            }
            
        } catch(\Throwable $e) {
            $message = $e->getMessage();
            $message = "Exception while trying to export the data"." ".$message;
            $this->logMessage($message, LogLevel::CRITICAL());
            return;
        }
           
    }
    
    public function getProductShortDescriptionValueInEnglish($fields, $id){

        foreach($fields as $eachField){
            if($eachField['language'] == 'en' && $eachField['productShortDescription'] && $eachField['oo_id'] == $id){
                return $eachField['productShortDescription'];
            }
        }

    }

    public function uploadFile()
    {
        $customFileName2 = "SFPIM_PRODUCT_TRANSLATION_INSERT.csv";
        $this->helper->uploadFile($customFileName2);
    }

    public function getFittingFamilyMasterList()
    {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $sqlMapping = "select oo_id, oo_className, language, Description from object_query_30  oq_30
                    left join object_localized_data_30 old_30 ON oq_30.oo_id = old_30.ooo_id AND
                    old_30.language IN ($languages)";
        return $this->db->fetchAllAssociative($sqlMapping);
    }

    public function getFittingEndFamilyTypeMasterList()
    {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $sqlMapping = "select oo_id, oo_className, language, Description from object_query_31  oq_31
                    left join object_localized_data_31 old_31 ON oq_31.oo_id = old_31.ooo_id AND
                     old_31.language IN ($languages)";
        return $this->db->fetchAllAssociative($sqlMapping);
    }

    public function getMultiSelectMasterList()
    {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $sqlMapping = "select oo_id, masterType, language, name from object_query_22  oq_22
                    left join object_localized_data_22 old_22 ON oq_22.oo_id = old_22.ooo_id AND
                     old_22.language IN ($languages)";
        return $this->db->fetchAllAssociative($sqlMapping);
    }

    public function getFeaturesMasterList()
    {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $sqlMapping = "select oo_id, language, name from object_query_29  oq_29
                    left join object_localized_data_29 old_29 ON oq_29.oo_id = old_29.ooo_id AND
                     old_29.language IN ($languages)";
        return $this->db->fetchAllAssociative($sqlMapping);
    }

    public function getNomenClatureList()
    {
        $sqlMapping = "select oo_id, TRIM(BOTH ',' FROM Thread) AS Thread, swivel, elbowType,
         gender1,  TRIM(BOTH ',' FROM FittingFamily) AS FittingFamily from object_query_20";
        return $this->db->fetchAllAssociative($sqlMapping);
    }

    public function getThreadList()
    {
        $sqlMapping = "select oo_id, Name from object_query_32";
        return $this->db->fetchPairs($sqlMapping);
    }

    public function getFittingFamilyList()
    {
        $sqlMapping = "select oo_id, Name from object_query_30";
        return $this->db->fetchPairs($sqlMapping);
    }

    public function getBrandMasterList()
    {
        $sqlMapping = "select oo_id, name from object_query_3";
        return $this->db->fetchPairs($sqlMapping);
    }

    public function getLocalizedAttribute($className)
    {
        $businessUnitFileName = '';

        if($this->bu == 'IFS_PTG_US')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_PTG_US_FILE_NAME;
        }
        elseif($this->bu == 'CS')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_CS_US_FILE_NAME;
        }
        elseif($this->bu == 'PTG_EU')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_PTG_EU_FILE_NAME;
        }
        elseif($this->bu == 'IFS_EMEA')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_EU_FILE_NAME;
        }

        $b2bTranslationConfig = $this->container->get('b2b_translation.config_provider_service')
        ->getBusinessUnitTranslationConfig($businessUnitFileName);

        return $this->common->getParameter($b2bTranslationConfig, $className);
    }

    public function getFilteredAttribute($fieldLocation, $className, $isLocalized=true)
    {
        $filteredAttribute = [];
        if($this->productAttributeConfig)
        {
            foreach ($this->productAttributeConfig as $key => $attributeConfig) {
                if($attributeConfig['fieldLocation'] == $fieldLocation && $attributeConfig['className'] == $className
                 && $attributeConfig['isLocalized'] == $isLocalized
                 && isset($this->headerMapping[$key]))
                {
                    $filteredAttribute[$key] = $attributeConfig;
                }
            }
        }
        return $filteredAttribute;
    }

    public function getRecordsWithFilteredFields($columnsList, $b2bProducts)
    {
        $selectedFields = [];
        $selectedFields[] = 'oo_id';
        $sqlArray = [];

        foreach ($columnsList as $columm) {
            $selectedFields[] = "$columm";
        }

        $columnsString = implode(',', $selectedFields);
        $ids = implode(',', $b2bProducts);
        foreach($this->languages as $eachLanguage){
            $tableName = 'object_localized_1_'.$eachLanguage;
            $sql = "select {$columnsString} from $tableName where oo_id IN ($ids)";
            $sqlData = $this->db->fetchAllAssociative($sql);
            foreach($sqlData as $eachSqlData){
                $eachSqlData['language'] = $eachLanguage;
                $sqlArray[] = $eachSqlData;
            }
        }
        return $sqlArray;
    }

    public function getRecordsWithFilteredMasterFields($fields, $b2bProducts)
    {
        $config = $this->bUProductClassTableID[$this->bu];
        $productClassId = $config['productClassId'];

        $columnsString = 'oo_id';

        if($fields)
        {
            $columnsString .= ",". implode(',', $fields);
        }
        
        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_query_{$productClassId} where oo_id IN ($ids)";
        return $this->db->fetchAllAssociative($sql);
    }

    public function getRecordsWithFilteredObjectbrickMasterFields($multiObjectbrickColumnsList, $b2bProducts)
    {
        
        $allObjectBrickData = [];
        $config = $this->bUProductClassTableID[$this->bu];
        $productClassId = $config['productClassId'];
        foreach ($multiObjectbrickColumnsList as $brickName => $fields) {
            $brickAttributeCommaSeparatedName = '';
            $brickAttributeNameArray =[];
            $brickAttributesWithNullValueArray =[];

            foreach($fields as $eachBrickAttributeName){
                $brickAttributeName = substr($eachBrickAttributeName, strpos($eachBrickAttributeName, "AS ") + 3);
                $brickAttributeCommaSeparatedName = $brickAttributeCommaSeparatedName.$brickAttributeName. ',';
            }
            $columnsString = implode(',', $fields);
            $ids = implode(',', $b2bProducts);

            $brickAttributeNameArray = explode(',', rtrim($brickAttributeCommaSeparatedName, ','));
            $idsArray = explode(',',$ids);
            foreach($idsArray as $keys => $eachid){
                foreach($brickAttributeNameArray as $eachBrickAttributeName1){
                    $brickAttributesWithNullValueArray[$keys]['o_id'] = $eachid;
                    $brickAttributesWithNullValueArray[$keys][$eachBrickAttributeName1] = null;
                }
            }
            $sql = "select o_id, {$columnsString} from object_brick_query_{$brickName}
            _{$productClassId} where o_id IN ($ids)";
            $resultSet = $this->db->fetchAllAssociative($sql);

            if(!$resultSet){
                $allObjectBrickData = array_merge($allObjectBrickData, $brickAttributesWithNullValueArray);
            }else{
                
                $resultSet_oid_Array = [];
                $resultSetDataArray = [];

                foreach($resultSet as $eachResultSet){
                    $resultSet_oid_Array[] = $eachResultSet['o_id'];
                    $resultSetDataArray[] = $eachResultSet;
                }

                foreach($brickAttributesWithNullValueArray as $eachProductArraySet){
                    if(!in_array($eachProductArraySet['o_id'],$resultSet_oid_Array)){
                        $resultSetDataArray[] = $eachProductArraySet;
                    }
                }

                $allObjectBrickData = array_merge($allObjectBrickData, $resultSetDataArray);
            }
        }
        return $allObjectBrickData;
    }

    public function getAllB2BProduct()
    {

        $sql = "SELECT o_id FROM salesforce_integration_b2b_product_master";
        return $this->db->fetchFirstColumn($sql);
    }
    
    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(PRODUCT_LOCALIZATION_EXPORT_LOG_FILE, $msg, $logLevel);
    }
    public function getBooleanValue($data)
    {
        $value='';
        if($value!=''){
            dd($data);
        }
        switch ($data) {
            case 'Y' || 1:
                return 'Yes';
            case 'N' || -1:
                return 'No';
            default:
                return '';
        }
    }
     public function getBooleanAttribute()
    {
        $b2bAttributeBooleanConfig = $this->container->get('b2b_translation.config_provider_service')
        ->getBooleanConfigFile();

        return  $this->common->getBooleanParameter($b2bAttributeBooleanConfig);
    }
}
