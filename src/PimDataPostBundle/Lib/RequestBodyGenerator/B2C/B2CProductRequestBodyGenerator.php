<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2C;

use Pimcore\Model\DataObject\Product;
use \Pimcore\Model\Asset;
use \Pimcore\Model\Asset\Image;
use \Pimcore\Model\Asset\Video;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Lib\RequestBodyGenerator\RequestBodyGeneratorHelper;
use PimDataPostBundle\AttributeConfigProvider\B2C\B2CProductAttributeConfigProvider;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2C\Dao\B2CProductRequestBodyGeneratorDao;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductHelper;
class B2CProductRequestBodyGenerator extends AbstractB2CRequestBodyGenerator
{
    private $requestBodyGeneratorHelper;

    private $b2cProductRequestBodyGeneratorDao;
    
    private $config;
    
    private $classDefinition;
    
    
    
    public function __construct()
    {
        $this->requestBodyGeneratorHelper = new RequestBodyGeneratorHelper($this);
        $this->b2cProductRequestBodyGeneratorDao = new B2CProductRequestBodyGeneratorDao();
        $configProviderService = new B2CProductAttributeConfigProvider();
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
            strtolower(PimFieldType::SALES_FORCE_ID()),
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
            if (!empty($updatedConfig)) {
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
                    if (!empty($value) && !empty($this->checkIfTypeIsAllowed($attributeConfig)) && $attributeConfig['pim_attribute_name'] != 'Document') {
                        $type = $config[$key]['pim_attribute_type'];
                        $fnc = "get".ucfirst($type)."TypeValue";
                        if (in_array(strtolower($type), $relationFieldArray)) {
                            $fnc = "getMultiRelationTypeValue";
                        }
                        if (method_exists($this->requestBodyGeneratorHelper, $fnc)) {
                            $returnArray[$attributeConfig['sf_attribute_name']] = $this->requestBodyGeneratorHelper->$fnc($value, $config[$key], $language);
                        }
                    }

                    if (!empty($value) &&  $attributeConfig['pim_attribute_name'] == 'Document' && $attributeConfig['pim_attribute_type'] == 'advancedManyToManyRelation') {
                        $documentArray = $this->getSalesForceDocumentAttribute($value);
                        $returnArray = array_merge($returnArray, $documentArray);
                    }

                    if(isset($attributeConfig['sf_attrubute_format']) && 
                    $attributeConfig['sf_attrubute_format']!= null && $attributeConfig['sf_attrubute_format']!='')
                    {
                        $returnArray[$attributeConfig['sf_attribute_name']] = str_replace('<VALUE>', $returnArray[$attributeConfig['sf_attribute_name']], $attributeConfig['sf_attrubute_format']);
                    }

                    if($returnArray[$attributeConfig['sf_attribute_name']]!= null && $returnArray[$attributeConfig['sf_attribute_name']] != ''
                         && isset($attributeConfig['sf_attribute_type']) && $attributeConfig['sf_attribute_type']== 'numeric')
                    {
                        $returnArray[$attributeConfig['sf_attribute_name']] = (float) $returnArray[$attributeConfig['sf_attribute_name']];
                    }
                        
                }
            }
        }
        $returnArray["online_flag"] = $tempTableData["B2CStoreFlag"] && $tempTableData["o_published"];
        $returnArray["searchable"] =  $returnArray["onlineFlag"];
        $returnArray["owning_catalog_id"] = (new B2CProductHelper())->getCatalogId();
        unset($returnArray["Document"]);
        return $returnArray;
    }

    private function getSalesForceDocumentAttribute(string $value): array
    {
        $returnArray = array();
        $valueArray =explode(',',trim($value,','));
        $returnArray['c_hosePDF1'] = '';
        $returnArray['c_hosePDF2'] = '';
        foreach($valueArray as $assetrow){
            $assetValue = explode('|',$assetrow);
            $documentAsset = Asset::getById($assetValue[1]);
            if(isset($documentAsset)){
                $path = Util::getAssetPublicPath($documentAsset, null);
                if($documentAsset->getType() != 'video'){
                    $extension = pathinfo($path, PATHINFO_EXTENSION);
                    if(($extension == 'pdf' || $extension =='PDF') 
                        && ($returnArray['c_hosePDF1'] == '' || $returnArray['c_hosePDF2'] == '')
                    ){
                        if($returnArray['c_hosePDF1'] == ''){
                            $returnArray['c_hosePDF1'] = $path;
                        } else if($returnArray['c_hosePDF1'] != '' && $returnArray['c_hosePDF2'] == ''){
                            $returnArray['c_hosePDF2'] = $path;
                        }
                    }
                }

            }
        }
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
