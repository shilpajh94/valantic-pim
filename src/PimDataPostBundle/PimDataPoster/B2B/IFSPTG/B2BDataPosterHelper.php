<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\HTTPRequestGenerator\IHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\IHTTPResponseHandler;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\PersistantModel\B2BPimFailureRecord;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\StatusType;

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
            $response = Util::sendRequestWithConnectionRetries($client, $request, Constants::REQUEST_TIMEOUT_FOR_DATA_REQUESTS);
            $responseHandler->handleResponse($response, time());
        }
    }

    public function addPimFailedRecords(array $pimIds, \Throwable $throwable, B2BSalesForceObjectType $objectType)
    {
        $time = time();
        foreach($pimIds as $pimId)
        {

            $list = new B2BPimFailureRecord\Listing();
            $list->setCondition(" PimId = ?", [$pimId]);
            $objects = $list->load();
            if(count($objects) == 0){
                $failureObject = new B2BPimFailureRecord();
                $failureObject->setPimId($pimId)
                        ->setFailureMessage($throwable->getMessage())
                        ->setSFObjectType(strval($objectType))
                        ->setStatus(StatusType::NONFIXED())
                        ->setTimestamp($time)
                        ->save();
            }
        }
    }

    public function getPimFailedRecordIdsFromObjects(array $pimFailedRecordObjects): array
    {
        $returnValue = [];
        foreach($pimFailedRecordObjects as $object)
        {
            $returnValue[] = $object->getPimId();
        }
        return $returnValue;
    }
}