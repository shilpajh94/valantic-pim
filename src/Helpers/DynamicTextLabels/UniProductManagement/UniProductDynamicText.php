<?php

declare(strict_types=1);

namespace App\Helpers\DynamicTextLabels\UniProductManagement;

class UniProductDynamicText
{
    private const TEMPLATE = '<div class="x-form-item"><span class="x-form-item-label-default" style="display:inline-block; width: 205px">%s: </span><span>%s</span></div>';

    protected function renderText(string $label, ?string $value = null): string
    {
        return sprintf(self::TEMPLATE, $label, $value ?? '—');
    }
}
