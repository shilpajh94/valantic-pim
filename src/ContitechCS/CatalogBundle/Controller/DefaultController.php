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
                    $result[] = array('key' => $cat->getName(), 'value' => $cat->getId());
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

        if(isset($productDataImportConfig[$product]))
        {
            foreach ($productDataImportConfig[$product] as $table => $value) {
                $result[] = array('id' => $table, 'text' => $table);
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
            $catalogCategoryObjectId = $catalogTableObject->getParentId();
            $categoryObj = DataObject\CSCatalogCategory::getById($catalogCategoryObjectId);
        
            $hierarchyId = ($categoryObj->getCategory());
            if($hierarchyId)
            {
                $hierarchyObj = DataObject\CSHierarchy::getById($hierarchyId);
            }

            $productData['HierarchyNameLevel2'] = $hierarchyObj->getName();

            $productId = $catalogTableObject->getProducts();

            $productObj = DataObject\CSProducts::getById($productId);




            // p_r($productObj);
            // die;
            $productData['ProductName'] = $productObj->getName();
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
}
