<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2B;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
class B2BPimFailedRecordHandler extends AbstractB2BPimFailedRecordHandler
{
    private $helper;

    public function __construct()
    {
        $this->helper = new B2BPimFailedRecordHandlerHelper();
    }

    public function getFixedPimFailedRecord(B2BSalesForceObjectType $sfObjectType): array
    {
        return $this->helper->getFixedPimFailedRecord($sfObjectType);
    }

    public function deleteFixedPimFailedRecord(array $pimFailureRecords): bool
    {
        return $this->helper->deleteFixedPimFailedRecord($pimFailureRecords);
    }

}
