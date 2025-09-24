<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * This enum specifies all possible internal product hierarchy levels.
 */
enum UniOutputConfigurationFrequencyType: string implements OptionsProviderSupport
{
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';

    public function label(): string
    {
        return match ($this) {
            self::DAILY => 'Daily',
            self::WEEKLY => 'Weekly',
            self::MONTHLY => 'Monthly',
        };
    }
}
