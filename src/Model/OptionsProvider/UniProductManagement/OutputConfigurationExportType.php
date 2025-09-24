<?php

declare(strict_types=1);

namespace App\Model\OptionsProvider\UniProductManagement;

use App\Enum\UniOutputConfigurationExportType;
use App\Model\OptionsProvider\AbstractEnumOptionsProvider;

/** @extends AbstractEnumOptionsProvider<UniOutputConfigurationExportType> */
class OutputConfigurationExportType extends AbstractEnumOptionsProvider
{
    protected function getEnumClass(): string
    {
        return UniOutputConfigurationExportType::class;
    }
}
