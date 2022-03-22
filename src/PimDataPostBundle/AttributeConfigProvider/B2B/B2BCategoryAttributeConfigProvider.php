<?php

namespace PimDataPostBundle\AttributeConfigProvider\B2B;

use PimDataPostBundle\Model\Types\ClassType;

class B2BCategoryAttributeConfigProvider extends AbstractB2BAttributeConfigProvider
{
    private $classType;

    private $b2bAttributeConfigProviderHelper;

    public function __construct()
    {
        $this->b2bAttributeConfigProviderHelper = new B2BAttributeConfigProviderHelper();
        $this->classType = ClassType::CATEGORY();
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

    public function getLocalizedAttributeConfig(): array
    {

    }

    public function getSalesForceRelationalAttributeConfig(): array
    {
        
    }

    public function getPIMRelationalAttributeConfig(): array
    {
        return $this->b2bAttributeConfigProviderHelper
                        ->getConfigForKeyValue($this->getCompleteAttributeConfig(),"relationalAttr",true);
    }

}