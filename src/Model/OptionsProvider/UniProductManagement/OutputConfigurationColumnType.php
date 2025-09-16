<?php

declare(strict_types=1);

namespace App\Model\OptionsProvider\UniProductManagement;

use App\Enum\UniOutputConfigurationColumnType;
use App\Model\OptionsProvider\AbstractEnumOptionsProvider;

/** @extends AbstractEnumOptionsProvider<UniOutputConfigurationColumnType> */
class OutputConfigurationColumnType extends AbstractEnumOptionsProvider
{
    protected function getEnumClass(): string
    {
        return UniOutputConfigurationColumnType::class;
    }
}
