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
                "id" => "extModel380-1"
            ],
            [
                "name" => "ARTICLE NUMBER",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "id" => "extModel380-2"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel380-3"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 170,
                "label" => "",
                "id" => "extModel380-4"
            ],
            [
                "name" => "MATERIAL GROUP CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel380-5"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel380-6"
            ]
        ],
        "niceName" => "BRAND SKUs",
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
        "modificationDate" => 1593410213,
        "creationDate" => 1591342387,
        "shareGlobally" => FALSE,
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
                "id" => "extModel466-1"
            ],
            [
                "name" => "COMPLETED (%)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel466-2"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 160,
                "label" => "",
                "id" => "extModel466-3"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel466-4"
            ],
            [
                "name" => "MATERIAL GROUP CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel466-5"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel466-6"
            ]
        ],
        "niceName" => "DATA COMPLETENESS",
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
        "modificationDate" => 1593667827,
        "creationDate" => 1591606593,
        "shareGlobally" => FALSE,
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
                "from" => "FROM object_1 \nLEFT JOIN object_brick_store_HoseBase_1 ON object_brick_store_HoseBase_1.o_id = object_1.oo_id \nLEFT JOIN object_3 ON object_3.oo_id = brandName\nJOIN object_21 ON object_21.oo_id = materialGroup__id \nJOIN object_localized_data_1 ON object_1.oo_id = object_localized_data_1.ooo_id AND object_localized_data_1.`language` = \"en\" ",
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
                "width" => 130,
                "label" => "",
                "id" => "extModel1060-1"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 170,
                "label" => "",
                "id" => "extModel1060-2"
            ],
            [
                "name" => "BRAND",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "id" => "extModel1060-4"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "id" => "extModel1060-5"
            ],
            [
                "name" => "MATERIAL GROUP CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel1060-8"
            ],
            [
                "name" => "DATE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "id" => "extModel1060-6"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel1060-7"
            ]
        ],
        "niceName" => "NEW PRODUCTS",
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
        "modificationDate" => 1593416119,
        "creationDate" => 1591620025,
        "shareGlobally" => FALSE,
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
            [
                "name" => "ARTICLE NUMBER",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "id" => "extModel380-1"
            ],
            [
                "name" => "SIX DIGIT",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "id" => "extModel380-2"
            ],
            [
                "name" => "PRODUCT TYPE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "id" => "extModel380-3"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 160,
                "label" => "",
                "id" => "extModel380-4"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 190,
                "label" => "",
                "id" => "extModel380-5"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel380-6"
            ]
        ],
        "niceName" => "PRODUCT ACCURACY",
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
        "modificationDate" => 1594007363,
        "creationDate" => 1591696784,
        "shareGlobally" => FALSE,
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
                "id" => "extModel2333-1"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 160,
                "label" => "",
                "id" => "extModel2333-2"
            ],
            [
                "name" => "MAIN IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 90,
                "label" => "",
                "filter" => "",
                "id" => "extModel2333-3"
            ],
            [
                "name" => "FRONT VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "filter" => "",
                "id" => "extModel2333-4"
            ],
            [
                "name" => "SIDE VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "filter" => "",
                "id" => "extModel2333-5"
            ],
            [
                "name" => "CUT VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 110,
                "label" => "",
                "filter" => "",
                "id" => "extModel2333-6"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel2333-7"
            ]
        ],
        "niceName" => "PRODUCTS WITH NO IMAGE",
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
        "modificationDate" => 1593757759,
        "creationDate" => 1592191325,
        "shareGlobally" => FALSE,
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
                "id" => "extModel286-1"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel286-2"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel286-3"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel286-4"
            ]
        ],
        "niceName" => "PRODUCT ATTRIBUTE INCOMPLETENESS",
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
        "modificationDate" => 1603173698,
        "creationDate" => 1592364945,
        "shareGlobally" => FALSE,
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
                "where" => "WHERE e.place = 'review_content' \nAND DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)) < 10\nAND DATEDIFF(NOW(), FROM_UNIXTIME(n.`date`)) > 5\n",
                "groupby" => "cid",
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
                "id" => "extModel395-1"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel395-2"
            ],
            [
                "name" => "MATERIAL GROUP",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel395-3"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "id" => "extModel395-4"
            ],
            [
                "name" => "PENDING SINCE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "id" => "extModel395-7"
            ],
            [
                "name" => "LAST UPDATE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel395-8"
            ],
            [
                "name" => "cid",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel395-9"
            ],
            [
                "name" => "LAST ACTION NAME",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel395-11"
            ]
        ],
        "niceName" => "PENDING SKUs",
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
        "modificationDate" => 1593059411,
        "creationDate" => 1592972098,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "pendingSKUs"
    ]
];
