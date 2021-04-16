<?php

namespace AppBundle\Lib\UnitConversion;


class WeightPerLengthConverter
{
    const UNIT_LBS_PER_FT = "LBS_PER_FT";

    const UNIT_KG_PER_FT = "KG_PER_FT";

    const UNIT_G_PER_FT = "G_PER_FT";

    const UNIT_KG_PER_M = "KG_PER_M";

    const UNIT_G_PER_M = "G_PER_M";

    const VALID_UNITS = array(
        self::UNIT_LBS_PER_FT,
        self::UNIT_KG_PER_FT,
        self::UNIT_G_PER_FT,
        self::UNIT_KG_PER_M,
        self::UNIT_G_PER_M
    );

    const CONVERSION_RATIOS = array(
        self::UNIT_LBS_PER_FT => array(
            self::UNIT_KG_PER_M => 1.48816,
            self::UNIT_G_PER_M => 1488.16,
            self::UNIT_LBS_PER_FT => 1,
            self::UNIT_KG_PER_FT => 0.453592,
            self::UNIT_G_PER_FT => 453.592
            
        ),
        self::UNIT_KG_PER_FT => array(
            self::UNIT_KG_PER_M => 3.28084,
            self::UNIT_G_PER_M => 3280.84,
            self::UNIT_LBS_PER_FT => 2.20462,
            self::UNIT_KG_PER_FT => 1,
            self::UNIT_G_PER_FT => 1000
        ),
        self::UNIT_G_PER_FT => array(
            self::UNIT_KG_PER_M => 0.00328084,
            self::UNIT_G_PER_M => 3.28084,
            self::UNIT_LBS_PER_FT => 0.00220462,
            self::UNIT_KG_PER_FT => 0.001,
            self::UNIT_G_PER_FT => 1
        ),
        self::UNIT_KG_PER_M => array(
            self::UNIT_KG_PER_M => 1,
            self::UNIT_G_PER_M => 1000,
            self::UNIT_LBS_PER_FT => 0.671969,
            self::UNIT_KG_PER_FT => 3.28084,
            self::UNIT_G_PER_FT => 304.8
        ),
        self::UNIT_G_PER_M => array(
            self::UNIT_KG_PER_M => 0.001,
            self::UNIT_G_PER_M =>1,
            self::UNIT_LBS_PER_FT => 0.000671969,
            self::UNIT_KG_PER_FT => 0.0003048,
            self::UNIT_G_PER_FT => 0.3048
        )
    );

    public function convert(string $sourceUnit,string $destUnit,?float $sourceValue): ?float
    {
        if(!in_array($sourceUnit,self::VALID_UNITS) ){
           throw new \Exception("Source unit " . $sourceUnit . " is not handled for conversion");
        }

        if(!in_array($destUnit,self::VALID_UNITS) ){
            throw new \Exception("Destination unit " . $destUnit . " is not handled for conversion");
        }

        if($sourceValue === null){
            return null;
        }
        // echo "sourceUnit -".$sourceUnit."\n";
        // echo "destUnit -".$destUnit."\n";
        // p_r(self::CONVERSION_RATIOS[$sourceUnit][$destUnit]);
        $conversionRatio = self::CONVERSION_RATIOS[$sourceUnit][$destUnit];
        // echo "conversionRatio -".$conversionRatio."\n";
        // echo "sourceValue -".$sourceValue."\n";
        return round($sourceValue * $conversionRatio,5);
    }

}
