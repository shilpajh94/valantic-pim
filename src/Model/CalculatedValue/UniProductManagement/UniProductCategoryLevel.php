<?php

declare(strict_types=1);

namespace App\Model\CalculatedValue\UniProductManagement;

use Pimcore\Model\DataObject\ClassDefinition\CalculatorClassInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class UniProductCategoryLevel implements CalculatorClassInterface
{
    public function compute(Concrete $object, CalculatedValue $context): string
    {
        if (
            $object instanceof UniProductCategoryInternal
            || $object instanceof UniProductCategoryExternal
            || $object instanceof UniProductBase
        ) {
            $level = $this->calculateLevel($object);

            return (string) $level;
        }

        return '';
    }

    public function getCalculatedValueForEditMode(Concrete $object, CalculatedValue $context): string
    {
        return $this->compute($object, $context);
    }

    /**
     * Recursive function to calculate the level of the category.
     */
    private function calculateLevel(UniProductCategoryInternal|UniProductCategoryExternal|UniProductBase $object, int $carry = 1): int
    {
        $parent = $object->getParent();

        return (
            $parent instanceof UniProductCategoryInternal
            || $parent instanceof UniProductCategoryExternal
            || $parent instanceof UniProductBase
        )
            ? $this->calculateLevel($parent, $carry + 1) // Pass the incremented carry
            : $carry;
    }
}
