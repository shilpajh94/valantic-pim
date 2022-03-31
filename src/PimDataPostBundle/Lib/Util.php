<?php

namespace PimDataPostBundle\Lib;

use PimDataPostBundle\Model\Auth\AuthToken;
use PimDataPostBundle\Model\Types\ClassType;
use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Model\UpdateWindow;
use PimDataPostBundle\Services\UtilService;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;

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

    public static function createFile(string $filePath, array $records, string $delimiter=','): bool
    {
        try {
            $handle = fopen($filePath, "w");
            foreach ($records as $record) {
                fputcsv($handle, $record, $delimiter);
            }
            
            fclose($handle);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return file_exists($filePath);
        
    }

    public static function deleteFile(string $filePath): void
    {
        try {
            \unlink($filePath);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function createAsset(string $fileName, string $filePath, string $assetFolderPath): Asset
    {
        try{
            $parentObj = Asset\Service::createFolderByPath("/$assetFolderPath");

            $newAsset = new Asset();
            $newAsset->setFilename($fileName);
            $newAsset->setData(file_get_contents($filePath));
            $newAsset->setParent($parentObj);
            $newAsset->save();

        } catch (\Exception $ex) {
            $ex->getMessage();
        }

        return $newAsset;      
    }
}