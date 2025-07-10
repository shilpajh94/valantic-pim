<?php

declare(strict_types=1);

namespace App\Enum;

enum UniProductCategoryLevel: string implements OptionsProviderSupport
{
    case PRODUCT_GROUP = 'PRODUCT_GROUP';
    case CATEGORY = 'CATEGORY';
    case SUB_CATEGORY = 'SUB_CATEGORY';
    case HIGH_LEVEL_BRAND = 'HIGH_LEVEL_BRAND';
    case PRODUCT_LINE = 'PRODUCT_LINE';
    case PRODUCT_VARIANT = 'PRODUCT_VARIANT';
    case FINISHED_GOOD = 'FINISHED_GOOD';

    public function label(): string
    {
        return match ($this) {
            self::PRODUCT_GROUP => 'Product Group',
            self::CATEGORY => 'Category',
            self::SUB_CATEGORY => 'Sub Category',
            self::HIGH_LEVEL_BRAND => 'High Level Brand',
            self::PRODUCT_LINE => 'Product Line Brand',
            self::PRODUCT_VARIANT => 'Product Variant (Skeleton)',
            self::FINISHED_GOOD => 'Finished Good',
        };
    }
}
