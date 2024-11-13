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
 * @package    PTGEUCatalogBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace PTGEU\CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;
use Pimcore\Controller\FrontendController;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Pimcore\Bundle\WebToPrintBundle\Processor;

class DefaultController extends FrontendController
{
    private $featuresList = [];
    private $s3srcArr = [];
    private $attrbuteImgS3Arr = [];
    private $columnsData = [];
    private $sortColumnsData = [];
    private $attributeImages = [];
    private $iconRequired = 'NO';
    private $subHeaderRequired = 'NO';
    private $catalogTemplatingHelper;
    private $db;
    private $imageWidth;
    private $translatorInterface;
    private $containerInterface;

    const COMMON_HELPER = 'app.common_helper';
    const CATALOG_CONFIG_PROVIDER_SERVICE = 'catalog.config_provider_service';
    const PITCH_LENGTH = 'Pitch Length';
    const PTG_PRODUCT_PAGE= 'PTG Product Page';

    public function __construct(ContainerInterface $container,
        CatalogTemplatingHelper $catalogTemplatingHelper,
        TranslatorInterface $translator)
    {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        $this->translatorInterface = $translator;
        $this->containerInterface = $container;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

    /**
     * @Route("/ptgeucatalog")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from ptgeucatalog');
    }

    /**
     * @Route("/ptgeucatalog/get-available-six-level-categories")
     */
    public function getAvailableSixLevelCategories(Request $request): JsonResponse
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
            $categoryList->setCondition("parentId IN (?)", [$parentIds]);
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

        return $this->json(['data' => $res['data']]);
    }

    /**
     * @Route("/ptgeucatalog/get-available-headers")
     */
    public function getAvailableHeaders(Request $request): JsonResponse
    {
        $commonHelper = $this->containerInterface->get(self::COMMON_HELPER);
        $catalogConfig = $this->getContainerConfig('CatalogConfig');
        $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, self::PTG_PRODUCT_PAGE);

        $columns = array();
        $data = [];
        $defaultColumns = [];

        $tableColumns = $ptgProductPageConfig['Dynamic Table Attribute'];
        if ($tableColumns !== null) {
            if (!empty($tableColumns) && count($tableColumns) > 0) {
                foreach ($tableColumns as $key => $column) {
                    $columnLabel = $column['columnLabel'];
                    $columns[] = array($key, $columnLabel." (".$key.")");
                    if(isset($column['defaultColumn']) && $column['defaultColumn'])
                    {
                        $defaultColumns[] = $key;
                    }
                }
            }

            $data = array(
                'storeData' => $columns,
                'completeData' => $tableColumns,
                'defaultColumns'=> $defaultColumns,
                'success' => true
            );

        } else {
            $data = array('storeData' => [], 'completeData' => [], 'success' => true);
        }

        return $this->json($data);
    }

    /**
     * @Route("/ptgeucatalog/get-available-sorters")
     */
    public function getAvailableSorters(Request $request): JsonResponse
    {
        $commonHelper = $this->containerInterface->get(self::COMMON_HELPER);
        $catalogConfig = $this->getContainerConfig('CatalogConfig');
        $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, self::PTG_PRODUCT_PAGE);

        $columns = array();
        $data = [];
        $defaultColumns = [];

        $tableColumns = $ptgProductPageConfig['PTG Sorting Attributes'];
        if ($tableColumns !== null) {
            if (!empty($tableColumns) && count($tableColumns) > 0) {
                foreach ($tableColumns as $key => $column) {
                    $columnLabel = $column['columnLabel'];
                    $columns[] = array($key, $columnLabel . " (" . $key . ")");
                    if (isset($column['defaultColumn']) && $column['defaultColumn']) {
                        $defaultColumns[] = $key;
                    }
                }
            }

            $data = array(
                'storeData' => $columns,
                'completeData' => $tableColumns,
                'defaultColumns'=> null,
                'success' => true
            );

        } else {
            $data = array('storeData' => [], 'completeData' => [], 'success' => true);
        }

        return $this->json($data);
    }

    public function containerAction(Request $request): Response
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        $allChildren = [];

        //prepare children for include
        foreach ($this->document->getAllChildren() as $child) {
            if ($child instanceof \Pimcore\Model\Document\Hardlink) {
                $child = \Pimcore\Model\Document\Hardlink\Service::wrap($child);
            }
            $allChildren[] = $child;
        }

        $parameterBag['allChildren'] = $allChildren;
        return $this->render('ptgeucatalog/default/container.html.twig',$parameterBag);
    }

    public function templatePtgEuProductProfileAction(Request $request): Response
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        $language = $this->document->getProperty('language');
        $language = $language ? $language : 'en';
        $objectLevel5thId = '';
        $profileData = [];

        $catalogCategoryTableObjectEditable = $this->document->getEditable('ptg_eu_product_profile_page');
        if($catalogCategoryTableObjectEditable)
        {
            $catalogCategoryTableObject = $catalogCategoryTableObjectEditable->getElement();
            if($catalogCategoryTableObject)
            {
                $commonHelper = $this->containerInterface->get(self::COMMON_HELPER);
                $attributeImagesConfig = $this->getContainerConfig('AttributeImagesConfig');
                $brandLogoSrc = $commonHelper->getParameter($attributeImagesConfig, 'BrandLogoSrc');
                $fifthLevelCategoryObj = $catalogCategoryTableObject->getFifthLevelCategory();
                $sixSevenLevelCategoryObj = $catalogCategoryTableObject->getSixSevenLevelCategory();
                $brandLogoSrc = $this->getS3ImageSrc($brandLogoSrc);
                $nominalLtAndDatumLtColMapping = array(
                    'LP' => self::PITCH_LENGTH,
                    'LP(MM)' => self::PITCH_LENGTH,
                    'LP (MM)' => self::PITCH_LENGTH,
                    'LI' => 'Inside Length',
                    'LD' => 'Datum Length',
                    'LE' => 'Effective Length',
                    'LB' => 'Reference Length'
                );

                $ptgEUProductHierarchy = DataObject\PTGEUProductHierarchy::getById($fifthLevelCategoryObj);
                if($ptgEUProductHierarchy)
                {
                    $sql = "SELECT oo_id FROM `object_query_38` WHERE productType = 'base' ";
                    $sql .= "AND hierarchyLevel5 LIKE '%$fifthLevelCategoryObj%' LIMIT 1";
                    $objectLevel5thId =  $this->db->fetchOne($sql);
                }

                if($objectLevel5thId)
                {
                    $seventhLevelProductList = [];
                    if($sixSevenLevelCategoryObj)
                    {
                        foreach ($sixSevenLevelCategoryObj as $categoryId) {

                            $sql = "SELECT oo_id FROM `object_query_38` WHERE productType = 'skeleton' ";
                            $sql .= "AND hierarchyLevel7 LIKE '%$categoryId%' LIMIT 1";
                            $objectLevel7thId =  $this->db->fetchOne($sql);

                            if($objectLevel7thId)
                            {
                                $seventhLevelProductList[] = $objectLevel7thId;
                            }
                        }
                    }
                }

                $sql = "SELECT id FROM `object_38` WHERE `parentId` = '$objectLevel5thId' ORDER BY id ASC";
                $row6ThLevelDetails =  $this->db->fetchFirstColumn($sql);
                $profile = [];
                foreach ($row6ThLevelDetails as $objectLevel6thId) {

                    if(empty($seventhLevelProductList) || in_array($objectLevel6thId, $seventhLevelProductList))
                    {
                        $nominalLength= $upperRibWidth= $staticConductive='';
                        $profileObjectDetails =[];
                        $sql = "SELECT `oo_id`, `profile`, `mainImage1`, `nominalLength`, `technicalDrawing1`,";
                        $sql .= "`ProductName`,`material`, `reinforcement`, `fabricType`, `beltAngle`, `beltHardness`,";
                        $sql .= " `netWeight`,`minPulleyDia`, `minOutsidePulleyDia`,";
                        $sql .= " `heatAndOilResistant`, `rangeTemperatureC` ";
                        $sql .= "FROM `object_query_38` WHERE `oo_id` = '$objectLevel6thId'";
                        $profileObjectDetails =  $this->db->fetchAssociative($sql);

                        $sql = "SELECT staticConductive FROM `object_query_38` WHERE `oo_id` = '$objectLevel6thId'";
                        $staticConductive =  $this->db->fetchOne($sql);

                        $sql = "SELECT id FROM `object_38` WHERE `parentId` = '$objectLevel6thId' ";
                        $sql .= "AND `PrintedCatalogFlag` = '1' ORDER BY id ASC LIMIT 1";
                        $fertObjId =  $this->db->fetchOne($sql);
                        $beltHeight = '';
                        if($fertObjId)
                        {
                            $sql = "SELECT heightMM FROM `object_brick_query_PTGEUCommonFert_38` ";
                            $sql .= "WHERE `id` = '$fertObjId'";
                            $beltHeight =  $this->db->fetchOne($sql);

                            $sql = "SELECT widthMM FROM `object_brick_query_PTGEUCommonFert_38` ";
                            $sql .= "WHERE `id` = '$fertObjId'";
                            $upperRibWidth =  $this->db->fetchOne($sql);
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
                        $propertieslistContent = [];
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
                        $mainImageObj = null;
                        if($profileObjectDetails['mainImage1'])
                        {
                            $mainImageObj = \Pimcore\Model\Asset::getById($profileObjectDetails['mainImage1']);
                        }
                        $groupData['mainImageObj'] = $mainImageObj;

                        $technicalDrawing1Obj = null;
                        if($profileObjectDetails['technicalDrawing1'])
                        {
                            $technicalDrawing1Obj = \Pimcore\Model\Asset::getById($profileObjectDetails['technicalDrawing1']);
                        }
                        $groupData['technicalDrawing1Obj'] = $technicalDrawing1Obj;

                        if($nominalLength)
                        {
                            $nominalLtUC = strtoupper($nominalLength);
                            $nominalLengthSortName = ($nominalLtUC == 'LP' || $nominalLtUC == 'LP(MM)' || $nominalLtUC == 'LP (MM)') ? 'LP' : $nominalLength;
                            $groupData['nominalLength'] = 'PTGEU_Nominal_Length_'. $nominalLengthSortName;

                            $groupData['datumLengthColumn'] = null;
                            if(isset($nominalLtAndDatumLtColMapping[$nominalLtUC]))
                            {
                                $groupData['datumLengthColumn'] = $nominalLtAndDatumLtColMapping[$nominalLtUC];
                            }

                            $groupData['nominalLengthList'] = array(
                                array('datumLength' => '< 1350','lengthTolerance' => '&plusmn;2'),
                                array('datumLength' => '1350 < '.$nominalLength.' < 3550',
                                'lengthTolerance' => '&plusmn;3'),
                                array('datumLength' => '3550 < '.$nominalLength.' < 5000',
                                'lengthTolerance' => '&plusmn;4'),
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
                $parameterBag['BrandLogoSrc'] = $brandLogoSrc;
                $parameterBag['profileData'] = $profileData;
            }
        }
        return $this->render("ptgeucatalog/default/template_ptg_eu_product_profile.html.twig", $parameterBag);
    }
    public function templatePtgEuProductPageAction(Request $request): Response
    {
        $parameterBag['groupData'] = isset( $groupData)? $groupData:[];
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        $initialSortList = array(
            "profile",
            "pitchLengthLpLwMM",
            "pitchLengthLpLwIN",
            "refLengthLrMM",
            "refLengthLrIN",
            "ribs",
            "widthMM",
            "insideLengthMM",
            "insideLengthIN",
            "datumLengthMM",
            "datumLengthIN",
            "effectiveLengthMM",
            "effectiveLengthIN"
        );

        $decimalPlaceAttribute = array (
            "effectiveLengthIN",
            "pitchLengthLpLwIN",
            "datumLengthIN",
            "outsideLengthIN",
            "insideLengthIN",
            "heightIN",
            "heightMM",
            "widthMM",
            "widthIN",
            "toothPitchPtIN",
            "refLineDiffHBIN",
            "ProfileHeightHIN",
            "beltThicknessHsIN",
            "toothHeightHtIN",
            "ribPitchIN",
            "pitchWidthBDMM",
            "pitchWidthBDIN",
            "pitchHeightHduMM",
            "pitchHeightHduIN",
            "lowerBeltWidthBiIN",
            "maxPulleyGroove"
        );

        $language = $this->document->getProperty('language');
        $language = $language ? $language : 'en';
        $footerLogoSrc = '';
        $objectLevel5thId = '';
        $catalogCategoryTableObjectEditable = $this->document->getEditable('ptg_eu_product_page');
        $groupData = array();
        if($catalogCategoryTableObjectEditable)
        {
            $catalogCategoryTableObject = $catalogCategoryTableObjectEditable->getElement();
            if($catalogCategoryTableObject)
            {
                $commonHelper = $this->containerInterface->get(self::COMMON_HELPER);
                $attributeImagesConfig = $this->getContainerConfig('AttributeImagesConfig');
                $priceListTableConfig = $this->getContainerConfig('PriceListTableConfig');

                $priceListTableColumn = $commonHelper->getParameter($priceListTableConfig, 'priceListTableColumn');
                $priceListCurrency = $commonHelper->getParameter($priceListTableConfig, 'priceListCurrency');
                $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
                $catalogImagesPTGFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesPTGFooter');

                $catalogObj = DataObject\PTGEUCatalog::getById($catalogCategoryTableObject->getParentId());
                $isPriceCatalog = $catalogObj->getIsPriceCatalog();
                $distributionChannel = $catalogObj->getDistributionChannel();
                $salesOrganisation = $catalogObj->getSalesOrganisation();
                $deliveringPlant = $catalogObj->getDeliveringPlant();
                $currency = $catalogObj->getCurrency();
                $validFromDate = $catalogObj->getValidFromDate();
                $objColumnsData = $catalogCategoryTableObject->getColumns();
                $sortingColumnsData = $catalogCategoryTableObject->getSortingColumns();

                $fifthLevelCategoryObj = $catalogCategoryTableObject->getFifthLevelCategory();
                $sixSevenLevelCategoryObj = $catalogCategoryTableObject->getSixSevenLevelCategory();

                $ptgEUProductHierarchy = DataObject\PTGEUProductHierarchy::getById($fifthLevelCategoryObj);
                $siop5Category = ($ptgEUProductHierarchy != null)?$ptgEUProductHierarchy->getPrintedCatalogDescription():'';
                $siop6siop7Category = '';
                $objectLevel5thDetails = '';
                $plantAssociatedMaterials = [];
                $salesAssociatedMaterials = [];

                # get All PlantMaterialMaster of the selected Delivery Plant
                if(trim($deliveringPlant))
                {
                    $sql = "SELECT id FROM `object_PTGEUPlant` WHERE Plant = '$deliveringPlant' AND published = 1 ";
                    $deliveringPlantID =  $this->db->fetchOne($sql);

                    $sql = "SELECT TRIM(BOTH ',' FROM `Material`) AS `materialID` FROM `object_40` ";
                    $sql .= " WHERE plant__id = '$deliveringPlantID' AND published = 1 ";

                    $plantAssociatedMaterials =  $this->db->fetchFirstColumn($sql);
                }

                # get All SalesMaterialMaster of the selected Sales Organization
                if(trim($salesOrganisation))
                {
                    $sql = "SELECT id FROM `object_PTGEUSalesOrg` ";
                    $sql .= " WHERE salesOrgCode = '$salesOrganisation' AND published = 1 ";

                    $salesOrganisationID =  $this->db->fetchOne($sql);

                    $sql = "SELECT TRIM(BOTH ',' FROM `Material`) AS `materialID` FROM `object_41` ";
                    $sql .= " WHERE salesOrganization__id = '$salesOrganisationID' AND published = 1 ";
                    $salesAssociatedMaterials =  $this->db->fetchFirstColumn($sql);
                }


                if($ptgEUProductHierarchy)
                {
                    $sql = "SELECT * FROM `object_query_38` WHERE productType = 'base' ";
                    $sql .= "AND hierarchyLevel5 LIKE '%$fifthLevelCategoryObj%' LIMIT 1";
                    $objectLevel5thDetails =  $this->db->fetchAssociative($sql);

                    if($objectLevel5thDetails)
                    {
                        $objectLevel5thId = $objectLevel5thDetails['oo_id'];
                    }
                }



                if($objectLevel5thId)
                {
                    $seventhLevelProductList = [];

                    if($sixSevenLevelCategoryObj)
                    {
                        foreach ($sixSevenLevelCategoryObj as $categoryId) {

                            $sql = "SELECT oo_id FROM `object_query_38` WHERE productType = 'skeleton' ";
                            $sql .= " AND hierarchyLevel7 LIKE '%$categoryId%' LIMIT 1";
                            $objectLevel7thId =  $this->db->fetchOne($sql);

                            if($objectLevel7thId)
                            {
                                $seventhLevelProductList[] = $objectLevel7thId;
                            }
                        }
                    }

                    $this->columnsData = json_decode($objColumnsData, true);
                    $this->sortColumnsData = json_decode($sortingColumnsData, true);

                    $columnDataArr = [];
                    if($this->columnsData)
                    {
                        foreach ($this->columnsData as $key => $value) {
                            $columnDataArr[] = $key;
                        }
                    }

                    $result = [];
                    if($this->sortColumnsData)
                    {
                        $result = array_diff($this->sortColumnsData, $columnDataArr);
                    }

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

                    if($isPriceCatalog)
                    {
                        $this->columnsData['listPrice']['columnLabel'] = 'listPrice';
                        $this->columnsData['listPrice']['unitName'] = $priceListCurrency[$currency];
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

                    if($this->columnsData)
                    {
                        foreach ($orderKeys as $fieldName) {
                            $orderFieldNameList[$fieldName] = $this->columnsData[$fieldName];
                        }
                    }

                    $this->subHeaderRequired = 'YES';
                    $groupData['subHeaderRequired'] = $this->subHeaderRequired;
                    $groupData['iconRequired'] = $this->iconRequired;
                    $groupData['material'] = $objectLevel5thDetails['material'];
                    $groupData['heatAndOilResistant'] = $objectLevel5thDetails['heatAndOilResistant'];
                    $groupData['performance'] = '';
                    if($objectLevel5thDetails['performance']) {
                        $performanceId = $objectLevel5thDetails['performance'];
                        $sql = "SELECT performance FROM object_localized_PTGEUPerformance_{$language} WHERE ooo_id = '$performanceId';";
                        $result = $this->db->fetchOne($sql);
                        $groupData['performance'] = $result;
                    }
                    $groupData['staticConductive'] = '';
                    if($objectLevel5thDetails['staticConductive']){
                        $sql = "SELECT staticConductive FROM `object_query_38` WHERE `oo_id` = '$objectLevel5thId'";
                        $staticConductiveId =  $this->db->fetchOne($sql);
                        $sql = "SELECT staticConductive FROM object_localized_PTGEUStaticConductive_{$language} WHERE ooo_id = '$staticConductiveId';";
                        $result = $this->db->fetchOne($sql);
                        $groupData['staticConductive'] = $result;
                    }

                    $reinforcementSelected = trim($objectLevel5thDetails['reinforcement'], ",");
                    $groupData['reinforcement'] = $reinforcementSelected;

                    $this->featuresList = $this->getFeaturesList($language);
                    $safetyFeatures = array();
                    $featuresBenefitsBulletPointSelected = $objectLevel5thDetails['FeaturesBenefitsBulletPoint'];
                    $featuresBenefitsBulletPointSelectedList = explode(',',$featuresBenefitsBulletPointSelected);
                    $featuresBenefitsBulletPointSelectedList = array_filter($featuresBenefitsBulletPointSelectedList);

                    if($featuresBenefitsBulletPointSelectedList)
                    {
                        foreach ($featuresBenefitsBulletPointSelectedList as $feature) {
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
                    $mainImageObj = null;
                    if($objectLevel5thDetails['mainImage1'])
                    {
                        $mainImageObj = \Pimcore\Model\Asset::getById($objectLevel5thDetails['mainImage1']);
                    }
                    $groupData['mainImageObj'] = $mainImageObj;

                    $technicalDrawing1Obj = null;
                    if($objectLevel5thDetails['technicalDrawing1'])
                    {
                        $technicalDrawing1Obj = \Pimcore\Model\Asset::getById($objectLevel5thDetails['technicalDrawing1']);
                    }
                    $groupData['technicalDrawing1Obj'] = $technicalDrawing1Obj;

                    $sql = "SELECT longDescription FROM `object_localized_data_38` WHERE ooo_id = '$objectLevel5thId' AND `language` = '{$language}' LIMIT 1";
                    $longDescription =  $this->db->fetchOne($sql);
                    $groupData['longDescription'] = $longDescription;
                    $groupData['temperatureRange'] = '';
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
                    elseif($objectLevel5thDetails['minimumTemperatureF'] && $objectLevel5thDetails['maximumTemperatureF'])
                    {
                        $minTempF = round($objectLevel5thDetails['minimumTemperatureF']);

                        if($objectLevel5thDetails['minimumTemperatureF'] > 0 || $objectLevel5thDetails['minimumTemperatureF'] < 0){
                            $minTempF = '-'.round($objectLevel5thDetails['minimumTemperatureF']);
                        }
                        $groupData['temperatureRange'] = $minTempF.'°F'.' to '.round($objectLevel5thDetails['maximumTemperatureF']).'°F';
                    }
                    elseif($objectLevel5thDetails['minimumTemperatureC'] && $objectLevel5thDetails['maximumTemperatureC'])
                    {
                        $minTempC = round($objectLevel5thDetails['minimumTemperatureC']);

                        if($objectLevel5thDetails['minimumTemperatureC'] > 0 || $objectLevel5thDetails['minimumTemperatureC'] < 0){
                            $minTempC = '-'.round($objectLevel5thDetails['minimumTemperatureC']);
                        }
                        $groupData['temperatureRange'] = $minTempC.'°C'.' to '.round($objectLevel5thDetails['maximumTemperatureC']).'°C';
                    }

                    $groupData['brandName'] = $objectLevel5thDetails['ProductName'];

                    $sql = "SELECT * FROM `object_38` WHERE `parentId` = '$objectLevel5thId' ORDER BY id ASC";
                    $row6ThLevelDetails =  $this->db->fetchAllAssociative($sql);
                    $notApplicableFields = [];
                    $articles = [];
                    $plantAssociatedMaterialsString = '';
                    $salesAssociatedMaterialsString = '';
                    if($plantAssociatedMaterials)
                    {
                        $plantAssociatedMaterialsString = "'".implode("', '", $plantAssociatedMaterials)."'";
                    }

                    if($salesAssociatedMaterials)
                    {
                        $salesAssociatedMaterialsString = "'".implode("', '", $salesAssociatedMaterials)."'";
                    }

                    foreach ($row6ThLevelDetails as $objectLevel6) {
                        $objectLevel6thId = $objectLevel6['id'];
                        if(empty($seventhLevelProductList) || in_array($objectLevel6thId, $seventhLevelProductList))
                        {
                            $appendWhereClauseSQL = '';
                            if(trim($plantAssociatedMaterialsString) && trim($salesAssociatedMaterialsString))
                            {
                                $appendWhereClauseSQL = "AND `oo_id` IN ($plantAssociatedMaterialsString) ";
                                $appendWhereClauseSQL .= "AND `oo_id` IN ($salesAssociatedMaterialsString)";
                            }
                            elseif(trim($plantAssociatedMaterialsString))
                            {
                                $appendWhereClauseSQL = "AND `oo_id` IN ($plantAssociatedMaterialsString)";
                            }
                            elseif(trim($salesAssociatedMaterialsString))
                            {
                                $appendWhereClauseSQL = "AND `oo_id` IN ($salesAssociatedMaterialsString)";
                            }

                            $sql = "SELECT * FROM `object_38` ";
                            $sql .= " WHERE `parentId` = '$objectLevel6thId' $appendWhereClauseSQL ORDER BY id ASC";
                            $productObjectLevel7List =  $this->db->fetchAllAssociative($sql);

                            foreach ($productObjectLevel7List as $article) {
                                if($article['printedCatalogFlag'] == '1')
                                {
                                    foreach ($orderFieldNameList as $fieldName => $fields) {
                                        if(isset($fields['objectLevel']) && ($fields['objectLevel'] == 'fert') && ($fields['fieldLevel'] == 'class'))
                                        {
                                            if(ucfirst($fields['fieldType']) == 'Input')
                                            {
                                                $data[$fieldName] = $article[$fieldName];
                                            }
                                            elseif(trim($article[$fieldName]) && ucfirst($fields['fieldType']) == 'Number')
                                            {
                                                if($fieldName == 'netWeight' || $fieldName == 'grossWeight'){
                                                    $data[$fieldName] = number_format($article[$fieldName],3,".","");
                                                }
                                                else{
                                                        $data[$fieldName] = floatval($article[$fieldName]);
                                                }
                                            }
                                        }
                                        elseif(isset($fields['objectLevel']) &&  ($fields['objectLevel'] == 'base') && ($fields['fieldLevel'] == 'class'))
                                        {
                                            if(ucfirst($fields['fieldType']) == 'Input')
                                            {
                                                if($fieldName == 'beltType' || $fieldName == 'color'|| $fieldName == 'Color') {
                                                    if($fieldName == 'Color') {
                                                        $lcFieldName = lcfirst($fieldName);
                                                        $sql = "SELECT $lcFieldName FROM object_localized_PTGEU".ucfirst($fieldName)."_{$language} WHERE ooo_id = '$objectLevel5thDetails[$lcFieldName]';";
                                                    } else {
                                                        $sql = "SELECT $fieldName FROM object_localized_PTGEU".ucfirst($fieldName)."_{$language} WHERE ooo_id = '$objectLevel5thDetails[$fieldName]';";
                                                    }
                                                    $result = $this->db->fetchFirstColumn($sql);
                                                    if($result != null){
                                                        $data[$fieldName] = $result[0];
                                                    } else {
                                                        $data[$fieldName] = null;
                                                    }
                                                } else {
                                                    $data[$fieldName] = $objectLevel5thDetails[$fieldName];
                                                }
                                            }
                                            elseif(trim($objectLevel5thDetails[$fieldName]) && ucfirst($fields['fieldType']) == 'Number')
                                            {
                                                    $data[$fieldName] = floatval($objectLevel5thDetails[$fieldName]);
                                            }
                                        }
                                        elseif(isset($fields['objectLevel']) && ($fields['objectLevel'] == 'skeleton') && ($fields['fieldLevel'] == 'class'))
                                        {
                                            if(ucfirst($fields['fieldType']) == 'Input')
                                            {
                                                $data[$fieldName] = $objectLevel6[$fieldName];
                                            }
                                            elseif(trim($objectLevel6[$fieldName]) && ucfirst($fields['fieldType']) == 'Number')
                                            {
                                                    $data[$fieldName] = floatval($objectLevel6[$fieldName]);
                                            }
                                        }
                                        elseif(isset($fields['objectLevel']) && ($fields['objectLevel'] == 'skeleton') && ($fields['fieldLevel'] == 'objectBrick'))
                                        {
                                            $inputOrNumber = false;
                                            $isNumericField = false;
                                            if(ucfirst($fields['fieldType']) == 'Input')
                                            {
                                                $inputOrNumber = true;
                                            }
                                            elseif(ucfirst($fields['fieldType']) == 'Number')
                                            {
                                                $inputOrNumber = true;
                                                $isNumericField = true;
                                            }

                                            if($inputOrNumber)
                                            {
                                                $o_id = $objectLevel6['oo_id'];
                                                $objectBrickName = $fields['objectBrickName'];
                                                $sql = "SELECT * FROM `object_brick_query_{$objectBrickName}_38` WHERE `id` = '$o_id'";
                                                $rowData =  $this->db->fetchAssociative($sql);
                                                if($rowData)
                                                {
                                                    if(isset($rowData[$fieldName]) && trim($rowData[$fieldName]) && $isNumericField){
                                                        if(in_array($fieldName, $decimalPlaceAttribute)){
                                                            $data[$fieldName] = number_format($rowData[$fieldName],2,".","");
                                                        }else{
                                                            $data[$fieldName] = floatval($rowData[$fieldName]);
                                                        }
                                                    }else{
                                                        if(isset($rowData[$fieldName]))
                                                        {
                                                            $data[$fieldName] = $rowData[$fieldName];
                                                        } else {
                                                            $data[$fieldName] = '';
                                                        }
                                                    }
                                                }
                                                else
                                                {
                                                    $data[$fieldName]= '';
                                                    $notApplicableFields[$fields['groupName']]= $fieldName;
                                                }
                                            }

                                        }
                                        elseif(isset($fields['objectLevel']) && $fields['objectLevel'] == 'fert' && ($fields['fieldLevel'] == 'objectBrick'))
                                        {
                                            $inputOrNumber = false;
                                            $isNumericField = false;
                                            if(ucfirst($fields['fieldType']) == 'Input')
                                            {
                                                $inputOrNumber = true;
                                            }
                                            elseif(ucfirst($fields['fieldType']) == 'Number')
                                            {
                                                $inputOrNumber = true;
                                                $isNumericField = true;
                                            }

                                            if($inputOrNumber)
                                            {
                                                $o_id = $article['id'];
                                                $objectBrickName = $fields['objectBrickName'];
                                                $sql = "SELECT * FROM `object_brick_query_{$objectBrickName}_38` WHERE `id` = '$o_id'";
                                                $rowData =  $this->db->fetchAssociative($sql);
                                                if($rowData)
                                                {
                                                    if($fieldName == 'datumLengthMM' || $fieldName == 'effectiveLengthMM' || $fieldName == 'pitchLengthLpLwMM' || $fieldName == 'insideLengthMM' || $fieldName == 'refLengthLrMM'){
                                                        $data[$fieldName] = round($rowData[$fieldName]);
                                                    }
                                                    elseif($isNumericField){
                                                        if(in_array($fieldName, $decimalPlaceAttribute)){
                                                            $data[$fieldName] = number_format($rowData[$fieldName],2,".","");
                                                        }else{
                                                            $data[$fieldName] = floatval($rowData[$fieldName]);
                                                        }
                                                    }else{
                                                        $data[$fieldName] = $rowData[$fieldName];
                                                    }
                                                }
                                                else
                                                {
                                                    $data[$fieldName]= '';
                                                    $notApplicableFields[$fields['groupName']]= $fieldName;
                                                }
                                            }

                                        }
                                    }

                                    if($isPriceCatalog)
                                    {
                                        $listPrice = '';
                                        if($article['priceData'])
                                        {
                                            $recordArray = explode(PHP_EOL, $article['priceData']);

                                            if(count($recordArray))
                                            {
                                                foreach ($recordArray as $rvalue) {
                                                    $pvalue = explode('|', $rvalue);
                                                    if(($pvalue[$priceListTableColumn['Rate Unit']] == $currency) && ($pvalue[$priceListTableColumn['Distribution Channel']] == $distributionChannel) && ($pvalue[$priceListTableColumn['Sales Organization']] == $salesOrganisation))
                                                    {
                                                        $validityStartDate = \Carbon\Carbon::createFromFormat('Y-m-d',$pvalue[$priceListTableColumn['Validity Start Date']]);
                                                        $validityEndDate = \Carbon\Carbon::createFromFormat('Y-m-d',$pvalue[$priceListTableColumn['Validity End Date']]);

                                                        if(isset($validFromDate) && isset($validityStartDate) && isset($validityEndDate) && $validFromDate->between($validityStartDate, $validityEndDate)) {
                                                            $listPrice = $pvalue[$priceListTableColumn['Rate']];
                                                            break;
                                                        } else {
                                                            $listPrice = $pvalue[$priceListTableColumn['Rate']];
                                                            break;
                                                        }

                                                    }
                                                }
                                            }
                                        }

                                        $data['listPrice'] = trim($listPrice) ? floatval($listPrice) : $listPrice;
                                    }

                                    $articles[] = $data;
                                }
                            }
                        }
                    }
                    $sortedColums = [];
                    if($this->sortColumnsData)
                    {
                        foreach ($this->sortColumnsData as $sortColumn) {
                            $sortedColums[] = $sortColumn;
                        }
                    }

                    $firstCol = isset($sortedColums[0])?array_column($articles, $sortedColums[0]):null;
                    $secondCol = isset($sortedColums[1])?array_column($articles, $sortedColums[1]):null;
                    $thirdCol = isset($sortedColums[2])?array_column($articles, $sortedColums[2]):null;
                    $fourthCol = isset($sortedColums[3])?array_column($articles, $sortedColums[3]):null;
                    $fifthCol = isset($sortedColums[4])?array_column($articles, $sortedColums[4]):null;
                    $sixthCol = isset($sortedColums[5])?array_column($articles, $sortedColums[5]):null;
                    $seventhCol = isset($sortedColums[6])?array_column($articles, $sortedColums[6]):null;
                    $eighthCol = isset($sortedColums[7])?array_column($articles, $sortedColums[7]):null;
                    $ninethCol = isset($sortedColums[8])?array_column($articles, $sortedColums[8]):null;
                    $tenthCol = isset($sortedColums[9])?array_column($articles, $sortedColums[9]):null;
                    $eleventhCol = isset($sortedColums[10])?array_column($articles, $sortedColums[10]):null;
                    $twelthCol = isset($sortedColums[11])?array_column($articles, $sortedColums[11]):null;
                    $thirtenthCol = isset($sortedColums[12])?array_column($articles, $sortedColums[12]):null;
                    $fourtenthCol = isset($sortedColums[13])?array_column($articles, $sortedColums[13]):null;
                    $fifteenthCol = isset($sortedColums[14])?array_column($articles, $sortedColums[14]):null;
                    $sixteenthCol = isset($sortedColums[15])?array_column($articles, $sortedColums[15]):null;

                    switch (count($sortedColums)) {
                        case 16:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $ninethCol,
                                SORT_ASC,
                                $tenthCol,
                                SORT_ASC,
                                $eleventhCol,
                                SORT_ASC,
                                $twelthCol,
                                SORT_ASC,
                                $thirtenthCol,
                                SORT_ASC,
                                $fourtenthCol,
                                SORT_ASC,
                                $fifteenthCol,
                                SORT_ASC,
                                $sixteenthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 15:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $ninethCol,
                                SORT_ASC,
                                $tenthCol,
                                SORT_ASC,
                                $eleventhCol,
                                SORT_ASC,
                                $twelthCol,
                                SORT_ASC,
                                $thirtenthCol,
                                SORT_ASC,
                                $fourtenthCol,
                                SORT_ASC,
                                $fifteenthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 14:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $ninethCol,
                                SORT_ASC,
                                $tenthCol,
                                SORT_ASC,
                                $eleventhCol,
                                SORT_ASC,
                                $twelthCol,
                                SORT_ASC,
                                $thirtenthCol,
                                SORT_ASC,
                                $fourtenthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 13:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $ninethCol,
                                SORT_ASC,
                                $tenthCol,
                                SORT_ASC,
                                $eleventhCol,
                                SORT_ASC,
                                $twelthCol,
                                SORT_ASC,
                                $thirtenthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 12:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $ninethCol,
                                SORT_ASC,
                                $tenthCol,
                                SORT_ASC,
                                $eleventhCol,
                                SORT_ASC,
                                $twelthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 11:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $ninethCol,
                                SORT_ASC,
                                $tenthCol,
                                SORT_ASC,
                                $eleventhCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 10:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $ninethCol,
                                SORT_ASC,
                                $tenthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 9:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $ninethCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 8:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $eighthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 7:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $seventhCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 6:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $sixthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 5:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $fifthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 4:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $fourthCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 3:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $thirdCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 2:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $secondCol,
                                SORT_ASC,
                                $articles
                            );
                            break;
                        case 1:
                            array_multisort(
                                $firstCol,
                                SORT_ASC,
                                SORT_NATURAL,
                                $articles
                            );
                            break;
                        default:
                            $result = array_diff($initialSortList, $columnDataArr);

                            $firstCol = isset($initialSortList[0])?array_column($articles,$initialSortList[0]):null;
                            $secondCol = isset($initialSortList[1])?array_column($articles,$initialSortList[1]):null;
                            $thirdCol = isset($initialSortList[2])?array_column($articles,$initialSortList[2]):null;
                            $fourthCol = isset($initialSortList[3])?array_column($articles,$initialSortList[3]):null;
                            $fifthCol = isset($initialSortList[4])?array_column($articles,$initialSortList[4]):null;
                            $sixthCol = isset($initialSortList[5])?array_column($articles,$initialSortList[5]):null;
                            $seventhCol = isset($initialSortList[6])?array_column($articles,$initialSortList[6]):null;
                            $eighthCol = isset($initialSortList[7])?array_column($articles,$initialSortList[7]):null;
                            $ninethCol = isset($initialSortList[8])?array_column($articles,$initialSortList[8]):null;
                            $tenthCol = isset($initialSortList[9])?array_column($articles,$initialSortList[9]):null;
                            $eleventhCol =isset($initialSortList[10])?array_column($articles,$initialSortList[10]):null;
                            $twelthCol = isset($initialSortList[11])?array_column($articles,$initialSortList[11]):null;
                            $thirtenthCol=isset($initialSortList[12])?array_column($articles,$initialSortList[12]):null;
                            $fourtenthCol=isset($initialSortList[13])?array_column($articles,$initialSortList[13]):null;
                            $fifteenthCol=isset($initialSortList[14])?array_column($articles,$initialSortList[14]):null;
                            $sixteenthCol=isset($initialSortList[15])?array_column($articles,$initialSortList[15]):null;

                            if (count($result) == 0) {
                                array_multisort(
                                    $firstCol,
                                    SORT_ASC,
                                    SORT_NATURAL,
                                    $secondCol,
                                    SORT_ASC,
                                    $thirdCol,
                                    SORT_ASC,
                                    $fourthCol,
                                    SORT_ASC,
                                    $fifthCol,
                                    SORT_ASC,
                                    $sixthCol,
                                    SORT_ASC,
                                    $seventhCol,
                                    SORT_ASC,
                                    $eighthCol,
                                    SORT_ASC,
                                    $ninethCol,
                                    SORT_ASC,
                                    $tenthCol,
                                    SORT_ASC,
                                    $eleventhCol,
                                    SORT_ASC,
                                    $twelthCol,
                                    SORT_ASC,
                                    $thirtenthCol,
                                    SORT_ASC,
                                    $fourtenthCol,
                                    SORT_ASC,
                                    $fifteenthCol,
                                    SORT_ASC,
                                    $sixteenthCol,
                                    SORT_ASC,
                                    $articles
                                );
                            } elseif (count($result) != 0) {

                                foreach ($result as $key => $value) {
                                    unset($initialSortList[$key]);
                                }

                                $remainingList = [];
                                foreach ($initialSortList as $key => $value) {
                                    $remainingList[] = $value;
                                }

                                $firstCol = isset($remainingList[0])?array_column($articles,$remainingList[0]):null;
                                $secondCol = isset($remainingList[1])?array_column($articles,$remainingList[1]):null;
                                $thirdCol = isset($remainingList[2])?array_column($articles,$remainingList[2]):null;
                                $fourthCol = isset($remainingList[3])?array_column($articles,$remainingList[3]):null;
                                $fifthCol = isset($remainingList[4])?array_column($articles,$remainingList[4]):null;
                                $sixthCol = isset($remainingList[5])?array_column($articles,$remainingList[5]):null;
                                $seventhCol = isset($remainingList[6])?array_column($articles,$remainingList[6]):null;
                                $eighthCol = isset($remainingList[7])?array_column($articles,$remainingList[7]):null;
                                $ninethCol = isset($remainingList[8])?array_column($articles,$remainingList[8]):null;
                                $tenthCol = isset($remainingList[9])?array_column($articles,$remainingList[9]):null;
                                $eleventhCol =isset($remainingList[10])?array_column($articles,$remainingList[10]):null;
                                $twelthCol = isset($remainingList[11])?array_column($articles,$remainingList[11]):null;
                                $thirtenthCol=isset($remainingList[12])?array_column($articles,$remainingList[12]):null;
                                $fourtenthCol=isset($remainingList[13])?array_column($articles,$remainingList[13]):null;
                                $fifteenthCol=isset($remainingList[14])?array_column($articles,$remainingList[14]):null;
                                $sixteenthCol=isset($remainingList[15])?array_column($articles,$remainingList[15]):null;

                                switch (count($remainingList)) {
                                    case 1:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $articles
                                        );
                                        break;
                                    case 2:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 3:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 4:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 5:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 6:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 7:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 8:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 9:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $ninethCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 10:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $ninethCol,
                                            SORT_ASC,
                                            $tenthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 11:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $ninethCol,
                                            SORT_ASC,
                                            $tenthCol,
                                            SORT_ASC,
                                            $eleventhCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 12:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $ninethCol,
                                            SORT_ASC,
                                            $tenthCol,
                                            SORT_ASC,
                                            $eleventhCol,
                                            SORT_ASC,
                                            $twelthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 13:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $ninethCol,
                                            SORT_ASC,
                                            $tenthCol,
                                            SORT_ASC,
                                            $eleventhCol,
                                            SORT_ASC,
                                            $twelthCol,
                                            SORT_ASC,
                                            $thirtenthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 14:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $ninethCol,
                                            SORT_ASC,
                                            $tenthCol,
                                            SORT_ASC,
                                            $eleventhCol,
                                            SORT_ASC,
                                            $twelthCol,
                                            SORT_ASC,
                                            $thirtenthCol,
                                            SORT_ASC,
                                            $fourtenthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 15:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $ninethCol,
                                            SORT_ASC,
                                            $tenthCol,
                                            SORT_ASC,
                                            $eleventhCol,
                                            SORT_ASC,
                                            $twelthCol,
                                            SORT_ASC,
                                            $thirtenthCol,
                                            SORT_ASC,
                                            $fourtenthCol,
                                            SORT_ASC,
                                            $fifteenthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    case 16:
                                        array_multisort(
                                            $firstCol,
                                            SORT_ASC,
                                            SORT_NATURAL,
                                            $secondCol,
                                            SORT_ASC,
                                            $thirdCol,
                                            SORT_ASC,
                                            $fourthCol,
                                            SORT_ASC,
                                            $fifthCol,
                                            SORT_ASC,
                                            $sixthCol,
                                            SORT_ASC,
                                            $seventhCol,
                                            SORT_ASC,
                                            $eighthCol,
                                            SORT_ASC,
                                            $ninethCol,
                                            SORT_ASC,
                                            $tenthCol,
                                            SORT_ASC,
                                            $eleventhCol,
                                            SORT_ASC,
                                            $twelthCol,
                                            SORT_ASC,
                                            $thirtenthCol,
                                            SORT_ASC,
                                            $fourtenthCol,
                                            SORT_ASC,
                                            $fifteenthCol,
                                            SORT_ASC,
                                            $sixteenthCol,
                                            SORT_ASC,
                                            $articles
                                        );
                                        break;
                                    default:
                                        break;
                                }
                            }

                    }
                    $articlesData['articlesData'] = $articles;
                    $groupData['data'] = $articlesData;
                    $groupData['columnsDataWithImages'] = $columnsDataWithImages;
                    $groupData['siop6siop7Category'] = $siop6siop7Category;
                    $groupData['siop5Category'] = $siop5Category;

                    $footerLogoSrc = $catalogImagesPTGFooter['Orange'];
                    $footerLogoSrc = $this->getS3ImageSrc($footerLogoSrc);
                }
            }
            $parameterBag['footer_class'] = '';
            $parameterBag['footer_logo_src'] = $footerLogoSrc;
            $parameterBag['groupData'] = $groupData;
        }
        return $this->render("ptgeucatalog/default/template_ptg_eu_product_page.html.twig", $parameterBag);
    }

    public function getFiveSortedFeaturesWithIconList($safetyFeatures): ?array
    {
        $safetyFeatures = array_unique($safetyFeatures);

        $safetyFeaturesList  = array();
        $safetyFeaturesListWithImage = array();
        $safetyFeaturesListWithOutImage = array();

        if($safetyFeatures)
        {
            foreach ($safetyFeatures as $fvalue) {
		        $fIcon = isset($this->featuresList[$fvalue]['icon']) ? $this->featuresList[$fvalue]['icon']:null;
                $fName = isset($this->featuresList[$fvalue]['name']) ? $this->featuresList[$fvalue]['name']:null;
                if($fIcon)
                {
                    if(!isset($this->s3srcArr[$fvalue]))
                    {
                        $this->s3srcArr[$fvalue] = $this->getS3ImageSrc($fIcon);
                    }
                    $safetyFeaturesListWithImage[] = array('name'=>$fName, 'iconSrc' => $fvalue);
                }
                else
                {
                    $safetyFeaturesListWithOutImage[] = array('name'=>$fName, 'iconSrc' => $fIcon);
                }
            }
        }

        $safetyFeaturesList = array_merge_recursive($safetyFeaturesListWithImage,$safetyFeaturesListWithOutImage);

	    if($safetyFeaturesList)
        {
            $safetyFeaturesList = array_slice($safetyFeaturesList, 0, 5);
            foreach ($safetyFeaturesList as $key => $value) {

                if(isset($this->s3srcArr[$value['iconSrc']]))
                {
                    $safetyFeaturesList[$key]['iconSrc'] = $this->s3srcArr[$value['iconSrc']];
                }
            }
        }

        unset($safetyFeaturesListWithImage);
        unset($safetyFeaturesListWithOutImage);

        return $safetyFeaturesList;
    }

    private function getFeaturesList($language): ?array
    {
        $entries = new DataObject\PTGEUFeaturesAndBenefits\Listing();
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            if($entry->getFeaturesAndBenefitsImage())
            {
                $fbImage = $entry->getFeaturesAndBenefitsImage();
                $featureData[$entry->getId()]['icon'] = $fbImage->getPath().$fbImage->getFilename();
            }

            $featureData[$entry->getId()]['name'] = $entry->getFeaturesAndBenefits($language);
            $featureData[$entry->getId()]['key'] = $entry->getKey();
        }
        return $featureData;
    }

    public function getS3ImageSrc($src): ?string
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,$this->imageWidth);
        }

        return $s3src;
    }

    public function getColumnHeadersForCatalog(): ?array
    {
        $columnsDataWithImages = array();

        if($this->columnsData)
        {
            foreach ($this->columnsData as $key => $value) {
		        $groupColumnName = $key;
                $groupName = '';

                $columnWidth = '';
                $unitName = '';

                if(isset($value['columnWidth']) && $value['columnWidth'])
                {
                    $columnWidth = $value['columnWidth'];
                }

                if(isset($value['unitName']) && $value['unitName'])
                {
                    $unitName = $value['unitName'];
                }

                if(isset($value['groupName']) && $value['groupName'])
                {
                    $groupColumnName = $value['groupName'];
                    $groupName = $value['groupName'];
                    $this->subHeaderRequired = 'YES';
                }

                $columnsDataWithImages[$groupColumnName][$key]['groupName'] = $groupName;
                $columnsDataWithImages[$groupColumnName][$key]['columnWidth'] = $columnWidth;
                $translatedCurrencyUnitName = $this->translatorInterface->trans("PTGEU_currency_".$unitName);
                $translatedUnitName = $this->translatorInterface->trans("PTGEU_unit_".$unitName);
                $translatedGroupColumnName = $this->translatorInterface->trans("PTGEU_".$groupColumnName);
                if($key == 'listPrice')
                {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $translatedCurrencyUnitName;
                }
                else
                {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($unitName) ? $translatedUnitName : '';
                }

                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $key;
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $translatedGroupColumnName;
                if ($this->iconRequired == 'YES')
                {
                    if(!isset($this->attrbuteImgS3Arr[$groupColumnName]))
                    {
                        if(isset($this->attributeImages[$groupColumnName]))
                        {
                            $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                            $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                            $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                            $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImagesSrc;
                        }
                    }
                    else
                    {
                        $columnIcon = $this->attrbuteImgS3Arr[$groupColumnName];
                        $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $columnIcon;
                    }
                }
            }
        }

        return $columnsDataWithImages;
    }

    public function getRequestedParameter(Request $request, $documentId): ?array
    {
        $parameterBag = [];
        $isParentContainerRequest = $request->get('isParentContainerRequest');
        $parameterBag['isParentContainerRequest'] = $isParentContainerRequest ? $isParentContainerRequest : false;
        $parameterBag['printermarks'] = $request->get('printermarks');

        $imageWidth = null;
        $imageRecompression = null;
        $printConfigFile = Processor::getJobConfigFile($documentId);
        if(file_exists($printConfigFile)){
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode( $printConfigFileContent,true);
            $imageRecompression = $printConfig['config']['Image Quality'];
            $imageWidth = $printConfig['config']['Image Width'];
        }
        $this->imageWidth = $imageWidth;
        $parameterBag['imageQuality'] = $imageRecompression;
        $parameterBag['imageWidth'] = $imageWidth;

        return $parameterBag;
    }

    public function getContainerConfig(string $string): ?array
    {
        $config = null;
        if ($string == 'AttributeImagesConfig') {
            $config = $this->containerInterface->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getAttributeImagesConfig();
        } elseif ($string == 'PriceListTableConfig') {
            $config = $this->containerInterface->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getPriceListTableConfig();
        } elseif ($string == 'CatalogConfig') {
            $config = $this->containerInterface->get(self::CATALOG_CONFIG_PROVIDER_SERVICE)->getCatalogConfig();
        }
        return $config;
    }
}
