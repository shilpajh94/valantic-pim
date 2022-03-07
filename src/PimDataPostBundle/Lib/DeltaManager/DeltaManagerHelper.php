<?php
namespace PimDataPostBundle\Lib\DeltaManager;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;

class DeltaManagerHelper
{
    private $tempMasterTablesMeta;
    
    private $deltaManagerDao;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->deltaManagerDao = new DeltaManagerDao();    
    }
    
    public function getTempMasterTablesMeta(): TempMasterTablesMeta
    {
        return $this->tempMasterTablesMeta;
    }
    
    public function getHashChangedRecords()
    {
        
    }
    
    public function removeHashNotChangedRecordsFromTempTable()
    {
        
    }
    
    public function getRecordsPresentInTempNotInMaster()
    {
        // find out the records which  are present in temp and not in master
        // filter these records and keep only those which are active
        
    }
}

