<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C\EnforcedRecordsProviderHelper;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;

class B2CProductCategoryRelationEnforcedRecordsProvider
{
    private $helper;

    public function __construct() {
        $this->helper = new EnforcedRecordsProviderHelper(B2CSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT());
    }
    
    public function getEnforcedRelationObject(): array
    {
        return $this->helper->getCategoryEnforcedRelationObject();
    }
 
}

