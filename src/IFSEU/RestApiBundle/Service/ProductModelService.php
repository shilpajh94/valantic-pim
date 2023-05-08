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

namespace IFSEU\RestApiBundle\Service;

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
use IFSEU\RestApiBundle\Model\ProductModel;
use AppBundle\Tool\Utils;
use AppBundle\Services\AppService;
class ProductModelService
{

    private $model;
    private $appService;
    private $ehose = [];

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
        $this->ehose = $this->getEHoseFieldMapping();
        
        $conditionString = $this->model->getConditionString($parameterArray,'fert');
        $conArray['condition']= $conditionString;
        $conArray['fields']   = ['oo_id'=> ['string']];
        $totalCount = $this->model->getTotalCount($langCode,$conArray);
        // these are all ferts with offset, limit and conditions
        $products = $this->model->fetchProduct($langCode, $parameterArray,'fert',$this->ehose);
        if ($products) {
            $productDetail['apikey'] = $parameterArray['apiKey'];
            // iterating all the ferts and fetching their 9 digit and 6 digit data
            $productData =   $this->getProductDetail($products, $langCode);
            $productDetail['total'] = strval($totalCount);
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
    private function getProductDetail($products)
    {
        $finalProductArray  =   [];

        if(empty($products)){ return $finalProductArray; }

        foreach($products as $key=>$value){

            // Using strlen as callback to preserve 0 Zero for unpublished records
            // Removing Null, Empty and False value
            $value  =   array_filter($value, 'strlen');
            $nineDigitData  =   $this->getSkeletonData($value['o_parentId']);
            $sixDigitData = [];
            if (!empty($nineDigitData)) {
                $sixDigitData   =   $this->getBaseData($nineDigitData['o_parentId']);
            }
            $sixDigit       =   $sixDigitData['oo_id'];
            $nineDigit      =   $nineDigitData['oo_id'];

            // Set Base data only if it is not set.
            if(!isset($finalProductArray[$sixDigit]) || empty($finalProductArray[$sixDigit])){
                $siopData = $this->getSoipDetails($sixDigitData);
                foreach ($siopData as $key => $data) {
                    if($key == "IFSEUProductCategory") {
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

                $localizedData = $this->getProductLocalizedData($sixDigit, 'base');
                if($localizedData)
                {
                    $resultArrBase['localizedfields'] = $localizedData;
                }

                if(isset($resultArrBase['standards']) && $resultArrBase['standards'])
                {
                    $localizedData = $this->model->getMastersLocalizedData('IFSEUNorm', 'Norm', 'standards', $resultArrBase['standards']);
                    if($localizedData)
                    {
                        foreach ($localizedData as $lang => $langData) {
                            $resultArrBase['localizedfields'][$lang]['standards'] = $langData;
                        }
                    }
                    unset($resultArrBase['standards']);
                }

                if(isset($resultArrBase['FieldsOfApplication']) && $resultArrBase['FieldsOfApplication'])
                {
                    $localizedData = $this->model->getMastersLocalizedData('IFSEUApplications', 'ApplicationName', 'FieldsOfApplication', $resultArrBase['FieldsOfApplication']);
                    if($localizedData)
                    {
                        foreach ($localizedData as $lang => $langData) {
                            $resultArrBase['localizedfields'][$lang]['FieldsOfApplication'] = $langData;
                        }
                    }
                    unset($resultArrBase['FieldsOfApplication']);
                }

                if(isset($resultArrBase['flowMedium']) && $resultArrBase['flowMedium'])
                {
                    $localizedData = $this->model->getMastersLocalizedData('IFSEUFlowMedium', 'FlowMedium', 'flowMedium', $resultArrBase['flowMedium']);
                    if($localizedData)
                    {
                        foreach ($localizedData as $lang => $langData) {
                            $resultArrBase['localizedfields'][$lang]['flowMedium'] = $langData;
                        }
                    }
                    unset($resultArrBase['flowMedium']);
                }

                $basePropertyClassFields = array(
                    'PropertiesOuterLayer' => 'PropertiesOuterLayer',
                    'propertiesInnerLayer' => 'propertiesInnerLayer',
                    'tubeCharacteristic' => 'tubeCharacteristic',
                    'InnerLining' => 'InnerLining',
                    'colorInnerLining' => 'colorInnerLining',
                    'Reinforcement' => 'Reinforcement',
                    'Helix' => 'Helix',
                    'CoverOuterLayer' => 'CoverOuterLayer',
                    'ColorOuterLayer' => 'ColorOuterLayer',
                    'Haptic' => 'Haptic'
                );

                foreach ($basePropertyClassFields as $propkey => $propName) {
                    if(isset($resultArrBase[$propkey]) && $resultArrBase[$propkey])
                    {
                        unset($propertySelectType);
                        if(is_array($resultArrBase[$propkey]))
                        {
                            $propertySelectType = $resultArrBase[$propkey];
                        }
                        else{
                            $propertySelectType[] = $resultArrBase[$propkey];
                        }
                        
                        unset($localizedData);
                        $localizedData = $this->model->getMastersLocalizedData('IFSEUProperties', 'PropertyName', $propkey, $propertySelectType);
                        if($localizedData)
                        {
                            foreach ($localizedData as $lang => $langData) {
                                $resultArrBase['localizedfields'][$lang][$propkey] = $langData;
                            }
                        }

                        unset($resultArrBase[$propkey]);
                    }
                }

                if(isset($resultArrBase['staticWire']))
                {
                    $resultArrBase['staticWire'] = ($resultArrBase['staticWire'] == 1) ? 'Yes' : 'No';
                }

                if(isset($resultArrBase['justTemporarily']))
                {
                    $resultArrBase['justTemporarily'] = ($resultArrBase['justTemporarily'] == 1) ? 'Yes' : 'No';
                }

                if(isset($resultArrBase['onlyOpenSystem']))
                {
                    $resultArrBase['onlyOpenSystem'] = ($resultArrBase['onlyOpenSystem'] == 1) ? 'Yes' : 'No';
                }

                if(isset($resultArrBase['FlowMediumStability']))
                {
                    $resultArrBase['FlowMediumStability'] = ($resultArrBase['FlowMediumStability'] == 1) ? 'Yes' : 'No';
                }
                
                // We need these 2 ids to get the path of assets
                // Then we are unseting it to hide the ids
                $DocumentID = $resultArrBase['Document'];
                $BrandingLaylineAssets = $resultArrBase['BrandingLaylineAssets'];
                $Certificate1ID = $resultArrBase['Certificate1'];
                $Certificate2ID = $resultArrBase['Certificate1'];
                $video1 = $resultArrBase['video1'];
                $video2 = $resultArrBase['video2'];
                $video3 = $resultArrBase['video3'];
                
                unset($resultArrBase['SIOPLevel1']);
                unset($resultArrBase['SIOPLevel2']);
                unset($resultArrBase['SIOPLevel3']);
                unset($resultArrBase['SIOPLevel4']);
                unset($resultArrBase['SIOPLevel5']);
                unset($resultArrBase['SIOPLevel6']);
                unset($resultArrBase['SIOPLevel7']);
                unset($resultArrBase['mainImage']);
                unset($resultArrBase['frontView']);
                unset($resultArrBase['sideView']);
                unset($resultArrBase['cutView']);
                unset($resultArrBase['epixImage']);
                unset($resultArrBase['altImage1']);
                unset($resultArrBase['altImage2']);
                unset($resultArrBase['altImage3']);
                unset($resultArrBase['altImage4']);
                unset($resultArrBase['altImage5']);
                unset($resultArrBase['altImage6']);
                unset($resultArrBase['altImage7']);
                unset($resultArrBase['altImage8']);
                unset($resultArrBase['certificationImage']);
                unset($resultArrBase['LeftPrintCatalogImage']);
                unset($resultArrBase['RightPrintCatalogImage']);
                unset($resultArrBase['DrawingPictureForCatalog']);
                unset($resultArrBase['BrandingLaylineAssets']);
                unset($resultArrBase['Document']);
                unset($resultArrBase['Certificate1']);
                unset($resultArrBase['Certificate2']);
                unset($resultArrBase['video1']);
                unset($resultArrBase['video2']);
                unset($resultArrBase['video3']);

                $finalProductArray[$sixDigit] = $resultArrBase;


                $imageDataArray['base'] = $sixDigitData;
            
                $images = $this->getImagesData($finalProductArray[$sixDigit]['images'],$imageDataArray);
                if(count($images) > 0){
                    foreach ($images as $fieldkey => $image) {
                        if(in_array($fieldkey,['LeftPrintCatalogImage','RightPrintCatalogImage','DrawingPictureForCatalog']))
                        {
                            $finalProductArray[$sixDigit]['CatalogAssets'][$fieldkey] = $image;
                        }
                        if(in_array($fieldkey,['mainImage','frontView','sideView','cutView','epixImage','TeaserImage']))
                        {
                            $finalProductArray[$sixDigit]['ProductImages'][$fieldkey] = $image;
                        }
                        if(in_array($fieldkey,['altImage1','altImage2','altImage3','altImage4','altImage5','altImage6', 'altImage7', 'altImage8', 'certificationImage']))
                        {
                            $finalProductArray[$sixDigit]['AlternateImages'][$fieldkey] = $image;
                        }
                    }
                }

                if(isset($Certificate1ID) && !empty($Certificate1ID) && ($propertyAssetData = $this->getPropertyAssetData($Certificate1ID))) 
                {
                    $finalProductArray[$sixDigit]['Certification']['Certificate1'] = $propertyAssetData;
                }
                if(isset($Certificate2ID) && !empty($Certificate2ID) && ($propertyAssetData = $this->getPropertyAssetData($Certificate2ID))) 
                {
                    $finalProductArray[$sixDigit]['Certification']['Certificate2'] = $propertyAssetData;
                }

                if(isset($DocumentID) && !empty($DocumentID) && ($propertyAssetData = $this->getPropertyAssetData($DocumentID))) 
                {
                    $finalProductArray[$sixDigit]['Documents']['Document'] = $propertyAssetData;
                }
                if(isset($BrandingLaylineAssets) && !empty($BrandingLaylineAssets) && ($propertyAssetData = $this->getPropertyAssetData($BrandingLaylineAssets))) 
                {
                    $finalProductArray[$sixDigit]['Documents']['BrandingLaylineAssets'] = $propertyAssetData;
                }

                if(isset($video1) && !empty($video1) ) 
                {
                    $video1 = unserialize($video1);
                    $video1ID = $video1['data'];
                    $propertyAssetData = $this->getPropertyAssetData($video1ID);
                    $finalProductArray[$sixDigit]['Videos']['video1'] = $propertyAssetData;
                }
                if(isset($video2) && !empty($video2)) 
                {
                    $video2 = unserialize($video2);
                    $video2ID = $video2['data'];
                    $propertyAssetData = $this->getPropertyAssetData($video2ID);
                    $finalProductArray[$sixDigit]['Videos']['video2'] = $propertyAssetData;
                }
                if(isset($video3) && !empty($video3)) 
                {
                    $video3 = unserialize($video3);
                    $video3ID = $video3['data'];
                    $propertyAssetData = $this->getPropertyAssetData($video3ID);
                    $finalProductArray[$sixDigit]['Videos']['video3'] = $propertyAssetData;
                }
            }

            // $finalProductArray[$sixDigit]['skeletonData'][] = $nineDigit;
            // $finalProductArray[$sixDigit]['skeletonData'][$nineDigit]
            // Set Skeleton data only if it is not set.
            if(!isset($finalProductArray[$sixDigit]['skeletonData'][$nineDigit]) || empty($finalProductArray[$sixDigit]['skeletonData'][$nineDigit])){
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

                if(isset($resultArrSkeleton['withHelix']))
                {
                    $resultArrSkeleton['withHelix'] = ($resultArrSkeleton['withHelix'] == 1) ? 'Yes' : 'No';
                }


                if(isset($resultArrSkeleton['FittingFamily']) && $resultArrSkeleton['FittingFamily'])
                {
                    $localizedData = $this->model->getMastersLocalizedData('IFSEUProperties', 'PropertyName', 'FittingFamily', $resultArrSkeleton['FittingFamily']);
                    if($localizedData)
                    {
                        foreach ($localizedData as $lang => $langData) {
                            $resultArrSkeleton['localizedfields'][$lang]['FittingFamily'] = $langData;
                        }
                    }
                    unset($resultArrSkeleton['FittingFamily']);
                }
                

                unset($resultArrSkeleton['SIOPLevel1']);
                unset($resultArrSkeleton['SIOPLevel2']);
                unset($resultArrSkeleton['SIOPLevel3']);
                unset($resultArrSkeleton['SIOPLevel4']);
                unset($resultArrSkeleton['SIOPLevel5']);
                unset($resultArrSkeleton['SIOPLevel6']);
                unset($resultArrSkeleton['SIOPLevel7']);
                unset($resultArrSkeleton['mainImage']);
                unset($resultArrSkeleton['frontView']);
                unset($resultArrSkeleton['sideView']);
                unset($resultArrSkeleton['cutView']);
                unset($resultArrSkeleton['epixImage']);
                unset($resultArrSkeleton['altImage1']);
                unset($resultArrSkeleton['altImage2']);
                unset($resultArrSkeleton['altImage3']);
                unset($resultArrSkeleton['altImage4']);
                unset($resultArrSkeleton['altImage5']);
                unset($resultArrSkeleton['altImage6']);
                unset($resultArrSkeleton['altImage7']);
                unset($resultArrSkeleton['altImage8']);
                unset($resultArrSkeleton['certificationImage']);
                unset($resultArrSkeleton['LeftPrintCatalogImage']);
                unset($resultArrSkeleton['RightPrintCatalogImage']);
                unset($resultArrSkeleton['DrawingPictureForCatalog']);
                unset($resultArrSkeleton['BrandingLaylineAssets']);
                unset($resultArrSkeleton['Document']);
                unset($resultArrSkeleton['Certificate1']);
                unset($resultArrSkeleton['Certificate2']);
                unset($resultArrSkeleton['video1']);
                unset($resultArrSkeleton['video2']);
                unset($resultArrSkeleton['video3']);
                // p_r($resultArrSkeleton);
                // die;
                $finalProductArray[$sixDigit]['skeletonData'][$nineDigit]['id']= $nineDigit;
                $finalProductArray[$sixDigit]['skeletonData'][$nineDigit]= $resultArrSkeleton;
            }

            // Set fert data.
            if(isset($finalProductArray[$sixDigit]['skeletonData'][$nineDigit])){
                // p_r($value['oo_id']); die;
                // Get Fert Object Bricks Data.
                // $fertObjectBrickData = $this->getProductObjectBrickData($value['oo_id'],'fert');
               
                $resultArrFert1['sap_id']    =   $value['materialNumber'];
                if(!empty($fertObjectBrickData)){
                    $resultArrFert = array_merge($resultArrFert1,$fertObjectBrickData, $value);
                }else{
                    $resultArrFert = array_merge($resultArrFert1,$value);
                }

                if(isset($resultArrFert['OnStock']))
                {
                    $resultArrFert['OnStock'] = ($resultArrFert['OnStock'] == '1') ? 'Yes' : 'No';
                }
                if(isset($resultArrFert['printedCatalogFlag']))
                {
                    $resultArrFert['printedCatalogFlag'] = ($resultArrFert['printedCatalogFlag'] == '1') ? 'Yes' : 'No';
                }
                if(isset($resultArrFert['B2CStoreFlag']))
                {
                    $resultArrFert['B2CStoreFlag'] = ($resultArrFert['B2CStoreFlag'] == '1') ? 'Yes' : 'No';
                }
                if(isset($resultArrFert['eHoseProduct']))
                {
                    $resultArrFert['eHoseProduct'] = ($resultArrFert['eHoseProduct'] == '1') ? 'Yes' : 'No';
                }
                if(isset($resultArrFert['virtualCatalogFlag']))
                {
                    $resultArrFert['virtualCatalogFlag'] = ($resultArrFert['virtualCatalogFlag'] == '1') ? 'Yes' : 'No';
                }
                if(isset($resultArrFert['newItemFlagForCatalog']))
                {
                    $resultArrFert['newItemFlagForCatalog'] = ($resultArrFert['newItemFlagForCatalog'] == '1') ? 'Yes' : 'No';
                }
                if(isset($resultArrFert['proposition65WarningAttributesRequired']))
                {
                    $resultArrFert['proposition65WarningAttributesRequired'] = ($resultArrFert['proposition65WarningAttributesRequired'] == '1') ? 'Yes' : 'No';
                }
                if(isset($resultArrFert['publishedOnline']))
                {
                    $resultArrFert['publishedOnline'] = ($resultArrFert['publishedOnline'] == '1') ? 'Yes' : 'No';
                }


                $resultMasterData = [];
                if($value['californiaProposition65ChemicalName1'])
                {
                    $resultMasterData['californiaProposition65ChemicalName1'] = $value['californiaProposition65ChemicalName1'];
                }

                if($value['californiaProposition65ChemicalName2'])
                {
                    $resultMasterData['californiaProposition65ChemicalName2'] = $value['californiaProposition65ChemicalName2'];
                }

                if($value['californiaProposition65ChemicalName3'])
                {
                    $resultMasterData['californiaProposition65ChemicalName3'] = $value['californiaProposition65ChemicalName3'];
                }

                if($value['reach'])
                {
                    $resultMasterData['reach'] = $value['reach'];
                }

                if($value['rohs'])
                {
                    $resultMasterData['rohs'] = $value['rohs'];
                }

                if(count($resultMasterData) > 0)
                {
                    $fertMasterData = $this->getFertMasterData($resultMasterData);

                    if(!empty($fertMasterData)){
                        $resultArrFert = array_merge($resultArrFert, $fertMasterData);
                    }
                }

                if(isset($value['warningIcon']))
                {
                    $warningIconID = $value['warningIcon'];
                    if(isset($warningIconID) && !empty($warningIconID) && ($propertyAssetData = $this->getPropertyAssetData($warningIconID))) 
                    {
                        $resultArrFert['warningIcon'] = $propertyAssetData;
                    }
                }

                if(isset($resultArrFert['countryOfOrigin__id']))
                {
                    $resultArrFert['countryOfOrigin'] = $this->model->getCountryInfo($resultArrFert['countryOfOrigin__id']);
                    unset($resultArrFert['countryOfOrigin__id']);
                }

                if(isset($resultArrFert['materialGroup__id']))
                {
                    $resultArrFert['materialGroup'] = $this->model->getMaterialGroupInfo($resultArrFert['materialGroup__id']);
                    unset($resultArrFert['materialGroup__id']);
                }

                
                $localizedData = $this->getProductLocalizedData($value['oo_id'], 'fert');
                if($localizedData)
                {
                    $resultArrFert['localizedfields'] = $localizedData;
                }

                $fertPropertyClassFields = array(
                    'ConflictMinerals' => 'ConflictMinerals',
                );

                foreach ($fertPropertyClassFields as $propkey => $propName) {
                    if(isset($resultArrFert[$propkey]) && $resultArrFert[$propkey])
                    {
                        unset($propertySelectType);
                        if(is_array($resultArrFert[$propkey]))
                        {
                            $propertySelectType = $resultArrFert[$propkey];
                        }
                        else{
                            $propWithoutSpace = trim($resultArrFert[$propkey], ' ');
                            $propWithoutStartEndComma = trim($propWithoutSpace, ',');
                            $propWithoutStartEndComma = explode(',', $propWithoutStartEndComma);
                            $propertySelectType = $propWithoutStartEndComma;
                        }
                        
                        unset($localizedData);
                        $localizedData = $this->model->getMastersLocalizedData('IFSEUProperties', 'PropertyName', $propkey, $propertySelectType);
                        if($localizedData)
                        {
                            foreach ($localizedData as $lang => $langData) {
                                $resultArrFert['localizedfields'][$lang][$propkey] = $langData;
                            }
                        }

                        unset($resultArrFert[$propkey]);
                    }
                }
                
                unset($resultArrFert['SIOPLevel1']);
                unset($resultArrFert['SIOPLevel2']);
                unset($resultArrFert['SIOPLevel3']);
                unset($resultArrFert['SIOPLevel4']);
                unset($resultArrFert['SIOPLevel5']);
                unset($resultArrFert['SIOPLevel6']);
                unset($resultArrFert['SIOPLevel7']);
                unset($resultArrFert['mainImage']);
                unset($resultArrFert['frontView']);
                unset($resultArrFert['sideView']);
                unset($resultArrFert['cutView']);
                unset($resultArrFert['epixImage']);
                unset($resultArrFert['altImage1']);
                unset($resultArrFert['altImage2']);
                unset($resultArrFert['altImage3']);
                unset($resultArrFert['altImage4']);
                unset($resultArrFert['altImage5']);
                unset($resultArrFert['altImage6']);
                unset($resultArrFert['altImage7']);
                unset($resultArrFert['altImage8']);
                unset($resultArrFert['certificationImage']);
                unset($resultArrFert['LeftPrintCatalogImage']);
                unset($resultArrFert['RightPrintCatalogImage']);
                unset($resultArrFert['DrawingPictureForCatalog']);
                unset($resultArrFert['BrandingLaylineAssets']);
                unset($resultArrFert['Document']);
                unset($resultArrFert['Certificate1']);
                unset($resultArrFert['Certificate2']);
                unset($resultArrFert['video1']);
                unset($resultArrFert['video2']);
                unset($resultArrFert['video3']);
                unset($resultArrFert['Conditions']);
                unset($resultArrFert['manufacturingLength']);
                unset($resultArrFert['minimumOrder']);

                $finalProductArray[$sixDigit]['skeletonData'][$nineDigit]['finishedGoodsData'][]=$resultArrFert;
            }

            // Set Images.
            // $imageDataArray['fert'] = $value;
            // $imageDataArray['skeleton'] = $nineDigitData;
            
        }
        return $finalProductArray;
    }

    /**
     * Method to get product fert master attribute data
     *
     * @param array $product product data
     * @return array $soipDetail product category details array
     * @throws
     */
    private function getFertMasterData($resultMasterData)
    {
        $classId = $this->appService->getPimcoreClassIdbyName('IFSEUProperties');

        foreach ($resultMasterData as $key => $objectId) {
            if($objectId)
            {
                $resultMasterData[$key] = $this->model->getPropertyName($objectId, $classId);
            }
        }

        return $resultMasterData;
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
        $ehoseMap = $this->getEHoseFieldMapping();
        foreach($ehoseMap['ehoseAPI']['Base']['Object'] as $key=>$value){
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
     * Method to get Skeleton data details
     *
     * @param int $skeltonParentId Object Id
     * @return array $skeltonDetail Skeleton data array
     * @throws
     */
    private function getSkeletonData($skeltonParentId){
        $skeltonDetail = [];
        $skeltonDetail  =   $this->model->getProductTypeData($skeltonParentId,'skeleton',$this->ehose);
        return $skeltonDetail;
    }

    /**
     * Method to get Base data details
     *
     * @param int $baseParentId Object Id
     * @return array $baseDetail Base data array
     * @throws
     */
    private function getBaseData($baseParentId){
        $baseDetail = [];
        $brandName = '';
        $baseDetail  =   $this->model->getProductTypeData($baseParentId,'base',$this->ehose);
        // Getting brand name from object_query_3 table
        if(isset($baseDetail['productBrandName']) && !empty($baseDetail['productBrandName'])) {
            $brandName  =   $this->model->getBrandName($baseDetail['productBrandName']);
            if(!empty($brandName)){
                $baseDetail['productBrandName'] = $brandName;
            }else{
                unset($baseDetail['productBrandName']);
            }
        }
        if(isset($baseDetail['brandConstruction']) && !empty($baseDetail['brandConstruction'])) {
            $brandConstruction  =   $this->model->getBrandName($baseDetail['brandConstruction']);
            if(!empty($brandConstruction)){
                $baseDetail['brandConstruction'] = $brandConstruction;
            }else{
                unset($baseDetail['brandConstruction']);
            }
        }
        
        if(isset($baseDetail['Category']) && !empty($baseDetail['Category'])) {
            $category  =   $this->model->getCategoryName($baseDetail['Category']);
            if(!empty($category)){
                $baseDetail['Category'] = $category;
            }else{
                unset($baseDetail['Category']);
            }
        }

        if(isset($baseDetail['Sub_Category']) && !empty($baseDetail['Sub_Category'])) {
            $subCategory  =   $this->model->getSubCategoryName($baseDetail['Sub_Category']);
            if(!empty($subCategory)){
                $baseDetail['Sub_Category'] = $subCategory;
            }else{
                unset($baseDetail['Sub_Category']);
            }
        }
        // Getting document URL from object_metadata_1 table
        $documentID  =   $this->model->getDocumentId($baseDetail['oo_id']);
        if(!empty($documentID)){
            $baseDetail['document'] = $documentID;
        }
        // Getting all features from object_localized_29_en table
        if(isset($baseDetail['FeaturesBenefitsBulletPoint']) && !empty($baseDetail['FeaturesBenefitsBulletPoint'])) {
            $classId = $this->appService->getPimcoreClassIdbyName('IFSEUProperties');
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
    private function getImagesData($existingImageArray,$imageDataArray){

        $imageDetail = [];
        if(!empty($existingImageArray)){
            $imageDetail =   $existingImageArray;
        }
        foreach($imageDataArray as $key=>$value){
            $imagesFields = $this->ehose['ehoseAPI'][ucfirst($key)]['Images'];
            $variantId = '';
            // if($key=='fert'){
            //     $variantId = $value['materialNumber'];
            // }else if($key=='skeleton'){
            //     $variantId = substr($oldMaterialValue,0,9);
            // }else if($key=='base'){
            //     $variantId = substr($oldMaterialValue,0,6);
            // }

            foreach($imagesFields as $ikey=>$ivalue){
                if(isset($value[$ivalue]) && !empty($value[$ivalue])){
                    if(!isset($imageDetail[$value[$ivalue]]) || empty($imageDetail[$value[$ivalue]])){
                        if( $propertyAssetData = $this->getPropertyAssetData($value[$ivalue])){
                            $imageDetail[$ivalue] = $propertyAssetData;  
                        }
                    }
                    // if( $this->getPropertyAssetData($value[$ivalue])){
                    //     $imageDetail[$value[$ivalue]]['variant_ids'][] = $variantId;
                    //     $imageDetail[$value[$ivalue]]['variant_ids']   = array_unique($imageDetail[$value[$ivalue]]['variant_ids']);
                    // }
                    
                }
            }
        }
        return $imageDetail;
    }

    /**
     * Method to get object localized field detail
     *
     * @param int $objId Object Id
     * @param string $productType Product Type (Fert/Skeleton/Base)
     * @return array $productObjectBricksData objectBrick Data.
     * @throws
     */
    private function getProductLocalizedData($objId,$productType){
        $productObjectBricksData = [];

        // Get Product Object Brick Config Details.
        $localizedFieldMapping = $this->ehose['ehoseAPI'][ucfirst($productType)]['Localizedfields'];

        if(empty($localizedFieldMapping)){
            return;
        }
        $productObjectBricksData =  $this->model->getProductLocalizedData($objId, $localizedFieldMapping);
        return $productObjectBricksData;
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
        $objectBricksMap = $this->ehose['ehoseAPI'][ucfirst($productType)]['ObjectBricks'];
        // p_r($objectBricksMap); 
        if(empty($objectBricksMap)){
            return;
        }

        foreach($objectBricksMap as $bkey=>$bvalue){
            if(isset($bvalue['Fields']) && !empty($bvalue['Fields'])){
                foreach($bvalue['Fields'] as $fieldName=>$fieldConfig){

                    $brickText = "get".ucfirst($bkey).ucfirst($productType);
                    $fieldText = "get".ucfirst($fieldName);

                    //receiving data of a Objectbrick
                    $product = DataObject\IFSEUProduct::getById($objId);
                    $bData  =   '';
                    // Get Field Definition.
                    // if($fieldName == 'FittingFamily')
                    // {
                    if($product->$productBrickField()->$brickText()){
                    
                        $fieldDef = $product->$productBrickField()->$brickText()->getDefinition()->getFieldDefinition($fieldName);
                        if(!empty($fieldDef) && $fieldDef->getFieldtype()==="multiselect"){
                             $bDataTmp  =   $product->$productBrickField()->$brickText()->$fieldText();
                             $bData = [];
                             if(!empty($bDataTmp)){
                                foreach($bDataTmp as $mkey=>$mvalue){
                                    if($fieldName ==='brandName')
                                    {
                                        $bData[] =  $mvalue;
                                    }
                                    else
                                    {
                                        $objectIndv = DataObject::getById($mvalue);
                                        if($objectIndv instanceof DataObject\IFSEUApplications) {
                                            $bData[] = $objectIndv->getId();
                                        }
                                        else if($objectIndv instanceof DataObject\IFSEUFlowMedium) {
                                            $bData[] = $objectIndv->getId();
                                        }
                                        else if($objectIndv instanceof DataObject\IFSEUNorm) {
                                            $bData[] = $objectIndv->getId();
                                        }
                                        else if($objectIndv instanceof DataObject\IFSEUProperties) {
                                            $bData[] = $objectIndv->getId();
                                            // p_r($bData);
                                        }
                                    }
                                }
                             }
// echo "first";
                       }
                       else if(!empty($fieldDef) && $fieldDef->getFieldtype()==="select" && $fieldName !=="staticWireType")
                       {
                        // echo "second";
                            $bData = $product->$productBrickField()->$brickText()->$fieldText();
                            $objectIndv = DataObject::getById($bData);
                            if($objectIndv instanceof DataObject\IFSEUProperties)
                            {
                                $bData = $objectIndv->getId();
                            }
                       }
                       else{
                        // echo "third";
                            $bData  =   $product->$productBrickField()->$brickText()->$fieldText();
                       }
                    }
                    if(!empty($bData) || $bData===0){  
                        
                        if(is_array($fieldConfig[0]) && array_key_first($fieldConfig[0]) === "numeric" ){
                            $decimalPoints = $fieldConfig[0]["numeric"] ?? DEFAULT_DECIMAL_PLACES_IN_EHOSE_API;
                            $bData = round(strval($bData), $decimalPoints);
                        }
                        $productObjectBricksData[$fieldName] = $bData;
                    }
                // }
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
            $assetIdPath = trim($assetIdPath,',');
            $assetDetail = explode("|", $assetIdPath);
            $assetFileId = $assetDetail[1];
            if($assetFileId)
            {
                $asset = Asset::getById($assetFileId);
                $assetId= $assetFileId;
            }
            else{
                $asset = Asset::getById($assetIdPath);
                $assetId= $assetIdPath;
            }
            
            if(!$asset){
                return null;
            }
        }else{
            $asset = Asset::getByPath($assetIdPath);
            if(!$asset){
                return null;
            }
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
            $formattedArray[$i]['skeletonData'] =array_values($value['skeletonData']);
            // if(is_array($value['images'])){
            //     $formattedArray[$i]['images'] =array_values($value['images']);
            // }
            $i++;
        }
        return $formattedArray;
    }

    /**
     * Method to get eHose Field Mapping.
     *
     * @return array $vcFieldMapping eHose mapping configuration.
     */
    public function getEHoseFieldMapping()
    {
        $vcFieldMapping = array();
        $yamlFilePath = PIMCORE_PROJECT_ROOT . "/src/IFSEU/RestApiBundle/Resources/config/ehoseFieldMapping.yml";

        $vcFieldMapping = Utils::getYmlConfig($yamlFilePath);

        return $vcFieldMapping;
    }
}