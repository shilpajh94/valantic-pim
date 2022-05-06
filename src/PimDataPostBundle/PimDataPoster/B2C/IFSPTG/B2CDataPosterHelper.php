<?php

namespace PimDataPostBundle\PimDataPoster\B2C\IFSPTG;

use GuzzleHttp\Exception\ClientException;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\PersistantModel\B2CPimFailureRecord;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\StatusType;

class B2CDataPosterHelper
{
    public function sendAllRequestsToSFAndHandleResponses(IB2CHTTPRequestGenerator $requestGenerator,
                                                            IB2CHTTPResponseHandler $responseHandler,
                                                            APIOperationType $operationType = null)
    {
        $client = new \GuzzleHttp\Client();
        $firstBatchIndex = 1;
        $totalBatches = $requestGenerator->getTotalBatches($operationType);
        for($i = $firstBatchIndex; $i <= $totalBatches; $i++){
            $request = $requestGenerator->getRequest($i, $operationType);
            $externalIdForCurrentRequest = $requestGenerator->getExternalIdForCurrentRequest();
            $responseHandler->setExternalIdForCurrentRequest($externalIdForCurrentRequest);
            try{
                $response = Util::sendRequestWithConnectionRetries($client, $request, Constants::REQUEST_TIMEOUT_FOR_DATA_REQUESTS);
                $responseHandler->handleResponse($response, time());
            } catch(ClientException $ex){
                $response = $ex->getResponse();
                if($ex->getResponse()->getStatusCode() == 401)
                {
                    $request = Util::refreshB2CRequestHeader($request);
                    $response = Util::sendRequestWithConnectionRetries($client, $request, Constants::REQUEST_TIMEOUT_FOR_DATA_REQUESTS);
                }else {
                    $responseHandler->handleResponse($response, time());
                }
            }
            // $responseHandler->handleResponse($response, time());
        }
    }

    public function addPimFailedRecords(array $pimIds, \Throwable $throwable, B2CSalesForceObjectType $objectType)
    {
        $time = time();
        foreach($pimIds as $pimId)
        {
            $list = new B2CPimFailureRecord\Listing();
            $list->setCondition(" PimId = ?", [$pimId]);
            $objects = $list->load();
            if(count($objects) == 0){
                $failureObject = new B2CPimFailureRecord();
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