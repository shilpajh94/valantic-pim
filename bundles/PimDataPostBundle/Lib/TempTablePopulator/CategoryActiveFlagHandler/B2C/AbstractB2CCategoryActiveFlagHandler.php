<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2C;

use PimDataPostBundle\Lib\TempTablePopulator\ICategoryActiveFlagHandler;
use PimDataPostBundle\Model\Types\ShopType;

abstract class AbstractB2CCategoryActiveFlagHandler implements ICategoryActiveFlagHandler
{
    public abstract function getShopType(): ShopType;
}