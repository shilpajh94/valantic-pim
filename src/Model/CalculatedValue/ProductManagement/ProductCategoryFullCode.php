<?php

namespace App\Model\CalculatedValue\ProductManagement;

use Pimcore\Model\DataObject\ClassDefinition\CalculatorClassInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniBaseProduct;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class ProductCategoryFullCode implements CalculatorClassInterface
{
    public function compute(Concrete $object, CalculatedValue $context): string
    {
        return $object instanceof UniProductCategoryInternal || $object instanceof UniBaseProduct
            ? $this->compileGhpCodes($object)
            : '';
    }

    public function getCalculatedValueForEditMode(Concrete $object, CalculatedValue $context): string
    {
        return $this->compute($object, $context);
    }

    private function compileGhpCodes(UniProductCategoryInternal|UniBaseProduct $object, string $carry = ''): string
    {
        $carry = $object instanceof UniProductCategoryInternal ? sprintf('%s%s', $object->getGhpCode(), $carry) : $carry;
        $parent = $object->getParent();

        return $parent instanceof UniProductCategoryInternal || $parent instanceof UniBaseProduct
            ? $this->compileGhpCodes($parent, $carry)
            : $carry;
    }
}
