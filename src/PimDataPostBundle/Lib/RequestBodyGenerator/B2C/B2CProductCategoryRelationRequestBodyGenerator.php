<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2C;

use PimDataPostBundle\Lib\RequestBodyGenerator\IProductRelationRequestBodyGenerator;
use Pimcore\Model\DataObject\Product;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CCategoryHelper;
use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;

class B2CProductCategoryRelationRequestBodyGenerator
{
    public function generateRequestBody(B2CProductRelationChange $b2cProductRelationChange)
    {
        $newValue = trim($b2cProductRelationChange->newValue,",");
        return array(
                "category_id" => B2CCategoryHelper::getExternalId($newValue),
                "product_id" =>  B2CProductHelper::getExternalId($b2cProductRelationChange->productId),
                "catalog_id" => (new B2CCategoryHelper())->getCatalogId()
                );
    }
    
}
