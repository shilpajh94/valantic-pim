<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C\EnforcedRecordsProviderHelper;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C\Dao\EnforcedRecordsProviderDao;

class B2CCategoryEnforcedRecordsProvider extends AbstractEnforcedRecordsProvider
{
    private $helper;
    private $dao;

    public function __construct() {
        $this->helper = new EnforcedRecordsProviderHelper(B2CSalesForceObjectType::CATEGORY());
        $this->dao = new EnforcedRecordsProviderDao(BCBSalesForceObjectType::CATEGORY());
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

