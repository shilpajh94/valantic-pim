<?php

namespace PimDataPostBundle\Model\PersistantModel;

use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class B2BEntityEnforcedToPush extends AbstractModel {
    
    public $objectId;
    
    public $operationType;
    
    public $SFObjectType;
    
    public function getObjectId(): string
    {
        return $this->objectId;
    }
 
    public function setObjectId(string $objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    public function getOperationType(): APIOperationType
    {
        return APIOperationType::getByString($this->operationType);
    }

    public function setOperationType(string $operationType):void
    {
        $operationType= APIOperationType::getByString($operationType);
        $this->operationType = strval($operationType);
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
