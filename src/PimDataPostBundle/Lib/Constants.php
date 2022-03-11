<?php

namespace PimDataPostBundle\Lib;

class Constants
{
    const B2B_PRODUCT_TEMP_TABLE_NAME = "b2b_product_temp";

    const B2B_PRODUCT_MASTER_TABLE_NAME = "b2b_product_master";


    const B2B_CATEGORY_TEMP_TABLE_NAME = "b2b_category_temp";

    const B2B_CATEGORY_MASTER_TABLE_NAME = "b2b_category_master";

    /**
     * To create a window to capture the pim changes
     * The window starts from timestamp ( UPDATE_WINDOW_END_HOUR - UPDATE_WINDOW_LENGTH_IN_MINUTES )
     * The window ends at timestamp UPDATE_WINDOW_END_HOUR (current day)
     * 
     * for example, if UPDATE_WINDOW_END_HOUR = 14 and UPDATE_WINDOW_LENGTH_IN_MINUTES = 180 then
     * the window starts from 11:00:00 (current day) and ends at 14:00:00 (current day)
     * 
     * value range: 0-23
     */
    const UPDATE_WINDOW_END_HOUR = 14;

    const UPDATE_WINDOW_LENGTH_IN_MINUTES = 1440;

}