<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\EnforcedRecordsProviderHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;

class B2BCategoryEnforcedRecordsProvider extends AbstractEnforcedRecordsProvider
{
    private $helper;

    public function __construct() {
        $this->helper = new EnforcedRecordsProviderHelper(B2BSalesForceObjectType::CATEGORY());
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

