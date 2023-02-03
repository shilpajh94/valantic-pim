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
use Symfony\Component\Yaml\Yaml;


class ProductModelService {
    private $model;
    private $appService;
    private $vCatalog = [];
    private $brandData;

    private $customFields = [
        'coverCharacteristic' => 'coverCharacteristicId', 
        'coverMaterial' => 'coverMaterialId', 
        'tubeMaterial' => 'tubeMaterialId',
        'staticWireType' => 'staticWireType'
    ];

    /**
     * @var Pimcore\Model\DataObject
     */
    private $mainClass = "\\Pimcore\\Model\\DataObject\\";

    public function __construct(AppService $appService) {
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

    public function getProduct($langCode, $parameterArray) {
        $productDetail = [];
        $this->vCatalog = $this->getVirtualCatalogFieldMapping();
        $conditionString = $this->model->getConditionString($parameterArray, "fert");
        $conArray["condition"] = $conditionString;
        $conArray["fields"] = ["oo_id" => ["string"]];
        $totalCount = $this->model->getTotalCount($langCode, $conArray);
        //fetch product order by brand
        // $productsByBrand = $this->model->fetchProductByBrandOrdering($langCode, $parameterArray,'fert',$this->vCatalog);
        //return $filterProductBrandWise = $this->filterProductBrandWise($productsByBrand);
        // these are all ferts with offset, limit and conditions
        $products = $this->model->fetchProduct($langCode, $parameterArray, "fert", $this->vCatalog);
        if ($products) {
            $productDetail["apikey"] = $parameterArray["apiKey"];
            // iterating all the ferts and fetching their 9 digit and 6 digit data
            $productData = $this->getProductDetail($products, $langCode);
            $productDetail["total"] = strval($totalCount);
            $productDetail["products"] = $this->formatProducts($productData);
        }
        return $productDetail;
    }

    public function getProductNewAPI($langCode, $parameterArray) {
        $productDetail = [];
        $this->vCatalog = $this->getVirtualCatalogFieldMapping();
        $conditionString = $this->model->getConditionStringNewAPI($parameterArray, "fert");
        $conArray["condition"] = $conditionString;
        $conArray["fields"] = ["`vc`.`oo_id`" => ["customString"]];
        $totalCount = $this->model->getTotalCountNewAPI($langCode, $conArray);
        //fetch product order by brand
        // $productsByBrand = $this->model->fetchProductByBrandOrdering($langCode, $parameterArray,'fert',$this->vCatalog);
        //return $filterProductBrandWise = $this->filterProductBrandWise($productsByBrand);
        // these are all ferts with offset, limit and conditions
        $products = $this->model->fetchProductNewAPI($langCode, $parameterArray, "fert", $this->vCatalog);
        // p_r($products); die;
        if ($products) {
            $productDetail["apikey"] = $parameterArray["apiKey"];
            // iterating all the ferts and fetching their 9 digit and 6 digit data
            $productData = $this->getProductDetailNewAPI($products, $langCode);
            $productDetail["total"] = strval($totalCount);
            $productDetail["products"] = $this->formatProducts($productData);
        }
        return $productDetail;
    }

    public function getBrandSorter(){

        $brandsArray = $this->model->getBrandsWithSorterObjectsMapped();
        foreach($brandsArray as $eachBrand){
            $brandId = $eachBrand['brand_id'];
            if($eachBrand['sorting'] == NULL){
                $arr[$brandId] = $this->model->getProductsForTheRequiredBrand($brandId);
            }else{
                $groupingFieldNameForSorting = $eachBrand['sorting_GroupingField'];
                if($eachBrand['sorting'] != 'asc' && $eachBrand['sorting'] != 'desc'){
                    $sortingData = json_decode($eachBrand['sorting'], TRUE);
                    $sortingData = array_keys($sortingData);
                }else{
                    $sortingData = $eachBrand['sorting'];
                }
                $brickName = $this->getSortingFieldDataFromConfig($groupingFieldNameForSorting);
                $arr[$brandId] = $this->model->getProductsInSortedFormat($brandId,$groupingFieldNameForSorting,$sortingData, $brickName);
    
            }
        }
        return ($arr);
    }

    public function getSortingFieldDataFromConfig($groupingFieldNameForSorting){
        $groupingFieldsConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT . '/src/RestApiBundle/Resources/config/config.yml');
        if(array_key_exists($groupingFieldNameForSorting,$groupingFieldsConfig['parameters']['grouping_fields'])){
            return $groupingFieldsConfig['parameters']['grouping_fields'][$groupingFieldNameForSorting]['container_name'];
        }
        return null;
    }

    private function filterProductBrandWise($products) {
        $brandArray = [];
        foreach ($products as $product) {
            
            if ($product["brandName"] != "" && $product["brandName"] != null) {
                $brandArray[$product["brandName"]]["products"][] = $product["oo_id"];
            } else if($product["brandName"] == "" || $product["brandName"] == null){
                $brandArray["non-brand"]["products"][] = $product["oo_id"]."~~".$product["brandName"];
            }
            if (!isset($brandArray[$product["brandName"]]["info"]) && $product["brandName"] != "" && $product["brandName"] != null) {
                $brandDetails = $this->model->getBrandInfo($product["brandName"]);
                $brandArray[$product["brandName"]]["name"] = $brandDetails["name"];
                if (isset($brandDetails["VirtualCatalogApiSorter__id"]) && $brandDetails["VirtualCatalogApiSorter__id"] != "" && $brandDetails["VirtualCatalogApiSorter__id"] != null) {
                    $sortArray = $this->model->getVirtualCatalogApiSorter($brandDetails["VirtualCatalogApiSorter__id"]);
                    if(isset($sortArray) && $sortArray != null) {
                        $brandArray[$product["brandName"]]["grouping"]  = $sortArray['GroupingField'];
                    }
                    if(isset($sortArray['Columns']) && $sortArray['Columns'] != "" && $sortArray['Columns']!= null && $sortArray['Columns']!= '{}') {
                        $brandArray[$product["brandName"]]["sorting"]  = array_keys(json_decode($sortArray['Columns'],true));
                    } else {
                        $brandArray[$product["brandName"]]["sorting"]  = $sortArray['Order'];
                    }
                }
                if (isset($brandDetails["VirtualCatalogApiMapper__id"]) && $brandDetails["VirtualCatalogApiMapper__id"] != "" && $brandDetails["VirtualCatalogApiMapper__id"] != null) {
                    $mappingArray = $this->model->getVirtualCatalogApiMapper($brandDetails["VirtualCatalogApiMapper__id"]);
                    if(isset($mappingArray['originalValues']) && $mappingArray['originalValues'] != "" && $mappingArray['originalValues']!= null) {
                        $brandArray[$product["brandName"]]["mapping"]  = explode("/n",$mappingArray['originalValues']);
                    }
                }
            }
        }
        return $brandArray;	

        // print_r($brandArray);
        // die();
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

    private function getProductDetail($products) {
        $finalProductArray = [];
        if (empty($products)) {
            return $finalProductArray;
        }
        foreach ($products as $key => $value) {
            $finalProductArrayTemp = $value;
            $finalProductArrayTemp["id"] = $finalProductArrayTemp["oo_id"];
            $baseObjectBrickData = $this->getProductObjectBrickData($value["o_parentId"], "base");
            $skeletonObjectBrickData = $this->getProductObjectBrickData($value["oo_id"], "skeleton");
            $fertObjectBrickData = $this->getProductObjectBrickData($value["oo_id"], "fert");
            $sixDigit = substr($value["oldMaterialCode"], 0, 6);
            $nineDigit = substr($value["oldMaterialCode"], 0, 9);
            $finalProductArrayTemp["6digit"] = $sixDigit;
            $finalProductArrayTemp["id"] = $nineDigit;
            $siopData = $this->getSoipDetails($value);
            foreach ($siopData as $key => $data) {
                if ($key == "ProductCategory") {
                    $finalProductArrayTemp["SIOP Categories"] = $data;
                } else {
                    $finalProductArrayTemp[$key] = $data;
                }
            }
            $certificationImageID = $value["certificationImage"];
            $certificationDocumentID = $value["document"];
            $finalProductArrayTemp = array_merge($finalProductArrayTemp, $baseObjectBrickData, $skeletonObjectBrickData, $fertObjectBrickData);
            $finalProductArrayTemp["sixDigitVirtualCatalogDescription"] = $sixDigit . "-" . $baseObjectBrickData["sixDigitVirtualCatalogDescription"];
            $finalProductArrayTemp = array_merge($value, $finalProductArrayTemp);
            $finalProductArrayTemp["sap_id"] = $value["articleNumber"];
            if (isset($value["brandName"]) && !empty($value["brandName"])) {
                $brandName = $this->model->getBrandName($value["brandName"]);
                if (!empty($brandName)) {
                    $finalProductArrayTemp["brandName"] = $brandName;
                } else {
                    unset($finalProductArrayTemp["brandName"]);
                }
            }
            $documentID = $this->model->getDocumentId($value["oo_id"]);
            if (!empty($documentID)) {
                $finalProductArrayTemp["document"] = $documentID;
            }
            // Getting all features from object_localized_29_en table
            if (isset($value["FeaturesBenefitsBulletPoint"]) && !empty($value["FeaturesBenefitsBulletPoint"])) {
                $classId = $this->appService->getPimcoreClassIdbyName("Features");
                $featureList = $this->model->getFeatures($value["FeaturesBenefitsBulletPoint"], $classId);
                if (!empty($featureList)) {
                    $finalProductArrayTemp["FeaturesBenefitsBulletPoint"] = $featureList;
                }
            }
            unset($finalProductArrayTemp["oo_id"]);
            unset($finalProductArrayTemp["o_parentId"]);
            unset($finalProductArrayTemp["mainImage"]);
            unset($finalProductArrayTemp["frontView"]);
            unset($finalProductArrayTemp["sideView"]);
            unset($finalProductArrayTemp["cutView"]);
            unset($finalProductArrayTemp["articleNumber"]);
            unset($finalProductArrayTemp["SIOPLevel2"]);
            unset($finalProductArrayTemp["SIOPLevel3"]);
            unset($finalProductArrayTemp["SIOPLevel4"]);
            unset($finalProductArrayTemp["category"]);
            unset($finalProductArrayTemp["subCategory"]);
            unset($finalProductArrayTemp["fittingCategory"]);
            unset($finalProductArrayTemp["fittingSubCategory"]);
            // Set Images.
            $imageDataArray["fert"] = $value;
            $images = $this->getImagesData($value["images"], $imageDataArray, $value["oldMaterialCode"]);
            if (count($images) > 0) {
                $finalProductArrayTemp["images"] = $images;
            }
            // To get the base alt image & document URL
            if (isset($certificationImageID) && !empty($certificationImageID) && ($propertyAssetData = $this->getPropertyAssetData($certificationImageID))) {
                $finalProductArrayTemp["CertificationImage"] = $propertyAssetData;
            }
            if (isset($certificationDocumentID) && !empty($certificationDocumentID) && ($propertyAssetData = $this->getPropertyAssetData($certificationDocumentID))) {
                $finalProductArrayTemp["CertificationDocument"] = $propertyAssetData;
            }
            $finalProductArray[] = $finalProductArrayTemp;
        }
        return $finalProductArray;
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

     private function getProductDetailNewAPI($products) {
        
        $finalProductArray = [];
        if (empty($products)) {
            return $finalProductArray;
        }
        foreach ($products as $key => $value) {
            
            $finalProductArrayTemp = $value;
            $finalProductArrayTemp["id"] = $finalProductArrayTemp["oo_id"];
            $baseObjectBrickData = $this->getProductObjectBrickData($value["oo_id"], "base");
            // p_r($baseObjectBrickData);
            $skeletonObjectBrickData = $this->getProductObjectBrickData($value["oo_id"], "skeleton");
            $fertObjectBrickData = $this->getProductObjectBrickData($value["oo_id"], "fert");
            $sixDigit = substr($value["oldMaterialCode"], 0, 6);
            $nineDigit = substr($value["oldMaterialCode"], 0, 9);
            $finalProductArrayTemp["6digit"] = $sixDigit;
            $finalProductArrayTemp["id"] = $nineDigit;
            $siopData = $this->getSoipDetails($value);
            foreach ($siopData as $key => $data) {
                if ($key == "ProductCategory") {
                    $finalProductArrayTemp["SIOP Categories"] = $data;
                } else {
                    $finalProductArrayTemp[$key] = $data;
                }
            }
            $certificationImageID = $value["certificationImage"];
            $certificationDocumentID = $value["document"];
            $finalProductArrayTemp = array_merge($finalProductArrayTemp, $baseObjectBrickData, $skeletonObjectBrickData, $fertObjectBrickData);
            $finalProductArrayTemp["sixDigitVirtualCatalogDescription"] = $sixDigit . "-" . $baseObjectBrickData["sixDigitVirtualCatalogDescription"];
            $finalProductArrayTemp = array_merge($value, $finalProductArrayTemp);
            $finalProductArrayTemp["sap_id"] = $value["articleNumber"];
            $reinforcement = $value["reinforcement"];
            
            $GroupingFieldIdNameList = [];
            if (isset($value["brandName"]) && !empty($value["brandName"])) {
                
                if(!isset($this->brandData[$value["brandName"]]))
                {
                    $brandData = $this->model->getBrandNameNewAPI($value["brandName"]);
                    $this->brandData[$value["brandName"]] = $brandData;
                }

                $brandName = $this->brandData[$value["brandName"]]['BrandName'];

                $GroupingField = $this->brandData[$value["brandName"]]['GroupingField'];
                $originalValues = $this->brandData[$value["brandName"]]['originalValues'];

                if($GroupingField)
                {
                    if($GroupingField == 'reinforcement'){
                        $reinforcementId = trim($reinforcement,',');
                        if($reinforcementId)
                        {
                            $GroupingFieldIdNameList[] = ($originalValues[$reinforcementId]['alias']) ? $originalValues[$reinforcementId]['alias'] : $originalValues[$reinforcementId]['original'];
                        }
                    }
                    else if($GroupingField == 'staticWireType'){
                        $staticWireTypeValue = $finalProductArrayTemp["staticWireType"];
                        if($staticWireTypeValue)
                        {
                            $GroupingFieldIdNameList[] = ($originalValues[$staticWireTypeValue]['alias']) ? $originalValues[$staticWireTypeValue]['alias'] : $originalValues[$staticWireTypeValue]['original'];
                        }
                    }
                    else if(isset($this->customFields[$GroupingField])){
                        $GroupingFieldIdName = $this->customFields[$GroupingField];
                        $GroupingFieldValueList =  $finalProductArrayTemp[$GroupingFieldIdName];
                        
                        if($GroupingFieldValueList)
                        {
                            foreach ($GroupingFieldValueList as $gfValue) {
                                $GroupingFieldIdNameList[] = ($originalValues[$gfValue]['alias']) ? $originalValues[$gfValue]['alias'] : $originalValues[$gfValue]['original'];
                            }
                        }
                    }
                    else{
                        $GroupingFieldIdNameList[] = $finalProductArrayTemp[$GroupingField];
                    }
                }

                if (!empty($brandName)) {
                    $finalProductArrayTemp["brandName"] = $brandName;
                } else {
                    unset($finalProductArrayTemp["brandName"]);
                }
            }

            // unset the temporary variable
            foreach ($this->customFields as $ckey => $cvalue) {
                unset($finalProductArrayTemp[$ckey]);
                unset($finalProductArrayTemp[$cvalue]);
            }

            $GroupingFieldIdNameStr = $brandName;

            if($GroupingFieldIdNameList)
            {
                $GroupingFieldIdNameStr = $brandName . " ". implode(',', $GroupingFieldIdNameList);
                $GroupingFieldIdNameStr = trim($GroupingFieldIdNameStr,' ');
            }
            $finalProductArrayTemp["_parent_name"] = $GroupingFieldIdNameStr;
            unset($GroupingFieldIdNameList);

            $documentID = $this->model->getDocumentId($value["oo_id"]);
            if (!empty($documentID)) {
                $finalProductArrayTemp["document"] = $documentID;
            }
            // Getting all features from object_localized_29_en table
            if (isset($value["FeaturesBenefitsBulletPoint"]) && !empty($value["FeaturesBenefitsBulletPoint"])) {
                $classId = $this->appService->getPimcoreClassIdbyName("Features");
                $featureList = $this->model->getFeatures($value["FeaturesBenefitsBulletPoint"], $classId);
                if (!empty($featureList)) {
                    $finalProductArrayTemp["FeaturesBenefitsBulletPoint"] = $featureList;
                }
            }
            unset($finalProductArrayTemp["oo_id"]);
            unset($finalProductArrayTemp["o_parentId"]);
            unset($finalProductArrayTemp["mainImage"]);
            unset($finalProductArrayTemp["frontView"]);
            unset($finalProductArrayTemp["sideView"]);
            unset($finalProductArrayTemp["cutView"]);
            unset($finalProductArrayTemp["articleNumber"]);
            unset($finalProductArrayTemp["SIOPLevel2"]);
            unset($finalProductArrayTemp["SIOPLevel3"]);
            unset($finalProductArrayTemp["SIOPLevel4"]);
            unset($finalProductArrayTemp["category"]);
            unset($finalProductArrayTemp["subCategory"]);
            unset($finalProductArrayTemp["fittingCategory"]);
            unset($finalProductArrayTemp["fittingSubCategory"]);
            unset($finalProductArrayTemp["reinforcement"]);
            // Set Images.
            $imageDataArray["fert"] = $value;
            $images = $this->getImagesData($value["images"], $imageDataArray, $value["oldMaterialCode"]);
            if (count($images) > 0) {
                $finalProductArrayTemp["images"] = $images;
            }
            // To get the base alt image & document URL
            if (isset($certificationImageID) && !empty($certificationImageID) && ($propertyAssetData = $this->getPropertyAssetData($certificationImageID))) {
                $finalProductArrayTemp["CertificationImage"] = $propertyAssetData;
            }
            if (isset($certificationDocumentID) && !empty($certificationDocumentID) && ($propertyAssetData = $this->getPropertyAssetData($certificationDocumentID))) {
                $finalProductArrayTemp["CertificationDocument"] = $propertyAssetData;
            }
            $finalProductArray[] = $finalProductArrayTemp;
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

    private function getSoipDetails($product) {
        $siopDetail = [];
        if (empty($product)) {
            return $siopDetail;
        }
        $vCatalogMap = $this->getVirtualCatalogFieldMapping();
        foreach ($vCatalogMap["VirtualCatalog"]["Object"] as $key => $value) {
            foreach ($value as $k1 => $v1) {
                if (isset($product[$k1]) && !empty($product[$k1])) {
                    $classToLoad = $this->mainClass . $key;
                    $objClass = $classToLoad . "\\Listing";
                    $productCat = new $objClass();
                    $productCat->setObjectTypes([DataObject\AbstractObject::OBJECT_TYPE_OBJECT, ]);
                    $productCat->addConditionParam(" oo_id = ?", trim($product[$k1], ","), "AND");
                    $productCat->setUnpublished(true);
                    $productCat->load();
                    $productCat = $productCat->getObjects();
                    $tempArray = [];
                    if (isset($productCat) && count($productCat) > 0) {
                        $productCategory = $productCat[0];
                        foreach ($v1["Fields"] as $fkey => $fvalue) {
                            $fCommand = "get" . $fvalue;
                            $tempArray[strtolower($fvalue) ] = $productCategory->$fCommand();
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

    private function getSkeletonData($skeltonParentId) {
        $skeltonDetail = [];
        $skeltonDetail = $this->model->getProductTypeData($skeltonParentId, "skeleton", $this->vCatalog);
        return $skeltonDetail;
    }

    /**
     * Method to get Base data(6Digit) details
     *
     * @param int $baseParentId Object Id
     * @return array $baseDetail Base data array
     * @throws
     */

    private function getBaseData($baseParentId) {
        $baseDetail = [];
        $brandName = "";
        $baseDetail = $this->model->getProductTypeData($baseParentId, "base", $this->vCatalog);
        // Getting brand name from object_query_3 table
        if (isset($baseDetail["brandName"]) && !empty($baseDetail["brandName"])) {
            $brandName = $this->model->getBrandName($baseDetail["brandName"]);
            if (!empty($brandName)) {
                $baseDetail["brandName"] = $brandName;
            } else {
                unset($baseDetail["brandName"]);
            }
        }
        // Getting document URL from object_metadata_1 table
        $documentID = $this->model->getDocumentId($baseDetail["oo_id"]);
        if (!empty($documentID)) {
            $baseDetail["document"] = $documentID;
        }
        // Getting all features from object_localized_29_en table
        if (isset($baseDetail["FeaturesBenefitsBulletPoint"]) && !empty($baseDetail["FeaturesBenefitsBulletPoint"])) {
            $classId = $this->appService->getPimcoreClassIdbyName("Features");
            $featureList = $this->model->getFeatures($baseDetail["FeaturesBenefitsBulletPoint"], $classId);
            if (!empty($featureList)) {
                $baseDetail["FeaturesBenefitsBulletPoint"] = $featureList;
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

    private function getImagesData($existingImageArray, $imageDataArray, $oldMaterialValue) {
        $imageDetail = [];
        if (!empty($existingImageArray)) {
            $imageDetail = $existingImageArray;
        }
        foreach ($imageDataArray as $key => $value) {
            $imagesFields = $this->vCatalog["VirtualCatalog"]["Images"];
            $variantId = "";
            if ($key == "fert") {
                $variantId = $value["articleNumber"];
            } elseif ($key == "skeleton") {
                $variantId = substr($oldMaterialValue, 0, 9);
            } elseif ($key == "base") {
                $variantId = substr($oldMaterialValue, 0, 6);
            }
            foreach ($imagesFields as $ikey => $ivalue) {
                if (isset($value[$ivalue]) && !empty($value[$ivalue])) {
                    if (!isset($imageDetail[$value[$ivalue]]) || empty($imageDetail[$value[$ivalue]])) {
                        if ($propertyAssetData = $this->getPropertyAssetData($value[$ivalue])) {
                            $imageDetail[$value[$ivalue]] = $propertyAssetData;
                        }
                    }
                    if ($this->getPropertyAssetData($value[$ivalue])) {
                        $imageDetail[$value[$ivalue]]["variant_ids"][] = $variantId;
                        $imageDetail[$value[$ivalue]]["variant_ids"] = array_unique($imageDetail[$value[$ivalue]]["variant_ids"]);
                    }
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

    private function getProductObjectBrickData($objId, $productType) {
        // p_r("objectid - $objId, productType - $productType");
        $productObjectBricksData = [];
        $productBrickField = "get" . ucfirst($productType);

        // Get Product Object Brick Config Details.
        $objectBricksMap = $this->vCatalog["VirtualCatalog"]["ObjectBricks"][ucfirst($productType) ];
        foreach ($objectBricksMap as $bkey => $bvalue) {
            if (isset($bvalue["Fields"]) && !empty($bvalue["Fields"])) {
                foreach ($bvalue["Fields"] as $fieldName => $fieldConfig) {
                    $brickText = "get" . ucfirst($bkey) . ucfirst($productType);
                    $fieldText = "get" . ucfirst($fieldName);
                    
                    //receiving data of a Objectbrick
                    $product = DataObject\Product::getById($objId);
                    $bData = "";
                    $bDataIds = [];
                    // Get Field Definition.
                    if ($product->$productBrickField()->$brickText()) {
                        $fieldDef = $product->$productBrickField()->$brickText()->getDefinition()->getFieldDefinition($fieldName);
                        if (!empty($fieldDef) && $fieldDef->getFieldtype() === "multiselect") {
                            
                            $bDataTmp = $product->$productBrickField()->$brickText()->$fieldText();
                            $bData = [];
                            if (!empty($bDataTmp)) {
                                
                                foreach ($bDataTmp as $mkey => $mvalue) {
                                    if ($fieldName === "brandName") {
                                        $bData[] = $mvalue;
                                    } else {
                                        
                                        $objectIndv = DataObject::getById($mvalue);
                                        if ($objectIndv) {
                                            $bDataIds[] = $mvalue;
                                            $bData[] = $objectIndv->getName();
                                        }
                                    }
                                }
                            }
                        } else {
                            $bData = $product->$productBrickField()->$brickText()->$fieldText();
                        }
                    }
                    if (!empty($bData) || $bData === 0) {
                        if (is_array($fieldConfig[0]) && array_key_first($fieldConfig[0]) === "numeric") {
                            $decimalPoints = $fieldConfig[0]["numeric"]??DEFAULT_DECIMAL_PLACES_IN_VIRTUAL_CATALOG_API;
                            $bData = round(strval($bData), $decimalPoints);
                        }
                        $productObjectBricksData[$fieldName] = $bData;
                    }

                    if(isset($this->customFields[$fieldName]))
                    {
                        if($bDataIds)
                        {
                            $productObjectBricksData[$this->customFields[$fieldName]] = $bDataIds;
                        }
                        else{
                            $productObjectBricksData[$this->customFields[$fieldName]] = $bData;
                        }
                        
                    }
                }
            }
        }
        return $productObjectBricksData;
    }

    /**
     * Method to get Asset property detail
     *
     * @param string $assetIdPath Asset Id/ Asset Path
     * @param int $assetIdflag True/False
     * @return array $data Asset Property data.
     * @throws
     */

    private function getPropertyAssetData($assetIdPath, $assetIdflag = true) {
        $assetId = "";
        if ($assetIdflag) {
            $asset = Asset::getById($assetIdPath);
            if (!$asset) {
                return null;
            }
            $assetId = $assetIdPath;
        } else {
            $asset = Asset::getByPath($assetIdPath);
            if (!$asset) {
                return null;
            }
            $assetId = $asset->getId();
        }
        $assetType = $asset->getType();
        $assetForThumb = ["image", "document"];
        $data = [];
        $data["mime_type"] = $asset->getMimetype();
        $data["filename"] = $asset->getFilename();
        $data["created_at"] = date("Y-m-d H:i:s", $asset->getCreationDate());
        $data["updated_at"] = date("Y-m-d H:i:s", $asset->getModificationDate());
        $assetUrl = $this->getImageGalleryPaths($assetId);
        $data["src"] = $assetUrl;
        return $data;
    }

    /**
     * To get name/path of images of a gallery
     *
     * @param  int $assetId Asset Id
     * @return string $assetPath Asset Path
     */

    protected function getImageGalleryPaths($assetId) {
        $assetPath = "";
        if (!empty($assetId)) {
            $assetObject = Asset::getById($assetId);
            if (!empty($assetObject)) {
                if (PIMCORE_TRANSFORMED_ASSET_URL) {
                    $assetPath = PIMCORE_TRANSFORMED_ASSET_URL . $assetObject->getPath() . $assetObject->getFileName();
                } else {
                    $protocol = stripos($_SERVER["SERVER_PROTOCOL"], "https") === true ? "https://" : "http://";
                    $host = $_SERVER["SERVER_NAME"];
                    $assetPath = $protocol . $host . $assetObject->getPath() . $assetObject->getFileName();
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

    private function formatProducts($productData) {
        $formattedArray = [];
        $i = 0;
        foreach ($productData as $key => $value) {
            $formattedArray[$i] = $value;
            //$formattedArray[$i]['9digit'] =array_values($value['9digit']);
            if (is_array($value["images"])) {
                $formattedArray[$i]["images"] = array_values($value["images"]);
            }
            $i++;
        }
        return $formattedArray;
    }

    /**
     * Method to get Virtual Catalog Field Mapping.
     *
     * @return array $vcFieldMapping virtual catalog mapping configuration.
     */

    public function getVirtualCatalogFieldMapping() {
        $vcFieldMapping = [];
        $yamlFilePath = PIMCORE_PROJECT_ROOT . "/src/RestApiBundle/Resources/config/virtualCatalogFieldMapping.yml";
        $vcFieldMapping = Utils::getYmlConfig($yamlFilePath);
        return $vcFieldMapping;
    }

    public function getBrandData() {
        return $this->model->getDistinctBrand(); 
    }

}
