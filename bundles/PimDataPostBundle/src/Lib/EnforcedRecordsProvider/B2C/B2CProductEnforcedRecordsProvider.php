<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C\EnforcedRecordsProviderHelper;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;

class B2CProductEnforcedRecordsProvider extends AbstractEnforcedRecordsProvider
{
    private $helper;

    public function __construct() {
        $this->helper = new EnforcedRecordsProviderHelper(B2CSalesForceObjectType::PRODUCT());
    }
    
    public function getRecordsToCreate(): array
    {
        return $this->helper->getEntityEnforceRecords(APIOperationType::CREATE());
    }
    
    public function getRecordsToUpdate(): array
    {
        return $this->helper->getEntityEnforceRecords(APIOperationType::UPDATE());
    }

    public function deleteRecords(): bool
    {
        return $this->helper->deleteEntityEnforceRecords();
    }
}

