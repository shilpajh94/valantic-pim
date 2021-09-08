<?php

namespace ContitechCS\ProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use Pimcore\Model\User;
use ContitechCS\ImportBundle\Services\ImportConstants;
use ContitechCS\ProductBundle\Services\UserConstants;

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
     * @Route("/get_users")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getUsers(Request $request)
    {
        $userList = $filteredList = new User\Listing();
        $userList->load();

        $fieldArray = array();
        foreach ($userList as $list) {
            if ($list->getName() == UserConstants::USER_PRODUCT_MANAGER) {
                $parentId = $list->getId();
                $filteredList->setCondition('parentId = ?', $parentId);

                $filteredList->load();
                foreach ($filteredList as $fList) {
                    $fieldArrayTemp = array();
                    $fieldArrayTemp['id'] = $fList->getId();
                    $fieldArrayTemp['name'] = $fList->getName();
                    $fieldArray[] = $fieldArrayTemp;
                }
            }
        }
        return $this->json(["userList" => $fieldArray]);
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

        $productName = $request->get('productName');
        if (trim($productName)) {
            $productCategoryId = $request->get('categoryId');
            $productCategoryCheck = $request->get('productCategoryCheck');
            $userId = $request->get('userId');

            $CSHierarchyObj = DataObject\CSHierarchy::getById($productCategoryId);
            $CSHierarchyPath = $CSHierarchyObj->getPath();

            $relatedBricksSameLevel = $CSHierarchyObj->getRelatedBricks();

            $CSHierarchyName = $CSHierarchyObj->getName();

            $parentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER)->getId();   // createFolderByPath creates the folder assigned in the constant if not created and returns the path & if the folder is already present then returns the path of the folder.

            $CSHierarchyPath = \str_replace(ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER, "", $CSHierarchyPath);
            $CSHierarchyPath = trim($CSHierarchyPath, '/');
            $productHier = explode('/', $CSHierarchyPath);
            if (!$productCategoryCheck) {
                $productHier[] = $CSHierarchyName;
            }

            $productHier[] = $productName;

            $productHier = array_filter($productHier);
            $productHier = array_values($productHier);

            $allObjectBricks = [];
            $counter = 1;
            $productHierCount = count($productHier);
            foreach ($productHier as $key => $hierarchy) {

                $hierarchyArr = array_slice($productHier, 0, $key + 1);
                $hierarchyString = implode('/', $hierarchyArr);

                $productPath = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . $hierarchyString;

                $hierarchyPath = \str_replace(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER, ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER, $productPath);

                $hierarchyPathObj = DataObject\CSHierarchy::getByPath($hierarchyPath);

                if ($hierarchyPathObj) {
                    $CSHierarchyRelatedBricks = $hierarchyPathObj->getRelatedBricks();
                    if ($CSHierarchyRelatedBricks) {
                        $allObjectBricks = array_merge($allObjectBricks, $CSHierarchyRelatedBricks);
                    }
                }

                if ($counter == $productHierCount) {
                    $allObjectBricks = $relatedBricksSameLevel;
                }
                $allObjectBricks = array_unique($allObjectBricks);
                $CSProductObj = DataObject\CSProducts::getByPath($productPath);
                if (!$CSProductObj) {

                    try {

                        $product = new DataObject\CSProducts();
                        $product->setKey($hierarchy);
                        $product->setName($hierarchy, 'en');
                        $product->setParentId($parentId);
                        $product->setOmitMandatoryCheck(true);
                        $product->setPublished(true);
                        $product->setProductOwner($userId);
                        $product->setParentInfo($productCategoryId);

                        if ($allObjectBricks) {
                            foreach ($allObjectBricks as $brick) {
                                $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
                                $brickObject = new $class($product);
                                $method = 'set' . $brick;
                                $product->getProductAttributes()->$method($brickObject);
                            }
                        }

                        $result = $product->save();
                        $parentId = $result->getId();

                        $msg =  "Product added successfully";
                    } catch (\Throwable $th) {
                        $success = false;
                        $msg =  $th->getMessage();
                    }
                } else {
                    $parentId = $CSProductObj->getId();
                }
                $counter++;
            }
        } else {
            $success = false;
            $msg =  "Product name should not be empty.";
        }

        echo json_encode(array('success' => $success, 'objectId' => $parentId, "msg" => $msg));
        die;
    }
}
