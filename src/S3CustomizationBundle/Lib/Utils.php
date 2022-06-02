<?php


namespace S3CustomizationBundle\Lib;


use Aws\S3\S3Client;

class Utils
{
    /**
     * Function to get s3 path for an asset.
     *
     * @param $assetObj object of asset
     * @return string
     */
    public static function  getAssetFullPathCompatibleToS3($assetObj)
    {
        $pimcoreFilePath = $assetObj->getPath() . $assetObj->getFilename();
        $s3Path = \Pimcore::getKernel()->getContainer()->get(\S3CustomizationBundle\Services\S3CustomizationService::class)->getS3PathForPimcorePath($pimcoreFilePath, true);
        $s3Path = substr($s3Path, strlen('assets'));
        $s3Path = implode('/', array_map('rawurlencode', explode('/', $s3Path)));
        return PIMCORE_TRANSFORMED_ASSET_URL.$s3Path;
    }

    /**
     * Create a new s3 client object
     *
     * @return S3Client
     */
    public static function getS3Client()
    {
        return new S3Client(S3_CONFIG_SETTINGS);
    }

    /**
     * function to log message to a given log file
     *
     * example usage
     * Utils::log(REQUIRED_ATTRIBUTES_LOG_FILE, $exception->getMessage(), LogLevel::CRITICAL())
     *
     * @param string $logFileName
     * @param string $message
     * @param LogLevel $logLevel
     */
    public static function log(string $logFileName, string $message, LogLevel $logLevel){
        $logLevel = strval($logLevel);
        $logMessage = "[".$logLevel."]"." ".$message;
        \Pimcore\Log\Simple::log($logFileName,$logMessage);
    }

}
