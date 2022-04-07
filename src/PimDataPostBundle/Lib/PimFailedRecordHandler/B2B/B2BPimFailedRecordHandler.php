<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2B;

class B2BPimFailedRecordHandler extends AbstractB2BPimFailedRecordHandler
{
    private $helper;

    public function __construct()
    {
        $this->helper = new B2BPimFailedRecordHandlerHelper();
    }

    public function getFixedPimFailedRecord(): array
    {
        return $this->helper->getFixedPimFailedRecord();
    }

    public function deleteFixedPimFailedRecord(array $pimFailureRecords): bool
    {
        return $this->helper->deleteFixedPimFailedRecord($pimFailureRecords);
    }

}
