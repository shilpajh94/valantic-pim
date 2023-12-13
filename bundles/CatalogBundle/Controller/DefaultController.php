<?php

namespace CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;
use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use \Exception;

class DefaultController extends AbstractController
{

    private $tableColumns;
    private $s3srcArr = [];
    private $db;
    private $iconRequired = 'NO';
    private $subHeaderRequired = 'NO';
    private $attrbuteImgS3Arr = array();
    private $columnsData = array();
    private $attributeImages = array();
    private $featuresList = array();
    private $catalogTemplatingHelper;
    private $containerInterface;
    private $translatorInterface;

    public function __construct(ContainerInterface $container, TranslatorInterface $translator, CatalogTemplatingHelper $catalogTemplatingHelper)
    {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        $this->containerInterface = $container;
        $this->translatorInterface = $translator;
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
     * @Route("/catalog/get-category")
     */
    public function getCategory(Request $request)
    {
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
    public function getTablesAction(Request $request)
    {
        $parentCat = $request->get('catId');
        $parentObj = DataObject\CatalogCategory::getById($parentCat);
        $parent = $parentObj->getParentId();

        $categoryObj = DataObject\Catalog::getById($parent);
        $category = $categoryObj->getCatalogType();

        $commonHelper = $this->containerInterface->get('app.common_helper');

        $tableConfig = $this->containerInterface->get('app.config_provider_service')->getCatalogTableConfig();
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
    public function getBaseProductsAction(Request $request)
    {
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
    public function getSiopDataAction(Request $request)
    {
        $parentCat = $request->get('catId');
        $categoryObj = DataObject\CatalogCategory::getById($parentCat);
        $catalog = DataObject\Catalog::getById($categoryObj->getParentId());
        $catalogType = $catalog->getCatalogType();

        $options = [];

        if ($catalogType == '041000') {

            $category = $categoryObj->getCategory();
            $siopList = new DataObject\ProductCategory\Listing();
            $siopList->addConditionParam('Level = ?', ['4'], 'AND');
            $siopList->setCondition('o_parentId IN (?)', [$category]);

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
    public function getSkeletonProductsAction(Request $request)
    {
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
    public function getAvailableHeaders(Request $request)
    {

        $objectId = $request->get('o_id');
        $table = $request->get('table');
        $template = $request->get('template');
        $obj = DataObject\CatalogTables::getById($objectId);

        if ($template == null) {
            $template = $obj->getTemplate();
        }


        $commonHelper = $this->containerInterface->get('app.common_helper');

        $tableColumnsConfig = $this->containerInterface->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');

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
                        $fieldLabel = $column['fieldLabel'];
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
    public function getTableData(Request $request)
    {

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
        // p_r($dynamicColumnsData);
        // p_r($tableColumns);
        if ($tableColumns !== null) {
            $columns = array_keys($tableColumns);
        } else {
            $columns = [];
        }
        $parentObj = $tableObj->getParentId();
        $catalogCategory = DataObject\CatalogCategory::getById($parentObj);
        $siopCategory = $catalogCategory->getCategory();

        $productList = new DataObject\Product\Listing();
        $conditionArray = [];
        $x = array();
        for ($i = 0; $i < count($siopCategory); $i++) {
            $y = "," . $siopCategory[$i] . ",";
            array_push($x, $y);
            array_push($x, $siopCategory[$i]);
        }

        $catalogObj = DataObject\Catalog::getById($catalogCategory->getParentId());

        if ($catalogObj->getCatalogType() == '041000') {
            $productList->addConditionParam("SIOPLevel3 IN (:category)", ["category" => $x], 'AND');
            if ($siop4 != null && count($siop4) > 0) {
                $catx = array();
                for ($i = 0; $i < count($siop4); $i++) {
                    $caty = "," . $siop4[$i] . ",";
                    array_push($catx, $caty);
                    array_push($catx, $siop4[$i]);
                }
                $productList->addConditionParam("SIOPLevel4 IN (:siop4)", ["siop4" => $catx], 'AND');
            }
        } else {
            $productList->addConditionParam("SIOPLevel4 IN (:category)", ["category" => $x], 'AND');
        }
        $conditionArray[] = "ProductType = 'fert' ";
//        $productList->addConditionParam('ProductType = :type', ['type' => 'fert'], 'AND');

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

        if (is_array($fitting) && count($fitting) ) {
            $productList->setObjectbricks(['HoseSkeleton', 'HydFittingsFert']);
            $fittingConditonArray = [];
            foreach ($fitting as $key => $fittingValue) {
                $fittingValue = trim($fittingValue, ',');
                if(($fittingValue != null) && ($fittingValue != '1'))
                {
                    $fittingConditonArray[] = "(HydFittingsFert.HydFittingFamily LIKE ".$productList->quote('%,' . $fittingValue . ',%'). ")";
                    $fittingConditonArray[] = "(HoseSkeleton.HoseFittingFamily LIKE ".$productList->quote('%,' . $fittingValue . ',%'). ")";
                }
            }
            if(count($fittingConditonArray))
            {
                $fittingString = " ( " .implode(' OR ', $fittingConditonArray) . " ) ";
                $conditionArray[] = $fittingString;
            }
            // $conditionArray[] = " ((HydFittingsFert.HydFittingFamily LIKE ".$productList->quote('%,' . $fitting . ',%'). ") OR (HoseSkeleton.HoseFittingFamily LIKE ".$productList->quote('%,' . $fitting . ',%'). ")) ";
            //$productList->addConditionParam('fittingFamily LIKE :fitting', ['fitting' => '%,' . $fitting . ',%'], 'AND');
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
        $conditionArray[] = "printedCatalogFlag = '1' ";
        // p_r($conditionArray);
        // die;
        $productList->setCondition(implode(' AND ', $conditionArray));
//        $productList->setCondition('printedCatalogFlag = :print', ['print' => '1']);

        //$productData = $productList->load();
        // $classFields = array_keys($productData[0]->getClass()->getFieldDefinitions());
        $bricksList['fert'] = [];
        $bricksList['skeleton'] = [];
        $bricksList['base'] = [];
        foreach ($siopCategory as $cat) {
            // echo $cat."\n";

            $siopData = DataObject\ProductCategory::getById($cat);

            $allowedBricks = $siopData->getRelatedObjectBrick();

            $brickMappingService = $this->containerInterface->get('AppBundle\Services\CategoryBrickMappingService');
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

                    $numberOfDecimalPoints = "";

                    if(isset($printColumns[$fieldName]['numberOfDecimalPoints']) && $printColumns[$fieldName]['numberOfDecimalPoints'])
                    {
                        $numberOfDecimalPoints = $printColumns[$fieldName]['numberOfDecimalPoints'];
                        $needUpdateValue = TRUE;
                    }
                    else{
                        $needUpdateValue = FALSE;
                    }

                    if ($printColumns[$fieldName]['fieldLevel'] == 'class' && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $getter = 'get' . ucfirst($fieldName);
                        if($item->$getter() !== null && !empty($item->$getter()))
                        {
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $item->$getter(), $numberOfDecimalPoints);
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

                        $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);

                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['fert']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getFert()->$brickGetter() !== null) {
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $item->getFert()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = "";
                        }
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['skeleton']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getSkeleton()->$brickGetter() != null) {
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $item->getSkeleton()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = "";
                        }
                    } else if ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['base']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {

                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getBase()->$brickGetter() !== null) {
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $item->getBase()->$brickGetter()->$getter(), $numberOfDecimalPoints);
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
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);

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
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
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
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } else {
                        $pData[$item->getId()][$fieldName] = "";
                    }
                }
            }
            if($dynamicColumnsData && array_key_exists($template,$dynamicColumnsData))
            {
                foreach ($dynamicColumnsData[$template] as $dFieldKey => $dFieldName) {

                    $headers[$dFieldKey] = $dFieldName['fieldLabel'];

                    $numberOfDecimalPoints = "";

                    if(isset($dFieldName['numberOfDecimalPoints']) && $dFieldName['numberOfDecimalPoints'])
                    {
                        $numberOfDecimalPoints = $dFieldName['numberOfDecimalPoints'];
                        $needUpdateValue = TRUE;
                    }
                    else{
                        $needUpdateValue = FALSE;
                    }


                    if ($dFieldName['fieldLevel'] == 'class' && strtolower($dFieldName['fieldType']) != 'relation' && $dFieldName['fieldType'] != 'Media') {
                        $getter = 'get' . ucfirst($dFieldKey);
                        if($item->$getter() !== null && !empty($item->$getter()))
                        {
                        $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $item->$getter(), $numberOfDecimalPoints);
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
                        $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                    } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['fert']) && strtolower($dFieldName['fieldType']) != 'relation') {
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getFert()->$brickGetter() !== null) {
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $item->getFert()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['skeleton']) && strtolower($dFieldName['fieldType']) != 'relation') {
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getSkeleton()->$brickGetter() !== null) {
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $item->getSkeleton()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } else if ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['base']) && strtolower($dFieldName['fieldType']) != 'relation') {
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getBase()->$brickGetter()) {
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $item->getBase()->$brickGetter()->$getter(), $numberOfDecimalPoints);
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
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
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
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
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
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } else {
                        $pData[$item->getId()][$dFieldKey] = '';
                    }
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

    public function convertValueToDecimal($needUpdateValue, $value, $numberOfDecimalPoints)
    {
        if($needUpdateValue && $value && is_numeric($value))
            $fieldValue = number_format($value, $numberOfDecimalPoints);
        else
            $fieldValue = $value;

        return $fieldValue;
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
        $commonHelper = $this->containerInterface->get('app.common_helper');

        $tableColumnsConfig = $this->containerInterface->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');
    }

    public function getDynamicColumns() {
        $commonHelper = $this->containerInterface->get('app.common_helper');

        $tableColumnsConfig = $this->containerInterface->get('app.config_provider_service')->getCatalogTableDynamicColumnConfig();
        return $commonHelper->getParameter($tableColumnsConfig, 'headers');
    }

    public function templateHoseLineTileTemplateAction(Request $request)
    {
        $commonHelper = $this->containerInterface->get('app.common_helper');
        $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
        $CatalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');
        if ($this->document->getEditable('href', 'tiletemplate')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->document->getEditable('href', 'tiletemplate')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);

            $footerBgColor = $obj->getColor();
            $data = array();
            $blockDes = "";
            $headers = (array)json_decode($obj->getHeaderData());
            $headerKeys = array_keys($headers);
            $productsData = array();
            $baseIdArr = array();
            $fertId = array();
            $images = array();

            $brandsList = $this->getBrandsList();

            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    $productsData[] = array_combine($headerKeys, $row);
                }
                foreach ($productsData as $k => $row) {
                    $oldMaterialCode = $row['oldMaterialCode'];
                    if(empty($oldMaterialCode) || $oldMaterialCode=="N/A" || strlen($oldMaterialCode)<14 || (is_array($row['brandName']) && empty($row['brandName']))) {
                        continue;
                    }


                    $baseId = substr($oldMaterialCode, 0, 6);
                    if (!isset($data[$baseId])) {
                        $data[$baseId] = array();
                        $fertId[$baseId] = $row['id'];
                        $images[$baseId] = $row['mainImage'];
                    }
                    if (isset($data[$baseId]) && empty($data[$baseId])) {
                        $data[$baseId]['brandName'] = isset($data[$baseId]['brandName']) && !empty($data[$baseId]['brandName']) ? $data[$baseId]['brandName'] : $row['brandName'][0];
                        $data[$baseId]['industryStandard'] = isset($data[$baseId]['industryStandard']) && !empty($data[$baseId]['industryStandard']) ? $data[$baseId]['industryStandard'] : $row['industryStandard'];
                        $data[$baseId]['BrandShortText'][0] = isset($data[$baseId]['BrandShortText1'][0]) && !empty($data[$baseId]['BrandShortText1'][0]) ? $data[$baseId]['BrandShortText1'][0] : $row['BrandShortText1'];
                        $data[$baseId]['BrandShortText'][1] = isset($data[$baseId]['BrandShortText2'][1]) && !empty($data[$baseId]['BrandShortText2'][1]) ? $data[$baseId]['BrandShortText2'][1] : $row['BrandShortText2'];
                        $data[$baseId]['BrandShortText'][2] = isset($data[$baseId]['BrandShortText3'][2]) && !empty($data[$baseId]['BrandShortText3'][2]) ? $data[$baseId]['BrandShortText3'][2] : $row['BrandShortText3'];
                        $data[$baseId]['BrandShortText'][3] = isset($data[$baseId]['BrandShortText4'][3]) && !empty($data[$baseId]['BrandShortText4'][3]) ? $data[$baseId]['BrandShortText4'][3] : $row['BrandShortText4'];
                        $data[$baseId]['BrandShortText'][4] = isset($data[$baseId]['BrandShortText5'][4]) && !empty($data[$baseId]['BrandShortText5'][4]) ? $data[$baseId]['BrandShortText5'][4] : $row['BrandShortText5'];
                        $data[$baseId]['mainImage'] = isset($row['mainImage'])&&!empty($row['mainImage']) ? \Pimcore\Model\Asset::getByPath($row['mainImage']) : null;
                        $data[$baseId]['SortOrder'] = $brandsList[$data[$baseId]['brandName']];

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

if(isset($data[$baseId])) {
                        $data[$baseId]['HoseIDNominalIDFrac'][] = isset($data[$baseId]['HoseIDNominalIDFrac'][$k]) && !empty($data[$baseId]['HoseIDNominalIDFrac'][$k]) ? $data[$baseId]['HoseIDNominalIDFrac'][$k] : $row['HoseIDNominalIDFrac'];
                        $data[$baseId]['hoseIdDec'][] = isset($data[$baseId]['hoseIdDec'][$k]) && !empty($data[$baseId]['hoseIdDec'][$k]) ? $data[$baseId]['hoseIdDec'][$k] : $row['hoseIdDec'];
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
                            $range = "ID " . $row['HoseIDNominalIDFrac'][$minKey] . '"' . '-' . $row['HoseIDNominalIDFrac'][$maxKey] . '"';
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

                if($data)
                    array_multisort (array_column($data, 'SortOrder'), SORT_ASC, $data);

                // p_r($data);die;

                $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

                $parameterVar = [];
                $parameterVar['info'] = array(
                    'brandsInfo' => $data,
                    'blockDes' => $blockDes,
                    'footer_class' => (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'',
                    'footer_logo_src' => (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange']

                    /* 'headerTitle' => $obj->getProperty('headerTitle'),
                    'footer' => array(
                        'footerTitle' => $obj->getProperty('footerTitle'),
                        'footerContent' => $obj->getProperty('footerContent'),
                        'footerLogo' => $obj->getProperty('footerLogo')
                    ) */
                );
            }
        }
        return $this->render("@Catalog/Default/template_hose_line_tile_template.html.twig", $parameterVar);
    }


    public function templateHoseProductPageAction(Request $request)
    {
        $containerRequest = $request->get('containerRequest') ? $request->get('containerRequest') : FALSE;
        $template = $this->document->getEditable('relation', 'inh_template_hose_product_page')->getElement();

        if($template)
        {
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');
            $CatalogImagesHYDProduct = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDProduct');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $CatalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);

            if($productsData && $headerData)
            {
                $headerKeys = array_keys($headerData);
                $headerKeysIndex = array_flip($headerKeys);
                $objColumnsData = $template->getColumns();
                $this->iconRequired = 'YES';
                $this->subHeaderRequired = 'NO';
                $this->columnsData = json_decode($objColumnsData, true);

                // $this->translatorInterface->setLocale($CatalogLanguage);

                $columnsDataWithImages = $this->getColumnHeadersForCatalog(FALSE, []);

                unset($objColumnsData);
                //unset($this->columnsData);
                //unset($this->attributeImages);

                // Getting order of the keys
                $orderKeys = array();
                foreach ($columnsDataWithImages as $skey => $svalue) {
                    foreach ($svalue as $vkey => $vvalue) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                    }
                }

                $brandsList = $this->getBrandsList();
                $this->featuresList = $this->getFeaturesList('', $CatalogLanguage);

                $standardMetHoseList = $this->getStandardMetHoseList('INH-HYD-HOSE~standardMetHose', $CatalogLanguage);

                $catalogGrouping = array();

                foreach ($productsData as $key => $item) {
                    // $productsDataWithHeaders = array_combine($headerKeys, $item);

                    if(!empty(trim($item[$headerKeysIndex['CatalogGrouping']])) && !empty(trim($item[$headerKeysIndex['brandName']][0])))
                    {
                        $catalogGrouping[$item[$headerKeysIndex['CatalogGrouping']]][$item[$headerKeysIndex['brandName']][0]][] = $item;
                    }
                }

                foreach($catalogGrouping as $catalogKey => $brandsData)
                {
                    foreach ($brandsData as $brandKey => $brandArray)
                    {
                        $uniqueId = md5($brandKey);
                        $reinforcementStr = '';
                        $VirtualCatalogCoverMaterialStr = '';
                        $VirtualCatalogTubeMaterialStr = '';
                        $tubeMaterialAtrributeString = '';
                        $coverMaterialattributeString = '';
                        $LeftPrintCatalogImageObj = '';
                        $RightPrintCatalogImageObj = '';
                        $longDescription = '';
                        $BrandingLayline = '';
                        $temperatureRangeFAndC = '';
                        $VirtualCatalogTubeMaterial = '';
                        $VirtualCatalogCoverMaterial = '';
                        $VirtualCatalogReinforcement = '';
                        $brandName = '';

                        $standardsMetHose = array();
                        $tubeMaterial = array();
                        $tubeAttribute = array();
                        $reinforcement = array();
                        $coverMaterial = array();
                        $coverAttribute = array();
                        $safetyFeatures = array();
                        $articlesData = array();

                        foreach($brandArray as $key => $element):

                            $brandName = $element[$headerKeysIndex['brandName']][0];

                            if(empty($VirtualCatalogTubeMaterial) && $element[$headerKeysIndex['VirtualCatalogTubeMaterial']])
                                $VirtualCatalogTubeMaterial = $element[$headerKeysIndex['VirtualCatalogTubeMaterial']];

                            if(empty($VirtualCatalogCoverMaterial) && $element[$headerKeysIndex['VirtualCatalogCoverMaterial']])
                                $VirtualCatalogCoverMaterial = $element[$headerKeysIndex['VirtualCatalogCoverMaterial']];

                            if(empty($VirtualCatalogReinforcement) && $element[$headerKeysIndex['VirtualCatalogReinforcement']])
                                $VirtualCatalogReinforcement = $element[$headerKeysIndex['VirtualCatalogReinforcement']];

                            if(empty($temperatureRangeFAndC) && $element[$headerKeysIndex['temperatureRangeFAndC']])
                                $temperatureRangeFAndC = $element[$headerKeysIndex['temperatureRangeFAndC']];

                            if(empty($longDescription) && $element[$headerKeysIndex['longDescription']])
                                $longDescription = $element[$headerKeysIndex['longDescription']];

                            if(empty($BrandingLayline) && $element[$headerKeysIndex['BrandingLayline']])
                                $BrandingLayline = $element[$headerKeysIndex['BrandingLayline']];

                            $LeftPrintCatalogImage = $element[$headerKeysIndex['LeftPrintCatalogImage']];
                            if(empty($LeftPrintCatalogImageObj) && $LeftPrintCatalogImage)
                                $LeftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($LeftPrintCatalogImage);

                            $RightPrintCatalogImage = $element[$headerKeysIndex['RightPrintCatalogImage']];
                            if(empty($RightPrintCatalogImageObj) && $RightPrintCatalogImage)
                                $RightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($RightPrintCatalogImage);

                            foreach($element as $bkey => $value):

                                    if($bkey == $headerKeysIndex['standardMetHose'])
                                    {
                                        if($value && count($value)>0)
                                        {
                                            foreach ($value as $standardMetHosekey => $standardMetHoseValue) {
                                                array_push($standardsMetHose,$standardMetHoseValue);
                                            }
                                        }
                                    }
                                    if($bkey == $headerKeysIndex['tubeMaterial'])
                                        $tubeMaterial = array_merge($tubeMaterial, $value);
                                    if($bkey == $headerKeysIndex['tubeColor'])
                                        $tubeAttribute = array_merge($tubeAttribute, $value);
                                    if($bkey == $headerKeysIndex['reinforcement'])
                                        $reinforcement = array_merge($reinforcement, $value);
                                    if($bkey == $headerKeysIndex['coverColor'])
                                        $coverAttribute = array_merge($coverAttribute, $value);
                                    if($bkey == $headerKeysIndex['coverMaterial'])
                                        $coverMaterial = array_merge($coverMaterial, $value);
                                    if($bkey == $headerKeysIndex['FeaturesBenefitsBulletPoint'])
                                    {
                                        if(count($value)>0)
                                        {
                                            foreach ($value as $fkey => $feature) {
                                                array_push($safetyFeatures,$feature);
                                            }
                                        }
                                    }

                            endforeach;

                            foreach ($orderKeys as $ckey => $cvalue) {
                                if($ckey == 'HoseFittingFamily')
                                    $articlesData[$key][] = ($element[$headerKeysIndex[$ckey]])? implode(',',($element[$headerKeysIndex[$ckey]])): '';
                                else
                                {
                                    if($ckey == 'workingPressurePSI'){
                                        $workingPressureValueArray = explode('.',$element[$headerKeysIndex[$ckey]]);
                                        $element[$headerKeysIndex[$ckey]] = $workingPressureValueArray[0];
                                    }
                                    $articlesData[$key][] = $element[$headerKeysIndex[$ckey]];
                                }
                            }

                        endforeach;

                        $standardsMetHose = array_unique($standardsMetHose);
                        $tubeMaterial = array_unique($tubeMaterial);
                        $tubeAttribute = array_unique($tubeAttribute);
                        $reinforcement = array_unique($reinforcement);
                        $coverMaterial = array_unique($coverMaterial);
                        $coverAttribute = array_unique($coverAttribute);

                        $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);

                        $standardMetHoseListData = array();
                        $standardMetHoseMeetFlameResistence = array();
                        if($standardsMetHose)
                        {
                            foreach ($standardsMetHose as $fkey => $fvalue) {
                                if(isset($standardMetHoseList[$fvalue]))
                                {
                                    $hoseMetKey = $standardMetHoseList[$fvalue]['key'];
                                    $lowercaseHoseMetKey = strtolower($hoseMetKey);

                                    if ((strpos($lowercaseHoseMetKey, 'flame') !== false) || (strpos($lowercaseHoseMetKey, 'usmsha') !== false) || (strpos($lowercaseHoseMetKey, 'msha') !== false))
                                    {
                                        $standardMetHoseMeetFlameResistence[$hoseMetKey]['name'] = $standardMetHoseList[$fvalue]['name'];
                                        $standardMetHoseMeetFlameResistence[$hoseMetKey]['CustomerFacingVersion'] = 'Meets Flame Resistance';
                                    }
                                    else
                                    {
                                        $standardMetHoseListData[$hoseMetKey]['name'] = $standardMetHoseList[$fvalue]['name'];
                                        $standardMetHoseListData[$hoseMetKey]['CustomerFacingVersion'] = $standardMetHoseList[$fvalue]['CustomerFacingVersion'];
                                    }
                                }
                            }
                        }



                        $tubeMaterialAtrributeArr = array_merge($tubeMaterial, $tubeAttribute);
                        $coverMaterialattributeArr = array_merge($coverAttribute, $coverMaterial);

                        $tubeMaterialAtrributeString = implode(', ', $tubeMaterialAtrributeArr);
                        $coverMaterialattributeString = implode(', ', $coverMaterialattributeArr);

                        $reinforcement = implode(', ', $reinforcement);

                        $VirtualCatalogTubeMaterialStr = strip_tags($VirtualCatalogTubeMaterial, "<ul><li><span><strong>");
                        if(empty($VirtualCatalogTubeMaterialStr))
                            $VirtualCatalogTubeMaterialStr = $tubeMaterialAtrributeString;

                        $VirtualCatalogCoverMaterialStr = strip_tags($VirtualCatalogCoverMaterial, "<ul><li><span><strong>");
                            if(empty($VirtualCatalogCoverMaterialStr))
                                $VirtualCatalogCoverMaterialStr = $coverMaterialattributeString;

                        $reinforcementStr = strip_tags($VirtualCatalogReinforcement, "<ul><li><span><strong>");
                        if(empty($reinforcementStr))
                            $reinforcementStr = $reinforcement;

                        unset($tubeMaterial);
                        unset($tubeAttribute);
                        unset($coverMaterial);
                        unset($coverAttribute);
                        unset($standardsMetHose);
                        unset($tubeMaterialAtrributeArr);
                        unset($coverMaterialattributeArr);

                        $data[$uniqueId]['brandName'] = $brandName;
                        $data[$uniqueId]['LeftPrintCatalogImageObj'] = $LeftPrintCatalogImageObj;
                        $data[$uniqueId]['RightPrintCatalogImageObj'] = $RightPrintCatalogImageObj;
                        $data[$uniqueId]['longDescription'] = $longDescription;
                        $data[$uniqueId]['BrandingLayline'] = $BrandingLayline;
                        $data[$uniqueId]['temperatureRangeFAndC'] = $temperatureRangeFAndC;
                        $data[$uniqueId]['reinforcement'] = $reinforcementStr;
                        $data[$uniqueId]['tubeMaterialAtrributeString'] = $VirtualCatalogTubeMaterialStr;
                        $data[$uniqueId]['coverMaterialattributeString'] = $VirtualCatalogCoverMaterialStr;
                        $data[$uniqueId]['standardMetHoseListData'] = $standardMetHoseListData;
                        $data[$uniqueId]['standardMetHoseMeetFlameResistence'] = $standardMetHoseMeetFlameResistence;
                        $data[$uniqueId]['safetyFeatures'] = $safetyFeaturesList;
                        $data[$uniqueId]['iconRequired'] = $this->iconRequired;
                        $data[$uniqueId]['subHeaderRequired'] = $this->subHeaderRequired;
                        $data[$uniqueId]['columnsDataWithImages'] = $columnsDataWithImages;

                        if($articlesData)
                            array_multisort (array_column($articlesData, $headerKeysIndex['hoseOdIn']), SORT_ASC, $articlesData);

                        $data[$uniqueId]['articlesData'] = $articlesData;
                        $data[$uniqueId]['SortOrder'] = $brandsList[$brandName];

                    }
                    if($data){
                        array_multisort (array_column($data, 'SortOrder'), SORT_ASC, $data);
                    }

                    $catalogGroupData[$catalogKey] = $data;
                    unset($data);
                }

                //unset($this->featuresList);

                $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

                $branding_image_src = $this->getS3ImageSrc($CatalogImagesHYDProduct['BrandingImage']);

                $parameterVar = [];
                $parameterVar['data'] = $catalogGroupData;
                $parameterVar['branding_image_src'] = $branding_image_src;
                $parameterVar['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
                $parameterVar['footer_logo_src'] = $footer_logo_src;
                $parameterVar['containerRequest'] = $containerRequest;
            }
        }
        return $this->render("@Catalog/Default/template_hose_product_page.html.twig", $parameterVar);
    }

    public function templateHoseAccessoriesSleevingAction(Request $request)
    {
        $template = $this->document->getEditable('relation', 'template_hose_accessories_sleeving')->getElement();

        if($template)
        {
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $CatalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);
            $headerKeys = array_keys($headerData);

            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $template->getColumns();
            $this->iconRequired = 'NO';
            $this->subHeaderRequired = 'NO';
            $this->columnsData = json_decode($objColumnsData, true);
            // $columnsDataWithImages = array();

            $this->featuresList = $this->getFeaturesList('', $CatalogLanguage);

            // $this->translatorInterface->setLocale($CatalogLanguage);

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(FALSE, []);

            unset($objColumnsData);
            //unset($this->columnsData);
            //unset($this->attributeImages);

            $orderKeys = array();
            foreach ($columnsDataWithImages as $skey => $svalue) {
                foreach ($svalue as $vkey => $vvalue) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                }
            }

            $brandsList = $this->getBrandsList();

            $brandsData = array();
            if($productsData)
            {
                foreach ($productsData as $key => $item) {
                    if(!empty(trim($item[$headerKeysIndex['brandName']][0])))
                        $brandsData[$item[$headerKeysIndex['brandName']][0]][] = $item;
                }

                foreach ($brandsData as $brandKey => $brandArray) {
                    $uniqueId = md5($brandKey);
                    $availableLengthString = '';
                    $materialString = '';
                    $colorString = '';
                    $brandName = '';
                    $imageObj = '';
                    $longDescription = '';
                    $temperatureRangeFAndC = '';
                    $material = array();
                    $articlesData = array();
                    $color = array();
                    $availableLength = array();
                    $safetyFeatures = array();

                    foreach($brandArray as $key => $element):

                            $brandName = $element[$headerKeysIndex['brandName']][0];

                            if(empty($imageObj) && $element[$headerKeysIndex['mainImage']])
                                $imageObj = \Pimcore\Model\Asset::getByPath($element[$headerKeysIndex['mainImage']]);

                            if(empty($longDescription) && $element[$headerKeysIndex['longDescription']])
                                $longDescription = $element[$headerKeysIndex['longDescription']];

                            if(empty($temperatureRangeFAndC) && $element[$headerKeysIndex['temperatureRangeFAndC']])
                                $temperatureRangeFAndC = $element[$headerKeysIndex['temperatureRangeFAndC']];

                            foreach($element as $bkey => $value):
                                    if($bkey == $headerKeysIndex['FeaturesBenefitsBulletPoint'])
                                    {
                                        if(count($value)>0)
                                        {
                                            foreach ($value as $fkey => $feature) {
                                                array_push($safetyFeatures,$feature);
                                            }
                                        }
                                    }
                                    if(($bkey == $headerKeysIndex['MaterialType']) && is_array($value))
                                        $material = array_merge($material, $value);
                                    if(($bkey == $headerKeysIndex['Color']) && is_array($value))
                                        $color = array_merge($color, $value);
                                    if($bkey == $headerKeysIndex['LengthIN'])
                                        $availableLength[] = $value;
                            endforeach;

                            foreach ($orderKeys as $ckey => $cvalue) {
                                $articlesData[$key][$ckey] = $element[$headerKeysIndex[$ckey]];
                            }

                    endforeach;

                    $color = array_unique($color);
                    $material = array_unique($material);
                    $availableLength = array_unique($availableLength);

                    $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);

                    $colorString = implode(', ', $color);
                    $materialString = implode(', ', $material);
                    $availableLengthString = implode(', ', $availableLength);

                    unset($color);
                    unset($material);
                    unset($availableLength);

                    $data[$uniqueId]['brandName'] = $brandName;
                    $data[$uniqueId]['imageObj'] = $imageObj;
                    $data[$uniqueId]['longDescription'] = $longDescription;
                    $data[$uniqueId]['temperatureRangeFAndC'] = $temperatureRangeFAndC;
                    $data[$uniqueId]['materialString'] = $materialString;
                    $data[$uniqueId]['availableLengthString'] = $availableLengthString;
                    $data[$uniqueId]['colorString'] = $colorString;
                    $data[$uniqueId]['iconRequired'] = $this->iconRequired;
                    $data[$uniqueId]['columnsDataWithImages'] = $columnsDataWithImages;
                    $data[$uniqueId]['subHeaderRequired'] = $this->subHeaderRequired;
                    $data[$uniqueId]['safetyFeatures'] = $safetyFeaturesList;

                    if($articlesData)
                        array_multisort (array_column($articlesData, 'SleevingIDInDecimal'), SORT_ASC, $articlesData);

                    $data[$uniqueId]['articlesData'] = $articlesData;
                    $data[$uniqueId]['SortOrder'] = $brandsList[$brandName];

                }

                if($data)
                    array_multisort (array_column($data, 'SortOrder'), SORT_ASC, $data);

            }

            //unset($this->featuresList);

            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterVar = [];
            $parameterVar['data'] = $data;
            $parameterVar['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $parameterVar['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("@Catalog/Default/template_hose_accessories_sleeving.html.twig", $parameterVar);
    }

    public function templateHoseAccessoriesClampsAction(Request $request)
    {
        $template = $this->document->getEditable('relation', 'template_hose_accessories_clamps')->getElement();

        if($template)
        {
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $CatalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);
            $headerKeys = array_keys($headerData);

            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $template->getColumns();
            $this->iconRequired = 'NO';
            $this->subHeaderRequired = 'NO';
            $this->columnsData = json_decode($objColumnsData, true);

            // $this->translatorInterface->setLocale($CatalogLanguage);

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(FALSE, []);

            unset($objColumnsData);
            //unset($this->columnsData);
            //unset($this->attributeImages);

            $orderKeys = array();
            foreach ($columnsDataWithImages as $skey => $svalue) {
                foreach ($svalue as $vkey => $vvalue) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                }
            }

            $brandsData = array();

            foreach ($productsData as $key => $item) {
                if(!empty(trim($item[$headerKeysIndex['brandName']][0])))
                    $brandsData[$item[$headerKeysIndex['brandName']][0]][] = $item;
            }

            foreach ($brandsData as $brandKey => $brandArray)
            {

                $brandName = '';
                $imageObj = '';
                $longDescription = '';
                $material = array();
                $articlesData = array();

                foreach($brandArray as $key => $element):

                    $brandName = $element[$headerKeysIndex['brandName']][0];

                    if(empty($imageObj) && $element[$headerKeysIndex['mainImage']])
                        $imageObj = \Pimcore\Model\Asset::getByPath($element[$headerKeysIndex['mainImage']]);

                    if(empty($longDescription) && $element[$headerKeysIndex['longDescription']])
                        $longDescription = $element[$headerKeysIndex['longDescription']];

                    foreach($element as $bkey => $value):

                        if(($bkey == $headerKeysIndex['MaterialType']) && is_array($value))
                            $material = array_merge($material, $value);

                    endforeach;

                    foreach ($orderKeys as $ckey => $cvalue) {
                        $articlesData[$key][$ckey] = $element[$headerKeysIndex[$ckey]];
                    }

                endforeach;
                $uniqueId = md5($brandKey);
                $material = array_unique($material);
                $materialString = implode(', ', $material);
                $data[$uniqueId]['brandName'] = $brandName;
                $data[$uniqueId]['imageObj'] = $imageObj;
                $data[$uniqueId]['longDescription'] = $longDescription;
                $data[$uniqueId]['materialString'] = $materialString;
                $data[$uniqueId]['iconRequired'] = $this->iconRequired;
                $data[$uniqueId]['columnsDataWithImages'] = $columnsDataWithImages;
                $data[$uniqueId]['subHeaderRequired'] = $this->subHeaderRequired;
                $data[$uniqueId]['articlesData'] = $articlesData;

            }

            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterVar = [];
            $parameterVar['data'] = $data;
            $parameterVar['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $parameterVar['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("@Catalog/Default/template_hose_accessories_clamps.html.twig", $parameterVar);
    }

    public function templateHoseAccessoriesOringAction(Request $request)
    {
        $template = $this->document->getEditable('relation', 'template_hose_accessories_oring')->getElement();

        if($template)
        {
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $CatalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);
            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $template->getColumns();
            $this->iconRequired = 'NO';
            $this->subHeaderRequired = 'NO';
            $this->columnsData = json_decode($objColumnsData, true);
            // $this->translatorInterface->setLocale($CatalogLanguage);

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(FALSE, []);

            unset($objColumnsData);
            //unset($this->columnsData);
            //unset($this->attributeImages);

            // Getting order of the keys
            $orderKeys = array();
            foreach ($columnsDataWithImages as $skey => $svalue) {
                foreach ($svalue as $vkey => $vvalue) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                }
            }

            $brandsData = array();
            $material = array();
            $brandData = array();
            $hardness = array();
            $imageObj = '';
            $temperatureRangeFAndC = '';

            $materialList = $this->getMaterialList('HYD_ACCESSORIES~MaterialType', $CatalogLanguage);

            if($productsData){
                foreach ($productsData as $key => $item) {
                    if(!empty(trim($item[$headerKeysIndex['brandName']][0])))
                    {
                        $brandName = $item[$headerKeysIndex['brandName']][0];

                        if($item[$headerKeysIndex['MaterialType']] && is_array($item[$headerKeysIndex['MaterialType']]))
                            $material = array_merge($material, $item[$headerKeysIndex['MaterialType']]);

                        if($item[$headerKeysIndex['Hardness']])
                            $hardness[] = $item[$headerKeysIndex['Hardness']];

                        if($item[$headerKeysIndex['temperatureRangeFAndC']] && empty($temperatureRangeFAndC))
                            $temperatureRangeFAndC = $item[$headerKeysIndex['temperatureRangeFAndC']];

                        if(!$imageObj && $item[$headerKeysIndex['mainImage']])
                            $imageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['mainImage']]);

                        $uniqueId = md5($brandName);
                        $brandData[$uniqueId]['brandName'] = $brandName;
                        $brandData[$uniqueId]['iconRequired'] = $this->iconRequired;
                        $brandData[$uniqueId]['columnsDataWithImages'] = $columnsDataWithImages;
                        $brandData[$uniqueId]['subHeaderRequired'] = $this->subHeaderRequired;

                        $articlesData = array();

                        foreach ($orderKeys as $ckey => $cvalue) {
                            $articlesData[] = $item[$cvalue];
                        }

                        $brandData[$uniqueId]['articlesData'][] = $articlesData;
                        unset($articlesData);
                    }
                }
            }

            unset($productsData);

            $hardness = array_unique($hardness);
            $hardness = implode(', ', $hardness);

            $material = array_unique($material);
            $materialArray = array();
            foreach($material as $key => $value)
            {
                if(isset($materialList[$value]))
                    $materialArray[] = $materialList[$value]['name'];
            }

            $materialString = implode(', ', $materialArray);

            unset($material);
            unset($materialArray);

            $data['imageObj'] = $imageObj;
            $data['materialString'] = $materialString;
            $data['hardness'] = $hardness;
            $data['tempratureRange'] = $temperatureRangeFAndC;
            $data['brandData'] = $brandData;

            unset($brandData);

            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterVar = [];
            $parameterVar['data'] = $data;
            $parameterVar['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $parameterVar['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("@Catalog/Default/template_hose_accessories_oring.html.twig", $parameterVar);
    }

    public function templateTableOfContentsAction(Request $request)
    {
        // p_r($request); die;
        $printermarks = false;
        
        // p_r($this->printermarks); die;
        return $this->render('@Catalog/Default/template_table_of_contents.html.twig',['printermarks'=>$printermarks]);
        // return;
    }

    public function testPageAction(Request $request)
    {
        // p_r("MMMAMA"); die;
        return $this->render('@Catalog/Default/test_page.html.twig',['printermarks'=>$this->printermarks]);
        // return;
    }

    public function container2Action(Request $request)
    {
        $paramsBag = [
            'document' => $this->document
        ];

        foreach ($request->attributes as $key => $value) {
            $paramsBag[$key] = $value;
        }

        $allChildren = [];

        //prepare children for include
        foreach ($this->document->getAllChildren() as $child) {
            if ($child instanceof \Pimcore\Model\Document\Hardlink) {
                $child = \Pimcore\Model\Document\Hardlink\Service::wrap($child);
            }

            $child->setProperty('hide-layout', 'bool', true, false, true);

            $allChildren[] = $child;
        }

        $paramsBag['allChildren'] = $allChildren;
        $paramsBag['printermarks'] = $this->printermarks;
        // $allChildren = $this->document->getAllChildren();
        // $this->view->allChildren = $allChildren;
        // p_r("MMMAMA"); die;
        // $allChildren = [1,2];
        return $this->render('@Catalog/Default/container2.html.twig',$paramsBag);
        // return;
    }

    public function templateHydraulicTableOfContentsDynamicAction(Request $request)
    {
        try
        {
            $folderId =$this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'CatalogBundle:Default:template_part_number_designations.html.php',
                'CatalogBundle:Fitting:hydraulic_fitting.html.php',
            ];

            $hydraulicHose[] = 'HYDRAULIC HOSE';
            $hydraulicFitting[] = 'HYDRAULIC FITTINGS';
            $allFittingData = [];

            foreach($listing as $doc)
            {
                if($doc->getChildren())
                {

                    foreach ($doc->getChildren() as $key => $childDoc) {

                        if($childDoc->getChildren())
                        {
                            foreach ($childDoc->getChildren() as $key => $child2Doc)
                            {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {

                                    if($child2Doc->getTemplate() == 'CatalogBundle:Default:template_part_number_designations.html.php')
                                    {
                                        $obj = $child2Doc->getElement('hydraulic_hose_details');
                                        if (!empty($obj) && !empty($obj->getData())) {

                                            $hydraulicHoseData = explode(PHP_EOL, $obj->getData());
                                            $hydraulicHoseInnerData = [];
                                            if($hydraulicHoseData)
                                            {
                                                foreach ($hydraulicHoseData as $key => $value) {
                                                    $data = [];
                                                    $hydraulicHostList = explode('$$',$value);
                                                    $hydraulicHostKey = $hydraulicHostList[0];
                                                    $hydraulicHostValue = explode(',',$hydraulicHostList[1]);
                                                    $data[] = $hydraulicHostKey;
                                                    $data[] = $hydraulicHostValue;
                                                    $hydraulicHoseInnerData[] = $data;
                                                }
                                                $hydraulicHose[] = $hydraulicHoseInnerData;
                                            }
                                        }
                                    }
                                    else if($child2Doc->getTemplate() == 'CatalogBundle:Fitting:hydraulic_fitting.html.php')
                                    {
                                        $obj = $child2Doc->getElement('hydraulic_fitting_brand');
                                        if (!empty($obj) && !empty($obj->getData())) {
                                            $fittingBrandNames = explode('$$', $obj->getData());
                                            $data = [];
                                            $data[] = $child2Doc->getKey();
                                            $data[] = $fittingBrandNames;
                                            $allFittingData[] = $data;
                                        }
                                    }
                                }
                            }
                        }
                        else
                        {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {

                                if($childDoc->getTemplate() == 'CatalogBundle:Default:template_part_number_designations.html.php')
                                {
                                    $obj = $childDoc->getElement('hydraulic_hose_details');
                                    if (!empty($obj) && !empty($obj->getData())) {

                                        $hydraulicHoseData = explode(PHP_EOL, $obj->getData());
                                        $hydraulicHoseInnerData = [];
                                        if($hydraulicHoseData)
                                        {
                                            foreach ($hydraulicHoseData as $key => $value) {
                                                $data = [];
                                                $hydraulicHostList = explode('$$',$value);
                                                $hydraulicHostKey = $hydraulicHostList[0];
                                                $hydraulicHostValue = explode(',',$hydraulicHostList[1]);
                                                $data[] = $hydraulicHostKey;
                                                $data[] = $hydraulicHostValue;
                                                $hydraulicHoseInnerData[] = $data;
                                            }
                                            $hydraulicHose[] = $hydraulicHoseInnerData;
                                        }
                                    }
                                }
                                else if($childDoc->getTemplate() == 'CatalogBundle:Fitting:hydraulic_fitting.html.php')
                                {
                                    $obj = $childDoc->getElement('hydraulic_fitting_brand');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $fittingBrandNames = explode('$$', $obj->getData());
                                        $data = [];
                                        $data[] = $childDoc->getKey();
                                        $data[] = $fittingBrandNames;
                                        $allFittingData[] = $data;
                                    }
                                }
                            }
                        }

                    }


                }
                else
                {

                    if (in_array($doc->getTemplate(), $templateArray)) {
                        if($doc->getTemplate() == 'CatalogBundle:Default:template_part_number_designations.html.php')
                        {
                            $obj = $doc->getElement('hydraulic_hose_details');
                            if (!empty($obj) && !empty($obj->getData())) {

                                $hydraulicHoseData = explode(PHP_EOL, $obj->getData());
                                $hydraulicHoseInnerData = [];
                                if($hydraulicHoseData)
                                {
                                    foreach ($hydraulicHoseData as $key => $value) {
                                        $data = [];
                                        $hydraulicHostList = explode('$$',$value);
                                        $hydraulicHostKey = $hydraulicHostList[0];
                                        $hydraulicHostValue = explode(',',$hydraulicHostList[1]);
                                        $data[] = $hydraulicHostKey;
                                        $data[] = $hydraulicHostValue;
                                        $hydraulicHoseInnerData[] = $data;
                                    }
                                    $hydraulicHose[] = $hydraulicHoseInnerData;
                                }
                            }
                        }
                        else if($doc->getTemplate() == 'CatalogBundle:Fitting:hydraulic_fitting.html.php')
                        {
                            $obj = $doc->getElement('hydraulic_fitting_brand');
                            if (!empty($obj) && !empty($obj->getData())) {
                                $fittingBrandNames = explode('$$', $obj->getData());
                                $data = [];
                                $data[] = $doc->getKey();
                                $data[] = $fittingBrandNames;
                                $allFittingData[] = $data;
                            }
                        }
                    }
                }
            }

            if(count($allFittingData)>0)
            {
                $hydraulicFitting[] = $allFittingData;
            }

            if($hydraulicHose)
            {
                $DynamicPageData[] = $hydraulicHose;
            }
            if($hydraulicFitting)
            {
                $DynamicPageData[] = $hydraulicFitting;
            }
            $parameterVar = [];
            $parameterVar['data'] = $DynamicPageData;
            return $this->render("@Catalog/Default/template_hydraulic_table_of_contents_dynamic.html.twig", $parameterVar);
        }
        catch(Exception $e)
        {
            return new Response($e->getMessage());
        }
    }

    public function templatePartNumberDesignationsAction(Request $request)
    {
        $templates = $this->document->getEditable('relations', 'page_number_designations')->getElements();

        $footerBgColor = '';
        if($templates)
        {
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $CatalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogGrouping = array();
            foreach ($templates as $key => $template)
            {
                if(empty(trim($footerBgColor)))
                    $footerBgColor = $template->getColor();

                $productsData = $template->getProductsData();
                $headerData = json_decode($template->getHeaderData(), true);

                if($headerData && $productsData)
                {
                    $headerKeys = array_keys($headerData);
                    foreach ($productsData as $key => $item) {
                        $productsDataWithHeaders = array_combine($headerKeys, $item);
                        if(!empty(trim($productsDataWithHeaders['CatalogGrouping'])) && !empty(trim($productsDataWithHeaders['brandName'][0])))
                        {
                            $catalogGrouping[$productsDataWithHeaders['CatalogGrouping']][$productsDataWithHeaders['brandName'][0]][] = $productsDataWithHeaders['industryStandard'];
                        }
                    }
                }
            }
        }

        $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
        $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

        $parameterVar = [];
        $parameterVar['data'] = $catalogGrouping;
        $parameterVar['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
        $parameterVar['footer_logo_src'] = $footer_logo_src;

        return $this->render("@Catalog/Default/template_part_number_designations.html.twig", $parameterVar);
    }

    public function templateHoseSubCoverAction(Request $request)
    {
        $template = $this->document->getEditable('relation', 'template_hose_product_page')->getElement();

        if($template)
        {
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $CatalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $CatalogLanguage = $catalogObj->getCatalogLanguage();
            $standardMetHoseList = $this->getStandardMetHoseList('INH-HYD-HOSE~standardMetHose', $CatalogLanguage);

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);
            // $this->translatorInterface->setLocale($CatalogLanguage);

            $brandsList = $this->getBrandsList();
            $catalogGrouping = array();

            if($headerData && $productsData)
            {
                $headerKeys = array_keys($headerData);
                $headerKeysIndex = array_flip($headerKeys);

                foreach ($productsData as $key => $item) {
                    if(!empty(trim($item[$headerKeysIndex['CatalogGrouping']])) && !empty(trim($item[$headerKeysIndex['brandName']][0])))
                    {
                        $catalogGrouping[$item[$headerKeysIndex['CatalogGrouping']]][$item[$headerKeysIndex['brandName']][0]][] = $item;
                    }
                }

                $catalogGroupData = array();
                foreach($catalogGrouping as $catalogKey => $brandsData)
                {
                    foreach ($brandsData as $brandKey => $brandArray)
                    {
                        $uniqueId = md5($brandKey);
                        $VirtualCatalogTubeMaterialStr = '';
                        // $VirtualCatalogCoverMaterialStr = '';
                        $reinforcementStr = '';
                        $VirtualCatalogTubeMaterial = '';
                        // $VirtualCatalogCoverMaterial = '';
                        $VirtualCatalogReinforcement = '';
                        $CatalogGrouping = '';
                        $CatalogPackaging = '';
                        $rangeTemperatureF = '';
                        $constructionType = '';

                        $tubeMaterial = array();
                        $reinforcement = array();
                        $workingPressurePSI = array();
                        $fittingFamily = array();
                        $industryStandardKey = array();
                        $industryStandard = array();

                        foreach($brandArray as $key => $element):

                            $brandName = $element[$headerKeysIndex['brandName']][0];

                            if(empty($CatalogPackaging) && $element[$headerKeysIndex['Packaging']])
                                    $CatalogPackaging = $element[$headerKeysIndex['Packaging']];

                            if(empty($VirtualCatalogTubeMaterial) && $element[$headerKeysIndex['VirtualCatalogTubeMaterial']])
                                    $VirtualCatalogTubeMaterial = $element[$headerKeysIndex['VirtualCatalogTubeMaterial']];

                            // if(empty($VirtualCatalogCoverMaterial) && $element[$headerKeysIndex['VirtualCatalogCoverMaterial']])
                            //     $VirtualCatalogCoverMaterial = $element[$headerKeysIndex['VirtualCatalogCoverMaterial']];

                            if(empty($VirtualCatalogReinforcement) && $element[$headerKeysIndex['VirtualCatalogReinforcement']])
                                $VirtualCatalogReinforcement = $element[$headerKeysIndex['VirtualCatalogReinforcement']];

                            if(empty($CatalogGrouping) && $element[$headerKeysIndex['CatalogGrouping']])
                                $CatalogGrouping = $element[$headerKeysIndex['CatalogGrouping']];

                            if(empty($rangeTemperatureF) && $element[$headerKeysIndex['rangeTemperatureF']])
                                $rangeTemperatureF = $element[$headerKeysIndex['rangeTemperatureF']];

                            if(empty($constructionType) && $element[$headerKeysIndex['siopFullCode']]){
                                $entries = new DataObject\ProductCategory\Listing();
                                $entries->setCondition("fullCode LIKE ?", $element[$headerKeysIndex['siopFullCode']]);
                                $entries->load();
                                foreach($entries as $entry) {
                                    $constructionType = $entry->getConstructionType();
                                }
                            }

                            foreach($element as $bkey => $value):

                                    if($bkey == $headerKeysIndex['tubeMaterial'])
                                        $tubeMaterial = array_merge($tubeMaterial, $value);
                                    if($bkey == $headerKeysIndex['reinforcement'])
                                        $reinforcement = array_merge($reinforcement, $value);
                                    if(isset($headerKeysIndex['workingPressurePSI']) && ($bkey == $headerKeysIndex['workingPressurePSI']))
                                    {
                                        if($value){
                                            $workingPressureValueArray = explode('.',$value);
                                            $workingPressurePSI[] = $workingPressureValueArray[0];
                                            // $workingPressurePSI[] = $value;
                                        }
                                    }
                                    if(isset($headerKeysIndex['HoseFittingFamily']) && ($bkey == $headerKeysIndex['HoseFittingFamily']) && $value)
                                        $fittingFamily = array_merge($fittingFamily, $value);
                                    if($bkey == $headerKeysIndex['standardMetHose'])
                                        $industryStandardKey = array_merge($industryStandardKey, $value);

                            endforeach;

                        endforeach;

                        $tubeMaterial = array_unique($tubeMaterial);
                        $reinforcement = array_unique($reinforcement);
                        $workingPressurePSI = array_unique($workingPressurePSI);
                        $fittingFamily = array_unique($fittingFamily);
                        $industryStandardKey = array_unique($industryStandardKey);

                        foreach($industryStandardKey as $industryStandardName){
                            $industryStandard[] = $standardMetHoseList[$industryStandardName]['name'];
                        }

                        $workingPressurePSIString = "";
                        if($workingPressurePSI)
                        {
                            $minWorkingPressurePSI = min($workingPressurePSI);
                            $maxWorkingPressurePSI = max($workingPressurePSI);
                            if($minWorkingPressurePSI == $maxWorkingPressurePSI)
                                $workingPressurePSIString = $minWorkingPressurePSI;
                            else
                                $workingPressurePSIString = $minWorkingPressurePSI."-".$maxWorkingPressurePSI;
                        }

                        $tubeMaterialAtrributeString = implode(', ', $tubeMaterial);
                        $reinforcement = implode(', ', $reinforcement);
                        $fittingFamily = implode(', ', $fittingFamily);
                        $industryStandard = implode(', ', $industryStandard);

                        $VirtualCatalogTubeMaterialStr = strip_tags($VirtualCatalogTubeMaterial, "<ul><li><span><strong>");
                        if(empty($VirtualCatalogTubeMaterialStr))
                            $VirtualCatalogTubeMaterialStr = $tubeMaterialAtrributeString;

                        // $VirtualCatalogCoverMaterialStr = strip_tags($VirtualCatalogCoverMaterial, "<ul><li><span><strong>");
                        //     if(empty($VirtualCatalogCoverMaterialStr))
                        //         $VirtualCatalogCoverMaterialStr = $coverMaterialattributeString;

                        $reinforcementStr = strip_tags($VirtualCatalogReinforcement, "<ul><li><span><strong>");
                                if(empty($reinforcementStr))
                                    $reinforcementStr = $reinforcement;


                        $data[$uniqueId]['brandName'] = $brandName;
                        $data[$uniqueId]['rangeTemperatureF'] = $rangeTemperatureF;
                        $data[$uniqueId]['reinforcement'] = $constructionType;
                        $data[$uniqueId]['fittingFamily'] = $fittingFamily;
                        $data[$uniqueId]['industryStandard'] = $industryStandard;
                        $data[$uniqueId]['CatalogGrouping'] = $CatalogGrouping;
                        $data[$uniqueId]['workingPressurePSIString'] = $workingPressurePSIString;
                        $data[$uniqueId]['tubeMaterialAtrributeString'] = $VirtualCatalogTubeMaterialStr;
                        $data[$uniqueId]['CatalogPackaging'] = $CatalogPackaging;
                        $data[$uniqueId]['SortOrder'] = $brandsList[$brandName];

                    }

                    if($data)
                        array_multisort (array_column($data, 'SortOrder'), SORT_ASC, $data);

                    $catalogGroupData[$catalogKey] = $data;
                    unset($data);
                }

            }

            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterVar = [];
            $parameterVar['data'] = $catalogGroupData;
            $parameterVar['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $parameterVar['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("@Catalog/Default/template_hose_sub_cover.html.twig", $parameterVar);
    }

    public function templateFittingSplitFlangesAction(Request $request)
    {
        $catalogTableObject = $this->document->getEditable('template_hose_accessories_flanges');

        // getEditable
        // $template = $this->getDocumentTag('relation', 'template_hose_accessories_flanges')->getElement();
        $catalogData = [];
        $footer_logo_src = '';
        $footerBgColor = '';
        $data = '';
        if ($catalogTableObject) {
            $catalogTableObjectElement = $catalogTableObject->getElement();

            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($catalogTableObjectElement->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $CatalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $catalogTableObjectElement->getColor();
            $productsData = $catalogTableObjectElement->getProductsData();
            $headerData = json_decode($catalogTableObjectElement->getHeaderData(), true);
            $headerKeys = array_keys($headerData);

            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $catalogTableObjectElement->getColumns();
            $this->iconRequired = 'YES';
            $this->subHeaderRequired = 'NO';
            $this->columnsData = json_decode($objColumnsData, true);

            // p_r($this->columnsData);
            // $columnsDataWithImages = array();
            $columnsDataWithImages = $this->getColumnHeadersForCatalog(FALSE, []);

            // $this->translatorInterface->setLocale($CatalogLanguage);

            unset($objColumnsData);
            //unset($this->columnsData);
            //unset($this->attributeImages);

            $orderKeys = array();
            foreach ($columnsDataWithImages as $skey => $svalue) {
                foreach ($svalue as $vkey => $vvalue) {
                    if (isset($headerKeysIndex[$vvalue['columnName']])) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                    }
                }
            }

            $brandsList = $this->getBrandsList();

            $brandsData = array();
            $data = [];
            if ($productsData) {
                foreach ($productsData as $key => $item) {
                    if (!empty(trim($item[$headerKeysIndex['brandName']][0])))
                        $brandsData[$item[$headerKeysIndex['brandName']][0]][] = $item;
                }

                foreach ($brandsData as $brandKey => $brandArray) {
                    $uniqueId = md5($brandKey);
                    $brandName = '';
                    $imageObj = '';
                    $shortDescription = '';

                    foreach ($brandArray as $key => $element) :

                        $brandName = $element[$headerKeysIndex['brandName']][0];

                        if (empty($imageObj) && $element[$headerKeysIndex['mainImage']])
                            $imageObj = \Pimcore\Model\Asset::getByPath($element[$headerKeysIndex['mainImage']]);

                        if (empty($shortDescription) && $element[$headerKeysIndex['shortDescription']])
                            $shortDescription = $element[$headerKeysIndex['shortDescription']];

                        foreach ($orderKeys as $ckey => $cvalue) {
                            $articlesData[$key][$ckey] = $element[$headerKeysIndex[$ckey]];
                        }

                    endforeach;

                    $data[$uniqueId]['brandName'] = $brandName;
                    $data[$uniqueId]['imageObj'] = $imageObj;
                    $data[$uniqueId]['shortDescription'] = $shortDescription;
                    $data[$uniqueId]['columnsDataWithImages'] = $columnsDataWithImages;

                    // array_multisort (array_column($articlesData, $headerKeysIndex['FlangePatternDimensionAInAndMMDecimal']), SORT_ASC, $articlesData);

                    $data[$uniqueId]['articlesData'] = $articlesData;
                    $data[$uniqueId]['SortOrder'] = $brandsList[$brandName];
                }

                if ($data)
                    array_multisort(array_column($data, 'SortOrder'), SORT_ASC, $data);
            }

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $CatalogImagesHYDFooter['Black'] : $CatalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $catalogData['iconRequired'] = $this->iconRequired;
            $catalogData['subHeaderRequired'] = $this->subHeaderRequired;
        }
        $catalogData['data'] = $data;
        $catalogData['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
        $catalogData['footer_logo_src'] = $footer_logo_src;

        return $this->render("@Catalog/Default/template_fitting_split_flanges.html.twig", $catalogData);
    }

    public function containerAction(Request $request)
    {
        $paramsBag = [
            'document' => $this->document
        ];

        foreach ($request->attributes as $key => $value) {
            $paramsBag[$key] = $value;
        }

        $allChildren = [];

        //prepare children for include
        foreach ($this->document->getAllChildren() as $child) {
            if ($child instanceof \Pimcore\Model\Document\Hardlink) {
                $child = \Pimcore\Model\Document\Hardlink\Service::wrap($child);
            }

            $child->setProperty('hide-layout', 'bool', true, false, true);

            $allChildren[] = $child;
        }

        $paramsBag['allChildren'] = $allChildren;
        $paramsBag['printermarks'] = $this->printermarks;
        // $allChildren = $this->document->getAllChildren();
        // $this->view->allChildren = $allChildren;
        // p_r("MMMAMA"); die;
        // $allChildren = [1,2];
        return $this->render('@Catalog/Default/container.html.twig',$paramsBag);
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
            $featureData[$entry->getId()]['SortOrder'] = $entry->getSortOrder();
        }
        return $featureData;
    }

    public function getStandardMetHoseList($catalog_type, $language){
        $entries = new DataObject\MultiselectMaster\Listing();
        $entries->setCondition("masterType = ?", "{$catalog_type}");
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['name'] = $entry->getName($language);
            $featureData[$entry->getId()]['Description'] = $entry->getDescription($language);
            $featureData[$entry->getId()]['CustomerFacingVersion'] = $entry->getCustomerFacingVersion($language);
        }
        return $featureData;
    }

    public function getMaterialList($catalog_type, $language){
        $entries = new DataObject\MultiselectMaster\Listing();
        $entries->setCondition("masterType = ?", "{$catalog_type}");
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['name'] = $entry->getName($language);
            $featureData[$entry->getId()]['Description'] = $entry->getDescription($language);
            $featureData[$entry->getId()]['CustomerFacingVersion'] = $entry->getCustomerFacingVersion($language);
        }
        return $featureData;
    }

    public function getBrandsList(){
        $query = "select name, SortOrder from object_query_3";
        $brandslist = $this->db->fetchPairs($query);
        return $brandslist;
    }

    public function templatePtgProductPageAction(Request $request)
    {
        $containerRequest = $request->get('containerRequest') ? $request->get('containerRequest') : FALSE;

        $template = $this->document->getEditable('ptg_product_page')->getElement();
        // $template = $this->getDocumentTag('relation', 'ptg_product_page')->getElement();

        if($template)
        {
            $commonHelper = $this->containerInterface->get('app.common_helper');
            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $priceListTableConfig = $this->containerInterface->get('app.config_provider_service')->getPriceListTableConfig();

            $priceListTableColumn = $commonHelper->getParameter($priceListTableConfig, 'priceListTableColumn');
            $priceListCurrency = $commonHelper->getParameter($priceListTableConfig, 'priceListCurrency');
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesPTGFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesPTGFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());

            $IsPriceCatalog = $catalogObj->getIsPriceCatalog();
            $CatalogLanguage = $catalogObj->getCatalogLanguage();
            $distributionChannel = $catalogObj->getDistributionChannel();
            $salesOrganisation = $catalogObj->getSalesOrganisation();
            $Currency = $catalogObj->getCurrency();
            $ValidFromDate = $catalogObj->getValidFromDate();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);

            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $template->getColumns();


            $this->iconRequired = 'YES';
            $this->columnsData = json_decode($objColumnsData, true);

            if($IsPriceCatalog)
            {
                $this->columnsData['listPrice']['columnName'] = 'listPrice';
                $this->columnsData['listPrice']['columnLabel'] = 'listPrice';
                $this->columnsData['listPrice']['unitName'] = $priceListCurrency[$Currency];
            }

            // $this->translatorInterface->setLocale($CatalogLanguage);

            $this->subHeaderRequired = 'NO';

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(FALSE, []);

            unset($objColumnsData);
            //unset($this->columnsData);
            //unset($this->attributeImages);

            // Getting order of the keys
            $orderKeys = array();
            foreach ($columnsDataWithImages as $skey => $svalue) {
                foreach ($svalue as $vkey => $vvalue) {
                    if($vvalue['columnName'] == 'listPrice')
                        $orderKeys[$vvalue['columnName']] = count($headerKeysIndex);
                    else
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                }
            }

            $this->featuresList = $this->getFeaturesList('', $CatalogLanguage);
            $materialList = $this->getMaterialList('PTG~material', $CatalogLanguage);

            $query = "select oo_id, Level, description, PrintedCatalogDescription from object_localized_2_{$CatalogLanguage} where level IN (3,4,5,6) ";

            $categories = $this->db->fetchAll($query);

            $categoriesList = array();

            foreach ($categories as $key => $value) {
                $categoriesList[$value['oo_id']] = $value;
            }
            unset($categories);

            $catagoryDescription = array();
            $mainImageObj = '';
            $LeftPrintCatalogImageObj = '';
            $RightPrintCatalogImageObj = '';
            $ProfileDimensionImageObj = '';
            $material = array();
            $reinforcement = array();
            $longDescription = '';
            $temperatureRangeFAndC = '';
            $VirtualCatalogReinforcement = '';
            $safetyFeatures = array();

            if($productsData)
            {
                foreach ($productsData as $key => $item)
                {
                    $query = "select SIOPLevel3, SIOPLevel4, SIOPLevel5, SIOPLevel6, priceData from object_query_1 where oo_id = '".$item[$headerKeysIndex['id']]."'";

                    $record = $this->db->fetchRow($query);
                    $SIOPLevel3 = trim($record['SIOPLevel3'], ',');
                    $SIOPLevel4 = trim($record['SIOPLevel4'], ',');
                    $SIOPLevel5 = trim($record['SIOPLevel5'], ',');
                    $SIOPLevel6 = trim($record['SIOPLevel6'], ',');

                    $siop6Category = !empty($categoriesList[$SIOPLevel6]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel6]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel6]['description'];
                    $siop6Category = trim($siop6Category);

                    if($siop6Category)
                    {
                        if(!isset($catagoryDescription['SIOP3Description']) && $SIOPLevel3)
                        {
                            $catagoryDescription['SIOP3Description'] = !empty($categoriesList[$SIOPLevel3]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel3]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel3]['description'];
                        }

                        if(!isset($catagoryDescription['SIOP4Description']) && $record['SIOPLevel4'])
                        {
                            $catagoryDescription['SIOP4Description'] = !empty($categoriesList[$SIOPLevel4]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel4]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel4]['description'];
                        }

                        if(!isset($catagoryDescription['SIOP5Description']) && $record['SIOPLevel5'])
                        {
                            $catagoryDescription['SIOP5Description'] = !empty($categoriesList[$SIOPLevel5]['PrintedCatalogDescription']) ? $categoriesList[$SIOPLevel5]['PrintedCatalogDescription'] : $categoriesList[$SIOPLevel5]['description'];
                        }

                        $listPrice = '';

                        if($record['priceData'])
                        {
                            $recordArray = explode(PHP_EOL, $record['priceData']);

                            if(count($recordArray))
                            {

                                foreach ($recordArray as $rkey => $rvalue) {
                                    $pvalue = explode('|', $rvalue);
                                    if(($pvalue[$priceListTableColumn['Rate Unit']] == $Currency) && ($pvalue[$priceListTableColumn['Distribution Channel']] == $distributionChannel) && ($pvalue[$priceListTableColumn['Sales Organization']] == $salesOrganisation))
                                    {
                                        $ValidityStartDate = \Carbon\Carbon::createFromFormat('Y-m-d',$pvalue[$priceListTableColumn['Validity Start Date']]);
                                        $ValidityEndDate = \Carbon\Carbon::createFromFormat('Y-m-d',$pvalue[$priceListTableColumn['Validity End Date']]);

                                        if($ValidFromDate->between($ValidityStartDate, $ValidityEndDate)) {
                                            $listPrice = $pvalue[$priceListTableColumn['Rate']];
                                            break;
                                        }
                                    }
                                }
                            }
                        }

                        if(!$mainImageObj && $item[$headerKeysIndex['mainImage']])
                            $mainImageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['mainImage']]);

                        if(!$ProfileDimensionImageObj && $item[$headerKeysIndex['ProfileDimensionImage']])
                            $ProfileDimensionImageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['ProfileDimensionImage']]);

                        if($item[$headerKeysIndex['material']])
                            $material = array_merge($material, $item[$headerKeysIndex['material']]);

                        if($item[$headerKeysIndex['reinforcement']])
                            $reinforcement = array_merge($reinforcement, $item[$headerKeysIndex['reinforcement']]);

                        if($item[$headerKeysIndex['VirtualCatalogReinforcement']] && empty($VirtualCatalogReinforcement))
                            $VirtualCatalogReinforcement = $item[$headerKeysIndex['VirtualCatalogReinforcement']];

                        if($item[$headerKeysIndex['longDescription']] && empty($longDescription))
                            $longDescription = $item[$headerKeysIndex['longDescription']];

                        if($item[$headerKeysIndex['temperatureRangeFAndC']] && empty($temperatureRangeFAndC))
                            $temperatureRangeFAndC = $item[$headerKeysIndex['temperatureRangeFAndC']];

                        if($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']])
                        {
                            foreach ($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']] as $fkey => $feature) {
                                array_push($safetyFeatures,$feature);
                            }
                        }

                        $item[] = $listPrice;

                        foreach ($orderKeys as $ckey => $cvalue) {
                            $articlesData[] = $item[$cvalue];
                        }

                        $brandsData[$siop6Category][] = $articlesData;
                        unset($articlesData);
                    }
                }

                $brandsDataArr = array();
                if($brandsData)
                {
                    foreach ($brandsData as $bkey => $bvalue) {

                        if(isset($headerKeysIndex['pitchMM']) && isset($headerKeysIndex['widthmm']))
                            array_multisort(array_column($bvalue, $headerKeysIndex['pitchMM']), SORT_ASC, array_column($bvalue, $headerKeysIndex['widthmm']), SORT_ASC, $bvalue);
                        else if(isset($headerKeysIndex['outsideLengthIN']) && isset($headerKeysIndex['netWeight']))
                            array_multisort(array_column($bvalue, $headerKeysIndex['outsideLengthIN']), SORT_ASC, array_column($bvalue, $headerKeysIndex['netWeight']), SORT_ASC, $bvalue);
                        else if(isset($headerKeysIndex['insideLengthIN']))
                            array_multisort(array_column($bvalue, $headerKeysIndex['insideLengthIN']), SORT_ASC, $bvalue);
                        else if(isset($headerKeysIndex['pulleyDiameterIN']) && isset($headerKeysIndex['GroovesPerTooth']))
                            array_multisort(array_column($bvalue, $headerKeysIndex['pulleyDiameterIN']), SORT_ASC, array_column($bvalue, $headerKeysIndex['GroovesPerTooth']), SORT_ASC, $bvalue);
                        else if(isset($headerKeysIndex['numberOfTeeth']) && isset($headerKeysIndex['netWeight']))
                            array_multisort(array_column($bvalue, $headerKeysIndex['numberOfTeeth']), SORT_ASC, array_column($bvalue, $headerKeysIndex['netWeight']), SORT_ASC, $bvalue);

                        $brandsDataArr[$bkey] = $bvalue;
                    }

                }
                unset($brandsData);

                $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);

                $reinforcement = array_unique($reinforcement);
                $reinforcement = implode(', ', $reinforcement);

                $material = array_unique($material);
                $materialArray = array();
                foreach($material as $key => $value)
                {
                    if(isset($materialList[$value]))
                        $materialArray[] = $materialList[$value]['name'];
                }

                $materialStr = implode(', ', $materialArray);

                unset($material);
                unset($safetyFeatures);
                unset($materialArray);

                $reinforcementStr = strip_tags($VirtualCatalogReinforcement, "<ul><li><span><strong>");
                if(empty($reinforcementStr))
                    $reinforcementStr = $reinforcement;

                $groupData = array();
                $groupData['subHeaderRequired'] = $this->subHeaderRequired;
                $groupData['iconRequired'] = $this->iconRequired;
                $groupData['material'] = $materialStr;
                $groupData['reinforcement'] = $reinforcementStr;
                $groupData['safetyFeatures'] = $safetyFeaturesList;
                $groupData['mainImageObj'] = $mainImageObj;
                $groupData['columnsDataWithImages'] = $columnsDataWithImages;
                $groupData['ProfileDimensionImageObj'] = $ProfileDimensionImageObj;
                $groupData['longDescription'] = $longDescription;
                $groupData['temperatureRange'] = $temperatureRangeFAndC;
                $groupData['data'] = $brandsDataArr;
                $groupData['columnsDataWithImages'] = $columnsDataWithImages;
                $groupData['brandName'] = $catagoryDescription['SIOP5Description'];
                $groupData['siop4Category'] = $catagoryDescription['SIOP4Description'];
                $groupData['siop3Category'] = $catagoryDescription['SIOP3Description'];
                $groupData['IsPriceCatalog'] = $IsPriceCatalog;
                unset($brandsData);
                unset($mainImageObj);
                unset($ProfileDimensionImageObj);
                //unset($this->featuresList);

                $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesPTGFooter['Black']:$CatalogImagesPTGFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

                $parameterVar = [];
                $parameterVar['groupData'] = $groupData;
                $parameterVar['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
                $parameterVar['footer_logo_src'] = $footer_logo_src;
                $parameterVar['containerRequest'] = $containerRequest;
            }
        }
        return $this->render("@Catalog/Default/template_hose_sub_cover.html.twig", $parameterVar);
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
                        $this->s3srcArr[$fvalue] = $this->getS3ImageSrc($this->featuresList[$fvalue]['icon']);

                    $safetyFeaturesListWithImage[] = array('name'=>$this->featuresList[$fvalue]['name'], 'iconSrc' => $this->s3srcArr[$fvalue], 'SortOrder' =>$this->featuresList[$fvalue]['SortOrder']);
                }
                else
                    $safetyFeaturesListWithOutImage[] = array('name'=>$this->featuresList[$fvalue]['name'], 'iconSrc' => $this->featuresList[$fvalue]['icon'], 'SortOrder' =>$this->featuresList[$fvalue]['SortOrder']);
            }
        }

        if($safetyFeaturesListWithImage)
            array_multisort (array_column($safetyFeaturesListWithImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithImage);

        if($safetyFeaturesListWithOutImage)
            array_multisort (array_column($safetyFeaturesListWithOutImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithOutImage);

        $safetyFeaturesList = array_merge_recursive($safetyFeaturesListWithImage,$safetyFeaturesListWithOutImage);

        if($safetyFeaturesList)
            $safetyFeaturesList = array_slice($safetyFeaturesList, 0, 5);

        unset($safetyFeaturesListWithImage);
        unset($safetyFeaturesListWithOutImage);

        return $safetyFeaturesList;
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            // $s3src = $imgObj->getThumbnail('catalog_thumb');
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,1000);

            // uncomment below once imageWidth resolved in view
            // $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,$this->view->imageWidth);
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

                    $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $groupName;
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnWidth'] = $columnWidth;
                    $columnsDataWithImages[$groupColumnName][$dkey]['unitName'] = $this->replaceYellowCode($this->translatorInterface->trans($unitName));
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnName'] = $value['columnName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnLabel'] = $this->replaceYellowCode($this->translatorInterface->trans($groupColumnName));

                    if ($this->iconRequired == 'YES')
                    {
                        if(!isset($this->attrbuteImgS3Arr[$groupColumnName]))
                        {
                            if(isset($this->attributeImages[$groupColumnName]))
                            {
                                $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                                $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                                $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                                $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attributeImagesSrc;
                            }
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

                if($value['columnName'] == 'listPrice')
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $unitName;
                else
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($unitName) ? $this->replaceYellowCode($this->translatorInterface->trans($unitName)) : '';

                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $value['columnName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->replaceYellowCode($this->translatorInterface->trans($groupColumnName));

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
                        $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                    }
                }
            }
        }

        return $columnsDataWithImages;
    }

    public function templateIndexDescriptiveNumberAction(Request $request)
    {
    }

    public function templateHydraulicAlphanumericIndexByDescriptiveNumberDynamicAction(Request $request)
    {
        try
        {
            $folderId =$this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'CatalogBundle:Default:template_fitting_split_flanges.html.php',
                'CatalogBundle:Default:template_hose_accessories_clamps.html.php',
                'CatalogBundle:Default:template_hose_accessories_oring.html.php',
                'CatalogBundle:Default:template_hose_accessories_sleeving.html.php',
                'CatalogBundle:Default:template_hose_product_page.html.php',
                'CatalogBundle:Fitting:hydraulic_fitting.html.php'
            ];

            $all_doc_arr = [];
            foreach($listing as $doc)
            {
                if($doc->getChildren())
                {
                    foreach ($doc->getChildren() as $key => $childDoc) {

                        if($childDoc->getChildren())
                        {
                            foreach ($childDoc->getChildren() as $key => $child2Doc)
                            {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {
                                    $obj = $child2Doc->getElement('product_page_part_number');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $partNumberList = explode(',', $obj->getData());
                                        $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                                    }
                                }
                            }
                        }
                        else
                        {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {
                                $obj = $childDoc->getElement('product_page_part_number');
                                if (!empty($obj) && !empty($obj->getData())) {
                                    $partNumberList = explode(',', $obj->getData());
                                    $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                                }
                            }
                        }
                    }
                }
                else
                {
                    if (in_array($doc->getTemplate(), $templateArray)) {
                        $obj = $doc->getElement('product_page_part_number');
                        if (!empty($obj) && !empty($obj->getData())) {
                            $partNumberList = explode(',', $obj->getData());
                            $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                        }
                    }
                }
            }

            $all_doc_arr = array_unique($all_doc_arr);
            sort($all_doc_arr);

            $parameterVar = [];
            $parameterVar['data'] = $all_doc_arr;
            return $this->render("@Catalog/Default/template_hydraulic_alphanumeric_index_by_descriptive_number_dynamic.html.twig", $parameterVar);
        }
        catch(Exception $e)
        {
            return new Response($e->getMessage());
        }
    }

    public function templateHydraulicAlphanumericIndexByProductNumberDynamicAction(Request $request)
    {
        try
        {
            $folderId =$this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'CatalogBundle:Default:template_fitting_split_flanges.html.php',
                'CatalogBundle:Default:template_hose_accessories_clamps.html.php',
                'CatalogBundle:Default:template_hose_accessories_oring.html.php',
                'CatalogBundle:Default:template_hose_accessories_sleeving.html.php',
                'CatalogBundle:Fitting:hydraulic_fitting.html.php'
            ];

            $all_doc_arr = [];
            foreach($listing as $doc)
            {
                if($doc->getChildren())
                {
                    foreach ($doc->getChildren() as $key => $childDoc) {

                        if($childDoc->getChildren())
                        {
                            foreach ($childDoc->getChildren() as $key => $child2Doc) {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {
                                    $obj = $child2Doc->getElement('product_page_product_number');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $partNumberList = explode(',', $obj->getData());
                                        $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                                    }
                                }
                            }
                        }
                        else
                        {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {
                                $obj = $childDoc->getElement('product_page_product_number');
                                if (!empty($obj) && !empty($obj->getData())) {
                                    $partNumberList = explode(',', $obj->getData());
                                    $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                                }
                            }
                        }
                    }
                }
                else
                {
                    if (in_array($doc->getTemplate(), $templateArray)) {
                        $obj = $doc->getElement('product_page_product_number');
                        if (!empty($obj) && !empty($obj->getData())) {
                            $partNumberList = explode(',', $obj->getData());
                            $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                        }
                    }
                }
            }

            $all_doc_arr = array_unique($all_doc_arr);
            sort($all_doc_arr);

            $parameterVar = [];
            $parameterVar['data'] = $all_doc_arr;
            return $this->render("@Catalog/Default/template_hydraulic_alphanumeric_index_by_product_number_dynamic.html.twig", $parameterVar);
        }
        catch(Exception $e)
        {
            return new Response($e->getMessage());
        }
    }

    public function templateIndexProductNumberAction(Request $request)
    {
    }

    public function replaceYellowCode($string)
    {
        $string = str_replace('%*','<span style="color: #ffa500;">', $string);
        $string = str_replace('*%','</span>', $string);
        return $string;
    }
    /**
     * Reset Table of content page's data
     * @Route("/reset-table-of-content")
     * @return json
     */
    public function resetTableOfContentPageData(Request $request)
    {
        try
        {
            $docId  = $request->get('docId');
            $sql    = "DELETE FROM documents_elements where documentId = '$docId'";
            $resp   = $this->db->query($sql);

            return $this->json(array("success" => true,"msg" => 'Content Reset Successfully.'));
        }
        catch(Exception $e)
        {
            return $this->json(array("success" => false,"msg" => $e->getMessage()));
        }
    }
}
