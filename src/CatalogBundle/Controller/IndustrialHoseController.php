<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
// use Pimcore\Asset;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use S3CustomizationBundle\Lib\Utils;

class IndustrialHoseController extends AbstractController
{

    private $tableColumns;
    private $db;

    public function __construct()
    {
        $this->db = Db::get();
    }

    /**
     * @Route("/catalog/inh/sectionpage");
     * INH Section Page
     * This template will pick the rendering columns from "industrialhose-sectionpage-column.yml"
     * and data will be picked from data table
     * 3rd level category will be used as attribute table name to get rendering column list from configuration file
    */
    public function inhPrintCatalogAction(Request $request)
    {
        $inhSectionPageConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getINHSectionPageConfig()['parameters'];
        $CatalogImagesINHFooter = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHFooter'];
        $CatalogImagesINHProduct = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHProduct'];
        $common = \Pimcore::getContainer()->get('app.common_helper');
        $dispColumns = array();
        if ($this->getDocumentTag('relation', 'inh-printcatalog')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'inh-printcatalog')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);

            /**
             * Get Catalog defined language
            */
            $lang = $common->getCatalogLanguage($obj);
            // $lang = 'fr_CA';
            $this->get('translator')->setLocale($lang);

            $footerBgColor = $obj->getColor();

            $siop = $obj->getSiopLevel4();
            $siopObj = $this->getSiopObject($siop);
            $configTableName = $tableName = "AIR & MULTIPURPOSE";
            $constructionType = '';
            if($siopObj != null) {
                $constructionType = $siopObj->getConstructionType($lang);
                $tableName = $siopObj->getParent()->getDescription($lang);
                $siop4Description = ($siopObj->getPrintedCatalogDescription($lang)) ? $siopObj->getPrintedCatalogDescription($lang) : $siopObj->getDescription($lang);
                $configTableName = ($siopObj->getParent()->getPrintedCatalogDescription($lang)) ? $siopObj->getParent()->getPrintedCatalogDescription($lang) : $siopObj->getParent()->getDescription($lang);
            }

            $productPageColumns = $inhSectionPageConfig[$tableName];
            foreach ($productPageColumns['dispColumns'] as $key => $value) {
                $productPageColumns['dispColumns'][$key]['title'] = $this->get('translator')->trans($key);
            }

            $brandsList = $this->getBrandsList();

            $data = array();
            $headers = (array) json_decode($obj->getHeaderData());

            $headerKeys = array_keys($headers);
            $headerKeys[] = 'ConstructionType';

            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    $row[]= $constructionType;
                    $productsData[] = array_combine($headerKeys, $row);
                }
                $i = 0;

                foreach ($productsData as $k => $row) {

                    if (isset($row['brandName']) && !empty($row['brandName'])) {
                        $uniqueId = $configTableName;
                        $brandName = $row['brandName'][0];
                        if (!isset($data[$uniqueId])) {
                            $data[$uniqueId]['columns'] = $productPageColumns['columns'];
                            $data[$uniqueId]['dispColumns'] = $productPageColumns['dispColumns'];
                        }

                        foreach($productPageColumns['columns'] as $col) {
                            if(isset($row[$col])) {
                                if(!isset($data[$uniqueId]['data'][$brandName][$col])) {
                                    $data[$uniqueId]['data'][$brandName][$col] = "";
                                }
                                if(empty($data[$uniqueId]['data'][$brandName][$col])) {
                                    $data[$uniqueId]['data'][$brandName][$col] = $row[$col];
                                }

                            }
                        }

                        $data[$uniqueId]['data'][$brandName]['SortOrder'] = $brandsList[$brandName];
                        array_multisort (array_column($data[$uniqueId]['data'], 'SortOrder'), SORT_ASC, $data[$uniqueId]['data']);
                    }
                }
            }
            
            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesINHFooter['Black']:$CatalogImagesINHFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $categories = $this->getSIOP($lang);
            $this->view['info'] = array(
                'configTableName'=> $configTableName,
                'siop4Description'=> $siop4Description,
                'data' => $data,
                'categories' => $categories,
                // 'defaultPageImage' => \Pimcore\Model\Asset::getByPath($CatalogImagesINHProduct['DefaultCoverImage']),
                'footer_class' => (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'',
                'footer_logo_src' => $footer_logo_src
            );
        }
    }

    /**
     * @Route ("/catalog/inh/productpage")
     *
     */
    public function inhPrintCatalogProductPageAction(Request $request) {
        $inhProductPageConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getINHProductPageConfig()['parameters'];
        $attributeImages = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];
        $CatalogImagesINHFooter = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHFooter'];
        $CatalogImagesINHProduct = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHProduct'];
        $common = \Pimcore::getContainer()->get('app.common_helper');
        $dispColumns = array();
        if ($this->getDocumentTag('relation', 'inh-printcatalog')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'inh-printcatalog')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);

            $footerBgColor = $obj->getColor();

            /**
             * Get Catalog defined language
            */
            $CatalogLanguage = $common->getCatalogLanguage($obj);
            // $lang = 'fr_CA';
            $this->get('translator')->setLocale($lang);

            $data = array();

            $headerData = json_decode($obj->getHeaderData(), true);

            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys);

            $columnsData = $obj->getColumns();

            $iconRequired = 'YES';
            $subHeaderRequired = 'NO';
            $columnsData = json_decode($columnsData, true);

            $attrbuteImgS3Arr = array();

            // $language = $request->getLocale();
            $this->get('translator')->setLocale($CatalogLanguage);

            $brandsList = $this->getBrandsList();
            $featuresList = $this->getFeaturesList('IFS', $CatalogLanguage);

            // Getting Selected 3rd Level Category at Catalog Category object
            // $siop = $obj->getSiopLevel4();
            // $siopObj = $this->getSiopObject($siop);
            // $selectedSiop = "AIR & MULTIPURPOSE";
            // if($siopObj != null) {
            //     // $selectedSiop = $siopObj->getParent()->getDescription($CatalogLanguage);
            //     $selectedSiop = ($siopObj->getParent()->getPrintedCatalogDescription($CatalogLanguage)) ? $siopObj->getParent()->getPrintedCatalogDescription($CatalogLanguage) : $siopObj->getParent()->getDescription($CatalogLanguage);
            // }

            $productsData = $obj->getProductsData();


            $query = "select oo_id, Level, description, PrintedCatalogDescription from object_localized_2_{$CatalogLanguage} where level IN (3,4) ";

            $categoriesdb = $this->db->fetchAll($query);

            $categoriesList = array();

            foreach ($categoriesdb as $key => $value) {
                $categoriesList[$value['oo_id']] = $value;
            }
            unset($categoriesdb);


            if($productsData)
            {
                $brandsData = array();
                foreach ($productsData as $key => $item)
                {
                    if($item[$headerKeysIndex['brandName']][0])
                    {
                        $brandsData[$item[$headerKeysIndex['brandName']][0]][] = $item;
                        unset($item);
                    }
                }

                unset($productsData);
            }

            $newBrandArray = array();
            if($brandsData)
            {
                foreach ($brandsData as $key => $brand)
                {
                    
                    $reinforcementArr = array();
                    $tubeMaterialArr = array();
                    $coverMaterialArr = array();

                    $SIOP4Description = '';
                    $SIOP3Description = '';
                    $BrandingLayline = '';
                    $VirtualCatalogReinforcement = '';
                    $VirtualCatalogTubeMaterial = '';
                    $VirtualCatalogCoverMaterial = '';
                    $mainImage = '';
                    $temperatureRangeFAndC = '';
                    $Coupling = '';
                    $Packaging = '';
                    $longDescription = '';
                    $FeaturesBenefitsBulletPointArr = array();
                    $oldMaterialCodeArr = array();

                    foreach ($brand as $bkey => $bvalue) {

                        $FittingTableName = $bvalue[$headerKeysIndex['FittingTableName']];
                        $FittingTableKeys = $inhProductPageConfig[$FittingTableName]['columns'];
                        if($FittingTableName && is_array($FittingTableKeys))
                        {
                            $query = "select SIOPLevel3, SIOPLevel4 from object_query_1 where oo_id = '".$bvalue[$headerKeysIndex['id']]."'";

                            $record = $this->db->fetchRow($query);
                            $SIOPLevel3 = trim($record['SIOPLevel3'], ',');
                            $SIOPLevel4 = trim($record['SIOPLevel4'], ',');

                            if(!$SIOP3Description && $SIOPLevel3)
                            {
                                $SIOP3Description = !empty($categoriesList[$SIOPLevel3]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel3]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel3]['description'];
                            }

                            if(!$SIOP4Description && $SIOPLevel4)
                            {
                                $SIOP4Description = !empty($categoriesList[$SIOPLevel4]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel4]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel4]['description'];
                            }

                            if(isset($bvalue[$headerKeysIndex['oldMaterialCode']]) && !empty($bvalue[$headerKeysIndex['oldMaterialCode']]) && $bvalue[$headerKeysIndex['oldMaterialCode']]!=='N/A') {
                                $oldMaterialCodeArr[] = substr($bvalue[$headerKeysIndex['oldMaterialCode']],0,6);
                            }

                            if($bvalue[$headerKeysIndex['reinforcement']]) {
                                $reinforcementArr = array_merge($reinforcementArr, $bvalue[$headerKeysIndex['reinforcement']]);
                            }

                            if(!$BrandingLayline && $bvalue[$headerKeysIndex['BrandingLayline']]) {
                                $BrandingLayline = $bvalue[$headerKeysIndex['BrandingLayline']];
                            }

                            if(!$VirtualCatalogReinforcement && $bvalue[$headerKeysIndex['VirtualCatalogReinforcement']]) {
                                $VirtualCatalogReinforcement = $bvalue[$headerKeysIndex['VirtualCatalogReinforcement']];
                            }

                            if($bvalue[$headerKeysIndex['tubeMaterial']]) {
                                $tubeMaterialArr = array_merge($tubeMaterialArr, $bvalue[$headerKeysIndex['tubeMaterial']]);
                            }

                            if(!$VirtualCatalogTubeMaterial && $bvalue[$headerKeysIndex['VirtualCatalogTubeMaterial']]) {
                                $VirtualCatalogTubeMaterial = $bvalue[$headerKeysIndex['VirtualCatalogTubeMaterial']];
                            }

                            if($bvalue[$headerKeysIndex['coverMaterial']]) {
                                $coverMaterialArr = array_merge($tubeMaterialArr, $bvalue[$headerKeysIndex['coverMaterial']]);
                            }

                            if(!$VirtualCatalogCoverMaterial && $bvalue[$headerKeysIndex['VirtualCatalogCoverMaterial']]) {
                                $VirtualCatalogCoverMaterial = $bvalue[$headerKeysIndex['VirtualCatalogCoverMaterial']];
                            }

                            if(!$mainImage && $bvalue[$headerKeysIndex['mainImage']]) {
                                // if (Asset\Service::pathExists($bvalue[$headerKeysIndex['mainImage']]))
                                // {
                                    $mainImage = \Pimcore\Model\Asset::getByPath($bvalue[$headerKeysIndex['mainImage']]);
                                //     if(file_exists($mainImageObj->getFileSystemPath()))
                                //     {
                                //         $mainImage = $mainImageObj;
                                //     }
                                //     unset($mainImageObj);
                                // }
                            }

                            if(!$temperatureRangeFAndC && $bvalue[$headerKeysIndex['temperatureRangeFAndC']]) {
                                $temperatureRangeFAndC = $bvalue[$headerKeysIndex['temperatureRangeFAndC']];
                            }

                            if(!$Coupling && $bvalue[$headerKeysIndex['Coupling']]) {
                                $Coupling = $bvalue[$headerKeysIndex['Coupling']];
                            }

                            if(!$Packaging && $bvalue[$headerKeysIndex['Packaging']]) {
                                $Packaging = $bvalue[$headerKeysIndex['Packaging']];
                            }

                            if(!$longDescription && $bvalue[$headerKeysIndex['longDescription']]) {
                                $longDescription = $bvalue[$headerKeysIndex['longDescription']];
                            }

                            if($bvalue[$headerKeysIndex['FeaturesBenefitsBulletPoint']])
                            {
                                if(count($bvalue[$headerKeysIndex['FeaturesBenefitsBulletPoint']])>0)
                                {
                                    foreach ($bvalue[$headerKeysIndex['FeaturesBenefitsBulletPoint']] as $fkey => $feature) {
                                        array_push($FeaturesBenefitsBulletPointArr,$feature);
                                    }
                                }
                            }

                            $columnsDataWithImages = array();
                            $articlesData = array();
                            $subHeaderRequired = '';
                            foreach ($FittingTableKeys as $ckey => $cvalue) {

                                foreach ($columnsData as $dkey => $value) {

                                    if($cvalue == $dkey)
                                    {
                                        $groupColumnName = $value['columnName'];
                                        if(isset($value['groupName']) && $value['groupName'])
                                        {
                                            $groupColumnName = $value['groupName'];
                                            $subHeaderRequired = 'YES';
                                        }

                                        $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $value['groupName'];
                                        $columnsDataWithImages[$groupColumnName][$dkey]['unitName'] = $this->get('translator')->trans($value['unitName']);
                                        $columnsDataWithImages[$groupColumnName][$dkey]['columnName'] = $value['columnName'];
                                        $columnsDataWithImages[$groupColumnName][$dkey]['columnLabel'] = $this->get('translator')->trans($groupColumnName);

                                        if ($iconRequired == 'YES')
                                        {
                                            if(!isset($attrbuteImgS3Arr[$groupColumnName]))
                                            {

                                                $attributeImagesSrc = $attributeImages[$groupColumnName];
                                                $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                                                $attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                                                $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attributeImagesSrc;
                                            }
                                            else
                                            {
                                                $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attrbuteImgS3Arr[$groupColumnName];
                                            }
                                        }
                                    }
                                }
                            }

                            // Getting order of the keys
                            $orderKeys = array();
                            foreach ($columnsDataWithImages as $skey => $svalue) {
                                foreach ($svalue as $vkey => $vvalue) {
                                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                                }
                            }

                            foreach ($orderKeys as $ckey => $cvalue) {
                                    if($ckey == 'coverColor')
                                    {
                                        $temp = '';
                                        if($bvalue[$headerKeysIndex[$ckey]])
                                        {
                                            $temp = implode(', ', $bvalue[$headerKeysIndex[$ckey]]);
                                        }
                                    }
                                    else{
                                        $temp = $bvalue[$headerKeysIndex[$ckey]];
                                    }

                                    if(is_numeric($temp)){
                                        $float_value = (float) $temp;
                                        $articlesData[] = is_float($float_value)? (round($float_value, 2, PHP_ROUND_HALF_UP)): $float_value;
                                    }
                                    else{
                                        $articlesData[] = $temp;
                                    }
                            }

                            $newBrandArray[$key]['articleData'][$FittingTableName]['subHeaderRequired'] = $subHeaderRequired;
                            $newBrandArray[$key]['articleData'][$FittingTableName]['columnsDataWithImages'] = $columnsDataWithImages;
                            $newBrandArray[$key]['articleData'][$FittingTableName]['articles'][] = $articlesData;
                        }
                    }

                    $reinforcementStr = $VirtualCatalogReinforcement;
                    if(empty($reinforcementStr) && $reinforcementArr)
                        $reinforcementStr = implode(', ', array_unique($reinforcementArr));

                    $tubeMaterialStr = $VirtualCatalogTubeMaterial;
                    if(empty($tubeMaterialStr) && $tubeMaterialArr)
                        $tubeMaterialStr = implode(', ', array_unique($tubeMaterialArr));

                    $coverMaterialStr = $VirtualCatalogCoverMaterial;
                    if(empty($coverMaterialStr) && $coverMaterialArr)
                        $coverMaterialStr = implode(', ', array_unique($coverMaterialArr));

                    $oldMaterialCodeStr = '';
                    if($oldMaterialCodeArr)
                        $oldMaterialCodeStr = implode(', ', array_unique($oldMaterialCodeArr));

                    $newBrandArray[$key]['brandData']['SIOP3Description'] = $SIOP3Description;
                    $newBrandArray[$key]['brandData']['SIOP4Description'] = $SIOP4Description;
                    $newBrandArray[$key]['brandData']['BrandingLayline'] = $BrandingLayline;
                    $newBrandArray[$key]['brandData']['reinforcement'] = $reinforcementStr;
                    $newBrandArray[$key]['brandData']['tubeMaterial'] = $tubeMaterialStr;
                    $newBrandArray[$key]['brandData']['coverMaterial'] = $coverMaterialStr;
                    $newBrandArray[$key]['brandData']['mainImage'] = $mainImage;
                    $newBrandArray[$key]['brandData']['orderCodes'] = $oldMaterialCodeStr;
                    $newBrandArray[$key]['brandData']['temperatureRangeFAndC'] = $temperatureRangeFAndC;
                    $newBrandArray[$key]['brandData']['Coupling'] = $Coupling;
                    $newBrandArray[$key]['brandData']['Packaging'] = $Packaging;
                    $newBrandArray[$key]['brandData']['longDescription'] = $longDescription;

                    $safetyFeaturesListWithImage = array();
                    $safetyFeaturesListWithOutImage = array();

                    $FeaturesBenefitsBulletPointArr = array_unique($FeaturesBenefitsBulletPointArr);

                    if($FeaturesBenefitsBulletPointArr)
                    {
                        foreach ($FeaturesBenefitsBulletPointArr as $fkey => $fvalue) {
                            if($featuresList[$fvalue]['icon'])
                                $safetyFeaturesListWithImage[] = array('name'=>$featuresList[$fvalue]['name'], 'iconSrc' => $featuresList[$fvalue]['icon'], 'SortOrder' =>$featuresList[$fvalue]['SortOrder']);
                            else
                                $safetyFeaturesListWithOutImage[] = array('name'=>$featuresList[$fvalue]['name'], 'iconSrc' => $featuresList[$fvalue]['icon'], 'SortOrder' =>$featuresList[$fvalue]['SortOrder']);
                        }
                    }

                    array_multisort (array_column($safetyFeaturesListWithImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithImage);
                    array_multisort (array_column($safetyFeaturesListWithOutImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithOutImage);

                    $safetyFeaturesList = array_merge_recursive($safetyFeaturesListWithImage,$safetyFeaturesListWithOutImage);

                    $newBrandArray[$key]['brandData']['safetyFeatures'] = $safetyFeaturesList;
                    $newBrandArray[$key]['SortOrder'] = $brandsList[$key];

                    unset($brandsData[$key]);
                }
            }
            
            array_multisort (array_column($newBrandArray, 'SortOrder'), SORT_ASC, $newBrandArray);

            $categories = $this->getSIOP($CatalogLanguage);

            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesINHFooter['Black']:$CatalogImagesINHFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $BrandingImageSrc = $CatalogImagesINHProduct['BrandingImage'];
            $BrandingImageSrc = $this->getS3ImageSrc($BrandingImageSrc);

            $this->view['info'] = array(
                'iconRequired' => $iconRequired,
                'brandsData' => $newBrandArray,
                'categories' => $categories,
                'selectedCategory' => $SIOP3Description,
                'branding_image_src' => $BrandingImageSrc,
                'footer_class' => (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'',
                'footer_logo_src' => $footer_logo_src
            );
        }
    }


    /**
     * @Route ("/catalog/inh/fittingpage")
     *
     */
    public function inhFittingPageAction(Request $request) {
        $template = $this->getDocumentTag('relation', 'inh_fitting_page')->getElement();
        if($template)
        {
            $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
            $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();

            $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesINHFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesINHFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());

            $CatalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);

            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys);

            $columnsData = $template->getColumns();

            $menuCategories = $this->getSIOP($CatalogLanguage);

            $iconRequired = 'YES';
            $columnsData = json_decode($columnsData, true);

            // $language = $request->getLocale();
            $this->get('translator')->setLocale($CatalogLanguage);

            $subHeaderRequired = 'NO';
            $groupSubHeaderData = array();
            foreach ($columnsData as $key => $value) {

                $groupColumnName = $value['columnName'];
                if(isset($value['groupName']) && $value['groupName'])
                {
                    $groupColumnName = $value['groupName'];
                    $subHeaderRequired = 'YES';
                }
                // echo "groupColumnName - $groupColumnName".PHP_EOL;
                $columnsDataWithImages[$groupColumnName][$key]['groupName'] = $value['groupName'];
                $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($value['unitName']) ? $this->get('translator')->trans($value['unitName']) : '';
                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $value['columnName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->get('translator')->trans($groupColumnName);

                if ($iconRequired == 'YES')
                {
                    $attributeImagesSrc = $attributeImages[$groupColumnName];
                    $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                    $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImagesSrc;
                }
            }

            unset($columnsData);

            // Getting order of the keys
            $orderKeys = array();
            foreach ($columnsDataWithImages as $skey => $svalue) {
                foreach ($svalue as $vkey => $vvalue) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                }
            }

            $featuresList = $this->getFeaturesList('IFS', $CatalogLanguage);
            // $materialList = $this->getPTGMaterialList('PTG~material', $CatalogLanguage);

            $query = "select oo_id, Level, description, PrintedCatalogDescription from object_localized_2_{$CatalogLanguage} where level IN (3,4) ";

            $categories = $this->db->fetchAll($query);

            $categoriesList = array();

            foreach ($categories as $key => $value) {
                $categoriesList[$value['oo_id']] = $value;
            }
            unset($categories);

            $brandName = '';
            $pressureRating = '';
            $catagoryDescription = array();
            $mainImageObj = '';
            $LeftPrintCatalogImageObj = '';
            $RightPrintCatalogImageObj = '';
            $ProfileDimensionImageObj = '';
            $material = array();
            $longDescription = '';
            $BrandingLayline = '';
            $safetyFeatures = array();
            $orderCode = array();

            if($productsData)
            {
                foreach ($productsData as $key => $item)
                {
                    if($item[$headerKeysIndex['brandName']])
                    {
                        $query = "select oldMaterialCode, SIOPLevel3, SIOPLevel4 from object_query_1 where oo_id = '".$item[$headerKeysIndex['id']]."'";

                        $record = $this->db->fetchRow($query);
                        $SIOPLevel3 = trim($record['SIOPLevel3'], ',');
                        $SIOPLevel4 = trim($record['SIOPLevel4'], ',');

                        if(!$brandName && $item[$headerKeysIndex['brandName']])
                        {
                            $brandName = $item[$headerKeysIndex['brandName']][0];
                        }

                        if(isset($record['oldMaterialCode']) && !empty($record['oldMaterialCode']) && $record['oldMaterialCode']!=='N/A') {
                            $orderCode[] = substr($record['oldMaterialCode'],0,6);
                        }

                        if(!isset($catagoryDescription['SIOP3Description']) && $SIOPLevel3)
                        {
                            $catagoryDescription['SIOP3Description'] = !empty($categoriesList[$SIOPLevel3]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel3]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel3]['description'];
                        }

                        if(!isset($catagoryDescription['SIOP4Description']) && $record['SIOPLevel4'])
                        {
                            $catagoryDescription['SIOP4Description'] = !empty($categoriesList[$SIOPLevel4]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel4]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel4]['description'];
                        }

                        if(!$pressureRating && $item[$headerKeysIndex['PressureRatingPSI']])
                        {
                            $pressureRating = $item[$headerKeysIndex['PressureRatingPSI']];
                        }

                        if(!$mainImageObj && $item[$headerKeysIndex['mainImage']])
                        {
                            // if (Asset\Service::pathExists($item[$headerKeysIndex['mainImage']]))
                            // {
                                $mainImageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['mainImage']]);
                            //     if(file_exists($mainImage->getFileSystemPath()))
                            //     {
                            //         $mainImageObj = $mainImage;
                            //     }
                            //     unset($mainImage);
                            // }
                        }

                        if(!$ProfileDimensionImageObj && $item[$headerKeysIndex['ProfileDimensionImage']])
                        {
                            // if (Asset\Service::pathExists($item[$headerKeysIndex['ProfileDimensionImage']]))
                            // {
                                $ProfileDimensionImageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['ProfileDimensionImage']]);
                            //     if(file_exists($ProfileDimensionImage->getFileSystemPath()))
                            //     {
                            //         $ProfileDimensionImageObj = $ProfileDimensionImage;
                            //     }
                            //     unset($ProfileDimensionImage);
                            // }
                        }

                        if($item[$headerKeysIndex['FittingMaterial']])
                            $material[] = $item[$headerKeysIndex['FittingMaterial']];

                        if($item[$headerKeysIndex['BrandingLayline']] && empty($BrandingLayline))
                            $BrandingLayline = $item[$headerKeysIndex['BrandingLayline']];

                        if($item[$headerKeysIndex['longDescription']] && empty($longDescription))
                            $longDescription = $item[$headerKeysIndex['longDescription']];

                        if($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']])
                        {
                            foreach ($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']] as $fkey => $feature) {
                                array_push($safetyFeatures,$feature);
                            }
                        }

                        foreach ($orderKeys as $ckey => $cvalue) {
                            if(is_numeric($item[$cvalue])){
                                $float_value = (float) $item[$cvalue];
                                $articlesData[] = is_float($float_value)? (round($float_value, 2, PHP_ROUND_HALF_UP)): $float_value;
                            }
                            else{
                                $articlesData[] = $item[$cvalue];
                            }
                        }

                        $brandsData[] = $articlesData;
                        unset($articlesData);
                    }
                }

                $brandingStr = $BrandingLayline;

                $safetyFeatures = array_unique($safetyFeatures);

                $safetyFeaturesListWithImage = array();
                $safetyFeaturesListWithOutImage = array();

                if($safetyFeatures)
                {
                    foreach ($safetyFeatures as $fkey => $fvalue) {
                        if($featuresList[$fvalue]['icon'])
                            $safetyFeaturesListWithImage[] = array('name'=>$featuresList[$fvalue]['name'], 'iconSrc' => $featuresList[$fvalue]['icon'], 'SortOrder' =>$featuresList[$fvalue]['SortOrder']);
                        else
                            $safetyFeaturesListWithOutImage[] = array('name'=>$featuresList[$fvalue]['name'], 'iconSrc' => $featuresList[$fvalue]['icon'], 'SortOrder' =>$featuresList[$fvalue]['SortOrder']);
                    }
                }

                unset($safetyFeatures);

                array_multisort (array_column($safetyFeaturesListWithImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithImage);
                array_multisort (array_column($safetyFeaturesListWithOutImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithOutImage);

                $safetyFeaturesList = array_merge_recursive($safetyFeaturesListWithImage,$safetyFeaturesListWithOutImage);

                unset($safetyFeaturesListWithImage);
                unset($safetyFeaturesListWithOutImage);

                $material = array_unique($material);
                $orderCodeArr = array_unique($orderCode);

                $materialStr = implode(', ', $material);
                $orderCodeStr = implode(', ', $orderCodeArr);

                unset($material);
                unset($materialArray);

                $groupData = array();
                $groupData['subHeaderRequired'] = $subHeaderRequired;
                $groupData['iconRequired'] = $iconRequired;
                $groupData['material'] = $materialStr;
                $groupData['pressureRating'] = $pressureRating;
                $groupData['brandingLayline'] = $brandingStr;
                $groupData['orderCodes'] = $orderCodeStr;
                $groupData['safetyFeatures'] = $safetyFeaturesList;
                $groupData['mainImageObj'] = $mainImageObj;
                $groupData['columnsDataWithImages'] = $columnsDataWithImages;
                $groupData['ProfileDimensionImageObj'] = $ProfileDimensionImageObj;
                $groupData['longDescription'] = $longDescription;
                $groupData['data'] = $brandsData;
                $groupData['columnsDataWithImages'] = $columnsDataWithImages;
                $groupData['brandName'] = $brandName;
                $groupData['categories'] = $menuCategories;
                $groupData['selectedCategory'] = $catagoryDescription['SIOP3Description'];
                $groupData['siop4Category'] = $catagoryDescription['SIOP4Description'];
                $groupData['siop3Category'] = $catagoryDescription['SIOP3Description'];
                unset($menuCategories);
                unset($brandsData);
                unset($mainImageObj);
                unset($ProfileDimensionImageObj);

                $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesINHFooter['Black']:$CatalogImagesINHFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

                $this->view['groupData'] = $groupData;
                $this->view['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
                $this->view['footer_logo_src'] = $footer_logo_src;
            }
        }
    }

    public function inhFittingCoverAction(){
        $templates = $this->getDocumentTag('relations', 'inh_fitting_cover_page')->getElements();

        if($templates)
        {
            $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

            $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
            $INHFittingCoverPageConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getINHFittingCoverPageConfig();

            $featuresMaterials = $commonHelper->getParameter($INHFittingCoverPageConfig, 'headers');
            $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesINHFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesINHFooter');
            $CatalogImagesINHProduct = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesINHProduct');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($templates[0]->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());

            $CatalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = '';
            $templateBrandDtata = array();
            $menuCategories = $this->getSIOP($CatalogLanguage);
            $catagoryDescription = array();


            $query = "select oo_id, Level, description, PrintedCatalogDescription from object_localized_2_{$CatalogLanguage} where level IN (3,4) ";

            $categories = $this->db->fetchAll($query);

            $categoriesList = array();

            foreach ($categories as $key => $value) {
                $categoriesList[$value['oo_id']] = $value;
            }

            unset($categories);

            foreach ($templates as $key => $template)
            {
                if(empty(trim($footerBgColor)))
                    $footerBgColor = $template->getColor();

                $productsData = $template->getProductsData();
                $headerData = json_decode($template->getHeaderData(), true);
                $headerKeys = array_keys($headerData);
                $headerKeysIndex = array_flip($headerKeys);

                $materialKeys = array_fill_keys($featuresMaterials, '');
                foreach ($productsData as $key => $item) {

                    if($item[$headerKeysIndex['brandName']][0])
                    {
                        if(!isset($catagoryDescription['SIOP3Description']))
                        {
                            $query = "select SIOPLevel3 from object_query_1 where oo_id = '".$item[$headerKeysIndex['id']]."'";

                            $record = $this->db->fetchRow($query);
                            $SIOPLevel3 = trim($record['SIOPLevel3'], ',');
                            $catagoryDescription['SIOP3Description'] = !empty($categoriesList[$SIOPLevel3]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel3]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel3]['description'];
                        }
                        foreach($featuresMaterials as $fkey => $material)
                        {
                            if($material == $item[$headerKeysIndex['FittingMaterial']])
                                $materialKeys[$material] = 'Yes';
                        }
                        $templateBrandDtata[$item[$headerKeysIndex['brandName']][0]]= $materialKeys;
                    }
                }
            }

            unset($categoriesList);

            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesINHFooter['Black']:$CatalogImagesINHFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $this->view['featuresMaterials'] = $featuresMaterials;
            $this->view['templateBrandDtata'] = $templateBrandDtata;
            $this->view['categories'] = $menuCategories;
            $this->view['selectedCategory'] = $catagoryDescription['SIOP3Description'];
            // $this->view['defaultPageImage'] = \Pimcore\Model\Asset::getByPath($CatalogImagesINHProduct['DefaultCoverImage']);
            $this->view['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
    }

    private function getSIOP($language) {
        $listing = new \Pimcore\Model\DataObject\ProductCategory\Listing;
        $listing->setCondition("CatalogFlag = :catFlag", ["catFlag" => 1]);
        // $listing->setLimit(10);
        $listing->load();
        $categories = array();
        foreach($listing as $category) {
            if($category->getLevel()==3) {
                $categories[$category->getFullCode()][] = array(
                    'name' => ($category->getPrintedCatalogDescription($language)) ? $category->getPrintedCatalogDescription($language) : $category->getDescription($language),
                    'level' => $category->getLevel(),
                    'printable' => 1
                );
                // $categories[$category->getId()] = $category->getDescription();
            } else {
                $fullCode = $category->getParent()->getFullCode();
                $cat = array(
                    'name' => ($category->getPrintedCatalogDescription($language)) ? $category->getPrintedCatalogDescription($language) : $category->getDescription($language),
                    'level' => $category->getLevel(),
                    'printable' => 1
                );
                if(!isset($categories[$fullCode])) {
                    $categories[$fullCode][] = array(
                        'name' => ($category->getParent()->getPrintedCatalogDescription($language)) ? $category->getParent()->getPrintedCatalogDescription($language) : $category->getParent()->getDescription($language),
                        'level' => $category->getParent()->getLevel(),
                        'printable' => 0
                    );
                }
                $categories[$fullCode][] = $cat;
            }

        }
        return $categories;
    }

    public function getFeaturesList($catalog_type, $language){
        $entries = new DataObject\Features\Listing();
        // $entries->setCondition("FeatureType = ?", "{$catalog_type}");
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            if($entry->getIcon())
                $featureData[$entry->getId()]['icon'] = $entry->getIcon()->getPath().$entry->getIcon()->getFilename();

            $featureData[$entry->getId()]['name'] = $entry->getName($language);
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['key'] = $entry->getId();
            $featureData[$entry->getId()]['SortOrder'] = $entry->getSortOrder();
        }
        return $featureData;
    }

    private function getSiopObject($siop) {
        if(is_array($siop) && !empty($siop)) {
            foreach ($siop as $siopId) {
                $siopObj = \Pimcore\Model\DataObject\ProductCategory::getById($siopId);
                return $siopObj;
            }
        }
        return false;
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            $s3src = $imgObj->getThumbnail('catalog_thumb');
//            $s3src = Utils::getAssetFullPathCompatibleToS3($imgObj);
        }

        return $s3src;
    }

    public function getBrandsList(){
        $query = "select name, SortOrder from object_query_3";
        $brandslist = $this->db->fetchPairs($query);
        return $brandslist;
    }
}
