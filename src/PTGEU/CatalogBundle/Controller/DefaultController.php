<?php

namespace PTGEU\CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;

class DefaultController extends AbstractController
{
    private $featuresList = [];
    private $s3srcArr = [];
    private $attrbuteImgS3Arr = [];
    
    private $columnsData = [];
    private $sortColumnsData = [];
    private $initialSortingAttributesName = [];
    private $attributeImages = [];
    private $iconRequired = 'NO';
    private $subHeaderRequired = 'NO';
    private $catalogTemplatingHelper;
    private $db;

    const COMMON_HELPER = 'app.common_helper';
    const CATALOG_CONFIG_PROVIDER_SERVICE = 'catalog.config_provider_service';
    const PITCH_LENGTH = 'Pitch Length';

    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper) {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

    /**
     * @Route("/ptgeu_catalog")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from ptgeu_catalog');
    }

    /**
     * @Route("/ptgeu_catalog/get-available-six-level-categories")
     */
    public function getAvailableSixLevelCategories(Request $request)
    {
        $parentCat = $request->get('catId');
        if($parentCat)
        {
            $parentObj = \Pimcore\Model\DataObject::getById($parentCat);
            $childs = $parentObj->getChildren([DataObject::OBJECT_TYPE_OBJECT]);

            $parentName = [];
            $parentIds = [];
            foreach ($childs as $child) {
                $parentName[$child->getId()] = $child->getDescription('en');
                $parentIds[] = $child->getId();
            }
            
            $categoryList = new DataObject\PTGEUProductHierarchy\Listing();
            $categoryList->setCondition("Level = ?", ["7"]);
            $categoryList->setCondition("o_parentId IN (?)", [$parentIds]);
            $categoryList->setOrderKey('description');
            $categoryList->setOrder("ASC");
            $categoryList = $categoryList->load();

            $i = 0;
            foreach ($categoryList as $cat) {
                $parentNameStr = $parentName[$cat->getParentId()] ? $parentName[$cat->getParentId()] : '';
                $optionData[$i]['text'] = $parentNameStr. "-". $cat->getDescription('en');
                $optionData[$i]['id'] = $cat->getId();
                $i++;
            }
        }

        $res['data'] = $optionData;

        echo json_encode(['data' => $res['data']]);
        die;
    }

    /**
     * @Route("/ptgeu_catalog/get-available-headers")
     */
    public function getAvailableHeaders(Request $request) {
        $commonHelper = \Pimcore::getContainer()->get(self::COMMON_HELPER);
        $catalogConfig = \Pimcore::getContainer()->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getCatalogConfig();
        $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, 'PTG Product Page');
        
        $columns = array();
        $arr = [];
        $defaultColumns = [];

        $tableColumns = $ptgProductPageConfig['Dynamic Table Attribute'];
        if ($tableColumns !== null) {
            if (!empty($tableColumns) && count($tableColumns) > 0) {
                foreach ($tableColumns as $key => $column) {
                    $columnLabel = $column['columnLabel'];
                    $columns[] = array($key, $columnLabel." (".$key.")");
                    if($column['defaultColumn'])
                    {
                        $defaultColumns[] = $key;
                    }
                }
            }
            $arr = array('storeData' => $columns, 'completeData' => $tableColumns, 'defaultColumns'=> $defaultColumns,'success' => true);
        } else {
            $arr = array('storeData' => [], 'completeData' => [], 'success' => true);
        }

        echo json_encode($arr);
        die;
    }

    /**
     * @Route("/ptgeu_catalog/get-available-sorters")
     */
    public function getAvailableSorters(Request $request) {
        $commonHelper = \Pimcore::getContainer()->get(self::COMMON_HELPER);
        $catalogConfig = \Pimcore::getContainer()->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getCatalogConfig();
        $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, 'PTG Product Page');

        $columns = array();
        $arr = [];
        $defaultColumns = [];
        
        $tableColumns = $ptgProductPageConfig['PTG Sorting Attributes'];
        if ($tableColumns !== null) {
            if (!empty($tableColumns) && count($tableColumns) > 0) {
                foreach ($tableColumns as $key => $column) {
                    $columnLabel = $column['columnLabel'];
                    $columns[] = array($key, $columnLabel . " (" . $key . ")");
                    if ($column['defaultColumn']) {
                        $defaultColumns[] = $key;
                    }
                }
            }
            $arr = array('storeData' => $columns, 'completeData' => $tableColumns,'defaultColumns'=> null, 'success' => true);
        } else {
            $arr = array('storeData' => [], 'completeData' => [], 'success' => true);
        }

        echo json_encode($arr);
        die;
    }

    public function containerAction(Request $request)
    {
        $allChildren = $this->document->getAllChildren();
        $this->view->allChildren = $allChildren;
    }
    
    public function templatePtgEuProductProfileAction(Request $request)
    {
        $language = $this->document->getProperty('language');
        $language = $language ? $language : 'en';

        $catalogCategoryTableObject = $this->getDocumentTag('relation', 'ptg_eu_product_profile_page')->getElement();
        if($catalogCategoryTableObject)
        {
            $commonHelper = \Pimcore::getContainer()->get(self::COMMON_HELPER);
            $attributeImagesConfig = \Pimcore::getContainer()->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getAttributeImagesConfig();
            $BrandLogoSrc = $commonHelper->getParameter($attributeImagesConfig, 'BrandLogoSrc');
            $fifthLevelCategoryObj = $catalogCategoryTableObject->getFifthLevelCategory();
            $sixSevenLevelCategoryObj = $catalogCategoryTableObject->getSixSevenLevelCategory();
            $BrandLogoSrc = $this->getS3ImageSrc($BrandLogoSrc);
            $nominalLengthAndDatumLengthColumnMapping = array(
                'LP' => self::PITCH_LENGTH,
                'LP(MM)' => self::PITCH_LENGTH,
                'LP (MM)' => self::PITCH_LENGTH,
                'LI' => 'Inside Length',
                'LD' => 'Datum Length',
                'LE' => 'Effective Length',
                'LB' => 'Reference Length'
            );
            
            $PTGEUProductHierarchy = DataObject\PTGEUProductHierarchy::getById($fifthLevelCategoryObj);
            if($PTGEUProductHierarchy)
            {   
                $sql = "SELECT oo_id FROM `object_query_38` WHERE productType = 'base' AND hierarchyLevel5 LIKE '%$fifthLevelCategoryObj%' LIMIT 1";
                $objectLevel5thId =  $this->db->fetchColumn($sql);
            }

            if($objectLevel5thId)
            {
                $seventhLevelProductList = [];
                if($sixSevenLevelCategoryObj)
                {
                    foreach ($sixSevenLevelCategoryObj as $categoryId) {

                        $sql = "SELECT oo_id FROM `object_query_38` WHERE productType = 'skeleton' AND hierarchyLevel7 LIKE '%$categoryId%' LIMIT 1";
                        $objectLevel7thId =  $this->db->fetchColumn($sql);

                        if($objectLevel7thId) 
                        {
                            $seventhLevelProductList[] = $objectLevel7thId;
                        }
                    }
                }
            }

            $sql = "SELECT o_id FROM `object_38` WHERE `o_parentId` = '$objectLevel5thId' ORDER BY o_id ASC";
            $row6ThLevelDetails =  $this->db->fetchCol($sql);
            
            $profile = [];
            foreach ($row6ThLevelDetails as $objectLevel6thId) {
                
                if(empty($seventhLevelProductList) || in_array($objectLevel6thId, $seventhLevelProductList))
                {
                    $nominalLength= $upperRibWidth= $staticConductive='';
                    $profileObjectDetails =[];
                    $sql = "SELECT `oo_id`, `profile`, `mainImage1`, `nominalLength`, `technicalDrawing1`,`ProductName`,`material`, `reinforcement`, `fabricType`, `beltAngle`, `beltHardness`, `netWeight`,`minPulleyDia`, `minOutsidePulleyDia`, `heatAndOilResistant`, `rangeTemperatureC` FROM `object_query_38` WHERE `oo_id` = '$objectLevel6thId'";
                    $profileObjectDetails =  $this->db->fetchRow($sql);

                    $sql = "SELECT staticConductive FROM `object_query_38` WHERE `oo_id` = '$objectLevel6thId'";
                    $staticConductive =  $this->db->fetchColumn($sql);
                    
                    $sql = "SELECT o_id FROM `object_38` WHERE `o_parentId` = '$objectLevel6thId' AND `PrintedCatalogFlag` = '1' ORDER BY o_id ASC LIMIT 1";
                    $fertObjId =  $this->db->fetchColumn($sql);

                    if($fertObjId)
                    {
                        $sql = "SELECT heightMM FROM `object_brick_query_PTGEUCommonFert_38` WHERE `o_id` = '$fertObjId'";
                        $beltHeight =  $this->db->fetchColumn($sql);

                        $sql = "SELECT widthMM FROM `object_brick_query_PTGEUCommonFert_38` WHERE `o_id` = '$fertObjId'";
                        $upperRibWidth =  $this->db->fetchColumn($sql);
                    }

                    $groupData = [];
                    $profile = $profileObjectDetails['profile'];
                    $material = $profileObjectDetails['material'];
                    $nominalLength = $profileObjectDetails['nominalLength'];
                    $reinforcementSelected = trim($profileObjectDetails['reinforcement'], ",");
                    $fabricType = $profileObjectDetails['fabricType'];
                    $beltDesignlistContent = [];
                    
                    if($material)
                    {
                        $beltDesignlistContent['PTGEU_Material'] = $material;
                    }

                    if($reinforcementSelected)
                    {
                        $beltDesignlistContent['PTGEU_Reinforcement'] = $reinforcementSelected;
                    }

                    if($fabricType)
                    {
                        $beltDesignlistContent['PTGEU_FabricType'] = $fabricType;
                    }

                    $heatAndOilResistant = $profileObjectDetails['heatAndOilResistant'];
                    $rangeTemperatureC = $profileObjectDetails['rangeTemperatureC'];

                    if($heatAndOilResistant)
                    {
                        $propertieslistContent['PTGEU_HeatAndOilResistant'] = $heatAndOilResistant;
                    }

                    if($staticConductive)
                    {
                        $propertieslistContent['PTGEU_StaticConductive'] = $staticConductive;
                    }

                    if($rangeTemperatureC)
                    {
                        $propertieslistContent['PTGEU_RangeTemperatureC'] = $rangeTemperatureC;
                    }

                    if($profileObjectDetails['mainImage1'])
                    {
                        $mainImageObj = \Pimcore\Model\Asset::getById($profileObjectDetails['mainImage1']);
                    }
                    $groupData['mainImageObj'] = $mainImageObj;

                    if($profileObjectDetails['technicalDrawing1'])
                    {
                        $technicalDrawing1Obj = \Pimcore\Model\Asset::getById($profileObjectDetails['technicalDrawing1']);
                    }
                    $groupData['technicalDrawing1Obj'] = $technicalDrawing1Obj;
                    
                    if($nominalLength)
                    {
                        $nominalLengthUpperCase = strtoupper($nominalLength);
                        $nominalLengthSortName = ($nominalLengthUpperCase == 'LP' || $nominalLengthUpperCase == 'LP(MM)' || $nominalLengthUpperCase == 'LP (MM)') ? 'LP' : $nominalLength;
                        $groupData['nominalLength'] = 'PTGEU_Nominal_Length_'. $nominalLengthSortName;
                        $groupData['datumLengthColumn'] = $nominalLengthAndDatumLengthColumnMapping[$nominalLengthUpperCase];

                        $groupData['nominalLengthList'] = array(
                            array('datumLength' => '< 1350','lengthTolerance' => '&plusmn;2'),
                            array('datumLength' => '1350 < '.$nominalLength.' < 3550','lengthTolerance' => '&plusmn;3'),
                            array('datumLength' => '3550 < '.$nominalLength.' < 5000','lengthTolerance' => '&plusmn;4'),
                            array('datumLength' => '> 5000','lengthTolerance' => '')
                        );
                    }
                    
                    $groupData['profile'] = $profile;
                    $groupData['brandName'] = $profileObjectDetails['ProductName']. " " . $profile;
                    $groupData['beltDesign'] = $beltDesignlistContent;
                    $groupData['upperRibWidth'] = floatval($upperRibWidth);
                    $groupData['beltHeight'] = floatval($beltHeight);
                    $groupData['flankAngle'] = $profileObjectDetails['beltAngle']; 
                    $groupData['hardness'] = floatval($profileObjectDetails['beltHardness']);
                    $groupData['weightPerMLength'] = floatval($profileObjectDetails['netWeight']);
                    $groupData['minDiameter'] = floatval($profileObjectDetails['minPulleyDia']);
                    $groupData['minBlackIdlerDiameter'] = floatval($profileObjectDetails['minOutsidePulleyDia']);
                    $groupData['properties'] = $propertieslistContent;
                    $profileData[$profile] = $groupData;
                }
            }

            $this->view['BrandLogoSrc'] = $BrandLogoSrc;
            $this->view['profileData'] = $profileData;
        }
    }
    public function templatePtgEuProductPageAction(Request $request)
    {
        $this->initialSortingAttributesName = array("profile", "pitchLengthLpLwMM","pitchLengthLpLwIN", "refLengthLrMM","refLengthLrIN", "ribs", "widthMM","insideLengthMM","insideLengthIN","datumLengthMM","datumLengthIN","effectiveLengthMM","effectiveLengthIN");

        $language = $this->document->getProperty('language');
        $language = $language ? $language : 'en';

        $containerRequest = $request->get('containerRequest') ? $request->get('containerRequest') : FALSE;
        $catalogCategoryTableObject = $this->getDocumentTag('relation', 'ptg_eu_product_page')->getElement();
        if($catalogCategoryTableObject)
        {
            $commonHelper = \Pimcore::getContainer()->get(self::COMMON_HELPER);
            $attributeImagesConfig = \Pimcore::getContainer()->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getAttributeImagesConfig();
            $priceListTableConfig = \Pimcore::getContainer()->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getPriceListTableConfig();

            $catalogConfig = \Pimcore::getContainer()->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getCatalogConfig();
            $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, 'PTG Product Page');
            $DynamicTableAttribute = $ptgProductPageConfig['Dynamic Table Attribute'];
            $tableSortingFields = $ptgProductPageConfig['Table Sorting Fields'];

            $priceListTableColumn = $commonHelper->getParameter($priceListTableConfig, 'priceListTableColumn');
            $priceListCurrency = $commonHelper->getParameter($priceListTableConfig, 'priceListCurrency');
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesPTGFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesPTGFooter');

            $catalogObj = DataObject\PTGEUCatalog::getById($catalogCategoryTableObject->getParentId());
            $IsPriceCatalog = $catalogObj->getIsPriceCatalog();
            $distributionChannel = $catalogObj->getDistributionChannel();
            $salesOrganisation = $catalogObj->getSalesOrganisation();
            $deliveringPlant = $catalogObj->getDeliveringPlant();
            $Currency = $catalogObj->getCurrency();
            $ValidFromDate = $catalogObj->getValidFromDate();
            $objColumnsData = $catalogCategoryTableObject->getColumns();
            $sortingColumnsData = $catalogCategoryTableObject->getSortingColumns();

            $fifthLevelCategoryObj = $catalogCategoryTableObject->getFifthLevelCategory();
            $sixSevenLevelCategoryObj = $catalogCategoryTableObject->getSixSevenLevelCategory();

            $PTGEUProductHierarchy = DataObject\PTGEUProductHierarchy::getById($fifthLevelCategoryObj);
            $siop5Category = $PTGEUProductHierarchy->getPrintedCatalogDescription();
            $siop6siop7Category = '';
            $objectLevel5thDetails = '';

            # get All PlantMaterialMaster of the selected Delivery Plant
            if(trim($deliveringPlant))
            {
                $sql = "SELECT o_id FROM `object_PTGEUPlant` WHERE Plant = '$deliveringPlant' AND o_published = 1 ";
                $deliveringPlantID =  $this->db->fetchColumn($sql);

                $sql = "SELECT TRIM(BOTH ',' FROM `Material`) AS `materialID` FROM `object_40` WHERE plant__id = '$deliveringPlantID' AND o_published = 1 ";
                $plantAssociatedMaterials =  $this->db->fetchCol($sql);
            }

            # get All SalesMaterialMaster of the selected Sales Organization
            if(trim($salesOrganisation))
            {
                $sql = "SELECT o_id FROM `object_PTGEUSalesOrg` WHERE salesOrgCode = '$salesOrganisation' AND o_published = 1 ";
                $salesOrganisationID =  $this->db->fetchColumn($sql);

                $sql = "SELECT TRIM(BOTH ',' FROM `Material`) AS `materialID` FROM `object_41` WHERE salesOrganization__id = '$salesOrganisationID' AND o_published = 1 ";
                $salesAssociatedMaterials =  $this->db->fetchCol($sql);
            }


            if($PTGEUProductHierarchy)
            {   
                $sql = "SELECT * FROM `object_query_38` WHERE productType = 'base' AND hierarchyLevel5 LIKE '%$fifthLevelCategoryObj%' LIMIT 1";
                $objectLevel5thDetails =  $this->db->fetchRow($sql);

                if($objectLevel5thDetails)
                {
                    $objectLevel5thId = $objectLevel5thDetails['oo_id'];
                }
            }

            $groupData = array();
            
            if($objectLevel5thId)
            {
                $seventhLevelProductList = [];

                if($sixSevenLevelCategoryObj)
                {
                    foreach ($sixSevenLevelCategoryObj as $categoryId) {

                        $sql = "SELECT oo_id FROM `object_query_38` WHERE productType = 'skeleton' AND hierarchyLevel7 LIKE '%$categoryId%' LIMIT 1";
                        $objectLevel7thId =  $this->db->fetchColumn($sql);

                        if($objectLevel7thId) 
                        {
                            $seventhLevelProductList[] = $objectLevel7thId;
                        }
                    }
                }

                $this->columnsData = json_decode($objColumnsData, true);
                $this->sortColumnsData = json_decode($sortingColumnsData, true);

                $columnDataArr = [];

                foreach ($this->columnsData as $key => $value) {
                    $columnDataArr[] = $key;
                }
                $result = array_diff($this->sortColumnsData, $columnDataArr);

                foreach ($result as $key => $value) {
                    if ((array_search($key, $this->sortColumnsData)) !== false) {
                        unset($this->sortColumnsData[$key]);
                    }
                }

                if(!isset($this->columnsData['articleNumber']))
                {
                    $matchCodeData['articleNumber']['columnLabel'] = 'Match Code';
                    $matchCodeData['articleNumber']['fieldType'] = 'Input';
                    $matchCodeData['articleNumber']['groupName'] = 'articleNumber';
                    $matchCodeData['articleNumber']['fieldLevel'] = 'class';
                    $matchCodeData['articleNumber']['objectLevel'] = 'fert';
                    $this->columnsData = array_merge($matchCodeData, $this->columnsData);
                }

                if($IsPriceCatalog)
                {
                    $this->columnsData['listPrice']['columnLabel'] = 'listPrice';
                    $this->columnsData['listPrice']['unitName'] = $priceListCurrency[$Currency];
                }
                
                $this->iconRequired = 'YES';
                $columnsDataWithImages = $this->getColumnHeadersForCatalog();

                $orderKeys = array();
                foreach ($columnsDataWithImages as $svalue) {
                    foreach ($svalue as $vkey => $vvalue) {
                        $orderKeys[] = $vkey;
                    }
                }

                $orderFieldNameList = [];
                $tableSortingFieldsStatus = [];
                $needRemoveSortedField = false;

                if($this->columnsData)
                {
                    foreach ($orderKeys as $fieldName) {
                        $orderFieldNameList[$fieldName] = $this->columnsData[$fieldName];
                    }

                    // if($orderFieldNameList)
                    // {
                    //     foreach ($tableSortingFields as $fieldName) {

                    //         if(isset($orderFieldNameList[$fieldName]))
                    //         {
                    //             $tableSortingFieldsStatus[$fieldName] = true;
                    //         }
                    //         else{
                    //             $tableSortingFieldsStatus[$fieldName] = false;
                    //             $needRemoveSortedField = true;
                    //         }
                    //     }
                    // }
                }

                $this->subHeaderRequired = 'YES';
                $groupData['subHeaderRequired'] = $this->subHeaderRequired;
                $groupData['iconRequired'] = $this->iconRequired;
                $groupData['material'] = $objectLevel5thDetails['material'];
                $groupData['heatAndOilResistant'] = $objectLevel5thDetails['heatAndOilResistant'];
                $groupData['performance'] = $objectLevel5thDetails['performance'];

                $sql = "SELECT staticConductive FROM `object_query_38` WHERE `oo_id` = '$objectLevel5thId'";
                $staticConductive =  $this->db->fetchColumn($sql);
                $groupData['staticConductive'] = $staticConductive;
                $reinforcementSelected = trim($objectLevel5thDetails['reinforcement'], ",");
                $groupData['reinforcement'] = $reinforcementSelected;

                $this->featuresList = $this->getFeaturesList($language);
                $safetyFeatures = array();
                $featuresBenefitsBulletPointSelected = $objectLevel5thDetails['FeaturesBenefitsBulletPoint'];
                $featuresBenefitsBulletPointSelectedDbList = explode(',',$featuresBenefitsBulletPointSelected);
                $featuresBenefitsBulletPointSelectedDbList = array_filter($featuresBenefitsBulletPointSelectedDbList);

                if($featuresBenefitsBulletPointSelectedDbList)
                {
                    foreach ($featuresBenefitsBulletPointSelectedDbList as $feature) {
                        array_push($safetyFeatures,$feature);
                    }
                }

                $isAnyIconFeatureAvailable = 0;
                $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);
                foreach ($safetyFeaturesList as $featureData) {
                    if($featureData['iconSrc'])
                    {
                        $isAnyIconFeatureAvailable = 1;
                        break;
                    }
                }

                $groupData['safetyFeatures'] = $safetyFeaturesList;
                $groupData['isAnyIconFeatureAvailable'] = $isAnyIconFeatureAvailable;

                if($objectLevel5thDetails['mainImage1'])
                {
                    $mainImageObj = \Pimcore\Model\Asset::getById($objectLevel5thDetails['mainImage1']);
                }
                $groupData['mainImageObj'] = $mainImageObj;

                if($objectLevel5thDetails['technicalDrawing1'])
                {
                    $technicalDrawing1Obj = \Pimcore\Model\Asset::getById($objectLevel5thDetails['technicalDrawing1']);
                }
                $groupData['technicalDrawing1Obj'] = $technicalDrawing1Obj;

                $sql = "SELECT longDescription FROM `object_localized_data_38` WHERE ooo_id = '$objectLevel5thId' AND `language` = '{$language}' LIMIT 1";
                $longDescription =  $this->db->fetchColumn($sql);
                $groupData['longDescription'] = $longDescription;

                if($objectLevel5thDetails['minimumTemperatureF'] && $objectLevel5thDetails['maximumTemperatureF'] && $objectLevel5thDetails['minimumTemperatureC'] && $objectLevel5thDetails['maximumTemperatureC'])
                {
                    $minTempF = round($objectLevel5thDetails['minimumTemperatureF']);
                    $minTempC = round($objectLevel5thDetails['minimumTemperatureC']);

                    if($objectLevel5thDetails['minimumTemperatureF'] > 0 || $objectLevel5thDetails['minimumTemperatureF'] < 0){
                        $minTempF = '-'.round($objectLevel5thDetails['minimumTemperatureF']);
                    }
                    if($objectLevel5thDetails['minimumTemperatureC'] > 0 || $objectLevel5thDetails['minimumTemperatureC'] < 0){
                        $minTempC = '-'.round($objectLevel5thDetails['minimumTemperatureC']);
                    }
                    $groupData['temperatureRange'] = $minTempF.'°F'.' to '.round($objectLevel5thDetails['maximumTemperatureF']).'°F '."(".$minTempC.'°C'.' to '.round($objectLevel5thDetails['maximumTemperatureC']).'°C'.")";
                }
                else if($objectLevel5thDetails['minimumTemperatureF'] && $objectLevel5thDetails['maximumTemperatureF'])
                {
                    $minTempF = round($objectLevel5thDetails['minimumTemperatureF']);

                    if($objectLevel5thDetails['minimumTemperatureF'] > 0 || $objectLevel5thDetails['minimumTemperatureF'] < 0){
                        $minTempF = '-'.round($objectLevel5thDetails['minimumTemperatureF']);
                    }
                    $groupData['temperatureRange'] = $minTempF.'°F'.' to '.round($objectLevel5thDetails['maximumTemperatureF']).'°F';
                }
                else if($objectLevel5thDetails['minimumTemperatureC'] && $objectLevel5thDetails['maximumTemperatureC'])
                {
                    $minTempC = round($objectLevel5thDetails['minimumTemperatureC']);

                    if($objectLevel5thDetails['minimumTemperatureC'] > 0 || $objectLevel5thDetails['minimumTemperatureC'] < 0){
                        $minTempC = '-'.round($objectLevel5thDetails['minimumTemperatureC']);
                    }
                    $groupData['temperatureRange'] = $minTempC.'°C'.' to '.round($objectLevel5thDetails['maximumTemperatureC']).'°C';
                }
                
                $groupData['brandName'] = $objectLevel5thDetails['ProductName'];
                
                $sql = "SELECT * FROM `object_38` WHERE `o_parentId` = '$objectLevel5thId' ORDER BY o_id ASC";
                $row6ThLevelDetails =  $this->db->fetchAll($sql);

                $notApplicableFields = [];
                $articleData = [];
                
                if($plantAssociatedMaterials)
                {
                    $plantAssociatedMaterials_String = implode(',', $plantAssociatedMaterials);
                }

                if($salesAssociatedMaterials)
                {
                    $salesAssociatedMaterials_String = implode(',', $salesAssociatedMaterials);
                }

                foreach ($row6ThLevelDetails as $objectLevel6) {
                    $objectLevel6thId = $objectLevel6['o_id'];
                    if(empty($seventhLevelProductList) || in_array($objectLevel6thId, $seventhLevelProductList))
                    {
                        $appendWhereClauseSQL = '';
                        if(trim($plantAssociatedMaterials_String) && trim($salesAssociatedMaterials_String))
                        {
                            $appendWhereClauseSQL = "AND `oo_id` IN ($plantAssociatedMaterials_String) AND `oo_id` IN ($salesAssociatedMaterials_String)";
                        }
                        else if(trim($plantAssociatedMaterials_String))
                        {
                            $appendWhereClauseSQL = "AND `oo_id` IN ($plantAssociatedMaterials_String)";
                        }
                        else if(trim($salesAssociatedMaterials_String))
                        {
                            $appendWhereClauseSQL = "AND `oo_id` IN ($salesAssociatedMaterials_String)";
                        }

                        $sql = "SELECT * FROM `object_38` WHERE `o_parentId` = '$objectLevel6thId' $appendWhereClauseSQL ORDER BY o_id ASC";
                        $productObjectLevel7List =  $this->db->fetchAll($sql);

                        foreach ($productObjectLevel7List as $article) {
                            if($article['printedCatalogFlag'] == '1')
                            {
                                foreach ($orderFieldNameList as $fieldName => $fields) {
                                    if( ($fields['objectLevel'] == 'fert') && ($fields['fieldLevel'] == 'class'))
                                    {
                                        if(ucfirst($fields['fieldType']) == 'Input')
                                        {
                                            $data[$fieldName] = $article[$fieldName];
                                        }
                                        else if(trim($article[$fieldName]) && ucfirst($fields['fieldType']) == 'Number')
                                        {
                                            $data[$fieldName] = floatval($article[$fieldName]);
                                        }
                                        
                                    }
                                    else if( ($fields['objectLevel'] == 'base') && ($fields['fieldLevel'] == 'class'))
                                    {
                                        if(ucfirst($fields['fieldType']) == 'Input')
                                        {
                                            $data[$fieldName] = $objectLevel5thDetails[$fieldName];
                                        }
                                        else if(trim($objectLevel5thDetails[$fieldName]) && ucfirst($fields['fieldType']) == 'Number')
                                        {
                                            $data[$fieldName] = floatval($objectLevel5thDetails[$fieldName]);
                                        }
                                    }
                                    else if( ($fields['objectLevel'] == 'skeleton') && ($fields['fieldLevel'] == 'class'))
                                    {
                                        if(ucfirst($fields['fieldType']) == 'Input')
                                        {
                                            $data[$fieldName] = $objectLevel6[$fieldName];
                                        }
                                        else if(trim($objectLevel6[$fieldName]) && ucfirst($fields['fieldType']) == 'Number')
                                        {
                                            $data[$fieldName] = floatval($objectLevel6[$fieldName]);
                                        }
                                    }
                                    else if( ($fields['objectLevel'] == 'fert'  || $fields['objectLevel'] == 'skeleton') && ($fields['fieldLevel'] == 'objectBrick'))
                                    {
                                        $inputOrNumber = false;
                                        $isNumericField = false;
                                        if(ucfirst($fields['fieldType']) == 'Input')
                                        {
                                            $inputOrNumber = true;
                                        }
                                        else if(ucfirst($fields['fieldType']) == 'Number')
                                        {
                                            $inputOrNumber = true;
                                            $isNumericField = true;
                                        }

                                        if($inputOrNumber)
                                        {
                                            $o_id = $article['o_id'];
                                            $objectBrickName = $fields['objectBrickName'];
                                            $sql = "SELECT * FROM `object_brick_query_{$objectBrickName}_38` WHERE `o_id` = '$o_id'";
                                            $rowData =  $this->db->fetchRow($sql);
                                            
                                            if($rowData)
                                            {
                                                $data[$fieldName] = (trim($rowData[$fieldName]) && $isNumericField) ? floatval($rowData[$fieldName]) : $rowData[$fieldName];
                                            }
                                            else
                                            {
                                                $data[$fieldName]= '';
                                                $notApplicableFields[$fields['groupName']]= $fieldName;
                                            }
                                        }
                                        
                                    }
                                }

                                // if($tableSortingFieldsStatus)
                               // {
                                    // foreach ($tableSortingFieldsStatus as $fieldName => $tableShowStatus) {
                                    //     if(!$tableShowStatus)
                                    //     {
                                    //         $fieldConfig = $DynamicTableAttribute[$fieldName];

                                    //         if( ($fieldConfig['objectLevel'] == 'fert') && ($fieldConfig['fieldLevel'] == 'class'))
                                    //         {
                                    //             if(ucfirst($fieldConfig['fieldType']) == 'Input')
                                    //             {
                                    //                 $data[$fieldName] = $article[$fieldName];
                                    //             }
                                    //             else if(trim($article[$fieldName]) && ucfirst($fieldConfig['fieldType']) == 'Number')
                                    //             {
                                    //                 $data[$fieldName] = floatval($article[$fieldName]);
                                    //             }
                                    //         }
                                    //         else if( ($fieldConfig['objectLevel'] == 'base') && ($fieldConfig['fieldLevel'] == 'class'))
                                    //         {
                                    //             if(ucfirst($fieldConfig['fieldType']) == 'Input')
                                    //             {
                                    //                 $data[$fieldName] = $objectLevel5thDetails[$fieldName];
                                    //             }
                                    //             else if(trim($objectLevel5thDetails[$fieldName]) && ucfirst($fieldConfig['fieldType']) == 'Number')
                                    //             {
                                    //                 $data[$fieldName] = floatval($objectLevel5thDetails[$fieldName]);
                                    //             }
                                    //         }
                                    //         else if( ($fieldConfig['objectLevel'] == 'skeleton') && ($fieldConfig['fieldLevel'] == 'class'))
                                    //         {
                                    //             if(ucfirst($fieldConfig['fieldType']) == 'Input')
                                    //             {
                                    //                 $data[$fieldName] = $objectLevel6[$fieldName];
                                    //             }
                                    //             else if(trim($objectLevel6[$fieldName]) && ucfirst($fieldConfig['fieldType']) == 'Number')
                                    //             {
                                    //                 $data[$fieldName] = floatval($objectLevel6[$fieldName]);
                                    //             }
                                    //         }
                                    //         else if( ($fieldConfig['objectLevel'] == 'fert' || $fieldConfig['objectLevel'] == 'skeleton') && ($fieldConfig['fieldLevel'] == 'objectBrick'))
                                    //         {
                                    //             $inputOrNumber = false;
                                    //             $isNumericField = false;
                                    //             if(ucfirst($fieldConfig['fieldType']) == 'Input')
                                    //             {
                                    //                 $inputOrNumber = true;
                                    //             }
                                    //             else if(ucfirst($fieldConfig['fieldType']) == 'Number')
                                    //             {
                                    //                 $inputOrNumber = true;
                                    //                 $isNumericField = true;
                                    //             }
                                                
                                    //             if($inputOrNumber)
                                    //             {
                                    //                 $o_id = $article['o_id'];
                                    //                 $objectBrickName = $fieldConfig['objectBrickName'];
                                    //                 $sql = "SELECT * FROM `object_brick_query_{$objectBrickName}_38` WHERE `o_id` = '$o_id' ";
                                    //                 $rowData =  $this->db->fetchRow($sql);

                                    //                 if($rowData)
                                    //                 {
                                    //                     $data[$fieldName] = (trim($rowData[$fieldName]) && $isNumericField) ? floatval($rowData[$fieldName]) : $rowData[$fieldName];
                                    //                 }
                                    //                 else
                                    //                 {
                                    //                     $data[$fieldName]= '';
                                    //                     $notApplicableFields[$fieldConfig['groupName']]= $fieldName;
                                    //                 }
                                    //             }
                                    //         }
                                    //     }
                                    // }
                               // }

                                if($IsPriceCatalog)
                                {
                                    $listPrice = '';
                                    if($article['priceData'])
                                    {
                                        $recordArray = explode(PHP_EOL, $article['priceData']);

                                        if(count($recordArray))
                                        {
                                            foreach ($recordArray as $rvalue) {
                                                $pvalue = explode('|', $rvalue);
                                                if(($pvalue[$priceListTableColumn['Rate Unit']] == $Currency) && ($pvalue[$priceListTableColumn['Distribution Channel']] == $distributionChannel) && ($pvalue[$priceListTableColumn['Sales Organization']] == $salesOrganisation))
                                                {
                                                    $ValidityStartDate = \Carbon\Carbon::createFromFormat('Y-m-d',$pvalue[$priceListTableColumn['Validity Start Date']]);
                                                    $ValidityEndDate = \Carbon\Carbon::createFromFormat('Y-m-d',$pvalue[$priceListTableColumn['Validity End Date']]);

                                                    if($ValidFromDate->between($ValidityStartDate, $ValidityEndDate)) {
                                                        $listPrice = $pvalue[$priceListTableColumn['Rate']];
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    
                                    $data['listPrice'] = trim($listPrice) ? floatval($listPrice) : $listPrice;
                                }
                                // $articleData[$article['profile']][] = $data;
                                $articleData[] = $data;
                            }
                        }
                    }
                }
                $sortedColumnsArr = [];

                foreach ($this->sortColumnsData as $sortColumn) {
                    $sortedColumnsArr[] = $sortColumn;
                }

                $firstSortingColumn = array_column($articleData, $sortedColumnsArr[0]);
                $secondSortingColumn = array_column($articleData, $sortedColumnsArr[1]);
                $thirdSortingColumn = array_column($articleData, $sortedColumnsArr[2]);
                $fourthSortingColumn = array_column($articleData, $sortedColumnsArr[3]);
                $fifthSortingColumn = array_column($articleData, $sortedColumnsArr[4]);
                $sixthSortingColumn = array_column($articleData, $sortedColumnsArr[5]);
                $seventhSortingColumn = array_column($articleData, $sortedColumnsArr[6]);
                $eighthSortingColumn = array_column($articleData, $sortedColumnsArr[7]);
                $ninethSortingColumn = array_column($articleData, $sortedColumnsArr[8]);
                $tenthSortingColumn = array_column($articleData, $sortedColumnsArr[9]);
                $eleventhSortingColumn = array_column($articleData, $sortedColumnsArr[10]);
                $twelthSortingColumn = array_column($articleData, $sortedColumnsArr[11]);
                $thirteenthSortingColumn = array_column($articleData, $sortedColumnsArr[12]);

                $fourteenthSortingColumn = array_column($articleData, $sortedColumnsArr[13]);
                $fifteenthSortingColumn = array_column($articleData, $sortedColumnsArr[14]);
                $sixteenthSortingColumn = array_column($articleData, $sortedColumnsArr[15]);

                switch (count($sortedColumnsArr)) {
                    case 16:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $ninethSortingColumn,
                            SORT_ASC,
                            $tenthSortingColumn,
                            SORT_ASC,
                            $eleventhSortingColumn,
                            SORT_ASC,
                            $twelthSortingColumn,
                            SORT_ASC,
                            $thirteenthSortingColumn,
                            SORT_ASC,
                            $fourteenthSortingColumn,
                            SORT_ASC,
                            $fifteenthSortingColumn,
                            SORT_ASC,
                            $sixteenthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 15:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $ninethSortingColumn,
                            SORT_ASC,
                            $tenthSortingColumn,
                            SORT_ASC,
                            $eleventhSortingColumn,
                            SORT_ASC,
                            $twelthSortingColumn,
                            SORT_ASC,
                            $thirteenthSortingColumn,
                            SORT_ASC,
                            $fourteenthSortingColumn,
                            SORT_ASC,
                            $fifteenthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 14:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $ninethSortingColumn,
                            SORT_ASC,
                            $tenthSortingColumn,
                            SORT_ASC,
                            $eleventhSortingColumn,
                            SORT_ASC,
                            $twelthSortingColumn,
                            SORT_ASC,
                            $thirteenthSortingColumn,
                            SORT_ASC,
                            $fourteenthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 13:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $ninethSortingColumn,
                            SORT_ASC,
                            $tenthSortingColumn,
                            SORT_ASC,
                            $eleventhSortingColumn,
                            SORT_ASC,
                            $twelthSortingColumn,
                            SORT_ASC,
                            $thirteenthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 12:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $ninethSortingColumn,
                            SORT_ASC,
                            $tenthSortingColumn,
                            SORT_ASC,
                            $eleventhSortingColumn,
                            SORT_ASC,
                            $twelthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 11:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $ninethSortingColumn,
                            SORT_ASC,
                            $tenthSortingColumn,
                            SORT_ASC,
                            $eleventhSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 10:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $ninethSortingColumn,
                            SORT_ASC,
                            $tenthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 9:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $ninethSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 8:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $eighthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 7:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $seventhSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 6:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $sixthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 5:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $fifthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 4:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $fourthSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 3:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $thirdSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 2:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $secondSortingColumn,
                            SORT_ASC,
                            $articleData
                        );
                        break;
                    case 1:
                        array_multisort(
                            $firstSortingColumn,
                            SORT_ASC,
                            SORT_NATURAL,
                            $articleData
                        );
                        break;
                    default:
                        $result = array_diff($this->initialSortingAttributesName, $columnDataArr);

                        $firstSortingColumn = array_column($articleData, $this->initialSortingAttributesName[0]);
                        $secondSortingColumn = array_column($articleData, $this->initialSortingAttributesName[1]);
                        $thirdSortingColumn = array_column($articleData, $this->initialSortingAttributesName[2]);
                        $fourthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[3]);
                        $fifthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[4]);

                        $sixthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[5]);
                        $seventhSortingColumn = array_column($articleData, $this->initialSortingAttributesName[6]);
                        $eighthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[7]);
                        $ninethSortingColumn = array_column($articleData, $this->initialSortingAttributesName[8]);
                        $tenthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[9]);
                        $eleventhSortingColumn = array_column($articleData, $this->initialSortingAttributesName[10]);
                        $twelthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[11]);
                        $thirteenthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[12]);

                        $fourteenthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[13]);
                        $fifteenthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[14]);
                        $sixteenthSortingColumn = array_column($articleData, $this->initialSortingAttributesName[15]);


                        if (count($result) == 0) {
                            array_multisort(
                                $firstSortingColumn,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondSortingColumn,
                                SORT_ASC,
                                $thirdSortingColumn,
                                SORT_ASC,
                                $fourthSortingColumn,
                                SORT_ASC,
                                $fifthSortingColumn,
                                SORT_ASC,
                                $sixthSortingColumn,
                                SORT_ASC,
                                $seventhSortingColumn,
                                SORT_ASC,
                                $eighthSortingColumn,
                                SORT_ASC,
                                $ninethSortingColumn,
                                SORT_ASC,
                                $tenthSortingColumn,
                                SORT_ASC,
                                $eleventhSortingColumn,
                                SORT_ASC,
                                $twelthSortingColumn,
                                SORT_ASC,
                                $thirteenthSortingColumn,
                                SORT_ASC,
                                $fourteenthSortingColumn,
                                SORT_ASC,
                                $fifteenthSortingColumn,
                                SORT_ASC,
                                $sixteenthSortingColumn,
                                SORT_ASC,
                                $articleData
                            );
                        } elseif (count($result) != 0) {

                            foreach ($result as $key => $value) {
                                unset($this->initialSortingAttributesName[$key]);
                            }

                            $remainingAttributeSortArr = [];
                            foreach ($this->initialSortingAttributesName as $key => $value) {
                                $remainingAttributeSortArr[] = $value;
                            }

                            $firstSortingColumn = array_column($articleData, $remainingAttributeSortArr[0]);
                            $secondSortingColumn = array_column($articleData, $remainingAttributeSortArr[1]);
                            $thirdSortingColumn = array_column($articleData, $remainingAttributeSortArr[2]);
                            $fourthSortingColumn = array_column($articleData, $remainingAttributeSortArr[3]);
                            $fifthSortingColumn = array_column($articleData, $remainingAttributeSortArr[4]);

                            $sixthSortingColumn = array_column($articleData, $remainingAttributeSortArr[5]);
                            $seventhSortingColumn = array_column($articleData, $remainingAttributeSortArr[6]);
                            $eighthSortingColumn = array_column($articleData, $remainingAttributeSortArr[7]);
                            $ninethSortingColumn = array_column($articleData, $remainingAttributeSortArr[8]);
                            $tenthSortingColumn = array_column($articleData, $remainingAttributeSortArr[9]);
                            $eleventhSortingColumn = array_column($articleData, $remainingAttributeSortArr[10]);
                            $twelthSortingColumn = array_column($articleData, $remainingAttributeSortArr[11]);
                            $thirteenthSortingColumn = array_column($articleData, $remainingAttributeSortArr[12]);

                            $fourteenthSortingColumn = array_column($articleData, $remainingAttributeSortArr[13]);
                            $fifteenthSortingColumn = array_column($articleData, $remainingAttributeSortArr[14]);
                            $sixteenthSortingColumn = array_column($articleData, $remainingAttributeSortArr[15]);

                                switch (count($remainingAttributeSortArr)) {
                                    case 1:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $articleData
                                        );
                                        break;
                                    case 2:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 3:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 4:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 5:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 6:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 7:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 8:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 9:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $ninethSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 10:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $ninethSortingColumn,
                                            SORT_ASC,
                                            $tenthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 11:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $ninethSortingColumn,
                                            SORT_ASC,
                                            $tenthSortingColumn,
                                            SORT_ASC,
                                            $eleventhSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 12:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $ninethSortingColumn,
                                            SORT_ASC,
                                            $tenthSortingColumn,
                                            SORT_ASC,
                                            $eleventhSortingColumn,
                                            SORT_ASC,
                                            $twelthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 13:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $ninethSortingColumn,
                                            SORT_ASC,
                                            $tenthSortingColumn,
                                            SORT_ASC,
                                            $eleventhSortingColumn,
                                            SORT_ASC,
                                            $twelthSortingColumn,
                                            SORT_ASC,
                                            $thirteenthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 14:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $ninethSortingColumn,
                                            SORT_ASC,
                                            $tenthSortingColumn,
                                            SORT_ASC,
                                            $eleventhSortingColumn,
                                            SORT_ASC,
                                            $twelthSortingColumn,
                                            SORT_ASC,
                                            $thirteenthSortingColumn,
                                            SORT_ASC,
                                            $fourteenthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 15:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $ninethSortingColumn,
                                            SORT_ASC,
                                            $tenthSortingColumn,
                                            SORT_ASC,
                                            $eleventhSortingColumn,
                                            SORT_ASC,
                                            $twelthSortingColumn,
                                            SORT_ASC,
                                            $thirteenthSortingColumn,
                                            SORT_ASC,
                                            $fourteenthSortingColumn,
                                            SORT_ASC,
                                            $fifteenthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;
                                    case 16:
                                        array_multisort(
                                            $firstSortingColumn,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondSortingColumn,
                                            SORT_ASC,
                                            $thirdSortingColumn,
                                            SORT_ASC,
                                            $fourthSortingColumn,
                                            SORT_ASC,
                                            $fifthSortingColumn,
                                            SORT_ASC,
                                            $sixthSortingColumn,
                                            SORT_ASC,
                                            $seventhSortingColumn,
                                            SORT_ASC,
                                            $eighthSortingColumn,
                                            SORT_ASC,
                                            $ninethSortingColumn,
                                            SORT_ASC,
                                            $tenthSortingColumn,
                                            SORT_ASC,
                                            $eleventhSortingColumn,
                                            SORT_ASC,
                                            $twelthSortingColumn,
                                            SORT_ASC,
                                            $thirteenthSortingColumn,
                                            SORT_ASC,
                                            $fourteenthSortingColumn,
                                            SORT_ASC,
                                            $fifteenthSortingColumn,
                                            SORT_ASC,
                                            $sixteenthSortingColumn,
                                            SORT_ASC,
                                            $articleData
                                        );
                                        break;

                            }
                    }
                    
                 }
                $asasa['asas'] = $articleData;

                // p_r($asasa['asas']);
                // die;
                // if($tableSortingFields)
                // {
                //     foreach ($articleData as $profile => $articlesList) {
                //         $siop6siop7Category = $profile;
                //         if(count($tableSortingFields) == 1)
                //         {
                //             $firstSortingColumn = array_column($articleData[$profile], $tableSortingFields[0]);
                //             array_multisort($firstSortingColumn, SORT_ASC, $articleData[$profile]);
                //             if($needRemoveSortedField)
                //             {
                //                 $articleData[$profile] = $this->removeSortingColumn($tableSortingFieldsStatus, $articleData[$profile]);
                //             }
                //         }
                //         else if(count($tableSortingFields) == 2)
                //         {
                //             $firstSortingColumn = array_column($articleData[$profile], $tableSortingFields[0]);
                //             $secondSortingColumn = array_column($articleData[$profile], $tableSortingFields[1]);

                //             array_multisort($firstSortingColumn, SORT_ASC, $secondSortingColumn, SORT_ASC,$articleData[$profile]);
                            
                //             if($needRemoveSortedField)
                //             {
                //                 $articleData[$profile] = $this->removeSortingColumn($tableSortingFieldsStatus, $articleData[$profile]);
                //             }
                //         }
                //     }
                // }

                // if($notApplicableFields)
                // {
                //     foreach ($notApplicableFields as $fieldKey => $fieldName) {
                //         unset($columnsDataWithImages[$fieldKey]);
                //     }
                // }

                $groupData['data'] = $asasa;
                $groupData['columnsDataWithImages'] = $columnsDataWithImages;
                $groupData['siop6siop7Category'] = $siop6siop7Category;
                $groupData['siop5Category'] = $siop5Category;

                $footer_logo_src = $CatalogImagesPTGFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);
                
                $this->view['footer_class'] = '';
                $this->view['footer_logo_src'] = $footer_logo_src;
            }
            
            $this->view['containerRequest'] = $containerRequest;    
            $this->view['groupData'] = $groupData;
        }
        
    }


    // public function removeSortingColumn($tableSortingFieldsStatus, $articlesList){

    //     $removeFieldList = [];
    //     foreach ($tableSortingFieldsStatus as $fieldName => $status) {
    //         if(!$status)
    //         {
    //             $removeFieldList[] = $fieldName;
    //         }
    //     }

    //     foreach ($articlesList as $key => $articleData) {

    //         foreach ($removeFieldList as $fieldName) {
    //             unset($articlesList[$key][$fieldName]);
    //         }
    //     }
    //     return $articlesList;
    // }
    public function getFiveSortedFeaturesWithIconList($safetyFeatures){
        
        $safetyFeatures = array_unique($safetyFeatures);

        $safetyFeaturesList  = array();
        $safetyFeaturesListWithImage = array();
        $safetyFeaturesListWithOutImage = array();

        if($safetyFeatures)
        {
            foreach ($safetyFeatures as $fvalue) {
                if($this->featuresList[$fvalue]['icon'])
                {
                    if(!isset($this->s3srcArr[$fvalue]))
                    {
                        $this->s3srcArr[$fvalue] = $this->getS3ImageSrc($this->featuresList[$fvalue]['icon']);
                    }
                    $safetyFeaturesListWithImage[] = array('name'=>$this->featuresList[$fvalue]['name'], 'iconSrc' => $this->s3srcArr[$fvalue]);
                }
                else
                {
                    $safetyFeaturesListWithOutImage[] = array('name'=>$this->featuresList[$fvalue]['name'], 'iconSrc' => $this->featuresList[$fvalue]['icon']);
                }
            }
        }

        $safetyFeaturesList = array_merge_recursive($safetyFeaturesListWithImage,$safetyFeaturesListWithOutImage);
        
        if($safetyFeaturesList)
        {
            $safetyFeaturesList = array_slice($safetyFeaturesList, 0, 5);
        }

        unset($safetyFeaturesListWithImage);
        unset($safetyFeaturesListWithOutImage);
        
        return $safetyFeaturesList;
    }

    private function getFeaturesList($language){
        $entries = new DataObject\PTGEUFeaturesAndBenefits\Listing();
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            if($entry->getFeaturesAndBenefitsImage())
            {
                $featureData[$entry->getId()]['icon'] = $entry->getFeaturesAndBenefitsImage()->getPath().$entry->getFeaturesAndBenefitsImage()->getFilename();
            }

            $featureData[$entry->getId()]['name'] = $entry->getFeaturesAndBenefits($language);
            $featureData[$entry->getId()]['key'] = $entry->getKey();
        }
        return $featureData;
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,$this->view->imageWidth);
        }

        return $s3src;
    }

    public function getColumnHeadersForCatalog(){

        $columnsDataWithImages = array();

        if($this->columnsData)
        {
            foreach ($this->columnsData as $key => $value) {

                $groupColumnName = $key;
                if(isset($value['groupName']) && $value['groupName'])
                {
                    $groupColumnName = $value['groupName'];
                    $this->subHeaderRequired = 'YES';
                }

                $columnsDataWithImages[$groupColumnName][$key]['groupName'] = $value['groupName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnWidth'] = $value['columnWidth'];

                if($key == 'listPrice')
                {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $this->get('translator')->trans("PTGEU_currency_".$value['unitName']);
                }
                else
                {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($value['unitName']) ? $this->get('translator')->trans("PTGEU_unit_".$value['unitName']) : '';
                }

                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $key;
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->get('translator')->trans("PTGEU_".$groupColumnName);
                if ($this->iconRequired == 'YES')
                {
                    if(!isset($this->attrbuteImgS3Arr[$groupColumnName]))
                    {
                        $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                        $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                        $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                        $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImagesSrc;
                    }
                    else
                    {
                        $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                    }
                }
            }
        }

        return $columnsDataWithImages;
    }
}
