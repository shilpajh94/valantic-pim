<?php


namespace PimDataPostBundle\Lib\Auth;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Auth\AuthToken;
use PimDataPostBundle\Model\Auth\TokenAuthConfig;

abstract class AbstractTokenBasedAuth{

    abstract protected function getNewToken(TokenAuthConfig $tokenConfig): AuthToken;

    abstract protected function getType(): string;

    public function getToken(TokenAuthConfig $tokenConfig,bool $forceNewToken = false): AuthToken
    {
        if(!$forceNewToken){
            $tokenInSession = $this->getTokenFromSession();

            if($tokenInSession !== null && Util::isTokenValid($tokenInSession)){
                return $tokenInSession;
            }
        }

        $newToken = $this->getNewToken($tokenConfig);

        $this->setTokenToSession($newToken);
        return $newToken;
    }

    private function getTokenFromSession(): ?AuthToken
    {
        // $session = Util::getService('session');
        $key = $this->getType() . "_token";
        $GLOBALS[$key];
        return $GLOBALS[$key];
        // return $session->get($key);
    }

    private function setTokenToSession(AuthToken $token): void
    {
        // $session = Util::getService('session');
        $key = $this->getType() . "_token";
        $GLOBALS[$key] = $token;
        // $session->set($key,$token);
    }

}
