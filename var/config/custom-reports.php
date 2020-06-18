<?php 

return [
    "brandProducts" => [
        "name" => "brandProducts",
        "sql" => "",
        "dataSourceConfig" => [
            [
                "sql" => "SELECT \nname AS BRAND, \nobject_1.oo_id,\nobject_1.articleNumber AS `ARTICLE NUMBER`,\nobject_localized_data_1.sapDescription AS `SAP DESCRIPTION`,\nobject_21.description AS `MATERIAL GROUP`,\nsiopFullCode AS `SIOP FULL CODE`",
                "from" => "\nFROM object_brick_store_HoseBase_1 \n\nJOIN object_1 ON object_brick_store_HoseBase_1.o_id = object_1.oo_id \nJOIN object_3 ON FIND_IN_SET(name, object_1.brandName) \nJOIN object_21 ON object_21.oo_id = materialGroup__id \nJOIN object_localized_data_1 \n\nON object_1.oo_id = object_localized_data_1.ooo_id AND object_localized_data_1.`language` = \"en\"",
                "where" => "WHERE brandName != '' AND ProductType = 'fert'",
                "groupby" => "",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [

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
        "modificationDate" => 1592280566,
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
                "sql" => "object_1.articleNumber AS 'ARTICLE NUMBER',\nobject_localized_data_1.CompletenessPercentage \"COMPLETED (IN %)\",\nobject_21.description AS `MATERIAL GROUP`,\nobject_localized_data_1.sapDescription AS `SAP DESCRIPTION`,\nsiopFullCode AS `SIOP FULL CODE`,\nobject_1.oo_id",
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
                "width" => 150,
                "label" => "",
                "id" => "extModel450-1"
            ],
            [
                "name" => "COMPLETED (IN %)",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 140,
                "label" => "",
                "id" => "extModel450-2"
            ],
            [
                "name" => "MATERIAL GROUP",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel450-3"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel450-4"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 170,
                "label" => "",
                "id" => "extModel450-5"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel450-6"
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
        "modificationDate" => 1591682764,
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
                "sql" => "SELECT \nobject_1.articleNumber AS `ARTICLE NUMBER`,\nobject_localized_data_1.sapDescription AS `SAP DESCRIPTION`,\nname AS BRAND,\nobject_21.description AS `MATERIAL GROUP`,\nsiopFullCode AS `SIOP FULL CODE`,\nDATE_FORMAT(FROM_UNIXTIME(object_1.o_creationDate), '%Y-%m-%d') AS DATE,\nobject_1.oo_id ",
                "from" => "FROM object_1 \nLEFT JOIN object_brick_store_HoseBase_1 ON object_brick_store_HoseBase_1.o_id = object_1.oo_id \nLEFT JOIN object_3 ON FIND_IN_SET(name, brandName) \nJOIN object_21 ON object_21.oo_id = materialGroup__id \nJOIN object_localized_data_1 ON object_1.oo_id = object_localized_data_1.ooo_id AND object_localized_data_1.`language` = \"en\" ",
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
                "id" => "extModel295-1"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel295-2"
            ],
            [
                "name" => "MATERIAL GROUP",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "id" => "extModel295-3"
            ],
            [
                "name" => "BRAND",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 130,
                "label" => "",
                "id" => "extModel295-4"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 120,
                "label" => "",
                "id" => "extModel295-5"
            ],
            [
                "name" => "DATE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "id" => "extModel295-6"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel295-7"
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
        "modificationDate" => 1591712590,
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
                "sql" => "SELECT DISTINCT LEFT(o1.oldMaterialCode, 6) AS `SIX DIGIT`,\no1.ProductType AS `PRODUCT TYPE`,\no1.siopFullCode AS `SIOP FULL CODE`,\nold1.sapDescription AS `SAP DESCRIPTION`,\no1.oo_id",
                "from" => "object_1 o1\nJOIN object_localized_data_1 old1\nON o1.oo_id = old1.ooo_id",
                "where" => "WHERE (o1.siopFullCode LIKE '041500%' \nOR o1.siopFullCode LIKE '041000%')\nAND o1.ProductType = \"fert\"\nAND LEFT(o1.oldMaterialCode, 6) != ''",
                "groupby" => "GROUP BY `SIX DIGIT`",
                "type" => "sql"
            ]
        ],
        "columnConfiguration" => [
            [
                "name" => "SIX DIGIT",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel361-1"
            ],
            [
                "name" => "PRODUCT TYPE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 100,
                "label" => "",
                "id" => "extModel361-2"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel361-3"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel361-4"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => 100,
                "label" => "",
                "id" => "extModel361-5",
                "columnAction" => "openObject"
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
        "modificationDate" => 1591851990,
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
                "sql" => "SELECT \no.articleNumber AS `ARTICLE NUMBER`,\no.siopFullCode AS `SIOP FULL CODE`,\nIF(\nold.mainImage,\n'TRUE',\n'FALSE'\n) AS `MAIN IMAGE`,\nIF(\nold.frontView,\n'TRUE',\n'FALSE'\n) AS `FRONT VIEW IMAGE`,\nIF(\nold.sideView,\n'TRUE',\n'FALSE'\n) AS `SIDE VIEW IMAGE`,\nIF(\nold.cutView,\n'TRUE',\n'FALSE'\n) AS `CUT VIEW IMAGE`,\no.oo_id",
                "from" => "object_1 o\nJOIN object_localized_1_en old\nON o.oo_id = old.oo_id",
                "where" => "WHERE o.ProductType = 'fert' AND (old.mainImage != ''\nOR old.frontView != ''\nOR  old.sideView != ''\nOR old.cutView != '')",
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
                "id" => "extModel385-1"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 150,
                "label" => "",
                "id" => "extModel385-2"
            ],
            [
                "name" => "MAIN IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel385-3"
            ],
            [
                "name" => "FRONT VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel385-4"
            ],
            [
                "name" => "SIDE VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel385-5"
            ],
            [
                "name" => "CUT VIEW IMAGE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => "",
                "label" => "",
                "id" => "extModel385-6"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel385-7"
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
        "modificationDate" => 1592280812,
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
                "from" => "FROM object_1 o1 \nJOIN object_localized_data_1 old1 \nON o1.oo_id = old1.ooo_id \n",
                "where" => "WHERE (o1.ProductType = \"fert\" \nAND ( \no1.SIOPLevel2 != '' \nOR o1.SIOPLevel3 != '' \nOR o1.SIOPLevel4 != '' \nOR o1.eanUpc != '' \nOR o1.webDiscription != '' \nOR o1.searchKeywords != '' \nOR old1.longDescription != '' \nOR old1.FeaturesBenefitsBulletPoint != '' \nOR old1.Application != '' \nOR o1.proposition65WarningAttributesRequired != '' \nOR o1.packageLengthIN != '' \nOR o1.packageWidthIN != '' \nOR o1.packageHeightIN != '' \nOR o1.packageWeightLBS != '' \nOR o1.caseLengthIN != '' \nOR o1.caseHeightIN != '' \nOR o1.caseWidthIN != '' \nOR o1.caseWeightLBS != '' \n)\n)",
                "groupby" => "`ARTICLE NUMBER`",
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
                "id" => "extModel915-1"
            ],
            [
                "name" => "SIOP FULL CODE",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel915-2"
            ],
            [
                "name" => "SAP DESCRIPTION",
                "display" => TRUE,
                "export" => TRUE,
                "order" => TRUE,
                "width" => 200,
                "label" => "",
                "id" => "extModel915-3"
            ],
            [
                "name" => "oo_id",
                "display" => FALSE,
                "export" => FALSE,
                "order" => FALSE,
                "width" => "",
                "label" => "",
                "columnAction" => "openObject",
                "id" => "extModel915-5"
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
        "modificationDate" => 1592458036,
        "creationDate" => 1592364945,
        "shareGlobally" => FALSE,
        "sharedUserNames" => [

        ],
        "sharedRoleNames" => [

        ],
        "id" => "productIncompleteAttributes"
    ]
];
