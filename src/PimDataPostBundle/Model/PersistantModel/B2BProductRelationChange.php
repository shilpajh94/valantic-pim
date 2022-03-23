<?php

namespace PimDataPostBundle\Model\PersistantModel;

class B2BProductRelationChange extends AbstractModel
{
    public $productId;

    public $attributeName;

    public $oldValue;

    public $newValue;

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): self
    {
        $this->productId = $productId;
        return $this;
    }
 
    public function getAttributeName(): string
    {
        return $this->attributeName;
    }

    public function setAttributeName(string $attributeName): self
    {
        $this->attributeName = $attributeName;
        return $this;
    }

    public function getOldValue(): int
    {
        return $this->oldValue;
    }

    public function setOldValue($oldValue): self
    {
        $this->oldValue = $oldValue;
        return $this;
    }

    public function getNewValue(): string
    {
        return $this->newValue;
    }

    public function setNewValue($newValue): self
    {
        $this->newValue = $newValue;
        return $this;
    }

    public function __toString()
    {
        return "@B2BProductRelationChange " . "[" . $this->getId() . " " . $this->getProductId() . " " .
            $this->getAttributeName() . " " . $this->getOldValue() . " " .
            $this->getNewValue() . "]";
    }

}