<?php

namespace PTGEU\ImportBundle\Services;

use Pimcore\Model\DataObject;
use PTGEU\ImportBundle\Services\ImportService;
use PTGEU\ImportBundle\Model\EditablesModel;

class EditablesService 
{
      
    private $filePath;
    private $baseArray = [];

    public function __construct() 
    { 
        $this->editablesModel  = new EditablesModel;     
    }
    public function import($filePath)
    {
        $this->filePath = $filePath;
        $this->configProviderService    = \Pimcore::getContainer()->get('import.config_provider_service');
        $this->editablesImportConfig  = $this->configProviderService->getEditableProductAttributesImportConfig();
        $csvInfo        = ImportService::getCSVData($this->filePath);
        $this->csvHeader= $csvInfo['header'];
        $csvData        = $csvInfo['data'];
        $this->processEditablesData($csvData);

    }

    public function processEditablesData($csvData) {
        $i = 2;
        $productsData = $this->editablesModel->getAllProducts();
        $queryTableData = $productsData['queryTableData'];
        foreach ($csvData as $eachRowRecord) {
            $record = array_combine($this->csvHeader, $eachRowRecord);
            $this->processSingleRecord($record, $queryTableData, $i);
            $i++;
        }
        unset($queryTableData);
        unset($productsData);
    }

    public function processSingleRecord($record, $queryTableData, $i){
        foreach ($queryTableData as $rec) {
            if($rec['articleNumber'] == $record['SAP Code / Material Number']){
                list($baseData, $baseObjectId) = $this->prepareBaseDataArray($rec['articleNumber'], $record);
                $fertData = $this->prepareFertDataArray($record);        
                $this->insertDataInDB($fertData, $rec['oo_id'], $baseData, $baseObjectId);
            }
        }
    }

    public function prepareFertDataArray($record){
        $printedCatalogFlag             = (strtoupper(trim($record['Printed Catalog Flag'])) == 'Y') ? 1 : -1;
        $virtualCatalogFlag             = (strtoupper(trim($record['Virtual Catalog Flag'])) == 'Y') ? 1 : -1;
        $cadFile                        = (strtoupper(trim($record['CAD File'])) == 'Y') ? 1 : -1;
        $pdfDrawing                     = (strtoupper(trim($record['PDF Drawing'])) == 'Y') ? 1 : -1;
        $searchKeywords                 = $this->getSelectTypeValue($record['Search Keywords'], 'searchKeywords');
        // $vtlStatus                      = $this->getSelectTypeValue($record['VTL Status'], 'vtlStatus');
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
            // 'vtlStatus' => $vtlStatus,
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
                $featurePoints[] = $record[$fieldCsvKey];
            }
        }
        $featureValueArr = [];
        $featuresBenefitsBulletPoint = array_filter($featurePoints);
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
        unset($objFeatures);
        $featureBenefitValueArr = $featureValueArr;
        $featureBenefits  = implode(',', $featureBenefitValueArr);
        return $featureBenefits;
    }

    private function getSelectTypeValue($data, $fieldName){

        if($fieldName == 'searchKeywords'){
            $objSearchKeywords = new DataObject\PTGEUSearchKeywords\Listing();
            $objSearchKeywords->setCondition("SearchKeywords = ?", $data);
            if(!empty($objSearchKeywords))
            {
                foreach ($objSearchKeywords as $object) {
                    return $object->getId();
                }
            }
            return '';
        }
        else if($fieldName == 'vtlStatus'){
            $objVtl = new DataObject\PTGEUVTL\Listing();
            $objVtl->setCondition("description = ?", $data);
            if(!empty($objVtl))
            {
                foreach ($objVtl as $object) {
                    return $object->getId();
                }
            }
            return '';
        }

    }

    private function insertDataInDB($fertData, $objId, $baseData, $baseObjectId)
    {
        if(!in_array($baseObjectId, $this->baseArray)){

            $this->baseArray[] = $baseObjectId;

            $this->editablesModel->insertDataForEditablesIntoTable($baseData['baseLevelData'], 'object_query_38', $baseObjectId);
            $this->editablesModel->insertDataForEditablesIntoTable($baseData['baseLevelData'], 'object_store_38', $baseObjectId);

            $this->editablesModel->insertDataForLocalizedEditablesIntoTable($baseData['baseLevelLocalizedfieldArray'], 'object_localized_query_38_en', $baseObjectId);
            $this->editablesModel->insertDataForLocalizedEditablesIntoTable($baseData['baseLevelLocalizedfieldArray'], 'object_localized_data_38', $baseObjectId);            


        }
        $this->editablesModel->insertDataForEditablesIntoTable($fertData['fertLevelData'], 'object_query_38', $objId);
        $this->editablesModel->insertDataForEditablesIntoTable($fertData['fertLevelData'], 'object_store_38', $objId);

        $this->editablesModel->insertDataForLocalizedEditablesIntoTable($fertData['fertLevelLocalizedfieldArray'], 'object_localized_query_38_en', $objId);
        $this->editablesModel->insertDataForLocalizedEditablesIntoTable($fertData['fertLevelLocalizedfieldArray'], 'object_localized_data_38', $objId);

    }
}