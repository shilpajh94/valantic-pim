<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @package    ContitechCSCatalogBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace ContitechCS\CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use Pimcore\Db;
use \Exception;
use Pimcore\Controller\FrontendController;

class DefaultController extends FrontendController
{
    private $configProviderService;
    private $db;

    public function __construct(ConfigProviderService $configProviderService)
    {
        $this->configProviderService = $configProviderService;
        $this->db = Db::get();
    }

    /**
     * @Route("/contitech_cs_catalog")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function indexAction(Request $request)
    {
        try {
            return new Response('Hello world from contitech_cs_catalog');
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }
    }

    /**
     * @Route("/contitech_cs_catalog/get-products")
     * @param Request $request
     * @param JsonResponse
     * @access public
     */
    public function getCategoryProducts(Request $request): JsonResponse
    {
        $id = $request->get('catId');
        $categoryObj = DataObject\CSCatalogCategory::getById($id);
        $hierarchyId = ($categoryObj->getSecondLevelCategory());
        $resultData['data'] = [];
        if ($hierarchyId) {
            $productsList = new DataObject\CSProducts\Listing();
            $productsList->setCondition("ParentCategory like " . $productsList->quote("%," . $hierarchyId . ",%"));
            $productsList->load();

            if ($productsList) {
                foreach ($productsList->getObjects() as $cat) {
                    $result[] = array('text' => trim($cat->getName()), 'id' => trim($cat->getId()));
                }
            }
            $resultData['data'] = $result;
        }
        return $this->json(['data' => $resultData['data']]);
    }

    /**
     * @Route("/contitech_cs_catalog/get-products-tables")
     * @param Request $request
     * @param JsonResponse
     * @access public
     */
    public function getCategoryProductTables(Request $request): JsonResponse
    {
        $resultData['data']    = [];
        $product        = $request->get('product');
        $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();

        if (isset($productDataImportConfig['Common Product Page'][$product])) {
            foreach ($productDataImportConfig[$product] as $table => $value) {
                $result[] = array('id' => trim($table), 'text' => trim($table));
            }
            $resultData['data'] = $result;
        }
        return $this->json(['data' => $resultData['data']]);
    }

    /**
     * @Route("/contitech_cs_catalog/get-hierarchy")
     * @param Request $request
     * @param JsonResponse
     * @access public
     */
    public function getHierarchy(Request $request): JsonResponse
    {
        $catId = $request->get('catId');
        $categoryList = new DataObject\CSHierarchy\Listing();
        $categoryList->addConditionParam("Level = ?", ["Level 2"], 'AND');
        $categoryList->setCondition("o_parentId = ?", $catId);
        $categoryList = $categoryList->load();

        $result = [];
        foreach ($categoryList as $cat) {
            $result[] = array('key' => $cat->getName(), 'value' => $cat->getId());
        }
        return $this->json(['data' => $result]);
    }

    /**
     * @Route("/contitech_cs_catalog/template_table_of_contents")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateTableOfContentsAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        return $this->render("@ContitechCSCatalog/Default/template_table_of_contents.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_dynamic_table_of_contents")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateDynamicTableOfContentsAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $folderId = $this->document->getParent()->getId();
        $listing = new \Pimcore\Model\Document\Listing();
        $listing->setCondition("parentId = $folderId");
        $listing->load();
        $listing->setOrderKey("index");
        $listing->setOrder("asc");
        $templateArray = [
            '@ContitechCSCatalog/Default/templates_with_bricks.html.twig',
            '@ContitechCSCatalog/Default/template_conti_inspect_systems.html.twig',
            '@ContitechCSCatalog/Default/template_steelcord_belt_construction.html.twig',
            '@ContitechCSCatalog/Default/template_continental_conveyor_services.html.twig',
            '@ContitechCSCatalog/Default/template_eco_series_pulley.html.twig',
            '@ContitechCSCatalog/Default/template_conti_pipe_belt.html.twig',
            '@ContitechCSCatalog/Default/template_mega_pipe_belt.html.twig',
            '@ContitechCSCatalog/Default/template_sybercord_technology.html.twig',
            '@ContitechCSCatalog/Default/template_cleated_belts.html.twig',
            '@ContitechCSCatalog/Default/template_conti_protect_systems.html.twig',
            '@ContitechCSCatalog/Default/template_product_page.html.twig',
            '@ContitechCSCatalog/Default/template_contialert_product_page.html.twig',
            '@ContitechCSCatalog/Default/template_conveyor_belt_group.html.twig',
            '@ContitechCSCatalog/Default/template_product_section_page.html.twig',
            '@ContitechCSCatalog/Default/template_textile_belt_construction.html.twig',
            '@ContitechCSCatalog/Default/template_contiClean.html.twig',
            '@ContitechCSCatalog/Default/template_cover_compounds.html.twig',
            '@ContitechCSCatalog/Default/template_quality_and_the_environment.html.twig',
            '@ContitechCSCatalog/Default/template_wood_product.html.twig',
            '@ContitechCSCatalog/Content/pdf.html.twig',
        ];
        $sectionPageTitle = '';
        $all_doc_arr = [];
        foreach ($listing as $doc) {
            if ($doc->getTemplate() == '@ContitechCSCatalog/Default/template_product_section_page.html.twig') {
                $obj = $doc->getEditable('TOC_Section_Title');
                if (!empty($obj)) {
                    $sectionPageTitle = $obj->getData();
                }
                continue;
            }
            if (!empty($sectionPageTitle) && in_array($doc->getTemplate(), $templateArray)) {
                $obj = $doc->getEditable('CS_ProductName');
                if (!empty($obj) && !empty($obj->getData())) {
                    $all_doc_arr[$sectionPageTitle][] = $obj->getData();
                } else {
                    $all_doc_arr[$sectionPageTitle][] = $doc->getKey();
                }
            }
        }
        $parameterBag['data'] = $all_doc_arr;
        return $this->render("@ContitechCSCatalog/Default/template_dynamic_table_of_contents.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_page")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateProductPageAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty     = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId                   = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_template_product_page');
        $productData = [];

        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {

                $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();
                $selectedProduct            = $catalogTableObject->getProducts();
                $productObj                 = null;
                $productNameArr = [];

                if ($selectedProduct) {
                    foreach ($selectedProduct as $key => $singleProduct) {
                        $productObject      = DataObject\CSProducts::getById($singleProduct);
                        if ($productObject) {
                            $productNameArr[]   = trim($productObject->getName());
                        }

                        if (!$productObj) {
                            $productObj = $productObject;
                        }
                    }
                }
                if (!empty($productObj) && $productObj instanceof DataObject\CSProducts) {
                    $productObj->setGetInheritedValues(true);
                }
                if ($productObj && ($productObj->isPublished()) && (empty($productObj->getCSRegion()) || in_array($regionId, $productObj->getCSRegion()))) {
                    $productNameTitle   =   implode(' and ', $productNameArr);
                    $productName        =   trim($productObj->getName());
                    $productKeyName     =   trim($productObj->getKey());
                    $parentParentObj    =   $this->getProductParentObject($productObj);

                    if (!empty($parentParentObj) && $parentParentObj instanceof DataObject\CSProducts) {
                        $productData['HierarchyNameLevel2'] = $parentParentObj->getName();
                    } else {
                        $productData['HierarchyNameLevel2'] = null;
                    }
                    $productData['ProductName'] = $productNameTitle;
                    $productData['ProductClaimSlogan'] = $productObj->getProductClaimSlogan();
                    $productData['ShortText'] = $productObj->getShortText();
                    $productData['LongText'] = $productObj->getLongText();
                    $productData['LogoImage'] = $productObj->getLogoImage();

                    $applicationsHtml = '';
                    $coverCompoundHtml = '';
                    $marketsHtml = '';
                    if (method_exists($productObj, 'getCSProductApplications') &&  $productObj->getCSProductApplications()) {
                        $applicationsHtml = '<ul>';
                        foreach ($productObj->getCSProductApplications() as $key => $value) {
                            $applicationsHtml .= '<li><span class="orange">›</span> ' . $value->getApplicationName() . ' </li>';
                        }
                        $applicationsHtml .= '</ul>';
                    }

                    $productData['Applications'] = $applicationsHtml;

                    if (method_exists($productObj, 'getCoverCompounds') && $productObj->getCoverCompounds()) {
                        $coverCompoundHtml = '<ul>';
                        foreach ($productObj->getCoverCompounds() as $key => $value) {
                            $coverCompoundHtml .= '<li><span class="orange">›</span> ' . $value->getName() . ' </li>';
                        }
                        $coverCompoundHtml .= '</ul>';
                    }

                    $productData['CoverCompounds'] = $coverCompoundHtml;

                    if (method_exists($productObj, 'getCSProductIndustries') && $productObj->getCSProductIndustries()) {
                        $marketsHtml = '<ul>';
                        foreach ($productObj->getCSProductIndustries() as $key => $value) {
                            $marketsHtml .= '<li><span class="orange">›</span> ' . $value->getIndustryName() . ' </li>';
                        }
                        $marketsHtml .= '</ul>';
                    }
                    $productData['Markets'] = $marketsHtml;

                    $featuresAndBenefits = [];
                    $featuresAndBenefitsWithoutImages = [];
                    $imageFoundInFeatures = false;
                    if (method_exists($productObj, 'getCSProductFeaturesAndBenefits') && $productObj->getCSProductFeaturesAndBenefits()) {
                        foreach ($productObj->getCSProductFeaturesAndBenefits() as $key => $value) {
                            if (trim($value->getFeatureName())) {
                                $feature['FeatureName'] = $value->getFeatureName();
                                $feature['FeatureDescription'] = $value->getFeatureDescription();
                                $feature['FeatureImage'] = $value->getFeatureImage();

                                if ($value->getFeatureImage()) {
                                    $imageFoundInFeatures = true;
                                }
                                $featuresAndBenefits[] = $feature;
                                $featuresAndBenefitsWithoutImages[] = $value->getFeatureName();
                            }
                        }
                    }

                    if ($imageFoundInFeatures) {
                        $productData['FeaturesAndBenefits'] = $featuresAndBenefits;
                    } else {
                        $productData['FeaturesAndBenefitsWithoutImages'] = $featuresAndBenefitsWithoutImages;
                    }

                    $moreThanOneProduct = 0;
                    $childrenData = [];

                    if (count($selectedProduct) > 1) {
                        $moreThanOneProduct = 1;
                    }

                    if (array_key_exists($productKeyName, $productDataImportConfig['Common Product Page'])) {
                        if ($selectedProduct) {
                            foreach ($selectedProduct as $key => $singleProduct) {
                                $productObjSingle = DataObject\CSProducts::getById($singleProduct);
                                $childrenDataNew = $this->getAllRegionChildern($productObjSingle, $regionId);
                                $childrenData = array_merge($childrenData, $childrenDataNew);
                            }

                            if (count($selectedProduct) > 1) {
                                $filterArrayMultiple = [];
                                foreach ($childrenData as $chKey => $chChild) {
                                    $filterArrayMultiple[$chKey]['data'] = $chChild;
                                    $filterArrayMultiple[$chKey]['SortOrder'] = $chChild->getSortOrder();
                                }

                                if ($filterArrayMultiple) {
                                    $filterArrayMultipleData = $this->phpArraySort($filterArrayMultiple, array('SortOrder'), SORT_ASC);
                                }

                                $childrenData = [];

                                if ($filterArrayMultipleData) {
                                    foreach ($filterArrayMultipleData as $nChild) {
                                        $childrenData[] = $nChild['data'];
                                    }
                                }
                            }
                        }

                        $productTables          = array();
                        $productTableColumnLimit = $productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit'];
                        $childrenDataChunkArray = array_chunk($childrenData, $productTableColumnLimit);

                        if ($childrenDataChunkArray) {
                            foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) {
                                unset($productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit']);
                                $tables = $productDataImportConfig['Common Product Page'][$productKeyName];

                                if ($tables) {
                                    foreach ($tables as $tablekey => $metricImperialFields) {
                                        $columnKeys = $metricImperialFields['ColumnKeys'];
                                        $cs_Trough_Angle_Label = isset($metricImperialFields['CS_Trough_Angle_Label']) ? $metricImperialFields['CS_Trough_Angle_Label'] : null;
                                        $cs_Material_Weight_Label = isset($metricImperialFields['CS_Material_Weight_Label']) ? $metricImperialFields['CS_Material_Weight_Label'] : null;
                                        $cs_Idlers_Label = isset($metricImperialFields['CS_Idlers_Label']) ? $metricImperialFields['CS_Idlers_Label'] : null;
                                        $cs_Idler_Angle_Label = isset($metricImperialFields['CS_Idler_Angle_Label']) ? $metricImperialFields['CS_Idler_Angle_Label'] : null;
                                        $cs_Type_Of_Idler_Label = isset($metricImperialFields['CS_Type_Of_Idler_Label']) ? $metricImperialFields['CS_Type_Of_Idler_Label'] : null;


                                        unset($metricImperialFields['ColumnKeys']);
                                        unset($metricImperialFields['CS_Trough_Angle_Label']);
                                        unset($metricImperialFields['CS_Material_Weight_Label']);
                                        unset($metricImperialFields['CS_Idlers_Label']);
                                        unset($metricImperialFields['CS_Idler_Angle_Label']);
                                        unset($metricImperialFields['CS_Type_Of_Idler_Label']);

                                        if ($metricImperialFields) {
                                            foreach ($metricImperialFields as $miKey => $miValues) {
                                                $keysGroupLogic = null;
                                                $removeKeys = null;
                                                $additionalHeaderKey = null;
                                                $additionalGroupKey = null;
                                                $productNamePrefix = null;

                                                if (isset($miValues['KeysGroupLogic'])) {
                                                    $keysGroupLogic = $miValues['KeysGroupLogic'];
                                                    unset($miValues['KeysGroupLogic']);
                                                }

                                                if (isset($miValues['ProductNamePrefix'])) {
                                                    $productNamePrefix = true;
                                                }

                                                if (isset($miValues['RemoveKeys'])) {
                                                    $removeKeys = $miValues['RemoveKeys'];
                                                    unset($miValues['RemoveKeys']);
                                                }

                                                $additionalHeaderKey = $productName;
                                                if ($moreThanOneProduct) {
                                                    $additionalHeaderKey = '';
                                                }

                                                if ($cs_Trough_Angle_Label) {
                                                    $additionalHeaderKey = "Trough_Angle_Label";
                                                }

                                                if ($cs_Idler_Angle_Label) {
                                                    $additionalHeaderKey = "Idler_Angle_Label";
                                                }

                                                if ($cs_Material_Weight_Label) {
                                                    $additionalGroupKey = "CS_Material_Weight_Label";
                                                }

                                                if ($cs_Type_Of_Idler_Label) {
                                                    $additionalGroupKey = "CS_Type_Of_Idler_Label";
                                                }

                                                $groupingTitle = [];
                                                if ($additionalGroupKey) {
                                                    $groupingTitle[$additionalGroupKey] = 1;
                                                }

                                                foreach ($miValues as $key => $value) {

                                                    if (isset($value['groupingTitle'])) {

                                                        $groupingTitleLabel = $this->addPrefix($value['groupingTitle']);
                                                        if (isset($groupingTitle[$groupingTitleLabel])) {
                                                            $groupingTitle[$groupingTitleLabel] += 1;
                                                        } else {
                                                            $groupingTitle[$groupingTitleLabel] = 1;
                                                        }
                                                    }
                                                }

                                                $miArray = array();
                                                $theadSecondData = [];
                                                $tableHeaderKeys = [];
                                                $theadSecondData[] = $additionalHeaderKey;

                                                if ($cs_Idlers_Label) {
                                                    $theadSecondData[] = $additionalHeaderKey;
                                                }

                                                foreach ($childrenDataChunk as $childValue) {
                                                    $percentageSymbol = '';
                                                    $showDecimalPlaces = '';
                                                    $productBrand = null;
                                                    $bricks = $childValue->getProductAttributes();

                                                    if ($productNamePrefix) {
                                                        $productBrand = $childValue->getProductNamePrefix();
                                                    }

                                                    $data = [];

                                                    foreach ($miValues as $key => $value) {
                                                        $brickName = isset($value['objectType']) ? $value['objectType'] : null;
                                                        $percentageSymbol = isset($value['percentageSymbol']) ? $value['percentageSymbol'] : null;
                                                        $showDecimalPlaces = isset($value['showDecimalPlaces']) ? $value['showDecimalPlaces'] : null;
                                                        $getBrick = 'get' . $brickName;
                                                        $getField = 'get' . $key;

                                                        if ($brickName == 'class') {
                                                            if ($showDecimalPlaces == '') {
                                                                $data[$key] = $childValue->$getField();
                                                            } else {
                                                                $formattedFieldValue = number_format($childValue->$getField(), 3);
                                                                $data[$key] = $formattedFieldValue;
                                                            }
                                                        } else {
                                                            if (method_exists($bricks, $getBrick) && !is_null($bricks->$getBrick()) && method_exists($bricks->$getBrick(), $getField)) {
                                                                if ($bricks->$getBrick()->$getField()) {
                                                                    if ($showDecimalPlaces == '') {
                                                                        $formattedFieldValue = $bricks->$getBrick()->$getField();
                                                                    } else {
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(), 3);
                                                                    }

                                                                    $data[$key] = $formattedFieldValue . $percentageSymbol;
                                                                } else {
                                                                    if ($showDecimalPlaces == '') {
                                                                        $data[$key] = $bricks->$getBrick()->$getField();
                                                                    } else {
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(), 3);
                                                                        $data[$key] = $formattedFieldValue;
                                                                    }
                                                                }
                                                            } else {
                                                                $data[$key] = '';
                                                            }
                                                        }
                                                    }

                                                    if ($columnKeys) {
                                                        foreach ($keysGroupLogic as $hValue) {
                                                            $tableHeaderKeys[] = $data[$hValue];
                                                        }


                                                        if ($tableHeaderKeys) {
                                                            $productBrandString = $productBrand . " " . implode('/', $tableHeaderKeys);
                                                            $theadSecondData[] = $productBrandString;
                                                            unset($productBrand);
                                                        }
                                                    }

                                                    unset($tableHeaderKeys);
                                                    $miArray[] = $data;
                                                }

                                                $tbodyArray = [];
                                                $theadfirstColspan = 0;

                                                if ($columnKeys) {
                                                    $tableRows = [];
                                                    if ($miArray) {
                                                        foreach ($miArray as $variant) {
                                                            foreach ($variant as $key => $value) {
                                                                if ($removeKeys) {
                                                                    if (!isset($removeKeys[$key])) {
                                                                        $tableRows[$key][] = $value;
                                                                    }
                                                                } else {
                                                                    $tableRows[$key][] = $value;
                                                                }
                                                            }
                                                        }
                                                    }

                                                    if ($tableRows) {
                                                        foreach ($tableRows as $tdkey => $trvalue) {

                                                            if ($cs_Idlers_Label) {
                                                                $rows[] = 'CS_Idlers_Label';
                                                            }
                                                            $rows[] = $this->addPrefix($tdkey);

                                                            foreach ($trvalue as $key => $value) {
                                                                $rows[] = $value;
                                                            }

                                                            $tbodyArray[] = $rows;
                                                            unset($rows);
                                                        }
                                                        $theadfirstColspan = count($tbodyArray[0]);
                                                    }
                                                } else {
                                                    $tableHeadKey = $miArray[0];
                                                    if ($removeKeys) {
                                                        foreach ($removeKeys as $key => $value) {
                                                            unset($tableHeadKey[$key]);
                                                        }
                                                        $tableHeadKey = array_keys($tableHeadKey);
                                                        $theadSecondData = \array_merge($theadSecondData, $tableHeadKey);
                                                    }

                                                    // Converting field to its title name

                                                    foreach ($theadSecondData as $key => $value) {
                                                        $theadSecondData[$key] = $this->addPrefix($value);
                                                    }

                                                    foreach ($miArray as $variant) {
                                                        $newKey = [];
                                                        $newArray = [];

                                                        if ($removeKeys) {

                                                            foreach ($removeKeys as $key => $value) {
                                                                $newKey[] = $variant[$key];
                                                                unset($variant[$key]);
                                                            }

                                                            $newArray[] = implode('/', $newKey);
                                                            $newArray = \array_merge($newArray, $variant);

                                                            $tbodyArray[] = array_values($newArray);
                                                        }
                                                    }
                                                    $theadfirstColspan = count($tbodyArray[0]);
                                                }

                                                // Remove blank row
                                                foreach ($tbodyArray as $tableColKey => $tableRow) {
                                                    if (count(array_filter($tableRow)) <= 1) {
                                                        unset($tbodyArray[$tableColKey]);
                                                    }
                                                }

                                                if (!empty($tbodyArray)) {
                                                    $miKey = $this->addPrefix($miKey);
                                                    $productTables[$tablekey][$chunkKey][$miKey]['tbody'] = $tbodyArray;
                                                    $productTables[$tablekey][$chunkKey][$miKey]['theadfirstRowColspan'] = $theadfirstColspan;

                                                    if ($groupingTitle) {
                                                        $productTables[$tablekey][$chunkKey][$miKey]['theadSecondRowGroup'] = $groupingTitle;
                                                    }

                                                    $productTables[$tablekey][$chunkKey][$miKey]['theadSecondRow'] = $theadSecondData;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        if (isset($productTables['Load Support – Maximum Belt Width Data']) && (count($productTables['Load Support – Maximum Belt Width Data']) > 1)) {
                            $singleLoadSupportMaximumBeltWidthData = [];
                            $loadSupportMaximumBeltWidthData = $productTables['Load Support – Maximum Belt Width Data'];

                            foreach ($loadSupportMaximumBeltWidthData as $key => $section) {
                                foreach ($section as $sectionKey => $tableSection) {

                                    foreach ($tableSection as $tableSectionKey => $tableSectionValue) {

                                        if ($tableSectionKey == 'tbody') {
                                            foreach ($tableSection[$tableSectionKey] as $value) {
                                                $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey][] = $value;
                                            }
                                        } else {
                                            $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey] = $tableSectionValue;
                                        }
                                    }
                                }
                            }

                            #Move first imperail then matric
                            if (isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'])) {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'];
                            }

                            if (isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'])) {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Metric'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'];
                            }

                            $productTables['Load Support – Maximum Belt Width Data'] = $sortedSingleLoadSupportMaximumBeltWidthData;
                        }

                        $productData['productTables'] = $productTables;
                    }
                }
            }
            $parameterBag['data'] = $productData;
        }
        return $this->render("@ContitechCSCatalog/Default/template_product_page.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_contiAlert_page")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateContiAlertPageAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty     = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId                   = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_alert');
        $productData = [];

        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {

                $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();
                $selectedProduct            = $catalogTableObject->getProducts();
                $productObj                 = null;
                $productNameArr = [];

                if ($selectedProduct) {
                    foreach ($selectedProduct as $key => $singleProduct) {
                        $productObject      = DataObject\CSProducts::getById($singleProduct);
                        if ($productObject) {
                            $productNameArr[]   = trim($productObject->getName());
                        }

                        if (!$productObj) {
                            $productObj = $productObject;
                        }
                    }
                }
                if (!empty($productObj) && $productObj instanceof DataObject\CSProducts) {
                    $productObj->setGetInheritedValues(true);
                }
                if ($productObj && ($productObj->isPublished()) && (empty($productObj->getCSRegion()) || in_array($regionId, $productObj->getCSRegion()))) {
                    $productNameTitle   =   implode(' and ', $productNameArr);
                    $productName        =   trim($productObj->getName());
                    $productKeyName     =   trim($productObj->getKey());
                    $parentParentObj    =   $this->getProductParentObject($productObj);

                    if (!empty($parentParentObj) && $parentParentObj instanceof DataObject\CSProducts) {
                        $productData['HierarchyNameLevel2'] = $parentParentObj->getName();
                    } else {
                        $productData['HierarchyNameLevel2'] = null;
                    }
                    $productData['ProductName'] = $productNameTitle;
                    $productData['ProductClaimSlogan'] = $productObj->getProductClaimSlogan();
                    $productData['ShortText'] = $productObj->getShortText();
                    $productData['LongText'] = $productObj->getLongText();
                    $productData['LogoImage'] = $productObj->getLogoImage();

                    if (method_exists($productObj, 'getCSProductApplications') &&  $productObj->getCSProductApplications()) {
                        $applicationsHtml = '<ul>';
                        foreach ($productObj->getCSProductApplications() as $key => $value) {
                            $applicationsHtml .= '<li><span class="orange">›</span> ' . $value->getApplicationName() . ' </li>';
                        }
                        $applicationsHtml .= '</ul>';
                    }

                    $productData['Applications'] = $applicationsHtml;

                    if (method_exists($productObj, 'getCoverCompounds') && $productObj->getCoverCompounds()) {
                        $coverCompoundHtml = '<ul>';
                        foreach ($productObj->getCoverCompounds() as $key => $value) {
                            $coverCompoundHtml .= '<li><span class="orange">›</span> ' . $value->getName() . ' </li>';
                        }
                        $coverCompoundHtml .= '</ul>';
                    }

                    $productData['CoverCompounds'] = $coverCompoundHtml;

                    if (method_exists($productObj, 'getCSProductIndustries') && $productObj->getCSProductIndustries()) {
                        $marketsHtml = '<ul>';
                        foreach ($productObj->getCSProductIndustries() as $key => $value) {
                            $marketsHtml .= '<li><span class="orange">›</span> ' . $value->getIndustryName() . ' </li>';
                        }
                        $marketsHtml .= '</ul>';
                    }
                    $productData['Markets'] = $marketsHtml;

                    $featuresAndBenefits = [];
                    $featuresAndBenefitsWithoutImages = [];
                    $imageFoundInFeatures = false;
                    if (method_exists($productObj, 'getCSProductFeaturesAndBenefits') && $productObj->getCSProductFeaturesAndBenefits()) {
                        foreach ($productObj->getCSProductFeaturesAndBenefits() as $key => $value) {
                            if (trim($value->getFeatureName())) {
                                $feature['FeatureName'] = $value->getFeatureName();
                                $feature['FeatureDescription'] = $value->getFeatureDescription();
                                $feature['FeatureImage'] = $value->getFeatureImage();

                                if ($value->getFeatureImage()) {
                                    $imageFoundInFeatures = true;
                                }

                                $featuresAndBenefits[] = $feature;

                                $featuresAndBenefitsWithoutImages[] = $value->getFeatureName();
                            }
                        }
                    }

                    if ($imageFoundInFeatures) {
                        $productData['FeaturesAndBenefits'] = $featuresAndBenefits;
                    } else {
                        $productData['FeaturesAndBenefitsWithoutImages'] = $featuresAndBenefitsWithoutImages;
                    }

                    $moreThanOneProduct = 0;
                    $childrenData = [];

                    if (count($selectedProduct) > 1) {
                        $moreThanOneProduct = 1;
                    }

                    if (array_key_exists($productKeyName, $productDataImportConfig['Common Product Page'])) {
                        if ($selectedProduct) {
                            foreach ($selectedProduct as $key => $singleProduct) {
                                $productObjSingle = DataObject\CSProducts::getById($singleProduct);
                                $childrenDataNew = $this->getAllRegionChildern($productObjSingle, $regionId);
                                $childrenData = array_merge($childrenData, $childrenDataNew);
                            }

                            if (count($selectedProduct) > 1) {
                                $filterArrayMultiple = [];
                                foreach ($childrenData as $chKey => $chChild) {
                                    $filterArrayMultiple[$chKey]['data'] = $chChild;
                                    $filterArrayMultiple[$chKey]['SortOrder'] = $chChild->getSortOrder();
                                }

                                if ($filterArrayMultiple) {
                                    $filterArrayMultipleData = $this->phpArraySort($filterArrayMultiple, array('SortOrder'), SORT_ASC);
                                }

                                $childrenData = [];

                                if ($filterArrayMultipleData) {
                                    foreach ($filterArrayMultipleData as $nChild) {
                                        $childrenData[] = $nChild['data'];
                                    }
                                }
                            }
                        }

                        $productTables          = array();
                        $productTableColumnLimit = $productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit'];
                        $childrenDataChunkArray = array_chunk($childrenData, $productTableColumnLimit);

                        if ($childrenDataChunkArray) {
                            foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) {
                                unset($productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit']);
                                $tables = $productDataImportConfig['Common Product Page'][$productKeyName];

                                if ($tables) {
                                    foreach ($tables as $tablekey => $metricImperialFields) {
                                        $columnKeys = $metricImperialFields['ColumnKeys'];
                                        $cs_Trough_Angle_Label = $metricImperialFields['CS_Trough_Angle_Label'];
                                        $cs_Material_Weight_Label = $metricImperialFields['CS_Material_Weight_Label'];
                                        $cs_Idlers_Label = $metricImperialFields['CS_Idlers_Label'];
                                        $cs_Idler_Angle_Label = $metricImperialFields['CS_Idler_Angle_Label'];
                                        $cs_Type_Of_Idler_Label = $metricImperialFields['CS_Type_Of_Idler_Label'];


                                        unset($metricImperialFields['ColumnKeys']);
                                        unset($metricImperialFields['CS_Trough_Angle_Label']);
                                        unset($metricImperialFields['CS_Material_Weight_Label']);
                                        unset($metricImperialFields['CS_Idlers_Label']);
                                        unset($metricImperialFields['CS_Idler_Angle_Label']);
                                        unset($metricImperialFields['CS_Type_Of_Idler_Label']);

                                        if ($metricImperialFields) {
                                            foreach ($metricImperialFields as $miKey => $miValues) {
                                                unset($keysGroupLogic);
                                                unset($removeKeys);
                                                unset($additionalHeaderKey);
                                                unset($additionalGroupKey);
                                                unset($productNamePrefix);
                                                unset($productBrand);

                                                if (isset($miValues['KeysGroupLogic'])) {
                                                    $keysGroupLogic = $miValues['KeysGroupLogic'];
                                                    unset($miValues['KeysGroupLogic']);
                                                }

                                                if (isset($miValues['ProductNamePrefix'])) {
                                                    $productNamePrefix = true;
                                                }

                                                if (isset($miValues['RemoveKeys'])) {
                                                    $removeKeys = $miValues['RemoveKeys'];
                                                    unset($miValues['RemoveKeys']);
                                                }

                                                $additionalHeaderKey = $productName;
                                                if ($moreThanOneProduct) {
                                                    $additionalHeaderKey = '';
                                                }

                                                if ($cs_Trough_Angle_Label) {
                                                    $additionalHeaderKey = "Trough_Angle_Label";
                                                }

                                                if ($cs_Idler_Angle_Label) {
                                                    $additionalHeaderKey = "Idler_Angle_Label";
                                                }

                                                if ($cs_Material_Weight_Label) {
                                                    $additionalGroupKey = "CS_Material_Weight_Label";
                                                }

                                                if ($cs_Type_Of_Idler_Label) {
                                                    $additionalGroupKey = "CS_Type_Of_Idler_Label";
                                                }

                                                $groupingTitle = [];

                                                if ($additionalGroupKey) {
                                                    $groupingTitle[$additionalGroupKey] = 1;
                                                }

                                                foreach ($miValues as $key => $value) {

                                                    if (isset($value['groupingTitle'])) {
                                                        $groupingTitleLabel = $this->addPrefix($value['groupingTitle']);
                                                        $groupingTitle[$groupingTitleLabel] += 1;
                                                    }
                                                }

                                                $miArray = array();
                                                $theadSecondData = [];
                                                $tableHeaderKeys = [];
                                                $theadSecondData[] = $additionalHeaderKey;

                                                if ($cs_Idlers_Label) {
                                                    $theadSecondData[] = $additionalHeaderKey;
                                                }

                                                foreach ($childrenDataChunk as $childValue) {
                                                    $percentageSymbol = '';
                                                    $showDecimalPlaces = '';
                                                    $bricks = $childValue->getProductAttributes();

                                                    if ($productNamePrefix) {
                                                        $productBrand = $childValue->getProductNamePrefix();
                                                    }

                                                    $data = [];

                                                    foreach ($miValues as $key => $value) {
                                                        $brickName = $value['objectType'];
                                                        $percentageSymbol = $value['percentageSymbol'];
                                                        $showDecimalPlaces = $value['showDecimalPlaces'];
                                                        $getBrick = 'get' . $brickName;
                                                        $getField = 'get' . $key;

                                                        if ($brickName == 'class') {
                                                            if ($showDecimalPlaces == '') {
                                                                $data[$key] = $childValue->$getField();
                                                            } else {
                                                                $formattedFieldValue = number_format($childValue->$getField(), 3);
                                                                $data[$key] = $formattedFieldValue;
                                                            }
                                                        } else {
                                                            if (method_exists($bricks, $getBrick) && method_exists($bricks->$getBrick(), $getField)) {
                                                                if ($bricks->$getBrick()->$getField()) {
                                                                    if ($showDecimalPlaces == '') {
                                                                        $formattedFieldValue = $bricks->$getBrick()->$getField();
                                                                    } else {
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(), 3);
                                                                    }

                                                                    $data[$key] = $formattedFieldValue . $percentageSymbol;
                                                                } else {
                                                                    if ($showDecimalPlaces == '') {
                                                                        $data[$key] = $bricks->$getBrick()->$getField();
                                                                    } else {
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(), 3);
                                                                        $data[$key] = $formattedFieldValue;
                                                                    }
                                                                }
                                                            } else {
                                                                $data[$key] = '';
                                                            }
                                                        }
                                                    }

                                                    if ($columnKeys) {
                                                        foreach ($keysGroupLogic as $hValue) {
                                                            $tableHeaderKeys[] = $data[$hValue];
                                                        }


                                                        if ($tableHeaderKeys) {
                                                            $productBrandString = $productBrand . " " . implode('/', $tableHeaderKeys);
                                                            $theadSecondData[] = $productBrandString;
                                                            unset($productBrand);
                                                        }
                                                    }

                                                    unset($tableHeaderKeys);
                                                    $miArray[] = $data;
                                                }

                                                $tbodyArray = [];
                                                $theadfirstColspan = 0;

                                                if ($columnKeys) {
                                                    $tableRows = [];
                                                    if ($miArray) {
                                                        foreach ($miArray as $variant) {
                                                            foreach ($variant as $key => $value) {
                                                                if ($removeKeys) {
                                                                    if (!isset($removeKeys[$key])) {
                                                                        $tableRows[$key][] = $value;
                                                                    }
                                                                } else {
                                                                    $tableRows[$key][] = $value;
                                                                }
                                                            }
                                                        }
                                                    }

                                                    if ($tableRows) {
                                                        foreach ($tableRows as $tdkey => $trvalue) {

                                                            if ($cs_Idlers_Label) {
                                                                $rows[] = 'CS_Idlers_Label';
                                                            }
                                                            $rows[] = $this->addPrefix($tdkey);

                                                            foreach ($trvalue as $key => $value) {
                                                                $rows[] = $value;
                                                            }

                                                            $tbodyArray[] = $rows;
                                                            unset($rows);
                                                        }
                                                        $theadfirstColspan = count($tbodyArray[0]);
                                                    }
                                                } else {
                                                    $tableHeadKey = $miArray[0];
                                                    if ($removeKeys) {
                                                        foreach ($removeKeys as $key => $value) {
                                                            unset($tableHeadKey[$key]);
                                                        }
                                                        $tableHeadKey = array_keys($tableHeadKey);
                                                        $theadSecondData = \array_merge($theadSecondData, $tableHeadKey);
                                                    }

                                                    // Converting field to its title name

                                                    foreach ($theadSecondData as $key => $value) {
                                                        $theadSecondData[$key] = $this->addPrefix($value);
                                                    }

                                                    foreach ($miArray as $variant) {
                                                        $newKey = [];
                                                        $newArray = [];

                                                        if ($removeKeys) {

                                                            foreach ($removeKeys as $key => $value) {
                                                                $newKey[] = $variant[$key];
                                                                unset($variant[$key]);
                                                            }

                                                            $newArray[] = implode('/', $newKey);
                                                            $newArray = \array_merge($newArray, $variant);

                                                            $tbodyArray[] = array_values($newArray);
                                                        }
                                                    }
                                                    $theadfirstColspan = count($tbodyArray[0]);
                                                }

                                                // Remove blank row
                                                foreach ($tbodyArray as $tableColKey => $tableRow) {
                                                    if (count(array_filter($tableRow)) <= 1) {
                                                        unset($tbodyArray[$tableColKey]);
                                                    }
                                                }

                                                if (!empty($tbodyArray)) {
                                                    $miKey = $this->addPrefix($miKey);
                                                    $productTables[$tablekey][$chunkKey][$miKey]['tbody'] = $tbodyArray;
                                                    $productTables[$tablekey][$chunkKey][$miKey]['theadfirstRowColspan'] = $theadfirstColspan;


                                                    if ($groupingTitle) {
                                                        $productTables[$tablekey][$chunkKey][$miKey]['theadSecondRowGroup'] = $groupingTitle;
                                                    }

                                                    $productTables[$tablekey][$chunkKey][$miKey]['theadSecondRow'] = $theadSecondData;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        if (isset($productTables['Load Support – Maximum Belt Width Data']) && (count($productTables['Load Support – Maximum Belt Width Data']) > 1)) {
                            $singleLoadSupportMaximumBeltWidthData = [];
                            $loadSupportMaximumBeltWidthData = $productTables['Load Support – Maximum Belt Width Data'];

                            foreach ($loadSupportMaximumBeltWidthData as $key => $section) {
                                foreach ($section as $sectionKey => $tableSection) {

                                    foreach ($tableSection as $tableSectionKey => $tableSectionValue) {

                                        if ($tableSectionKey == 'tbody') {
                                            foreach ($tableSection[$tableSectionKey] as $value) {
                                                $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey][] = $value;
                                            }
                                        } else {
                                            $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey] = $tableSectionValue;
                                        }
                                    }
                                }
                            }

                            #Move first imperail then matric
                            if (isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'])) {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'];
                            }

                            if (isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'])) {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Metric'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'];
                            }

                            $productTables['Load Support – Maximum Belt Width Data'] = $sortedSingleLoadSupportMaximumBeltWidthData;
                        }

                        $productData['productTables'] = $productTables;
                    }
                }
            }
            $parameterBag['data'] = $productData;
        }
        return $this->render("@ContitechCSCatalog/Default/template_contialert_product_page.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_transconti_product_page")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateTranscontiProductPageAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty     = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId                   = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_template_transconti_product_page');
        $productData = [];

        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {

                $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();
                $selectedProduct            = $catalogTableObject->getProducts();
                $productObj                 = null;
                $productNameArr = [];

                if ($selectedProduct) {
                    foreach ($selectedProduct as $key => $singleProduct) {
                        $productObject      = DataObject\CSProducts::getById($singleProduct);
                        if ($productObject) {
                            $productNameArr[]   = trim($productObject->getName());
                        }

                        if (!$productObj) {
                            $productObj = $productObject;
                        }
                    }
                }
                if (!empty($productObj) && $productObj instanceof DataObject\CSProducts) {
                    $productObj->setGetInheritedValues(true);
                }
                if ($productObj && ($productObj->isPublished()) && (empty($productObj->getCSRegion()) || in_array($regionId, $productObj->getCSRegion()))) {
                    $productNameTitle   =   implode(' and ', $productNameArr);
                    $productName        =   trim($productObj->getName());
                    $productKeyName     =   trim($productObj->getKey());
                    $parentParentObj    =   $this->getProductParentObject($productObj);

                    if (!empty($parentParentObj) && $parentParentObj instanceof DataObject\CSProducts) {
                        $productData['HierarchyNameLevel2'] = $parentParentObj->getName();
                    } else {
                        $productData['HierarchyNameLevel2'] = null;
                    }
                    $productData['ProductName'] = $productNameTitle;
                    $productData['ShortText'] = $productObj->getShortText();

                    if (method_exists($productObj, 'getCSProductApplications') &&  $productObj->getCSProductApplications()) {
                        $applicationsHtml = '<ul>';
                        foreach ($productObj->getCSProductApplications() as $key => $value) {
                            $applicationsHtml .= '<li><span class="orange">›</span> ' . $value->getApplicationName() . ' </li>';
                        }
                        $applicationsHtml .= '</ul>';
                    }

                    $productData['Applications'] = $applicationsHtml;

                    if (method_exists($productObj, 'getCoverCompounds') && $productObj->getCoverCompounds()) {
                        $coverCompoundHtml = '<ul>';
                        foreach ($productObj->getCoverCompounds() as $key => $value) {
                            $coverCompoundHtml .= '<li><span class="orange">›</span> ' . $value->getName() . ' </li>';
                        }
                        $coverCompoundHtml .= '</ul>';
                    }

                    $productData['CoverCompounds'] = $coverCompoundHtml;

                    if (method_exists($productObj, 'getCSProductIndustries') && $productObj->getCSProductIndustries()) {
                        $marketsHtml = '<ul>';
                        foreach ($productObj->getCSProductIndustries() as $key => $value) {
                            $marketsHtml .= '<li><span class="orange">›</span> ' . $value->getIndustryName() . ' </li>';
                        }
                        $marketsHtml .= '</ul>';
                    }
                    $productData['Markets'] = $marketsHtml;

                    $featuresAndBenefits = [];

                    if (method_exists($productObj, 'getCSProductFeaturesAndBenefits') && $productObj->getCSProductFeaturesAndBenefits()) {
                        foreach ($productObj->getCSProductFeaturesAndBenefits() as $key => $value) {
                            if (trim($value->getFeatureName())) {
                                $feature['FeatureName'] = $value->getFeatureName();
                                $feature['FeatureDescription'] = $value->getFeatureDescription();
                                $feature['FeatureImage'] = $value->getFeatureImage();

                                $featuresAndBenefits[] = $feature;
                            }
                        }
                    }

                    $productData['FeaturesAndBenefits'] = $featuresAndBenefits;

                    $moreThanOneProduct = 0;
                    $childrenData = [];

                    if (count($selectedProduct) > 1) {
                        $moreThanOneProduct = 1;
                    }

                    if (array_key_exists($productKeyName, $productDataImportConfig['Common Product Page'])) {
                        if ($selectedProduct) {
                            foreach ($selectedProduct as $key => $singleProduct) {
                                $productObjSingle = DataObject\CSProducts::getById($singleProduct);
                                $childrenDataNew = $this->getAllRegionChildern($productObjSingle, $regionId);
                                $childrenData = array_merge($childrenData, $childrenDataNew);
                            }

                            if (count($selectedProduct) > 1) {
                                $filterArrayMultiple = [];
                                foreach ($childrenData as $chKey => $chChild) {
                                    $filterArrayMultiple[$chKey]['data'] = $chChild;
                                    $filterArrayMultiple[$chKey]['SortOrder'] = $chChild->getSortOrder();
                                }

                                if ($filterArrayMultiple) {
                                    $filterArrayMultipleData = $this->phpArraySort($filterArrayMultiple, array('SortOrder'), SORT_ASC);
                                }

                                $childrenData = [];

                                if ($filterArrayMultipleData) {
                                    foreach ($filterArrayMultipleData as $nChild) {
                                        $childrenData[] = $nChild['data'];
                                    }
                                }
                            }
                        }

                        $productTables          = array();
                        $productTableColumnLimit = $productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit'];
                        $childrenDataChunkArray = array_chunk($childrenData, $productTableColumnLimit);

                        if ($childrenDataChunkArray) {
                            foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) {
                                unset($productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit']);
                                $tables = $productDataImportConfig['Common Product Page'][$productKeyName];

                                if ($tables) {
                                    foreach ($tables as $tablekey => $metricImperialFields) {
                                        $columnKeys = $metricImperialFields['ColumnKeys'];
                                        $cs_Trough_Angle_Label = $metricImperialFields['CS_Trough_Angle_Label'];
                                        $cs_Material_Weight_Label = $metricImperialFields['CS_Material_Weight_Label'];
                                        $cs_Idlers_Label = $metricImperialFields['CS_Idlers_Label'];
                                        $cs_Idler_Angle_Label = $metricImperialFields['CS_Idler_Angle_Label'];
                                        $cs_Type_Of_Idler_Label = $metricImperialFields['CS_Type_Of_Idler_Label'];


                                        unset($metricImperialFields['ColumnKeys']);
                                        unset($metricImperialFields['CS_Trough_Angle_Label']);
                                        unset($metricImperialFields['CS_Material_Weight_Label']);
                                        unset($metricImperialFields['CS_Idlers_Label']);
                                        unset($metricImperialFields['CS_Idler_Angle_Label']);
                                        unset($metricImperialFields['CS_Type_Of_Idler_Label']);

                                        if ($metricImperialFields) {
                                            foreach ($metricImperialFields as $miKey => $miValues) {
                                                unset($keysGroupLogic);
                                                unset($removeKeys);
                                                unset($additionalHeaderKey);
                                                unset($additionalGroupKey);
                                                unset($productNamePrefix);
                                                unset($productBrand);

                                                if (isset($miValues['KeysGroupLogic'])) {
                                                    $keysGroupLogic = $miValues['KeysGroupLogic'];
                                                    unset($miValues['KeysGroupLogic']);
                                                }

                                                if (isset($miValues['ProductNamePrefix'])) {
                                                    $productNamePrefix = true;
                                                }

                                                if (isset($miValues['RemoveKeys'])) {
                                                    $removeKeys = $miValues['RemoveKeys'];
                                                    unset($miValues['RemoveKeys']);
                                                }

                                                $additionalHeaderKey = $productName;
                                                if ($moreThanOneProduct) {
                                                    $additionalHeaderKey = '';
                                                }

                                                if ($cs_Trough_Angle_Label) {
                                                    $additionalHeaderKey = "Trough_Angle_Label";
                                                }

                                                if ($cs_Idler_Angle_Label) {
                                                    $additionalHeaderKey = "Idler_Angle_Label";
                                                }

                                                if ($cs_Material_Weight_Label) {
                                                    $additionalGroupKey = "CS_Material_Weight_Label";
                                                }

                                                if ($cs_Type_Of_Idler_Label) {
                                                    $additionalGroupKey = "CS_Type_Of_Idler_Label";
                                                }

                                                $groupingTitle = [];

                                                if ($additionalGroupKey) {
                                                    $groupingTitle[$additionalGroupKey] = 1;
                                                }

                                                foreach ($miValues as $key => $value) {

                                                    if (isset($value['groupingTitle'])) {
                                                        $groupingTitleLabel = $this->addPrefix($value['groupingTitle']);
                                                        $groupingTitle[$groupingTitleLabel] += 1;
                                                    }
                                                }

                                                $miArray = array();
                                                $theadSecondData = [];
                                                $tableHeaderKeys = [];
                                                $theadSecondData[] = $additionalHeaderKey;

                                                if ($cs_Idlers_Label) {
                                                    $theadSecondData[] = $additionalHeaderKey;
                                                }

                                                foreach ($childrenDataChunk as $childValue) {
                                                    $percentageSymbol = '';
                                                    $showDecimalPlaces = '';
                                                    $bricks = $childValue->getProductAttributes();

                                                    if ($productNamePrefix) {
                                                        $productBrand = $childValue->getProductNamePrefix();
                                                    }

                                                    $data = [];

                                                    foreach ($miValues as $key => $value) {
                                                        $brickName = $value['objectType'];
                                                        $percentageSymbol = $value['percentageSymbol'];
                                                        $showDecimalPlaces = $value['showDecimalPlaces'];
                                                        $getBrick = 'get' . $brickName;
                                                        $getField = 'get' . $key;

                                                        if ($brickName == 'class') {
                                                            if ($showDecimalPlaces == '') {
                                                                $data[$key] = $childValue->$getField();
                                                            } else {
                                                                $formattedFieldValue = number_format($childValue->$getField(), 3);
                                                                $data[$key] = $formattedFieldValue;
                                                            }
                                                        } else {
                                                            if (method_exists($bricks, $getBrick) && method_exists($bricks->$getBrick(), $getField)) {
                                                                if ($bricks->$getBrick()->$getField()) {
                                                                    if ($showDecimalPlaces == '') {
                                                                        $formattedFieldValue = $bricks->$getBrick()->$getField();
                                                                    } else {
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(), 3);
                                                                    }

                                                                    $data[$key] = $formattedFieldValue . $percentageSymbol;
                                                                } else {
                                                                    if ($showDecimalPlaces == '') {
                                                                        $data[$key] = $bricks->$getBrick()->$getField();
                                                                    } else {
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(), 3);
                                                                        $data[$key] = $formattedFieldValue;
                                                                    }
                                                                }
                                                            } else {
                                                                $data[$key] = '';
                                                            }
                                                        }
                                                    }

                                                    if ($columnKeys) {
                                                        foreach ($keysGroupLogic as $hValue) {
                                                            $tableHeaderKeys[] = $data[$hValue];
                                                        }


                                                        if ($tableHeaderKeys) {
                                                            $productBrandString = $productBrand . " " . implode('/', $tableHeaderKeys);
                                                            $theadSecondData[] = $productBrandString;
                                                            unset($productBrand);
                                                        }
                                                    }

                                                    unset($tableHeaderKeys);
                                                    $miArray[] = $data;
                                                }

                                                $tbodyArray = [];
                                                $theadfirstColspan = 0;

                                                if ($columnKeys) {
                                                    $tableRows = [];
                                                    if ($miArray) {
                                                        foreach ($miArray as $variant) {
                                                            foreach ($variant as $key => $value) {
                                                                if ($removeKeys) {
                                                                    if (!isset($removeKeys[$key])) {
                                                                        $tableRows[$key][] = $value;
                                                                    }
                                                                } else {
                                                                    $tableRows[$key][] = $value;
                                                                }
                                                            }
                                                        }
                                                    }

                                                    if ($tableRows) {
                                                        foreach ($tableRows as $tdkey => $trvalue) {

                                                            if ($cs_Idlers_Label) {
                                                                $rows[] = 'CS_Idlers_Label';
                                                            }
                                                            $rows[] = $this->addPrefix($tdkey);


                                                            foreach ($trvalue as $key => $value) {
                                                                $rows[] = $value;
                                                            }

                                                            $tbodyArray[] = $rows;
                                                            unset($rows);
                                                        }
                                                        $theadfirstColspan = count($tbodyArray[0]);
                                                    }
                                                } else {
                                                    $tableHeadKey = $miArray[0];
                                                    if ($removeKeys) {
                                                        foreach ($removeKeys as $key => $value) {
                                                            unset($tableHeadKey[$key]);
                                                        }
                                                        $tableHeadKey = array_keys($tableHeadKey);
                                                        $theadSecondData = \array_merge($theadSecondData, $tableHeadKey);
                                                    }

                                                    // Converting field to its title name

                                                    foreach ($theadSecondData as $key => $value) {
                                                        $theadSecondData[$key] = $this->addPrefix($value);
                                                    }

                                                    foreach ($miArray as $variant) {
                                                        $newKey = [];
                                                        $newArray = [];

                                                        if ($removeKeys) {

                                                            foreach ($removeKeys as $key => $value) {
                                                                $newKey[] = $variant[$key];
                                                                unset($variant[$key]);
                                                            }

                                                            $newArray[] = implode('/', $newKey);
                                                            $newArray = \array_merge($newArray, $variant);

                                                            $tbodyArray[] = array_values($newArray);
                                                        }
                                                    }
                                                    $theadfirstColspan = count($tbodyArray[0]);
                                                }

                                                // Remove blank row
                                                foreach ($tbodyArray as $tableColKey => $tableRow) {
                                                    if (count(array_filter($tableRow)) <= 1) {
                                                        unset($tbodyArray[$tableColKey]);
                                                    }
                                                }

                                                if (!empty($tbodyArray)) {
                                                    $miKey = $this->addPrefix($miKey);
                                                    $productTables[$tablekey][$chunkKey][$miKey]['tbody'] = $tbodyArray;
                                                    $productTables[$tablekey][$chunkKey][$miKey]['theadfirstRowColspan'] = $theadfirstColspan;


                                                    if ($groupingTitle) {
                                                        $productTables[$tablekey][$chunkKey][$miKey]['theadSecondRowGroup'] = $groupingTitle;
                                                    }

                                                    $productTables[$tablekey][$chunkKey][$miKey]['theadSecondRow'] = $theadSecondData;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        if (isset($productTables['Load Support – Maximum Belt Width Data']) && (count($productTables['Load Support – Maximum Belt Width Data']) > 1)) {
                            $singleLoadSupportMaximumBeltWidthData = [];
                            $loadSupportMaximumBeltWidthData = $productTables['Load Support – Maximum Belt Width Data'];

                            foreach ($loadSupportMaximumBeltWidthData as $key => $section) {
                                foreach ($section as $sectionKey => $tableSection) {

                                    foreach ($tableSection as $tableSectionKey => $tableSectionValue) {

                                        if ($tableSectionKey == 'tbody') {
                                            foreach ($tableSection[$tableSectionKey] as $value) {
                                                $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey][] = $value;
                                            }
                                        } else {
                                            $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey] = $tableSectionValue;
                                        }
                                    }
                                }
                            }

                            #Move first imperail then matric
                            if (isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'])) {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'];
                            }

                            if (isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'])) {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Metric'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'];
                            }

                            $productTables['Load Support – Maximum Belt Width Data'] = $sortedSingleLoadSupportMaximumBeltWidthData;
                        }

                        $productData['productTables'] = $productTables;
                    }
                }
            }
            $parameterBag['data'] = $productData;
        }
        return $this->render("@ContitechCSCatalog/Default/template_transConti_page.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_cover_compounds")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateCoverCompoundsAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_template_cover_compound_page');
        $productData = [];
        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();

            $coverCompoundData = [];
            if ($catalogTableObject) {

                $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();
                $selectedCategoryId = $catalogTableObject->getSecondLevelCategory();
                $hierarchyObj = DataObject\CSHierarchy::getById($selectedCategoryId);

                if ($hierarchyObj) {
                    $hierarchyPath = $hierarchyObj->getPath();
                    $hierarchyName = $hierarchyObj->getKey();

                    $hierarchyFullName = $hierarchyPath . $hierarchyName;
                    $productHierarchyPath = \str_replace($hierarchyPath, CS_MATERIAL_HANDLIG_PRODUCTS_PATH, $hierarchyFullName);
                    $hierarchyProductPath = DataObject\CSProducts::getByPath($productHierarchyPath);

                    if ($hierarchyProductPath) {
                        $coverCompoundData['HierarchyNameLevel2'] = trim($hierarchyProductPath->getName());
                        $coverCompoundData['Name'] = trim($hierarchyProductPath->getName());
                        $coverCompoundData['ShortText'] = $hierarchyProductPath->getShortText();
                        $coverCompoundData['LongText'] = $hierarchyProductPath->getLongText();
                        $coverCompoundData['ProductClaimSlogan'] = $hierarchyProductPath->getProductClaimSlogan();
                        $coverCompoundData['productImage'] = $hierarchyProductPath->getProductImage();

                        $csHierarchyObjChild = $this->getAllRegionChildern($hierarchyProductPath, $regionId);
                    }
                }


                $coverOptionsAttributes = $productDataImportConfig['Cover Options']['Cover Compound Attributes'];
                $productPage = $productDataImportConfig['Cover Options']['Product Page'];

                $coverCompoundMasterList = $this->getCoverCompoundMasterList();

                // level 3rd object
                $applicationData    = [];
                $level4Data         = [];
                $coverCompounds     = [];
                $level3rdObjectData = [];
                $singleProductPage  = [];
                $csCompounds       = $this->addPrefix('Compounds');
                $coverCompoundsHeaderKeys   = [];
                $coverCompoundsHeaderKeys[] = $csCompounds;

                if (isset($csHierarchyObjChild) && $csHierarchyObjChild) {
                    foreach ($csHierarchyObjChild as $objectLevel3rd) {
                        $level3Data['Name'] = $objectLevel3rd->getName();
                        $level3Data['LongText'] = $objectLevel3rd->getLongText();
                        $level3rdObjectData[] = $level3Data;

                        if ($objectLevel3rd->getKey() === $productPage) {
                            $performanceCategoryIds = $objectLevel3rd->getCSPerformanceCategory();

                            $performanceCategoryName = [];
                            $performanceCategoryNameString = '';

                            if ($performanceCategoryIds) {
                                foreach ($performanceCategoryIds as $key => $id) {
                                    $performanceCategoryName[] = $coverCompoundMasterList[$id];
                                }
                                if ($performanceCategoryName) {
                                    $performanceCategoryNameString = implode(' ', $performanceCategoryName);
                                }
                            }

                            $namePerformanceCategory =  $level3Data['Name'] . $performanceCategoryNameString;
                            $singleProductPage['Name'] = $level3Data['Name'];
                            $singleProductPage['NamePerformanceCategory'] = $namePerformanceCategory;
                            $singleProductPage['productImage'] = $objectLevel3rd->getProductImage();
                            $singleProductPage['LongText'] = $objectLevel3rd->getLongText();
                            $featuresAndBenefits = [];

                            foreach ($objectLevel3rd->getCSProductFeaturesAndBenefits() as $key => $value) {
                                if ($value->getFeatureImage() && trim($value->getFeatureName())) {
                                    $feature['FeatureName'] = $value->getFeatureName();
                                    $feature['FeatureDescription'] = $value->getFeatureDescription();
                                    $feature['FeatureImage'] = $value->getFeatureImage();
                                    $featuresAndBenefits[] = $feature;
                                }
                            }

                            $singleProductPage['FeaturesAndBenefits'] = $featuresAndBenefits;
                            $level4ObjChild = $this->getAllRegionChildern($objectLevel3rd, $regionId);
                            $level4ObjectData = [];

                            if ($level4ObjChild) {
                                foreach ($level4ObjChild as $level4Value) {
                                    $level4DataPart['Name'] = $level4Value->getName();
                                    $level4DataPart['LongText'] = $level4Value->getLongText();
                                    $level4ObjectData[] = $level4DataPart;
                                }
                            }

                            $singleProductPage['Level4ObjChildData'] = $level4ObjectData;
                        }
                    }
                }
                $label4ChildsEditable = $this->document->getEditable('coverCompoundTableObjects');
                if ($label4ChildsEditable) {
                    $label4Childs = $label4ChildsEditable->getElements();
                    if ($label4Childs) {
                        foreach ($label4Childs as $child) {
                            $level4Key = trim($child->getKey());
                            $level4Name = trim($child->getName());
                            if ($child->getCSPerformanceCategory()) {
                                foreach ($child->getCSPerformanceCategory() as $coverCompound) {
                                    $coverCompoundName = $coverCompoundMasterList[$coverCompound];
                                    $coverCompounds[$coverCompoundName][$level4Key][] = $level4Name;
                                    $bricks = $child->getProductAttributes();

                                    foreach ($coverOptionsAttributes as $key => $brickName) {

                                        $getBrick = 'get' . $brickName;
                                        $getField = 'get' . $key;
                                        if (!in_array($this->addPrefix($key), $coverCompoundsHeaderKeys)) {
                                            $coverCompoundsHeaderKeys[] = $this->addPrefix($key);
                                        }
                                        if ($bricks->$getBrick()) {
                                            if ($key == 'MinTemperatureF') {
                                                $minTemperatureFValue = $bricks->$getBrick()->$getField();
                                                $minTemperatureCValue = $bricks->$getBrick()->getMinTemperatureC();
                                                if ($minTemperatureFValue) {
                                                    $minTemperatureFValue = $minTemperatureFValue . '°F <br>';
                                                }
                                                if ($minTemperatureCValue) {
                                                    $minTemperatureCValue = '(' . $minTemperatureCValue . '°C' . ')';
                                                }
                                                $coverCompounds[$coverCompoundName][$level4Key][] = $minTemperatureFValue . $minTemperatureCValue;
                                            } elseif ($key == 'MaxTemperatureF') {
                                                $maxTemperatureFValue = $bricks->$getBrick()->$getField();
                                                $maxTemperatureCValue = $bricks->$getBrick()->getMaxTemperatureC();
                                                if ($maxTemperatureFValue) {
                                                    $maxTemperatureFValue = $maxTemperatureFValue . '°F <br>';
                                                }
                                                if ($maxTemperatureCValue) {
                                                    $minTemperatureCValue = '(' . $maxTemperatureCValue . '°C' . ')';
                                                }
                                                $coverCompounds[$coverCompoundName][$level4Key][] = $maxTemperatureFValue . $minTemperatureCValue;
                                            } else {
                                                $coverCompounds[$coverCompoundName][$level4Key][] = $bricks->$getBrick()->$getField();
                                            }
                                        } else {
                                            $coverCompounds[$coverCompoundName][$level4Key][] = '';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                $productApplicationObjectEditable = $this->document->getEditable('objectPaths');
                if ($productApplicationObjectEditable) {
                    $productApplicationObject = $productApplicationObjectEditable->getElements();
                    foreach ($productApplicationObject as $childObj) {
                        $coverCompoundProducts = $childObj->getName();

                        if ($childObj->getCSProductApplications()) {
                            foreach ($childObj->getCSProductApplications() as $key => $application) {

                                $applicationData[$application->getApplicationName()] = $application->getApplicationName();
                                $level4Data[$coverCompoundProducts][] = $application->getApplicationName();
                            }
                        }
                    }
                }

                $ccAARows = [];
                if ($level4Data) {
                    foreach ($level4Data as $lkey => $lvalue) {
                        $data[] = $lkey;
                        foreach ($applicationData as $avalue) {
                            if (in_array($avalue, $lvalue)) {
                                $data[] = true;
                            } else {
                                $data[] = false;
                            }
                        }
                        $ccAARows[] = $data;
                        unset($data);
                    }
                }
                $productData['CCAARows'] = $ccAARows;
                $productData['applicationData'] = $applicationData;
                $productData['coverCompounds'] = $coverCompounds;
                $productData['coverCompoundsHeaderKeys'] = $coverCompoundsHeaderKeys;
                $productData['level3rdObjectData'] = $level3rdObjectData;
                $productData['singleProductPage'] = $singleProductPage;
            } else {
                echo "Category Not Select In Catalog Category Object";
                die;
            }

            $productData['coverCompoundData'] = $coverCompoundData;
        }

        $parameterBag['data']                 = $productData;
        $parameterBag['HierarchyNameLevel2']  = $coverCompoundData['HierarchyNameLevel2'];
        return $this->render("@ContitechCSCatalog/Default/template_cover_compounds.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_section_page")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateProductSectionPageAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        return $this->render("@ContitechCSCatalog/Default/template_product_section_page.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_cleated_belt_page")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateCleatedBeltsAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId   = $regionProperty->getId();
        $region     = $regionProperty->getRegionName();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_template_cleated_belts_page');
        $productData    = [];
        $displayTablesFlag  = false;
        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {
                $selectedProduct = $catalogTableObject->getProducts();

                $productId = $selectedProduct[0];

                $productDetails = DataObject\CSProducts::getById($productId);
                if (!empty($productDetails) && $productDetails instanceof DataObject\CSProducts) {
                    $productDetails->setGetInheritedValues(true);
                }
                if (!empty($productDetails) && ($productDetails->isPublished()) && (empty($productDetails->getCSRegion()) || in_array($regionId, $productDetails->getCSRegion()))) {
                    $productData['HierarchyNameLevel2'] = trim($productDetails->getName());
                    $productData['Name'] = $productDetails->getName();
                    $productData['LongText'] = $productDetails->getShortText();
                    $productData['BeltRollDiameters'] = $productDetails->getBeltRollDiameters();
                    $productData['AngleOfInclination'] = $productDetails->getAnglesofInclination();
                    $productData['cover_compounds'] = $productDetails->getCoverCompounds();

                    $productChildrenData = $this->getAllRegionChildern($productDetails, $regionId);

                    $contiRollChildProducts = [];
                    $contiRollProductsDetails = [];
                    $normalProductsDetails = [];
                    $parentDataInfo = [];
                    foreach ($productChildrenData as $key => $child) {
                        $children = $child->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
                        if ($children) {
                            $parentDataInfo['Name'] = $child->getName();
                            $parentDataInfo['ShortText'] = $child->getShortText();
                            unset($productChildrenData[$key]);
                            $contiRollChildProducts = $children;
                        }
                    }
                    $contiRollProductsDetails['parentData'] = $parentDataInfo;

                    $cleatedProducts = [];
                    $contiRollProductsChildDetails = [];
                    $normalProductsChildDetails = [];
                    $availableBeltWidthMasterList = $this->getAvailableBeltWidthMasterList();
                    $availablePatternWidthMasterList = $this->getAvailablePatternWidthMasterList();

                    if ($productChildrenData) {
                        foreach ($productChildrenData as $child) {

                            $data1 = [];
                            $normalContiData = [];
                            $data1['Name'] = $child->getName();
                            $data1['ProductImage'] = $child->getProductImage();

                            $normalContiData['Name'] = $child->getName();
                            $normalContiData['ShortText'] = $child->getShortText();
                            $normalContiData['ProductImage'] = $child->getProductImage();
                            $normalContiData['ApplicationImage'] = $child->getApplicationImage();

                            if (method_exists($child->getProductAttributes(), 'getMaterial')) {
                                $materialBrick = $child->getProductAttributes()->getMaterial();
                                $cleatHeightInch = $materialBrick->getCleatHeightInch();
                                if ($cleatHeightInch) {
                                    $normalContiData['CS_CleatHeightInch'] = 'CS_CleatHeightInch';
                                    $normalContiData['CS_CleatHeightInchVal'] = $cleatHeightInch;
                                }
                            }

                            if (method_exists($child->getProductAttributes(), 'getProdDimensions')) {
                                $prodDimensions = $child->getProductAttributes()->getProdDimensions();
                                if ($prodDimensions && $prodDimensions->getAvailableBeltPatternWidthBlock()) {
                                    $block = $prodDimensions->getAvailableBeltPatternWidthBlock();

                                    $availableBeltWidthList = [];
                                    $maxRowLength = 1;
                                    $maxColumnLenth = 1;
                                    $blocklistInch = [];
                                    foreach ($block as $key => $value) {
                                        $availableBeltWidthVal = $value['availableBeltWidthInch']->getData();
                                        $availableBeltWidthList[] = $availableBeltWidthMasterList[$availableBeltWidthVal]['AvailableBeltWidthInch'];

                                        $blocklist = $value['availablePatternWidthInch']->getData();

                                        $maxRowLength = count($blocklist) > $maxRowLength ? count($blocklist) : $maxRowLength;

                                        $data = [];
                                        foreach ($blocklist as $key => $value) {
                                            if ($availablePatternWidthMasterList[$value]['AvailablePatternWidthText']) {
                                                $data[] = $availablePatternWidthMasterList[$value]['AvailablePatternWidthText'];
                                            } else {
                                                $data[] = $availablePatternWidthMasterList[$value]['AvailableProfilePatternWidthsInch'];
                                            }
                                        }
                                        $blocklistInch[] = $data;
                                    }

                                    if ($availableBeltWidthList) {
                                        $normalContiData['CS_AvailableBeltWidthInch'] = 'CS_AvailableBeltWidthInch';
                                        $normalContiData['CS_AvailableBeltWidthInchList'] = $availableBeltWidthList;
                                        $maxColumnLenth = count($availableBeltWidthList) > 1 ? count($availableBeltWidthList) : 1;
                                        $normalContiData['maxColumnLenth'] = $maxColumnLenth;
                                        $normalContiData['maxRowLength'] = $maxRowLength;
                                    }

                                    $totalRows = [];
                                    for ($i = 0; $i < $maxRowLength; $i++) {
                                        for ($j = 0; $j < $maxColumnLenth; $j++) {
                                            $totalRows[$i][$j] = isset($blocklistInch[$j][$i]) ? $blocklistInch[$j][$i] : '';
                                        }
                                    }

                                    $normalContiData['CS_AvailableProfilePatternWidthsInch'] = $totalRows;
                                }
                            }

                            $normalProductsChildDetails[] = $normalContiData;
                            $cleatedProducts[] = $data1;
                        }
                    }

                    $normalProductsDetails['childData'] = $normalProductsChildDetails;

                    if ($contiRollChildProducts) {
                        $contiRollChildSortedProducts = [];

                        foreach ($contiRollChildProducts as $nc) {
                            $contiRollChildSortedProducts[$nc->getSortOrder()] = $nc;
                        }

                        ksort($contiRollChildSortedProducts);

                        foreach ($contiRollChildSortedProducts as $child) {

                            $data = [];
                            $contiData = [];
                            $data['Name'] = $child->getName();
                            $data['ProductImage'] = $child->getProductImage();

                            $contiData['Name'] = $child->getName();
                            $contiData['ProductImage'] = $child->getProductImage();
                            $contiData['ApplicationImage'] = $child->getApplicationImage();

                            $blocklistInch = [];
                            $blocklistMm = [];
                            if (method_exists($child->getProductAttributes(), 'getProdDimensions')) {
                                $prodDimensions = $child->getProductAttributes()->getProdDimensions();
                                $widthLength = $child->getProductAttributes()->getWidthLength();

                                $profileWidthMM = $widthLength->getProfileWidthMM();
                                $contiData['CS_profileWidthMm'] = $profileWidthMM;

                                if ($prodDimensions) {
                                    if ($prodDimensions->getAvailableBeltPatternWidthBlock()) {
                                        $block = $prodDimensions->getAvailableBeltPatternWidthBlock();
                                        $blocklist = $block[0]['availablePatternWidthInch']->getData();

                                        foreach ($blocklist as $key => $value) {
                                            $blocklistInch[] = $availablePatternWidthMasterList[$value]['AvailableProfilePatternWidthsInch'];
                                            $blocklistMm[] = $availablePatternWidthMasterList[$value]['AvailableProfilePatternWidthsMM'];
                                        }

                                        if ($blocklistInch || $blocklistMm) {
                                            $contiData['CS_profileWidth'] = 'CS_profileWidth';
                                            $contiData['CS_profileWidthInch'] = implode(' & ', $blocklistInch);
                                        }
                                    }
                                    $beltWidthRangeInch = $prodDimensions->getBeltWidthRangeInch();
                                    $beltWidthRangeMm = $prodDimensions->getBeltWidthRangeMM();

                                    if ($beltWidthRangeInch || $beltWidthRangeMm) {
                                        $contiData['CS_beltWidthRange'] = 'CS_beltWidthRange';
                                        $contiData['CS_beltWidthRangeInch'] = $beltWidthRangeInch;
                                        $contiData['CS_beltWidthRangeMm'] = $beltWidthRangeMm;
                                    }
                                }
                            }

                            if (method_exists($child->getProductAttributes(), 'getBeltData')) {
                                $beltData = $child->getProductAttributes()->getBeltData();
                                $additionalInformation = $beltData->getAdditionalInformation();
                                if ($additionalInformation) {
                                    $contiData['CS_AdditionalInformation'] = 'CS_AdditionalInformation';
                                    $contiData['CS_AdditionalInformationValue'] = $additionalInformation;
                                }
                            }

                            $contiRollProductsChildDetails[] = $contiData;
                            $cleatedProducts[] = $data;
                        }
                    }

                    $contiRollProductsDetails['childData'] = $contiRollProductsChildDetails;
                    $productData['cleatedProducts'] = $cleatedProducts;
                    $productData['normalProductsDetails'] = $normalProductsDetails;
                    $productData['contiRollProductsDetails'] = $contiRollProductsDetails;
                    $ymlData = $this->configProviderService->getBrickMappingConfig();

                    if (isset($ymlData['cleated_belts_table_display_in_region']['regionName']) && ($ymlData['cleated_belts_table_display_in_region']['regionName'] === $region)) {
                        $displayTablesFlag = true;
                    }
                }
            }
        }

        $parameterBag['data']             = $productData;
        $parameterBag['displayTablesFlag']    = $displayTablesFlag;
        return $this->render("@ContitechCSCatalog/Default/template_cleated_belts.html.twig", $parameterBag);
    }

    /**
     * get the product childeren of a specified region
     * @param object $productObject
     * @param int $regionId
     * @return array
     * @access private
     */
    private function getAllRegionChildern($productObject, $regionId): array
    {
        $filterArraySorted = [];
        $filterArrayData = [];
        $productObject->setGetInheritedValues(true);
        $productChildrenData = [];
        $objectTypeFolderchildren = $productObject->getChildren([DataObject::OBJECT_TYPE_FOLDER]);

        if ($objectTypeFolderchildren) {
            foreach ($objectTypeFolderchildren as $objectChildFolder) {
                $children = $objectChildFolder->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
                $productChildrenData = array_merge($productChildrenData, $children);
            }
        }

        $children = $productObject->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
        $productChildrenData = array_merge($productChildrenData, $children);

        $filterArray = [];
        foreach ($productChildrenData as $key => $child) {
            if ($child->getPrintedCatalogFlag() === true) {
                if ($child->getCSRegion()) {
                    if (in_array($regionId, $child->getCSRegion())) {
                        $filterArray[$key]['data'] = $child;
                        $filterArray[$key]['SortOrder'] = $child->getSortOrder();
                    }
                } else {
                    $filterArray[$key]['data'] = $child;
                    $filterArray[$key]['SortOrder'] = $child->getSortOrder();
                }
            }
        }

        if ($filterArray) {
            $filterArrayData = $this->phpArraySort($filterArray, array('SortOrder'), SORT_ASC);
        }

        if ($filterArrayData) {
            foreach ($filterArrayData as $key => $value) {
                $filterArraySorted[] = $value['data'];
            }
        }

        return $filterArraySorted;
    }

    /**
     * Sort array
     * @param array $array
     * @param array $sortBy
     * @param int $sort
     * @return array
     * @access private
     */
    private function phpArraySort($array, $sortBy = array(), $sort = SORT_REGULAR): array
    {
        if (is_array($array) && !empty($array) && !empty($sortBy)) {
            $map = array();
            foreach ($array as $Key => $Val) {
                $sort_key = '';
                foreach ($sortBy as $Key_key) {
                    $sort_key .= $Val[$Key_key];
                }
                $map[$Key] = $sort_key;
            }
            asort($map, $sort);
            $sorted = array();
            foreach ($map as $Key => $Val) {
                $sorted[] = $array[$Key];
            }
            return $sorted;
        }
        return $array;
    }

    /**
     * To add a prefix before a string
     * @param string $key
     * @return string
     * @access private
     */
    private function addPrefix($key): string
    {
        if (trim($key)) {
            $key = "CS_{$key}";
        }
        return $key;
    }

    /**
     * To get available belt width master list
     * @return array
     * @access private
     */
    private function getAvailableBeltWidthMasterList(): array
    {
        $beltWidthList  = new DataObject\CSAvailableBeltWidths\Listing();
        $beltWidthList  = $beltWidthList->load();
        $list           = [];

        if ($beltWidthList) {
            foreach ($beltWidthList as $value) {
                $list[$value->getId()]['AvailableBeltWidthMM'] = $value->getAvailableBeltWidthMM();
                $list[$value->getId()]['AvailableBeltWidthInch'] = $value->getAvailableBeltWidthInch();
            }
        }
        return $list;
    }

    /**
     * To get available pattern width master list
     * @return array
     * @access private
     */
    private function getAvailablePatternWidthMasterList(): array
    {
        $patternWidthList = new DataObject\CSAvailablePatternWidths\Listing();
        $patternWidthList = $patternWidthList->load();
        $list             = [];

        if ($patternWidthList) {
            foreach ($patternWidthList as $value) {
                $list[$value->getId()]['AvailableProfilePatternWidthsMM'] = $value->getAvailableProfilePatternWidthsMM();
                $list[$value->getId()]['AvailableProfilePatternWidthsInch'] = $value->getAvailableProfilePatternWidthsInch();
                $list[$value->getId()]['AvailablePatternWidthText'] = $value->getAvailablePatternWidthText();
            }
        }
        return $list;
    }

    /**
     * To get cover compound master list
     * @return array
     * @access private
     */
    private function getCoverCompoundMasterList(): array
    {
        try {
            $productsList = new DataObject\CSPerformanceCategories\Listing();
            $productsList = $productsList->load();

            $performanceList = [];
            if ($productsList) {
                foreach ($productsList as $value) {
                    $performanceList[$value->getId()] = $value->getPerformanceCategory();
                }
            }

            return $performanceList;
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return Response
     * @access public
     */
    public function containerAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $allChildren = [];

        //prepare children for include
        foreach ($this->document->getAllChildren() as $child) {
            if ($child instanceof \Pimcore\Model\Document\Hardlink) {
                $child = \Pimcore\Model\Document\Hardlink\Service::wrap($child);
            }
            $allChildren[] = $child;
        }

        $parameterBag['allChildren'] = $allChildren;
        return $this->render('@ContitechCSCatalog/Default/container.html.twig', $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_continental_conveyor_services")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateContinentalConveyorServicesAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $default_image = $this->configProviderService->getDefaultImage();
        $catalogCategoryObjectEditable = $this->document->getEditable('cbs_template_belt_services_page');
        $productNameArr = [];

        if ($catalogCategoryObjectEditable) {
            $catalogCategoryObject = $catalogCategoryObjectEditable->getElement();
            $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();

            $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

            if ($hierarchyObj) {
                $hierarchyPath = $hierarchyObj->getPath();
                $hierarchyName = $hierarchyObj->getKey();

                $hierarchyFullName = $hierarchyPath . $hierarchyName;
                $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

                $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                if (!empty($productObject) && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                    $productNameArr['Name'] = trim($productObject->getName());
                    $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $productNameArr['ShortText'] = $productObject->getShortText();
                    $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());

                    $childrenData = [];

                    $childObject = $this->getAllRegionChildern($productObject, $regionId);

                    foreach ($childObject as $childValue) {
                        $data['Name'] = $childValue->getName();
                        $data['LongText'] = $childValue->getLongtext();
                        $data['ProductImage'] = $childValue->getProductImage();

                        $childrenData[] = $data;
                        unset($data);
                    }
                    $productNameArr['childrenData'] = $childrenData;
                }
            }
        }

        $parameterBag['data'] = $productNameArr;
        $parameterBag['default_image']    = $default_image;
        return $this->render('@ContitechCSCatalog/Default/template_continental_conveyor_services.html.twig', $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_protect_systems")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateContiProtectSystemsAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_protect_systems');
        $productData = [];
        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];

                $productObject = DataObject\CSProducts::getById($singleProduct);
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }

                if (!empty($productObject) && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                    $productData['Name'] = $productObject->getName();
                    $productData['ShortText'] = $productObject->getLongText();
                    $productData['ProductImage'] = $productObject->getProductImage();
                    $productData['ApplicationImage'] = $productObject->getApplicationImage();

                    $parentParentObj    =   $this->getProductParentObject($productObject);

                    if (!empty($parentParentObj) && $parentParentObj instanceof DataObject\CSProducts) {
                        $productData['HierarchyNameLevel2'] = $parentParentObj->getName();
                    } else {
                        $productData['HierarchyNameLevel2'] = null;
                    }
                    $childrenData = [];
                    $childObject = $this->getAllRegionChildern($productObject, $regionId);

                    foreach ($childObject as $childValue) {
                        if (trim($childValue->getName())) {
                            $data['Name'] = $childValue->getName();
                            $data['ShortText'] = $childValue->getProductDescription();

                            $childrenData[] = $data;
                            unset($data);
                        }
                    }

                    $productData['childrenData'] = $childrenData;

                    $parameterBag['monitoring_system'] = $this->getContiProtectFeatures($productObject);
                }
            }
        }

        $parameterBag['data'] = $productData;
        return $this->render("@ContitechCSCatalog/Default/template_conti_protect_systems.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_inspect_systems")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateContiInspectSystemsAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_inspect_systems');
        $productData = [];
        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];
                $productObject = DataObject\CSProducts::getById($singleProduct);

                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }

                if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                    $parentParentObj    =   $this->getProductParentObject($productObject);

                    if (!empty($parentParentObj) && $parentParentObj instanceof DataObject\CSProducts) {
                        $productData['HierarchyNameLevel2'] = $parentParentObj->getName();
                    } else {
                        $productData['HierarchyNameLevel2'] = null;
                    }
                    $productData['Name'] = $productObject->getName();
                    $productData['ShortText'] = $productObject->getShortText();
                    $productData['ProductImage'] = $productObject->getProductImage();
                    $productData['ReportImage'] = $productObject->getReportImage();
                    $productData['DamageImage'] = $productObject->getDamageImage();

                    $productData['ApplicationImage'] = $productObject->getApplicationImage();
                    $productData['Benefits'] = $this->getContiProtectFeatures($productObject);

                    $childrenData = [];
                    $childObject = $this->getAllRegionChildern($productObject, $regionId);

                    if ($childObject) {
                        foreach ($childObject as $childValue) {
                            if (trim($childValue->getName())) {
                                $data['Name'] = $childValue->getName();
                                $data['ShortText'] = $childValue->getProductDescription();

                                $childrenData[] = $data;
                                unset($data);
                            }
                        }
                    }

                    $productData['childrenData'] = $childrenData;
                }
            }
        }

        $parameterBag['data'] = $productData;
        return $this->render("@ContitechCSCatalog/Default/template_conti_inspect_systems.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_mega_pipe_belt")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateMegaPipeBeltAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_mega_pipe_belt');
        $productData = [];
        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];
                $productObject = DataObject\CSProducts::getById($singleProduct);
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                    $objParent = DataObject\CSProducts::getById($productObject->getParentId());

                    $productData['HierarchyNameLevel2'] = $objParent ? $objParent->getName() : '';
                    $productData['Name'] = $productObject->getName();
                    $productData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $productData['ShortText'] = $productObject->getShortText();
                    $productData['ProductImage'] = $productObject->getProductImage();
                    $productData['Features'] = $this->getSybercordTechnologyFeature($productObject);
                    $productData['CSProductFeaturesAndBenefits'] = $productObject->getCSProductFeaturesAndBenefits();
                    $productData['HierarchyNameLevel1'] = 'Conveying Solutions';
                }
            }
        }

        $parameterBag['data'] = $productData;
        return $this->render("@ContitechCSCatalog/Default/template_mega_pipe_belt.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_pipe_belt")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateContiPipeBeltAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_pipe_belt');
        $productData = [];

        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {
                $selectedProduct    = $catalogTableObject->getProducts();
                $singleProduct      = isset($selectedProduct[0]) ? $selectedProduct[0] : '';

                $singleProductObj = DataObject\CSProducts::getById($singleProduct);
                if (!empty($singleProductObj) && $singleProductObj instanceof DataObject\CSProducts) {
                    $singleProductObj->setGetInheritedValues(true);
                }

                if ($singleProductObj && ($singleProductObj->isPublished()) && (empty($singleProductObj->getCSRegion()) || in_array($regionId, $singleProductObj->getCSRegion()))) {
                    $childProductData['Name'] = $singleProductObj->getName();
                    $childProductData['ProductClaimSlogan'] = $singleProductObj->getProductClaimSlogan();
                    $childProductData['ShortText'] = $singleProductObj->getShortText();
                    $childProductData['ProductImage'] = $singleProductObj->getProductImage();
                    $childProductData['productSpecificData'] = $this->prepareContiPipeAndMegaPipeAttributes($singleProductObj, $regionId);
                    $featuresAndBenefits = [];
                    if ($singleProductObj->getCSProductFeaturesAndBenefits()) {
                        foreach ($singleProductObj->getCSProductFeaturesAndBenefits() as $value) {
                            if (trim($value->getFeatureName())) {
                                $featuresAndBenefits[] = $value->getFeatureName();
                            }
                        }
                    }
                    $childProductData['Benefits'] = $featuresAndBenefits;
                    $productData['childProductData'] = $childProductData;
                }

                $productObject    =   $this->getProductParentObject($singleProductObj);
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                if ($productObject && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                    $parentProductData['Name'] = $productObject->getName();
                    $parentProductData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $parentProductData['ShortText'] = $productObject->getShortText();
                    $parentProductData['ProductImage'] = $productObject->getProductImage();

                    $applications = [];
                    if ($productObject->getCSProductApplications()) {
                        foreach ($productObject->getCSProductApplications() as $value) {
                            $applications[] = $value->getApplicationName();
                        }
                    }
                    $parentProductData['Applications'] = $applications;
                    $parentProductData['HierarchyNameLevel2'] = $productObject->getName();
                    $productData['parentProductData'] = $parentProductData;
                }
            }
        }

        $parameterBag['data'] = $productData;
        return $this->render("@ContitechCSCatalog/Default/template_conti_pipe_belt.html.twig", $parameterBag);
    }

    /**
     * Prepare ContiPipe™ and MegaPipe® Sizes table data
     * @param object $productObject
     * @param int $regionId
     * @return array
     * @access private
     */
    private function prepareContiPipeAndMegaPipeAttributes($productObject, $regionId): array
    {
        $availableBeltWidthMaster = $this->getAvailableBeltWidthMasterList();

        $childObject = $this->getAllRegionChildern($productObject, $regionId);
        $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();
        $attributes = [];
        $data = [];

        if (isset($productDataImportConfig['ContiPipe and MegaPipe Table Attributes'])) {
            $attributes  = $productDataImportConfig['ContiPipe and MegaPipe Table Attributes'];
        }

        $total_attr = count($attributes);

        if ($childObject) {
            foreach ($childObject as $obj) {
                $obj_attr           =   $obj->getProductAttributes();

                foreach ($attributes as $fieldName => $brickName) {
                    $getBrick = 'get' . $brickName;
                    $getField = 'get' . $fieldName;

                    if (method_exists($obj_attr, $getBrick) && method_exists($obj_attr->$getBrick(), $getField)) {
                        if (in_array($fieldName, ["FabricType", "SteelType"])) {
                            $data[] = ($obj_attr->$getBrick()->$getField()) ? '•' : '';
                        } else {
                            $valuesData = $obj_attr->$getBrick()->$getField();

                            if ($valuesData && is_array($valuesData)) {
                                if ($fieldName == 'BeltWidth') {
                                    $beltWidthInch = [];
                                    $beltWidthInchStr = '';
                                    foreach ($valuesData as $dData) {
                                        $beltWidthInch[] = $availableBeltWidthMaster[$dData]['AvailableBeltWidthInch'];
                                    }

                                    if ($beltWidthInch) {
                                        $beltWidthInchStr = implode(', ', $beltWidthInch);
                                    }
                                    $data[] = $beltWidthInchStr;
                                } else {
                                    $beltWidthMM = [];
                                    $beltWidthMMStr = '';
                                    foreach ($valuesData as $dData) {
                                        $beltWidthMM[] = $availableBeltWidthMaster[$dData]['AvailableBeltWidthMM'];
                                    }

                                    if ($beltWidthMM) {
                                        $beltWidthMMStr = implode(', ', $beltWidthMM);
                                    }
                                    $data[] = $beltWidthMMStr;
                                }
                            } else {
                                $data[] = $valuesData;
                            }
                        }
                    }
                }
            }
        }

        $data = $data ? array_chunk($data, $total_attr) : [];

        if ($data) {
            foreach ($data as $key => $array) {
                $isTrue = false;
                foreach ($array as $value) {
                    if ($value) {
                        $isTrue = true;
                    }
                }
                if (!$isTrue) {
                    unset($data[$key]);
                }
            }
        }

        return $data;
    }

    /**
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateTextileConveyorBeltsAction(Request $request)
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogCategoryObjectEditable = $this->document->getEditable('cbs_template_textile_belt_services_page');
        $productNameArr = [];

        if ($catalogCategoryObjectEditable) {
            $catalogCategoryObject = $catalogCategoryObjectEditable->getElement();
            $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();

            $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

            if ($hierarchyObj) {
                $hierarchyPath = $hierarchyObj->getPath();
                $hierarchyKeyName = $hierarchyObj->getKey();

                $hierarchyFullName = $hierarchyPath . $hierarchyKeyName;
                $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

                $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                    $productNameArr['Name'] = trim($productObject->getName());
                    $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $productNameArr['ShortText'] = $productObject->getShortText();
                    $productNameArr['ProductImage'] = $productObject->getProductImage();
                    $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
                    $productNameArr['fieldPhoto'] = $productObject->getfieldPhoto();
                    $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());
                }
            }
        }
        $parameterBag['data'] = $productNameArr;
        return $this->render("@ContitechCSCatalog/Default/template_textile_belt_construction.html.twig", $parameterBag);
    }

    /**
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateSteelcordBeltConstructionAction(Request $request)
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogCategoryObjectEditable = $this->document->getEditable('cbs_template_steelcord_belt_construction_page');
        $productNameArr = [];

        if ($catalogCategoryObjectEditable) {
            $catalogCategoryObject = $catalogCategoryObjectEditable->getElement();
            $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();

            $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

            if ($hierarchyObj) {
                $hierarchyPath = $hierarchyObj->getPath();
                $hierarchyName = $hierarchyObj->getKey();

                $hierarchyFullName = $hierarchyPath . $hierarchyName;
                $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

                $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                    $productNameArr['Name'] = trim($productObject->getName());
                    $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $productNameArr['ShortText'] = $productObject->getShortText();
                    $productNameArr['ProductImage'] = $productObject->getProductImage();
                    $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
                    $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());
                }
            }
        }
        $parameterBag['data'] = $productNameArr;
        return $this->render("@ContitechCSCatalog/Default/template_steelcord_belt_construction.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_sybercord_technology")
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateSybercordTechnologyAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_template_sybercord_technology_construction_page');
        $productNameArr = [];

        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            $selectedProduct = [];

            if ($catalogTableObject) {
                if (method_exists($catalogTableObject, "getProducts")) {
                    $selectedProduct = $catalogTableObject->getProducts();
                }

                if ($selectedProduct) {
                    $singleProduct = $selectedProduct[0];
                    $productObject = DataObject\CSProducts::getById($singleProduct);
                    if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                        $productObject->setGetInheritedValues(true);
                    }
                    if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                        $parentParentObj    =   $this->getProductParentObject($productObject);
                        $parentParentObj->setGetInheritedValues(true);
                        if (!empty($parentParentObj) && $parentParentObj instanceof DataObject\CSProducts) {
                            $productNameArr['HierarchyNameLevel2'] = $parentParentObj->getName();
                        } else {
                            $productNameArr['HierarchyNameLevel2'] = null;
                        }

                        $productNameArr['Name'] = trim($productObject->getName());
                        $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                        $productNameArr['ShortText'] = $productObject->getShortText();
                        $productNameArr['LogoImage'] = $productObject->getLogoImage();
                        $productNameArr['ProductImage'] = $productObject->getProductImage();
                        $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();

                        $featuresAndBenefits = [];
                        if ($productObject->getCSProductFeaturesAndBenefits()) {
                            foreach ($productObject->getCSProductFeaturesAndBenefits() as $value) {
                                if ($value->getFeatureName()) {
                                    $featuresAndBenefits[] = $value->getFeatureName();
                                }
                            }
                        }

                        $productNameArr['Features'] = $featuresAndBenefits;

                        $productNameArr['CSProductApplications'] = $productObject->getCSProductApplications();
                    }
                }
            }
        }
        $parameterBag['data'] = $productNameArr;
        return $this->render("@ContitechCSCatalog/Default/template_sybercord_technology.html.twig", $parameterBag);
    }

    /**
     * Get sybercord technology's feature
     * @param object
     * @return array
     * @access private
     */
    private function getSybercordTechnologyFeature($productObject): array
    {
        $feature = [];

        if (method_exists($productObject, 'getFeatureBlock') && $productObject->getFeatureBlock()) {
            foreach ($productObject->getFeatureBlock() as $obj) {
                $feature[] = $obj['Feature']->getData();
            }
        }
        return $feature;
    }

    /**
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateConveyorBeltGroupAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        return $this->render("@ContitechCSCatalog/Default/template_conveyor_belt_group.html.twig", $parameterBag);
    }

    /**
     * @param Request $request
     * @return Response
     * @access public
     */
    public function templateContiCleanAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        $regionProperty = $this->document->getProperty('region');

        if (!$regionProperty) {
            return new Response('Error: Unable to find region, Please specify region in property');
        }

        $regionId = $regionProperty->getId();
        $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_clean');
        $productData = [];
        if ($catalogTableObjectEditable) {
            $catalogTableObject = $catalogTableObjectEditable->getElement();
            if ($catalogTableObject) {
                $selectedProduct = $catalogTableObject->getProducts();
                if ($selectedProduct) {
                    $singleProduct = $selectedProduct[0];
                    $productObject = DataObject\CSProducts::getById($singleProduct);
                    if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                        $productObject->setGetInheritedValues(true);
                    }
                    if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion()))) {
                        $productData['Name'] = $productObject->getName();
                        $productData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                        $productData['ShortText'] = $productObject->getShortText();
                        $productData['ProductImage'] = $productObject->getProductImage();
                        $productData['ApplicationImage'] = $productObject->getApplicationImage();
                        $productData['reportImage'] = $productObject->getReportImage();
                        $productData['material'] = $this->getContiCleanMaterials($productObject);
                        $productData['Benefits'] = $this->getContiCleanBenefits($productObject);
                    }
                }
            }
        }

        $parameterBag['data'] = $productData;
        return $this->render("@ContitechCSCatalog/Default/template_contiClean.html.twig", $parameterBag);
    }

    /**
     * Get Conti Clean Materials
     * @param object $productObject
     * @return array
     * @access private
     */
    private function getContiCleanBenefits($productObject): array
    {
        $benefits = [];
        if (method_exists($productObject, 'getBenefitBlock') && $productObject->getBenefitBlock()) {
            foreach ($productObject->getBenefitBlock() as $obj) {
                $benefits[] = $obj['Benefit']->getData();
            }
        }
        return $benefits;
    }

    /**
     * Get Conti Clean Materials
     * @param object $productObject
     * @return array
     * @access private
     */
    private function getContiProtectFeatures($productObject): array
    {
        $benefits = [];
        if (method_exists($productObject, 'getFeatureBlock') && $productObject->getFeatureBlock()) {
            foreach ($productObject->getFeatureBlock() as $obj) {
                $benefits[] = $obj['Feature']->getData();
            }
        }
        return $benefits;
    }

    /**
     * Get Conti Clean Materials
     * @param object $productObject
     * @return array
     * @access private
     */
    private function getContiCleanMaterials($productObject): array
    {
        $materials  = [];
        $objAttr    = $productObject->getProductAttributes();

        if (method_exists($objAttr, 'getMaterial') && method_exists($objAttr->getMaterial(), 'getMaterial')) {
            $arr = $objAttr->getMaterial()->getMaterial();

            if ($arr) {
                foreach ($arr as $materialId) {
                    $obj  = DataObject\CSMaterial::getById($materialId);

                    if (method_exists($obj, "getMaterialName")) {
                        $value = $obj->getMaterialName();
                        $materials[] = $value;
                    }
                }
            }
        }

        return $materials;
    }

    /**
     * @param Request $request
     * @param Response
     * @access public
     */
    public function templateCreatedWithBricksAction(Request $request): Response
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        return $this->render("@ContitechCSCatalog/Default/templates_with_bricks.html.twig", $parameterBag);
    }

    /**
     * Reset Table of content page's data
     * @Route("/reset-table-of-content")
     * @param Request $request
     * @return JsonResponse
     * @access public
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

    /**
     * get product's parent object
     * @param object $product
     * @return object
     * @access private
     */
    private function getProductParentObject($product): ?object
    {
        $parent = $product->getParent();
        while ($parent->getType() == 'folder' && $parent->getFullPath() != "/Contitech_ConveyorSolution/Products") {
            $parent = $parent->getParent();
        }
        if ($parent->getType() != 'folder' && $parent instanceof DataObject\CSProducts) {
            return $parent;
        } else {
            return null;
        }
    }

    /**
     * to get all the request parameters
     * @param Request $request
     * @param int $documentId
     * @return array
     * @access private
     */
    private function getRequestedParameter(Request $request, $documentId): array
    {
        $parameterBag = [];
        $parameterBag['printermarks'] = $request->get('printermarks');
        $parameterBag['footer_logo_src'] = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $imageWidth = null;
        $imageRecompression = null;
        $printConfigFile = \Pimcore\Web2Print\Processor::getJobConfigFile($documentId);
        if (file_exists($printConfigFile)) {
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode($printConfigFileContent, true);
            $imageRecompression = $printConfig['config']['Image Quality'];
            $imageWidth = $printConfig['config']['Image Width'];
        }
        $parameterBag['imageQuality'] = $imageRecompression;
        $parameterBag['imageWidth'] = $imageWidth;

        return $parameterBag;
    }
}
