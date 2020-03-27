<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/3/20
 * Time: 1:54 PM
 */

namespace RequiredAttributesBundle\Lib;


use Pimcore\Model\DataObject\Product;
use RequiredAttributesBundle\Lib\AttributeRegisterHandlers\LocNonLocAttributeGroupHandler;
use RequiredAttributesBundle\Lib\AttributeRegisterHandlers\ObjectBrickHandler;
use RequiredAttributesBundle\Lib\AttributeRegisterHandlers\ObjectRelationHandler;
use RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter\DefaultValueGetter;

class RequiredAttributeManager
{
    private $config;

    private $product;

    private $locNonLocGroupHandler;

    private $objectRelationHandler;

    private $objectBrickHandler;

    private $attributeRegister;

    private $valueGetter;

    public function __construct(array $config, Product $product)
    {
        $this->config = $config;
        $this->product = $product;

        $this->attributeRegister = new AttributeRegister();
        $this->valueGetter = new DefaultValueGetter();

        $this->locNonLocGroupHandler = new LocNonLocAttributeGroupHandler($this->attributeRegister,$this->valueGetter);

        $this->objectRelationHandler = new ObjectRelationHandler($this->attributeRegister,$this->locNonLocGroupHandler);

        $this->objectBrickHandler = new ObjectBrickHandler($this->attributeRegister,$this->locNonLocGroupHandler);

        $this->writeRegister();
    }

    private function writeRegister()
    {

        // non_localized handling
        $nonLocConfig = $this->config['non_localized'];
        if($nonLocConfig){
            $this->locNonLocGroupHandler->addEntriesForNonLocAttributeGroup($nonLocConfig,$this->product,null);
        }

        // localized handling
        $locConfig = $this->config['localized'];
        if($locConfig){
            $this->locNonLocGroupHandler->addEntriesForLocAttributeGroup($locConfig,$this->product,null);
        }

        // object_relations handling
        $objectRelationConfig = $this->config['object_relations'];
        if($objectRelationConfig){
            $this->objectRelationHandler->addEntriesForRelationalAttributes($objectRelationConfig,$this->product);
        }

        // object brick handling
        $objectBrickConfig = $this->config['object_bricks'];
        if($objectBrickConfig){
            $this->objectBrickHandler->addEntriesForObjectBricks($objectBrickConfig,$this->product);
        }

    }

    public function getEmptyAttributes(): array
    {
        return $this->attributeRegister->getEmptyAttributes();
    }

    public function getPopulatedAttributes(): array
    {
        return $this->attributeRegister->getPopulatedAttributes();
    }

    public function getAllAttributes(): array
    {
        return $this->attributeRegister->getAllAttributes();
    }

    public function getPopulatedAttributeCountForLanguage($language): int
    {
        $populatedAttributes = $this->getPopulatedAttributes();

        $nonLocPopulatedAttributeCount = 0;
        if(array_key_exists(AttributeRegister::NON_LOC_IDENTIFIER,$populatedAttributes)){
            $nonLocPopulatedAttributeCount = count($populatedAttributes[AttributeRegister::NON_LOC_IDENTIFIER]);
        }

        $locPopulatedAttributeCount = 0;
        if(array_key_exists($language,$populatedAttributes)){
            $locPopulatedAttributeCount = count($populatedAttributes[$language]);
        }

        return ($nonLocPopulatedAttributeCount + $locPopulatedAttributeCount);
    }

    public function getPopulatedPercentageForLanguage(string $language): float
    {
        $countOfAllAttributes = count($this->getAllAttributes());

        $countOfPopulatedAttributes = $this->getPopulatedAttributeCountForLanguage($language);

        return round(( $countOfPopulatedAttributes / $countOfAllAttributes ) * 100,2);
    }


}