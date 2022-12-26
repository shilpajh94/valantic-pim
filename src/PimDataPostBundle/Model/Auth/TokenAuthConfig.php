<?php

namespace PimDataPostBundle\Model\Auth;

class TokenAuthConfig{

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

    /**
     * 
     * @param string $url
     * @param string $method
     * @param array $param
     * @param int $tokenLifetime
     * @param int $guzzleRequestTimeout
     */
    public function __construct(
        string $url,
        string $method,
        array $params, 
        int $tokenLifetime, 
        int $guzzleRequestTimeout,
        array $extraConfig,
        string $contentType)
    {
        $this->url = $url;
        $this->method = $method;
        $this->params = $params;
        $this->tokenLifetime = $tokenLifetime;
        $this->guzzleRequestTimeout = $guzzleRequestTimeout;
        $this->extraConfig = $extraConfig;
        $this->contentType = $contentType;
    }
    
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return number
     */
    public function getTokenLifetime(): int
    {
        return $this->tokenLifetime;
    }

    /**
     * @return number
     */
    public function getGuzzleRequestTimeout(): int
    {
        return $this->guzzleRequestTimeout;
    }
    /**
     * @return array
     */
    public function getExtraConfig(): array
    {
        return $this->extraConfig;
    }
    
    /**
     * @return mixed <string, NULL>
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    
}