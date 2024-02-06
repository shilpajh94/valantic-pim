<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 15/4/20
 * Time: 9:23 AM
 */

namespace AppBundle\Lib\UnitConversion\Converters;


use AppBundle\Lib\UnitConversion\Unit;

/**
 * to handle the temperature conversions
 *
 * Class TemperatureConverter
 * @package AppBundle\Lib\UnitConversion\Converters
 */
class TemperatureConverter implements IConverter
{
    /**
     * @var float
     */
    private $cTemp;

    /**
     * TemperatureConverter constructor.
     * @param float $value
     * @param Unit $unit
     * @throws \Exception
     */
    public function __construct(float $value, Unit $unit)
    {
        switch ($unit->getName())
        {
            case Unit::C:
                $this->cTemp = $value;
                break;
            case Unit::F:
                $this->cTemp = $this->convertFToC($value);
                break;
            default:
                throw new \Exception("Unit " . $unit . " is not handled in temperature converter.");
        }

    }

    /**
     * to get the value in given unit
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
            case Unit::C:
                $returnValue = $this->getValueInC();
                break;
            case Unit::F:
                $returnValue = $this->getValueInF();
                break;
            default:
                throw new \Exception("Unit " . $unit . " is not handled in temperature converter.");
        }

        return $returnValue;
    }

    /**
     * return value in F
     *
     * @return float
     */
    private function getValueInF(): float
    {
        return $this->convertCToF($this->cTemp);

    }

    /**
     * return value in C
     *
     * @return float
     */
    private function getValueInC(): float
    {
        return $this->cTemp;
    }

    /**
     * convert from C to F
     *
     * @param float $tempInC
     * @return float
     */
    private function convertCToF(float $tempInC): float
    {
        return ( $tempInC * ( 9 / 5 ) ) + 32;
    }

    /**
     * convert from F to C
     *
     * @param float $tempInF
     * @return float
     */
    private function convertFToC(float $tempInF): float
    {
        return ( $tempInF - 32 ) * ( 5 / 9 ) ;
    }
}