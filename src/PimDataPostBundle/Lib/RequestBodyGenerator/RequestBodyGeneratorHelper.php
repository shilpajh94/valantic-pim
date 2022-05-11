<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\Dao\B2BProductRequestBodyGeneratorDao;
use S3CustomizationBundle\Lib\Utils;

class RequestBodyGeneratorHelper
{
    private $requestBodyGenerator;
    
    private $b2bProductRequestBodyGeneratorDao;
    
    private $classIdNameMapping;
    
    public function __construct($requestBodyGenerator)
    {
        $this->requestBodyGenerator = $requestBodyGenerator;
        $this->b2bProductRequestBodyGeneratorDao = new B2BProductRequestBodyGeneratorDao();
        $this->classIdNameMapping = [];
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
            $currentValue = trim($currentValue,",");
            $valueArray = explode(",", $currentValue);
        }
        foreach ($valueArray as $val) {
            $returnArray[] = $this->getSelectTypeValue($val, $config, $language);
        }
        return $returnArray[0] ? $returnArray[0] : "";
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
        \Pimcore::setAdminMode();
        if (!empty($language) && $config['isLocalisedMaster']) {
            \Pimcore::unsetAdminMode();
            return $this->getRelationValue($currentValue, $config, $language); 
        } else {
            $className = $config['container_pim_class_or_brick_name'];
            $definiion = $this->requestBodyGenerator->getClassDefinition($className);
            $fieldName = $config['pim_attribute_name'];
            $fieldDefinition = $definiion->getFieldDefinition($fieldName);
            if (!empty($fieldDefinition) && ($fieldDefinition->getFieldtype() == 'select' || $fieldDefinition->getFieldtype() == 'multiselect')) {
                $options = $fieldDefinition->getOptions();
                foreach ($options as $option) {
                    if ($currentValue == $option['value']) {
                        \Pimcore::unsetAdminMode();
                        return $option['key'];
                    }
                }
            }
        }
        \Pimcore::unsetAdminMode();
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
        
        if (!empty($config['pim_attribute_for_sf_in_allowed_object_class_name']) && !empty($config['allowed_object_class_name'])) {
            $classId = $this->getClassIdByClassName($config['allowed_object_class_name']);
            $select = "SELECT ".$config['pim_attribute_for_sf_in_allowed_object_class_name'];
            if (!empty($classId)) {
                if (!empty($language)) {
                    $tableName = "object_localized_".$classId."_".$language;
                } else {
                    $tableName = "object_".$classId;
                }
                $select .= ' FROM '.$tableName.' ';
                $select = $select." WHERE `oo_id` = '".$currentValue."' ";
                return $this->b2bProductRequestBodyGeneratorDao->fetchOne($select);
            }
        }
        return null;
    }
    
    
    public function getMultiRelationTypeValue($currentValue, array $config, $language = null) {
        $currentValue = trim($currentValue,",");
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

    public function getImageTypeValue($currentValue, array $config, $language = null): string {
        if($currentValue){
            $asset = \Pimcore\Model\Asset\Image::getById($currentValue);
            if(isset($asset)){
                return Utils::getAssetFullPathCompatibleToS3($asset);
            }
        }
        return '';
    }
    
    public function getSalesForceIdTypeValue($currentValue, array $config, $language = null) {
        
        if (!empty($config['pim_attribute_for_sf_in_allowed_object_class_name']) && !empty($config['pim_id_to_sf_id_mapping_model'])) {
            $className = "\\PimDataPostBundle\\Model\\PersistantModel\\".$config['pim_id_to_sf_id_mapping_model']."\\Listing";
            $list = new $className();
            $list->setCondition("`pimId` = ".$list->quote($currentValue));
            $list->load();
            if (!empty($list) && count($list)>0) {
                $objects = $list->getObjects();
                $getter = "get".ucfirst($config['pim_attribute_for_sf_in_allowed_object_class_name']);
                return $objects[0]->$getter();
            }
        }
        
        return null;
    }
    
    public function getClassIdByClassName($className) {
        if (empty($this->classIdNameMapping[$className])) {
            $def = \Pimcore\Model\DataObject\ClassDefinition::getByName($className);
            if($def === null){
                $def = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($className);
            }
            $this->classIdNameMapping[$className] = $def->getId();
        }
        return $this->classIdNameMapping[$className];
    }
    
}

