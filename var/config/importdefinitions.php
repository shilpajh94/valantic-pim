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
        "modificationDate" => 1681464869,
        "mapping" => [
            [
                "primaryIdentifier" => FALSE,
                "setter" => NULL,
                "setterConfig" => NULL,
                "fromColumn" => "TempratureC",
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
                "fromColumn" => "TempratureC",
                "toColumn" => "maximumTemperatureC",
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
                "fromColumn" => "TempratureF",
                "toColumn" => "minimumTemperatureF",
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
                "fromColumn" => "TempratureC",
                "toColumn" => "objectbrick~Base~IFSEUHoseBase~hoseIdDec",
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
                    "brickField" => "Skeleton",
                    "class" => "IFSEUHoseSkeleton"
                ],
                "fromColumn" => "TempratureC",
                "toColumn" => "objectbrick~Skeleton~IFSEUHoseSkeleton~OdIn",
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
    ]
];
