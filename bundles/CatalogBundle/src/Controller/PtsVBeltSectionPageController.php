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
use Pimcore\Model\Asset;
use CatalogBundle\Controller\DefaultController;
use Symfony\Component\Yaml\Yaml;


class PtsVBeltSectionPageController extends FrontendController
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

    public function getColumnsData($request, $template)
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
            $baseProductIDs = implode(", ", $baseProductID); // base product ids in comma separated way
            if($template->getBrand()){
                $brandName = implode(", ", $template->getBrand());
                $defaultColumns = [
                    'fertProducts.path',
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
                    'object_brick_query_BeltsFert_1.productEffectiveLengthIN',
                    'object_localized_2_en.PrintedCatalogDescription AS SkeletonKey'
                    
                ];
    
                $sql = "SELECT DISTINCT ".implode(',',$defaultColumns)."
                        FROM object_1 AS baseProducts
                        JOIN
                            object_1 AS skeltonProducts
                            ON baseProducts.oo_id = skeltonProducts.parentId
                        JOIN
                            object_1 AS fertProducts
                            ON skeltonProducts.oo_id = fertProducts.parentId
                        JOIN
                            object_localized_1_en AS fertLocalized
                            ON fertProducts.oo_id= fertLocalized.oo_id
                        JOIN
                            object_brick_query_BeltsFert_1
                            ON fertProducts.oo_id = object_brick_query_BeltsFert_1.id
                        JOIN
                            object_brick_query_PTGBase_1
                            ON  fertProducts.oo_id = object_brick_query_PTGBase_1.id
                        JOIN
                            object_localized_2_en ON REPLACE(skeltonProducts.SIOPLevel6, ',', '') = object_localized_2_en.oo_id  -- Added join on skeltonProducts.SIOPLevel6
                        WHERE
                            baseProducts.oo_id IN ($baseProductIDs) AND
                            (fertProducts.path LIKE '/Products Master/PTG/PTP/V-Belts/%' OR fertProducts.path LIKE '/Products Master/PTG/PTP/Banded Belts/%') AND
                            fertProducts.brandName IN ($brandName) AND
                            fertProducts.printedCatalogFlag =1 AND
                            fertProducts.published = 1";
            }
            else{
                $defaultColumns = [
                    'fertProducts.path',
                    'baseProducts.brandName',
                    'baseProducts.SIOPLevel2',
                    'baseProducts.SIOPLevel3',
                    'baseProducts.SIOPLevel4',
                    'baseProducts.SIOPLevel5',
                    'baseProducts.reinforcement',
                    'object_brick_query_PTGBase_1.material',
                    'baseProducts.temperatureRangeFAndC',
                    'baseProducts.minimumTemperatureF',
                    'baseProducts.maximumTemperatureF',
                    'baseProducts.mainImage',
                    'baseProducts.beltIdentificationImage',
                    'baseProducts.profileDimensionPtsBelts',
                    'baseLocalized.shortDescription',
                    'baseLocalized.FeaturesBenefitsBulletPoint',
                    'object_brick_query_BeltsFert_1.productEffectiveLengthIN',
                    'object_localized_2_en.PrintedCatalogDescription AS SkeletonKey'
                    
                ];

    
                $sql = "SELECT DISTINCT ".implode(',',$defaultColumns)."
                        FROM object_1 AS baseProducts
                        JOIN
                            object_localized_1_en AS baseLocalized
                            ON baseProducts.oo_id= baseLocalized.oo_id
                        JOIN
                            object_1 AS skeltonProducts
                            ON baseProducts.oo_id = skeltonProducts.parentId
                        JOIN
                            object_1 AS fertProducts
                            ON skeltonProducts.oo_id = fertProducts.parentId
                        JOIN
                            object_localized_1_en AS fertLocalized
                            ON fertProducts.oo_id= fertLocalized.oo_id
                        JOIN
                            object_brick_query_BeltsFert_1
                            ON fertProducts.oo_id = object_brick_query_BeltsFert_1.id
                        JOIN
                            object_brick_query_PTGBase_1
                            ON  fertProducts.oo_id = object_brick_query_PTGBase_1.id
                        JOIN
                            object_localized_2_en ON REPLACE(skeltonProducts.SIOPLevel6, ',', '') = object_localized_2_en.oo_id  -- Added join on skeltonProducts.SIOPLevel6
                        WHERE
                            baseProducts.oo_id IN ($baseProductIDs) AND
                            (fertProducts.path LIKE '/Products Master/PTG/PTP/V-Belts/%' OR fertProducts.path LIKE '/Products Master/PTG/PTP/Banded Belts/%') AND
                            fertProducts.printedCatalogFlag =1 AND
                            fertProducts.published = 1";
            }

            $sqlResults = $this->db->fetchAllAssociative($sql);

            if($sqlResults){
                $grouped = [
                    'banded' => [],
                    'vbelts' => [],
                ];

                // Step 1: Categorize by belt type and group by SkeletonKey
                foreach ($sqlResults as $item) {
                    $path = strtolower($item['path']);
                    $category = null;

                    if (str_contains($path, 'banded belts')) {
                        $category = 'banded';
                    } elseif (str_contains($path, 'v-belts')) {
                        $category = 'vbelts';
                    }
                    
                    if (!$category){
                        continue;
                    }
                    $skeletonKey = $item['SkeletonKey'];
                    $length = $item['productEffectiveLengthIN'];

                    if (!isset($grouped[$category][$skeletonKey])) {
                        $grouped[$category][$skeletonKey] = [];
                    }

                    if (!is_null($length)) {
                        $grouped[$category][$skeletonKey][] = $length;
                    }
                }

                $final = [];

                foreach ($grouped as $category => $skeletonData) {
                    $nonEmpty = [];
                    $empty = [];

                    // Separate keys with data and without
                    foreach ($skeletonData as $key => $lengths) {
                        if (!empty($lengths)) {
                            $nonEmpty[$key] = $lengths;
                        } else {
                            $empty[$key] = $lengths;
                        }
                    }

                    // Sort keys
                    ksort($nonEmpty);
                    ksort($empty);

                    // Pick top 3, prioritizing non-empty
                    $selectedKeys = array_slice(array_keys($nonEmpty), 0, 3);

                    // Fill remaining with empty ones if needed
                    if (count($selectedKeys) < 3) {
                        $remaining = array_slice(array_keys($empty), 0, 3 - count($selectedKeys));
                        $selectedKeys = array_merge($selectedKeys, $remaining);
                    }

                    $final[$category] = [];

                    foreach ($selectedKeys as $key) {
                        $lengths = $skeletonData[$key];
                        if (!empty($lengths)) {
                            $min = min($lengths);
                            $max = max($lengths);
                            $range = "{$min} - {$max}";
                        } else {
                            $range = "";
                        }

                        $final[$category][$key] = $range;
                    }
                }
                $data['EffectiveLengths'] = $final;

                $siopLevel2 = trim(array_column($sqlResults, 'SIOPLevel2')[0], ',');
                $siopLevel3 = trim(array_column($sqlResults, 'SIOPLevel3')[0], ',');
                $siopLevel4 = trim(array_column($sqlResults, 'SIOPLevel4')[0], ',');
                $siopLevel5 = trim(array_column($sqlResults, 'SIOPLevel5')[0], ',');
                $mainImage = trim(array_column($sqlResults, 'mainImage')[0], ',');
                $beltIdentificationImage = array_column($sqlResults, 'beltIdentificationImage')[0];
                $profileDimensionPtsBelts = array_column($sqlResults, 'profileDimensionPtsBelts')[0];
                $featuresBenefitsBulletPoint = trim(array_unique(array_column($sqlResults, 'FeaturesBenefitsBulletPoint'))[0],',');
                $reinforcement = trim(array_unique(array_column($sqlResults, 'reinforcement'))[0], ',');
                $material = trim(array_unique(array_column($sqlResults, 'material'))[0],',');
                $temperatureRangeFAndC = array_unique(array_column($sqlResults, 'temperatureRangeFAndC'))[0];
                $minimumTemperatureF = intval(array_unique(array_column($sqlResults, 'minimumTemperatureF'))[0]);
                $maximumTemperatureF ="+". intval(array_unique(array_column($sqlResults, 'maximumTemperatureF'))[0]);
                $shortDescription = array_unique(array_column($sqlResults, 'shortDescription'))[0];
                $brandName = array_unique(array_column($sqlResults, 'brandName'))[0];
                foreach ($sqlResults as $SQLResult) {

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
                }
                $siopCategories = array();

                $siopCategoryClassId = \Pimcore\Model\DataObject\ProductCategory::classId();
                if (!empty($siopLevel2)) {
                    $sql = "SELECT `key`,IF(oo_id=$siopLevel3, 'selected', '') as `selected` FROM object_$siopCategoryClassId WHERE `ParentObjectId` = $siopLevel2 AND `CatalogFlag` = 1 ORDER BY `SortOrder` ASC";
                
                    $siopCategories = $this->db->fetchAllKeyValue($sql);
                }
                if (!empty($siopLevel3)) {
                    $sql = "SELECT `key` FROM object_$siopCategoryClassId WHERE `oo_id` = $siopLevel3 ";
                    $siopLevel3 = $this->db->fetchOne($sql);
                }
                if (!empty($siopLevel4)) {
                    $sql = "SELECT `key` FROM object_$siopCategoryClassId WHERE `oo_id` = $siopLevel4 ";
                    $siopLevel4 = $this->db->fetchOne($sql);
                }
                if (!empty($siopLevel5)) {
                    $sql = "SELECT `key` FROM object_$siopCategoryClassId WHERE `oo_id` = $siopLevel5 ";
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
                if(isset($featuresBenefitsBulletPoint)){
                    $featuresBenefitsBulletPoint = explode(',',$featuresBenefitsBulletPoint);
                    $featuresBenefitsBulletPoint = $this->getFiveSortedFeaturesWithIconList($featuresBenefitsBulletPoint);
                }

                $data['SIOPCategories'] = isset($siopCategories)?$siopCategories:[];
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
                $data['shortDescription'] = isset($shortDescription)?$shortDescription:'';
                
                $data['FeaturesBenefitsBulletPoint'] = isset($featuresBenefitsBulletPoint)?$featuresBenefitsBulletPoint:[] ;
                $data['footer_class'] = '';
                $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesPTGFooter['Black'] : $catalogImagesPTGFooter['Orange'];
                $footer_logo_src = $this->defaultController->getS3ImageSrc($footer_logo_src);
                $data['footer_logo_src'] = $footer_logo_src;

            }
            $parameterBag['data']=isset($data)?$data:[];
            return $parameterBag;
    }

    public function getFiveSortedFeaturesWithIconList($safetyFeatures): ?array
    {
        if (empty($safetyFeatures)) {
            return null;
        }

        $uniqueFeatures = array_unique($safetyFeatures);

        $featuresWithIcons = [];
        $featuresWithoutIcons = [];

        foreach ($uniqueFeatures as $featureKey) {
            $featureData = $this->featuresList[$featureKey] ?? null;

            if (!$featureData) {
                continue;
            }

            $hasIcon = !empty($featureData['icon']);

            $featureItem = [
                'name' => $featureData['name'] ?? null,
                'iconSrc' => $hasIcon ? $featureKey : null,
                'SortOrder' => $featureData['SortOrder'] ?? null,
            ];

            if ($hasIcon) {
                $this->cacheS3Image($featureKey, $featureData['icon']);
                $featuresWithIcons[] = $featureItem;
            } else {
                $featuresWithoutIcons[] = $featureItem;
            }
        }

        $sortedFeatures = array_merge(
            $this->sortFeaturesByOrder($featuresWithIcons),
            $this->sortFeaturesByOrder($featuresWithoutIcons)
        );

        $topFive = array_slice($sortedFeatures, 0, 5);

        foreach ($topFive as &$feature) {
            if (isset($this->s3srcArr[$feature['iconSrc']])) {
                $feature['iconSrc'] = $this->s3srcArr[$feature['iconSrc']];
            }
        }

        return $topFive;
    }

    private function sortFeaturesByOrder(array $features): array
    {
        usort($features, fn($a, $b) => $a['SortOrder'] <=> $b['SortOrder']);
        return $features;
    }

private function cacheS3Image(string $key, string $icon): void
{
    if (!isset($this->s3srcArr[$key])) {
        $this->s3srcArr[$key] = $this->defaultController->getS3ImageSrc($icon);
    }
}

    public function templatePtgVBeltSectionPageAction(Request $request)
    {
        $templateEditable = $this->document->getEditable('section_page_v_belts');
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
            $parameterBag =  $this->getColumnsData($request, $template);
            $html = '<div><b style="font-size: 16px;">No Records Found</b></div>';
            $parameterBag['data'] ? : print_r($html);
    
        }
        else{
            $parameterBag['data'] = [];
        }
        return $this->render("catalog/default/template_section_v_belts.html.twig", $parameterBag);
    }
}
