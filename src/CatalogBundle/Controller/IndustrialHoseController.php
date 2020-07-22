<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndustrialHoseController extends FrontendController
{

    private $tableColumns;
    private $db;

    public function __construct()
    {
        $this->db = Db::get();
    }

    public function inhPrintCatalogAction(Request $request)
    {
        $inhSectionPageConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getINHSectionPageConfig()['parameters'];
        $attrImages = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];
        $dispColumns = array();
        if ($this->getDocumentTag('relation', 'inh-printcatalog')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'inh-printcatalog')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);
            $data = array();
            $headers = (array) json_decode($obj->getHeaderData());
            $headerKeys = array_keys($headers);
            $columns = (array) json_decode($obj->getColumns());
            // p_r($columns);p_r($inhSectionPageConfig);die;
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
                [],
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
                foreach ($productsData as $k => $row) {
                    if(empty($row['FittingTableName'])) {
                        continue;
                    }
                    $fittingTableName = $row['FittingTableName'];
                    $productPageColumns = $inhSectionPageConfig[$fittingTableName];
                    // p_r($productPageColumns);die;
                    /* $obj = \Pimcore\Model\DataObject\Product::getById($row['id']);
                    $obj->setBrandName($brands[$i]);
                    $obj->setFittingTableName('AIR & MULTIPURPOSE');
                    $obj->setFeaturesBenefitsBulletPoint($featuresArr[$i]);
                    $obj->save();
                    $i++; */
                    if (isset($row['brandName']) && !empty($row['brandName'])) {
                        $uniqueId = $fittingTableName;
                        $brandName = $row['brandName'][0];
                        if (!isset($data[$uniqueId])) {
                            $data[$uniqueId][$brandName] = array();
                            $data[$uniqueId]['columns'] = $productPageColumns['columns'];
                            $data[$uniqueId]['dispColumns'] = $productPageColumns['dispColumns'];                                                      
                        }
                        $data[$uniqueId]['data'][$brandName] = array();
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
                        foreach($productPageColumns['columns'] as $col) {
                            if(isset($row[$col])) {
                                if(!isset($data[$uniqueId]['data'][$brandName][$col]) || empty($data[$uniqueId]['data'][$brandName][$col]))
                                $data[$uniqueId]['data'][$brandName][$col] = $row[$col];
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
                'defaultPageImage' => \Pimcore\Model\Asset::getByPath('/CatalogImages/INH/airandmultipurpose.png')
            );
        }
    }

    public function inhPrintCatalogProductPageAction(Request $request) {
        $inhSectionPageConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getINHProductPageConfig()['parameters'];        
        $dispColumns = array();
        if ($this->getDocumentTag('relation', 'inh-printcatalog')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'inh-printcatalog')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);
            $data = array();
            $headers = (array) json_decode($obj->getHeaderData());
            $headerKeys = array_keys($headers);
            $columns = (array) json_decode($obj->getColumns());
            // p_r($columns);die;
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
                [],
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
                [],
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
                    $fittingTableName = "Air & Multipurpose - General Purpose";//$row['FittingTableName'];
                    $productPageColumns = $inhSectionPageConfig[$fittingTableName];
                    $orderCode = "";
                    if(isset($row['oldMaterialCode']) && !empty($row['oldMaterialCode'])) {
                        $orderCode = substr($row['oldMaterialCode'],0,6);
                    }
                    // p_r($productPageColumns);die;
                    /* $obj = \Pimcore\Model\DataObject\Product::getById($row['id']);
                    // $obj->setBrandName($brands[$i]);
                    // $obj->setFittingTableName('AIR & MULTIPURPOSE');
                    // $obj->setFeaturesBenefitsBulletPoint($featuresArr[$i]);
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
                    $obj->setApplication("A premium-quality, multipurpose industrial hose with
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
                        foreach($productPageColumns['columns'] as $col) {
                            if(array_key_exists($col, $row)) {
                                $r[$col] = $row[$col];
                            }                            
                        }

//                         "VirtualCatalogHoseTemperatureRangeFAndC" => ""
//   "VirtualCatalogBrandingLayline" => ""
//   "Application" => ""
//   "VirtualCatalogPackaging" => null
//   "VirtualCatalogCoverMaterial" => ""
//   "VirtualCatalogTubeMaterial" => ""
//   "VirtualCatalogCoupling" => null
//   "VirtualCatalogReinforcement" => null
                        if(!empty($orderCode)) {
                            $data[$uniqueId]['data'][$brandName]['info']['orderCode'][] = $orderCode;
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
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['Application']) && empty($data[$uniqueId]['data'][$brandName]['info']['Application'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['Application'] = $row['Application'];
                        }
                        if(!isset($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogPackaging']) && empty($data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogPackaging'])) {
                            $data[$uniqueId]['data'][$brandName]['info']['VirtualCatalogPackaging'] = $row['VirtualCatalogPackaging'];
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
            // p_r($data);die;
            $categories = $this->getSIOP();
            // p_r($categories);die;
            $this->view['info'] = array(
                'data' => $data,
                'dispColumns' => $productPageColumns['columns'],
                'dataTableColumn' => $columns,
                'categories' => $categories,
                'defaultPageImage' => \Pimcore\Model\Asset::getByPath('/CatalogImages/INH/airandmultipurpose.png')
            );
        }
    }

    private function getSIOP() {
        $listing = new \Pimcore\Model\DataObject\ProductCategory\Listing;
        $listing->setCondition("CatalogFlag = :catFlag", ["catFlag" => 1]);
        $listing->setLimit(10);
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
}
