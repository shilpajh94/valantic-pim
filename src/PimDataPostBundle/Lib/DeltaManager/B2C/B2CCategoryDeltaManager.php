<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2C;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerHelper;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\DeltaManager\B2C\Dao\B2CCategoryDeltaManagerDao;

class B2CCategoryDeltaManager extends AbstractB2CDeltaManager
{
    private $tempMasterTablesMeta;
    
    private $helper;
        
    private $b2cCategoryDeltaManagerDao;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->helper = new DeltaManagerHelper($tempMasterTablesMeta);
        $this->b2cCategoryDeltaManagerDao = new B2CCategoryDeltaManagerDao($this->tempMasterTablesMeta);
    }
    
    public function getRecordsToCreate(): array
    {
        return $this->b2cCategoryDeltaManagerDao->getRecordsPresentInTempNotInMaster();
        
    }

    public function getRecordsToCreateByLevel(int $level): array
    {
        return $this->b2cCategoryDeltaManagerDao->getRecordsPresentInTempNotInMasterByLevel($level);  
    }
    
    
    public function getRecordsToUpdate(): array
    {
        return $this->getHashChangedRecords();
    }
    
    public function getHashChangedRecords(): array
    {
        return $this->b2cCategoryDeltaManagerDao->getHashChangedRecords();
    }
    
    public function removeHashNotChangedRecordsFromTempTable(): bool
    {
        return $this->b2cCategoryDeltaManagerDao->removeHashNotChangedRecordsFromTempTable();
    }
}

