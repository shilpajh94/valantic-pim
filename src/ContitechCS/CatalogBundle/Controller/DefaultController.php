<?php

namespace ContitechCS\CatalogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use ContitechCS\ProductBundle\Services\ConfigProviderService;

class DefaultController extends FrontendController
{
    private $configProviderService;

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
        
        $hierarchyId = ($categoryObj->getCategory());
        $res['data'] = [];
        if($hierarchyId)
        {

            $hierarchyObj = DataObject\CSHierarchy::getById($hierarchyId);
            $hierarchyPath = $hierarchyObj->getPath();
            $hierarchyName = $hierarchyObj->getName();

            $hierarchyFullName = $hierarchyPath.$hierarchyName;
            $productHierarchyPath = \str_replace($hierarchyPath, CS_MATERIAL_HANDLIG_PRODUCTS_PATH, $hierarchyFullName);


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
                    $result[] = array('key' => trim($cat->getName()), 'value' => trim($cat->getId()));
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

        $productTables = 'Product Tables';
        if(isset($productDataImportConfig[$product][$productTables]))
        {
            foreach ($productDataImportConfig[$product][$productTables] as $table => $value) {
                $result[] = array('id' => trim($table), 'text' => trim($table));
            }
            $res['data'] = $result;
        }

        echo json_encode(['data' => $res['data']]);
        die;
    }

    /**
     * @Route("/contitech_cs_catalog/template_table_of_contents")
     */
    public function templateTableOfContentsAction(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();
        $getCatalogImageMappingConfig = $this->configProviderService->getCatalogImageMappingConfig();

        $footer_logo_src = $this->getS3ImageSrc($getCatalogImageMappingConfig['CatalogFooter']);
        $this->view['footer_logo_src'] = $footer_logo_src;
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_page")
     */
    public function templateProductPageAction(Request $request)
    {
        $catalogTableObject = $this->getDocumentTag('relation', 'cbs_template_product_page')->getElement();

        
        $productData = [];
        if($catalogTableObject)
        {
            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getCatalogProductTablesConfig();
                
            $catalogCategoryObjectId = $catalogTableObject->getParentId();
            $categoryObj = DataObject\CSCatalogCategory::getById($catalogCategoryObjectId);

            $productId = $catalogTableObject->getProducts();

            $productObj = DataObject\CSProducts::getById($productId);

            $productName =  trim($productObj->getName());

            if($productObj && isset($productDataImportConfig[$productName]))
            {
                $PGInfo = $productDataImportConfig[$productName]['Product Group Information'];

                $hierarchyId = $categoryObj->getCategory();
                if($hierarchyId)
                {
                    $hierarchyObj = DataObject\CSHierarchy::getById($hierarchyId);
                }

                $productData['HierarchyNameLevel2'] = $hierarchyObj->getName();
                $productData['HierarchyNameLevel1'] = $PGInfo['HierarchyNameLevel1'];

                $productData['ProductName'] = $productName;

                // $productData['ProductClaimSlogan'] = $productObj->getProductClaimSlogan();
                // $productData['ProductDescription'] = $productObj->getProductDescription();

                if($PGInfo['TitleTagSloganRequired'])
                {
                    $productData['TitleTagSloganRequired'] = $PGInfo['TitleTagSloganRequired'];
                }

                $productData['ShortTextRequired'] = $PGInfo['ShortTextRequired'];
                if(isset($PGInfo['ShortTextRequired']) && $PGInfo['ShortTextRequired'])
                {
                    $productData['ShortText'] = $productObj->getShortText();
                }

                $productData['LongTextRequired'] = $PGInfo['LongTextRequired'];
                if(isset($PGInfo['LongTextRequired']) && $PGInfo['LongTextRequired'])
                {
                    $productData['LongText'] = $productObj->getLongText();
                }
                
                $productData['ProductImageRequired'] = $PGInfo['ProductImageRequired'];
                if(isset($PGInfo['ProductImageRequired']) && $PGInfo['ProductImageRequired'])
                {
                    $productData['ProductImage'] = $productObj->getProductImage();
                }

                $productData['FeaturesRequired'] = $PGInfo['FeaturesRequired'];
                if(isset($PGInfo['FeaturesRequired']) && $PGInfo['FeaturesRequired'])
                {
                    $productData['Features'] = $productObj->getFeatures();
                }

                $productData['BenefitsRequired'] = $PGInfo['BenefitsRequired'];
                if(isset($PGInfo['BenefitsRequired']) && $PGInfo['BenefitsRequired'])
                {
                    $productData['Benefits'] = $productObj->getBenefits();
                }

                $productData['ApplicationRequired'] = $PGInfo['ApplicationRequired'];
                if( $PGInfo['ApplicationRequired'] && $productObj->getCSProductApplications())
                {
                    $applicationsHtml = '<ul>';
                    foreach ($productObj->getCSProductApplications() as $key => $value) {
                        $applicationsHtml .= '<li><span class="orange">›</span> '.$value->getApplicationName().' </li>';
                    }
                    $applicationsHtml .= '</ul>';
                }
                $productData['Applications'] = $applicationsHtml;

                $productData['MarketsRequired'] = $PGInfo['MarketsRequired'];
                if($PGInfo['MarketsRequired'] && $productObj->getCSProductIndustries())
                {
                    $marketsHtml = '<ul>';
                    foreach ($productObj->getCSProductIndustries() as $key => $value) {
                        $marketsHtml .= '<li><span class="orange">›</span> '.$value->getIndustryName().' </li>';
                    }
                    $marketsHtml .= '</ul>';
                }
                $productData['Markets'] = $marketsHtml;

                
                $productData['PowerOfFortressRequired'] = $PGInfo['PowerOfFortressRequired'];
                
                $productData['FeaturesAndBenefitRequired'] = $PGInfo['FeaturesAndBenefitRequired'];
                $FeaturesAndBenefits = [];
                if($PGInfo['FeaturesAndBenefitRequired'] && $productObj->getCSProductFeaturesAndBenefits())
                {
                    foreach ($productObj->getCSProductFeaturesAndBenefits() as $key => $value) {
                        if($value->getFeatureImage())
                        {
                            $feature['FeatureName'] = $value->getFeatureName();
                            $feature['FeatureDescription'] = $value->getFeatureDescription();
                            $feature['FeatureImage'] = $value->getFeatureImage();
                            $FeaturesAndBenefits[] = $feature;
                        }
                    }
                    
                }
                $productData['FeaturesAndBenefits'] = $FeaturesAndBenefits;
                $productData['CostPerTonRequired'] = $PGInfo['CostPerTonRequired'];;

                $children = $productObj->getChildren([DataObject::OBJECT_TYPE_OBJECT]);

                $productTables = array();
                if($children)
                {
                    

                    $tables = $productDataImportConfig[$productName]['Product Tables'];
                    // unset($tables['Conveyor Belt Data']);
                    // unset($tables['Load Support – Maximum Belt Width Data']);
                    // unset($tables['Troughability Minimum Belt Width']);
                    // unset($tables['Minimum Pulley Diameters']);
                    // unset($tables['Elevator Belt Data']);
                    // unset($tables['Maximum Bucket Projection']);
                    

                    foreach ($tables as $tablekey => $MetricImperialFields) {

                        $ColumnKeys = $MetricImperialFields['ColumnKeys'];
                        $TableComment = $MetricImperialFields['TableComment'];

                        unset($MetricImperialFields['ColumnKeys']);
                        unset($MetricImperialFields['TableComment']);
                        
                        if($MetricImperialFields){
                            

                            foreach ($MetricImperialFields as $MIKey => $MIValues) {
                                
                                unset($Idlers);
                                unset($HeaderKeys);
                                unset($RemoveKeys);
                                unset($AdditionalHeaderKey);
                                unset($AdditionalGroupKey);

                                if(isset($MIValues['Idlers']))
                                {
                                    $Idlers = $MIValues['Idlers'];
                                    unset($MIValues['Idlers']);
                                }
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

                                if(isset($MIValues['AdditionalHeaderKey']))
                                {
                                    $AdditionalHeaderKey = $MIValues['AdditionalHeaderKey'];
                                    unset($MIValues['AdditionalHeaderKey']);
                                }

                                if(isset($MIValues['AdditionalGroupKey']))
                                {
                                    $AdditionalGroupKey = $MIValues['AdditionalGroupKey'];
                                    unset($MIValues['AdditionalGroupKey']);
                                }

                                $keysTitle = [];
                                $groupingTitle = [];

                                if($AdditionalGroupKey)
                                {
                                    $groupingTitle[$AdditionalGroupKey] = 1;
                                }
                                
                                foreach ($MIValues as $key => $value) {
                                    $keysTitle[$key] = $value['fieldTitle'];
                                    
                                    if(isset($value['groupingTitle']))
                                    {
                                        $groupingTitle[$value['groupingTitle']] += 1;
                                    }
                                }
                                
                                $MIArray = array();
                                $theadSecondData = [];
                                $tableHeaderKeys = [];
                                $theadSecondData[] = $AdditionalHeaderKey;

                                if($Idlers)
                                {
                                    $theadSecondData[] = $AdditionalHeaderKey;
                                }

                                foreach ($children as $childValue) {

                                    $bricks = $childValue->getProductAttributes();
                                    $data = [];
                                    foreach ($MIValues as $key => $value) {
                                        $brickName = $value['objectType'];
                                        $getBrick = 'get' . $brickName;
                                        $getField = 'get' . $key;
                                        $data[$key] = $bricks->$getBrick()->$getField();
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

                                            if($Idlers)
                                            {
                                                $rows[]= 'Idlers';
                                            }
                                            $rows[]= $keysTitle[$tdkey];
                                            
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
                                        if(isset($keysTitle[$value]))
                                        {
                                            $theadSecondData[$key] = $keysTitle[$value];
                                        }
                                    }
                                    
                                    foreach ($MIArray as $variant) {

                                        $newKey = [];
                                        $newArray = [];

                                        if($RemoveKeys)
                                        {
                                            foreach ($RemoveKeys as $key => $value) {

                                                if(isset($variant[$key]))
                                                {
                                                    $newKey[] = $variant[$key];
                                                    unset($variant[$key]);
                                                }
                                            }
                                            $newArray[] = implode('/', $newKey);
                                            $newArray = \array_merge($newArray,$variant);
                                            $tbodyArray[] = array_values($newArray);
                                        }
                                    }
                                    $theadfirstColspan = count($tbodyArray[0]);
                                }
                                
                                $productTables[$tablekey][$MIKey]['tbody']= $tbodyArray;
                                $productTables[$tablekey][$MIKey]['theadfirstRowColspan']= $theadfirstColspan;
                                
                                
                                if($groupingTitle)
                                {
                                    $productTables[$tablekey][$MIKey]['theadSecondRowGroup']= $groupingTitle;
                                }
                                
                                $productTables[$tablekey][$MIKey]['theadSecondRow']= $theadSecondData;
                            }

                        }
                        $productTables[$tablekey]['TableComment']= $TableComment;

                    }

                }

                $productData['productTables'] = $productTables;
                $productData['productGroupInformation'] = $productTables;
            }

            // p_r($productData);
            // die;
            $this->view['data'] = $productData;

        }
    }

    /**
     * @Route("/contitech_cs_catalog/template_product_section_page")
     */
    public function templateProductSectionPageAction(Request $request)
    {
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
}
