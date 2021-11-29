<?php

namespace ContitechCS\ProductBundle\Services;

use Pimcore\Model\DataObject\ClassDefinition;
use ContitechCS\ProductBundle\Services\CompletenessUnitValueList;


class PercentageCompletionService
{
    //functionality to get completePercentage & emptyAttributes
    public function completenessPercentage($object)
    {
        $count = 0;
        $emptyFieldCounter = 0;
        $emptyFieldLocalizedCounter = 0;
        $emptyAttributes='';
        $emptyAttributesLocalized = '';
        $completedPercentage = 0;
        $classDefinition = ClassDefinition::getByName($object->getClassName());

        $langs = \Pimcore\Tool::getValidLanguages();  //available lanaguages loop
        $totalFields = 0;
        foreach ($langs as $lang) {
            foreach ($classDefinition->getFieldDefinitions() as $field) {
                $fieldName = $field->getName(); //all fiels Name
                $fieldTitle = $field->getTitle();
                $fieldType = $field->getFieldType(); //all fields type
                $isInvisible = $field->getInvisible();
                if ($count==0) {
                    $emptyAttributes .= "[ NON LOCALIZED ATTRIBUTES ]";
                }

                if (!$isInvisible) {
                    if ($fieldType != "localizedfields") {
                        if($fieldType == "objectbricks") {
                            $attributes = $object->getProductAttributes(); //bricksgetter and values in attributes
                            $bricks = $attributes->getBrickGetters();
                            if (!empty($bricks)){
                                $this->objectbricks($bricks,$lang, $attributes, $count, $totalFields, $emptyAttributes, $emptyFieldCounter, $emptyAttributesLocalized, $emptyFieldLocalizedCounter);
                            }

                        }else {
                            $fieldValue = $object->{'get' . ucfirst($fieldName)}();   //all fieldValue
                            if ($fieldValue instanceof \Pimcore\Model\DataObject\Data\ImageGallery) {
                                $fieldValue = $fieldValue->getItems();
                            }
                            $totalFields++;
                            if (!empty($fieldValue)) {
                                $count++;
                            } else {
                                $emptyAttributes.= "\n\t ".++$emptyFieldCounter. ") ".$fieldTitle; //else mention emptyattributes
                            }

                        }

                    } else {
                        $this->localizedFields($fieldName, $object, $lang, $classDefinition, $count, $totalFields, $emptyAttributesLocalized , $emptyFieldLocalizedCounter);
                    }

                }
            }
            $completedPercentage = round((($count/$totalFields)*100),2);
            $object->setCompletenessPercentage($completedPercentage,$lang);
            $object->setEmptyFields($emptyAttributes.$emptyAttributesLocalized ,$lang);
            $emptyFieldCounter = 0;
            $emptyFieldLocalizedCounter = 0;
            $count = 0;
            $totalFields = 0;
            $emptyAttributes = '';
            $emptyAttributesLocalized  = '';
        }
    }

    private function localizedFields($fieldName, $object, $lang, $classDefinition, &$count, &$totalFields, &$emptyAttributesLocalized , &$emptyFieldLocalizedCounter)
    {
        //$emptyAttributesLocalized  .= "\n\n [ LOCALIZED ATTRIBUTES ]";
        $localizedHeading = "\n\n [ LOCALIZED ATTRIBUTES ]";
        $emptyFieldLabels = '';
        foreach ($classDefinition->getFieldDefinition( $fieldName)->getChilds() as $localizedField) {
            $totalFields++;
            $localizedFieldName = $localizedField->getName(); //all childs of localizedfieldName
            $localizedFieldTitle = $localizedField->getTitle(); 
            $localizedFieldValue = $object->{'get' . ucfirst($localizedFieldName)}($lang); //values in child of localizedfield
            if (!empty($localizedFieldValue)) {   // if value present so count
                $count++;
            } else {
                $emptyFieldLabels .= "\n\t ".++$emptyFieldLocalizedCounter. ") ".$localizedFieldTitle; //emptychildattributes
            }
        }
        if ($emptyFieldLocalizedCounter >0) {
            if (empty($emptyAttributesLocalized)) {
                $emptyAttributesLocalized .= $localizedHeading;
            }
            if (!empty($emptyFieldLabels)) {
                $emptyAttributesLocalized .= $emptyFieldLabels;
            }
        }
    }

    private function objectbricks($bricks,$lang, $attributes, &$count, &$totalFields, &$emptyAttributes, &$emptyFieldCounter, &$emptyAttributesLocalized, &$emptyFieldLocalizedCounter)
    {
        $localizedHeading = "\n\n [ LOCALIZED ATTRIBUTES ]";
        $emptyLocalizedFieldLabels = '';
        $skippedField = CompletenessUnitValueList::completenessPercentageUnitList();
        foreach ($bricks as $brick) {
            $brickData = $attributes->$brick(); //empty
            if (!empty($brickData)) {
                $brickName = $brickData->getType();
                $defObject = new \Pimcore\Model\DataObject\Objectbrick\Definition();
                $brickDefinition = $defObject->getByKey($brickName);
                $brickDef = $brickDefinition->getFieldDefinitions();
                $brickTitle = $brickDefinition->getTitle();
                foreach($brickDef as $key => $def) {
                    $keyGetter = "get".ucfirst($key);
                    if ($key=='localizedfields') {
                        foreach($def->getFieldDefinitions() as $attr) {
                            $name = $attr->getName();
                            $attrTitle = $attr->getTitle();
                            if(in_array($name, $skippedField)) {
                                continue;
                            }
                            $totalFields++;
                            $fieldGetter = "get".ucfirst($name);
                            $value = $brickData->$fieldGetter($lang);
                            if (!empty($value)) {
                                $count++;
                            } else {
                                $emptyLocalizedFieldLabels.= "\n\t ".++$emptyFieldLocalizedCounter. ") ".$brickTitle.'~'.$attrTitle; //emptychildattributes
                            }
                        }
                        if ($emptyFieldLocalizedCounter >0) {
                            if (empty($emptyAttributesLocalized)) {
                                $emptyAttributesLocalized .= $localizedHeading;
                            }
                            if (!empty($emptyLocalizedFieldLabels)) {
                                $emptyAttributesLocalized .= $emptyLocalizedFieldLabels;
                            }
                        }
                    } else {
                        if(in_array($key, $skippedField)) {
                            continue;
                        }
                        $totalFields++;
                        $value = $brickData->$keyGetter();
                        if (!empty($value)) {
                            $count++;
                        } else {
                            $emptyAttributes.= "\n\t ".++$emptyFieldCounter. ") ".$brickTitle.'~'.$def->getTitle(); //emptychildattributes
                        }
                    }
                }
            }
        }

    }
}
