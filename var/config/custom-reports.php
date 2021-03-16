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
                "sql" => "SELECT\no1.`o_key` as `Key`,o1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\nn.title AS `Last Action Note`, \nCONCAT(DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)), ' DAYS') AS 'Pending Since',\nFROM_UNIXTIME(n.`date`) AS `Last Action Date`, \no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "FROM notes n\nINNER JOIN\n(\n    SELECT `cid`, MAX(id) AS noteId\n    FROM notes\n    GROUP BY `cid`\n) n1 ON n.`cid` = n1.`cid` AND n.id = n1.noteId\nJOIN element_workflow_state e ON e.cid = n.cid \nLEFT JOIN object_1 o1 ON o1.oo_id = n.cid \nLEFT JOIN `object_localized_query_1_en` `en` ON `en`.`ooo_id` = `o1`.`o_id` \nLEFT JOIN object_localized_query_2_en cat1 ON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2)) \nLEFT JOIN object_localized_query_2_en cat2 ON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2)) \nLEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) \nLEFT JOIN object_localized_query_2_en cat4 ON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2)) \nLEFT JOIN object_localized_query_2_en cat5 ON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2)) \nLEFT JOIN object_localized_query_2_en cat6 ON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "WHERE (o1.`o_published` =1) AND (e.place = 'review_content' )\nAND DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)) > 5",
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
                "id" => "extModel408-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-4"
            ],
            [
                "name" => "Last Action Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel408-5"
            ],
            [
                "name" => "Last Action Note",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel408-16",
                "filter" => "string"
            ],
            [
                "name" => "Pending Since",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-7"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-8"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-9"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-10"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-11"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-12"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-13"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel408-14"
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
                "id" => "extModel408-15"
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
        "modificationDate" => 1615715453,
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
                "sql" => "SELECT cat4.`description` AS `SIOP Level 4`, o3.`name` AS `Brand`,  \ncount(`o1`.`o_id`) AS `# of SKUs`",
                "from" => "FROM\nobject_1 o1\nLEFT JOIN object_3 o3 \n\tON o3.`oo_id` = o1.brandName\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))",
                "where" => "WHERE (o1.`o_published` =1) ",
                "groupby" => "GROUP BY cat4.`description`,  o3.`name`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "id" => "extModel8961-6",
                "filter" => "string"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel8961-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel8961-5"
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
        "modificationDate" => 1614075082,
        "creationDate" => 1606812138,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ChartBrandProduct"
    ],
    "ChartProductsWithNoImage" => [
        "name" => "ChartProductsWithNoImage",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT temp.`SIOP3` AS `SIOP Level 3`, SUM(temp.`skus`) AS `# of SKUs`, temp.`images` AS `Main Image`",
                "from" => "FROM (SELECT\ncat3.`description` AS `SIOP3`,\ncount(o1.`o_id`) AS `skus`,\nIF(o1.`mainImage` IS NOT NULL, \"YES\", \"NO\") AS `images` FROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nWHERE (o1.`o_published` =1)\nGROUP BY cat3.`description`, o1.`mainImage`)  AS temp",
                "where" => "",
                "groupby" => "temp.`SIOP3`, temp.`images`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "id" => "extModel9130-11",
                "filter" => "string"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9130-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel9130-5"
            ]
        ],
        "niceName" => "Chart - Products with No Images - Main Image",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "pie",
        "pieColumn" => "# of SKUs",
        "pieLabelColumn" => "Main Image",
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1614075246,
        "creationDate" => 1606817832,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ChartProductsWithNoImage"
    ],
    "ChartNewProducts" => [
        "name" => "ChartNewProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE() - INTERVAL 8 Month)AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE() - INTERVAL 8 Month) \nGROUP BY o1.`BusinessUnit`,cat2.`description`\n\nUNION \n\nSELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE() - INTERVAL 7 Month)AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE() - INTERVAL 7 Month) \nGROUP BY o1.`BusinessUnit`,cat2.`description`\n\nUNION\n\nSELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE() - INTERVAL 6 Month)AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE() - INTERVAL 6 Month) \nGROUP BY o1.`BusinessUnit`,cat2.`description`\n\nUNION\n\nSELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE() - INTERVAL 5 Month)AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE() - INTERVAL 5 Month) \nGROUP BY o1.`BusinessUnit`,cat2.`description`\n\nUNION\n\nSELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE() - INTERVAL 4 Month)AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE() - INTERVAL 4 Month) \nGROUP BY o1.`BusinessUnit`,cat2.`description`\n\nUNION\n\nSELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE() - INTERVAL 3 Month)AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE() - INTERVAL 3 Month) \nGROUP BY o1.`BusinessUnit`,cat2.`description`\n\nUNION\n\nSELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE() - INTERVAL 2 Month)AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE() - INTERVAL 2 Month) \nGROUP BY o1.`BusinessUnit`,cat2.`description`\n\nUNION\n\nSELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE() - INTERVAL 1 Month)AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE() - INTERVAL 1 Month) \nGROUP BY o1.`BusinessUnit`,cat2.`description`\n\nUNION\n\nSELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`,MONTHNAME(CURDATE())AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`\nFROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat2 \nON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nWHERE MONTH(FROM_UNIXTIME(o1.`o_creationDate`)) = MONTH(CURDATE()) \nGROUP BY o1.`BusinessUnit`, cat2.`description`",
                "from" => "",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "BusinessUnit",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel414-3"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel414-4"
            ],
            [
                "name" => "Month",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel414-5"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel414-6"
            ]
        ],
        "niceName" => "Chart - New Products",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "Month",
        "yAxis" => [
            "# of SKUs"
        ],
        "modificationDate" => 1615487332,
        "creationDate" => 1614589190,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ChartNewProducts"
    ],
    "ChartDataCompleteness" => [
        "name" => "ChartDataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \ncount(o1.`o_key`) as `# of SKUs`, ROUND((sum(en.CompletenessPercentage)/count(o1.`o_key`)),3)  AS `COMPLETED (%)`,\ncat3.`description` AS `SIOP Level 3`",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \nON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat3 \nON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))",
                "where" => "(o1.`o_published` =1)",
                "groupby" => "cat3.`description`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "id" => "extModel972-5",
                "filter" => "string"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "id" => "extModel972-3",
                "filter" => "numeric"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel972-4",
                "filter" => "numeric"
            ]
        ],
        "niceName" => "Chart - Data Completeness",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "pie",
        "pieColumn" => "COMPLETED (%)",
        "pieLabelColumn" => "SIOP Level 3",
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1615438796,
        "creationDate" => 1614589821,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ChartDataCompleteness"
    ],
    "ChartSKUsUnderReview" => [
        "name" => "ChartSKUsUnderReview",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT count(o1.`o_id`) AS `# of SKUs`, \nCASE\n    WHEN  w.`place` = 'enrich' OR w.`place` is null  THEN 'Enrich Product'\n    WHEN  w.`place` = 'review_content' THEN 'Review Enriched Data'\n    WHEN  w.`place` = 'unpublished' THEN 'Product Unpublished'\n    WHEN  w.`place` = 'accepted' THEN 'Product Published'\n    ELSE \"\"\nEND AS `Status` ",
                "from" => "FROM object_1 o1 \nleft JOIN element_workflow_state w ON o1.oo_id = w.cid ",
                "where" => "",
                "groupby" => "GROUP BY `Status`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel294-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel294-4"
            ]
        ],
        "niceName" => "Chart - SKUs Workflow Status",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "pie",
        "pieColumn" => "# of SKUs",
        "pieLabelColumn" => "Status",
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1615792328,
        "creationDate" => 1614630048,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ChartSKUsUnderReview"
    ],
    "ChartProductAtrributrIncomplete" => [
        "name" => "ChartProductAtrributrIncomplete",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT t.SIOPLevel3, t.SIOPLevel4, count(t.`Key`) AS `# of SKUs`,\ncase \n   when t.healthCheckPercentage >= 0 and t.healthCheckPercentage<= 20 then '0-20'\n   when t.healthCheckPercentage >= 21 and t.healthCheckPercentage<=40 then '21-40'\n   when t.healthCheckPercentage >= 41 and t.healthCheckPercentage<=60 then '41-60'\nwhen t.healthCheckPercentage >= 61 and t.healthCheckPercentage<=80 then '61-80'\n   else '81-100' \n   end as `Incompleteness Percentage`",
                "from" => "FROM (SELECT \no1.`o_id`,\no1.`o_key` as `Key`,\ncat3.`description` AS `SIOPLevel3`,\ncat4.`description` AS `SIOPLevel4`,\n((IF(o1.`SIOPLevel1` IS NULL OR o1.`SIOPLevel1` = \"\", 1, 0)+\nIF(o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\", 1, 0)+\nIF(o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\", 1, 0) +\nIF(o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\", 1, 0) +\nIF(o1.`SIOPLevel5` IS NULL OR o1.`SIOPLevel5` = \"\", 1, 0) +\nIF(o1.`SIOPLevel6` IS NULL OR o1.`SIOPLevel6` = \"\", 1, 0) +\nIF(o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\", 1, 0) +\nIF(o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\", 1, 0) +\nIF(o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\", 1, 0) +\nIF(en.`longDescription` IS NULL OR en.`longDescription` = \"\", 1, 0) +\nIF(en.`FeaturesBenefitsBulletPoint` IS NULL OR en.`FeaturesBenefitsBulletPoint` = \"\", 1, 0) +\nIF(o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\", 1, 0)+\nIF(o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\", 1, 0) +\nIF(o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\", 1, 0) +\nIF(o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\", 1, 0)+\nIF(o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\", 1, 0)+\nIF(o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\", 1, 0) +\nIF(o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\", 1, 0) +\nIF(o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\", 1, 0) +\nIF(o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\", 1, 0) )/20)*100 AS healthCheckPercentage\n\n\nFROM object_1 o1 \n\nLEFT JOIN `object_localized_query_1_en` `en`ON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\n\nWHERE (o1.`o_published` =1) \nAND (\no1.`SIOPLevel2` IS NULL \nOR o1.`SIOPLevel2` = \"\" \nOR o1.`SIOPLevel3` IS NULL \nOR o1.`SIOPLevel3` = \"\" \nOR o1.`SIOPLevel4` IS NULL \nOR o1.`SIOPLevel4` = \"\" \nOR o1.`eanUpc` IS NULL \nOR o1.`eanUpc` = \"\" \nOR o1.`webDiscription` IS NULL \nOR o1.`webDiscription` = \"\" \nOR o1.`searchKeywords` IS NULL \nOR o1.`searchKeywords` = \"\" \nOR `en`.`longDescription` IS NULL \nOR `en`.`longDescription` = \"\" \nOR `en`.`FeaturesBenefitsBulletPoint` = \"\" \nOR `en`.`FeaturesBenefitsBulletPoint` IS NULL\nOR o1.`proposition65WarningAttributesRequired` IS NULL \nOR o1.`proposition65WarningAttributesRequired` = \"\" \nOR o1.`packageLengthIN` IS NULL \nOR o1.`packageLengthIN` = \"\" \nOR o1.`packageWidthIN` IS NULL \nOR o1.`packageWidthIN` = \"\" \nOR o1.`packageHeightIN` IS NULL \nOR o1.`packageHeightIN` = \"\" \nOR o1.`packageWeightLBS` IS NULL \nOR o1.`packageWeightLBS` = \"\" \nOR o1.`caseLengthIN` IS NULL \nOR o1.`caseLengthIN` = \"\" \nOR o1.`caseHeightIN` IS NULL \nOR o1.`caseHeightIN` = \"\" \nOR o1.`caseWidthIN` IS NULL \nOR o1.`caseWidthIN` = \"\" \nOR o1.`caseWeightLBS` IS NULL \nOR o1.`caseWeightLBS` = \"\" )) AS t",
                "where" => "",
                "groupby" => "t.SIOPLevel3, t.SIOPLevel4, t.healthCheckPercentage",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOPLevel3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "id" => "extModel316-8",
                "filter" => "string"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel316-5"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel316-6"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel316-9",
                "filter" => "string"
            ]
        ],
        "niceName" => "Chart - Product Attribute Incompleteness",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => "# of SKUs",
        "pieLabelColumn" => "IncompleteRange",
        "xAxis" => "Incompleteness Percentage",
        "yAxis" => [
            "# of SKUs"
        ],
        "modificationDate" => 1615436789,
        "creationDate" => 1606824473,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "ChartProductAtrributrIncomplete"
    ],
    "CloneChartProdutAttributeIncomplete" => [
        "name" => "CloneChartProdutAttributeIncomplete",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT t2.SIOPLevel3, t2.SIOPLevel4, SUM(t2.SKUsCount) AS `# of SKUs`, t2.healthCheck as `Incompleteness Percentage` ",
                "from" => "FROM (SELECT t.SIOPLevel3, t.SIOPLevel4, count(t.`Key`) AS `SKUsCount`, case when t.healthCheckPercentage >= 0 and t.healthCheckPercentage<= 20 then '0-20' when t.healthCheckPercentage >= 21 and t.healthCheckPercentage<=40 then '21-40' when t.healthCheckPercentage >= 41 and t.healthCheckPercentage<=60 then '41-60' when t.healthCheckPercentage >= 61 and t.healthCheckPercentage<=80 then '61-80' else '81-100' end AS healthCheck FROM (SELECT o1.`o_id`, o1.`o_key` as `Key`, cat3.`description` AS `SIOPLevel3`, cat4.`description` AS `SIOPLevel4`, ((IF(o1.`SIOPLevel1` IS NULL OR o1.`SIOPLevel1` = \"\", 1, 0)+ IF(o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\", 1, 0)+ IF(o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\", 1, 0) + IF(o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\", 1, 0) + IF(o1.`SIOPLevel5` IS NULL OR o1.`SIOPLevel5` = \"\", 1, 0) + IF(o1.`SIOPLevel6` IS NULL OR o1.`SIOPLevel6` = \"\", 1, 0) + IF(o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\", 1, 0) + IF(o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\", 1, 0) + IF(o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\", 1, 0) + IF(en.`longDescription` IS NULL OR en.`longDescription` = \"\", 1, 0) + IF(en.`FeaturesBenefitsBulletPoint` IS NULL OR en.`FeaturesBenefitsBulletPoint` = \"\", 1, 0) + IF(o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\", 1, 0)+ IF(o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\", 1, 0) + IF(o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\", 1, 0) + IF(o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\", 1, 0)+ IF(o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\", 1, 0)+ IF(o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\", 1, 0) + IF(o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\", 1, 0) + IF(o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\", 1, 0) + IF(o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\", 1, 0) )/20)*100 AS healthCheckPercentage FROM object_1 o1 LEFT JOIN `object_localized_query_1_en` `en`ON `en`.`ooo_id` = `o1`.`o_id` LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) LEFT JOIN object_localized_query_2_en cat4 ON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2)) WHERE (o1.`o_published` =1) AND ( o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\" OR o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\" OR o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\" OR o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\" OR o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\" OR o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\" OR `en`.`longDescription` IS NULL OR `en`.`longDescription` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` IS NULL OR o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\" OR o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\" OR o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\" OR o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\" OR o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\" OR o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\" OR o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\" OR o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\" OR o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\" )) AS t GROUP BY t.SIOPLevel3, t.SIOPLevel4, t.healthCheckPercentage) AS t2",
                "where" => "",
                "groupby" => " \nGROUP BY t2.SIOPLevel3, t2.SIOPLevel4, t2.healthCheck",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOPLevel3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel432-7"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel432-8"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel432-9"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel432-10"
            ]
        ],
        "niceName" => "Clone - Chart - Product Attribute Incompleteness",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => "# of SKUs",
        "pieLabelColumn" => "IncompleteRange",
        "xAxis" => "Incompleteness Percentage",
        "yAxis" => [
            "# of SKUs"
        ],
        "modificationDate" => 1615869302,
        "creationDate" => 1606824473,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "CloneChartProdutAttributeIncomplete"
    ],
    "test" => [
        "name" => "test",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "select * ",
                "from" => "from testing",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel580-4"
            ],
            [
                "name" => "n1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel580-5"
            ],
            [
                "name" => "t1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel580-6"
            ],
            [
                "name" => "t2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel580-7"
            ]
        ],
        "niceName" => "test",
        "group" => "",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "n1",
        "yAxis" => [
            "t1",
            "t2"
        ],
        "modificationDate" => 1615870564,
        "creationDate" => 1615869722,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "test"
    ]
];
