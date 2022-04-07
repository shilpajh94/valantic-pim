<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler;

interface IPimFailedRecordHandler
{
    
    public function getFixedPimFailedRecord(): array;

    public function deleteFixedPimFailedRecord(array $pimFailureRecords): bool;
    
}

