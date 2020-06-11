<?php

use Aws\S3\S3Client;
use Pimcore\Config;
use Symfony\Component\Yaml\Yaml;
use S3CustomizationBundle\Lib\CustomStreamWrapper;

$env = Config::getEnvironment();
$values = Yaml::parseFile(__DIR__."/config/config_{$env}.yml");

$s3ConfigSettings = [
    'version' => 'latest',
    'region' => $values["parameters"]["s3.region"],
    'credentials' => [
        'key' => $values["parameters"]["s3.key"],
        'secret' => $values["parameters"]["s3.secret"]
    ],
];

//if($env == "stage" || $env == "prod") {
//    $s3ConfigSettings['http'] = [
//        'proxy' => [
//            'http' => 'cias.geoaws.com:8080',
//            'https' => 'cias.geoaws.com:8080'
//        ]
//    ];
//}

$s3Client = new S3Client($s3ConfigSettings);

$s3Client->registerStreamWrapper();

/**
 * to customize the default behaviour of wrapper,all the file and directory operations
 * will be done through the mapping of pimcore and s3 path
 */
CustomStreamWrapper::register($s3Client);

// set default file context
\Pimcore\File::setContext(stream_context_create([
   's3' => ['seekable' => true],
   'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
]));
