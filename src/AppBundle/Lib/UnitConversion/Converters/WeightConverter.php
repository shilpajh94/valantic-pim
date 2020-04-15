<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 13/4/20
 * Time: 11:05 AM
 */

namespace AppBundle\Lib\UnitConversion\Converters;

use AppBundle\Lib\UnitConversion\Unit;

/**
 * to handle the weight conversions
 *
 * Class WeightConverter
 * @package AppBundle\Lib\UnitConversion\Converters
 */
class WeightConverter implements IConverter
{
    /**
     * @var float|int
     */
    private $gramValue;
    /**
     * on KG has 1000 G
     */
    CONST G_KG = 1000;
    /**
     * one LBS has 453.592 G
     */
    CONST G_LBS = 453.592;

    /**
     * WeightConverter constructor.
     * @param float $value
     * @param Unit $unit
     * @throws \Exception
     */
    public function __construct(float $value, Unit $unit)
    {
        switch ($unit->getName())
        {
            case Unit::KG:
                $this->gramValue = ($value * self::G_KG);
                break;
            case Unit::G:
                $this->gramValue = $value;
                break;
            case Unit::LBS:
                $this->gramValue = ($value * self::G_LBS);
                break;
            default:
                throw new \Exception("Unit " . $unit . " is not handled in weight converter.");
        }

    }

    /**
     * get value in the given unit
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
            case Unit::KG:
                $returnValue = $this->getValueInKG();
                break;
            case Unit::G:
                $returnValue = $this->getValueInG();
                break;
            case Unit::LBS:
                $returnValue = $this->getValueInLBS();
                break;
            default:
                throw new \Exception("Unit " . $unit . " is not handled in weight converter.");
        }

        return $returnValue;

    }

    /**
     * get value in KG
     *
     * @return float
     */
    private function getValueInKG(): float
    {
        return ($this->gramValue / self::G_KG);
    }

    /**
     * get value for G
     *
     * @return float
     */
    private function getValueInG(): float
    {
        return $this->gramValue;
    }

    /**
     * get value in LBS
     *
     * @return float
     */
    private function getValueInLBS(): float
    {
        return ($this->gramValue / self::G_LBS);
    }
}