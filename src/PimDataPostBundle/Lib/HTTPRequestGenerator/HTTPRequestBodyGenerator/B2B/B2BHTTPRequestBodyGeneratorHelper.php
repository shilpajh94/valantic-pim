<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B;

use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductHelper;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BCategoryHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\Factory;
use PimDataPostBundle\Lib\Util;

class B2BHTTPRequestBodyGeneratorHelper
{
    private $SFObjectType;

    private $graphNo;

    private $subRequestNo;

    private $b2bHelper;
   
    public function __construct($SFObjectType, $graphNo, $subRequestNo) {
        $this->SFObjectType = B2BSalesForceObjectType::getByString($SFObjectType);
        $this->graphNo = $graphNo;
        $this->subRequestNo = $subRequestNo;
        $this->b2bHelper =  Factory::getb2bHelper(B2BSalesForceObjectType::getByString($SFObjectType));
    }

    public function getTotalBatches(APIOperationType $operationType = null): int
    {
        $scriptStartTime = Util::getB2BScriptStartTime();
        $listing = new B2BAPIRequestEntity\Listing();
        if($operationType != null){
            $listing = $listing->setCondition('responseStatus IS NULL AND SFObjectType = ? AND operationType = ? AND creationDate >= ?', [$this->SFObjectType, strval($operationType), $scriptStartTime]);
        
        } else {
            $listing = $listing->setCondition('responseStatus IS NULL AND SFObjectType = ? AND creationDate >= ?', [$this->SFObjectType, $scriptStartTime]);
        }
        $listing=$listing->load();
        $totalRow=count($listing);
        if($this->graphNo==0 || $this->subRequestNo==0) {
            return 0; 
        }
        $batches= ($totalRow/($this->graphNo*$this->subRequestNo));
        return ceil($batches);
    }

    public function getHTTPRequestBodyByBatchNumber($batch, APIOperationType $operationType = null): string
    {
        $scriptStartTime = Util::getB2BScriptStartTime();
        $listing = new B2BAPIRequestEntity\Listing();
        if($operationType != null){
            $listing = $listing->setCondition('responseStatus IS NULL AND SFObjectType = ? AND operationType = ? AND creationDate >= ?', [$this->SFObjectType, strval($operationType), $scriptStartTime]);
        
        } else {
            $listing = $listing->setCondition('responseStatus IS NULL AND SFObjectType = ? AND creationDate >= ?', [$this->SFObjectType, $scriptStartTime]);
        }
        $listing->setOrderKey("id");
        $listing->setOrder("asc");
        // setting offset creates problem for requests
        // $listing->setOffset(($batch-1)*$this->graphNo*$this->subRequestNo);
        $listing->setLimit($this->graphNo*$this->subRequestNo);
        $listing=$listing->load();
        $compositeRequest=array();
        $graphData=array();
        $insSubreq=1;
        $insNode=1;
        $totalCount=0;
        foreach($listing as $data)
        {
            $totalCount++;
            $subRequest= array();

            if( $data->operationType != APIOperationType::DELETE()){
                $subRequest['body']=json_decode($data->body);
            }

            if($data->operationType== APIOperationType::CREATE() || $data->operationType== APIOperationType::UPDATE()) {
                $subRequest['method']='PATCH';
            } else if($data->operationType==APIOperationType::DELETE()) {
                $subRequest['method']='DELETE';
            } else {
                $subRequest['method']='';
            }
            $subRequest['referenceId']=$data->referenceId;
            $subRequest['url']= $this->b2bHelper->getEntityUrl().'/'.$this->b2bHelper->getExternalIdKey().'/'.$data->externalID;
            if($subRequest['method']!='')
            {
                array_push($compositeRequest,$subRequest);
                if($insSubreq==$this->subRequestNo || count($listing)==$totalCount)
                {
                    $graphData[]=array(
                    'graphId'=>'graph'.$insNode,
                    'compositeRequest'=>$compositeRequest
                    );   
                    $compositeRequest=array();
                    $insSubreq=0;
                    $insNode++;
                }
                $insSubreq++;
            }
        }
        $graphs=array('graphs' => $graphData);
        return json_encode($graphs,JSON_UNESCAPED_SLASHES);
    } 
}
