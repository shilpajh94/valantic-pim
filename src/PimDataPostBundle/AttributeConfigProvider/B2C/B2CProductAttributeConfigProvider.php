<?php

namespace PimDataPostBundle\AttributeConfigProvider\B2C;

use PimDataPostBundle\Model\Types\ClassType;

class B2CProductAttributeConfigProvider extends AbstractB2CAttributeConfigProvider
{
    private $classType;

    private $b2cAttributeConfigProviderHelper;

    public function __construct()
    {
        $this->b2cAttributeConfigProviderHelper = new B2CAttributeConfigProviderHelper();
        $this->classType = ClassType::PRODUCT();
        parent::__construct();
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    public function getCompleteConfig(): array
    {
        return $this->b2cAttributeConfigProviderHelper->getCompleteConfig($this->getShopType(),$this->getClassType());
    }

    public function getCompleteAttributeConfig(): array
    {
        return $this->b2cAttributeConfigProviderHelper->getCompleteAttributeConfig($this->getShopType(),$this->getClassType());
    }

    public function getTranslationMasterConfig(): array
    {
        return $this->b2cAttributeConfigProviderHelper
                        ->getConfigForKeyValue($this->getCompleteAttributeConfig(),"update_product_if_master_updated",true);
    }

    public function getLocalizedAttributeConfig(): array
    {
        return [];
    }

    public function getSalesForceRelationalAttributeConfig(): array
    {
        return $this->b2cAttributeConfigProviderHelper
                        ->getConfigForKeyValue($this->getCompleteAttributeConfig(),"sf_relational_attribute",true);
    }

}