<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Lib\PimFailedRecordHandler\IPimFailedRecordHandler;
abstract class AbstractB2BPimFailedRecordHandler implements IPimFailedRecordHandler
{
    
    public abstract function getFixedPimFailedRecord(B2CSalesForceObjectType $sfObjectType): array;

    public abstract function deleteFixedPimFailedRecord(array $pimFailureRecords): bool;
    
}

