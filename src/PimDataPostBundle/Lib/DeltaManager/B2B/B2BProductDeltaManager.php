<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerHelper;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\DeltaManager\B2B\Dao\B2BProductDeltaManagerDao;

class B2BProductDeltaManager extends AbstractB2BDeltaManager
{
    private $tempMasterTablesMeta;
    
    private $helper;
        
    private $b2bProductDeltaManagerDao;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->helper = new DeltaManagerHelper($tempMasterTablesMeta);
        $this->b2bProductDeltaManagerDao = new B2BProductDeltaManagerDao($tempMasterTablesMeta);
    }
    
    public function getRecordsToCreate(): array
    {
        return $this->helper->getRecordsPresentInTempNotInMaster();
        
    }
    
    public function getRecordsToUpdate(): array
    {
        // X = getHashChangedRecords
        // register changed relations
        // Y = getOtherRecordsToUpdate
        // return X + Y
    }
    
    public function getHashChangedRecords(): array
    {
        return $this->helper->getHashChangedRecords();
    }
    
    private function getOtherRecordsToUpdate(): array
    {
        // prepare set B
        // prepare set C
        return [];
    }
    
    public function removeHashNotChangedRecordsFromTempTable(): bool
    {
        return $this->helper->removeHashNotChangedRecordsFromTempTable();
    }
}

