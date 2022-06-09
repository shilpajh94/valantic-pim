<?php

namespace PTGEU\ProductBundle\Services;

use Pimcore\Model\DataObject\ClassDefinition;
use PTGEU\ProductBundle\Services\SkippedFieldUnitList;


class CompletenessPercentageService
{
    Const NEW_LINE_AND_NEW_TAB = "\n\t ";

    public function completenessPercentage($object)
    {
        $count = 0;
        $emptyFieldCounter = 0;
        $emptyFieldLocalizedCounter = 0;
        $emptyAttributes='';
        $emptyAttributesLocalized = '';
        $completedPercentage = 0;
        $classDefinition = ClassDefinition::getByName($object->getClassName());

        $langs = \Pimcore\Tool::getValidLanguages();
        $totalFields = 0;
        $emptyObjectBrickAttributes = '';
        $emptyObjectBrickAttributesCounter = 0;
        
        foreach ($langs as $lang) {

            $emptyAttributes = "[ NON LOCALIZED ATTRIBUTES ]";
            foreach ($classDefinition->getFieldDefinitions() as $field) {
                $fieldName = $field->getName();
                $fieldTitle = $field->getTitle();
                $fieldType = $field->getFieldType();
                $isInvisible = $field->getInvisible();
                if (!$isInvisible) {
                    if ($fieldType != "localizedfields") {
                        if($fieldType == "objectbricks") {
                            $fieldName = $field->getName();
                            $getter = "get".ucfirst($fieldName);
                            $attributes = $object->$getter();
                      
                            $bricks = $attributes->getBrickGetters();

                            if (!empty($bricks)){
                                $this->objectbricks($bricks, $lang, $attributes, $count, $totalFields, $emptyObjectBrickAttributes, $emptyObjectBrickAttributesCounter, $emptyAttributesLocalized, $emptyFieldLocalizedCounter);
                            }
                        }else {
                            if ($fieldName != "salesData" && $fieldName != "plantData") {
                                $fieldValue = $object->{'get' . ucfirst($fieldName)}();
                                if ($fieldValue instanceof \Pimcore\Model\DataObject\Data\ImageGallery) {  
                                    $fieldValue = $fieldValue->getItems();
                                }
                                $totalFields++;
                                if (!empty($fieldValue)) {
                                    $count++;
                                } else {
                                    $emptyAttributes.= self::NEW_LINE_AND_NEW_TAB.++$emptyFieldCounter. ") ".$fieldTitle; 
                                }
                            }
                        }
                    } else {
                        $this->localizedFields($fieldName, $object, $lang, $classDefinition, $count, $totalFields, $emptyAttributesLocalized , $emptyFieldLocalizedCounter);
                    }
                }
            }
            $completedPercentage = round((($count/$totalFields)*100),2);
            $object->setCompletenessPercentage($completedPercentage,$lang);
            $object->setEmptyFields($emptyAttributes.$emptyObjectBrickAttributes.$emptyAttributesLocalized ,$lang);
            $emptyFieldCounter = 0;
            $emptyFieldLocalizedCounter = 0;
            $count = 0;
            $totalFields = 0;
            $emptyAttributes = '';
            $emptyObjectBrickAttributes = '';
            $emptyObjectBrickAttributesCounter = 0;
            $emptyAttributesLocalized  = '';
        }
    }

    private function localizedFields($fieldName, $object, $lang, $classDefinition, &$count, &$totalFields, &$emptyAttributesLocalized , &$emptyFieldLocalizedCounter)
    {
        $localizedHeading = "\n\n [ LOCALIZED ATTRIBUTES ]";
        $emptyFieldLabels = '';
        foreach ($classDefinition->getFieldDefinition($fieldName)->getFieldDefinitions() as $localizedField) {
            $totalFields++;
            $localizedFieldName = $localizedField->getName();
            $localizedFieldTitle = $localizedField->getTitle(); 
            $localizedFieldValue = $object->{'get' . ucfirst($localizedFieldName)}($lang);
            if (!empty($localizedFieldValue)) {  
                $count++; 
            } else {
                $emptyFieldLabels .= self::NEW_LINE_AND_NEW_TAB.++$emptyFieldLocalizedCounter. ") ".$localizedFieldTitle; 
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

    private function objectbricks($bricks,$lang, $attributes, &$count, &$totalFields, &$emptyObjectBrickAttributes, &$emptyObjectBrickAttributesCounter, &$emptyAttributesLocalized, &$emptyFieldLocalizedCounter)
    {
        $localizedHeading = "\n\n [ LOCALIZED ATTRIBUTES ]";
        $heading = "\n\n [ CATEGORY SPECIFIC ATTRIBUTES ]";
        $emptyLocalizedFieldLabels = '';
        $skippedField = SkippedFieldUnitList::CompletenessPercentageUnitList();
        foreach ($bricks as $brick) {
            $obj = $attributes;
            $allowedBricks = $obj->getBrickGetters();
            if( in_array($brick, $allowedBricks) && method_exists($obj,$brick)) {
                $brickData = $obj->$brick(); 
                if (!empty($brickData)) {
                    $brickName = $brickData->getType();
                    $defObject = new \Pimcore\Model\DataObject\Objectbrick\Definition();
                    $brickDefinition = $defObject->getByKey($brickName);
                    $brickDef = $brickDefinition->getFieldDefinitions();
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
                                    $emptyLocalizedFieldLabels.= self::NEW_LINE_AND_NEW_TAB.++$emptyFieldLocalizedCounter. ") ".$brickName.'~'.$attrTitle;
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
                                if (empty($emptyObjectBrickAttributes)) {
                                    $emptyObjectBrickAttributes .= $heading;    
                                }
                                $emptyObjectBrickAttributes.= self::NEW_LINE_AND_NEW_TAB.++$emptyObjectBrickAttributesCounter. ") ".$brickName.'~'.$def->getTitle();
                            }
                        }
                    }
                }
            }
        }

    }
}