<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C;

use PimDataPostBundle\Model\PersistantModel\B2CAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\Factory;
use PimDataPostBundle\Lib\Util;

class B2CHTTPRequestBodyGeneratorHelper
{
    private $SFObjectType;

    private $graphNo;

    private $subRequestNo;

    private $b2cHelper;
   
    public function __construct($SFObjectType, $graphNo, $subRequestNo) {
        $this->SFObjectType = B2CSalesForceObjectType::getByString($SFObjectType);
        $this->graphNo = $graphNo;
        $this->subRequestNo = $subRequestNo;
        $this->b2cHelper =  Factory::getb2cHelper(B2CSalesForceObjectType::getByString($SFObjectType));
    }

    public function getTotalBatches(APIOperationType $operationType = null): int
    {
        $scriptStartTime = Util::getB2CScriptStartTime();
        $listing = new B2CAPIRequestEntity\Listing();
        if($operationType != null){
            $listing = $listing->setCondition('responseStatus IS NULL AND SFObjectType = ? AND operationType = ? AND creationDate >= ?', [$this->SFObjectType, strval($operationType), $scriptStartTime]);

        } else {
            $listing = $listing->setCondition('responseStatus IS NULL AND SFObjectType = ? AND creationDate >= ?', [$this->SFObjectType, $scriptStartTime]);
        }
        $listing=$listing->load();
        return count($listing);
    }

    public function getHTTPRequestBodyByBatchNumber($batch, APIOperationType $operationType = null): string
    {
        $scriptStartTime = Util::getB2CScriptStartTime();
        $listing = new B2CAPIRequestEntity\Listing();
        if(isset($operationType) && $operationType != null){
            $listing = $listing->setCondition('responseStatus IS NULL AND SFObjectType = ? AND operationType = ? AND creationDate >= ?', [$this->SFObjectType, strval($operationType), $scriptStartTime]);

        } else {
            $listing = $listing->setCondition('responseStatus IS NULL AND SFObjectType = ? AND creationDate >= ?', [$this->SFObjectType, $scriptStartTime]);
        }
        $listing->setOrderKey("id");
        $listing->setOrder("asc");
        // $listing->setOffset($batch-1);
        $listing->setLimit(1);
        $listing = $listing->load();
        $allRequest=array();
        foreach($listing as $data)
        {
            $subRequest= array();
            $subRequest['body']=json_decode($data->body);
            if($data->operationType== APIOperationType::CREATE()) {
                $subRequest['method']='PUT';
            } else if($data->operationType== APIOperationType::UPDATE()) {
                $subRequest['method']='PATCH';
            } else if($data->operationType==APIOperationType::DELETE()) {
                $subRequest['method']='DELETE';
            } else {
                $subRequest['method']='';
            }
            $subRequest['externalID']= $data->externalID;
            if($subRequest['method']!='')
            {
                $allRequest=$subRequest;
            }
        }
        return json_encode($allRequest,JSON_UNESCAPED_SLASHES);
    } 
}
