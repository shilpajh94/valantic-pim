<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C;

use PimDataPostBundle\Model\PersistantModel\B2CAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CCategoryHelper;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\Factory;

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

    public function getTotalBatches(): int
    {
        $listing = new B2CAPIRequestEntity\Listing();
        $listing = $listing->setCondition('responseStatus  IS NULL AND SFObjectType = ?', $this->SFObjectType);
        $listing=$listing->load();
        return count($listing);
    }

    public function getHTTPRequestBodyByBatchNumber($batch): string
    {
        $listing = new B2CAPIRequestEntity\Listing();
        $listing = $listing->setCondition('responseStatus  IS NULL AND SFObjectType = ?', $this->SFObjectType);
        $listing->setOffset($batch-1);
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
            $subRequest['url']= "https://bgxw-010.sandbox.us01.dx.commercecloud.salesforce.com/s/-/dw/data/v18_1/products/".$data->externalID;
            if($subRequest['method']!='')
            {
                $allRequest=$subRequest;
            }
        }
        return json_encode($allRequest,JSON_UNESCAPED_SLASHES);
    } 
}
