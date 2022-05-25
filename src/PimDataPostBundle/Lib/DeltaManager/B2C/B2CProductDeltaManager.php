<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2C;

use PimDataPostBundle\AttributeConfigProvider\B2C\B2CProductAttributeConfigProvider;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\DeltaManager\B2C\Dao\B2CProductDeltaManagerDao;

class B2CProductDeltaManager extends AbstractB2CDeltaManager
{
    private $tempMasterTablesMeta;
    
    private $helper;
        
    private $b2cProductDeltaManagerDao;

    private $attributeConfigProvider;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->helper = new B2CProductDeltaManagerHelper($this->tempMasterTablesMeta);
        $this->b2cProductDeltaManagerDao = new B2CProductDeltaManagerDao($this->tempMasterTablesMeta);
        $this->attributeConfigProvider = new B2CProductAttributeConfigProvider();
    }
    
    public function getRecordsToCreate(): array
    {
        return $this->b2cProductDeltaManagerDao->getRecordsPresentInTempNotInMaster();
            // find out the records which  are present in temp and not in master
        // filter these records and keep only those which are active
    }
    
    public function getRecordsToUpdate(): array
    {
        return $this->getHashChangedRecords();  
    }
    
    public function getHashChangedRecords(): array
    {
        return $this->b2cProductDeltaManagerDao->getHashChangedRecords();
    }
    
    public function getProductIdsForUpdatedMaster(): array
    {
        $setB = $this->getProductIdsForUpdatedTranslationMasters();
        $setA = $this->getProductIdsByAssetsUpdatedOrDeletedRecords();
        return array_unique(array_merge($setB, $setA));
    }
    
    public function removeHashNotChangedRecordsFromTempTable(): bool
    {
        return $this->b2cProductDeltaManagerDao->removeHashNotChangedRecordsFromTempTable();
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
        $updatedMasterIds =  $this->b2cProductDeltaManagerDao->getUpdatedMasterIds($masterClassName);
        return $this->b2cProductDeltaManagerDao->getProductIdsForUpdatedMasterIds($updatedMasterIds, 
                                                                                    $productAttributeNameInMasterTable, 
                                                                                    $pimAttributeType,
                                                                                    $this->tempMasterTablesMeta->getMasterTableName());
    }

    private function getProductIdsByAssetsUpdatedOrDeletedRecords(): array
    {
        return array_merge($this->helper->getProductIdsByAssetsUpdatedRecords(), 
                            $this->helper->getProductIdsByAssetsDeletedRecords() );
    }
}

