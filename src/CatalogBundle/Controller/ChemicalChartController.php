<?php

namespace CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;
use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject\Data\BlockElement;
use \Exception;

class ChemicalChartController extends AbstractController
{

    private $db;
    private $catalogTemplatingHelper;

    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper)
    {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }


    public function indexAction(Request $request)
    {
        return new Response('Hello world from catalog');
    }


    public function chemicalAction(Request $request)
    {
        try{
            if ($this->getDocumentTag('relation', 'chemical-chart')->getElement() instanceof  \Pimcore\Model\DataObject) {
                $id = $this->getDocumentTag('relation', 'chemical-chart')->getId();
                $obj = \Pimcore\Model\DataObject::getById($id);
    
                $class = 'Pimcore\Model\DataObject\\' . $obj->getName() . '\\Listing';
                $classObj = new $class();
                $classObj->setLimit(15);
                $classObj->load();
    
                $productData = [];

                foreach ($classObj as $obj) {
                    $tubeMaterialBlockData = null;
                    $fittingMaterialBlockData = null;
    
                    $chemicalName = $obj->getName();
                    $gasketList = $obj->getGasket();
                    $tubeMaterialList = $obj->getTubeMaterial();
                    $fittingMaterialList = $obj->getFittingMaterial();
                    $temperatureRating = $obj->getTemperatureRating();
    
                    # fetch Tube Material Block data
                    foreach ($tubeMaterialList as $obj) {
                        $tubeMaterial[] = $obj['tubeMaterial']->getData();
                        $tubeMaterialRating[] = $obj['rating']->getData();
                    }
    
                    foreach ($tubeMaterial as  $value) {
                        $parentObj = \Pimcore\Model\DataObject::getById($value);
                        $tubeMaterialNameArray[] = $parentObj->getName();
                    }

                    if(count($tubeMaterialNameArray) == count($tubeMaterialRating)){
                        $tubeMaterialBlockData = array_combine($tubeMaterialNameArray, $tubeMaterialRating);
                    }
    
                    # Fetch Fitting Material Block data
                    foreach ($fittingMaterialList as $obj) {
                        $fittingMaterial[] = $obj['fittingMaterial']->getData();
                        $fittingMaterialRating[] = $obj['rating']->getData();
                    }
    
                    foreach ($fittingMaterial as  $value) {
                        $parentObj = \Pimcore\Model\DataObject::getById($value);
                        $fittingMaterialNameArray[] = $parentObj->getFittingMaterialName();
                    }

                    if(count($fittingMaterialNameArray) == count($fittingMaterialRating)){
                        $fittingMaterialBlockData = array_combine($fittingMaterialNameArray, $fittingMaterialRating);
                    } 
    
                    # Fetch Gasket data
                    $gasketNameArr = [];
                    if($gasketList)
                    {
                        foreach ($gasketList as $key => $singleProduct)
                        {
                            $productObject      = DataObject\Gasket::getById($singleProduct);
                            if($productObject)
                            {
                                $gasketNameArr[]   = trim($productObject->getGasketName());
                            }
                        }
                    }
                    $productData['chemicalName'][] = $chemicalName;
                    $productData['temperatureRating'][] = $temperatureRating;
                    $productData['tubeMaterial'][] = $tubeMaterialBlockData;
                    $productData['fittingMaterial'][] = $fittingMaterialBlockData;
                    $productData['gasket'][] = implode(" ", $gasketNameArr);
                }

                $productArr = [];

                foreach( $productData as $key => $value){
                    $i = 0;
                    foreach($value as $key2 => $value2){
                        $productArr[$i][$key] = $value[$i];
                        $i++;
                    }
                }
                $this->view['data'] = $productArr;
                // dd($productArr);
            }
        }
        catch(Exception $e)
        {   
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }
}
