<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
interface IB2CPimFailedRecordHandler
{
    
    public function getFixedPimFailedRecord(B2CSalesForceObjectType $sfObjectType): array;

    public function deleteFixedPimFailedRecord(array $pimFailureRecords): bool;
    
}

