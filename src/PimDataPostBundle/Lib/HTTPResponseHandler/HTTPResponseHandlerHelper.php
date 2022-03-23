<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler;

use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFProductMapping;

class HTTPResponseHandlerHelper
{
    function updateSuccessRecords(string $referenceId, int $statusCode): int
    {
        $listing = new B2BAPIRequestEntity\Listing();
        $listing->setCondition("referenceId = ?", $referenceId);
        $listing = $listing->load();
        foreach($listing as $rowObject)
        {
            $rowObject->setResponseStatus($statusCode);
            $rowObject->save();
            return $rowObject->pimId;
        }
        return 0;
    }

    function updateFailedRecords(string $referenceId, int $responceStatus, string $responceMsg): bool
    {   
        $listing = new B2BAPIRequestEntity\Listing();
        $listing->setCondition("referenceId = ?", [$referenceId]);
        $listing = $listing->load();
        foreach($listing as $rowObject)
        {
          $rowObject->setResponseStatus($responceStatus);
          $rowObject->setResponseMsg($responceMsg);
          $rowObject->save();
          return true;
        }
        return false;   
    }

}

