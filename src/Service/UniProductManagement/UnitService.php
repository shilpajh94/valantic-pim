<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

class UnitService
{
    /**
     * @see https://stackoverflow.com/a/14170616
     */
    public function convertInchesDecimalToFraction(float $decimal): string
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
