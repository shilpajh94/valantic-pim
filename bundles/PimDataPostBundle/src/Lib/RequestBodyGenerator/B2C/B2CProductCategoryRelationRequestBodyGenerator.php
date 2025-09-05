<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2C;

use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CCategoryHelper;
use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;
use PimDataPostBundle\Model\Types\APIOperationType;

class B2CProductCategoryRelationRequestBodyGenerator
{
    public function generateRequestBody(B2CProductRelationChange $b2cProductRelationChange): array
    {
        $newValue = trim($b2cProductRelationChange->newValue, ",");
        $oldValue = trim($b2cProductRelationChange->oldValue, ",");
        $returnArray = array();
        if($oldValue != '' && $oldValue != null)
        {
            $returnArray[strval(APIOperationType::DELETE())] = array(
                    "category_id" => B2CCategoryHelper::getExternalId(['o_id'=> $oldValue]),
                    "product_id" =>  B2CProductHelper::getExternalIdByPimId($b2cProductRelationChange->productId),
                    "catalog_id" => (new B2CCategoryHelper())->getCatalogId()
                    );
        }
        if($newValue != '' && $newValue != null)
        {
        $returnArray[strval(APIOperationType::CREATE())] = array(
                "category_id" => B2CCategoryHelper::getExternalId(['o_id'=> $newValue]),
                "product_id" =>  B2CProductHelper::getExternalIdByPimId($b2cProductRelationChange->productId),
                "catalog_id" => (new B2CCategoryHelper())->getCatalogId()
                );
        }
        return $returnArray;

    }

}
