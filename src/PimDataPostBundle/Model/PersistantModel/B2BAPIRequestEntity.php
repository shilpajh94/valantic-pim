<?php

namespace PimDataPostBundle\Model\PersistantModel;

use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class B2BAPIRequestEntity extends AbstractModel
{

    public $body;

    public $referenceId;

    public $SFObjectType;

    public $operationType;

    public $responseStatus;

    public $responseMsg;

    public $externalID;


    public function getOperationType(): APIOperationType
    {
        return APIOperationType::getByString($this->operationType);
    }

    public function setOperationType($operationType):void
    {
        $operationType= APIOperationType::getByString($operationType);
        $this->operationType = strval($operationType);
    }

    public function getSFObjectType(): B2BSalesForceObjectType
    {
        return B2BSalesForceObjectType::getByString($this->SFObjectType);
    }

    public function setSFObjectType($SFObjectType):void
    {
        $SFObjectType= B2BSalesForceObjectType::getByString($SFObjectType);
        
        $this->SFObjectType = strval($SFObjectType);
    }

        /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody(?string $body): void
    {
        $this->body = $body;
    }



    /**
     * @return mixed
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * @param mixed $body
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }


    /**
     * @return mixed
     */
    public function getResponseStatus()
    {
        return $this->responseStatus;
    }

    /**
     * @param mixed $body
     */
    public function setResponseStatus(?string $responseStatus): void
    {
        $this->responseStatus = $responseStatus;
    }


    /**
     * @return mixed
     */
    public function getResponseMsg()
    {
        return $this->responseMsg;
    }

    /**
     * @param mixed $body
     */
    public function setResponseMsg(?string $responseMsg): void
    {
        $this->responseMsg = $responseMsg;
    }



    /**
     * @return mixed
     */
    public function getexternalID()
    {
        return $this->externalID;
    }

    /**
     * @param mixed $body
     */
    public function setexternalID(?string $externalID): void
    {
        $this->externalID = $externalID;
    }




}