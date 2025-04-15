<?php

declare(strict_types=1);

namespace App\Enum;

interface OptionsProviderSupport extends \BackedEnum
{
    public function label(): string;
}
