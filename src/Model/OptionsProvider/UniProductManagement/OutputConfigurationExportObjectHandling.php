<?php

declare(strict_types=1);

namespace App\Model\OptionsProvider\UniProductManagement;

use App\Enum\UniOutputConfigurationExportObjectHandling;
use App\Model\OptionsProvider\AbstractEnumOptionsProvider;

/** @extends AbstractEnumOptionsProvider<UniOutputConfigurationExportObjectHandling> */
class OutputConfigurationExportObjectHandling extends AbstractEnumOptionsProvider
{
    protected function getEnumClass(): string
    {
        return UniOutputConfigurationExportObjectHandling::class;
    }
}
