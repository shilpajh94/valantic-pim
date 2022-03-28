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
        
        $rowdata=array();
        foreach($listing->load() as $row)
        {
            $rowdata[]= array(
                'productId' => $row->productId,
                'attributeName' => $row->attributeName,
                'oldValue' => $row->oldValue,
                'newValue' => $row->newValue,
                'businessUnit' => $row->businessUnit
                );
        }
        return $rowdata;
    }

    public function getPTGSIOPLevel6(): array
    {
        $listing = new B2BProductRelationChange\Listing();
        $listing = $listing->setCondition('businessUnit = ?', 'ptg');
        $listing = $listing->setCondition('attributeName = ?', 'SIOPLevel6');

        $rowdata=array();
        foreach($listing->load() as $row)
        {
            $rowdata[]= array(
                'productId' => $row->productId,
                'attributeName' => $row->attributeName,
                'oldValue' => $row->oldValue,
                'newValue' => $row->newValue,
                'businessUnit' => $row->businessUnit
                );
        }
        return $rowdata;
    }
}