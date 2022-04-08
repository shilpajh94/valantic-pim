<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler;

use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFProductMapping;
use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush;

class HTTPResponseHandlerHelper
{
    public function updateSuccessRecords(string $referenceId, int $statusCode): string
    {
        $listing = new B2BAPIRequestEntity\Listing();
        $listing->setCondition("referenceId = ?", $referenceId);
        $listing = $listing->load();
        foreach($listing as $rowObject)
        {
            $rowObject->setResponseStatus($statusCode);
            $rowObject->save();
            $this->removeEntityFromEnforce($rowObject->pimId);
            return $rowObject->pimId;
        }
        return 0;
    }

    public function updateFailedRecords(string $referenceId, int $responceStatus, string $responceMsg): bool
    {
        $listing = new B2BAPIRequestEntity\Listing();
        $listing->setCondition("referenceId = ?", [$referenceId]);
        $listing = $listing->load();
        foreach($listing as $rowObject)
        {
          $rowObject->setResponseStatus($responceStatus);
          $rowObject->setResponseMsg($responceMsg);
          $rowObject->save();
          $this->addEntityToEnforce($rowObject);
          return true;
        }
        return false;   
    }

    private function addEntityToEnforce($requestObject): bool
    {
        $listing = new B2BEntityEnforcedToPush\Listing();
        $listing->setCondition("objectId = ?", [$requestObject->pimId]);
        if(count($listing->load()) == 0)
        {
        $newObject = new B2BEntityEnforcedToPush();
        $newObject->setObjectId($requestObject->pimId);
        $newObject->setOperationType($requestObject->operationType);
        $newObject->setSFObjectType($requestObject->SFObjectType);
        $newObject->save();
        }
        return true;
    }

    private function removeEntityFromEnforce($pimId)
    {

        $listing = new B2BEntityEnforcedToPush\Listing();
        $listing->setCondition("objectId = ?", [$pimId]);
        foreach($listing->load() as $rowObject)
        {
            $rowObject->delete();
        }
        return true;
    }

}

