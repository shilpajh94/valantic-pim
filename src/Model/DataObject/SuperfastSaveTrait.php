<?php

namespace App\Model\DataObject;

use Pimcore\Cache\RuntimeCache;

trait SuperfastSaveTrait
{
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