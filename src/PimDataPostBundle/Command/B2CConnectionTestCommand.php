<?php
namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductHelper;

class B2CConnectionTestCommand extends AbstractCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
       
        $request = new Request($this->getRequestMethod(), $this->getRequestUrl(), $this->getRequestHeaders(), 
                                $this->getRequestBody());
        $client = new \GuzzleHttp\Client();
        try{
            $response = Util::sendRequestWithConnectionRetries($client, $request, Constants::REQUEST_TIMEOUT_FOR_DATA_REQUESTS);
            
            p_r("=============== Response Status Code: " . $response->getStatusCode());

            p_r("=============== Response ==================");
            p_r($response->getBody());

        }catch(\Throwable $th){
            echo "============== Exception while trying connection\n";
            p_r("=============== Exception: ");
            p_r($th);

            echo "\n\n\n\n";
            p_r($th);
        }
    }

    private function getRequestMethod(): string
    {
        return 'GET';
    }

    private function getRequestHeaders(): array
    {
        return Util::getB2CRequestHeader();
    }

    private function getRequestBody(): string
    {
        return '{}';
    }

    private function getRequestUrl(): string
    {    
        $b2bProductHelper = new B2CProductHelper();
        p_r($b2bProductHelper->getApiHost().str_replace('<PRODUCT_ID_PLACEHOLDER>', "connectionTest" ,$b2bProductHelper->getEntityUrl()));
        return $b2bProductHelper->getApiHost().str_replace('<PRODUCT_ID_PLACEHOLDER>', "connectionTest" ,$b2bProductHelper->getEntityUrl());
    }
    
}

