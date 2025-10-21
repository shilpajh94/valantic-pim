<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * This enum specifies all possible types how objects can be handled.
 */
enum UniOutputConfigurationExportObjectHandling: string implements OptionsProviderSupport
{
    case SELECTED = 'selected';
    case FINISHED_GOODS = 'finished_goods';

    public function label(): string
    {
        return match ($this) {
            self::SELECTED => 'Export only selected elements',
            self::FINISHED_GOODS => 'Export all finished goods in hierarchy',
        };
    }
}
