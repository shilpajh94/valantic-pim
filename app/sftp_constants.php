<?php

use Pimcore\Config;
use Symfony\Component\Yaml\Yaml;

$env = Config::getEnvironment();
$values = Yaml::parseFile(__DIR__."/config/config_{$env}.yml");


define("B2B_EXPORT_SFTP_HOST", $values["parameters"]["b2b_export_sftp"]["host"]);
define("B2B_EXPORT_SFTP_PORT", $values["parameters"]["b2b_export_sftp"]["port"]);
define("B2B_EXPORT_SFTP_USERNAME", $values["parameters"]["b2b_export_sftp"]["username"]);
define("B2B_EXPORT_SFTP_PASSWORD", $values["parameters"]["b2b_export_sftp"]["password"]);
define("B2B_EXPORT_SFTP_PATH", $values["parameters"]["b2b_export_sftp"]["path"]);
