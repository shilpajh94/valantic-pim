<?php

declare(strict_types=1);

namespace App\Model\OptionsProvider\UniProductManagement;

use App\Enum\UniOutputConfigurationFrequencyType;
use App\Model\OptionsProvider\AbstractEnumOptionsProvider;

/** @extends AbstractEnumOptionsProvider<UniOutputConfigurationFrequencyType> */
class OutputConfigurationFrequencyType extends AbstractEnumOptionsProvider
{
    protected function getEnumClass(): string
    {
        return UniOutputConfigurationFrequencyType::class;
    }
}
