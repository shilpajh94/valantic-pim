<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
interface IPimFailedRecordHandler
{
    
    public function getFixedPimFailedRecord(B2BSalesForceObjectType $sfObjectType): array;

    public function deleteFixedPimFailedRecord(array $pimFailureRecords): bool;
    
}

