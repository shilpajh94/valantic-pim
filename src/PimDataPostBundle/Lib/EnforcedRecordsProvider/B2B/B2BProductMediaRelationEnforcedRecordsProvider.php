<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\EnforcedRecordsProviderHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\Dao\EnforcedRecordsProviderDao;

class B2BProductMediaRelationEnforcedRecordsProvider
{
    private $helper;

    public function __construct() {
        $this->helper = new EnforcedRecordsProviderHelper(B2BSalesForceObjectType::PRODUCT_MEDIA());
    }
    
    public function getUpdateEnforcedRelationObject(): array
    {
        return $this->helper->getMediaEnforcedRelationObject(APIOperationType::UPDATE());
    }

    public function getDeleteEnforcedRelationObject(): array
    {
        return $this->helper->getMediaEnforcedRelationObject(APIOperationType::DELETE());
    }
 
}

