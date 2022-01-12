<?php

namespace PimDataPostBundle\Lib;

use PimDataPostBundle\Model\AuthToken;

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
}