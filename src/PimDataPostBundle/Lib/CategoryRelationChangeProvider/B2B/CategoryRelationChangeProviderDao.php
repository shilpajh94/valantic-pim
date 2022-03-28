<?php

namespace PimDataPostBundle\Lib\CategoryRelationChangeProvider\B2B;

use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
class CategoryRelationChangeProviderDao
{
    public function getIFSSIOPLevel4(): array
    {
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition('businessUnit = ?', 'ifs');
        $listing = $listing->setCondition('attributeName = ?', 'SIOPLevel4');
        return $listing->load();
    }

    public function getPTGSIOPLevel6(): array
    {
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition('businessUnit = ?', 'ptg');
        $listing = $listing->setCondition('attributeName = ?', 'SIOPLevel6');
        return $listing->load();
    }
}