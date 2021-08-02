<?php
/**
 * User: Mahesh Lakher
 * Date: 30/07/2021
 * Time: 12:05PM
 */

namespace ContitechCS\ProductBundle\Lib\UnitConversion\Converters;

use ContitechCS\ProductBundle\Lib\UnitConversion\Unit;

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
     * @var float|int
     */
    private $nmValue;

    /**
     * one KN/M has 1,000,000 NM/M
     */
    CONST KN_M = 1000000;

    /**
     * one PIW has 0.175 NM/M
     */
    CONST PIW = 0.175;

    /**
     * @var float|int
     */
    private $g_mmValue;

    /**
     * one KG/m2 has 1000 G/mm2
     */
    CONST KG_M_SQR = 1000;

    /**
     * one lbs/ft2 has 4882.43 Gram Square Meter
     */
    CONST LBS_FOOT_SQR = 4882.43;

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
            case Unit::KG_M_SQR:
                $this->g_mmValue = ($value * self::KG_M_SQR);
                break;
            case Unit::LBS_FOOT_SQR:
                $this->g_mmValue = ($value * self::LBS_FOOT_SQR);
                break;
            case Unit::KN_M:
                $this->nmValue = ($value * self::KN_M);
                break;
            case Unit::PIW:
                $this->nmValue = ($value * self::PIW) * self::KN_M;
                break;
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
            case Unit::KG_M_SQR:
                $returnValue = $this->getValueInKGMSQR();
                break;
            case Unit::LBS_FOOT_SQR:
                $returnValue = $this->getValueInLBSFOOTSQR();
                break;
            case Unit::KN_M:
                $returnValue = $this->getValueInKNM();
                break;
            case Unit::PIW:
                $returnValue = $this->getValueInPIW();
                break;
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
     * get value in KNM
     *
     * @return float
     */
    private function getValueInKGMSQR(): float
    {
        return ($this->g_mmValue / self::KG_M_SQR);
    }

    /**
     * get value in KNM
     *
     * @return float
     */
    private function getValueInLBSFOOTSQR(): float
    {
        return ($this->g_mmValue / self::LBS_FOOT_SQR);
    }

    /**
     * get value in KNM
     *
     * @return float
     */
    private function getValueInKNM(): float
    {
        return ($this->nmValue / self::KN_M);
    }

    /**
     * get value in PIW
     *
     * @return float
     */
    private function getValueInPIW(): float
    {
        return ($this->nmValue * 5.71) / self::KN_M;
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