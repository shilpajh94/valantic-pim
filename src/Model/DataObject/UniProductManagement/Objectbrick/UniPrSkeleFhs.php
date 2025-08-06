<?php

declare(strict_types=1);

namespace App\Model\DataObject\UniProductManagement\Objectbrick;

use Pimcore\Model\DataObject\Data\QuantityValue;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeleFhs as BaseUniPrSkeleFhs;

class UniPrSkeleFhs extends BaseUniPrSkeleFhs
{
    public function getFormattedInsideDiameterFraction(): ?string
    {
        $value = $this->getInsideDiameterFraction();

        if ($value === null || !$value instanceof QuantityValue) {
            return null;
        }

        $numericValue = $value->getValue();

        if ($numericValue === null) {
            return null;
        }

        return $this->convertDecimalToFraction($numericValue);
    }

    private function convertDecimalToFraction(float $decimal): string
    {
        $whole = floor($decimal);
        $fractionalPart = $decimal - $whole;

        if ($fractionalPart === 0.0) {
            return (string) $whole;
        }

        $denominator = 2;
        $numerator = round($fractionalPart * $denominator);

        return $whole . '-' . $numerator . '/' . $denominator;
    }
}
