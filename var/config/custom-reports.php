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
                "id" => "extModel664-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel664-11"
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
                "id" => "extModel664-12"
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
        "modificationDate" => 1645078533,
        "creationDate" => 1606361037,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel830-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel830-11"
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
                "id" => "extModel830-12"
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
        "modificationDate" => 1645078561,
        "creationDate" => 1606362991,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel1157-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-4"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-5"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-6"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-7"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-8"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-9"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-10"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-11"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1157-12"
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
                "id" => "extModel1157-13"
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
        "modificationDate" => 1645078623,
        "creationDate" => 1606812138,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel994-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-5"
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
                "id" => "extModel994-6"
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
                "id" => "extModel994-7"
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
                "id" => "extModel994-8"
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
                "id" => "extModel994-9"
            ],
            [
                "name" => "Epix Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-10"
            ],
            [
                "name" => "Alternate Image 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-11"
            ],
            [
                "name" => "Alternate Image 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-12"
            ],
            [
                "name" => "Alternate Image 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-13"
            ],
            [
                "name" => "Alternate Image 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-14"
            ],
            [
                "name" => "Alternate Image 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-15"
            ],
            [
                "name" => "Alternate Image 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-16"
            ],
            [
                "name" => "Alternate Image 7",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-17"
            ],
            [
                "name" => "Alternate Image 8",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-18"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-19"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-20"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-21"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-22"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-23"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel994-24"
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
                "id" => "extModel994-25"
            ],
            [
                "name" => "Certification Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel994-26"
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
        "modificationDate" => 1645078597,
        "creationDate" => 1606817832,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel1320-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-5"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-6"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-7"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-8"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-9"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-10"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-11"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1320-12"
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
                "id" => "extModel1320-13"
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
        "modificationDate" => 1645078669,
        "creationDate" => 1606822831,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel1483-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1483-11"
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
                "id" => "extModel1483-12"
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
        "modificationDate" => 1645078735,
        "creationDate" => 1606824473,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel1646-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-4"
            ],
            [
                "name" => "Last Action Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel1646-5"
            ],
            [
                "name" => "Last Action Note",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-6"
            ],
            [
                "name" => "Pending Since",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-7"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-8"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-9"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-10"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-11"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-12"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-13"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1646-14"
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
                "id" => "extModel1646-15"
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
        "modificationDate" => 1645078769,
        "creationDate" => 1606838413,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "filter" => "string",
                "id" => "extModel1809-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1809-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel1809-5"
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
        "modificationDate" => 1645078800,
        "creationDate" => 1606812138,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "filter" => "string",
                "id" => "extModel1972-3"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel1972-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel1972-5"
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
        "modificationDate" => 1645078826,
        "creationDate" => 1606817832,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel2135-3"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2135-4"
            ],
            [
                "name" => "Month",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2135-5"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel2135-6"
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
        "modificationDate" => 1645078877,
        "creationDate" => 1614589190,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "filter" => "string",
                "id" => "extModel2298-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel2298-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel2298-5"
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
        "modificationDate" => 1645078910,
        "creationDate" => 1614589821,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel2461-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2461-4"
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
        "modificationDate" => 1645078936,
        "creationDate" => 1614630048,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "filter" => "string",
                "id" => "extModel2624-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2624-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel2624-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel2624-8"
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
        "modificationDate" => 1645078966,
        "creationDate" => 1606824473,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel2787-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2787-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2787-5"
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
        "modificationDate" => 1645079006,
        "creationDate" => 1620661797,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel2950-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2950-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2950-5"
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
        "modificationDate" => 1645079040,
        "creationDate" => 1620661797,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel3113-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3113-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3113-5"
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
        "modificationDate" => 1645079065,
        "creationDate" => 1620661797,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel3276-3"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3276-4"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3276-5"
            ],
            [
                "name" => "SIOP Level 4 -- Band",
                "display" => FALSE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel3276-6"
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
        "modificationDate" => 1645079089,
        "creationDate" => 1620661797,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel3439-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel3439-4"
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
        "modificationDate" => 1645079123,
        "creationDate" => 1614589190,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel3602-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel3602-4"
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
        "modificationDate" => 1645079149,
        "creationDate" => 1614589190,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel3765-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel3765-4"
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
        "modificationDate" => 1645079197,
        "creationDate" => 1614589190,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ProductManager",
            "ApplicationAdmin"
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
                "id" => "extModel3928-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel3928-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel3928-5"
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
        "modificationDate" => 1645079242,
        "creationDate" => 1614589821,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel4091-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel4091-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel4091-5"
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
        "modificationDate" => 1645079282,
        "creationDate" => 1614589821,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel4254-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel4254-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel4254-5"
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
        "modificationDate" => 1645079306,
        "creationDate" => 1614589821,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel4417-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4417-4"
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
        "modificationDate" => 1645079336,
        "creationDate" => 1614630048,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel4580-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4580-4"
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
        "modificationDate" => 1645079363,
        "creationDate" => 1614630048,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel4896-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4896-4"
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
        "modificationDate" => 1645079396,
        "creationDate" => 1614630048,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel4743-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4743-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel4743-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel4743-8"
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
        "modificationDate" => 1645079445,
        "creationDate" => 1606824473,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel5217-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5217-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5217-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5217-8"
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
        "modificationDate" => 1645079482,
        "creationDate" => 1606824473,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel5380-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5380-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5380-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5380-8"
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
        "modificationDate" => 1645079528,
        "creationDate" => 1606824473,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel5543-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5543-4"
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
        "modificationDate" => 1645079565,
        "creationDate" => 1614589190,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel5706-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5706-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel5706-5"
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
        "modificationDate" => 1645079604,
        "creationDate" => 1614589821,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel5869-3"
            ],
            [
                "name" => "Status",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel5869-4"
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
        "modificationDate" => 1645079645,
        "creationDate" => 1614630048,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel6032-5"
            ],
            [
                "name" => "SIOPLevel4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 400,
                "label" => "",
                "filter" => "string",
                "id" => "extModel6032-6"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => NULL,
                "label" => "",
                "filter" => "numeric",
                "id" => "extModel6032-7"
            ],
            [
                "name" => "Incompleteness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "filter" => "string",
                "id" => "extModel6032-8"
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
        "modificationDate" => 1645079687,
        "creationDate" => 1606824473,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel6195-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6195-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6195-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6195-6"
            ],
            [
                "name" => "Virtualflag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel6195-7"
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
        "modificationDate" => 1645079728,
        "creationDate" => 1624292432,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel6358-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6358-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6358-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6358-6"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel6358-7"
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
        "modificationDate" => 1645079773,
        "creationDate" => 1624293275,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel6521-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6521-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6521-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "",
                "id" => "extModel6521-6"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel6521-7"
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
        "modificationDate" => 1645079805,
        "creationDate" => 1624450664,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel6684-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6684-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel6684-5"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel6684-6"
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
        "modificationDate" => 1645079860,
        "creationDate" => 1625039156,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel6847-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel6847-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel6847-5"
            ],
            [
                "name" => "VirtualFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel6847-6"
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
        "modificationDate" => 1645079901,
        "creationDate" => 1625039584,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel7010-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7010-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel7010-5"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel7010-6"
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
        "modificationDate" => 1645079951,
        "creationDate" => 1625040174,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel7173-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7173-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7173-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7173-6"
            ],
            [
                "name" => "Virtualflag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel7173-7"
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
        "modificationDate" => 1645079975,
        "creationDate" => 1629891069,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel7336-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7336-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7336-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7336-6"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel7336-7"
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
        "modificationDate" => 1645080008,
        "creationDate" => 1624293275,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel7499-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7499-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7499-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "",
                "id" => "extModel7499-6"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel7499-7"
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
        "modificationDate" => 1645080034,
        "creationDate" => 1624450664,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel7662-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7662-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel7662-5"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel7662-6"
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
        "modificationDate" => 1645080070,
        "creationDate" => 1625039156,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel7825-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7825-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel7825-5"
            ],
            [
                "name" => "VirtualFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel7825-6"
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
        "modificationDate" => 1645080094,
        "creationDate" => 1625039584,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel7988-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel7988-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel7988-5"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel7988-6"
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
        "modificationDate" => 1645080129,
        "creationDate" => 1625040174,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel8151-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8151-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8151-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8151-6"
            ],
            [
                "name" => "Virtualflag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel8151-7"
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
        "modificationDate" => 1645080175,
        "creationDate" => 1624292432,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel8314-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8314-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8314-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8314-6"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel8314-7"
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
        "modificationDate" => 1645080208,
        "creationDate" => 1624293275,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel8477-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8477-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8477-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "",
                "id" => "extModel8477-6"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel8477-7"
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
        "modificationDate" => 1645080253,
        "creationDate" => 1624450664,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel8640-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8640-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel8640-5"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel8640-6"
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
        "modificationDate" => 1645080288,
        "creationDate" => 1625039156,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel8802-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8802-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel8802-5"
            ],
            [
                "name" => "VirtualFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel8802-6"
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
        "modificationDate" => 1645080317,
        "creationDate" => 1625039584,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel8966-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel8966-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel8966-5"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel8966-6"
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
        "modificationDate" => 1645080349,
        "creationDate" => 1625040174,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel9129-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9129-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9129-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9129-6"
            ],
            [
                "name" => "Virtualflag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel9129-7"
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
        "modificationDate" => 1645080387,
        "creationDate" => 1624292432,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel9292-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9292-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9292-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9292-6"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel9292-7"
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
        "modificationDate" => 1645080421,
        "creationDate" => 1624293275,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel9454-3"
            ],
            [
                "name" => "# of SKUs",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9454-4"
            ],
            [
                "name" => "Yes Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9454-5"
            ],
            [
                "name" => "No Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "",
                "id" => "extModel9454-6"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel9454-7"
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
        "modificationDate" => 1645080451,
        "creationDate" => 1624450664,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel9618-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9618-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel9618-5"
            ],
            [
                "name" => "PrintedFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel9618-6"
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
        "modificationDate" => 1645080484,
        "creationDate" => 1625039156,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel9781-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9781-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel9781-5"
            ],
            [
                "name" => "VirtualFlag",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel9781-6"
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
        "modificationDate" => 1645080509,
        "creationDate" => 1625039584,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "id" => "extModel9944-3"
            ],
            [
                "name" => "# of Sku's",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel9944-4"
            ],
            [
                "name" => "Completeness Percentage",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel9944-5"
            ],
            [
                "name" => "BrandType",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter_drilldown" => "filter_and_show",
                "id" => "extModel9944-6"
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
        "modificationDate" => 1645080541,
        "creationDate" => 1625040174,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
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
                "sql" => "SELECT \no1.`o_key` as `Key`,\no1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\nen.CompletenessPercentage \"COMPLETED (%)\",REPLACE( REPLACE(en.EmptyFields,'\\n\\t', ' '),'\\n', ' ' ) 'Empty Fields',\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
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
                "id" => "extModel524-1"
            ],
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-2"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 250,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-4"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-5"
            ],
            [
                "name" => "Empty Fields",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel524-6"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-7"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-8"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-9"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-10"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-11"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-12"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 180,
                "label" => "",
                "filter" => "string",
                "id" => "extModel524-13"
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
                "id" => "extModel524-14"
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
        "modificationDate" => 1646577627,
        "creationDate" => 1606822831,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [
            "ApplicationAdmin",
            "ProductManager"
        ],
        "id" => "DataCompletenessEmptyAttributes"
    ]
];
