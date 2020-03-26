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
use RequiredAttributesBundle\Lib\AttributeRegisterHandlers\ObjectRelationHandler;
use RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter\DefaultValueGetter;

class RequiredAttributeManager
{
    private $config;

    private $product;

    private $locNonLocGroupHandler;

    private $objectRelationHandler;

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

        $this->writeRegister();
    }

    private function writeRegister(){

//        $nonLocConfig = $this->config['non_localized'];
//
//        $this->locNonLocGroupHandler->addEntriesForNonLocAttributeGroup($nonLocConfig,$this->product);
//
//        $locConfig = $this->config['localized'];
//
//        $this->locNonLocGroupHandler->addEntriesForLocAttributeGroup($locConfig,$this->product);

        $objectRelationConfig = $this->config['object_relations'];
        $manyToManyObjectRelationConfig = $objectRelationConfig['manyToManyObjectRelation'];

        $this->objectRelationHandler->addEntriesForManyToManyRelation($manyToManyObjectRelationConfig, $this->product);

    }

    public function getEmptyAttributes()
    {
        return $this->attributeRegister->getEmptyAttributes();
    }

    public function getPopulatedAttributes()
    {
        return $this->attributeRegister->getPopulatedAttributes();
    }

    public function getAllAttributes(){
        return $this->attributeRegister->getAllAttributes();
    }

}