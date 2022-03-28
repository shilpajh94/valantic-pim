<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B\Dao;

use PimDataPostBundle\Model\PersistantModel\B2BPimToSFCategoryMapping;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFProductMapping;
use PimDataPostBundle\Lib\RequestBodyGenerator\RequestBodyGeneratorDao;

class B2BProductCategoryReationRequestBodyGeneratorDao extends RequestBodyGeneratorDao
{
      function getProductSalesforceIdByPimId(int $pimId): string
      {
        $listing = new B2BPimToSFProductMapping\Listing();
        $listing = $listing->setCondition("pimId = ?", $pimId);
        
        foreach($listing->load() as $row)
        {
            return $row->salesForceId;
        }
      }

      function getCategorySalesforceIdByPimId(int $pimId): string
      {
        $listing = new B2BPimToSFCategoryMapping\Listing();
        $listing = $listing->setCondition("pimId = ?", $pimId);
        foreach($listing->load() as $row)
        {
            return $row->salesForceId;
        }
      }
}