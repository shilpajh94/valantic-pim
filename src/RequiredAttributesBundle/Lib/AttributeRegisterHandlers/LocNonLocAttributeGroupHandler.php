<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/3/20
 * Time: 9:08 AM
 */

namespace RequiredAttributesBundle\Lib\AttributeRegisterHandlers;


use RequiredAttributesBundle\Lib\AttributeRegister;
use RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter\IPimcoreDataTypeValueGetter;

class LocNonLocAttributeGroupHandler
{
    private $register;

    private $valueGetter;

    public function __construct(AttributeRegister $register, IPimcoreDataTypeValueGetter $valueGetter)
    {
        $this->register = $register;
        $this->valueGetter = $valueGetter;
    }

    public function addEntriesForNonLocAttributeGroup($config,$object,$labelPrefix = null)
    {
        $this->valueGetter->setObject($object);

        foreach($config as $attributeName => $attributeConfig){
            $value = $this->valueGetter->getValueForConfig($attributeConfig,$attributeName);
            $this->register->addEntryInRegister($attributeConfig,$value,AttributeRegister::NON_LOC_IDENTIFIER,$labelPrefix);
        }

    }

    public function addEntriesForLocAttributeGroup($config,$object,$labelPrefix = null)
    {
        $systemLanguages = \Pimcore\Tool::getValidLanguages();

        $this->valueGetter->setObject($object);
        /**
         * iterate for all the system languages
         */
        foreach($systemLanguages as $language){
            foreach($config as $attributeName => $attributeConfig){
                $value = $this->valueGetter->getValueForConfig($attributeConfig, $attributeName, $language);
                $this->register->addEntryInRegister($attributeConfig,$value,$language,$labelPrefix);
            }
        }
    }



}