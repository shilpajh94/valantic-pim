<?php 

return [
    "ItemCount" => [
        "name" => "ItemCount",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n    o1.`o_key` as `Key`,\n    o1.`articleNumber` AS `Article Number`,\n`en`.`sapDescription` AS `SAP Description`,\n    o1.`siopFullCode` AS `SIOP Full Code` ,\n    o1.`ProductType` AS `Product Type`,\n    cat1.`description` AS `SIOP Level 1`,\n    cat2.`description` AS `SIOP Level 2`,\n    cat3.`description` AS `SIOP Level 3`,\n    cat4.`description` AS `SIOP Level 4`,\n    cat5.`description` AS `SIOP Level 5`,\n    cat6.`description` AS `SIOP Level 6`,\n    o1.`o_id`",
                "from" => "FROM object_1 o1\nLEFT JOIN\n    object_localized_query_2_en cat1 ON cat1.`ooo_id` = SUBSTRING(o1.`SIOPLevel1`,\n        2,\n        (LENGTH(o1.`SIOPLevel1`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat2 ON cat2.`ooo_id` = SUBSTRING(o1.`SIOPLevel2`,\n        2,\n        (LENGTH(o1.`SIOPLevel2`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat3 ON cat3.`ooo_id` = SUBSTRING(o1.`SIOPLevel3`,\n        2,\n        (LENGTH(o1.`SIOPLevel3`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat4 ON cat4.`ooo_id` = SUBSTRING(o1.`SIOPLevel4`,\n        2,\n        (LENGTH(o1.`SIOPLevel4`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat5 ON cat5.`ooo_id` = SUBSTRING(o1.`SIOPLevel5`,\n        2,\n        (LENGTH(o1.`SIOPLevel5`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat6 ON cat6.`ooo_id` = SUBSTRING(o1.`SIOPLevel6`,\n        2,\n        (LENGTH(o1.`SIOPLevel6`) - 2)) \n\tLEFT JOIN\n    `object_localized_query_1_en` `en` ON `en`.`ooo_id` = `o1`.`o_id`",
                "where" => "WHERE (o1.`o_published` =1)",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Key",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 300,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel315-11"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "Object ID",
                "filter" => "string",
                "columnAction" => "openObject",
                "id" => "extModel315-12"
            ]
        ],
        "niceName" => "Item Count",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => NULL,
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1608288402,
        "creationDate" => 1606361037,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ItemCount"
    ],
    "NewProducts" => [
        "name" => "NewProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n    o1.`o_key` as `Key`,\n    o1.`articleNumber` AS `Article Number`,\n`en`.`sapDescription` AS `SAP Description`,\n    o1.`siopFullCode` AS `SIOP Full Code` ,\n    o1.`ProductType` AS `Product Type`,\n    cat1.`description` AS `SIOP Level 1`,\n    cat2.`description` AS `SIOP Level 2`,\n    cat3.`description` AS `SIOP Level 3`,\n    cat4.`description` AS `SIOP Level 4`,\n    cat5.`description` AS `SIOP Level 5`,\n    cat6.`description` AS `SIOP Level 6`,\n    o1.`o_id` ",
                "from" => "FROM object_1 o1\nLEFT JOIN\n    object_localized_query_2_en cat1 ON cat1.`ooo_id` = SUBSTRING(o1.`SIOPLevel1`,\n        2,\n        (LENGTH(o1.`SIOPLevel1`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat2 ON cat2.`ooo_id` = SUBSTRING(o1.`SIOPLevel2`,\n        2,\n        (LENGTH(o1.`SIOPLevel2`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat3 ON cat3.`ooo_id` = SUBSTRING(o1.`SIOPLevel3`,\n        2,\n        (LENGTH(o1.`SIOPLevel3`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat4 ON cat4.`ooo_id` = SUBSTRING(o1.`SIOPLevel4`,\n        2,\n        (LENGTH(o1.`SIOPLevel4`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat5 ON cat5.`ooo_id` = SUBSTRING(o1.`SIOPLevel5`,\n        2,\n        (LENGTH(o1.`SIOPLevel5`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat6 ON cat6.`ooo_id` = SUBSTRING(o1.`SIOPLevel6`,\n        2,\n        (LENGTH(o1.`SIOPLevel6`) - 2)) \n\tLEFT JOIN\n    `object_localized_query_1_en` `en` ON `en`.`ooo_id` = `o1`.`o_id`",
                "where" => "WHERE (o1.`o_published` =1) AND (o1.`o_creationDate` > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 DAY)))",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Key",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 300,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3708-11"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "Object ID",
                "filter" => "string",
                "columnAction" => "openObject",
                "id" => "extModel3708-12"
            ]
        ],
        "niceName" => "New Products",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => NULL,
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1608104456,
        "creationDate" => 1606362991,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "NewProducts"
    ],
    "BrandProducts" => [
        "name" => "BrandProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\no1.`o_key` as `Key`,\no1.`articleNumber` AS `Article Number`, \nen.`sapDescription` AS `SAP Description`,\no3.`name` AS `Brand`, \no1.`siopFullCode` AS `SIOP Full Code` ,\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "FROM\nobject_1 o1\nLEFT JOIN object_3 o3 \n\tON o3.`oo_id` = o1.brandName\nLEFT JOIN `object_localized_query_1_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "WHERE (o1.`o_published` =1) ",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Key",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 300,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-4"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-5"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-6"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-7"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-8"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-9"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-10"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-11"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel3954-12"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "Object ID",
                "filter" => "string",
                "columnAction" => "openObject",
                "id" => "extModel3954-13"
            ]
        ],
        "niceName" => "Brand Products",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => NULL,
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1608102702,
        "creationDate" => 1606812138,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "BrandProducts"
    ],
    "ProductsWithNoImage" => [
        "name" => "ProductsWithNoImage",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\no1.`o_key` as `Key`,\n o1.`articleNumber` AS `Article Number`, \nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code` ,\nIF(o1.`mainImage` IS NOT NULL, \"True\", \"False\") AS `Main Image`, \nIF(o1.`frontView` IS NOT NULL, \"True\", \"False\") AS `Front View Image`,\nIF(o1.`sideView` IS NOT NULL, \"True\", \"False\") AS `Side View Image`,\nIF(o1.`cutView` IS NOT NULL, \"True\", \"False\") AS `Cut View Image`,\nIF(o1.`epixImage` IS NOT NULL, \"True\", \"False\") AS `Epix Image`,\nIF(o1.`altImage1` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 1`,\nIF(o1.`altImage2` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 2`,\nIF(o1.`altImage3` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 3`,\nIF(o1.`altImage4` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 4`,\nIF(o1.`altImage5` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 5`,\nIF(o1.`altImage6` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 6`,\nIF(o1.`altImage7` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 7`,\nIF(o1.`altImage8` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 8`,\nIF(o1.`altImage9` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 9`,\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "FROM object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "WHERE (o1.`mainImage` IS NULL OR o1.`frontView` IS NULL OR o1.`sideView` IS NULL OR o1.`cutView` IS NULL OR o1.`epixImage` IS NULL OR o1.`altImage1` IS NULL OR o1.`altImage2` IS NULL OR o1.`altImage3` IS NULL OR o1.`altImage4` IS NULL OR o1.`altImage5` IS NULL OR o1.`altImage6` IS NULL OR o1.`altImage7` IS NULL OR o1.`altImage8` IS NULL OR o1.`altImage9` IS NULL) AND (o1.`o_published` =1)",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Key",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 300,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-25"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "columnAction" => "",
                "id" => "extModel4624-5"
            ],
            [
                "name" => "Front View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "columnAction" => "",
                "id" => "extModel4624-6"
            ],
            [
                "name" => "Side View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "columnAction" => "",
                "id" => "extModel4624-7"
            ],
            [
                "name" => "Cut View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "columnAction" => "",
                "id" => "extModel4624-8"
            ],
            [
                "name" => "Epix Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-9"
            ],
            [
                "name" => "Alternate Image 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-10"
            ],
            [
                "name" => "Alternate Image 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-11"
            ],
            [
                "name" => "Alternate Image 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-12"
            ],
            [
                "name" => "Alternate Image 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-13"
            ],
            [
                "name" => "Alternate Image 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-14"
            ],
            [
                "name" => "Alternate Image 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-15"
            ],
            [
                "name" => "Alternate Image 7",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-16"
            ],
            [
                "name" => "Alternate Image 8",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-17"
            ],
            [
                "name" => "Alternate Image 9",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-18"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-19"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-20"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-21"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-22"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-23"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4624-24"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "Object ID",
                "filter" => "string",
                "columnAction" => "openObject",
                "id" => "extModel4624-26"
            ]
        ],
        "niceName" => "Products with No Images",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => NULL,
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1608103299,
        "creationDate" => 1606817832,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ProductsWithNoImage"
    ],
    "DataCompleteness" => [
        "name" => "DataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \no1.`o_key` as `Key`,\no1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\nen.CompletenessPercentage \"COMPLETED (%)\",\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "(o1.`o_published` =1) AND (en.`CompletenessPercentage`  != \"\")",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Key",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 300,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-5"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-6"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-7"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-8"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-9"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-10"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-11"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5305-12"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "Object ID",
                "filter" => "string",
                "columnAction" => "openObject",
                "id" => "extModel5305-13"
            ]
        ],
        "niceName" => "Data Completeness",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => NULL,
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1608103142,
        "creationDate" => 1606822831,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "DataCompleteness"
    ],
    "ProductAttributeIncomplete" => [
        "name" => "ProductAttributeIncomplete",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\no1.`o_key` as `Key`,\no1.`articleNumber` AS `Article Number`, `en`.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id` ",
                "from" => "FROM object_1 o1 \nLEFT JOIN `object_localized_query_1_en` `en` \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "WHERE (o1.`o_published` =1) AND\n(o1.`SIOPLevel2` IS NULL\nOR o1.`SIOPLevel2` = \"\"\nOR o1.`SIOPLevel3` IS NULL\nOR o1.`SIOPLevel3` = \"\"\nOR o1.`SIOPLevel4` IS NULL\nOR o1.`SIOPLevel4` = \"\"\nOR o1.`eanUpc` IS NULL\nOR o1.`eanUpc` = \"\"\nOR o1.`webDiscription` IS NULL\nOR o1.`webDiscription` = \"\"\nOR o1.`searchKeywords` IS NULL\nOR o1.`searchKeywords` = \"\"\nOR `en`.`longDescription` IS NULL\nOR `en`.`longDescription` = \"\"\nOR `en`.`FeaturesBenefitsBulletPoint` = \"\"\nOR `en`.`FeaturesBenefitsBulletPoint` IS NULL\nOR o1.`proposition65WarningAttributesRequired` IS NULL\nOR o1.`proposition65WarningAttributesRequired` = \"\"\nOR o1.`packageLengthIN` IS NULL\nOR o1.`packageLengthIN` = \"\"\nOR o1.`packageWidthIN` IS NULL\nOR o1.`packageWidthIN` = \"\"\nOR o1.`packageHeightIN` IS NULL\nOR o1.`packageHeightIN` = \"\"\nOR o1.`packageWeightLBS` IS NULL\nOR o1.`packageWeightLBS` = \"\"\nOR o1.`caseLengthIN` IS NULL\nOR o1.`caseLengthIN` = \"\"\nOR o1.`caseHeightIN` IS NULL\nOR o1.`caseHeightIN` = \"\"\nOR o1.`caseWidthIN` IS NULL\nOR o1.`caseWidthIN` = \"\"\nOR o1.`caseWeightLBS` IS NULL\nOR o1.`caseWeightLBS` = \"\"\n)",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Key",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 300,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5554-11"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "Object ID",
                "filter" => "string",
                "columnAction" => "openObject",
                "id" => "extModel5554-12"
            ]
        ],
        "niceName" => "Product Attribute Incompleteness",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => NULL,
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1608103230,
        "creationDate" => 1606824473,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ProductAttributeIncomplete"
    ],
    "WorkflowPendingProducts" => [
        "name" => "WorkflowPendingProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\no1.`o_key` as `Key`,o1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\nn.title AS `Last Action Name`, \nCONCAT(DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)), ' DAYS') AS 'Pending Since',\nFROM_UNIXTIME(n.`date`) AS `Last Action Date`, \no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "FROM notes n\nINNER JOIN\n(\n    SELECT `cid`, MAX(id) AS noteId\n    FROM notes\n    GROUP BY `cid`\n) n1 ON n.`cid` = n1.`cid` AND n.id = n1.noteId\nJOIN element_workflow_state e ON e.cid = n.cid \nLEFT JOIN object_1 o1 ON o1.oo_id = n.cid \nLEFT JOIN `object_localized_query_1_en` `en` ON `en`.`ooo_id` = `o1`.`o_id` \nLEFT JOIN object_localized_query_2_en cat1 ON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2)) \nLEFT JOIN object_localized_query_2_en cat2 ON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2)) \nLEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) \nLEFT JOIN object_localized_query_2_en cat4 ON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2)) \nLEFT JOIN object_localized_query_2_en cat5 ON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2)) \nLEFT JOIN object_localized_query_2_en cat6 ON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "WHERE (o1.`o_published` =1) AND ((e.place = 'review_content' ) OR (e.place = 'enrich' ))\nAND DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)) > 5",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Key",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 300,
                "label" => "",
                "id" => "extModel2607-12",
                "filter" => "string"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-1"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-2"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-3"
            ],
            [
                "name" => "Last Action Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel2522-4"
            ],
            [
                "name" => "Last Action Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-5"
            ],
            [
                "name" => "Pending Since",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-6"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-7"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-8"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-9"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-10"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-11"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-12"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-13"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "Object ID",
                "filter" => "string",
                "columnAction" => "openObject",
                "id" => "extModel2522-14"
            ]
        ],
        "niceName" => "Workflow Pending Products",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => NULL,
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1607404224,
        "creationDate" => 1606838413,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "WorkflowPendingProducts"
    ],
    "ChartBrandProduct" => [
        "name" => "ChartBrandProduct",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT o3.`name` AS `Brand`,  count(o1.`o_id`) AS `# of SKUs`",
                "from" => "FROM\nobject_1 o1\nLEFT JOIN object_3 o3 \n\tON o3.`oo_id` = o1.brandName",
                "where" => "WHERE (o1.`o_published` =1) ",
                "groupby" => "GROUP BY  o3.`name`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "filter" => "string",
                "id" => "extModel605-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel605-4"
            ]
        ],
        "niceName" => "Chart - Brand Product",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "pie",
        "pieColumn" => "# of SKUs",
        "pieLabelColumn" => "Brand",
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1613625582,
        "creationDate" => 1606812138,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ChartBrandProduct"
    ]
];
