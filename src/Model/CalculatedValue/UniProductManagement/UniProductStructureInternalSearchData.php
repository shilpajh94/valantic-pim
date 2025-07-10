<?php

declare(strict_types=1);

namespace App\Model\CalculatedValue\UniProductManagement;

use Pimcore\Model\DataObject\ClassDefinition\CalculatorClassInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrand;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class UniProductStructureInternalSearchData implements CalculatorClassInterface
{
    public function compute(Concrete $object, CalculatedValue $context): string
    {
        if (!$object instanceof UniProductBase) {
            return '';
        }

        $parent = $object;
        $data = [];

        while ($parent = $parent->getParent()) {
            if (!$parent instanceof UniProductCategoryInternal || $parent->getId() === 1) {
                break;
            }

            $data[] = $parent->getName();

            $brickData = $parent->getLevelSpecificData()?->getUniPrBrand();

            if ($brickData instanceof UniPrBrand) {
                $data[] = $brickData->getMarketingDescriptionLong();
            }
        }

        return implode("\n", $data);
    }

    public function getCalculatedValueForEditMode(Concrete $object, CalculatedValue $context): string
    {
        return $this->compute($object, $context);
    }
}
