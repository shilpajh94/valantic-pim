<?php

declare(strict_types=1);

namespace App\Model\DataObject;

/**
 * This trait attempts offer a faster way of saving the object for mass dummy data generation
 * and will be removed before MVP go-live.
 */
trait SuperfastSaveTrait
{
    /** @param array<mixed> $parameters */
    public function superfastSave(array $parameters = []): static
    {
        if ($this->getId() !== null) {
            return parent::save($parameters);
        }

        $this->beginTransaction();
        $this->setPath(str_replace('//', '/', $this->getParent()->getCurrentFullPath() . '/'));
        $this->validatePathLength();

        $this->getDao()->create();
        $this->getDao()->update(false);
        $this->commit();

        return $this;
    }
}
