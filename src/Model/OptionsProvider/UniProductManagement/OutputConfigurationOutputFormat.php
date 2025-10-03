<?php

declare(strict_types=1);

namespace App\Model\OptionsProvider\UniProductManagement;

use App\Enum\UniOutputConfigurationOutputFormat;
use App\Model\OptionsProvider\AbstractEnumOptionsProvider;

/** @extends AbstractEnumOptionsProvider<UniOutputConfigurationOutputFormat> */
class OutputConfigurationOutputFormat extends AbstractEnumOptionsProvider
{
    protected function getEnumClass(): string
    {
        return UniOutputConfigurationOutputFormat::class;
    }
}
