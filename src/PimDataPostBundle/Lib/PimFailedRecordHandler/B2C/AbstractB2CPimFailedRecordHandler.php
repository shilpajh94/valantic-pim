<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Lib\PimFailedRecordHandler\IB2CPimFailedRecordHandler;
abstract class AbstractB2CPimFailedRecordHandler implements IB2CPimFailedRecordHandler
{
    
    public abstract function getFixedPimFailedRecord(B2CSalesForceObjectType $sfObjectType): array;

    public abstract function deleteFixedPimFailedRecord(array $pimFailureRecords): bool;
    
}

