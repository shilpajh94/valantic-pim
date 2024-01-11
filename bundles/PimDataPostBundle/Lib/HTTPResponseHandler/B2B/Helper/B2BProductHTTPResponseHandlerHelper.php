<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2B\Helper;

use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFProductMapping;

class B2BProductHTTPResponseHandlerHelper
{

    public function insertSalesforceId(int $pimId, string $salesforceId): bool
    {
        $listing = new B2BPimToSFProductMapping\Listing();
        $listing->setCondition("pimId = ?", $pimId);
        $count = $listing->getTotalCount();
        if($count==0)
        {
            $entries = new B2BPimToSFProductMapping();
            $entries->setPimId($pimId);
            $entries->setSalesForceId($salesforceId);
            $entries->save();  
        }
        return true;       
    }

    

}

