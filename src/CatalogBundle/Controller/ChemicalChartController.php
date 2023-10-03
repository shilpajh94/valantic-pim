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
    private $attributeImages = array();
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
        try {

            $common = \Pimcore::getContainer()->get('app.common_helper');
            $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
            $this->attributeImages = $common->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesHYDFooter = $common->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');

            $class = 'Pimcore\Model\DataObject\\Chemical\\Listing';
            $classObj = new $class();
            $classObj->setOrder('ASC');
            $classObj->load();

            $productData = [];
            $tubeMaterialArr = [];
            $fittingMaterialArr = [];
            $productArr = [];

            foreach ($classObj as $obj) {
                $printedCatalog = $obj->getPrintedCatalog();

                $tubeMaterial = $tubeMaterialRating = $tubeMaterialNameArray = $tubeMaterialBlockData =  null;
                $fittingMaterial = $fittingMaterialRating = $fittingMaterialNameArray = $fittingMaterialBlockData = null;
                $gasketMaterialList = $gasketName = null;

                if ($printedCatalog == true) {
                    $chemicalName = $obj->getName();
                    $gasketMaterialList[] = $obj->getGasketMaterial();
                    $tubeMaterialList = $obj->getTubeMaterial();
                    $fittingMaterialList = $obj->getFittingMaterial();
                    $temperatureRating = $obj->getTemperatureRating();

                    # fetch Tube Material Block data
                    if (!empty($tubeMaterialList)) {
                        foreach ($tubeMaterialList as $obj) {
                            $tubeMaterial[] = $obj['tubeMaterial']->getData();
                            $tubeMaterialRating[] = $obj['rating']->getData();
                        }

                        foreach ($tubeMaterial as  $value) {
                            $parentObj = \Pimcore\Model\DataObject::getById($value);
                            $tubeMaterialNameArray[] = $parentObj->getName();
                        }

                        if (count($tubeMaterialNameArray) == count($tubeMaterialRating)) {
                            $tubeMaterialBlockData = array_combine($tubeMaterialNameArray, $tubeMaterialRating);
                        }
                    }

                    # Fetch Fitting Material Block data
                    if (!empty($fittingMaterialList)) {
                        foreach ($fittingMaterialList as $obj) {
                            $fittingMaterial[] = $obj['fittingMaterial']->getData();
                            $fittingMaterialRating[] = $obj['rating']->getData();
                        }

                        foreach ($fittingMaterial as  $value) {
                            $parentObj = \Pimcore\Model\DataObject::getById($value);
                            $fittingMaterialNameArray[] = $parentObj->getFittingMaterialName();
                        }

                        if (count($fittingMaterialNameArray) == count($fittingMaterialRating)) {
                            $fittingMaterialBlockData = array_combine($fittingMaterialNameArray, $fittingMaterialRating);
                        }
                    }

                    # Fetch Gasket data
                    if ($gasketMaterialList[0] != null) {
                        $gasketName = implode(" ", $gasketMaterialList[0]);
                    }

                    $productData['chemicalName'][] = $chemicalName;
                    $productData['temperatureRating'][] = $temperatureRating;
                    $productData['tubeMaterial'][] = $tubeMaterialBlockData;
                    $productData['fittingMaterial'][] = $fittingMaterialBlockData;
                    $productData['gasket'][] = $gasketName;
                }
            }

            foreach ($productData['tubeMaterial'] as $key => $value) {
                if ($value != null) {
                    foreach ($value as $key1 => $value1) {
                        if (!in_array($key1, $tubeMaterialArr) && count($tubeMaterialArr) < 11) {
                            $tubeMaterialArr[] = $key1;
                        }
                    }
                }
            }

            foreach ($productData['fittingMaterial'] as $key => $value) {
                if ($value != null) {
                    foreach ($value as $key1 => $value1) {
                        if (!in_array($key1, $fittingMaterialArr) && count($fittingMaterialArr) < 3) {
                            $fittingMaterialArr[] = $key1;
                        }
                    }
                }
            }

            foreach ($productData as $key => $value) {
                $i = 0;
                foreach ($value as $key2 => $value2) {
                    if ($value2 != null) {
                        $productArr[$i][$key] = $value[$i];
                        $i++;
                    } 
                    else {
                        $productArr[$i][$key] = null;
                        $i++;
                    }
                }
            }

            $footer_logo_src = $CatalogImagesHYDFooter['Black'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $this->view['data'] = $productArr;
            $this->view['tubeMaterialheaders'] = array_unique($tubeMaterialArr);
            $this->view['fittingMaterialheaders'] = array_unique($fittingMaterialArr);
            $this->view['footer_logo_src']  = $footer_logo_src;
            //p_r($productArr);
        } catch (Exception $e) {
            echo "<h3>" . $e->getMessage() . "</h3>";
        }
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,$this->view->imageWidth);
        }
        return $s3src;
    }
}
