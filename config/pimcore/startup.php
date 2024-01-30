<?php

use Aws\S3\S3Client;
use S3CustomizationBundle\Lib\CustomStreamWrapper;


if (CUSTOM_ENV == "stage" || CUSTOM_ENV == "prod" || CUSTOM_ENV == "stage_new"){

    $s3ConfigSettings = [
        'version' => 'latest',
        'region' => S3_REGION
    ];

}elseif (CUSTOM_ENV == "dev" || CUSTOM_ENV == "qc"){

    $s3ConfigSettings = [
        'version' => 'latest',
        'region' => S3_REGION,
        'credentials' => [
            'key' => S3_KEY,
            'secret' => S3_SECRET
        ],
    ];
}

define("S3_CONFIG_SETTINGS", $s3ConfigSettings);

$s3Client = new S3Client(S3_CONFIG_SETTINGS);

$default_opts = [
    's3' => [
        'ACL' => 'private',
        'seekable' => true
    ],
];

$default = stream_context_set_default($default_opts);

if(class_exists('\S3CustomizationBundle\Lib\CustomStreamWrapper')){
    /**
     * to customize the default behaviour of wrapper,all the file and directory operations
     * will be done through the mapping of pimcore and s3 path
     */
    CustomStreamWrapper::register($s3Client);
}else{
    $s3Client->registerStreamWrapper();
}

// set default file context
\Pimcore\File::setContext(stream_context_create([
    's3' => ['seekable' => true],
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
]));

