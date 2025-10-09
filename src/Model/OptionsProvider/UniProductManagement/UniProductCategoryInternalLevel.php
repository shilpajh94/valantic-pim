<?php

declare(strict_types=1);

namespace App\Model\OptionsProvider\UniProductManagement;

use App\Enum\UniProductHierarchyLevel;
use App\Model\OptionsProvider\AbstractEnumOptionsProvider;

/** @extends AbstractEnumOptionsProvider<UniProductHierarchyLevel> */
class UniProductCategoryInternalLevel extends AbstractEnumOptionsProvider
{
    protected function getEnumClass(): string
    {
        return UniProductHierarchyLevel::class;
    }
}
