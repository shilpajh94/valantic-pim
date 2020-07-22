<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController {

    private $tableColumns;
    private $db;

    public function __construct() {
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

    /**
     * @Route("/catalog")
     */
    public function indexAction(Request $request) {
        return new Response('Hello world from catalog');
    }

    /**
     * @Route("/catalog/get-category")
     */
    public function getCategory(Request $request) {
        $parentCat = $request->get('catId');
        $catalogObj = DataObject\Catalog::getById($parentCat);
        $category = $catalogObj->getCatalogType();

        $categoryList = new DataObject\ProductCategory\Listing();
        $categoryList->addConditionParam("fullCode LIKE ?", ["" . $category . "%"], 'AND');
        if ($category == '041500') {
            $categoryList->setCondition("Level = ?", [4]);
        }
        if ($category == '041000') {
            $categoryList->setCondition("Level = ?", [3]);
        }
        if ($category == '043000') {
            $categoryList->setCondition("Level = ?", [4]);
        }

        $categoryList->setOrderKey('description');
        $categoryList->setOrder("ASC");

        $optionData = [];

        $categoryList = $categoryList->load();
        $i = 0;



        foreach ($categoryList as $cat) {
            $optionData[$i]['text'] = $cat->getDescription('en') . '-' . $cat->getFullcode();
            $optionData[$i]['id'] = $cat->getId();

            $i++;
        }


        $res['data'] = $optionData;

        echo json_encode(['data' => $res['data']]);
        die;
    }

    /**
     * @Route("/catalog/get-tables")
     */
    public function getTablesAction(Request $request) {
        $parentCat = $request->get('catId');
        $parentObj = DataObject\CatalogCategory::getById($parentCat);
        $parent = $parentObj->getParentId();

        $categoryObj = DataObject\Catalog::getById($parent);
        $category = $categoryObj->getCatalogType();

        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $tableConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableConfig();
        $tables = $commonHelper->getParameter($tableConfig, 'tablemapping');
        $options = [];
        foreach ($tables[$category] as $key => $value) {
            $options[] = array('key' => $key, 'value' => $value);
        }

        echo json_encode(['data' => $options]);
        die;
    }

    /**
     * @Route("/catalog/get-base-products")
     */
    public function getBaseProductsAction(Request $request) {
        $parentCat = $request->get('catId');
        $categoryObj = DataObject\CatalogCategory::getById($parentCat);
        $category = $categoryObj->getCategory();
        $productList = new DataObject\Product\Listing();
        $x = array();
        for ($i = 0; $i < count($category); $i++) {
            $y = ',' . $category[$i] . ',';
            array_push($x, $y);
            array_push($x, $category[$i]);
        }
        $productList->addConditionParam('SIOPLevel4 IN (?)', [$x], 'AND');
        $productList->setCondition('ProductType = "base"');
        $options = [];
        foreach ($productList as $item) {
            $options[] = array('text' => $item->getSapDescription('en'), 'id' => $item->getId());
        }

        echo json_encode(['data' => $options]);
        die;
    }
    /**
     * @Route("/catalog/get-siop-data")
     */
    public function getSiopDataAction(Request $request) {
        $parentCat = $request->get('catId');
        $categoryObj = DataObject\CatalogCategory::getById($parentCat);
        $catalog = DataObject\Catalog::getById($categoryObj->getParentId());
        $catalogType = $catalog->getCatalogType();
        
         $options = [];
         
        if($catalogType == '041000')
        {
            
        $category = $categoryObj->getCategory();
        $siopList = new DataObject\ProductCategory\Listing();
        $siopList->addConditionParam('Level = ?',['4'],'AND');
        $siopList->setCondition('o_parentId IN (?)',[$category]);
        
        foreach ($siopList as $cat) {
            $options[] = array('text' =>  $cat->getDescription('en') . '-' . $cat->getFullcode(), 'id' => $cat->getId());
        }
        }
       
        echo json_encode(['data' => $options, 'length' => count($options)]);
        die;
    }

    /**
     * @Route("/catalog/get-skeleton-products")
     */
    public function getSkeletonProductsAction(Request $request) {
        $baseProducts = json_decode($request->get('products'), 1);
        //  p_r($baseProducts);
        $productList = new DataObject\Product\Listing();

        $productList->addConditionParam('o_parentId IN (?)', [$baseProducts], 'AND');
        $productList->setCondition('ProductType = "skeleton"');
        //   p_r($productList); die;
        $options = [];
        foreach ($productList as $item) {
            $options[] = array('text' => $item->getSapDescription('en'), 'id' => $item->getId());
        }

        echo json_encode(['data' => $options]);
        die;
    }

    /**
     * @Route("/catalog/get-available-headers")
     */
    public function getAvailableHeaders(Request $request) {

        $objectId = $request->get('o_id');
        $table = $request->get('table');
        $template = $request->get('template');
        $obj = DataObject\CatalogTables::getById($objectId);

        if ($template == null) {
            $template = $obj->getTemplate();
        }


        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $tableColumnsConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');

        $language = $request->getLocale();
        $this->get('translator')->setLocale('en');
        /* if($this->tableColumns)
          {
          foreach ($this->tableColumns as $key => $value) {
          $this->tableColumns[$key] = $this->get('translator')->trans($value['fieldLabel']);
          }
          } */

        $columnData = json_decode($obj->getColumns(), 1);

        $columns = array();
        $store = [];
        $arr = [];

        if ($template && $table) {

            $tableColumns = $this->tableColumns[$template][$table];

            if ($tableColumns !== null) {
                if (!empty($tableColumns) && count($tableColumns) > 0) {
                    foreach ($tableColumns as $key => $column) {
                        $fieldLabel = $this->get('translator')->trans($column['fieldLabel']);
                        $columns[] = array($key, $fieldLabel);
                        //  $store[] = array($key=> $t);
                    }
                }
                /*  if(!empty($columnData))
                  {
                  foreach($columnData as $columnKey => $columnValue)
                  {
                  $store[] = array($columnValue['columnName'],$columnValue['columnLabel']);
                  }
                  }
                 */
                $arr = array('storeData' => $columns, 'completeData' => $tableColumns, 'success' => true);
            } else {
                $arr = array('storeData' => [], 'completeData' => [], 'success' => true);
            }
        } else {
            $arr = array('storeData' => [], 'completeData' => [], 'success' => false);
        }

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
    public function getTableData(Request $request) {

        $this->getTableColumns();
        $dynamicColumnsData = $this->getDynamicColumns();
        $objId = $request->get('objId');
        $tableObj = DataObject\CatalogTables::getById($objId);
        $tableData = $tableObj->getColumns();
        $template = $tableObj->getTemplate();
        $table = $tableObj->getAttributeTable();
        $brand = $tableObj->getBrand();
        $siop4 = $tableObj->getSIOPLevel4();
        $fitting = $tableObj->getFittingFamily();
        $baseProduct = $tableObj->getBaseProduct();
        $skeletonProduct = $tableObj->getSkeletonProduct();
        $skeletonIds = [];
        $tableColumns = json_decode($tableData, 1);
if($tableColumns!== null)
{
        $columns = array_keys($tableColumns);

}
else
{
    $columns = [];
}
$parentObj = $tableObj->getParentId();
        $catalogCategory = DataObject\CatalogCategory::getById($parentObj);
        $siopCategory = $catalogCategory->getCategory();

        $productList = new DataObject\Product\Listing();
        $x = array();
        for ($i = 0; $i < count($siopCategory); $i++) {
            $y = "," . $siopCategory[$i] . ",";
            array_push($x, $y);
            array_push($x, $siopCategory[$i]);
        }
        
        $catalogObj = DataObject\Catalog::getById($catalogCategory->getParentId());
        
        if($catalogObj->getCatalogType() == '041000')
        {
          $productList->addConditionParam("SIOPLevel3 IN (:category)", ["category" => $x], 'AND');  
          if($siop4 != null && count($siop) > 4)
          {
            $productList->addConditionParam("SIOPLevel4 IN (:siop4)", ["siop4" => $$siop4], 'AND');
          }
        }
        else
        {
        $productList->addConditionParam("SIOPLevel4 IN (:category)", ["category" => $x], 'AND');
        }
        $productList->addConditionParam('ProductType = :type', ['type' => 'fert'], 'AND');

        if ($brand != null && count($brand) > 0) {

            /* for($i = 0; $i< count($brand); $i++)
              {
              if($i == $count - 1)
              {
              $productList->addConditionParam('brandName = ?',$brand[$i],'AND');
              }
              else
              {
              $productList->addConditionParam('brandName = ?',$brand[$i],'OR');
              }

              } */
            $productList->addConditionParam('brandName IN (:brand)', ['brand' => $brand], 'AND');
        }
        if ($fitting != null && !empty($fitting) && $fitting != '1') {
            $productList->addConditionParam('fittingFamily LIKE :fitting', ['fitting' => '%,' . $fitting . ',%'], 'AND');
        }
        if ($baseProduct !== null && count($baseProduct) > 0) {
            $baseIds = implode(',', $baseProduct);
            $query = "select o_id from object_1 where o_parentId IN (" . $baseIds . ")";

            $skeletonIds = $this->db->fetchAll($query);
            
        }
        if ($skeletonProduct !== null && count($skeletonProduct) > 0) {
            $productList->addConditionParam('o_parentId IN (:parent)', ['parent' => $skeletonProduct], 'AND');
        } else if (count($skeletonIds) > 0 && count($baseProduct) > 0) {
            $skeletonProductId = [];
            for ($i = 0; $i < count($skeletonIds); $i++) {
                $skeletonProductId[] = $skeletonIds[$i]['o_id'];
            }
            $productList->addConditionParam('o_parentId IN (:parent)', ['parent' => $skeletonProductId], 'AND');
        }

        $productList->setCondition('printedCatalogFlag = :print', ['print' => '1']);
      
        //$productData = $productList->load();
        // $classFields = array_keys($productData[0]->getClass()->getFieldDefinitions());
        $bricksList['fert'] = [];
        $bricksList['skeleton'] = [];
        $bricksList['base'] = [];
        foreach ($siopCategory as $cat) {
            // echo $cat."\n";

            $siopData = DataObject\ProductCategory::getById($cat);

            $allowedBricks = $siopData->getRelatedObjectBrick();

            $brickMappingService = \Pimcore::getContainer()->get('AppBundle\Services\CategoryBrickMappingService');
            if ($allowedBricks !== null) {
                $fertBricks = $brickMappingService->getMappedBrickKeys($allowedBricks, 'fert');
                for ($i = 0; $i < count($fertBricks); $i++) {
                    array_push($bricksList['fert'], $fertBricks[$i]);
                }
                $skeletonBricks = $brickMappingService->getMappedBrickKeys($allowedBricks, 'skeleton');
                for ($j = 0; $j < count($skeletonBricks); $j++) {
                    array_push($bricksList['skeleton'], $skeletonBricks[$j]);
                }
                $baseBricks = $brickMappingService->getMappedBrickKeys($allowedBricks, 'base');
                for ($k = 0; $k < count($baseBricks); $k++) {
                    array_push($bricksList['base'], $baseBricks[$k]);
                }
            }
            // $bricksList['skeleton'] = $brickMappingService->getMappedBrickKeys($allowedBricks, 'skeleton');
            //$bricksList['base'] = $brickMappingService->getMappedBrickKeys($allowedBricks, 'base');
        }


        $brickFields = [];
        /* foreach($bricksList as $brick)
          {
          $brickDefinition = DataObject\Objectbrick\Definition::getByKey($brick)->getFieldDefinitions();
          $brickFields[$brick] = array_keys($brickDefinition);
          } */

        $pData = [];
        $headers = [];

        $printColumns = $this->tableColumns[$template][$table];

        foreach ($productList as $item) {

            foreach ($columns as $fieldName) {
                if (in_array($fieldName, array_keys($printColumns))) {
                    $headers[$fieldName] = $printColumns[$fieldName]['fieldLabel'];
                    if ($printColumns[$fieldName]['fieldLevel'] == 'class' && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $getter = 'get' . ucfirst($fieldName);
                        if($item->$getter() !== null && !empty($item->$getter()))
                        {
                        $pData[$item->getId()][$fieldName] = $item->$getter();
                        }
                        else
                        {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'class' && strtolower($printColumns[$fieldName]['fieldType']) == 'relation') {
                        $dataValues = [];
                        $getter = 'get' . ucfirst($fieldName);
                        $value = $item->$getter();
                        if($item->$getter() !== null)
                        {
                        $class = 'Pimcore\Model\DataObject\\' . $printColumns[$fieldName]['parent']['class']['name'] . '\\Listing';
                        $classObj = new $class();
                        $classObj->setCondition('o_id IN (?)', [$value]);
                        $fieldGetter = 'get' . $printColumns[$fieldName]['parent']['class']['fieldName'];

                        foreach ($classObj as $obj) {
                            array_push($dataValues, $obj->$fieldGetter());
                        }
                        }
                        $pData[$item->getId()][$fieldName] = $dataValues;
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['fert']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getFert() !== null) {
                            $pData[$item->getId()][$fieldName] = $item->getFert()->$brickGetter()->$getter();
                        } else {
                            $pData[$item->getId()][$fieldName] = "";
                        }
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['skeleton']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getSkeleton()->$brickGetter() != null) {
                            $pData[$item->getId()][$fieldName] = $item->getSkeleton()->$brickGetter()->$getter();
                        } else {
                            $pData[$item->getId()][$fieldName] = "";
                        }
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['base']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {

                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getBase()->$brickGetter() !== null) {
                            $pData[$item->getId()][$fieldName] = $item->getBase()->$brickGetter()->$getter();
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['fert']) && strtolower($printColumns[$fieldName]['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getFert()->$brickGetter() !== null) {
                            $value = $item->getFert()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $printColumns[$fieldName]['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('o_id IN (?)', [$value]);
                            $fieldGetter = 'get' . $printColumns[$fieldName]['parent']['class']['fieldName'];

                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                            $pData[$item->getId()][$fieldName] = $dataValues;
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['skeleton']) && strtolower($printColumns[$fieldName]['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getSkeleton()->$brickGetter() !== null) {
                            $value = $item->getSkeleton()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $printColumns[$fieldName]['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('o_id IN (?)', [$value]);
                            $fieldGetter = 'get' . $printColumns[$fieldName]['parent']['class']['fieldName'];

                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                            $pData[$item->getId()][$fieldName] = $dataValues;
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['base']) && strtolower($printColumns[$fieldName]['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getBase()->$brickGetter() !== null) {
                            $value = $item->getBase()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $printColumns[$fieldName]['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('o_id IN (?)', [$value]);
                            $fieldGetter = 'get' . $printColumns[$fieldName]['parent']['class']['fieldName'];

                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                            $pData[$item->getId()][$fieldName] = $dataValues;
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } else {
                        $pData[$item->getId()][$fieldName] = "";
                    }
                }
            }

            foreach ($dynamicColumnsData[$template] as $dFieldKey => $dFieldName) {

                $headers[$dFieldKey] = $dFieldName['fieldLabel'];
                if ($dFieldName['fieldLevel'] == 'class' && strtolower($dFieldName['fieldType']) != 'relation' && $dFieldName['fieldType'] != 'Media') {

                    $getter = 'get' . ucfirst($dFieldKey);
                    if($item->$getter() !== null && !empty($item->$getter()))
                    {
                    $pData[$item->getId()][$dFieldKey] = $item->$getter();
                    }
                    else
                    {
                     $pData[$item->getId()][$dFieldKey] = '';   
                    }
                } else if ($dFieldName['fieldLevel'] == 'class' && $dFieldName['fieldType'] == 'Media') {

                    $getter = 'get' . ucfirst($dFieldKey);
                   // p_r($item->$getter());
                    if ($item->$getter() !== null) {
                        $pData[$item->getId()][$dFieldKey] = $item->$getter()->getPath() . $item->$getter()->getFileName();
                    } else {
                        $pData[$item->getId()][$dFieldKey] = '';
                    }
                } else if ($dFieldName['fieldLevel'] == 'class' && strtolower($dFieldName['fieldType']) == 'relation') {
                    $dataValues = [];
                    $getter = 'get' . ucfirst($dFieldKey);
                    if($item->$getter() !== null)
                    {
                    $value = $item->$getter();

                    $class = 'Pimcore\Model\DataObject\\' . $dFieldName['parent']['class']['name'] . '\\Listing';
                    $classObj = new $class();
                    $classObj->setCondition('o_id IN (?)', [$value]);
                    $fieldGetter = 'get' . $dFieldName['parent']['class']['fieldName'];

                    foreach ($classObj as $obj) {
                        array_push($dataValues, $obj->$fieldGetter());
                    }
                    }
                    $pData[$item->getId()][$dFieldKey] = $dataValues;
                } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['fert']) && strtolower($dFieldName['fieldType']) != 'relation') {
                    $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                    $getter = 'get' . ucfirst($dFieldKey);
                    if ($item->getFert()->$brickGetter() !== null) {
                        $pData[$item->getId()][$dFieldKey] = $item->getFert()->$brickGetter()->$getter();
                    } else {
                        $pData[$item->getId()][$dFieldKey] = '';
                    }
                } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['skeleton']) && strtolower($dFieldName['fieldType']) != 'relation') {
                    $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                    $getter = 'get' . ucfirst($dFieldKey);
                    if ($item->getSkeleton()->$brickGetter() !== null) {
                        $pData[$item->getId()][$dFieldKey] = $item->getSkeleton()->$brickGetter()->$getter();
                    } else {
                        $pData[$item->getId()][$dFieldKey] = '';
                    }
                } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['base']) && strtolower($dFieldName['fieldType']) != 'relation') {
                    $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                    $getter = 'get' . ucfirst($dFieldKey);
                    if ($item->getBase()->$brickGetter()) {
                        $pData[$item->getId()][$dFieldKey] = $item->getBase()->$brickGetter()->$getter();
                    } else {
                        $pData[$item->getId()][$dFieldKey] = '';
                    }
                } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['fert']) && strtolower($dFieldName['fieldType']) == 'relation') {
                    $dataValues = [];
                    $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                    $getter = 'get' . ucfirst($dFieldKey);
                    if ($item->getFert()->$brickGetter() !== null) {
                        $value = $item->getFert()->$brickGetter()->$getter();

                        $class = 'Pimcore\Model\DataObject\\' . $dFieldName['parent']['class']['name'] . '\\Listing';
                        $classObj = new $class();
                        $classObj->setCondition('o_id IN (?)', [$value]);
                        $fieldGetter = 'get' . $dFieldName['parent']['class']['fieldName'];

                        foreach ($classObj as $obj) {
                            array_push($dataValues, $obj->$fieldGetter());
                        }
                        $pData[$item->getId()][$dFieldKey] = $dataValues;
                    } else {
                        $pData[$item->getId()][$dFieldKey] = '';
                    }
                } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['skeleton']) && strtolower($dFieldName['fieldType']) == 'relation') {
                    $dataValues = [];
                    $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                    $getter = 'get' . ucfirst($dFieldKey);
                    if ($item->getSkeleton()->$brickGetter() !== null) {
                        $value = $item->getSkeleton()->$brickGetter()->$getter();

                        $class = 'Pimcore\Model\DataObject\\' . $dFieldName['parent']['class']['name'] . '\\Listing';
                        $classObj = new $class();
                        $classObj->setCondition('o_id IN (?)', [$value]);
                        $fieldGetter = 'get' . $dFieldName['parent']['class']['fieldName'];

                        foreach ($classObj as $obj) {
                            array_push($dataValues, $obj->$fieldGetter());
                        }
                        $pData[$item->getId()][$dFieldKey] = $dataValues;
                    } else {
                        $pData[$item->getId()][$dFieldKey] = '';
                    }
                } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['base']) && strtolower($dFieldName['fieldType']) == 'relation') {
                    $dataValues = [];
                    $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                    $getter = 'get' . ucfirst($dFieldKey);
                    if ($item->getBase()->$brickGetter() !== null) {
                        $value = $item->getBase()->$brickGetter()->$getter();

                        $class = 'Pimcore\Model\DataObject\\' . $dFieldName['parent']['class']['name'] . '\\Listing';
                        $classObj = new $class();
                        $classObj->setCondition('o_id IN (?)', [$value]);
                        $fieldGetter = 'get' . $dFieldName['parent']['class']['fieldName'];

                        foreach ($classObj as $obj) {
                            array_push($dataValues, $obj->$fieldGetter());
                        }
                        $pData[$item->getId()][$dFieldKey] = $dataValues;
                    } else {
                        $pData[$item->getId()][$dFieldKey] = '';
                    }
                } else {
                    $pData[$item->getId()][$dFieldKey] = '';
                }
            }
        }

        $columnData = array();

        foreach ($headers as $key => $value) {
            $columnData[] = array('xtype' => 'gridcolumn', 'name' => $value, 'Text' => $value, 'header' => $value, 'dataIndex' => $value, 'flex' => 1);
        }


        $articleData = [];
        $i = 0;

        foreach ($pData as $id => $value) {
            $array = [];
            foreach ($value as $key => $data) {
                array_push($array, $data);
            }
            array_push($articleData, $array);
        }


        $arr = array('brandData' => [], 'columnData' => $columnData, 'fieldData' => $headers, 'articlesData' => $pData, 'data' => $articleData, 'headerData' => json_encode($headers));
        echo json_encode($arr);
        die;
    }

    /**
     * @Route("/catalog/get-initial-data")
     */
    public function getInitialData(Request $request) {

        $objId = $request->get('objId');
        $data = DataObject\CatalogTables::getById($objId);
        $tableData = $data->getProductsData();
        $fieldData = json_decode($data->getHeaderData(), 1);

        $columnData = array();
        if($fieldData !== null)
        {
        foreach ($fieldData as $key => $value) {
            $columnData[] = array('xtype' => 'gridcolumn', 'name' => $value, 'Text' => $value, 'header' => $value, 'dataIndex' => $value, 'flex' => 1);
        }

        }
        $arr = array('brandData' => [], 'columnData' => $columnData, 'fieldData' => $fieldData, 'data' => $tableData);
        echo json_encode($arr);
        die;
    }

    public function getTableColumns() {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $tableColumnsConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');
    }

    public function getDynamicColumns() {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $tableColumnsConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableDynamicColumnConfig();
        return $commonHelper->getParameter($tableColumnsConfig, 'headers');
    }

    public function templateFittingPageStandardAction(Request $request) {
        
    }

    public function templateHoseLineTileTemplateAction(Request $request)
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        if ($this->getDocumentTag('href', 'tiletemplate')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('href', 'tiletemplate')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);
            // p_r($obj->getProperty('headerTitle'));
            $data = array();
            $blockDes = "";
            $headers = (array)json_decode($obj->getHeaderData());
            $headerKeys = array_keys($headers);
            $productsData = array();
            $baseIdArr = array();
            $fertId = array();
            $images = array();
            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    $productsData[] = array_combine($headerKeys, $row);
                }
                foreach ($productsData as $k => $row) {
                    $oldMaterialCode = $row['oldMaterialCode'];
                    if(empty($oldMaterialCode) || $oldMaterialCode=="N/A" || strlen($oldMaterialCode)<14 || empty($row['brandName'])) {
                        continue;
                    }
                    
                    
                    $baseId = substr($oldMaterialCode, 0, 6);
                    if (!isset($data[$baseId])) {
                        $data[$baseId] = array();
                        $fertId[$baseId] = $row['id'];
                        $images[$baseId] = $row['mainImage'];
                    }
                    if (isset($data[$baseId]) && empty($data[$baseId])) {
                        $data[$baseId]['brandName'] = isset($data[$baseId]['brandName']) && !empty($data[$baseId]['brandName']) ? $data[$baseId]['brandName'] : $row['brandName'];
                        $data[$baseId]['industryStandard'] = isset($data[$baseId]['industryStandard']) && !empty($data[$baseId]['industryStandard']) ? $data[$baseId]['industryStandard'] : $row['industryStandard'];
                        $data[$baseId]['BrandShortText'][0] = isset($data[$baseId]['BrandShortText1'][0]) && !empty($data[$baseId]['BrandShortText1'][0]) ? $data[$baseId]['BrandShortText1'][0] : $row['BrandShortText1'];
                        $data[$baseId]['BrandShortText'][1] = isset($data[$baseId]['BrandShortText2'][1]) && !empty($data[$baseId]['BrandShortText2'][1]) ? $data[$baseId]['BrandShortText2'][1] : $row['BrandShortText2'];
                        $data[$baseId]['BrandShortText'][2] = isset($data[$baseId]['BrandShortText3'][2]) && !empty($data[$baseId]['BrandShortText3'][2]) ? $data[$baseId]['BrandShortText3'][2] : $row['BrandShortText3'];
                        $data[$baseId]['BrandShortText'][3] = isset($data[$baseId]['BrandShortText4'][3]) && !empty($data[$baseId]['BrandShortText4'][3]) ? $data[$baseId]['BrandShortText4'][3] : $row['BrandShortText4'];
                        $data[$baseId]['BrandShortText'][4] = isset($data[$baseId]['BrandShortText5'][4]) && !empty($data[$baseId]['BrandShortText5'][4]) ? $data[$baseId]['BrandShortText5'][4] : $row['BrandShortText5'];
                        $data[$baseId]['hoseIdNominalId'][] = isset($data[$baseId]['hoseIdNominalId'][$k]) && !empty($data[$baseId]['hoseIdNominalId'][$k]) ? $data[$baseId]['hoseIdNominalId'][$k] : $row['hoseIdNominalId'];
                        $data[$baseId]['hoseIdDec'][] = isset($data[$baseId]['hoseIdDec'][$k]) && !empty($data[$baseId]['hoseIdDec'][$k]) ? $data[$baseId]['hoseIdDec'][$k] : $row['hoseIdDec'];
                        $data[$baseId]['mainImage'] = isset($row['mainImage'])&&!empty($row['mainImage']) ? \Pimcore\Model\Asset::getByPath($row['mainImage']) : null;
                        if (!isset($data[$baseId]['featureIcon']) && !empty($row['FeaturesBenefitsBulletPoint'])) {
                            $features = $row['FeaturesBenefitsBulletPoint'];
                            $featureObj = null;

                            if (is_array($features) && !empty($features)) {
                                foreach ($features as $featureId) {
                                    $featureObj = \Pimcore\Model\DataObject\Features::getById($featureId);
                                    $data[$baseId]['featureIcon'][$featureId] = array(
                                        'icon' => $featureObj->getIcon(),
                                        'name' => $featureObj->getName()
                                    );
                                }
                            }
                            unset($baseObj,
                            $features,
                            $featureObj);
                        }
                    }
                }
                

                /**
                 * $baseId is Base Level Object (Brand information)
                 */
                $k = 1;
                foreach ($data as $baseId => $row) {
                    if (isset($row['hoseIdDec']) && is_array($row['hoseIdDec']) && !empty($row['hoseIdDec'])) {
                        $min = '';
                        $max = '';
                        $range = '';
                        $min = min($row['hoseIdDec']);
                        $max = max($row['hoseIdDec']);
                        $minKey = array_search($min, $row['hoseIdDec']);
                        $maxKey = array_search($max, $row['hoseIdDec']);
                        if (!empty($min) && !empty($max)) {
                            $range = "ID " . $row['hoseIdNominalId'][$minKey] . '"' . '-' . $row['hoseIdNominalId'][$maxKey] . '"';
                        }

                        $data[$baseId]['range'] = $range;
                        
                    }                    
                    /* if($k < 10) {
                        p_r($data);
                        $k++;
                        continue;
                    }
                    die; */
                }
                // p_r($data);
                // p_r($images);die;
                // p_r($data);die;
                
                $this->view['info'] = array(
                    'brandsInfo' => $data,
                    'blockDes' => $blockDes,
                    /* 'headerTitle' => $obj->getProperty('headerTitle'),
                    'footer' => array(
                        'footerTitle' => $obj->getProperty('footerTitle'),
                        'footerContent' => $obj->getProperty('footerContent'),
                        'footerLogo' => $obj->getProperty('footerLogo')
                    ) */
                );
            }
        }
    }


    public function templateHoseProductPageAction(Request $request) {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');

        $INHTemplate = $this->getDocumentTag('relation', 'inh_template_hose_product_page')->getElement();

        if ($INHTemplate) {
            $productsData = $INHTemplate->getProductsData();
            $headerData = \json_decode($INHTemplate->getHeaderData());
            $headerDataArr = (array)$headerData;
            
            $headerKeys = array_keys((array)$headerData);
            $columnsData = $INHTemplate->getColumns();
            $iconRequired = 'YES';
            $columnsData = json_decode($columnsData);
            $columnsDataWithImages = array();

            $language = $request->getLocale();
            $this->get('translator')->setLocale($language);

            foreach ($columnsData as $key => $value) {
                $columnsDataWithImages[$key]['columnName'] = $value->columnName;
                $columnsDataWithImages[$key]['columnLabel'] = $this->get('translator')->trans($headerDataArr[$value->columnName]);
                $columnsDataWithImages[$key]['columnIcon'] = $attributeImages[$value->columnName];
            }

            $featuresList = $this->getFeaturesList('IFS');

            $catalogGrouping = array();
            
            foreach ($productsData as $key => $item) {
                $productsDataWithHeaders = array_combine($headerKeys, $item);

                if(!empty(trim($productsDataWithHeaders['CatalogGrouping'])) && !empty(trim($productsDataWithHeaders['brandName'][0])))
                {
                    $catalogGrouping[$productsDataWithHeaders['CatalogGrouping']][$productsDataWithHeaders['brandName'][0]][] = $productsDataWithHeaders;
                }
            }


            // foreach ($productsData as $key => $item) {
            //     $productsDataWithHeaders = array_combine($headerKeys, $item);
            //     if(!empty(trim($productsDataWithHeaders['brandName'][0])))
            //     {
            //         // $ff= "Saflex® (NSFX)";
            //         // $brandNamekey = \Pimcore\Model\Element\Service::getValidKey($productsDataWithHeaders['brandName'][0], 'string');
            //         $brandsData[$productsDataWithHeaders['brandName'][0]][] = $productsDataWithHeaders;
            //     }
            // }
            foreach($catalogGrouping as $catalogKey => $brandsData)
            {

                foreach ($brandsData as $brandKey => $brandArray) {

                    $brandName = $brandArray[0]['brandName'][0];

                    $baseLevelID = $brandArray[0]['baseLevelID'];
                    // $mainImage = $brandArray[0]['mainImage'];

                    // $imageObj = '';
                    // if($mainImage)
                    // {
                    //     $imageObj = \Pimcore\Model\Asset::getByPath($mainImage);
                    // }
                    
                    $longDescription = $brandArray[0]['longDescription'];
                    $BrandingLayline = $brandArray[0]['BrandingLayline'];
                    $tempFmin = $brandArray[0]['minimumTemperatureF'];
                    $tempFmax = $brandArray[0]['maximumTemperatureF'];
                    $tempCmin = $brandArray[0]['minimumTemperatureC'];
                    $tempCmax = $brandArray[0]['maximumTemperatureC'];

                    $LeftPrintCatalogImage = $brandArray[0]['LeftPrintCatalogImage'];

                    if($LeftPrintCatalogImage)
                    {
                        $LeftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($LeftPrintCatalogImage);
                    }


                    $RightPrintCatalogImage = $brandArray[0]['RightPrintCatalogImage'];

                    if($RightPrintCatalogImage)
                    {
                        $RightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($RightPrintCatalogImage);
                    }

                    $tubeMaterial = array();
                    $tubeAttribute = array();
                    $reinforcement = array();
                    $coverMaterial = array();
                    $coverAttribute = array();
                    $safetyFeatures = array();
                    $articlesData = array();

                    foreach($brandArray as $key => $element): 
                        
                        foreach($element as $bkey => $value): 

                                if($bkey == 'tubeMaterial')
                                    $tubeMaterial = array_merge($tubeMaterial, $value);
                                if($bkey == 'tubeColor')
                                    $tubeAttribute = array_merge($tubeAttribute, $value);
                                if($bkey == 'reinforcement')
                                    $reinforcement = array_merge($reinforcement, $value);
                                if($bkey == 'coverColor')
                                    $coverAttribute = array_merge($coverAttribute, $value);
                                if($bkey == 'coverMaterial')
                                    $coverMaterial = array_merge($coverMaterial, $value);
                                if($bkey == 'FeaturesBenefitsBulletPoint')
                                {
                                    if(count($value)>0)
                                    {
                                        foreach ($value as $fkey => $feature) {
                                            array_push($safetyFeatures,$feature);
                                        }
                                    }
                                }

                        endforeach; 

                        foreach ($columnsDataWithImages as $ckey => $cvalue) {
                            if($ckey == 'fittingFamily')
                                $articlesData[$key][$ckey] = ($element[$ckey])? implode(',',($element[$ckey])): '';
                            else
                                $articlesData[$key][$ckey] = ($element[$ckey])? ($element[$ckey]): '';
                        }

                    endforeach; 

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
                    $coverMaterialattributeArr = array_merge($coverAttribute, $coverMaterial);

                    $tubeMaterialAtrributeString = implode(', ', $tubeMaterialAtrributeArr);
                    $coverMaterialattributeString = implode(', ', $coverMaterialattributeArr);

                    $reinforcement = implode(', ', $reinforcement);
                    $data[$brandKey]['brandName'] = $brandName;
                    // $data[$brandKey]['imageObj'] = $imageObj;
                    // $data[$brandKey]['mainImage'] = $mainImage;
                    $data[$brandKey]['LeftPrintCatalogImageObj'] = $LeftPrintCatalogImageObj;
                    $data[$brandKey]['RightPrintCatalogImageObj'] = $RightPrintCatalogImageObj;
                    $data[$brandKey]['longDescription'] = $longDescription;
                    $data[$brandKey]['BrandingLayline'] = $BrandingLayline;
                    $data[$brandKey]['tempFmin'] = $tempFmin;
                    $data[$brandKey]['tempFmax'] = $tempFmax;
                    $data[$brandKey]['tempCmin'] = $tempCmin;
                    $data[$brandKey]['tempCmax'] = $tempCmax;
                    $data[$brandKey]['reinforcement'] = $reinforcement;
                    $data[$brandKey]['tubeMaterialAtrributeString'] = $tubeMaterialAtrributeString;
                    $data[$brandKey]['coverMaterialattributeString'] = $coverMaterialattributeString;
                    $data[$brandKey]['safetyFeatures'] = $safetyFeaturesList;
                    $data[$brandKey]['iconRequired'] = $iconRequired;
                    $data[$brandKey]['columnsDataWithImages'] = $columnsDataWithImages;
                    $data[$brandKey]['articlesData'] = $articlesData;

                }
                $catalogGroupData[$catalogKey] = $data;
            }
            // p_r($catalogGroupData);
            // die;
            $this->view['data'] = $catalogGroupData;
        }
    }

    public function templateHoseAccessoriesSleevingAction(Request $request)
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');

        $template = $this->getDocumentTag('relation', 'template_hose_accessories_sleeving')->getElement();
        
        if($template)
        {
            $productsData = $template->getProductsData();
            $headerData = \json_decode($template->getHeaderData());
            $headerDataArr = (array)$headerData;
            $headerKeys = array_keys((array)$headerData);
            $columnsData = $template->getColumns();
            $iconRequired = 'NO';
            $columnsData = json_decode($columnsData);
            $columnsDataWithImages = array();

            $language = $request->getLocale();
            $this->get('translator')->setLocale($language);

            if($columnsData)
            {
                foreach ($columnsData as $key => $value) {
                    $columnsDataWithImages[$key]['columnName'] = $value->columnName;
                    $columnsDataWithImages[$key]['columnLabel'] = $this->get('translator')->trans($headerDataArr[$value->columnName]);
                    $columnsDataWithImages[$key]['columnIcon'] = $attributeImages[$value->columnName];
                }
            }
            
            $brandsData = array();

            foreach ($productsData as $key => $item) {
                $productsDataWithHeaders = array_combine($headerKeys, $item);

                if(!empty(trim($productsDataWithHeaders['brandName'][0])))
                    $brandsData[$productsDataWithHeaders['brandName'][0]][] = $productsDataWithHeaders;
            }

            foreach ($brandsData as $brandKey => $brandArray) {

                $brandName = $brandArray[0]['brandName'][0];

                $mainImage = $brandArray[0]['mainImage'];

                $imageObj = '';
                if($mainImage)
                {
                    $imageObj = \Pimcore\Model\Asset::getByPath($mainImage);
                }
                
                $longDescription = $brandArray[0]['longDescription'];
                $tempFmin = $brandArray[0]['minimumTemperatureF'];
                $tempFmax = $brandArray[0]['maximumTemperatureF'];
                $tempCmin = $brandArray[0]['minimumTemperatureC'];
                $tempCmax = $brandArray[0]['maximumTemperatureC'];

                $color = array();
                $material = array();
                $availableLength = array();
                $articlesData = array();

                foreach($brandArray as $key => $element): 
                        foreach($element as $bkey => $value): 
                                if($bkey == 'Color')
                                    $color = array_merge($color, $value);
                                if($bkey == 'MaterialType')
                                    $material = array_merge($material, $value);
                                if($bkey == 'LengthIN')
                                    $availableLength[] = $value;
                                        
                        endforeach; 

                        foreach ($columnsDataWithImages as $ckey => $cvalue) {
                            $articlesData[$key][$ckey] = $element[$ckey];
                        }

                endforeach; 

                $color = array_unique($color);
                $material = array_unique($material);
                $availableLength = array_unique($availableLength);

                $colorString = implode(', ', $color);
                $materialString = implode(', ', $material);
                $availableLengthString = implode(', ', $availableLength);

                $data[$brandKey]['brandName'] = $brandName;
                $data[$brandKey]['imageObj'] = $imageObj;
                $data[$brandKey]['mainImage'] = $mainImage;
                
                $data[$brandKey]['longDescription'] = $longDescription;
                $data[$brandKey]['tempFmin'] = $tempFmin;
                $data[$brandKey]['tempFmax'] = $tempFmax;
                $data[$brandKey]['tempCmin'] = $tempCmin;
                $data[$brandKey]['tempCmax'] = $tempCmax;

                $data[$brandKey]['materialString'] = $materialString;
                $data[$brandKey]['availableLengthString'] = $availableLengthString;
                $data[$brandKey]['colorString'] = $colorString;
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

        $template = $this->getDocumentTag('relation', 'template_hose_accessories_clamps')->getElement();
        
        if($template)
        {
            $productsData = $template->getProductsData();
            $headerData = \json_decode($template->getHeaderData());
            $headerDataArr = (array)$headerData;
            $headerKeys = array_keys((array)$headerData);
            $columnsData = $template->getColumns();
            $iconRequired = 'NO';
            $columnsData = json_decode($columnsData);
            $columnsDataWithImages = array();

            $language = $request->getLocale();
            $this->get('translator')->setLocale($language);

            if($columnsData)
            {
                foreach ($columnsData as $key => $value) {
                    $columnsDataWithImages[$key]['columnName'] = $value->columnName;
                    $columnsDataWithImages[$key]['columnLabel'] = $this->get('translator')->trans($headerDataArr[$value->columnName]);
                    $columnsDataWithImages[$key]['columnIcon'] = $attributeImages[$value->columnName];
                }
            }
            
            $brandsData = array();

            foreach ($productsData as $key => $item) {
                $productsDataWithHeaders = array_combine($headerKeys, $item);

                if(!empty(trim($productsDataWithHeaders['brandName'][0])))
                    $brandsData[$productsDataWithHeaders['brandName'][0]][] = $productsDataWithHeaders;
            }

            foreach ($brandsData as $brandKey => $brandArray) {

                $brandName = $brandArray[0]['brandName'][0];

                $mainImage = $brandArray[0]['mainImage'];

                $imageObj = '';
                if($mainImage)
                {
                    $imageObj = \Pimcore\Model\Asset::getByPath($mainImage);
                }
                
                $longDescription = $brandArray[0]['longDescription'];

                $material = array();
                $articlesData = array();

                foreach($brandArray as $key => $element): 
                        foreach($element as $bkey => $value): 
                                if($bkey == 'MaterialType')
                                    $material = array_merge($material, $value);
                                        
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

    public function templateTableOfContentsAction(Request $request)
    {

    }

    public function templatePartNumberDesignationsAction(Request $request)
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');

        $templates = $this->getDocumentTag('relations', 'page_number_designations')->getElements();

        if ($templates) {

            $headerData = \json_decode($templates[0]->getHeaderData());
            $headerDataArr = (array)$headerData;
            $headerKeys = array_keys((array)$headerData);

            $catalogGrouping = array();
            foreach ($templates as $key => $template) 
            {
                $productsData = $template->getProductsData();
                
                foreach ($productsData as $key => $item) {
                    $productsDataWithHeaders = array_combine($headerKeys, $item);

                    if(!empty(trim($productsDataWithHeaders['CatalogGrouping'])) && !empty(trim($productsDataWithHeaders['brandName'][0])))
                    {
                        $catalogGrouping[$productsDataWithHeaders['CatalogGrouping']][$productsDataWithHeaders['brandName'][0]][] = $productsDataWithHeaders['industryStandard'];
                    }
                }

                
            }
        }
        // p_r($catalogGrouping);
        // die;
        $this->view['data'] = $catalogGrouping;
    }

    public function templateHoseSubCoverAction(Request $request)
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');

        $INHTemplate = $this->getDocumentTag('relation', 'template_hose_product_page')->getElement();

        if ($INHTemplate) {
            $productsData = $INHTemplate->getProductsData();
            $headerData = \json_decode($INHTemplate->getHeaderData());
            $headerDataArr = (array)$headerData;
            
            $headerKeys = array_keys((array)$headerData);
            $columnsData = $INHTemplate->getColumns();
            $iconRequired = 'YES';
            $columnsData = json_decode($columnsData);
            $columnsDataWithImages = array();

            $language = $request->getLocale();
            $this->get('translator')->setLocale($language);

            foreach ($columnsData as $key => $value) {
                $columnsDataWithImages[$key]['columnName'] = $value->columnName;
                $columnsDataWithImages[$key]['columnLabel'] = $this->get('translator')->trans($headerDataArr[$value->columnName]);
                $columnsDataWithImages[$key]['columnIcon'] = $attributeImages[$value->columnName];
            }

            $featuresList = $this->getFeaturesList('IFS');

            $catalogGrouping = array();
            
            foreach ($productsData as $key => $item) {
                $productsDataWithHeaders = array_combine($headerKeys, $item);

                if(!empty(trim($productsDataWithHeaders['CatalogGrouping'])) && !empty(trim($productsDataWithHeaders['brandName'][0])))
                {
                    $catalogGrouping[$productsDataWithHeaders['CatalogGrouping']][$productsDataWithHeaders['brandName'][0]][] = $productsDataWithHeaders;
                }
            }

            $catalogGroupData = array();

            foreach($catalogGrouping as $catalogKey => $brandsData)
            {
                foreach ($brandsData as $brandKey => $brandArray) {

                    $brandName = $brandArray[0]['brandName'][0];
                    $tempFmin = $brandArray[0]['minimumTemperatureF'];
                    $tempFmax = $brandArray[0]['maximumTemperatureF'];
                    $industryStandard = $brandArray[0]['industryStandard'];
                    $CatalogGrouping = $brandArray[0]['CatalogGrouping'];

                    $tubeMaterial = array();
                    $reinforcement = array();
                    $workingPressurePSI = array();
                    $fittingFamily = array();

                    foreach($brandArray as $key => $element): 
                        
                        foreach($element as $bkey => $value): 

                                if($bkey == 'tubeMaterial')
                                    $tubeMaterial = array_merge($tubeMaterial, $value);
                                if($bkey == 'reinforcement')
                                    $reinforcement = array_merge($reinforcement, $value);
                                if($bkey == 'workingPressurePSI')
                                {
                                    if($value)
                                        $workingPressurePSI[] = $value;
                                }
                                if($bkey == 'fittingFamily')
                                    $fittingFamily = array_merge($fittingFamily, $value);

                        endforeach; 

                    endforeach; 

                    $tubeMaterial = array_unique($tubeMaterial);
                    $reinforcement = array_unique($reinforcement);
                    $workingPressurePSI = array_unique($workingPressurePSI);
                    $fittingFamily = array_unique($fittingFamily);

                    $workingPressurePSIString = "";
                    if($workingPressurePSI && $workingPressurePSI)
                    {
                        $minWorkingPressurePSI = min($workingPressurePSI);
                        $maxWorkingPressurePSI = max($workingPressurePSI);
                        $workingPressurePSIString = $minWorkingPressurePSI."-".$maxWorkingPressurePSI;
                    }


                    $tubeMaterialAtrributeString = implode(', ', $tubeMaterial);
                    $reinforcement = implode(', ', $reinforcement);
                    $fittingFamily = implode(', ', $fittingFamily);

                    $data[$brandKey]['brandName'] = $brandName;
                    $data[$brandKey]['tempFmin'] = $tempFmin;
                    $data[$brandKey]['tempFmax'] = $tempFmax;
                    $data[$brandKey]['reinforcement'] = $reinforcement;
                    $data[$brandKey]['fittingFamily'] = $fittingFamily;
                    $data[$brandKey]['industryStandard'] = $industryStandard;
                    $data[$brandKey]['CatalogGrouping'] = $CatalogGrouping;
                    $data[$brandKey]['workingPressurePSIString'] = $workingPressurePSIString;
                    $data[$brandKey]['tubeMaterialAtrributeString'] = $tubeMaterialAtrributeString;

                }
                $catalogGroupData[$catalogKey] = $data;
            }
            // p_r($catalogGroupData);
            $this->view['data'] = $catalogGroupData;
        }
    }

    public function templateFittingSplitFlangesAction(Request $request)
    {

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

    public function headerTemplateTableOfContentsAction(Request $request)
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
                $featureData[$entry->getId()]['icon'] = $entry->getIcon()->getPath().$entry->getIcon()->getFilename();
            
            $featureData[$entry->getId()]['name'] = $entry->getName();
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['key'] = $entry->getId();
        }
        return $featureData;
    }

    

    /**
     * Fitting Straight
    */
    public function templateFittingStraightAction(Request $request)
    {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        if ($this->getDocumentTag('relation', 'fitting-straight')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'fitting-straight')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);
            $data = array();

            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    if ($k == 0)
                        continue;
                    $data[$row[13]][] = array(
                        'partNumber'    =>  $row[0],
                        'activantNumber'    =>  $row[1],
                        'sapNumber'    =>  $row[2],
                        'hoseID'    =>  $row[3],
                        'threadSize_1'    =>  $row[4],
                        'hex_1_wrenchSize_IN'    =>  $row[5],
                        'hex_1_wrenchSize_MM' =>  $row[6],
                        'hex_2_wrenchSize_IN' =>  $row[7],
                        'hex_2_wrenchSize_MM' =>  $row[8],
                        'CutOff_C_IN' =>  $row[9],
                        'CutOff_C_MM' =>  $row[10],
                        'Length_L_IN' => $row[11],
                        'Length_L_MM' => $row[12],
                        'hoseId_D' => $row[13]
                    );
                }
            }
            ksort($data, SORT_NUMERIC); 
            $this->view['data'] = array(
                'fittingStraightData' =>  $data,
                'defaultData' => array(
                    'defaultImage'  =>  $obj->getProperty('defaultImage'),
                    'defaultFamilyDesc' => $obj->getProperty('defaultFamilyDesc'),
                    'defaultElbow' => $obj->getProperty('defaultElbow'),
                    'defaultElbowType' => $obj->getProperty('defaultElbowType')
                )
            );
        }
    }

    public function headerFittingStraightAction(Request $request)
    {      
    }
    public function footerFittingStraightAction(Request $request)
    {      
    }
    /* End Fitting Straight */
    public function headerTemplateHoseLineTileAction(Request $request)
    {
        $this->view['title'] = $request->get('title');
    }

    public function footerTemplateHoseLineTileAction(Request $request)
    {
        $this->view['footerTitle'] = $request->get('footerTitle');
        $this->view['footerContent'] = $request->get('footerContent');
        $this->view['featuresFooter'] = $request->get('featuresFooter');
        $this->view['brandsInfo'] = $request->get('brandsInfo');
        $this->view['brandPickupInfo'] = $request->get('brandPickupInfo');
        if($request->get('footerLogo')){
            $this->view['footerLogo'] = \Pimcore\Model\Asset::getByPath($request->get('footerLogo'));
        }        
    }
}
