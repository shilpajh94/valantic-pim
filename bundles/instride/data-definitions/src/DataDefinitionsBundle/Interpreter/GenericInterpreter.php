<?php

/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 instride AG (https://www.instride.ch)
 * @license    https://github.com/instride/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

namespace Instride\Bundle\DataDefinitionsBundle\Interpreter;

use Pimcore\Model\DataObject\Concrete;
use Instride\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\DataSetAwareTrait;
use Instride\Bundle\DataDefinitionsBundle\Model\DataDefinitionInterface;
use Instride\Bundle\DataDefinitionsBundle\Model\MappingInterface;

class GenericInterpreter implements InterpreterInterface, DataSetAwareInterface
{
    use DataSetAwareTrait;

    public function interpret(
        Concrete $object,
        $value,
        MappingInterface $map,
        $data,
        DataDefinitionInterface $definition,
        $params,
        $configuration
    ) {
        // if (!$value) {
        //     return $value;
        // }
        $value = trim($value);

        \Pimcore::setAdminMode();

        if ((strpos($map->getToColumn(), "objectbrick") === 0) && (strpos($map->getToColumn(), "~") !== false)) {
            $parts = explode("~", $map->getToColumn());
            $brickName = $parts[2];
            $attributeName = $parts[3];
            $brickFieldObjectClass = 'Pimcore\Model\DataObject\Objectbrick\Data\\' . $brickName;

            $brickFieldObject = new $brickFieldObjectClass($object);
            $brickDefinition = $brickFieldObject->getDefinition();
            $fieldDefinition = $brickDefinition->getFieldDefinition($attributeName);
        } else {
            $fieldDefinition = $object->getClass()->getFieldDefinition($map->getToColumn());
        }

        if ($fieldDefinition instanceof \Pimcore\Model\DataObject\ClassDefinition\Data) {
            $attributeType = $fieldDefinition->getFieldType();
            if ($attributeType === "select") {
                $value = $this->getValueForSelect($fieldDefinition, $value, $configuration);
            } elseif ($attributeType === "multiselect") {
                $value = $this->getValueForMultiselect($fieldDefinition, $value, $configuration);
            } elseif ($attributeType === "booleanSelect") {
                $value = $this->getValueForBooleanSelect($fieldDefinition, $value, $configuration);
            } elseif ($attributeType === "manyToOneRelation") {
                $value = $this->getValueForManyToOneRelation($fieldDefinition, $value, $configuration);
            } elseif ($attributeType === "manyToManyObjectRelation") {
                $value = $this->getValueForManyToManyObjectRelation($fieldDefinition, $value, $configuration);
            } elseif ($attributeType === "advancedManyToManyObjectRelation") {
                $value = $this->getValueForAdvancedManyToManyObjectRelation($fieldDefinition, $value, $configuration);
            }
        }

        \Pimcore::unsetAdminMode();
        return $value;
    }

    private function getValueForSelect($fieldDefinition, $rawValue, $configuration)
    {
        $options = $fieldDefinition->getOptions();
        $value = '';

        if (is_array($options)) {
            $found = false;
            foreach ($options as $option) {
                if (strval($option['key']) == strval($rawValue)) {
                    $value = $option['value'];
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                //@TODO: throw exception that the value is not found in the system
            }
        }
        return $value;
    }

    private function getValueForMultiselect($fieldDefinition, $rawValue, $configuration)
    {
        $options = $fieldDefinition->getOptions();
        $valueArray = [];

        $allKeys = $this->separateValues($rawValue, $configuration);

        if (is_array($options)) {
            foreach ($allKeys as $singleKey) {
                $found = false;
                foreach ($options as $option) {
                    // if (strval($option['key']) == strval(trim($singleKey))) {
                    if(strcasecmp($option['key'],trim($singleKey)) == 0){
                        $valueArray[] = $option['value'];
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    //@TODO: throw exception that the value is not found in the system
                }
            }
        }

        return $valueArray;
    }

    private function getValueForBooleanSelect($fieldDefinition, $rawValue, $configuration)
    {
        $returnValue = null;

        if (in_array(strtolower($rawValue), ["y", "1", "true", "yes"])) {
            $returnValue =  true;
        } elseif (in_array(strtolower($rawValue), ["n", "0", "false", "no"])) {
            $returnValue = false;
        } elseif ($rawValue === "") {
            $returnValue = null;
        } else {
            //@TODO: throw exception that the value is not found in the system
        }

        return $returnValue;
    }

    private function getValueForManyToOneRelation($fieldDefinition, $rawValue, $configuration)
    {
        $returnValue = null;
        $class = 'Pimcore\Model\DataObject\\' . ucfirst($configuration['class']);
        $lookup = 'getBy' . ucfirst($configuration['field']);

        $listing = $class::$lookup($rawValue);
        $listing->setUnpublished($configuration['match_unpublished']);

        if ($listing->count() > 1) {
            // @TODO: inform that more than one value found
        } elseif ($listing->count() < 1) {
            // @TODO: inform that no related record found
        } else {
            $returnValue =  $listing->current();
        }

        return $returnValue;
    }

    private function getValueForManyToManyObjectRelation($fieldDefinition, $rawValue, $configuration)
    {
        $returnValue = [];
        $allValues = $this->separateValues($rawValue, $configuration);

        $class = 'Pimcore\Model\DataObject\\' . ucfirst($configuration['class']);
        $lookup = 'getBy' . ucfirst($configuration['field']);

        foreach ($allValues as $singleValue) {
            $listing = $class::$lookup(trim($singleValue));
            $listing->setUnpublished($configuration['match_unpublished']);

            if ($listing->count() > 1) {
                // @TODO: inform that more than one value found
            } elseif ($listing->count() < 1) {
                // @TODO: inform that no related record found
            } else {
                $returnValue[] =  $listing->current();
            }
        }
        return $returnValue;
    }

    private function getValueForAdvancedManyToManyObjectRelation($fieldDefinition, $rawValue, $configuration)
    {
        $returnValue = [];
        $allValues = $this->separateValues($rawValue, $configuration);

        $class = 'Pimcore\Model\DataObject\\' . ucfirst($configuration['class']);
        $lookup = 'getBy' . ucfirst($configuration['field']);

        foreach ($allValues as $singleValue) {
            $listing = $class::$lookup(trim($singleValue));
            $listing->setUnpublished($configuration['match_unpublished']);

            if ($listing->count() > 1) {
                // @TODO: inform that more than one value found
            } elseif ($listing->count() < 1) {
                // @TODO: inform that no related record found
            } else {
                $elementMetadata = new \Pimcore\Model\DataObject\Data\ObjectMetadata($fieldDefinition->getName(), [], $listing->current());
                $returnValue[] =  $elementMetadata;
            }
        }
        return $returnValue;
    }

    private function separateValues(string $value, $configuration): array
    {
        $separator  = $configuration['separator'] ? $configuration['separator'] : '|';
        return explode($separator, $value);
    }
}
