<?php

namespace PimDataPostBundle\Lib\Auth;

use PimDataPostBundle\Model\Auth\AuthToken;
use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Lib\Auth\AbstractTokenBasedAuth;
use PimDataPostBundle\Lib\Util;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use PimDataPostBundle\Model\Auth\TokenAuthConfig;

class B2BAuth extends AbstractTokenBasedAuth
{
    const AUTH_TYPE = "B2B";

    /**
     * @throws: \Exception
     */
    protected function getNewToken(TokenAuthConfig $tokenConfig): AuthToken
    {
        $authRequest = new Request($tokenConfig->getMethod(),$tokenConfig->getURL());

        $client = new \GuzzleHttp\Client( ['query' => $tokenConfig->getParams()]);
        $response = Util::sendRequestWithConnectionRetries($client, $authRequest, intval($tokenConfig->getGuzzleRequestTimeout()) );
        $responseArr = json_decode($response->getBody()->getContents(),true);
        $responseArr["access_token"];
        return new AuthToken($responseArr["access_token"],floor($responseArr["issued_at"]/1000), intval($tokenConfig->getTokenLifetime()) );
    }

    protected function getType(): string
    {
        return self::AUTH_TYPE;
    }
}