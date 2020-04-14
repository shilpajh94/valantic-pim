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
    private $mmValue;
    
    /**
    * one IN has 25.4 mm
    */
    CONST MM_IN = 25.4;
    
    CONST MM_FT = 304.8;
    // assuming decimeter for now
    CONST MM_DEC = 100;
    
    public function __construct(float $value, Unit $unit)
    {
        
        switch ($unit->getName()){
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
            default:
                throw new \Exception("Unit ".$unit." is not handled in length converter.");
        }
                
    }

    public function getValue(Unit $unit): float
    {
        $returnValue = null;
        
        switch ($unit->getName()){
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
                $returnValue = $this->getValueInDec();
                break;
            default:
                throw new \Exception("Unit ".$unit." is not handled in length converter.");
        }
    }
    
    private function getValueInMM(): float
    {
        return $this->mmValue;
    }
    
    private function getValueInIN(): float
    {
        return $this->mmValue / self::MM_IN;
    }
    
    private function getValueInFT():float
    {
        return $this->mmValue / self::MM_FT;
    }
    
    private function getValueInDec(): float
    {
        return $this->mmValue / self::MM_DEC;
    }
            
    
}