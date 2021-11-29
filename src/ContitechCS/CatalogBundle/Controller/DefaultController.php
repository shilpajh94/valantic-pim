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
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_page")
     */
    public function templateProductPageAction(Request $request)
    {
        $region = $this->document->getProperty('region');
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

            $productNameTitle = implode(' and ', $productNameArr);
            $productName =  trim($productObj->getName());
            $productKeyName =  trim($productObj->getKey());

            if($productObj) ///isset variable is assigned a value or not null
            {
                $parentParentObj = $productObj->getParent();

                // $hierarchyId = $categoryObj->getSecondLevelCategory();
                // if($hierarchyId)
                // {
                //     $hierarchyObj = DataObject\CSHierarchy::getById($hierarchyId);
                // }

                $productData['HierarchyNameLevel2'] = $parentParentObj->getName();
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

                if(array_key_exists($productKeyName, $productDataImportConfig['Common Product Page']))
                {
                    if($selectedProduct){
                        foreach ($selectedProduct as $key => $singleProduct) {
                            $productObjSingle = DataObject\CSProducts::getById($singleProduct);
                            $childrenData = $this->getAllRegionChildern($productObjSingle, $region);
                        }
                    }
                    if($childrenData)
                    {
                        foreach ($childrenData as $chKey => $chValue) {
                            if($chValue->getPrintedCatalogFlag() != true)
                            {
                                unset($childrenData[$chKey]);
                            }
                        }
                    }

                    $productTables = array();
            $childrenDataChunkArray = array_chunk($childrenData, CS_PRODUCT_TABLE_COLUMN_LIMIT);

                    if($childrenDataChunkArray)
                    {
            foreach ($childrenDataChunkArray as $chunkKey => $childrenDataChunk) 
            {
                        $tables = $productDataImportConfig['Common Product Page'][$productKeyName];

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

                                    unset($KeysGroupLogic);
                                    // unset($DisplayKeys);
                                    unset($RemoveKeys);
                                    unset($AdditionalHeaderKey);
                                    unset($AdditionalGroupKey);

                                    if(isset($MIValues['KeysGroupLogic']))
                                    {
                                        $KeysGroupLogic = $MIValues['KeysGroupLogic'];
                                        unset($MIValues['KeysGroupLogic']);
                                    }

                                    // if(isset($MIValues['DisplayKeys']))
                                    // {
                                    //     $DisplayKeys = $MIValues['DisplayKeys'];
                                    //     unset($MIValues['DisplayKeys']);
                                    // }

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
                                                    else{
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
        $region = $this->document->getProperty('region');
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_cover_compound_page')->getElement();
        $productData = [];
        if($catalogTableObject)
        {
            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();

            $coverCompoundData = [];
            if($catalogTableObject)
            {
                $selectedCategoryId = $catalogTableObject->getSecondLevelCategory();

                $hierarchyObj = DataObject\CSHierarchy::getById($selectedCategoryId);

                $hierarchyPath = $hierarchyObj->getPath();
                $hierarchyName = $hierarchyObj->getKey();

                $hierarchyFullName = $hierarchyPath.$hierarchyName;
                $productHierarchyPath = \str_replace($hierarchyPath, CS_MATERIAL_HANDLIG_PRODUCTS_PATH, $hierarchyFullName);

                $HierarchyProductPath = DataObject\CSProducts::getByPath($productHierarchyPath);
                
                $coverCompoundData['HierarchyNameLevel2'] = trim($HierarchyProductPath->getName());
                $coverCompoundData['Name'] = trim($HierarchyProductPath->getName());
                $coverCompoundData['ShortText'] = $HierarchyProductPath->getShortText();
                $coverCompoundData['LongText'] = $HierarchyProductPath->getLongText();
                $coverCompoundData['ProductClaimSlogan'] = $HierarchyProductPath->getProductClaimSlogan();
                $coverCompoundData['productImage'] = $HierarchyProductPath->getProductImage();

                $CSHierarchyObjChild = $this->getAllRegionChildern($HierarchyProductPath, $region);
                // p_r($CSHierarchyObjChild);

                $coverOptionsAttributes = $productDataImportConfig['Cover Options']['Cover Compound Attributes'];
                $productPage = $productDataImportConfig['Cover Options']['Product Page'];

                $coverCompoundMasterList = $this->getCoverCompoundMasterList();
                
                // level 3rd object
                $applicationData = [];
                $level4Data = [];
                $coverCompounds = [];
                $level3rdObjectData = [];
                $singleProductPage = [];
                $coverCompoundsHeaderKeys = [];
                $coverCompoundsHeaderKeys[] = 'Compounds';
                $onlyOnce = false;
                
                if($CSHierarchyObjChild)
                {
                    foreach ($CSHierarchyObjChild as $objectLevel3rd) {

                        $level3Data['Name'] = $objectLevel3rd->getName();
                        $level3Data['LongText'] = $objectLevel3rd->getLongText();
                        $level3rdObjectData[] = $level3Data;

                        if($objectLevel3rd->getKey() === $productPage){

                            p_r($objectLevel3rd);

                            $performanceCategoryIds = $objectLevel3rd->getCSPerformanceCategory();

                            $performanceCategoryName = [];
                            $performanceCategoryNameString = '';

                            if($performanceCategoryIds)
                            {
                                p_r($coverCompoundMasterList);
                                p_r($performanceCategoryIds);

                                foreach ($performanceCategoryIds as $key => $id) {
                                    $performanceCategoryName[] = $coverCompoundMasterList[$id];
                                }
                                if($performanceCategoryName)
                                {
                                    $performanceCategoryNameString = implode(' ', $performanceCategoryName);
                                }
                            }

                            p_r($performanceCategoryName);
                            // die;
                            echo $NamePerformanceCategory =  $level3Data['Name']. $performanceCategoryNameString;
                            die;

                            $singleProductPage['Name'] = $level3Data['Name'];
                            $singleProductPage['NamePerformanceCategory'] = $NamePerformanceCategory;
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

                            $Level4ObjChild = $this->getAllRegionChildern($objectLevel3rd, $region);

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

                        $label4Childs = $this->getAllRegionChildern($objectLevel3rd, $region);
                        // p_r($label4Childs);
                        // die;

                        if($label4Childs)
                        {
                            foreach ($label4Childs as $child) {
                                $level4Name = trim($child->getName());

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
                    }
                }
                
                if($level4Data)
                {
                    // p_r($applicationData);
                    foreach ($level4Data as $lkey => $lvalue) {
                        $data[] = $lkey;
                        foreach ($applicationData as $avalue) {

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
        $region = $this->document->getProperty('region');
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

            // $objParent = $productDetails->getParent();

            // $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';
            $productData['HierarchyNameLevel2'] = trim($productDetails->getName());
            $productData['Name'] = $productDetails->getName();
            $productData['LongText'] = $productDetails->getShortText();
            $productData['BeltRollDiameters'] = $productDetails->getBeltRollDiameters();
            $productData['AngleOfInclination'] = $productDetails->getAnglesofInclination();
            $productData['cover_compounds'] = $productDetails->getCoverCompounds();


            if(isset($productDataImportConfig['Common Belt Profile Attributes']))
            {
                $CommonBeltProfileAttributes = $productDataImportConfig['Common Belt Profile Attributes'];
            }

            $productChildrenData = $this->getAllRegionChildern($productDetails, $region);

            $childrenData = [];

            if($productChildrenData)
            {
                foreach ($productChildrenData as $child) {
                    if($child->getPrintedCatalogFlag() === true)
                    {
                        $data['Name'] = $child->getName();
                        $data['LongText'] = $child->getShortText();
                        $data['ProductImage'] = $child->getProductImage();
                        $data['ApplicationImage'] = $child->getApplicationImage();

                        $bricks = $child->getProductAttributes();

                        $tableFieldData = [];
                        if($bricks)
                        {  
                            foreach ($CommonBeltProfileAttributes as $fieldName => $brickName) {

                                $getBrick = 'get' . $brickName;
                                $getField = 'get' . $fieldName;
                                if($bricks->$getBrick() && $bricks->$getBrick()->$getField())
                                {   
                                    $fieldName = $this->addPrefix($fieldName);
                                    $tableFieldData[$fieldName] = $bricks->$getBrick()->$getField();
                                }
                            }
                        }   
                        $data['tableFieldData'] = $tableFieldData;
                        
                        $childrenData[] = $data;
                    }
                }
            }

            $productData['childrenData'] = $childrenData;

            $regionsArr = $this->getCSRegionNameByIds($productDetails->getCSRegion());

            $ymlData = $this->configProviderService->getBrickMappingConfig();
            
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

    public function getAllRegionChildern($productObject, $region): Array
    {
        $productChildrenData = [];
        $objectTypeFolderchildren = $productObject->getChildren([DataObject::OBJECT_TYPE_FOLDER]);

        if($objectTypeFolderchildren)
        {
            foreach ($objectTypeFolderchildren as $objectChildFolder) {
                if(strtolower($objectChildFolder->getKey()) === strtolower($region))
                {
                    $children = $objectChildFolder->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
                    $productChildrenData = array_merge($productChildrenData, $children);
                }
            }
        }
        else{
            $children = $productObject->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
            $productChildrenData = array_merge($productChildrenData, $children);
        }
        
        return $productChildrenData;
    }

    public function addPrefix($key): String
    {
        if(trim($key))
        {
            $key = "CS_{$key}";
        }
        return $key;
    }

    public function getCoverCompoundMasterList(): Array {
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
        // $query = "select oo_id, PerformanceCategory from object_query_CSPerformanceCategories";
        // return $this->db->fetchPairs($query);
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
        $region = $this->document->getProperty('region');
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
            $hierarchyName = $hierarchyObj->getKey();

            $hierarchyFullName = $hierarchyPath.$hierarchyName;
            $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

            $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
            $productNameArr['Name'] = trim($productObject->getName());
            $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
            $productNameArr['ShortText'] = $productObject->getShortText();
            $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());
            
            $childrenData = [];

            $childObject = $this->getAllRegionChildern($productObject, $region);

            if($childObject)
            {
                foreach ($childObject as $childValue) {
                    if ($childValue->getPrintedCatalogFlag() === true) {
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

    /**
     * @Route("/contitech_cs_catalog/template_conti_protect_systems")
    */
    public function templateContiProtectSystemsAction(Request $request)
    {
        $region = $this->document->getProperty('region');
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

            $objParent = $productObject->getParent();

            $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';

            $childrenData = [];
            $childObject = $this->getAllRegionChildern($productObject, $region);

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
        $region = $this->document->getProperty('region');
        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_inspect_systems')->getElement();
        $productData = [];
        if($catalogTableObject)
        {
            $selectedProduct = $catalogTableObject->getProducts();
            $singleProduct = $selectedProduct[0];
            $productObject = DataObject\CSProducts::getById($singleProduct);
            
            $objParent = $productObject->getParent();

            $productData['HierarchyNameLevel2'] = $objParent?$objParent->getName():'';

            $productData['Name'] = $productObject->getName();
            $productData['ShortText'] = $productObject->getShortText();
            $productData['ProductImage'] = $productObject->getProductImage();
            $productData['ReportImage'] = $productObject->getReportImage();
            
            $productData['ApplicationImage'] = $productObject->getApplicationImage();
            $productData['Benefits'] = $this->getContiCleanBenefits($productObject);

            $childrenData = [];
            $childObject = $this->getAllRegionChildern($productObject, $region);

            if($childObject)
            {
                foreach ($childObject as $childValue) {
                    if($childValue->getPrintedCatalogFlag() === true){
                        $data['Name'] = $childValue->getName();
                        $data['ShortText'] = $childValue->getShortText();

                        $childrenData[] = $data;
                        unset($data);
                    }
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
        $region = $this->document->getProperty('region');
        $this->configProviderService = new ConfigProviderService();
        
        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');
        
        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_conti_pipe_belt')->getElement();
        $productData = [];
        
        if($catalogTableObject)
        {
            $selectedProduct    = $catalogTableObject->getProducts();
            $singleProduct      = $selectedProduct[0];

            $singleProductObj = DataObject\CSProducts::getById($singleProduct);
            $childProductData['Name'] = $singleProductObj->getName();
            $childProductData['ProductClaimSlogan'] = $singleProductObj->getProductClaimSlogan();
            $childProductData['ShortText'] = $singleProductObj->getShortText();
            $childProductData['ProductImage'] = $singleProductObj->getProductImage();
            $childProductData['productSpecificData'] = $this->prepareContiPipeAndMegaPipeAttributes($singleProductObj, $region);

            $FeaturesAndBenefits = [];
            if($singleProductObj->getCSProductFeaturesAndBenefits())
            {
                foreach ($singleProductObj->getCSProductFeaturesAndBenefits() as $value) {
                    $FeaturesAndBenefits[] = $value->getFeatureName();
                }
            }
            $childProductData['Benefits'] = $FeaturesAndBenefits;

            $productObject = $singleProductObj->getParent();

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
    
    /**
     * Prepare ContiPipe™ and MegaPipe® Sizes table data
     * @param object
     * @access private 
     * @return array
     */
    private function prepareContiPipeAndMegaPipeAttributes($productObject, $region)
    {
        $childObject = $this->getAllRegionChildern($productObject, $region);

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
                            $data[] = $obj_attr->$getBrick()->$getField();
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
            $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());;           
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
            $hierarchyName = $hierarchyObj->getKey();

            $hierarchyFullName = $hierarchyPath.$hierarchyName;
            $productHierarchyPath = \str_replace(CS_PPRODUCT_HIERARCHY_PATH, CS_PPRODUCT_PATH, $hierarchyFullName);

            $productObject = DataObject\CSProducts::getByPath($productHierarchyPath);
    
            $productNameArr['Name'] = trim($productObject->getName());
            $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
            $productNameArr['ShortText'] = $productObject->getShortText();
            $productNameArr['ProductImage'] = $productObject->getProductImage();
            $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
            $productNameArr['HierarchyNameLevel2'] = trim($productObject->getName());  
        }
        $this->view['data'] = $productNameArr;
        $this->view['footer_logo_src'] = $footer_logo_src;
    }
    
    /**
     * @Route("/contitech_cs_catalog/template_sybercord_technology")
    */
    public function templateSybercordTechnologyAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_sybercord_technology_construction_page')->getElement();

        $productNameArr = [];

        if($catalogTableObject)
        {
            $selectedProduct = $catalogTableObject->getProducts();

            if($selectedProduct){

                $singleProduct = $selectedProduct[0];
                $productObject = DataObject\CSProducts::getById($singleProduct);
                $parentProductObject = $productObject->getParent();
            
                $productNameArr['Name'] = trim($productObject->getName());
                $productNameArr['ProductClaimSlogan'] = $productObject->getProductClaimSlogan();
                $productNameArr['ShortText'] = $productObject->getShortText();
                $productNameArr['LogoImage'] = $productObject->getLogoImage();     
                $productNameArr['ProductImage'] = $productObject->getProductImage();
                $productNameArr['ApplicationImage'] = $productObject->getApplicationImage();
                
                $FeaturesAndBenefits = [];
                if($productObject->getCSProductFeaturesAndBenefits())
                {
                    foreach ($productObject->getCSProductFeaturesAndBenefits() as $value) {
                        $FeaturesAndBenefits[] = $value->getFeatureName();
                    }
                }

                $productNameArr['Features'] = $FeaturesAndBenefits;
                
                $productNameArr['CSProductApplications'] = $productObject->getCSProductApplications();
                $productNameArr['HierarchyNameLevel2'] = trim($parentProductObject->getName());
            }
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
    
            if(method_exists($objAttr,'getMaterial') && method_exists($objAttr->getMaterial(),'getMaterial'))
            {
                $arr = $objAttr->getMaterial()->getMaterial();

                if($arr)
                {
                    foreach($arr as $materialId)
                    {
                        $value = DataObject\CSMaterial::getById($materialId)->getMaterialName();
                        $materials[] = $value; 
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

    public function templateCreatedWithBricksAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();

        $footer_logo_src = $this->configProviderService->getDefaultImage('CS_footer_logo');

        $this->view['footer_logo_src'] = $footer_logo_src;
    }
}