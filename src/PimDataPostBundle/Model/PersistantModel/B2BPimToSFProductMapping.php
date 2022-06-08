<?php

namespace PimDataPostBundle\Model\PersistantModel;

class B2BPimToSFProductMapping extends AbstractModel
{
    public $pimId;

    public $salesForceId;

    public function getPimId(): int
    {
        return $this->pimId;
    }

    public function setPimId(int $pimId): self
    {
        $this->pimId = $pimId;
        return $this;
    }

    public function getSalesForceId(): string
    {
        return $this->salesForceId;
    }

    public function setSalesForceId(string $salesForceId): self
    {
        $this->salesForceId = $salesForceId;
        return $this;
    }
        
    public function __toString()
    {
        return "@B2BPimToSFProductMapping " . "[" . $this->pimId . " " . $this->salesForceId . "]";
    }
}