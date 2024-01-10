<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B\Dao;

use PimDataPostBundle\Lib\RequestBodyGenerator\RequestBodyGeneratorDao;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFCategoryMapping;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFProductMapping;

class B2BProductCategoryReationRequestBodyGeneratorDao extends RequestBodyGeneratorDao
{
    public function getProductSalesforceIdByPimId(int $pimId): ?string
    {
        $listing = new B2BPimToSFProductMapping\Listing();
        $listing = $listing->setCondition("pimId = ?", $pimId);
        foreach ($listing->load() as $row) {
            return $row->salesForceId;
        }
        return null;
    }

    public function getCategorySalesforceIdByPimId(int $pimId): ?string
    {
        $listing = new B2BPimToSFCategoryMapping\Listing();
        $listing = $listing->setCondition("pimId = ?", $pimId);
        foreach ($listing->load() as $row) {
            return $row->salesForceId;
        }
        return null;
    }
}
