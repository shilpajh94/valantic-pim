<?php

namespace RequiredAttributesBundle\Lib\AttributeRegisterHandlers;

use RequiredAttributesBundle\Lib\AttributeRegister;
use RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter\IPimcoreDataTypeValueGetter;

/**
 * class to add entries in the attribute register for localized config segment and
 * non localized config segment
 *
 * Class LocNonLocAttributeGroupHandler
 * @package RequiredAttributesBundle\Lib\AttributeRegisterHandlers
 */
class LocNonLocAttributeGroupHandler
{
    /**
     * @var AttributeRegister
     */
    private $register;

    /**
     * @var IPimcoreDataTypeValueGetter
     */
    private $valueGetter;

    /**
     * LocNonLocAttributeGroupHandler constructor.
     *
     * @param AttributeRegister $register
     * @param IPimcoreDataTypeValueGetter $valueGetter
     */
    public function __construct(AttributeRegister $register, IPimcoreDataTypeValueGetter $valueGetter)
    {
        $this->register = $register;
        $this->valueGetter = $valueGetter;
    }

    /**
     * root function to be called passing config array containing 'non_localized' and 'localized' as indices
     *
     * @param $locNonLocConfig
     * @param $object
     * @param array|null $titles: add entries in this array to prepend title strings
     */
    public function addEntriesForLocNonLocAttributeGroup($locNonLocConfig, $object,array $titles)
    {
        $nonLocConfig = $locNonLocConfig['non_localized'];
        $locConfig = $locNonLocConfig['localized'];

        if($nonLocConfig){
            $this->addEntriesForNonLocAttributeGroup($nonLocConfig,$object,$titles);
        }
        if($locConfig){
            $this->addEntriesForLocAttributeGroup($locConfig,$object,$titles);
        }

    }

    /**
     * add entries in the attribute register for 'non_localized' attribute group
     *
     * @param array $config
     * @param $object
     * @param array|null $titles
     */
    public function addEntriesForNonLocAttributeGroup(array $config,$object,array $titles)
    {
        $this->valueGetter->setObject($object);

        foreach($config as $attributeName => $attributeConfig){
            $value = $this->valueGetter->getValueForConfig($attributeConfig,$attributeName);
            $this->register->addEntryInRegister($attributeConfig,$value,AttributeRegister::NON_LOC_IDENTIFIER,$titles);
        }

    }

    /**
     * add entries in the attribute register for 'localized' attribute group
     *
     * @param array $config
     * @param $object
     * @param array|null $titles
     */
    public function addEntriesForLocAttributeGroup(array $config,$object,array $titles)
    {
        $systemLanguages = \Pimcore\Tool::getValidLanguages();

        $this->valueGetter->setObject($object);
        /**
         * iterate for all the system languages
         */
        foreach($systemLanguages as $language){
            foreach($config as $attributeName => $attributeConfig){
                $value = $this->valueGetter->getValueForConfig($attributeConfig, $attributeName, $language);
                $this->register->addEntryInRegister($attributeConfig,$value,$language,$titles);
            }
        }
    }


    /**
     * this function is responsible for adding entries in the register for the 'localized' and 'non_localized'
     * attribute group for which it is already known that the value does not exist
     *
     * so this function increment the attribute register for each attribute treating the value for the attribute to be
     * null
     *
     * @param array $locNonLocConfig
     * @param array|null $titles
     */
    public function addEntryForEmptyLocNonLocGroup(array $locNonLocConfig,array $titles)
    {
        $nonLocConfig = $locNonLocConfig['non_localized'];
        $locConfig = $locNonLocConfig['localized'];

        if($nonLocConfig){
            foreach($nonLocConfig as $attributeName => $attributeConfig ){
                $this->register->addEntryInRegister($attributeConfig,null,AttributeRegister::NON_LOC_IDENTIFIER,$titles);
            }
        }

        if($locConfig){
            $systemLanguages = \Pimcore\Tool::getValidLanguages();
            foreach($systemLanguages as $language){
                foreach($locConfig as $attributeName => $attributeConfig ){
                    $this->register->addEntryInRegister($attributeConfig,null,$language,$titles);
                }
            }
        }

    }



}