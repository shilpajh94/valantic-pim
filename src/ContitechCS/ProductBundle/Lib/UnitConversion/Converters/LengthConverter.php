<?php
/**
 * User: Mahesh Lakher
 * Date: 27/7/2021
 * Time: 02:10 PM
 */

namespace ContitechCS\ProductBundle\Lib\UnitConversion\Converters;

use ContitechCS\ProductBundle\Lib\UnitConversion\Unit;

/**
 * to handle the length conversions
 *
 * Class LengthConverter
 * @package ContitechCS\ProductBundle\Lib\UnitConversion\Converters
 */
class LengthConverter implements IConverter
{
    /**
     * @var float
     */
    private $mmValue;

    /**
     * one IN has 25.4 MM
     */
    CONST MM_IN = 25.4;

    /**
     * one FT has 304.8 MM
     */
    CONST MM_FT = 304.8;

    /**
     * @TODO: assuming decimeter for now, need confirmation
     * one DEC has 100 MM
     */
    CONST MM_DEC = 100;
    /**
     * one M has 1000 MM
     */
    CONST MM_M = 1000;

    /**
     * LengthConverter constructor.
     * @param float $value
     * @param Unit $unit
     * @throws \Exception
     */
    public function __construct(float $value, Unit $unit)
    {
        switch ($unit->getName())
        {
            case Unit::MM:
                $this->mmValue = $value;
                break;
            case Unit::IN:
                $this->mmValue = $value * self::MM_IN;
                break;
            case Unit::FT:
                $this->mmValue = $value * self::MM_FT;
                break;
            case Unit::DEC:
                $this->mmValue = $value * self::MM_DEC;
                break;
            case Unit::M:
                $this->mmValue = $value * self::MM_M;
                break;
            default:
                throw new \Exception("Unit " . $unit . " is not handled in length converter.");
        }

    }

    /**
     * get the value in given unit
     *
     * @param Unit $unit
     * @return float
     * @throws \Exception
     */
    public function getValue(Unit $unit): float
    {
        $returnValue = null;

        switch ($unit->getName())
        {
            case Unit::MM:
                $returnValue = $this->getValueInMM();
                break;
            case Unit::IN:
                $returnValue = $this->getValueInIN();
                break;
            case Unit::FT:
                $returnValue = $this->getValueInFT();
                break;
            case Unit::DEC:
                $returnValue = $this->getValueInDEC();
                break;
            case Unit::M:
                $returnValue = $this->getValueInM();
                break;
            default:
                throw new \Exception("Unit " . $unit . " is not handled in length converter.");
        }
        return $returnValue;
    }

    /**
     * get value in MM
     *
     * @return float
     */
    private function getValueInMM(): float
    {
        return $this->mmValue;
    }

    /**
     * get value in IN
     *
     * @return float
     */
    private function getValueInIN(): float
    {
        return $this->mmValue / self::MM_IN;
    }

    /**
     * get value in FT
     *
     * @return float
     */
    private function getValueInFT(): float
    {
        return $this->mmValue / self::MM_FT;
    }

    /**
     * get value in DEC
     *
     * @return float
     */
    private function getValueInDEC(): float
    {
        return $this->mmValue / self::MM_DEC;
    }

    /**
     * get value in M
     *
     * @return float
     */
    private function getValueinM(): float
    {
        return $this->mmValue / self::MM_M;
    }


}