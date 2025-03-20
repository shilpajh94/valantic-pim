<?php

namespace Test\Model\CalculatedValue\ProductManagement;

use App\Model\CalculatedValue\ProductManagement\ProductCategoryLevel;
use PHPUnit\Framework\TestCase;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class ProductCategoryLevelTest extends TestCase
{
    public function testParentConcatenation(): void
    {
        $aa = new UniProductCategoryInternal();
        $bb = new UniProductCategoryInternal();
        $bb->setParent($aa);

        $implementation = new ProductCategoryLevel();
        $context = new CalculatedValue('level');

        $this->assertEquals('1', $implementation->compute($aa, $context));
        $this->assertEquals('2', $implementation->compute($bb, $context));
    }
}
