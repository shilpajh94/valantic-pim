<?php

/**
 * User: Mahesh Lakher
 * Date: 26/07/2021
 * Time: 11:00 AM
 */

namespace ContitechCS\ProductBundle\Services;

use Pimcore\Model\DataObject\ClassDefinition;


class PercentageCompletionService
{
    //functionality to get completePercentage & emptyAttributes
    public function completenessPercentage($object)
    { 
        $count = 0;
        $emptyFieldCounter = 0;
        $emptyAttributes='';
        $completedPercentage = 0;
        
    
        $classDefinition = ClassDefinition::getByName($object->getClassName());
        
        $langs = \Pimcore\Tool::getValidLanguages();  //available lanaguages loop
        $totalFields = 0;
        foreach ($langs as $lang) {
            foreach ($classDefinition->getFieldDefinitions() as $field) { 
                $fieldName = $field->getName(); //all fiels Name
                $fieldType = $field->getFieldType(); //all fields type
                $isInvisible = $field->getInvisible();
                if (!$isInvisible) {
                    if ($fieldType == "localizedfields") {
                       $this->localizedFields($fieldName, $object, $lang, $classDefinition, $count, $totalFields, $emptyAttributes, $emptyFieldCounter); 
                    } elseif($fieldType == "objectbricks") {
                        $attributes = $object->getProductAttributes(); 
                        $bricks = $attributes->getBrickGetters(); 
                        if (!empty($bricks)){
                            $this->objectbricks($bricks, $attributes, $count, $totalFields, $emptyAttributes, $emptyFieldCounter);
                        }
                        
                    } else {
                        $fieldValue = $object->{'get' . ucfirst($fieldName)}();   //all fieldValue 
                        if ($fieldValue instanceof \Pimcore\Model\DataObject\Data\ImageGallery) {
                            $fieldValue = $fieldValue->getItems();
                        }
                        $totalFields++;
                        if (!empty($fieldValue)) {
                            $count++;
                        } else {
                            $emptyAttributes.= "\n\t ".++$emptyFieldCounter. ") ".$fieldName; //else mention emptyattributes
                        }

                    }
                }
            }
            $completedPercentage = ($count/$totalFields)*100;
            $object->setCompletenessPercentage($completedPercentage,$lang);       
            $object->setEmptyFields($emptyAttributes,$lang); 
            $emptyFieldCounter = 0;
            $count = 0;
            $totalFields = 0;
        }
    }

    private function localizedFields($fieldName, $object, $lang, $classDefinition, &$count, &$totalFields, &$emptyAttributes, &$emptyFieldCounter) 
    {
        foreach ($classDefinition->getFieldDefinition( $fieldName)->getChilds() as $localizedField) {
                    $totalFields++;
                    $localizedFieldName = $localizedField->getName(); //all childs of localizedfieldName
                    $localizedFieldValue = $object->{'get' . ucfirst($localizedFieldName)}($lang); //values in child of localizedfield
                    if (!empty($localizedFieldValue)) {   // if value present so count
                        $count++;
                    } else {
                        $emptyAttributes.= "\n\t ".++$emptyFieldCounter. ") ".$localizedFieldName; //emptychildattributes 
                    }
        }  
            
    }

    private function objectbricks($bricks, $attributes, &$count, &$totalFields, &$emptyAttributes, &$emptyFieldCounter)
    {
        foreach ($bricks as $brick) {
            $brickData = $attributes->$brick();
            if (!empty($brickData)) {
                $brickName = $brickData->getType();
                $defObject = new \Pimcore\Model\DataObject\Objectbrick\Definition();
                $brickDef = $defObject->getByKey($brickName)->getFieldDefinitions();
                foreach($brickDef as $key => $def) {
                    $keyGetter = "get".ucfirst($key);
                    if ($key=='localizedfields') {
                        foreach($def->getChilds() as $attr) {
                            $totalFields++;
                            $name = $attr->getName();
                            $fieldGetter = "get".ucfirst($name);
                            $value = $brickData->$fieldGetter($lang);
                            if (!empty($value)) {
                                $count++;
                            } else {
                                $emptyAttributes.= "\n\t ".++$emptyFieldCounter. ") ".$brickName.'~'.$name; //emptychildattributes 
                            }
                        }
                    } else {
                        $totalFields++;
                        $value = $brickData->$keyGetter();
                        if (!empty($value)) {
                            $count++;
                        } else {
                            $emptyAttributes.= "\n\t ".++$emptyFieldCounter. ") ".$brickName.'~'.$key; //emptychildattributes 
                        }
                    }
                }
            }
        }

    }
}



    