<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\EnforcedRecordsProviderHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\Dao\EnforcedRecordsProviderDao;

class B2BProductCategoryRelationEnforcedRecordsProvider
{
    private $helper;

    public function __construct() {
        $this->helper = new EnforcedRecordsProviderHelper(B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT());
    }
    
    public function getEnforcedRelationObject(): array
    {
        return $this->helper->getCategoryEnforcedRelationObject();
    }
 
}

