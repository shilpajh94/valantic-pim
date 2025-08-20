<?php

namespace CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;
use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use \Exception;
use Pimcore\Controller\FrontendController;
use Pimcore\Bundle\WebToPrintBundle\Processor;
use Pimcore\Model\Asset;
use CatalogBundle\Controller\DefaultController;
use Symfony\Component\Yaml\Yaml;


class PtsSectionPageController extends FrontendController
{
    private $defaultController;
    private $db;
    private $catalogTemplatingHelper;
    private $containerInterface;
    private $translatorInterface;
    private $featuresList;
    private $s3srcArr = [];


    public function __construct(DefaultController $defaultController, ContainerInterface $container, TranslatorInterface $translator, CatalogTemplatingHelper $catalogTemplatingHelper)
    {
        $this->db = Db::get();
        $this->defaultController = $defaultController;
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        $this->containerInterface = $container;
        $this->translatorInterface = $translator;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

    public function getColumnsData($request, $template, $selectedColumns)
    {
        $parameterBag = array();
        $footerBgColor='';
        $commonHelper = $this->containerInterface->get('app.common_helper');
        $language = (isset($this->document->getProperties()['language'])) ? ($this->document->getProperties()['language'])->getData() : 'en';
        $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
        $catalogImagesPTGFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesPTGFooter');
        $this->featuresList = $this->defaultController->getFeaturesList($language);
        if (!$request->get('contentDocument')->getPublished()) {
            $parameterBag = $this->defaultController->getRequestedParameter($request, 0);
        } else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->defaultController->getRequestedParameter($request, $documentId); 
                } 
            } 

            $baseProductID = $template->getBaseproduct();

            $sqlQueries = array_map(function($item) {
                return $item['sqlQuery'];
            }, $selectedColumns);
            
            if($template->getBrand()){
                $brandName = $template->getBrand();
                $defaultColumns = [
                    'fertProducts.brandName',
                    'fertProducts.SIOPLevel2',
                    'fertProducts.SIOPLevel3', 
                    'fertProducts.SIOPLevel4', 
                    'fertProducts.SIOPLevel5',
                    'fertProducts.reinforcement', 
                    'object_brick_query_PTGBase_1.material', 
                    'fertProducts.temperatureRangeFAndC',
                    'fertProducts.minimumTemperatureF',
                    'fertProducts.maximumTemperatureF', 
                    'fertProducts.mainImage',
                    'fertProducts.beltIdentificationImage',    
                    'fertProducts.profileDimensionPtsBelts',    
                    'fertLocalized.shortDescription', 
                    'fertLocalized.FeaturesBenefitsBulletPoint',
                    'skeltonProducts.SIOPLevel6',    
                    
                ];
                $allColumns = array_merge($defaultColumns, $sqlQueries);
    
                $sql = "SELECT DISTINCT ".implode(',',$allColumns)."
                FROM object_1 AS baseProducts 
                LEFT JOIN object_1 AS skeltonProducts ON baseProducts.oo_id = skeltonProducts.parentId
                LEFT JOIN object_brick_query_PTGSkeleton_1 ON skeltonProducts.oo_id = object_brick_query_PTGSkeleton_1.id
                LEFT JOIN object_1 AS fertProducts ON skeltonProducts.oo_id = fertProducts.parentId
                LEFT JOIN object_localized_1_$language AS fertLocalized 
                ON fertProducts.oo_id= fertLocalized.oo_id
                LEFT JOIN object_brick_query_PTGBase_1 ON  fertProducts.oo_id = object_brick_query_PTGBase_1.id
                LEFT JOIN object_brick_query_PTGFert_1 ON fertProducts.oo_id = object_brick_query_PTGFert_1.id
                LEFT JOIN object_brick_query_SynchronousFert_1 ON fertProducts.oo_id = object_brick_query_SynchronousFert_1.id
                LEFT JOIN object_localized_2_en ON REPLACE(skeltonProducts.SIOPLevel6, ',', '') = object_localized_2_en.oo_id  -- Added join on skeltonProducts.SIOPLevel6
                WHERE baseProducts.oo_id = $baseProductID AND fertProducts.brandName = $brandName AND fertProducts.printedCatalogFlag =1 AND fertProducts.published = 1 ORDER BY object_brick_query_PTGFert_1.widthmm ASC ";


            }
            else{
                $defaultColumns = [
                    'baseProducts.brandName',
                    'baseProducts.SIOPLevel2',
                    'baseProducts.SIOPLevel3', 
                    'baseProducts.SIOPLevel4', 
                    'baseProducts.SIOPLevel5',
                    'baseProducts.reinforcement', 
                    'baseBricks.material', 
                    'baseProducts.temperatureRangeFAndC',
                    'baseProducts.minimumTemperatureF',
                    'baseProducts.maximumTemperatureF', 
                    'baseProducts.mainImage',
                    'baseProducts.beltIdentificationImage',    
                    'baseProducts.profileDimensionPtsBelts',    
                    'baseLocalized.shortDescription', 
                    'baseLocalized.FeaturesBenefitsBulletPoint',
                    'skeltonProducts.SIOPLevel6',
    
                    
                ];
                $allColumns = array_merge($defaultColumns, $sqlQueries);

    
                $sql = "SELECT DISTINCT ".implode(',',$allColumns)."
                    FROM object_1 AS baseProducts 
                    LEFT JOIN object_brick_query_PTGBase_1 AS baseBricks ON  baseProducts.oo_id = baseBricks.id
                    LEFT JOIN object_localized_1_$language AS baseLocalized 
                    ON baseProducts.oo_id= baseLocalized.oo_id
                    LEFT JOIN object_1 AS skeltonProducts ON baseProducts.oo_id = skeltonProducts.parentId
                    LEFT JOIN object_brick_query_PTGSkeleton_1 AS object_brick_query_PTGSkeleton_1 ON skeltonProducts.oo_id = object_brick_query_PTGSkeleton_1.id
                    LEFT JOIN object_1 AS fertProducts ON skeltonProducts.oo_id = fertProducts.parentId
                    LEFT JOIN object_brick_query_PTGFert_1 AS object_brick_query_PTGFert_1 ON fertProducts.oo_id = object_brick_query_PTGFert_1.id
                    LEFT JOIN object_brick_query_SynchronousFert_1 AS object_brick_query_SynchronousFert_1 ON fertProducts.oo_id = object_brick_query_SynchronousFert_1.id
                    LEFT JOIN object_localized_2_en ON REPLACE(skeltonProducts.SIOPLevel6, ',', '') = object_localized_2_en.oo_id  -- Added join on skeltonProducts.SIOPLevel6
                    WHERE baseProducts.oo_id = $baseProductID AND fertProducts.printedCatalogFlag =1 AND fertProducts.published = 1 ORDER BY object_brick_query_PTGFert_1.widthmm ASC ";
            }
            $SQLResults = $this->db->fetchAllAssociative($sql);
            if($SQLResults){
                $siopLevel2 = trim(array_column($SQLResults, 'SIOPLevel2')[0], ',');
                $siopLevel3 = trim(array_column($SQLResults, 'SIOPLevel3')[0], ',');
                $siopLevel4 = trim(array_column($SQLResults, 'SIOPLevel4')[0], ',');
                $siopLevel5 = trim(array_column($SQLResults, 'SIOPLevel5')[0], ',');
                $siopLevel6 = trim(array_column($SQLResults, 'SIOPLevel6')[0], ',');
                $mainImage = trim(array_column($SQLResults, 'mainImage')[0], ',');
                $beltIdentificationImage = array_column($SQLResults, 'beltIdentificationImage')[0];
                $profileDimensionPtsBelts = array_column($SQLResults, 'profileDimensionPtsBelts')[0];
                $FeaturesBenefitsBulletPoint = trim(array_unique(array_column($SQLResults, 'FeaturesBenefitsBulletPoint'))[0],',');
                $reinforcement = trim(array_unique(array_column($SQLResults, 'reinforcement'))[0], ',');
                $material = trim(array_unique(array_column($SQLResults, 'material'))[0],',');
                $temperatureRangeFAndC = array_unique(array_column($SQLResults, 'temperatureRangeFAndC'))[0];
                $minimumTemperatureF = intval(array_unique(array_column($SQLResults, 'minimumTemperatureF'))[0]);
                $maximumTemperatureF ="+". intval(array_unique(array_column($SQLResults, 'maximumTemperatureF'))[0]); 
                $longDescription = array_unique(array_column($SQLResults, 'shortDescription'))[0];
                $brandName = array_unique(array_column($SQLResults, 'brandName'))[0];
                // $skeltons = array_slice(($template->getSkeletonProduct() !=null )?$template->getSkeletonProduct():array_values(array_unique(array_column($SQLResults, 'Pitch'))),0,4);
                $skeltons = ($template->getSkeletonProduct() !=null )?$template->getSkeletonProduct():array_values(array_unique(array_column($SQLResults, 'Pitch')));

                $result = [];
                $skeltonSet = array_flip($skeltons); // This creates an associative array where keys are skelton values
                foreach ($SQLResults as $SQLResult) {
                    $a1[] = $SQLResult['SIOPLevel6'];

                    unset($SQLResult['SIOPLevel2']);
                    unset($SQLResult['SIOPLevel3']);
                    unset($SQLResult['SIOPLevel4']);
                    unset($SQLResult['SIOPLevel5']);
                    unset($SQLResult['mainImage']);
                    unset($SQLResult['beltIdentificationImage']);
                    unset($SQLResult['profileDimensionPtsBelts']);
                    unset($SQLResult['FeaturesBenefitsBulletPoint']);
                    unset($SQLResult['minimumTemperatureF']);
                    unset($SQLResult['maximumTemperatureF']);
                    unset($SQLResult['temperatureRangeFAndC']);
                    unset($SQLResult['brandName']);
                    // Storing results on basis of unique pitch value (pitch value contains printed catalog description present in hierarchy for the skeleton level)
                    if (isset($SQLResult['Pitch']) && isset($skeltonSet[$SQLResult['Pitch']])) {
                        $result[$SQLResult['Pitch']][] = $SQLResult;
                    }
                }
                for ($i = 0; $i < count($skeltons); $i++) {

                    $data['groupData'][$skeltons[$i]]['standardWidthmm'] = isset($SQLResult['standardWidthmm']) ? implode(', ', array_map('intval',array_unique(array_column($result[$skeltons[$i]], 'standardWidthmm')))) : null;
                    $data['groupData'][$skeltons[$i]]['pitchLengthMM'] = isset($SQLResult['pitchLengthMM']) ? (int) min(array_column($result[$skeltons[$i]], 'pitchLengthMM')) . ' - ' .(int) max(array_column($result[$skeltons[$i]], 'pitchLengthMM')) : null;
                    $data['groupData'][$skeltons[$i]]['A'] = isset($SQLResult['pitchMM']) ? array_values(array_unique(array_column($result[$skeltons[$i]], 'pitchMM')))[0] : null;
                    $data['groupData'][$skeltons[$i]]['B'] = isset(array_values(array_unique(array_column($result[$skeltons[$i]], 'totalBeltThickness')))[0]) ? array_values(array_unique(array_column($result[$skeltons[$i]], 'totalBeltThickness')))[0] : null;
                    $data['groupData'][$skeltons[$i]]['C'] = isset(array_values(array_unique(array_column($result[$skeltons[$i]], 'totalToothThickness')))[0]) ? array_values(array_unique(array_column($result[$skeltons[$i]], 'totalToothThickness')))[0] : null;
                }

                $SIOPCategories = array();

                $SIOPCategoryClassId = \Pimcore\Model\DataObject\ProductCategory::classId();
                if (!empty($siopLevel2)) {
                    $sql = "SELECT `key`,IF(oo_id=$siopLevel3, 'selected', '') as `selected` FROM object_$SIOPCategoryClassId WHERE `ParentObjectId` = $siopLevel2 AND `CatalogFlag` = 1 ORDER BY `SortOrder` ASC";
                
                    $SIOPCategories = $this->db->fetchAllKeyValue($sql);
                }
                if (!empty($siopLevel3)) {
                    $sql = "SELECT `key` FROM object_$SIOPCategoryClassId WHERE `oo_id` = $siopLevel3 ";
                    $siopLevel3 = $this->db->fetchOne($sql);
                }
                if (!empty($siopLevel4)) {
                    $sql = "SELECT `key` FROM object_$SIOPCategoryClassId WHERE `oo_id` = $siopLevel4 ";
                    $siopLevel4 = $this->db->fetchOne($sql);
                }
                if (!empty($siopLevel5)) {
                    $sql = "SELECT `key` FROM object_$SIOPCategoryClassId WHERE `oo_id` = $siopLevel5 ";
                    $siopLevel5 = $this->db->fetchOne($sql);
                }
                if (!empty($brandName)) {
                    $brandClassId = \Pimcore\Model\DataObject\Brand::classId();
                    $sql = "SELECT `name` FROM object_$brandClassId WHERE `oo_id` = $brandName ";
                    $brandName = $this->db->fetchOne($sql);
                }
                if (!empty($reinforcement)) {
                    $reinforcementClassId = \Pimcore\Model\DataObject\MultiselectMaster::classId();
                    $reinforcementLocalizedClassId = $reinforcementClassId."_".$language;
                    $sql = "SELECT `Description` FROM object_localized_$reinforcementLocalizedClassId WHERE `oo_id` = $reinforcement ";
                    $reinforcement = $this->db->fetchOne($sql);
                }
                if (!empty($material)) {
                    $brandClassId = \Pimcore\Model\DataObject\MultiselectMaster::classId();
                    $brandLocalizedClassId = $brandClassId."_".$language;
                    $sql = "SELECT `Description` FROM object_localized_$brandLocalizedClassId WHERE `oo_id` = $material ";
                    $material = $this->db->fetchOne($sql);
                }

                if(isset($mainImage)){
                    $mainImage = Asset::getById($mainImage);
                }
                if(isset($beltIdentificationImage)){
                    $beltIdentificationImage = Asset::getById($beltIdentificationImage);
                }
                if(isset($profileDimensionPtsBelts)){
                    $profileDimensionPtsBelts = Asset::getById($profileDimensionPtsBelts);
                }
                if(isset($FeaturesBenefitsBulletPoint)){
                    $FeaturesBenefitsBulletPoint = explode(',',$FeaturesBenefitsBulletPoint);
                    $FeaturesBenefitsBulletPoint = $this->getFiveSortedFeaturesWithIconList($FeaturesBenefitsBulletPoint);
                }

                $data['SIOPCategories'] = isset($SIOPCategories)?$SIOPCategories:[];
                $data['temperatureRangeFAndC'] = isset($temperatureRangeFAndC)?$temperatureRangeFAndC:'';
                $data['minimumTemperatureF'] = isset($minimumTemperatureF)?$minimumTemperatureF:'';
                $data['maximumTemperatureF'] = isset($maximumTemperatureF)?$maximumTemperatureF:'';
                $data['material'] = isset($material)?$material:'';
                $data['reinforcement'] = isset($reinforcement)?$reinforcement:''; 
                $data['mainImage'] = isset($mainImage)?$mainImage:'';
                $data['beltIdentificationImage'] = isset($beltIdentificationImage)?$beltIdentificationImage:''; 
                $data['profileDimensionPtsBelts'] = isset($profileDimensionPtsBelts)?$profileDimensionPtsBelts:'';  
                $data['SIOPLEVEL2'] = isset($siopLevel2)?$siopLevel2:'';
                $data['SIOPLEVEL3'] = isset($siopLevel3)?$siopLevel3:'';
                $data['SIOPLEVEL4'] = isset($siopLevel4)?$siopLevel4:'';
                $data['SIOPLEVEL5'] = isset($siopLevel5)?$siopLevel5:'';
                $data['brandName'] = isset($brandName)?$brandName:'';
                $data['shortDescription'] = isset($longDescription)?$longDescription:'';    
                
                $data['FeaturesBenefitsBulletPoint'] = isset($FeaturesBenefitsBulletPoint)?$FeaturesBenefitsBulletPoint:[] ; 
                $data['footer_class'] = '';
                $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesPTGFooter['Black'] : $catalogImagesPTGFooter['Orange'];
                $footer_logo_src = $this->defaultController->getS3ImageSrc($footer_logo_src);
                $data['footer_logo_src'] = $footer_logo_src;

                foreach($selectedColumns as $col){
                    $data['headers'][] = array(
                        'columnHeaders' => $col['columnHeader'],
                        'attributeName' => $col['columnName'],
                    );
                }
            }
            $parameterBag['data']=isset($data)?$data:[];
            return $parameterBag;
    }

    public function getFiveSortedFeaturesWithIconList($safetyFeatures): ?array
    {
        $safetyFeatures = array_unique($safetyFeatures);
        $safetyFeaturesList  = array();
        $safetyFeaturesListWithImage = array();
        $safetyFeaturesListWithOutImage = array();

        if ($safetyFeatures) {
            foreach ($safetyFeatures as $fvalue) {
                $fIcon = isset($this->featuresList[$fvalue]['icon']) ? $this->featuresList[$fvalue]['icon'] : null;
                if ($fIcon) {
                    if (!isset($this->s3srcArr[$fvalue])) {
                        $this->s3srcArr[$fvalue] = $this->defaultController->getS3ImageSrc($fIcon);
                    }

                    $safetyFeaturesListWithImage[] = array('name' => $this->featuresList[$fvalue]['name'], 'iconSrc' => $fvalue, 'SortOrder' => $this->featuresList[$fvalue]['SortOrder']);
                } else {
                    $safetyFeaturesListWithOutImage[] = array('name' => (isset($this->featuresList[$fvalue]['name']))?$this->featuresList[$fvalue]['name']: null, 'iconSrc' => $fIcon, 'SortOrder' => (isset($this->featuresList[$fvalue]['SortOrder']))?$this->featuresList[$fvalue]['SortOrder']: null);
                }
            }
        }

        if ($safetyFeaturesListWithImage) {
            array_multisort(array_column($safetyFeaturesListWithImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithImage);
        }

        if ($safetyFeaturesListWithOutImage) {
            array_multisort(array_column($safetyFeaturesListWithOutImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithOutImage);
        }

        $safetyFeaturesList = array_merge_recursive($safetyFeaturesListWithImage, $safetyFeaturesListWithOutImage);

        if ($safetyFeaturesList) {
            $safetyFeaturesList = array_slice($safetyFeaturesList, 0, 5);

            foreach ($safetyFeaturesList as $key => $value) {

                if (isset($this->s3srcArr[$value['iconSrc']])) {
                    $safetyFeaturesList[$key]['iconSrc'] = $this->s3srcArr[$value['iconSrc']];
                }
            }
        }

        unset($safetyFeaturesListWithImage);
        unset($safetyFeaturesListWithOutImage);

        return $safetyFeaturesList;
    }

    /**
     * @Route("/get-ptsCatalog-available-headers")
     */
    public function getSpecSheetAvailableHeaders(Request $request)
    {
        $tableColumns = Yaml::parseFile(PIMCORE_PROJECT_ROOT . '/bundles/CatalogBundle/config/pts-sectionPage-column.yaml');
        
        $columns = array();
        $arr = [];

        if ($tableColumns !== null) {
            if (!empty($tableColumns) && count($tableColumns) > 0) {
                foreach ($tableColumns as $key => $column) {
                    $fieldLabel = $column['fieldLabel'];
                    $columns[] = array($key, $fieldLabel);
                }
            }
            $arr = array('storeData' => $columns, 'completeData' => $tableColumns, 'success' => true);
        } else {
            $arr = array('storeData' => [], 'completeData' => [], 'success' => true);
        }
        echo json_encode($arr);
        die;
    }

    public function templatePtgSectionPagePTSBeltsAction(Request $request)
    {
        $templateEditable = $this->document->getEditable('section_page_pts_belts');
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->defaultController->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->defaultController->getRequestedParameter($request, $documentId); 
            } 
        }

        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();
            $footerBgColor = $template->getColor();
            $selectedColumns = json_decode($template->getColumns(), true);
            $parameterBag =  $this->getColumnsData($request, $template, $selectedColumns);
            $html = '<div><b style="font-size: 16px;">No Records Found</b></div>';
            $parameterBag['data'] ? : print_r($html);
    
        }
        else{
            $parameterBag['data'] = [];
        }
        return $this->render("catalog/default/template_section_page_pts_belts.html.twig", $parameterBag);
    }
}