<?php

namespace AppBundle\OptionProvider;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class GenericOptionsProvider implements SelectOptionsProviderInterface {

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {
        $allAvailablelArray = array();
        $displayFieldData = $fieldDefinition->getOptionsProviderData();
        if ($displayFieldData) {
            $displayFieldData = explode("|", $displayFieldData);
            if (is_array($displayFieldData) && count($displayFieldData) > 1) {
                $className = $displayFieldData[0];
                $displayFieldName = $displayFieldData[1];
                $listingClassName = "\\Pimcore\\Model\\DataObject\\" . $className . "\\Listing";
                $listingObject = new $listingClassName();
                $listingObject->setOrderKey($displayFieldName);
                $listingObject->setOrder("ASC");
                foreach ($listingObject as $object) {
                    $displayFieldGetter = "get" . ucfirst($displayFieldName);
                    $name = $object->$displayFieldGetter();
                    $allAvailablelArray[] = array(
                        "key" => $name, "value" => $name
                    );
                }
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
        return $fieldDefinition->getDefaultValue();
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
