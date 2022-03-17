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
                        ->getConfigForKeyValue($this->getCompleteAttributeConfig(),"isTranslationMaster",true);
    }

    public function getLocalizedAttributeConfig(): array
    {

    }

    public function getSalesForceRelationalAttributeConfig(): array
    {
        return $this->getPIMRelationalAttributeConfig($this->getCompleteAttributeConfig());
    }

    public function getPIMRelationalAttributeConfig(): array
    {
        return $this->b2bAttributeConfigProviderHelper
                        ->getConfigForKeyValue($this->getCompleteAttributeConfig(),"relationalAttr",true);
    }

}