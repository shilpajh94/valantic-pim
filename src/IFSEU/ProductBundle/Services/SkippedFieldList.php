<?php

namespace IFSEU\ProductBundle\Services;


class SkippedFieldList
{
    public static function completenessPercentageList()
    {
        return [
                "Category", 
                "Sub_Category",
                "FeaturesBenefitsBulletPoint",
                "TemporaryUntilC",
                "TemporaryUntilT",
                "JustTemporarily",
                "DampableUntil1C",
                "DampableUntil1T",
                "DampableUntil2T", 
                "DampableUntil2C", 
                "PressureUntil",
                "OnlyOpenSystem",
                "TemperatureNote",
                "Marking2",
                "Note2InformationBelowTable",  
                "negativeToleranceIdMM",
                "PositiveToleranceIdMM",
                "negativeToleranceWtMM",
                "PositiveToleranceWtMM",
                "negativeToleranceOdMM",
                "PositiveToleranceOdMM",
                "VacuumBar",
                "VacuumMM",
                "testPressureBar",
                "testPressurePSI",
                "MinimumOrder"   
        ];
    }
}
                                              