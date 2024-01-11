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
        return $this->b2bProductDeltaManagerDao->getRecordsPresentInTempNotInMaster();
            // find out the records which  are present in temp and not in master
        // filter these records and keep only those which are active
    }
    
    public function getRecordsToUpdate(): array
    {
        return $this->getHashChangedRecords();
    }
    
    public function getHashChangedRecords(): array
    {
        return $this->b2bProductDeltaManagerDao->getHashChangedRecords();
    }
    
    public function getProductIdsForUpdatedMaster(): array
    {
        $setB = $this->getProductIdsForUpdatedTranslationMasters();
        return array_merge($setB);
    }
    
    public function removeHashNotChangedRecordsFromTempTable(): bool
    {
        return $this->b2bProductDeltaManagerDao->removeHashNotChangedRecordsFromTempTable();
    }

    private function getProductIdsForUpdatedTranslationMasters()
    {
        $productIds = [];
        $translationMasterAttributes = $this->attributeConfigProvider->getTranslationMasterConfig();
        foreach($translationMasterAttributes as $configAttrKey => $configAttrValue){
            if( array_key_exists("temp_master_table_attr", $configAttrValue) && $configAttrValue["temp_master_table_attr"] === true){
                $productIds = array_merge($productIds, 
                                                $this->getProductIdsForMasters(
                                                                            $configAttrValue["allowed_object_class_name"], 
                                                                            $configAttrKey, 
                                                                            $configAttrValue["pim_attribute_type"]));
            }
        }
        return $productIds;
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

