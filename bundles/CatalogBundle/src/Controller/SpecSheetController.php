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
//use CatalogBundle\Controller\DefaultController as $defaultController;

class SpecSheetController extends FrontendController
{ 

    private $tableColumns;
    private $db;
    private $columnsData = array();
    private $imageWidth;
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
     * @Route("/specsheet/get-table-data")
     */
    public function getTableData(Request $request): JsonResponse
    {
        $this->getTableColumns();
        $dynamicColumnsData = $this->getDynamicColumns();
        $objId = $request->get('objId');
        $tableObj = DataObject\SpecSheetCatalog::getById($objId);
        $tableData = $tableObj->getColumns();
        $template = $tableObj->getTemplate();
        $table = $tableObj->getAttributeTable();
		$sapRange = $tableObj->getSAPRange();
        $brand = $tableObj->getBrand();
        $nomenClature = $tableObj->getNomenClature();
		if($brand != null && count($brand) == 1){
			if($brand[0] == 1) {
				$brand = null;
			}
		}
		if($nomenClature != null && count($nomenClature) == 1){
			if($nomenClature[0] == 1) {
				$nomenClature = null;
			}
		}
		if ($brand == null && $nomenClature == null) {
			 $arr = array(
                 'brandAndNomenClatureValueCheck' => false,
            );
			 
			 return $this->json($arr);
		}
		
		
        $skeletonIds = [];
        $tableColumns = json_decode($tableData, 1);
		
        if ($tableColumns !== null) {
            $columns = array_keys($tableColumns);
        } else {
            $columns = [];
        }

		
		$siopCategory = $tableObj->getCategory();

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
		
        $conditionArray = []; 
		
		 if ($tableObj->getCatalogType() == '041000') {
            $productList->addConditionParam("SIOPLevel3 IN (:category)", ["category" => $x], 'AND');
        } else {
            $productList->addConditionParam("SIOPLevel4 IN (:category)", ["category" => $x], 'AND');
        }
 
        $conditionArray[] = "ProductType = 'fert' ";

        if ($brand != null && count($brand) > 0) {
			if($brand[0] != 1){
				$productList->addConditionParam('brandName IN (:brand)', ['brand' => $brand], 'AND');
			}
	   }
		if (is_array($nomenClature) && count($nomenClature)) {
			if($nomenClature[0] != 1){
			$productList->setObjectbricks(['HydFittingsFert']);
            $nomenClatureConditonArray = [];
            foreach ($nomenClature as $nClature) {
                $nClature = trim($nClature, ',');
                if ($nClature != null) {
                    $nomenClatureConditonArray[] = "(HydFittingsFert.nomenclatureDetails LIKE " . $productList->quote('%,' . $nClature . ',%') . ")";
                }
            }
            if (count($nomenClatureConditonArray)) {
                $nomenClatureString = " ( " . implode(' OR ', $nomenClatureConditonArray) . " ) ";
                $conditionArray[] = $nomenClatureString;
            }
			}
        }

		if(!empty($sapRange) && $sapRange == "Virtual Catalog"){
			
			$conditionArray[] = "virtualCatalogReadyToGo = '1' ";
			
		} else if(!empty($sapRange) && $sapRange == "Printed Catalog"){
			
			$conditionArray[] = "printedCatalogFlag = '1' ";
			
		} 
      
       
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
			//$item->setGetInheritedValues(true);

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
		$columnToSetCustomWidth = ["SAP Number", "SAP #", "Old Material Code", "Product Short Description", "SAP Description"];
        $widthByAttribute = ["SAP Number" => 130, "SAP #" => 130, "Old Material Code" => 180, "Product Short Description" => 320, "SAP Description"=> 320];

		foreach ($headers as $value) {
            $column = array(
                'xtype' => 'gridcolumn',
                'name' => $value,
                'Text' => $value,
                'header' => $value,
                'dataIndex' => $value,
                //'flex' => 1,
				'filter' => array(
					'type' => 'string',
					)
            );
			
			if(in_array($value, $columnToSetCustomWidth)){
				$column["width"] = $widthByAttribute[$value];
				$column["autoSizeColumn"] =  true;
			} 
			$columnData[] = $column;
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
		$catalogModel = new Catalog;
		$customRecords = $catalogModel->getCustomRecords($objId);
		
		$gridIndexes = [];
		$i = 0;
		foreach ($pData as $key => $productItem) {
			if(isset($productItem['articleNumber']) && in_array($productItem['articleNumber'], $customRecords)){
				$gridIndexes[] = $i;
			}
			$i ++;
		}

        $arr = array(
            'brandData' => [],
            'columnData' => $columnData,
            'fieldData' => $headers,
            'articlesData' => $pData,
            'data' => $articleData,
            'headerData' => json_encode($headers),
			'customRecords' => $gridIndexes,
			'brandAndNomenClatureValueCheck' => true
        );

        return $this->json($arr);
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
	
	  
	/**
     * @Route("/specsheet/addCustomSelection")
     */
	 public function addCustomSelection(Request $request) 
    {
        $values = '';
        try {
			$objId = $request->get('objectId');
			$data = trim($request->get('data'),'[');
			$data = trim($data,']');
			
		    $query = "Select count(*) as total from specsheet_custom_selection where object_id=$objId";
			$row = $this->db->fetchAllAssociative($query);
			if($row[0]['total'] == 0){
				$sql = "INSERT INTO specsheet_custom_selection (object_id, data) VALUES (".$objId.",'".$data."' )";
				$this->db->executeQuery($sql);
			} else {
				$sql = "UPDATE specsheet_custom_selection SET data='$data' WHERE object_id='$objId'";
				$this->db->executeQuery($sql);
			}
			
           return $this->json(true);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
	
	/**
     * @Route("/specsheet/getSAPRange")
	 *
	 * This function is use to fetch SAPRange value for hiding and showing the grid checkbox and update custom product buttons
     */
	Public function getSAPRange(Request $request){
		$values = '';
        try {
			$objId = $request->get('objectId');
			$specSheetObj = DataObject\SpecSheetCatalog::getById($objId);
			$SAPRange = $specSheetObj->getSAPRange();
			
           return $this->json($SAPRange);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
		
	}
}
	
	?>
