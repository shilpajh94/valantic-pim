<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @package    PTGEUCatalogBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace PTGEU\CatalogBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;
use Pimcore\Model\DataObject\ClassDefinition\Data;

class PlantSalesDistributionOptionsProvider implements SelectOptionsProviderInterface
{
    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        $allAvailablelArray = array();
        $displayFieldData = $fieldDefinition->getOptionsProviderData();
        if ($displayFieldData) {
            $displayFieldData = explode("|", $displayFieldData);
            if (is_array($displayFieldData) && count($displayFieldData) > 1) {
                $className = $displayFieldData[0];
                $displayFieldArray = $displayFieldData[1];
                $displayFieldValue = $displayFieldData[2];
                $displayFieldData = explode("+", $displayFieldArray);

                if(count($displayFieldData) == 1){
                    $displayFieldName = $displayFieldData[0];
                }elseif(count($displayFieldData) == 2){
                    $displayFieldName = $displayFieldData[0];
                    $displayFieldCode = $displayFieldData[1];
                }

                $listingClassName = "\\Pimcore\\Model\\DataObject\\" . $className . "\\Listing";
                $listingObject = new $listingClassName();
                $listingObject->setOrderKey($displayFieldName);
                $listingObject->setOrder("ASC");
                
                foreach ($listingObject as $object) {
                    $displayFieldNameGetter = "get" . ucfirst($displayFieldName);
                    $name = $object->$displayFieldNameGetter();

                    $displayFieldValueGetter = "get" . ucfirst($displayFieldValue);
                    $value = $object->$displayFieldValueGetter();
                    
                    if($displayFieldCode){
                        $displayFieldCodeGetter = "get" . ucfirst($displayFieldCode);
                        $code = $object->$displayFieldCodeGetter();
                        $allAvailablelArray[] = array("key" => $name." (".$code.")", "value" => $value);
                    }else{
                        $allAvailablelArray[] = array("key" => $name, "value" => $value);
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
