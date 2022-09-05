<?php

namespace PTGEU\ImportBundle\Services;

use Pimcore\Model\DataObject;
use PTGEU\ImportBundle\Services\ImportService;
use PTGEU\ImportBundle\Model\EditablesModel;

class EditablesService 
{
      
    private $filePath;

    public function __construct() 
    { 
        $this->editablesModel  = new EditablesModel;     
    }
    public function import()
    {
        $sapFileFeeder  = \Pimcore::getContainer()->get('import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('editables');
        $this->configProviderService    = \Pimcore::getContainer()->get('import.config_provider_service');
        $this->editablesImportConfig  = $this->configProviderService->getEditableProductAttributesImportConfig();
        $csvInfo        = ImportService::getCSVData($this->filePath);
        $this->csvHeader= $csvInfo['header'];
        $csvData        = $csvInfo['data'];

        $this->processEditablesData($csvData);

    }
 
    public function processEditablesData($csvData) {
        
        foreach ($csvData as $eachRowRecord) {
            $record = array_combine($this->csvHeader, $eachRowRecord);
            $this->processSingleRecord($record);
        }
    }

    public function processSingleRecord($record){
        $productsData = $this->editablesModel->getAllProducts();
        $queryTableData = $productsData['queryTableData'];
        foreach ($queryTableData as $rec) {
            if($rec['articleNumber'] == $record['SAP Code / Material Number']){
                list($baseData, $baseObjectId) = $this->prepareBaseDataArray($rec['articleNumber'], $record);
                $fertData = $this->prepareFertDataArray($rec['oo_id'], $record);
                $this->insertDataInDB($fertData, $rec['oo_id'], $baseData, $baseObjectId);
            }
        }
        unset($queryTableData);
        unset($productsData);
    }

    public function prepareFertDataArray($objId, $record){
        $printedCatalogFlag             = (strtoupper(trim($record['Printed Catalog Flag'])) == 'Y') ? 1 : -1;
        $virtualCatalogFlag             = (strtoupper(trim($record['Virtual Catalog Flag'])) == 'Y') ? 1 : -1;
        $cadFile                        = (strtoupper(trim($record['CAD File'])) == 'Y') ? 1 : -1;
        $pdfDrawing                     = (strtoupper(trim($record['PDF Drawing'])) == 'Y') ? 1 : -1;
        $searchKeywords                 = $this->getSelectTypeValue($record['Search Keywords'], 'searchKeywords', $objId);
        $vtlStatus                      = $this->getSelectTypeValue($record['VTL Status'], 'searchKeywords', $objId);
        $webDiscription                 = $record['Web Description'];
        $catalogFlag                    = $record['Catalog Flag'];
        $reach                          = $record['Reach'];
        $rohs                           = $record['Rohs'];
        $shelfLife                      = $record['Shelf Life'];   
        $legalText                      = $record['Legal Text (Term & Conditions)'];
        $specificationConstruction      = $record['Specification Construction'];
        $cadLINK                        = $record['CAD LINK'];
        $CategoryDescriptionCatalog     = $record['Category Description Catalog'];
        $pdfLINK                        = $record['PDF LINK'];

        $fertLevelData = [
            'printedCatalogFlag' => $printedCatalogFlag,
            'virtualCatalogFlag' => $virtualCatalogFlag,
            'reach' => $reach,
            'rohs' => $rohs,
            'shelfLife' => $shelfLife,
            'specificationConstruction' => $specificationConstruction,
            'cadLINK' => $cadLINK,
            'cadFile' => $cadFile,
            'pdfDrawing' => $pdfDrawing,
            'searchKeywords' => $searchKeywords,
            'CategoryDescriptionCatalog' => $CategoryDescriptionCatalog,
            'vtlStatus' => $vtlStatus,
            'pdfLINK' => $pdfLINK,
            'catalogFlag' => $catalogFlag
        ];

        $fertData['fertLevelData'] = $fertLevelData;

        $fertLevelLocalizedfieldArray = [
            'webDiscription' => $webDiscription,
            'legalText' => $legalText
        ];

        $fertData['fertLevelLocalizedfieldArray'] = $fertLevelLocalizedfieldArray;

        return $fertData;
        
    }

    public function prepareBaseDataArray($articleNumber, $record){
        $longDescription                = $record['Marketing / Long Description'];
        $shortDescription               = $record['Marketing / Short Description'];
        $FeaturesBenefitsBulletPoint    = $this->getFeatureBenefits($record);

        $baseLevelData = [
            'FeaturesBenefitsBulletPoint' => $FeaturesBenefitsBulletPoint
        ];

        $baseData['baseLevelData'] = $baseLevelData;

        $baseLevelLocalizedfieldArray = [
            'longDescription' => $longDescription,
            'shortDescription' => $shortDescription
        ];

        $baseData['baseLevelLocalizedfieldArray'] = $baseLevelLocalizedfieldArray;

        $product = DataObject\PTGEUProduct::getByArticleNumber($articleNumber, true);
        if($product){
            $baseObjectId = $product->getParent()->getParent()->getId();
        }

        return [$baseData,$baseObjectId];

    }

    private function getFeatureBenefits($record){

        foreach($this->editablesImportConfig as $fieldCsvKey => $fields){
            if($fields['fieldName'] == 'FeaturesBenefitsBulletPoint'){
                $this->featurePoints[] = $record[$fieldCsvKey];
            }
        }
        $featureValueArr = [];
        $featuresBenefitsBulletPoint = array_filter($this->featurePoints);
        if(!empty($featuresBenefitsBulletPoint)) 
        {           
            foreach($featuresBenefitsBulletPoint as $feature)
            {
                $objFeatures = new DataObject\PTGEUFeaturesAndBenefits\Listing();
                $objFeatures->setCondition("FeaturesAndBenefits = ?", $feature);
                if(!empty($objFeatures)) 
                {
                    foreach ($objFeatures as $featureData) {
                        $featureValueArr[] = $featureData->getId();
                    }
                }
            }
        }
        $featureBenefitValueArr = array_map('trim', $featureValueArr);
        $featureBenefits  = implode(',', $featureBenefitValueArr);
        return $featureBenefits;
    }

    private function getSelectTypeValue($data, $fieldName, $objId){

        $baseObject = DataObject\PTGEUProduct::getById($objId, true);
        if($fieldName == 'searchKeywords'){
            $fd = $baseObject->getClass()->getFieldDefinition("searchKeywords");
            $options = $fd->getOptions();
            \Pimcore::collectGarbage();
            gc_collect_cycles();
            foreach($options as $eachOptions){
                if($eachOptions['value'] == $data){
                    return $data;
                }else{
                    return null;
                }
            }
        }
        else if($fieldName == 'vtlStatus'){
            $fd = $baseObject->getClass()->getFieldDefinition("vtlStatus");
            $options = $fd->getOptions();
            \Pimcore::collectGarbage();
            gc_collect_cycles();
            foreach($options as $eachOptions){
                if($eachOptions['value'] == $data){
                    return $data;
                }else{
                    return null;
                }
            }
        }

    }

    private function insertDataInDB($fertData, $objId, $baseData, $baseObjectId)
    {

        $this->editablesModel->insertDataForEditablesIntoTable($fertData['fertLevelData'], 'object_query_38', $objId);
        $this->editablesModel->insertDataForEditablesIntoTable($fertData['fertLevelData'], 'object_store_38', $objId);

        $this->editablesModel->insertDataForLocalizedEditablesIntoTable($fertData['fertLevelLocalizedfieldArray'], 'object_localized_query_38_en', $objId);
        $this->editablesModel->insertDataForLocalizedEditablesIntoTable($fertData['fertLevelLocalizedfieldArray'], 'object_localized_data_38', $objId);

        $this->editablesModel->insertDataForEditablesIntoTable($baseData['baseLevelData'], 'object_store_38', $baseObjectId);
        $this->editablesModel->insertDataForEditablesIntoTable($baseData['baseLevelData'], 'object_store_38', $baseObjectId);

        $this->editablesModel->insertDataForLocalizedEditablesIntoTable($baseData['baseLevelLocalizedfieldArray'], 'object_localized_query_38_en', $baseObjectId);
        $this->editablesModel->insertDataForLocalizedEditablesIntoTable($baseData['baseLevelLocalizedfieldArray'], 'object_localized_data_38', $baseObjectId);            
    }
}