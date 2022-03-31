<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\EnforcedRecordsProviderHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\Dao\EnforcedRecordsProviderDao;

class B2BCategoryEnforcedRecordsProvider extends AbstractEnforcedRecordsProvider
{
    private $helper;
    private $dao;

    public function __construct() {
        $this->helper = new EnforcedRecordsProviderHelper(B2BSalesForceObjectType::CATEGORY());
        $this->dao = new EnforcedRecordsProviderDao(B2BSalesForceObjectType::CATEGORY());
    }
    
    public function getRecordsToCreate(): array
    {
        return $this->helper->getEntityEnforceRecords(APIOperationType::CREATE());
    }

    public function getRecordsToCreateByLevel(int $level): array
    {
        return $this->dao->getEntityEnforceRecordsByLevel(APIOperationType::CREATE(), $level);
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

