<?php

namespace ContitechCS\ProductBundle\Lib\UnitConversion;


use ContitechCS\ProductBundle\Lib\UnitConversion\Converters\IConverter;
use ContitechCS\ProductBundle\Lib\UnitConversion\Converters\LengthConverter;
use ContitechCS\ProductBundle\Lib\UnitConversion\Converters\WeightConverter;

/**
 * to return the converter instance based on the Unit passed
 *
 * Class ConverterFactory
 * @package ContitechCS\ProductBundle\Lib\UnitConversion
 */
class ConverterFactory
{

    public static function getConverterByUnit(float $value,Unit $unit): ?IConverter
    {
        $converter = null;

        if($unit->getType() == Unit::UNIT_TYPE_LENGTH)
        {
            $converter = new LengthConverter($value,$unit);
        }
        else if($unit->getType() == Unit::UNIT_TYPE_WEIGHT)
        {
            $converter = new WeightConverter($value,$unit);
        }
        else{
            throw new \Exception("No converter exist for unit type '".$unit->getType()."'" );
        }

        return $converter;
    }
}