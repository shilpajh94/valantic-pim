<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2B;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\PersistantModel\PimFailureRecord;
use PimDataPostBundle\Model\Types\StatusType;
class B2BPimFailedRecordHandlerHelper
{
   
    public function getFixedPimFailedRecord(B2BSalesForceObjectType $sfObjectType): array
    {
        $listing = new PimFailureRecord\Listing();
        $listing->setCondition("status = ? and sfObjectType = ? ", [StatusType::FIXED(), $sfObjectType->__toString()]);
        return $listing = $listing->load();
    }

    /* $pimFailureRecords is an array which have PimFailureRecord objects */

    public function deleteFixedPimFailedRecord(array $pimFailureRecords): bool
    {
        foreach($pimFailureRecords as $rowObject)
        {
            $rowObject->delete();
        }
        return true;
    }

}

