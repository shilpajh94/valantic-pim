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

namespace AppBundle\OptionProvider;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use AppBundle\Services\OptionProviderCacheService;
use Pimcore\Model\DataObject\ClassDefinition\Data;

class ApplicationOptionsProvider implements SelectOptionsProviderInterface {

    private $optionProvider;

    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        $this->optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $allAvailablelArray = array();
        $type = $fieldDefinition->getOptionsProviderData();
        if ($type) {
            $className = "Applications";

            $cacheClassName = $className.'~'.$type;

            $allAvailablelArrayCache = $this->optionProvider->getCachedKeyData($cacheClassName);
            if($allAvailablelArrayCache && !empty($allAvailablelArrayCache))
            {
                $allAvailablelArray = $allAvailablelArrayCache;
                unset($allAvailablelArrayCache);
            }
            else
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
        }
        return $allAvailablelArray;
    }

    /**
     * Returns the value which is defined in the 'Default value' field
     * @param array $context
     * @param Data $fieldDefinition
     * @return mixed
     */
    public function getDefaultValue(array $context, Data $fieldDefinition): ?string
    {
        return true;
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
