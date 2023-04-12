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
                "where" => "WHERE (o1.`o_published` =1) AND (o1.`o_path` NOT LIKE '%/Quote/%') AND (o1.`o_key` NOT LIKE '%-qte%' AND o1.`o_key` NOT LIKE '%-quote%') AND (o1.`o_creationDate` > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 1 DAY)))",
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
                "id" => "extModel9674-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel9674-11"
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
                "id" => "extModel9674-12"
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
        "modificationDate" => 1671527909,
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
                "sql" => "SELECT\no1.`o_key` as `Key`,\n o1.`articleNumber` AS `Article Number`, \nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code` ,\nIF(o1.`mainImage` IS NOT NULL, \"True\", \"False\") AS `Main Image`, \nIF(o1.`frontView` IS NOT NULL, \"True\", \"False\") AS `Front View Image`,\nIF(o1.`sideView` IS NOT NULL, \"True\", \"False\") AS `Side View Image`,\nIF(o1.`cutView` IS NOT NULL, \"True\", \"False\") AS `Cut View Image`,\nIF(o1.`epixImage` IS NOT NULL, \"True\", \"False\") AS `Epix Image`,\nIF(o1.`altImage1` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 1`,\nIF(o1.`altImage2` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 2`,\nIF(o1.`altImage3` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 3`,\nIF(o1.`altImage4` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 4`,\nIF(o1.`altImage5` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 5`,\nIF(o1.`altImage6` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 6`,\nIF(o1.`altImage7` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 7`,\nIF(o1.`altImage8` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 8`,\nIF(o1.`certificationImage` IS NOT NULL, \"True\", \"False\") AS `Certification Image`,\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "FROM object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "WHERE (o1.`mainImage` IS NULL OR o1.`frontView` IS NULL OR o1.`sideView` IS NULL OR o1.`cutView` IS NULL OR o1.`epixImage` IS NULL OR o1.`altImage1` IS NULL OR o1.`altImage2` IS NULL OR o1.`altImage3` IS NULL OR o1.`altImage4` IS NULL OR o1.`altImage5` IS NULL OR o1.`altImage6` IS NULL OR o1.`altImage7` IS NULL OR o1.`altImage8` IS NULL OR o1.`certificationImage` IS NULL) AND (o1.`o_published` =1)",
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
                "sql" => "SELECT \n    cat4.`description` AS `SIOP Level 4`,\n    o3.`name` AS `Brand`,\n    COUNT(`o1`.`o_id`) AS `# of SKUs`,\n    CASE\n\t\tWHEN o3.`name` IS NULL THEN concat(cat4.`description`,\" -- \",\"[NO BRAND]\")\n        ELSE concat(cat4.`description`,\" -- \",o3.`name`)\n\tEND as `SIOP Level 4 -- Band`",
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
                "id" => "extModel461-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel461-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel461-5"
            ],
            [
                "name" => "SIOP Level 4 -- Band",
                "display" => FALSE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel461-18"
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
        "pieLabelColumn" => "SIOP Level 4 -- Band",
        "xAxis" => NULL,
        "yAxis" => [

        ],
        "modificationDate" => 1629875608,
        "creationDate" => 1620661797,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartBrandProduct"
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
                "id" => "extModel294-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel294-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel294-5"
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
        "modificationDate" => 1623916067,
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
    "IndustrialHoseChartProductsWithNoImage-VirtualCatalogFilter" => [
        "name" => "IndustrialHoseChartProductsWithNoImage-VirtualCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n temp.`SIOP3`,\n SUM(temp.`skus`)  AS `# of SKUs`,\n temp.`Virtualflag`,\n ROUND(\n (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n 2\n )  AS `Yes Percentage`,\n ROUND(\n (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n 2\n ) AS ` No Percentage`",
                "from" => "FROM\n (\n SELECT\n cat3.`description` AS `SIOP3`,\n count(o1.`o_id`) AS `skus`,\n IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`,\n IF(o1.`virtualCatalogFlag` = 1 , 'True', 'False' ) AS `Virtualflag`\n FROM\n object_1 o1\n LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n WHERE\n (\n o1.`o_published` = 1\n AND o1.siopFullCode LIKE '041000%'\n )\n GROUP BY\n cat3.`description`,\n o1.`o_id`,\n o1.`mainImage`\n \n ) AS temp",
                "where" => "",
                "groupby" => "GROUP BY\n temp.`SIOP3`,\n temp.`skus`,\n temp.`Virtualflag`\n ORDER BY temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-5"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-6"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-7"
            ],
            [
                "name" => "Virtualflag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel1639-8"
            ]
        ],
        "niceName" => "Chart - Products With No Image - Virtual Catalog Filter",
        "group" => "Industrial Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1624513192,
        "creationDate" => 1624292432,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartProductsWithNoImage-VirtualCatalogFilter"
    ],
    "IndustrialHoseChartProductsWithNoImage-BrandFilter" => [
        "name" => "IndustrialHoseChartProductsWithNoImage-BrandFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  temp.`SIOP3`,\n  SUM(temp.`skus`) AS `# of SKUs`,\n  ROUND(\n    (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n    2\n  ) AS `Yes Percentage`,\n  ROUND(\n    (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n    2\n  ) AS ` No Percentage`,\n  temp.`BrandType`",
                "from" => "FROM\n  (\n    SELECT\n      cat3.`description` AS `SIOP3`,\n      count(o1.`o_id`) AS `skus`,\n      CASE WHEN brand.`BrandType` IS NULL THEN 'Empty' WHEN brand.`BrandType` =\"\" THEN 'Empty' WHEN brand.`BrandType` = \"General\" THEN 'General' WHEN brand.`BrandType` = \"Generic\" THEN 'Generic' WHEN brand.`BrandType` = \"Private\" THEN 'Private' END AS `BrandType`,\n      IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`\n    FROM\n      object_1 o1\n      LEFT JOIN object_3 brand on brand.oo_id = o1.brandName\n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n    WHERE\n      (\n        o1.`o_published` = 1\n        AND o1.siopFullCode LIKE '041000%'\n      )\n    GROUP BY\n      cat3.`description`,\n      o1.`o_id`,\n      o1.`mainImage`,\n      brand.`BrandType`\n  ) AS temp ",
                "where" => "",
                "groupby" => "GROUP BY temp.`SIOP3`,\n  temp.`skus`,\n  temp.`BrandType`\nORDER BY\n  temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-6"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel473-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - BrandType  Filter",
        "group" => "Industrial Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1625038555,
        "creationDate" => 1624293275,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartProductsWithNoImage-BrandFilter"
    ],
    "IndustrialHoseChartProductsWithNoImage-PrintedCatalogFlag" => [
        "name" => "IndustrialHoseChartProductsWithNoImage-PrintedCatalogFlag",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n temp.`SIOP3`,\n SUM(temp.`skus`)  AS `# of SKUs`,\n temp.`PrintedFlag`,\n ROUND(\n (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n 2\n )  AS `Yes Percentage`,\n ROUND(\n (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n 2\n ) AS ` No Percentage`",
                "from" => "FROM\n (\n SELECT\n cat3.`description` AS `SIOP3`,\n count(o1.`o_id`) AS `skus`,\n IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`,\n IF(o1.`printedCatalogFlag` = 1 , 'True', 'False' ) AS `PrintedFlag`\n FROM\n object_1 o1\n LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n WHERE\n (\n o1.`o_published` = 1\n AND o1.siopFullCode LIKE '041000%'\n )\n GROUP BY\n cat3.`description`,\n o1.`o_id`,\n o1.`mainImage`\n \n ) AS temp",
                "where" => "",
                "groupby" => "GROUP BY\n temp.`SIOP3`,\n temp.`skus`,\n temp.`printedflag`\n ORDER BY temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "",
                "id" => "extModel2187-6"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel2187-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - Printed Catalog Filter",
        "group" => "Industrial Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1624514078,
        "creationDate" => 1624450664,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartProductsWithNoImage-PrintedCatalogFlag"
    ],
    "IndustrialHoseChartDataCompleteness-PrintedCatalogFilter" => [
        "name" => "IndustrialHoseChartDataCompleteness-PrintedCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n  temp.nSKU AS `# of Sku's`, \n  temp.percentage AS `Completeness Percentage`, \n  temp.SIOP3 AS `SIOP3`, \n  temp.PrintedFlag ",
                "from" => "FROM \n  (\n    SELECT \n      COUNT(o1.`o_key`) AS `nSKU`, \n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ), \n          3\n        )\n      ) AS `percentage`, \n      cat3.`description` AS `SIOP3`, \n      CASE WHEN o1.`printedCatalogFlag` IS NULL THEN 'False' WHEN o1.`printedCatalogFlag` = -1 THEN 'False' WHEN o1.`printedCatalogFlag` = 1 THEN 'True' END AS PrintedFlag \n    FROM \n      object_1 o1 \n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id` \n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(\n        o1.SIOPLevel3, \n        2, \n        (\n          LENGTH(o1.SIOPLevel3) -2\n        )\n      ) \n    WHERE \n      (\n        o1.`o_published` = 1 \n        AND o1.siopFullCode LIKE '041000%'\n      ) \n    GROUP BY \n      cat3.`description`, \n      `PrintedFlag` \n    ORDER BY \n      cat3.`description`\n  ) temp\n",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-1"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel931-2"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-4",
                "filter_drilldown" => "filter_and_show"
            ]
        ],
        "niceName" => "Chart - Data Completeness - Printed Catalog Filter",
        "group" => "Industrial Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625039364,
        "creationDate" => 1625039156,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartDataCompleteness-PrintedCatalogFilter"
    ],
    "IndustrialHoseChartDataCompleteness-VirtualCatalogFilter" => [
        "name" => "IndustrialHoseChartDataCompleteness-VirtualCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n  temp.nSKU AS `# of Sku's`, \n  temp.percentage AS `Completeness Percentage`, \n  temp.SIOP3 AS `SIOP3`, \n  temp.VirtualFlag ",
                "from" => "FROM \n  (\n    SELECT \n      COUNT(o1.`o_key`) AS `nSKU`, \n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ), \n          3\n        )\n      ) AS `percentage`, \n      cat3.`description` AS `SIOP3`, \n      CASE WHEN o1.`virtualCatalogFlag` IS NULL THEN 'False' WHEN o1.`virtualCatalogFlag` = -1 THEN 'False' WHEN o1.`virtualCatalogFlag` = 1 THEN 'True' END AS VirtualFlag \n    FROM \n      object_1 o1 \n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id` \n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(\n        o1.SIOPLevel3, \n        2, \n        (\n          LENGTH(o1.SIOPLevel3) -2\n        )\n      ) \n    WHERE \n      (\n        o1.`o_published` = 1 \n        AND o1.siopFullCode LIKE '041000%'\n      ) \n    GROUP BY \n      cat3.`description`, \n      `VirtualFlag` \n    ORDER BY \n      cat3.`description`\n  ) temp\n",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-1"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel583-2"
            ],
            [
                "name" => "VirtualFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-4",
                "filter_drilldown" => "filter_and_show"
            ]
        ],
        "niceName" => "Chart - Data Completeness - Virtual Catalog Filter",
        "group" => "Industrial Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625039940,
        "creationDate" => 1625039584,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartDataCompleteness-VirtualCatalogFilter"
    ],
    "IndustrialHoseChartDataCompleteness-BrandFilter" => [
        "name" => "IndustrialHoseChartDataCompleteness-BrandFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  sum(temp.nSKU) AS `# of Sku's`,\n  Round(sum(temp.percentage),2) AS `Completeness Percentage`,\n  temp.SIOP3 AS `SIOP3`,\n  temp.`BrandType`",
                "from" => "FROM\n  (\n    SELECT\n      CASE WHEN brand.`BrandType` IS NULL THEN 'Empty' WHEN brand.`BrandType` =\"\" THEN 'Empty' WHEN brand.`BrandType` = \"General\" THEN 'General' WHEN brand.`BrandType` = \"Generic\" THEN 'Generic' WHEN brand.`BrandType` = \"Private\" THEN 'Private' END AS `BrandType`,\n      COUNT(o1.`o_key`) AS `nSKU`,\n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ),\n          3\n        )\n      ) AS `percentage`,\n      cat3.`description` AS `SIOP3`\n    FROM\n      object_1 o1\n      LEFT JOIN object_3 brand on brand.oo_id = o1.brandName\n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id`\n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2, (LENGTH(o1.SIOPLevel3) -2))\n    WHERE\n      (\n        o1.`o_published` = 1\n        AND o1.siopFullCode LIKE '041000%'\n      ) GROUP BY\n      cat3.`description`,\n      brand.`BrandType`\n    ORDER BY\n      cat3.`description`\n  ) temp",
                "where" => "",
                "groupby" => "Group BY temp.BrandType,\ntemp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel440-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel440-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel440-5"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel440-6"
            ]
        ],
        "niceName" => "Chart - Data Completeness - BrandType Filter",
        "group" => "Industrial Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625041855,
        "creationDate" => 1625040174,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IndustrialHoseChartDataCompleteness-BrandFilter"
    ],
    "HydraulicHoseChartProductsWithNoImage-VirtualCatalogFilter" => [
        "name" => "HydraulicHoseChartProductsWithNoImage-VirtualCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n temp.`SIOP3`,\n SUM(temp.`skus`)  AS `# of SKUs`,\n temp.`Virtualflag`,\n ROUND(\n (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n 2\n )  AS `Yes Percentage`,\n ROUND(\n (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n 2\n ) AS ` No Percentage`",
                "from" => "FROM\n (\n SELECT\n cat3.`description` AS `SIOP3`,\n count(o1.`o_id`) AS `skus`,\n IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`,\n IF(o1.`virtualCatalogFlag` = 1 , 'True', 'False' ) AS `Virtualflag`\n FROM\n object_1 o1\n LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n WHERE\n (\n o1.`o_published` = 1\n AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%')\n )\n GROUP BY\n cat3.`description`,\n o1.`o_id`,\n o1.`mainImage`\n \n ) AS temp",
                "where" => "",
                "groupby" => "GROUP BY\n temp.`SIOP3`,\n temp.`skus`,\n temp.`Virtualflag`\n ORDER BY temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel293-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel293-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel293-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel293-6"
            ],
            [
                "name" => "Virtualflag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel293-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - Virtual Catalog Filter",
        "group" => "Hydraulic Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1629893476,
        "creationDate" => 1629891069,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartProductsWithNoImage-VirtualCatalogFilter"
    ],
    "HydraulicHoseChartProductsWithNoImage-BrandFilter" => [
        "name" => "HydraulicHoseChartProductsWithNoImage-BrandFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  temp.`SIOP3`,\n  SUM(temp.`skus`) AS `# of SKUs`,\n  ROUND(\n    (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n    2\n  ) AS `Yes Percentage`,\n  ROUND(\n    (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n    2\n  ) AS ` No Percentage`,\n  temp.`BrandType`",
                "from" => "FROM\n  (\n    SELECT\n      cat3.`description` AS `SIOP3`,\n      count(o1.`o_id`) AS `skus`,\n      CASE WHEN brand.`BrandType` IS NULL THEN 'Empty' WHEN brand.`BrandType` =\"\" THEN 'Empty' WHEN brand.`BrandType` = \"General\" THEN 'General' WHEN brand.`BrandType` = \"Generic\" THEN 'Generic' WHEN brand.`BrandType` = \"Private\" THEN 'Private' END AS `BrandType`,\n      IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`\n    FROM\n      object_1 o1\n      LEFT JOIN object_3 brand on brand.oo_id = o1.brandName\n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n    WHERE\n      (\n        o1.`o_published` = 1\n        AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%')\n      )\n    GROUP BY\n      cat3.`description`,\n      o1.`o_id`,\n      o1.`mainImage`,\n      brand.`BrandType`\n  ) AS temp ",
                "where" => "",
                "groupby" => "GROUP BY temp.`SIOP3`,\n  temp.`skus`,\n  temp.`BrandType`\nORDER BY\n  temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel458-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel458-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel458-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel458-6"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel458-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - BrandType  Filter",
        "group" => "Hydraulic Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1629893494,
        "creationDate" => 1624293275,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartProductsWithNoImage-BrandFilter"
    ],
    "HydraulicHoseChartProductsWithNoImage-PrintedCatalogFlag" => [
        "name" => "HydraulicHoseChartProductsWithNoImage-PrintedCatalogFlag",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n temp.`SIOP3`,\n SUM(temp.`skus`)  AS `# of SKUs`,\n temp.`PrintedFlag`,\n ROUND(\n (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n 2\n )  AS `Yes Percentage`,\n ROUND(\n (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n 2\n ) AS ` No Percentage`",
                "from" => "FROM\n (\n SELECT\n cat3.`description` AS `SIOP3`,\n count(o1.`o_id`) AS `skus`,\n IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`,\n IF(o1.`printedCatalogFlag` = 1 , 'True', 'False' ) AS `PrintedFlag`\n FROM\n object_1 o1\n LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n WHERE\n (\n o1.`o_published` = 1\n AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%')\n )\n GROUP BY\n cat3.`description`,\n o1.`o_id`,\n o1.`mainImage`\n \n ) AS temp",
                "where" => "",
                "groupby" => "GROUP BY\n temp.`SIOP3`,\n temp.`skus`,\n temp.`printedflag`\n ORDER BY temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel619-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel619-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel619-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "",
                "id" => "extModel619-6"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel619-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - Printed Catalog Filter",
        "group" => "Hydraulic Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1629893512,
        "creationDate" => 1624450664,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartProductsWithNoImage-PrintedCatalogFlag"
    ],
    "HydraulicHoseChartDataCompleteness-PrintedCatalogFilter" => [
        "name" => "HydraulicHoseChartDataCompleteness-PrintedCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n  temp.nSKU AS `# of Sku's`, \n  temp.percentage AS `Completeness Percentage`, \n  temp.SIOP3 AS `SIOP3`, \n  temp.PrintedFlag ",
                "from" => "FROM \n  (\n    SELECT \n      COUNT(o1.`o_key`) AS `nSKU`, \n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ), \n          3\n        )\n      ) AS `percentage`, \n      cat3.`description` AS `SIOP3`, \n      CASE WHEN o1.`printedCatalogFlag` IS NULL THEN 'False' WHEN o1.`printedCatalogFlag` = -1 THEN 'False' WHEN o1.`printedCatalogFlag` = 1 THEN 'True' END AS PrintedFlag \n    FROM \n      object_1 o1 \n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id` \n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(\n        o1.SIOPLevel3, \n        2, \n        (\n          LENGTH(o1.SIOPLevel3) -2\n        )\n      ) \n    WHERE \n      (\n        o1.`o_published` = 1 \n        AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%')\n      ) \n    GROUP BY \n      cat3.`description`, \n      `PrintedFlag` \n    ORDER BY \n      cat3.`description`\n  ) temp\n",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel781-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel781-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel781-5"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel781-6"
            ]
        ],
        "niceName" => "Chart - Data Completeness - Printed Catalog Filter",
        "group" => "Hydraulic Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1629893535,
        "creationDate" => 1625039156,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartDataCompleteness-PrintedCatalogFilter"
    ],
    "HydraulicHoseChartDataCompleteness-VirtualCatalogFilter" => [
        "name" => "HydraulicHoseChartDataCompleteness-VirtualCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n  temp.nSKU AS `# of Sku's`, \n  temp.percentage AS `Completeness Percentage`, \n  temp.SIOP3 AS `SIOP3`, \n  temp.VirtualFlag ",
                "from" => "FROM \n  (\n    SELECT \n      COUNT(o1.`o_key`) AS `nSKU`, \n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ), \n          3\n        )\n      ) AS `percentage`, \n      cat3.`description` AS `SIOP3`, \n      CASE WHEN o1.`virtualCatalogFlag` IS NULL THEN 'False' WHEN o1.`virtualCatalogFlag` = -1 THEN 'False' WHEN o1.`virtualCatalogFlag` = 1 THEN 'True' END AS VirtualFlag \n    FROM \n      object_1 o1 \n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id` \n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(\n        o1.SIOPLevel3, \n        2, \n        (\n          LENGTH(o1.SIOPLevel3) -2\n        )\n      ) \n    WHERE \n      (\n        o1.`o_published` = 1 \n        AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%')\n      ) \n    GROUP BY \n      cat3.`description`, \n      `VirtualFlag` \n    ORDER BY \n      cat3.`description`\n  ) temp\n",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel941-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel941-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel941-5"
            ],
            [
                "name" => "VirtualFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel941-6"
            ]
        ],
        "niceName" => "Chart - Data Completeness - Virtual Catalog Filter",
        "group" => "Hydraulic Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1629893556,
        "creationDate" => 1625039584,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartDataCompleteness-VirtualCatalogFilter"
    ],
    "HydraulicHoseChartDataCompleteness-BrandFilter" => [
        "name" => "HydraulicHoseChartDataCompleteness-BrandFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  sum(temp.nSKU) AS `# of Sku's`,\n  Round(sum(temp.percentage),2) AS `Completeness Percentage`,\n  temp.SIOP3 AS `SIOP3`,\n  temp.`BrandType`",
                "from" => "FROM\n  (\n    SELECT\n      CASE WHEN brand.`BrandType` IS NULL THEN 'Empty' WHEN brand.`BrandType` =\"\" THEN 'Empty' WHEN brand.`BrandType` = \"General\" THEN 'General' WHEN brand.`BrandType` = \"Generic\" THEN 'Generic' WHEN brand.`BrandType` = \"Private\" THEN 'Private' END AS `BrandType`,\n      COUNT(o1.`o_key`) AS `nSKU`,\n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ),\n          3\n        )\n      ) AS `percentage`,\n      cat3.`description` AS `SIOP3`\n    FROM\n      object_1 o1\n      LEFT JOIN object_3 brand on brand.oo_id = o1.brandName\n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id`\n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2, (LENGTH(o1.SIOPLevel3) -2))\n    WHERE\n      (\n        o1.`o_published` = 1\n        AND (o1.siopFullCode LIKE '0415001540%' OR o1.siopFullCode LIKE '0415001550%' OR o1.siopFullCode LIKE '0415001560%' OR o1.siopFullCode LIKE '0415001530000%' OR o1.siopFullCode LIKE '0415001510000%')\n      ) GROUP BY\n      cat3.`description`,\n      brand.`BrandType`\n    ORDER BY\n      cat3.`description`\n  ) temp",
                "where" => "",
                "groupby" => "Group BY temp.BrandType,\ntemp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1102-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1102-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel1102-5"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel1102-6"
            ]
        ],
        "niceName" => "Chart - Data Completeness - BrandType Filter",
        "group" => "Hydraulic Hose",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1629893578,
        "creationDate" => 1625040174,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicHoseChartDataCompleteness-BrandFilter"
    ],
    "HydraulicFittingsChartProductsWithNoImage-VirtualCatalogFilter" => [
        "name" => "HydraulicFittingsChartProductsWithNoImage-VirtualCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n temp.`SIOP3`,\n SUM(temp.`skus`)  AS `# of SKUs`,\n temp.`Virtualflag`,\n ROUND(\n (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n 2\n )  AS `Yes Percentage`,\n ROUND(\n (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n 2\n ) AS ` No Percentage`",
                "from" => "FROM\n (\n SELECT\n cat3.`description` AS `SIOP3`,\n count(o1.`o_id`) AS `skus`,\n IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`,\n IF(o1.`virtualCatalogFlag` = 1 , 'True', 'False' ) AS `Virtualflag`\n FROM\n object_1 o1\n LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n WHERE\n (\n o1.`o_published` = 1\n AND (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')\n )\n GROUP BY\n cat3.`description`,\n o1.`o_id`,\n o1.`mainImage`\n \n ) AS temp",
                "where" => "",
                "groupby" => "GROUP BY\n temp.`SIOP3`,\n temp.`skus`,\n temp.`Virtualflag`\n ORDER BY temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-5"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-6"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-7"
            ],
            [
                "name" => "Virtualflag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel1639-8"
            ]
        ],
        "niceName" => "Chart - Products With No Image - Virtual Catalog Filter",
        "group" => "Hydraulic Fittings",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1624513192,
        "creationDate" => 1624292432,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartProductsWithNoImage-VirtualCatalogFilter"
    ],
    "HydraulicFittingsChartProductsWithNoImage-BrandFilter" => [
        "name" => "HydraulicFittingsChartProductsWithNoImage-BrandFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  temp.`SIOP3`,\n  SUM(temp.`skus`) AS `# of SKUs`,\n  ROUND(\n    (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n    2\n  ) AS `Yes Percentage`,\n  ROUND(\n    (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n    2\n  ) AS ` No Percentage`,\n  temp.`BrandType`",
                "from" => "FROM\n  (\n    SELECT\n      cat3.`description` AS `SIOP3`,\n      count(o1.`o_id`) AS `skus`,\n      CASE WHEN brand.`BrandType` IS NULL THEN 'Empty' WHEN brand.`BrandType` =\"\" THEN 'Empty' WHEN brand.`BrandType` = \"General\" THEN 'General' WHEN brand.`BrandType` = \"Generic\" THEN 'Generic' WHEN brand.`BrandType` = \"Private\" THEN 'Private' END AS `BrandType`,\n      IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`\n    FROM\n      object_1 o1\n      LEFT JOIN object_3 brand on brand.oo_id = o1.brandName\n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n    WHERE\n      (\n        o1.`o_published` = 1\n        AND (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')\n      )\n    GROUP BY\n      cat3.`description`,\n      o1.`o_id`,\n      o1.`mainImage`,\n      brand.`BrandType`\n  ) AS temp ",
                "where" => "",
                "groupby" => "GROUP BY temp.`SIOP3`,\n  temp.`skus`,\n  temp.`BrandType`\nORDER BY\n  temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-6"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel473-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - BrandType  Filter",
        "group" => "Hydraulic Fittings",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1625038555,
        "creationDate" => 1624293275,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartProductsWithNoImage-BrandFilter"
    ],
    "HydraulicFittingsChartProductsWithNoImage-PrintedCatalogFlag" => [
        "name" => "HydraulicFittingsChartProductsWithNoImage-PrintedCatalogFlag",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n temp.`SIOP3`,\n SUM(temp.`skus`)  AS `# of SKUs`,\n temp.`PrintedFlag`,\n ROUND(\n (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n 2\n )  AS `Yes Percentage`,\n ROUND(\n (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n 2\n ) AS ` No Percentage`",
                "from" => "FROM\n (\n SELECT\n cat3.`description` AS `SIOP3`,\n count(o1.`o_id`) AS `skus`,\n IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`,\n IF(o1.`printedCatalogFlag` = 1 , 'True', 'False' ) AS `PrintedFlag`\n FROM\n object_1 o1\n LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n WHERE\n (\n o1.`o_published` = 1\n AND (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')\n )\n GROUP BY\n cat3.`description`,\n o1.`o_id`,\n o1.`mainImage`\n \n ) AS temp",
                "where" => "",
                "groupby" => "GROUP BY\n temp.`SIOP3`,\n temp.`skus`,\n temp.`printedflag`\n ORDER BY temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "",
                "id" => "extModel2187-6"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel2187-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - Printed Catalog Filter",
        "group" => "Hydraulic Fittings",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1624514078,
        "creationDate" => 1624450664,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartProductsWithNoImage-PrintedCatalogFlag"
    ],
    "HydraulicFittingsChartDataCompleteness-PrintedCatalogFilter" => [
        "name" => "HydraulicFittingsChartDataCompleteness-PrintedCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n  temp.nSKU AS `# of Sku's`, \n  temp.percentage AS `Completeness Percentage`, \n  temp.SIOP3 AS `SIOP3`, \n  temp.PrintedFlag ",
                "from" => "FROM \n  (\n    SELECT \n      COUNT(o1.`o_key`) AS `nSKU`, \n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ), \n          3\n        )\n      ) AS `percentage`, \n      cat3.`description` AS `SIOP3`, \n      CASE WHEN o1.`printedCatalogFlag` IS NULL THEN 'False' WHEN o1.`printedCatalogFlag` = -1 THEN 'False' WHEN o1.`printedCatalogFlag` = 1 THEN 'True' END AS PrintedFlag \n    FROM \n      object_1 o1 \n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id` \n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(\n        o1.SIOPLevel3, \n        2, \n        (\n          LENGTH(o1.SIOPLevel3) -2\n        )\n      ) \n    WHERE \n      (\n        o1.`o_published` = 1 \n        AND (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')\n      ) \n    GROUP BY \n      cat3.`description`, \n      `PrintedFlag` \n    ORDER BY \n      cat3.`description`\n  ) temp\n",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-1"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel931-2"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-4",
                "filter_drilldown" => "filter_and_show"
            ]
        ],
        "niceName" => "Chart - Data Completeness - Printed Catalog Filter",
        "group" => "Hydraulic Fittings",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625039364,
        "creationDate" => 1625039156,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartDataCompleteness-PrintedCatalogFilter"
    ],
    "HydraulicFittingsChartDataCompleteness-VirtualCatalogFilter" => [
        "name" => "HydraulicFittingsChartDataCompleteness-VirtualCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n  temp.nSKU AS `# of Sku's`, \n  temp.percentage AS `Completeness Percentage`, \n  temp.SIOP3 AS `SIOP3`, \n  temp.VirtualFlag ",
                "from" => "FROM \n  (\n    SELECT \n      COUNT(o1.`o_key`) AS `nSKU`, \n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ), \n          3\n        )\n      ) AS `percentage`, \n      cat3.`description` AS `SIOP3`, \n      CASE WHEN o1.`virtualCatalogFlag` IS NULL THEN 'False' WHEN o1.`virtualCatalogFlag` = -1 THEN 'False' WHEN o1.`virtualCatalogFlag` = 1 THEN 'True' END AS VirtualFlag \n    FROM \n      object_1 o1 \n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id` \n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(\n        o1.SIOPLevel3, \n        2, \n        (\n          LENGTH(o1.SIOPLevel3) -2\n        )\n      ) \n    WHERE \n      (\n        o1.`o_published` = 1 \n        AND (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')\n      ) \n    GROUP BY \n      cat3.`description`, \n      `VirtualFlag` \n    ORDER BY \n      cat3.`description`\n  ) temp\n",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-1"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel583-2"
            ],
            [
                "name" => "VirtualFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-4",
                "filter_drilldown" => "filter_and_show"
            ]
        ],
        "niceName" => "Chart - Data Completeness - Virtual Catalog Filter",
        "group" => "Hydraulic Fittings",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625039940,
        "creationDate" => 1625039584,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartDataCompleteness-VirtualCatalogFilter"
    ],
    "HydraulicFittingsChartDataCompleteness-BrandFilter" => [
        "name" => "HydraulicFittingsChartDataCompleteness-BrandFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  sum(temp.nSKU) AS `# of Sku's`,\n  Round(sum(temp.percentage),2) AS `Completeness Percentage`,\n  temp.SIOP3 AS `SIOP3`,\n  temp.`BrandType`",
                "from" => "FROM\n  (\n    SELECT\n      CASE WHEN brand.`BrandType` IS NULL THEN 'Empty' WHEN brand.`BrandType` =\"\" THEN 'Empty' WHEN brand.`BrandType` = \"General\" THEN 'General' WHEN brand.`BrandType` = \"Generic\" THEN 'Generic' WHEN brand.`BrandType` = \"Private\" THEN 'Private' END AS `BrandType`,\n      COUNT(o1.`o_key`) AS `nSKU`,\n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ),\n          3\n        )\n      ) AS `percentage`,\n      cat3.`description` AS `SIOP3`\n    FROM\n      object_1 o1\n      LEFT JOIN object_3 brand on brand.oo_id = o1.brandName\n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id`\n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2, (LENGTH(o1.SIOPLevel3) -2))\n    WHERE\n      (\n        o1.`o_published` = 1\n        AND (o1.siopFullCode LIKE '0415001570%' OR o1.siopFullCode LIKE  '0415001580%' OR o1.siopFullCode LIKE '0415001530100%' OR o1.siopFullCode LIKE '0415001510100%')\n      ) GROUP BY\n      cat3.`description`,\n      brand.`BrandType`\n    ORDER BY\n      cat3.`description`\n  ) temp",
                "where" => "",
                "groupby" => "Group BY temp.BrandType,\ntemp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel440-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel440-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel440-5"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel440-6"
            ]
        ],
        "niceName" => "Chart - Data Completeness - BrandType Filter",
        "group" => "Hydraulic Fittings",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625041855,
        "creationDate" => 1625040174,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "HydraulicFittingsChartDataCompleteness-BrandFilter"
    ],
    "PTGChartProductsWithNoImage-VirtualCatalogFilter" => [
        "name" => "PTGChartProductsWithNoImage-VirtualCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n temp.`SIOP3`,\n SUM(temp.`skus`)  AS `# of SKUs`,\n temp.`Virtualflag`,\n ROUND(\n (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n 2\n )  AS `Yes Percentage`,\n ROUND(\n (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n 2\n ) AS ` No Percentage`",
                "from" => "FROM\n (\n SELECT\n cat3.`description` AS `SIOP3`,\n count(o1.`o_id`) AS `skus`,\n IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`,\n IF(o1.`virtualCatalogFlag` = 1 , 'True', 'False' ) AS `Virtualflag`\n FROM\n object_1 o1\n LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n WHERE\n (\n o1.`o_published` = 1\n AND o1.siopFullCode LIKE '043000%'\n )\n GROUP BY\n cat3.`description`,\n o1.`o_id`,\n o1.`mainImage`\n \n ) AS temp",
                "where" => "",
                "groupby" => "GROUP BY\n temp.`SIOP3`,\n temp.`skus`,\n temp.`Virtualflag`\n ORDER BY temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-5"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-6"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1639-7"
            ],
            [
                "name" => "Virtualflag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel1639-8"
            ]
        ],
        "niceName" => "Chart - Products With No Image - Virtual Catalog Filter",
        "group" => "PTG",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1624513192,
        "creationDate" => 1624292432,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartProductsWithNoImage-VirtualCatalogFilter"
    ],
    "PTGChartProductsWithNoImage-BrandFilter" => [
        "name" => "PTGChartProductsWithNoImage-BrandFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  temp.`SIOP3`,\n  SUM(temp.`skus`) AS `# of SKUs`,\n  ROUND(\n    (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n    2\n  ) AS `Yes Percentage`,\n  ROUND(\n    (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n    2\n  ) AS ` No Percentage`,\n  temp.`BrandType`",
                "from" => "FROM\n  (\n    SELECT\n      cat3.`description` AS `SIOP3`,\n      count(o1.`o_id`) AS `skus`,\n      CASE WHEN brand.`BrandType` IS NULL THEN 'Empty' WHEN brand.`BrandType` =\"\" THEN 'Empty' WHEN brand.`BrandType` = \"General\" THEN 'General' WHEN brand.`BrandType` = \"Generic\" THEN 'Generic' WHEN brand.`BrandType` = \"Private\" THEN 'Private' END AS `BrandType`,\n      IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`\n    FROM\n      object_1 o1\n      LEFT JOIN object_3 brand on brand.oo_id = o1.brandName\n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n    WHERE\n      (\n        o1.`o_published` = 1\n        AND o1.siopFullCode LIKE '043000%'\n      )\n    GROUP BY\n      cat3.`description`,\n      o1.`o_id`,\n      o1.`mainImage`,\n      brand.`BrandType`\n  ) AS temp ",
                "where" => "",
                "groupby" => "GROUP BY temp.`SIOP3`,\n  temp.`skus`,\n  temp.`BrandType`\nORDER BY\n  temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel473-6"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel473-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - BrandType  Filter",
        "group" => "PTG",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1625038555,
        "creationDate" => 1624293275,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartProductsWithNoImage-BrandFilter"
    ],
    "PTGChartProductsWithNoImage-PrintedCatalogFlag" => [
        "name" => "PTGChartProductsWithNoImage-PrintedCatalogFlag",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n temp.`SIOP3`,\n SUM(temp.`skus`)  AS `# of SKUs`,\n temp.`PrintedFlag`,\n ROUND(\n (SUM(temp.`images` = \"YES\") * 100.0) / Sum(temp.`skus`),\n 2\n )  AS `Yes Percentage`,\n ROUND(\n (SUM(temp.`images` = \"NO\") * 100.0) / Sum(temp.`skus`),\n 2\n ) AS ` No Percentage`",
                "from" => "FROM\n (\n SELECT\n cat3.`description` AS `SIOP3`,\n count(o1.`o_id`) AS `skus`,\n IF(o1.`mainImage` IS Not NULL, \"YES\", \"NO\") AS `images`,\n IF(o1.`printedCatalogFlag` = 1 , 'True', 'False' ) AS `PrintedFlag`\n FROM\n object_1 o1\n LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2,(LENGTH(o1.SIOPLevel3) - 2))\n WHERE\n (\n o1.`o_published` = 1\n AND o1.siopFullCode LIKE '043000%'\n )\n GROUP BY\n cat3.`description`,\n o1.`o_id`,\n o1.`mainImage`\n \n ) AS temp",
                "where" => "",
                "groupby" => "GROUP BY\n temp.`SIOP3`,\n temp.`skus`,\n temp.`printedflag`\n ORDER BY temp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2187-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "",
                "id" => "extModel2187-6"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel2187-7"
            ]
        ],
        "niceName" => "Chart - Products With No Image - Printed Catalog Filter",
        "group" => "PTG",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Yes Percentage"
        ],
        "modificationDate" => 1624514078,
        "creationDate" => 1624450664,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartProductsWithNoImage-PrintedCatalogFlag"
    ],
    "PTGChartDataCompleteness-PrintedCatalogFilter" => [
        "name" => "PTGChartDataCompleteness-PrintedCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n  temp.nSKU AS `# of Sku's`, \n  temp.percentage AS `Completeness Percentage`, \n  temp.SIOP3 AS `SIOP3`, \n  temp.PrintedFlag ",
                "from" => "FROM \n  (\n    SELECT \n      COUNT(o1.`o_key`) AS `nSKU`, \n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ), \n          3\n        )\n      ) AS `percentage`, \n      cat3.`description` AS `SIOP3`, \n      CASE WHEN o1.`printedCatalogFlag` IS NULL THEN 'False' WHEN o1.`printedCatalogFlag` = -1 THEN 'False' WHEN o1.`printedCatalogFlag` = 1 THEN 'True' END AS PrintedFlag \n    FROM \n      object_1 o1 \n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id` \n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(\n        o1.SIOPLevel3, \n        2, \n        (\n          LENGTH(o1.SIOPLevel3) -2\n        )\n      ) \n    WHERE \n      (\n        o1.`o_published` = 1 \n        AND o1.siopFullCode LIKE '043000%'\n      ) \n    GROUP BY \n      cat3.`description`, \n      `PrintedFlag` \n    ORDER BY \n      cat3.`description`\n  ) temp\n",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-1"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel931-2"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel931-4",
                "filter_drilldown" => "filter_and_show"
            ]
        ],
        "niceName" => "Chart - Data Completeness - Printed Catalog Filter",
        "group" => "PTG",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625039364,
        "creationDate" => 1625039156,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartDataCompleteness-PrintedCatalogFilter"
    ],
    "PTGChartDataCompleteness-VirtualCatalogFilter" => [
        "name" => "PTGChartDataCompleteness-VirtualCatalogFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n  temp.nSKU AS `# of Sku's`, \n  temp.percentage AS `Completeness Percentage`, \n  temp.SIOP3 AS `SIOP3`, \n  temp.VirtualFlag ",
                "from" => "FROM \n  (\n    SELECT \n      COUNT(o1.`o_key`) AS `nSKU`, \n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ), \n          3\n        )\n      ) AS `percentage`, \n      cat3.`description` AS `SIOP3`, \n      CASE WHEN o1.`virtualCatalogFlag` IS NULL THEN 'False' WHEN o1.`virtualCatalogFlag` = -1 THEN 'False' WHEN o1.`virtualCatalogFlag` = 1 THEN 'True' END AS VirtualFlag \n    FROM \n      object_1 o1 \n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id` \n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(\n        o1.SIOPLevel3, \n        2, \n        (\n          LENGTH(o1.SIOPLevel3) -2\n        )\n      ) \n    WHERE \n      (\n        o1.`o_published` = 1 \n        AND o1.siopFullCode LIKE '043000%'\n      ) \n    GROUP BY \n      cat3.`description`, \n      `VirtualFlag` \n    ORDER BY \n      cat3.`description`\n  ) temp\n",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-1"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel583-2"
            ],
            [
                "name" => "VirtualFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel583-4",
                "filter_drilldown" => "filter_and_show"
            ]
        ],
        "niceName" => "Chart - Data Completeness - Virtual Catalog Filter",
        "group" => "PTG",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625039940,
        "creationDate" => 1625039584,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartDataCompleteness-VirtualCatalogFilter"
    ],
    "PTGChartDataCompleteness-BrandFilter" => [
        "name" => "PTGChartDataCompleteness-BrandFilter",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  sum(temp.nSKU) AS `# of Sku's`,\n  Round(sum(temp.percentage),2) AS `Completeness Percentage`,\n  temp.SIOP3 AS `SIOP3`,\n  temp.`BrandType`",
                "from" => "FROM\n  (\n    SELECT\n      CASE WHEN brand.`BrandType` IS NULL THEN 'Empty' WHEN brand.`BrandType` =\"\" THEN 'Empty' WHEN brand.`BrandType` = \"General\" THEN 'General' WHEN brand.`BrandType` = \"Generic\" THEN 'Generic' WHEN brand.`BrandType` = \"Private\" THEN 'Private' END AS `BrandType`,\n      COUNT(o1.`o_key`) AS `nSKU`,\n      (\n        ROUND(\n          (\n            SUM(en.CompletenessPercentage) / COUNT(o1.`o_key`)\n          ),\n          3\n        )\n      ) AS `percentage`,\n      cat3.`description` AS `SIOP3`\n    FROM\n      object_1 o1\n      LEFT JOIN object_3 brand on brand.oo_id = o1.brandName\n      LEFT JOIN `object_localized_query_1_en` en ON `en`.`ooo_id` = `o1`.`o_id`\n      LEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3, 2, (LENGTH(o1.SIOPLevel3) -2))\n    WHERE\n      (\n        o1.`o_published` = 1\n        AND o1.siopFullCode LIKE '043000%'\n      ) GROUP BY\n      cat3.`description`,\n      brand.`BrandType`\n    ORDER BY\n      cat3.`description`\n  ) temp",
                "where" => "",
                "groupby" => "Group BY temp.BrandType,\ntemp.`SIOP3`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIOP3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel440-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel440-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel440-5"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel440-6"
            ]
        ],
        "niceName" => "Chart - Data Completeness - BrandType Filter",
        "group" => "PTG",
        "groupIconClass" => "",
        "iconClass" => "",
        "menuShortcut" => FALSE,
        "reportClass" => "",
        "chartType" => "bar",
        "pieColumn" => NULL,
        "pieLabelColumn" => NULL,
        "xAxis" => "SIOP3",
        "yAxis" => [
            "Completeness Percentage"
        ],
        "modificationDate" => 1625041855,
        "creationDate" => 1625040174,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGChartDataCompleteness-BrandFilter"
    ],
    "CS_NewProductsLastOneWeek" => [
        "name" => "CS_NewProductsLastOneWeek",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  o1.`oo_id` as `Id`,\n  o1.`Name`,\n  CASE WHEN o1.`o_path` = '/Contitech_ConveyorSolution/Products/' THEN 'LEVEL1' ELSE REPLACE(\n    o1.`o_path`,\n    '/Contitech_ConveyorSolution/Products/',\n    ''\n  ) END as `Hierarchy Level`,\n  FROM_UNIXTIME(o1.`o_creationDate`) as `Creation Date`,\n  CASE \nWHEN wf.`place` = 'open' THEN 'Open' \nWHEN wf.`place` = 'archived' THEN 'Archived' \nWHEN wf.`place` = 'enrich' THEN 'Enrich' \nWHEN wf.`place` = 'paused' THEN 'Paused' \nWHEN wf.`place` = 'published' THEN 'Published' \nWHEN wf.`place` = 'review_content' THEN 'Review Content' \nWHEN wf.`place` = 'accepted' THEN 'Accepted' \nWHEN wf.`place` = 'default' THEN 'Default' \nWHEN wf.`place` = 'in_process' THEN 'In Process' \nWHEN wf.`place` = 'in_rd_edit' THEN 'In R&D Edit' \nWHEN wf.`place` = 'in_publish' THEN 'In Publish' \nWHEN wf.`place` = 'in_marcom_edit' THEN 'In Marcom Edit' \nEND as `Status`\nFROM\n  object_localized_CSProducts_en o1\n  LEFT JOIN element_workflow_state wf on o1.`oo_id` = wf.`cid`\nWHERE\n  (\n    (\n      o1.`o_creationDate` > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 7 DAY))\n    )\n  )\nORDER BY\n  (o1.`o_creationDate`) DESC",
                "from" => "",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel709-1"
            ],
            [
                "name" => "Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel709-2"
            ],
            [
                "name" => "Hierarchy Level",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel709-3"
            ],
            [
                "name" => "Creation Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel709-4"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel709-5"
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
        "modificationDate" => 1644510029,
        "creationDate" => 1631861341,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "MarComCS",
            "ProductManagerCS",
            "ApplicationAdminCS"
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
                "id" => "extModel900-1"
            ],
            [
                "name" => "Hierarchy Level",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel900-2"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel900-3"
            ],
            [
                "name" => "Empty Fields",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel900-4"
            ],
            [
                "name" => "Modification Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel900-5"
            ],
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel900-6"
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
        "modificationDate" => 1644510151,
        "creationDate" => 1632124921,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "MarComCS",
            "ProductManagerCS",
            "ApplicationAdminCS"
        ],
        "id" => "CS_DataCompleteness"
    ],
    "CS_MissingAssetsOnProducts" => [
        "name" => "CS_MissingAssetsOnProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\noo_id As `Pimcore Id`,\nName,\nCorporateBrand As `Corporate Brand`,\nProductBrand As `Product Brand`,\n IF(object_localized_CSProducts_en.`LogoImage` IS NOT NULL, \"True\", \"False\") AS `Logo Image`,\n IF(object_localized_CSProducts_en.`fieldPhoto` IS NOT NULL, \"True\", \"False\") AS `Field Photo`,\n IF(object_localized_CSProducts_en.`productImage` IS NOT NULL, \"True\", \"False\") AS `Product Image`,\n IF(object_localized_CSProducts_en.`softwareImage` IS NOT NULL, \"True\", \"False\") AS `Software Image`,\n IF(object_localized_CSProducts_en.`applicationImage` IS NOT NULL, \"True\", \"False\") AS `Application Image`,\n IF(object_localized_CSProducts_en.`reportImage` IS NOT NULL, \"True\", \"False\") AS `Report Image`,\n IF(object_localized_CSProducts_en.`functionalityImage` IS NOT NULL, \"True\", \"False\") AS `Functionality Image`,\n IF(object_localized_CSProducts_en.`damageImage` IS NOT NULL, \"True\", \"False\") AS `Damage Image`,\n IF(object_localized_CSProducts_en.`deviationAngleForVerticalCurves` IS NOT NULL, \"True\", \"False\") AS `Deviation Angle For Vertical Curves`,\n IF(object_localized_CSProducts_en.`deviatioAngleForHorizontal` IS NOT NULL, \"True\", \"False\") AS `Deviation Angle For Horizontal`,\n IF(object_localized_CSProducts_en.`sidewallSizes` IS NOT NULL, \"True\", \"False\") AS `Sidewall Sizes`,\n IF(object_localized_CSProducts_en.`sidewallQualities` IS NOT NULL, \"True\", \"False\") AS `Sidewall Qualities`,\n IF(object_localized_CSProducts_en.`anglesofInclination` IS NOT NULL, \"True\", \"False\") AS `Angles of Inclination`,\n IF(object_localized_CSProducts_en.`increasingInclinationAngle` IS NOT NULL, \"True\", \"False\") AS `Increasing Inclination Angle`,\n IF(object_localized_CSProducts_en.`imageCrossSectionOfProducts` IS NOT NULL, \"True\", \"False\") AS `Image Cross Section Of Products`,\n IF(object_localized_CSProducts_en.`beltRollDiameters` IS NOT NULL, \"True\", \"False\") AS `Belt Roll Diameters`,\n IF(object_localized_CSProducts_en.`overviewImageofSystem` IS NOT NULL, \"True\", \"False\") AS `Overview Image of System`,\n IF(object_localized_CSProducts_en.`imageGallery__images` IS NOT NULL, \"True\", \"False\") AS `Image Gallery`,\n IF(object_localized_CSProducts_en.`systemAnimation` IS NOT NULL, \"True\", \"False\") AS `System Animation`,\n IF(object_localized_CSProducts_en.`systemVideo` IS NOT NULL, \"True\", \"False\") AS `System Video`,\n IF(object_localized_CSProducts_en.`productAnimation` IS NOT NULL, \"True\", \"False\") AS `Product Animation`,\n IF(object_localized_CSProducts_en.`documents` IS NOT NULL, \"True\", \"False\") AS `Documents`",
                "from" => "FROM object_localized_CSProducts_en",
                "where" => "WHERE \n LogoImage is null OR\n fieldPhoto is null OR\n productImage is null OR\n softwareImage is null OR\n applicationImage is null OR\n reportImage is null OR\n functionalityImage is null OR\n damageImage is null OR\n deviationAngleForVerticalCurves is null OR\n deviatioAngleForHorizontal is null OR\n sidewallSizes is null OR\n sidewallQualities is null OR\n anglesofInclination is null OR\n increasingInclinationAngle is null OR\n imageCrossSectionOfProducts is null OR\n beltRollDiameters is null OR\n overviewImageofSystem is null OR\n imageGallery__images is null OR\n systemAnimation is null OR\n systemVideo is null OR\n productAnimation is null OR\n documents is null",
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
                "id" => "extModel902-1"
            ],
            [
                "name" => "Corporate Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-2"
            ],
            [
                "name" => "Product Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-3"
            ],
            [
                "name" => "Logo Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-4"
            ],
            [
                "name" => "Field Photo",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-5"
            ],
            [
                "name" => "Product Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-6"
            ],
            [
                "name" => "Software Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-7"
            ],
            [
                "name" => "Application Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-8"
            ],
            [
                "name" => "Report Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-9"
            ],
            [
                "name" => "Functionality Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-10"
            ],
            [
                "name" => "Damage Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-11"
            ],
            [
                "name" => "Deviation Angle For Vertical Curves",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-12"
            ],
            [
                "name" => "Deviation Angle For Horizontal",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-13"
            ],
            [
                "name" => "Sidewall Sizes",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-14"
            ],
            [
                "name" => "Sidewall Qualities",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-15"
            ],
            [
                "name" => "Angles of Inclination",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-16"
            ],
            [
                "name" => "Image Cross Section Of Products",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-17"
            ],
            [
                "name" => "Increasing Inclination Angle",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-18"
            ],
            [
                "name" => "Belt Roll Diameters",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-19"
            ],
            [
                "name" => "Overview Image of System",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-20"
            ],
            [
                "name" => "Image Gallery",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-21"
            ],
            [
                "name" => "System Animation",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-22"
            ],
            [
                "name" => "System Video",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-23"
            ],
            [
                "name" => "Product Animation",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-24"
            ],
            [
                "name" => "Documents",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-25"
            ],
            [
                "name" => "Pimcore Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel902-26"
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
        "modificationDate" => 1641192223,
        "creationDate" => 1632215120,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "MarComCS",
            "ProductManagerCS",
            "ApplicationAdminCS"
        ],
        "id" => "CS_MissingAssetsOnProducts"
    ],
    "CS_TranslationsMissingProduct" => [
        "name" => "CS_TranslationsMissingProduct",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n\tobject_localized_CSProducts_en.oo_id As 'Pimcore Id',\n\tobject_localized_CSProducts_en.Name,\n\tobject_localized_CSProducts_en.CorporateBrand As 'Corporate Brand',\n\tobject_localized_CSProducts_en.productBrand As 'Product Brand',\n\tobject_localized_CSProducts_en.ProductDescription AS 'Product Description in English',\n\tobject_localized_CSProducts_en.ShortText AS 'Short Text in English',\n    object_localized_CSProducts_en.LongText AS 'Long Text in English',\n    object_localized_CSProducts_de.ProductDescription AS 'Product Description in German',\n\tobject_localized_CSProducts_de.ShortText AS 'Short Text in German',\n    object_localized_CSProducts_de.LongText AS 'Long Text in German',   \n    object_localized_CSProducts_fr.ProductDescription AS 'Product Description in French',\n\tobject_localized_CSProducts_fr.ShortText AS 'Short Text in French',\n    object_localized_CSProducts_fr.LongText AS 'Long Text in French',\n    object_localized_CSProducts_pt.ProductDescription AS 'Product Description in Portuguese (Brazil)',\n\tobject_localized_CSProducts_pt.ShortText AS 'Short Text in Portuguese (Brazil)',\n    object_localized_CSProducts_pt.LongText AS 'Long Text in Portuguese (Brazil)',\n    object_localized_CSProducts_zh.ProductDescription AS 'Product Description in Chinese',\n\tobject_localized_CSProducts_zh.ShortText AS 'Short Text in Chinese',\n    object_localized_CSProducts_zh.LongText AS 'Long Text in Chinese',\n    object_localized_CSProducts_es.ProductDescription AS 'Product Description in Spanish',\n\tobject_localized_CSProducts_es.ShortText AS 'Short Text in Spanish',\n    object_localized_CSProducts_es.LongText AS 'Long Text in Spanish'",
                "from" => "FROM object_localized_CSProducts_en\nINNER JOIN object_localized_CSProducts_de ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_de.oo_id\nINNER JOIN object_localized_CSProducts_fr ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_fr.oo_id\nINNER JOIN object_localized_CSProducts_pt ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_pt.oo_id\nINNER JOIN object_localized_CSProducts_zh ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_zh.oo_id\nINNER JOIN object_localized_CSProducts_es ON object_localized_CSProducts_en.oo_id = object_localized_CSProducts_es.oo_id",
                "where" => "WHERE\n\tobject_localized_CSProducts_en.ProductDescription is null OR\n\tobject_localized_CSProducts_en.ShortText is null OR\n    object_localized_CSProducts_en.LongText is null OR\n    object_localized_CSProducts_de.ProductDescription is null OR\n\tobject_localized_CSProducts_de.ShortText is null OR\n    object_localized_CSProducts_de.LongText is null OR\n    object_localized_CSProducts_fr.ProductDescription is null OR\n\tobject_localized_CSProducts_fr.ShortText is null OR\n    object_localized_CSProducts_fr.LongText is null OR\n    object_localized_CSProducts_pt.ProductDescription is null OR\n\tobject_localized_CSProducts_pt.ShortText is null OR\n    object_localized_CSProducts_pt.LongText is null OR\n    object_localized_CSProducts_zh.ProductDescription is null OR\n\tobject_localized_CSProducts_zh.ShortText is null OR\n    object_localized_CSProducts_zh.LongText is null OR\n    object_localized_CSProducts_es.ProductDescription is null OR\n\tobject_localized_CSProducts_es.ShortText is null OR\n    object_localized_CSProducts_es.LongText is null",
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
                "id" => "extModel902-1"
            ],
            [
                "name" => "Corporate Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-2"
            ],
            [
                "name" => "Product Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-3"
            ],
            [
                "name" => "Product Description in English",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-4"
            ],
            [
                "name" => "Short Text in English",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-5"
            ],
            [
                "name" => "Long Text in English",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-6"
            ],
            [
                "name" => "Product Description in German",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-7"
            ],
            [
                "name" => "Short Text in German",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-8"
            ],
            [
                "name" => "Long Text in German",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-9"
            ],
            [
                "name" => "Product Description in French",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-10"
            ],
            [
                "name" => "Short Text in French",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-11"
            ],
            [
                "name" => "Long Text in French",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-12"
            ],
            [
                "name" => "Product Description in Portuguese (Brazil)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-13"
            ],
            [
                "name" => "Short Text in Portuguese (Brazil)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-14"
            ],
            [
                "name" => "Long Text in Portuguese (Brazil)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-15"
            ],
            [
                "name" => "Product Description in Chinese",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-16"
            ],
            [
                "name" => "Short Text in Chinese",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-17"
            ],
            [
                "name" => "Long Text in Chinese",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-18"
            ],
            [
                "name" => "Product Description in Spanish",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-19"
            ],
            [
                "name" => "Short Text in Spanish",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-20"
            ],
            [
                "name" => "Long Text in Spanish",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel902-21"
            ],
            [
                "name" => "Pimcore Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel902-22"
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
        "modificationDate" => 1641192180,
        "creationDate" => 1632215295,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "MarComCS",
            "ProductManagerCS",
            "ApplicationAdminCS"
        ],
        "id" => "CS_TranslationsMissingProduct"
    ],
    "CS_ArchivedProducts" => [
        "name" => "CS_ArchivedProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  o1.`oo_id` as `Id`,\n  o1.`Name`,\n  o1.CorporateBrand As 'Corporate Brand',\n  o1.ProductBrand As 'Product Brand',\n  FROM_UNIXTIME(o1.`o_creationDate`) as `Creation Date`\nFROM\n  object_localized_CSProducts_en o1\n  LEFT JOIN element_workflow_state wf on o1.`oo_id` = wf.`cid` \n  where wf.place = 'archived' ORDER BY\n  (o1.`o_creationDate`) DESC",
                "from" => "",
                "where" => "",
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
        "modificationDate" => 1641192129,
        "creationDate" => 1632215479,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "MarComCS",
            "ProductManagerCS",
            "ApplicationAdminCS"
        ],
        "id" => "CS_ArchivedProducts"
    ],
    "CS_WorkflowReport" => [
        "name" => "CS_WorkflowReport",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\n  o1.`oo_id` as `Id`,\n  o1.`Name`,\n  CASE WHEN o1.`o_path` = '/Contitech_ConveyorSolution/Products/' THEN 'LEVEL1' ELSE REPLACE(\n    o1.`o_path`,\n    '/Contitech_ConveyorSolution/Products/',\n    ''\n  ) END as `Hierarchy Level`,\n  FROM_UNIXTIME(o1.`o_creationDate`) as `Creation Date`,\n  CASE \nWHEN wf.`place` = 'open' THEN 'Open' \nWHEN wf.`place` = 'archived' THEN 'Archived' \nWHEN wf.`place` = 'enrich' THEN 'Enrich' \nWHEN wf.`place` = 'paused' THEN 'Paused' \nWHEN wf.`place` = 'published' THEN 'Published' \nWHEN wf.`place` = 'review_content' THEN 'Review Content' \nWHEN wf.`place` = 'accepted' THEN 'Accepted' \nWHEN wf.`place` = 'default' THEN 'Default' \nWHEN wf.`place` = 'in_process' THEN 'In Process' \nWHEN wf.`place` = 'in_rd_edit' THEN 'In R&D Edit' \nWHEN wf.`place` = 'in_publish' THEN 'In Publish' \nWHEN wf.`place` = 'in_marcom_edit' THEN 'In Marcom Edit' \nEND as `Status`\nFROM\n  object_localized_CSProducts_en o1\n  LEFT JOIN element_workflow_state wf on o1.`oo_id` = wf.`cid` \nORDER BY\n  (o1.`o_creationDate`) DESC",
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
                "id" => "extModel1765-1"
            ],
            [
                "name" => "Hierarchy Level",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1765-2"
            ],
            [
                "name" => "Creation Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1765-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1765-4"
            ],
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel1765-5"
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
        "modificationDate" => 1641192091,
        "creationDate" => 1631861341,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "MarComCS",
            "ProductManagerCS",
            "ApplicationAdminCS"
        ],
        "id" => "CS_WorkflowReport"
    ],
    "DataCompletenessEmptyAttributes" => [
        "name" => "DataCompletenessEmptyAttributes",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \no1.`o_key` as `Key`,\no1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\nen.CompletenessPercentage \"COMPLETED (%)\",\nREPLACE( REPLACE( REPLACE(en.EmptyFields,'\\n\\t', ' '),'\\n', ' ' ),'->','|') 'Empty Fields',\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "(o1.`o_published` = 1) AND (en.`CompletenessPercentage` != '') AND (en.`EmptyFields` != '')",
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
                "id" => "extModel1497-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-5"
            ],
            [
                "name" => "Empty Fields",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1497-6"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-7"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-8"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-9"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-10"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-11"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-12"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1497-13"
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
                "id" => "extModel1497-14"
            ]
        ],
        "niceName" => "Data Completeness - Empty Attributes",
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
        "modificationDate" => 1643097180,
        "creationDate" => 1606822831,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "DataCompletenessEmptyAttributes"
    ],
    "PTGEU_ProductCompleteness" => [
        "name" => "PTGEU_ProductCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \no1.`o_key` as `Key`,\no1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\no1.`o_path` AS `Path`,\nen.`EmptyFields`as `Empty Fields`, \nen.CompletenessPercentage \"COMPLETED (%)\",\no1.`ProductType` AS `Product Type`,\n\no1.`o_id` as  `Id`\nFrom\nobject_38 o1 \nLEFT JOIN `object_localized_query_38_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\n\nWHERE\n    (o1.`o_published` =1) AND (en.`CompletenessPercentage`  != \"\")",
                "from" => "",
                "where" => "",
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
                "width" => "",
                "label" => "",
                "id" => "extModel314-2"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel314-3"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel314-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel314-5"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel314-6"
            ],
            [
                "name" => "Empty Fields",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel314-7"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel314-8"
            ],
            [
                "name" => "Path",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel314-9"
            ],
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel314-12",
                "columnAction" => "openObject"
            ]
        ],
        "niceName" => "PTGEU - Product Completeness",
        "group" => "PTG_EU",
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
        "modificationDate" => 1657196282,
        "creationDate" => 1654674916,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGEU_ProductCompleteness"
    ],
    "PTGEU_MissingAssetsOnProducts" => [
        "name" => "PTGEU_MissingAssetsOnProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "select  \no1.`oo_id` as ID, o1.`productName` as `Product Name`,\n IF(o1.`mainImage1` IS NOT NULL, \"True\", \"False\") AS `Main Image1`,\n IF(o1.`mainImage2` IS NOT NULL, \"True\", \"False\") AS `Main Image2`,\n IF(o1.`epixImage1` IS NOT NULL, \"True\", \"False\") AS `Epix Image1`,\n IF(o1.`epixImage2` IS NOT NULL, \"True\", \"False\") AS `Epix Image2`,\n IF(o1.`epixImage3` IS NOT NULL, \"True\", \"False\") AS `Epix Image3`,\n IF(o1.`epixImage4` IS NOT NULL, \"True\", \"False\") AS `Epix Image4`,\n IF(o1.`fullView1` IS NOT NULL, \"True\", \"False\") AS `Full View1`,\n IF(o1.`fullView2` IS NOT NULL, \"True\", \"False\") AS `Full View2`,\n IF(o1.`halfView1` IS NOT NULL, \"True\", \"False\") AS `Half View1`,\n IF(o1.`halfView2` IS NOT NULL, \"True\", \"False\") AS `Half View2`,\n IF(o1.`halfView3` IS NOT NULL, \"True\", \"False\") AS `Half View3`,\n IF(o1.`halfView4` IS NOT NULL, \"True\", \"False\") AS `Half View4`,\n IF(o1.`technicalDrawing1` IS NOT NULL, \"True\", \"False\") AS `Technical Drawing1`,\n IF(o1.`technicalDrawing2` IS NOT NULL, \"True\", \"False\") AS `Technical Drawing2`,\n IF(o1.`applicationImage1` IS NOT NULL, \"True\", \"False\") AS `Application Image1`,\n IF(o1.`applicationImage2` IS NOT NULL, \"True\", \"False\") AS `Application Image2`,\n IF(o1.`applicationImage3` IS NOT NULL, \"True\", \"False\") AS `Application Image3`,\n IF(o1.`applicationImage4` IS NOT NULL, \"True\", \"False\") AS `Application Image4`,\n IF(o1.`applicationImage5` IS NOT NULL, \"True\", \"False\") AS `Application Image5`,\n IF(o1.`applicationImage6` IS NOT NULL, \"True\", \"False\") AS `Application Image6`\n FROM object_38 o1 \n inner join object_39 o2 ON o1.`hierarchyLevel5` = CONCAT(',', o2.oo_id, ',')  \n WHERE o2.`Level` = 5 AND (o1.`hierarchyLevel6` IS NULL || o1.`hierarchyLevel6` = '') AND\n        (\n            o1.`mainImage1` IS NULL ||\n            o1.`mainImage2` IS NULL ||\n            o1.`epixImage1` IS NULL ||\n            o1.`epixImage2` IS NULL ||\n            o1.`epixImage3` IS NULL ||\n            o1.`epixImage4` IS NULL ||\n            o1.`fullView1` IS NULL ||\n            o1.`fullView2` IS NULL ||\n            o1.`halfView1` IS NULL ||\n            o1.`halfView2` IS NULL ||\n            o1.`halfView3` IS NULL ||\n            o1.`halfView4` IS NULL ||\n            o1.`technicalDrawing1` IS NULL ||\n            o1.`technicalDrawing2` IS NULL ||\n            o1.`applicationImage1` IS NULL ||\n            o1.`applicationImage2` IS NULL ||\n            o1.`applicationImage3` IS NULL ||\n            o1.`applicationImage4` IS NULL ||\n            o1.`applicationImage5` IS NULL ||\n            o1.`applicationImage6` IS NULL \n        )",
                "from" => "",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "ID",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel3044-1"
            ],
            [
                "name" => "Product Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-2"
            ],
            [
                "name" => "Main Image1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-3"
            ],
            [
                "name" => "Main Image2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-4"
            ],
            [
                "name" => "Epix Image1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-5"
            ],
            [
                "name" => "Epix Image2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-6"
            ],
            [
                "name" => "Epix Image3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-7"
            ],
            [
                "name" => "Epix Image4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-8"
            ],
            [
                "name" => "Full View1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-21"
            ],
            [
                "name" => "Full View2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-22"
            ],
            [
                "name" => "Half View1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-9"
            ],
            [
                "name" => "Half View2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-10"
            ],
            [
                "name" => "Half View3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-11"
            ],
            [
                "name" => "Half View4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-12"
            ],
            [
                "name" => "Technical Drawing1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-13"
            ],
            [
                "name" => "Technical Drawing2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-14"
            ],
            [
                "name" => "Application Image1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-15"
            ],
            [
                "name" => "Application Image2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-16"
            ],
            [
                "name" => "Application Image3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-17"
            ],
            [
                "name" => "Application Image4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-18"
            ],
            [
                "name" => "Application Image5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-19"
            ],
            [
                "name" => "Application Image6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3044-20"
            ]
        ],
        "niceName" => "PTGEU - Missing Assets On Products",
        "group" => "PTG_EU",
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
        "modificationDate" => 1666341212,
        "creationDate" => 1654688457,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGEU_MissingAssetsOnProducts"
    ],
    "PTGEU_PendingWorkFlowReport" => [
        "name" => "PTGEU_PendingWorkFlowReport",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\no1.`o_key` as `Key`,o1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\no1.`o_path` AS `Path`,\nn.title AS `Last Action Note`, \nCONCAT(DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)), ' DAYS') AS 'Pending Since',\nFROM_UNIXTIME(n.`date`) AS `Last Action Date`, \no1.`ProductType` AS `Product Type`,\nCASE \nWHEN wf.`place` = 'open' THEN 'Open' \nWHEN wf.`place` = 'archived' THEN 'Archived' \nWHEN wf.`place` = 'enrich' THEN 'Enrich' \nWHEN wf.`place` = 'paused' THEN 'Paused' \nWHEN wf.`place` = 'published' THEN 'Published' \nWHEN wf.`place` = 'review_content' THEN 'Review Content' \nWHEN wf.`place` = 'accepted' THEN 'Accepted' \nWHEN wf.`place` = 'default' THEN 'Default' \nWHEN wf.`place` = 'in_process' THEN 'In Process' \nWHEN wf.`place` = 'in_rd_edit' THEN 'In R&D Edit' \nWHEN wf.`place` = 'in_publish' THEN 'In Publish' \nWHEN wf.`place` = 'in_marcom_edit' THEN 'In Marcom Edit' \nWHEN wf.`place` = 'in_editor_edit' THEN 'In Editor Edit' \nWHEN wf.`place` = 'in_review' THEN 'In Product Manger Review' \nWHEN wf.`place` = 'published' THEN 'Published' \nWHEN wf.`place` = 'in_editor_edit_after_publish' THEN 'In Editor Edit' \nWHEN wf.`place` = 'in_marcom_edit_after_publish' THEN 'In Marcom Edit' \nWHEN wf.`place` = 'in_pm_review_after_publish' THEN 'In Product Manger Review' \nEND as `Status`,\no1.`o_id` as  `ID`\n\n\nFROM notes n\nINNER JOIN\n(\n    SELECT `cid`, MAX(id) AS noteId\n    FROM notes\n    GROUP BY `cid`\n) n1 ON n.`cid` = n1.`cid` AND n.id = n1.noteId\nLEFT JOIN object_38 o1 ON o1.oo_id = n.cid \nINNER JOIN object_39 o2 ON o1.`hierarchyLevel5` = CONCAT(',', o2.oo_id, ',')\nJOIN element_workflow_state wf ON wf.cid = n.cid \n\nLEFT JOIN `object_localized_query_1_en` `en` ON `en`.`ooo_id` = `o1`.`o_id` \n\nWHERE\n    (o2.`Level` = 5 AND (o1.`hierarchyLevel6` IS NULL || o1.`hierarchyLevel6` = ''))  \n    AND\n    (wf.`place` != 'published')\nORDER BY\n  (o1.`o_creationDate`) DESC",
                "from" => "",
                "where" => "",
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
                "width" => "",
                "label" => "",
                "id" => "extModel1719-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-4"
            ],
            [
                "name" => "Path",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-5"
            ],
            [
                "name" => "Last Action Note",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-6"
            ],
            [
                "name" => "Pending Since",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-7"
            ],
            [
                "name" => "Last Action Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-8"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-9"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-10"
            ],
            [
                "name" => "ID",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1719-11",
                "columnAction" => "openObject"
            ]
        ],
        "niceName" => "PTGEU - Pending Work Flow Report",
        "group" => "PTG_EU",
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
        "modificationDate" => 1657197420,
        "creationDate" => 1656506280,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGEU_PendingWorkFlowReport"
    ],
    "PTGEU_TranslationsMissingReport" => [
        "name" => "PTGEU_TranslationsMissingReport",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n\tobject_localized_38_en.oo_id As ' Id',\n\tobject_localized_38_en.ProductName,\n\tobject_localized_38_en.shortDescription As 'Short Description',\n    object_localized_38_en.longDescription As 'Long Description',\n    object_localized_38_en.CategoryDescriptionCatalog As 'Category Description Catalog',\n    object_localized_38_en.webDiscription As 'Web Description',\n    object_localized_38_en.searchKeywords As 'Search Keywords',\n    object_localized_38_en.legalText As 'Legal Text',\n    object_localized_38_en.sapDescription As 'SAP Description',\n\tobject_localized_38_de.shortDescription As 'Short Description (de)',\n    object_localized_38_de.longDescription As 'Long Description (de)',\n    object_localized_38_de.CategoryDescriptionCatalog As 'Category Description Catalog (de)',\n    object_localized_38_de.webDiscription As 'Web Description (de)',\n    object_localized_38_de.searchKeywords As 'Search Keywords (de)',\n    object_localized_38_de.legalText As 'Legal Text (de)',\n    object_localized_38_de.sapDescription As 'SAP Description (de)',\n    object_localized_38_ro_RO.shortDescription As 'Short Description (ro)',\n    object_localized_38_ro_RO.longDescription As 'Long Description (ro)',\n    object_localized_38_ro_RO.CategoryDescriptionCatalog As 'Category Description Catalog (ro)',\n    object_localized_38_ro_RO.webDiscription As 'Web Description (ro)',\n    object_localized_38_ro_RO.searchKeywords As 'Search Keywords (ro)',\n    object_localized_38_ro_RO.legalText As 'Legal Text (ro)',\n    object_localized_38_ro_RO.sapDescription As 'SAP Description (ro)',\n    object_localized_38_en_GB.shortDescription As 'Short Description (en UK)',\n    object_localized_38_en_GB.longDescription As 'Long Description (en UK)',\n    object_localized_38_en_GB.CategoryDescriptionCatalog As 'Category Description Catalog (en UK)',\n    object_localized_38_en_GB.webDiscription As 'Web Description (en UK)',\n    object_localized_38_en_GB.searchKeywords As 'Search Keywords (en UK)',\n    object_localized_38_en_GB.legalText As 'Legal Text (en UK)',\n    object_localized_38_en_GB.sapDescription As 'SAP Description (en UK)',\n    object_localized_38_it_IT.shortDescription As 'Short Description (it)',\n    object_localized_38_it_IT.longDescription As 'Long Description (it)',\n    object_localized_38_it_IT.CategoryDescriptionCatalog As 'Category Description Catalog (it)',\n    object_localized_38_it_IT.webDiscription As 'Web Description (it)',\n    object_localized_38_it_IT.searchKeywords As 'Search Keywords (it)',\n    object_localized_38_it_IT.legalText As 'Legal Text (it)',\n    object_localized_38_it_IT.sapDescription As 'SAP Description (it)',\n    object_localized_38_fr.shortDescription As 'Short Description (fr)',\n    object_localized_38_fr.longDescription As 'Long Description (fr)',\n    object_localized_38_fr.CategoryDescriptionCatalog As 'Category Description Catalog (fr)',\n    object_localized_38_fr.webDiscription As 'Web Description (fr)',\n    object_localized_38_fr.searchKeywords As 'Search Keywords (fr)',\n    object_localized_38_fr.legalText As 'Legal Text (fr)',\n    object_localized_38_fr.sapDescription As 'SAP Description (fr)',\n    object_localized_38_es.shortDescription As 'Short Description (es)',\n    object_localized_38_es.longDescription As 'Long Description (es)',\n    object_localized_38_es.CategoryDescriptionCatalog As 'Category Description Catalog (es)',\n    object_localized_38_es.webDiscription As 'Web Description (es)',\n    object_localized_38_es.searchKeywords As 'Search Keywords (es)',\n    object_localized_38_es.legalText As 'Legal Text (es)',\n    object_localized_38_es.sapDescription As 'SAP Description (es)',\n    object_localized_38_ru_RU.shortDescription As 'Short Description (ru)',\n    object_localized_38_ru_RU.longDescription As 'Long Description (ru)',\n    object_localized_38_ru_RU.CategoryDescriptionCatalog As 'Category Description Catalog (ru)',\n    object_localized_38_ru_RU.webDiscription As 'Web Description (ru)',\n    object_localized_38_ru_RU.searchKeywords As 'Search Keywords (ru)',\n    object_localized_38_ru_RU.legalText As 'Legal Text (ru)',\n    object_localized_38_ru_RU.sapDescription As 'SAP Description (ru)',\n    object_localized_38_zh.shortDescription As 'Short Description (zh)',\n    object_localized_38_zh.longDescription As 'Long Description (zh)',\n    object_localized_38_zh.CategoryDescriptionCatalog As 'Category Description Catalog (zh)',\n    object_localized_38_zh.webDiscription As 'Web Description (zh)',\n    object_localized_38_zh.searchKeywords As 'Search Keywords (zh)',\n    object_localized_38_zh.legalText As 'Legal Text (zh)',\n    object_localized_38_zh.sapDescription As 'SAP Description (zh)',\n    object_localized_38_pl_PL.shortDescription As 'Short Description (pl)',\n    object_localized_38_pl_PL.longDescription As 'Long Description (pl)',\n    object_localized_38_pl_PL.CategoryDescriptionCatalog As 'Category Description Catalog (pl)',\n    object_localized_38_pl_PL.webDiscription As 'Web Description (pl)',\n    object_localized_38_pl_PL.searchKeywords As 'Search Keywords (pl)',\n    object_localized_38_pl_PL.legalText As 'Legal Text (pl)',\n    object_localized_38_pl_PL.sapDescription As 'SAP Description (pl)'\n\n    FROM object_localized_38_en\n    INNER JOIN object_39 ON object_localized_38_en.`hierarchyLevel5` = CONCAT(',', object_39.oo_id, ',') \n    INNER JOIN object_localized_38_de ON object_localized_38_en.oo_id = object_localized_38_de.oo_id\n    INNER JOIN object_localized_38_ro_RO ON object_localized_38_en.oo_id = object_localized_38_ro_RO.oo_id\n    INNER JOIN object_localized_38_en_GB ON object_localized_38_en.oo_id = object_localized_38_en_GB.oo_id\n    INNER JOIN object_localized_38_it_IT ON object_localized_38_en.oo_id = object_localized_38_it_IT.oo_id\n    INNER JOIN object_localized_38_fr ON object_localized_38_en.oo_id = object_localized_38_fr.oo_id\n    INNER JOIN object_localized_38_es ON object_localized_38_en.oo_id = object_localized_38_es.oo_id\n    INNER JOIN object_localized_38_ru_RU ON object_localized_38_en.oo_id = object_localized_38_ru_RU.oo_id\n    INNER JOIN object_localized_38_zh ON object_localized_38_en.oo_id = object_localized_38_zh.oo_id\n    INNER JOIN object_localized_38_pl_PL ON object_localized_38_en.oo_id = object_localized_38_pl_PL.oo_id\n    \n    WHERE\n    (object_39.`Level` = 5 AND (object_localized_38_en.`hierarchyLevel6` IS NULL || object_localized_38_en.`hierarchyLevel6` = ''))\n    AND\n    (\n\tobject_localized_38_en.shortDescription is null OR\n\tobject_localized_38_en.longDescription is null OR\n    object_localized_38_en.CategoryDescriptionCatalog is null OR\n    object_localized_38_en.webDiscription is null OR\n\tobject_localized_38_en.searchKeywords is null OR\n    object_localized_38_en.legalText is null OR\n    object_localized_38_en.sapDescription is null OR\n    object_localized_38_de.shortDescription is null OR\n\tobject_localized_38_de.longDescription is null OR\n    object_localized_38_de.CategoryDescriptionCatalog is null OR\n    object_localized_38_de.webDiscription is null OR\n\tobject_localized_38_de.searchKeywords is null OR\n    object_localized_38_de.legalText is null OR\n    object_localized_38_de.sapDescription is null OR\n    object_localized_38_ro_RO.shortDescription is null OR\n\tobject_localized_38_ro_RO.longDescription is null OR\n    object_localized_38_ro_RO.CategoryDescriptionCatalog is null OR\n    object_localized_38_ro_RO.webDiscription is null OR\n\tobject_localized_38_ro_RO.searchKeywords is null OR\n    object_localized_38_ro_RO.legalText is null OR\n    object_localized_38_ro_RO.sapDescription is null OR\n    object_localized_38_en_GB.shortDescription is null OR\n\tobject_localized_38_en_GB.longDescription is null OR\n    object_localized_38_en_GB.CategoryDescriptionCatalog is null OR\n    object_localized_38_en_GB.webDiscription is null OR\n\tobject_localized_38_en_GB.searchKeywords is null OR\n    object_localized_38_en_GB.legalText is null OR\n    object_localized_38_en_GB.sapDescription is null OR\n    object_localized_38_it_IT.shortDescription is null OR\n\tobject_localized_38_it_IT.longDescription is null OR\n    object_localized_38_it_IT.CategoryDescriptionCatalog is null OR\n    object_localized_38_it_IT.webDiscription is null OR\n\tobject_localized_38_it_IT.searchKeywords is null OR\n    object_localized_38_it_IT.legalText is null OR\n    object_localized_38_it_IT.sapDescription is null OR\n    object_localized_38_fr.shortDescription is null OR\n\tobject_localized_38_fr.longDescription is null OR\n    object_localized_38_fr.CategoryDescriptionCatalog is null OR\n    object_localized_38_fr.webDiscription is null OR\n\tobject_localized_38_fr.searchKeywords is null OR\n    object_localized_38_fr.legalText is null OR\n    object_localized_38_fr.sapDescription is null OR\n    object_localized_38_es.shortDescription is null OR\n\tobject_localized_38_es.longDescription is null OR\n    object_localized_38_es.CategoryDescriptionCatalog is null OR\n    object_localized_38_es.webDiscription is null OR\n\tobject_localized_38_es.searchKeywords is null OR\n    object_localized_38_es.legalText is null OR\n    object_localized_38_es.sapDescription is null OR\n    object_localized_38_ru_RU.shortDescription is null OR\n\tobject_localized_38_ru_RU.longDescription is null OR\n    object_localized_38_ru_RU.CategoryDescriptionCatalog is null OR\n    object_localized_38_ru_RU.webDiscription is null OR\n\tobject_localized_38_ru_RU.searchKeywords is null OR\n    object_localized_38_ru_RU.legalText is null OR\n    object_localized_38_ru_RU.sapDescription is null OR\n    object_localized_38_zh.shortDescription is null OR\n\tobject_localized_38_zh.longDescription is null OR\n    object_localized_38_zh.CategoryDescriptionCatalog is null OR\n    object_localized_38_zh.webDiscription is null OR\n\tobject_localized_38_zh.searchKeywords is null OR\n    object_localized_38_zh.legalText is null OR\n    object_localized_38_zh.sapDescription is null OR\n    object_localized_38_pl_PL.shortDescription is null OR\n\tobject_localized_38_pl_PL.longDescription is null OR\n    object_localized_38_pl_PL.CategoryDescriptionCatalog is null OR\n    object_localized_38_pl_PL.webDiscription is null OR\n\tobject_localized_38_pl_PL.searchKeywords is null OR\n    object_localized_38_pl_PL.legalText is null OR\n    object_localized_38_pl_PL.sapDescription is null \n    )\n    ",
                "from" => "",
                "where" => "",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "ProductName",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-1"
            ],
            [
                "name" => "Short Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-2"
            ],
            [
                "name" => "Long Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-3"
            ],
            [
                "name" => "Category Description Catalog",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-4"
            ],
            [
                "name" => "Web Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-5"
            ],
            [
                "name" => "Search Keywords",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-6"
            ],
            [
                "name" => "Legal Text",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-7"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-8"
            ],
            [
                "name" => "Short Description (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-9"
            ],
            [
                "name" => "Long Description (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-10"
            ],
            [
                "name" => "Category Description Catalog (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-11"
            ],
            [
                "name" => "Web Description (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-12"
            ],
            [
                "name" => "Search Keywords (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-13"
            ],
            [
                "name" => "Legal Text (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-14"
            ],
            [
                "name" => "SAP Description (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-15"
            ],
            [
                "name" => "Short Description (ro)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-16"
            ],
            [
                "name" => "Long Description (ro)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-17"
            ],
            [
                "name" => "Category Description Catalog (ro)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-18"
            ],
            [
                "name" => "Web Description (ro)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-19"
            ],
            [
                "name" => "Search Keywords (ro)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-20"
            ],
            [
                "name" => "Legal Text (ro)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-21"
            ],
            [
                "name" => "SAP Description (ro)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-22"
            ],
            [
                "name" => "Short Description (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-23"
            ],
            [
                "name" => "Long Description (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-24"
            ],
            [
                "name" => "Category Description Catalog (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-25"
            ],
            [
                "name" => "Web Description (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-26"
            ],
            [
                "name" => "Search Keywords (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-27"
            ],
            [
                "name" => "Legal Text (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-28"
            ],
            [
                "name" => "SAP Description (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-29"
            ],
            [
                "name" => "Short Description (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-30"
            ],
            [
                "name" => "Long Description (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-31"
            ],
            [
                "name" => "Category Description Catalog (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-32"
            ],
            [
                "name" => "Web Description (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-33"
            ],
            [
                "name" => "Search Keywords (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-34"
            ],
            [
                "name" => "Legal Text (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-35"
            ],
            [
                "name" => "SAP Description (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-36"
            ],
            [
                "name" => "Short Description (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-37"
            ],
            [
                "name" => "Long Description (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-38"
            ],
            [
                "name" => "Category Description Catalog (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-39"
            ],
            [
                "name" => "Web Description (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-40"
            ],
            [
                "name" => "Search Keywords (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-41"
            ],
            [
                "name" => "Legal Text (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-42"
            ],
            [
                "name" => "SAP Description (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-43"
            ],
            [
                "name" => "Short Description (ru)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-44"
            ],
            [
                "name" => "Long Description (ru)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-45"
            ],
            [
                "name" => "Category Description Catalog (ru)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-46"
            ],
            [
                "name" => "Web Description (ru)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-47"
            ],
            [
                "name" => "Search Keywords (ru)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-48"
            ],
            [
                "name" => "Legal Text (ru)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-49"
            ],
            [
                "name" => "SAP Description (ru)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-50"
            ],
            [
                "name" => "Short Description (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-51"
            ],
            [
                "name" => "Long Description (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-52"
            ],
            [
                "name" => "Category Description Catalog (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-53"
            ],
            [
                "name" => "Web Description (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-54"
            ],
            [
                "name" => "Search Keywords (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-55"
            ],
            [
                "name" => "Legal Text (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-56"
            ],
            [
                "name" => "SAP Description (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-57"
            ],
            [
                "name" => "Short Description (pl)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-58"
            ],
            [
                "name" => "Long Description (pl)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-59"
            ],
            [
                "name" => "Category Description Catalog (pl)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-60"
            ],
            [
                "name" => "Web Description (pl)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-61"
            ],
            [
                "name" => "Search Keywords (pl)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-62"
            ],
            [
                "name" => "Legal Text (pl)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-63"
            ],
            [
                "name" => "SAP Description (pl)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-64"
            ],
            [
                "name" => "Short Description (en UK)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-65"
            ],
            [
                "name" => "Long Description (en UK)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-66"
            ],
            [
                "name" => "Category Description Catalog (en UK)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-67"
            ],
            [
                "name" => "Web Description (en UK)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-68"
            ],
            [
                "name" => "Search Keywords (en UK)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-69"
            ],
            [
                "name" => "Legal Text (en UK)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-70"
            ],
            [
                "name" => "SAP Description (en UK)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel321-71"
            ],
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel321-72"
            ]
        ],
        "niceName" => "PTGEU -  Translations Missing Report",
        "group" => "PTG_EU",
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
        "modificationDate" => 1657198834,
        "creationDate" => 1655290783,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "PTGEU_TranslationsMissingReport"
    ],
    "IFSEU_MissingAssetsOnProducts" => [
        "name" => "IFSEU_MissingAssetsOnProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\no1.`o_key` as `Key`,\n o1.`materialNumber` AS `Material Number`, \nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code` ,\nIF(o1.`mainImage` IS NOT NULL, \"True\", \"False\") AS `Main Image`, \nIF(o1.`frontView` IS NOT NULL, \"True\", \"False\") AS `Front View Image`,\nIF(o1.`sideView` IS NOT NULL, \"True\", \"False\") AS `Side View Image`,\nIF(o1.`cutView` IS NOT NULL, \"True\", \"False\") AS `Cut View Image`,\nIF(o1.`epixImage` IS NOT NULL, \"True\", \"False\") AS `Epix Image`,\nIF(o1.`altImage1` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 1`,\nIF(o1.`altImage2` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 2`,\nIF(o1.`altImage3` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 3`,\nIF(o1.`altImage4` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 4`,\nIF(o1.`altImage5` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 5`,\nIF(o1.`altImage6` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 6`,\nIF(o1.`altImage7` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 7`,\nIF(o1.`altImage8` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 8`,\nIF(o1.`certificationImage` IS NOT NULL, \"True\", \"False\") AS `Certification Image`,\nIF(o1.`TeaserImage` IS NOT NULL, \"True\", \"False\") AS `Teaser Image`,\nIF(o1.`Images360__images` IS NOT NULL, \"True\", \"False\") AS `Images 360`,\nIF(o1.`LeftPrintCatalogImage` IS NOT NULL, \"True\", \"False\") AS `Left Image`,\nIF(o1.`RightPrintCatalogImage` IS NOT NULL, \"True\", \"False\") AS `Right Image`,\nIF(o1.`DrawingPictureForCatalog` IS NOT NULL, \"True\", \"False\") AS `Drawing Picture`,\no1.`ProductType` AS `Product Type`,\no1.`o_id` AS `ID`",
                "from" => "FROM object_IFSEUProduct o1 \nLEFT JOIN `object_localized_IFSEUProduct_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_IFSEUCategory_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_IFSEUCategory_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_IFSEUCategory_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_IFSEUCategory_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_IFSEUCategory_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_IFSEUCategory_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2))\nLEFT JOIN object_localized_query_IFSEUCategory_en cat7 \n\tON cat7.ooo_id = SUBSTRING(o1.SIOPLevel7,2,(LENGTH(o1.SIOPLevel7) - 2))",
                "where" => "WHERE (\n\to1.`mainImage` IS NULL OR \n\to1.`frontView` IS NULL OR \n\to1.`sideView` IS NULL OR \n\to1.`cutView` IS NULL OR \n\to1.`epixImage` IS NULL OR \n\to1.`altImage1` IS NULL OR \n\to1.`altImage2` IS NULL OR \n\to1.`altImage3` IS NULL OR \n\to1.`altImage4` IS NULL OR \n\to1.`altImage5` IS NULL OR \n\to1.`altImage6` IS NULL OR \n\to1.`altImage7` IS NULL OR \n\to1.`altImage8` IS NULL OR \n\to1.`certificationImage` IS NULL OR\n\to1.`TeaserImage` IS NULL OR\n\to1.`Images360__images` IS NULL OR\n\to1.`LeftPrintCatalogImage` IS NULL OR\n\to1.`RightPrintCatalogImage` IS NULL OR\n\to1.`DrawingPictureForCatalog` IS NULL ) AND \n\t(o1.`o_published` =1)\t",
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
                "width" => "",
                "label" => "",
                "id" => "extModel2341-1"
            ],
            [
                "name" => "Material Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-4"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-5"
            ],
            [
                "name" => "Front View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-6"
            ],
            [
                "name" => "Side View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-7"
            ],
            [
                "name" => "Cut View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-8"
            ],
            [
                "name" => "Epix Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-9"
            ],
            [
                "name" => "Alternate Image 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-10"
            ],
            [
                "name" => "Alternate Image 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-11"
            ],
            [
                "name" => "Alternate Image 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-12"
            ],
            [
                "name" => "Alternate Image 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-13"
            ],
            [
                "name" => "Alternate Image 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-14"
            ],
            [
                "name" => "Alternate Image 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-15"
            ],
            [
                "name" => "Alternate Image 7",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-16"
            ],
            [
                "name" => "Alternate Image 8",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-17"
            ],
            [
                "name" => "Certification Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-18"
            ],
            [
                "name" => "Teaser Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-19"
            ],
            [
                "name" => "Images 360",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-20"
            ],
            [
                "name" => "Left Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-21"
            ],
            [
                "name" => "Right Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-22"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-23"
            ],
            [
                "name" => "Drawing Picture",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2341-24"
            ],
            [
                "name" => "ID",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel2341-25"
            ]
        ],
        "niceName" => "IFSEU - Missing Assets On Products",
        "group" => "IFS_EU",
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
        "modificationDate" => 1681289919,
        "creationDate" => 1674647902,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IFSEU_MissingAssetsOnProducts"
    ],
    "IFSEU_WorkflowPendingProducts" => [
        "name" => "IFSEU_WorkflowPendingProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\no1.`o_key` as `Key`,o1.`materialNumber` AS `Material Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\nCONCAT(DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)), ' DAYS') AS 'Pending Since',\nFROM_UNIXTIME(n.`date`) AS `Last Action Date`, \no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\ncat7.`description` AS `SIOP Level 7`,\n  CASE \nWHEN wf.`place` = 'open' THEN 'Open' \nWHEN wf.`place` = 'in_marcom_edit' THEN 'In Marcom Edit' \nWHEN wf.`place` = 'in_editor_edit' THEN 'In Editor Edit' \nWHEN wf.`place` = 'in_editor_edit_after_publish' THEN 'In Editor Edit'\nWHEN wf.`place` = 'in_marcom_edit_after_publish' THEN 'In Marcom Edit'\nWHEN wf.`place` = 'in_pm_review_after_publish' THEN 'In Product Manger Review'\nWHEN wf.`place` = 'published' THEN 'Published'\nEND as `Status`,\no1.`o_id`\nFROM notes n\nINNER JOIN\n(\n    SELECT `cid`, MAX(id) AS noteId\n    FROM notes\n    GROUP BY `cid`\n) n1 ON n.`cid` = n1.`cid` AND n.id = n1.noteId\nJOIN element_workflow_state wf ON wf.cid = n.cid \n  LEFT JOIN object_IFSEUProduct o1 ON o1.oo_id = n.cid \n  LEFT JOIN `object_localized_query_IFSEUProduct_en` `en` ON `en`.`ooo_id` = `o1`.`o_id` \n  LEFT JOIN object_localized_IFSEUProductCategory_en cat1 ON cat1.oo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2)) \n  LEFT JOIN object_localized_IFSEUProductCategory_en cat2 ON cat2.oo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2)) \n  LEFT JOIN object_localized_IFSEUProductCategory_en cat3 ON cat3.oo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) \n  LEFT JOIN object_localized_IFSEUProductCategory_en cat4 ON cat4.oo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2)) \n  LEFT JOIN object_localized_IFSEUProductCategory_en cat5 ON cat5.oo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2)) \n  LEFT JOIN object_localized_IFSEUProductCategory_en cat6 ON cat6.oo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2))\n  LEFT JOIN object_localized_IFSEUProductCategory_en cat7 ON cat7.oo_id = SUBSTRING(o1.SIOPLevel7,2,(LENGTH(o1.SIOPLevel7) - 2)) \nWHERE (o1.`o_published` =1)",
                "from" => "",
                "where" => "",
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
                "width" => "",
                "label" => "",
                "id" => "extModel470-1"
            ],
            [
                "name" => "Material Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-4"
            ],
            [
                "name" => "Pending Since",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-5"
            ],
            [
                "name" => "Last Action Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-6"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-7"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-8"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-9"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-10"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-11"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-12"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-13"
            ],
            [
                "name" => "SIOP Level 7",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-14"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel470-15"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel470-16"
            ]
        ],
        "niceName" => "IFSEU - WorkflowPendingProducts",
        "group" => "IFS_EU",
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
        "modificationDate" => 1681132196,
        "creationDate" => 1675054385,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IFSEU_WorkflowPendingProducts"
    ],
    "IFSEU_ProductCompleteness" => [
        "name" => "IFSEU_ProductCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \no1.`o_key` as `Key`,\no1.`materialNumber` AS `Material Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\no1.`o_path` AS `Path`,\nen.`EmptyFields`as `Empty Fields`, \nen.CompletenessPercentage \"COMPLETED (%)\",\no1.`ProductType` AS `Product Type`,\no1.`o_id` as  `Id`",
                "from" => "object_IFSEUProduct o1 \nLEFT JOIN `object_localized_data_IFSEUProduct` en \n\tON `en`.`ooo_id` = `o1`.`o_id`",
                "where" => "WHERE\n    (o1.`o_published` =1) AND (en.`CompletenessPercentage`  != \"\") AND (en.`language` LIKE 'en')",
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
                "width" => "",
                "label" => "",
                "id" => "extModel317-1"
            ],
            [
                "name" => "Material Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel317-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel317-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel317-4"
            ],
            [
                "name" => "Path",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel317-5"
            ],
            [
                "name" => "Empty Fields",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel317-6"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel317-7"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel317-8"
            ],
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel317-9"
            ]
        ],
        "niceName" => "IFSEU - ProductCompleteness",
        "group" => "IFS_EU",
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
        "modificationDate" => 1681132221,
        "creationDate" => 1675059262,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IFSEU_ProductCompleteness"
    ],
    "IFSEU_TranslationMissingReport" => [
        "name" => "IFSEU_TranslationMissingReport",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \nobject_localized_IFSEUProduct_en.oo_id As ' Id',\n\n     object_localized_IFSEUProduct_en.headlineWeb As 'HeadLine Web',\n     object_localized_IFSEUProduct_en.legalText As 'Legal Text',\n     object_localized_IFSEUProduct_en.BrandShortText1 As 'Brand Short Text 1',\n     object_localized_IFSEUProduct_en.BrandShortText2 As 'Brand Short Text 2',  \n     object_localized_IFSEUProduct_en.Marking2 As 'Marking2',\n     object_localized_IFSEUProduct_en.searchKeywords As 'Search Keywords',\n     object_localized_IFSEUProduct_en.commercialDescription As 'Commercial Description',\n     object_localized_IFSEUProduct_en.technicalDescription As 'Technical Description',\n     object_localized_IFSEUProduct_en.sapDescription As 'SAP Description',\n     object_localized_IFSEUProduct_en.shippingConditions As 'Shipping Conditions',\n     object_localized_IFSEUProduct_en.Conditions As 'Conditions',\n     object_localized_IFSEUProduct_en.manufacturingLength As 'Manufacturing Length', \n     object_localized_IFSEUProduct_en.minimumOrder As 'Minimum Order', \n     \n     object_localized_IFSEUProduct_de.headlineWeb As 'HeadLine Web (de)',\n     object_localized_IFSEUProduct_de.legalText As 'Legal Text (de)',\n     object_localized_IFSEUProduct_de.BrandShortText1 As 'Brand Short Text 1 (de)',\n     object_localized_IFSEUProduct_de.BrandShortText2 As 'Brand Short Text 2 (de)',  \n     object_localized_IFSEUProduct_de.Marking2 As 'Marking2 (de)',\n     object_localized_IFSEUProduct_de.searchKeywords As 'Search Keywords (de)',\n     object_localized_IFSEUProduct_de.commercialDescription As 'Commercial Description (de)',\n     object_localized_IFSEUProduct_de.technicalDescription As 'Technical Description (de)',\n     object_localized_IFSEUProduct_de.sapDescription As 'SAP Description (de)',\n     object_localized_IFSEUProduct_de.shippingConditions As 'Shipping Conditions (de)',\n     object_localized_IFSEUProduct_de.Conditions As 'Conditions (de)',\n     object_localized_IFSEUProduct_de.manufacturingLength As 'Manufacturing Length (de)', \n     object_localized_IFSEUProduct_de.minimumOrder As 'Minimum Order (de)', \n     \n     object_localized_IFSEUProduct_da.headlineWeb As 'HeadLine Web (da)',\n     object_localized_IFSEUProduct_da.legalText As 'Legal Text (da)',\n     object_localized_IFSEUProduct_da.BrandShortText1 As 'Brand Short Text 1 (da)',\n     object_localized_IFSEUProduct_da.BrandShortText2 As 'Brand Short Text 2 (da)',  \n     object_localized_IFSEUProduct_da.Marking2 As 'Marking2 (da)',\n     object_localized_IFSEUProduct_da.searchKeywords As 'Search Keywords (da)',\n     object_localized_IFSEUProduct_da.commercialDescription As 'Commercial Description (da)',\n     object_localized_IFSEUProduct_da.technicalDescription As 'Technical Description (da)',\n     object_localized_IFSEUProduct_da.sapDescription As 'SAP Description (da)',\n     object_localized_IFSEUProduct_da.shippingConditions As 'Shipping Conditions (da)',\n     object_localized_IFSEUProduct_da.Conditions As 'Conditions (da)',\n     object_localized_IFSEUProduct_da.manufacturingLength As 'Manufacturing Length (da)', \n     object_localized_IFSEUProduct_da.minimumOrder As 'Minimum Order (da)', \n   \n     object_localized_IFSEUProduct_es.headlineWeb As 'HeadLine Web (es)',\n     object_localized_IFSEUProduct_es.legalText As 'Legal Text (es)',\n     object_localized_IFSEUProduct_es.BrandShortText1 As 'Brand Short Text 1 (es)',\n     object_localized_IFSEUProduct_es.BrandShortText2 As 'Brand Short Text 2 (es)',  \n     object_localized_IFSEUProduct_es.Marking2 As 'Marking2 (es)',\n     object_localized_IFSEUProduct_es.searchKeywords As 'Search Keywords (es)',\n     object_localized_IFSEUProduct_es.commercialDescription As 'Commercial Description (es)',\n     object_localized_IFSEUProduct_es.technicalDescription As 'Technical Description (es)',\n     object_localized_IFSEUProduct_es.sapDescription As 'SAP Description (es)',\n     object_localized_IFSEUProduct_es.shippingConditions As 'Shipping Conditions (es)',\n     object_localized_IFSEUProduct_es.Conditions As 'Conditions (es)',\n     object_localized_IFSEUProduct_es.manufacturingLength As 'Manufacturing Length (es)', \n     object_localized_IFSEUProduct_es.minimumOrder As 'Minimum Order (es)', \n    \n     object_localized_IFSEUProduct_fr.headlineWeb As 'HeadLine Web (fr)',\n     object_localized_IFSEUProduct_fr.legalText As 'Legal Text (fr)',\n     object_localized_IFSEUProduct_fr.BrandShortText1 As 'Brand Short Text 1 (fr)',\n     object_localized_IFSEUProduct_fr.BrandShortText2 As 'Brand Short Text 2 (fr)',  \n     object_localized_IFSEUProduct_fr.Marking2 As 'Marking2 (fr)',\n     object_localized_IFSEUProduct_fr.searchKeywords As 'Search Keywords (fr)',\n     object_localized_IFSEUProduct_fr.commercialDescription As 'Commercial Description (fr)',\n     object_localized_IFSEUProduct_fr.technicalDescription As 'Technical Description (fr)',\n     object_localized_IFSEUProduct_fr.sapDescription As 'SAP Description (fr)',\n     object_localized_IFSEUProduct_fr.shippingConditions As 'Shipping Conditions (fr)',\n     object_localized_IFSEUProduct_fr.Conditions As 'Conditions (fr)',\n     object_localized_IFSEUProduct_fr.manufacturingLength As 'Manufacturing Length (fr)', \n     object_localized_IFSEUProduct_fr.minimumOrder As 'Minimum Order (fr)', \n     \n     object_localized_IFSEUProduct_it_IT.headlineWeb As 'HeadLine Web (it)',\n     object_localized_IFSEUProduct_it_IT.legalText As 'Legal Text (it)',\n     object_localized_IFSEUProduct_it_IT.BrandShortText1 As 'Brand Short Text 1 (it)',\n     object_localized_IFSEUProduct_it_IT.BrandShortText2 As 'Brand Short Text 2 (it)',  \n     object_localized_IFSEUProduct_it_IT.Marking2 As 'Marking2 (it)',\n     object_localized_IFSEUProduct_it_IT.searchKeywords As 'Search Keywords (it)',\n     object_localized_IFSEUProduct_it_IT.commercialDescription As 'Commercial Description (it)',\n     object_localized_IFSEUProduct_it_IT.technicalDescription As 'Technical Description (it)',\n     object_localized_IFSEUProduct_it_IT.sapDescription As 'SAP Description (it)',\n     object_localized_IFSEUProduct_it_IT.shippingConditions As 'Shipping Conditions (it)',\n     object_localized_IFSEUProduct_it_IT.Conditions As 'Conditions (it)',\n     object_localized_IFSEUProduct_it_IT.manufacturingLength As 'Manufacturing Length (it)', \n     object_localized_IFSEUProduct_it_IT.minimumOrder As 'Minimum Order (it)', \n     \n     object_localized_IFSEUProduct_pt.headlineWeb As 'HeadLine Web (pt)',\n     object_localized_IFSEUProduct_pt.legalText As 'Legal Text (pt)',\n     object_localized_IFSEUProduct_pt.BrandShortText1 As 'Brand Short Text 1 (pt)',\n     object_localized_IFSEUProduct_pt.BrandShortText2 As 'Brand Short Text 2 (pt)',  \n     object_localized_IFSEUProduct_pt.Marking2 As 'Marking2 (pt)',\n     object_localized_IFSEUProduct_pt.searchKeywords As 'Search Keywords (pt)',\n     object_localized_IFSEUProduct_pt.commercialDescription As 'Commercial Description (pt)',\n     object_localized_IFSEUProduct_pt.technicalDescription As 'Technical Description (pt)',\n     object_localized_IFSEUProduct_pt.sapDescription As 'SAP Description (pt)',\n     object_localized_IFSEUProduct_pt.shippingConditions As 'Shipping Conditions (pt)',\n     object_localized_IFSEUProduct_pt.Conditions As 'Conditions (pt)',\n     object_localized_IFSEUProduct_pt.manufacturingLength As 'Manufacturing Length (pt)', \n     object_localized_IFSEUProduct_pt.minimumOrder As 'Minimum Order (pt)', \n     \n     object_localized_IFSEUProduct_ru_RU.headlineWeb As 'HeadLine Web (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.legalText As 'Legal Text (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.BrandShortText1 As 'Brand Short Text 1 (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.BrandShortText2 As 'Brand Short Text 2 (ru_RU)',  \n     object_localized_IFSEUProduct_ru_RU.Marking2 As 'Marking2 (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.searchKeywords As 'Search Keywords (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.commercialDescription As 'Commercial Description (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.technicalDescription As 'Technical Description (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.sapDescription As 'SAP Description (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.shippingConditions As 'Shipping Conditions (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.Conditions As 'Conditions (ru_RU)',\n     object_localized_IFSEUProduct_ru_RU.manufacturingLength As 'Manufacturing Length (ru_RU)', \n     object_localized_IFSEUProduct_ru_RU.minimumOrder As 'Minimum Order (ru_RU)', \n     \n     object_localized_IFSEUProduct_zh.headlineWeb As 'HeadLine Web (zh)',\n     object_localized_IFSEUProduct_zh.legalText As 'Legal Text (zh)',\n     object_localized_IFSEUProduct_zh.BrandShortText1 As 'Brand Short Text 1 (zh)',\n     object_localized_IFSEUProduct_zh.BrandShortText2 As 'Brand Short Text 2 (zh)',  \n     object_localized_IFSEUProduct_zh.Marking2 As 'Marking2 (zh)',\n     object_localized_IFSEUProduct_zh.searchKeywords As 'Search Keywords (zh)',\n     object_localized_IFSEUProduct_zh.commercialDescription As 'Commercial Description (zh)',\n     object_localized_IFSEUProduct_zh.technicalDescription As 'Technical Description (zh)',\n     object_localized_IFSEUProduct_zh.sapDescription As 'SAP Description (zh)',\n     object_localized_IFSEUProduct_zh.shippingConditions As 'Shipping Conditions (zh)',\n     object_localized_IFSEUProduct_zh.Conditions As 'Conditions (zh)',\n     object_localized_IFSEUProduct_zh.manufacturingLength As 'Manufacturing Length (zh)', \n     object_localized_IFSEUProduct_zh.minimumOrder As 'Minimum Order (zh)', \n     \n     object_localized_IFSEUProduct_fi_FI.headlineWeb As 'HeadLine Web (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.legalText As 'Legal Text (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.BrandShortText1 As 'Brand Short Text 1 (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.BrandShortText2 As 'Brand Short Text 2 (fi_FI)',  \n     object_localized_IFSEUProduct_fi_FI.Marking2 As 'Marking2 (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.searchKeywords As 'Search Keywords (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.commercialDescription As 'Commercial Description (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.technicalDescription As 'Technical Description (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.sapDescription As 'SAP Description (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.shippingConditions As 'Shipping Conditions (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.Conditions As 'Conditions (fi_FI)',\n     object_localized_IFSEUProduct_fi_FI.manufacturingLength As 'Manufacturing Length (fi_FI)', \n     object_localized_IFSEUProduct_fi_FI.minimumOrder As 'Minimum Order (fi_FI)', \n     \n     object_localized_IFSEUProduct_nl_NL.headlineWeb As 'HeadLine Web (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.legalText As 'Legal Text (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.BrandShortText1 As 'Brand Short Text 1 (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.BrandShortText2 As 'Brand Short Text 2 (nl_NL)',  \n     object_localized_IFSEUProduct_nl_NL.Marking2 As 'Marking2 (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.searchKeywords As 'Search Keywords (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.commercialDescription As 'Commercial Description (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.technicalDescription As 'Technical Description (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.sapDescription As 'SAP Description (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.shippingConditions As 'Shipping Conditions (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.Conditions As 'Conditions (nl_NL)',\n     object_localized_IFSEUProduct_nl_NL.manufacturingLength As 'Manufacturing Length (nl_NL)', \n     object_localized_IFSEUProduct_nl_NL.minimumOrder As 'Minimum Order (nl_NL)', \n     \n     object_localized_IFSEUProduct_nn_NO.headlineWeb As 'HeadLine Web (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.legalText As 'Legal Text (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.BrandShortText1 As 'Brand Short Text 1 (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.BrandShortText2 As 'Brand Short Text 2 (nn_NO)',  \n     object_localized_IFSEUProduct_nn_NO.Marking2 As 'Marking2 (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.searchKeywords As 'Search Keywords (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.commercialDescription As 'Commercial Description (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.technicalDescription As 'Technical Description (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.sapDescription As 'SAP Description (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.shippingConditions As 'Shipping Conditions (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.Conditions As 'Conditions (nn_NO)',\n     object_localized_IFSEUProduct_nn_NO.manufacturingLength As 'Manufacturing Length (nn_NO)', \n     object_localized_IFSEUProduct_nn_NO.minimumOrder As 'Minimum Order (nn_NO)', \n     \n     object_localized_IFSEUProduct_pl_PL.headlineWeb As 'HeadLine Web (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.legalText As 'Legal Text (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.BrandShortText1 As 'Brand Short Text 1 (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.BrandShortText2 As 'Brand Short Text 2 (pl_PL)',  \n     object_localized_IFSEUProduct_pl_PL.Marking2 As 'Marking2 (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.searchKeywords As 'Search Keywords (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.commercialDescription As 'Commercial Description (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.technicalDescription As 'Technical Description (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.sapDescription As 'SAP Description (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.shippingConditions As 'Shipping Conditions (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.Conditions As 'Conditions (pl_PL)',\n     object_localized_IFSEUProduct_pl_PL.manufacturingLength As 'Manufacturing Length (pl_PL)', \n     object_localized_IFSEUProduct_pl_PL.minimumOrder As 'Minimum Order (pl_PL)', \n     \n     object_localized_IFSEUProduct_sv_SE.headlineWeb As 'HeadLine Web  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.legalText As 'Legal Text  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.BrandShortText1 As 'Brand Short Text 1  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.BrandShortText2 As 'Brand Short Text 2  (sv_SE)',  \n     object_localized_IFSEUProduct_sv_SE.Marking2 As 'Marking2  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.searchKeywords As 'Search Keywords  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.commercialDescription As 'Commercial Description  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.technicalDescription As 'Technical Description  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.sapDescription As 'SAP Description  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.shippingConditions As 'Shipping Conditions  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.Conditions As 'Conditions  (sv_SE)',\n     object_localized_IFSEUProduct_sv_SE.manufacturingLength As 'Manufacturing Length  (sv_SE)', \n     object_localized_IFSEUProduct_sv_SE.minimumOrder As 'Minimum Order  (sv_SE)', \n     \n     object_localized_IFSEUProduct_en_GB.headlineWeb As 'HeadLine Web  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.legalText As 'Legal Text  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.BrandShortText1 As 'Brand Short Text 1  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.BrandShortText2 As 'Brand Short Text 2  (en_GB)',  \n     object_localized_IFSEUProduct_en_GB.Marking2 As 'Marking2  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.searchKeywords As 'Search Keywords  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.commercialDescription As 'Commercial Description  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.technicalDescription As 'Technical Description  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.sapDescription As 'SAP Description  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.shippingConditions As 'Shipping Conditions  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.Conditions As 'Conditions  (en_GB)',\n     object_localized_IFSEUProduct_en_GB.manufacturingLength As 'Manufacturing Length  (en_GB)', \n     object_localized_IFSEUProduct_en_GB.minimumOrder As 'Minimum Order  (en_GB)'",
                "from" => "FROM  object_localized_IFSEUProduct_en\n    INNER JOIN  object_localized_IFSEUProduct_de ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_de.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_da ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_da.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_es ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_es.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_fr ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_fr.oo_id  \n    INNER JOIN  object_localized_IFSEUProduct_it_IT ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_it_IT.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_pt ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_pt.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_ru_RU ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_ru_RU.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_zh ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_zh.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_fi_FI ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_fi_FI.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_nl_NL ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_nl_NL.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_nn_NO ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_nn_NO.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_pl_PL ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_pl_PL.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_sv_SE ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_sv_SE.oo_id\n    INNER JOIN  object_localized_IFSEUProduct_en_GB ON  object_localized_IFSEUProduct_en.oo_id =  object_localized_IFSEUProduct_en_GB.oo_id",
                "where" => "WHERE\n    (\n\t \n    object_localized_IFSEUProduct_en.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_en.legalText is null OR\n     object_localized_IFSEUProduct_en.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_en.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_en.Marking2 is null OR \n     object_localized_IFSEUProduct_en.searchKeywords is null OR \n     object_localized_IFSEUProduct_en.commercialDescription is null OR \n     object_localized_IFSEUProduct_en.technicalDescription is null OR \n     object_localized_IFSEUProduct_en.sapDescription is null OR \n     object_localized_IFSEUProduct_en.shippingConditions is null OR \n     object_localized_IFSEUProduct_en.Conditions is null OR \n     object_localized_IFSEUProduct_en.manufacturingLength is null OR \n     object_localized_IFSEUProduct_en.minimumOrder is null OR \n     \n     object_localized_IFSEUProduct_de.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_de.legalText is null OR\n     object_localized_IFSEUProduct_de.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_de.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_de.Marking2 is null OR \n     object_localized_IFSEUProduct_de.searchKeywords is null OR \n     object_localized_IFSEUProduct_de.commercialDescription is null OR \n     object_localized_IFSEUProduct_de.technicalDescription is null OR \n     object_localized_IFSEUProduct_de.sapDescription is null OR \n     object_localized_IFSEUProduct_de.shippingConditions is null OR \n     object_localized_IFSEUProduct_de.Conditions is null OR \n     object_localized_IFSEUProduct_de.manufacturingLength is null OR \n     object_localized_IFSEUProduct_de.minimumOrder is null OR \n    \n     object_localized_IFSEUProduct_da.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_da.legalText is null OR\n     object_localized_IFSEUProduct_da.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_da.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_da.Marking2 is null OR \n     object_localized_IFSEUProduct_da.searchKeywords is null OR \n     object_localized_IFSEUProduct_da.commercialDescription is null OR \n     object_localized_IFSEUProduct_da.technicalDescription is null OR \n     object_localized_IFSEUProduct_da.sapDescription is null OR \n     object_localized_IFSEUProduct_da.shippingConditions is null OR \n     object_localized_IFSEUProduct_da.Conditions is null OR \n     object_localized_IFSEUProduct_da.manufacturingLength is null OR \n     object_localized_IFSEUProduct_da.minimumOrder is null OR \n    \n     object_localized_IFSEUProduct_es.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_es.legalText is null OR\n     object_localized_IFSEUProduct_es.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_es.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_es.Marking2 is null OR \n     object_localized_IFSEUProduct_es.searchKeywords is null OR \n     object_localized_IFSEUProduct_es.commercialDescription is null OR \n     object_localized_IFSEUProduct_es.technicalDescription is null OR \n     object_localized_IFSEUProduct_es.sapDescription is null OR \n     object_localized_IFSEUProduct_es.shippingConditions is null OR \n     object_localized_IFSEUProduct_es.Conditions is null OR \n     object_localized_IFSEUProduct_es.manufacturingLength is null OR \n     object_localized_IFSEUProduct_es.minimumOrder is null OR \n     \n     object_localized_IFSEUProduct_fr.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_fr.legalText is null OR\n     object_localized_IFSEUProduct_fr.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_fr.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_fr.Marking2 is null OR \n     object_localized_IFSEUProduct_fr.searchKeywords is null OR \n     object_localized_IFSEUProduct_fr.commercialDescription is null OR \n     object_localized_IFSEUProduct_fr.technicalDescription is null OR \n     object_localized_IFSEUProduct_fr.sapDescription is null OR \n     object_localized_IFSEUProduct_fr.shippingConditions is null OR \n     object_localized_IFSEUProduct_fr.Conditions is null OR \n     object_localized_IFSEUProduct_fr.manufacturingLength is null OR \n     object_localized_IFSEUProduct_fr.minimumOrder is null OR \n     \n     object_localized_IFSEUProduct_it_IT.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_it_IT.legalText is null OR\n     object_localized_IFSEUProduct_it_IT.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_it_IT.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_it_IT.Marking2 is null OR \n     object_localized_IFSEUProduct_it_IT.searchKeywords is null OR \n     object_localized_IFSEUProduct_it_IT.commercialDescription is null OR \n     object_localized_IFSEUProduct_it_IT.technicalDescription is null OR \n     object_localized_IFSEUProduct_it_IT.sapDescription is null OR \n     object_localized_IFSEUProduct_it_IT.shippingConditions is null OR \n     object_localized_IFSEUProduct_it_IT.Conditions is null OR \n     object_localized_IFSEUProduct_it_IT.manufacturingLength is null OR \n     object_localized_IFSEUProduct_it_IT.minimumOrder is null OR \n    \n     object_localized_IFSEUProduct_pt.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_pt.legalText is null OR\n     object_localized_IFSEUProduct_pt.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_pt.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_pt.Marking2 is null OR \n     object_localized_IFSEUProduct_pt.searchKeywords is null OR \n     object_localized_IFSEUProduct_pt.commercialDescription is null OR \n     object_localized_IFSEUProduct_pt.technicalDescription is null OR \n     object_localized_IFSEUProduct_pt.sapDescription is null OR \n     object_localized_IFSEUProduct_pt.shippingConditions is null OR \n     object_localized_IFSEUProduct_pt.Conditions is null OR \n     object_localized_IFSEUProduct_pt.manufacturingLength is null OR \n     object_localized_IFSEUProduct_pt.minimumOrder is null OR \n     \n     object_localized_IFSEUProduct_ru_RU.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_ru_RU.legalText is null OR\n     object_localized_IFSEUProduct_ru_RU.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_ru_RU.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_ru_RU.Marking2 is null OR \n     object_localized_IFSEUProduct_ru_RU.searchKeywords is null OR \n     object_localized_IFSEUProduct_ru_RU.commercialDescription is null OR \n     object_localized_IFSEUProduct_ru_RU.technicalDescription is null OR \n     object_localized_IFSEUProduct_ru_RU.sapDescription is null OR \n     object_localized_IFSEUProduct_ru_RU.shippingConditions is null OR \n     object_localized_IFSEUProduct_ru_RU.Conditions is null OR \n     object_localized_IFSEUProduct_ru_RU.manufacturingLength is null OR \n     object_localized_IFSEUProduct_ru_RU.minimumOrder is null OR \n    \n     object_localized_IFSEUProduct_zh.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_zh.legalText is null OR\n     object_localized_IFSEUProduct_zh.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_zh.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_zh.Marking2 is null OR \n     object_localized_IFSEUProduct_zh.searchKeywords is null OR \n     object_localized_IFSEUProduct_zh.commercialDescription is null OR \n     object_localized_IFSEUProduct_zh.technicalDescription is null OR \n     object_localized_IFSEUProduct_zh.sapDescription is null OR \n     object_localized_IFSEUProduct_zh.shippingConditions is null OR \n     object_localized_IFSEUProduct_zh.Conditions is null OR \n     object_localized_IFSEUProduct_zh.manufacturingLength is null OR \n     object_localized_IFSEUProduct_zh.minimumOrder is null OR \n\n     object_localized_IFSEUProduct_fi_FI.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_fi_FI.legalText is null OR\n     object_localized_IFSEUProduct_fi_FI.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_fi_FI.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_fi_FI.Marking2 is null OR \n     object_localized_IFSEUProduct_fi_FI.searchKeywords is null OR \n     object_localized_IFSEUProduct_fi_FI.commercialDescription is null OR \n     object_localized_IFSEUProduct_fi_FI.technicalDescription is null OR \n     object_localized_IFSEUProduct_fi_FI.sapDescription is null OR \n     object_localized_IFSEUProduct_fi_FI.shippingConditions is null OR \n     object_localized_IFSEUProduct_fi_FI.Conditions is null OR \n     object_localized_IFSEUProduct_fi_FI.manufacturingLength is null OR \n     object_localized_IFSEUProduct_fi_FI.minimumOrder is null OR \n     \n     object_localized_IFSEUProduct_nl_NL.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_nl_NL.legalText is null OR\n     object_localized_IFSEUProduct_nl_NL.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_nl_NL.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_nl_NL.Marking2 is null OR \n     object_localized_IFSEUProduct_nl_NL.searchKeywords is null OR \n     object_localized_IFSEUProduct_nl_NL.commercialDescription is null OR \n     object_localized_IFSEUProduct_nl_NL.technicalDescription is null OR \n     object_localized_IFSEUProduct_nl_NL.sapDescription is null OR \n     object_localized_IFSEUProduct_nl_NL.shippingConditions is null OR \n     object_localized_IFSEUProduct_nl_NL.Conditions is null OR \n     object_localized_IFSEUProduct_nl_NL.manufacturingLength is null OR \n     object_localized_IFSEUProduct_nl_NL.minimumOrder is null OR \n    \n     object_localized_IFSEUProduct_nn_NO.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_nn_NO.legalText is null OR\n     object_localized_IFSEUProduct_nn_NO.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_nn_NO.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_nn_NO.Marking2 is null OR \n     object_localized_IFSEUProduct_nn_NO.searchKeywords is null OR \n     object_localized_IFSEUProduct_nn_NO.commercialDescription is null OR \n     object_localized_IFSEUProduct_nn_NO.technicalDescription is null OR \n     object_localized_IFSEUProduct_nn_NO.sapDescription is null OR \n     object_localized_IFSEUProduct_nn_NO.shippingConditions is null OR \n     object_localized_IFSEUProduct_nn_NO.Conditions is null OR \n     object_localized_IFSEUProduct_nn_NO.manufacturingLength is null OR \n     object_localized_IFSEUProduct_nn_NO.minimumOrder is null OR \n    \n     object_localized_IFSEUProduct_pl_PL.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_pl_PL.legalText is null OR\n     object_localized_IFSEUProduct_pl_PL.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_pl_PL.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_pl_PL.Marking2 is null OR \n     object_localized_IFSEUProduct_pl_PL.searchKeywords is null OR \n     object_localized_IFSEUProduct_pl_PL.commercialDescription is null OR \n     object_localized_IFSEUProduct_pl_PL.technicalDescription is null OR \n     object_localized_IFSEUProduct_pl_PL.sapDescription is null OR \n     object_localized_IFSEUProduct_pl_PL.shippingConditions is null OR \n     object_localized_IFSEUProduct_pl_PL.Conditions is null OR \n     object_localized_IFSEUProduct_pl_PL.manufacturingLength is null OR \n     object_localized_IFSEUProduct_pl_PL.minimumOrder is null OR \n     \n     object_localized_IFSEUProduct_sv_SE.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_sv_SE.legalText is null OR\n     object_localized_IFSEUProduct_sv_SE.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_sv_SE.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_sv_SE.Marking2 is null OR \n     object_localized_IFSEUProduct_sv_SE.searchKeywords is null OR \n     object_localized_IFSEUProduct_sv_SE.commercialDescription is null OR \n     object_localized_IFSEUProduct_sv_SE.technicalDescription is null OR \n     object_localized_IFSEUProduct_sv_SE.sapDescription is null OR \n     object_localized_IFSEUProduct_sv_SE.shippingConditions is null OR \n     object_localized_IFSEUProduct_sv_SE.Conditions is null OR \n     object_localized_IFSEUProduct_sv_SE.manufacturingLength is null OR \n     object_localized_IFSEUProduct_sv_SE.minimumOrder is null OR \n    \n     object_localized_IFSEUProduct_en_GB.headlineWeb is null OR\n\t   object_localized_IFSEUProduct_en_GB.legalText is null OR\n     object_localized_IFSEUProduct_en_GB.BrandShortText1 is null OR\n     object_localized_IFSEUProduct_en_GB.BrandShortText2 is null OR \n     object_localized_IFSEUProduct_en_GB.Marking2 is null OR \n     object_localized_IFSEUProduct_en_GB.searchKeywords is null OR \n     object_localized_IFSEUProduct_en_GB.commercialDescription is null OR \n     object_localized_IFSEUProduct_en_GB.technicalDescription is null OR \n     object_localized_IFSEUProduct_en_GB.sapDescription is null OR \n     object_localized_IFSEUProduct_en_GB.shippingConditions is null OR \n     object_localized_IFSEUProduct_en_GB.Conditions is null OR \n     object_localized_IFSEUProduct_en_GB.manufacturingLength is null OR \n     object_localized_IFSEUProduct_en_GB.minimumOrder is null\n    )",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel3459-1"
            ],
            [
                "name" => "Legal Text",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-2"
            ],
            [
                "name" => "Brand Short Text 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-3"
            ],
            [
                "name" => "Brand Short Text 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-4"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-5"
            ],
            [
                "name" => "Legal Text (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-6"
            ],
            [
                "name" => "Brand Short Text 1 (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-7"
            ],
            [
                "name" => "Brand Short Text 2 (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-8"
            ],
            [
                "name" => "SAP Description (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-9"
            ],
            [
                "name" => "Legal Text (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-10"
            ],
            [
                "name" => "Brand Short Text 1 (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-11"
            ],
            [
                "name" => "Brand Short Text 2 (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-12"
            ],
            [
                "name" => "SAP Description (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-13"
            ],
            [
                "name" => "Legal Text (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-14"
            ],
            [
                "name" => "Brand Short Text 1 (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-15"
            ],
            [
                "name" => "Brand Short Text 2 (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-16"
            ],
            [
                "name" => "SAP Description (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-17"
            ],
            [
                "name" => "Legal Text (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-18"
            ],
            [
                "name" => "Brand Short Text 1 (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-19"
            ],
            [
                "name" => "Brand Short Text 2 (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-20"
            ],
            [
                "name" => "SAP Description (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-21"
            ],
            [
                "name" => "Legal Text (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-22"
            ],
            [
                "name" => "Brand Short Text 1 (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-23"
            ],
            [
                "name" => "Brand Short Text 2 (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-24"
            ],
            [
                "name" => "SAP Description (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-25"
            ],
            [
                "name" => "Brand Short Text 1 (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-26"
            ],
            [
                "name" => "Brand Short Text 2 (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-27"
            ],
            [
                "name" => "SAP Description (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-28"
            ],
            [
                "name" => "HeadLine Web",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-29"
            ],
            [
                "name" => "Marking2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-30"
            ],
            [
                "name" => "Search Keywords",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-31"
            ],
            [
                "name" => "Commercial Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-32"
            ],
            [
                "name" => "Technical Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-33"
            ],
            [
                "name" => "Shipping Conditions",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-34"
            ],
            [
                "name" => "Conditions",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-35"
            ],
            [
                "name" => "Manufacturing Length",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-36"
            ],
            [
                "name" => "Minimum Order",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-37"
            ],
            [
                "name" => "HeadLine Web (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-38"
            ],
            [
                "name" => "Marking2 (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-39"
            ],
            [
                "name" => "Search Keywords (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-40"
            ],
            [
                "name" => "Commercial Description (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-41"
            ],
            [
                "name" => "Technical Description (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-42"
            ],
            [
                "name" => "Shipping Conditions (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-43"
            ],
            [
                "name" => "Conditions (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-44"
            ],
            [
                "name" => "Manufacturing Length (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-45"
            ],
            [
                "name" => "Minimum Order (de)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-46"
            ],
            [
                "name" => "HeadLine Web (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-47"
            ],
            [
                "name" => "Legal Text (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-48"
            ],
            [
                "name" => "Brand Short Text 1 (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-49"
            ],
            [
                "name" => "Brand Short Text 2 (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-50"
            ],
            [
                "name" => "Marking2 (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-51"
            ],
            [
                "name" => "Search Keywords (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-52"
            ],
            [
                "name" => "Commercial Description (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-53"
            ],
            [
                "name" => "Technical Description (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-54"
            ],
            [
                "name" => "SAP Description (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-55"
            ],
            [
                "name" => "Shipping Conditions (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-56"
            ],
            [
                "name" => "Conditions (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-57"
            ],
            [
                "name" => "Manufacturing Length (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-58"
            ],
            [
                "name" => "Minimum Order (da)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-59"
            ],
            [
                "name" => "HeadLine Web (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-60"
            ],
            [
                "name" => "Marking2 (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-61"
            ],
            [
                "name" => "Search Keywords (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-62"
            ],
            [
                "name" => "Commercial Description (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-63"
            ],
            [
                "name" => "Technical Description (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-64"
            ],
            [
                "name" => "Shipping Conditions (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-65"
            ],
            [
                "name" => "Conditions (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-66"
            ],
            [
                "name" => "Manufacturing Length (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-67"
            ],
            [
                "name" => "Minimum Order (es)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-68"
            ],
            [
                "name" => "HeadLine Web (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-69"
            ],
            [
                "name" => "Marking2 (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-70"
            ],
            [
                "name" => "Search Keywords (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-71"
            ],
            [
                "name" => "Commercial Description (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-72"
            ],
            [
                "name" => "Technical Description (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-73"
            ],
            [
                "name" => "Shipping Conditions (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-74"
            ],
            [
                "name" => "Conditions (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-75"
            ],
            [
                "name" => "Manufacturing Length (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-76"
            ],
            [
                "name" => "Minimum Order (fr)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-77"
            ],
            [
                "name" => "HeadLine Web (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-78"
            ],
            [
                "name" => "Marking2 (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-79"
            ],
            [
                "name" => "Search Keywords (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-80"
            ],
            [
                "name" => "Commercial Description (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-81"
            ],
            [
                "name" => "Technical Description (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-82"
            ],
            [
                "name" => "Shipping Conditions (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-83"
            ],
            [
                "name" => "Conditions (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-84"
            ],
            [
                "name" => "Manufacturing Length (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-85"
            ],
            [
                "name" => "Minimum Order (it)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-86"
            ],
            [
                "name" => "HeadLine Web (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-87"
            ],
            [
                "name" => "Legal Text (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-88"
            ],
            [
                "name" => "Marking2 (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-89"
            ],
            [
                "name" => "Search Keywords (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-90"
            ],
            [
                "name" => "Commercial Description (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-91"
            ],
            [
                "name" => "Technical Description (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-92"
            ],
            [
                "name" => "Shipping Conditions (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-93"
            ],
            [
                "name" => "Conditions (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-94"
            ],
            [
                "name" => "Manufacturing Length (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-95"
            ],
            [
                "name" => "Minimum Order (pt)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-96"
            ],
            [
                "name" => "HeadLine Web (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-97"
            ],
            [
                "name" => "Legal Text (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-98"
            ],
            [
                "name" => "Brand Short Text 1 (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-99"
            ],
            [
                "name" => "Brand Short Text 2 (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-100"
            ],
            [
                "name" => "Marking2 (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-101"
            ],
            [
                "name" => "Search Keywords (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-102"
            ],
            [
                "name" => "Commercial Description (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-103"
            ],
            [
                "name" => "Technical Description (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-104"
            ],
            [
                "name" => "SAP Description (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-105"
            ],
            [
                "name" => "Shipping Conditions (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-106"
            ],
            [
                "name" => "Conditions (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-107"
            ],
            [
                "name" => "Manufacturing Length (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-108"
            ],
            [
                "name" => "Minimum Order (ru_RU)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-109"
            ],
            [
                "name" => "HeadLine Web (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-110"
            ],
            [
                "name" => "Marking2 (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-111"
            ],
            [
                "name" => "Search Keywords (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-112"
            ],
            [
                "name" => "Commercial Description (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-113"
            ],
            [
                "name" => "Technical Description (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-114"
            ],
            [
                "name" => "Shipping Conditions (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-115"
            ],
            [
                "name" => "Conditions (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-116"
            ],
            [
                "name" => "Manufacturing Length (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-117"
            ],
            [
                "name" => "Minimum Order (zh)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-118"
            ],
            [
                "name" => "HeadLine Web (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-119"
            ],
            [
                "name" => "Legal Text (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-120"
            ],
            [
                "name" => "Brand Short Text 1 (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-121"
            ],
            [
                "name" => "Brand Short Text 2 (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-122"
            ],
            [
                "name" => "Marking2 (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-123"
            ],
            [
                "name" => "Search Keywords (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-124"
            ],
            [
                "name" => "Commercial Description (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-125"
            ],
            [
                "name" => "Technical Description (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-126"
            ],
            [
                "name" => "SAP Description (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-127"
            ],
            [
                "name" => "Shipping Conditions (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-128"
            ],
            [
                "name" => "Conditions (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-129"
            ],
            [
                "name" => "Manufacturing Length (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-130"
            ],
            [
                "name" => "Minimum Order (fi_FI)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-131"
            ],
            [
                "name" => "HeadLine Web (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-132"
            ],
            [
                "name" => "Legal Text (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-133"
            ],
            [
                "name" => "Brand Short Text 1 (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-134"
            ],
            [
                "name" => "Brand Short Text 2 (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-135"
            ],
            [
                "name" => "Marking2 (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-136"
            ],
            [
                "name" => "Search Keywords (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-137"
            ],
            [
                "name" => "Commercial Description (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-138"
            ],
            [
                "name" => "Technical Description (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-139"
            ],
            [
                "name" => "SAP Description (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-140"
            ],
            [
                "name" => "Shipping Conditions (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-141"
            ],
            [
                "name" => "Conditions (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-142"
            ],
            [
                "name" => "Manufacturing Length (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-143"
            ],
            [
                "name" => "Minimum Order (nl_NL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-144"
            ],
            [
                "name" => "HeadLine Web (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-145"
            ],
            [
                "name" => "Legal Text (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-146"
            ],
            [
                "name" => "Brand Short Text 1 (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-147"
            ],
            [
                "name" => "Brand Short Text 2 (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-148"
            ],
            [
                "name" => "Marking2 (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-149"
            ],
            [
                "name" => "Search Keywords (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-150"
            ],
            [
                "name" => "Commercial Description (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-151"
            ],
            [
                "name" => "Technical Description (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-152"
            ],
            [
                "name" => "SAP Description (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-153"
            ],
            [
                "name" => "Shipping Conditions (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-154"
            ],
            [
                "name" => "Conditions (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-155"
            ],
            [
                "name" => "Manufacturing Length (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-156"
            ],
            [
                "name" => "Minimum Order (nn_NO)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-157"
            ],
            [
                "name" => "HeadLine Web (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-158"
            ],
            [
                "name" => "Legal Text (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-159"
            ],
            [
                "name" => "Brand Short Text 1 (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-160"
            ],
            [
                "name" => "Brand Short Text 2 (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-161"
            ],
            [
                "name" => "Marking2 (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-162"
            ],
            [
                "name" => "Search Keywords (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-163"
            ],
            [
                "name" => "Commercial Description (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-164"
            ],
            [
                "name" => "Technical Description (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-165"
            ],
            [
                "name" => "SAP Description (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-166"
            ],
            [
                "name" => "Shipping Conditions (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-167"
            ],
            [
                "name" => "Conditions (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-168"
            ],
            [
                "name" => "Manufacturing Length (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-169"
            ],
            [
                "name" => "Minimum Order (pl_PL)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-170"
            ],
            [
                "name" => "HeadLine Web  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-171"
            ],
            [
                "name" => "Legal Text  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-172"
            ],
            [
                "name" => "Brand Short Text 1  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-173"
            ],
            [
                "name" => "Brand Short Text 2  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-174"
            ],
            [
                "name" => "Marking2  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-175"
            ],
            [
                "name" => "Search Keywords  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-176"
            ],
            [
                "name" => "Commercial Description  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-177"
            ],
            [
                "name" => "Technical Description  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-178"
            ],
            [
                "name" => "SAP Description  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-179"
            ],
            [
                "name" => "Shipping Conditions  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-180"
            ],
            [
                "name" => "Conditions  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-181"
            ],
            [
                "name" => "Manufacturing Length  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-182"
            ],
            [
                "name" => "Minimum Order  (sv_SE)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-183"
            ],
            [
                "name" => "HeadLine Web  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-184"
            ],
            [
                "name" => "Legal Text  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-185"
            ],
            [
                "name" => "Brand Short Text 1  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-186"
            ],
            [
                "name" => "Brand Short Text 2  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-187"
            ],
            [
                "name" => "Marking2  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-188"
            ],
            [
                "name" => "Search Keywords  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-189"
            ],
            [
                "name" => "Commercial Description  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-190"
            ],
            [
                "name" => "Technical Description  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-191"
            ],
            [
                "name" => "SAP Description  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-192"
            ],
            [
                "name" => "Shipping Conditions  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-193"
            ],
            [
                "name" => "Conditions  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-194"
            ],
            [
                "name" => "Manufacturing Length  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-195"
            ],
            [
                "name" => "Minimum Order  (en_GB)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3459-196"
            ]
        ],
        "niceName" => "IFSEU - Translation Missing Report",
        "group" => "IFS_EU",
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
        "modificationDate" => 1681290093,
        "creationDate" => 1675954821,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "IFSEU_TranslationMissingReport"
    ]
];
