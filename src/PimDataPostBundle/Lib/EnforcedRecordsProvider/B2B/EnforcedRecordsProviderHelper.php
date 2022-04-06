<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B;

use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class EnforcedRecordsProviderHelper
{
    private $SFObjectType;
    
    public function __construct($SFObjectType) {
        $this->SFObjectType = $SFObjectType;
    }
    
    public function getEntityEnforceRecords(string $operationType): array
    {
        $listing = new B2BEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition('SFObjectType = ?', B2BSalesForceObjectType::getByString($this->SFObjectType));
        $listing = $listing->setCondition('operationType = ?', APIOperationType::getByString($operationType));
        $ids =[];

        foreach($listing->load() as $row)
        {
            $ids[] = $row->objectId;
        }
        return $ids;
    }

    public function deleteEntityEnforceRecords(): bool
    {
        $listing = new B2BEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition('SFObjectType = ?', B2BSalesForceObjectType::getByString($this->SFObjectType));
        foreach($listing->load() as $row)
        {
            $row->delete();
        }
        return true;
    }

}

