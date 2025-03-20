<?php

namespace App\Enum;

enum ProductCategoryLevel: string
{
    case PRODUCT_GROUP = '1';
    case CATEGORY = '2';
    case SUB_CATEGORY = '3';
    case HIGH_LEVEL_BRAND = '4';
    case PRODUCT_LINE = '5';
    case PRODUCT_VARIANT = '6';
    case FINISHED_GOOD = '7';
}
