<?php

namespace ContitechCS\CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use S3CustomizationBundle\Lib\Utils;
use ContitechCS\ImportBundle\Services\ImportConstants;
use Pimcore\Db;
use \Exception;

class DefaultController extends AbstractController
{
    private $configProviderService;
    private $catalogTemplatingHelper;
    private $db;

    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper) {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
    }

    /**
     * @Route("/contitech_cs_catalog")
     */
    public function indexAction(Request $request)
    {   
        try
        {   
            return new Response('Hello world from contitech_cs_catalog');
        }
        catch(Exception $e)
        {  
            return new Response($e->getMessage());
        }
    }

    /**
     * @Route("/contitech_cs_catalog/get-products")
     */
    public function getCategoryProducts(Request $request)
    {
        try
        {
            $id = $request->get('catId');
            $categoryObj = DataObject\CSCatalogCategory::getById($id);
            $hierarchyId = ($categoryObj->getSecondLevelCategory());
            $res['data'] = [];
            if($hierarchyId)
            {
                $productsList = new DataObject\CSProducts\Listing();
                $productsList->setCondition("ParentCategory like ".$productsList->quote("%,".$hierarchyId.",%"));
                $productsList->load();
//                $hierarchyObj = DataObject\CSHierarchy::getById($hierarchyId);
//                
//                $hierarchyPath = $hierarchyObj->getPath();
//                $hierarchyName = $hierarchyObj->getName();
//    
//                echo $hierarchyFullName = $hierarchyPath.$hierarchyName; die;
//                $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);
//    
//                $HierarchyProductPath = DataObject\CSProducts::getByPath($productHierarchyPath);

//                if($HierarchyProductPath)
//                {
//                    $productsList = new DataObject\CSProducts\Listing();
//                    $productsList->addConditionParam("o_parentId = ?", [$HierarchyProductPath->getId()]);
//                    $productsList = $productsList->load();
//                }

                if($productsList)
                {
                    foreach ($productsList->getObjects() as $cat) {
                        $result[] = array('text' => trim($cat->getName()), 'id' => trim($cat->getId()));
                    }
                }
                $res['data'] = $result;
            }
            echo json_encode(['data' => $res['data']]);
            die;
        }
        catch(Exception $e)
        {  
            return new Response($e->getMessage());
        }
    }

    /**
     * @Route("/contitech_cs_catalog/get-products-tables")
     */
    public function getCategoryProductTables(Request $request)
    {   
        try
        {
            $res['data']    = [];
            $product        = $request->get('product');
    
            $onfigProviderService    = new ConfigProviderService();
            $productDataImportConfig = $configProviderService->getCatalogProductTablesConfig();
    
            if(isset($productDataImportConfig['Common Product Page'][$product]))
            {
                foreach ($productDataImportConfig[$product] as $table => $value)
                {
                    $result[] = array('id' => trim($table), 'text' => trim($table));
                }
                $res['data'] = $result;
            }
    
            echo json_encode(['data' => $res['data']]);
            die;
        }
        catch(Exception $e)
        {  
            return new Response($e->getMessage());
        }
    }

    /**
     * @Route("/contitech_cs_catalog/get-hierarchy")
     */
    public function getHierarchy(Request $request)
    {
        try
        {
            $catId = $request->get('catId');
            
            if(!$catId)
                Throw new Exception('catId is requierd');

            
            $categoryList = new DataObject\CSHierarchy\Listing();
            $categoryList->addConditionParam("Level = ?", ["Level 2"], 'AND');
            $categoryList->setCondition("o_parentId = ?", $catId);
            $categoryList = $categoryList->load();
    
            foreach ($categoryList as $cat)
            {
                $result[] = array('key' => $cat->getName(), 'value' => $cat->getId());
            }
    
            echo json_encode(['data' => $result]);
            die;
        }
        catch(Exception $e)
        {  
            return new Response($e->getMessage());
        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_table_of_contents")
     */
    public function templateTableOfContentsAction(Request $request)
    {   
        try
        {
            $configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $configProviderService->getDefaultImage('CS_footer_logo');
            
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            return new Response($e->getMessage());
        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_dynamic_table_of_contents")
     */
    public function templateDynamicTableOfContentsAction(Request $request)
    {   
        try
        {
            $configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $configProviderService->getDefaultImage('CS_footer_logo');
            
            $this->view['footer_logo_src'] = $footer_logo_src;
    
            $folderId =$this->document->getParent()->getId(); 
            $listing = new \Pimcore\Model\Document\Listing(); 
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");     
            $listing->setOrder("asc");
            $templateArray = [
                'ContitechCSCatalogBundle:Default:templates_with_bricks.html.php',
                'ContitechCSCatalogBundle:Default:template_conti_inspect_systems.html.php',
                'ContitechCSCatalogBundle:Default:template_steelcord_belt_construction.html.php',
                'ContitechCSCatalogBundle:Default:template_continental_conveyor_services.html.php',
                'ContitechCSCatalogBundle:Default:template_eco_series_pulley.html.php',
                'ContitechCSCatalogBundle:Default:template_conti_pipe_belt.html.php',
                'ContitechCSCatalogBundle:Default:template_mega_pipe_belt.html.php',
                'ContitechCSCatalogBundle:Default:template_sybercord_technology.html.php',
                'ContitechCSCatalogBundle:Default:template_cleated_belts.html.php',
                'ContitechCSCatalogBundle:Default:template_conti_protect_systems.html.php',
                'ContitechCSCatalogBundle:Default:template_product_page.html.php',
                'ContitechCSCatalogBundle:Default:template_contialert_product_page.html.php',
                'ContitechCSCatalogBundle:Default:template_conveyor_belt_group.html.php',
                'ContitechCSCatalogBundle:Default:template_product_section_page.html.php',
                'ContitechCSCatalogBundle:Default:template_textile_belt_construction.html.php',
                'ContitechCSCatalogBundle:Default:template_contiClean.html.php',
                'ContitechCSCatalogBundle:Default:template_cover_compounds.html.php',
                'ContitechCSCatalogBundle:Default:template_quality_and_the_environment.html.php',
                'ContitechCSCatalogBundle:Default:template_wood_product.html.php',
                'ContitechCSCatalogBundle:Content:pdf.html.php'
            ];
            $sectionPageTitle = '';
            $all_doc_arr = [];
            foreach($listing as $doc)
            {
                if ($doc->getTemplate() == 'ContitechCSCatalogBundle:Default:template_product_section_page.html.php')
                {
                    $obj = $doc->getElement('TOC_Section_Title');
                    if (!empty($obj)) {
                        $sectionPageTitle = $obj->getData();
                    }
                    continue;
                } 
                if (!empty($sectionPageTitle)) {
                    if (in_array($doc->getTemplate(), $templateArray)) {
                        $obj = $doc->getElement('CS_ProductName');
                        if (!empty($obj) && !empty($obj->getData())) {
                            $all_doc_arr[$sectionPageTitle][] = $obj->getData();
                        } else {
                            $all_doc_arr[$sectionPageTitle][] = $doc->getKey();
                        }
                    }
                }
            }
            $this->view['data'] = $all_doc_arr;//$table_of_content_data;     
        }
        catch(Exception $e)
        {  
            return new Response($e->getMessage());
        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_page")
     */
    public function templateProductPageAction(Request $request)
    {   
        try
        {       
            $regionProperty     = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId                   = $regionProperty->getId();
            $configProviderService      = new ConfigProviderService();
            $footer_logo_src            = $configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_product_page')->getElement();
            $productData = [];

            if($catalogTableObject)
            {
                $productDataImportConfig = $configProviderService->getCatalogProductTablesConfig();
    
                $catalogCategoryObjectId    = $catalogTableObject->getParentId();
                $categoryObj                = DataObject\CSCatalogCategory::getById($catalogCategoryObjectId);
    
                $selectedProduct            = $catalogTableObject->getProducts();
                $productObj                 = null;
    
    
                $productNameArr = [];
                if($selectedProduct)
                {
                    foreach ($selectedProduct as $key => $singleProduct)
                    {
                        $productObject      = DataObject\CSProducts::getById($singleProduct);
                        if($productObject)
                        {
                            $productNameArr[]   = trim($productObject->getName());
                        }
    
                        if(!$productObj)
                        {
                            $productObj = $productObject;
                        }
                    }
                }
    
                if($productObj)
                {
                    $productNameTitle   =   implode(' and ', $productNameArr);
                    $productName        =   trim($productObj->getName());
                    $productKeyName     =   trim($productObj->getKey());
                    $parentParentObj    =   $this->getProductParentObject($productObj); //$productObj->getParent();
    
                    /* $hierarchyId = $categoryObj->getSecondLevelCategory();
                    if($hierarchyId)
                    {
                        $hierarchyObj = DataObject\CSHierarchy::getById($hierarchyId);
                    } */
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
    
                    if(method_exists($productObj,'getCSProductApplications') &&  $productObj->getCSProductApplications())
                    {
                        $applicationsHtml = '<ul>';
                        foreach ($productObj->getCSProductApplications() as $key => $value) {
                            $applicationsHtml .= '<li><span class="orange">›</span> '.$value->getApplicationName().' </li>';
                        }
                        $applicationsHtml .= '</ul>';
                    }
                    
                    $productData['Applications'] = $applicationsHtml;
    
                    if(method_exists($productObj,'getCoverCompounds') && $productObj->getCoverCompounds())
                    {
                        $CoverCompoundHtml = '<ul>';
                        foreach ($productObj->getCoverCompounds() as $key => $value)
                        {
                            $CoverCompoundHtml .= '<li><span class="orange">›</span> '.$value->getName().' </li>';
                        }
                        $CoverCompoundHtml .= '</ul>';
                    }

                    $productData['CoverCompounds'] = $CoverCompoundHtml;
    
                    if(method_exists($productObj,'getCSProductIndustries') && $productObj->getCSProductIndustries())
                    {
                        $marketsHtml = '<ul>';
                        foreach ($productObj->getCSProductIndustries() as $key => $value)
                        {
                            $marketsHtml .= '<li><span class="orange">›</span> '.$value->getIndustryName().' </li>';
                        }
                        $marketsHtml .= '</ul>';
                    }
                    $productData['Markets'] = $marketsHtml;
    
                    $FeaturesAndBenefits = [];
                    $FeaturesAndBenefitsWithoutImages = [];
                    $ImageFoundInFeatures = false;
                    if(method_exists($productObj,'getCSProductFeaturesAndBenefits') && $productObj->getCSProductFeaturesAndBenefits())
                    {
                        foreach ($productObj->getCSProductFeaturesAndBenefits() as $key => $value)
                        {
                            if(trim($value->getFeatureName()))
                            {
                                $feature['FeatureName'] = $value->getFeatureName();
                                $feature['FeatureDescription'] = $value->getFeatureDescription();
                                $feature['FeatureImage'] = $value->getFeatureImage();
                                
                                if($value->getFeatureImage())
                                {
                                    $ImageFoundInFeatures = true;
                                }

                                $FeaturesAndBenefits[] = $feature;

                                $FeaturesAndBenefitsWithoutImages[] = $value->getFeatureName();
                            }
                        }
                    }
    
                    if($ImageFoundInFeatures)
                    {
                        $productData['FeaturesAndBenefits'] = $FeaturesAndBenefits;
                    }
                    else{
                        $productData['FeaturesAndBenefitsWithoutImages'] = $FeaturesAndBenefitsWithoutImages;
                    }
    
                    $MoreThanOneProduct = 0;
                    $childrenData = [];
    
                    if(count($selectedProduct) > 1)
                    {
                        $MoreThanOneProduct = 1;
                    }
    
                    if(array_key_exists($productKeyName, $productDataImportConfig['Common Product Page']))
                    {
                        if($selectedProduct)
                        {
                            foreach ($selectedProduct as $key => $singleProduct) {
                                $productObjSingle = DataObject\CSProducts::getById($singleProduct);
                                $childrenDataNew = $this->getAllRegionChildern($productObjSingle, $regionId);
                                $childrenData = array_merge($childrenData,$childrenDataNew);
                            }

                            if(count($selectedProduct)>1)
                            {
                                $filterArrayMultiple = [];
                                foreach($childrenData as $chKey => $chChild)
                                {
                                    $filterArrayMultiple[$chKey]['data'] = $chChild;
                                    $filterArrayMultiple[$chKey]['SortOrder'] = $chChild->getSortOrder();
                                }

                                if($filterArrayMultiple)
                                {
                                    $filterArrayMultipleData = $this->phparraysort($filterArrayMultiple, array('SortOrder'), SORT_ASC);
                                }
                                
                                $childrenData = [];

                                if($filterArrayMultipleData)
                                {
                                    foreach ($filterArrayMultipleData as $nChild) {
                                        $childrenData[] = $nChild['data'];
                                    }
                                }
                            }
                        }

                        $productTables          = array();
                        $childrenDataChunkArray = array_chunk($childrenData, CS_PRODUCT_TABLE_COLUMN_LIMIT);
    
                        if($childrenDataChunkArray)
                        {
                            foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) 
                            {
                                $tables = $productDataImportConfig['Common Product Page'][$productKeyName];
                                
                                if($tables)
                                {
                                    foreach ($tables as $tablekey => $MetricImperialFields)
                                    {
                                        $ColumnKeys = $MetricImperialFields['ColumnKeys'];
                                        $CS_Trough_Angle_Label = $MetricImperialFields['CS_Trough_Angle_Label'];
                                        $CS_Material_Weight_Label = $MetricImperialFields['CS_Material_Weight_Label'];
                                        $CS_Idlers_Label = $MetricImperialFields['CS_Idlers_Label'];
                                        $CS_Idler_Angle_Label = $MetricImperialFields['CS_Idler_Angle_Label'];
                                        $CS_Type_Of_Idler_Label = $MetricImperialFields['CS_Type_Of_Idler_Label'];
            
            
                                        unset($MetricImperialFields['ColumnKeys']);
                                        unset($MetricImperialFields['CS_Trough_Angle_Label']);
                                        unset($MetricImperialFields['CS_Material_Weight_Label']);
                                        unset($MetricImperialFields['CS_Idlers_Label']);
                                        unset($MetricImperialFields['CS_Idler_Angle_Label']);
                                        unset($MetricImperialFields['CS_Type_Of_Idler_Label']);
            
                                        if($MetricImperialFields)
                                        {
                                            foreach ($MetricImperialFields as $MIKey => $MIValues)
                                            {
                                                unset($KeysGroupLogic);
                                                unset($RemoveKeys);
                                                unset($AdditionalHeaderKey);
                                                unset($AdditionalGroupKey);
                                                unset($ProductNamePrefix);
                                                unset($productBrand);
            
                                                if(isset($MIValues['KeysGroupLogic']))
                                                {
                                                    $KeysGroupLogic = $MIValues['KeysGroupLogic'];
                                                    unset($MIValues['KeysGroupLogic']);
                                                }
                                                
                                                if(isset($MIValues['ProductNamePrefix']))
                                                {
                                                    $ProductNamePrefix = true;
                                                }
                                                
                                                if(isset($MIValues['RemoveKeys']))
                                                {
                                                    $RemoveKeys = $MIValues['RemoveKeys'];
                                                    unset($MIValues['RemoveKeys']);
                                                }
            
                                                $AdditionalHeaderKey = $productName;
                                                if($MoreThanOneProduct)
                                                {
                                                    $AdditionalHeaderKey = '';
                                                }
            
                                                if($CS_Trough_Angle_Label)
                                                {
                                                    $AdditionalHeaderKey = "Trough_Angle_Label";
                                                }
                                                
                                                if($CS_Idler_Angle_Label)
                                                {
                                                    $AdditionalHeaderKey = "Idler_Angle_Label";
                                                }
            
                                                if($CS_Material_Weight_Label)
                                                {
                                                    $AdditionalGroupKey = "CS_Material_Weight_Label";
                                                }
            
                                                if($CS_Type_Of_Idler_Label)
                                                {
                                                    $AdditionalGroupKey = "CS_Type_Of_Idler_Label";
                                                }
            
                                                // $keysTitle = [];
                                                $groupingTitle = [];
            
                                                if($AdditionalGroupKey)
                                                {
                                                    $groupingTitle[$AdditionalGroupKey] = 1;
                                                }
                                                
                                                foreach ($MIValues as $key => $value)
                                                {
            
                                                    if(isset($value['groupingTitle']))
                                                    {
                                                        $groupingTitleLabel = $this->addPrefix($value['groupingTitle']);
                                                        $groupingTitle[$groupingTitleLabel] += 1;
                                                    }
                                                }
            
                                                $MIArray = array();
                                                $theadSecondData = [];
                                                $tableHeaderKeys = [];
                                                $theadSecondData[] = $AdditionalHeaderKey;
            
                                                if($CS_Idlers_Label)
                                                {
                                                    $theadSecondData[] = $AdditionalHeaderKey;
                                                }
            
                                                foreach ($childrenDataChunk as $childValue)
                                                {
                                                    $percentageSymbol = '';
                                                    $bricks = $childValue->getProductAttributes();
    
                                                    if($ProductNamePrefix)
                                                    {
                                                        $productBrand = $childValue->getProductNamePrefix();
                                                    }
    
                                                    $data = [];
                                                    
                                                    foreach ($MIValues as $key => $value) {
                                                        $brickName = $value['objectType'];
                                                        $percentageSymbol = $value['percentageSymbol'];
                                                        $getBrick = 'get' . $brickName;
                                                        $getField = 'get' . $key;
            
                                                        if($brickName == 'class')
                                                        {
                                                            $data[$key] = $childValue->$getField();
                                                        }
                                                        else
                                                        {
                                                            if(method_exists($bricks,$getBrick) && method_exists($bricks->$getBrick(),$getField))
                                                            {   
                                                                if($bricks->$getBrick()->$getField())
                                                                {
                                                                    $data[$key] = ($bricks->$getBrick()->$getField()).$percentageSymbol;
                                                                }
                                                                else
                                                                {
                                                                    $data[$key] = $bricks->$getBrick()->$getField();
                                                                }
                                                            }
                                                        }
                                                    }
            
                                                    if($ColumnKeys)
                                                    {
                                                        foreach ($KeysGroupLogic as $hValue) {
                                                            $tableHeaderKeys[] = $data[$hValue];
                                                        }
            
            
                                                        if($tableHeaderKeys)
                                                        {
                                                            $productBrandString = $productBrand. " ". implode('/', $tableHeaderKeys);
                                                            $theadSecondData[] = $productBrandString;
                                                            unset($productBrand);
                                                        }
                                                    }
            
                                                    unset($tableHeaderKeys);
                                                    $MIArray[]= $data;
                                                }
            
                                                $tbodyArray = [];
                                                $theadfirstColspan = 0;
            
                                                if($ColumnKeys)
                                                {
                                                    $tableRows = [];
                                                    if($MIArray)
                                                    {
                                                        foreach ($MIArray as $variant)
                                                        {
                                                            foreach ($variant as $key => $value)
                                                            {
                                                                if($RemoveKeys)
                                                                {
                                                                    if(!isset($RemoveKeys[$key]))
                                                                    {
                                                                        $tableRows[$key][] = $value;
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    $tableRows[$key][] = $value;
                                                                }
                                                            }
                                                        }
                                                    }
            
                                                    if($tableRows)
                                                    {
                                                        foreach ($tableRows as $tdkey => $trvalue)
                                                        {
            
                                                            if($CS_Idlers_Label)
                                                            {
                                                                $rows[]= 'CS_Idlers_Label';
                                                            }
                                                            // $rows[]= $keysTitle[$tdkey];
                                                            $rows[]= $this->addPrefix($tdkey);
            
            
                                                            foreach ($trvalue as $key => $value) {
                                                                $rows[]= $value;
                                                            }
            
                                                            $tbodyArray[] = $rows;
                                                            unset($rows);
                                                        }
                                                        $theadfirstColspan = count($tbodyArray[0]);
                                                    }
                                                }
                                                else
                                                {
                                                    $tableHeadKey = $MIArray[0];
                                                    if($RemoveKeys)
                                                    {
                                                        foreach ($RemoveKeys as $key => $value) {
                                                            unset($tableHeadKey[$key]);
                                                        }
                                                        $tableHeadKey = array_keys($tableHeadKey);
                                                        $theadSecondData = \array_merge($theadSecondData,$tableHeadKey);
                                                    }
            
                                                    // Converting field to its title name
            
                                                    foreach ($theadSecondData as $key => $value)
                                                    {
                                                            $theadSecondData[$key] = $this->addPrefix($value);
                                                    }
            
                                                    foreach ($MIArray as $variant)
                                                    {
                                                        $newKey = [];
                                                        $newArray = [];
            
                                                        if($RemoveKeys)
                                                        {
            
                                                            foreach ($RemoveKeys as $key => $value)
                                                            {
                                                                $newKey[] = $variant[$key];
                                                                unset($variant[$key]);
                                                            }
            
                                                            $newArray[] = implode('/', $newKey);
                                                            $newArray = \array_merge($newArray,$variant);
            
                                                            $tbodyArray[] = array_values($newArray);
                                                        }
                                                    }
                                                    $theadfirstColspan = count($tbodyArray[0]);
                                                }
            
                                                $MIKey = $this->addPrefix($MIKey);
                                                $productTables[$tablekey][$chunkKey][$MIKey]['tbody']= $tbodyArray;
                                                $productTables[$tablekey][$chunkKey][$MIKey]['theadfirstRowColspan']= $theadfirstColspan;
            
            
                                                if($groupingTitle)
                                                {
                                                    $productTables[$tablekey][$chunkKey][$MIKey]['theadSecondRowGroup']= $groupingTitle;
                                                }
            
                                                    $productTables[$tablekey][$chunkKey][$MIKey]['theadSecondRow']= $theadSecondData;
                                            }
                                        }
                                    }
                                }
                            }
                        }
    
                        $productData['productTables'] = $productTables;
                        $productData['productGroupInformation'] = $productTables;
                    }
                }
                $this->view['data'] = $productData;
                $this->view['footer_logo_src']  = $footer_logo_src;
    
            }
        }
        catch(Exception $e)
        {   
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_cover_compounds")
     */
    public function templateCoverCompoundsAction(Request $request)
    {   
        try
        {   
            $regionProperty = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            $configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_cover_compound_page')->getElement();
            $productData = [];
            if($catalogTableObject)
            {
                $productDataImportConfig = $configProviderService->getCatalogProductTablesConfig();
    
                $coverCompoundData = [];
                if($catalogTableObject)
                {
                    $selectedCategoryId = $catalogTableObject->getSecondLevelCategory();
    
                    $hierarchyObj = DataObject\CSHierarchy::getById($selectedCategoryId);

                    if($hierarchyObj)
                    {
                        $hierarchyPath = $hierarchyObj->getPath();
                        $hierarchyName = $hierarchyObj->getKey();
        
                        $hierarchyFullName = $hierarchyPath.$hierarchyName;
                        $productHierarchyPath = \str_replace($hierarchyPath, CS_MATERIAL_HANDLIG_PRODUCTS_PATH, $hierarchyFullName);
        
                        $HierarchyProductPath = DataObject\CSProducts::getByPath($productHierarchyPath);
                        
                        if($HierarchyProductPath)
                        {
                            $coverCompoundData['HierarchyNameLevel2'] = trim($HierarchyProductPath->getName());
                            $coverCompoundData['Name'] = trim($HierarchyProductPath->getName());
                            $coverCompoundData['ShortText'] = $HierarchyProductPath->getShortText();
                            $coverCompoundData['LongText'] = $HierarchyProductPath->getLongText();
                            $coverCompoundData['ProductClaimSlogan'] = $HierarchyProductPath->getProductClaimSlogan();
                            $coverCompoundData['productImage'] = $HierarchyProductPath->getProductImage();
            
                            $CSHierarchyObjChild = $this->getAllRegionChildern($HierarchyProductPath, $regionId);
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
                    $CS_Compounds       = $this->addPrefix('Compounds');
                    $coverCompoundsHeaderKeys   = [];
                    $coverCompoundsHeaderKeys[] = $CS_Compounds;
                    $onlyOnce                   = false;
                    
                    if(isset($CSHierarchyObjChild) && $CSHierarchyObjChild)
                    {
                        foreach ($CSHierarchyObjChild as $objectLevel3rd)
                        {
                            $level3Data['Name'] = $objectLevel3rd->getName();
                            $level3Data['LongText'] = $objectLevel3rd->getLongText();
                            $level3rdObjectData[] = $level3Data;
    
                            if($objectLevel3rd->getKey() === $productPage)
                            {
                                $performanceCategoryIds = $objectLevel3rd->getCSPerformanceCategory();
    
                                $performanceCategoryName = [];
                                $performanceCategoryNameString = '';
    
                                if($performanceCategoryIds)
                                {
                                    foreach ($performanceCategoryIds as $key => $id) {
                                        $performanceCategoryName[] = $coverCompoundMasterList[$id];
                                    }
                                    if($performanceCategoryName)
                                    {
                                        $performanceCategoryNameString = implode(' ', $performanceCategoryName);
                                    }
                                }
    
                                $NamePerformanceCategory =  $level3Data['Name']. $performanceCategoryNameString;
    
                                $singleProductPage['Name'] = $level3Data['Name'];
                                $singleProductPage['NamePerformanceCategory'] = $NamePerformanceCategory;
                                $singleProductPage['productImage'] = $objectLevel3rd->getProductImage();
                                $singleProductPage['LongText'] = $objectLevel3rd->getLongText();
    
                                $FeaturesAndBenefits = [];
    
                                foreach ($objectLevel3rd->getCSProductFeaturesAndBenefits() as $key => $value) {
                                    if($value->getFeatureImage() && trim($value->getFeatureName()))
                                    {
                                        $feature['FeatureName'] = $value->getFeatureName();
                                        $feature['FeatureDescription'] = $value->getFeatureDescription();
                                        $feature['FeatureImage'] = $value->getFeatureImage();
                                        $FeaturesAndBenefits[] = $feature;
                                    }
                                }
    
                                $singleProductPage['FeaturesAndBenefits'] = $FeaturesAndBenefits;
    
                                $Level4ObjChild = $this->getAllRegionChildern($objectLevel3rd, $regionId);
    
                                $level4ObjectData = [];
    
                                if($Level4ObjChild)
                                {
                                    foreach ($Level4ObjChild as $level4Value) {
                                        $level4DataPart['Name'] = $level4Value->getName();
                                        $level4DataPart['LongText'] = $level4Value->getLongText();
                                        $level4ObjectData[] = $level4DataPart;
                                    }
                                }
    
                                $singleProductPage['Level4ObjChildData'] = $level4ObjectData;
                            }
    
                            $label4Childs = $this->getAllRegionChildern($objectLevel3rd, $regionId);
                        
                            if($label4Childs)
                            {
                                foreach ($label4Childs as $child) {
                                    $level4Key = trim($child->getKey());
                                    $level4Name = trim($child->getName());
                                    if($child->getCSPerformanceCategory())
                                    {
                                        foreach ($child->getCSPerformanceCategory() as $ckey => $coverCompound) {
                                            $coverCompoundName = $coverCompoundMasterList[$coverCompound];
                                            $coverCompounds[$coverCompoundName][$level4Key][] = $level4Name;
                                            $bricks = $child->getProductAttributes();
    
                                            foreach ($coverOptionsAttributes as $key => $brickName) {
    
                                                $getBrick = 'get' . $brickName;
                                                $getField = 'get' . $key;
                                                if($bricks->$getBrick())
                                                {
                                                    if(!$onlyOnce)
                                                    {
                                                        $coverCompoundsHeaderKeys[] = $this->addPrefix($key);
                                                    }
                                                    $coverCompounds[$coverCompoundName][$level4Key][] = $bricks->$getBrick()->$getField();
                                                }
                                                else{
                                                    $coverCompounds[$coverCompoundName][$level4Key][] = '';
                                                }
                                            
                                            }
                                            $onlyOnce = true;
                                        }
                                    }
                                    
                                    if($child->getCSProductApplications())
                                    {
                                        foreach ($child->getCSProductApplications() as $key => $application) {
                                            
                                            $applicationData[$application->getApplicationName()] = $application->getApplicationName();
                                            $level4Data[$level4Name][] = $application->getApplicationName();
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    if($level4Data)
                    {
                        foreach ($level4Data as $lkey => $lvalue)
                        {
                            $data[] = $lkey;
                            foreach ($applicationData as $avalue)
                            {
    
                                if(in_array($avalue,$lvalue))
                                {
                                    $data[] = true;
                                }
                                else{
                                    $data[] = false;
                                }
                                
                            }
                            $CCAARows[] = $data;
                            unset($data);
                        }
                    }
    
                    $productData['CCAARows'] = $CCAARows;
                    $productData['applicationData'] = $applicationData;
                    $productData['coverCompounds'] = $coverCompounds;
                    $productData['coverCompoundsHeaderKeys'] = $coverCompoundsHeaderKeys;
                    $productData['level3rdObjectData'] = $level3rdObjectData;
                    $productData['singleProductPage'] = $singleProductPage;
                    
                }
                else
                {
                    echo "Category Not Select In Catalog Category Object";
                    die;
                }
    
                $productData['coverCompoundData'] = $coverCompoundData;
            }

            $this->view['data']                 = $productData;
            $this->view['HierarchyNameLevel2']  = $coverCompoundData['HierarchyNameLevel2'];
            $this->view['footer_logo_src']      = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_section_page")
     */
    public function templateProductSectionPageAction(Request $request)
    {
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_section_page")
     */
    public function templateCleatedBeltsAction(Request $request)
    {   
        try
        {   
            $regionProperty = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId   = $regionProperty->getId();
            $region     = $regionProperty->getRegionName();
            $this->configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_cleated_belts_page')->getElement();
            $productData    = [];
            $displayTablesFlag  = false;
            if($catalogTableObject)
            {   
                $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();   
    
                $selectedProduct = $catalogTableObject->getProducts();
    
                $productId = $selectedProduct[0];
    
                $productDetails = DataObject\CSProducts::getById($productId);

                
                if($productDetails)
                {
                    $productData['HierarchyNameLevel2'] = trim($productDetails->getName());
                    $productData['Name'] = $productDetails->getName();
                    $productData['LongText'] = $productDetails->getShortText();
                    $productData['BeltRollDiameters'] = $productDetails->getBeltRollDiameters();
                    $productData['AngleOfInclination'] = $productDetails->getAnglesofInclination();
                    $productData['cover_compounds'] = $productDetails->getCoverCompounds();
    
                    $ymlData = $this->configProviderService->getBrickMappingConfig();
                    
                    $unitField = '';
                    if(isset($ymlData['defualtUnit'][$region]))
                    {
                        $unitField = $ymlData['defualtUnit'][$region];
                    }
        
                    if(isset($productDataImportConfig['Common Belt Profile Attributes'][$unitField]))
                    {
                        $CommonBeltProfileAttributes = $productDataImportConfig['Common Belt Profile Attributes'][$unitField];
                    }
                    
                    $ContiRollConfig = $productDataImportConfig['Common Belt Profile Attributes']['ContiRoll Config'];
        
                    $productChildrenData = $this->getAllRegionChildern($productDetails, $regionId);
        
                    $availableBeltWidthMasterList = $this->getAvailableBeltWidthMasterList();
                    $availablePatternWidthMasterList = $this->getAvailablePatternWidthMasterList();
        
                    $childrenData = [];
                    if($productChildrenData)
                    {
                        foreach ($productChildrenData as $child) {
                            $removeField = false;
                            $data['Name'] = $child->getName();
                            $data['LongText'] = $child->getShortText();
                            $data['ProductImage'] = $child->getProductImage();
                            $data['ApplicationImage'] = $child->getApplicationImage();
        
                            $bricks = $child->getProductAttributes();
                            $rowsData = [];
                            if($bricks)
                            {  
                                foreach ($CommonBeltProfileAttributes as $fieldName => $fieldNameConfig) {
                                    $fieldNameConfigArray = explode('~',$fieldNameConfig);
                                    $brickName = $fieldNameConfigArray[0];
                                    $getBrick = 'get' . $brickName;
                                    $getField = 'get' . $fieldName;
        
                                    if($fieldNameConfigArray && (count($fieldNameConfigArray) == 2))
                                    {
                                        if(method_exists($bricks,$getBrick) && method_exists($bricks->$getBrick(),$getField) &&  $bricks->$getBrick() && $bricks->$getBrick()->$getField())
                                        {   
                                            $fieldNameString = $this->addPrefix($fieldName);
                                            if($fieldName =='AvailableBeltWidthRangeInch' || $fieldName =='AvailableBeltWidthRangeMM')
                                            {
                                                $removeField = true;
                                            }
                                            $colData[] = $fieldNameString;
                                            $colData[] = $bricks->$getBrick()->$getField();
                                            $rowsData[] = $colData;
                                            unset($colData);
                                        }
                                    }
                                    else
                                    {
                                        $fieldBlockName = $fieldNameConfigArray[1];
                                        $fieldBlockFieldName = $fieldNameConfigArray[2];
                                        $masterFieldNameString = $fieldNameConfigArray[3];
                                        
                                        if($masterFieldNameString)
                                        {
                                            $masterFieldNameArray = explode('$', $masterFieldNameString);
                                        }
        
                                        
                                        $getfieldBlockName = 'get' . $fieldBlockName;
                                        if(method_exists($bricks->$getBrick(),$getfieldBlockName) && $bricks->$getBrick()->$getfieldBlockName())
                                        {
                                            $fieldData = [];
                                            $fieldNameWithPrefix = $this->addPrefix($fieldName);
                                            
                                            foreach($bricks->$getBrick()->$getfieldBlockName() as $obj)
                                            {
                                                $colData[] = $fieldNameWithPrefix;
                                                $fieldData[] = $obj[$fieldBlockFieldName]->getData();
                                                $colDataMultiSelect = $obj[$fieldBlockFieldName]->getData();
                                                if(is_array($colDataMultiSelect))
                                                {
                                                    $datum = [];
                                                    foreach ($colDataMultiSelect as  $id) {
                                                        if(count($masterFieldNameArray) == 2)
                                                        {
                                                            $masterFieldName1 = $masterFieldNameArray[0];
                                                            $masterFieldName2 = $masterFieldNameArray[1];
                                                            $fvalue = $availablePatternWidthMasterList[$id][$masterFieldName1];
                                                            if(!trim($fvalue)){
                                                                $fvalue = $availablePatternWidthMasterList[$id][$masterFieldName2];
                                                            }
                                                        }
                                                        else{
                                                            $masterFieldName = $masterFieldNameArray[0];
                                                            $fvalue = $availablePatternWidthMasterList[$id][$masterFieldName];
                                                        }
                                                        
                                                        $colData[] = $fvalue;
                                                    }
                                                }
                                                else{
                                                    $id = $obj[$fieldBlockFieldName]->getData();
                                                    $masterFieldName = $masterFieldNameArray[0];
                                                    $fvalue = $availableBeltWidthMasterList[$id][$masterFieldName];
                                                    $colData[] = $fvalue;
                                                }
        
                                                $rowsData[] = $colData;
                                                unset($colData);
                                            }
                                            
                                        }
                                    }
                                }
                            }   
                            
                            $modifiedData = [];
                            $remainingData = [];
                            $maxColumn = 0;
                            $maxRow = 0;
        
                            foreach ($rowsData as $nvalue) 
                            {
                                if(count($nvalue) > 2)
                                {
                                    $remainingData[] = $nvalue;
                                }
                                else{
                                    $modifiedData[$nvalue[0]][] = $nvalue[1];
                                }
                            }
        
                            if($modifiedData)
                            {
                                foreach ($modifiedData as $mvalue) {
                                    if(count($mvalue) > $maxColumn)
                                    {
                                        $maxColumn = count($mvalue);
                                    }
                                }
                                
                            }
        
                            // make single column if all columns have same value
                            if($modifiedData)
                            {
                                foreach($modifiedData as $key => $value){
                                    $arrayCountBeforeUnique = count($value);
                                    $arrayCount = array_unique($value);
                                    if(($arrayCountBeforeUnique == $maxColumn) && count($arrayCount) == 1)
                                    {
                                        $modifiedData[$key] = array($value[0]);
                                    }
                                    else{
                                        $modifiedData[$key] = $value;
                                    }
                                }
                            }
        
                            $remainingModifiedArray = [];
        
                            $maxRow = 0;
                            if($remainingData)
                            {
                                foreach($remainingData as $key => $array)
                                {
                                    $keyToStore = $array[0];
                                    unset($array[0]);
                                    $array = array_values($array);
        
                                    if($removeField)
                                    {
                                        $remainingModifiedArray[$keyToStore] = $array;
                                    }
                                    else{
                                        $remainingModifiedArray[$keyToStore][] = $array;
                                    }
        
                                    if(count($array) > $maxRow)
                                    {
                                        $maxRow = count($array);
                                    }
                                }
                            }
        
                            if($remainingModifiedArray && !$removeField)
                            {
                                foreach ($remainingModifiedArray as $key => $array) {
                                    $modifiedData[$key] = $this->getTransposeArray($array, $maxRow, $maxColumn);
                                }
                            }
        
                            if($removeField)
                            {
                                $maxColumn = 2;
                                $modifiedData = array_merge($modifiedData, $remainingModifiedArray);
                            }
        
                            if($unitField && !$removeField)
                            {
                                foreach ($modifiedData as $key => $value) {
                                    if (stripos($key, $unitField) === false) {
                                        unset($modifiedData[$key]);
                                    }
                                }
                            }
        
                            $tableArray = [];
                            if($removeField)
                            {
                                $removeFieldArray = $ContiRollConfig['removeField'];
                                foreach ($removeFieldArray as $rkey1 => $value) {
                                    $fieldToRemove = $this->addPrefix($rkey1);
                                    unset($modifiedData[$fieldToRemove]);
                                }
        
                                $groupingAndOrderingArray = $ContiRollConfig['groupingAndOrdering'];
                                $concatnateOperator = $ContiRollConfig['concatnateOperator'];
                                foreach ($groupingAndOrderingArray as $okey1 => $ovalue) {
                                    $fieldKey = $this->addPrefix($okey1);
        
                                    if(is_array($ovalue))
                                    {
                                        foreach ($ovalue as $newvalue1) {
                                            $fieldKeyNew = $this->addPrefix($newvalue1);
                                            $internalArray = $modifiedData[$fieldKeyNew];
                                            $arrayValue;
                                            if(is_array($internalArray))
                                            {
                                                $arrayValue[] = implode($concatnateOperator, $internalArray);
                                            }
                                            else{
                                                $arrayValue[] = $internalArray;
                                            }
                                        }
                                        $arrayToPush = array_merge([$fieldKey], $arrayValue);
                                        unset($arrayValue);
                                    }
                                    else{
                                        $arrayToPush = array_merge([$fieldKey], $modifiedData[$fieldKey]);
                                    }
                                    array_push($tableArray, $arrayToPush);
                                    unset($arrayToPush);
                                }
        
                            }
        
                            if($modifiedData && !$removeField)
                            {
                                foreach($modifiedData as $key1 => $secondArray)
                                {
                                    $datum[] = $key1;
                                    
                                    if(is_array($secondArray))
                                    {
                                        
                                        foreach ($secondArray as $key2 => $thirdArray) {
        
                                            if(is_array($thirdArray))
                                            {
                                                $localArray = [];
                                                $localArray[] = $key1;
                                                foreach ($thirdArray as $key3 => $value) {
                                                    $localArray[] = $value;
                                                }
        
                                                $tableArray[] = $localArray;
        
                                            }
                                            else{
                                                $datum[] = $thirdArray;
                                            }
                                        }
        
                                        if(count($datum) > 1)
                                        {
                                            $tableArray[] = $datum;
                                        }
                                        
                                        unset($datum);
                                    }
                                    
                                }
                            }
        
                            $data['tableFieldData'] = $tableArray;
                            $data['maxColumns'] = $maxColumn;
                            
                            $childrenData[] = $data;
                        }
                    }
                    $productData['childrenData'] = $childrenData;
                    $ymlData = $this->configProviderService->getBrickMappingConfig();
                    
                    if(isset($ymlData['cleated_belts_table_display_in_region']['regionName']) && ($ymlData['cleated_belts_table_display_in_region']['regionName'] === $region))
                    {
                        $displayTablesFlag = true;
                    }
                }
            }
    
            $this->view['data']             = $productData;
            $this->view['displayTablesFlag']    = $displayTablesFlag;
            $this->view['footer_logo_src']  = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    /** Get Reasion Name By id
     *  @return array
     *  @param array $ids_arr
     */
    private function getCSRegionNameByIds($ids_arr)
    {
        try
        {
            $regionsArr = [];

            $entries = new DataObject\CSRegion\Listing();

            $entries->setCondition("oo_id IN (?)", [$ids_arr]); 

            if(count($entries))
            {
                foreach($entries as $obj)
                {
                    $regionsArr[] = $obj->getRegionName();
                }
            }
            return $regionsArr;
        }
        catch(\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
    }

    public function getAllRegionChildern($productObject, $regionId): Array
    {
        try
        {
            $productChildrenData = [];
            $objectTypeFolderchildren = $productObject->getChildren([DataObject::OBJECT_TYPE_FOLDER]);
            
            if($objectTypeFolderchildren)
            {
                foreach ($objectTypeFolderchildren as $objectChildFolder) {
                    $children = $objectChildFolder->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
                    $productChildrenData = array_merge($productChildrenData, $children);
                }
            }
            
            $children = $productObject->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
            $productChildrenData = array_merge($productChildrenData, $children);
            
            $filterArray = [];
            foreach($productChildrenData as $key => $child)
            {
                if($child->getPrintedCatalogFlag() === true)
                {
                    if($child->getCSRegion())
                    {
                        if(in_array($regionId, $child->getCSRegion()))
                        {
                            $filterArray[$key]['data'] = $child;
                            $filterArray[$key]['SortOrder'] = $child->getSortOrder();
                        }
                    }
                    else{
                        $filterArray[$key]['data'] = $child;
                        $filterArray[$key]['SortOrder'] = $child->getSortOrder();
                    }
                }
            }
            
            if($filterArray)
            {
                $filterArrayData = $this->phparraysort($filterArray, array('SortOrder'), SORT_ASC);
            }
            
            $filterArraySorted = [];
            
            if($filterArrayData)
            {
                foreach ($filterArrayData as $key => $value) {
                    $filterArraySorted[] = $value['data'];
                }
            }
            
            return $filterArraySorted;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }

    function phparraysort($Array, $SortBy=array(), $Sort = SORT_REGULAR) {
        if (is_array($Array) && !empty($Array) && !empty($SortBy)) {
                $Map = array();
                foreach ($Array as $Key => $Val) {
                    $Sort_key = '';
                    foreach ($SortBy as $Key_key) {
                    $Sort_key .= $Val[$Key_key];
                    }                
                    $Map[$Key] = $Sort_key;
                }
                asort($Map, $Sort);
                $Sorted = array();
                foreach ($Map as $Key => $Val) {
                    $Sorted[] = $Array[$Key];
                }
                return $Sorted;
        }
        return $Array;
    }

    public function addPrefix($key): String
    {   
        try
        {
            if(trim($key))
            {
                $key = "CS_{$key}";
            }
            return $key;
        }
        catch(Exception $e)
        {  
            return new Response($e->getMessage());
        }
    }

    public function getTransposeArray($array, $maxRow, $maxColumn): Array
    {   
        try
        {
            for($i = 0; $i < $maxRow; $i++)
            {
                for($j = 0; $j < $maxColumn; $j++)
                {
                    $newRows[$i][$j] = 0;
                    //Initially transpose matrix to be declare with 0;
                    $newRows[$i][$j] = $array[$j][$i];
                    //Converts the row of original matrix into column of transposed matrix
                }
            }
            return $newRows;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }
    
    public function getAvailableBeltWidthMasterList(): Array 
    {   
        try
        {
            $beltWidthList  = new DataObject\CSAvailableBeltWidths\Listing();
            $beltWidthList  = $beltWidthList->load();
            $list           = [];

            if($beltWidthList)
            {
                foreach ($beltWidthList as $value)
                {
                    $list[$value->getId()]['AvailableBeltWidthMM'] = $value->getAvailableBeltWidthMM();
                    $list[$value->getId()]['AvailableBeltWidthInch'] = $value->getAvailableBeltWidthInch();
                }
            }
            return $list;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }

    public function getAvailablePatternWidthMasterList(): Array
    {   
        try
        {
            $patternWidthList = new DataObject\CSAvailablePatternWidths\Listing();
            $patternWidthList = $patternWidthList->load();
            $list             = [];

            if($patternWidthList)
            {
                foreach($patternWidthList as $value)
                {
                    $list[$value->getId()]['AvailableProfilePatternWidthsMM'] = $value->getAvailableProfilePatternWidthsMM();
                    $list[$value->getId()]['AvailableProfilePatternWidthsInch'] = $value->getAvailableProfilePatternWidthsInch();
                    $list[$value->getId()]['AvailablePatternWidthText'] = $value->getAvailablePatternWidthText();
                }
            }
    
            return $list;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }

    public function getCoverCompoundMasterList(): Array
    {   
        try
        {
            $productsList = new DataObject\CSPerformanceCategories\Listing();
            $productsList = $productsList->load();
    
            $performanceList = [];
            if($productsList)
            {
                foreach ($productsList as $value) {
                    $performanceList[$value->getId()] = $value->getPerformanceCategory();
                }
            }
    
            return $performanceList;
        }
        catch(Exception $e)
        {  
            return new Response($e->getMessage());
        }
    }

    public function getS3ImageSrc($src)
    {   
        try
        {
            $s3src  = '';
            $imgObj = \Pimcore\Model\Asset::getByPath($src);
    
            if($imgObj)
            {
                $s3src = $imgObj->getThumbnail('catalog_thumb');
                //$s3src = Utils::getAssetFullPathCompatibleToS3($imgObj);
            }
            return $s3src;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }

    public function containerAction(Request $request)
    {   
        try
        {
            $allChildren = $this->document->getAllChildren();
            $this->view->allChildren = $allChildren;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_continental_conveyor_services")
    */
    public function templateContinentalConveyorServicesAction(Request $request)
    {       
        try
        {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId                       = $regionProperty->getId();
            $this->configProviderService    = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $default_image = $this->configProviderService->getDefaultImage();
        
            $catalogCategoryObject = $this->getDocumentTag('relation', 'cbs_template_belt_services_page')->getElement();
    
            $productNameArr = [];
    
            if($catalogCategoryObject)
            {
                $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();
    
                $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);
                
                if($hierarchyObj)
                {
                    $hierarchyPath = $hierarchyObj->getPath();
                    $hierarchyName = $hierarchyObj->getKey();
        
                    $hierarchyFullName = $hierarchyPath.$hierarchyName;
                    $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);
        
                    $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);

                    if($productObject)
                    {
                        $productNameArr['Name'] = trim($productObject->getName());
                        $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                        $productNameArr['ShortText'] = $productObject->getShortText();
                        $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());
                        
                        $childrenData = [];
            
                        $childObject = $this->getAllRegionChildern($productObject, $regionId);
                    
                        foreach ($childObject as $childValue)
                        {
                            $data['Name'] = $childValue->getName();
                            $data['LongText'] = $childValue->getLongtext();
                            $data['ProductImage'] = $childValue->getProductImage();
        
                            $childrenData[] = $data;
                            unset($data);
                        }
                    }

                }
    
                $productNameArr['childrenData'] = $childrenData;
            }
    
            $this->view['data'] = $productNameArr;
            $this->view['footer_logo_src']  = $footer_logo_src;
            $this->view['default_image']    = $default_image;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_protect_systems")
    */
    public function templateContiProtectSystemsAction(Request $request)
    {   
        try
        {
            $regionProperty = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_protect_systems')->getElement();
    
            $this->configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $productData = [];
            if($catalogTableObject)
            {
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];
                
                $productObject = DataObject\CSProducts::getById($singleProduct);
                
                if($productObject)
                {
                    $productData['Name'] = $productObject->getName();
                    $productData['ShortText'] = $productObject->getShortText();
                    $productData['ProductImage'] = $productObject->getProductImage();
                    $productData['ApplicationImage'] = $productObject->getApplicationImage();
        
                    $parentParentObj    =   $this->getProductParentObject($productObject); //$productObj->getParent();
    
                    if (!empty($parentParentObj) && $parentParentObj instanceof DataObject\CSProducts) {
                        $productData['HierarchyNameLevel2'] = $parentParentObj->getName();
                    } else {
                        $productData['HierarchyNameLevel2'] = null;
                    }
        
                    // $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';
        
                    $childrenData = [];
                    $childObject = $this->getAllRegionChildern($productObject, $regionId);
        
                    foreach ($childObject as $childValue) {
                        if(trim($childValue->getName()))
                        {
                            $data['Name'] = $childValue->getName();
                            $data['ShortText'] = $childValue->getShortText();
            
                            $childrenData[] = $data;
                            unset($data);
                        }
                    }
        
                    $productData['childrenData'] = $childrenData;
        
                    $this->view['monitoring_system'] = $this->getContiCleanBenefits($productObject);
                }
            }
    
            $this->view['data'] = $productData;
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_inspect_systems")
    */
    public function templateContiInspectSystemsAction(Request $request)
    {   
        try
        {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_inspect_systems')->getElement();
            $productData = [];
            if($catalogTableObject)
            {
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];
                $productObject = DataObject\CSProducts::getById($singleProduct);

                $parentParentObj    =   $this->getProductParentObject($productObject); //$productObj->getParent();
    
                if (!empty($parentParentObj) && $parentParentObj instanceof DataObject\CSProducts) {
                    $productData['HierarchyNameLevel2'] = $parentParentObj->getName();
                } else {
                    $productData['HierarchyNameLevel2'] = null;
                }
                
                // if(method_exists($productObject,'getParent'))
                // {
                //     $objParent = $productObject->getParent();
        
                //     $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';
                // }
                
                if($productObject)
                {
                    $productData['Name'] = $productObject->getName();
                    $productData['ShortText'] = $productObject->getShortText();
                    $productData['ProductImage'] = $productObject->getProductImage();
                    $productData['ReportImage'] = $productObject->getReportImage();
                    
                    $productData['ApplicationImage'] = $productObject->getApplicationImage();
                    $productData['Benefits'] = $this->getContiCleanBenefits($productObject);
        
                    $childrenData = [];
                    $childObject = $this->getAllRegionChildern($productObject, $regionId);
        
                    if($childObject)
                    {
                        foreach ($childObject as $childValue) {
                            if(trim($childValue->getName()))
                            {
                                $data['Name'] = $childValue->getName();
                                $data['ShortText'] = $childValue->getShortText();
            
                                $childrenData[] = $data;
                                unset($data);
                            }
                        }
                    }
        
                    $productData['childrenData'] = $childrenData;
                }
            }
    
            $this->view['data'] = $productData;
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_mega_pipe_belt")
    */
    public function templateMegaPipeBeltAction(Request $request)
    {   
        try
        {
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_mega_pipe_belt')->getElement();
            $productData = [];
            if($catalogTableObject)
            { 
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];
                $productObject = DataObject\CSProducts::getById($singleProduct);

                if($productObject)
                {
                    $objParent = DataObject\CSProducts::getById($productObject->getParentId());
        
                    $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';
        
                    $productData['Name'] = $productObject->getName();
                    $productData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $productData['ShortText'] = $productObject->getShortText();
                    $productData['ProductImage'] = $productObject->getProductImage();
                    
                    $productData['Features'] = $this->getSybercordTechnologyFeature($productObject);
        
                    $productData['CSProductFeaturesAndBenefits'] = $productObject->getCSProductFeaturesAndBenefits();
                }
    
                $productData['HierarchyNameLevel1'] = 'Conveying Solutions';
            }
            
            $this->view['data'] = $productData;
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_conti_pipe_belt")
     */
    public function templateContiPipeBeltAction(Request $request)
    {   
        try
        {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_pipe_belt')->getElement();
            $productData = [];
            
            if($catalogTableObject)
            {
                $selectedProduct    = $catalogTableObject->getProducts();
                $singleProduct      = isset($selectedProduct[0])?$selectedProduct[0]:'';
    
                $singleProductObj = DataObject\CSProducts::getById($singleProduct);

                if($singleProductObj)
                {
                    $childProductData['Name'] = $singleProductObj->getName();
                    $childProductData['ProductClaimSlogan'] = $singleProductObj->getProductClaimSlogan();
                    $childProductData['ShortText'] = $singleProductObj->getShortText();
                    $childProductData['ProductImage'] = $singleProductObj->getProductImage();
                    $childProductData['productSpecificData'] = $this->prepareContiPipeAndMegaPipeAttributes($singleProductObj, $regionId);
                }
    
                $FeaturesAndBenefits = [];
                if($singleProductObj->getCSProductFeaturesAndBenefits())
                {
                    foreach ($singleProductObj->getCSProductFeaturesAndBenefits() as $value) {
                        if(trim($value->getFeatureName()))
                        {
                            $FeaturesAndBenefits[] = $value->getFeatureName();
                        }
                    }
                }
                $childProductData['Benefits'] = $FeaturesAndBenefits;
                
                // $productObject = [];

                // if(method_exists($singleProductObj,'getParent'))
                // {
                //     $productObject = $singleProductObj->getParent();
                // }

                $productObject    =   $this->getProductParentObject($singleProductObj); //$productObj->getParent();
    
                if($productObject)
                {
                    $parentProductData['Name'] = $productObject->getName();
                    $parentProductData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $parentProductData['ShortText'] = $productObject->getShortText();
                    $parentProductData['ProductImage'] = $productObject->getProductImage();
                    
                    $applications = [];
                    if($productObject->getCSProductApplications())
                    {
                        foreach ($productObject->getCSProductApplications() as $value) {
                            $applications[] = $value->getApplicationName();
                        }
                    }
                    $parentProductData['Applications'] = $applications;
                    $parentProductData['HierarchyNameLevel2'] = $productObject->getName();;
                    
                }
            }
    
            $productData['parentProductData'] = $parentProductData;
            $productData['childProductData'] = $childProductData;
    
            $this->view['data'] = $productData;
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }
    
    /**
     * Prepare ContiPipe™ and MegaPipe® Sizes table data
     * @param object
     * @access private 
     * @return array
     */
    private function prepareContiPipeAndMegaPipeAttributes($productObject, $regionId)
    {   
        $availableBeltWidthMaster = $this->getAvailableBeltWidthMasterList();

        try
        {
            $childObject = $this->getAllRegionChildern($productObject, $regionId);
    
            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();
    
            $attributes = [];
    
            if(isset($productDataImportConfig['ContiPipe and MegaPipe Table Attributes']))
            {
                $attributes  = $productDataImportConfig['ContiPipe and MegaPipe Table Attributes'];
            }
    
            $total_attr = count($attributes);
    
            if($childObject)
            {
                foreach($childObject as $obj)
                {   
                    $obj_attr           =   $obj->getProductAttributes();
    
                    foreach ($attributes as $fieldName => $brickName)
                    {
                        $getBrick = 'get' . $brickName;
                        $getField = 'get' . $fieldName;
    
                        if(method_exists($obj_attr,$getBrick) && method_exists($obj_attr->$getBrick(),$getField))
                        {
                            if(in_array($fieldName,["FabricType","SteelType"]))
                            {
                                $data[] = ($obj_attr->$getBrick()->$getField()) ? '•' : '';
                            }
                            else{
                                $valuesData = $obj_attr->$getBrick()->$getField();

                                if($valuesData && is_array($valuesData))
                                {
                                    if($fieldName == 'BeltWidth')
                                    {
                                        $BeltWidthInch = [];
                                        $BeltWidthInchStr = '';
                                        foreach($valuesData as $dData)
                                        {
                                            $BeltWidthInch[] = $availableBeltWidthMaster[$dData]['AvailableBeltWidthInch'];
                                        }

                                        if($BeltWidthInch)
                                        {
                                            $BeltWidthInchStr = implode(', ', $BeltWidthInch);
                                        }
                                        $data[] = $BeltWidthInchStr;
                                    }
                                    else{
                                        $BeltWidthMM = [];
                                        $BeltWidthMMStr = '';
                                        foreach($valuesData as $dData)
                                        {
                                            $BeltWidthMM[] = $availableBeltWidthMaster[$dData]['AvailableBeltWidthMM'];
                                        }

                                        if($BeltWidthMM)
                                        {
                                            $BeltWidthMMStr = implode(', ', $BeltWidthMM);
                                        }
                                        $data[] = $BeltWidthMMStr;
                                    }
                                    
                                }
                                else{
                                    $data[] = $valuesData;
                                }
                            }
                        }
                    }
                }
            }
    
            $data = $data ? array_chunk($data,$total_attr) : [];
    
            if($data)
            {
                foreach ($data as $key => $array) {
                    $isTrue = false;
                    foreach ($array as $value) {
                        if($value)
                        {
                            $isTrue = true;
                        }
                    }
                    if(!$isTrue)
                    {
                        unset($data[$key]);
                    }
                }
            }
    
            return $data;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }


    public function templateTextileConveyorBeltsAction(Request $request)
    {   
        try
        {
            $catalogCategoryObject = $this->getDocumentTag('relation', 'cbs_template_textile_belt_services_page')->getElement();
    
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $productNameArr = [];
    
            if ($catalogCategoryObject)
            {
                $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();
    
                $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);
                
                if($hierarchyObj)
                {
                    $hierarchyPath = $hierarchyObj->getPath();
                    $hierarchyKeyName = $hierarchyObj->getKey();
        
                    $hierarchyFullName = $hierarchyPath.$hierarchyKeyName;
                    $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);
        
                    $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
            
                    $productNameArr['Name'] = trim($productObject->getName());
                    $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $productNameArr['ShortText'] = $productObject->getShortText();
                    $productNameArr['ProductImage'] = $productObject->getProductImage();
                    $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
                    $productNameArr['fieldPhoto'] = $productObject->getfieldPhoto();  
                    $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());           
                }
            }
            $this->view['data'] = $productNameArr;
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }
    
    public function templateSteelcordBeltConstructionAction(Request $request)
    {   
        try
        {
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $catalogCategoryObject = $this->getDocumentTag('relation', 'cbs_template_steelcord_belt_construction_page')->getElement();
    
            $productNameArr = [];
    
            if($catalogCategoryObject)
            {
                $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();
    
                $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

                if($hierarchyObj)
                {
                    $hierarchyPath = $hierarchyObj->getPath();
                    $hierarchyName = $hierarchyObj->getKey();
        
                    $hierarchyFullName = $hierarchyPath.$hierarchyName;
                    $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);
        
                    $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);

                    if($productObject)
                    {
                        $productNameArr['Name'] = trim($productObject->getName());
                        $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                        $productNameArr['ShortText'] = $productObject->getShortText();
                        $productNameArr['ProductImage'] = $productObject->getProductImage();
                        $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
                        $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());  
                    }
                }
            }
            $this->view['data'] = $productNameArr;
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }   
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_sybercord_technology")
    */
    public function templateSybercordTechnologyAction(Request $request)
    {   
        try
        {
            $this->configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_sybercord_technology_construction_page')->getElement();
    
            $productNameArr = [];
    
            if($catalogTableObject)
            {   
                $selectedProduct = [];

                if(method_exists($catalogTableObject,"getProducts"))
                {
                    $selectedProduct = $catalogTableObject->getProducts();
                }
    
                if($selectedProduct)
                {
                    $singleProduct = $selectedProduct[0];
                    $productObject = DataObject\CSProducts::getById($singleProduct);

                    // $parentProductObject = [];

                    // if(method_exists($productObject,'getParent'))
                    // {
                    //     $parentProductObject = $productObject->getParent();
                    // }

                    $parentParentObj    =   $this->getProductParentObject($productObject); //$productObj->getParent();
    
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
                    
                    $FeaturesAndBenefits = [];
                    if($productObject->getCSProductFeaturesAndBenefits())
                    {
                        foreach ($productObject->getCSProductFeaturesAndBenefits() as $value)
                        {
                            if($value->getFeatureName())
                            {
                                $FeaturesAndBenefits[] = $value->getFeatureName();
                            }
                            
                        }
                    }
    
                    $productNameArr['Features'] = $FeaturesAndBenefits;
                    
                    $productNameArr['CSProductApplications'] = $productObject->getCSProductApplications();
                }
            }
            $this->view['data'] = $productNameArr;
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    /**
     * Get sybercord technology's feature
     * @param object
     * @access private 
     * @return array
     */
    private function getSybercordTechnologyFeature($productObject)
    {
        try
        {
            $feature = [];

            if(method_exists($productObject,'getFeatureBlock') && $productObject->getFeatureBlock())
            {
                foreach($productObject->getFeatureBlock() as $obj)
                {
                    $feature[] = $obj['Feature']->getData();
                }
            }
            return $feature;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }
    
    public function templateConveyorBeltGroupAction(Request $request)
    {
    }

    public function templateContiCleanAction(Request $request)
    {   
        try
        {
            $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_clean')->getElement();
    
            $this->configProviderService = new ConfigProviderService();
        
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $productData = [];
            if($catalogTableObject)
            {
                $selectedProduct = $catalogTableObject->getProducts();
                if($selectedProduct)
                {
                    $singleProduct = $selectedProduct[0];
                    $productObject = DataObject\CSProducts::getById($singleProduct);
                    if($productObject)
                    {
                        $productData['Name'] = $productObject->getName();
                        $productData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                        $productData['ShortText'] = $productObject->getShortText();
                        $productData['ProductImage'] = $productObject->getProductImage();
                        $productData['ApplicationImage'] = $productObject->getApplicationImage();
                        $productData['reportImage'] = $productObject->getReportImage();
                        
                        // $this->view['data'] = $productData;
                        
                        $productData['material'] = $this->getContiCleanMaterials($productObject);
    
                        $productData['Benefits'] = $this->getContiCleanBenefits($productObject);
                    }
                }
            }
    
            $this->view['data'] = $productData;
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
    }

    /**
     * Get Conti Clean Materials
     * @param object $productObject
     * @access private 
     * @return array
     */
    private function getContiCleanBenefits($productObject)
    {   
        try
        {
            $benefits = [];
            if(method_exists($productObject,'getBenefitBlock') && $productObject->getBenefitBlock())
            {
                foreach($productObject->getBenefitBlock() as $obj)
                {
                    $benefits[] = $obj['Benefit']->getData();
                }
            }
            return $benefits;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get Conti Clean Materials
     * @param object $productObject
     * @access private 
     * @return array
     */
    private function getContiCleanMaterials($productObject)
    {
        try
        {   
            $materials  = [];
            $objAttr    = $productObject->getProductAttributes();
            
            if(method_exists($objAttr,'getMaterial') && method_exists($objAttr->getMaterial(),'getMaterial'))
            {
                $arr = $objAttr->getMaterial()->getMaterial();

                if($arr)
                {
                    foreach($arr as $materialId)
                    {       
                        $obj  = DataObject\CSMaterial::getById($materialId);
                        
                        if(method_exists($obj,"getMaterialName"))
                        {
                            $value = $obj->getMaterialName();
                            $materials[] = $value; 
                        }
                    }
                }
            }

            return $materials;
        }
        catch(Exception $e)
        {  
            throw new Exception($e->getMessage());
        }
    }    

    public function templateCreatedWithBricksAction(Request $request)
    {   
        try
        {
            $this->configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
    
            $this->view['footer_logo_src'] = $footer_logo_src;
        }
        catch(Exception $e)
        {  
            echo "<h3>".$e->getMessage()."</h3>";
        }
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
    
    
    public function getProductParentObject($product) {
        $parent = $product->getParent();
        while ($parent->getType()=='folder' && $parent->getFullPath() != "/Contitech_ConveyorSolution/Products") {
            $parent = $parent->getParent();
        }
        if ($parent->getType() != 'folder' && $parent instanceof DataObject\CSProducts) {
            return $parent;
        } else {
            return null;
        }
    }
}
