<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * This enum specifies all possible internal product hierarchy levels.
 */
enum UniProductCategoryLevel: string implements OptionsProviderSupport
{
    case PRODUCT_GROUP = 'PRODUCT_GROUP';
    case CATEGORY = 'CATEGORY';
    case SUB_CATEGORY = 'SUB_CATEGORY';
    case HIGH_LEVEL_BRAND = 'HIGH_LEVEL_BRAND';
    case PRODUCT_LINE = 'PRODUCT_LINE';
    case PRODUCT_VARIANT = 'PRODUCT_VARIANT';
    case FINISHED_GOOD = 'FINISHED_GOOD';

    public static function fromLevelNumber(int $level): self
    {
        return match ($level) {
            1 => self::PRODUCT_GROUP,
            2 => self::CATEGORY,
            3 => self::SUB_CATEGORY,
            4 => self::HIGH_LEVEL_BRAND,
            5 => self::PRODUCT_LINE,
            6 => self::PRODUCT_VARIANT,
            7 => self::FINISHED_GOOD,
            default => throw new \InvalidArgumentException(sprintf('Invalid level number: %s', $level)),
        };
    }

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
