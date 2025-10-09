<?php

declare(strict_types=1);

namespace App\Model\DataObject;

use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

abstract class AbstractUniProductBase extends Concrete
{
    /**
     * Resolve Objectbrick instances of a given type in any point of the Pimcore object parent hierarchy.
     *
     * @template TObjectbrickClassname
     *
     * @param class-string<TObjectbrickClassname> $objectbrickClass
     *
     * @return array<TObjectbrickClassname>
     */
    public function resolveObjectbricksInHierarchy(string $objectbrickClass): array
    {
        return $this->resolveObjectbricks($this, $objectbrickClass);
    }

    /**
     * Identify the relevant parent category object by looking for an instance of a given Objectbrick class.
     * Returns the first category with an attached instance of the given Objectbrick class.
     */
    public function resolveAncestorCategoryByObjectBrick(string $objectbrickClass): ?UniProductBase
    {
        return $this->resolveAncestorCategory($this, $objectbrickClass);
    }

    /**
     * Identify the relevant parent category object by looking for an instance of a given Objectbrick class.
     * Returns the first category with an attached instance of the given Objectbrick class.
     * Functionality extracted to separate private method for recursion.
     */
    private function resolveAncestorCategory(AbstractUniProductBase|UniProductCategoryInternal $object, string $objectbrickClass): ?UniProductBase
    {
        $parent = $object->getParent();

        if (!$parent instanceof UniProductBase) {
            return null;
        }

        foreach ($parent->getFinishedGoodProductGroupSpecific()?->getItems() ?? [] as $objectBrick) {
            if ($objectBrick instanceof $objectbrickClass) {
                return $parent;
            }
        }

        return $this->resolveAncestorCategory($parent, $objectbrickClass);
    }

    /**
     * Resolve Objectbrick instances of a given type in any point of the Pimcore object parent hierarchy.
     * Functionality extracted to separate private method for recursion.
     *
     * @template TObjectbrickClassname
     *
     * @param class-string<TObjectbrickClassname> $objectbrickClass
     *
     * @return array<TObjectbrickClassname>
     */
    private function resolveObjectbricks(AbstractUniProductBase|UniProductCategoryInternal $object, string $objectbrickClass): array
    {
        $ancestor = $this->resolveAncestorCategory($object, $objectbrickClass);

        if (!$ancestor instanceof UniProductBase) {
            return [];
        }

        $result = [];

        foreach ($ancestor->getFinishedGoodProductGroupSpecific()?->getItems() ?? [] as $objectBrick) {
            if ($objectBrick instanceof $objectbrickClass) {
                $result[] = $objectBrick;
            }
        }

        // Note: This returns all Objectbricks from a parent that match the given abstract class.
        //       If there are instances on multiple levels, only the on the closest parent are returned.

        return $result;
    }
}
