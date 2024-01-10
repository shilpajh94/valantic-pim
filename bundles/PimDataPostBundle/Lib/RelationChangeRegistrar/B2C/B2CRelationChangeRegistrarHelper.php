<?php
namespace PimDataPostBundle\Lib\RelationChangeRegistrar\B2C;

use PimDataPostBundle\Lib\RelationChangeRegistrar\RelationChangeRegistrarHelper;
use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;

class B2CRelationChangeRegistrarHelper extends RelationChangeRegistrarHelper 
{
    public function saveChangedRelation($relationalData)
    {
        if($relationalData)
        {
            foreach ($relationalData as $value) {
                $productId = $value['productId'];
                $businessUnit = $value['BusinessUnit'];
                $attributeName = $value['attributeName'];
                $oldValue = $value['oldValue'];
                $newValue = $value['newValue'];
                $obj = new B2CProductRelationChange();
                $obj->setProductId($productId)
                    ->setBusinessUnit($businessUnit)
                    ->setAttributeName($attributeName)
                    ->setOldValue($oldValue)
                    ->setNewValue($newValue);
                $obj->save();
            }
        }
    }
}

