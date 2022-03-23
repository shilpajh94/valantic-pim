<?php

namespace PimDataPostBundle\AttributeConfigProvider\B2B;

use PimDataPostBundle\Model\Types\ClassType;

class B2BProductAttributeConfigProvider extends AbstractB2BAttributeConfigProvider
{
    private $classType;

    private $b2bAttributeConfigProviderHelper;

    public function __construct()
    {
        $this->b2bAttributeConfigProviderHelper = new B2BAttributeConfigProviderHelper();
        $this->classType = ClassType::PRODUCT();
        parent::__construct();
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    public function getCompleteConfig(): array
    {
        return $this->b2bAttributeConfigProviderHelper->getCompleteConfig($this->getShopType(),$this->getClassType());
    }

    public function getCompleteAttributeConfig(): array
    {
        return $this->b2bAttributeConfigProviderHelper->getCompleteAttributeConfig($this->getShopType(),$this->getClassType());
    }

    public function getTranslationMasterConfig(): array
    {
        return $this->b2bAttributeConfigProviderHelper
                        ->getConfigForKeyValue($this->getCompleteAttributeConfig(),"update_product_if_master_updated",true);
    }

    public function getLocalizedAttributeConfig(): array
    {

    }

    public function getSalesForceRelationalAttributeConfig(): array
    {
        return $this->b2bAttributeConfigProviderHelper
                        ->getConfigForKeyValue($this->getCompleteAttributeConfig(),"sf_relational_attribute",true);
    }

    // public function getPIMRelationalAttributeConfig($attrbuteForGrouping): array
    // {
    //     return $this->b2bAttributeConfigProviderHelper
    //                     ->getConfigForKeyValue($this->getCompleteAttributeConfig(),$attrbuteForGrouping,true);
    // }

}