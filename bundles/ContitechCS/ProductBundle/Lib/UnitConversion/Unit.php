<?php
/**
 * User: Mahesh Lakher
 * Date: 27/7/2021
 * Time: 02:00 PM
 */

namespace ContitechCS\ProductBundle\Lib\UnitConversion;

/**
 * to encapsulate the quantity unit
 *
 * Class Unit
 * @package ContitechCS\ProductBundle\Lib\UnitConversion
 */
class Unit
{
    /**
     * unit types
     */
    const UNIT_TYPE_LENGTH = 'LENGTH';
    const UNIT_TYPE_WEIGHT = 'WEIGHT';
    

    /**
     * length units
     */
    const MM = 'MM';

    const FT = 'FT';

    const IN = 'IN';

    const DEC = 'DEC';

    const M = 'M';

    /**
     * length units
     */

    /**
     * weight units
     */
    const KG = 'KG';

    const G = 'G';

    const LBS = 'LBS';
    
    const KN_M = 'KN_M';

    const PIW = 'PIW';

    const KG_M_SQR = 'KG_M_SQR';

    const LBS_FOOT_SQR = 'LBS_FOOT_SQR';

    
    /**
     * unit type to unit map
     */
    const VALID_UNITS = array(
        self::UNIT_TYPE_LENGTH => array(self::MM, self::FT, self::IN, self::DEC, self::M),
        self::UNIT_TYPE_WEIGHT => array(self::KG, self::G, self::LBS,
            self::KN_M, self::PIW, self::KG_M_SQR, self::LBS_FOOT_SQR)
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
            throw new \Exception("Unit '".$unit."' is not a valid unit.
                You might want to add this unit in Unit::VALID_UNITS");
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
