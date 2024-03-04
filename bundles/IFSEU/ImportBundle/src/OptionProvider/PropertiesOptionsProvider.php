<?php

/**
 * Pimcore global services
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright Copyright (c) Pimcore global services
 * @license Pimcore global services GPLv3 and PEL
 */

namespace IFSEU\ImportBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class PropertiesOptionsProvider implements SelectOptionsProviderInterface {

    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        //  $optionsData = [];
         $this->optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
         $optionsData = array();
         //$className = 'IFSEUProperties';
         $type =  $fieldDefinition->getOptionsProviderData();
         $className = $type;
         $allAvailablelArrayCache = $this->optionProvider->getCachedKeyData($className);
         if($allAvailablelArrayCache && !empty($allAvailablelArrayCache))
         {
             $optionsData = $allAvailablelArrayCache;
             unset($allAvailablelArrayCache);
         }
         else
         {
            
            $propertiesList =  DataObject\IFSEUProperties::getByTypeName($type);
            $propertiesList->setOrderKey('key');
            $propertiesList->setOrder("ASC");

            foreach($propertiesList as $listItem)
            {
                if($listItem instanceof DataObject\IFSEUProperties)
                {
                $optionsData[] = array ('key' => $listItem->getPropertyName(),'value' => $listItem->getID());
                }
            }
            if(!empty($optionsData))
            {
                $this->optionProvider->setCachedOptionProviders($className);
                $this->optionProvider->setAllOptionsInCacheForClass($className, $optionsData);
            }
        }
            return $optionsData;
    }

    /**
     * Returns the value which is defined in the 'Default value' field
     * @param array $context
     * @param Data $fieldDefinition
     * @return mixed
     */
    public function getDefaultValue(array $context, Data $fieldDefinition): ?string
    {
        return true; //return $fieldDefinition->getDefaultValue();
    }

    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return bool
     */
    public function hasStaticOptions(array $context, Data $fieldDefinition): bool
    {
        return true;
    }
}
