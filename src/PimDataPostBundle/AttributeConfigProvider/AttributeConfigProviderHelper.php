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
        
        $configProvider = new ConfigProviderService();
        return $configProvider->getConfigFromYmlFile($filePath);
    }

    private function getConfigFileName($shopType, $classType): string
    {
        $shopType = \strtoupper($shopType);
        $classType = \strtolower($classType);
        return PIMDATAPOSTBUNDLE_CONFIG_DIRECTORY."/{$shopType}/{$classType}.yml";
    }
}