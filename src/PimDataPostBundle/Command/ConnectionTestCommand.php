<?php
namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductHelper;

class ConnectionTestCommand extends AbstractCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
       
        $request = new Request($this->getRequestMethod(), $this->getRequestUrl(), $this->getRequestHeaders(), 
                                $this->getRequestBody());
        $client = new \GuzzleHttp\Client();
        try{
            $response = Util::sendRequestWithConnectionRetries($client, $request, Constants::REQUEST_TIMEOUT_FOR_DATA_REQUESTS);
            
            p_r("=============== Response Status Code: " . $response->getStatusCode());

            if($response->getStatusCode() != 200){
                p_r($response->getBody());
            }

        }catch(\Throwable $th){
            echo "============== Exception while trying connection\n";
            echo "\n\n\n\n";
            p_r($th);
        }
    }

    private function getRequestMethod(): string
    {
        return 'POST';
    }

    private function getRequestHeaders(): array
    {
        return Util::getB2BRequestHeader();
    }

    private function getRequestBody(): string
    {
        return '{
            "graphs": [
                {
                    "graphId": "1",
                    "compositeRequest": [
                        {
                            "method": "GET",
                            "url": "/services/data/v50.0/sobjects/Product2/B2B_External_Id__c/200909079",
                            "referenceId": "TestProductOne"
                            
                        }
                    ]
                }
            ]
        }';
    }

    private function getRequestUrl(): string
    {    
        $b2bProductHelper = new B2BProductHelper();
        return $b2bProductHelper->getApiHost().$b2bProductHelper->getCompositeGraphApiUrl();
    }
    
}

