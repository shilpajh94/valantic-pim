<?php

namespace PimDataPostBundle\Lib;

class ValueFormatter
{
    public static function formatToTwoDecimalPlaces($value)
    {
        if (is_numeric($value)) {
            $floatValue = floatval($value);
            return number_format($floatValue,2,'.','');
        }

        return $value;
    }

    public static function formatToZeroDecimalPlaces($value)
    {
        if (is_numeric($value)) {
            $floatValue = floatval($value);
            return strval(round($floatValue, 0));
        }

        return $value;
    }
}