<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider;

use GuzzleHttp\Psr7\Response;
interface IEnforcedRecordsProvider
{
    
    public function getRecordsToCreate(): array;

    public function getRecordsToUpdate(): array;

    public function deleteRecords(): bool;
    
}

