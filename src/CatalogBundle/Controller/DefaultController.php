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
                $columns[] = array($key, $column['fieldLabel']);
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

        $this->getTableColumns();
        $dynamicColumnsData = $this->getDynamicColumns();
        $objId = $request->get('objId');
        $tableObj = DataObject\CatalogTables::getById($objId);
        $tableData = $tableObj->getColumns();
        $template = $tableObj->getTemplate();
        $tableColumns = json_decode($tableData,1);
       
        $columns = array_keys($tableColumns);
       
      $parentObj = $tableObj->getParentId();
      $catalogCategory = DataObject\CatalogCategory::getById($parentObj);
      $siopCategory = $catalogCategory->getCategory();
         
      $productList = new DataObject\Product\Listing();
      $x = array();
      for($i = 0; $i< count($siopCategory); $i++)
      {
          $y = ','.$siopCategory[$i].','; 
          array_push($x,$y);
      }
      $productList->addConditionParam('SIOPLevel4 IN (?)',[$x], 'AND');
      $productList->addConditionParam('ProductType = "fert"', 'AND');
      $productList->setCondition('printedCatalogFlag = 1');
      
      
      //$productData = $productList->load();
      
     // $classFields = array_keys($productData[0]->getClass()->getFieldDefinitions());
      foreach($siopCategory as $cat)
      {
      $siopData = DataObject\ProductCategory::getById($cat);
      $allowedBricks = $siopData->getRelatedObjectBrick();
      
      $brickMappingService = \Pimcore::getContainer()->get('AppBundle\Services\CategoryBrickMappingService');
      
      $bricksList['fert'] = $brickMappingService->getMappedBrickKeys($allowedBricks, 'fert');
      $bricksList['skeleton'] = $brickMappingService->getMappedBrickKeys($allowedBricks, 'skeleton');
      $bricksList['base'] = $brickMappingService->getMappedBrickKeys($allowedBricks, 'base');
      }
      $brickFields = [];
     /* foreach($bricksList as $brick)
      {
      $brickDefinition = DataObject\Objectbrick\Definition::getByKey($brick)->getFieldDefinitions();
      $brickFields[$brick] = array_keys($brickDefinition);
      }*/
     
      $pData = [];
     $headers = [];
    
      foreach($productList as $item)
      {
         
      foreach($columns as $fieldName)
      {
        if(in_array($fieldName,array_keys($this->tableColumns)))
        {
           $headers[$fieldName] = $this->tableColumns[$fieldName]['fieldLabel'];
          if($this->tableColumns[$fieldName]['fieldLevel'] == 'class')
          {
              $getter = 'get'.ucfirst($fieldName);
              $pData[$item->getId()][$fieldName] = $item->$getter();
          }
          else if($this->tableColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($this->tableColumns[$fieldName]['parent']['name'], $bricksList['fert']))
          {
               $brickGetter = 'get'.ucfirst($this->tableColumns[$fieldName]['parent']['name']);
               $getter = 'get'.ucfirst($fieldName);
              
              $pData[$item->getId()][$fieldName] = $item->getFert()->$brickGetter()->$getter();
          }
           else if($this->tableColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($this->tableColumns[$fieldName]['parent']['name'], $bricksList['skeleton']))
          {
               $brickGetter = 'get'.ucfirst($this->tableColumns[$fieldName]['parent']['name']);
               $getter = 'get'.ucfirst($fieldName);
              
              $pData[$item->getId()][$fieldName] = $item->getSkeleton()->$brickGetter()->$getter();
          }
         else if($this->tableColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($this->tableColumns[$fieldName]['parent']['name'], $bricksList['base']))
          {
               $brickGetter = 'get'.ucfirst($this->tableColumns[$fieldName]['parent']['name']);
               $getter = 'get'.ucfirst($fieldName);
              
              $pData[$item->getId()][$fieldName] = $item->getBase()->$brickGetter()->$getter();
          }
          
          }
      }
     
       foreach($dynamicColumnsData[$template] as $dFieldKey => $dFieldName)
        {
         
           $headers[$dFieldKey] = $dFieldName['fieldLabel'];
           if($dFieldName['fieldLevel'] == 'class' && $dFieldName['fieldType'] != 'relation' && $dFieldName['fieldType'] != 'Media')
          {
              
              $getter = 'get'.ucfirst($dFieldKey);
              $pData[$item->getId()][$dFieldKey] = $item->$getter();
          }
          else if($dFieldName['fieldLevel'] == 'class' && $dFieldName['fieldType'] == 'Media')
          {
             
              $getter = 'get'.ucfirst($dFieldKey);
              $pData[$item->getId()][$dFieldKey] = $item->$getter()->getPath().$item->$getter()->getFileName();
          }
          /*else if($dFieldName['fieldLevel'] == 'class' && $dFieldName['fieldType'] == 'relation')
          {
              $dataValues = [];
              $getter = 'get'.ucfirst($dFieldKey);
              $value = $item->$getter();
              $class = 'DataObject\\'.$dFieldName['parent']['class']['name'].'\\Listing()';
              $classObj = new $class();
              $classObj->setCondition('o_id IN ?',[$value]);
              $fieldGetter = 'get'.$dFieldName['parent']['class']['fieldname'];
              foreach($classObj as $obj)
              {
                  array_push($dataValues,$obj->$fieldGetter());
              }
              $pData[$item->getId()][$dFieldKey] = $dataValues;
          }*/
           
          else if($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['fert']) && $dFieldName['fieldType'] != 'relation')
          {
               $brickGetter = 'get'.ucfirst($dFieldName['parent']['name']);
               $getter = 'get'.ucfirst($dFieldKey);
              $pData[$item->getId()][$dFieldKey] = $item->getFert()->$brickGetter()->$getter();
          }
           else if($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['skeleton']) && $dFieldName['fieldType'] != 'relation')
          {
               $brickGetter = 'get'.ucfirst($dFieldName['parent']['name']);
               $getter = 'get'.ucfirst($dFieldKey);
              $pData[$item->getId()][$dFieldKey] = $item->getSkeleton()->$brickGetter()->$getter();
          }
           else if($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['base']) && $dFieldName['fieldType'] != 'relation')
          {
               $brickGetter = 'get'.ucfirst($dFieldName['parent']['name']);
               $getter = 'get'.ucfirst($dFieldKey);
              $pData[$item->getId()][$dFieldKey] = $item->getBase()->$brickGetter()->$getter();
          }
        }
        
       
      }
    
        $columnData = array();

            foreach ($headers as $key => $value) {
                $columnData[] = array('xtype'=>'gridcolumn','name'=>$value, 'Text'=>$value,'header'=>$value, 'dataIndex'=> $value, 'flex' => 1);            
            }
        
            
            $articleData = [];
            $i = 0;
           
            foreach($pData as $id=> $value)
            {
                $array = [];
                foreach($value as $key=>$data)
                {
               array_push($array,$data);
                
            }
            array_push($articleData,$array);
            }
      
        $arr= array('brandData' => [], 'columnData'=>$columnData,'fieldData'=>$headers,'articlesData'=>$pData,'data'=>$articleData, 'headerData'=>json_encode($headers));
        echo json_encode($arr); die;
    }
    
    /**
     * @Route("/catalog/get-initial-data")
     */
    
    public function getInitialData(Request $request)
    {
        
        $objId = $request->get('objId');
        $data = DataObject\CatalogTables::getById($objId);
        $tableData = $data->getProductsData();
        $fieldData = json_decode($data->getHeaderData(),1);
        
        
            $columnData = array();

            foreach ($fieldData as $key => $value) {
                $columnData[] = array('xtype'=>'gridcolumn','name'=>$value, 'Text'=>$value,'header'=>$value, 'dataIndex'=> $value, 'flex' => 1);            
            }
      
        
        $arr= array('brandData' => [], 'columnData'=>$columnData,'fieldData'=>$fieldData,'data'=>$tableData);
        echo json_encode($arr); die;
        

    }
    
    public function getTableColumns()
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $tableColumnsConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');
    }
    
     public function getDynamicColumns()
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $tableColumnsConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableDynamicColumnConfig();
        return $commonHelper->getParameter($tableColumnsConfig, 'headers');
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

                $baseLevelID = $brandArray[0]['baseLevelID'];

                if($baseLevelID)
                {
                    $obj = \Pimcore\Model\DataObject\Product::getById($baseLevelID);
                    $imageObj = ($obj) ? $obj->getMainImage() : '';
                }

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
                $data[$brandKey]['imageObj'] = $imageObj;
                
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

                $baseLevelID = $brandArray[0]['baseLevelID'];
                
                if($baseLevelID)
                {
                    $obj = \Pimcore\Model\DataObject\Product::getById($baseLevelID);
                    $imageObj = ($obj) ? $obj->getMainImage() : '';
                }
                
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
                $data[$brandKey]['imageObj'] = $imageObj;
                
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
                $baseLevelID = $brandArray[0]['baseLevelID'];

                if($baseLevelID)
                {
                    $obj = \Pimcore\Model\DataObject\Product::getById($baseLevelID);
                    $imageObj = ($obj) ? $obj->getMainImage() : '';
                }

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
                $data[$brandKey]['imageObj'] = $imageObj;
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
