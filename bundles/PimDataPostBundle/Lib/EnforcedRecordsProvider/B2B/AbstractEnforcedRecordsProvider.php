<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\IEnforcedRecordsProvider;

abstract class AbstractEnforcedRecordsProvider implements IEnforcedRecordsProvider
{
  
    public abstract function getRecordsToCreate(): array;
    
    public abstract function getRecordsToUpdate(): array;
    
    public abstract function deleteRecords(): bool;
    
}

