<?php

namespace PimDataPostBundle\Lib\Auth;

use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Auth\AuthToken;
use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Lib\Auth\AbstractTokenBasedAuth;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use PimDataPostBundle\Model\Auth\TokenAuthConfig;


class B2CAuth extends AbstractTokenBasedAuth
{
    const AUTH_TYPE = "B2C";

    /**
     * @throws: Exception
     */
    protected function getNewToken(TokenAuthConfig $tokenConfig): AuthToken
    {
        $authHeader = "Basic " . base64_encode($tokenConfig->getExtraConfig()['client_id'] . ":" . $tokenConfig->getExtraConfig()['client_secret']);
        $authRequest = new Request($tokenConfig->getMethod(),$tokenConfig->getUrl());

        $client = new \GuzzleHttp\Client( ['headers' => [
            'Content-Type' => $tokenConfig->getContentType(),
            'Authorization' => $authHeader
            ],
            'query' => $tokenConfig->getParams()
        ]);
        
        $response = $client->send($authRequest,["timeout" => $tokenConfig->getGuzzleRequestTimeout()]);

        $responseArr = json_decode($response->getBody()->getContents(),true);
        $responseArr["access_token"];
        return new AuthToken($responseArr["access_token"],time(),$tokenConfig->getTokenLifetime());
    }

    protected function getType(): string
    {
        return self::AUTH_TYPE;
    }
}