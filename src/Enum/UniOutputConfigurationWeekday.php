<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * This enum specifies all possible internal product hierarchy levels.
 */
enum UniOutputConfigurationWeekday: string implements OptionsProviderSupport
{
    case MON = 'Mon';
    case TUE = 'Tue';
    case WED = 'Wed';
    case THU = 'Thu';
    case FRI = 'Fri';
    case SAT = 'Sat';
    case SUN = 'Sun';

    public function label(): string
    {
        return match ($this) {
            self::MON => 'Mon',
            self::TUE => 'Tue',
            self::WED => 'Wed',
            self::THU => 'Thu',
            self::FRI => 'Fri',
            self::SAT => 'Sat',
            self::SUN => 'Sun',
        };
    }
}
