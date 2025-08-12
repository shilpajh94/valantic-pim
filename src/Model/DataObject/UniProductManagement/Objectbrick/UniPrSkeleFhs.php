<?php

declare(strict_types=1);

namespace App\Model\DataObject\UniProductManagement\Objectbrick;

use Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeleFhs as BaseUniPrSkeleFhs;

class UniPrSkeleFhs extends BaseUniPrSkeleFhs
{
    public function getFormattedInsideDiameterFraction(): ?string
    {
        $numericValue = $this->getInsideDiameterFractionImperial()?->getValue();

        if ($numericValue === null) {
            return null;
        }

        return $this->convertDecimalToFraction($numericValue);
    }

    /**
     * @see https://stackoverflow.com/a/14170616
     */
    private function convertDecimalToFraction(float $decimal): string
    {
        $denominator = 64;
        $num = round($decimal * $denominator);
        $int = (int) ($num / $denominator);
        $num %= $denominator;

        if ($num === 0) {
            return (string) $int;
        }

        $gcd = $num & -$num;
        $num /= $gcd;
        $denominator /= $gcd;

        if ($int !== 0) {
            $num = abs($num);

            return sprintf('%s-%s/%s', $int, $num, $denominator);
        }

        return sprintf('%s/%s', $num, $denominator);
    }
}
