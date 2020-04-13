<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 13/4/20
 * Time: 11:05 AM
 */

namespace AppBundle\Lib\UnitConversion\Converters;

use AppBundle\Lib\UnitConversion\Unit;

class WeightConverter implements IConverter
{

    private $gramValue;

    public function __construct(float $value, Unit $unit)
    {
        if($unit == Unit::KG){
            // calculate the gram value and set in $this->$gramValue
            $this->gramValue = ($value * 1000);

        }elseif($unit == Unit::G){
            // calculate the gram value and set in $this->$gramValue
            $this->gramValue = $value;

        }elseif ($unit == Unit::LBS){
            // calculate the gram value and set in $this->$gramValue
            $this->gramValue = ($value * 453.592);

        }else{
            throw new \Exception("Unit ".$unit." is not handled in weight converter.");
        }

    }

    public function getValue(Unit $unit): float
    {
        $returnValue = null;

        switch ($unit->getName()){
            case Unit::KG:
                $returnValue = $this->getValueInKG();
                break;
            case Unit::G:
                $returnValue = $this->getValueInG();
                break;
            case Unit::LBS:
                $returnValue = $this->getValueInLBS();
                break;
        }

        return $returnValue;

    }



    private function getValueInKG(): float
    {
        // convert from gram to KG

    }

    private function getValueInG(): float
    {

    }

    private function getValueInLBS(): float
    {

    }
}