<?php

namespace AppBundle\Lib\UnitConversion\Converters;

use AppBundle\Lib\UnitConversion\Unit;

/**
 * contract for a class to be a converter
 *
 * Interface IConverter
 * @package AppBundle\Lib\UnitConversion\Converters
 */
interface IConverter
{
    public function __construct(float $value,Unit $unit);

    public function getValue(Unit $unit): float;

}