<?php
namespace PimDataPostBundle\Model\Auth;

use PimDataPostBundle\Model\Auth\TokenAuthConfig;

class TokenAuthConfigBuilder
{
    /**
     *
     * @var string
     */
    private $url;
    
    /**
     *
     * @var string
     */
    private $method;
    
    /**
     *
     * @var array
     */
    private $params;
    
    /**
     *
     * @var int
     */
    private $tokenLifetime;
    
    /**
     *
     * @var int
     */
    private $guzzleRequestTimeout;
    
    /**
     *
     * @var array
     */
    private $extraConfig = [];
    
    /**
     *
     * @var string|null
     */
    private $contentType;
    
    public function build(): TokenAuthConfig
    {
         return new TokenAuthConfig(
            $this->url,
            $this->method, 
            $this->params, 
            $this->tokenLifetime, 
            $this->guzzleRequestTimeout,
            $this->extraConfig,
            $this->contentType
            );
    }
    
    /**
     * @param string $url
     */
    public function setUrl($url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string $method
     */
    public function setMethod($method): self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param array $params
     */
    public function setParams($params): self
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @param number $tokenLifetime
     */
    public function setTokenLifetime($tokenLifetime): self
    {
        $this->tokenLifetime = $tokenLifetime;
        return $this;
    }

    /**
     * @param number $guzzleRequestTimeout
     */
    public function setGuzzleRequestTimeout($guzzleRequestTimeout): self
    {
        $this->guzzleRequestTimeout = $guzzleRequestTimeout;
        return $this;
    }

    /**
     * @param array $extraConfig
     */
    public function setExtraConfig($extraConfig): self
    {
        $this->extraConfig = $extraConfig;
        return $this;
    }

    /**
     * @param Ambigous <string, NULL> $contentType
     */
    public function setContentType($contentType): self
    {
        $this->contentType = $contentType;
        return $this;
    }

    
    
    
    
    
}

