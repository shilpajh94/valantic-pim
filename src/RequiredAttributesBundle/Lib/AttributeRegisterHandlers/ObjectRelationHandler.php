<?php

namespace RequiredAttributesBundle\Lib\AttributeRegisterHandlers;

use RequiredAttributesBundle\Lib\AttributeRegister;

/**
 * class to add entries in the attribute register for 'object_relations' config segment
 *
 * Class ObjectRelationHandler
 * @package RequiredAttributesBundle\Lib\AttributeRegisterHandlers
 */
class ObjectRelationHandler
{
    /**
     * @var AttributeRegister
     */
    private $register;

    /**
     * @var LocNonLocAttributeGroupHandler
     */
    private $locNonLocGroupHandler;

    /**
     * ObjectRelationHandler constructor.
     *
     * @param AttributeRegister $register
     * @param LocNonLocAttributeGroupHandler $locNonLocGroupHandler
     */
    public function __construct(AttributeRegister $register,LocNonLocAttributeGroupHandler $locNonLocGroupHandler)
    {
        $this->register = $register;
        $this->locNonLocGroupHandler = $locNonLocGroupHandler;
    }

    /**
     * root function to add entries for 'object_relations' config segment
     * @Important: this function currently handles 'manyToManyObjectRelation' only
     *
     * @param array $config
     * @param $object
     */
    public function addEntriesForRelationalAttributes(array $config, $object)
    {
        $manyToManyObjectRelationConfig = $config['manyToManyObjectRelation'];

        if($manyToManyObjectRelationConfig){
            $this->addEntriesForManyToManyRelation($manyToManyObjectRelationConfig, $object);
        }
    }

    /**
     * add entries in the attribute register for the 'manyToManyObjectRelation' config segment
     *
     * @param array $config
     * @param $object
     */
    private function addEntriesForManyToManyRelation(array $config,$object){

        foreach($config as $relationAttributeName => $relationalAttributeConfig){
            $relationAttributeLabel = $relationalAttributeConfig['label'];
            $mappedObject = $this->getMappedObjectForManyToManyRelation($object, $relationAttributeName);

            $attributeGroupInRelationClass = $relationalAttributeConfig['mappedClassAttributes'];
            $nonLocConfig = $attributeGroupInRelationClass['non_localized'];
            $locConfig = $attributeGroupInRelationClass['localized'];

            $titles = array($relationAttributeLabel);

            if($mappedObject){
                if($nonLocConfig){
                    $this->locNonLocGroupHandler->addEntriesForNonLocAttributeGroup($nonLocConfig,$mappedObject,$titles);
                }
                if($locConfig){
                    $this->locNonLocGroupHandler->addEntriesForLocAttributeGroup($locConfig,$mappedObject, $titles);
                }

            }else{
                /**
                 * if no object is mapped than all attributes which were to be fetched from mapped object
                 * will be treated as null
                 */
                $this->locNonLocGroupHandler->addEntryForEmptyLocNonLocGroup($attributeGroupInRelationClass,$titles);
            }

        }
    }

    /**
     *
     * @param $product
     * @param $relationAttributeName
     * @return mixed|null
     */
    private function getMappedObjectForManyToManyRelation($product, $relationAttributeName){
        $returnValue = null;

        $getter = 'get'.ucfirst($relationAttributeName);
        $objects = $product->$getter();
        if(is_array($objects) && count($objects) > 0 ){
            $returnValue = $objects[0];
        }
        return $returnValue;
    }

}