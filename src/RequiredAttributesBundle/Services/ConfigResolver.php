<?php

namespace RequiredAttributesBundle\Services;


use AppBundle\Services\ConfigProviderService;

class ConfigResolver
{
    private $configProviderService;

    /**
     * ConfigResolver constructor.
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(ConfigProviderService $configProviderService)
    {
        $this->configProviderService = $configProviderService;
    }

    /**
     * get the required attribute config for the category and the given type
     *
     * @param string $categoryCode: SIOP code of the category
     * @param string $requiredAttributeConfigType: one of the values from REQUIRED_ATTRIBUTE_CONFIG_TYPES_TO_DIR_MAPPING
     * @return array|null
     * @throws \Exception
     */
    public function getConfig(string $categoryCode, string $requiredAttributeConfigType): ?array
    {
        if(!array_key_exists($requiredAttributeConfigType, REQUIRED_ATTRIBUTE_CONFIG_TYPES_TO_DIR_MAPPING)){
            throw new \Exception('Required attribute config does not exist for type '.$requiredAttributeConfigType);
        }

        $configFilePath = REQUIRED_ATTRIBUTE_CONFIG_TYPES_TO_DIR_MAPPING[$requiredAttributeConfigType].'/'.$categoryCode.'.yml';

        if(!file_exists($configFilePath)){
            throw new \Exception("Config file ".$configFilePath." does not exist.");
        }

        return $this->getFileConfig($configFilePath);
    }


    private function getFileConfig($filePath){
        return $this->configProviderService->getConfigFromYmlFile($filePath);
    }

}