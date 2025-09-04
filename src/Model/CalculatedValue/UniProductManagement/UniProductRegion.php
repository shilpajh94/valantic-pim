<?php

declare(strict_types=1);

namespace App\Model\CalculatedValue\UniProductManagement;

use Pimcore\Model\DataObject\ClassDefinition\CalculatorClassInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\CalculatedValue;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniRegion;

class UniProductRegion implements CalculatorClassInterface
{
    public function compute(Concrete $object, CalculatedValue $context): string
    {
        if (!$object instanceof UniProductBase) {
            return '';
        }

        $result = [];

        foreach ($object->getRegionalAvailability() as $region) {
            $parent = $region->getParent();

            if ($parent instanceof UniRegion) {
                $result[$parent->getName()] = true;
            }
        }

        $result = array_keys($result);

        return sprintf(',%s,', implode(',', $result));
    }

    public function getCalculatedValueForEditMode(Concrete $object, CalculatedValue $context): string
    {
        return $this->compute($object, $context);
    }
}
