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
use ContitechCS\ProductBundle\Services\ConfigProviderService;

/**
 * @package ContitechCS\ProductBundle\Controller
 * @Route("/contitech_cs_product/default")
 */

class DefaultController extends FrontendController
{
    private $configProviderService;

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
        $rolesList = new User\Role\Listing();
        $ownerRoles = UserConstants::ALLOWED_PRODUCT_OWNER_ROLES;
        $conditionArr = [];
        foreach ($ownerRoles as $roleName) {
            $conditionArr[] = 'name = ' . $rolesList->quote($roleName);
        }
        if (count($conditionArr) > 0) {
            $rolesList->setCondition(implode(" OR ", $conditionArr));
        }
        $rolesList->load();
        $roleIds = [];
        foreach ($rolesList as $role) {
            $roleIds[] = $role->getId();
        }
        $userList = new User\Listing();
        $conditionArr = [];
        foreach ($roleIds as $roleId) {
            $conditionArr[] = '( `roles` = ' . $userList->quote($roleId) . ' OR `roles` like ' . $userList->quote("%," . $roleId) . ' OR `roles` like ' . $userList->quote($roleId . ",%") . ' OR `roles` like ' . $userList->quote("%," . $roleId . ",%") . ' )';
        }
        if (count($conditionArr) > 0) {
            $userList->setCondition(implode(" OR ", $conditionArr));
        }
        $userList->load();

        $fieldArray = array();
        foreach ($userList as $list) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $list->getId();
            $fieldArrayTemp['name'] = $list->getName();
            $fieldArray[] = $fieldArrayTemp;
        }
        return $this->json(["userList" => $fieldArray]);
    }

    /**
     * @Route("/get_countries")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getCountries(Request $request)
    {
        die("ASDF");
        $this->configProviderService = new ConfigProviderService();
        $segmentCountryConfig = $this->configProviderService->getSegmentCountriesConfig();
        foreach ($segmentCountryConfig as $segment => $country) {
            echo $country . "\n\n";
        }
        die;
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

        $this->configProviderService = new ConfigProviderService();
        $unitValueConfig = $this->configProviderService->getUnitValueConfig();
        $success = true;
        $msg = "";
        $parentId = '';
        $natureOfProduct = 'Product Group';

        $productName = $request->get('productName');
        $currentUser = $request->get('currentUser');
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
                $natureOfProduct = "Final Product";
            }
            $productHier[] = $productName;

            $productHier = array_filter($productHier);
            $productHier = array_values($productHier);

            $allObjectBricks = [];
            $counter = 1;
            $productHierCount = count($productHier);
            $parentHierarchyObj = $parentObjForLeaf = '';
            foreach ($productHier as $key => $hierarchy) {

                $hierarchyArr = array_slice($productHier, 0, $key + 1);
                $hierarchyString = implode('/', $hierarchyArr);

                $productPath = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . $hierarchyString;

                $hierarchyPath = \str_replace(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER, ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER, $productPath);

                $hierarchyPathObj = DataObject\CSHierarchy::getByPath($hierarchyPath);

                if ($hierarchyPathObj) {
                    $parentObjForLeaf = $hierarchyPathObj;
                    if ($hierarchyPathObj->getLevel() != 'Level 1') {
                        $parentHierarchyObj = $hierarchyPathObj->getParent();
                    }
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
                        if ($hierarchyPathObj) {
                            $product->setParentCategory([$parentHierarchyObj]);
                        } else {
                            $product->setParentCategory([$parentObjForLeaf]);
                        }
                        $product->setPublished(true);
                        $product->setProductOwner($userId);
                        $product->setUserOwner($currentUser);
                        $product->setUserModification($currentUser);
                        //$product->setNatureOfProduct($natureOfProduct);
                        $product->setPublished(false);
                        // functionality to check if product is already exist or not, if already exists then display an error message saying “Duplicate product name”
                        if (!empty($productName)) {
                            $list = new \Pimcore\Model\DataObject\CSProducts\Listing();
                            $list->setCondition('Name = ?', $productName);
                            $uniqueProduct = $list->load();
                            if (!empty($uniqueProduct)) {
                                echo json_encode(array('success' => false, 'objectId' => $parentId, "msg" => "Duplicate product name"));
                                die;
                            }
                        }

                        if ($allObjectBricks) {
                            foreach ($allObjectBricks as $brick) {
                                $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
                                $brickObject = new $class($product);
                                foreach ($unitValueConfig as $unit => $unitValue) {


                                    $fieldKey = ucfirst($unitValue['fieldName']);
                                    $objectBrickFieldMethod = 'set' . $fieldKey;

                                    if ($unitValue['objectType'] == $brick) {
                                        $brickObject->$objectBrickFieldMethod($unitValue['fieldValue']);
                                    } else {
                                        continue;
                                    }
                                }
                                $method = 'set' . $brick;
                                $product->getProductAttributes()->$method($brickObject);
                            }
                        }

                        $product->save();
                        $parentId = $product->getId();
                        /** code added below to change workflow state on creation of product **/
                        /* $productWorkflow = \Pimcore::getContainer()->get('state_machine.product_enrichment');
			$productWorkflow->apply($product, 'send_to_process'); */
                        /** code added above to change workflow state on creation of product **/
                        \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\AppService')->createAssetsHierarch($product);
                        $msg =  "Product added successfully";
                    } catch (\Throwable $th) {
                        $success = false;
                        $msg =  $th->getMessage();
                    }
                } else {
                    $parentId = $CSProductObj->getId();
                    // echo "Inside Else";
                    // print_r($parentId);
                    // echo "\n\n";
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
