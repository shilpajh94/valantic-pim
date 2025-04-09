<?php

namespace App\Model\DataObject;

use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

abstract class AbstractUniProductBase extends Concrete
{
    use SuperfastSaveTrait;

    public function resolveObjectbricksInHierarchy(string $objectbrickClass): array
    {
        return $this->resolveObjectbricks($this, $objectbrickClass);
    }

    public function resolveAncestorCategoryByObjectBrick(string $objectbrickClass): ?UniProductCategoryInternal
    {
        return $this->resolveAncestorCategory($this, $objectbrickClass);
    }

    private function resolveAncestorCategory(AbstractUniProductBase|UniProductCategoryInternal $object, string $objectbrickClass): ?UniProductCategoryInternal
    {
        $parent = $object->getParent();

        if (!$parent instanceof UniProductCategoryInternal) {
            return null;
        }

        foreach ($parent->getLevelSpecificData()?->getItems() ?? [] as $objectBrick) {
            if ($objectBrick instanceof $objectbrickClass) {
                return $parent;
            }
        }

        return $this->resolveAncestorCategory($parent, $objectbrickClass);
    }

    private function resolveObjectbricks(AbstractUniProductBase|UniProductCategoryInternal $object, string $objectbrickClass): array
    {
        $ancestor = $this->resolveAncestorCategory($object, $objectbrickClass);

        if (!$ancestor instanceof UniProductCategoryInternal) {
            return [];
        }

        $result = [];

        foreach ($ancestor->getLevelSpecificData()?->getItems() ?? [] as $objectBrick) {
            if ($objectBrick instanceof $objectbrickClass) {
                $result[] = $objectBrick;
            }
        }

        // Note: This returns all Objectbricks from a parent that match the given abstract class.
        //       If there are instances on multiple levels, only the on the closest parent are returned.

        return $result;
    }
}
