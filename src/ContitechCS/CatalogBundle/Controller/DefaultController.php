<?php

namespace ContitechCS\CatalogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use S3CustomizationBundle\Lib\Utils;
use ContitechCS\ImportBundle\Services\ImportConstants;
use Pimcore\Db;

class DefaultController extends FrontendController
{
    private $configProviderService;
    private $db;

    public function __construct() {
        $this->db = Db::get();
    }

    /**
     * @Route("/contitech_cs_catalog")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from contitech_cs_catalog');
    }

    /**
     * @Route("/contitech_cs_catalog/get-products")
     */
    public function getCategoryProducts(Request $request) {


        $id = $request->get('catId');
        $categoryObj = DataObject\CSCatalogCategory::getById($id);

        $hierarchyId = ($categoryObj->getSecondLevelCategory());
        $res['data'] = [];
        if($hierarchyId)
        {

            $hierarchyObj = DataObject\CSHierarchy::getById($hierarchyId);
            $hierarchyPath = $hierarchyObj->getPath();
            $hierarchyName = $hierarchyObj->getName();

            $hierarchyFullName = $hierarchyPath.$hierarchyName;
            $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

            $HierarchyProductPath = DataObject\CSProducts::getByPath($productHierarchyPath);

            if($HierarchyProductPath)
            {
                $productsList = new DataObject\CSProducts\Listing();
                $productsList->addConditionParam("o_parentId = ?", [$HierarchyProductPath->getId()]);
                $productsList = $productsList->load();
            }

            if($productsList)
            {
                foreach ($productsList as $cat) {
                    $result[] = array('text' => trim($cat->getName()), 'id' => trim($cat->getId()));
                }
            }
            $res['data'] = $result;
        }
        echo json_encode(['data' => $res['data']]);
        die;
    }

    /**
     * @Route("/contitech_cs_catalog/get-products-tables")
     */
    public function getCategoryProductTables(Request $request) {

        $res['data'] = [];
        $product = $request->get('product');

        $this->configProviderService = new ConfigProviderService();
        $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();

        if(isset($productDataImportConfig['Common Product Page'][$product]))
        {
            foreach ($productDataImportConfig[$product] as $table => $value) {
                $result[] = array('id' => trim($table), 'text' => trim($table));
            }
            $res['data'] = $result;
        }

        echo json_encode(['data' => $res['data']]);
        die;
    }

    /**
     * @Route("/contitech_cs_catalog/get-hierarchy")
     */
    public function getHierarchy(Request $request) {

        $catId = $request->get('catId');

        $categoryList = new DataObject\CSHierarchy\Listing();
        $categoryList->addConditionParam("Level = ?", ["Level 2"], 'AND');
        $categoryList->setCondition("o_parentId = ?", $catId);
        $categoryList = $categoryList->load();

        foreach ($categoryList as $cat) {
            $result[] = array('key' => $cat->getName(), 'value' => $cat->getId());
        }

        echo json_encode(['data' => $result]);
        die;
    }

    /**
     * @Route("/contitech_cs_catalog/template_table_of_contents")
     */
    public function templateTableOfContentsAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        
        $this->view['footer_logo_src'] = $footer_logo_src;

        $listing = new \Pimcore\Model\Document\Listing(); 
        $listing->setCondition("parentId = 214");
        $listing->load();
      //  p_r(count($listing));die;
       $all_doc_arr = [];
       $section_arr = [];
        foreach($listing as $doc) {
            
            if ($doc->getTemplate() == 'ContitechCSCatalogBundle:Default:template_product_section_page.html.php') {

                $obj = $doc->getElement('TOC_Section_Title');
                $section_arr [] = $obj->getData();
            } else{ 
                $obj = $doc->getElement('CS_ProductName');
                p_r( $obj);
                if ($obj) {
                $all_doc_arr[] = $obj->getData();
                }

            }        
        }
        dump($all_doc_arr);
        dump($section_arr);
        die;
        
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_page")
     */
    public function templateProductPageAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_product_page')->getElement();
        $productData = [];
        if($catalogTableObject)
        {
            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();

            $catalogCategoryObjectId = $catalogTableObject->getParentId();
            $categoryObj = DataObject\CSCatalogCategory::getById($catalogCategoryObjectId);

            $selectedProduct = $catalogTableObject->getProducts();
            $productObj = null;


            $productNameArr = [];
            if($selectedProduct){
                foreach ($selectedProduct as $key => $singleProduct) {

                    $productObject      = DataObject\CSProducts::getById($singleProduct);
                    $productNameArr[]   = trim($productObject->getName());

                    if(!$productObj)
                    {
                        $productObj = $productObject;
                    }
                }
            }

            $productNameTitle   = implode(' and ', $productNameArr);
            $productName        =  trim($productObj->getName());

            if($productObj) ///isset variable is assigned a value or not null
            {
                $hierarchyId = $categoryObj->getSecondLevelCategory();
                if($hierarchyId)
                {
                    $hierarchyObj = DataObject\CSHierarchy::getById($hierarchyId);
                }

                $productData['HierarchyNameLevel2'] = $hierarchyObj->getName();
                $productData['ProductName'] = $productNameTitle;
                $productData['ProductClaimSlogan'] = $productObj->getProductClaimSlogan();
                $productData['ShortText'] = $productObj->getShortText();
                $productData['LongText'] = $productObj->getLongText();
                $productData['LogoImage'] = $productObj->getLogoImage();
                $productData['Features'] = $productObj->getFeatures();
                $productData['Benefits'] = $productObj->getBenefits();

                if( $productObj->getCSProductApplications())
                {
                    $applicationsHtml = '<ul>';
                    foreach ($productObj->getCSProductApplications() as $key => $value) {
                        $applicationsHtml .= '<li><span class="orange">›</span> '.$value->getApplicationName().' </li>';
                    }
                    $applicationsHtml .= '</ul>';
                }
                $productData['Applications'] = $applicationsHtml;

                if( $productObj->getCoverCompounds())
                {
                    $CoverCompoundHtml = '<ul>';
                    foreach ($productObj->getCoverCompounds() as $key => $value) {
                        $CoverCompoundHtml .= '<li><span class="orange">›</span> '.$value->getName().' </li>';
                    }
                    $CoverCompoundHtml .= '</ul>';
                }
                $productData['CoverCompounds'] = $CoverCompoundHtml;

                if($productObj->getCSProductIndustries())
                {
                    $marketsHtml = '<ul>';
                    foreach ($productObj->getCSProductIndustries() as $key => $value) {
                        $marketsHtml .= '<li><span class="orange">›</span> '.$value->getIndustryName().' </li>';
                    }
                    $marketsHtml .= '</ul>';
                }
                $productData['Markets'] = $marketsHtml;

                $FeaturesAndBenefits = [];
                $FeaturesAndBenefitsWithoutImages = [];
                if($productObj->getCSProductFeaturesAndBenefits())
                {
                    foreach ($productObj->getCSProductFeaturesAndBenefits() as $key => $value) {
                        if($value->getFeatureImage())
                        {
                            $feature['FeatureName'] = $value->getFeatureName();
                            $feature['FeatureDescription'] = $value->getFeatureDescription();
                            $feature['FeatureImage'] = $value->getFeatureImage();
                            $FeaturesAndBenefits[] = $feature;
                        }
                        else{
                            $FeaturesAndBenefitsWithoutImages[] = $value->getFeatureName();
                        }
                    }

                }

                if(!$FeaturesAndBenefits)
                {
                    $productData['FeaturesAndBenefitsWithoutImages'] = $FeaturesAndBenefitsWithoutImages;
                }

                $productData['FeaturesAndBenefits'] = $FeaturesAndBenefits;

                $MoreThanOneProduct = 0;
                $childrenData = [];

                if(count($selectedProduct) > 1){
                    $MoreThanOneProduct = 1;
                }

                if(array_key_exists($productName, $productDataImportConfig['Common Product Page']))
                {
                    if($selectedProduct){
                        foreach ($selectedProduct as $key => $singleProduct) {
                            $productObjSingle = DataObject\CSProducts::getById($singleProduct);
                            $children = $productObjSingle->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
                            $childrenData = array_merge($childrenData, $children);
                        }
                    }

                    if($childrenData)
                    {
                        foreach ($childrenData as $chKey => $chValue) {
                            if(!$chValue->getPrintedCatalogFlag())
                            {
                                unset($childrenData[$chKey]);
                            }
                        }
                    }

                    $productTables = array();
		    $childrenDataChunkArray = array_chunk($childrenData, 3);

                    if($childrenDataChunkArray)
                    {
			foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) 
			{
		                $tables = $productDataImportConfig['Common Product Page'][$productName];

		                // unset($tables['Conveyor Belt Data']);
		                // unset($tables['Load Support – Maximum Belt Width Data']);
		                // unset($tables['Troughability Minimum Belt Width']);
		                // unset($tables['Minimum Pulley Diameters']);
		                // unset($tables['Elevator Belt Data']);
		                // unset($tables['Maximum Bucket Projection']);


		                foreach ($tables as $tablekey => $MetricImperialFields) {

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

		                    if($MetricImperialFields){


		                        foreach ($MetricImperialFields as $MIKey => $MIValues) {

		                            unset($HeaderKeys);
		                            unset($RemoveKeys);
		                            unset($AdditionalHeaderKey);
		                            unset($AdditionalGroupKey);

		                            if(isset($MIValues['HeaderKeys']))
		                            {
		                                $HeaderKeys = $MIValues['HeaderKeys'];
		                                unset($MIValues['HeaderKeys']);
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
                                    
		                            foreach ($MIValues as $key => $value) {
		                                // $keysTitle[$key] = $value['fieldTitle'];

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

		                            foreach ($childrenDataChunk as $childValue) {
		                                $percentageSymbol = '';
		                                $bricks = $childValue->getProductAttributes();
		                                $data = [];
		                                
		                                foreach ($MIValues as $key => $value) {
		                                    $brickName = $value['objectType'];
		                                    $percentageSymbol = $value['percentageSymbol'];
		                                    $getBrick = 'get' . $brickName;
		                                    $getField = 'get' . $key;

		                                    if(method_exists($bricks,$getBrick) && method_exists($bricks->$getBrick(),$getField))
		                                    {   
		                                        $data[$key] = ($bricks->$getBrick()->$getField()).$percentageSymbol;

		                                    }
		                                }

		                                

		                                if($ColumnKeys)
		                                {
		                                    foreach ($HeaderKeys as $hValue) {
		                                        $tableHeaderKeys[] = $data[$hValue];
		                                    }


		                                    if($tableHeaderKeys)
		                                    {
		                                        $theadSecondData[] = implode('/', $tableHeaderKeys);
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
		                                    foreach ($MIArray as $variant) {

		                                        foreach ($variant as $key => $value) {
		                                            if($RemoveKeys)
		                                            {
		                                                if(!isset($RemoveKeys[$key]))
		                                                {
		                                                    $tableRows[$key][] = $value;
		                                                }
		                                            }
		                                            else{
		                                                $tableRows[$key][] = $value;
		                                            }
		                                        }
		                                    }
		                                }

		                                if($tableRows)
		                                {
		                                    foreach ($tableRows as $tdkey => $trvalue) {

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

		                                foreach ($theadSecondData as $key => $value) {
		                                    // if(isset($keysTitle[$value]))
		                                    // {
		                                        // $theadSecondData[$key] = $keysTitle[$value];
		                                        $theadSecondData[$key] = $this->addPrefix($value);

		                                    // }
		                                }

		                                foreach ($MIArray as $variant) {

		                                    $newKey = [];
		                                    $newArray = [];

		                                    if($RemoveKeys)
		                                    {

		                                        foreach ($RemoveKeys as $key => $value) {
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

                    $productData['productTables'] = $productTables;
                    $productData['productGroupInformation'] = $productTables;
                }
            }

            // p_r($productData);
            // die;
            $this->view['data'] = $productData;
            $this->view['footer_logo_src']  = $footer_logo_src;

        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_cover_compounds")
     */
    public function templateCoverCompoundsAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_cover_compound_page')->getElement();
        $productData = [];
        if($catalogTableObject)
        {
            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();

            // $catalogCategoryObjectId = $catalogTableObject->getParentId();
            $coverCompoundData = [];
            // echo 'dfgdf';
            if($catalogTableObject)
            {
                // $categoryObj = DataObject\CSCatalogCategory::getById($catalogCategoryObjectId);

                $selectedCategoryId = $catalogTableObject->getSecondLevelCategory();

                // p_r($selectedCategoryId);

                $hierarchyObj = DataObject\CSHierarchy::getById($selectedCategoryId);

                // p_r($hierarchyObj);

                $hierarchyPath = $hierarchyObj->getPath();
                $hierarchyName = $hierarchyObj->getName();

                $hierarchyFullName = $hierarchyPath.$hierarchyName;
                $productHierarchyPath = \str_replace($hierarchyPath, CS_MATERIAL_HANDLIG_PRODUCTS_PATH, $hierarchyFullName);

                $HierarchyProductPath = DataObject\CSProducts::getByPath($productHierarchyPath);
                // echo 'fgd';
                // p_r($HierarchyProductPath);
                
                $coverCompoundData['HierarchyNameLevel1'] = 'Conveying Solutions';
                $coverCompoundData['HierarchyNameLevel2'] = $hierarchyName;
                $coverCompoundData['Name'] = $HierarchyProductPath->getName();
                $coverCompoundData['ShortText'] = $HierarchyProductPath->getShortText();
                $coverCompoundData['LongText'] = $HierarchyProductPath->getLongText();
                $coverCompoundData['ProductClaimSlogan'] = $HierarchyProductPath->getProductClaimSlogan();
                $coverCompoundData['productImage'] = $HierarchyProductPath->getProductImage();

                $CSHierarchyObjChild = $HierarchyProductPath->getchildren(); 

                $coverOptionsAttributes = $productDataImportConfig['Cover Options']['Cover Compound Attributes'];
                $productPage = $productDataImportConfig['Cover Options']['Product Page'];

                $coverCompoundMasterList = $this->getCoverCompoundMasterList();
                // p_r($coverCompoundMasterList);
                
                // level 3rd object
                $applicationData = [];
                $level4Data = [];
                $coverCompounds = [];
                $level3rdObjectData = [];
                $singleProductPage = [];
                $coverCompoundsHeaderKeys = [];
                $coverCompoundsHeaderKeys[] = 'Compounds';
                $onlyOnce = false;
                
                foreach ($CSHierarchyObjChild as $objectLevel3rd) {

                    $level3Data['Name'] = $objectLevel3rd->getName();
                    $level3Data['LongText'] = $objectLevel3rd->getLongText();
                    $level3rdObjectData[] = $level3Data;

                    if($level3Data['Name'] === $productPage){

                        $singleProductPage['Name'] = $level3Data['Name'];
                        $singleProductPage['NamePerformanceCategory'] = $level3Data['Name']. ' Heat Resistant Compounds';
                        // $singleProductPage['PerformanceCategory'] = ' Heat Resistant Compounds';
                        $singleProductPage['productImage'] = $objectLevel3rd->getProductImage();
                        $singleProductPage['LongText'] = $objectLevel3rd->getLongText();

                        $FeaturesAndBenefits = [];

                        foreach ($objectLevel3rd->getCSProductFeaturesAndBenefits() as $key => $value) {
                            if($value->getFeatureImage())
                            {
                                $feature['FeatureName'] = $value->getFeatureName();
                                $feature['FeatureDescription'] = $value->getFeatureDescription();
                                $feature['FeatureImage'] = $value->getFeatureImage();
                                $FeaturesAndBenefits[] = $feature;
                            }
                        }

                        $singleProductPage['FeaturesAndBenefits'] = $FeaturesAndBenefits;

                        $Level4ObjChild = $objectLevel3rd->getchildren(); 
                        $level4ObjectData = [];
                        foreach ($Level4ObjChild as $level4Value) {
                            $level4DataPart['Name'] = $level4Value->getName();
                            $level4DataPart['LongText'] = $level4Value->getLongText();
                            $level4ObjectData[] = $level4DataPart;
                        }

                        $singleProductPage['Level4ObjChildData'] = $level4ObjectData;
                    }

                    $label4Childs = $objectLevel3rd->getchildren();

                    foreach ($label4Childs as $child) {
                        $level4Name = trim($child->getName());
                        // p_r($child->getCoverCompound());
                        // die;

                        if($child->getCSPerformanceCategory())
                        {
                            foreach ($child->getCSPerformanceCategory() as $ckey => $coverCompound) {
                                $coverCompoundName = $coverCompoundMasterList[$coverCompound];
                                $coverCompounds[$coverCompoundName][$level4Name][] = $level4Name;
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
                                        $coverCompounds[$coverCompoundName][$level4Name][] = $bricks->$getBrick()->$getField();
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
                        else{
                            $level4Data[$level4Name] = [];
                        }
                    }
                }
                
                if($level4Data)
                {
                    foreach ($level4Data as $lkey => $lvalue) {
                        $data[] = $lkey;
                        foreach ($applicationData as $akey => $avalue) {

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
            else{
                echo "Category Not Select In Catalog Category Object";
                die;
            }

            $productData['coverCompoundData'] = $coverCompoundData;
        }


        $this->view['data'] = $productData;
        $this->view['HierarchyNameLevel2'] = $coverCompoundData['HierarchyNameLevel2'];
        $this->view['footer_logo_src']  = $footer_logo_src;
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
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_cleated_belts_page')->getElement();
        $productData    = [];
        $displayTablesFlag  = false;
        if($catalogTableObject)
        {   
            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();   

            $selectedProduct = $catalogTableObject->getProducts();

            $productId = $selectedProduct[0];

            $productDetails = DataObject\CSProducts::getById($productId);

            $objParent = DataObject\CSProducts::getById($productDetails->getParentId());

            $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';
            
            $productData['Name'] = $productDetails->getName();
            $productData['LongText'] = $productDetails->getLongText();
            $productData['BeltRollDiameters'] = $productDetails->getBeltRollDiameters();
            $productData['AngleOfInclination'] = $productDetails->getAnglesofInclination();
            $productData['cover_compounds'] = $productDetails->getCoverCompounds();


            if(isset($productDataImportConfig[$productDetails->getName()]))
            {
                $CommonBeltProfileAttributes = $productDataImportConfig[$productDetails->getName()]['Common Belt Profile Attributes'];
            }

            $productChildrenData = $productDetails->getchildren(); 
            $childrenData = [];
            foreach ($productChildrenData as $child) {
                if($child->getPrintedCatalogFlag() === true)
                {
                    $data['Name'] = $child->getName();
                    $data['LongText'] = $child->getLongText();
                    $data['ProductImage'] = $child->getProductImage();
                    $data['ApplicationImage'] = $child->getApplicationImage();

                    $bricks = $child->getProductAttributes();

                    $tableFieldData = [];
                    if($bricks)
                    {  
                        foreach ($CommonBeltProfileAttributes as $fieldName => $brickName) {

                            $getBrick = 'get' . $brickName;
                            $getField = 'get' . $fieldName;
                            if($bricks->$getBrick())
                            {   
                                if($bricks->$getBrick()->$getField())
                                {   $fieldName = $this->addPrefix($fieldName);
                                    $tableFieldData[$fieldName] = $bricks->$getBrick()->$getField();
                                }
                            }
                        }
                    }   
                    $data['tableFieldData'] = $tableFieldData;
                    
                    $childrenData[] = $data;
                }
            }

            $productData['childrenData'] = $childrenData;

            $regionsArr = $this->getCSRegionNameByIds($productDetails->getCSRegion());

            $configProviderService = new ConfigProviderService();
            $ymlData = $configProviderService->getBrickMappingConfig();
            
            if(isset($ymlData['cleated_belts_table_display_in_region']['regionName']) && in_array($ymlData['cleated_belts_table_display_in_region']['regionName'],$regionsArr))
            {
                $displayTablesFlag = true;
            }
        }

        $this->view['data']             = $productData;
        $this->view['displayTablesFlag']    = $displayTablesFlag;
        $this->view['footer_logo_src']  = $footer_logo_src;
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



    public function addPrefix($key): String
    {
        if(trim($key))
        {
            $key = "CS_{$key}";
        }
        return $key;
    }

    public function getCoverCompoundMasterList(){
        $query = "select oo_id, PerformanceCategory from object_query_CSPerformanceCategories";
        return $this->db->fetchPairs($query);
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            $s3src = $imgObj->getThumbnail('catalog_thumb');
//            $s3src = Utils::getAssetFullPathCompatibleToS3($imgObj);
        }

        return $s3src;
    }

    public function containerAction(Request $request)
    {
        $allChildren = $this->document->getAllChildren();
        $this->view->allChildren = $allChildren;
    }

    /**
     * @Route("/contitech_cs_catalog/template_continental_conveyor_services")
    */
    public function templateContinentalConveyorServicesAction(Request $request)
    {   
        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        
        $default_image = $this->configProviderService->getDefaultImage();
      
        $catalogCategoryObject = $this->getDocumentTag('relation', 'cbs_template_belt_services_page')->getElement();

        $productNameArr = [];

        if($catalogCategoryObject)
        {
            $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();

            $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

            $hierarchyPath = $hierarchyObj->getPath();
            $hierarchyName = $hierarchyObj->getName();

            $hierarchyFullName = $hierarchyPath.$hierarchyName;
            $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

            $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
            $productNameArr['Name'] = trim($productObject->getName());
            $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
            $productNameArr['ShortText'] = $productObject->getShorttext();
            $productNameArr['HierarchyNameLevel1'] = 'Conveying Solutions';
            $productNameArr['HierarchyNameLevel2'] = $hierarchyName;
            
            $childrenData = [];
            $childObject = $productObject->getChildren();
            foreach ($childObject as $childValue) {
                if ($childValue->getPrintedCatalogFlag() === true) {
                    $data['Name'] = $childValue->getName();
                    $data['LongText'] = $childValue->getLongtext();
                    $data['ProductImage'] = $childValue->getProductImage();

                    $childrenData[] = $data;
                    unset($data);
                }
            }

            $productNameArr['childrenData'] = $childrenData;
        }

        $this->view['data'] = $productNameArr;
        $this->view['footer_logo_src']  = $footer_logo_src;
        $this->view['default_image']    = $default_image;
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_protect_systems")
    */
    public function templateContiProtectSystemsAction(Request $request)
    {
        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_protect_systems')->getElement();

        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        
        $productData = [];
        if($catalogTableObject)
        {
            $selectedProduct = $catalogTableObject->getProducts();
            $singleProduct = $selectedProduct[0];
            $productObject = DataObject\CSProducts::getById($singleProduct);
            $productData['Name'] = $productObject->getName();
            $productData['ShortText'] = $productObject->getShortText();
            $productData['ProductImage'] = $productObject->getProductImage();
            $productData['ApplicationImage'] = $productObject->getApplicationImage();
            $productData['Benefits'] = $productObject->getBenefits();
            $productData['HierarchyNameLevel1'] = 'Conveying Solutions';

            $objParent = DataObject\CSProducts::getById($productObject->getParentId());

            $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';

            $childrenData = [];
            $childObject = $productObject->getChildren();
            foreach ($childObject as $childValue) {
                if($childValue->getPrintedCatalogFlag() === true){
                    $data['Name'] = $childValue->getName();
                    $data['ShortText'] = $childValue->getShortText();

                    $childrenData[] = $data;
                    unset($data);
                }
            }

            $productData['childrenData'] = $childrenData;

            $this->view['monitoring_system'] = $this->getContiCleanBenefits($productObject);
        }

        $this->view['data'] = $productData;
        $this->view['footer_logo_src'] = $footer_logo_src;
    }

    /**
     * @Route("/contitech_cs_catalog/template_conti_inspect_systems")
    */
    public function templateContiInspectSystemsAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_inspect_systems')->getElement();
        $productData = [];
        if($catalogTableObject)
        {
            $selectedProduct = $catalogTableObject->getProducts();
            $singleProduct = $selectedProduct[0];
            $productObject = DataObject\CSProducts::getById($singleProduct);
            
            $objParent = DataObject\CSProducts::getById($productObject->getParentId());

            $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';

            $productData['Name'] = $productObject->getName();
            $productData['ShortText'] = $productObject->getShortText();
            $productData['ProductImage'] = $productObject->getProductImage();
            $productData['ReportImage'] = $productObject->getReportImage();
            
            $productData['ApplicationImage'] = $productObject->getApplicationImage();
            $productData['Benefits'] = $productObject->getBenefits();
            $productData['HierarchyNameLevel1'] = 'Conveying Solutions';

            $childrenData = [];
            $childObject = $productObject->getChildren();
            foreach ($childObject as $childValue) {
                if($childValue->getPrintedCatalogFlag() === true){
                    $data['Name'] = $childValue->getName();
                    $data['ShortText'] = $childValue->getShortText();

                    $childrenData[] = $data;
                    unset($data);
                }
            }

            $productData['childrenData'] = $childrenData;
        }

        $this->view['data'] = $productData;
        $this->view['footer_logo_src'] = $footer_logo_src;
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_mega_pipe_belt")
    */
    public function templateMegaPipeBeltAction(Request $request)
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

            $objParent = DataObject\CSProducts::getById($productObject->getParentId());

            $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';

            $productData['Name'] = $productObject->getName();
            $productData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
            $productData['ShortText'] = $productObject->getShortText();
            $productData['ProductImage'] = $productObject->getProductImage();
            $productData['Benefits'] = $productObject->getBenefits();
            
            $productData['Features'] = $this->getSybercordTechnologyFeature($productObject);

            $productData['CSProductFeaturesAndBenefits'] = $productObject->getCSProductFeaturesAndBenefits();
            $productData['HierarchyNameLevel1'] = 'Conveying Solutions';
        }
        
        $this->view['data'] = $productData;
        $this->view['footer_logo_src'] = $footer_logo_src;
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_conti_pipe_belt")
     */
    public function templateContiPipeBeltAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        
        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_pipe_belt')->getElement();
        $productData = [];
        
        if($catalogTableObject)
        {
            $childObject = $catalogTableObject->getChildren();
            $catalogCategoryObjectId = $catalogTableObject->getParentId();
            $categoryObj = DataObject\CSCatalogCategory::getById($catalogCategoryObjectId);
            
            if($categoryObj)
            {
                $selectedSecondLevelCategoryId = $categoryObj->getSecondLevelCategory();
                
                $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);
                
                if($hierarchyObj)
                {
                    $hierarchyPath = $hierarchyObj->getPath();
                    $hierarchyName = $hierarchyObj->getName();
                    
                    $hierarchyFullName = $hierarchyPath.$hierarchyName;
                    $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);
                    
                    $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
                    
                    if($productObject)
                    {
                        $parentProductData['Name'] = $productObject->getName();
                        $parentProductData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                        $parentProductData['ShortText'] = $productObject->getShortText();
                        $parentProductData['ProductImage'] = $productObject->getProductImage();
                        $parentProductData['HierarchyNameLevel1'] = 'Conveying Solutions';
                        
                        $applications = [];
                        if($productObject->getCSProductApplications())
                        {
                            foreach ($productObject->getCSProductApplications() as $value) {
                                $applications[] = $value->getApplicationName();
                            }
                        }
                        $parentProductData['Applications'] = $applications;
                        
                        $productData['productSpecificData'] = $this->prepareContiPipeAndMegaPipeAttributes($productObject);
                    }
                }
                
                $selectedProduct    = $catalogTableObject->getProducts();
                $singleProduct      = $selectedProduct[0];

                $singleProductObj = DataObject\CSProducts::getById($singleProduct);
                $childProductData['Name'] = $singleProductObj->getName();
                $childProductData['ProductClaimSlogan'] = $singleProductObj->getProductClaimSlogan();
                $childProductData['ShortText'] = $singleProductObj->getShortText();
                $childProductData['ProductImage'] = $singleProductObj->getProductImage();
                $childProductData['Benefits'] = $singleProductObj->getBenefits();
                $productData['HierarchyNameLevel2'] = $hierarchyName;
            }

        }

        $productData['parentProductData'] = $parentProductData;
        $productData['childProductData'] = $childProductData;

        $this->view['data'] = $productData;
        $this->view['footer_logo_src'] = $footer_logo_src;
    }
    
    /**
     * Prepare ContiPipe™ and MegaPipe® Sizes table data
     * @param object
     * @access private 
     * @return array
     */
    private function prepareContiPipeAndMegaPipeAttributes($productObject)
    {
        $childObject    = $productObject->getChildren();
        $data           = [];
        $childs         = $childObject[0]->getChildren();

        $this->configProviderService = new ConfigProviderService();
        $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();

        $attributes = [];

        if(isset($productDataImportConfig['ContiPipe and MegaPipe Sizes']['ContiPipe and MegaPipe Table Attributes']))
        {
           $attributes  = $productDataImportConfig['ContiPipe and MegaPipe Sizes']['ContiPipe and MegaPipe Table Attributes'];
        }

        $total_attr = count($attributes);

        if($childs)
        {
            foreach($childs as $obj)
            {   
                $obj_attr           =   $obj->getProductAttributes();

                foreach ($attributes as $fieldName => $brickName)
                {
                    $getBrick = 'get' . $brickName;
                    $getField = 'get' . $fieldName;

                    if(method_exists($obj_attr,$getBrick) && method_exists($obj_attr->$getBrick(),$getField))
                    {
                        $data[] = $obj_attr->$getBrick()->$getField();
                    }
                }
            }
        }

        return $data ? array_chunk($data,$total_attr) : [];
    }


    public function templateTextileConveyorBeltsAction(Request $request)
    {
        $catalogCategoryObject = $this->getDocumentTag('relation', 'cbs_template_textile_belt_services_page')->getElement();

        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        
        $productNameArr = [];

        if ($catalogCategoryObject)
        {
            $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();

            $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

            $hierarchyPath = $hierarchyObj->getPath();
            $hierarchyName = $hierarchyObj->getName();

            $hierarchyFullName = $hierarchyPath.$hierarchyName;
            $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

            $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
    
                $productNameArr['Name'] = trim($productObject->getName());
                $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                $productNameArr['ShortText'] = $productObject->getShortText();
                $productNameArr['ProductImage'] = $productObject->getProductImage();
                $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
                $productNameArr['fieldPhoto'] = $productObject->getfieldPhoto();  
                $productNameArr['HierarchyNameLevel1'] = 'Conveying Solutions';
                $productNameArr['HierarchyNameLevel2'] = $hierarchyName;           
        }
        $this->view['data'] = $productNameArr;
        $this->view['footer_logo_src'] = $footer_logo_src;
    }
    
    public function templateSteelcordBeltConstructionAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        
        $catalogCategoryObject = $this->getDocumentTag('relation', 'cbs_template_steelcord_belt_construction_page')->getElement();

        $productNameArr = [];

        if($catalogCategoryObject)
        {
            $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();

            $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

            $hierarchyPath = $hierarchyObj->getPath();
            $hierarchyName = $hierarchyObj->getName();

            $hierarchyFullName = $hierarchyPath.$hierarchyName;
            $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

            $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
    
            $productNameArr['Name'] = trim($productObject->getName());
            $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
            $productNameArr['ShortText'] = $productObject->getShortText();
            $productNameArr['ProductImage'] = $productObject->getProductImage();
            $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
            $productNameArr['HierarchyNameLevel1'] = 'Conveying Solutions';    
            $productNameArr['HierarchyNameLevel2'] = $hierarchyName;    
        }
        $this->view['data'] = $productNameArr;
        $this->view['footer_logo_src'] = $footer_logo_src;
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_quality_and_the _environment")
    */
    public function templateQualityAndTheEnvironmentAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $this->view['footer_logo_src'] = $footer_logo_src;
      
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_template_eco_series_pulley")
    */
    public function templateEcoSeriesPulleyAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $this->view['footer_logo_src'] = $footer_logo_src;
      
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_wood_product")
    */
    public function templateWoodProductAndApplicationAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $this->view['footer_logo_src'] = $footer_logo_src;
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_sybercord_technology")
    */
    public function templateSybercordTechnologyAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        

        $catalogCategoryObject = $this->getDocumentTag('relation', 'cbs_template_sybercord_technology_construction_page')->getElement();

            $productNameArr = [];

            if($catalogCategoryObject)
            {
                $selectedSecondLevelCategoryId = $catalogCategoryObject->getSecondLevelCategory();

                $hierarchyObj = DataObject\CSHierarchy::getById($selectedSecondLevelCategoryId);

                $hierarchyPath = $hierarchyObj->getPath();
                $hierarchyName = $hierarchyObj->getName();

                $hierarchyFullName = $hierarchyPath.$hierarchyName;
                $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

                $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
                
               
                $productNameArr['Name'] = trim($productObject->getName());
                $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                $productNameArr['ShortText'] = $productObject->getShortText();
                $productNameArr['LogoImage'] = $productObject->getLogoImage();     
                $productNameArr['ProductImage'] = $productObject->getProductImage();
                $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
        
                // get features
                $productNameArr['Features'] = $this->getSybercordTechnologyFeature($productObject);
                
                $productNameArr['CSProductApplications'] = $productObject->getCSProductApplications();
                $productNameArr['HierarchyNameLevel1'] = 'Conveying Solutions'; 
                $productNameArr['HierarchyNameLevel2'] = $hierarchyName;
              
         
            }
        $this->view['data'] = $productNameArr;
        $this->view['footer_logo_src'] = $footer_logo_src;
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
        catch(\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
    }
    
    public function templateConveyorBeltGroupAction(Request $request)
    {
      //  print_r('hey');
    }

    public function templateContiCleanAction(Request $request)
    {
        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_clean')->getElement();

        $this->configProviderService = new ConfigProviderService();
       
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        
        $productData = [];
        if($catalogTableObject)
        {
            $selectedProduct = $catalogTableObject->getProducts();
            $singleProduct = $selectedProduct[0];
            $productObject = DataObject\CSProducts::getById($singleProduct);
            $productData['Name'] = $productObject->getName();
            $productData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
            $productData['ShortText'] = $productObject->getShortText();
            $productData['ProductImage'] = $productObject->getProductImage();
            $productData['ApplicationImage'] = $productObject->getApplicationImage();
            $productData['reportImage'] = $productObject->getReportImage();
            
            $this->view['data'] = $productData;
            
            $productData['material'] = $this->getContiCleanMaterials($productObject);

            $productData['Benefits'] = $this->getContiCleanBenefits($productObject);

            $productData['HierarchyNameLevel1'] = 'Conveying Solutions';
        }

        $this->view['data'] = $productData;
        $this->view['footer_logo_src'] = $footer_logo_src;
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
        catch(\Exception $e)
        {
            throw new \Exception($e->getMessage());
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
    
            if(method_exists($objAttr,'getProdAttrSetX') && method_exists($objAttr->getProdAttrSetX(),'getMaterial'))
            {
                $arr = $objAttr->getProdAttrSetX()->getMaterial();

                if($arr)
                {
                    foreach($arr as $val)
                    {
                        $materials[] = $val; 
                    }
                }
            }
            return $materials;
        }
        catch(\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
    }

    public function templateContiAlertAction(Request $request)
    {

        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_alert')->getElement();

        $this->configProviderService = new ConfigProviderService();
       
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
  
        $productData = [];
        if($catalogTableObject)
        {
            
            $selectedProduct = $catalogTableObject->getProducts();
            $singleProduct = $selectedProduct[0];
            $productObject = DataObject\CSProducts::getById($singleProduct);
            $productData['Name'] = $productObject->getName();
            $productData['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
            $productData['ShortText'] = $productObject->getShortText();
            $productData['ProductImage'] = $productObject->getProductImage();
            $productData['Benefits'] = $productObject->getBenefits();
            $productData['HierarchyNameLevel1'] = 'Conveying Solutions';
            $productData['Benefits'][0]= 'sdfdsf';
        }

        $this->view['data'] = $productData;
        $this->view['footer_logo_src'] = $footer_logo_src;
    }

    public function templateCreatedWithBricksAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $this->view['footer_logo_src'] = $footer_logo_src;
    }
}