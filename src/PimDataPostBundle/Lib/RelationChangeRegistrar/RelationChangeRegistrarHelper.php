<?php
namespace PimDataPostBundle\Lib\RelationChangeRegistrar;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;

class RelationChangeRegistrarHelper
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
                $obj = new B2BProductRelationChange();
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

