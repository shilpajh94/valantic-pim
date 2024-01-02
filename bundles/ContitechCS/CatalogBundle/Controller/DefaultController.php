<?php

namespace ContitechCS\CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use Pimcore\Db;
use \Exception;
use Pimcore\Controller\FrontendController;

class DefaultController extends FrontendController
{
    private $configProviderService;
    private $catalogTemplatingHelper;
    private $imageWidth;
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
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());   
        // try
        // {
            $configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $configProviderService->getDefaultImage('CS_footer_logo');
            
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     return new Response($e->getMessage());
        // }
        
        return $this->render("@ContitechCSCatalog/Default/template_table_of_contents.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_dynamic_table_of_contents")
     */
    public function templateDynamicTableOfContentsAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());   
        // try
        // {
            $configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $configProviderService->getDefaultImage('CS_footer_logo');
            
            $parameterBag['footer_logo_src'] = $footer_logo_src;
    
            $folderId =$this->document->getParent()->getId(); 
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
            foreach($listing as $doc)
            {
                if ($doc->getTemplate() == '@ContitechCSCatalog/Default/template_product_section_page.html.twig')
                {
                    $obj = $doc->getEditable('TOC_Section_Title');
                    if (!empty($obj)) {
                        $sectionPageTitle = $obj->getData();
                    }
                    continue;
                } 
                if (!empty($sectionPageTitle)) {
                    if (in_array($doc->getTemplate(), $templateArray)) {
                        $obj = $doc->getEditable('CS_ProductName');
                        if (!empty($obj) && !empty($obj->getData())) {
                            $all_doc_arr[$sectionPageTitle][] = $obj->getData();
                        } else {
                            $all_doc_arr[$sectionPageTitle][] = $doc->getKey();
                        }
                    }
                }
            }
            $parameterBag['data'] = $all_doc_arr;//$table_of_content_data;     
        // }
        // catch(Exception $e)
        // {  
        //     return new Response($e->getMessage());
        // }

        return $this->render("@ContitechCSCatalog/Default/template_dynamic_table_of_contents.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_page")
     */
    public function templateProductPageAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());   
        // try
        // {  
              
            $regionProperty     = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId                   = $regionProperty->getId();
            $configProviderService      = new ConfigProviderService();
            $footer_logo_src            = $configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObjectEditable = $this->document->getEditable('cbs_template_product_page');
            $productData = [];

            if($catalogTableObjectEditable)
            {
                $catalogTableObject = $catalogTableObjectEditable->getElement();
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
                if (!empty($productObj) && $productObj instanceof DataObject\CSProducts) {
                    $productObj->setGetInheritedValues(true);
                }
                if($productObj && ($productObj->isPublished()) && (empty($productObj->getCSRegion()) || in_array($regionId, $productObj->getCSRegion())))
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
                    
                    $applicationsHtml = '';
                    $CoverCompoundHtml = '';
                    $marketsHtml = '';
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
                        $productTableColumnLimit = $productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit'];
                        $childrenDataChunkArray = array_chunk($childrenData, $productTableColumnLimit);
    
                        if($childrenDataChunkArray)
                        {
                            foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) 
                            {
                                unset($productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit']);
                                $tables = $productDataImportConfig['Common Product Page'][$productKeyName];
                                // unset($tables['Conveyor Belt Data']);
                                // unset($tables['Troughability Minimum Belt Width']);
                                // unset($tables['Minimum Pulley Diameters']);
                                // unset($tables['Elevator Belt Data']);
                                // unset($tables['Maximum Bucket Projection']);
                                // p_r($tables);
                                if($tables)
                                {
                                    foreach ($tables as $tablekey => $MetricImperialFields)
                                    {
                                        $ColumnKeys = $MetricImperialFields['ColumnKeys'];
                                        $CS_Trough_Angle_Label = isset($MetricImperialFields['CS_Trough_Angle_Label']) ? $MetricImperialFields['CS_Trough_Angle_Label']:null;
                                        $CS_Material_Weight_Label = isset($MetricImperialFields['CS_Material_Weight_Label']) ? $MetricImperialFields['CS_Material_Weight_Label']:null;
                                        $CS_Idlers_Label = isset($MetricImperialFields['CS_Idlers_Label']) ? $MetricImperialFields['CS_Idlers_Label']:null;
                                        $CS_Idler_Angle_Label = isset($MetricImperialFields['CS_Idler_Angle_Label']) ? $MetricImperialFields['CS_Idler_Angle_Label']:null;
                                        $CS_Type_Of_Idler_Label = isset($MetricImperialFields['CS_Type_Of_Idler_Label']) ? $MetricImperialFields['CS_Type_Of_Idler_Label']:null;
            
            
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
                                                $KeysGroupLogic = null;
                                                $RemoveKeys = null;
                                                $AdditionalHeaderKey = null;
                                                $AdditionalGroupKey = null;
                                                $ProductNamePrefix = null;
                                                

                                                // unset($KeysGroupLogic);
                                                // unset($RemoveKeys);
                                                // unset($AdditionalHeaderKey);
                                                // unset($AdditionalGroupKey);
                                                // unset($ProductNamePrefix);
                                                // unset($productBrand);
            
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
                                                // p_r($MIValues);
                                                foreach ($MIValues as $key => $value)
                                                {
            
                                                    if(isset($value['groupingTitle']))
                                                    {
                                                        
                                                        $groupingTitleLabel = $this->addPrefix($value['groupingTitle']);
                                                        // p_r($groupingTitleLabel);
                                                        if(isset($groupingTitle[$groupingTitleLabel]))
                                                        {
                                                            $groupingTitle[$groupingTitleLabel] += 1;
                                                        }else{
                                                            $groupingTitle[$groupingTitleLabel] = 1;
                                                        }
                                                        // p_r($groupingTitle);
                                                        
                                                    }
                                                }
                                                // p_r($groupingTitle);
            
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
                                                    $showDecimalPlaces = '';
                                                    $productBrand = null;
                                                    $bricks = $childValue->getProductAttributes();
    
                                                    if($ProductNamePrefix)
                                                    {
                                                        $productBrand = $childValue->getProductNamePrefix();
                                                    }
    
                                                    $data = [];
                                                    
                                                    foreach ($MIValues as $key => $value) {
                                                        $brickName = isset($value['objectType'])? $value['objectType']:null;
                                                        $percentageSymbol = isset($value['percentageSymbol'])? $value['percentageSymbol']:null;
                                                        $showDecimalPlaces = isset($value['showDecimalPlaces'])? $value['showDecimalPlaces']:null;
                                                        $getBrick = 'get' . $brickName;
                                                        $getField = 'get' . $key;
            
                                                        if($brickName == 'class')
                                                        { 
                                                            if($showDecimalPlaces == '')
                                                            {
                                                                $data[$key] = $childValue->$getField();
                                                            }
                                                            else{
                                                                $formattedFieldValue = number_format($childValue->$getField(),3);
                                                                $data[$key] = $formattedFieldValue;
                                                            }
                                                            
                                                        }
                                                        else
                                                        {
                                                            if(method_exists($bricks,$getBrick) && !is_null($bricks->$getBrick()) && method_exists($bricks->$getBrick(),$getField))
                                                            {   
                                                                if($bricks->$getBrick()->$getField())
                                                                {
                                                                    if($showDecimalPlaces == '')
                                                                    {
                                                                        $formattedFieldValue = $bricks->$getBrick()->$getField();
                                                                    }
                                                                    else{
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(),3);
                                                                    }

                                                                    $data[$key] = $formattedFieldValue.$percentageSymbol;
                                                                }
                                                                else
                                                                {
                                                                    if($showDecimalPlaces == '')
                                                                    {
                                                                        $data[$key] = $bricks->$getBrick()->$getField();
                                                                    }
                                                                    else{
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(),3);
                                                                        $data[$key] = $formattedFieldValue;
                                                                    }
                                                                }
                                                            }
                                                            else{
                                                                $data[$key] = '';
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

                                                // Remove blank row 
                                                foreach($tbodyArray as $tableColKey => $tableRow)
                                                {
                                                    if(count(array_filter($tableRow)) <= 1)
                                                    {
                                                        unset($tbodyArray[$tableColKey]);
                                                    }
                                                }

                                                if(!empty($tbodyArray))
                                                {
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
                        }

                        if(isset($productTables['Load Support – Maximum Belt Width Data']) && (count($productTables['Load Support – Maximum Belt Width Data']) > 1))
                        {
                            $singleLoadSupportMaximumBeltWidthData = [];
                            $loadSupportMaximumBeltWidthData = $productTables['Load Support – Maximum Belt Width Data'];

                            foreach ($loadSupportMaximumBeltWidthData as $key => $section) {
                                foreach ($section as $sectionKey => $tableSection) {

                                    foreach ($tableSection as $tableSectionKey => $tableSectionValue) {

                                        if($tableSectionKey == 'tbody')
                                        {
                                            foreach ($tableSection[$tableSectionKey] as $tbodyKey => $value) {
                                                $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey][] = $value;
                                            }
                                        }
                                        else{
                                            $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey] = $tableSectionValue;
                                        }
                                    }
                                }
                            }

                            #Move first imperail then matric
                            if(isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial']))
                            {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'];
                            }

                            if(isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Metric']))
                            {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Metric'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'];
                            }
                            
                            $productTables['Load Support – Maximum Belt Width Data'] = $sortedSingleLoadSupportMaximumBeltWidthData;
                        }

                        $productData['productTables'] = $productTables;
                    }
                }
                $parameterBag['data'] = $productData;
                $parameterBag['footer_logo_src']  = $footer_logo_src;
            }
            // p_r($parameterBag); die;
        // }
        // catch(Exception $e)
        // {   
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }
        return $this->render("@ContitechCSCatalog/Default/template_product_page.html.twig", $parameterBag);
    }

        /**
     * @Route("/contitech_cs_catalog/template_contiAlert_page")
     */
    public function templateContiAlertPageAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId()); 
        // try
        // {       
            $regionProperty     = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId                   = $regionProperty->getId();
            $configProviderService      = new ConfigProviderService();
            $footer_logo_src            = $configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_alert');
            $productData = [];

            if($catalogTableObjectEditable)
            {
                $catalogTableObject = $catalogTableObjectEditable->getElement();
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
                if (!empty($productObj) && $productObj instanceof DataObject\CSProducts) {
                    $productObj->setGetInheritedValues(true);
                }
                if($productObj && ($productObj->isPublished()) && (empty($productObj->getCSRegion()) || in_array($regionId, $productObj->getCSRegion())))
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
                        $productTableColumnLimit = $productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit'];
                        $childrenDataChunkArray = array_chunk($childrenData, $productTableColumnLimit);
    
                        if($childrenDataChunkArray)
                        {
                            foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) 
                            {
                                unset($productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit']);
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
                                                    $showDecimalPlaces = '';
                                                    $bricks = $childValue->getProductAttributes();
    
                                                    if($ProductNamePrefix)
                                                    {
                                                        $productBrand = $childValue->getProductNamePrefix();
                                                    }
    
                                                    $data = [];
                                                    
                                                    foreach ($MIValues as $key => $value) {
                                                        $brickName = $value['objectType'];
                                                        $percentageSymbol = $value['percentageSymbol'];
                                                        $showDecimalPlaces = $value['showDecimalPlaces'];
                                                        $getBrick = 'get' . $brickName;
                                                        $getField = 'get' . $key;
            
                                                        if($brickName == 'class')
                                                        { 
                                                            if($showDecimalPlaces == '')
                                                            {
                                                                $data[$key] = $childValue->$getField();
                                                            }
                                                            else{
                                                                $formattedFieldValue = number_format($childValue->$getField(),3);
                                                                $data[$key] = $formattedFieldValue;
                                                            }
                                                            
                                                        }
                                                        else
                                                        {
                                                            if(method_exists($bricks,$getBrick) && method_exists($bricks->$getBrick(),$getField))
                                                            {   
                                                                if($bricks->$getBrick()->$getField())
                                                                {
                                                                    if($showDecimalPlaces == '')
                                                                    {
                                                                        $formattedFieldValue = $bricks->$getBrick()->$getField();
                                                                    }
                                                                    else{
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(),3);
                                                                    }

                                                                    $data[$key] = $formattedFieldValue.$percentageSymbol;
                                                                }
                                                                else
                                                                {
                                                                    if($showDecimalPlaces == '')
                                                                    {
                                                                        $data[$key] = $bricks->$getBrick()->$getField();
                                                                    }
                                                                    else{
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(),3);
                                                                        $data[$key] = $formattedFieldValue;
                                                                    }
                                                                }
                                                            }
                                                            else{
                                                                $data[$key] = '';
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

                                                // Remove blank row 
                                                foreach($tbodyArray as $tableColKey => $tableRow)
                                                {
                                                    if(count(array_filter($tableRow)) <= 1)
                                                    {
                                                        unset($tbodyArray[$tableColKey]);
                                                    }
                                                }

                                                if(!empty($tbodyArray))
                                                {
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
                        }

                        if(isset($productTables['Load Support – Maximum Belt Width Data']) && (count($productTables['Load Support – Maximum Belt Width Data']) > 1))
                        {
                            $singleLoadSupportMaximumBeltWidthData = [];
                            $loadSupportMaximumBeltWidthData = $productTables['Load Support – Maximum Belt Width Data'];

                            foreach ($loadSupportMaximumBeltWidthData as $key => $section) {
                                foreach ($section as $sectionKey => $tableSection) {

                                    foreach ($tableSection as $tableSectionKey => $tableSectionValue) {

                                        if($tableSectionKey == 'tbody')
                                        {
                                            foreach ($tableSection[$tableSectionKey] as $tbodyKey => $value) {
                                                $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey][] = $value;
                                            }
                                        }
                                        else{
                                            $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey] = $tableSectionValue;
                                        }
                                    }
                                }
                            }

                            #Move first imperail then matric
                            if(isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial']))
                            {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'];
                            }

                            if(isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Metric']))
                            {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Metric'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'];
                            }
                            
                            $productTables['Load Support – Maximum Belt Width Data'] = $sortedSingleLoadSupportMaximumBeltWidthData;
                        }

                        $productData['productTables'] = $productTables;
                    }
                }
                $parameterBag['data'] = $productData;
                $parameterBag['footer_logo_src']  = $footer_logo_src;
            }
        // }
        // catch(Exception $e)
        // {   
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }

        return $this->render("@ContitechCSCatalog/Default/template_contialert_product_page.html.twig", $parameterBag);
    }


    /**
     * @Route("/contitech_cs_catalog/template_transconti_product_page")
     */
    public function templateTranscontiProductPageAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId()); 
        // try
        // {       
            $regionProperty     = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId                   = $regionProperty->getId();
            $configProviderService      = new ConfigProviderService();
            $footer_logo_src            = $configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObjectEditable = $this->document->getEditable('cbs_template_transconti_product_page');
            $productData = [];

            if($catalogTableObjectEditable)
            {
                $catalogTableObject = $catalogTableObjectEditable->getElement();
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
                if (!empty($productObj) && $productObj instanceof DataObject\CSProducts) {
                    $productObj->setGetInheritedValues(true);
                }
                if($productObj && ($productObj->isPublished()) && (empty($productObj->getCSRegion()) || in_array($regionId, $productObj->getCSRegion())))
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
                    $productData['ShortText'] = $productObj->getShortText();
    
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

                    if(method_exists($productObj,'getCSProductFeaturesAndBenefits') && $productObj->getCSProductFeaturesAndBenefits())
                    {
                        foreach ($productObj->getCSProductFeaturesAndBenefits() as $key => $value)
                        {
                            if(trim($value->getFeatureName()))
                            {
                                $feature['FeatureName'] = $value->getFeatureName();
                                $feature['FeatureDescription'] = $value->getFeatureDescription();
                                $feature['FeatureImage'] = $value->getFeatureImage();

                                $FeaturesAndBenefits[] = $feature;

                            }
                        }
                    }
    
                    $productData['FeaturesAndBenefits'] = $FeaturesAndBenefits;
    
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
                        $productTableColumnLimit = $productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit'];
                        $childrenDataChunkArray = array_chunk($childrenData, $productTableColumnLimit);
    
                        if($childrenDataChunkArray)
                        {
                            foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) 
                            {
                                unset($productDataImportConfig['Common Product Page'][$productKeyName]['Product_Table_Column_Limit']);
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
                                                    $showDecimalPlaces = '';
                                                    $bricks = $childValue->getProductAttributes();
    
                                                    if($ProductNamePrefix)
                                                    {
                                                        $productBrand = $childValue->getProductNamePrefix();
                                                    }
    
                                                    $data = [];
                                                    
                                                    foreach ($MIValues as $key => $value) {
                                                        $brickName = $value['objectType'];
                                                        $percentageSymbol = $value['percentageSymbol'];
                                                        $showDecimalPlaces = $value['showDecimalPlaces'];
                                                        $getBrick = 'get' . $brickName;
                                                        $getField = 'get' . $key;
            
                                                        if($brickName == 'class')
                                                        { 
                                                            if($showDecimalPlaces == '')
                                                            {
                                                                $data[$key] = $childValue->$getField();
                                                            }
                                                            else{
                                                                $formattedFieldValue = number_format($childValue->$getField(),3);
                                                                $data[$key] = $formattedFieldValue;
                                                            }
                                                            
                                                        }
                                                        else
                                                        {
                                                            if(method_exists($bricks,$getBrick) && method_exists($bricks->$getBrick(),$getField))
                                                            {   
                                                                if($bricks->$getBrick()->$getField())
                                                                {
                                                                    if($showDecimalPlaces == '')
                                                                    {
                                                                        $formattedFieldValue = $bricks->$getBrick()->$getField();
                                                                    }
                                                                    else{
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(),3);
                                                                    }

                                                                    $data[$key] = $formattedFieldValue.$percentageSymbol;
                                                                }
                                                                else
                                                                {
                                                                    if($showDecimalPlaces == '')
                                                                    {
                                                                        $data[$key] = $bricks->$getBrick()->$getField();
                                                                    }
                                                                    else{
                                                                        $formattedFieldValue = number_format($bricks->$getBrick()->$getField(),3);
                                                                        $data[$key] = $formattedFieldValue;
                                                                    }
                                                                }
                                                            }
                                                            else{
                                                                $data[$key] = '';
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

                                                // Remove blank row 
                                                foreach($tbodyArray as $tableColKey => $tableRow)
                                                {
                                                    if(count(array_filter($tableRow)) <= 1)
                                                    {
                                                        unset($tbodyArray[$tableColKey]);
                                                    }
                                                }

                                                if(!empty($tbodyArray))
                                                {
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
                        }

                        if(isset($productTables['Load Support – Maximum Belt Width Data']) && (count($productTables['Load Support – Maximum Belt Width Data']) > 1))
                        {
                            $singleLoadSupportMaximumBeltWidthData = [];
                            $loadSupportMaximumBeltWidthData = $productTables['Load Support – Maximum Belt Width Data'];

                            foreach ($loadSupportMaximumBeltWidthData as $key => $section) {
                                foreach ($section as $sectionKey => $tableSection) {

                                    foreach ($tableSection as $tableSectionKey => $tableSectionValue) {

                                        if($tableSectionKey == 'tbody')
                                        {
                                            foreach ($tableSection[$tableSectionKey] as $tbodyKey => $value) {
                                                $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey][] = $value;
                                            }
                                        }
                                        else{
                                            $singleLoadSupportMaximumBeltWidthData[0][$sectionKey][$tableSectionKey] = $tableSectionValue;
                                        }
                                    }
                                }
                            }

                            #Move first imperail then matric
                            if(isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial']))
                            {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Imperial'];
                            }

                            if(isset($singleLoadSupportMaximumBeltWidthData[0]['CS_Metric']))
                            {
                                $sortedSingleLoadSupportMaximumBeltWidthData[0]['CS_Metric'] = $singleLoadSupportMaximumBeltWidthData[0]['CS_Metric'];
                            }
                            
                            $productTables['Load Support – Maximum Belt Width Data'] = $sortedSingleLoadSupportMaximumBeltWidthData;
                        }

                        $productData['productTables'] = $productTables;
                    }
                }
                $parameterBag['data'] = $productData;
                $parameterBag['footer_logo_src']  = $footer_logo_src;
            }
        // }
        // catch(Exception $e)
        // {   
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }

        return $this->render("@ContitechCSCatalog/Default/template_transConti_page.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_cover_compounds")
     */
    public function templateCoverCompoundsAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {   
            $regionProperty = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            $configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObjectEditable = $this->document->getEditable('cbs_template_cover_compound_page');
            $productData = [];
            if($catalogTableObjectEditable)
            {
                $catalogTableObject = $catalogTableObjectEditable->getElement();
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
    
                            // $label4Childs = $this->getAllRegionChildern($objectLevel3rd, $regionId);
                            
                        }
                    }
                    $label4ChildsEditable = $this->document->getEditable('coverCompoundTableObjects');
                    if($label4ChildsEditable)
                    {
                        $label4Childs = $label4ChildsEditable->getElements();
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
                                            if(!in_array($this->addPrefix($key), $coverCompoundsHeaderKeys))
                                            {
                                                $coverCompoundsHeaderKeys[] = $this->addPrefix($key);
                                            }
                                            if($bricks->$getBrick())
                                            {
                                                if($key == 'MinTemperatureF'){
                                                    $minTemperatureFValue = $bricks->$getBrick()->$getField();
                                                    $minTemperatureCValue = $bricks->$getBrick()->getMinTemperatureC();
                                                    if($minTemperatureFValue){
                                                        $minTemperatureFValue = $minTemperatureFValue . '°F <br>';
                                                    }
                                                    if($minTemperatureCValue){
                                                        $minTemperatureCValue = '('.$minTemperatureCValue . '°C'.')';
                                                    }
                                                    $coverCompounds[$coverCompoundName][$level4Key][] = $minTemperatureFValue . $minTemperatureCValue;
                                                }elseif($key == 'MaxTemperatureF'){
                                                    $maxTemperatureFValue = $bricks->$getBrick()->$getField();
                                                    $maxTemperatureCValue = $bricks->$getBrick()->getMaxTemperatureC();
                                                    if($maxTemperatureFValue){
                                                        $maxTemperatureFValue = $maxTemperatureFValue . '°F <br>';
                                                    }
                                                    if($maxTemperatureCValue){
                                                        $minTemperatureCValue = '('.$maxTemperatureCValue . '°C'.')';
                                                    }
                                                    $coverCompounds[$coverCompoundName][$level4Key][] = $maxTemperatureFValue . $minTemperatureCValue;
                                                }
                                                else{
                                                    $coverCompounds[$coverCompoundName][$level4Key][] = $bricks->$getBrick()->$getField();
                                                }
                                            }
                                            else{
                                                $coverCompounds[$coverCompoundName][$level4Key][] = '';
                                            }
                                        
                                        }
                                        // $onlyOnce = true;
                                    }
                                }
                                
                            }
                        }
                    }

                    $productApplicationObjectEditable = $this->document->getEditable('objectPaths');
                    if($productApplicationObjectEditable)
                    {
                        $productApplicationObject = $productApplicationObjectEditable->getElements();
                        foreach($productApplicationObject as $childObj){
                            $coverCompoundProducts = $childObj->getName();

                            if($childObj->getCSProductApplications())
                            {
                                foreach ($childObj->getCSProductApplications() as $key => $application) {
                                    
                                    $applicationData[$application->getApplicationName()] = $application->getApplicationName();
                                    $level4Data[$coverCompoundProducts][] = $application->getApplicationName();

                                }
                            }

                        }
                    }

                    $CCAARows = [];
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

            $parameterBag['data']                 = $productData;
            $parameterBag['HierarchyNameLevel2']  = $coverCompoundData['HierarchyNameLevel2'];
            $parameterBag['footer_logo_src']      = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }
        return $this->render("@ContitechCSCatalog/Default/template_cover_compounds.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_section_page")
     */
    public function templateProductSectionPageAction(Request $request)
    {
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        return $this->render("@ContitechCSCatalog/Default/template_product_section_page.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_cleated_belt_page")
     */
    public function templateCleatedBeltsAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {   
            $regionProperty = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId   = $regionProperty->getId();
            $region     = $regionProperty->getRegionName();
            $this->configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObjectEditable = $this->document->getEditable('cbs_template_cleated_belts_page');
            $productData    = [];
            $displayTablesFlag  = false;
            if($catalogTableObjectEditable)
            {   
                $catalogTableObject = $catalogTableObjectEditable->getElement();
                $selectedProduct = $catalogTableObject->getProducts();
    
                $productId = $selectedProduct[0];
    
                $productDetails = DataObject\CSProducts::getById($productId);
                if (!empty($productDetails) && $productDetails instanceof DataObject\CSProducts) {
                    $productDetails->setGetInheritedValues(true);
                }
                if(!empty($productDetails) && ($productDetails->isPublished()) && (empty($productDetails->getCSRegion()) || in_array($regionId, $productDetails->getCSRegion())))
                {
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
                        if($children)
                        {
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

                    if($productChildrenData)
                    {
                        foreach ($productChildrenData as $child) {

                            $data1 = [];
                            $normalContiData = [];
                            $data1['Name'] = $child->getName();
                            $data1['ProductImage'] = $child->getProductImage();

                            $normalContiData['Name'] = $child->getName();
                            $normalContiData['ShortText'] = $child->getShortText();
                            $normalContiData['ProductImage'] = $child->getProductImage();
                            $normalContiData['ApplicationImage'] = $child->getApplicationImage();

                            if(method_exists($child->getProductAttributes(),'getMaterial'))
                            {
                                $materialBrick = $child->getProductAttributes()->getMaterial();
                                $cleatHeightInch = $materialBrick->getCleatHeightInch();
                                if($cleatHeightInch)
                                {
                                    $normalContiData['CS_CleatHeightInch'] = 'CS_CleatHeightInch';
                                    $normalContiData['CS_CleatHeightInchVal'] = $cleatHeightInch;
                                }
                            }

                            if(method_exists($child->getProductAttributes(),'getProdDimensions'))
                            {
                                $prodDimensions = $child->getProductAttributes()->getProdDimensions();
                                if($prodDimensions)
                                {
                                    if($prodDimensions->getAvailableBeltPatternWidthBlock())
                                    {
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
                                                if($availablePatternWidthMasterList[$value]['AvailablePatternWidthText'])
                                                {
                                                    $data[] = $availablePatternWidthMasterList[$value]['AvailablePatternWidthText'];
                                                }
                                                else
                                                {
                                                    $data[] = $availablePatternWidthMasterList[$value]['AvailableProfilePatternWidthsInch'];
                                                }
                                            }
                                            $blocklistInch[] = $data;
                                        }

                                        if($availableBeltWidthList)
                                        {
                                            $normalContiData['CS_AvailableBeltWidthInch'] = 'CS_AvailableBeltWidthInch';
                                            $normalContiData['CS_AvailableBeltWidthInchList'] = $availableBeltWidthList;
                                            $maxColumnLenth = count($availableBeltWidthList) > 1 ? count($availableBeltWidthList) : 1;
                                            $normalContiData['maxColumnLenth'] = $maxColumnLenth;
                                            $normalContiData['maxRowLength'] = $maxRowLength;
                                        }

                                        $totalRows = [];
                                        for ($i=0; $i < $maxRowLength; $i++) { 
                                            for ($j=0; $j < $maxColumnLenth; $j++) { 
                                                $totalRows[$i][$j] = isset($blocklistInch[$j][$i]) ? $blocklistInch[$j][$i] : ''; 
                                            }
                                        }

                                        $normalContiData['CS_AvailableProfilePatternWidthsInch'] = $totalRows;
                                    }
                                }
                            }

                            $normalProductsChildDetails[] = $normalContiData;
                            $cleatedProducts[] = $data1;
                        }
                    }

                    $normalProductsDetails['childData'] = $normalProductsChildDetails;

                    if($contiRollChildProducts)
                    {
                        $contiRollChildSortedProducts =[];

                        foreach($contiRollChildProducts as $nc)
                        {
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
                            if(method_exists($child->getProductAttributes(),'getProdDimensions'))
                            {
                                $prodDimensions = $child->getProductAttributes()->getProdDimensions();
                                $WidthLength = $child->getProductAttributes()->getWidthLength();

                                $profileWidthMM = $WidthLength->getProfileWidthMM();
                                $contiData['CS_profileWidthMm']= $profileWidthMM;

                                if($prodDimensions)
                                {
                                    if($prodDimensions->getAvailableBeltPatternWidthBlock())
                                    {
                                        $block = $prodDimensions->getAvailableBeltPatternWidthBlock();
                                        $blocklist = $block[0]['availablePatternWidthInch']->getData();

                                        foreach ($blocklist as $key => $value) {
                                            $blocklistInch[] = $availablePatternWidthMasterList[$value]['AvailableProfilePatternWidthsInch'];
                                            $blocklistMm[] = $availablePatternWidthMasterList[$value]['AvailableProfilePatternWidthsMM'];
                                        }

                                        if($blocklistInch || $blocklistMm)
                                        {
                                            $contiData['CS_profileWidth'] = 'CS_profileWidth';
                                            $contiData['CS_profileWidthInch'] = implode(' & ', $blocklistInch);
                                           // $contiData['CS_profileWidthMm'] = implode('/', $blocklistMm);
                                        }
                                    }

                                    // $beltWidthRangeInch = $prodDimensions->getAvailableBeltWidthRangeInch();
                                    // $beltWidthRangeMm = $prodDimensions->getAvailableBeltWidthRangeMm();

                                    $beltWidthRangeInch = $prodDimensions->getBeltWidthRangeInch();
                                    $beltWidthRangeMm = $prodDimensions->getBeltWidthRangeMM();

                                    
                                    if($beltWidthRangeInch || $beltWidthRangeMm)
                                    {
                                        $contiData['CS_beltWidthRange'] = 'CS_beltWidthRange';
                                        $contiData['CS_beltWidthRangeInch'] = $beltWidthRangeInch;
                                        $contiData['CS_beltWidthRangeMm'] = $beltWidthRangeMm;
                                    }
                                    
                                }
                            }

                            if(method_exists($child->getProductAttributes(),'getBeltData'))
                            {
                                $beltData = $child->getProductAttributes()->getBeltData();
                                $additionalInformation = $beltData->getAdditionalInformation();
                                if($additionalInformation)
                                {
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
                    
                    if(isset($ymlData['cleated_belts_table_display_in_region']['regionName']) && ($ymlData['cleated_belts_table_display_in_region']['regionName'] === $region))
                    {
                        $displayTablesFlag = true;
                    }
                }
            }

            $parameterBag['data']             = $productData;
            $parameterBag['displayTablesFlag']    = $displayTablesFlag;
            $parameterBag['footer_logo_src']  = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }

        return $this->render("@ContitechCSCatalog/Default/template_cleated_belts.html.twig", $parameterBag);
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
            $filterArrayData = [];
            $productObject->setGetInheritedValues(true);
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
        return $this->render('@ContitechCSCatalog/Default/container.html.twig',$parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_continental_conveyor_services")
    */
    public function templateContinentalConveyorServicesAction(Request $request)
    {       
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId                       = $regionProperty->getId();
            $this->configProviderService    = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $default_image = $this->configProviderService->getDefaultImage();
        
            $catalogCategoryObjectEditable = $this->document->getEditable('cbs_template_belt_services_page');
    
            $productNameArr = [];
    
            if($catalogCategoryObjectEditable)
            {
                $catalogCategoryObject = $catalogCategoryObjectEditable->getElement();
                $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();
    
                $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);
                
                if($hierarchyObj)
                {
                    $hierarchyPath = $hierarchyObj->getPath();
                    $hierarchyName = $hierarchyObj->getKey();
        
                    $hierarchyFullName = $hierarchyPath.$hierarchyName;
                    $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);
        
                    $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
                    if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                        $productObject->setGetInheritedValues(true);
                    }
                    if (!empty($productObject) && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())))
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
                        $productNameArr['childrenData'] = $childrenData;
                    }

                }
                
            }
    
            $parameterBag['data'] = $productNameArr;
            $parameterBag['footer_logo_src']  = $footer_logo_src;
            $parameterBag['default_image']    = $default_image;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }

        return $this->render('@ContitechCSCatalog/Default/template_continental_conveyor_services.html.twig',$parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_protect_systems")
    */
    public function templateContiProtectSystemsAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');

            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_protect_systems');
    
            $this->configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $productData = [];
            if($catalogTableObjectEditable)
            {   
                $catalogTableObject = $catalogTableObjectEditable->getElement();
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];
                
                $productObject = DataObject\CSProducts::getById($singleProduct);
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                
                if(!empty($productObject) && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())))
                {
                    $productData['Name'] = $productObject->getName();
                    $productData['ShortText'] = $productObject->getLongText();
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
                            $data['ShortText'] = $childValue->getProductDescription();
            
                            $childrenData[] = $data;
                            unset($data);
                        }
                    }
        
                    $productData['childrenData'] = $childrenData;
        
                    $parameterBag['monitoring_system'] = $this->getContiProtectFeatures($productObject);
                }
            }
    
            $parameterBag['data'] = $productData;
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }
        
        return $this->render("@ContitechCSCatalog/Default/template_conti_protect_systems.html.twig", $parameterBag);
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_inspect_systems")
    */
    public function templateContiInspectSystemsAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_inspect_systems');
            $productData = [];
            if($catalogTableObjectEditable)
            {
                $catalogTableObject = $catalogTableObjectEditable->getElement();
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];
                $productObject = DataObject\CSProducts::getById($singleProduct);
                
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                
                if($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())))
                {
                    $parentParentObj    =   $this->getProductParentObject($productObject); //$productObj->getParent();
    
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
        
                    if($childObject)
                    {
                        foreach ($childObject as $childValue) {
                            if(trim($childValue->getName()))
                            {
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
    
            $parameterBag['data'] = $productData;
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }

        $parameterBag['footer_logo_src'] = $footer_logo_src;
        return $this->render("@ContitechCSCatalog/Default/template_conti_inspect_systems.html.twig", $parameterBag);
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_mega_pipe_belt")
    */
    public function templateMegaPipeBeltAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $catalogTableObjectEditable = $this->document->getEditable('cbs_mega_pipe_belt');
            $productData = [];
            if($catalogTableObjectEditable)
            { 
                $catalogTableObject = $catalogTableObjectEditable->getElement();
                $selectedProduct = $catalogTableObject->getProducts();
                $singleProduct = $selectedProduct[0];
                $productObject = DataObject\CSProducts::getById($singleProduct);
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                if($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())))
                {
                    $objParent = DataObject\CSProducts::getById($productObject->getParentId());
        
                    $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';
        
                    $productData['Name'] = $productObject->getName();
                    $productData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                    $productData['ShortText'] = $productObject->getShortText();
                    $productData['ProductImage'] = $productObject->getProductImage();
                    
                    $productData['Features'] = $this->getSybercordTechnologyFeature($productObject);
        
                    $productData['CSProductFeaturesAndBenefits'] = $productObject->getCSProductFeaturesAndBenefits();
                    $productData['HierarchyNameLevel1'] = 'Conveying Solutions';
                }
    
                
            }
            
            $parameterBag['data'] = $productData;
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }

        return $this->render("@ContitechCSCatalog/Default/template_mega_pipe_belt.html.twig", $parameterBag);
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_conti_pipe_belt")
     */
    public function templateContiPipeBeltAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_pipe_belt');
            $productData = [];
            
            if($catalogTableObjectEditable)
            {
                $catalogTableObject = $catalogTableObjectEditable->getElement();
                $selectedProduct    = $catalogTableObject->getProducts();
                $singleProduct      = isset($selectedProduct[0])?$selectedProduct[0]:'';
    
                $singleProductObj = DataObject\CSProducts::getById($singleProduct);
                if (!empty($singleProductObj) && $singleProductObj instanceof DataObject\CSProducts) {
                    $singleProductObj->setGetInheritedValues(true);
                }
                
                if($singleProductObj && ($singleProductObj->isPublished()) && (empty($singleProductObj->getCSRegion()) || in_array($regionId, $singleProductObj->getCSRegion())))
                {
                    $childProductData['Name'] = $singleProductObj->getName();
                    $childProductData['ProductClaimSlogan'] = $singleProductObj->getProductClaimSlogan();
                    $childProductData['ShortText'] = $singleProductObj->getShortText();
                    $childProductData['ProductImage'] = $singleProductObj->getProductImage();
                    $childProductData['productSpecificData'] = $this->prepareContiPipeAndMegaPipeAttributes($singleProductObj, $regionId);
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
                    $productData['childProductData'] = $childProductData;
                }
    
                
                
                // $productObject = [];

                // if(method_exists($singleProductObj,'getParent'))
                // {
                //     $productObject = $singleProductObj->getParent();
                // }
                
                $productObject    =   $this->getProductParentObject($singleProductObj); //$productObj->getParent();
                if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                    $productObject->setGetInheritedValues(true);
                }
                if($productObject && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())) )
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
                    $productData['parentProductData'] = $parentProductData;
                }
            }
            
            $parameterBag['data'] = $productData;
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }

        $parameterBag['footer_logo_src'] = $footer_logo_src;
        return $this->render("@ContitechCSCatalog/Default/template_conti_pipe_belt.html.twig", $parameterBag);
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
            $data = [];
            
    
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
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            
            $catalogCategoryObjectEditable = $this->document->getEditable('cbs_template_textile_belt_services_page');
    
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $productNameArr = [];
    
            if ($catalogCategoryObjectEditable)
            {
                $catalogCategoryObject = $catalogCategoryObjectEditable->getElement();
                $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();
    
                $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);
                
                if($hierarchyObj)
                {
                    $hierarchyPath = $hierarchyObj->getPath();
                    $hierarchyKeyName = $hierarchyObj->getKey();
        
                    $hierarchyFullName = $hierarchyPath.$hierarchyKeyName;
                    $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);
        
                    $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
                    if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                        $productObject->setGetInheritedValues(true);
                    }
                    if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())) ) {
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
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     throw new Exception($e->getMessage());
        // }

        
        return $this->render("@ContitechCSCatalog/Default/template_textile_belt_construction.html.twig", $parameterBag);
    }
    
    public function templateSteelcordBeltConstructionAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            
            $this->configProviderService = new ConfigProviderService();
            
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $catalogCategoryObjectEditable = $this->document->getEditable('cbs_template_steelcord_belt_construction_page');
    
            $productNameArr = [];
    
            if($catalogCategoryObjectEditable)
            {
                $catalogCategoryObject = $catalogCategoryObjectEditable->getElement();
                $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();
    
                $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

                if($hierarchyObj)
                {
                    $hierarchyPath = $hierarchyObj->getPath();
                    $hierarchyName = $hierarchyObj->getKey();
        
                    $hierarchyFullName = $hierarchyPath.$hierarchyName;
                    $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);
        
                    $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
                    if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                        $productObject->setGetInheritedValues(true);
                    }
                    if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())) )
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
            $parameterBag['data'] = $productNameArr;
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     throw new Exception($e->getMessage());
        // }   

        
        return $this->render("@ContitechCSCatalog/Default/template_steelcord_belt_construction.html.twig", $parameterBag);
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_sybercord_technology")
    */
    public function templateSybercordTechnologyAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            
            $this->configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
    
            $catalogTableObjectEditable = $this->document->getEditable('cbs_template_sybercord_technology_construction_page');
    
            $productNameArr = [];
    
            if($catalogTableObjectEditable)
            {   
                $catalogTableObject = $catalogTableObjectEditable->getElement();
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
                    if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                        $productObject->setGetInheritedValues(true);
                    }
                    if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())) ) {
                        $parentParentObj    =   $this->getProductParentObject($productObject); //$productObj->getParent();
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
            }
            $parameterBag['data'] = $productNameArr;
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }
        return $this->render("@ContitechCSCatalog/Default/template_sybercord_technology.html.twig", $parameterBag);
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
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        return $this->render("@ContitechCSCatalog/Default/template_conveyor_belt_group.html.twig", $parameterBag);
    }

    public function templateContiCleanAction(Request $request)
    {   
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $regionProperty = $this->document->getProperty('region');
            
            if(!$regionProperty)
                Throw new Exception('Unable to find region');

            $regionId = $regionProperty->getId();
            
            $catalogTableObjectEditable = $this->document->getEditable('cbs_conti_clean');
    
            $this->configProviderService = new ConfigProviderService();
        
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
            
            $productData = [];
            if($catalogTableObjectEditable)
            {
                $catalogTableObject = $catalogTableObjectEditable->getElement();
                $selectedProduct = $catalogTableObject->getProducts();
                if($selectedProduct)
                {
                    $singleProduct = $selectedProduct[0];
                    $productObject = DataObject\CSProducts::getById($singleProduct);
                    if (!empty($productObject) && $productObject instanceof DataObject\CSProducts) {
                        $productObject->setGetInheritedValues(true);
                    }
                    if ($productObject  && ($productObject->isPublished()) && (empty($productObject->getCSRegion()) || in_array($regionId, $productObject->getCSRegion())) )
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
    
            $parameterBag['data'] = $productData;
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }

        return $this->render("@ContitechCSCatalog/Default/template_contiClean.html.twig", $parameterBag);
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
    private function getContiProtectFeatures($productObject)
    {   
        try
        {
            $benefits = [];
            if(method_exists($productObject,'getFeatureBlock') && $productObject->getFeatureBlock())
            {
                foreach($productObject->getFeatureBlock() as $obj)
                {
                    $benefits[] = $obj['Feature']->getData();
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
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());
        // try
        // {
            $this->configProviderService = new ConfigProviderService();
    
            $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
    
        //     $this->view['footer_logo_src'] = $footer_logo_src;
        // }
        // catch(Exception $e)
        // {  
        //     echo "<h3>".$e->getMessage()."</h3>";
        // }
        $parameterBag['footer_logo_src'] = $footer_logo_src;
        return $this->render("@ContitechCSCatalog/Default/templates_with_bricks.html.twig", $parameterBag);
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

    public function getRequestedParameter(Request $request, $documentId): array
    {
        $parameterBag = [];
        // foreach ($request->attributes as $key => $value) {
        //     $parameterBag[$key] = $value;
        // }
        $parameterBag['printermarks'] = $request->get('printermarks');

        $imageWidth = null;
        $imageRecompression = null;
        $printConfigFile = \Pimcore\Web2Print\Processor::getJobConfigFile($documentId);
        if(file_exists($printConfigFile)){
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode( $printConfigFileContent,true);
            $imageRecompression = $printConfig['config']['Image Quality'];
            $imageWidth = $printConfig['config']['Image Width'];
        }
        $this->imageWidth = $imageWidth;
        $parameterBag['imageQuality'] = $imageRecompression;
        $parameterBag['imageWidth'] = $imageWidth;

        return $parameterBag;
    }
}
