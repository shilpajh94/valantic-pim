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
//        $nonLocConfig = $this->config['non_localized'];
//        if($nonLocConfig){
//            $this->locNonLocGroupHandler->addEntriesForNonLocAttributeGroup($nonLocConfig,$this->product,null);
//        }
//
//        // localized handling
//        $locConfig = $this->config['localized'];
//        if($locConfig){
//            $this->locNonLocGroupHandler->addEntriesForLocAttributeGroup($locConfig,$this->product,null);
//        }
//
//
//        // object_relations handling
//        $objectRelationConfig = $this->config['object_relations'];
//        if($objectRelationConfig){
//            $this->objectRelationHandler->addEntriesForRelationalAttributes($objectRelationConfig,$this->product);
//        }

        // object brick handling
        $objectBrickConfig = $this->config['object_bricks'];
        if($objectBrickConfig){
            $this->objectBrickHandler->addEntriesForObjectBricks($objectBrickConfig,$this->product);
        }

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