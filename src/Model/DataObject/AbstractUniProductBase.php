<?php

namespace App\Model\DataObject;

use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

abstract class AbstractUniProductBase extends Concrete
{
    /**
     * @template TObjectBrick
     *
     * @param class-string<TObjectBrick> $objectbrickClass
     *
     * @return TObjectBrick[]
     */
    public function resolveObjectbricksInHierarchy(string $objectbrickClass): array
    {
        return $this->resolveObjectbricks($this, $objectbrickClass);
    }

    /**
     * @template TObjectBrick
     *
     * @param class-string<TObjectBrick> $objectbrickClass
     *
     * @return TObjectBrick[]
     */
    private function resolveObjectbricks(AbstractUniProductBase|UniProductCategoryInternal $object, string $objectbrickClass): array
    {
        $parent = $object->getParent();

        if (!$parent instanceof UniProductCategoryInternal) {
            return [];
        }

        $result = [];

        foreach ($parent->getLevelSpecificData()->getItems() as $objectBrick) {
            if ($objectBrick instanceof $objectbrickClass) {
                $result[] = $objectBrick;
            }
        }

        // Note: This returns all Objectbricks from a parent that match the given abstract class.
        //       If there are instances on multiple levels, only the on the closest parent are returned.

        return $result === [] ? $this->resolveObjectbricks($parent, $objectbrickClass) : $result;
    }
}
