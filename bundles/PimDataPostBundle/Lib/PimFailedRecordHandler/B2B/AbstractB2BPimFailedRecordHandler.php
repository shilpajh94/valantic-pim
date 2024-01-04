<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2B;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Lib\PimFailedRecordHandler\IPimFailedRecordHandler;
abstract class AbstractB2BPimFailedRecordHandler implements IPimFailedRecordHandler
{
    
    public abstract function getFixedPimFailedRecord(B2BSalesForceObjectType $sfObjectType): array;

    public abstract function deleteFixedPimFailedRecord(array $pimFailureRecords): bool;
    
}

