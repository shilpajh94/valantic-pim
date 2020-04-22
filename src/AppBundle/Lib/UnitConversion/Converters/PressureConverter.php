<?php

namespace AppBundle\Lib\UnitConversion\Converters;

use AppBundle\Lib\UnitConversion\Unit;

/**
 * to handle the pressure conversions
 *
 * Class PressureConverter
 * @package AppBundle\Lib\UnitConversion\Converters
 */
class PressureConverter implements IConverter
{
    /**
     * @var float|int
     */
    private $psiValue;

    /**
     * on MPA has 145.038 PSI
     */
    CONST PSI_MPA = 145.038;

    /**
     * one BAR has 14.5038 PSI
     */
    CONST PSI_BAR = 14.5038;

    /**
     * PressureConverter constructor.
     * @param float $value
     * @param Unit $unit
     * @throws \Exception
     */
    public function __construct(float $value, Unit $unit)
    {
        switch ($unit->getName())
        {
            case Unit::PSI:
                $this->psiValue = $value;
                break;
            case Unit::MPA:
                $this->psiValue = ($value * self::PSI_MPA);
                break;
            case Unit::BAR:
                $this->psiValue = ($value * self::PSI_BAR);
                break;

            default:
                throw new \Exception("Unit " . $unit . " is not handled in pressure converter.");
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
            case Unit::PSI:
                $returnValue = $this->getValueInPSI();
                break;
            case Unit::MPA:
                $returnValue = $this->getValueInMPA();
                break;
            case Unit::BAR:
                $returnValue = $this->getValueInBAR();
                break;
            default:
                throw new \Exception("Unit " . $unit . " is not handled in pressure converter.");
        }

        return $returnValue;
    }

    /**
     * get the value in MPA
     *
     * @return float
     */
    private function getValueInMPA(): float
    {
        return $this->psiValue / self::PSI_MPA;
    }

    /**
     * get the value in BAR
     *
     * @return float
     */
    private function getValueInBAR(): float
    {
        return $this->psiValue / self::PSI_BAR;
    }

    /**
     * get the value in PSI
     *
     * @return float
     */
    private function getValueInPSI(): float
    {
        return $this->psiValue;
    }


}
