<?php

namespace ContitechCS\ProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;

/**
 * @package ContitechCS\ProductBundle\Controller
 * @Route("/contitech_cs_product/default")
 */

class DefaultController extends FrontendController
{
    /**
     * @Route("/contitech_cs_product")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from contitech_cs_product');
    }

    /**
     * @Route("/get_categories")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getCategories(Request $request)
    {
        $categoryList = new \Pimcore\Model\DataObject\CSHierarchy\Listing();
        $categoryList->load();
        

        $fieldArray = array();
        foreach ($categoryList as $list) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $list->getId();
            $fieldArrayTemp['name'] = $list->getName();
            $fieldArray[] = $fieldArrayTemp;
        }
        return $this->json(["categoryList" => $fieldArray]);
    }

    /**
     * @Route("/save_product")
     *
     * @param Request $request
     * 
     */
    public function saveProduct(Request $request)
    {
        $success = true;
        $msg = "";
        $parentId = '';
        $objectId = '';

        $productName = $request->get('productName');
        if (trim($productName)) {
            $productCategoryId = $request->get('categoryId');
            $CSHierarchyObj = DataObject\CSHierarchy::getById($productCategoryId);
            $CSHierarchyPath = $CSHierarchyObj->getPath();
            $CSHierarchyName = $CSHierarchyObj->getName();
            $CSHierarchyRelatedBricks = $CSHierarchyObj->getRelatedBricks();

            $productPath = \str_replace("Master Data/Product Hierarchy/", "Products/", $CSHierarchyPath . $CSHierarchyName);

            $CSProductObj = DataObject\CSProducts::getByPath($productPath);


            if ($CSProductObj) {
                $parentId = $CSProductObj->getId();
                try {
                    $product = new DataObject\CSProducts();
                    $product->setKey($productName);
                    $product->setName($productName, 'en');
                    $product->setParentId($parentId);
                    $product->setPublished(true);

                    foreach ($CSHierarchyRelatedBricks as $brick) {
                        $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
                        $brickObject = new $class($product);
                        $method = 'set' . $brick;
                        $product->getProductAttributes()->$method($brickObject);
                    }

                    $result = $product->save();
                    $objectId = $result->getId();

                    $msg =  "Product added successfully";
                } catch (\Throwable $th) {
                    $success = false;
                    $msg =  $th->getMessage();
                }
            } else {
                $success = false;
                $msg =  "Path not exist - " . $productPath;
            }
        } else {
            $success = false;
            $msg =  "Product name should not be empty.";
        }

        echo json_encode(array('success' => $success, 'objectId' => $objectId, "msg" => $msg));
        die;
    }
}
