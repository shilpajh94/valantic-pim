<?php

namespace PimDataPostBundle\Lib;

use PimDataPostBundle\Model\Auth\AuthToken;
use PimDataPostBundle\Model\Types\ClassType;
use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Services\UtilService;

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
}