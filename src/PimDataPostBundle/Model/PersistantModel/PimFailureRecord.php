<?php

namespace PimDataPostBundle\Model\PersistantModel;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
class PimFailureRecord extends AbstractModel {
    
    public $pimId;
    
    public $failureMessage;
    
    public $SFObjectType;

    public $status;

    public $timestamp;
    
    public function getPimId(): string
    {
        return $this->pimId;
    }
 
    public function setPimId(string $pimId)
    {
        $this->pimId = $pimId;
        return $this;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }
 
    public function setTimestamp(string $timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getFailureMessage(): string
    {
        return $this->failureMessage;
    }
 
    public function setFailureMessage(string $failureMessage)
    {
        $this->failureMessage = $failureMessage;
        return $this;
    }


    public function getStatus(): string
    {
        return $this->status;
    }
 
    public function setStatus(string $status)
    {
        $this->status = $status;
        return $this;
    }



    public function getSFObjectType(): B2BSalesForceObjectType
    {
        return B2BSalesForceObjectType::getByString($this->SFObjectType);
    }

    public function setSFObjectType(string $SFObjectType):void
    {
        $SFObjectType= B2BSalesForceObjectType::getByString($SFObjectType);
        $this->SFObjectType = strval($SFObjectType);
    }
}
