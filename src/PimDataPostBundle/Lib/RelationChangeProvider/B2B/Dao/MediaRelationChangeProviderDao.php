<?php

namespace PimDataPostBundle\Lib\RelationChangeProvider\B2B\Dao;

use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
class MediaRelationChangeProviderDao
{
    public function getProductMediaImage(array $attributesArray): array
    {
        $attributesArray = $this->getAttributeFromMediaAttributes($attributesArray, 'image');
        $attrubuteString = '"'.join('", "',$attributesArray).'"';
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition('attributeName IN ('.$attrubuteString.')');
        return $listing->load();
    }

    public function getProductMediaVideo(array $attributesArray): array
    {
        $attributesArray = $this->getAttributeFromMediaAttributes($attributesArray, 'video');
        $attrubuteString = '"'.join('", "',$attributesArray).'"';
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition('attributeName IN ('.$attrubuteString.')');
        return $listing->load();
    }

    public function getProductMediaAdvanceManyToManyRelation(array $attributesArray): array
    {
        $attributesArray = $this->getAttributeFromMediaAttributes($attributesArray, 'advancedManyToManyRelation');
        $attrubuteString = '"'.join('", "',$attributesArray).'"';
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition('attributeName IN ('.$attrubuteString.')');
        return $listing->load();
    }

    public function getAttributeFromMediaAttributes(array $attributesArray, string $attributeType): array
    {
        $attrbutesName = [];
        foreach($attributesArray as $key => $attributesRow)
        {
            if($attributesRow['pim_attribute_type'] == $attributeType)
            $attrbutesName[] = $key;
        }
        return $attrbutesName;
    }

}