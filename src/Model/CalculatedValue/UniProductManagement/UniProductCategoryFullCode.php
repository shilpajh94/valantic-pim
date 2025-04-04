<?php

namespace App\Model\CalculatedValue\UniProductManagement;

use Pimcore\Model\DataObject\ClassDefinition\CalculatorClassInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class UniProductCategoryFullCode implements CalculatorClassInterface
{
    public function compute(Concrete $object, CalculatedValue $context): string
    {
        return $object instanceof UniProductCategoryInternal || $object instanceof UniProductBase
            ? $this->compileGhpCodes($object)
            : '';
    }

    public function getCalculatedValueForEditMode(Concrete $object, CalculatedValue $context): string
    {
        return $this->compute($object, $context);
    }

    private function compileGhpCodes(UniProductCategoryInternal|UniProductBase $object, string $carry = ''): string
    {
        $carry = $object instanceof UniProductCategoryInternal ? sprintf('%s%s', $object->getGhpCode(), $carry) : $carry;
        $parent = $object->getParent();

        return $parent instanceof UniProductCategoryInternal || $parent instanceof UniProductBase
            ? $this->compileGhpCodes($parent, $carry)
            : $carry;
    }
}
