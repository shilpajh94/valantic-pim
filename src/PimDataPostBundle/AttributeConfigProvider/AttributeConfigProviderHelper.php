<?php

namespace PimDataPostBundle\AttributeConfigProvider;

use PimDataPostBundle\Model\Types\ClassType;
use PimDataPostBundle\Model\Types\ShopType;
use AppBundle\Services\ConfigProviderService;

class AttributeConfigProviderHelper
{
    public function getCompleteConfig(ShopType $shopType, ClassType $classType): array
    {
        $filePath = $this->getConfigFileName($shopType, $classType);
        return \Pimcore::getContainer()->get('app.config_provider_service')->getConfigFromYmlFile($filePath);
    }

    public function getCompleteAttributeConfig(ShopType $shopType, ClassType $classType): array
    {
        $completeConfig = $this->getCompleteConfig($shopType, $classType);
        return $completeConfig["parameters"]["Attribute"];
    }

    private function getConfigFileName($shopType, $classType): string
    {
        $shopType = \strtoupper($shopType);
        $classType = \strtolower($classType);
        return PIMDATAPOSTBUNDLE_CONFIG_DIRECTORY."/{$shopType}/{$classType}.yml";
    }

    public function getPIMRelationalAttributeConfig(Array $attribute): array
    {
        $array = [];
        foreach ($attribute as $attrKey => $value) {

            if(isset($value['relationalAttr']) && $value['relationalAttr'])
            {
                $array[] = $attrKey;
            }
        }
        return $array;
    }
    
    public function getConfigForKeyValue($completeConfig, $key, $value): array
    {
        $returnValue = [];
        foreach($completeConfig as $configAttrKey => $configAttrValue )
        {
            if(array_key_exists($key,$configAttrValue) && $configAttrValue[$key] === $value ){
                $returnValue[$configAttrKey] = $configAttrValue;
            }
        }
        return $returnValue;
    }
}