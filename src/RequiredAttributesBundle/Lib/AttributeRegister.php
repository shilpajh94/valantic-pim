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

    private $localizationIdentifier;

    const NON_LOC_IDENTIFIER = 'non_loc';
    /**
     * @return array
     */
    public function getEmptyAttributes(): array
    {
        return $this->emptyAttributes;
    }

    /**
     * @return array
     */
    public function getPopulatedAttributes(): array
    {
        return $this->populatedAttributes;
    }

    /**
     * @return array
     */
    public function getAllAttributes(): array
    {
        return $this->allAttributes;
    }



    public function addEntryInRegister($attributeConfig, $value, $localizationIdentifier = self::NON_LOC_IDENTIFIER, $labelPrefix = null)
    {
        $this->localizationIdentifier = $localizationIdentifier;

        if($value){
            $this->addPopulatedAttribute($attributeConfig['label'], $labelPrefix);
        }else{
            $this->addEmptyAttribute($attributeConfig['label'], $labelPrefix);
        }
        $this->addAllAttribute($attributeConfig['label'], $labelPrefix);
    }

    private function addEmptyAttribute(string $attributeLabel, ?string $labelPrefix)
    {
        $entry = $this->createEntryForRegister($attributeLabel,$labelPrefix);

        if( !(array_key_exists($this->localizationIdentifier,$this->emptyAttributes) && in_array($entry,$this->emptyAttributes[$this->localizationIdentifier]) ) )
        {
            $this->emptyAttributes[$this->localizationIdentifier][] = $entry;
        }
    }

    private function addPopulatedAttribute(string $attributeLabel, ?string $labelPrefix)
    {
        $entry = $this->createEntryForRegister($attributeLabel,$labelPrefix);

        if( !(array_key_exists($this->localizationIdentifier,$this->populatedAttributes) && in_array($entry,$this->populatedAttributes[$this->localizationIdentifier]) ) )
        {
            $this->populatedAttributes[$this->localizationIdentifier][] = $entry;
        }
    }

    private function addAllAttribute(string $attributeLabel, ?string $labelPrefix)
    {
        $entry = $this->createEntryForRegister($attributeLabel,$labelPrefix);

        if( !in_array($entry, $this->allAttributes) )
        {
            $this->allAttributes[] = $entry;
        }
    }

    public function createEntryForRegister(string $attributeLabel, ?string $labelPrefix)
    {
        return $labelPrefix ? $labelPrefix . ' -> '.$attributeLabel : $attributeLabel;
    }



}