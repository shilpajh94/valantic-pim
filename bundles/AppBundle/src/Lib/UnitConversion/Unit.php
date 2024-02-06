<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 13/4/20
 * Time: 10:22 AM
 */

namespace AppBundle\Lib\UnitConversion;

/**
 * to encapsulate the quantity unit
 *
 * Class Unit
 * @package AppBundle\Lib\UnitConversion
 */
class Unit
{
    /**
     * unit types
     */
    CONST UNIT_TYPE_LENGTH = 'LENGTH';

    CONST UNIT_TYPE_WEIGHT = 'WEIGHT';

    CONST UNIT_TYPE_TEMPERATURE  = 'TEMPERATURE';

    CONST UNIT_TYPE_PRESSURE = 'PRESSURE';

    /**
     * length units
     */
    CONST MM = 'MM';

    CONST FT = 'FT';

    CONST IN = 'IN';

    CONST DEC = 'DEC';

    CONST M = 'M';


    /**
     * weight units
     */
    CONST KG = 'KG';

    CONST G = 'G';

    CONST LBS = 'LBS';

    /**
     * temperature units
     */
    CONST F = 'F';

    CONST C = 'C';

    /**
     * pressure units
     */
    CONST PSI = 'PSI';

    CONST MPA = 'MPA';

    CONST BAR = 'BAR';

    /**
     * unit type to unit map
     */
    CONST VALID_UNITS = array(
        self::UNIT_TYPE_LENGTH => array(self::MM, self::FT, self::IN, self::DEC, self::M),
        self::UNIT_TYPE_WEIGHT => array(self::KG, self::G, self::LBS),
        self::UNIT_TYPE_TEMPERATURE => array(self::F, self::C),
        self::UNIT_TYPE_PRESSURE => array(self::PSI, self::MPA, self::BAR)
    );
    /**
     * unit name
     * @var string
     */
    private $name;
    /**
     * unit type
     * @var int|string
     */
    private $type;

    /**
     * Unit constructor.
     * @param string $unit
     * @throws \Exception
     */
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
            throw new \Exception("Unit '".$unit."' is not a valid unit.You might want to add this unit in Unit::VALID_UNITS");
        }

    }

    /**
     * @return int|string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }

}