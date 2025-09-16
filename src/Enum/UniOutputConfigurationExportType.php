<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * This enum specifies all possible internal product hierarchy levels.
 */
enum UniOutputConfigurationExportType: string implements OptionsProviderSupport
{
    case SCHEDULED = 'scheduled';
    case ONE_TIME = 'one_time';

    public function label(): string
    {
        return match ($this) {
            self::SCHEDULED => 'Scheduled',
            self::ONE_TIME => 'One-time',
        };
    }
}
