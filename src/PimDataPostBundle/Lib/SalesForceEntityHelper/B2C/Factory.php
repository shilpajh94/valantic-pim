<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;

class Factory 
{
    public static function getb2cHelper($SFObjectType): ? IB2CSalesForceEntityHelper
    {
        $returnObject = null;
        if($SFObjectType == B2CSalesForceObjectType::PRODUCT()) {
            $returnObject = new B2CProductHelper();
        } else if($SFObjectType == B2CSalesForceObjectType::CATEGORY()) {
            $returnObject =  new B2CCategoryHelper();
        } else if($SFObjectType == B2CSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT()) {
            $returnObject = new B2CProductCategoryRelationHelper();
        }
        return $returnObject;
    }

}