<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * This interface defines a basis for enum based Pimcore option providers.
 */
interface OptionsProviderSupport extends \BackedEnum
{
    public function label(): string;
}
