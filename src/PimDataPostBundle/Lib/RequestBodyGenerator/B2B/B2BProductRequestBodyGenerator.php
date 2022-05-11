<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B;

use Pimcore\Model\DataObject\Product;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Lib\RequestBodyGenerator\RequestBodyGeneratorHelper;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\Dao\B2BProductRequestBodyGeneratorDao;

class B2BProductRequestBodyGenerator extends AbstractB2BRequestBodyGenerator
{
    private $requestBodyGeneratorHelper;

    private $b2bProductRequestBodyGeneratorDao;
    
    private $config;
    
    private $classDefinition;
    
    
    
    public function __construct()
    {
        $this->requestBodyGeneratorHelper = new RequestBodyGeneratorHelper($this);
        $this->b2bProductRequestBodyGeneratorDao = new B2BProductRequestBodyGeneratorDao();
        $configProviderService = new B2BProductAttributeConfigProvider();
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
            strtolower(PimFieldType::SALES_FORCE_ID())
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
                    if (!empty($value) && !empty($this->checkIfTypeIsAllowed($attributeConfig))) {
                        $type = $config[$key]['pim_attribute_type'];
                        $fnc = "get".ucfirst($type)."TypeValue";
                        if (in_array(strtolower($type), $relationFieldArray)) {
                            $fnc = "getMultiRelationTypeValue";
                        }
                        if (method_exists($this->requestBodyGeneratorHelper, $fnc)) {
                            $returnArray[$attributeConfig['sf_attribute_name']] = $this->requestBodyGeneratorHelper->$fnc($value, $config[$key], $language);
                        }
                    }
                }
            }
        }
        $returnArray["IsActive"] = $tempTableData["epixFlag"] && $tempTableData["o_published"];

        return $returnArray;
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
    
    public function getClassDefinition($className) {
        if (empty($this->classDefinition[$className])) {
            $def = \Pimcore\Model\DataObject\ClassDefinition::getByName($className);
            if($def === null){
                $def = \Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($className);
            }
            $this->classDefinition[$className] = $def;
        }
        return $this->classDefinition[$className];
    }
}
