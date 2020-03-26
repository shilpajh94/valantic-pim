<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/3/20
 * Time: 8:45 AM
 */

namespace RequiredAttributesBundle\Lib;


class AttributeRegister
{
    private $emptyAttributes = array();

    private $populatedAttributes = array();

    private $allAttributes = array();


    public function addEntryInRegister($attributeConfig, $value, $labelPrefix){
        if($value){
            $this->addPopulatedAttribute($attributeConfig['label'], $labelPrefix);
        }else{
            $this->addEmptyAttribute($attributeConfig['label'], $labelPrefix);
        }
        $this->addAllAttribute($attributeConfig['label'], $labelPrefix);
    }

    private function addEmptyAttribute(string $attributeLabel, string $labelPrefix)
    {
        $entry = $this->createEntryForRegister($attributeLabel,$labelPrefix);
        $this->emptyAttributes[] = $entry;
    }

    private function addPopulatedAttribute(string $attributeLabel, string $labelPrefix)
    {
        $entry = $this->createEntryForRegister($attributeLabel,$labelPrefix);
        $this->populatedAttributes[] = $entry;
    }

    private function addAllAttribute(string $attributeLabel, string $labelPrefix)
    {
        $entry = $this->createEntryForRegister($attributeLabel,$labelPrefix);
        $this->allAttributes[] = $entry;
    }


    private function createEntryForRegister(string $attributeLabel, string $labelPrefix)
    {
        return $labelPrefix ? $labelPrefix . ' -> '.$attributeLabel : $attributeLabel;
    }

}