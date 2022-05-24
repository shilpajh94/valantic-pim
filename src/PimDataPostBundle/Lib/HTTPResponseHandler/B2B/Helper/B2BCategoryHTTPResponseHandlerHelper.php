<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2B\Helper;

use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFCategoryMapping;

class B2BCategoryHTTPResponseHandlerHelper
{

    public function insertSalesforceId(int $pimId, string $salesforceId): bool
    {
        $listing = new B2BPimToSFCategoryMapping\Listing();
        $listing->setCondition("pimId = ?", $pimId);
        $count = $listing->getTotalCount();
        if($count==0)
        {
            $entries = new B2BPimToSFCategoryMapping();
            $entries->setPimId($pimId);
            $entries->setSalesForceId($salesforceId);
            $entries->save();  
        }
        return true;       
    }   
}

