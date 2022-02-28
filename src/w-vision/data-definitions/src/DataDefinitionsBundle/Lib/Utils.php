<?php

namespace Wvision\Bundle\DataDefinitionsBundle\Lib;

//use AppBundle\Services\AppService;
use Pimcore\Model\Asset\Image;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;
use Pimcore\Tool;
use Wvision\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;

class Utils
{

    /**
     * function to get the yml file data as an array
     *
     * @param string $filePath
     * @return mixed
     */
    public static function getYmlConfig(string $filePath)
    {

        try {
            $yaml = new Parser();
            return $yaml->parseFile($filePath);
        } catch (ParseException $e) {
            DataImportLogger::log("Unable to parse the YAML string: %s" . $e->getMessage(), DataImportLogger::ERROR);
            throw new ParseException("Unable to parse the YAML string: %s " . $e->getMessage());
        }
    }

    /**
     * create a valid cache key for the given file path
     *
     * @param $filePath
     * @return mixed
     */
    public static function getCacheKeyForFilePath($filePath)
    {
        $cacheKey = str_replace("/", "_", $filePath);
        $cacheKey = str_replace("\\", "_", $cacheKey);
        return $cacheKey;
    }

    /**
     * returns available system languages
     *
     * @param
     * @return array
     */
    public static function getAvailableLanguages()
    {

        $locales = \Pimcore\Tool::getSupportedLocales();
        $availableLanguages = \Pimcore\Tool::getValidLanguages();
        $fieldArray = array();

        foreach ($availableLanguages as $language) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['name'] = $locales[$language];
            $fieldArrayTemp['value'] = $language;
            $fieldArray[] = $fieldArrayTemp;
        }

        return $fieldArray;
    }

    /**
     * @param Image $asset
     * @param null $thumbnail: example: "1200"
     * for contitech
     * @return string
     */
    public static function getImageOrThumbnailPublicPath(Image $asset, $thumbnail = null): string
    {
        $sourcePath = \S3CustomizationBundle\Lib\Utils::getAssetFullPathCompatibleToS3($asset);
        if ($thumbnail) {
            $appService = \Pimcore::getKernel()->getContainer()->get(AppService::class);
            $sourcePath = urldecode($appService->getFilenameAsPerResolution($sourcePath, "__" . $thumbnail));
        }
        return $sourcePath;
    }

    /**
     * this will return the path with s3 protocol
     * @param Image $asset
     * @param null $thumbnail: example: "1200"
     * for contitech
     * @return string
     */
    public static function getImageOrThumbnailPathForDownload(Image $asset, $thumbnail = null): string
    {
        //        $sourcePath = \S3CustomizationBundle\Lib\Utils::getAssetFullPathCompatibleToS3($asset);
        $sourcePath = $asset->getFileSystemPath();
        if ($thumbnail) {
            $pimcoreFilePath = $asset->getPath() . $asset->getFilename();
            $s3Path = \Pimcore::getKernel()->getContainer()->get(\S3CustomizationBundle\Services\S3CustomizationService::class)->getS3PathForPimcorePath($pimcoreFilePath, true);
            $s3Path = substr($s3Path, strlen('assets'));

            $appService = \Pimcore::getKernel()->getContainer()->get(AppService::class);
            $thumbnailS3Path = urldecode($appService->getFilenameAsPerResolution($s3Path, "__" . $thumbnail));

            $sourcePath = "s3://" . S3_BUCKET . $thumbnailS3Path;
        }
        return $sourcePath;
    }
}
