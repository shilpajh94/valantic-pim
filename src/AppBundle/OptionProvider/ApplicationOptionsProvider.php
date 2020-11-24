<?php

namespace AppBundle\OptionProvider;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use AppBundle\Services\OptionProviderCacheService;

class ApplicationOptionsProvider implements SelectOptionsProviderInterface {

    private $optionProvider;

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {

        $this->optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $allAvailablelArray = array();
        $type = $fieldDefinition->getOptionsProviderData();
        if ($type) {
            $className = "Applications";

            $cacheClassName = $className.'~'.$type;
            if(!$this->optionProvider->isCacheAvailableForClass($cacheClassName))
            {
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

                if(!empty($allAvailablelArray))
                {
                    $this->optionProvider->setCachedOptionProviders($cacheClassName);
                    $this->optionProvider->setAllOptionsInCacheForClass($cacheClassName, $allAvailablelArray);
                }
            }
            else
            {
                $allAvailablelArray = $this->optionProvider->getCachedKeyData($cacheClassName);
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
