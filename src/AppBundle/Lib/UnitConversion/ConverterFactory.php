<?php

namespace AppBundle\Lib\UnitConversion;


use AppBundle\Lib\UnitConversion\Converters\IConverter;
use AppBundle\Lib\UnitConversion\Converters\LengthConverter;
use AppBundle\Lib\UnitConversion\Converters\PressureConverter;
use AppBundle\Lib\UnitConversion\Converters\TemperatureConverter;
use AppBundle\Lib\UnitConversion\Converters\WeightConverter;

/**
 * to return the converter instance based on the Unit passed
 *
 * Class ConverterFactory
 * @package AppBundle\Lib\UnitConversion
 */
class ConverterFactory
{

    public static function getConverterByUnit(float $value,Unit $unit): ?IConverter
    {
        $converter = null;

        switch ($unit->getType()){
            case Unit::UNIT_TYPE_WEIGHT:
                $converter = new WeightConverter($value,$unit);
                break;
            case Unit::UNIT_TYPE_LENGTH:
                $converter = new LengthConverter($value,$unit);
                break;
            case Unit::UNIT_TYPE_PRESSURE:
                $converter = new PressureConverter($value, $unit);
                break;
            case Unit::UNIT_TYPE_TEMPERATURE:
                $converter = new TemperatureConverter($value, $unit);
                break;
            default:
                throw new \Exception("No converter exist for unit type '".$unit->getType()."'" );
        }

        return $converter;
    }
}