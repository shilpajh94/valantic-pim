<?php

declare(strict_types=1);

namespace App\Model\CalculatedValue\UniProductManagement;

use Pimcore\Model\DataObject\ClassDefinition\CalculatorClassInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class UniProductCategoryLevel implements CalculatorClassInterface
{
    public function compute(Concrete $object, CalculatedValue $context): string
    {
        return $object instanceof UniProductCategoryInternal || $object instanceof UniProductCategoryExternal
            ? $this->calculateLevel($object)
            : '';
    }

    public function getCalculatedValueForEditMode(Concrete $object, CalculatedValue $context): string
    {
        return $this->compute($object, $context);
    }

    private function calculateLevel(UniProductCategoryInternal|UniProductCategoryExternal $object, int $carry = 1): string
    {
        $parent = $object->getParent();

        return $parent instanceof UniProductCategoryInternal || $parent instanceof UniProductCategoryExternal
            ? $this->calculateLevel($parent, ++$carry)
            : $carry;
    }
}
