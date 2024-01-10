<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2B;

use PimDataPostBundle\Model\PersistantModel\B2BPimFailureRecord;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\StatusType;
class B2BPimFailedRecordHandlerHelper
{
   
    public function getFixedPimFailedRecord(B2BSalesForceObjectType $sfObjectType): array
    {
        $listing = new B2BPimFailureRecord\Listing();
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

