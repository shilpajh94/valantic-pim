<?php 

return [
    1 => [
        "loader" => "primary_key",
        "objectPath" => NULL,
        "cleaner" => NULL,
        "key" => NULL,
        "filter" => NULL,
        "renameExistingObjects" => FALSE,
        "relocateExistingObjects" => FALSE,
        "skipNewObjects" => FALSE,
        "skipExistingObjects" => FALSE,
        "createVersion" => FALSE,
        "omitMandatoryCheck" => FALSE,
        "forceLoadObject" => FALSE,
        "id" => 1,
        "name" => "Data_Import",
        "provider" => "csv",
        "class" => "Product",
        "configuration" => [
            "csvExample" => NULL,
            "delimiter" => ",",
            "enclosure" => "\"",
            "csvHeaders" => NULL
        ],
        "creationDate" => 1644574051,
        "modificationDate" => 1646029227,
        "mapping" => [
            [
                "primaryIdentifier" => TRUE,
                "setter" => NULL,
                "setterConfig" => NULL,
                "fromColumn" => "Sap Number",
                "toColumn" => "articleNumber",
                "interpreter" => NULL,
                "interpreterConfig" => NULL
            ]
        ],
        "runner" => NULL,
        "stopOnException" => FALSE,
        "failureNotificationDocument" => NULL,
        "successNotificationDocument" => NULL
    ],
    2 => [
        "loader" => "primary_key",
        "objectPath" => NULL,
        "cleaner" => NULL,
        "key" => NULL,
        "filter" => NULL,
        "renameExistingObjects" => FALSE,
        "relocateExistingObjects" => FALSE,
        "skipNewObjects" => FALSE,
        "skipExistingObjects" => FALSE,
        "createVersion" => FALSE,
        "omitMandatoryCheck" => FALSE,
        "forceLoadObject" => FALSE,
        "id" => 2,
        "name" => "ContiTech_Import_2",
        "provider" => "csv",
        "class" => "Product",
        "configuration" => [
            "csvExample" => NULL,
            "delimiter" => ",",
            "enclosure" => "\"",
            "csvHeaders" => NULL
        ],
        "creationDate" => 1645596729,
        "modificationDate" => 1645596820,
        "runner" => NULL,
        "stopOnException" => FALSE,
        "failureNotificationDocument" => NULL,
        "successNotificationDocument" => NULL
    ]
];
