<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler;

use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BPimToSFProductMapping;
use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush;
use PimDataPostBundle\Model\Types\APIOperationType;
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
            Util::addB2BSuccessId($rowObject->getPimId());

            $todaysFailedProductIds = Util::getB2BFailureIds();
            if( !in_array($rowObject->pimId, $todaysFailedProductIds) ){
                /**
                 * Following will run for media api only
                 * if a request for this pim id has failed today, then do not send others requests
                 * for the same pim id, because otherwise if the next request for the same pim id is a success
                 * then it would remove the entry for this pim id from the enforce table.
                 * 
                 * So, if any of the request for this pim id is rejected by Salesforce then this pim id is added in the 
                 * enforce table and all the requests for this pim id will be tried in the next execution
                 */
                $this->removeEntityFromEnforce($rowObject->pimId);

                if($rowObject->SFObjectType === strval(B2BSalesForceObjectType::PRODUCT_MEDIA()) ){
                    #delete
                    $this->updateEntityFromEnforceByPimAttributeString($rowObject->pimId);
                }

            }

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
            
            /**
             * if the resource we are trying to delete is not present then we do not need to try to delete this resource 
             * again in the next execution of the job.
             * This case should not be considered as a failure
             */
            // if(!($rowObject->getSFObjectType() == strval(B2BSalesForceObjectType::PRODUCT_MEDIA()) && 
            //         $rowObject->getOperationType() == strval(APIOperationType::DELETE()) &&
            //          $responceStatus == 404
            //     ) 
            // ){
            //     Util::addB2BFailureId($rowObject->getPimId());
            //     $this->addEntityToEnforce($rowObject);
            // }


            if($rowObject->getSFObjectType() != strval(B2BSalesForceObjectType::PRODUCT_MEDIA()) 
                && $rowObject->getSFObjectType() != strval(B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT()) && 
                    $rowObject->getOperationType() != strval(APIOperationType::DELETE()) &&
                    $responceStatus != 404 && $responceStatus != 204
                ) 
            {
                Util::addB2BFailureId($rowObject->getPimId());
                $this->addEntityToEnforce($rowObject);
            }
            return true;
        }
        return false;   
    }

    private function addEntityToEnforce(B2BAPIRequestEntity $requestObject): bool
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

