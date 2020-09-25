<?php

namespace AppBundle\OptionProvider;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class ApplicationOptionsProvider implements SelectOptionsProviderInterface {

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {
        $allAvailablelArray = array();
        $type = $fieldDefinition->getOptionsProviderData();
        if ($type) {
            $className = "Applications";
            $listingClassName = "\\Pimcore\\Model\\DataObject\\" . $className . "\\Listing";
            $listingObject = new $listingClassName();
            $listingObject->setCondition("ApplicationType = ".$listingObject->quote($type));
            $listingObject->setOrderKey("Name");
            $listingObject->setOrder("ASC");
            foreach ($listingObject as $object) {
                $name = $object->getName();
                $allAvailablelArray[] = array(
                    "key" => $name, "value" => $object->getId()
                );
            }
        }
        return $allAvailablelArray;
    }

    /**
     * Returns the value which is defined in the 'Default value' field  
     * @param $context array
     * @param $fieldDefinition Data
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition) {
        return true; //return $fieldDefinition->getDefaultValue();
    }

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition) {
        return true;
    }

}
