<?php

namespace CSProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;

/**
 * @package CSProductBundle\Controller
 * @Route("/admin/csproduct/default")
 */

class DefaultController extends FrontendController
{
    /**
     * @Route("/cs_product")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from cs_product');
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
        if(trim($productName))
        {
            $productCategoryId = $request->get('categoryId');
            $CSHierarchyObj = DataObject\CSHierarchy::getById($productCategoryId);
            $CSHierarchyPath = $CSHierarchyObj->getPath();
            $CSHierarchyName = $CSHierarchyObj->getName();

            $productPath = \str_replace("Master Data/Product Hierarchy/", "Products/", $CSHierarchyPath.$CSHierarchyName);

            $CSProductObj = DataObject\CSProducts::getByPath($productPath);

            
            if($CSProductObj)
            {
                $parentId = $CSProductObj->getId();
                try {
                    $product = new DataObject\CSProducts();
                    $product->setKey($productName);
                    $product->setName($productName, 'en');
                    $product->setParentId($parentId);
                    $product->setPublished(TRUE);
                    $result = $product->save();
                    $objectId = $result->getId();

                    $msg =  "Product added successfully";

                } catch (\Throwable $th) {
                    $success = false;
                    $msg =  $th->getMessage();
                }
            }
            else{
                $success = false;
                $msg =  "Path not exist - ". $productPath;
            }
        }
        else{
            $success = false;
            $msg =  "Product name should not be empty.";
        }
        
        echo json_encode(array('success'=>$success, 'objectId'=> $objectId ,"msg"=> $msg));
        die;
    }
}
