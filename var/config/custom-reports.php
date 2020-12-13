<?php

return [
    "brandProducts" => [
        "name" => "brandProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "\nSELECT \nname AS `BRAND`, \nobject_1.articleNumber AS `ARTICLE NUMBER`, \nobject_localized_data_1.sapDescription AS `SAP DESCRIPTION`, \nobject_21.code AS `MATERIAL GROUP CODE`, \nsiopFullCode AS `SIOP FULL CODE` ,\nobject_1.oo_id\n",
                "from" => "\nFROM object_1\nJOIN object_3 ON object_3.oo_id = brandName \nJOIN object_21 ON object_21.oo_id = materialGroup__id \nJOIN object_localized_data_1 ON object_1.oo_id = object_localized_data_1.ooo_id AND object_localized_data_1.`language` = \"en\" \n",
                "where" => "\nWHERE brandName != '' AND ProductType = 'fert'",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "BRAND",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "id" => "extModel609-1"
            ],
            [
                "name" => "ARTICLE NUMBER",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "id" => "extModel609-2"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel609-3"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 170,
                "label" => "",
                "id" => "extModel609-4"
            ],
            [
                "name" => "MATERIAL GROUP CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel609-5"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel609-6"
            ]
        ],
        "niceName" => "BRAND SKUs",
        "group" => "Old Reports",
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
        "modificationDate" => 1607081615,
        "creationDate" => 1591342387,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "brandProducts"
    ],
    "DataCompleteness" => [
        "name" => "DataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "object_1.articleNumber AS 'ARTICLE NUMBER',\nobject_localized_data_1.CompletenessPercentage \"COMPLETED (%)\",\nobject_21.code AS `MATERIAL GROUP CODE`,\nobject_localized_data_1.sapDescription AS `SAP DESCRIPTION`,\nsiopFullCode AS `SIOP FULL CODE`,\nobject_1.oo_id",
                "from" => "object_1\nJOIN object_localized_data_1\nON object_localized_data_1.ooo_id = object_1.oo_id\nAND object_localized_data_1.language = 'en'\nJOIN object_21\nON object_21.oo_id = materialGroup__id",
                "where" => "object_localized_data_1.CompletenessPercentage  != \"\"",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "ARTICLE NUMBER",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "filter" => "string",
                "displayType" => "",
                "filter_drilldown" => "",
                "id" => "extModel774-1"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel774-2"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 160,
                "label" => "",
                "id" => "extModel774-3"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel774-4"
            ],
            [
                "name" => "MATERIAL GROUP CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel774-5"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel774-6"
            ]
        ],
        "niceName" => "DATA COMPLETENESS",
        "group" => "Old Reports",
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
        "modificationDate" => 1607081634,
        "creationDate" => 1591606593,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "DataCompleteness"
    ],
    "newProducts" => [
        "name" => "newProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \nobject_1.articleNumber AS `ARTICLE NUMBER`,\nobject_localized_data_1.sapDescription AS `SAP DESCRIPTION`,\nname AS BRAND,\nobject_21.code AS `MATERIAL GROUP CODE`,\nsiopFullCode AS `SIOP FULL CODE`,\nDATE_FORMAT(FROM_UNIXTIME(object_1.o_creationDate), '%Y-%m-%d') AS DATE,\nobject_1.oo_id ",
                "from" => "object_1 \nLEFT JOIN object_brick_store_HoseBase_1 ON object_brick_store_HoseBase_1.o_id = object_1.oo_id \nLEFT JOIN object_3 ON object_3.oo_id = brandName\nLEFT JOIN object_21 ON object_21.oo_id = materialGroup__id LEFT \nJOIN object_localized_data_1 ON object_1.oo_id = object_localized_data_1.ooo_id AND object_localized_data_1.`language` = \"en\" ",
                "where" => "WHERE DATE_FORMAT(FROM_UNIXTIME(object_1.o_creationDate), '%Y-%m-%d') >= DATE_SUB(CURDATE(), INTERVAL 14 DAY)",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "ARTICLE NUMBER",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel934-1"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel934-2"
            ],
            [
                "name" => "BRAND",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel934-3"
            ],
            [
                "name" => "MATERIAL GROUP CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel934-4"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel934-5"
            ],
            [
                "name" => "DATE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel934-6"
            ],
            [
                "name" => "oo_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel934-7"
            ]
        ],
        "niceName" => "NEW PRODUCTS",
        "group" => "Old Reports",
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
        "modificationDate" => 1607081645,
        "creationDate" => 1591620025,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "newProducts"
    ],
    "productAccuracyCheck" => [
        "name" => "productAccuracyCheck",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT o1.articleNumber AS \"ARTICLE NUMBER\",\nLEFT(o1.oldMaterialCode, 6) AS `SIX DIGIT`,\no1.ProductType AS `PRODUCT TYPE`,\no1.siopFullCode AS `SIOP FULL CODE`,\nold1.sapDescription AS `SAP DESCRIPTION`,\no1.oo_id",
                "from" => "object_1 o1\n\nJOIN object_localized_data_1 old1\nON o1.oo_id = old1.ooo_id\nAND old1.language = 'en'\n\nLEFT JOIN object_1 skeleton_1\nON o1.o_parentId = skeleton_1.oo_id\nAND skeleton_1.ProductType = 'skeleton'\n\nLEFT JOIN object_1 base_1\nON skeleton_1.o_parentId = base_1.oo_id\nAND base_1.ProductType = 'base'\n\n",
                "where" => "WHERE\n(o1.ProductType = 'fert'\nAND base_1.siopFullCode != o1.siopFullCode \nOR base_1.brandName != o1.brandName)\nOR (o1.ProductType = 'fert'\nAND base_1.brandName IS NULL\nAND o1.brandName != '')",
                "groupby" => "GROUP BY o1.articleNumber\nHAVING o1.ProductType = 'fert'",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [

        ],
        "niceName" => "PRODUCT ACCURACY",
        "group" => "Old Reports",
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
        "modificationDate" => 1607081658,
        "creationDate" => 1591696784,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "productAccuracyCheck"
    ],
    "articlesWithNoImage" => [
        "name" => "articlesWithNoImage",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \nobject_1.articleNumber AS `ARTICLE NUMBER`, \nobject_1.siopFullCode AS `SIOP FULL CODE`, \nIF(a_mainImage.filename IS NOT NULL, a_mainImage.filename, 'NO IMAGE') AS `MAIN IMAGE`, \nIF(a_frontView.filename IS NOT NULL, a_frontView.filename, 'NO IMAGE') AS `FRONT VIEW IMAGE`, \nIF(a_sideView.filename IS NOT NULL, a_sideView.filename, 'NO IMAGE') AS `SIDE VIEW IMAGE`, \nIF(a_cutView.filename IS NOT NULL, a_cutView.filename, 'NO IMAGE') AS `CUT VIEW IMAGE`, \nobject_1.oo_id \n",
                "from" => "\nFROM object_1 \nLEFT JOIN assets a_mainImage ON object_1.mainImage = a_mainImage.id \nLEFT JOIN assets a_frontView ON object_1.frontView = a_frontView.id \nLEFT JOIN assets a_sideView ON object_1.sideView = a_sideView.id \nLEFT JOIN assets a_cutView ON object_1.cutView = a_cutView.id \n",
                "where" => "WHERE \n(object_1.mainImage IS NULL) \nAND object_1.ProductType = 'fert'",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "ARTICLE NUMBER",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "id" => "extModel1256-1"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 160,
                "label" => "",
                "id" => "extModel1256-2"
            ],
            [
                "name" => "MAIN IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 90,
                "label" => "",
                "filter" => "",
                "id" => "extModel1256-3"
            ],
            [
                "name" => "FRONT VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "",
                "id" => "extModel1256-4"
            ],
            [
                "name" => "SIDE VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "filter" => "",
                "id" => "extModel1256-5"
            ],
            [
                "name" => "CUT VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "filter" => "",
                "id" => "extModel1256-6"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel1256-7"
            ]
        ],
        "niceName" => "PRODUCTS WITH NO IMAGE",
        "group" => "Old Reports",
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
        "modificationDate" => 1607081665,
        "creationDate" => 1592191325,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "articlesWithNoImage"
    ],
    "productIncompleteAttributes" => [
        "name" => "productIncompleteAttributes",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\no1.articleNumber AS `ARTICLE NUMBER`, \no1.siopFullCode AS `SIOP FULL CODE`, \nold1.sapDescription AS `SAP DESCRIPTION`,\no1.oo_id ",
                "from" => "FROM object_1 o1 \n\tJOIN object_localized_query_1_en old1 \n\t ON o1.oo_id = old1.ooo_id",
                "where" => "WHERE o1.ProductType = \"fert\" AND\n(o1.SIOPLevel2 IS NULL\nOR o1.SIOPLevel3 IS NULL\nOR o1.SIOPLevel4 IS NULL\nOR o1.eanUpc IS NULL\nOR o1.webDiscription IS NULL\nOR o1.searchKeywords IS NULL\nOR old1.longDescription IS NULL\nOR old1.FeaturesBenefitsBulletPoint IS NULL\nOR o1.proposition65WarningAttributesRequired IS NULL\nOR o1.packageLengthIN IS NULL\nOR o1.packageWidthIN IS NULL\nOR o1.packageHeightIN IS NULL\nOR o1.packageWeightLBS IS NULL\nOR o1.caseLengthIN IS NULL\nOR o1.caseHeightIN IS NULL\nOR o1.caseWidthIN IS NULL\nOR o1.caseWeightLBS IS NULL\nOR o1.SIOPLevel2 = \"\"\nOR o1.SIOPLevel3 = \"\"\nOR o1.SIOPLevel4 = \"\"\nOR o1.eanUpc = \"\"\nOR o1.webDiscription = \"\"\nOR o1.searchKeywords = \"\"\nOR old1.longDescription = \"\"\nOR old1.FeaturesBenefitsBulletPoint = \"\"\nOR o1.proposition65WarningAttributesRequired = \"\"\nOR o1.packageLengthIN = \"\"\nOR o1.packageWidthIN = \"\"\nOR o1.packageHeightIN = \"\"\nOR o1.packageWeightLBS = \"\"\nOR o1.caseLengthIN = \"\"\nOR o1.caseHeightIN = \"\"\nOR o1.caseWidthIN = \"\"\nOR o1.caseWeightLBS = \"\"\n)",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "ARTICLE NUMBER",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel1417-1"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel1417-2"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel1417-3"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel1417-4"
            ]
        ],
        "niceName" => "PRODUCT ATTRIBUTE INCOMPLETENESS",
        "group" => "Old Reports",
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
        "modificationDate" => 1607081671,
        "creationDate" => 1592364945,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "productIncompleteAttributes"
    ],
    "pendingSKUs" => [
        "name" => "pendingSKUs",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT\nn.cid, \no1.articleNumber AS `ARTICLE NUMBER`,\nold1.sapDescription AS `SAP DESCRIPTION`,\no21.description AS `MATERIAL GROUP`,\nsiopFullCode AS `SIOP FULL CODE`,\nn.title AS `LAST ACTION NAME`, \nCONCAT(DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)), ' DAYS') AS 'PENDING SINCE',\nFROM_UNIXTIME(n.`date`) AS `LAST UPDATE`\n",
                "from" => "FROM notes n \nJOIN element_workflow_state e\nON e.cid = n.cid\nLEFT JOIN object_1 o1\nON o1.oo_id = n.cid\nJOIN object_21 o21\nON o21.oo_id = o1.materialGroup__id \nJOIN object_localized_data_1 old1\nON o1.oo_id = old1.ooo_id AND old1.`language` = \"en\"\n",
                "where" => "WHERE  ((e.place = 'review_content' ) OR (e.place = 'enrich' ))\nAND DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)) > 5\n",
                "groupby" => "cid",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "cid",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1578-1"
            ],
            [
                "name" => "ARTICLE NUMBER",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1578-2"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1578-3"
            ],
            [
                "name" => "MATERIAL GROUP",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1578-4"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1578-5"
            ],
            [
                "name" => "LAST ACTION NAME",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1578-6"
            ],
            [
                "name" => "PENDING SINCE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1578-7"
            ],
            [
                "name" => "LAST UPDATE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel1578-8"
            ]
        ],
        "niceName" => "PENDING SKUs",
        "group" => "Old Reports",
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
        "modificationDate" => 1607081678,
        "creationDate" => 1592972098,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "pendingSKUs"
    ],
    "NEW_ItemCount" => [
        "name" => "NEW_ItemCount",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n    o1.`articleNumber` AS `Article Number`,\n`en`.`sapDescription` AS `SAP Description`,\n    o1.`siopFullCode` AS `SIOP Full Code` ,\n    o1.`ProductType` AS `Product Type`,\n    cat1.`description` AS `SIOP Level 1`,\n    cat2.`description` AS `SIOP Level 2`,\n    cat3.`description` AS `SIOP Level 3`,\n    cat4.`description` AS `SIOP Level 4`,\n    cat5.`description` AS `SIOP Level 5`,\n    cat6.`description` AS `SIOP Level 6`,\n    o1.`o_id`",
                "from" => "FROM object_1 o1\nLEFT JOIN\n    object_localized_query_2_en cat1 ON cat1.`ooo_id` = SUBSTRING(o1.`SIOPLevel1`,\n        2,\n        (LENGTH(o1.`SIOPLevel1`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat2 ON cat2.`ooo_id` = SUBSTRING(o1.`SIOPLevel2`,\n        2,\n        (LENGTH(o1.`SIOPLevel2`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat3 ON cat3.`ooo_id` = SUBSTRING(o1.`SIOPLevel3`,\n        2,\n        (LENGTH(o1.`SIOPLevel3`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat4 ON cat4.`ooo_id` = SUBSTRING(o1.`SIOPLevel4`,\n        2,\n        (LENGTH(o1.`SIOPLevel4`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat5 ON cat5.`ooo_id` = SUBSTRING(o1.`SIOPLevel5`,\n        2,\n        (LENGTH(o1.`SIOPLevel5`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat6 ON cat6.`ooo_id` = SUBSTRING(o1.`SIOPLevel6`,\n        2,\n        (LENGTH(o1.`SIOPLevel6`) - 2)) \n\tLEFT JOIN\n    `object_localized_query_1_en` `en` ON `en`.`ooo_id` = `o1`.`o_id`",
                "where" => "WHERE (o1.`o_published` =1)",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-1"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-2"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-3"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-4"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-5"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-6"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-7"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-8"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-9"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel286-10"
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
                "id" => "extModel286-11"
            ]
        ],
        "niceName" => "NEW - Item Count",
        "group" => "New Reports",
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
        "modificationDate" => 1607404090,
        "creationDate" => 1606361037,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "NEW_ItemCount"
    ],
    "NEW_NewSKUs" => [
        "name" => "NEW_NewSKUs",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \n    o1.`articleNumber` AS `Article Number`,\n`en`.`sapDescription` AS `SAP Description`,\n    o1.`siopFullCode` AS `SIOP Full Code` ,\n    o1.`ProductType` AS `Product Type`,\n    cat1.`description` AS `SIOP Level 1`,\n    cat2.`description` AS `SIOP Level 2`,\n    cat3.`description` AS `SIOP Level 3`,\n    cat4.`description` AS `SIOP Level 4`,\n    cat5.`description` AS `SIOP Level 5`,\n    cat6.`description` AS `SIOP Level 6`,\n    o1.`o_id` ",
                "from" => "FROM object_1 o1\nLEFT JOIN\n    object_localized_query_2_en cat1 ON cat1.`ooo_id` = SUBSTRING(o1.`SIOPLevel1`,\n        2,\n        (LENGTH(o1.`SIOPLevel1`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat2 ON cat2.`ooo_id` = SUBSTRING(o1.`SIOPLevel2`,\n        2,\n        (LENGTH(o1.`SIOPLevel2`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat3 ON cat3.`ooo_id` = SUBSTRING(o1.`SIOPLevel3`,\n        2,\n        (LENGTH(o1.`SIOPLevel3`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat4 ON cat4.`ooo_id` = SUBSTRING(o1.`SIOPLevel4`,\n        2,\n        (LENGTH(o1.`SIOPLevel4`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat5 ON cat5.`ooo_id` = SUBSTRING(o1.`SIOPLevel5`,\n        2,\n        (LENGTH(o1.`SIOPLevel5`) - 2))\n        LEFT JOIN\n    object_localized_query_2_en cat6 ON cat6.`ooo_id` = SUBSTRING(o1.`SIOPLevel6`,\n        2,\n        (LENGTH(o1.`SIOPLevel6`) - 2)) \n\tLEFT JOIN\n    `object_localized_query_1_en` `en` ON `en`.`ooo_id` = `o1`.`o_id`",
                "where" => "WHERE (o1.`o_published` =1) AND (o1.`o_creationDate` > UNIX_TIMESTAMP(DATE_SUB(CURDATE(), INTERVAL 14 DAY)))",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-1"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-2"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-3"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-4"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-5"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-6"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-7"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-8"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-9"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel603-10"
            ],
            [
                "name" => "o_id",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "columnAction" => "openObject",
                "id" => "extModel603-11"
            ]
        ],
        "niceName" => "NEW PRODUCTS",
        "group" => "New Reports",
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
        "modificationDate" => 1607404144,
        "creationDate" => 1606362991,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "NEW_NewSKUs"
    ],
    "NEW_brandProducts" => [
        "name" => "NEW_brandProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "o1.`articleNumber` AS `Article Number`, \nen.`sapDescription` AS `SAP Description`,\no3.`name` AS `Brand`, \no1.`siopFullCode` AS `SIOP Full Code` ,\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "object_1 o1\nLEFT JOIN object_3 o3 \n\tON o3.`oo_id` = o1.brandName\nLEFT JOIN `object_localized_query_1_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "(o1.`o_published` =1) ",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-1"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-2"
            ],
            [
                "name" => "Brand",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-3"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel1878-11"
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
                "id" => "extModel1878-12"
            ]
        ],
        "niceName" => "NEW BRAND SKUs",
        "group" => "New Reports",
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
        "modificationDate" => 1607404153,
        "creationDate" => 1606812138,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "NEW_brandProducts"
    ],
    "NEW_articlesWithNoImage" => [
        "name" => "NEW_articlesWithNoImage",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "o1.`articleNumber` AS `Article Number`, \nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code` ,\nIF(o1.`mainImage` IS NOT NULL, \"True\", \"False\") AS `Main Image`, \nIF(o1.`frontView` IS NOT NULL, \"True\", \"False\") AS `Front View Image`,\nIF(o1.`sideView` IS NOT NULL, \"True\", \"False\") AS `Side View Image`,\nIF(o1.`cutView` IS NOT NULL, \"True\", \"False\") AS `Cut View Image`,\nIF(o1.`epixImage` IS NOT NULL, \"True\", \"False\") AS `Epix Image`,\nIF(o1.`altImage1` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 1`,\nIF(o1.`altImage2` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 2`,\nIF(o1.`altImage3` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 3`,\nIF(o1.`altImage4` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 4`,\nIF(o1.`altImage5` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 5`,\nIF(o1.`altImage6` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 6`,\nIF(o1.`altImage7` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 7`,\nIF(o1.`altImage8` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 8`,\nIF(o1.`altImage9` IS NOT NULL, \"True\", \"False\") AS `Alternate Image 9`,\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "FROM object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "(o1.`mainImage` IS NULL OR o1.`frontView` IS NULL OR o1.`sideView` IS NULL OR o1.`cutView` IS NULL OR o1.`epixImage` IS NULL OR o1.`altImage1` IS NULL OR o1.`altImage2` IS NULL OR o1.`altImage3` IS NULL OR o1.`altImage4` IS NULL OR o1.`altImage5` IS NULL OR o1.`altImage6` IS NULL OR o1.`altImage7` IS NULL OR o1.`altImage8` IS NULL OR o1.`altImage9` IS NULL) AND (o1.`o_published` =1)",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-1"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-2"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-3"
            ],
            [
                "name" => "Main Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "columnAction" => "",
                "id" => "extModel2040-4"
            ],
            [
                "name" => "Front View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "columnAction" => "",
                "id" => "extModel2040-5"
            ],
            [
                "name" => "Side View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "columnAction" => "",
                "id" => "extModel2040-6"
            ],
            [
                "name" => "Cut View Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "columnAction" => "",
                "id" => "extModel2040-7"
            ],
            [
                "name" => "Epix Image",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-8"
            ],
            [
                "name" => "Alternate Image 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-9"
            ],
            [
                "name" => "Alternate Image 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-10"
            ],
            [
                "name" => "Alternate Image 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-11"
            ],
            [
                "name" => "Alternate Image 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-12"
            ],
            [
                "name" => "Alternate Image 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-13"
            ],
            [
                "name" => "Alternate Image 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-14"
            ],
            [
                "name" => "Alternate Image 7",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-15"
            ],
            [
                "name" => "Alternate Image 8",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-16"
            ],
            [
                "name" => "Alternate Image 9",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-17"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-18"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-19"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-20"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-21"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-22"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-23"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2040-24"
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
                "id" => "extModel2040-25"
            ]
        ],
        "niceName" => "NEW PRODUCTS WITH NO IMAGE",
        "group" => "New Reports",
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
        "modificationDate" => 1607404165,
        "creationDate" => 1606817832,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "NEW_articlesWithNoImage"
    ],
    "NEW_DataCompleteness" => [
        "name" => "NEW_DataCompleteness",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "o1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\nen.CompletenessPercentage \"COMPLETED (%)\",\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` en \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "(o1.`o_published` =1) AND (en.`CompletenessPercentage`  != \"\")",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-1"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-2"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-3"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-4"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-5"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-6"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-7"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-8"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-9"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-10"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2200-11"
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
                "id" => "extModel2200-12"
            ]
        ],
        "niceName" => "NEW DATA COMPLETENESS",
        "group" => "New Reports",
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
        "modificationDate" => 1607404174,
        "creationDate" => 1606822831,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "NEW_DataCompleteness"
    ],
    "NEW_productIncompleteAttributes" => [
        "name" => "NEW_productIncompleteAttributes",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "o1.`articleNumber` AS `Article Number`, `en`.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id` ",
                "from" => "object_1 o1 \nLEFT JOIN `object_localized_query_1_en` `en` \n\tON `en`.`ooo_id` = `o1`.`o_id`\nLEFT JOIN object_localized_query_2_en cat1 \n\tON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2))\nLEFT JOIN object_localized_query_2_en cat2 \n\tON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2))\nLEFT JOIN object_localized_query_2_en cat3 \n\tON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2))\nLEFT JOIN object_localized_query_2_en cat4 \n\tON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2))\nLEFT JOIN object_localized_query_2_en cat5 \n\tON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2))\nLEFT JOIN object_localized_query_2_en cat6 \n\tON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "(o1.`o_published` =1) AND\n(o1.`SIOPLevel2` IS NULL\nOR o1.`SIOPLevel2` = \"\"\nOR o1.`SIOPLevel3` IS NULL\nOR o1.`SIOPLevel3` = \"\"\nOR o1.`SIOPLevel4` IS NULL\nOR o1.`SIOPLevel4` = \"\"\nOR o1.`eanUpc` IS NULL\nOR o1.`eanUpc` = \"\"\nOR o1.`webDiscription` IS NULL\nOR o1.`webDiscription` = \"\"\nOR o1.`searchKeywords` IS NULL\nOR o1.`searchKeywords` = \"\"\nOR `en`.`longDescription` IS NULL\nOR `en`.`longDescription` = \"\"\nOR `en`.`FeaturesBenefitsBulletPoint` = \"\"\nOR `en`.`FeaturesBenefitsBulletPoint` IS NULL\nOR o1.`proposition65WarningAttributesRequired` IS NULL\nOR o1.`proposition65WarningAttributesRequired` = \"\"\nOR o1.`packageLengthIN` IS NULL\nOR o1.`packageLengthIN` = \"\"\nOR o1.`packageWidthIN` IS NULL\nOR o1.`packageWidthIN` = \"\"\nOR o1.`packageHeightIN` IS NULL\nOR o1.`packageHeightIN` = \"\"\nOR o1.`packageWeightLBS` IS NULL\nOR o1.`packageWeightLBS` = \"\"\nOR o1.`caseLengthIN` IS NULL\nOR o1.`caseLengthIN` = \"\"\nOR o1.`caseHeightIN` IS NULL\nOR o1.`caseHeightIN` = \"\"\nOR o1.`caseWidthIN` IS NULL\nOR o1.`caseWidthIN` = \"\"\nOR o1.`caseWeightLBS` IS NULL\nOR o1.`caseWeightLBS` = \"\"\n)",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-1"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-2"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-3"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-4"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-5"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-6"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-7"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-8"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-9"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2361-10"
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
                "id" => "extModel2361-11"
            ]
        ],
        "niceName" => "NEW PRODUCT ATTRIBUTE INCOMPLETENESS",
        "group" => "New Reports",
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
        "modificationDate" => 1607404182,
        "creationDate" => 1606824473,
        "shareGlobally" => TRUE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "NEW_productIncompleteAttributes"
    ],
    "NEW_pendingSKUs" => [
        "name" => "NEW_pendingSKUs",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "o1.`articleNumber` AS `Article Number`,\nen.`sapDescription` AS `SAP Description`,\no1.`siopFullCode` AS `SIOP Full Code`,\nn.title AS `Last Action Name`, \nCONCAT(DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)), ' DAYS') AS 'Pending Since',\nFROM_UNIXTIME(n.`date`) AS `Last Action Date`, \no1.`ProductType` AS `Product Type`,\ncat1.`description` AS `SIOP Level 1`,\ncat2.`description` AS `SIOP Level 2`,\ncat3.`description` AS `SIOP Level 3`,\ncat4.`description` AS `SIOP Level 4`,\ncat5.`description` AS `SIOP Level 5`,\ncat6.`description` AS `SIOP Level 6`,\no1.`o_id`",
                "from" => "notes n\nINNER JOIN\n(\n    SELECT `cid`, MAX(id) AS noteId\n    FROM notes\n    GROUP BY `cid`\n) n1 ON n.`cid` = n1.`cid` AND n.id = n1.noteId\nJOIN element_workflow_state e ON e.cid = n.cid \nLEFT JOIN object_1 o1 ON o1.oo_id = n.cid \nLEFT JOIN `object_localized_query_1_en` `en` ON `en`.`ooo_id` = `o1`.`o_id` \nLEFT JOIN object_localized_query_2_en cat1 ON cat1.ooo_id = SUBSTRING(o1.SIOPLevel1,2,(LENGTH(o1.SIOPLevel1) - 2)) \nLEFT JOIN object_localized_query_2_en cat2 ON cat2.ooo_id = SUBSTRING(o1.SIOPLevel2,2,(LENGTH(o1.SIOPLevel2) - 2)) \nLEFT JOIN object_localized_query_2_en cat3 ON cat3.ooo_id = SUBSTRING(o1.SIOPLevel3,2,(LENGTH(o1.SIOPLevel3) - 2)) \nLEFT JOIN object_localized_query_2_en cat4 ON cat4.ooo_id = SUBSTRING(o1.SIOPLevel4,2,(LENGTH(o1.SIOPLevel4) - 2)) \nLEFT JOIN object_localized_query_2_en cat5 ON cat5.ooo_id = SUBSTRING(o1.SIOPLevel5,2,(LENGTH(o1.SIOPLevel5) - 2)) \nLEFT JOIN object_localized_query_2_en cat6 ON cat6.ooo_id = SUBSTRING(o1.SIOPLevel6,2,(LENGTH(o1.SIOPLevel6) - 2)) ",
                "where" => "WHERE (o1.`o_published` =1) AND ((e.place = 'review_content' ) OR (e.place = 'enrich' ))\nAND DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)) > 5",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "Article Number",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-1"
            ],
            [
                "name" => "SAP Description",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-2"
            ],
            [
                "name" => "SIOP Full Code",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-3"
            ],
            [
                "name" => "Last Action Date",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel2522-4"
            ],
            [
                "name" => "Last Action Name",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-5"
            ],
            [
                "name" => "Pending Since",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-6"
            ],
            [
                "name" => "Product Type",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-7"
            ],
            [
                "name" => "SIOP Level 1",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-8"
            ],
            [
                "name" => "SIOP Level 2",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-9"
            ],
            [
                "name" => "SIOP Level 3",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-10"
            ],
            [
                "name" => "SIOP Level 4",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-11"
            ],
            [
                "name" => "SIOP Level 5",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "filter" => "string",
                "id" => "extModel2522-12"
            ],
            [
                "name" => "SIOP Level 6",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
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
        "niceName" => "Workflow Pending SKUs",
        "group" => "New Reports",
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
        "id" => "NEW_pendingSKUs"
    ]
];
