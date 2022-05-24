<?php

namespace PimDataPostBundle\Lib\RelationChangeProvider\B2B\Dao;

use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
class MediaRelationChangeProviderDao
{
    public function getProductMediaImage(array $attributesArray): array
    {
        return $this->getProductMediaByAttribute($attributesArray, 'image');
    }

    public function getProductMediaVideo(array $attributesArray): array
    {
        return $this->getProductMediaByAttribute($attributesArray, 'video');
    }

    public function getProductMediaAdvanceManyToManyRelation(array $attributesArray): array
    {
        return $this->getProductMediaByAttribute($attributesArray, 'advancedManyToManyRelation');
    }

    private function getProductMediaByAttribute(array $attributesArray, string $attributeType): array
    {
        $attributesArray = $this->getAttributeFromMediaAttributes($attributesArray, $attributeType);
        $attrubuteString = '"'.join('", "',$attributesArray).'"';
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition('attributeName IN ('.$attrubuteString.')');
        return $listing->load();
    }

    private function getAttributeFromMediaAttributes(array $attributesArray, string $attributeType): array
    {
        $attrbutesName = [];
        foreach($attributesArray as $key => $attributesRow)
        {
            if($attributesRow['pim_attribute_type'] == $attributeType){
            $attrbutesName[] = $key;
            }
        }
        return $attrbutesName;
    }

}