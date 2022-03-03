<?php

namespace PimDataPostBundle\AttributeConfigProvider\B2B;

use PimDataPostBundle\Model\Types\ClassType;

abstract class B2BProductAttributeConfigProvider extends AbstractB2BAttributeConfigProvider
{
    private $classType = ClassType::PRODUCT();

    private $b2bAttributeConfigProviderHelper;

    public function __construct()
    {
        $this->b2bAttributeConfigProviderHelper = new B2BAttributeConfigProviderHelper();
    }

    public function getClassType(): ClassType
    {
        return $this->classType;
    }

    public function getCompleteConfig(): array
    {
        return $this->b2bAttributeConfigProviderHelper->getCompleteConfig($this->getShopType(),$this->getClassType());
    }

}