<?php
namespace PimDataPostBundle\Lib\DeltaManager;

interface IDeltaManager
{
    /**
     * return all unique records to create
     * @return array
     */
    public function getRecordsToCreate(): array;
    
    /**
     * return all unique records to update
     * @return array
     */
    public function getRecordsToUpdate(): array;
}

