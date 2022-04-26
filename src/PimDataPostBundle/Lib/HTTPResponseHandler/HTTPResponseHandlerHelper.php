<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler;

use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFProductMapping;
use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class HTTPResponseHandlerHelper
{
    public function updateSuccessRecords(string $referenceId, int $statusCode, int $responseTimestamp): string
    {
        $listing = new B2BAPIRequestEntity\Listing();
        $listing->setCondition("referenceId = ?", $referenceId);
        $listing = $listing->load();
        foreach($listing as $rowObject)
        {
            $rowObject->setResponseStatus($statusCode);
            $rowObject->setResponseTimestamp($responseTimestamp);
            $rowObject->save();
            $this->removeEntityFromEnforce($rowObject->pimId);
            return $rowObject->pimId;
        }
        return 0;
    }

    public function updateFailedRecords(string $referenceId, int $responceStatus, string $responceMsg, int $responseTimestamp): bool
    {
        $listing = new B2BAPIRequestEntity\Listing();
        $listing->setCondition("referenceId = ?", [$referenceId]);
        $listing = $listing->load();
        foreach($listing as $rowObject)
        {
            $rowObject->setResponseStatus($responceStatus);
            $rowObject->setResponseMsg($responceMsg);
            $rowObject->setResponseTimestamp($responseTimestamp);
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

            if($requestObject->SFObjectType === strval(B2BSalesForceObjectType::PRODUCT_MEDIA()) ){
                #delete
                $this->updateEntityFromEnforceByPimAttributeString($requestObject->pimId);
            }
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

    private function updateEntityFromEnforceByPimAttributeString(string $pimId): bool
    {
        $pimIdArray = explode("_", $pimId);
        $pimAttributeString = $pimIdArray[0]."_".$pimIdArray[1];
        $newValueOfNewRecord = explode(",",trim($pimIdArray[2]));
        $listing = new B2BEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition("objectId LIKE '".$pimAttributeString."_%'");
        foreach($listing->load() as $rowObject)
        {
            $oldPimIdArray = explode("_", $rowObject->objectId);
            $oldValueOfOldRecord = explode(",",trim($oldPimIdArray[3]));
            foreach($oldValueOfOldRecord as $key => $oldVal){
                if(in_array($oldVal, $newValueOfNewRecord)){
                    unset($oldValueOfOldRecord[$key]);
                }
            }
            if(empty($oldValueOfOldRecord)){
                $rowObject->delete();
            } else {
                $updatedObjectValue = $oldPimIdArray[0]."_".$oldPimIdArray[1]."__,".implode(",", $oldValueOfOldRecord).",";
                $rowObject->setObjectId($updatedObjectValue);
                $rowObject->save();
            }
        }
        return true;
    }

}

