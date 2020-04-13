<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 13/4/20
 * Time: 12:23 PM
 */

namespace AppBundle\Lib\UnitConversion\Converters;

use AppBundle\Lib\UnitConversion\Unit;

class LengthConverter implements IConverter
{

    public function __construct(float $value, Unit $unit)
    {
        parent::__construct($value, $unit);
    }

    public function getValue(Unit $unit): float
    {
        // TODO: Implement getValue() method.
    }
}