<?php

namespace PimDataPostBundle\Lib;

use PimDataPostBundle\Model\Auth\AuthToken;
use PimDataPostBundle\Model\Types\ClassType;
use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Model\UpdateWindow;
use PimDataPostBundle\Services\UtilService;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Image;
use AppBundle\Services\AppService;
use PimDataPostBundle\Model\Types\ImageTransformationSize;
class Util
{
    public static function isTokenValid(AuthToken $token): bool
    {
        $currentTime = time();
        $tokenAge = $currentTime - $token->getGenerationTime();
        return $tokenAge >= $token->getTokenLifeTime() ? false : true;
    }

    public static function getService(string $service)
    {
        return \Pimcore::getKernel()->getContainer()->get($service);
    }

    public static function getSymfonyParameter(string $param)
    {
        $utilService = self::getService(UtilService::class);
        return $utilService->getParameter($param);
    }

    public static function getUpdateWindow(): UpdateWindow
    {
        return UpdateWindow::getInstance();
    }

    public static function createCsvFile(string $filePath, array $records, string $delimiter=','): bool
    {
        $handle = fopen($filePath, "w");
        foreach ($records as $record) {
            fputcsv($handle, $record, $delimiter);
        }
        
        fclose($handle);
        return file_exists($filePath);
    }

    public static function deleteFile(string $filePath): void
    {
        \unlink($filePath);
    }

    public static function createAsset(string $fileName, string $filePath, string $parentFolderPath): Asset
    {
        $parentObj = Asset\Service::createFolderByPath("/$parentFolderPath");

        $newAsset = new Asset();
        $newAsset->setFilename($fileName);
        $newAsset->setData(file_get_contents($filePath));
        $newAsset->setParent($parentObj);
        $newAsset->save();

        return $newAsset;      
    }

    public static function getAssetPublicPath(Asset $asset, ImageTransformationSize $imageTransformationSize = null): string
    {
        $sourcePath = \S3CustomizationBundle\Lib\Utils::getAssetFullPathCompatibleToS3($asset);
        if( ($asset instanceof Image) && $imageTransformationSize){
            $appService = \Pimcore::getKernel()->getContainer()->get(AppService::class);
            $sourcePath = urldecode($appService->getFilenameAsPerResolution($sourcePath,"__" . strval($imageTransformationSize)));
        }
        return $sourcePath;
    }
}