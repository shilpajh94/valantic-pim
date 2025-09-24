<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * This enum specifies all possible internal product hierarchy levels.
 */
enum UniOutputConfigurationColumnType: string implements OptionsProviderSupport
{
    case LABEL = 'label';
    case TECHNICAL = 'technical';

    public function label(): string
    {
        return match ($this) {
            self::LABEL => 'Label',
            self::TECHNICAL => 'Technical',
        };
    }
}
