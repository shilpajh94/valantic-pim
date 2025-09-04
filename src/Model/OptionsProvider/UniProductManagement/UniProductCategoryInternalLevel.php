<?php

namespace App\Model\OptionsProvider\UniProductManagement;

use App\Enum\UniProductCategoryLevel;
use App\Model\OptionsProvider\AbstractEnumOptionsProvider;

/** @extends AbstractEnumOptionsProvider<UniProductCategoryLevel> */
class UniProductCategoryInternalLevel extends AbstractEnumOptionsProvider
{
    protected function getEnumClass(): string
    {
        return UniProductCategoryLevel::class;
    }
}
