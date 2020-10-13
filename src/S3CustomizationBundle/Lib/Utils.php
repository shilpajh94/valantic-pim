<?php


namespace S3CustomizationBundle\Lib;


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
}
