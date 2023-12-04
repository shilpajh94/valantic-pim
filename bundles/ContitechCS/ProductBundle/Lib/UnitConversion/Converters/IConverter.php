<?php

namespace ContitechCS\ProductBundle\Lib\UnitConversion\Converters;

use ContitechCS\ProductBundle\Lib\UnitConversion\Unit;

/**
 * contract for a class to be a converter
 *
 * Interface IConverter
 * @package ContitechCS\ProductBundle\Lib\UnitConversion\Converters
 */
interface IConverter
{
    public function __construct(float $value,Unit $unit);

    public function getValue(Unit $unit): float;

}