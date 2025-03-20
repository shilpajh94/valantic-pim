<?php

namespace Test\Model\CalculatedValue\ProductManagement;

use App\Model\CalculatedValue\UniProductManagement\UniProductCategoryLevel;
use PHPUnit\Framework\TestCase;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class UniProductCategoryLevelTest extends TestCase
{
    public function testParentConcatenation(): void
    {
        $aa = new UniProductCategoryInternal();
        $bb = new UniProductCategoryInternal();
        $bb->setParent($aa);

        $implementation = new UniProductCategoryLevel();
        $context = new CalculatedValue('level');

        $this->assertEquals('1', $implementation->compute($aa, $context));
        $this->assertEquals('2', $implementation->compute($bb, $context));
    }
}
