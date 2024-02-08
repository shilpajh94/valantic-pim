<?php

namespace ImportBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CatalogBundle\Helper\CatalogTemplatingHelper;
use Symfony\Contracts\Translation\TranslatorInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;
use Pimcore\Model\Asset;
use \Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * @package ImportBundle\Controller
 * @Route("/contitech_us_product/default")
 */

class DefaultController extends FrontendController
{
    private $db;
    private $catalogTemplatingHelper;
    private $translatorInterface;
    private $imageWidth;
    private $containerInterface;

    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper, TranslatorInterface $translator, ContainerInterface $container)
    {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        $this->translatorInterface = $translator;
        $this->containerInterface = $container;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }
    /**
     * @Route("/contitech_us_product")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from import');
    }

    /**
     * @Route("/get_ferts_brand")
     * @param Request $request
     * @return JsonResponse
     * This function returns all the brands of fert products under a selected base
     */
    public function getFertProductsBrand(Request $request)
    {
        $db = \Pimcore\Db::get();
        try {
            $objectId = $request->get('objectId');
            $baseObj = \Pimcore\Model\DataObject::getById($objectId);
            $skeletonLevelProducts = $baseObj->getChildren();

            $resultArray = [];
            if ($skeletonLevelProducts) {
                foreach ($skeletonLevelProducts as $eachskeleton) {
                    $skeltonId = $eachskeleton->getId();
                    $i = 0;
                    $query = "select brandName from object_1 where parentId = $skeltonId";
                    $result = $db->fetchAllAssociative($query);
                    foreach ($result as $eachFert) {
                        $brandId = $eachFert['brandName'];
                        $brandObj = DataObject\Brand::getById($brandId);
                        $optionData[$i]['key'] = $brandObj->getName();
                        $optionData[$i]['value'] = $eachFert['brandName'];
                        $resultArray = array_merge($resultArray, $optionData);
                        $i++;
                    }
                }
                $uniqueResultArray = array_unique($resultArray, SORT_REGULAR);
                $res = array_values($uniqueResultArray);
            }
            echo json_encode(["data" => $res]);
            die;
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }
    }

    /**
     * @Route("/get_grid_ferts")
     * @param Request $request
     * @return JsonResponse
     * This function returns all the required ferts that will be displayed in grid view
     */
    public function getSpecSheetFertProducts(Request $request)
    {
        $objectId = $request->get('objectId');
        $sapRange = $request->get('sapRange');
        $brandNameIds = trim($request->get('brandName'), '[]');

        $db = \Pimcore\Db::get();

        $resultArray = [];
        if ($sapRange == 'CustomSelection' && $brandNameIds) {
            $baseObj = \Pimcore\Model\DataObject::getById($objectId);
            $skeletonLevelProducts = $baseObj->getChildren();

            foreach ($skeletonLevelProducts as $eachskeleton) {
                $skeltonId = $eachskeleton->getId();

                $query = "select oo_id, articleNumber, SIOPLevel3 , SIOPLevel4, published from object_1 where parentId = $skeltonId and brandName in ($brandNameIds) and published =1";
                $result = $db->fetchAllAssociative($query);

                $i = 0;
                foreach ($result as $eachFert) {
                    $optionData[$i]['id'] = $eachFertId = $eachFert['oo_id'];
                    $optionData[$i]['articleNumber'] = $eachFert['articleNumber'];

                    $query2 = "select sapDescription from object_localized_query_1_en where ooo_id = $eachFertId";
                    $result2sapDescription = $this->db->fetchOne($query2);
                    $optionData[$i]['sapDescription'] = $result2sapDescription;

                    $siopLevel3 = trim($eachFert['SIOPLevel3'], ',');
                    $siopLevel3 = DataObject\ProductCategory::getById($siopLevel3);
                    $optionData[$i]['SIOPLevel3'] = $siopLevel3->getDescription();

                    $siopLevel4 = trim($eachFert['SIOPLevel4'], ',');
                    $siopLevel4 = DataObject\ProductCategory::getById($siopLevel4);
                    $optionData[$i]['SIOPLevel4'] = $siopLevel4->getDescription();

                    $publishedState = $eachFert['published'];
                    if ($publishedState == 1) {
                        $optionData[$i]['published'] = "Published";
                    } else {
                        $optionData[$i]['published'] = "Unpublished";
                    }
                    $resultArray = array_merge($resultArray, $optionData);
                    $i++;
                }
            }
            $uniqueResultArray = array_unique($resultArray, SORT_REGULAR);
            $res['data'] = array_values($uniqueResultArray);
        }
        $res['data'] = $resultArray;
        return $this->json(["data" => $res['data'], "success" => true]);
    }

    /**
     * @Route("/get_fert_for_export")
     * @param Request $request
     * @return JsonResponse
     * This function is retrieving all the ferts having selected brands and whose printed catalog flag is Yes
     */
    public function getFertExport(Request $request)
    {

        $dataArray = $designfactor = $featuresArr = [];
        $baseObjectId = $request->get('objectId');

        $exportColumnsConfig = YaML::parseFile(PIMCORE_PROJECT_ROOT . '/bundles/ImportBundle/config/spec-sheet-export-columns.yaml');
        $catalogImagesINHFooter = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHFooter'];

        $baseObj = \Pimcore\Model\DataObject::getById($baseObjectId);
        $skeletonLevelProducts = $baseObj->getChildren();
        foreach ($skeletonLevelProducts as $eachSkeletonLevelProducts) {
            $skeletonProductsId[] =  $eachSkeletonLevelProducts->getId();
        }

        $brandId = $baseObj->getBrandName();
        $brandParentObj = DataObject\Brand::getById($brandId);
        $brand = $brandParentObj->getName();
        $longDescription = $baseObj->getlongDescription();
        $mainImage = $baseObj->getMainImage();
        $tubeMaterial = $baseObj->getBase()->getHoseBase()->getVirtualCatalogTubeMaterial();
        $coverMaterial = $baseObj->getBase()->getHoseBase()->getVirtualCatalogCoverMaterial();
        $reinforcement = $baseObj->getVirtualCatalogReinforcement();
        $temperatureRangeFAndC = $baseObj->gettemperatureRangeFAndC();
        $packaging = $baseObj->getBase()->getHoseBase()->getPackaging();
        $coupling = $baseObj->getBase()->getHoseBase()->getCoupling();
        $designfactorId = $baseObj->getBase()->getHoseBase()->getSafetyFactor();
        if ($designfactorId) {
            foreach ($designfactorId as $id) {
                $parentObj = \Pimcore\Model\DataObject::getById($id);
                $designfactor[] = $parentObj->getName();
            }
        }
        $featuresId = $baseObj->getFeaturesBenefitsBulletPoint();
        if ($featuresId != null) {
            foreach ($featuresId as $id) {
                $parentObj = DataObject\Features::getById($id);
                $icon = $parentObj->getIcon();
                $iconS3Path = null;
                if ($icon) {
                    $iconSrc = $icon->getPath() . $icon->getFileName();
                    $iconS3Path = $this->getS3ImageSrc($iconSrc);
                }
                $featureIcon[] = $iconS3Path;
                $features[] = $parentObj->getName();
            }
            $featuresArr = array_combine($features, $featureIcon);
        }
        $brandingLayline = $baseObj->getBrandingLayline();

        $query = "select SIOPLevel3 from object_query_1 where oo_id = '$baseObjectId'";
        $recordSIOPLevel3 = $this->db->fetchOne($query);
        $siopLevel3 = trim($recordSIOPLevel3, ',');
        $siopLevel3 = DataObject\ProductCategory::getById($siopLevel3);
        $siopLevel3Category = $siopLevel3->getDescription();

        $sixDigitVirtualCatalogDescription = $baseObj->getBase()->getHoseBase()->getsixDigitVirtualCatalogDescription();
        $baseObjectKey = $baseObj->getKey();
        $baseObjectKeyIntoTwoArray = str_split($baseObjectKey, 3);
        $baseObjectKeyDashedString = implode('-', $baseObjectKeyIntoTwoArray);
        $orderCode = $baseObjectKeyDashedString . " " . $sixDigitVirtualCatalogDescription;

        $columnsData = json_decode($baseObj->getColumns(), true);
        $columnsDataWithImages = $this->getColumnHeadersForCatalog($columnsData);
        $subHeaderRequired = 'YES';
        $iconRequired = 'YES';

        $footer_logo_src = $catalogImagesINHFooter['Orange'];
        $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

        $productAttributesArr = [
            $brand,
            $longDescription,
            $tubeMaterial,
            $coverMaterial,
            $reinforcement,
            $temperatureRangeFAndC,
            $packaging,
            $coupling,
            $designfactor,
            $featuresArr,
            $brandingLayline,
            $siopLevel3Category,
            $mainImage,
            $footer_logo_src,
        ];

        $entries = new DataObject\Product\Listing();
        $entries->setCondition("parentId IN (?) AND printedCatalogFlag = ? AND published = ?", [$skeletonProductsId, 1, 1]);

        foreach ($entries as $fertProducts) {
            foreach ($exportColumnsConfig as $exportAttribute) {
                if (array_key_exists($exportAttribute['fieldName'], $columnsData)) {
                    if ($exportAttribute['fieldLevel'] == 'class') {
                        $method = 'get' . $exportAttribute['fieldName'];
                        $methodData = $fertProducts->$method();
                        if (is_array($methodData)) {
                            $methodDataId = $methodData[0];
                            $obj = \Pimcore\Model\DataObject::getById($methodDataId);
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = $obj->getName();
                        } elseif (isset($exportAttribute['numberOfDecimalPoints'])) {
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = number_format((float) $methodData, 2, '.', '');
                        } else {
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = $methodData;
                        }
                    } else {
                        $getObjectBrickLocation = 'get' . $exportAttribute['objectBrickLocation'];
                        $getObjectBrickName = 'get' . $exportAttribute['objectBrickName'];
                        $getAttributeName = 'get' . $exportAttribute['fieldName'];
                        $attributeData = $fertProducts->$getObjectBrickLocation()->$getObjectBrickName()->$getAttributeName();
                        if (is_array($attributeData)) {
                            $attributeDataId = $attributeData[0];
                            $obj = \Pimcore\Model\DataObject::getById($attributeDataId);
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = $obj->getName();
                        } elseif (isset($exportAttribute['numberOfDecimalPoints'])) {
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = number_format((float) $attributeData, 2, '.', '');
                        } else {
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = $attributeData;
                        }
                    }
                }
            }
        }
        $assetId = $this->getPdfGeneration($dataArray, $productAttributesArr, $columnsDataWithImages, $subHeaderRequired, $iconRequired, $orderCode);
        return $this->json(["data" => $assetId]);
    }

    /**
     * @Route("/get_selected_ferts")
     * @param Request $request
     * @return JsonResponse
     * This function retrieves all the selected ferts from grid view
     */
    public function getCustomSelectedFertExport(Request $request)
    {

        $catalogImagesINHFooter = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHFooter'];

        $dataArray = $designfactor = $featuresArr = [];
        $baseObjectId = $request->get('objectId');
        $baseObj = \Pimcore\Model\DataObject::getById($baseObjectId);

        $brandId = $baseObj->getBrandName();
        $brandParentObj = DataObject\Brand::getById($brandId);
        $brand = $brandParentObj->getName();
        $longDescription = $baseObj->getlongDescription();
        $mainImage = $baseObj->getMainImage();
        $tubeMaterial = $baseObj->getBase()->getHoseBase()->getVirtualCatalogTubeMaterial();
        $coverMaterial = $baseObj->getBase()->getHoseBase()->getVirtualCatalogCoverMaterial();
        $reinforcement = $baseObj->getVirtualCatalogReinforcement();
        $temperatureRangeFAndC = $baseObj->gettemperatureRangeFAndC();
        $packaging = $baseObj->getBase()->getHoseBase()->getPackaging();
        $coupling = $baseObj->getBase()->getHoseBase()->getCoupling();
        $designfactorId = $baseObj->getBase()->getHoseBase()->getSafetyFactor();
        if ($designfactorId) {
            foreach ($designfactorId as $id) {
                $parentObj = \Pimcore\Model\DataObject::getById($id);
                $designfactor[] = $parentObj->getName();
            }
        }
        $featuresId = $baseObj->getFeaturesBenefitsBulletPoint();
        if ($featuresId != null) {
            foreach ($featuresId as $id) {
                $parentObj = DataObject\Features::getById($id);
                $icon = $parentObj->getIcon();
                $iconS3Path = null;
                if ($icon) {
                    $iconSrc = $icon->getPath() . $icon->getFileName();
                    $iconS3Path = $this->getS3ImageSrc($iconSrc);
                }
                $featureIcon[] = $iconS3Path;
                $features[] = $parentObj->getName();
            }
            $featuresArr = array_combine($features, $featureIcon);
        }
        $brandingLayline = $baseObj->getBrandingLayline();

        $query = "select SIOPLevel3 from object_query_1 where oo_id = '$baseObjectId'";
        $recordSIOPLevel3 = $this->db->fetchOne($query);
        $siopLevel3 = trim($recordSIOPLevel3, ',');
        $siopLevel3 = DataObject\ProductCategory::getById($siopLevel3);
        $siopLevel3Category = $siopLevel3->getDescription();

        $sixDigitVirtualCatalogDescription = $baseObj->getBase()->getHoseBase()->getsixDigitVirtualCatalogDescription();
        $baseObjectKey = $baseObj->getKey();
        $baseObjectKeyIntoTwoArray = str_split($baseObjectKey, 3);
        $baseObjectKeyDashedString = implode('-', $baseObjectKeyIntoTwoArray);
        $orderCode = $baseObjectKeyDashedString . " " . $sixDigitVirtualCatalogDescription;

        $columnsData = json_decode($baseObj->getColumns(), true);
        $columnsDataWithImages = $this->getColumnHeadersForCatalog($columnsData);
        $subHeaderRequired = 'YES';
        $iconRequired = 'YES';

        $footer_logo_src = $catalogImagesINHFooter['Orange'];
        $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

        $productAttributesArr = [
            $brand,
            $longDescription,
            $tubeMaterial,
            $coverMaterial,
            $reinforcement,
            $temperatureRangeFAndC,
            $packaging,
            $coupling,
            $designfactor,
            $featuresArr,
            $brandingLayline,
            $siopLevel3Category,
            $mainImage,
            $footer_logo_src
        ];

        $exportFertsId = $request->get('articleNumber');
        $exportColumnsConfig = YaML::parseFile(PIMCORE_PROJECT_ROOT . '/bundles/ImportBundle/config/spec-sheet-export-columns.yaml');

        $trimBrackets = trim($exportFertsId, "[]");
        $articleNumberArray = explode(",", $trimBrackets);

        foreach ($articleNumberArray as $eachArticleNumberArray) {
            $fertProducts = DataObject\Product::getByArticleNumber($eachArticleNumberArray, true);

            foreach ($exportColumnsConfig as $exportAttribute) {
                if (array_key_exists($exportAttribute['fieldName'], $columnsData)) {
                    if ($exportAttribute['fieldLevel'] == 'class' && $fertProducts) {
                        $method = 'get' . $exportAttribute['fieldName'];
                        $methodData = $fertProducts->$method();
                        if (is_array($methodData)) {
                            $methodDataId = $methodData[0];
                            $obj = \Pimcore\Model\DataObject::getById($methodDataId);
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = $obj->getName();
                        } elseif (isset($exportAttribute['numberOfDecimalPoints'])) {
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = number_format((float) $methodData, 2, '.', '');
                        } else {
                            $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = $methodData;
                        }
                    } elseif ($fertProducts) {
                        $getObjectBrickLocation = 'get' . $exportAttribute['objectBrickLocation'];
                        $getObjectBrickName = 'get' . $exportAttribute['objectBrickName'];
                        $getAttributeName = 'get' . $exportAttribute['fieldName'];
                        if ($fertProducts->$getObjectBrickLocation()) {
                            if ($fertProducts->$getObjectBrickLocation()->$getObjectBrickName()) {
                                $attributeData = $fertProducts->$getObjectBrickLocation()->$getObjectBrickName()->$getAttributeName();
                                if (is_array($attributeData)) {
                                    $attributeDataId = $attributeData[0];
                                    $obj = \Pimcore\Model\DataObject::getById($attributeDataId);
                                    $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = $obj->getName();
                                } elseif (isset($exportAttribute['numberOfDecimalPoints'])) {
                                    $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = number_format((float) $attributeData, 2, '.', '');
                                } else {
                                    $dataArray[$fertProducts->getId()][$exportAttribute['columnName']] = $attributeData;
                                }
                            }
                        }
                    }
                }
            }
        }
        $assetId = $this->getPdfGeneration($dataArray, $productAttributesArr, $columnsDataWithImages, $subHeaderRequired, $iconRequired, $orderCode);
        return $this->json(["data" => $assetId]);
    }

    public function getPdfGeneration($dataArray, $productAttributesArr, $columnsDataWithImages, $subHeaderRequired, $iconRequired, $orderCode)
    {

        $html  = '<!DOCTYPE html>';
        $html .= "<html>";
        $html .= '<head><title>Spec Sheet Export</title><link rel="stylesheet" type="text/css" href="/static/css/print_style.css" /></head>';
        $html .= "<body>";

        $html .= "
                <div class='footer'>
                    <footer class='flex-center'>
                        <span class='logo'>
                            <img src='$productAttributesArr[13]'>
                        </span>
                        <div class='flex aligned'>
                            <h5 class='marginTop2'>
                                $productAttributesArr[0]
                                <span>$productAttributesArr[11]</span>
                            </h5>
                        </div>
                    </footer>
                </div>
                <div class='footer1'>
                    <footer class='flex-center'>
                        <div class='flex aligned'>
                            <h5 class='marginTop2'>
                                $productAttributesArr[0]
                                <span>$productAttributesArr[11]</span>
                            </h5>
                        </div>
                        <span class='logo'>
                            <img src='$productAttributesArr[13]'>
                        </span>
                    </footer>
                </div>
                <article class='fullcontainer single'>
                    <div class='inhsetting1'>
                        <div class='inhRight'>
                            <header class='white'>
                                <h1>$productAttributesArr[0]</h1>
                                <aside>
                                    <div>$productAttributesArr[1]</div>
                                    <img src='$productAttributesArr[12]' width='1067' height='128' />
                                </aside>
                            </header>
                            <section class='content'>
                                <menu class='flex'>
                                    <div class='specs'>
                                        <h6>Performance + Specs</h6>
                                        <div class='spec-requirement flex'>
                                            <div class='col-6'>
                                                <div class='full'>
                                                    <b>Tube Material</b>
                                                    $productAttributesArr[2]
                                                </div>
                                                <div class='full'>
                                                    <b>Cover Material</b>
                                                    $productAttributesArr[3]
                                                </div>
        
                                                <div class='full'>
                                                    <b>Reinforcement</b>
                                                    $productAttributesArr[4]
                                                </div>
        
                                                <div class='full'>
                                                    <b>Temperature Range</b>
                                                    $productAttributesArr[5]
                                                </div>

                                                <div class='full'>
                                                <b>Design Factor</b>";
        if ($productAttributesArr[8]) {
            foreach ($productAttributesArr[8] as $designFactor) {
                $html .= "<p class='flex'>$designFactor</p>";
            }
        }
        $html .= "
                                            </div>

                                            </div>
                                            <div class='col-6'>
                                                <div class='right-full'>
                                                    <b>Packaging</b>
                                                    <table>";
        $rows = explode(PHP_EOL, $productAttributesArr[6]);

        foreach ($rows as $row) {
            $html .= "<tr>";
            $rowColData = explode(' - ', $row);
            if (count($rowColData) == 2) {
                $html .= "<td>$rowColData[0]</td>
                                                                    <td> - $rowColData[1]</td>";
            } else {
                $html .= "<td colspan='2'> $row </td>";
            }
            $html .= "</tr>";
        }
        $html .= "
                                                    </table>
                                                </div>
                                                <div class='right-full'>
                                                    <b>Coupling</b>
                                                    <p>$productAttributesArr[7]</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='feature'>
                                        <h6>Features + Benefits</h6>
                                        <div>";
        if ($productAttributesArr[9]) {
            foreach ($productAttributesArr[9] as $Feature => $imgSrc) {
                $html .= "<p class='flex'>
                                                    <img src= '$imgSrc'/ >
                                                    <font>$Feature</font>
                                                </p>";
            }
        }
        $html .= "
                                        </div>
                                    </div>
                                </menu>
                                <menu>
                                    <h6>Branding</h6>
                                    <figure class='ssbrandingLaylineStyle'>
                                        <figcaption>$productAttributesArr[10]</figcaption>
                                    </figure>
                                </menu>
                                <h5 class='marginTop'>
                                    $productAttributesArr[0]
                                </h5>
                                <div class='flex alignCenter orderCode'>Order Codes :
                                    $orderCode
                                </div>
                                <div class='inh-section-break'>
                                    <table class='grid special inh marginBottom5 continueLable' cellspacing='0' cellpadding='0'>
                                        <thead>";
        if ($iconRequired == 'YES') {
            $html .= "
                                            <tr class='sub-head'>";
            foreach ($columnsDataWithImages as $c1data) {
                $columnWidth = '';
                $g1count = count($c1data);
                $firstArray = array_shift($c1data);
                $value = $firstArray['columnIcon'];
                if (isset($firstArray['columnWidth'])) {
                    $columnWidth = "width=" . $firstArray['columnWidth'];
                }
                $html .= "<td colspan = $g1count $columnWidth>";
                if ($firstArray['columnIcon']) {
                    $html .= " <img src='$value' width='45' height='45' /> ";
                }
                $html .= "</td>";
            }
            $html .= "</tr>";
        }
        $html .= "
                                            <tr class='sshead'>";
        foreach ($columnsDataWithImages as $c2data) {
            $columnWidth = '';
            $g2count = count($c2data);
            $first2Array = array_shift($c2data);
            $value = $first2Array['columnLabel'];
            if (isset($first2Array['columnWidth'])) {
                $columnWidth = "width=" . $first2Array['columnWidth'];
            }
            $html .= "<td colspan = $g2count $columnWidth>$value</td>";
        }
        $html .= "</tr>
                                            <tr class='sshead'>";
        if ($subHeaderRequired == 'YES') {
            foreach ($columnsDataWithImages as $c3data) {
                foreach ($c3data as $c3value) {
                    if ($c3value['unitName']) {
                        $value = $c3value['unitName'];
                        $html .= "<td>$value</td>";
                    } else {
                        $html .= "<td></td>";
                    }
                }
            }
        }
        $html .= "</tr>
                                        </thead>
                                        <tbody>";
        $incrRow = 1;
        foreach ($dataArray as $eachFert) {
            if ($incrRow % 2 == 0) {
                $html .= "<tr class='tableNewFont'>";
            } else {
                $html .= "<tr class='active tableNewFont'>";
            }
            foreach ($columnsDataWithImages as $c4data) {
                foreach ($c4data as $c4value) {
                    $colummName = $c4value['columnName'];
                    $html .= "<td class ='spaceRight'>$eachFert[$colummName]</td>";
                }
            }
            $html .= "</tr> ";
            $incrRow++;
        }
        $html .= "<tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </article>
                ";

        $html .= '</body>';
        $html .= '</html>';

        $file = \Pimcore\Web2Print\Processor::getInstance()->getPdfFromString($html);
        $filePath = PIMCORE_PROJECT_ROOT . '/var/tmp/spec_sheet_export_' . time() . '.pdf';
        $fp = fopen($filePath, 'wb');
        fwrite($fp, $file);
        fclose($fp);

        $assetFullPathParentId = \Pimcore\Model\Asset\Service::createFolderByPath('/Spec Sheet Export')->getId();
        $assetFilename = 'spec_sheet_export_' . time() . '.pdf';
        $newAsset = new \Pimcore\Model\Asset();
        $newAsset->setFilename($assetFilename);
        $newAsset->setData(file_get_contents($filePath));
        $newAsset->setParentId($assetFullPathParentId);
        $newAsset->save();
        unlink($filePath);
        return "'" . $newAsset->getId() . "'";
    }

    public function getColumnHeadersForCatalog($columnsData)
    {

        $columnsDataWithImages = array();
        $attributeImgS3Arr = array();
        $attributeImages = array();
        $attributeImages = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];

        $iconRequired = 'YES';
        foreach ($columnsData as $key => $value) {

            $groupColumnName = $value['columnName'];
            if (isset($value['groupName']) && $value['groupName']) {
                $groupColumnName = $value['groupName'];
                $columnsDataWithImages[$groupColumnName][$key]['groupName'] = $value['groupName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnWidth'] = isset($value['columnWidth']) ? $value['columnWidth'] : '';
            }

            if ($value['columnName'] == 'listPrice') {
                $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $value['unitName'];
            } elseif (isset($value['unitName'])) {
                $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($value['unitName']) ? $this->replaceYellowCode($this->translatorInterface->trans($value['unitName'])) : '';
            } else {
                $columnsDataWithImages[$groupColumnName][$key]['unitName'] = '';
            }

            $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $value['columnName'];
            $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->replaceYellowCode($this->translatorInterface->trans($groupColumnName));

            if ($iconRequired == 'YES') {
                if (
                    !isset($attributeImgS3Arr[$groupColumnName])
                    && isset($attributeImages[$groupColumnName])
                ) {
                    $attributeImagesSrc = $attributeImages[$groupColumnName];
                    $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                    $attributeImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                    $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImagesSrc;
                } elseif (isset($attributeImages[$groupColumnName])) {
                    $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImgS3Arr[$groupColumnName];
                } else {
                    $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = '';
                }
            }
        }

        return $columnsDataWithImages;
    }

    public function replaceYellowCode($string)
    {
        $string = str_replace('%*', '<span style="color: #ffa500;">', $string);
        $string = str_replace('*%', '</span>', $string);
        return $string;
    }

    /**
     * @Route("/get-specSheet-available-headers")
     */
    public function getSpecSheetAvailableHeaders(Request $request)
    {
        $tableColumns = YaML::parseFile(PIMCORE_PROJECT_ROOT . '/bundles/ImportBundle/config/spec-sheet-export-columns.yaml');

        $columns = array();
        $arr = [];

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
        echo json_encode($arr);
        die;
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);
        $imageWidth = null;
        $this->imageWidth = $imageWidth;
        if ($imgObj) {
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj, $this->imageWidth);
        }
        return $s3src;
    }
}