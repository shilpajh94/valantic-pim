<?php

namespace PimDataPostBundle\Lib\RelationChangeProvider\B2C;

use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;
class CategoryRelationChangeProviderDao
{
    public function getB2CCategories(): array
    {
        $listing = new B2CProductRelationChange\Listing();
        $listing = $listing->setCondition("attributeName = 'B2CCategory' ");
        return $listing->load();
    }

  
}