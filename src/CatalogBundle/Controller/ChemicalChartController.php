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

        if ($this->getDocumentTag('relation', 'chemical-chart')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'chemical-chart')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);

            $class = 'Pimcore\Model\DataObject\\' . $obj->getName() . '\\Listing';
            $classObj = new $class();
            $classObj->load();

            $data = [];
            foreach ($classObj as $obj) {

                $chemicalName = $obj->getName();

                $gasketId = $obj->getGasket();
                $gasket = DataObject\Gasket::getById($gasketId);
                $gasketName = $gasket->getGasketName();

                $temperatureRating = $obj->getTemperatureRating();

                foreach ($obj->getTubeMaterial() as $obj) {
                    $tubeMaterial[] = $obj['tubeMaterial']->getData();
                    $tubeMaterialRating[] = $obj['rating']->getData();
                }

                foreach ($tubeMaterial as  $value) {
                    $parentObj = \Pimcore\Model\DataObject::getById($value);
                    $tubeMaterialNameArray[] = $parentObj->getName();
                }
                $tubeMaterialBlockData = array_combine($tubeMaterialNameArray, $tubeMaterialRating);

                // foreach ($obj->getfittingMaterial() as $obj) {
                //     $fittingMaterial[] = $obj['fittingMaterial']->getData();
                //     $fittingMaterialRating[] = $obj['rating']->getData();
                // }

                // foreach ($fittingMaterial as  $value) {
                //     $parentObj = \Pimcore\Model\DataObject::getById($value);
                //     $fittingMaterialNameArray[] = $parentObj->getName();
                // }
                // $fittingMaterialBlockData = array_combine($fittingMaterialNameArray, $fittingMaterialRating);

                $data['chemicalName'] = $chemicalName;
                $data['tubeMaterial'] = $tubeMaterialBlockData;
                // $data['fittingMaterial'] = $fittingMaterialBlockData;
                $data['gasket'] = $gasketName;
                $data['temperatureRating'] = $temperatureRating;
                dd($data);
            }
        }
    }
}
