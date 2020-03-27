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



    public function addEntryInRegister($attributeConfig, $value, $localizationIdentifier = self::NON_LOC_IDENTIFIER, ?array $titles)
    {
        $this->localizationIdentifier = $localizationIdentifier;
        $attributelabel = $attributeConfig['label'];

        if(!is_array($titles)){
            $titles = array();
        }
        $titles[] = $attributelabel;


        if($value !== null){
            $this->addPopulatedAttribute($titles);
        }else{
            $this->addEmptyAttribute($titles);
        }
        $this->addAllAttribute($titles);
    }

    private function addEmptyAttribute(array $titles)
    {
        $entry = $this->createEntryForRegister($titles);

        if( !(array_key_exists($this->localizationIdentifier,$this->emptyAttributes) && in_array($entry,$this->emptyAttributes[$this->localizationIdentifier]) ) )
        {
            $this->emptyAttributes[$this->localizationIdentifier][] = $entry;
        }
    }

    private function addPopulatedAttribute(array $titles)
    {
        $entry = $this->createEntryForRegister($titles);

        if( !(array_key_exists($this->localizationIdentifier,$this->populatedAttributes) && in_array($entry,$this->populatedAttributes[$this->localizationIdentifier]) ) )
        {
            $this->populatedAttributes[$this->localizationIdentifier][] = $entry;
        }
    }

    private function addAllAttribute(array $titles)
    {
        $entry = $this->createEntryForRegister($titles);

        if( !in_array($entry, $this->allAttributes) )
        {
            $this->allAttributes[] = $entry;
        }
    }

    public function createEntryForRegister(array $titles)
    {
        $returnValue = implode(' -> ',$titles);
        return $returnValue;
    }

}