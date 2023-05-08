<?php 

return [
    1 => [
        "loader" => NULL,
        "objectPath" => NULL,
        "cleaner" => NULL,
        "key" => NULL,
        "filter" => NULL,
        "renameExistingObjects" => NULL,
        "relocateExistingObjects" => NULL,
        "skipNewObjects" => FALSE,
        "skipExistingObjects" => FALSE,
        "createVersion" => NULL,
        "omitMandatoryCheck" => NULL,
        "forceLoadObject" => FALSE,
        "id" => 1,
        "name" => "test1",
        "provider" => NULL,
        "class" => NULL,
        "configuration" => NULL,
        "creationDate" => 1658426452,
        "modificationDate" => 1658426452,
        "runner" => NULL,
        "stopOnException" => NULL,
        "failureNotificationDocument" => NULL,
        "successNotificationDocument" => NULL
    ],
    2 => [
        "importLevel" => "Base",
        "primaryKey" => "materialNumber",
        "loader" => "primary_key",
        "objectPath" => NULL,
        "cleaner" => NULL,
        "key" => NULL,
        "filter" => NULL,
        "renameExistingObjects" => FALSE,
        "relocateExistingObjects" => FALSE,
        "skipNewObjects" => TRUE,
        "skipExistingObjects" => FALSE,
        "createVersion" => TRUE,
        "omitMandatoryCheck" => FALSE,
        "forceLoadObject" => FALSE,
        "id" => 2,
        "name" => "testqqq",
        "provider" => "csv",
        "class" => "IFSEUProduct",
        "configuration" => [
            "csvExample" => NULL,
            "delimiter" => ",",
            "enclosure" => "\"",
            "csvHeaders" => NULL,
            "csvFile" => "New1.csv",
            "csvId" => "20368"
        ],
        "creationDate" => 1681387265,
        "modificationDate" => 1681720470,
        "mapping" => [
            [
                "primaryIdentifier" => FALSE,
                "setter" => NULL,
                "setterConfig" => NULL,
                "fromColumn" => "TPCode",
                "toColumn" => "TPCode",
                "interpreter" => "generic",
                "interpreterConfig" => [
                    "separator" => "|",
                    "class" => NULL,
                    "field" => NULL,
                    "match_unpublished" => TRUE
                ]
            ],
            [
                "primaryIdentifier" => FALSE,
                "setter" => NULL,
                "setterConfig" => NULL,
                "fromColumn" => "minTempratureC",
                "toColumn" => "minimumTemperatureC",
                "interpreter" => "generic",
                "interpreterConfig" => [
                    "separator" => "|",
                    "class" => NULL,
                    "field" => NULL,
                    "match_unpublished" => TRUE
                ]
            ],
            [
                "primaryIdentifier" => FALSE,
                "setter" => NULL,
                "setterConfig" => NULL,
                "fromColumn" => "maxTempratureC",
                "toColumn" => "maximumTemperatureC",
                "interpreter" => "generic",
                "interpreterConfig" => [
                    "separator" => "|",
                    "class" => NULL,
                    "field" => NULL,
                    "match_unpublished" => TRUE
                ]
            ]
        ],
        "runner" => NULL,
        "stopOnException" => FALSE,
        "failureNotificationDocument" => NULL,
        "successNotificationDocument" => NULL
    ],
    3 => [
        "importLevel" => "Base",
        "primaryKey" => "materialNumber",
        "loader" => "primary_key",
        "objectPath" => NULL,
        "cleaner" => NULL,
        "key" => NULL,
        "filter" => NULL,
        "renameExistingObjects" => FALSE,
        "relocateExistingObjects" => FALSE,
        "skipNewObjects" => TRUE,
        "skipExistingObjects" => FALSE,
        "createVersion" => TRUE,
        "omitMandatoryCheck" => FALSE,
        "forceLoadObject" => FALSE,
        "id" => 3,
        "name" => "ssssssss",
        "provider" => "csv",
        "class" => "IFSEUProduct",
        "configuration" => [
            "csvExample" => NULL,
            "delimiter" => ",",
            "enclosure" => "\"",
            "csvHeaders" => NULL,
            "csvFile" => "New1.csv",
            "csvId" => "20429"
        ],
        "creationDate" => 1681806336,
        "modificationDate" => 1681809522,
        "mapping" => [
            [
                "primaryIdentifier" => FALSE,
                "setter" => NULL,
                "setterConfig" => NULL,
                "fromColumn" => "Onstock",
                "toColumn" => "OnStock",
                "interpreter" => "generic",
                "interpreterConfig" => [
                    "separator" => "|",
                    "class" => NULL,
                    "field" => NULL,
                    "match_unpublished" => TRUE
                ]
            ],
            [
                "primaryIdentifier" => FALSE,
                "setter" => NULL,
                "setterConfig" => NULL,
                "fromColumn" => "OnPublish",
                "toColumn" => "publishedOnline",
                "interpreter" => "generic",
                "interpreterConfig" => [
                    "separator" => "|",
                    "class" => NULL,
                    "field" => NULL,
                    "match_unpublished" => TRUE
                ]
            ],
            [
                "primaryIdentifier" => FALSE,
                "setter" => "objectbrick",
                "setterConfig" => [
                    "brickField" => "Base",
                    "class" => "IFSEUHoseBase"
                ],
                "fromColumn" => "static wire",
                "toColumn" => "objectbrick~Base~IFSEUHoseBase~staticWire",
                "interpreter" => "generic",
                "interpreterConfig" => [
                    "separator" => "|",
                    "class" => NULL,
                    "field" => NULL,
                    "match_unpublished" => TRUE
                ]
            ]
        ],
        "runner" => NULL,
        "stopOnException" => FALSE,
        "failureNotificationDocument" => NULL,
        "successNotificationDocument" => NULL
    ],
    4 => [
        "importLevel" => "Base",
        "primaryKey" => "materialNumber",
        "loader" => "primary_key",
        "objectPath" => NULL,
        "cleaner" => NULL,
        "key" => NULL,
        "filter" => NULL,
        "renameExistingObjects" => FALSE,
        "relocateExistingObjects" => FALSE,
        "skipNewObjects" => TRUE,
        "skipExistingObjects" => FALSE,
        "createVersion" => TRUE,
        "omitMandatoryCheck" => FALSE,
        "forceLoadObject" => FALSE,
        "id" => 4,
        "name" => "dsdsds",
        "provider" => "csv",
        "class" => "IFSEUProduct",
        "configuration" => [
            "csvExample" => NULL,
            "delimiter" => ",",
            "enclosure" => "\"",
            "csvHeaders" => NULL,
            "csvFile" => "New1.csv",
            "csvId" => "20439"
        ],
        "creationDate" => 1681810133,
        "modificationDate" => 1681810163,
        "runner" => NULL,
        "stopOnException" => FALSE,
        "failureNotificationDocument" => NULL,
        "successNotificationDocument" => NULL
    ]
];
