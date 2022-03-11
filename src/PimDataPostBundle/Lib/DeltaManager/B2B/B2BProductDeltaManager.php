<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B;

use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerHelper;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\DeltaManager\B2B\Dao\B2BProductDeltaManagerDao;

class B2BProductDeltaManager extends AbstractB2BDeltaManager
{
    private $tempMasterTablesMeta;
    
    private $helper;
        
    private $b2bProductDeltaManagerDao;

    private $attributeConfigProvider;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->helper = new DeltaManagerHelper($this->tempMasterTablesMeta);
        $this->b2bProductDeltaManagerDao = new B2BProductDeltaManagerDao($this->tempMasterTablesMeta);
        $this->attributeConfigProvider = new B2BProductAttributeConfigProvider();
    }
    
    public function getRecordsToCreate(): array
    {
        return $this->helper->getRecordsPresentInTempNotInMaster();
    }
    
    public function getRecordsToUpdate(): array
    {
        $setA = $this->getHashChangedRecords();
        $others = $this->getOtherRecordsToUpdate();
        return array_unique(array_merge($setA, $others));
    }
    
    public function getHashChangedRecords(): array
    {
        return $this->helper->getHashChangedRecords();
    }
    
    private function getOtherRecordsToUpdate(): array
    {
        $setB = $this->getProductIdsForUpdatedTranslationMasters();
        $setCa = $this->getProductIdsForUpdatedMasterTableAttribute("FittingFamily");
        $setCb = $this->getProductIdsForUpdatedMasterTableAttribute("Thread");
        $setCc = $this->getProductIdsForUpdatedMasterTableAttribute("nomenclatureDetails");

        return array_merge($setB, $setCa, $setCb, $setCc);
    }
    
    public function removeHashNotChangedRecordsFromTempTable(): bool
    {
        return $this->helper->removeHashNotChangedRecordsFromTempTable();
    }

    private function getProductIdsForUpdatedTranslationMasters()
    {
        $productIds = [];
        $translationMasterAttributes = $this->attributeConfigProvider->getTranslationMasterConfig();
        foreach($translationMasterAttributes as $configAttrKey => $configAttrValue){
            if( array_key_exists("tableAttr", $configAttrValue) && $configAttrValue["tableAttr"] === true){
                $productIds[] = array_merge($productIds, 
                                                $this->getProductIdsForMasters(
                                                                            $configAttrValue["masterClass"], 
                                                                            $configAttrKey, 
                                                                            $configAttrValue["pim_attribute_type"]));
            }
        }
        return $productIds;
    }

    private function getProductIdsForUpdatedMasterTableAttribute(string $masterTableColumnName): array
    {
        $completeAttributeConfig = $this->attributeConfigProvider->getCompleteAttributeConfig();
        $fittingFamilyAttributeConfig = $completeAttributeConfig[$masterTableColumnName];
        return $this->getProductIdsForMasters($fittingFamilyAttributeConfig["masterClass"], 
                                                $masterTableColumnName, 
                                                $fittingFamilyAttributeConfig["pim_attribute_type"]);
    }

    private function getProductIdsForMasters(string $masterClassName, 
                                                            string $productAttributeNameInMasterTable, 
                                                            string $pimAttributeType):array
    {
        $updatedMasterIds =  $this->b2bProductDeltaManagerDao->getUpdatedMasterIds($masterClassName);
        return $this->b2bProductDeltaManagerDao->getProductIdsForUpdatedMasterIds($updatedMasterIds, 
                                                                                    $productAttributeNameInMasterTable, 
                                                                                    $pimAttributeType,
                                                                                    $this->tempMasterTablesMeta->getMasterTableName());
    }
}

