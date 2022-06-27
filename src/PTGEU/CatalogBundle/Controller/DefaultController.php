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
    private $attributeImages = [];
    private $iconRequired = 'NO';
    private $subHeaderRequired = 'NO';
    private $catalogTemplatingHelper;
    private $db;

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
        $table = $request->get('table');
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        $catalogConfig = \Pimcore::getContainer()->get('catalog.config_provider_service')->getCatalogConfig();
        $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, 'PTG Product Page');
        // $table = (trim($table)) ? $table : $ptgProductPageConfig['Default Dynamic Table Attribute'];
        
        $columns = array();
        $arr = [];
        if ($table) {

            $tableColumns = $ptgProductPageConfig['Dynamic Table Attribute'][$table];
            if ($tableColumns !== null) {
                if (!empty($tableColumns) && count($tableColumns) > 0) {
                    foreach ($tableColumns as $key => $column) {
                        $fieldLabel = $column['fieldLabel'];
                        $columns[] = array($key, $key);
                    }
                }
                $arr = array('storeData' => $columns, 'completeData' => $tableColumns, 'success' => true);
            } else {
                $arr = array('storeData' => [], 'completeData' => [], 'success' => true);
            }
        } else {
            $arr = array('storeData' => [], 'completeData' => [], 'success' => false);
        }

        echo json_encode($arr);
        die;
    }

    public function templatePtgEuProductPageAction(Request $request)
    {
        
        $catalogCategoryTableObject = $this->getDocumentTag('relation', 'ptg_eu_product_page')->getElement();
        if($catalogCategoryTableObject)
        {
            $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
            $catalogConfig = \Pimcore::getContainer()->get('catalog.config_provider_service')->getCatalogConfig();
            $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, 'PTG Product Page');
            
            $attributeImagesConfig = \Pimcore::getContainer()->get('catalog.config_provider_service')->getAttributeImagesConfig();

            
            // die;
            // $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
            // 
            // $priceListTableConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getPriceListTableConfig();

            // $priceListTableColumn = $commonHelper->getParameter($priceListTableConfig, 'priceListTableColumn');
            // $priceListCurrency = $commonHelper->getParameter($priceListTableConfig, 'priceListCurrency');
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesPTGFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesPTGFooter');

            $catalogObj = DataObject\PTGEUCatalog::getById($catalogCategoryTableObject->getParentId());
            // $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());

            $IsPriceCatalog = $catalogObj->getIsPriceCatalog();
            $CatalogLanguage = $catalogObj->getCatalogLanguage();
            $distributionChannel = $catalogObj->getDistributionChannel();
            $salesOrganisation = $catalogObj->getSalesOrganisation();
            $Currency = $catalogObj->getCurrency();
            $ValidFromDate = $catalogObj->getValidFromDate();

            $attributeTable = $catalogCategoryTableObject->getAttributeTable();
            // echo $catalogCategoryTableObject->getAttributeHeaderTableIcon();
            $this->iconRequired = ($catalogCategoryTableObject->getAttributeHeaderTableIcon()) ? 'YES' : 'NO';   //  it returns if Yes = true, No = false or Empty = null
            $objColumnsData = $catalogCategoryTableObject->getColumns();
            $fifthLevelCategoryObj = $catalogCategoryTableObject->getFifthLevelCategory();
            $sixSevenLevelCategoryObj = $catalogCategoryTableObject->getSixSevenLevelCategory();
            
            $fifthLevelEntries = new DataObject\PTGEUProduct\Listing();
            $fifthLevelEntries->setCondition("productType = ? AND hierarchyLevel5 LIKE ?", ["base","%$fifthLevelCategoryObj%"]);
            $fifthLevelEntries->setLimit(1);

            foreach ($fifthLevelEntries as $entry) {
                $fifthLevelProduct = $entry;
            }
            // p_r($sixSevenLevelCategoryObj);

            $seventhLevelProductList = [];

            foreach ($sixSevenLevelCategoryObj as $categoryId) {

                $seventhLevelEntries = new DataObject\PTGEUProduct\Listing();
                $seventhLevelEntries->setCondition("productType = ? AND hierarchyLevel7 LIKE ?", ["skeleton","%$categoryId%"]);
                $seventhLevelEntries->setLimit(1);

                foreach ($seventhLevelEntries as $entry) {
                    $seventhLevelProductList[] = $entry->getId();
                }
            }

            $this->columnsData = json_decode($objColumnsData, true);
            // p_r("dfg");
            // if($IsPriceCatalog)
            // {
            //     $this->columnsData['listPrice']['columnName'] = 'listPrice';
            //     $this->columnsData['listPrice']['columnLabel'] = 'listPrice';
            //     $this->columnsData['listPrice']['unitName'] = $priceListCurrency[$Currency];
            // }
            // p_r("dfg");
            
            
            // p_r($groupData);
            // $tableHeaderAtrributes = array();

            // foreach ($ptgProductPageConfig as $key => $attribute) {
            //     if($attribute['tableHeaderAtrribute'])
            //     {
            //         $tableHeaderAtrributes[$key] = $attribute;
            //     }
            // }

            // $this->columnsData = $tableHeaderAtrributes;

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(FALSE, []);
            // p_r("dfg");
            $reinforcement = array();

            $groupData = array();
            $this->subHeaderRequired = 'YES';
            $groupData['subHeaderRequired'] = $this->subHeaderRequired;
            $groupData['iconRequired'] = $this->iconRequired;
            $groupData['material'] = $fifthLevelProduct->getMaterial();

            if($fifthLevelProduct->getReinforcement())
            {
                $reinforcement = $fifthLevelProduct->getReinforcement();
            }
            // p_r($groupData);

            $reinforcement = implode(', ', $reinforcement);
                    
            $groupData['reinforcement'] = $reinforcement;

            $this->featuresList = $this->getFeaturesList('en');
            
            $safetyFeatures = array();
            foreach ($fifthLevelProduct->getFeaturesBenefitsBulletPoint() as $feature) {
                array_push($safetyFeatures,$feature);
            }
            
            $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);
            
            // die;
            $groupData['safetyFeatures'] = $safetyFeaturesList;
            $groupData['mainImageObj'] = $fifthLevelProduct->getMainImage1();
            $groupData['ProfileDimensionImageObj'] = $fifthLevelProduct->getTechnicalDrawing1();
            $groupData['longDescription'] = $fifthLevelProduct->getLongDescription();
            $groupData['temperatureRange'] = $fifthLevelProduct->getRangeTemperatureF()."(".$fifthLevelProduct->getRangeTemperatureF().")";
            
            
            $groupData['brandName'] = $fifthLevelProduct->getProductName();
            
            
            $productObjectLevel6List = $fifthLevelProduct->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
            // p_r($productObjectLevel6List);
            // die;
            $articleData = [];
            foreach ($productObjectLevel6List as $productObjectLevel6) {
                if((count($sixSevenLevelCategoryObj)== 0) || in_array($productObjectLevel6->getId(), $seventhLevelProductList))
                {
                    $productObjectLevel7List = $productObjectLevel6->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
                    foreach ($productObjectLevel7List as $article) {

                        if($article->getPrintedCatalogFlag() === true)
                        {
                            $data['articleNumber'] = $article->getArticleNumber();
                            $data['widthMM'] = '1';
                            $data['toothPitchPtMM'] = '2';
                            $data['numberOfTeethZ'] = '3';

                            // p_r($article->getArticleNumber());die;

                            // if(method_exists($article->getBricks(), 'getPTGEUFlatBeltsFert'))
                            // {
                            //     $data['widthMM'] = $article->getBricks()->getPTGEUFlatBeltsFert()->getWidthMM();
                            //     $data['toothPitchPtMM'] = $article->getBricks()->getPTGEUFlatBeltsFert()->getToothPitchPtMM();
                            //     $data['numberOfTeethZ'] = $article->getBricks()->getPTGEUFlatBeltsFert()->getNumberOfTeethZ();
                            // }

                            $data['pitchLengthLpLwMM'] = '4';
                            $data['pitchLengthLpLwIN'] = '5';
                            
                            // if(method_exists($article->getBricks(), 'getPTGEUCommonFert'))
                            // {
                                // $data['pitchLengthLpLwMM'] = $article->getBricks()->getPTGEUCommonFert()->getPitchLengthLpLwMM();
                                // $data['pitchLengthLpLwIN'] = $article->getBricks()->getPTGEUCommonFert()->getPitchLengthLpLwIN();
                            // }

                            
                            $data['netWeight'] = $article->getNetWeight();
                            $data['weightUnit'] = $article->getWeightUnit();
                            $articleData[$article->getProfile()][] = $data;
                        }
                    }
                }
            }
                        // p_r($articleData);productObjectLevel5
            // p_r($articleData);
            // die;

            // $brandsDataArr = array();
    //             if($brandsData)
    //             {
    //                 foreach ($brandsData as $bkey => $bvalue) {

    //                     if(isset($headerKeysIndex['pitchMM']) && isset($headerKeysIndex['widthmm']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['pitchMM']), SORT_ASC, array_column($bvalue, $headerKeysIndex['widthmm']), SORT_ASC, $bvalue);
    //                     else if(isset($headerKeysIndex['outsideLengthIN']) && isset($headerKeysIndex['netWeight']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['outsideLengthIN']), SORT_ASC, array_column($bvalue, $headerKeysIndex['netWeight']), SORT_ASC, $bvalue);
    //                     else if(isset($headerKeysIndex['insideLengthIN']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['insideLengthIN']), SORT_ASC, $bvalue);
    //                     else if(isset($headerKeysIndex['pulleyDiameterIN']) && isset($headerKeysIndex['GroovesPerTooth']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['pulleyDiameterIN']), SORT_ASC, array_column($bvalue, $headerKeysIndex['GroovesPerTooth']), SORT_ASC, $bvalue);
    //                     else if(isset($headerKeysIndex['numberOfTeeth']) && isset($headerKeysIndex['netWeight']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['numberOfTeeth']), SORT_ASC, array_column($bvalue, $headerKeysIndex['netWeight']), SORT_ASC, $bvalue);

    //                     $brandsDataArr[$bkey] = $bvalue;
    //                 }

    //             }
    //             unset($brandsData);
            $groupData['data'] = $articleData;
            $groupData['columnsDataWithImages'] = $columnsDataWithImages;
            // p_r($columnsDataWithImages);

            $footer_logo_src = $CatalogImagesPTGFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);
            $this->view['footer_class'] = '';
            $this->view['footer_logo_src'] = $footer_logo_src;
    //             $this->view['containerRequest'] = $containerRequest;
            $this->view['groupData'] = $groupData;
            // die;
    //         $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
    //         $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
    //         $priceListTableConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getPriceListTableConfig();

    //         $priceListTableColumn = $commonHelper->getParameter($priceListTableConfig, 'priceListTableColumn');
    //         $priceListCurrency = $commonHelper->getParameter($priceListTableConfig, 'priceListCurrency');
    //         $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
    //         $CatalogImagesPTGFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesPTGFooter');

    //         $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
    //         $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());

    //         $IsPriceCatalog = $catalogObj->getIsPriceCatalog();
    //         $CatalogLanguage = $catalogObj->getCatalogLanguage();
    //         $distributionChannel = $catalogObj->getDistributionChannel();
    //         $salesOrganisation = $catalogObj->getSalesOrganisation();
    //         $Currency = $catalogObj->getCurrency();
    //         $ValidFromDate = $catalogObj->getValidFromDate();

    //         $footerBgColor = $template->getColor();
    //         $productsData = $template->getProductsData();
    //         $headerData = json_decode($template->getHeaderData(), true);

    //         $headerKeys = array_keys($headerData);
    //         $headerKeysIndex = array_flip($headerKeys);

    //         $objColumnsData = $template->getColumns();


    //         $this->iconRequired = 'YES';
    //         $this->columnsData = json_decode($objColumnsData, true);

            if($IsPriceCatalog)
            {
                $this->columnsData['listPrice']['columnName'] = 'listPrice';
                $this->columnsData['listPrice']['columnLabel'] = 'listPrice';
                $this->columnsData['listPrice']['unitName'] = $priceListCurrency[$Currency];
            }
            
    //         $this->get('translator')->setLocale($CatalogLanguage);

    //         $this->subHeaderRequired = 'NO';

    //         $columnsDataWithImages = $this->getColumnHeadersForCatalog(FALSE, []);
            
    //         unset($objColumnsData);
    //         //unset($this->columnsData);
    //         //unset($this->attributeImages);

    //         // Getting order of the keys
            // $orderKeys = array();
            // foreach ($columnsDataWithImages as $skey => $svalue) {
            //     foreach ($svalue as $vkey => $vvalue) {
            //         if($vvalue['columnName'] == 'listPrice')
            //         {
            //             $orderKeys[$vvalue['columnName']] = count($headerKeysIndex);
            //         }
            //         else
            //         {
            //             $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
            //         }
            //     }
            // }

    //         $this->featuresList = $this->getFeaturesList('', $CatalogLanguage);
    //         $materialList = $this->getMaterialList('PTG~material', $CatalogLanguage);

    //         $query = "select oo_id, Level, description, PrintedCatalogDescription from object_localized_2_{$CatalogLanguage} where level IN (3,4,5,6) ";

    //         $categories = $this->db->fetchAll($query);

    //         $categoriesList = array();

    //         foreach ($categories as $key => $value) {
    //             $categoriesList[$value['oo_id']] = $value;
    //         }
    //         unset($categories);

    //         $catagoryDescription = array();
    //         $mainImageObj = '';
    //         $LeftPrintCatalogImageObj = '';
    //         $RightPrintCatalogImageObj = '';
    //         $ProfileDimensionImageObj = '';
    //         $material = array();
    //         $reinforcement = array();
    //         $longDescription = '';
    //         $temperatureRangeFAndC = '';
    //         $VirtualCatalogReinforcement = '';
    //         $safetyFeatures = array();

    //         if($productsData)
    //         {
    //             foreach ($productsData as $key => $item)
    //             {
    //                 $query = "select SIOPLevel3, SIOPLevel4, SIOPLevel5, SIOPLevel6, priceData from object_query_1 where oo_id = '".$item[$headerKeysIndex['id']]."'";

    //                 $record = $this->db->fetchRow($query);
    //                 $SIOPLevel3 = trim($record['SIOPLevel3'], ',');
    //                 $SIOPLevel4 = trim($record['SIOPLevel4'], ',');
    //                 $SIOPLevel5 = trim($record['SIOPLevel5'], ',');
    //                 $SIOPLevel6 = trim($record['SIOPLevel6'], ',');

    //                 $siop6Category = !empty($categoriesList[$SIOPLevel6]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel6]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel6]['description'];
    //                 $siop6Category = trim($siop6Category);

    //                 if($siop6Category)
    //                 {
    //                     
    

    
    

    //                     $item[] = $listPrice;

    //                     foreach ($orderKeys as $ckey => $cvalue) {
    //                         $articlesData[] = $item[$cvalue];
    //                     }

    //                     $brandsData[$siop6Category][] = $articlesData;
    //                     unset($articlesData);
    //                 }
    //             }

    //             $brandsDataArr = array();
    //             if($brandsData)
    //             {
    //                 foreach ($brandsData as $bkey => $bvalue) {

    //                     if(isset($headerKeysIndex['pitchMM']) && isset($headerKeysIndex['widthmm']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['pitchMM']), SORT_ASC, array_column($bvalue, $headerKeysIndex['widthmm']), SORT_ASC, $bvalue);
    //                     else if(isset($headerKeysIndex['outsideLengthIN']) && isset($headerKeysIndex['netWeight']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['outsideLengthIN']), SORT_ASC, array_column($bvalue, $headerKeysIndex['netWeight']), SORT_ASC, $bvalue);
    //                     else if(isset($headerKeysIndex['insideLengthIN']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['insideLengthIN']), SORT_ASC, $bvalue);
    //                     else if(isset($headerKeysIndex['pulleyDiameterIN']) && isset($headerKeysIndex['GroovesPerTooth']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['pulleyDiameterIN']), SORT_ASC, array_column($bvalue, $headerKeysIndex['GroovesPerTooth']), SORT_ASC, $bvalue);
    //                     else if(isset($headerKeysIndex['numberOfTeeth']) && isset($headerKeysIndex['netWeight']))
    //                         array_multisort(array_column($bvalue, $headerKeysIndex['numberOfTeeth']), SORT_ASC, array_column($bvalue, $headerKeysIndex['netWeight']), SORT_ASC, $bvalue);

    //                     $brandsDataArr[$bkey] = $bvalue;
    //                 }

    //             }
    //             unset($brandsData);

    //             $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);

    //             $reinforcement = array_unique($reinforcement);
    //             $reinforcement = implode(', ', $reinforcement);

    //             $material = array_unique($material);
    //             $materialArray = array();
    //             foreach($material as $key => $value)
    //             {
    //                 if(isset($materialList[$value]))
    //                     $materialArray[] = $materialList[$value]['name'];
    //             }

    //             $materialStr = implode(', ', $materialArray);

    //             unset($material);
    //             unset($safetyFeatures);
    //             unset($materialArray);

    //             $reinforcementStr = strip_tags($VirtualCatalogReinforcement, "<ul><li><span><strong>");
    //             if(empty($reinforcementStr))
    //                 $reinforcementStr = $reinforcement;

    //             $groupData = array();
    //             $groupData['subHeaderRequired'] = $this->subHeaderRequired;
    //             $groupData['iconRequired'] = $this->iconRequired;
    //             $groupData['material'] = $materialStr;
    //             $groupData['reinforcement'] = $reinforcementStr;
    //             $groupData['safetyFeatures'] = $safetyFeaturesList;
    //             $groupData['mainImageObj'] = $mainImageObj;
    //             $groupData['columnsDataWithImages'] = $columnsDataWithImages;
    //             $groupData['ProfileDimensionImageObj'] = $ProfileDimensionImageObj;
    //             $groupData['longDescription'] = $longDescription;
    //             $groupData['temperatureRange'] = $temperatureRangeFAndC;
    //             $groupData['data'] = $brandsDataArr;
    //             $groupData['columnsDataWithImages'] = $columnsDataWithImages;
    //             $groupData['brandName'] = $catagoryDescription['SIOP5Description'];
    //             $groupData['siop4Category'] = $catagoryDescription['SIOP4Description'];
    //             $groupData['siop3Category'] = $catagoryDescription['SIOP3Description'];
    //             $groupData['IsPriceCatalog'] = $IsPriceCatalog;
    //             unset($brandsData);
    //             unset($mainImageObj);
    //             unset($ProfileDimensionImageObj);
    //             //unset($this->featuresList);

    //             $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesPTGFooter['Black']:$CatalogImagesPTGFooter['Orange'];
    //             $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

    //             $this->view['groupData'] = $groupData;
    //             $this->view['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
    //             $this->view['footer_logo_src'] = $footer_logo_src;
    //             $this->view['containerRequest'] = $containerRequest;
    //         }*/
        }
    }

    public function getFiveSortedFeaturesWithIconList($safetyFeatures){
        
        $safetyFeatures = array_unique($safetyFeatures);

        $safetyFeaturesList  = array();
        $safetyFeaturesListWithImage = array();
        $safetyFeaturesListWithOutImage = array();

        if($safetyFeatures)
        {
            foreach ($safetyFeatures as $fkey => $fvalue) {
                if($this->featuresList[$fvalue]['icon'])
                {
                    if(!isset($this->s3srcArr[$fvalue]))
                    {
                        $this->s3srcArr[$fvalue] = $this->getS3ImageSrc($this->featuresList[$fvalue]['icon']);
                    }
                    $safetyFeaturesListWithImage[] = array('name'=>$this->featuresList[$fvalue]['name'], 'iconSrc' => $this->s3srcArr[$fvalue], 'SortOrder' =>$this->featuresList[$fvalue]['SortOrder']);
                }
                else
                {
                    $safetyFeaturesListWithOutImage[] = array('name'=>$this->featuresList[$fvalue]['name'], 'iconSrc' => $this->featuresList[$fvalue]['icon'], 'SortOrder' =>$this->featuresList[$fvalue]['SortOrder']);
                }
            }
        }

        if($safetyFeaturesListWithImage)
        {
            array_multisort (array_column($safetyFeaturesListWithImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithImage);
        }
        
        if($safetyFeaturesListWithOutImage)
        {
            array_multisort (array_column($safetyFeaturesListWithOutImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithOutImage);
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
        $entries = new DataObject\Features\Listing();
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            if($entry->getIcon())
            {
                $featureData[$entry->getId()]['icon'] = $entry->getIcon()->getPath().$entry->getIcon()->getFilename();
            }

            $featureData[$entry->getId()]['name'] = $entry->getName($language);
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['SortOrder'] = $entry->getSortOrder();
        }
        return $featureData;
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            // $s3src = $imgObj->getThumbnail('catalog_thumb');
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,$this->view->imageWidth);
//            $s3src = Utils::getAssetFullPathCompatibleToS3($imgObj);
        }


        return $s3src;
    }

    public function getColumnHeadersForCatalog($isTableNameColumnRequired = FALSE, $tableNameColumns = []){

        $columnsDataWithImages = array();

        if($isTableNameColumnRequired)
        {
            foreach ($this->columnsData as $dkey => $value) 
            {
                if(in_array($dkey,$tableNameColumns))
                {
                    $groupColumnName = $value['columnName'];
                    if(isset($value['groupName']) && $value['groupName'])
                    {
                        $groupColumnName = $value['groupName'];
                        $this->subHeaderRequired = 'YES';
                    }

                    $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $value['groupName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnWidth'] = $value['columnWidth'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['unitName'] = $this->get('translator')->trans($value['unitName']);
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnName'] = $value['columnName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnLabel'] = $this->get('translator')->trans($groupColumnName);

                    if ($this->iconRequired == 'YES')
                    {
                        if(!isset($this->attrbuteImgS3Arr[$groupColumnName]))
                        {
                            $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                            $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                            $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                            $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attributeImagesSrc;
                        }
                        else
                        {
                            $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                        }
                    }
                }
            }
        }
        else
        {
            foreach ($this->columnsData as $key => $value) {

                $groupColumnName = $value['columnName'];
                if(isset($value['groupName']) && $value['groupName'])
                {
                    $groupColumnName = $value['groupName'];
                    $this->subHeaderRequired = 'YES';
                }

                $columnsDataWithImages[$groupColumnName][$key]['groupName'] = $value['groupName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnWidth'] = $value['columnWidth'];

                if($value['columnName'] == 'listPrice')
                {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $value['unitName'];
                }
                else
                {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($value['unitName']) ? $this->get('translator')->trans($value['unitName']) : '';
                }

                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $value['columnName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->get('translator')->trans($groupColumnName);
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
