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
use CatalogBundle\Model\Catalog;

class DefaultController extends FrontendController
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
    private $imageWidth;

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
    public function indexAction(Request $request): Response
    {
        return new Response('Hello world from catalog');
    }

    /**
     * @Route("/catalog/get-category")
     */
    public function getCategory(Request $request): JsonResponse
    {
        $parentCat = $request->get('catId');
		$className = $request->get('className');
		
		
		$category = "";
		if($className == "SpecSheetCatalog"){
			$category = $parentCat;
		} else {
			$catalogObj = DataObject\Catalog::getById($parentCat);
            $category = $catalogObj->getCatalogType();
		}
		
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

        $result = [];
        $result['data'] = $optionData;

        return $this->json(['data' => $result['data']]);
    }

    /**
     * @Route("/catalog/get-tables")
     */
    public function getTablesAction(Request $request): JsonResponse
    {
        $parentCat = $request->get('catId');
		$className = $request->get('className');
		$category = "";
		if($className == "SpecSheetCatalog"){
			$category = $parentCat;
		} else {
			$parentObj = DataObject\CatalogCategory::getById($parentCat);
			$parent = $parentObj->getParentId();
			$categoryObj = DataObject\Catalog::getById($parent);
			$category = $categoryObj->getCatalogType();
		}
        

        $commonHelper = $this->containerInterface->get('app.common_helper');

        $tableConfig = $this->containerInterface->get('app.config_provider_service')->getCatalogTableConfig();
        $tables = $commonHelper->getParameter($tableConfig, 'tablemapping');
        $options = [];
        if(isset($tables[$category])){
            foreach ($tables[$category] as $key => $value) {
                $options[] = array('key' => $key, 'value' => $value);
            }
        }
        return $this->json(['data' => $options]);
    }

    /**
     * @Route("/catalog/get-base-products")
     */
    public function getBaseProductsAction(Request $request): JsonResponse
    {
        $parentCat = $request->get('catId');
        $objId = $request->get('objId');
        $sql = "SELECT `className`, `id` FROM `objects` WHERE `id` = $objId";
        $className = $this->db->fetchOne($sql);
        $categoryObj = DataObject\CatalogCategory::getById($parentCat);
        $category = $categoryObj->getCategory();
        $productList = new DataObject\Product\Listing();
        $x = array();
        if($category != null){
            for ($i = 0; $i < count($category); $i++) {
                $y = ',' . $category[$i] . ',';
                array_push($x, $y);
                array_push($x, $category[$i]);
            }
        }
        $productList->addConditionParam('SIOPLevel4 IN (?)', [$x], 'AND');
        $productList->setCondition('ProductType = "base"');
        $options = [];
        foreach ($productList as $item) {
            if($className == "CatalogPTS"){
                $options[] = array('key' => (!empty($item->getSapDescription('en'))?$item->getSapDescription('en'):$item->getKey()), 'value' => $item->getId());
            }else{

            $options[] = array('text' => (!empty($item->getSapDescription('en'))?$item->getSapDescription('en'):$item->getKey()), 'id' => $item->getId());
            }
            
        }

        return $this->json(['data' => $options]);
    }
    /**
     * @Route("/catalog/get-siop-data")
     */
    public function getSiopDataAction(Request $request): JsonResponse
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
            $siopList->setCondition('parentId IN (?)', [$category]);

            foreach ($siopList as $cat) {
                $options[] = array(
                    'text' =>  $cat->getDescription('en') . '-' . $cat->getFullcode(),
                    'id' => $cat->getId()
                );
            }
        }

        return $this->json(['data' => $options, 'length' => count($options)]);
    }

    /**
     * @Route("/catalog/get-skeleton-products")
     */
    public function getSkeletonProductsAction(Request $request): JsonResponse
    {
        $baseProducts = json_decode($request->get('products'), 1);
        $needKey = $request->get('needKey')? filter_var($request->get('needKey'), FILTER_VALIDATE_BOOLEAN):false;
        $productList = new DataObject\Product\Listing();

        $productList->addConditionParam('parentId IN (?)', [$baseProducts], 'AND');
        $productList->setCondition('ProductType = "skeleton"');

        $options = [];
        foreach ($productList as $item) {
            $options[] = array('text' => ($needKey)?$item->getKey():$item->getSapDescription('en'), 'id' => ($needKey)?$item->getKey():$item->getId());
        }

        return $this->json(['data' => $options]);
    }

    /**
     * @Route("/catalog/get-available-headers")
     */
    public function getAvailableHeaders(Request $request): JsonResponse
    {
        $objectId = $request->get('id');
        $table = $request->get('table');
        $template = $request->get('template');
        $obj = DataObject::getById($objectId);

        if ($template == null) {
            $template = $obj->getTemplate();
        }
        $commonHelper = $this->containerInterface->get('app.common_helper');
        $tableColumnsConfig = $this->containerInterface->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');

        $columns = array();
        $arr = [];

        if ($template && $table) { 
            $tableColumns = isset($this->tableColumns[$template][$table]) ? $this->tableColumns[$template][$table] : null;

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
        } else {
            $arr = array('storeData' => [], 'completeData' => [], 'success' => false);
        }

        return $this->json($arr);
    }

    /**
     * @Route("/catalog/get-table-data")
     */
    public function getTableData(Request $request): JsonResponse
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
		if(isset($siopCategory)){
        for ($i = 0; $i < count($siopCategory); $i++) {
            $y = "," . $siopCategory[$i] . ",";
            array_push($x, $y);
            array_push($x, $siopCategory[$i]);
        }
		}

        $catalogObj = DataObject\Catalog::getById($catalogCategory->getParentId());

        if ($catalogObj->getCatalogType() == '041000') {
            $productList->addConditionParam("SIOPLevel3 IN (:category)", ["category" => $x], 'AND');
            if ($siop4 != null && !empty($siop4)) {
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

        if ($brand != null && count($brand) > 0) {
            $productList->addConditionParam('brandName IN (:brand)', ['brand' => $brand], 'AND');
        }

        if (is_array($fitting) && count($fitting)) {
            $productList->setObjectbricks(['HoseSkeleton', 'HydFittingsFert']);
            $fittingConditonArray = [];
            foreach ($fitting as $fittingValue) {
                $fittingValue = trim($fittingValue, ',');
                if (($fittingValue != null) && ($fittingValue != '1')) {
                    $fittingConditonArray[] = "(HydFittingsFert.HydFittingFamily LIKE " . $productList->quote('%,' . $fittingValue . ',%') . ")";
                    $fittingConditonArray[] = "(HoseSkeleton.HoseFittingFamily LIKE " . $productList->quote('%,' . $fittingValue . ',%') . ")";
                }
            }
            if (count($fittingConditonArray)) {
                $fittingString = " ( " . implode(' OR ', $fittingConditonArray) . " ) ";
                $conditionArray[] = $fittingString;
            }
        }

        $skeletonProductId = [];

        if ($baseProduct !== null && count($baseProduct) > 0) {
            $baseIds = implode(',', $baseProduct);
            $query = "select id from object_1 where parentId IN (" . $baseIds . ")";
            $skeletonIds = $this->db->fetchAllAssociative($query);
            // $skeletonProductId = $this->db->fetchFirstColumn($query);
        }
        if ($skeletonProduct !== null && count($skeletonProduct) > 0) {
            $productList->addConditionParam('parentId IN (:parent)', ['parent' => $skeletonProduct], 'AND');
        } elseif (count($skeletonIds) > 0 && count($baseProduct) > 0) {
            $skeletonProductId = [];
            for ($i = 0; $i < count($skeletonIds); $i++) {
                $skeletonProductId[] = $skeletonIds[$i]['id'];
            }
            $productList->addConditionParam('parentId IN (:parent)', ['parent' => $skeletonProductId], 'AND');
        }
        $conditionArray[] = "printedCatalogFlag = '1' ";
        $productList->setCondition(implode(' AND ', $conditionArray));

        $bricksList['fert'] = [];
        $bricksList['skeleton'] = [];
        $bricksList['base'] = [];
		if(isset($siopCategory)){
        foreach ($siopCategory as $cat) {
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
        }
		}

        $pData = [];
        $headers = [];

        $printColumns = null;
        if (isset($this->tableColumns[$template][$table])) {
            $printColumns = $this->tableColumns[$template][$table];
        }

        foreach ($productList as $item) {

            foreach ($columns as $fieldName) {
                if (in_array($fieldName, array_keys($printColumns))) {
                    $headers[$fieldName] = $printColumns[$fieldName]['fieldLabel'];

                    $numberOfDecimalPoints = "";

                    if (isset($printColumns[$fieldName]['numberOfDecimalPoints']) && $printColumns[$fieldName]['numberOfDecimalPoints']) {
                        $numberOfDecimalPoints = $printColumns[$fieldName]['numberOfDecimalPoints'];
                        $needUpdateValue = true;
                    } else {
                        $needUpdateValue = false;
                    }

                    if ($printColumns[$fieldName]['fieldLevel'] == 'class' && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->$getter() !== null && !empty($item->$getter())) {
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $item->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } elseif ($printColumns[$fieldName]['fieldLevel'] == 'class' && strtolower($printColumns[$fieldName]['fieldType']) == 'relation') {
                        $dataValues = [];
                        $getter = 'get' . ucfirst($fieldName);
                        $value = $item->$getter();
                        if ($item->$getter() !== null) {
                            $class = 'Pimcore\Model\DataObject\\' . $printColumns[$fieldName]['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('id IN (?)', [$value]);
                            $fieldGetter = 'get' . $printColumns[$fieldName]['parent']['class']['fieldName'];

                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                        }

                        $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                    } elseif ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['fert']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getFert()->$brickGetter() !== null) {
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $item->getFert()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = "";
                        }
                    } elseif ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['skeleton']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getSkeleton()->$brickGetter() != null) {
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $item->getSkeleton()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = "";
                        }
                    } elseif ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['base']) && strtolower($printColumns[$fieldName]['fieldType']) !== 'relation') {

                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getBase()->$brickGetter() !== null) {
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $item->getBase()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } elseif ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['fert']) && strtolower($printColumns[$fieldName]['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getFert()->$brickGetter() !== null) {
                            $value = $item->getFert()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $printColumns[$fieldName]['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('id IN (?)', [$value]);
                            $fieldGetter = 'get' . $printColumns[$fieldName]['parent']['class']['fieldName'];

                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } elseif ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['skeleton']) && strtolower($printColumns[$fieldName]['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getSkeleton()->$brickGetter() !== null) {
                            $value = $item->getSkeleton()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $printColumns[$fieldName]['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('id IN (?)', [$value]);
                            $fieldGetter = 'get' . $printColumns[$fieldName]['parent']['class']['fieldName'];

                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                            $pData[$item->getId()][$fieldName] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$fieldName] = '';
                        }
                    } elseif ($printColumns[$fieldName]['fieldLevel'] == 'objectBrick' && in_array($printColumns[$fieldName]['parent']['name'], $bricksList['base']) && strtolower($printColumns[$fieldName]['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($printColumns[$fieldName]['parent']['name']);
                        $getter = 'get' . ucfirst($fieldName);
                        if ($item->getBase()->$brickGetter() !== null) {
                            $value = $item->getBase()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $printColumns[$fieldName]['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('id IN (?)', [$value]);
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
            if ($dynamicColumnsData && array_key_exists($template, $dynamicColumnsData)) {
                foreach ($dynamicColumnsData[$template] as $dFieldKey => $dFieldName) {

                    $headers[$dFieldKey] = $dFieldName['fieldLabel'];

                    $numberOfDecimalPoints = "";

                    if (isset($dFieldName['numberOfDecimalPoints']) && $dFieldName['numberOfDecimalPoints']) {
                        $numberOfDecimalPoints = $dFieldName['numberOfDecimalPoints'];
                        $needUpdateValue = true;
                    } else {
                        $needUpdateValue = false;
                    }


                    if ($dFieldName['fieldLevel'] == 'class' && strtolower($dFieldName['fieldType']) != 'relation' && $dFieldName['fieldType'] != 'Media') {
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->$getter() !== null && !empty($item->$getter())) {
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $item->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } elseif ($dFieldName['fieldLevel'] == 'class' && $dFieldName['fieldType'] == 'Media') {
                        $getter = 'get' . ucfirst($dFieldKey);

                        if ($item->$getter() !== null) {
                            $pData[$item->getId()][$dFieldKey] = $item->$getter()->getPath() . $item->$getter()->getFileName();
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } elseif ($dFieldName['fieldLevel'] == 'class' && strtolower($dFieldName['fieldType']) == 'relation') {

                        $dataValues = [];
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->$getter() !== null) {
                            $value = $item->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $dFieldName['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('id IN (?)', [$value]);
                            $fieldGetter = 'get' . $dFieldName['parent']['class']['fieldName'];
                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                        }

                        $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                    } elseif ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['fert']) && strtolower($dFieldName['fieldType']) != 'relation') {
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getFert()->$brickGetter() !== null) {
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $item->getFert()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } elseif ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['skeleton']) && strtolower($dFieldName['fieldType']) != 'relation') {
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getSkeleton()->$brickGetter() !== null) {
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $item->getSkeleton()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } elseif ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['base']) && strtolower($dFieldName['fieldType']) != 'relation') {
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getBase()->$brickGetter()) {
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $item->getBase()->$brickGetter()->$getter(), $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } elseif ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['fert']) && strtolower($dFieldName['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getFert()->$brickGetter() !== null) {
                            $value = $item->getFert()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $dFieldName['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('id IN (?)', [$value]);
                            $fieldGetter = 'get' . $dFieldName['parent']['class']['fieldName'];

                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } elseif ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['skeleton']) && strtolower($dFieldName['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getSkeleton()->$brickGetter() !== null) {
                            $value = $item->getSkeleton()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $dFieldName['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('id IN (?)', [$value]);
                            $fieldGetter = 'get' . $dFieldName['parent']['class']['fieldName'];

                            foreach ($classObj as $obj) {
                                array_push($dataValues, $obj->$fieldGetter());
                            }
                            $pData[$item->getId()][$dFieldKey] = $this->convertValueToDecimal($needUpdateValue, $dataValues, $numberOfDecimalPoints);
                        } else {
                            $pData[$item->getId()][$dFieldKey] = '';
                        }
                    } elseif ($dFieldName['fieldLevel'] == 'objectBrick' && in_array($dFieldName['parent']['name'], $bricksList['base']) && strtolower($dFieldName['fieldType']) == 'relation') {
                        $dataValues = [];
                        $brickGetter = 'get' . ucfirst($dFieldName['parent']['name']);
                        $getter = 'get' . ucfirst($dFieldKey);
                        if ($item->getBase()->$brickGetter() !== null) {
                            $value = $item->getBase()->$brickGetter()->$getter();

                            $class = 'Pimcore\Model\DataObject\\' . $dFieldName['parent']['class']['name'] . '\\Listing';
                            $classObj = new $class();
                            $classObj->setCondition('id IN (?)', [$value]);
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

        foreach ($headers as $value) {
            $columnData[] = array(
                'xtype' => 'gridcolumn',
                'name' => $value,
                'Text' => $value,
                'header' => $value,
                'dataIndex' => $value,
                'flex' => 1
            );
        }

        $articleData = [];
        $i = 0;

        foreach ($pData as $value) {
            $array = [];
            foreach ($value as $data) {
                array_push($array, $data);
            }
            array_push($articleData, $array);
        }

        $arr = array(
            'brandData' => [],
            'columnData' => $columnData,
            'fieldData' => $headers,
            'articlesData' => $pData,
            'data' => $articleData,
            'headerData' => json_encode($headers)
        );

        return $this->json($arr);
    }

    public function convertValueToDecimal($needUpdateValue, $value, $numberOfDecimalPoints): mixed
    {
        if (is_array($value)) {
            $fieldValue = implode('||', $value);
        } elseif ($needUpdateValue && $value && is_numeric($value)) {
            $fieldValue = number_format($value, $numberOfDecimalPoints);
        } else {
            $fieldValue = $value;
        }

        return $fieldValue;
    }


    /**
     * @Route("/catalog/get-initial-data")
     */
    public function getInitialData(Request $request): Response
    {
        $objId = $request->get('objId');
		$className = $request->get('className');

		$data = DataObject::getById($objId);
        
        $tableData = $data->getProductsData();
        $fieldData = json_decode($data->getHeaderData(), 1);
		$headerKeys = "";
		$headerKeysIndex = [];
		if(isset($fieldData)){
			$headerKeys = array_keys($fieldData);
			$headerKeysIndex = array_flip($headerKeys);

		}

        $columnData = array();
        if ($fieldData !== null) {
            foreach ($fieldData as $value) {
                $columnData[] = array(
                    'xtype' => 'gridcolumn',
                    'name' => $value,
                    'Text' => $value,
                    'header' => $value,
                    'dataIndex' => $value,
                    'flex' => 1,
					'filter' => array(
					'type' => 'string',
					)
                );
            }
        }
		$catalogModel = new Catalog;
		$customRecords = $catalogModel->getCustomRecords($objId);
		

		$gridIndexes = [];
		$i = 0;
		foreach ($tableData as $key => $productItem) {
						if(in_array($productItem[$headerKeysIndex['articleNumber']], $customRecords)){
							$gridIndexes[] = $i;
						}
						$i ++;
					}

        $data = array(
            'brandData' => [],
            'columnData' => $columnData,
            'fieldData' => $fieldData,
            'data' => $tableData,
			'customRecords' => $gridIndexes
        );

        return $this->json($data);
    }
	
	

    public function getTableColumns(): void
    {
        $commonHelper = $this->containerInterface->get('app.common_helper');

        $tableColumnsConfig = $this->containerInterface->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');
    }

    public function getDynamicColumns(): ?array
    {
        $commonHelper = $this->containerInterface->get('app.common_helper');

        $tableColumnsConfig = $this->containerInterface->get('app.config_provider_service')->getCatalogTableDynamicColumnConfig();
        return $commonHelper->getParameter($tableColumnsConfig, 'headers');
    }

    public function templateHoseLineTileTemplateAction(Request $request): Response
    {
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }

        $templateEditable = $this->document->getEditable('tiletemplate');

        $commonHelper = $this->containerInterface->get('app.common_helper');
        $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
        $catalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();

            $footerBgColor = $template->getColor();
            $data = array();
            $blockDes = "";
            $headers = (array)json_decode($template->getHeaderData());
            $headerKeys = array_keys($headers);
            $productsData = array();
            $fertId = array();
            $images = array();

            $brandsList = $this->getBrandsList();

            $this->featuresList = $this->getFeaturesList('en');

            if (is_array($template->getProductsData()) && !empty($template->getProductsData())) {
                foreach ($template->getProductsData() as $k => $row) {
                    $productsData[] = array_combine($headerKeys, $row);
                }
                foreach ($productsData as $k => $row) {
                    $oldMaterialCode = $row['oldMaterialCode'];
                    if (empty($oldMaterialCode) || $oldMaterialCode == "N/A" || strlen($oldMaterialCode) < 14 || (is_array($row['brandName']) && empty($row['brandName']))) {
                        continue;
                    }

                    $baseId = substr($oldMaterialCode, 0, 6);
                    if (!isset($data[$baseId])) {
                        $data[$baseId] = array();
                        $fertId[$baseId] = $row['id'];
                        $images[$baseId] = $row['altImage7'];
                    }

                    if (isset($data[$baseId]) && empty($data[$baseId])) {
                        $data[$baseId]['brandName'] = isset($data[$baseId]['brandName']) && !empty($data[$baseId]['brandName']) ? $data[$baseId]['brandName'] : $row['brandName'];
                       // Picking the first Standard Met Hose (Multiple data is coming pipe separated { || })
                        $data[$baseId]['standardMetHose'] = isset($data[$baseId]['standardMetHose']) && !empty($data[$baseId]['standardMetHose']) 
                        ? explode('||', $data[$baseId]['standardMetHose'])
                        : explode('||', $row['standardMetHose']);
                        $data[$baseId]['BrandShortText'][0] = isset($data[$baseId]['BrandShortText1'][0]) && !empty($data[$baseId]['BrandShortText1'][0]) ? $data[$baseId]['BrandShortText1'][0] : $row['BrandShortText1'];
                        $data[$baseId]['BrandShortText'][1] = isset($data[$baseId]['BrandShortText2'][1]) && !empty($data[$baseId]['BrandShortText2'][1]) ? $data[$baseId]['BrandShortText2'][1] : $row['BrandShortText2'];
                        $data[$baseId]['BrandShortText'][2] = isset($data[$baseId]['BrandShortText3'][2]) && !empty($data[$baseId]['BrandShortText3'][2]) ? $data[$baseId]['BrandShortText3'][2] : $row['BrandShortText3'];
                        $data[$baseId]['BrandShortText'][3] = isset($data[$baseId]['BrandShortText4'][3]) && !empty($data[$baseId]['BrandShortText4'][3]) ? $data[$baseId]['BrandShortText4'][3] : $row['BrandShortText4'];
                        $data[$baseId]['BrandShortText'][4] = isset($data[$baseId]['BrandShortText5'][4]) && !empty($data[$baseId]['BrandShortText5'][4]) ? $data[$baseId]['BrandShortText5'][4] : $row['BrandShortText5'];
                        $data[$baseId]['altImage7'] = isset($row['altImage7']) && !empty($row['altImage7']) ? Asset::getByPath($row['altImage7']) : null;
                        if(is_array($data[$baseId]['brandName'])){
                            if(array_key_exists($data[$baseId]['brandName'][0],$brandsList) && !empty($brandsList[$data[$baseId]['brandName'][0]])){
                                $data[$baseId]['SortOrder'] = $brandsList[$data[$baseId]['brandName'][0]];
                            }else{
                                $data[$baseId]['SortOrder'] = 0;
                            }
                        }else{
                            $data[$baseId]['SortOrder'] = $brandsList[$data[$baseId]['brandName']];
                        }
                        if (!isset($data[$baseId]['featureIcon']) && !empty($row['FeaturesBenefitsBulletPoint'])) {

                            $features = null;
                            if (!is_array($row['FeaturesBenefitsBulletPoint'])) {
                                $features = explode('||', $row['FeaturesBenefitsBulletPoint']);
                            }

                            $featureObj = null;

                            if (is_array($features) && !empty($features)) {
                                $featuresObj = $this->getFiveSortedFeaturesWithIconList($features);
                                foreach($featuresObj as $f){
                                    if($f['iconSrc']){
                                        $data[$baseId]['featureIcon'] = array(
                                            $featuresObj
                                        );
                                    }
                                }
                            }
                            unset(
                                $baseObj,
                                $features,
                                $featureObj
                            );
                        }
                    }
                    if (isset($data[$baseId])) {
                        $data[$baseId]['HoseIDNominalIDFrac'][] = isset($data[$baseId]['HoseIDNominalIDFrac'][$k]) && !empty($data[$baseId]['HoseIDNominalIDFrac'][$k]) ? $data[$baseId]['HoseIDNominalIDFrac'][$k] : $row['HoseIDNominalIDFrac'];
                        $data[$baseId]['hoseIdDec'][] = isset($data[$baseId]['hoseIdDec'][$k]) && !empty($data[$baseId]['hoseIdDec'][$k]) ? $data[$baseId]['hoseIdDec'][$k] : $row['hoseIdDec'];
                    }
                }

                // data set wrt non-repeating brands
                $uniqueBrandData = [];
                $seenBrands = [];

                foreach ($data as $baseId => $details) {
                    $brand = is_array($details['brandName']) ? $details['brandName'][0] : $details['brandName'];
                    
                    if (!in_array($brand, $seenBrands)) {
                        $uniqueBrandData[$baseId] = $details;
                        $seenBrands[] = $brand;
                    }
                }

                // Replace original data with filtered one
                $data = $uniqueBrandData;

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
                }
                if ($data) {
                    array_multisort(array_column($data, 'SortOrder'), SORT_ASC, $data);
                }
                $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);
                

                $parameterBag['info'] = array(
                    'brandsInfo' => $data,
                    'blockDes' => $blockDes,
                    'footer_class' => (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '',
                    'footer_logo_src' => (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange']
                );
            }
        }        
        //p_r($parameterBag);
        return $this->render("catalog/default/template_hose_line_tile_template.html.twig", $parameterBag);
    }

    public function templateHoseProductPageAction(Request $request): Response
    {
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }

        $templateEditable = $this->document->getEditable('inh_template_hose_product_page');

        if ($templateEditable && $templateEditable->getElement() !=null) {
            $template = $templateEditable->getElement();
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $catalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');
            $catalogImagesHYDProduct = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDProduct');
			
			$className = $template->getClassName();
			$catalogLanguage = "";
			if($className == "SpecSheetCatalog"){
				$catalogLanguage = $template->getCatalogLanguage();
			} else {
				$catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
				$catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
				$catalogLanguage = $catalogObj->getCatalogLanguage();
			}

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);

            if ($productsData && $headerData) {
                $headerKeys = array_keys($headerData);
                $headerKeysIndex = array_flip($headerKeys);
                $objColumnsData = $template->getColumns();
                $this->iconRequired = 'YES';
                $this->subHeaderRequired = 'NO';
                $this->columnsData = json_decode($objColumnsData, true);

                $columnsDataWithImages = $this->getColumnHeadersForCatalog(false, []);

                unset($objColumnsData);
				
				if($className == "SpecSheetCatalog"){
				
					$SAPRange = $template->getSAPRange();
					$id = $template->getId();
						$query = "Select * from specsheet_custom_selection where object_id=$id";
						$row = $this->db->fetchAllAssociative($query);
						if(isset($row[0])){
						$exCludes = $row[0]['data'];
						if(!empty($exCludes)){
						$includeArticles = explode(",",$exCludes);

						foreach ($productsData as $key => $productItem) {
							if(!in_array($productItem[$headerKeysIndex['articleNumber']], $includeArticles)){
								unset($productsData[$key]);
							}
						}
						}
						
						}
				
			}

                // Getting order of the keys
                $orderKeys = array();
                foreach ($columnsDataWithImages as $svalue) {
                    foreach ($svalue as $vvalue) {
                        if ($vvalue['columnName'] && isset($headerKeysIndex[$vvalue['columnName']])) {
                            $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                        }
                    }
                }

                $brandsList = $this->getBrandsList();
                $this->featuresList = $this->getFeaturesList($catalogLanguage);

                $standardMetHoseList = $this->getStandardMetHoseList('INH-HYD-HOSE~standardMetHose', $catalogLanguage);

                $catalogGrouping = array();

                foreach ($productsData as $key => $item) {
                    if(gettype($item[$headerKeysIndex['brandName']]) == 'string') {
                        if (isset($item[$headerKeysIndex['CatalogGrouping']]) && isset($item[$headerKeysIndex['brandName']]) && !empty(trim($item[$headerKeysIndex['CatalogGrouping']])) && !empty(trim($item[$headerKeysIndex['brandName']]))) {
                            $catalogGrouping[$item[$headerKeysIndex['CatalogGrouping']]][$item[$headerKeysIndex['brandName']]][] = $item;
                        }
                    }elseif(gettype($item[$headerKeysIndex['brandName']]) == 'array') {
                        if (isset($item[$headerKeysIndex['CatalogGrouping']]) && isset($item[$headerKeysIndex['brandName']])) {
                            $catalogGrouping[$item[$headerKeysIndex['CatalogGrouping']]][$item[$headerKeysIndex['brandName']][0]][] = $item;
                        }
                    }
                }
				$catalogGroupData = [];
                foreach ($catalogGrouping as $catalogKey => $brandsData) {
                    foreach ($brandsData as $brandKey => $brandArray) {
                        $uniqueId = md5($brandKey);
                        $reinforcementStr = '';
                        $virtualCatalogCoverMaterialStr = '';
                        $virtualCatalogTubeMaterialStr = '';
                        $tubeMaterialAtrributeString = '';
                        $coverMaterialattributeString = '';
                        $leftPrintCatalogImageObj = '';
                        $rightPrintCatalogImageObj = '';
                        $longDescription = '';
                        $brandingLayline = '';
                        $temperatureRangeFAndC = '';
                        $virtualCatalogTubeMaterial = '';
                        $virtualCatalogCoverMaterial = '';
                        $virtualCatalogReinforcement = '';
                        $brandName = '';

                        $standardsMetHose = array();
                        $tubeMaterial = array();
                        $tubeAttribute = array();
                        $reinforcement = array();
                        $coverMaterial = array();
                        $coverAttribute = array();
                        $safetyFeatures = array();
                        $articlesData = array();

                        foreach ($brandArray as $key => $element) :

                            $brandName = $element[$headerKeysIndex['brandName']];

                            if (empty($virtualCatalogTubeMaterial) && $element[$headerKeysIndex['VirtualCatalogTubeMaterial']]) {
                                $virtualCatalogTubeMaterial = $element[$headerKeysIndex['VirtualCatalogTubeMaterial']];
                            }

                            if (empty($virtualCatalogCoverMaterial) && $element[$headerKeysIndex['VirtualCatalogCoverMaterial']]) {
                                $virtualCatalogCoverMaterial = $element[$headerKeysIndex['VirtualCatalogCoverMaterial']];
                            }

                            if (empty($virtualCatalogReinforcement) && $element[$headerKeysIndex['VirtualCatalogReinforcement']]) {
                                $virtualCatalogReinforcement = $element[$headerKeysIndex['VirtualCatalogReinforcement']];
                            }

                            if (empty($temperatureRangeFAndC) && $element[$headerKeysIndex['temperatureRangeFAndC']]) {
                                $temperatureRangeFAndC = $element[$headerKeysIndex['temperatureRangeFAndC']];
                            }

                            if (empty($longDescription) && $element[$headerKeysIndex['longDescription']]) {
                                $longDescription = $element[$headerKeysIndex['longDescription']];
                            }

                            if (empty($brandingLayline) && $element[$headerKeysIndex['BrandingLayline']]) {
                                $brandingLayline = $element[$headerKeysIndex['BrandingLayline']];
                            }

                            $leftPrintCatalogImage = $element[$headerKeysIndex['LeftPrintCatalogImage']];
                            if (empty($leftPrintCatalogImageObj) && $leftPrintCatalogImage) {
                                $leftPrintCatalogImageObj = Asset::getByPath($leftPrintCatalogImage);
                            }

                            $rightPrintCatalogImage = $element[$headerKeysIndex['RightPrintCatalogImage']];
                            if (empty($rightPrintCatalogImageObj) && $rightPrintCatalogImage) {
                                $rightPrintCatalogImageObj = Asset::getByPath($rightPrintCatalogImage);
                            }

                            foreach ($element as $bkey => $value) :

                                if ($bkey == $headerKeysIndex['standardMetHose']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }

                                    if ($value && count($value) > 0) {
                                        foreach ($value as $standardMetHoseValue) {
                                            array_push($standardsMetHose, $standardMetHoseValue);
                                        }
                                    }
                                }
                                if ($bkey == $headerKeysIndex['tubeMaterial']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $tubeMaterial = array_merge($tubeMaterial, $value);
                                }

                                if ($bkey == $headerKeysIndex['tubeColor']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $tubeAttribute = array_merge($tubeAttribute, $value);
                                }

                                if ($bkey == $headerKeysIndex['reinforcement']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $reinforcement = array_merge($reinforcement, $value);
                                }

                                if ($bkey == $headerKeysIndex['coverColor']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $coverAttribute = array_merge($coverAttribute, $value);
                                }

                                if ($bkey == $headerKeysIndex['coverMaterial']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $coverMaterial = array_merge($coverMaterial, $value);
                                }

                                if ($bkey == $headerKeysIndex['FeaturesBenefitsBulletPoint']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }

                                    if (count($value) > 0) {
                                        foreach ($value as $feature) {
                                            array_push($safetyFeatures, $feature);
                                        }
                                    }
                                }

                            endforeach;

                            foreach ($orderKeys as $ckey => $cvalue) {
                                if ($ckey == 'HoseFittingFamily') {
                                    $hoseFittingFamilyArr = [];
                                    if (!is_array($element[$headerKeysIndex[$ckey]])) {
                                        $hoseFittingFamilyArr = explode('||', $element[$headerKeysIndex[$ckey]]);
                                    }
                                    $articlesData[$key][] = ($hoseFittingFamilyArr) ? implode(',', ($hoseFittingFamilyArr)) : '';
                                } else {
                                    if ($ckey == 'workingPressurePSI') {
                                        $workingPressureValueArray = explode('.', $element[$headerKeysIndex[$ckey]]);
                                        $element[$headerKeysIndex[$ckey]] = $workingPressureValueArray[0];
                                    }
                                    elseif($ckey == 'workingPressureMPA'){
                                        $element[$headerKeysIndex[$ckey]] = round($element[$headerKeysIndex[$ckey]]);
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
                        if ($standardsMetHose) {
                            foreach ($standardsMetHose as $fvalue) {
                                if (isset($standardMetHoseList[$fvalue])) {
                                    $hoseMetKey = $standardMetHoseList[$fvalue]['key'];
                                    $lowercaseHoseMetKey = strtolower($hoseMetKey);

                                    if ((strpos($lowercaseHoseMetKey, 'flame') !== false) || (strpos($lowercaseHoseMetKey, 'usmsha') !== false) || (strpos($lowercaseHoseMetKey, 'msha') !== false)) {
                                        $standardMetHoseMeetFlameResistence[$hoseMetKey]['name'] = $standardMetHoseList[$fvalue]['name'];
                                        $standardMetHoseMeetFlameResistence[$hoseMetKey]['CustomerFacingVersion'] = 'Meets Flame Resistance';
                                    } else {
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

                        $virtualCatalogTubeMaterialStr = strip_tags($virtualCatalogTubeMaterial, "<ul><li><span><strong>");
                        if (empty($virtualCatalogTubeMaterialStr)) {
                            $virtualCatalogTubeMaterialStr = $tubeMaterialAtrributeString;
                        }

                        $virtualCatalogCoverMaterialStr = strip_tags($virtualCatalogCoverMaterial, "<ul><li><span><strong>");
                        if (empty($virtualCatalogCoverMaterialStr)) {
                            $virtualCatalogCoverMaterialStr = $coverMaterialattributeString;
                        }

                        $reinforcementStr = strip_tags($virtualCatalogReinforcement, "<ul><li><span><strong>");
                        if (empty($reinforcementStr)) {
                            $reinforcementStr = $reinforcement;
                        }


                        unset($tubeMaterial);
                        unset($tubeAttribute);
                        unset($coverMaterial);
                        unset($coverAttribute);
                        unset($standardsMetHose);
                        unset($tubeMaterialAtrributeArr);
                        unset($coverMaterialattributeArr);

                        $data[$uniqueId]['brandName'] = $brandName;
                        $data[$uniqueId]['LeftPrintCatalogImageObj'] = $leftPrintCatalogImageObj;
                        $data[$uniqueId]['RightPrintCatalogImageObj'] = $rightPrintCatalogImageObj;
                        $data[$uniqueId]['longDescription'] = $longDescription;
                        $data[$uniqueId]['BrandingLayline'] = $brandingLayline;
                        $data[$uniqueId]['temperatureRangeFAndC'] = $temperatureRangeFAndC;
                        $data[$uniqueId]['reinforcement'] = $reinforcementStr;
                        $data[$uniqueId]['tubeMaterialAtrributeString'] = $virtualCatalogTubeMaterialStr;
                        $data[$uniqueId]['coverMaterialattributeString'] = $virtualCatalogCoverMaterialStr;
                        $data[$uniqueId]['standardMetHoseListData'] = $standardMetHoseListData;
                        $data[$uniqueId]['standardMetHoseMeetFlameResistence'] = $standardMetHoseMeetFlameResistence;
                        $data[$uniqueId]['safetyFeatures'] = $safetyFeaturesList;
                        $data[$uniqueId]['iconRequired'] = $this->iconRequired;
                        $data[$uniqueId]['subHeaderRequired'] = $this->subHeaderRequired;
                        $data[$uniqueId]['columnsDataWithImages'] = $columnsDataWithImages;


                        if ($articlesData && $className != "SpecSheetCatalog") {
                            array_multisort(array_column($articlesData, $headerKeysIndex['hoseOdIn']), SORT_ASC, $articlesData);
                        }

                        $data[$uniqueId]['articlesData'] = $articlesData;

                        if(gettype($brandName) == 'array'){
                            if(array_key_exists($brandName[0],$brandsList)){
                                $data[$uniqueId]['SortOrder'] = (isset($brandsList[$brandName[0]])) ? $brandsList[$brandName[0]]:null;
                            }
                        }elseif(gettype($brandName) == 'string'){
                            $data[$uniqueId]['SortOrder'] = $brandsList[$brandName];
                        }

                    }

                    if ($data) {
                        array_multisort(array_column($data, 'SortOrder'), SORT_ASC, $data);
                    }

                    $catalogGroupData[$catalogKey] = $data;
                    unset($data);
                }

                $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

                $branding_image_src = $this->getS3ImageSrc($catalogImagesHYDProduct['BrandingImage']);

                $parameterBag['data'] = $catalogGroupData;
                $parameterBag['branding_image_src'] = $branding_image_src;
                $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
                $parameterBag['footer_logo_src'] = $footer_logo_src;
                $tableClass = \AppBundle\Helper\Common::cleanString( $this->document->getKey());
                $parameterBag['table_class']= $tableClass;
            }
        }
								//echo "<pre/>"; print_r($parameterBag); die;

        return $this->render("catalog/default/template_hose_product_page.html.twig", $parameterBag);
    }

    public function templateHoseAccessoriesSleevingAction(Request $request): Response
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }

        $templateEditable = $this->document->getEditable('template_hose_accessories_sleeving');

        if ($templateEditable && $templateEditable->getElement() !=null) {
            $template = $templateEditable->getElement();
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $catalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $catalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);
            $headerKeys = array_keys($headerData);

            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $template->getColumns();
            $this->iconRequired = 'NO';
            $this->subHeaderRequired = 'NO';
            $this->columnsData = json_decode($objColumnsData, true);
            $this->featuresList = $this->getFeaturesList($catalogLanguage);

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(false, []);

            unset($objColumnsData);

            $orderKeys = array();
            foreach ($columnsDataWithImages as $svalue) {
                foreach ($svalue as $vvalue) {
                    if(isset($orderKeys[$vvalue['columnName']]) && isset($headerKeysIndex[$vvalue['columnName']])) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                    }
                }
            }

            $brandsList = $this->getBrandsList();

            $brandsData = array();
            if ($productsData) {
                foreach ($productsData as $key => $item) {
                    if (!empty(trim($item[$headerKeysIndex['brandName']]))) {
                        $brandsData[$item[$headerKeysIndex['brandName']]][] = $item;
                    }
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

                    foreach ($brandArray as $key => $element) :

                        $brandName = $element[$headerKeysIndex['brandName']];

                        if (empty($imageObj) && $element[$headerKeysIndex['mainImage']]) {
                            $imageObj = Asset::getByPath($element[$headerKeysIndex['mainImage']]);
                        }

                        if (empty($longDescription) && $element[$headerKeysIndex['longDescription']]) {
                            $longDescription = $element[$headerKeysIndex['longDescription']];
                        }

                        if (empty($temperatureRangeFAndC) && $element[$headerKeysIndex['temperatureRangeFAndC']]) {
                            $temperatureRangeFAndC = $element[$headerKeysIndex['temperatureRangeFAndC']];
                        }

                        foreach ($element as $bkey => $value) :
                            if ($bkey == $headerKeysIndex['FeaturesBenefitsBulletPoint']) {
                                $fbvalue = explode('||', $value);
                                if (count($fbvalue) > 0) {
                                    foreach ($fbvalue as $feature) {
                                        if ($feature) {
                                            array_push($safetyFeatures, $feature);
                                        }
                                    }
                                }
                            }
                            if (($bkey == $headerKeysIndex['MaterialType']) && is_array($value)) {
                                $material = array_merge($material, $value);
                            }
                            if (($bkey == $headerKeysIndex['Color']) && is_array($value)) {
                                $color = array_merge($color, $value);
                            }
                            if ($bkey == $headerKeysIndex['LengthIN']) {
                                $availableLength[] = $value;
                            }
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

                    if ($articlesData) {
                        array_multisort(array_column($articlesData, 'SleevingIDInDecimal'), SORT_ASC, $articlesData);
                    }

                    $data[$uniqueId]['articlesData'] = $articlesData;
                    $data[$uniqueId]['SortOrder'] = $brandsList[$brandName];
                }

                if ($data) {
                    array_multisort(array_column($data, 'SortOrder'), SORT_ASC, $data);
                }
            }

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            if(isset($data)){
                $parameterBag['data'] = $data;
            }

            $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("catalog/default/template_hose_accessories_sleeving.html.twig", $parameterBag);
    }

    public function templateHoseAccessoriesClampsAction(Request $request)
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }

        $templateEditable = $this->document->getEditable('template_hose_accessories_clamps');

        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $catalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);
            $headerKeys = array_keys($headerData);

            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $template->getColumns();
            $this->iconRequired = 'NO';
            $this->subHeaderRequired = 'NO';
            $this->columnsData = json_decode($objColumnsData, true);

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(false, []);

            unset($objColumnsData);

            $orderKeys = array();
            foreach ($columnsDataWithImages as $svalue) {
                foreach ($svalue as $vvalue) {
                    if (isset($headerKeysIndex[$vvalue['columnName']])) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                    }
                }
            }

            $brandsData = array();

            foreach ($productsData as $key => $item) {
                if (!empty(trim($item[$headerKeysIndex['brandName']]))) {
                    $brandsData[$item[$headerKeysIndex['brandName']]][] = $item;
                }
            }

            foreach ($brandsData as $brandKey => $brandArray) {

                $brandName = '';
                $imageObj = '';
                $longDescription = '';
                $material = array();
                $articlesData = array();

                foreach ($brandArray as $key => $element) :

                    $brandName = $element[$headerKeysIndex['brandName']];

                    if (empty($imageObj) && $element[$headerKeysIndex['mainImage']]) {
                        $imageObj = Asset::getByPath($element[$headerKeysIndex['mainImage']]);
                    }

                    if (empty($longDescription) && $element[$headerKeysIndex['longDescription']]) {
                        $longDescription = $element[$headerKeysIndex['longDescription']];
                    }

                    foreach ($element as $bkey => $value) :

                        if (($bkey == $headerKeysIndex['MaterialType']) && is_array($value)) {
                            $material = array_merge($material, $value);
                        }

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
                $data[$uniqueId]['articlesData'] = isset($articlesData) ? $articlesData : null;
            }

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterBag['data'] = isset($data) ? $data : null;
            $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("catalog/default/template_hose_accessories_clamps.html.twig", $parameterBag);
    }

    public function templateHoseAccessoriesOringAction(Request $request)
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }
        $templateEditable = $this->document->getEditable('template_hose_accessories_oring');

        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();

            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $catalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $catalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);
            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $template->getColumns();
            $this->iconRequired = 'NO';
            $this->subHeaderRequired = 'NO';
            $this->columnsData = json_decode($objColumnsData, true);

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(false, []);

            unset($objColumnsData);

            // Getting order of the keys
            $orderKeys = array();
            foreach ($columnsDataWithImages as $svalue) {
                foreach ($svalue as $vvalue) {
                    if (isset($headerKeysIndex[$vvalue['columnName']])) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                    }
                }
            }

            $material = array();
            $brandData = array();
            $hardness = array();
            $imageObj = '';
            $temperatureRangeFAndC = '';

            $materialList = $this->getStandardMetHoseList('HYD_ACCESSORIES~MaterialType', $catalogLanguage);

            if ($productsData) {
                foreach ($productsData as $item) {
                    if (!empty(trim($item[$headerKeysIndex['brandName']]))) {
                        $brandName = $item[$headerKeysIndex['brandName']];

                        if ($item[$headerKeysIndex['MaterialType']] && is_array($item[$headerKeysIndex['MaterialType']])) {
                            $material = array_merge($material, $item[$headerKeysIndex['MaterialType']]);
                        }

                        if ($item[$headerKeysIndex['Hardness']]) {
                            $hardness[] = $item[$headerKeysIndex['Hardness']];
                        }

                        if ($item[$headerKeysIndex['temperatureRangeFAndC']] && empty($temperatureRangeFAndC)) {
                            $temperatureRangeFAndC = $item[$headerKeysIndex['temperatureRangeFAndC']];
                        }

                        if (!$imageObj && $item[$headerKeysIndex['mainImage']]) {
                            $imageObj = Asset::getByPath($item[$headerKeysIndex['mainImage']]);
                        }

                        $uniqueId = md5($brandName);
                        $brandData[$uniqueId]['brandName'] = $brandName;
                        $brandData[$uniqueId]['iconRequired'] = $this->iconRequired;
                        $brandData[$uniqueId]['columnsDataWithImages'] = $columnsDataWithImages;
                        $brandData[$uniqueId]['subHeaderRequired'] = $this->subHeaderRequired;

                        $articlesData = array();

                        foreach ($orderKeys as $cvalue) {
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
            foreach ($material as $value) {
                if (isset($materialList[$value])) {
                    $materialArray[] = $materialList[$value]['name'];
                }
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

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterBag['data'] = $data;
            $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("catalog/default/template_hose_accessories_oring.html.twig", $parameterBag);
    }

    public function templateTableOfContentsAction(Request $request): Response
    {
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }        return $this->render('catalog/default/template_table_of_contents.html.twig', $parameterBag);
    }

    public function templateHydraulicTableOfContentsDynamicAction(Request $request)
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }
        try {
            $folderId = $this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'catalog/default/template_part_number_designations.html.twig',
                'catalog/fitting/hydraulic_fitting.html.twig',
            ];

            $hydraulicHose[] = 'HYDRAULIC HOSE';
            $hydraulicFitting[] = 'HYDRAULIC FITTINGS';
            $allFittingData = [];

            foreach ($listing as $doc) {
                if ($doc->hasChildren()) {

                    foreach ($doc->getChildren() as $childDoc) {

                        if ($childDoc->hasChildren()) {
                            foreach ($childDoc->getChildren() as $child2Doc) {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {

                                    if ($child2Doc->getTemplate() == 'catalog/default/template_part_number_designations.html.twig') {
                                        $obj = $child2Doc->getEditable('hydraulic_hose_details');
                                        if (!empty($obj) && !empty($obj->getData())) {

                                            $hydraulicHoseData = explode(PHP_EOL, $obj->getData());
                                            $hydraulicHoseInnerData = [];
                                            if ($hydraulicHoseData) {
                                                foreach ($hydraulicHoseData as $value) {
                                                    $data = [];
                                                    $hydraulicHostList = explode('$$', $value);
                                                    $hydraulicHostKey = $hydraulicHostList[0];
                                                    $hydraulicHostValue = explode(',', $hydraulicHostList[1]);
                                                    $data[] = $hydraulicHostKey;
                                                    $data[] = $hydraulicHostValue;
                                                    $hydraulicHoseInnerData[] = $data;
                                                }
                                                $hydraulicHose[] = $hydraulicHoseInnerData;
                                            }
                                        }
                                    } elseif ($child2Doc->getTemplate() == 'catalog/fitting/hydraulic_fitting.html.twig') {
                                        $obj = $child2Doc->getEditable('hydraulic_fitting_brand');
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
                        } else {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {

                                if ($childDoc->getTemplate() == 'catalog/default/template_part_number_designations.html.twig') {
                                    $obj = $childDoc->getEditable('hydraulic_hose_details');
                                    if (!empty($obj) && !empty($obj->getData())) {

                                        $hydraulicHoseData = explode(PHP_EOL, $obj->getData());
                                        $hydraulicHoseInnerData = [];
                                        if ($hydraulicHoseData) {
                                            foreach ($hydraulicHoseData as $value) {
                                                $data = [];
                                                $hydraulicHostList = explode('$$', $value);
                                                $hydraulicHostKey = $hydraulicHostList[0];
                                                $hydraulicHostValue = explode(',', $hydraulicHostList[1]);
                                                $data[] = $hydraulicHostKey;
                                                $data[] = $hydraulicHostValue;
                                                $hydraulicHoseInnerData[] = $data;
                                            }
                                            $hydraulicHose[] = $hydraulicHoseInnerData;
                                        }
                                    }
                                } elseif ($childDoc->getTemplate() == 'catalog/fitting/hydraulic_fitting.html.twig') {
                                    $obj = $childDoc->getEditable('hydraulic_fitting_brand');
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
                } else {

                    if (in_array($doc->getTemplate(), $templateArray)) {
                        if ($doc->getTemplate() == 'catalog/default/template_part_number_designations.html.twig') {
                            $obj = $doc->getEditable('hydraulic_hose_details');
                            if (!empty($obj) && !empty($obj->getData())) {

                                $hydraulicHoseData = explode(PHP_EOL, $obj->getData());
                                $hydraulicHoseInnerData = [];
                                if ($hydraulicHoseData) {
                                    foreach ($hydraulicHoseData as $value) {
                                        $data = [];
                                        $hydraulicHostList = explode('$$', $value);
                                        $hydraulicHostKey = $hydraulicHostList[0];
                                        $hydraulicHostValue = explode(',', $hydraulicHostList[1]);
                                        $data[] = $hydraulicHostKey;
                                        $data[] = $hydraulicHostValue;
                                        $hydraulicHoseInnerData[] = $data;
                                    }
                                    $hydraulicHose[] = $hydraulicHoseInnerData;
                                }
                            }
                        } elseif ($doc->getTemplate() == 'catalog/fitting/hydraulic_fitting.html.twig') {
                            $obj = $doc->getEditable('hydraulic_fitting_brand');
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

            if (!empty($allFittingData)) {
                $hydraulicFitting[] = $allFittingData;
            }

            $dynamicPageData = [];
            if ($hydraulicHose) {
                $dynamicPageData[] = $hydraulicHose;
            }
            if ($hydraulicFitting) {
                $dynamicPageData[] = $hydraulicFitting;
            }
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }

        $parameterBag['data'] = $dynamicPageData;
        return $this->render("catalog/default/template_hydraulic_table_of_contents_dynamic.html.twig", $parameterBag);
    }

    public function templatePartNumberDesignationsAction(Request $request)
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }
        $templatesEditable = $this->document->getEditable('page_number_designations');

        $hydraulic_hose_data = [];
        $footerBgColor = '';
        if ($templatesEditable && $templatesEditable->getElements() != null) {
            $templates = $templatesEditable->getElements();
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $catalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogGrouping = array();
            foreach ($templates as $key => $template) {
                if (empty(trim($footerBgColor))) {
                    $footerBgColor = $template->getColor();
                }

                $productsData = $template->getProductsData();
                $headerData = json_decode($template->getHeaderData(), true);

                if ($headerData && $productsData) {
                    $headerKeys = array_keys($headerData);
                    foreach ($productsData as $key => $item) {
                        $productsDataWithHeaders = array_combine($headerKeys, $item);
                        if (!empty(trim($productsDataWithHeaders['CatalogGrouping'])) && !empty(trim($productsDataWithHeaders['brandName'][0]))) {
                            $hydraulic_hose_data[$productsDataWithHeaders['CatalogGrouping']][$productsDataWithHeaders['brandName'][0]] = $productsDataWithHeaders['brandName'][0];
                            $catalogGrouping[$productsDataWithHeaders['CatalogGrouping']][$productsDataWithHeaders['brandName'][0]][] = $productsDataWithHeaders['industryStandard'];
                        }
                    }
                }
            }
        }

        $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
        $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

        $parameterBag['data'] = $catalogGrouping;
        $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
        $parameterBag['footer_logo_src'] = $footer_logo_src;

        $hydraulic_hose_data_list = [];
        foreach ($hydraulic_hose_data as $key => $value) {
            $hydraulic_hose_data_list[] = $key . "$$" . implode(',', $value);
        }

        $hydraulic_hose_details_text = '';
        if ($hydraulic_hose_data_list) {
            $hydraulic_hose_details_text = implode(PHP_EOL, $hydraulic_hose_data_list);
        }

        $parameterBag['hydraulic_hose_details_text'] = $hydraulic_hose_details_text;

        return $this->render("catalog/default/template_part_number_designations.html.twig", $parameterBag);
    }

    public function templateHoseSubCoverAction(Request $request): Response
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }
        $templateEditable = $this->document->getEditable('template_hose_product_page');

        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $catalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $catalogLanguage = $catalogObj->getCatalogLanguage();
            $standardMetHoseList = $this->getStandardMetHoseList('INH-HYD-HOSE~standardMetHose', $catalogLanguage);

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);

            $brandsList = $this->getBrandsList();
            $catalogGrouping = array();

            if ($headerData && $productsData) {
                $headerKeys = array_keys($headerData);
                $headerKeysIndex = array_flip($headerKeys);

                foreach ($productsData as $item) {
                    if (!empty(trim($item[$headerKeysIndex['CatalogGrouping']])) && !empty(trim($item[$headerKeysIndex['brandName']]))) {
                        $catalogGrouping[$item[$headerKeysIndex['CatalogGrouping']]][$item[$headerKeysIndex['brandName']]][] = $item;
                    }
                }

                $catalogGroupData = array();
                foreach ($catalogGrouping as $catalogKey => $brandsData) {
                    foreach ($brandsData as $brandKey => $brandArray) {
                        $uniqueId = md5($brandKey);
                        $virtualCatalogTubeMaterialStr = '';
                        $reinforcementStr = '';
                        $virtualCatalogTubeMaterial = '';
                        $virtualCatalogReinforcement = '';
                        $catalogGrouping = '';
                        $catalogPackaging = '';
                        $rangeTemperatureF = '';
                        $constructionType = '';

                        $tubeMaterial = array();
                        $reinforcement = array();
                        $workingPressurePSI = array();
                        $fittingFamily = array();
                        $industryStandardKey = array();
                        $industryStandard = array();

                        foreach ($brandArray as $element) :

                            $brandName = $element[$headerKeysIndex['brandName']];

                            if (empty($catalogPackaging) && $element[$headerKeysIndex['Packaging']]) {
                                $catalogPackaging = $element[$headerKeysIndex['Packaging']];
                            }

                            if (empty($virtualCatalogTubeMaterial) && $element[$headerKeysIndex['VirtualCatalogTubeMaterial']]) {
                                $virtualCatalogTubeMaterial = $element[$headerKeysIndex['VirtualCatalogTubeMaterial']];
                            }

                            if (empty($virtualCatalogReinforcement) && $element[$headerKeysIndex['VirtualCatalogReinforcement']]) {
                                $virtualCatalogReinforcement = $element[$headerKeysIndex['VirtualCatalogReinforcement']];
                            }

                            if (empty($catalogGrouping) && $element[$headerKeysIndex['CatalogGrouping']]) {
                                $catalogGrouping = $element[$headerKeysIndex['CatalogGrouping']];
                            }

                            if (empty($rangeTemperatureF) && $element[$headerKeysIndex['rangeTemperatureF']]) {
                                $rangeTemperatureF = $element[$headerKeysIndex['rangeTemperatureF']];
                            }

                            if (empty($constructionType) && $element[$headerKeysIndex['siopFullCode']]) {
                                $entries = new DataObject\ProductCategory\Listing();
                                $entries->setCondition("fullCode LIKE ?", $element[$headerKeysIndex['siopFullCode']]);
                                $entries->load();
                                foreach ($entries as $entry) {
                                    $constructionType = $entry->getConstructionType();
                                }
                            }

                            foreach ($element as $bkey => $value) :

                                if ($bkey == $headerKeysIndex['tubeMaterial']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $tubeMaterial = array_merge($tubeMaterial, $value);
                                }

                                if ($bkey == $headerKeysIndex['reinforcement']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $reinforcement = array_merge($reinforcement, $value);
                                }

                                if ($value && isset($headerKeysIndex['workingPressurePSI']) && ($bkey == $headerKeysIndex['workingPressurePSI'])) {
                                    $workingPressureValueArray = explode('.', $value);
                                    $workingPressurePSI[] = $workingPressureValueArray[0];
                                }
                                if (isset($headerKeysIndex['HoseFittingFamily']) && ($bkey == $headerKeysIndex['HoseFittingFamily']) && $value) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $fittingFamily = array_merge($fittingFamily, $value);
                                }

                                if ($bkey == $headerKeysIndex['standardMetHose']) {
                                    if (!is_array($value)) {
                                        $value = explode('||', $value);
                                    }
                                    $industryStandardKey = array_merge($industryStandardKey, $value);
                                }


                            endforeach;

                        endforeach;

                        $tubeMaterial = array_unique($tubeMaterial);
                        $reinforcement = array_unique($reinforcement);
                        $workingPressurePSI = array_unique($workingPressurePSI);
                        $fittingFamily = array_unique($fittingFamily);
                        $industryStandardKey = array_unique($industryStandardKey);

                        foreach ($industryStandardKey as $industryStandardName) {
                            if ($industryStandardName && isset($standardMetHoseList[$industryStandardName])) {
                                $industryStandard[] = $standardMetHoseList[$industryStandardName]['name'];
                            }
                        }

                        $workingPressurePSIString = "";
                        if ($workingPressurePSI) {
                            $minWorkingPressurePSI = min($workingPressurePSI);
                            $maxWorkingPressurePSI = max($workingPressurePSI);
                            if ($minWorkingPressurePSI == $maxWorkingPressurePSI) {
                                $workingPressurePSIString = $minWorkingPressurePSI;
                            } else {
                                $workingPressurePSIString = $minWorkingPressurePSI . "-" . $maxWorkingPressurePSI;
                            }
                        }

                        $tubeMaterialAtrributeString = implode(', ', $tubeMaterial);
                        $reinforcement = implode(', ', $reinforcement);
                        $fittingFamily = implode(', ', $fittingFamily);
                        $industryStandard = implode(', ', $industryStandard);

                        $virtualCatalogTubeMaterialStr = strip_tags($virtualCatalogTubeMaterial, "<ul><li><span><strong>");
                        if (empty($virtualCatalogTubeMaterialStr)) {
                            $virtualCatalogTubeMaterialStr = $tubeMaterialAtrributeString;
                        }

                        $reinforcementStr = strip_tags($virtualCatalogReinforcement, "<ul><li><span><strong>");
                        if (empty($reinforcementStr)) {
                            $reinforcementStr = $reinforcement;
                        }

                        $data[$uniqueId]['brandName'] = $brandName;
                        $data[$uniqueId]['rangeTemperatureF'] = $rangeTemperatureF;
                        $data[$uniqueId]['reinforcement'] = $constructionType;
                        $data[$uniqueId]['fittingFamily'] = $fittingFamily;
                        $data[$uniqueId]['industryStandard'] = $industryStandard;
                        $data[$uniqueId]['CatalogGrouping'] = $catalogGrouping;
                        $data[$uniqueId]['workingPressurePSIString'] = $workingPressurePSIString;
                        $data[$uniqueId]['tubeMaterialAtrributeString'] = $virtualCatalogTubeMaterialStr;
                        $data[$uniqueId]['CatalogPackaging'] = $catalogPackaging;
                        $data[$uniqueId]['SortOrder'] = $brandsList[$brandName];
                    }

                    if ($data) {
                        array_multisort(array_column($data, 'SortOrder'), SORT_ASC, $data);
                    }

                    $catalogGroupData[$catalogKey] = $data;
                    unset($data);
                }
            }

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterBag['data'] = $catalogGroupData;
            $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("catalog/default/template_hose_sub_cover.html.twig", $parameterBag);
    }

    public function templateFittingSplitFlangesAction(Request $request): Response
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }
        $catalogTableObject = $this->document->getEditable('template_hose_accessories_flanges');
        $footer_logo_src = '';
        $footerBgColor = '';
        $data = '';
        if ($catalogTableObject && $catalogTableObject->getElement() != null) {
            $catalogTableObjectElement = $catalogTableObject->getElement();

            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $catalogImagesHYDFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $footerBgColor = $catalogTableObjectElement->getColor();
            $productsData = $catalogTableObjectElement->getProductsData();
            $headerData = json_decode($catalogTableObjectElement->getHeaderData(), true);
            $headerKeys = array_keys($headerData);

            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $catalogTableObjectElement->getColumns();
            $this->iconRequired = 'YES';
            $this->subHeaderRequired = 'NO';
            $this->columnsData = json_decode($objColumnsData, true);

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(false, []);
            unset($objColumnsData);

            $orderKeys = array();
            foreach ($columnsDataWithImages as $svalue) {
                foreach ($svalue as $vvalue) {
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
                    if (!empty(trim($item[$headerKeysIndex['brandName']]))) {
                        $brandsData[$item[$headerKeysIndex['brandName']]][] = $item;
                    }
                }

                foreach ($brandsData as $brandKey => $brandArray) {
                    $uniqueId = md5($brandKey);
                    $brandName = '';
                    $imageObj = '';
                    $shortDescription = '';

                    foreach ($brandArray as $key => $element) :

                        $brandName = $element[$headerKeysIndex['brandName']];

                        if (empty($imageObj) && isset($headerKeysIndex['mainImage']) && $element[$headerKeysIndex['mainImage']]) {
                            $imageObj = Asset::getByPath($element[$headerKeysIndex['mainImage']]);
                        }

                        if (empty($shortDescription) && $element[$headerKeysIndex['shortDescription']]) {
                            $shortDescription = $element[$headerKeysIndex['shortDescription']];
                        }

                        foreach ($orderKeys as $ckey => $cvalue) {
                            $articlesData[$key][$ckey] = $element[$headerKeysIndex[$ckey]];
                        }

                    endforeach;

                    $data[$uniqueId]['brandName'] = $brandName;
                    $data[$uniqueId]['imageObj'] = $imageObj;
                    $data[$uniqueId]['shortDescription'] = $shortDescription;
                    $data[$uniqueId]['columnsDataWithImages'] = $columnsDataWithImages;
                    $data[$uniqueId]['articlesData'] = $articlesData;
                    $data[$uniqueId]['SortOrder'] = $brandsList[$brandName];
                }

                if ($data) {
                    array_multisort(array_column($data, 'SortOrder'), SORT_ASC, $data);
                }
            }

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterBag['iconRequired'] = $this->iconRequired;
            $parameterBag['subHeaderRequired'] = $this->subHeaderRequired;
        }
        $parameterBag['data'] = $data;
        $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
        $parameterBag['footer_logo_src'] = $footer_logo_src;

        return $this->render("catalog/default/template_fitting_split_flanges.html.twig", $parameterBag);
    }

    public function containerAction(Request $request): Response
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }
        $allChildren = [];

        //prepare children for include
        foreach ($this->document->getAllChildren() as $child) {
            if ($child instanceof \Pimcore\Model\Document\Hardlink) {
                $child = \Pimcore\Model\Document\Hardlink\Service::wrap($child);
            }
            $allChildren[] = $child;
        }

        $parameterBag['allChildren'] = $allChildren;
        return $this->render('catalog/default/container.html.twig', $parameterBag);
    }

    public function getFeaturesList($language): array
    {
        $entries = new DataObject\Features\Listing();
        $entries->load();
        $featureData = array();
        foreach ($entries as $entry) {
            if ($entry->getIcon()) {
                $featureData[$entry->getId()]['icon'] = $entry->getIcon()->getPath() . $entry->getIcon()->getFilename();
            }

            $featureData[$entry->getId()]['name'] = $entry->getName($language);
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['SortOrder'] = $entry->getSortOrder();
        }
        return $featureData;
    }

    public function getStandardMetHoseList($catalog_type, $language): array
    {
        $entries = new DataObject\MultiselectMaster\Listing();
        $entries->setCondition("masterType = ?", "{$catalog_type}");
        $entries->load();
        $featureData = array();
        foreach ($entries as $entry) {
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['name'] = $entry->getName($language);
            $featureData[$entry->getId()]['Description'] = $entry->getDescription($language);
            $featureData[$entry->getId()]['CustomerFacingVersion'] = $entry->getCustomerFacingVersion($language);
        }
        return $featureData;
    }

    public function getBrandsList(): ?array
    {
        $query = "select name, SortOrder from object_query_3";
        return $this->db->fetchAllKeyValue($query);
    }

    public function templatePtgProductPageAction(Request $request): Response
    {
        $templateEditable = $this->document->getEditable('ptg_product_page');

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }
        $groupData = array();
        $footerBgColor = null;
        $footer_logo_src = null;

        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();
            $commonHelper = $this->containerInterface->get('app.common_helper');
            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $priceListTableConfig = $this->containerInterface->get('app.config_provider_service')->getPriceListTableConfig();

            $priceListTableColumn = $commonHelper->getParameter($priceListTableConfig, 'priceListTableColumn');
            $priceListCurrency = $commonHelper->getParameter($priceListTableConfig, 'priceListCurrency');
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $catalogImagesPTGFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesPTGFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());

            $isPriceCatalog = $catalogObj->getIsPriceCatalog();
            $catalogLanguage = $catalogObj->getCatalogLanguage();
            $distributionChannel = $catalogObj->getDistributionChannel();
            $salesOrganisation = $catalogObj->getSalesOrganisation();
            $currency = $catalogObj->getCurrency();
            $validFromDate = $catalogObj->getValidFromDate();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);

            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $template->getColumns();


            $this->iconRequired = 'YES';
            $this->columnsData = json_decode($objColumnsData, true);

            if ($isPriceCatalog) {
                $this->columnsData['listPrice']['columnName'] = 'listPrice';
                $this->columnsData['listPrice']['columnLabel'] = 'listPrice';
                $this->columnsData['listPrice']['unitName'] = $priceListCurrency[$currency];
            }

            $this->subHeaderRequired = 'NO';

            $columnsDataWithImages = $this->getColumnHeadersForCatalog(false, []);

            unset($objColumnsData);

            // Getting order of the keys
            $orderKeys = array();
            foreach ($columnsDataWithImages as $svalue) {
                foreach ($svalue as $vvalue) {
                    if ($vvalue['columnName'] == 'listPrice'){
                        $orderKeys[$vvalue['columnName']] = count($headerKeysIndex);
                    }else{
                        if (isset($headerKeysIndex[$vvalue['columnName']])) {
                            $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                        }
                    }
                }
            }

            $this->featuresList = $this->getFeaturesList($catalogLanguage);

            $materialList = $this->getStandardMetHoseList('PTG~material', $catalogLanguage);

            $query = "select oo_id, Level, description, PrintedCatalogDescription ";
            $query .= "from object_localized_2_{$catalogLanguage} where level IN (3,4,5,6) ";

            $categories = $this->db->fetchAllAssociative($query);

            $categoriesList = array();

            foreach ($categories as $value) {
                $categoriesList[$value['oo_id']] = $value;
            }
            unset($categories);

            $catagoryDescription = array();
            $mainImageObj = '';
            $profileDimensionImageObj = '';
            $material = array();
            $reinforcement = array();
            $longDescription = '';
            $temperatureRangeFAndC = '';
            $virtualCatalogReinforcement = '';
            $safetyFeatures = array();

            if ($productsData) {
                foreach ($productsData as $item) {
                    $query = "select SIOPLevel3, SIOPLevel4, SIOPLevel5, SIOPLevel6, priceData from object_query_1 where oo_id = '" . $item[$headerKeysIndex['id']] . "'";

                    $record = $this->db->fetchAssociative($query);
                    $siopLevel3 = trim($record['SIOPLevel3'], ',');
                    $siopLevel4 = trim($record['SIOPLevel4'], ',');
                    $siopLevel5 = trim($record['SIOPLevel5'], ',');
                    $siopLevel6 = trim($record['SIOPLevel6'], ',');

                    $siop6Category = !empty($categoriesList[$siopLevel6]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel6]['PrintedCatalogDescription'] : $categoriesList[$siopLevel6]['description'];
                    $siop6Category = trim($siop6Category);

                    if ($siop6Category) {
                        if (!isset($catagoryDescription['SIOP3Description']) && $siopLevel3) {
                            $catagoryDescription['SIOP3Description'] = !empty($categoriesList[$siopLevel3]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel3]['PrintedCatalogDescription'] : $categoriesList[$siopLevel3]['description'];
                        }

                        if (!isset($catagoryDescription['SIOP4Description']) && $record['SIOPLevel4']) {
                            $catagoryDescription['SIOP4Description'] = !empty($categoriesList[$siopLevel4]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel4]['PrintedCatalogDescription'] : $categoriesList[$siopLevel4]['description'];
                        }

                        if (!isset($catagoryDescription['SIOP5Description']) && $record['SIOPLevel5']) {
                            $catagoryDescription['SIOP5Description'] = !empty($categoriesList[$siopLevel5]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel5]['PrintedCatalogDescription'] : $categoriesList[$siopLevel5]['description'];
                        }

                        $listPrice = '';

                        if ($record['priceData']) {
                            $recordArray = explode(PHP_EOL, $record['priceData']);

                            if (count($recordArray)) {

                                foreach ($recordArray as $rvalue) {
                                    $pvalue = explode('|', $rvalue);
                                    if (($pvalue[$priceListTableColumn['Rate Unit']] == $currency) && ($pvalue[$priceListTableColumn['Distribution Channel']] == $distributionChannel) && ($pvalue[$priceListTableColumn['Sales Organization']] == $salesOrganisation)) {
                                        $validityStartDate = \Carbon\Carbon::createFromFormat('Y-m-d', $pvalue[$priceListTableColumn['Validity Start Date']]);
                                        $validityEndDate = \Carbon\Carbon::createFromFormat('Y-m-d', $pvalue[$priceListTableColumn['Validity End Date']]);

                                        if ($validFromDate->between($validityStartDate, $validityEndDate)) {
                                            $listPrice = $pvalue[$priceListTableColumn['Rate']];
                                            break;
                                        }
                                    }
                                }
                            }
                        }

                        if (!$mainImageObj && $item[$headerKeysIndex['mainImage']]) {
                            $mainImageObj = Asset::getByPath($item[$headerKeysIndex['mainImage']]);
                        }

                        if (!$profileDimensionImageObj && $item[$headerKeysIndex['ProfileDimensionImage']]) {
                            $profileDimensionImageObj = Asset::getByPath($item[$headerKeysIndex['ProfileDimensionImage']]);
                        }

                        if ($item[$headerKeysIndex['material']]) {
                            $arr_material = [];

                            if (!is_array($item[$headerKeysIndex['material']])) {
                                $arr_material = explode('||', $item[$headerKeysIndex['material']]);
                            }
                            $material = array_merge($material, $arr_material);
                        }
                        if ($item[$headerKeysIndex['reinforcement']]) {
                            $arr_reinforcement = [];
                            if (!is_array($item[$headerKeysIndex['reinforcement']])) {
                                $arr_reinforcement = explode('||', $item[$headerKeysIndex['reinforcement']]);
                            }
                            $reinforcement = array_merge($reinforcement, $arr_reinforcement);
                        }

                        if ($item[$headerKeysIndex['VirtualCatalogReinforcement']] && empty($virtualCatalogReinforcement)) {
                            $virtualCatalogReinforcement = $item[$headerKeysIndex['VirtualCatalogReinforcement']];
                        }

                        if ($item[$headerKeysIndex['longDescription']] && empty($longDescription)) {
                            $longDescription = $item[$headerKeysIndex['longDescription']];
                        }

                        if ($item[$headerKeysIndex['temperatureRangeFAndC']] && empty($temperatureRangeFAndC)) {
                            $temperatureRangeFAndC = $item[$headerKeysIndex['temperatureRangeFAndC']];
                        }

                        if ($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']]) {
                            $arr_FeaturesBenefitsBulletPoint = [];
                            if (!is_array($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']])) {
                                $arr_FeaturesBenefitsBulletPoint = explode('||', $item[$headerKeysIndex['FeaturesBenefitsBulletPoint']]);
                            }

                            foreach ($arr_FeaturesBenefitsBulletPoint as $feature) {
                                array_push($safetyFeatures, $feature);
                            }
                        }

                        $item[] = $listPrice;

                        foreach ($orderKeys as $cvalue) {
                            $articlesData[] = $item[$cvalue];
                        }

                        $brandsData[$siop6Category][] = $articlesData;
                        unset($articlesData);
                    }
                }

                $brandsDataArr = array();
                if ($brandsData) {
                    foreach ($brandsData as $bkey => $bvalue) {

                        if (isset($headerKeysIndex['pitchMM']) && isset($headerKeysIndex['widthmm'])) {
                            array_multisort(array_column($bvalue, $headerKeysIndex['pitchMM']), SORT_ASC, array_column($bvalue, $headerKeysIndex['widthmm']), SORT_ASC, $bvalue);
                        } elseif (isset($headerKeysIndex['outsideLengthIN']) && isset($headerKeysIndex['netWeight'])) {
                            array_multisort(array_column($bvalue, $headerKeysIndex['outsideLengthIN']), SORT_ASC, array_column($bvalue, $headerKeysIndex['netWeight']), SORT_ASC, $bvalue);
                        } elseif (isset($headerKeysIndex['insideLengthIN'])) {
                            array_multisort(array_column($bvalue, $headerKeysIndex['insideLengthIN']), SORT_ASC, $bvalue);
                        } elseif (isset($headerKeysIndex['pulleyDiameterIN']) && isset($headerKeysIndex['GroovesPerTooth'])) {
                            array_multisort(array_column($bvalue, $headerKeysIndex['pulleyDiameterIN']), SORT_ASC, array_column($bvalue, $headerKeysIndex['GroovesPerTooth']), SORT_ASC, $bvalue);
                        } elseif (isset($headerKeysIndex['numberOfTeeth']) && isset($headerKeysIndex['netWeight'])) {
                            array_multisort(array_column($bvalue, $headerKeysIndex['numberOfTeeth']), SORT_ASC, array_column($bvalue, $headerKeysIndex['netWeight']), SORT_ASC, $bvalue);
                        }
                        $brandsDataArr[$bkey] = $bvalue;
                    }
                }
                unset($brandsData);

                $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);

                $reinforcement = array_unique($reinforcement);
                $reinforcement = implode(', ', $reinforcement);

                $material = array_unique($material);
                $materialArray = array();
                foreach ($material as $value) {
                    if (isset($materialList[$value])) {
                        $materialArray[] = $materialList[$value]['name'];
                    }
                }

                $materialStr = implode(', ', $materialArray);

                unset($material);
                unset($safetyFeatures);
                unset($materialArray);

                $reinforcementStr = strip_tags($virtualCatalogReinforcement, "<ul><li><span><strong>");
                if (empty($reinforcementStr)) {
                    $reinforcementStr = $reinforcement;
                }


                $groupData['subHeaderRequired'] = $this->subHeaderRequired;
                $groupData['iconRequired'] = $this->iconRequired;
                $groupData['material'] = $materialStr;
                $groupData['reinforcement'] = $reinforcementStr;
                $groupData['safetyFeatures'] = $safetyFeaturesList;
                $groupData['mainImageObj'] = $mainImageObj;
                $groupData['columnsDataWithImages'] = $columnsDataWithImages;
                $groupData['ProfileDimensionImageObj'] = $profileDimensionImageObj;
                $groupData['longDescription'] = $longDescription;
                $groupData['temperatureRange'] = $temperatureRangeFAndC;
                $groupData['data'] = $brandsDataArr;
                $groupData['brandName'] = $catagoryDescription['SIOP5Description'];
                $groupData['siop4Category'] = $catagoryDescription['SIOP4Description'];
                $groupData['siop3Category'] = $catagoryDescription['SIOP3Description'];
                $groupData['IsPriceCatalog'] = $isPriceCatalog;
                unset($brandsData);
                unset($mainImageObj);
                unset($profileDimensionImageObj);

                $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesPTGFooter['Black'] : $catalogImagesPTGFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);
            }
        }

        $parameterBag['groupData'] = $groupData;
        $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
        $parameterBag['footer_logo_src'] = $footer_logo_src;
        $tableClass = \AppBundle\Helper\Common::cleanString( $this->document->getKey());

        $parameterBag['table_class']= $tableClass;
        return $this->render("catalog/default/template_ptg_product_page.html.twig", $parameterBag);
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
                        $this->s3srcArr[$fvalue] = $this->getS3ImageSrc($fIcon);
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

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = Asset::getByPath($src);

        if ($imgObj) {
            // uncomment below once imageWidth resolved in view
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj, $this->imageWidth);
        }
        return $s3src;
    }

    public function getColumnHeadersForCatalog($isTableNameColumnRequired = false, $tableNameColumns = []): array
    {
        $columnsDataWithImages = array();

        if ($isTableNameColumnRequired) {
            foreach ($this->columnsData as $dkey => $value) {
                if (in_array($dkey, $tableNameColumns)) {
                    $groupColumnName = $value['columnName'];
                    $groupName = '';
                    $columnWidth = '';
                    $unitName = '';

                    if (isset($value['columnWidth']) && $value['columnWidth']) {
                        $columnWidth = $value['columnWidth'];
                    }

                    if (isset($value['unitName']) && $value['unitName']) {
                        $unitName = $value['unitName'];
                    }

                    if (isset($value['groupName']) && $value['groupName']) {
                        $groupColumnName = $value['groupName'];
                        $groupName = $value['groupName'];
                        $this->subHeaderRequired = 'YES';
                    }

                    $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $groupName;
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnWidth'] = $columnWidth;
                    $columnsDataWithImages[$groupColumnName][$dkey]['unitName'] = $this->replaceYellowCode($this->translatorInterface->trans($unitName));
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnName'] = $value['columnName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnLabel'] = $this->replaceYellowCode($this->translatorInterface->trans($groupColumnName));

                    if ($this->iconRequired == 'YES') {
                        if (!isset($this->attrbuteImgS3Arr[$groupColumnName])) {
                            if (isset($this->attributeImages[$groupColumnName])) {
                                $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                                $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                                $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                                $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attributeImagesSrc;
                            }
                        } else {
                            $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                        }
                    }
                }
            }
        } else {
            foreach ($this->columnsData as $key => $value) {

                $groupColumnName = $value['columnName'];
                $groupName = '';

                $columnWidth = '';
                $unitName = '';

                if (isset($value['columnWidth']) && $value['columnWidth']) {
                    $columnWidth = $value['columnWidth'];
                }

                if (isset($value['unitName']) && $value['unitName']) {
                    $unitName = $value['unitName'];
                }

                if (isset($value['groupName']) && $value['groupName']) {
                    $groupColumnName = $value['groupName'];
                    $groupName = $value['groupName'];
                    $this->subHeaderRequired = 'YES';
                }

                $columnsDataWithImages[$groupColumnName][$key]['groupName'] = $groupName;
                $columnsDataWithImages[$groupColumnName][$key]['columnWidth'] = $columnWidth;

                if ($value['columnName'] == 'listPrice') {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $unitName;
                }else{
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($unitName) ? $this->replaceYellowCode($this->translatorInterface->trans($unitName)) : '';
                }
                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $value['columnName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->replaceYellowCode($this->translatorInterface->trans($groupColumnName));

                if ($this->iconRequired == 'YES') {
                    if (!isset($this->attrbuteImgS3Arr[$groupColumnName])) {
                        if (isset($this->attributeImages[$groupColumnName])) {
                            $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                            $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                            $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                            $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImagesSrc;
                        }
                    } else {
                        $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                    }
                }
            }
        }

        return $columnsDataWithImages;
    }

    public function templateIndexDescriptiveNumberAction(Request $request): Response
    {
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }        return $this->render("catalog/default/template_index_descriptive_number.html.twig", $parameterBag);
    }

    public function templateHydraulicAlphanumericIndexByDescriptiveNumberDynamicAction(Request $request): Response
    {
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }        try {
            $folderId = $this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'catalog/default/template_fitting_split_flanges.html.twig',
                'catalog/default/template_hose_accessories_clamps.html.twig',
                'catalog/default/template_hose_accessories_oring.html.twig',
                'catalog/default/template_hose_accessories_sleeving.html.twig',
                'catalog/default/template_hose_product_page.html.twig',
                'catalog/fitting/hydraulic_fitting.html.twig'
            ];

            $all_doc_arr = [];
            foreach ($listing as $doc) {
                if ($doc->hasChildren()) {
                    foreach ($doc->getChildren() as $childDoc) {

                        if ($childDoc->hasChildren()) {
                            foreach ($childDoc->getChildren() as $child2Doc) {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {
                                    $obj = $child2Doc->getEditable('product_page_part_number');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $partNumberList = explode(',', $obj->getData());
                                        $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                                    }
                                }
                            }
                        } else {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {
                                $obj = $childDoc->getEditable('product_page_part_number');
                                if (!empty($obj) && !empty($obj->getData())) {
                                    $partNumberList = explode(',', $obj->getData());
                                    $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                                }
                            }
                        }
                    }
                } else {
                    if (in_array($doc->getTemplate(), $templateArray)) {
                        $obj = $doc->getEditable('product_page_part_number');
                        if (!empty($obj) && !empty($obj->getData())) {
                            $partNumberList = explode(',', $obj->getData());
                            $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                        }
                    }
                }
            }

            $all_doc_arr = array_unique($all_doc_arr);
            sort($all_doc_arr);

            $parameterBag['data'] = $all_doc_arr;
            return $this->render("catalog/default/template_hydraulic_alphanumeric_index_by_descriptive_number_dynamic.html.twig", $parameterBag);
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }
    }

    public function templateHydraulicAlphanumericIndexByProductNumberDynamicAction(Request $request)
    {
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }        try {
            $folderId = $this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'catalog/default/template_fitting_split_flanges.html.twig',
                'catalog/default/template_hose_accessories_clamps.html.twig',
                'catalog/default/template_hose_accessories_oring.html.twig',
                'catalog/default/template_hose_accessories_sleeving.html.twig',
                'catalog/fitting/hydraulic_fitting.html.twig'
            ];

            $all_doc_arr = [];
            foreach ($listing as $doc) {
                if ($doc->hasChildren()) {
                    foreach ($doc->getChildren() as $childDoc) {

                        if ($childDoc->hasChildren()) {
                            foreach ($childDoc->getChildren() as $child2Doc) {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {
                                    $obj = $child2Doc->getEditable('product_page_product_number');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $partNumberList = explode(',', $obj->getData());
                                        $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                                    }
                                }
                            }
                        } else {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {
                                $obj = $childDoc->getEditable('product_page_product_number');
                                if (!empty($obj) && !empty($obj->getData())) {
                                    $partNumberList = explode(',', $obj->getData());
                                    $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                                }
                            }
                        }
                    }
                } else {
                    if (in_array($doc->getTemplate(), $templateArray)) {
                        $obj = $doc->getEditable('product_page_product_number');
                        if (!empty($obj) && !empty($obj->getData())) {
                            $partNumberList = explode(',', $obj->getData());
                            $all_doc_arr = array_merge($all_doc_arr, $partNumberList);
                        }
                    }
                }
            }

            $all_doc_arr = array_unique($all_doc_arr);
            sort($all_doc_arr);

            $parameterBag['data'] = $all_doc_arr;
            return $this->render("catalog/default/template_hydraulic_alphanumeric_index_by_product_number_dynamic.html.twig", $parameterBag);
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }
    }

    public function templateIndexProductNumberAction(Request $request): Response
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{ 
            $documentPath = $this->document->getFullPath(); 
            $doc = \Pimcore\Model\Document::getByPath($documentPath); 
            if($doc) { 
                $documentId = $doc->getId(); 
                $parameterBag = $this->getRequestedParameter($request, $documentId); 
            } 
        }        return $this->render("catalog/default/template_index_product_number.html.twig", $parameterBag);
    }

    public function replaceYellowCode($string): string
    {
        $string = str_replace('%*', '<span style="color: #ffa500;">', $string);
        $string = str_replace('*%', '</span>', $string);
        return $string;
    }
    /**
     * Reset Table of content page's data
     * @Route("/reset-table-of-content")
     * @return json
     */
    public function resetTableOfContentPageData(Request $request): JsonResponse
    {
        try {
            $docId  = $request->get('docId');
            $sql    = "DELETE FROM documents_editables where documentId = '$docId'";
            $this->db->query($sql);
            return $this->json(array("success" => true, "msg" => 'Content Reset Successfully.'));
        } catch (Exception $e) {
            return $this->json(array("success" => false, "msg" => $e->getMessage()));
        }
    }

    public function getRequestedParameter(Request $request, $documentId): array
    {
        $parameterBag = [];
        $parameterBag['printermarks'] = $request->get('printermarks');
        $isParentContainerRequest = $request->get('isParentContainerRequest');
        $parameterBag['isParentContainerRequest'] = $isParentContainerRequest ? $isParentContainerRequest : false;

        $imageWidth = null;
        $imageRecompression = null;
        $printConfigFile = Processor::getJobConfigFile($documentId);
        if (file_exists($printConfigFile)) {
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode($printConfigFileContent, true);
            $imageRecompression = $printConfig['config']['Image Quality'];
            $imageWidth = $printConfig['config']['Image Width'];
        }
        $this->imageWidth = $imageWidth;
        $parameterBag['imageQuality'] = $imageRecompression;
        $parameterBag['imageWidth'] = $imageWidth;

        return $parameterBag;
    }
}