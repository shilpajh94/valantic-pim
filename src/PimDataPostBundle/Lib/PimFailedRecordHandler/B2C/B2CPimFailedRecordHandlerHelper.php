<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\PersistantModel\B2CPimFailureRecord;
use PimDataPostBundle\Model\Types\StatusType;
class B2CPimFailedRecordHandlerHelper
{
   
    public function getFixedPimFailedRecord(B2CSalesForceObjectType $sfObjectType): array
    {
        $listing = new B2CPimFailureRecord\Listing();
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

