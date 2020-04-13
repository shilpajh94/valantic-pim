<?php

namespace AppBundle\Lib\UnitConversion\Converters;

use AppBundle\Lib\UnitConversion\Unit;

interface IConverter
{
    public function __construct(float $value,Unit $unit);

    public function getValue(Unit $unit): float;

}