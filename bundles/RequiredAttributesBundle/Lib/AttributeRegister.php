<?php

/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/3/20
 * Time: 8:45 AM
 */

namespace RequiredAttributesBundle\Lib;

/**
 * class responsible for maintaining the collection of empty and populated attributes
 *
 * Class AttributeRegister
 * @package RequiredAttributesBundle\Lib
 */
class AttributeRegister
{
    /**
     * @var array : register for empty attributes
     */
    private $emptyAttributes = array();
    /**
     * @var array : register for populated attributes
     */
    private $populatedAttributes = array();
    /**
     * @var array : register for all the attributes
     */
    private $allAttributes = array();
    /**
     * @var : to indicate the language in each of the attribute register
     */
    private $localizationIdentifier;
    /**
     * @var : to be treated as the index in registers for non localized attributes
     */
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


    /**
     * root function to add entry in the attribute register
     *
     * @param $attributeConfig
     * @param $value
     * @param string $localizationIdentifier
     * @param array|null $titles
     */
    public function addEntryInRegister($attributeConfig, $value,
    $localizationIdentifier = self::NON_LOC_IDENTIFIER, array $titles)
    {
        $this->localizationIdentifier = $localizationIdentifier;
        $attributelabel = $attributeConfig['label'];

        $titles[] = $attributelabel;

        if ($value !== null) {
            $this->addPopulatedAttribute($titles);
        } else {
            $this->addEmptyAttribute($titles);
        }
        $this->addAllAttribute($titles);
    }

    /**
     * add entry in the empty attribute register
     *
     * @param array $titles
     */
    private function addEmptyAttribute(array $titles)
    {
        $entry = $this->createEntryForRegister($titles);

        if (!(array_key_exists($this->localizationIdentifier, $this->emptyAttributes) &&
        in_array($entry, $this->emptyAttributes[$this->localizationIdentifier]))) {
            $this->emptyAttributes[$this->localizationIdentifier][] = $entry;
        }
    }

    /**
     * add entry in the populated attribute register
     *
     * @param array $titles
     */
    private function addPopulatedAttribute(array $titles)
    {
        $entry = $this->createEntryForRegister($titles);

        if (!(array_key_exists($this->localizationIdentifier, $this->populatedAttributes) &&
        in_array($entry, $this->populatedAttributes[$this->localizationIdentifier]))) {
            $this->populatedAttributes[$this->localizationIdentifier][] = $entry;
        }
    }

    /**
     * add entry in the all attribute register
     *
     * @param array $titles
     */
    private function addAllAttribute(array $titles)
    {
        $entry = $this->createEntryForRegister($titles);

        if (!in_array($entry, $this->allAttributes)) {
            $this->allAttributes[] = $entry;
        }
    }

    /**
     * create entry string from the $titles array by merging elements in the array
     *
     * @param array $titles
     * @return string
     */
    public function createEntryForRegister(array $titles)
    {
        return implode(' -> ', $titles);
    }
}

