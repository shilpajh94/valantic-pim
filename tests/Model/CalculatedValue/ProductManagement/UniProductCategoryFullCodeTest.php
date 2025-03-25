<?php

namespace Test\Model\CalculatedValue\ProductManagement;

use App\Model\CalculatedValue\UniProductManagement\UniProductCategoryFullCode;
use PHPUnit\Framework\TestCase;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class UniProductCategoryFullCodeTest extends TestCase
{
    public function testParentConcatenation(): void
    {
        $aa = new UniProductCategoryInternal();
        $aa->setGhpCode('AA');

        $bb = new UniProductCategoryInternal();
        $bb->setGhpCode('BB');

        $bb->setParent($aa);

        $implementation = new UniProductCategoryFullCode();
        $context = new CalculatedValue('fullCode');

        $this->assertEquals('AA', $implementation->compute($aa, $context));
        $this->assertEquals('AABB', $implementation->compute($bb, $context));
    }
}
