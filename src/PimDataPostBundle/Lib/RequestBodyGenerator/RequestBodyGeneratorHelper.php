<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\Dao\B2BProductRequestBodyGeneratorDao;


class RequestBodyGeneratorHelper
{
    private $requestBodyGenerator;
    
    private $b2bProductRequestBodyGeneratorDao;
    
    public function __construct($requestBodyGenerator)
    {
        $this->requestBodyGenerator = $requestBodyGenerator;
        $this->b2bProductRequestBodyGeneratorDao = new B2BProductRequestBodyGeneratorDao();
    }
    /**
     * 
     * @param object $object
     * @param array $config
     */
    public function getInputTypeValue($currentValue, array $config) 
    {
        $getter = "get".ucfirst($config['fieldName']);
        if (method_exists($object, $getter)) {
            return $object->$getter();
        }
        return null;
    }
    
    /**
     * 
     * @param object $object
     * @param array $config
     */
    public function getNumericTypeValue($currentValue, array $config) 
    {
        $getter = "get".ucfirst($config['fieldName']);
        if (method_exists($object, $getter)) {
            return $object->$getter();
        }
        return null;
    }
    
    /**
     * 
     * @param object $object
     * @param array $config
     */
    public function getBooleanTypeValue($currentValue, array $config) 
    {
        $getter = "get".ucfirst($config['fieldName']);
        if (method_exists($object, $getter)) {
            $val = $object->$getter();
            if (empty($val)) {
                return null;
            } elseif ($val == "-1") {
                return false;
            } else {
                return true;
            }
        }
        return null;
    }
    
    /**
     * 
     * @param object $object
     * @param array $config
     */
    public function getSelectTypeValue($currentValue, array $config, $language = null) 
    {
        if (!empty($language) && $config['isLocalisedMaster']) {
            return $this->getRelationValue($currentValue, $config, $language); 
        } else {
            $className = $config['className'];
            $definiion = $this->requestBodyGenerator->getClassDefinition($className);
            $fieldName = $config['fieldName'];
            $fieldDefinition = $definiion->getFieldDefinition($fieldName);
            if (!empty($fieldDefinition) && ($fieldDefinition->getFieldtype() == 'select' || $fieldDefinition->getFieldtype() == 'multiselect')) {
                $options = $fieldDefinition->getOptions();
                foreach ($options as $option) {
                    if ($currentValue == $option['value']) {
                        return $option['key'];
                    }
                }
            }
        }
        return null;
    }
    
    public function getRelationValue($currentValue, array $config, $language = null) {
        
        if (!empty($config['relationFieldName']) ) {
            $select = "SELECT ".$config['relationFieldName'];
            if (!empty($config['classId']) && (!empty($config['localisedTablePrefix']) || !empty($config['tablePrefix']))) {
                if(!empty($language)) {
                    $tableName = $config['localisedTablePrefix'].$config['classId'];
                } else {
                    $tableName = $config['tablePrefix'].$config['classId'];
                }
                if (!empty($tableName)) {
                    $select .= ' FROM '.$tableName.' ';
                }
                if (!empty($config['relationJoins']) && count($config['relationJoins']) >0) {
                    $joins = implode(" ", $config['relationJoins']);
                    $select = $select." ".$joins;
                }
                if (!empty($config['whereCondition'])) {
                    $where = $config['whereCondition'];
                    $where = str_replace('{%ID%}', $currentValue, $where);
                    $select = $select." WHERE ".$where;
                }
                return $this->b2bProductRequestBodyGeneratorDao->fetchOne($select);
            }
            return null;
        }
    }
    
    
    public function getMultiRelationTypeValue($currentValue, array $config, $language = null) {
        $values = explode(",", $currentValue);
        if (count($values) == 1) {
            return $this->getRelationValue($currentValue, $config, $language);
        } else {
            $returnValues = [];
            foreach ($values as $value) {
                $returnValues[] = $this->getRelationValue($currentValue, $config, $language);
            }
            return $returnValues;
        }
    }
    
    
//    public function getRelationTypeValue($currentValue, array $config) {
//        $fieldType = $config['relationFieldType'];
//        $fieldName = $config['fieldName'];
//        $getter = "get".ucfirst($fieldName);
//        if (method_exists($object, $getter)) {
//            $relationFieldObject = $object->$getter();
//            
//            if (!empty($relationFieldObject) && count($relationFieldObject)>0) {
//                if (!empty($relationFieldObject[0])) {
//                    $relationFieldObject = $relationFieldObject[0];
//                    if ($relationFieldObject instanceof \Pimcore\Model\DataObject\Data\ObjectMetadata) {
//                        $relationFieldObject = $relationFieldObject->getObject();
//                    }
//                }
//                $relationFieldName = $config['relationFieldName'];
//                $relationFieldType = $config['relationFieldType'];
//                $typeGetter = "get".ucfirst($relationFieldType)."TypeValue";
//                $updatedConfig = $config;
//                $updatedConfig['fieldName'] = $config['relationFieldName'];
//                
//                if ($relationFieldType == 'relation') {
//                    $updatedConfig['className'] = $config['relationToRelationClassName'];
//                    $updatedConfig['relationFieldName'] = $config['relationToRelationFieldName'];
//                    $updatedConfig['relationFieldType'] = $config['relationToRelationFieldType'];
//                }
//                return $this->$typeGetter($relationFieldObject, $currentValue, $updatedConfig);
//            }
//        }
//    }
//    
//    /**
//     * 
//     * @param object $object
//     * @param array $config
//     */
//    public function getObjectbrickTypeValue($currentValue, array $config) 
//    {
//        $fieldGetter = "get".ucfirst($config['classFieldName']);
//        $brickGetter = "get".ucfirst($config['brickName']);
//        $classField = $object->$fieldGetter();
//        if (method_exists($classField, $brickGetter)) {
//            $brickObject = $classField->$brickGetter();
//            if (empty($brickObject)) {
//                return null;
//            }
//            $fieldType = $config['brickFieldType'];
//            $typeGetter = "get".ucfirst($fieldType)."TypeValue";
//            $updatedConfig = $config;
//            if ($fieldType == 'relation') {
//                $updatedConfig['fieldName'] = $config['brickFieldName'];
//                $updatedConfig['className'] = $config['relationClassName'];
//            }   
//            return $this->$typeGetter($brickObject, $currentValue, $updatedConfig);
//        }
//    }
}

