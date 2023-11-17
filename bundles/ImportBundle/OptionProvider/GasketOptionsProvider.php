<?php

namespace ImportBundle\OptionProvider;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class GasketOptionsProvider implements SelectOptionsProviderInterface
{

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition)
    {
        $optionsData = [];

        $gasketList = new DataObject\Gasket\Listing();


        $gasketList->setOrderKey('o_key');
        $gasketList->setOrder("ASC");

        foreach ($gasketList as $listItem) {
            if ($listItem instanceof DataObject\Gasket) {
                $optionsData[] = array('key' => $listItem->getGasketName(), 'value' => $listItem->getID());
            }
        }

        return $optionsData;
    }

    /**
     * Returns the value which is defined in the 'Default value' field  
     * @param $context array
     * @param $fieldDefinition Data
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition)
    {
        return; //return $fieldDefinition->getDefaultValue();
    }

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition)
    {
        return true;
    }
}
