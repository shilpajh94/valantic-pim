<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * This enum specifies all possible internal product hierarchy levels.
 */
enum UniOutputConfigurationOutputFormat: string implements OptionsProviderSupport
{
    case CSV = 'csv';
    case XLSX = 'xlsx';

    public function label(): string
    {
        return match ($this) {
            self::CSV => 'csv',
            self::XLSX => 'xlsx',
        };
    }
}
