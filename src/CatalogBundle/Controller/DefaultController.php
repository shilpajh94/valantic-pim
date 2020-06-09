<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    private $tableColumns;
    private $db;

    public function __construct()
    {
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

    /**
     * @Route("/catalog")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from catalog');
    }

    /**
     * @Route("/catalog/get-available-headers")
     */
    public function getAvailableHeaders(Request $request)
    {

        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $tableColumnsConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');
        $language = $request->getLocale();
        $this->get('translator')->setLocale('en');
        if($this->tableColumns)
        {
            foreach ($this->tableColumns as $key => $value) {
                $this->tableColumns[$key] = $this->get('translator')->trans($value);
            }
        }

        $columns = array();
        if (!empty($this->tableColumns) && count($this->tableColumns) > 0) {
            foreach ($this->tableColumns as $key => $column) {
                $columns[] = array($key, $column);
            }
        }
        $arr = array('storeData' => $columns, 'completeData' => $this->tableColumns);
        // $arr = array (
        //     'storeData' => array (
        //         0 => array ('StatisticalDimension', 'Statistical Dimension'),
        //         1 => array ('ServiceDescription', 'Service Description'),
        //         2 => array ('PR','PR'),
        //         3 => array ('GSI','GSI')
        //     )
        // );
        echo json_encode($arr);
        die;
    }

    /**
     * @Route("/catalog/get-table-data")
     */
    public function getTableData(Request $request)
    {

        // $entries = new DataObject\Product\Listing();
        // $entries->setCondition("brandName LIKE ?", "%X-LIFE XR16SC%");
        // $entries->load();

        // $objectPlant = DataObject\Product::getBrandName('X-LIFE XR16SC');
        // p_r($entries);
        // die;

        $query = "SELECT `o_1`.`industryStandard` AS `PartNumber`, `o_1`.`articleNumber` AS `SAPNumber`, `hs_1`.`hoseIdNominalId` AS `hoseIdNominalId`, `hs_1`.`hoseIdMM`, `hs_1`.`hoseOdmm`, `hs_1`.`workingPressurePSI`, `hs_1`.`workingPressureMPA`, `hs_1`.`minBurstPressurePSI`, `hs_1`.`minBurstPressurempa`, `hs_1`.`BendRadiusIN`, `hs_1`.`BendRadiusMM`, `hs_1`.`grossWeight`, `hs_1`.`fittingFamily` FROM `object_brick_query_HoseBase_1` AS `hb_1` INNER JOIN `object_1` AS `o_1` ON `hb_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseFert_1` AS `hf_1` ON `hf_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseSkeleton_1` AS `hs_1` ON `hs_1`.`o_id`  = `o_1`.`oo_id` WHERE `hb_1`.`brandName` LIKE '%X-LIFE XR16SC%'";
        $objectMaterial = $this->db->fetchAll($query);

        // $query = "SELECT `o_1`.`industryStandard` AS `PartNumber`, `o_1`.`articleNumber` AS `SAPNumber`,`hb_1`.`brandName`, `hb_1`.`tubeMaterial`,`hb_1`.`Coupling`,`hb_1`.`Packaging`,`hb_1`.`coverMaterial`,`hb_1`.`hoseTemperatureRangeFAndC`,`hs_1`.`reinforcement`,`hb_1`.`safetyFactor`,`hs_1`.`hoseIdNominalId`, `hs_1`.`hoseIdMM`, `hs_1`.`hoseOdmm`, `hs_1`.`workingPressurePSI`, `hs_1`.`workingPressureMPA`, `hs_1`.`minBurstPressurePSI`, `hs_1`.`minBurstPressurempa`, `hs_1`.`BendRadiusIN`, `hs_1`.`BendRadiusMM`, `hs_1`.`grossWeight`, `hs_1`.`fittingFamily` FROM `object_brick_query_HoseBase_1` AS `hb_1` INNER JOIN `object_1` AS `o_1` ON `hb_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseFert_1` AS `hf_1` ON `hf_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseSkeleton_1` AS `hs_1` ON `hs_1`.`o_id`  = `o_1`.`oo_id` WHERE `hb_1`.`brandName` LIKE '%X-LIFE XR16SC%'";
        // $objectMaterial = $this->db->fetchAll($query);

        // foreach ($objectMaterial as $key => $value) {
        //     $entries = new DataObject\Product\Listing();
        //     $entries->setCondition("articleNumber LIKE ?", "%".$value['SAPNumber']."%");
        //     $entries->load();

        //     p_r($entries);
        //     die;
        //     // p_r($value['SAPNumber']);
        // }
        // print_r($objectMaterial);
        $fieldData = array_keys($objectMaterial[0]);
        $columnData = array();

        foreach ($fieldData as $key => $value) {
            $columnData[] = array('xtype' => 'gridcolumn', 'Text' => $value, 'header' => $value, 'dataIndex' => $value, 'flex' => 1);
        }
        // die;

        $arr = array('brandData' => [], 'columnData' => $columnData, 'fieldData' => $fieldData, 'articlesData' => $objectMaterial);
        echo json_encode($arr);
        die;
    }

    public function templateFittingPageStandardAction(Request $request)
    {
    }

    public function templateHoseLineTileTemplateAction(Request $request)
    {
        if ($this->getDocumentTag('href', 'template2')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('href', 'template2')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);
            /* if(!is_null($obj->getParentId())) {
                $catlogCatObj = \Pimcore\Model\DataObject::getById($obj->getParentId());
                $catId = $catlogCatObj->getCategory();
                $this->get6DigitDataByCategoryId($catId);
            } */
            $data = array();
            $blockDes = "";
            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    $blockDes = !empty($blockDes) ? $blockDes : $row[9];
                    $baseId = $row[0];
                    if (!isset($data[$baseId])) {
                        $data[$baseId] = array();
                    }
                    if (isset($data[$baseId])) {
                        $data[$baseId]['brandName'] = isset($data[$baseId]['brandName']) && !empty($data[$baseId]['brandName']) ? $data[$baseId]['brandName'] : $row[1];
                        $data[$baseId]['industryStandard'] = isset($data[$baseId]['industryStandard']) && !empty($data[$baseId]['industryStandard']) ? $data[$baseId]['industryStandard'] : $row[2];
                        $data[$baseId]['bst'][0] = isset($data[$baseId]['bst'][0]) && !empty($data[$baseId]['bst'][0]) ? $data[$baseId]['bst'][0] : $row[3];
                        $data[$baseId]['bst'][1] = isset($data[$baseId]['bst'][1]) && !empty($data[$baseId]['bst'][1]) ? $data[$baseId]['bst'][1] : $row[4];
                        $data[$baseId]['bst'][2] = isset($data[$baseId]['bst'][2]) && !empty($data[$baseId]['bst'][2]) ? $data[$baseId]['bst'][2] : $row[5];
                        $data[$baseId]['bst'][3] = isset($data[$baseId]['bst'][3]) && !empty($data[$baseId]['bst'][3]) ? $data[$baseId]['bst'][3] : $row[6];
                        $data[$baseId]['bst'][4] = isset($data[$baseId]['bst'][4]) && !empty($data[$baseId]['bst'][4]) ? $data[$baseId]['bst'][4] : $row[7];
                        $data[$baseId]['hoseId'][] = isset($data[$baseId]['hoseId'][$k]) && !empty($data[$baseId]['hoseId'][$k]) ? $data[$baseId]['hoseId'][$k] : $this->fractionToDecimal($row[8]);

                        if(!isset($data[$baseId]['featureIcon'])) {
                            $baseObj = \Pimcore\Model\DataObject\Product::getById($row[0]);
                            $features = $baseObj->getFeaturesBenefitsBulletPoint();
                            $featureObj = null;
                            
                            if(is_array($features) && !empty($features)) {
                                foreach($features as $featureId) {
                                    $featureObj = \Pimcore\Model\DataObject\Features::getById($featureId);                                
                                    $data[$baseId]['featureIcon'][] = $featureObj->getIcon();
                                }
                            }
                            unset(
                                $baseObj,
                                $features,
                                $featureObj
                            );
                        }
                        
                        
                    }
                }
                /**
                 * $baseId is Base Level Object (Brand information)
                 */
                foreach ($data as $baseId => $row) {
                    if (isset($row['hoseId']) && is_array($row['hoseId']) && !empty($row['hoseId'])) {
                        $min = '';
                        $max = '';
                        $range = '';
                        $min = min($row['hoseId']);
                        $max = max($row['hoseId']);
                        $this->decimalToFraction($min);
                        $min = !empty($min) ? $this->decimalToFraction($min) . '"' : '';
                        $max = !empty($max) ? $this->decimalToFraction($max) . '"' : '';
                        if (!empty($min) && !empty($max)) {
                            $range = $min . '-' . $max;
                        }

                        $data[$baseId]['range'] = $range;
                    }
                }
                $this->view['info'] = array(
                    'brandsInfo' => $data,
                    'blockDes' => $blockDes
                );
            }
        }
    }

    private function fractionToDecimal($fraction)
    {
        // Split fraction into whole number and fraction components
        preg_match('/^(?P<whole>\d+)?\s?((?P<numerator>\d+)\/(?P<denominator>\d+))?$/', $fraction, $components);

        // Extract whole number, numerator, and denominator components
        $whole = $components['whole'] ?: 0;
        $numerator = $components['numerator'] ?: 0;
        $denominator = $components['denominator'] ?: 0;

        // Create decimal value
        $decimal = $whole;
        $numerator && $denominator && $decimal += ($numerator / $denominator);

        return $decimal;
    }

    /**
     * Convert decimal value to fractional
     * Install GMP extention on server and enable it in php.in
     * Command:
     *  sudo apt-get install libgmp-dev php7.2-gmp curl php7.2-curl
     *  extension=gmp.so
     *  sudo service apache2 reload
    */
    private function decimalToFraction($decimal)
    {
        // Determine decimal precision and extrapolate multiplier required to convert to integer
        $precision = strpos(strrev($decimal), '.') ?: 0;
        $multiplier = pow(10, $precision);

        // Calculate initial numerator and denominator
        $numerator = $decimal * $multiplier;
        $denominator = 1 * $multiplier;

        // Extract whole number from numerator
        $whole = floor($numerator / $denominator);
        $numerator = $numerator % $denominator;

        // Find greatest common divisor between numerator and denominator and reduce accordingly
        $factor = gmp_intval(gmp_gcd($numerator, $denominator));
        $numerator /= $factor;
        $denominator /= $factor;

        // Create fraction value
        $fraction = [];
        $whole && $fraction[] = $whole;
        $numerator && $fraction[] = "{$numerator}/{$denominator}";

        return implode(' ', $fraction);
    }

    private function getProductByCategoryId($catId)
    {
        $sql = "SELECT f.o_id fertId, s.o_id skeletonId, b.o_id brandDataId, SUBSTR(f.oldMaterialCode, 1, 6) brandLvl, f.siopFullCode, brand.name, skeleBrick.hoseIdNominalId hoseId 
        FROM object_1 f 
        JOIN object_1 s ON (s.o_id = f.o_parentId) 
        JOIN object_1 b ON (b.o_id = s.o_parentId) 
        JOIN object_brick_query_HoseBase_1 baseBrick ON(baseBrick.o_id=b.o_id)
        JOIN object_brick_query_HoseSkeleton_1 skeleBrick ON(skeleBrick.o_id=s.o_id)
        JOIN object_query_3 brand ON(brand.oo_id=baseBrick.brandName)
        WHERE f.siopFullCode='$catId';";
        $results = $this->db->fetchAll($sql);
        return is_array($results) && !empty($results) ? $results : null;
    }

    private function get6DigitDataByCategoryId($catId)
    {
        $productsInfo = $this->getProductByCategoryId($catId);
        if (!empty($productsInfo)) {
            foreach ($productsInfo as $product) {
            }
        }
    }

    public function templateHoseProductPageAction(Request $request)
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');

        $INHTemplate = $this->getDocumentTag('relation', 'inh_template_hose_product_page')->getElement();
        
        if($INHTemplate)
        {
            $productsData = $INHTemplate->getProductsData();
            $columnsData = $INHTemplate->getColumns();
            $iconRequired = 'YES';
            $columnsData = json_decode($columnsData);
            $columnsDataWithImages = array();

            $language = $request->getLocale();
            $this->get('translator')->setLocale($language);

            foreach ($columnsData as $key => $value) {
                $columnsDataWithImages[$key]['columnName'] = $value->columnName;
                // $columnsDataWithImages[$key]['columnLabel'] = $value->columnName;
                $columnsDataWithImages[$key]['columnIcon'] = $attributeImages[$value->columnName];
            }
            
            $headerData = $productsData[0];
            array_shift($productsData);

            $featuresList = $this->getFeaturesList('IFS');

            $brandsData = array();

            foreach ($productsData as $key => $item) {
                $productsDataWithHeaders = array_combine($headerData, $item);
                $brandsData[$productsDataWithHeaders['brandName']][] = $productsDataWithHeaders;
            }

            foreach ($brandsData as $brandKey => $brandArray) {

                $brandName = $brandArray[0]['brandName'];
                $longDescription = $brandArray[0]['longDescription'];
                $brandingLayline = $brandArray[0]['brandingLayline'];
                $tempFmin = $brandArray[0]['temFmin'];
                $tempFmax = $brandArray[0]['temFmax'];
                $tempCmin = $brandArray[0]['temCmin'];
                $tempCmax = $brandArray[0]['temCmax'];
                $maxWorkingPressurePSI = $brandArray[0]['maxWorkingPressurePSI'];
                $maxWorkingMPA = $brandArray[0]['maxWorkingMPA'];

                $digit6code = array();
                $tubeMaterial = array();
                $tubeAttribute = array();
                $reinforcement = array();
                $coverMaterial = array();
                $coverAttribute = array();
                $safetyFeatures = array();
                $articlesData = array();

                foreach($brandArray as $key => $element): 
                        foreach($element as $bkey => $value): 
                                if($bkey == 'digit6code')
                                    $digit6code[] = $value; 
                                if($bkey == 'tubeMaterial')
                                        $tubeMaterial[] = $value; 
                                if($bkey == 'tubeAttribute')
                                        $tubeAttribute[] = $value; 
                                if($bkey == 'reinforcement')
                                        $reinforcement[] = $value; 
                                if($bkey == 'coverMaterial')
                                        $coverMaterial[] = $value; 
                                if($bkey == 'coverAttribute')
                                        $coverAttribute[] = $value; 
                                if($bkey == 'features')
                                {
                                    $features = explode(',', $value);
                                    if(count($features)>0)
                                    {
                                        foreach ($features as $fkey => $fvalue) {
                                            array_push($safetyFeatures,$fvalue);
                                        }
                                    }
                                }

                        endforeach; 

                        foreach ($columnsDataWithImages as $ckey => $cvalue) {
                            $articlesData[$key][$ckey] = $element[$ckey];
                        }

                endforeach; 

                $digit6code = array_unique($digit6code);
                $tubeMaterial = array_unique($tubeMaterial);
                $tubeAttribute = array_unique($tubeAttribute);
                $reinforcement = array_unique($reinforcement);
                $coverMaterial = array_unique($coverMaterial);
                $coverAttribute = array_unique($coverAttribute);

                $safetyFeatures = array_unique($safetyFeatures);

                $safetyFeaturesList = array();

                
                if($safetyFeatures)
                {
                    foreach ($safetyFeatures as $fkey => $fvalue) {
                        $safetyFeaturesList[] = array('name'=>$featuresList[$fvalue]['name'], 'iconSrc' => $featuresList[$fvalue]['icon']);
                    }
                }

                $tubeMaterialAtrributeArr = array_merge($tubeMaterial, $tubeAttribute);
                $coverMaterialattributeArr = array_merge($coverMaterial, $coverAttribute);

                $tubeMaterialAtrributeString = implode(', ', $tubeMaterialAtrributeArr);
                $coverMaterialattributeString = implode(', ', $coverMaterialattributeArr);
                $digit6code = implode(', ', $digit6code);

                $reinforcement = implode(', ', $reinforcement);
                $data[$brandKey]['brandName'] = $brandName;
                $data[$brandKey]['digit6code'] = $digit6code;
                
                if($brandName == 'SCP3')
                    $data[$brandKey]['brandImageSrc'] = '/CatalogImages/scp3.png';
                else 
                    $data[$brandKey]['brandImageSrc'] = '/CatalogImages/5.JPG';

                $data[$brandKey]['longDescription'] = $longDescription;
                $data[$brandKey]['brandingLayline'] = $brandingLayline;
                $data[$brandKey]['tempFmin'] = $tempFmin;
                $data[$brandKey]['tempFmax'] = $tempFmax;
                $data[$brandKey]['tempCmin'] = $tempCmin;
                $data[$brandKey]['tempCmax'] = $tempCmax;
                $data[$brandKey]['maxWorkingPressurePSI'] = $maxWorkingPressurePSI;
                $data[$brandKey]['maxWorkingMPA'] = $maxWorkingMPA;

                $data[$brandKey]['reinforcement'] = $reinforcement;
                $data[$brandKey]['tubeMaterialAtrributeString'] = $tubeMaterialAtrributeString;
                $data[$brandKey]['coverMaterialattributeString'] = $coverMaterialattributeString;
                $data[$brandKey]['safetyFeatures'] = $safetyFeaturesList;
                $data[$brandKey]['iconRequired'] = $iconRequired;
                $data[$brandKey]['columnsDataWithImages'] = $columnsDataWithImages;
                $data[$brandKey]['articlesData'] = $articlesData;

            }
            
            $this->view['data'] = $data;
        }
    }

    public function templateHoseAccessoriesSleevingAction(Request $request)
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');

        $INHTemplate = $this->getDocumentTag('relation', 'inh_template_hose_product_page')->getElement();
        
        if($INHTemplate)
        {
            $productsData = $INHTemplate->getProductsData();
            $columnsData = $INHTemplate->getColumns();
            $iconRequired = 'NO';
            $columnsData = json_decode($columnsData);
            $columnsDataWithImages = array();

            $language = $request->getLocale();
            $this->get('translator')->setLocale($language);

            if($columnsData)
            {
                foreach ($columnsData as $key => $value) {
                    $columnsDataWithImages[$key]['columnName'] = $value->columnName;
                    // $columnsDataWithImages[$key]['columnLabel'] = $value->columnName;
                    $columnsDataWithImages[$key]['columnIcon'] = $attributeImages[$value->columnName];
                }
            }
            
            $headerData = $productsData[0];
            array_shift($productsData);

            $featuresList = $this->getFeaturesList('IFS');

            $brandsData = array();

            foreach ($productsData as $key => $item) {
                $productsDataWithHeaders = array_combine($headerData, $item);
                $brandsData[$productsDataWithHeaders['brandName']][] = $productsDataWithHeaders;
            }

            foreach ($brandsData as $brandKey => $brandArray) {

                $brandName = $brandArray[0]['brandName'];
                $longDescription = $brandArray[0]['longDescription'];
                $tempFmin = $brandArray[0]['AssessoriesMinimumTemperatureF'];
                $tempFmax = $brandArray[0]['AssessoriesMaximumTemperatureF'];
                $tempCmin = $brandArray[0]['AssessoriesMinimumTemperatureC'];
                $tempCmax = $brandArray[0]['AssessoriesMaximumTemperatureC'];

                $color = array();
                $material = array();
                $availableLength = array();
                $safetyFeatures = array();
                $articlesData = array();

                foreach($brandArray as $key => $element): 
                        foreach($element as $bkey => $value): 
                                if($bkey == 'color')
                                        $color[] = $value; 
                                if($bkey == 'MaterialType')
                                        $material[] = $value; 
                                if($bkey == 'availableLength')
                                        $availableLength[] = $value; 
                                        
                                if($bkey == 'features')
                                {
                                    $features = explode(',', $value);
                                    if(count($features)>0)
                                    {
                                        foreach ($features as $fkey => $fvalue) {
                                            array_push($safetyFeatures,$fvalue);
                                        }
                                    }
                                }

                        endforeach; 

                        foreach ($columnsDataWithImages as $ckey => $cvalue) {
                            $articlesData[$key][$ckey] = $element[$ckey];
                        }

                endforeach; 

                $color = array_unique($color);
                $material = array_unique($material);
                $availableLength = array_unique($availableLength);

                $safetyFeatures = array_unique($safetyFeatures);
                $safetyFeaturesList = array();

                
                if($safetyFeatures)
                {
                    foreach ($safetyFeatures as $fkey => $fvalue) {
                        $safetyFeaturesList[] = array('name'=>$featuresList[$fvalue]['name'], 'iconSrc' => $featuresList[$fvalue]['icon']);
                    }
                }

                $colorString = implode(', ', $color);
                $materialString = implode(', ', $material);
                $availableLengthString = implode(', ', $availableLength);

                $data[$brandKey]['brandName'] = $brandName;
                
                if($brandName == 'Protective Sleeving')
                    $data[$brandKey]['brandImageSrc'] = '/CatalogImages/122.JPG';
                else 
                    $data[$brandKey]['brandImageSrc'] = '/CatalogImages/122-1.JPG';

                $data[$brandKey]['longDescription'] = $longDescription;
                $data[$brandKey]['tempFmin'] = $tempFmin;
                $data[$brandKey]['tempFmax'] = $tempFmax;
                $data[$brandKey]['tempCmin'] = $tempCmin;
                $data[$brandKey]['tempCmax'] = $tempCmax;

                $data[$brandKey]['materialString'] = $materialString;
                $data[$brandKey]['availableLengthString'] = $availableLengthString;
                $data[$brandKey]['colorString'] = $colorString;
                $data[$brandKey]['safetyFeatures'] = $safetyFeaturesList;
                $data[$brandKey]['iconRequired'] = $iconRequired;
                $data[$brandKey]['columnsDataWithImages'] = $columnsDataWithImages;
                $data[$brandKey]['articlesData'] = $articlesData;

            }
            $this->view['data'] = $data;
        }
    }

    public function templateHoseAccessoriesClampsAction(Request $request)
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');

        $INHTemplate = $this->getDocumentTag('relation', 'inh_template_hose_product_page')->getElement();
        
        if($INHTemplate)
        {
            $productsData = $INHTemplate->getProductsData();
            $columnsData = $INHTemplate->getColumns();
            $iconRequired = 'NO';
            $columnsData = json_decode($columnsData);
            $columnsDataWithImages = array();

            $language = $request->getLocale();
            $this->get('translator')->setLocale($language);

            if($columnsData)
            {
                foreach ($columnsData as $key => $value) {
                    $columnsDataWithImages[$key]['columnName'] = $value->columnName;
                    // $columnsDataWithImages[$key]['columnLabel'] = $value->columnName;
                    $columnsDataWithImages[$key]['columnIcon'] = $attributeImages[$value->columnName];
                }
            }
            
            $headerData = $productsData[0];
            array_shift($productsData);

            $brandsData = array();

            foreach ($productsData as $key => $item) {
                $productsDataWithHeaders = array_combine($headerData, $item);
                $brandsData[$productsDataWithHeaders['brandName']][] = $productsDataWithHeaders;
            }

            foreach ($brandsData as $brandKey => $brandArray) {

                $brandName = $brandArray[0]['brandName'];
                $longDescription = $brandArray[0]['longDescription'];
                
                $material = array();
                $articlesData = array();

                foreach($brandArray as $key => $element): 
                        foreach($element as $bkey => $value): 
                                
                                if($bkey == 'MaterialType')
                                        $material[] = $value; 

                        endforeach; 

                        foreach ($columnsDataWithImages as $ckey => $cvalue) {
                            $articlesData[$key][$ckey] = $element[$ckey];
                        }

                endforeach; 

                $material = array_unique($material);

                $materialString = implode(', ', $material);
                $data[$brandKey]['brandName'] = $brandName;
                $data[$brandKey]['brandImageSrc'] = '/CatalogImages/123.png';
                $data[$brandKey]['longDescription'] = $longDescription;
                $data[$brandKey]['materialString'] = $materialString;
                $data[$brandKey]['iconRequired'] = $iconRequired;
                $data[$brandKey]['columnsDataWithImages'] = $columnsDataWithImages;
                $data[$brandKey]['articlesData'] = $articlesData;

            }
            $this->view['data'] = $data;
        }
    }

    public function containerAction(Request $request)
    {
        $allChildren = $this->document->getAllChildren();
        $this->view->allChildren = $allChildren;
    }

    public function headerTemplateHoseProductPageAction(Request $request)
    {
        $this->view['title'] = $request->get('title');
    }

    public function footerTemplateHoseProductPageAction(Request $request)
    {
        $this->view['title'] = $request->get('title');
        $this->view['subTitle'] = $request->get('subTitle');
        $this->view['thirdSection'] = $request->get('thirdSection');
    }

    /**
     * return material object or false
     */
    public function getFeaturesList($catalog_type){
        $entries = new DataObject\Features\Listing();
        $entries->setCondition("FeatureType = ?", "{$catalog_type}");
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            
            if($entry->getIcon())
                $featureData[$entry->getKey()]['icon'] = $entry->getIcon()->getPath().$entry->getIcon()->getFilename();
            
            $featureData[$entry->getKey()]['name'] = $entry->getName();
            $featureData[$entry->getKey()]['key'] = $entry->getKey();
            $featureData[$entry->getKey()]['key'] = $entry->getId();
        }
        return $featureData;
    }
}
