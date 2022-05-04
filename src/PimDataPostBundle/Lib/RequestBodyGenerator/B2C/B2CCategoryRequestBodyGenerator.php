<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2C;

use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Lib\RequestBodyGenerator\RequestBodyGeneratorHelper;
use PimDataPostBundle\AttributeConfigProvider\B2C\B2CCategoryAttributeConfigProvider;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2C\Dao\B2CProductRequestBodyGeneratorDao;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CCategoryHelper;

/**
 * Description of B2CCategoryRequestBodyGenerator
 *
 */
class B2CCategoryRequestBodyGenerator extends AbstractB2CRequestBodyGenerator {
    
    private $requestBodyGeneratorHelper;

    private $b2cProductRequestBodyGeneratorDao;
    
    private $config;
    
    public function __construct()
    {
        $this->requestBodyGeneratorHelper = new RequestBodyGeneratorHelper($this);
        $this->b2cProductRequestBodyGeneratorDao = new B2CProductRequestBodyGeneratorDao();
        $configProviderService = new B2CCategoryAttributeConfigProvider();
        $this->config = $configProviderService->getCompleteAttributeConfig();
        
        $this->allowedAttributeTypes = [
            strtolower(PimFieldType::SELECT()),
            strtolower(PimFieldType::MULTISELECT()),
            strtolower(PimFieldType::CHECKBOX()),
            strtolower(PimFieldType::MANY_TO_MANY_RELATION()),
            strtolower(PimFieldType::MANY_TO_MANY_OBJECT_RELATION()),
            strtolower(PimFieldType::ADVANCED_MANY_TO_MANY_RELATION()),
            strtolower(PimFieldType::ADVANCED_MANY_TO_MANY_OBJECT_RELATION()),
            strtolower(PimFieldType::BOOLEAN_SELECT()),
            strtolower(PimFieldType::B2C_SALES_FORCE_ID()),
            strtolower(PimFieldType::IMAGE())
        ];
    }
    
    /**
     * function to generate data array to send to salesforce. This function will handle single record at a time
     * @param array $tempTableData
     * @param type $config
     * @param type $language
     * @return array
     */
    public function generateRequestBody(array $tempTableData, $config = [],  $language = null): array
    {
        if (isset($tempTableData[0])) {
            $tempTableData = $tempTableData[0];
        }
        $returnArray = [];
        $relationFieldArray = [
            strtolower(PimFieldType::MANY_TO_MANY_RELATION()),
            strtolower(PimFieldType::MANY_TO_MANY_OBJECT_RELATION()),
            strtolower(PimFieldType::ADVANCED_MANY_TO_MANY_RELATION()),
            strtolower(PimFieldType::ADVANCED_MANY_TO_MANY_OBJECT_RELATION())
        ];
        $updatedConfig = [];
        if (!empty($config) && !empty($language)) {
            $updatedConfig = $config;
            foreach ($config as $key => $attributeConfig) {
                if ($this->checkIfSendToSF($attributeConfig)) {
                    $localisedDataKey = $key."_".$language;
                    if (array_key_exists($localisedDataKey, $tempTableData)) {
                        $returnArray[$attributeConfig['sf_attribute_name']] = $tempTableData[$localisedDataKey];
                        unset($updatedConfig[$key]);
                    }
                }
            }
            if (count($updatedConfig)>0) {
                $config = $updatedConfig;
            }
        } else {
            $config = $this->config;
        }
        foreach ($tempTableData as $key => $value) {
            if (!empty($config[$key])) {
                $attributeConfig = $config[$key];
                if ($this->checkIfSendToSF($attributeConfig)) {
                    $returnArray[$attributeConfig['sf_attribute_name']] = $value;
                    if ($value !== null && $this->checkIfTypeIsAllowed($attributeConfig)) {
                        $type = $config[$key]['pim_attribute_type'];
                        $fnc = "get".ucfirst($type)."TypeValue";
                        if (in_array(strtolower($type), $relationFieldArray)) {
                            $fnc = "getMultiRelationTypeValue";
                        }

                        if($key == "parent" && $type == "b2cSalesForceId"){
                            $returnArray[$attributeConfig['sf_attribute_name']] = B2CCategoryHelper::getExternalId($value);
                        }elseif (method_exists($this->requestBodyGeneratorHelper, $fnc)) {
                            $returnArray[$attributeConfig['sf_attribute_name']] = $this->requestBodyGeneratorHelper->$fnc($value, $config[$key], $language);
                        }
                        
                    }
                }
            }
        }
        $returnArray["online"] = ($tempTableData["onlineFlag"] == 1) ? true : false;
        $returnArray["catalog_id"] = (new B2CCategoryHelper())->getCatalogId();
        
        return $returnArray;
    }
    
    public function getParentSalesForceId($parentPimId, $level, array $config, $language = null) {
        
        if($level == 1){
            return null;
        }

        $parentType = $this->b2cProductRequestBodyGeneratorDao->getObjectType($parentPimId);
        
        while($parentType != 'object')
        {
            $parentPimId = $this->b2cProductRequestBodyGeneratorDao->getParentId($parentPimId);
            $parentType = $this->b2cProductRequestBodyGeneratorDao->getObjectType($parentPimId);
        }

        if (!empty($config['pim_id_to_sf_id_mapping_model'])) {
            $className = "\\PimDataPostBundle\\Model\\PersistantModel\\".$config['pim_id_to_sf_id_mapping_model']."\\Listing";
            $list = new $className();
            $list->setCondition("`pimId` = ".$list->quote($parentPimId));
            $list->load();
            foreach($list as $object){
                return $object->getSalesForceId();
            }
        }
        
        return null;
    }
    
    public function generateCreateRequestBody(array $tempTableData): array
    {
        return [];
    }

    public function generateUpdateRequestBody(array $tempTableData): array
    {
        return [];
    }

    public function generateDeleteRequestBody(array $tempTableData): array
    {
        return [];
    }
}
