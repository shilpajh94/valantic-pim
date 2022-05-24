<?php

namespace PimDataPostBundle\Model\PersistantModel;

use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class PimcoreDeletedAssets extends AbstractModel {
    
    public $assetId;
    
    public $type;
    
    
    
    public function getAssetId(): int
    {
        return $this->assetId;
    }
 
    public function setAssetId(int $assetId)
    {
        $this->assetId = $assetId;

        return $this;
    }

    public function getType(): string
    {
        return $this->assetId;
    }
 
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

}
