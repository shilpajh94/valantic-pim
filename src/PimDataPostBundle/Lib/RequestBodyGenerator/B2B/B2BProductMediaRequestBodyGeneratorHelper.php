<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
use \Pimcore\Model\Asset\Image;
use \Pimcore\Model\Asset\Video;
use \Pimcore\Model\Asset;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\Dao\B2BProductCategoryReationRequestBodyGeneratorDao;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\ImageTransformationSize;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductMediaHelper;

class B2BProductMediaRequestBodyGeneratorHelper
{
    private $productrelationdao;

    private $b2bProductAttributeConfigProvider;

    private $productMediaHelper;

    public function __construct()  
    {
        $this->b2bProductAttributeConfigProvider = new B2BProductAttributeConfigProvider();
        $this->productrelationdao = new B2BProductCategoryReationRequestBodyGeneratorDao();
        $this->productMediaHelper = new B2BProductMediaHelper();
    }

    function generateRequestBodyForImage(B2BProductRelationChange $b2bProductRelationChange): array
    {
        $returnArr = array();
        /**
         * check if the image has been removed from the product
         * In this case, send the delete request only for small and medium transformation
         */
        if( ($b2bProductRelationChange->oldValue != '' && $b2bProductRelationChange->oldValue != null) && 
            ($b2bProductRelationChange->newValue == '' || $b2bProductRelationChange->newValue == null)
        )
        {
            // entry for the small image transformation
            $request['operationType'] = APIOperationType::DELETE();
            $request['asset_id'] = $b2bProductRelationChange->oldValue;
            $request['externalId'] = $this->productMediaHelper->getExternalIdForMedia($b2bProductRelationChange->productId,
                                                                                        $b2bProductRelationChange->getAttributeName(),
                                                                                        1);
            $request['body'] = NULL;

            $returnArr[] = $request;

            // entry for medium image transformation
            $request['externalId'] = $this->productMediaHelper->getExternalIdForMedia($b2bProductRelationChange->productId,
                                                                                        $b2bProductRelationChange->getAttributeName(),
                                                                                        2);
            $returnArr[] = $request;
        }else{
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
                    // "B2B_Media_URL__c" => Util::getAssetPublicPath($imageAsset, ImageTransformationSize::SMALL()), // Mahesh Lakher, 15 May 2023 - Code commented, client said send medium image in place of small
                    "B2B_Media_URL__c" => Util::getAssetPublicPath($imageAsset, ImageTransformationSize::MEDIUM()), // Mahesh Lakher, 15 May 2023 - Code added, client said send medium image in place of small
                    "B2B_Sequence__c" => $sequence
                );
                $request['body'] = $body;
                $request['externalId'] = $this->productMediaHelper->getExternalIdForMedia($b2bProductRelationChange->productId,
                                                                                            $b2bProductRelationChange->getAttributeName(),
                                                                                            1);
                $returnArr[]=$request;  // push medium image request
    
                $body['B2B_Display_Type__c'] = Constants::B2B_PRODUCT_MEDIUM_IMAGE_DISPLAY_TYPE;
                // $body['B2B_Media_URL__c'] = Util::getAssetPublicPath($imageAsset, ImageTransformationSize::MEDIUM()); // Mahesh Lakher, 15 May 2023 - Code commented, client said send large image in place of medium
                $body['B2B_Media_URL__c'] = Util::getAssetPublicPath($imageAsset, ImageTransformationSize::LARGE()); // Mahesh Lakher, 15 May 2023 - Code added, client said send large image in place of medium
                $body['B2B_Sequence__c'] = $sequence;
                
                $request['body'] = $body;
                $request['operationType'] = APIOperationType::UPDATE();
                $request['externalId'] = $this->productMediaHelper->getExternalIdForMedia($b2bProductRelationChange->productId,
                                                                                            $b2bProductRelationChange->getAttributeName(),
                                                                                            2);
                $returnArr[]=$request;  // push Large image request
            }
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
        $oldValueArray = $b2bProductRelationChange->oldValue === null ? [] : explode(',',trim($b2bProductRelationChange->oldValue,','));
        $newValueArray = $b2bProductRelationChange->newValue === null ? [] : explode(',',trim($b2bProductRelationChange->newValue,','));
        $returnArr = array();
        $sequence = 0;
        $request = array();
        $request['operationType'] = APIOperationType::DELETE();
        foreach($oldValueArray as $oldValue)
        {
            $oldValueRow = explode('|',$oldValue);
            $request['asset_id'] = $oldValueRow[1];
            $request['body'] = NULL;
            $request['externalId'] = $this->productMediaHelper->getExternalIdForMedia($b2bProductRelationChange->productId,
                                                                                        $b2bProductRelationChange->getAttributeName(),
                                                                                        $oldValueRow[1]);
            $returnArr[]=$request;
        }

        $request = array();
        $request['operationType'] = APIOperationType::UPDATE();
        foreach($newValueArray as $newValue)
        {
            $newValueRow = explode('|',$newValue);
            $documentAsset = Asset::getById($newValueRow[1]);
            if(isset($documentAsset))
            {
                $mediaType = null;
                if($documentAsset->getType() === 'document'){
                    $mediaType = $documentAsset->getProperty('media_type');
                }elseif($documentAsset->getType() === 'image'){
                    $mediaType = "Image";
                }elseif($documentAsset->getType() === 'video'){
                    $mediaType = "Video";
                }

                $sequence++;
                $request['asset_id'] = $newValueRow[1];
                $body =array(
                    "Product2__c" =>  $this->productrelationdao->getProductSalesforceIdByPimId($b2bProductRelationChange->productId),
                    "B2B_Media_Type__c" => $mediaType,
                    "B2B_Description__c" => $documentAsset->getFileName(),
                    "B2B_Media_URL__c" => Util::getAssetPublicPath($documentAsset),
                    "B2B_Sequence__c" => $sequence
                    );
                $request['body'] = $body;
                $request['externalId'] = $this->productMediaHelper->getExternalIdForMedia($b2bProductRelationChange->productId,
                                                                                            $b2bProductRelationChange->getAttributeName(),
                                                                                            $newValueRow[1]);
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