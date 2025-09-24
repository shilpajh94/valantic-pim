<?php

declare(strict_types=1);

namespace App\Model\OptionsProvider\UniProductManagement;

use App\Enum\UniOutputConfigurationWeekday;
use App\Model\OptionsProvider\AbstractEnumOptionsProvider;

/**
 * @extends AbstractEnumOptionsProvider<UniOutputConfigurationWeekday>
 */
class OutputConfigurationWeekday extends AbstractEnumOptionsProvider
{
    /**
     * @return class-string<UniOutputConfigurationWeekday>
     */
    protected function getEnumClass(): string
    {
        return UniOutputConfigurationWeekday::class;
    }
}
