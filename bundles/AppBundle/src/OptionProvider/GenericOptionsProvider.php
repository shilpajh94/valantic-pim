<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace AppBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use AppBundle\Services\OptionProviderCacheService;
use Pimcore\Model\DataObject\ClassDefinition\Data;

class GenericOptionsProvider implements SelectOptionsProviderInterface {

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
        $displayFieldData = $fieldDefinition->getOptionsProviderData();
        if ($displayFieldData) {
            $displayFieldData = explode("|", $displayFieldData);
            if (is_array($displayFieldData) && count($displayFieldData) > 1) {
                $className = $displayFieldData[0];
                $displayFieldName = $displayFieldData[1];

                $allAvailablelArrayCache = $this->optionProvider->getCachedKeyData($className);
                if($allAvailablelArrayCache && !empty($allAvailablelArrayCache))
                {
                    $allAvailablelArray = $allAvailablelArrayCache;
                    unset($allAvailablelArrayCache);
                }
                else
                {
                    $listingClassName = "\\Pimcore\\Model\\DataObject\\" . $className . "\\Listing";
                    $listingObject = new $listingClassName();
                    $listingObject->setOrderKey($displayFieldName);
                    $listingObject->setOrder("ASC");
                    foreach ($listingObject as $object) {
                        $displayFieldGetter = "get" . ucfirst($displayFieldName);
                        $name = $object->$displayFieldGetter();
                        $allAvailablelArray[] = array(
                            "key" => $name, "value" => $object->getId()
                        );
                    }

                    if(!empty($allAvailablelArray))
                    {
                        $this->optionProvider->setCachedOptionProviders($className);
                        $this->optionProvider->setAllOptionsInCacheForClass($className, $allAvailablelArray);
                    }
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
        return false;
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
