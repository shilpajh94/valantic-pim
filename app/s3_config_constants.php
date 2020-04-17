<?php
use Pimcore\Config;
use Symfony\Component\Yaml\Yaml;

// get s3 credentials according to current environment
$env = Config::getEnvironment();
$values = Yaml::parseFile(__DIR__."/config/config_{$env}.yml");
$s3BaseUrl = $values["parameters"]["s3.host"];
$s3BucketName = $values["parameters"]["s3.bucket"];
$s3FileWrapperPrefix = "s3://" . $s3BucketName;
$cdnEnable = $values["parameters"]["cdn.enable"];
$cdnBaseUrl = $values["parameters"]["cdn.host"];

define("PIMCORE_S3_BASEURL", $s3BaseUrl);
define("PIMCORE_ASSET_DIRECTORY", $s3FileWrapperPrefix . "/assets");
#define("PIMCORE_TEMPORARY_DIRECTORY", $s3FileWrapperPrefix . "/tmp");

if((int)$values["parameters"]["cdn.enable"]) {
    define("PIMCORE_TRANSFORMED_ASSET_URL", $cdnBaseUrl . "/assets");
} else {
    define("PIMCORE_TRANSFORMED_ASSET_URL", $s3BaseUrl . "/" . $s3BucketName . "/assets");
}

// CDN
define("PIMCORE_CDN_BASEURL", $cdnBaseUrl);