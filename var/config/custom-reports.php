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
                "sql" => "SELECT o1.`BusinessUnit`,cat2.`description` AS `SIOP Level 2`, MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`  ",
                "from" => "FROM object_1 o1 LEFT JOIN object_localized_query_2_en cat2 ON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))  \n",
                "where" => "WHERE o1.`o_creationDate` >= MONTH(CURDATE() - Interval 9 month)  ",
                "groupby" => "GROUP BY o1.`BusinessUnit`,cat2.`description`, MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) order by o1.`o_creationDate` ",
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
                "id" => "extModel1450-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1450-4"
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
        "modificationDate" => 1615441276,
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
                "sql" => "SELECT t2.SIOPLevel3, t2.SIOPLevel4, SUM(t2.SKUsCount) AS `# of SKUs`, t2.healthCheck as `Incompleteness Percentage` ",
                "from" => "FROM (SELECT t.SIOPLevel3, t.SIOPLevel4, count(t.`Key`) AS `SKUsCount`, case when t.healthCheckPercentage >= 0 and t.healthCheckPercentage<= 20 then '0-20' when t.healthCheckPercentage >= 21 and t.healthCheckPercentage<=40 then '21-40' when t.healthCheckPercentage >= 41 and t.healthCheckPercentage<=60 then '41-60' when t.healthCheckPercentage >= 61 and t.healthCheckPercentage<=80 then '61-80' else '81-100' end AS healthCheck FROM (SELECT o1.`o_id`, o1.`o_key` as `Key`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))) AS `SIOPLevel3`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))) AS `SIOPLevel4`, ((IF(o1.`SIOPLevel1` IS NULL OR o1.`SIOPLevel1` = \"\", 1, 0)+ IF(o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\", 1, 0)+ IF(o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\", 1, 0) + IF(o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\", 1, 0) + IF(o1.`SIOPLevel5` IS NULL OR o1.`SIOPLevel5` = \"\", 1, 0) + IF(o1.`SIOPLevel6` IS NULL OR o1.`SIOPLevel6` = \"\", 1, 0) + IF(o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\", 1, 0) + IF(o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\", 1, 0) + IF(o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\", 1, 0) + IF(en.`longDescription` IS NULL OR en.`longDescription` = \"\", 1, 0) + IF(en.`FeaturesBenefitsBulletPoint` IS NULL OR en.`FeaturesBenefitsBulletPoint` = \"\", 1, 0) + IF(o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\", 1, 0)+ IF(o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\", 1, 0) + IF(o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\", 1, 0) + IF(o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\", 1, 0)+ IF(o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\", 1, 0)+ IF(o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\", 1, 0) + IF(o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\", 1, 0) + IF(o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\", 1, 0) + IF(o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\", 1, 0) )/20)*100 AS healthCheckPercentage FROM object_1 o1 LEFT JOIN `object_localized_query_1_en` `en`ON `en`.`ooo_id` = `o1`.`o_id` WHERE (o1.`o_published` =1) AND ( o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\" OR o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\" OR o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\" OR o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\" OR o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\" OR o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\" OR `en`.`longDescription` IS NULL OR `en`.`longDescription` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` IS NULL OR o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\" OR o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\" OR o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\" OR o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\" OR o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\" OR o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\" OR o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\" OR o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\" OR o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\" )) AS t GROUP BY t.SIOPLevel3, t.SIOPLevel4, t.healthCheckPercentage) AS t2 ",
                "where" => "",
                "groupby" => "GROUP BY t2.SIOPLevel3, t2.SIOPLevel4, t2.healthCheck",
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
    "IndustrialHoseChartBrandProduct" => [
        "name" => "IndustrialHoseChartBrandProduct",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT cat4.`description` AS `SIOP Level 4`, o3.`name` AS `Brand`, count(`o1`.`o_id`) AS `# of SKUs`",
                "from" => "FROM object_1 o1 LEFT JOIN object_3 o3 ON o3.`oo_id` = o1.brandName LEFT JOIN object_localized_query_2_en cat4 ON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))  ",
                "where" => "WHERE (o1.`o_published` =1 AND o1.siopFullCode LIKE '041000%') ",
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
                "width" => "",
                "label" => "",
                "id" => "extModel4266-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel4266-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel4266-5"
            ]
        ],
        "niceName" => "Chart - Brand Product",
        "group" => "Industrial Hose",
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
        "modificationDate" => 1620807442,
        "creationDate" => 1620661797,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartBrandProduct"
    ],
    "HydraulicHoseChartBrandProduct" => [
        "name" => "HydraulicHoseChartBrandProduct",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT cat4.`description` AS `SIOP Level 4`, o3.`name` AS `Brand`, count(`o1`.`o_id`) AS `# of SKUs`",
                "from" => "FROM object_1 o1 LEFT JOIN object_3 o3 ON o3.`oo_id` = o1.brandName LEFT JOIN object_localized_query_2_en cat4 ON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2)) ",
                "where" => "WHERE (o1.`o_published` =1 AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%'))  ",
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
                "width" => "",
                "label" => "",
                "id" => "extModel2502-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2502-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2502-5"
            ]
        ],
        "niceName" => "Chart - Brand Product",
        "group" => "Hydraulic Hose",
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
        "modificationDate" => 1620807118,
        "creationDate" => 1620661797,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartBrandProduct"
    ],
    "HydraulicFittingsChartBrandProduct" => [
        "name" => "HydraulicFittingsChartBrandProduct",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT cat4.`description` AS `SIOP Level 4`, o3.`name` AS `Brand`, count(`o1`.`o_id`) AS `# of SKUs` ",
                "from" => "FROM object_1 o1 LEFT JOIN object_3 o3 ON o3.`oo_id` = o1.brandName LEFT JOIN object_localized_query_2_en cat4 ON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))  ",
                "where" => "WHERE (o1.`o_published` =1 AND (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')) ",
                "groupby" => "GROUP BY cat4.`description`, o3.`name`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2978-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2978-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2978-5"
            ]
        ],
        "niceName" => "Chart - Brand Product",
        "group" => "Hydraulic Fittings",
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
        "modificationDate" => 1620807090,
        "creationDate" => 1620661797,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartBrandProduct"
    ],
    "PTGChartBrandProduct" => [
        "name" => "PTGChartBrandProduct",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT cat4.`description` AS `SIOP Level 4`, o3.`name` AS `Brand`, count(`o1`.`o_id`) AS `# of SKUs`",
                "from" => "FROM object_1 o1 LEFT JOIN object_3 o3 ON o3.`oo_id` = o1.brandName LEFT JOIN object_localized_query_2_en cat4 ON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2)) ",
                "where" => "WHERE (o1.`o_published` =1 AND o1.siopFullCode LIKE '043000%') ",
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
                "width" => "",
                "label" => "",
                "id" => "extModel2196-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2196-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2196-5"
            ]
        ],
        "niceName" => "Chart - Brand Product",
        "group" => "PTG",
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
        "modificationDate" => 1620807136,
        "creationDate" => 1620661797,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartBrandProduct"
    ],
    "IndustrialHoseChartProductsWithNoImage" => [
        "name" => "IndustrialHoseChartProductsWithNoImage",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT temp.`SIOP3` AS `SIOP Level 3`, SUM(temp.`skus`) AS `# of SKUs`, temp.`images` AS `Main Image`",
                "from" => "FROM (SELECT\ncat3.`description` AS `SIOP3`,\ncount(o1.`o_id`) AS `skus`,\nIF(o1.`mainImage` IS NOT NULL, \"YES\", \"NO\") AS `images` FROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) \nWHERE (o1.`o_published` =1 AND o1.siopFullCode LIKE '041000%')\nGROUP BY cat3.`description`, o1.`mainImage`)  AS temp",
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
                "filter" => "string",
                "id" => "extModel2043-3"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2043-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel2043-5"
            ]
        ],
        "niceName" => "Chart - Products with No Images - Main Image",
        "group" => "Industrial Hose",
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
        "modificationDate" => 1620807146,
        "creationDate" => 1606817832,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartProductsWithNoImage"
    ],
    "HydraulicHoseChartProductsWithNoImage" => [
        "name" => "HydraulicHoseChartProductsWithNoImage",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT temp.`SIOP3` AS `SIOP Level 3`, SUM(temp.`skus`) AS `# of SKUs`, temp.`images` AS `Main Image`",
                "from" => "FROM (SELECT\ncat3.`description` AS `SIOP3`,\ncount(o1.`o_id`) AS `skus`,\nIF(o1.`mainImage` IS NOT NULL, \"YES\", \"NO\") AS `images` FROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) \nWHERE (o1.`o_published` =1 AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%')) \nGROUP BY cat3.`description`, o1.`mainImage`)  AS temp",
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
                "filter" => "string",
                "id" => "extModel2349-3"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2349-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel2349-5"
            ]
        ],
        "niceName" => "Chart - Products with No Images - Main Image",
        "group" => "Hydraulic Hose",
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
        "modificationDate" => 1620807128,
        "creationDate" => 1606817832,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartProductsWithNoImage"
    ],
    "PTGChartProductsWithNoImage" => [
        "name" => "PTGChartProductsWithNoImage",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT temp.`SIOP3` AS `SIOP Level 3`, SUM(temp.`skus`) AS `# of SKUs`, temp.`images` AS `Main Image`",
                "from" => "FROM (SELECT\ncat3.`description` AS `SIOP3`,\ncount(o1.`o_id`) AS `skus`,\nIF(o1.`mainImage` IS NOT NULL, \"YES\", \"NO\") AS `images` FROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) \nWHERE (o1.`o_published` =1 AND o1.siopFullCode LIKE '043000%')\nGROUP BY cat3.`description`, o1.`mainImage`)  AS temp",
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
                "filter" => "string",
                "id" => "extModel2655-3"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2655-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel2655-5"
            ]
        ],
        "niceName" => "Chart - Products with No Images - Main Image",
        "group" => "PTG",
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
        "modificationDate" => 1620807108,
        "creationDate" => 1606817832,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartProductsWithNoImage"
    ],
    "IndustrialHoseChartNewProducts" => [
        "name" => "IndustrialHoseChartNewProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`  ",
                "from" => "FROM object_1 o1 \n",
                "where" => "WHERE (o1.siopFullCode LIKE '041000%') AND (o1.`o_creationDate` >= MONTH(CURDATE() - Interval 9 month))  ",
                "groupby" => "GROUP BY MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) order by o1.`o_creationDate` ",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Month",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4994-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel4994-4"
            ]
        ],
        "niceName" => "Chart - New Products",
        "group" => "Industrial Hose",
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
        "modificationDate" => 1620810328,
        "creationDate" => 1614589190,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartNewProducts"
    ],
    "HydraulicHoseChartNewProduct" => [
        "name" => "HydraulicHoseChartNewProduct",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`  ",
                "from" => "FROM object_1 o1 \n",
                "where" => "WHERE (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%') AND (o1.`o_creationDate` >= MONTH(CURDATE() - Interval 9 month))  ",
                "groupby" => "GROUP BY MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) order by o1.`o_creationDate` ",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Month",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4741-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel4741-4"
            ]
        ],
        "niceName" => "Chart - New Products",
        "group" => "Hydraulic Hose",
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
        "modificationDate" => 1620807567,
        "creationDate" => 1614589190,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartNewProduct"
    ],
    "PTGChartNewProducts" => [
        "name" => "PTGChartNewProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`  ",
                "from" => "FROM object_1 o1 ",
                "where" => "WHERE (o1.siopFullCode LIKE '043000%') AND (o1.`o_creationDate` >= MONTH(CURDATE() - Interval 9 month))  ",
                "groupby" => "GROUP BY MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) order by o1.`o_creationDate` ",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Month",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5055-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5055-4"
            ]
        ],
        "niceName" => "Chart - New Products",
        "group" => "PTG",
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
        "modificationDate" => 1620807641,
        "creationDate" => 1614589190,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartNewProducts"
    ],
    "IndustrialHoseChartDataCompleteness" => [
        "name" => "IndustrialHoseChartDataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \ncount(o1.`o_key`) as `# of SKUs`, ROUND((sum(en.CompletenessPercentage)/count(o1.`o_key`)),3)  AS `COMPLETED (%)`,\ncat3.`description` AS `SIOP Level 3`",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \nON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat3 \nON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) ",
                "where" => "WHERE (o1.`o_published` =1 AND o1.siopFullCode LIKE '041000%') ",
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
                "filter" => "string",
                "id" => "extModel5694-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5694-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5694-5"
            ]
        ],
        "niceName" => "Chart - Data Completeness",
        "group" => "Industrial Hose",
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
        "modificationDate" => 1620807960,
        "creationDate" => 1614589821,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartDataCompleteness"
    ],
    "HydraulicHoseChartDataCompleteness" => [
        "name" => "HydraulicHoseChartDataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \ncount(o1.`o_key`) as `# of SKUs`, ROUND((sum(en.CompletenessPercentage)/count(o1.`o_key`)),3)  AS `COMPLETED (%)`,\ncat3.`description` AS `SIOP Level 3`",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \nON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat3 \nON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) ",
                "where" => "(o1.`o_published` =1 AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%'))  ",
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
                "filter" => "string",
                "id" => "extModel6008-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel6008-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel6008-5"
            ]
        ],
        "niceName" => "Chart - Data Completeness",
        "group" => "Hydraulic Hose",
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
        "modificationDate" => 1620808055,
        "creationDate" => 1614589821,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartDataCompleteness"
    ],
    "PTGChartDataCompleteness" => [
        "name" => "PTGChartDataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \ncount(o1.`o_key`) as `# of SKUs`, ROUND((sum(en.CompletenessPercentage)/count(o1.`o_key`)),3)  AS `COMPLETED (%)`,\ncat3.`description` AS `SIOP Level 3`",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \nON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat3 \nON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) ",
                "where" => "(o1.`o_published` =1 AND o1.siopFullCode LIKE '043000%' )",
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
                "filter" => "string",
                "id" => "extModel6322-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel6322-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel6322-5"
            ]
        ],
        "niceName" => "Chart - Data Completeness",
        "group" => "PTG",
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
        "modificationDate" => 1620808147,
        "creationDate" => 1614589821,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartDataCompleteness"
    ],
    "IndustrialHoseChartSKUsUnderReview" => [
        "name" => "IndustrialHoseChartSKUsUnderReview",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT count(o1.`o_id`) AS `# of SKUs`, \nCASE\n    WHEN  w.`place` = 'enrich' OR w.`place` is null  THEN 'Enrich Product'\n    WHEN  w.`place` = 'review_content' THEN 'Review Enriched Data'\n    WHEN  w.`place` = 'unpublished' THEN 'Product Unpublished'\n    WHEN  w.`place` = 'accepted' THEN 'Product Published'\n    ELSE \"\"\nEND AS `Status` ",
                "from" => "FROM object_1 o1 \nleft JOIN element_workflow_state w ON o1.oo_id = w.cid ",
                "where" => "WHERE o1.siopFullCode LIKE '041000%'",
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
                "id" => "extModel6806-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel6806-4"
            ]
        ],
        "niceName" => "Chart - SKUs Workflow Status",
        "group" => "Industrial Hose",
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
        "modificationDate" => 1620808419,
        "creationDate" => 1614630048,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartSKUsUnderReview"
    ],
    "HydrualicHoseChartSKUsUnderReview" => [
        "name" => "HydrualicHoseChartSKUsUnderReview",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT count(o1.`o_id`) AS `# of SKUs`, \nCASE\n    WHEN  w.`place` = 'enrich' OR w.`place` is null  THEN 'Enrich Product'\n    WHEN  w.`place` = 'review_content' THEN 'Review Enriched Data'\n    WHEN  w.`place` = 'unpublished' THEN 'Product Unpublished'\n    WHEN  w.`place` = 'accepted' THEN 'Product Published'\n    ELSE \"\"\nEND AS `Status` ",
                "from" => "FROM object_1 o1 \nleft JOIN element_workflow_state w ON o1.oo_id = w.cid ",
                "where" => "WHERE (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%') ",
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
                "id" => "extModel7120-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel7120-4"
            ]
        ],
        "niceName" => "Chart - SKUs Workflow Status",
        "group" => "Hydraulic Hose",
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
        "modificationDate" => 1620808538,
        "creationDate" => 1614630048,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydrualicHoseChartSKUsUnderReview"
    ],
    "PTGChartSKUsUnderReview" => [
        "name" => "PTGChartSKUsUnderReview",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT count(o1.`o_id`) AS `# of SKUs`, \nCASE\n    WHEN  w.`place` = 'enrich' OR w.`place` is null  THEN 'Enrich Product'\n    WHEN  w.`place` = 'review_content' THEN 'Review Enriched Data'\n    WHEN  w.`place` = 'unpublished' THEN 'Product Unpublished'\n    WHEN  w.`place` = 'accepted' THEN 'Product Published'\n    ELSE \"\"\nEND AS `Status` ",
                "from" => "FROM object_1 o1 \nleft JOIN element_workflow_state w ON o1.oo_id = w.cid ",
                "where" => "WHERE o1.siopFullCode LIKE '043000%'",
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
                "id" => "extModel7434-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel7434-4"
            ]
        ],
        "niceName" => "Chart - SKUs Workflow Status",
        "group" => "PTG",
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
        "modificationDate" => 1620808598,
        "creationDate" => 1614630048,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartSKUsUnderReview"
    ],
    "IndustrialHoseChartProductAttributeIncomplete" => [
        "name" => "IndustrialHoseChartProductAttributeIncomplete",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT t2.SIOPLevel3, t2.SIOPLevel4, SUM(t2.SKUsCount) AS `# of SKUs`, t2.healthCheck as `Incompleteness Percentage` ",
                "from" => "FROM (SELECT t.SIOPLevel3, t.SIOPLevel4, count(t.`Key`) AS `SKUsCount`, case when t.healthCheckPercentage >= 0 and t.healthCheckPercentage<= 20 then '0-20' when t.healthCheckPercentage >= 21 and t.healthCheckPercentage<=40 then '21-40' when t.healthCheckPercentage >= 41 and t.healthCheckPercentage<=60 then '41-60' when t.healthCheckPercentage >= 61 and t.healthCheckPercentage<=80 then '61-80' else '81-100' end AS healthCheck FROM (SELECT o1.`o_id`, o1.`o_key` as `Key`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))) AS `SIOPLevel3`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))) AS `SIOPLevel4`, ((IF(o1.`SIOPLevel1` IS NULL OR o1.`SIOPLevel1` = \"\", 1, 0)+ IF(o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\", 1, 0)+ IF(o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\", 1, 0) + IF(o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\", 1, 0) + IF(o1.`SIOPLevel5` IS NULL OR o1.`SIOPLevel5` = \"\", 1, 0) + IF(o1.`SIOPLevel6` IS NULL OR o1.`SIOPLevel6` = \"\", 1, 0) + IF(o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\", 1, 0) + IF(o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\", 1, 0) + IF(o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\", 1, 0) + IF(en.`longDescription` IS NULL OR en.`longDescription` = \"\", 1, 0) + IF(en.`FeaturesBenefitsBulletPoint` IS NULL OR en.`FeaturesBenefitsBulletPoint` = \"\", 1, 0) + IF(o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\", 1, 0)+ IF(o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\", 1, 0) + IF(o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\", 1, 0) + IF(o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\", 1, 0)+ IF(o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\", 1, 0)+ IF(o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\", 1, 0) + IF(o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\", 1, 0) + IF(o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\", 1, 0) + IF(o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\", 1, 0) )/20)*100 AS healthCheckPercentage FROM object_1 o1 LEFT JOIN `object_localized_query_1_en` `en`ON `en`.`ooo_id` = `o1`.`o_id`\n WHERE (o1.`o_published` =1 AND o1.siopFullCode LIKE '041000%')  AND ( o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\" OR o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\" OR o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\" OR o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\" OR o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\" OR o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\" OR `en`.`longDescription` IS NULL OR `en`.`longDescription` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` IS NULL OR o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\" OR o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\" OR o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\" OR o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\" OR o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\" OR o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\" OR o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\" OR o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\" OR o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\" )) AS t GROUP BY t.SIOPLevel3, t.SIOPLevel4, t.healthCheckPercentage) AS t2 ",
                "where" => "",
                "groupby" => "GROUP BY t2.SIOPLevel3, t2.SIOPLevel4, t2.healthCheck",
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
                "id" => "extModel8067-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel8067-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel8067-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel8067-8"
            ]
        ],
        "niceName" => "Chart - Product Attribute Incompleteness",
        "group" => "Industrial Hose",
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
        "modificationDate" => 1620808864,
        "creationDate" => 1606824473,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartProductAttributeIncomplete"
    ],
    "HydraulicHoseChartProductAttributeIncomplete" => [
        "name" => "HydraulicHoseChartProductAttributeIncomplete",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT t2.SIOPLevel3, t2.SIOPLevel4, SUM(t2.SKUsCount) AS `# of SKUs`, t2.healthCheck as `Incompleteness Percentage` ",
                "from" => "FROM (SELECT t.SIOPLevel3, t.SIOPLevel4, count(t.`Key`) AS `SKUsCount`, case when t.healthCheckPercentage >= 0 and t.healthCheckPercentage<= 20 then '0-20' when t.healthCheckPercentage >= 21 and t.healthCheckPercentage<=40 then '21-40' when t.healthCheckPercentage >= 41 and t.healthCheckPercentage<=60 then '41-60' when t.healthCheckPercentage >= 61 and t.healthCheckPercentage<=80 then '61-80' else '81-100' end AS healthCheck FROM (SELECT o1.`o_id`, o1.`o_key` as `Key`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))) AS `SIOPLevel3`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))) AS `SIOPLevel4`, ((IF(o1.`SIOPLevel1` IS NULL OR o1.`SIOPLevel1` = \"\", 1, 0)+ IF(o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\", 1, 0)+ IF(o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\", 1, 0) + IF(o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\", 1, 0) + IF(o1.`SIOPLevel5` IS NULL OR o1.`SIOPLevel5` = \"\", 1, 0) + IF(o1.`SIOPLevel6` IS NULL OR o1.`SIOPLevel6` = \"\", 1, 0) + IF(o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\", 1, 0) + IF(o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\", 1, 0) + IF(o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\", 1, 0) + IF(en.`longDescription` IS NULL OR en.`longDescription` = \"\", 1, 0) + IF(en.`FeaturesBenefitsBulletPoint` IS NULL OR en.`FeaturesBenefitsBulletPoint` = \"\", 1, 0) + IF(o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\", 1, 0)+ IF(o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\", 1, 0) + IF(o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\", 1, 0) + IF(o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\", 1, 0)+ IF(o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\", 1, 0)+ IF(o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\", 1, 0) + IF(o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\", 1, 0) + IF(o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\", 1, 0) + IF(o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\", 1, 0) )/20)*100 AS healthCheckPercentage FROM object_1 o1 LEFT JOIN `object_localized_query_1_en` `en`ON `en`.`ooo_id` = `o1`.`o_id` \n WHERE (o1.`o_published` =1 AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%')) AND ( o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\" OR o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\" OR o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\" OR o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\" OR o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\" OR o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\" OR `en`.`longDescription` IS NULL OR `en`.`longDescription` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` IS NULL OR o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\" OR o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\" OR o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\" OR o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\" OR o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\" OR o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\" OR o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\" OR o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\" OR o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\" )) AS t GROUP BY t.SIOPLevel3, t.SIOPLevel4, t.healthCheckPercentage) AS t2 ",
                "where" => "",
                "groupby" => "GROUP BY t2.SIOPLevel3, t2.SIOPLevel4, t2.healthCheck",
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
                "id" => "extModel8381-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel8381-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel8381-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel8381-8"
            ]
        ],
        "niceName" => "Chart - Product Attribute Incompleteness",
        "group" => "Hydraulic Hose",
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
        "modificationDate" => 1620809052,
        "creationDate" => 1606824473,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartProductAttributeIncomplete"
    ],
    "PTGChartProductAttributeIncomplete" => [
        "name" => "PTGChartProductAttributeIncomplete",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT t2.SIOPLevel3, t2.SIOPLevel4, SUM(t2.SKUsCount) AS `# of SKUs`, t2.healthCheck as `Incompleteness Percentage` ",
                "from" => "FROM (SELECT t.SIOPLevel3, t.SIOPLevel4, count(t.`Key`) AS `SKUsCount`, case when t.healthCheckPercentage >= 0 and t.healthCheckPercentage<= 20 then '0-20' when t.healthCheckPercentage >= 21 and t.healthCheckPercentage<=40 then '21-40' when t.healthCheckPercentage >= 41 and t.healthCheckPercentage<=60 then '41-60' when t.healthCheckPercentage >= 61 and t.healthCheckPercentage<=80 then '61-80' else '81-100' end AS healthCheck FROM (SELECT o1.`o_id`, o1.`o_key` as `Key`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))) AS `SIOPLevel3`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))) AS `SIOPLevel4`, ((IF(o1.`SIOPLevel1` IS NULL OR o1.`SIOPLevel1` = \"\", 1, 0)+ IF(o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\", 1, 0)+ IF(o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\", 1, 0) + IF(o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\", 1, 0) + IF(o1.`SIOPLevel5` IS NULL OR o1.`SIOPLevel5` = \"\", 1, 0) + IF(o1.`SIOPLevel6` IS NULL OR o1.`SIOPLevel6` = \"\", 1, 0) + IF(o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\", 1, 0) + IF(o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\", 1, 0) + IF(o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\", 1, 0) + IF(en.`longDescription` IS NULL OR en.`longDescription` = \"\", 1, 0) + IF(en.`FeaturesBenefitsBulletPoint` IS NULL OR en.`FeaturesBenefitsBulletPoint` = \"\", 1, 0) + IF(o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\", 1, 0)+ IF(o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\", 1, 0) + IF(o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\", 1, 0) + IF(o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\", 1, 0)+ IF(o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\", 1, 0)+ IF(o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\", 1, 0) + IF(o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\", 1, 0) + IF(o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\", 1, 0) + IF(o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\", 1, 0) )/20)*100 AS healthCheckPercentage FROM object_1 o1 LEFT JOIN `object_localized_query_1_en` `en`ON `en`.`ooo_id` = `o1`.`o_id` \n WHERE (o1.`o_published` =1 AND o1.siopFullCode LIKE '043000%') AND ( o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\" OR o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\" OR o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\" OR o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\" OR o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\" OR o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\" OR `en`.`longDescription` IS NULL OR `en`.`longDescription` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` IS NULL OR o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\" OR o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\" OR o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\" OR o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\" OR o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\" OR o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\" OR o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\" OR o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\" OR o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\" )) AS t GROUP BY t.SIOPLevel3, t.SIOPLevel4, t.healthCheckPercentage) AS t2 ",
                "where" => "",
                "groupby" => "GROUP BY t2.SIOPLevel3, t2.SIOPLevel4, t2.healthCheck",
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
                "id" => "extModel8695-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel8695-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel8695-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel8695-8"
            ]
        ],
        "niceName" => "Chart - Product Attribute Incompleteness",
        "group" => "PTG",
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
        "modificationDate" => 1620809115,
        "creationDate" => 1606824473,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartProductAttributeIncomplete"
    ],
    "HydraulicFittingsChartProductsWithNoImage" => [
        "name" => "HydraulicFittingsChartProductsWithNoImage",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT temp.`SIOP3` AS `SIOP Level 3`, SUM(temp.`skus`) AS `# of SKUs`, temp.`images` AS `Main Image`",
                "from" => "FROM (SELECT\ncat3.`description` AS `SIOP3`,\ncount(o1.`o_id`) AS `skus`,\nIF(o1.`mainImage` IS NOT NULL, \"YES\", \"NO\") AS `images` FROM object_1 o1 \nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) \nWHERE (o1.`o_published` =1 AND (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')) \nGROUP BY cat3.`description`, o1.`mainImage`)  AS temp",
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
                "filter" => "string",
                "id" => "extModel2825-3"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2825-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel2825-5"
            ]
        ],
        "niceName" => "Chart - Products with No Images - Main Image",
        "group" => "Hydraulic Fittings",
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
        "modificationDate" => 1620807097,
        "creationDate" => 1606817832,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartProductsWithNoImage"
    ],
    "HydraulicFittingsChartNewProducts" => [
        "name" => "HydraulicFittingsChartNewProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) AS `Month`, IF(Count(*),Count(*),0) AS `# of SKUs`  ",
                "from" => "FROM object_1 o1 ",
                "where" => "WHERE  (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%') AND (o1.`o_creationDate` >= MONTH(CURDATE() - Interval 9 month))  ",
                "groupby" => "GROUP BY MONTHNAME(FROM_UNIXTIME(o1.`o_creationDate`)) order by o1.`o_creationDate` ",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Month",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5374-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5374-4"
            ]
        ],
        "niceName" => "Chart - New Products",
        "group" => "Hydraulic Fittings",
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
        "modificationDate" => 1620807816,
        "creationDate" => 1614589190,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartNewProducts"
    ],
    "HydraulicFittingsChartDataCompleteness" => [
        "name" => "HydraulicFittingsChartDataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \ncount(o1.`o_key`) as `# of SKUs`, ROUND((sum(en.CompletenessPercentage)/count(o1.`o_key`)),3)  AS `COMPLETED (%)`,\ncat3.`description` AS `SIOP Level 3`",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \nON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat3 \nON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) ",
                "where" => "(o1.`o_published` =1 AND o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')",
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
                "filter" => "string",
                "id" => "extModel6488-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel6488-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel6488-5"
            ]
        ],
        "niceName" => "Chart - Data Completeness",
        "group" => "Hydraulic Fittings",
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
        "modificationDate" => 1620808313,
        "creationDate" => 1614589821,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartDataCompleteness"
    ],
    "HydraulicFittingsChartSKUsUnderReview" => [
        "name" => "HydraulicFittingsChartSKUsUnderReview",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT count(o1.`o_id`) AS `# of SKUs`, \nCASE\n    WHEN  w.`place` = 'enrich' OR w.`place` is null  THEN 'Enrich Product'\n    WHEN  w.`place` = 'review_content' THEN 'Review Enriched Data'\n    WHEN  w.`place` = 'unpublished' THEN 'Product Unpublished'\n    WHEN  w.`place` = 'accepted' THEN 'Product Published'\n    ELSE \"\"\nEND AS `Status` ",
                "from" => "FROM object_1 o1 \nleft JOIN element_workflow_state w ON o1.oo_id = w.cid ",
                "where" => "WHERE o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%'",
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
                "id" => "extModel7600-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel7600-4"
            ]
        ],
        "niceName" => "Chart - SKUs Workflow Status",
        "group" => "Hydraulic Fittings",
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
        "modificationDate" => 1620808742,
        "creationDate" => 1614630048,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartSKUsUnderReview"
    ],
    "HydraulicFittingsChartProductAttributeIncomplete" => [
        "name" => "HydraulicFittingsChartProductAttributeIncomplete",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT t2.SIOPLevel3, t2.SIOPLevel4, SUM(t2.SKUsCount) AS `# of SKUs`, t2.healthCheck as `Incompleteness Percentage` ",
                "from" => "FROM (SELECT t.SIOPLevel3, t.SIOPLevel4, count(t.`Key`) AS `SKUsCount`, case when t.healthCheckPercentage >= 0 and t.healthCheckPercentage<= 20 then '0-20' when t.healthCheckPercentage >= 21 and t.healthCheckPercentage<=40 then '21-40' when t.healthCheckPercentage >= 41 and t.healthCheckPercentage<=60 then '41-60' when t.healthCheckPercentage >= 61 and t.healthCheckPercentage<=80 then '61-80' else '81-100' end AS healthCheck FROM (SELECT o1.`o_id`, o1.`o_key` as `Key`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))) AS `SIOPLevel3`, (select description from object_localized_query_2_en where ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))) AS `SIOPLevel4`, ((IF(o1.`SIOPLevel1` IS NULL OR o1.`SIOPLevel1` = \"\", 1, 0)+ IF(o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\", 1, 0)+ IF(o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\", 1, 0) + IF(o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\", 1, 0) + IF(o1.`SIOPLevel5` IS NULL OR o1.`SIOPLevel5` = \"\", 1, 0) + IF(o1.`SIOPLevel6` IS NULL OR o1.`SIOPLevel6` = \"\", 1, 0) + IF(o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\", 1, 0) + IF(o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\", 1, 0) + IF(o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\", 1, 0) + IF(en.`longDescription` IS NULL OR en.`longDescription` = \"\", 1, 0) + IF(en.`FeaturesBenefitsBulletPoint` IS NULL OR en.`FeaturesBenefitsBulletPoint` = \"\", 1, 0) + IF(o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\", 1, 0)+ IF(o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\", 1, 0) + IF(o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\", 1, 0) + IF(o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\", 1, 0)+ IF(o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\", 1, 0)+ IF(o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\", 1, 0) + IF(o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\", 1, 0) + IF(o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\", 1, 0) + IF(o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\", 1, 0) )/20)*100 AS healthCheckPercentage FROM object_1 o1 LEFT JOIN `object_localized_query_1_en` `en`ON `en`.`ooo_id` = `o1`.`o_id` \n WHERE (o1.`o_published` =1 AND o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%') AND ( o1.`SIOPLevel2` IS NULL OR o1.`SIOPLevel2` = \"\" OR o1.`SIOPLevel3` IS NULL OR o1.`SIOPLevel3` = \"\" OR o1.`SIOPLevel4` IS NULL OR o1.`SIOPLevel4` = \"\" OR o1.`eanUpc` IS NULL OR o1.`eanUpc` = \"\" OR o1.`webDiscription` IS NULL OR o1.`webDiscription` = \"\" OR o1.`searchKeywords` IS NULL OR o1.`searchKeywords` = \"\" OR `en`.`longDescription` IS NULL OR `en`.`longDescription` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` = \"\" OR `en`.`FeaturesBenefitsBulletPoint` IS NULL OR o1.`proposition65WarningAttributesRequired` IS NULL OR o1.`proposition65WarningAttributesRequired` = \"\" OR o1.`packageLengthIN` IS NULL OR o1.`packageLengthIN` = \"\" OR o1.`packageWidthIN` IS NULL OR o1.`packageWidthIN` = \"\" OR o1.`packageHeightIN` IS NULL OR o1.`packageHeightIN` = \"\" OR o1.`packageWeightLBS` IS NULL OR o1.`packageWeightLBS` = \"\" OR o1.`caseLengthIN` IS NULL OR o1.`caseLengthIN` = \"\" OR o1.`caseHeightIN` IS NULL OR o1.`caseHeightIN` = \"\" OR o1.`caseWidthIN` IS NULL OR o1.`caseWidthIN` = \"\" OR o1.`caseWeightLBS` IS NULL OR o1.`caseWeightLBS` = \"\" )) AS t GROUP BY t.SIOPLevel3, t.SIOPLevel4, t.healthCheckPercentage) AS t2 ",
                "where" => "",
                "groupby" => "GROUP BY t2.SIOPLevel3, t2.SIOPLevel4, t2.healthCheck",
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
                "id" => "extModel9483-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9483-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel9483-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9483-8"
            ]
        ],
        "niceName" => "Chart - Product Attribute Incompleteness",
        "group" => "Hydraulic Fittings",
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
        "modificationDate" => 1620809370,
        "creationDate" => 1606824473,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartProductAttributeIncomplete"
    ],
    "CS_NewProductsLastOneWeek" => [
        "name" => "CS_NewProductsLastOneWeek",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  o1.`oo_id` as `Id`,\n  o1.`Name`,\n  CASE WHEN o1.`o_path` = '/Contitech_ConveyorSolution/Products/' THEN 'LEVEL1' ELSE REPLACE(\n    o1.`o_path`,\n    '/Contitech_ConveyorSolution/Products/',\n    ''\n  ) END as `Hierarchy Level`,\n  FROM_UNIXTIME(o1.`o_creationDate`) as `Creation Date`,\n  CASE \nWHEN wf.`place` = 'open' THEN 'Open' \nWHEN wf.`place` = 'archived' THEN 'Archived' \nWHEN wf.`place` = 'enrich' THEN 'Enrich' \nWHEN wf.`place` = 'paused' THEN 'Paused' \nWHEN wf.`place` = 'published' THEN 'Published' \nWHEN wf.`place` = 'review_content' THEN 'Review Content' \nWHEN wf.`place` = 'accepted' THEN 'Accepted' \nWHEN wf.`place` = 'default' THEN 'Default' \nWHEN wf.`place` = 'in_process' THEN 'In Process' \nWHEN wf.`place` = 'in_rd_edit' THEN 'In R&D Edit' \nWHEN wf.`place` = 'in_publish' THEN 'In Publish' \nEND as `Status`\nFROM\n  object_CSProducts o1\n  LEFT JOIN element_workflow_state wf on o1.`oo_id` = wf.`cid`\nWHERE\n  (\n    (\n      o1.`o_creationDate` > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 7 DAY))\n    )\n  )\nORDER BY\n  (o1.`o_creationDate`) DESC",
                "from" => "",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel893-1"
            ],
            [
                "name" => "Hierarchy Level",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel893-2"
            ],
            [
                "name" => "Creation Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel893-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel893-4"
            ],
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel893-5"
            ]
        ],
        "niceName" => "CS_New Products Last One Week",
        "group" => "ContiTech CS",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1638355470,
        "creationDate" => 1631861341,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "CS_NewProductsLastOneWeek"
    ],
    "CS_DataCompleteness" => [
        "name" => "CS_DataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT o1.`oo_id` as `Id`,`Name`,CASE WHEN `o_path` = '/Contitech_ConveyorSolution/Products/' THEN 'LEVEL1' ELSE REPLACE( `o_path`, '/Contitech_ConveyorSolution/Products/', '' ) END as `Hierarchy Level`,FROM_UNIXTIME(`o_modificationDate`)as`Modification Date`,`completenessPercentage` as `Completeness Percentage`,`EmptyFields`as `Empty Fields`",
                "from" => "FROM object_localized_CSProducts_en o1",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel988-1"
            ],
            [
                "name" => "Hierarchy Level",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel988-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel988-5"
            ],
            [
                "name" => "Empty Fields",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel988-3"
            ],
            [
                "name" => "Modification Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel988-2"
            ],
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel988-6"
            ]
        ],
        "niceName" => "CS_Data Completeness",
        "group" => "ContiTech CS",
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
        "modificationDate" => 1632130013,
        "creationDate" => 1632124921,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "CS_DataCompleteness"
    ],
    "CS_MissingAssetsOnProducts" => [
        "name" => "CS_MissingAssetsOnProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\noo_id As `Pimcore Id`,\nName,\nCorporateBrand As `Corporate Brand`,\nProductBrand As `Product Brand`,\n IF(object_CSProducts.`LogoImage` IS NOT NULL, \"True\", \"False\") AS `Logo Image`,\n IF(object_CSProducts.`fieldPhoto` IS NOT NULL, \"True\", \"False\") AS `Field Photo`,\n IF(object_CSProducts.`productImage` IS NOT NULL, \"True\", \"False\") AS `Product Image`,\n IF(object_CSProducts.`softwareImage` IS NOT NULL, \"True\", \"False\") AS `Software Image`,\n IF(object_CSProducts.`applicationImage` IS NOT NULL, \"True\", \"False\") AS `Application Image`,\n IF(object_CSProducts.`reportImage` IS NOT NULL, \"True\", \"False\") AS `Report Image`,\n IF(object_CSProducts.`functionalityImage` IS NOT NULL, \"True\", \"False\") AS `Functionality Image`,\n IF(object_CSProducts.`damageImage` IS NOT NULL, \"True\", \"False\") AS `Damage Image`,\n IF(object_CSProducts.`deviationAngleForVerticalCurves` IS NOT NULL, \"True\", \"False\") AS `Deviation Angle For Vertical Curves`,\n IF(object_CSProducts.`deviatioAngleForHorizontal` IS NOT NULL, \"True\", \"False\") AS `Deviation Angle For Horizontal`,\n IF(object_CSProducts.`sidewallSizes` IS NOT NULL, \"True\", \"False\") AS `Sidewall Sizes`,\n IF(object_CSProducts.`sidewallQualities` IS NOT NULL, \"True\", \"False\") AS `Sidewall Qualities`,\n IF(object_CSProducts.`anglesofInclination` IS NOT NULL, \"True\", \"False\") AS `Angles of Inclination`,\n IF(object_CSProducts.`increasingInclinationAngle` IS NOT NULL, \"True\", \"False\") AS `Increasing Inclination Angle`,\n IF(object_CSProducts.`imageCrossSectionOfProducts` IS NOT NULL, \"True\", \"False\") AS `Image Cross Section Of Products`,\n IF(object_CSProducts.`beltRollDiameters` IS NOT NULL, \"True\", \"False\") AS `Belt Roll Diameters`,\n IF(object_CSProducts.`overviewImageofSystem` IS NOT NULL, \"True\", \"False\") AS `Overview Image of System`,\n IF(object_CSProducts.`imageGallery__images` IS NOT NULL, \"True\", \"False\") AS `Image Gallery`,\n IF(object_CSProducts.`systemAnimation` IS NOT NULL, \"True\", \"False\") AS `System Animation`,\n IF(object_CSProducts.`systemVideo` IS NOT NULL, \"True\", \"False\") AS `System Video`,\n IF(object_CSProducts.`productAnimation` IS NOT NULL, \"True\", \"False\") AS `Product Animation`,\n IF(object_CSProducts.`documents` IS NOT NULL, \"True\", \"False\") AS `Documents`",
                "from" => "FROM object_CSProducts",
                "where" => " WHERE \n LogoImage is null OR\n fieldPhoto is null OR\n productImage is null OR\n softwareImage is null OR\n applicationImage is null OR\n reportImage is null OR\n functionalityImage is null OR\n damageImage is null OR\n deviationAngleForVerticalCurves is null OR\n deviatioAngleForHorizontal is null OR\n sidewallSizes is null OR\n sidewallQualities is null OR\n anglesofInclination is null OR\n increasingInclinationAngle is null OR\n imageCrossSectionOfProducts is null OR\n beltRollDiameters is null OR\n overviewImageofSystem is null OR\n imageGallery__images is null OR\n systemAnimation is null OR\n systemVideo is null OR\n productAnimation is null OR\n documents is null",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-1"
            ],
            [
                "name" => "Corporate Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-3"
            ],
            [
                "name" => "Product Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-4"
            ],
            [
                "name" => "Logo Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-5"
            ],
            [
                "name" => "Field Photo",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-6"
            ],
            [
                "name" => "Product Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-7"
            ],
            [
                "name" => "Software Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-8"
            ],
            [
                "name" => "Application Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-9"
            ],
            [
                "name" => "Report Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-10"
            ],
            [
                "name" => "Functionality Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-11"
            ],
            [
                "name" => "Damage Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-12"
            ],
            [
                "name" => "Deviation Angle For Vertical Curves",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-13"
            ],
            [
                "name" => "Deviation Angle For Horizontal",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-14"
            ],
            [
                "name" => "Sidewall Sizes",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-15"
            ],
            [
                "name" => "Sidewall Qualities",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-16"
            ],
            [
                "name" => "Angles of Inclination",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-17"
            ],
            [
                "name" => "Image Cross Section Of Products",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-19"
            ],
            [
                "name" => "Increasing Inclination Angle",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-18"
            ],
            [
                "name" => "Belt Roll Diameters",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-20"
            ],
            [
                "name" => "Overview Image of System",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-21"
            ],
            [
                "name" => "Image Gallery",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-22"
            ],
            [
                "name" => "System Animation",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-23"
            ],
            [
                "name" => "System Video",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-24"
            ],
            [
                "name" => "Product Animation",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-25"
            ],
            [
                "name" => "Documents",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2142-26"
            ],
            [
                "name" => "Pimcore Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel2142-2"
            ]
        ],
        "niceName" => "CS_MissingAssetsOnProducts",
        "group" => "ContiTech CS",
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
        "modificationDate" => 1636980707,
        "creationDate" => 1632215120,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "CS_MissingAssetsOnProducts"
    ],
    "CS_TranslationsMissingProduct" => [
        "name" => "CS_TranslationsMissingProduct",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n\tobject_localized_CSProducts_en.oo_id As 'Pimcore Id',\n\tobject_localized_CSProducts_en.Name,\n\tobject_localized_CSProducts_en.CorporateBrand As 'Corporate Brand',\n\tobject_localized_CSProducts_en.productBrand As 'Product Brand',\n\tobject_localized_CSProducts_en.ProductDescription AS 'Product Description in English',\n\tobject_localized_CSProducts_en.ShortText AS 'Short Text in English',\n    object_localized_CSProducts_en.LongText AS 'Long Text in English',\n    object_localized_CSProducts_de.ProductDescription AS 'Product Description in German',\n\tobject_localized_CSProducts_de.ShortText AS 'Short Text in German',\n    object_localized_CSProducts_de.LongText AS 'Long Text in German',   \n    object_localized_CSProducts_fr.ProductDescription AS 'Product Description in French',\n\tobject_localized_CSProducts_fr.ShortText AS 'Short Text in French',\n    object_localized_CSProducts_fr.LongText AS 'Long Text in French',\n    object_localized_CSProducts_pt_BR.ProductDescription AS 'Product Description in Portuguese (Brazil)',\n\tobject_localized_CSProducts_pt_BR.ShortText AS 'Short Text in Portuguese (Brazil)',\n    object_localized_CSProducts_pt_BR.LongText AS 'Long Text in Portuguese (Brazil)',\n    object_localized_CSProducts_zh.ProductDescription AS 'Product Description in Chinese',\n\tobject_localized_CSProducts_zh.ShortText AS 'Short Text in Chinese',\n    object_localized_CSProducts_zh.LongText AS 'Long Text in Chinese',\n    object_localized_CSProducts_es_ES.ProductDescription AS 'Product Description in Spanish',\n\tobject_localized_CSProducts_es_ES.ShortText AS 'Short Text in Spanish',\n    object_localized_CSProducts_es_ES.LongText AS 'Long Text in Spanish'",
                "from" => "FROM object_localized_CSProducts_en\nINNER JOIN object_localized_CSProducts_de ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_de.oo_id\nINNER JOIN object_localized_CSProducts_fr ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_fr.oo_id\nINNER JOIN object_localized_CSProducts_pt_BR ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_pt_BR.oo_id\nINNER JOIN object_localized_CSProducts_zh ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_zh.oo_id\nINNER JOIN object_localized_CSProducts_es_ES ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_es_ES.oo_id",
                "where" => "WHERE\n\tobject_localized_CSProducts_en.ProductDescription is null OR\n\tobject_localized_CSProducts_en.ShortText is null OR\n    object_localized_CSProducts_en.LongText is null OR\n    object_localized_CSProducts_de.ProductDescription is null OR\n\tobject_localized_CSProducts_de.ShortText is null OR\n    object_localized_CSProducts_de.LongText is null OR\n    object_localized_CSProducts_fr.ProductDescription is null OR\n\tobject_localized_CSProducts_fr.ShortText is null OR\n    object_localized_CSProducts_fr.LongText is null OR\n    object_localized_CSProducts_pt_BR.ProductDescription is null OR\n\tobject_localized_CSProducts_pt_BR.ShortText is null OR\n    object_localized_CSProducts_pt_BR.LongText is null OR\n    object_localized_CSProducts_zh.ProductDescription is null OR\n\tobject_localized_CSProducts_zh.ShortText is null OR\n    object_localized_CSProducts_zh.LongText is null OR\n    object_localized_CSProducts_es_ES.ProductDescription is null OR\n\tobject_localized_CSProducts_es_ES.ShortText is null OR\n    object_localized_CSProducts_es_ES.LongText is null",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-1"
            ],
            [
                "name" => "Corporate Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-3"
            ],
            [
                "name" => "Product Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-4"
            ],
            [
                "name" => "Product Description in English",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-5"
            ],
            [
                "name" => "Short Text in English",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-6"
            ],
            [
                "name" => "Long Text in English",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-7"
            ],
            [
                "name" => "Product Description in German",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-8"
            ],
            [
                "name" => "Short Text in German",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-9"
            ],
            [
                "name" => "Long Text in German",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-10"
            ],
            [
                "name" => "Product Description in French",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-11"
            ],
            [
                "name" => "Short Text in French",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-12"
            ],
            [
                "name" => "Long Text in French",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-13"
            ],
            [
                "name" => "Product Description in Portuguese (Brazil)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-14"
            ],
            [
                "name" => "Short Text in Portuguese (Brazil)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-15"
            ],
            [
                "name" => "Long Text in Portuguese (Brazil)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-16"
            ],
            [
                "name" => "Product Description in Chinese",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-17"
            ],
            [
                "name" => "Short Text in Chinese",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-18"
            ],
            [
                "name" => "Long Text in Chinese",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-19"
            ],
            [
                "name" => "Product Description in Spanish",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-20"
            ],
            [
                "name" => "Short Text in Spanish",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-21"
            ],
            [
                "name" => "Long Text in Spanish",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1420-22"
            ],
            [
                "name" => "Pimcore Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel1420-2"
            ]
        ],
        "niceName" => "CS_TranslationsMissingProduct",
        "group" => "ContiTech CS",
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
        "modificationDate" => 1636980864,
        "creationDate" => 1632215295,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "CS_TranslationsMissingProduct"
    ],
    "CS_ArchivedProducts" => [
        "name" => "CS_ArchivedProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n   oo_id As 'Pimcore Id', \n    Name,\n    CorporateBrand As 'Corporate Brand',\n    ProductBrand As 'Product Brand',\n   IF(object_CSProducts.`isArchived` = 1, \"True\", \"False\") AS `Archived`",
                "from" => "FROM object_CSProducts",
                "where" => "WHERE isArchived = 1",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [

        ],
        "niceName" => "CS_ArchivedProducts",
        "group" => "ContiTech CS",
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
        "modificationDate" => 1635414958,
        "creationDate" => 1632215479,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "CS_ArchivedProducts"
    ],
    "CS_WorkflowReport" => [
        "name" => "CS_WorkflowReport",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  o1.`oo_id` as `Id`,\n  o1.`Name`,\n  CASE WHEN o1.`o_path` = '/Contitech_ConveyorSolution/Products/' THEN 'LEVEL1' ELSE REPLACE(\n    o1.`o_path`,\n    '/Contitech_ConveyorSolution/Products/',\n    ''\n  ) END as `Hierarchy Level`,\n  FROM_UNIXTIME(o1.`o_creationDate`) as `Creation Date`,\n  CASE \nWHEN wf.`place` = 'open' THEN 'Open' \nWHEN wf.`place` = 'archived' THEN 'Archived' \nWHEN wf.`place` = 'enrich' THEN 'Enrich' \nWHEN wf.`place` = 'paused' THEN 'Paused' \nWHEN wf.`place` = 'published' THEN 'Published' \nWHEN wf.`place` = 'review_content' THEN 'Review Content' \nWHEN wf.`place` = 'accepted' THEN 'Accepted' \nWHEN wf.`place` = 'default' THEN 'Default' \nWHEN wf.`place` = 'in_process' THEN 'In Process' \nWHEN wf.`place` = 'in_rd_edit' THEN 'In R&D Edit' \nWHEN wf.`place` = 'in_publish' THEN 'In Publish' \nEND as `Status`\nFROM\n  object_CSProducts o1\n  LEFT JOIN element_workflow_state wf on o1.`oo_id` = wf.`cid` \nORDER BY\n  (o1.`o_creationDate`) DESC",
                "from" => "",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1135-1"
            ],
            [
                "name" => "Hierarchy Level",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1135-2"
            ],
            [
                "name" => "Creation Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1135-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1135-4"
            ],
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel1135-5"
            ]
        ],
        "niceName" => "CS_Products Workflow",
        "group" => "ContiTech CS",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1638355385,
        "creationDate" => 1631861341,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "CS_WorkflowReport"
    ]
];
