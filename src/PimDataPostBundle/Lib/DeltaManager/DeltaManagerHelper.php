<?php
namespace PimDataPostBundle\Lib\DeltaManager;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;

class DeltaManagerHelper
{
    private $tempMasterTablesMeta;
    
    private $deltaManagerDao;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->deltaManagerDao = new DeltaManagerDao($tempMasterTablesMeta);    
    }
    
    public function getTempMasterTablesMeta(): TempMasterTablesMeta
    {
        return $this->tempMasterTablesMeta;
    }
    
    public function getHashChangedRecords()
    {
        return $this->deltaManagerDao->getHashChangedRecords();
    }
    
    public function removeHashNotChangedRecordsFromTempTable()
    {
        return $this->deltaManagerDao->removeHashNotChangedRecordsFromTempTable();
    }
    
    public function getRecordsPresentInTempNotInMaster()
    {

        return $this->deltaManagerDao->getRecordsPresentInTempNotInMaster($this->tempMasterTablesMeta);

        // find out the records which  are present in temp and not in master
        // filter these records and keep only those which are active
        
    }
}

