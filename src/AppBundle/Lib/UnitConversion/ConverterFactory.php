<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 13/4/20
 * Time: 1:17 PM
 */

namespace AppBundle\Lib\UnitConversion;


use AppBundle\Lib\UnitConversion\Converters\IConverter;
use AppBundle\Lib\UnitConversion\Converters\LengthConverter;
use AppBundle\Lib\UnitConversion\Converters\WeightConverter;

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
            default:
                throw new \Exception("No converter exist for unit ".$unit);
        }

        return $converter;
    }
}