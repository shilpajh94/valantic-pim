<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B;

use PimDataPostBundle\Lib\DeltaManager\IDeltaManager;

abstract class AbstractB2BDeltaManager implements IDeltaManager
{
    /**
     * {@inheritDoc}
     * @see \src\PimDataPostBundle\Lib\DeltaManager\IDeltaManager::getRecordsToCreate()
     */
    public abstract function getRecordsToCreate(): array;
    
    /**
     * {@inheritDoc}
     * @see \src\PimDataPostBundle\Lib\DeltaManager\IDeltaManager::getRecordsToUpdate()
     */
    public abstract function getRecordsToUpdate(): array;
    
    public abstract function getHashChangedRecords(): array;
        
    public abstract function removeHashNotChangedRecordsFromTempTable(): bool;
    
}

