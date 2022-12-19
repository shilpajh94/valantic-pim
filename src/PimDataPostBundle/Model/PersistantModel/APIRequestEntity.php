<?php

namespace PimDataPostBundle\Model\PersistantModel;

use PimDataPostBundle\Model\Types\APIOperationType;

class APIRequestEntity extends AbstractModel
{

    public $body;

    public $referenceId;

    public $SFObjectType;

    public $operationType;

    public $responseStatus;

    public $responseMsg;


    public function getOperationType(): APIOperationType
    {
        return APIOperationType::getByString($this->operationType);
    }

    public function setOperationType(APIOperationType $operationType):void
    {
        $this->operationType = $operationType;
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

}