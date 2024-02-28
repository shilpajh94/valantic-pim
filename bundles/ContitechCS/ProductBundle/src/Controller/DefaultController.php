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
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @package ContitechCS\ProductBundle\Controller
 * @Route("/contitech_cs_product/default")
 */

class DefaultController extends FrontendController
{
    private $configProviderService;
    const ROLES_LIKE = ' OR `roles` like ';
    protected $containerInterface;

    public function __construct(ContainerInterface $container)
    {
        $this->containerInterface = $container;
    }

    /**
     * @Route("/contitech_cs_product")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from contitech_cs_product');
    }

    /**
     * @Route("/contitech_cs_product/emailTemplate")
     */
    public function emailTemplateAction(Request $request)
    {
        return $this->render("contitech_cs_product/CSWorkflowReportTemplate/emailTemplate.html.twig");
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
        $param = $request->get('param');
        if ($param == 'owner') {
            $ownerRoles = UserConstants::ALLOWED_PRODUCT_OWNER_ROLES;
        } elseif ($param == 'marcom') {
            $ownerRoles = UserConstants::ALLOWED_PRODUCT_MARCOM_ROLES;
        } else {
            $ownerRoles = UserConstants::ALLOWED_PRODUCT_EDITOR_ROLES;
        }
        $rolesList = new User\Role\Listing();
        //$ownerRoles = UserConstants::ALLOWED_PRODUCT_OWNER_ROLES;
        $conditionArr = [];
        foreach ($ownerRoles as $roleName) {
            $conditionArr[] = 'name = ' . $rolesList->quote($roleName);
        }
        if (!empty($conditionArr)) {
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
            $conditionArr[] = '( `roles` = ' . $userList->quote($roleId) . self::ROLES_LIKE .
            $userList->quote("%," . $roleId) . self::ROLES_LIKE . $userList->quote($roleId . ",%") .
            self::ROLES_LIKE . $userList->quote("%," . $roleId . ",%") . ' )';
        }
        if (!empty($conditionArr)) {
            $userList->setCondition(implode(" OR ", $conditionArr));
        }
        $userList->load();

        $fieldArray = array();
        foreach ($userList as $list) {
            if ($list instanceof \Pimcore\Model\User) {
                $fieldArrayTemp = array();
                $fieldArrayTemp['id'] = $list->getId();

                $username = $list->getName();
                if (!empty($list->getFirstname()) || !empty($list->getLastname())) {
                    $nameArray = [];
                    if (!empty($list->getFirstname())) {
                        $nameArray[] = $list->getFirstname();
                    }
                    if (!empty($list->getLastname())) {
                        $nameArray[] = $list->getLastname();
                    }
                    $username .= " (" . implode(" ", $nameArray) . ")";
                }
                $fieldArrayTemp['name'] = $username;
                $fieldArray[] = $fieldArrayTemp;
            }
        }
        return $this->json(["userList" => $fieldArray]);
    }

    /**
     * @Route("/get_parent_bricks")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getParentBricks(Request $request)
    {
        $result = [];
        $parentId = $request->get('parentId');
        $parentId = json_decode($parentId);
        if ($parentId) {
            $hierarchyObj = new \Pimcore\Model\DataObject\CSHierarchy;
            $parentObj = $hierarchyObj::getById($parentId);
            if ($parentObj) {
                $parentBricks = $hierarchyObj::getById($parentId)->getRelatedBricks();
                if ($parentBricks) {
                    foreach ($parentBricks as $parentBrick) {
                        $result[] = array('text' => $parentBrick, 'id' => $parentBrick);
                    }
                }
            }
        }
        $res['data'] = $result;
        echo json_encode(['data' => $res['data']]);
        die;
    }


    /**
     * @Route("/get_countries")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getCountries(Request $request)
    {
        $segmentId = $request->get('segmentId');
        $segmentId = json_decode($segmentId);
        $this->configProviderService = new ConfigProviderService();
        $segmentCountryConfig = $this->configProviderService->getSegmentCountriesConfig();
        if ($segmentId) {
            foreach ($segmentId as $id) {
                foreach ($segmentCountryConfig as $segment => $countries) {
                    $segmentObj = new \Pimcore\Model\DataObject\CSSegment;
                    $requestedSegmentName = $segmentObj::getById($id)->getSegmentName();
                    if ($segment == $requestedSegmentName) {
                        foreach ($countries as $country) {
                            $result[] = array('text' => $country, 'id' => $country);
                        }
                    }
                }
            }
        }
        $res['data'] = $result;
        echo json_encode(['data' => $res['data']]);
        die;
    }

    /**
     * @Route("/get_countries_complete")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getCountriesComplete(Request $request)
    {
        $this->configProviderService = new ConfigProviderService();
        $segmentCountryConfig = $this->configProviderService->getSegmentCountriesConfig();

        foreach ($segmentCountryConfig as $countries) {
            foreach ($countries as $country) {
                $result[] = array('text' => $country, 'id' => $country);
            }
        }

        $res['data'] = $result;
        echo json_encode(['data' => $res['data']]);
        die;
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
        // $natureOfProduct = 'Product Group';

        $productName = $request->get('productName');
        $currentUser = $request->get('currentUser');
        if (trim($productName)) {
            $productCategoryId = $request->get('categoryId');
            $productCategoryCheck = $request->get('productCategoryCheck');
            $userId = $request->get('userId');
            $marcomId = $request->get('marcomId');
            $editorId = $request->get('editorId');

            $csHierarchyObj = DataObject\CSHierarchy::getById($productCategoryId);
            $csHierarchyPath = $csHierarchyObj->getPath();

            $relatedBricksSameLevel = $csHierarchyObj->getRelatedBricks();

            // $CSHierarchyName = $csHierarchyObj->getName();

            $parentId = DataObject\Service::createFolderByPath(
                ImportConstants::CONTITECH_CS_PRODUCT_FOLDER
                )->getId();   // createFolderByPath creates the folder assigned in the constant if not created
                // and returns the path & if the folder is already present then returns the path of the folder.

            $csHierarchyPath = \str_replace(ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER,
                "", $csHierarchyPath);
            $csHierarchyPath = trim($csHierarchyPath, '/');
            $productHier = explode('/', $csHierarchyPath);

            if (!$productCategoryCheck) {
                $productHier[] = $csHierarchyPath;
                // $natureOfProduct = "Final Product";
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

                $hierarchyPath = \str_replace(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER,
                    ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER, $productPath);

                $hierarchyPathObj = DataObject\CSHierarchy::getByPath($hierarchyPath);

                if ($hierarchyPathObj) {
                    $parentObjForLeaf = $hierarchyPathObj;
                    if ($hierarchyPathObj->getLevel() != 'Level 1') {
                        $parentHierarchyObj = $hierarchyPathObj->getParent();
                    }
                    $csHierarchyRelatedBricks = $hierarchyPathObj->getRelatedBricks();
                    if ($csHierarchyRelatedBricks) {
                        $allObjectBricks = array_merge($allObjectBricks, $csHierarchyRelatedBricks);
                    }
                }
                if ($counter == $productHierCount) {
                    $allObjectBricks = $relatedBricksSameLevel;
                }
                if (is_array($allObjectBricks) && !empty($allObjectBricks)) {
                    $allObjectBricks = array_unique($allObjectBricks);
                }

                $csProductObj = DataObject\CSProducts::getByPath($productPath);
                if (!$csProductObj) {

                    try {
                        $product = new DataObject\CSProducts();
                        $product->setKey($hierarchy);
                        $product->setName($hierarchy, 'en');
                        $product->setParentId($parentId);
                        $product->setOmitMandatoryCheck(true);
                        if ($hierarchyPathObj) {
                            $product->setParentCategory([$parentHierarchyObj]);
                        } else {
                            if($parentObjForLeaf){
                                $product->setParentCategory([$parentObjForLeaf]);
                            }
                            else{
                                $product->setParentCategory(null);
                            }
                        }
                        $product->setPublished(true);
                        $product->setProductOwner($userId);
                        $product->setMarcomUser($marcomId);
                        $product->setRnDUser($editorId);
                        $product->setUserOwner($currentUser);
                        $product->setUserModification($currentUser);
                        //$product->setNatureOfProduct($natureOfProduct);
                        $product->setPublished(false);
                        // functionality to check if product is already exist or not,
                        // if already exists then display an error message saying “Duplicate product name”
                        if (!empty($productName)) {
                            $list = new \Pimcore\Model\DataObject\CSProducts\Listing();
                            $list->setCondition('Name = ?', $productName);
                            $uniqueProduct = $list->load();
                            if (!empty($uniqueProduct)) {
                                echo json_encode(array(
                                    'success' => false,
                                    'objectId' => $parentId,
                                    "msg" => "Duplicate product name"
                                ));
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
                                $brickObject->setFieldname('ProductAttributes');
                                $method = 'set' . $brick;
                                $product->getProductAttributes()->$method($brickObject);
                            }
                        }

                        $product->save();
                        $parentId = $product->getId();
                        $prd = DataObject\CSProducts::getById($parentId);
                        $prd->save();
                        /** code added below to change workflow state on creation of product **/

                        /** code added above to change workflow state on creation of product **/
                        $this->containerInterface->get('ContitechCS\ProductBundle\Services\AppService')
                            ->createAssetsHierarch($prd);
                        $success = true;
                        $msg =  "Product added successfully";
                    } catch (\Throwable $th) {
                        $success = false;
                        $msg =  $th->getMessage();
                    }
                } else {
                    $parentId = $csProductObj->getId();
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
