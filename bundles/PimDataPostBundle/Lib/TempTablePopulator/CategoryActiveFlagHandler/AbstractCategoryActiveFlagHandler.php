<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler;

use PimDataPostBundle\Lib\TempTablePopulator\ICategoryActiveFlagHandler;
use PimDataPostBundle\Model\Types\ShopType;

abstract class AbstractCategoryActiveFlagHandler implements ICategoryActiveFlagHandler
{
    public abstract function getShopType(): ShopType;
}