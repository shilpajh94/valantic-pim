<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2B;

use PimDataPostBundle\Lib\PimFailedRecordHandler\IPimFailedRecordHandler;
abstract class AbstractB2BPimFailedRecordHandler implements IPimFailedRecordHandler
{
    
    public abstract function getFixedPimFailedRecord(): array;

    public abstract function deleteFixedPimFailedRecord(array $pimFailureRecords): bool;
    
}

