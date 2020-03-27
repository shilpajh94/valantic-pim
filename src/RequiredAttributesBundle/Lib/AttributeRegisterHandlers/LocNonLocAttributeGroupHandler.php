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


    public function addEntriesForLocNonLocAttributeGroup($locNonLocConfig, $object,?array $titles)
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

    public function addEntriesForNonLocAttributeGroup(array $config,$object,?array $titles)
    {
        $this->valueGetter->setObject($object);

        foreach($config as $attributeName => $attributeConfig){
            $value = $this->valueGetter->getValueForConfig($attributeConfig,$attributeName);
            $this->register->addEntryInRegister($attributeConfig,$value,AttributeRegister::NON_LOC_IDENTIFIER,$titles);
        }

    }

    public function addEntriesForLocAttributeGroup(array $config,$object,?array $titles)
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


    //TODO: handle labelPrefix here, using an array instead
    public function addEntryForEmptyLocNonLocGroup(array $locNonLocConfig,?array $titles)
    {
        $nonLocConfig = $locNonLocConfig['non_localized'];
        $locConfig = $locNonLocConfig['localized'];

        /**
         * if no object is mapped than all attributes which were to be fetched from mapped object
         * will be treated as null
         */
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