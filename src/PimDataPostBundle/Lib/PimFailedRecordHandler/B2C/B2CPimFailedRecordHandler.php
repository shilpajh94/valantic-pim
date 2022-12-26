<?php
namespace PimDataPostBundle\Lib\PimFailedRecordHandler\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
class B2CPimFailedRecordHandler extends AbstractB2CPimFailedRecordHandler
{
    private $helper;

    public function __construct()
    {
        $this->helper = new B2CPimFailedRecordHandlerHelper();
    }

    public function getFixedPimFailedRecord(B2CSalesForceObjectType $sfObjectType): array
    {
        return $this->helper->getFixedPimFailedRecord($sfObjectType);
    }

    public function deleteFixedPimFailedRecord(array $pimFailureRecords): bool
    {
        return $this->helper->deleteFixedPimFailedRecord($pimFailureRecords);
    }

}
