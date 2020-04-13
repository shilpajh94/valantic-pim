<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 13/4/20
 * Time: 10:22 AM
 */

namespace AppBundle\Lib\UnitConversion;


class Unit
{

    CONST UNIT_TYPE_LENGTH = 'LENGTH';

    CONST UNIT_TYPE_WEIGHT = 'WEIGHT';


    CONST KG = 'KG';

    CONST G = 'G';

    CONST LBS = 'LBS';

    CONST MM = 'MM';

    CONST M = 'M';

    CONST FT = 'FT';

    CONST IN = 'IN';


    CONST VALID_UNITS = array(
        self::UNIT_TYPE_LENGTH => array(self::MM, self::M, self::FT, self::IN),
        self::UNIT_TYPE_WEIGHT => array(self::KG, self::G, self::LBS)
    );

    private $name;

    private $type;

    public function __construct(string $unit)
    {
        $unitIsValid = false;

        foreach(self::VALID_UNITS as $type => $validUnits){
            foreach($validUnits as $validUnit){
                if($unit == $validUnit){
                    $this->name = $unit;
                    $this->type = $type;
                    $unitIsValid = true;
                }
            }
        }

        if(!$unitIsValid){
            throw new \Exception("Unit ".$unit." is not a valid unit.You might want to add this unit in Unit::VALID_UNITS");
        }

    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }

}