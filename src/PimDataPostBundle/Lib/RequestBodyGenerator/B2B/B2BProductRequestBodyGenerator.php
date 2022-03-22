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
    
    private $allowedAttributeTypes;
    
    public function __construct()
    {
        $this->requestBodyGeneratorHelper = new RequestBodyGeneratorHelper($this);
        $this->b2bProductRequestBodyGeneratorDao = new B2BProductRequestBodyGeneratorDao();
        $configProviderService = new B2BProductAttributeConfigProvider();
        $config = $configProviderService->getCompleteConfig();
        $this->config = [];
        if (!empty($config) && !empty($config['parameters']) && !empty($config['parameters']['Attribute'])) {
            $this->config = $config['parameters']['Attribute'];
        }
        
        $this->allowedAttributeTypes = [
            strtolower(PimFieldType::SELECT()),
            strtolower(PimFieldType::MULTISELECT()),
            strtolower(PimFieldType::CHECKBOX()),
            strtolower(PimFieldType::MANY_TO_MANY_RELATION()),
            strtolower(PimFieldType::MANY_TO_MANY_OBJECT_RELATION()),
            strtolower(PimFieldType::ADVANCED_MANY_TO_MANY_RELATION()),
            strtolower(PimFieldType::ADVANCED_MANY_TO_MANY_OBJECT_RELATION()),
            strtolower(PimFieldType::BOOLEAN_SELECT())
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
        if (empty($config)) {
            $config = $this->config;
        }
        foreach ($tempTableData as $key => $value) {
            if (!empty($config[$key])) {
                $attributeConfig = $config[$key];
                if ($this->checkIfSendToSF($attributeConfig)) {
                    $returnArray[$attributeConfig['sf_attribute_name']] = $value;
                    if (!empty($value) && !empty($this->checkIfFetchValue($attributeConfig))) {
                        $type = $config[$key]['type'];
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
        return $returnArray;
    }
    
    
    public function generateCreateRequestBody(array $tempTableData): array
    {

    }

    public function generateUpdateRequestBody(array $tempTableData): array
    {

    }

    public function generateDeleteRequestBody(array $tempTableData): array
    {

    }
    
    public function getClassDefinition($className) {
        if (empty($this->classDefinition[$className])) {
            $def = \Pimcore\Model\DataObject\ClassDefinition::getByName($className);
            $this->classDefinition[$className] = $def;
        }
        return $this->classDefinition[$className];
    }
}