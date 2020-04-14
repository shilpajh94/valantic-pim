<?php

namespace AppBundle\Lib\UnitConversion\Converters;

use AppBundle\Lib\UnitConversion\Unit;


class PressureConverter implements IConverter {
    
    private $kpaValue;

    CONST KPA_PSI = 6.89476;
    
    CONST KPA_BAR = 100;
    
    public function __construct(float $value, Unit $unit) {
    
        switch($unit->getName()){
            case Unit::KPA:
                $this->kpaValue = $value;
                break;
            case Unit::BAR:
                $this->kpaValue = $value * self::KPA_BAR;
                break;
            case Unit::PSI:
                $this->kpaValue = $value * self::KPA_PSI;
                break;
            default:
                throw new \Exception("Unit ".$unit." is not handled in pressure converter.");
        }
    }

    public function getValue(Unit $unit): float 
    {
        $returnValue = null;
        
        switch($unit->getName()){
            case Unit::KPA:
                $returnValue = $this->getValueInKPA();
                break;
            case Unit::BAR:
                $returnValue = $this->getValueInBAR();
                break;
            case Unit::PSI:
                $returnValue = $this->getValueInPSI();
                break;
            default:
                throw new \Exception("Unit ".$unit." is not handled in pressure converter.");
        }
    }

    
    private function getValueInKPA(): float
    {
        return $this->kpaValue;
    }
    
    private function getValueInBAR(): float
    {
        return $this->kpaValue / self::KPA_BAR;
    }
    
    private function getValueInPSI(): float
    {
        return $this->kpaValue / self::KPA_PSI;
    }


}
