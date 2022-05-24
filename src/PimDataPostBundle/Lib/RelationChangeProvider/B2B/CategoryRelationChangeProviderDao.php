<?php

namespace PimDataPostBundle\Lib\RelationChangeProvider\B2B;

use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
class CategoryRelationChangeProviderDao
{
    public function getIFSSIOPLevel4Categories(): array
    {
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition(" businessUnit = 'IFS' AND attributeName = 'SIOPLevel4' ");
        return $listing->load();
    }

    public function getPTGSIOPLevel6Categories(): array
    {
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition(" businessUnit = 'PTG' AND attributeName = 'SIOPLevel6' ");
        return $listing->load();
    }
}