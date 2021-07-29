<?php

namespace ContitechCS\ProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use ContitechCS\ImportBundle\Services\ImportConstants;

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
        //print_r($categoryList);die;

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


            $parentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER)->getId();   // createFolderByPath creates the folder assigned in the constant if not created and returns the path & if the folder is already present then returns the path of the folder.

            $CSHierarchyPath = \str_replace(ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER, "", $CSHierarchyPath);
            $CSHierarchyPath = trim($CSHierarchyPath,'/');
            $productHier = explode('/',$CSHierarchyPath);
            $productHier[] = $CSHierarchyName;
            $productHier[] = $productName;
            $productToCreate = $productHier[0];
            // p_r($productHier);
            // die;

            $productPath = ImportConstants::CONTITECH_CS_PRODUCT_FOLDER;

            $ss = $this->addCSProduct($parentId, $productHier, $productPath, $productToCreate, $CSHierarchyRelatedBricks);

            // p_r($CSProductHierArr);



            // die;

            // $productPath = \str_replace("Master Data/Product Hierarchy/", "Products/", $CSHierarchyPath . $CSHierarchyName);

            // $CSProductObj = DataObject\CSProducts::getByPath($productPath);


            // if ($CSProductObj) {
            //     $parentId = $CSProductObj->getId();
            //     try {
            //         $product = new DataObject\CSProducts();
            //         $product->setKey($productName);
            //         $product->setName($productName, 'en');
            //         $product->setParentId($parentId);
            //         $product->setPublished(true);

            //         if($CSHierarchyRelatedBricks) {
            //             foreach ($CSHierarchyRelatedBricks as $brick) {
            //                 $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
            //                 $brickObject = new $class($product);
            //                 $method = 'set' . $brick;
            //                 $product->getProductAttributes()->$method($brickObject);
            //             }
            //         }

            //         $result = $product->save();
                    // $objectId = $result->getId();

                    $msg =  "Product added successfully";
            //     } catch (\Throwable $th) {
            //         $success = false;
            //         $msg =  $th->getMessage();
            //     }
            // } else {
            //     $success = false;
            //     $msg =  "Path not exist - " . $productPath;
            // }
        } else {
            $success = false;
            $msg =  "Product name should not be empty.";
        }

        echo json_encode(array('success' => $success, 'objectId' => $ss, "msg" => $msg));
        die;
    }

    function addCSProduct($parentId, $productHier, $productPath, $productToCreate, $CSHierarchyRelatedBricks)
    {
        // $objectId = '';
        // if($productHier)
        // {
            
            $rawProductPath = "/".$productPath.'/'.$productToCreate;
            $CSProductObj = DataObject\CSProducts::getByPath($rawProductPath);
            
            if (!$CSProductObj) {

                $product = new DataObject\CSProducts();
                $product->setKey($productToCreate);
                $product->setName($productToCreate, 'en');
                $product->setParentId($parentId);
                $product->setPublished(true);

                if($CSHierarchyRelatedBricks) {
                    foreach ($CSHierarchyRelatedBricks as $brick) {
                        $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
                        $brickObject = new $class($product);
                        $method = 'set' . $brick;
                        $product->getProductAttributes()->$method($brickObject);
                    }
                }

                $result = $product->save();
                $objectId = $result->getId();
                echo "\n product - " .$productToCreate .' Created. id- '.$objectId;

            }else{
                $objectId = $CSProductObj->getId();
                echo "\n product - " .$productToCreate .' Already exist  id- '.$objectId;
            }

            array_shift($productHier);
            // echo "\n parentId - ".$objectId;
            p_r($productHier);
            if($productHier)
            {
                
                // echo "Khali hai";
                $productPath = $productPath.'/'.$productToCreate;
                $productToCreate = $productHier[0];

                echo "\n Go to Add - ". $productToCreate. ' inside - '. $productPath;

                $this->addCSProduct($objectId, $productHier, $productPath, $productToCreate, $CSHierarchyRelatedBricks);
            }
            echo "\n Return objectId - ". $objectId. "\n";
        // }
        return $objectId;
    }
}
