<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use PimDataPostBundle\Lib\HTTPRequestGenerator\IHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\IHTTPResponseHandler;

class B2BDataPosterHelper
{
    public function sendAllRequestsToSFAndHandleResponses(IHTTPRequestGenerator $requestGenerator,
                                                            IHTTPResponseHandler $responseHandler)
    {
        $client = new \GuzzleHttp\Client();
        $firstBatchIndex = 1;
        $totalBatches = $requestGenerator->getTotalBatches();
        for($i = $firstBatchIndex; $i <= $totalBatches; $i++){
            $request = $requestGenerator->getRequest($i);
            $response = $client->send($request);
            $responseHandler->handleResponse($response);
        }
    }
}