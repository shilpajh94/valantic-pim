<?php

namespace App\Enum;

enum ProductCategoryLevel: int
{
    // TODO Discussion: Use constants for category levels or not?
    //      -> Con: They are supposed to be flexible and might change.
    //      -> Pro: It's easier to figure out what code needs to be changed

    case PRODUCT_GROUP = 1;
    case CATEGORY = 2;
    case SUB_CATEGORY = 3;
    case HIGH_LEVEL_BRAND = 4;
    case PRODUCT_LINE = 5;
    case PRODUCT_VARIANT = 6;
    case FINISHED_GOOD = 7;
}
