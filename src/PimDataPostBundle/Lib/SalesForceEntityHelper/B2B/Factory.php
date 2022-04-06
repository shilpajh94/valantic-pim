<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2B;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BCategoryHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductCategoryRelationHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductMediaHelper;

class Factory 
{
    public static function getb2bHelper($SFObjectType)
    {
        $returnObject = '';
        if($SFObjectType == B2BSalesForceObjectType::PRODUCT()) {
            $returnObject = new B2BProductHelper();
        } else if($SFObjectType == B2BSalesForceObjectType::CATEGORY()) {
            $returnObject =  new B2BCategoryHelper();
        } else if($SFObjectType == B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT()) {
            $returnObject = new B2BProductCategoryRelationHelper();
        } else if($SFObjectType == B2BSalesForceObjectType::PRODUCT_MEDIA()) {
            $returnObject = new B2BProductMediaHelper();
        }
        return $returnObject;
    }

}