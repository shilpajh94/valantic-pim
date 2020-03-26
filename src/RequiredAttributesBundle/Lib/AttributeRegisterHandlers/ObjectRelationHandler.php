<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/3/20
 * Time: 9:07 AM
 */

namespace RequiredAttributesBundle\Lib\AttributeRegisterHandlers;


use RequiredAttributesBundle\Lib\AttributeRegister;

class ObjectRelationHandler
{

    private $register;

    private $locNonLocGroupHandler;

    public function __construct(AttributeRegister $register,LocNonLocAttributeGroupHandler $locNonLocGroupHandler)
    {
        $this->register = $register;
        $this->locNonLocGroupHandler = $locNonLocGroupHandler;
    }

    public function addEntriesForManyToManyRelation($config,$object){

        foreach($config as $relationAttributeName => $attributeConfig){
            $relationAttributeLabel = $attributeConfig['label'];
            $mappedObject = $this->getMappedObjectForManyToManyRelation($object, $relationAttributeName);

            $attributeGroupInRelationClass = $attributeConfig['mappedClassAttributes'];
            $nonLocConfig = $attributeGroupInRelationClass['non_localized'];
            $locConfig = $attributeGroupInRelationClass['localized'];

            if($mappedObject){
                $this->locNonLocGroupHandler->addEntriesForNonLocAttributeGroup($nonLocConfig,$mappedObject,$relationAttributeLabel);

                $this->locNonLocGroupHandler->addEntriesForLocAttributeGroup($locConfig,$mappedObject, $relationAttributeLabel);
            }else{
                /**
                 * if no object is mapped than all attributes which were to be fetched from mapped object
                 * will be treated as null
                 */
                foreach($nonLocConfig as $attributeName => $attributeConfig ){
                    $this->register->addEntryInRegister($attributeConfig,null,AttributeRegister::NON_LOC_IDENTIFIER,$relationAttributeLabel);
                }

                $systemLanguages = \Pimcore\Tool::getValidLanguages();
                foreach($systemLanguages as $language){
                    foreach($locConfig as $attributeName => $attributeConfig ){
                        $this->register->addEntryInRegister($attributeConfig,null,$language,$relationAttributeLabel);
                    }
                }

            }

        }
    }

    public function getMappedObjectForManyToManyRelation($product, $relationAttributeName){
        $returnValue = null;

        $getter = 'get'.ucfirst($relationAttributeName);
        $objects = $product->$getter();
        if(is_array($objects) && count($objects) > 0 ){
            $returnValue = $objects[0];
        }
        return $returnValue;
    }

}