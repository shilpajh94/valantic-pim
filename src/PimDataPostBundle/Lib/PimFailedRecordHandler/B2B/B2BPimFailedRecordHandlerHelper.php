<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2B;

use PimDataPostBundle\Model\PersistantModel\PimFailureRecord;
class B2BPimFailedRecordHandlerHelper
{
   
    public function getFixedPimFailedRecord(string $sfObjectType): array
    {
        $listing = new PimFailureRecord\Listing();
        $listing->setCondition("status = ? and sfObjectType = ? ", ["FIXED", $sfObjectType]);
        return $listing = $listing->load();
    }

    public function deleteFixedPimFailedRecord(array $pimFailureRecords): bool
    {
        foreach($pimFailureRecords as $rowObject)
        {
            $rowObject->delete();
        }
        return true;
    }

}

