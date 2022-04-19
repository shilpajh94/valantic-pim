<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
use \Pimcore\Model\Asset\Image;
use \Pimcore\Model\Asset\Video;
use \Pimcore\Model\Asset;
use \Pimcore\Model\Asset\Document;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\Dao\B2BProductCategoryReationRequestBodyGeneratorDao;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\ImageTransformationSize;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;

class B2BProductMediaRequestBodyGeneratorHelper
{
    private $productrelationdao;

    private $b2bProductAttributeConfigProvider;

    public function __construct()  
    {
        $this->b2bProductAttributeConfigProvider = new B2BProductAttributeConfigProvider();
        $this->productrelationdao = new B2BProductCategoryReationRequestBodyGeneratorDao();
    }

    function generateRequestBodyForImage(B2BProductRelationChange $b2bProductRelationChange): array
    {
        $returnArr = array();
        if($b2bProductRelationChange->oldValue!='' && $b2bProductRelationChange->oldValue!= null)
        {
            $request['operationType'] = APIOperationType::DELETE();
            $request['asset_id'] = $b2bProductRelationChange->oldValue;
            $request['body'] = [];
            $returnArr[]=$request;
        }
        $imageAsset = Image::getById($b2bProductRelationChange->newValue);
        if(isset($imageAsset))
        {
            $request = array();
            $request['operationType'] = APIOperationType::UPDATE();
            $request['asset_id'] = $b2bProductRelationChange->newValue;
            $sequence = $this->getSequenceOfAttribute($b2bProductRelationChange->attributeName);
            $body =array(
                "Product2__c" =>  $this->productrelationdao->getProductSalesforceIdByPimId($b2bProductRelationChange->productId),
                "B2B_Media_Type__c" => "Image",
                "B2B_Description__c" => $imageAsset->getFileName(),
                "B2B_Display_Type__c" => Constants::B2B_PRODUCT_SMALL_IMAGE_DISPLAY_TYPE,
                "B2B_Media_URL__c" => Util::getAssetPublicPath($imageAsset, ImageTransformationSize::SMALL()),
                "B2B_Sequence__c" => $sequence
            );
        $request['body'] = $body;
        $returnArr[]=$request;  // push small image request

        $body['B2B_Display_Type__c'] = Constants::B2B_PRODUCT_MEDIUM_IMAGE_DISPLAY_TYPE;
        $body['B2B_Media_URL__c'] = Util::getAssetPublicPath($imageAsset, ImageTransformationSize::MEDIUM());
        $body['B2B_Sequence__c'] = $sequence+1;
        
        $request['body'] = $body;
        $request['operationType'] = APIOperationType::UPDATE();
        $returnArr[]=$request;  // push medium image request
        }
        return $returnArr;
    }

    function generateRequestBodyForVideo(B2BProductRelationChange $b2bProductRelationChange): array
    {
        $videoAsset = Video::getById($b2bProductRelationChange->newValue);
        $returnArr = array();
        if(isset($videoAsset))
        {
            $request = array();
            $request['operationType'] = APIOperationType::UPDATE();
            $request['asset_id'] = $b2bProductRelationChange->newValue;
            $sequence = $this->getSequenceOfAttribute($b2bProductRelationChange->attributeName);
            $body =array(
                "Product2__c" =>  $this->productrelationdao->getProductSalesforceIdByPimId($b2bProductRelationChange->productId),
                "B2B_Media_Type__c" => "Video",
                "B2B_Description__c" => $videoAsset->getFileName(),
                "B2B_Media_URL__c" => Util::getAssetPublicPath($videoAsset),
                "B2B_Sequence__c" => $sequence
         );
        $request['body'] = $body;
        $returnArr[]=$request;  // push video request
        }
        return $returnArr;
    }

    function generateRequestBodyForDocument(B2BProductRelationChange $b2bProductRelationChange): array
    {
        $oldValueArray = explode(',',trim($b2bProductRelationChange->oldValue,','));
        $newValueArray = explode(',',trim($b2bProductRelationChange->newValue,','));
        $returnArr = array();
        $sequence = 0;
        $request = array();
        $request['operationType'] = APIOperationType::DELETE();
        foreach($oldValueArray as $oldValue)
        {
            $oldValueRow = explode('|',$oldValue);
            $request['asset_id'] = $oldValueRow[1];
            $request['body'] = [];
            $returnArr[]=$request;
        }

        $request = array();
        $request['operationType'] = APIOperationType::UPDATE();
        foreach($newValueArray as $newValue)
        {
            $newValueRow = explode('|',$newValue);
            $documentAsset = Document::getById($newValueRow[1]);
            if(isset($documentAsset))
            {
            $sequence++;
            $request['asset_id'] = $newValueRow[1];
            $body =array(
                "Product2__c" =>  $this->productrelationdao->getProductSalesforceIdByPimId($b2bProductRelationChange->productId),
                "B2B_Media_Type__c" => $documentAsset->getProperty('media_type'),
                "B2B_Description__c" => $documentAsset->getFileName(),
                "B2B_Media_URL__c" => Util::getAssetPublicPath($documentAsset),
                "B2B_Sequence__c" => $sequence
                );
            $request['body'] = $body;
            $returnArr[]=$request;  // push document array
            }
        }
        return $returnArr;
    }

    function getSequenceOfAttribute($attributeType)
    { 
        $attributesArray = $this->b2bProductAttributeConfigProvider->getMediaAttributeConfig();
        if(isset($attributesArray[$attributeType]['sf_media_sequence'])){
            return $attributesArray[$attributeType]['sf_media_sequence'];
        }
        return 1; 
    }

}