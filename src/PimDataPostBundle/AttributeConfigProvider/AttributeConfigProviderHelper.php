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

    private function getConfigFileName($shopType, $classType): string
    {
        $shopType = \strtoupper($shopType);
        $classType = \strtolower($classType);
        return PIMDATAPOSTBUNDLE_CONFIG_DIRECTORY."/{$shopType}/{$classType}.yml";
    }
}