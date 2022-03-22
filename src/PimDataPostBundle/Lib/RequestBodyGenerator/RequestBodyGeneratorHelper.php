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
     * @param type $currentValue
     * @param array $config
     * @param type $language
     * @return type
     */
    public function getCheckboxTypeValue($currentValue, array $config, $language = null) 
    {
        $return  = true;
        if (empty($currentValue)) {
            $return = false;
        }
        unset($config);
        unset($language);
        return $return;
    }
    
    /**
     * 
     * @param type $currentValue
     * @param array $config
     * @param type $language
     * @return type
     */
    public function getBooleanTypeValue($currentValue, array $config, $language = null) 
    {
        $return = true;
        if (empty($currentValue)) {
            $return = null;
        } elseif ($currentValue == "-1") {
            $return = false;
        }
        unset($config);
        unset($language);
        return $return;
    }
    /**
     * 
     * @param type $currentValue
     * @param array $config
     * @param type $language
     * @return type
     */
    public function getMultiselectTypeValue($currentValue, array $config, $language = null) 
    {
        $returnArray = [];
        $valueArray = $currentValue;
        if (!is_array($currentValue)) {
            $valueArray = explode(",", $currentValue);
        }
        foreach ($valueArray as $val) {
            $returnArray[] = $this->getSelectTypeValue($val, $config, $language);
        }
        return $returnArray;
    }
    
    /**
     * 
     * @param type $currentValue
     * @param array $config
     * @param type $language
     * @return type
     */
    public function getSelectTypeValue($currentValue, array $config, $language = null) 
    {
        if (!empty($language) && $config['isLocalisedMaster']) {
            return $this->getRelationValue($currentValue, $config, $language); 
        } else {
            $className = $config['pimcoreClassName'];
            $definiion = $this->requestBodyGenerator->getClassDefinition($className);
            $fieldName = $config['pim_attribute_name'];
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
    
    /**
     * 
     * @param type $currentValue
     * @param array $config
     * @param type $language
     * @return type
     */
    public function getRelationValue($currentValue, array $config, $language = null) {
        
        if (!empty($config['relationFieldName']) ) {
            $select = "SELECT ".$config['relationFieldName'];
            if (!empty($language) && !empty($config['localisedTableName'])) {
                $tableName = $config['localisedTableName'];
            } elseif (!empty($config['tableName'])) {
                $tableName = $config['tableName'];
            }
            if (!empty($tableName)) {
                $select .= ' FROM '.$tableName.' ';
                if (!empty($config['whereCondition'])) {
                    $where = $config['whereCondition'];
                    $where = str_replace('{%ID%}', $currentValue, $where);
                    $select = $select." WHERE ".$where;
                }
                return $this->b2bProductRequestBodyGeneratorDao->fetchOne($select);
            }
            
        }
        return null;
    }
    
    
    public function getMultiRelationTypeValue($currentValue, array $config, $language = null) {
        $values = explode(",", $currentValue);
        if (count($values) == 1) {
            return $this->getRelationValue($currentValue, $config, $language);
        } else {
            $returnValues = [];
            foreach ($values as $value) {
                $returnValues[] = $this->getRelationValue($value, $config, $language);
            }
            return $returnValues;
        }
    }
    
    public function getSalesForceIdTypeValue($currentValue, array $config, $language = null) {
        try {
            if (!empty($config['relationFieldName']) && !empty($config['modelClassName'])) {
                $className = "\\PimDataPostBundle\\Model\\PersistantModel\\".$config['modelClassName']."\\Listing";
                $list = new $className();
                if (!empty($config['whereCondition'])) {
                    $where = $config['whereCondition'];
                    $where = str_replace('{%ID%}', $list->quote($currentValue), $where);
                    $list->setCondition($where);
                }
                $list->load();
                if (!empty($list) && count($list)>0) {
                    $objects = $list->getObjects();
                    $getter = "get".ucfirst($config['relationFieldName']);
                    return $objects[0]->$getter();
                }
            }
        } catch(\Exception $e) {
            
        }
        return null;
    }
    
}

