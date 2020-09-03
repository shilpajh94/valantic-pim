<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

            $siop = $obj->getSiopLevel4();
            $siopObj = $this->getSiopObject($siop);
            $configTableName = "AIR & MULTIPURPOSE";

            if($siopObj != null) {
                $configTableName = $siopObj->getParent()->getDescription();
            }

            $productPageColumns = $inhSectionPageConfig[$configTableName];
            foreach ($productPageColumns['dispColumns'] as $key => $value) {
                $productPageColumns['dispColumns'][$key]['title'] = $this->get('translator')->trans($key);
            }


            $data = array();
            $headers = (array) json_decode($obj->getHeaderData());

            $headerKeys = array_keys($headers);


            // p_r($columnsDataWithImages);die;
            $productsData = array();
            $brands = array(
                0=>1645,
                1646,1645,1647,1648,1649,1649,1650,1650,1651,1652,1645,1645,1646
            );
            $features = array(
                0=>1694371, 1694372, 1694373, 1694374, 1694375
            );
            $featuresArr = array(
                [1694371, 1694373, 1694375],
                [1694373],
                [1694375, 1694373, 1694374],
                [1694372, 1694375],
                [1694372, 1694371]
                [1694375],
                [1694373, 1694374, 1694375],
                [1694384],
                [1694373],
                [1694374],
                [1694372, 1694373],
                [1694371, 1694372, 1694373, 1694374],
                [1694375],
                [1694371]
            );
            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    $productsData[] = array_combine($headerKeys, $row);
                }
                $i = 0;
                // p_r($productsData);die;
                foreach ($productsData as $k => $row) {
                    /* if(empty($row['FittingTableName'])) {
                        continue;
                    } */

                    // p_r($productPageColumns);die;
                    /* $obj = \Pimcore\Model\DataObject\Product::getById($row['id']);
                    $obj->setBrandName($brands[array_rand($brands, 1)]);
                    // $obj->setFittingTableName('AIR & MULTIPURPOSE');
                    $obj->setFeaturesBenefitsBulletPoint([$featuresArr[array_rand($featuresArr, 1)]]);
                    $obj->save();
                    p_r($obj->getBrandName()); 
                    $i++;
                    if($i>100) {
                        die;
                    }
                    $i++;
                    if($i>10) {
                        // die;
                    }*/
                    if (isset($row['brandName']) && !empty($row['brandName'])) {
                        $uniqueId = $configTableName;
                        $brandName = $row['brandName'][0];
                        if (!isset($data[$uniqueId])) {
                            $data[$uniqueId][$brandName] = array();
                            $data[$uniqueId]['columns'] = $productPageColumns['columns'];
                            $data[$uniqueId]['dispColumns'] = $productPageColumns['dispColumns'];                                                      
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName])) {
                            $data[$uniqueId]['data'][$brandName] = array();
                        }
                        
                        /**
                         * Adding attribute and its value
                         * If current processing attribute is not an empty variable then it will will assign value to and array
                         * index name with same current processing attribut name
                         * $data[$uniqueId]['data'][$brandName][$col]
                         * $data: array
                         * $uniqueId: Current processing Table Name(SIOP Level 3 Description)
                         * data: index of $data[$uniqueId]
                         * $brandName: index of $data[$uniqueId]['data'] for storing unique brand name
                         * $col: current processing attribut name
                         * see table_column.yml for attribut name
                         * $productPageColumns['columns']: It has list of attributes name which is bening to use to
                         * assign value of found attribute name
                        */

                        foreach($productPageColumns['columns'] as $col) {
                            // p_r("Col: ".$col.": ".$row[$col][0]);
                            if(isset($row[$col])) {
                                if(!isset($data[$uniqueId]['data'][$brandName][$col])) {
                                    $data[$uniqueId]['data'][$brandName][$col] = "";
                                }
                                if(empty($data[$uniqueId]['data'][$brandName][$col])) {
                                    $data[$uniqueId]['data'][$brandName][$col] = $row[$col];
                                }
                                
                            }                            
                        }
                    }
                }
            }
            // p_r($data);die;
            $categories = $this->getSIOP();
            // p_r($categories);die;
            $this->view['info'] = array(
                'data' => $data,
                'categories' => $categories,
                'defaultPageImage' => \Pimcore\Model\Asset::getByPath('/CatalogImages/INH/airandmultipurpose.png'),
                'lang' => $lang,
                'logo' => \Pimcore\Model\Asset::getByPath('/CatalogImages/logo.JPG')
            );
        }
    }

    /**
     * @Route ("/catalog/inh/productpage")
     * 
     */
    public function inhPrintCatalogProductPageAction(Request $request) {
        $inhSectionPageConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getINHProductPageConfig()['parameters'];     
        $attrImages = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];
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

            $data = array();
            $headers = (array) json_decode($obj->getHeaderData());
            $headerKeys = array_keys($headers);
            $headerDataArr = (array)$headers;
            // p_r($headerDataArr);
            $columns = (array) json_decode($obj->getColumns());
            // p_r($columns);die;
            foreach($columns as $key=> $colsInfo) {
                $columns[$key]->columnLabel = $this->get('translator')->trans($colsInfo->columnName);
            }
            // p_r($columns);
            // Getting Selected 3rd Level Category at Catalog Category object
            $siop = $obj->getSiopLevel4();
            $siopObj = $this->getSiopObject($siop);
            $selectedSiop = "AIR & MULTIPURPOSE";
            if($siopObj != null) {
                $selectedSiop = $siopObj->getDescription();
            }

            // p_r($inhSectionPageConfig);die;
            $productsData = array();
            $brands = array(
                0=>1645,
                1646,1645,1647,1648,1649,1649,1650,1650,1651,1652,1645,1645,1646,1648,1649,1649,1650,1650,1651,1646,1645,1647,1648,1649,1649,1650,1650,1649,1650,1650,1651,1646,1645,1647,1650,1650,1651,1652,1645,1645,1646,1648,1649,1649,1650,1650,1651,1646,1645,1647,1648,1649,1649,
            );
            $features = array(
                0=>1694371, 1694372, 1694373, 1694374, 1694375
            );
            $featuresArr = array(
                [1694371, 1694373, 1694375],
                [1694373],
                [1694375, 1694373, 1694374],
                [1694372, 1694375],
                [1694372, 1694371]
                [1694375],
                [1694373, 1694374, 1694375],
                [1694373],
                [1694374],
                [1694372, 1694373],
                [1694371, 1694372, 1694373, 1694374],
                [1694375],
                [1694371],
                [1694375, 1694373, 1694374],
                [1694372, 1694375],
                [1694372, 1694371]
                [1694375],
                [1694373, 1694374, 1694375],
                [1694372, 1694375],
                [1694372, 1694371]
                [1694375],
                [1694373, 1694374, 1694375],
                [1694373],
                [1694374],
                [1694372, 1694373],
                [1694372, 1694373],
                [1694371, 1694372, 1694373, 1694374],
                [1694375],
                [1694371],
                [1694375, 1694373, 1694374],
                [1694372, 1694375],
                [1694372, 1694371]
            );
            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    $productsData[] = array_combine($headerKeys, $row);
                }

                $i = 0;
                foreach ($productsData as $k => $row) {//p_r($row);die;
                    if(empty($row['FittingTableName'])) {
                        continue;
                    }

                    $fittingTableName = $row['FittingTableName'];
                    $productPageColumns = is_array($inhSectionPageConfig) && isset($inhSectionPageConfig[$fittingTableName]) ? $inhSectionPageConfig[$fittingTableName] : null;                    
                    $orderCode = "";

                    if(isset($row['oldMaterialCode']) && !empty($row['oldMaterialCode']) && $row['oldMaterialCode']!=='N/A') {
                        $orderCode = substr($row['oldMaterialCode'],0,6);
                    }

                    // p_r($productPageColumns);die;
                    /* $obj = \Pimcore\Model\DataObject\Product::getById($row['id']);
                    // $obj->setBrandName($brands[$i]);
                    $obj->setFittingTableName('Hose Attribute Table 2');
                    $ftr = $featuresArr[array_rand($featuresArr,1)];
                    $ftr = is_null($ftr) ? [] : $ftr;
                    $obj->setFeaturesBenefitsBulletPoint($ftr);
                    if(empty($obj->getSkeleton()->getHoseSkeleton()->getHoseIdNominalId())) {
                        $obj->getSkeleton()->getHoseSkeleton()->setHoseIdNominalId(strval(rand(1,9).'/'.rand(1,9)));
                    }
                    $obj->getSkeleton()->getHoseSkeleton()->setHoseOdIn(rand(1,9));
                    $obj->getSkeleton()->getHoseSkeleton()->setHoseIdMM(rand(1,9));
                    $obj->getSkeleton()->getHoseSkeleton()->setHoseOdmm(rand(1,9));
                    $obj->getFert()->getHoseFert()->setHoseLengthFT(rand(1,9));
                    $obj->getBase()->getHoseBase()->setCoverColor([array_rand(array("2599"=>2599, "2602"=>2602, "2604"=>2604, "2607"=>2607, "2605"=>2605), rand(1,4))]);
                    $obj->getSkeleton()->getHoseSkeleton()->setWorkingPressurePSI(rand(1,9));
                    $obj->getSkeleton()->getHoseSkeleton()->setWorkingPressureBAR(rand(1,9));
                    $obj->setGrossWeight(rand(1,20));
                    $obj->setVirtualCatalogHoseTemperatureRangeFAndC("20 ̊F to 210 ̊F (-29 ̊C to 99 ̊C)");
                    $obj->setVirtualCatalogBrandingLayline("Example: Gorilla® by Continental 1\" (25.4 mm)
                    500 psi Made in USA Flame Resistant USMSHA No. 2G-IC-14C/39");
                    $obj->setlongDescription("A premium-quality, multipurpose industrial hose with
                    a wide range of applications in factories, construction,
                    agriculture, quarries, mines, railroads, the oil and gas
                    industry and shipbuilding. All sizes are crush-resistant
                    and rated at 500 psi (3.4 MPa) maximum working
                    pressure. The premium CarbrynTM cover offers the most
                    superior abrasion resistance of air and multipurpose hoses.
                    Non-conductive, minimum electrical resistance greater
                    than 1 megohm per inch of hose length at 1000 Volts DC");
                    $obj->getBase()->getHoseBase()->setVirtualCatalogCoupling("Refer to the Continental Industrial Hose Assembly Manual
                    for crimp specifications.");
                    $obj->getBase()->getHoseBase()->setVirtualCatalogCoverMaterial("Yellow CarbrynTM synthetic rubber, ARPM Class A (High Oil
                    Resistance) MSHA approved");
                    $obj->getBase()->getHoseBase()->setVirtualCatalogPackaging("0% one-piece reels up to 1\"
                    3/16\"– 3/4\" – 500' reels, maximum 3 pieces, 50' increments
                    1\" – 450' reels, maximum 3 pieces, 50' increments
                    11⁄4\" – 250'–400' reels, maximum 3 pieces, 50' increments
                    11⁄2\" – 150'–300' reels, maximum 3 pieces, 50' increments
                    2\" – 200' carton, maximum 3 pieces, 50' increments
                    Coupled assemblies available: 1/4\", 3/8\", 1/2\", and 3/4\".");
                    $obj->getBase()->getHoseBase()->setVirtualCatalogTubeMaterial("Nitrile synthetic rubber, ARPM Class A (High Oil Resistance)");
                    $obj->save();
                    $i++; */
                    if (isset($row['brandName']) && !empty($row['brandName'])) {
                        $uniqueId = $fittingTableName;
                        $brandName = $row['brandName'][0];

                        if (!isset($data[$uniqueId])) {
                            $data[$uniqueId]['columns'] = $productPageColumns['columns'];
                            $data[$uniqueId]['data'] = array();                                                   
                        }

                        if (!isset($data[$uniqueId]['data'][$brandName])) {
                            $data[$uniqueId]['data'][$brandName] = array();                                               
                        }
                        
                        /**
                         * Adding attribute and its value
                         * If current processing attribute is not an empty variable then it will will assign value to and array
                         * index name with same current processing attribut name
                         * $data[$uniqueId]['data'][$brandName][$col]
                         * $data: array
                         * $uniqueId: Current processing Table Name
                         * data: index of $data[$uniqueId]
                         * $brandName: index of $data[$uniqueId]['data'] for storing unique brand name
                         * $col: current processing attribut name
                         * see table_column.yml for attribut name
                        */

                        // Product list brand wise
                        $r = array();
                        $b = array();
                        if(isset($productPageColumns['columns'])) {
                            foreach($productPageColumns['columns'] as $col) {
                                if(array_key_exists($col, $row)) {
                                    $r[$col] = $row[$col];
                                }                            
                            }
                        }
                        


                        if(!empty($orderCode)) {
                            $data[$uniqueId]['data'][$brandName]['info']['orderCode'][$orderCode] = $orderCode;
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogHoseTemperatureRangeFAndC']) && empty($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogHoseTemperatureRangeFAndC'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogHoseTemperatureRangeFAndC'] = $row['VirtualCatalogHoseTemperatureRangeFAndC'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogBrandingLayline']) && empty($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogBrandingLayline'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogBrandingLayline'] = $row['VirtualCatalogBrandingLayline'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogCoverMaterial']) && empty($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogCoverMaterial'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogCoverMaterial'] = $row['VirtualCatalogCoverMaterial'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogTubeMaterial']) && empty($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogTubeMaterial'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogTubeMaterial'] = $row['VirtualCatalogTubeMaterial'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogCoupling']) && empty($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogCoupling'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogCoupling'] = $row['VirtualCatalogCoupling'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogReinforcement']) && empty($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogReinforcement'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogReinforcement'] = $row['VirtualCatalogReinforcement'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['longDescription']) && empty($data[$uniqueId]['data'][$brandName]['info']['longDescription'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['Application'] = $row['longDescription'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogPackaging']) && empty($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogPackaging'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogPackaging'] = $row['VirtualCatalogPackaging'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['longDescription']) && empty($data[$uniqueId]['data'][$brandName]['info']['longDescription'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['longDescription'] = $row['longDescription'];
                        }

                        $features = $row['FeaturesBenefitsBulletPoint'];
                        $featureObj = null;

                        if (is_array($features) && !empty($features)) {
                            foreach ($features as $featureId) {
                                $featureObj = \Pimcore\Model\DataObject\Features::getById($featureId);
                                $data[$uniqueId]['data'][$brandName]['info']['featureIcon'][$featureId] = array(
                                    'icon' => $featureObj->getIcon(),
                                    'name' => $featureObj->getName()
                                );
                            }
                        }
                        if(!empty($r)) {
                            $data[$uniqueId]['data'][$brandName]['products'][] = $r;
                        }

                        /**
                         * Page Level (Brand) Info
                        */

                        
                    }
                }
            }
            //p_r($data);die;
            $categories = $this->getSIOP();
            // p_r($categories);die;
            $this->view['info'] = array(
                'data' => $data,
                'dispColumns' => $productPageColumns['columns'],
                'dataTableColumn' => $columns,
                'categories' => $categories,
                'selectedCategory' => $selectedSiop,
                'defaultPageImage' => \Pimcore\Model\Asset::getByPath('/CatalogImages/INH/airandmultipurpose.png'),
                'logo'  =>  \Pimcore\Model\Asset::getByPath('/CatalogImages/logo.JPG'),
                'attrImages' => $attrImages
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

            $menuCategories = $this->getSIOP();

            // p_r($categories);
            // die;

            
            $iconRequired = 'YES';
            $columnsData = json_decode($columnsData, true);
            // p_r($columnsData);
            // die;

            
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
                $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImages[$value['columnName']];
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
                    $query = "select oldMaterialCode, SIOPLevel3, SIOPLevel4 from object_query_1 where oo_id = '".$item[$headerKeysIndex['id']]."'";

                    $record = $this->db->fetchRow($query);
                    $SIOPLevel3 = trim($record['SIOPLevel3'], ',');
                    $SIOPLevel4 = trim($record['SIOPLevel4'], ',');

                    

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

                    if(!$brandName && $item[$headerKeysIndex['brandName']])
                    {
                        $brandName = $item[$headerKeysIndex['brandName']][0];
                    }

                    if(!$pressureRating && $item[$headerKeysIndex['PressureRatingPSI']])
                    {
                        $pressureRating = $item[$headerKeysIndex['PressureRatingPSI']];
                    }

                    if(!$mainImageObj && $item[$headerKeysIndex['mainImage']])
                    {
                        $mainImageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['mainImage']]);
                    }

                    if(!$ProfileDimensionImageObj && $item[$headerKeysIndex['ProfileDimensionImage']])
                    {
                        $ProfileDimensionImageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['ProfileDimensionImage']]);
                    }
                    
                    if($item[$headerKeysIndex['FittingMaterial']])
                        $material[] = $item[$headerKeysIndex['FittingMaterial']];

                    if($item[$headerKeysIndex['BrandingLayline']] && empty($BrandingLayline))
                        $BrandingLayline = $item[$headerKeysIndex['BrandingLayline']];

                    if($item[$headerKeysIndex['VirtualCatalogBrandingLayline']] && empty($VirtualCatalogBrandingLayline))
                        $VirtualCatalogBrandingLayline = $item[$headerKeysIndex['VirtualCatalogBrandingLayline']];
                    
                    if($item[$headerKeysIndex['longDescription']] && empty($longDescription))
                        $longDescription = $item[$headerKeysIndex['longDescription']];

                    if($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']])
                    {
                        foreach ($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']] as $fkey => $feature) {
                            array_push($safetyFeatures,$feature);
                        }
                    }

                    foreach ($orderKeys as $ckey => $cvalue) {
                            $articlesData[] = $item[$cvalue];
                    }

                    $brandsData[] = $articlesData;
                    unset($articlesData);
                }

                $brandingStr = $VirtualCatalogBrandingLayline;
                if(empty($brandingStr))
                    $brandingStr = $BrandingLayline;

                // die;
                
                $safetyFeatures = array_unique($safetyFeatures);

                $safetyFeaturesListWithImage = array();
                $safetyFeaturesListWithOutImage = array();

                if($safetyFeatures)
                {
                    foreach ($safetyFeatures as $fkey => $fvalue) {
                        if($featuresList[$fvalue]['icon'])
                            $safetyFeaturesListWithImage[] = array('name'=>$featuresList[$fvalue]['name'], 'iconSrc' => $featuresList[$fvalue]['icon']);
                        else
                            $safetyFeaturesListWithOutImage[] = array('name'=>$featuresList[$fvalue]['name'], 'iconSrc' => $featuresList[$fvalue]['icon']);
                    }
                }

                unset($safetyFeatures);

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
                $groupData['selectedCategory'] = $catagoryDescription['SIOP4Description'];
                $groupData['siop4Category'] = $catagoryDescription['SIOP4Description'];
                $groupData['siop3Category'] = $catagoryDescription['SIOP3Description'];
                unset($menuCategories);
                unset($brandsData);
                unset($mainImageObj);
                unset($ProfileDimensionImageObj);

                // p_r($groupData);
                // die;

                $this->view['groupData'] = $groupData;
                $this->view['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
                $this->view['footer_logo_src'] = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesINHFooter['Black']:$CatalogImagesINHFooter['Orange'];
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
            
            $catalogCategoryObj = DataObject\CatalogCategory::getById($templates[0]->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            
            $CatalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = '';
            $templateBrandDtata = array();
            $menuCategories = $this->getSIOP();
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
                
                
                foreach ($productsData as $key => $item) {
                    
                    
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
                            $templateBrandDtata[$item[$headerKeysIndex['brandName']][0]][$material] = 'Yes'; 
                        else
                            $templateBrandDtata[$item[$headerKeysIndex['brandName']][0]][$material] = ''; 

                    }
                }
            }

            unset($categoriesList);

            $this->view['featuresMaterials'] = $featuresMaterials;
            $this->view['templateBrandDtata'] = $templateBrandDtata;
            $this->view['categories'] = $menuCategories;
            $this->view['selectedCategory'] = $catagoryDescription['SIOP3Description'];
            $this->view['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $this->view['footer_logo_src'] = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesINHFooter['Black']:$CatalogImagesINHFooter['Orange'];
        }
    }

    private function getSIOP() {
        $listing = new \Pimcore\Model\DataObject\ProductCategory\Listing;
        $listing->setCondition("CatalogFlag = :catFlag", ["catFlag" => 1]);
        // $listing->setLimit(10);
        $listing->load();
        $categories = array();
        foreach($listing as $category) {
            if($category->getLevel()==3) {
                $categories[$category->getFullCode()][] = array(
                    'name' => $category->getDescription(),
                    'level' => $category->getLevel(),
                    'printable' => 1
                );
                // $categories[$category->getId()] = $category->getDescription();
            } else {
                $fullCode = $category->getParent()->getFullCode();
                $cat = array(
                    'name' => $category->getDescription(),
                    'level' => $category->getLevel(),
                    'printable' => 1
                );
                if(!isset($categories[$fullCode])) {
                    $categories[$fullCode][] = array(
                        'name' => $category->getParent()->getDescription(),
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
}
