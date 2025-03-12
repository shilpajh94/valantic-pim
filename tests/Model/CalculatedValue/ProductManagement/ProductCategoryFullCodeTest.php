<?php

namespace Test\Model\CalculatedValue\ProductManagement;

use App\Model\CalculatedValue\ProductManagement\ProductCategoryFullCode;
use PHPUnit\Framework\TestCase;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class ProductCategoryFullCodeTest extends TestCase
{
    public function testParentConcatenation(): void
    {
        $aa = new UniProductCategoryInternal();
        $aa->setCode('AA');

        $bb = new UniProductCategoryInternal();
        $bb->setCode('BB');

        $bb->setParent($aa);

        $implementation = new ProductCategoryFullCode();
        $context = new CalculatedValue('fullCode');

        $this->assertEquals('AA', $implementation->compute($aa, $context));
        $this->assertEquals('AABB', $implementation->compute($bb, $context));
    }
}
