<?php

namespace PimDataPostBundle\Lib;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PimDataPostBundle\Model\Auth\AuthToken;
use PimDataPostBundle\Model\Types\ClassType;
use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Model\UpdateWindow;
use PimDataPostBundle\Services\UtilService;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Image;
use PimDataPostBundle\Logger\B2BLogger;
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

    /**
     * @throws: ConnectException
     */
    public static function sendRequestWithConnectionRetries(Client $client, Request $request, int $requestTimeout): Response
    {
        $maxConnectionRetries = Constants::MAX_HTTP_CONNECTION_RETRIES;
        $currentTryCount = 0;

        while($currentTryCount < $maxConnectionRetries){
            try{
                $response = $client->send($request,["timeout" => $requestTimeout]);
                break;                
            }catch(ConnectException $ex){
                $currentTryCount++;
                if($currentTryCount == $maxConnectionRetries){
                    throw $ex;
                }
                sleep(Constants::SLEEP_TIME_WITHIN_CONNECTION_RETRIES);
            }
        }
        return $response;
    }

    public static function setB2BScriptStartTime(int $timestampt): void
    {
        $session = self::getService('session');
        $key = Constants::B2B_SCRIPT_START_TIME_SESSION_KEY;
        $session->set($key,$timestampt);
    }

    public static function getB2BScriptStartTime(): int
    {
        $session = self::getService('session');
        $key = Constants::B2B_SCRIPT_START_TIME_SESSION_KEY;
        return $session->get($key);
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

    public static function setPIMFailureFlag(): void
    {
        $session = self::getService('session');
        $key = Constants::B2B_PIM_FAILURE_FLAG_SESSION_KEY;
        $session->set($key, true);
    }

    public static function isPIMFailureFlagSet(): ?bool
    {
        $session = self::getService('session');
        $key = Constants::B2B_PIM_FAILURE_FLAG_SESSION_KEY;
        return $session->get($key);
    }

    public static function getB2BRequestHeader(bool $forceNewToken = false): array
    {
        $b2bAuthToken = self::getService(TokenAuthService::class)->getB2BAuthToken($forceNewToken);
        $authHeader="Bearer ".$b2bAuthToken->getTokenString();
        return array(
            'Content-Type' => 'application/json',
            'Authorization' => $authHeader
        );
    }

    public static function refreshB2BRequestHeader(Request $request): Request
    {
        // $newHeader = self::getB2BRequestHeader(true);
        // $request->withHeader($newHeader);
        // return $request;
    }
}