<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @package    RestApiBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace RestApiBundle\Service;

use Pimcore\DataObject\GridColumnConfig\Operator\Boolean;
use Pimcore\Log\ApplicationLogger as Logger;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Objectbrick;
use Pimcore\Model\DataObject\Product;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Asset;
use Pimcore\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use RestApiBundle\Model\ProductModel;
use AppBundle\Tool\Utils;
use AppBundle\Services\AppService;
class ProductModelService
{

    private $model;
    private $appService;
    private $vCatalog = [];

    /**
     * @var Pimcore\Model\DataObject
     */
    private $mainClass = "\\Pimcore\\Model\\DataObject\\";

    public function __construct(AppService $appService)
    {
        $this->model = new ProductModel();
        $this->appService = $appService;
    }

    /**
     * Method to get product detail
     *
     * @param string $langCode
     * @param array $parameterArray
     *
     * @return array $productDetail Product Details array
     */
    public function getProduct($langCode, $parameterArray)
    {

        $productDetail = array();
        $this->vCatalog = $this->getVirtualCatalogFieldMapping();
        /*
        $conditionString = $this->model->getConditionString($parameterArray,'fert');
        $conArray['condition']= $conditionString;
        $conArray['fields']   = ['oo_id'];
        $totalCount = $this->model->getTotalCount($langCode,$conArray);
        */

        // these are all ferts with offset, limit and conditions
        $products = $this->model->fetchProduct($langCode, $parameterArray,'fert',$this->vCatalog);
        if ($products) {
            $productDetail['apikey'] = $parameterArray['apiKey'];
            // iterating all the ferts and fetching their 9 digit and 6 digit data
            $productData =   $this->getProductDetail($products, $langCode);
//            $productDetail['total'] = strval($totalCount);
            $productDetail['products'] = $this->formatProducts($productData);
        }
        return $productDetail;
    }

    /**
     * Method to get product details
     *
     * @param array $product
     * @param string $langCode
     *
     * @return array $finalProductArray
     *
     * @throws \Exception
     */
    private function getProductDetail($products, $langCode)
    {
        $finalProductArray  =   [];

        if(empty($products)){ return $finalProductArray; }

        foreach($products as $key=>$value){
            $value  =   array_filter($value);
            $nineDigitData  =   $this->getSkeletonData($value['o_parentId']);
            $sixDigitData = [];
            if (!empty($nineDigitData)) {
                $sixDigitData   =   $this->getBaseData($nineDigitData['o_parentId']);
            }
            $sixDigit       =   substr($value['oldMaterialCode'],0,6);
            $nineDigit      =   substr($value['oldMaterialCode'],0,9);

            // Set Base(6Digit) data only if it is not set.
            if(!isset($finalProductArray[$sixDigit]['6digit']) || empty($finalProductArray[$sixDigit]['6digit'])){

                $sixDigitData['6digit'] =   $sixDigit;
                $siopData = $this->getSoipDetails($sixDigitData);
                foreach ($siopData as $key => $data) {
                    if($key == "ProductCategory") {
                        $sixDigitData['SIOP Categories'] = $data;
                    } else {
                        $sixDigitData[$key] = $data;
                    }
                }

                // Get Base Object Bricks Data.
                $baseObjectBrickData = array();
                if(!empty($nineDigitData)){
                    $baseObjectBrickData = $this->getProductObjectBrickData($nineDigitData['o_parentId'],'base');
                }
                if(!empty($baseObjectBrickData)){
                    $resultArrBase = array_merge($sixDigitData,$baseObjectBrickData);
                }else{
                    $resultArrBase = $sixDigitData;
                }
                // We need these 2 ids to get the path of assets
                // Then we are unseting it to hide the ids
                $certificationImageID = $resultArrBase['certificationImage'];
                $certificationDocumentID = $resultArrBase['document'];

                unset($resultArrBase['oo_id']);
                unset($resultArrBase['o_parentId']);
                unset($resultArrBase['mainImage']);
                unset($resultArrBase['frontView']);
                unset($resultArrBase['sideView']);
                unset($resultArrBase['cutView']);
                unset($resultArrBase['SIOPLevel2']);
                unset($resultArrBase['SIOPLevel3']);
                unset($resultArrBase['SIOPLevel4']);
                unset($resultArrBase['certificationImage']);
                unset($resultArrBase['document']);
                $finalProductArray[$sixDigit] = $resultArrBase;
                // To display the 6 Digit code with "sixDigitVirtualCatalogDescription" field
                if(isset($resultArrBase['sixDigitVirtualCatalogDescription']) && $resultArrBase['sixDigitVirtualCatalogDescription'] != '') {
                    $finalProductArray[$sixDigit]['sixDigitVirtualCatalogDescription'] = $sixDigitData['6digit']."-".$resultArrBase['sixDigitVirtualCatalogDescription'];
                }
            }
            // Set Skeleton(9Digit) data only if it is not set.
            if(!isset($finalProductArray[$sixDigit]['9digit'][$nineDigit]) || empty($finalProductArray[$sixDigit]['9digit'][$nineDigit])){

                // Get Skeleton Object Bricks Data.
                $skeletonObjectBrickData    =   array();
                if(!empty($nineDigitData)){
                    $skeletonObjectBrickData = $this->getProductObjectBrickData($value['o_parentId'],'skeleton');
                }
                $resultArrSkeleton1['id'] = $nineDigit;
                if(!empty($skeletonObjectBrickData)){
                    $resultArrSkeleton = array_merge($resultArrSkeleton1,$skeletonObjectBrickData, $nineDigitData);
                }else{
                    $resultArrSkeleton = array_merge($resultArrSkeleton1,$nineDigitData);
                }
                unset($resultArrSkeleton['oo_id']);
                unset($resultArrSkeleton['o_parentId']);
                unset($resultArrSkeleton['mainImage']);
                unset($resultArrSkeleton['frontView']);
                unset($resultArrSkeleton['sideView']);
                unset($resultArrSkeleton['cutView']);
                $finalProductArray[$sixDigit]['9digit'][$nineDigit]['id']= $nineDigit;
                $finalProductArray[$sixDigit]['9digit'][$nineDigit]= $resultArrSkeleton;
            }

            // Set Options(14Digit) data.
            if(isset($finalProductArray[$sixDigit]['9digit'][$nineDigit])){
                // Get Fert Object Bricks Data.
                $fertObjectBrickData = $this->getProductObjectBrickData($value['oo_id'],'fert');
                $resultArrFert1['sap_id']    =   $value['articleNumber'];
                if(!empty($fertObjectBrickData)){
                    $resultArrFert = array_merge($resultArrFert1,$fertObjectBrickData, $value);
                }else{
                    $resultArrFert = array_merge($resultArrFert1,$value);
                }
                unset($resultArrFert['oo_id']);
                unset($resultArrFert['o_parentId']);
                unset($resultArrFert['mainImage']);
                unset($resultArrFert['frontView']);
                unset($resultArrFert['sideView']);
                unset($resultArrFert['cutView']);
                unset($resultArrFert['articleNumber']);
                unset($resultArrFert['oldMaterialCode']);
                $finalProductArray[$sixDigit]['9digit'][$nineDigit]['options'][]=$resultArrFert;
            }

            // Set Images.
            $imageDataArray['fert'] = $value;
            $imageDataArray['skeleton'] = $nineDigitData;
            $imageDataArray['base'] = $sixDigitData;
            $finalProductArray[$sixDigit]['images'] = $this->getImagesData($finalProductArray[$sixDigit]['images'],$imageDataArray,$value['oldMaterialCode']);
            // To get the base alt image & document URL
            if(isset($certificationImageID) && !empty($certificationImageID)) {
                $finalProductArray[$sixDigit]['CertificationImage'] = $this->getPropertyAssetData($certificationImageID);
            }
            if(isset($certificationDocumentID) && !empty($certificationDocumentID)) {
                $finalProductArray[$sixDigit]['CertificationDocument'] = $this->getPropertyAssetData($certificationDocumentID);
            }
        }
        
        return $finalProductArray;
    }

    /**
     * Method to get product category details
     *
     * @param array $product product data
     * @return array $soipDetail product category details array
     * @throws
     */
    private function getSoipDetails($product){
        $siopDetail = [];
        if(empty($product)){ return $siopDetail;}
        $vCatalogMap = $this->getVirtualCatalogFieldMapping();
        foreach($vCatalogMap['VirtualCatalog']['Base']['Object'] as $key=>$value){
            foreach($value as $k1=>$v1){
                if(isset($product[$k1]) && !empty($product[$k1])){
                    $classToLoad = $this->mainClass . $key;
                    $objClass = $classToLoad . "\\Listing";
                    $productCat = new $objClass();
                    $productCat->setObjectTypes([DataObject\AbstractObject::OBJECT_TYPE_OBJECT]);
                    $productCat->addConditionParam(" oo_id = ?", trim($product[$k1],','), "AND");
                    $productCat->setUnpublished(true);
                    $productCat->load();
                    $productCat = $productCat->getObjects();
                    $tempArray = [];
                    if (isset($productCat) && count($productCat) > 0) {
                        $productCategory = $productCat[0];
                        foreach($v1['Fields'] as $fkey=>$fvalue){
                            $fCommand   =   "get".$fvalue;
                            $tempArray[strtolower($fvalue)] =  $productCategory->$fCommand();
                        }
                        $siopDetail[$key][] = $tempArray;
                    }
                }
            }
        }
        return $siopDetail;
    }

    /**
     * Method to get Skeleton data(9Digit) details
     *
     * @param int $skeltonParentId Object Id
     * @return array $skeltonDetail Skeleton data array
     * @throws
     */
    private function getSkeletonData($skeltonParentId){
        $skeltonDetail = [];
        $skeltonDetail  =   $this->model->getProductTypeData($skeltonParentId,'skeleton',$this->vCatalog);
        return $skeltonDetail;
    }

    /**
     * Method to get Base data(6Digit) details
     *
     * @param int $baseParentId Object Id
     * @return array $baseDetail Base data array
     * @throws
     */
    private function getBaseData($baseParentId){
        $baseDetail = [];
        $brandName = '';
        $baseDetail  =   $this->model->getProductTypeData($baseParentId,'base',$this->vCatalog);
        // Getting brand name from object_query_3 table
        $brandName  =   $this->model->getBrandName($baseDetail['brandName']);
        if(!empty($brandName)){
            $baseDetail['brandName'] = $brandName;
        }
        // Getting document URL from object_metadata_1 table
        $documentID  =   $this->model->getDocumentId($baseDetail['oo_id']);
        if(!empty($documentID)){
            $baseDetail['document'] = $documentID;
        }
        // Getting all features from object_localized_29_en table
        if(isset($baseDetail['FeaturesBenefitsBulletPoint']) && !empty($baseDetail['FeaturesBenefitsBulletPoint'])) {
            $classId = $this->appService->getPimcoreClassIdbyName('Features');
            $featureList  =   $this->model->getFeatures($baseDetail['FeaturesBenefitsBulletPoint'], $classId);
            if(!empty($featureList)){
                $baseDetail['FeaturesBenefitsBulletPoint'] = $featureList;
            }
        }

        return $baseDetail;
    }

    /**
     * Method to get Images detail
     *
     * @param array $imageDataArray Image Data Array
     * @param string $oldMaterialValue Old Material Value
     * @return array $imageDetail Image array.
     * @throws
     */
    private function getImagesData($existingImageArray,$imageDataArray,$oldMaterialValue){

        $imageDetail = [];
        if(!empty($existingImageArray)){
            $imageDetail =   $existingImageArray;
        }
        foreach($imageDataArray as $key=>$value){
            $imagesFields = $this->vCatalog['VirtualCatalog'][ucfirst($key)]['Images'];
            $variantId = '';
            if($key=='fert'){$variantId = $value['articleNumber'];}else if($key=='skeleton'){$variantId = substr($oldMaterialValue,0,9);}else if($key=='base'){$variantId = substr($oldMaterialValue,0,6);}
            foreach($imagesFields as $ikey=>$ivalue){
                if(isset($value[$ivalue]) && !empty($value[$ivalue])){
                    if(!isset($imageDetail[$value[$ivalue]]) || empty($imageDetail[$value[$ivalue]])){
                        $imageDetail[$value[$ivalue]] = $this->getPropertyAssetData($value[$ivalue]);
                    }
                    $imageDetail[$value[$ivalue]]['variant_ids'][] = $variantId;
                    $imageDetail[$value[$ivalue]]['variant_ids']   = array_unique($imageDetail[$value[$ivalue]]['variant_ids']);
                }
            }
        }
        return $imageDetail;
    }

    /**
     * Method to get ObjectBrick detail
     *
     * @param int $objId Object Id
     * @param string $productType Product Type (Fert/Skeleton/Base)
     * @return array $productObjectBricksData objectBrick Data.
     * @throws
     */
    private function getProductObjectBrickData($objId,$productType){
        $productObjectBricksData = [];
        $productBrickField = "get".ucfirst($productType);

        // Get Product Object Brick Config Details.
        $objectBricksMap = $this->vCatalog['VirtualCatalog'][ucfirst($productType)]['ObjectBricks'];
        foreach($objectBricksMap as $bkey=>$bvalue){
            if(isset($bvalue['Fields']) && !empty($bvalue['Fields'])){
                foreach($bvalue['Fields'] as $fkey=>$fvalue){

                    $brickText = "get".ucfirst($bkey).ucfirst($productType);
                    $fieldText = "get".ucfirst($fvalue);

                    //receiving data of a Objectbrick
                    $product = DataObject\Product::getById($objId);
                    $bData  =   '';
                    // Get Field Definition.

                    if($product->$productBrickField()->$brickText()){
                        $fieldDef = $product->$productBrickField()->$brickText()->getDefinition()->getFieldDefinition($fvalue);

                        if(!empty($fieldDef) && $fieldDef->getFieldtype()==="multiselect"){
                             $bDataTmp  =   $product->$productBrickField()->$brickText()->$fieldText();
                             $bData = [];
                             if(!empty($bDataTmp)){
                                foreach($bDataTmp as $mkey=>$mvalue){
                                   if($fvalue==='brandName'){
                                    $bData[] =  $mvalue;
                                   }else{
                                    $objectIndv = DataObject::getById($mvalue);
                                    $bData[] = $objectIndv->getName();
                                   }
                                }
                             }

                       }else{
                            $bData  =   $product->$productBrickField()->$brickText()->$fieldText();
                       }
                    }
                    if(!empty($bData) || $bData===0){
                        $productObjectBricksData[$fvalue] = $bData;
                    }
                }
            }
        }
       return  $productObjectBricksData;
    }

    /**
     * Method to get Asset property detail
     *
     * @param string $assetIdPath Asset Id/ Asset Path
     * @param int $assetIdflag True/False
     * @return array $data Asset Property data.
     * @throws
     */
    private function getPropertyAssetData($assetIdPath,$assetIdflag=true)
    {   
        $assetId ='';
        if($assetIdflag){
            $asset = Asset::getById($assetIdPath);
            $assetId= $assetIdPath;
        }else{
            $asset = Asset::getByPath($assetIdPath);
            $assetId= $asset->getId();
        }
        $assetType = $asset->getType();
        $assetForThumb = ['image', 'document'];
        $data = [];
        $data['mime_type'] = $asset->getMimetype();
        $data['filename'] = $asset->getFilename();
        $data['created_at'] =  date('Y-m-d H:i:s', $asset->getCreationDate());
        $data['updated_at'] = date('Y-m-d H:i:s', $asset->getModificationDate());
        $assetUrl = $this->getImageGalleryPaths($assetId);
        $data['src'] = $assetUrl;
        return $data;
    }

    /**
     * To get name/path of images of a gallery
     *
     * @param  int $assetId Asset Id
     * @return string $assetPath Asset Path
     */
    protected function getImageGalleryPaths($assetId)
    {
        $assetPath='';
        if(!empty($assetId)){
            $assetObject = Asset::getById($assetId);
            if (!empty($assetObject)) {
                if (PIMCORE_TRANSFORMED_ASSET_URL) {
                    $assetPath=PIMCORE_TRANSFORMED_ASSET_URL.$assetObject->getPath().$assetObject->getFileName();
                } else {
                    $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
                    $host= $_SERVER['SERVER_NAME'];
                    $assetPath=$protocol.$host.$assetObject->getPath().$assetObject->getFileName();
                }
            }
        }
        return $assetPath;
    }

    /**
     * Method to format product detail
     *
     * @param array $productData
     * @return array $productDetail Product Details array
     */
    private function formatProducts($productData){
        $formattedArray =   array();
        $i=0;
        foreach($productData as $key=>$value){
            $formattedArray[$i] =$value;
            $formattedArray[$i]['9digit'] =array_values($value['9digit']);
            $formattedArray[$i]['images'] =array_values($value['images']);
            $i++;
        }
        return $formattedArray;
    }

    /**
     * Method to get Virtual Catalog Field Mapping.
     *
     * @return array $vcFieldMapping virtual catalog mapping configuration.
     */
    public function getVirtualCatalogFieldMapping()
    {
        $vcFieldMapping = array();
        $yamlFilePath = PIMCORE_PROJECT_ROOT . "/src/RestApiBundle/Resources/config/virtualCatalogFieldMapping.yml";

        $vcFieldMapping = Utils::getYmlConfig($yamlFilePath);

        return $vcFieldMapping;
    }
}
