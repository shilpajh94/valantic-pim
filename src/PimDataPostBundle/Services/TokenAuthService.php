<?php
namespace PimDataPostBundle\Services;

use PimDataPostBundle\Model\Auth\TokenAuthConfig;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use PimDataPostBundle\Model\Auth\TokenAuthConfigBuilder;
use PimDataPostBundle\Lib\Auth\B2BAuth;
use PimDataPostBundle\Model\Auth\AuthToken;
use PimDataPostBundle\Lib\Auth\B2CAuth;

class TokenAuthService
{
    private $parameters;
    
    public function __construct(ContainerBagInterface $parameters)
    {
        $this->parameters = $parameters;
    }
    
    public function getB2BAuthToken(): AuthToken
    {
        $tokenConfig = $this->getB2BTokenAuthConfig();
        return (new B2BAuth())->getToken($tokenConfig);
    }
    
    public function getB2CAuthToken(): AuthToken
    {
        $tokenConfig = $this->getB2CTokenAuthConfig();
        return (new B2CAuth())->getToken($tokenConfig);
    }
    
    private function getB2BTokenAuthConfig(): TokenAuthConfig
    {
        $config = $this->parameters->get("b2b_auth");
        $configBuilder = new TokenAuthConfigBuilder();
        return $configBuilder->setUrl($config["url"])
        ->setMethod($config["method"])
        ->setParams($config["params"])
        ->setTokenLifetime($config["token_lifetime"])
        ->setGuzzleRequestTimeout($config["guzzle_request_timeout"])
        ->setContentType($config["content_type"])
        ->build();
    }
    
    private function getB2CTokenAuthConfig(): TokenAuthConfig
    {
        $config = $this->parameters->get("b2c_auth");
        $configBuilder = new TokenAuthConfigBuilder();
        return $configBuilder->setUrl($config["url"])
        ->setMethod($config["method"])
        ->setParams($config["params"])
        ->setTokenLifetime($config["token_lifetime"])
        ->setGuzzleRequestTimeout($config["guzzle_request_timeout"])
        ->setExtraConfig($config["extra_config"])
        ->setContentType($config["content_type"])
        ->build();
    }
}

