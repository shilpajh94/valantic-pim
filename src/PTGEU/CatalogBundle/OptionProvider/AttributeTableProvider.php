<?php

namespace PTGEU\CatalogBundle\OptionProvider;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class AttributeTableProvider implements SelectOptionsProviderInterface {

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {

        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        $catalogConfig = \Pimcore::getContainer()->get('catalog.config_provider_service')->getCatalogConfig();
        $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, 'PTG Product Page');

        $attributeTable = array();
        foreach ($ptgProductPageConfig['Dynamic Table Attribute'] as $tableKey => $table) {
            $attributeTable[] = array("key" => $tableKey, "value" => $tableKey);
        }

        return $attributeTable;
    }

    /**
     * Returns the value which is defined in the 'Default value' field  
     * @param $context array
     * @param $fieldDefinition Data
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition) {
        return true; 
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
