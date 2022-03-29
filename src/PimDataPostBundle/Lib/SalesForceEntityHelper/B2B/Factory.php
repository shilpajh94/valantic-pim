<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2B;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BCategoryHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductCategoryRelationHelper;

class Factory 
{
    public static function getb2bHelper($SFObjectType)
    {
        if($SFObjectType==B2BSalesForceObjectType::PRODUCT())
        return  new B2BProductHelper();
        else if($SFObjectType== B2BSalesForceObjectType::CATEGORY())
        return  new B2BCategoryHelper();
        else if($SFObjectType== B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT())
        return  new B2BProductCategoryRelationHelper();
    }

}