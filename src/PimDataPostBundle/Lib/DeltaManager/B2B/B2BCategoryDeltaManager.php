<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerHelper;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\DeltaManager\B2B\Dao\B2BCategoryDeltaManagerDao;

class B2BCategoryDeltaManager extends AbstractB2BDeltaManager
{
    private $tempMasterTablesMeta;
    
    private $helper;
        
    private $b2bCategoryDeltaManagerDao;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->helper = new DeltaManagerHelper($tempMasterTablesMeta);
        $this->b2bCategoryDeltaManagerDao = new B2BCategoryDeltaManagerDao($this->tempMasterTablesMeta);
    }
    
    public function getRecordsToCreate(): array
    {
        return $this->b2bCategoryDeltaManagerDao->getRecordsPresentInTempNotInMaster();
        
    }

    public function getRecordsToCreateByLevel(int $level): array
    {
        return $this->b2bCategoryDeltaManagerDao->getRecordsPresentInTempNotInMasterByLevel($level);  
    }
    
    
    public function getRecordsToUpdate(): array
    {
        return $this->getHashChangedRecords();
    }
    
    public function getHashChangedRecords(): array
    {
        return $this->b2bCategoryDeltaManagerDao->getHashChangedRecords();
    }
    
    public function removeHashNotChangedRecordsFromTempTable(): bool
    {
        return $this->b2bCategoryDeltaManagerDao->removeHashNotChangedRecordsFromTempTable();
    }
}

