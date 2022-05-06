<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Model\PersistantModel\B2CAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush;

class B2CHTTPResponseHandlerHelper
{
    public function updateSuccessRecord(string $externalID, int $statusCode, int $responseTimestamp): string
    {
        $scriptStartTime = Util::getB2CScriptStartTime();
        $listing = new B2CAPIRequestEntity\Listing();
        $listing->setCondition("externalID = ? AND responseStatus IS NULL AND creationDate >= ?", [$externalID, $scriptStartTime]);
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

    public function updateFailedRecord(string $externalID, int $responceStatus, string $responceMsg, int $responseTimestamp): bool
    {
        $scriptStartTime = Util::getB2CScriptStartTime();
        $listing = new B2CAPIRequestEntity\Listing();
        $listing->setCondition("externalID = ? AND responseStatus IS NULL AND creationDate >= ?", [$externalID, $scriptStartTime]);
        $listing = $listing->load();
        foreach($listing as $rowObject)
        {
          $rowObject->setResponseStatus($responceStatus);
          $rowObject->setResponseTimestamp($responseTimestamp);
          $rowObject->setResponseMsg($responceMsg);
          $rowObject->save();
          $this->addEntityToEnforce($rowObject);
          return true;
        }
        return false;   
    }

    public function addEntityToEnforce(B2CAPIRequestEntity $requestObject): bool
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

    public function removeEntityFromEnforce(int $pimId): bool
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

