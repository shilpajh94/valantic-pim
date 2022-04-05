<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2B;

use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Services\TokenAuthService;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductHelper;
use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B\B2BProductMediaHTTPRequestBodyGenerator;
class B2BProductMediaHTTPRequestGenerator extends AbstractB2BHTTPRequestGenerator 
{
    public $b2bProductHelper;

    public $b2bHTTPRequestBodyGenerator;

    public function __construct()
    {
        $this->b2bProductHelper = new B2BProductHelper();
        $this->b2bHTTPRequestBodyGenerator= new B2BProductMediaHTTPRequestBodyGenerator();
     
    }

    private function getRequestMethod()
    {
        return 'POST';
    }

    private function getRequestUrl(): string
    {
             
        return $this->b2bProductHelper->getApiHost().$this->b2bProductHelper->getCompositeGraphApiUrl();
    }
    
    private function getRequestHeaders(): array
    {
        $b2bAuthToken = Util::getService(TokenAuthService::class)->getB2BAuthToken();
        $authHeader="Bearer ".$b2bAuthToken->getTokenString();
        $header=array(
            'Content-Type' => 'application/json',
            'Authorization' => $authHeader
        );
        return $header;
    }

    private function getRequestBody($batch): string
    {
        return $this->b2bHTTPRequestBodyGenerator->getHTTPRequestBodyByBatchNumber($batch);
    }

    public function getRequest($batch): Request
    {
       return $request = new Request($this->getRequestMethod(), $this->getRequestUrl(), $this->getRequestHeaders() , $this->getRequestBody($batch));
    }

    public function getTotalBatches(): int
    {
        return $this->b2bHTTPRequestBodyGenerator->getTotalBatches();
    }

}