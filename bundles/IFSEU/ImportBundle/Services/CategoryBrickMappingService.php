<?php

namespace IFSEU\ImportBundle\Services;


use Pimcore\Model\DataObject\IFSEUProduct;
use Pimcore\Model\DataObject\IFSEUProductCategory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;


class CategoryBrickMappingService
{
    /**
     * @var \IFSEU\ImportBundle\Services\ConfigProviderService
     */
    private $configProviderService;

    /**
     * CategoryBrickMappingService constructor.
     * @param \IFSEU\ImportBundle\Services\ConfigProviderService $configProviderService
     */

     private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->configProviderService= $this->container->get('ifs_eu_import.config_provider_service');
    }

    /**
     * add or remove bricks on the product based on the siop full code length and product type (base|skeleton|fert)
     *
     * @param IFSEUProduct $object
     * @throws \Exception
     */
    public function manageBricksForSIOPRelationChange(IFSEUProduct $object)
    {
        $catLevel = $this->getSIOPLevelBySIOPFullCode($object->getSiopFullCode());

        $selectedObjectBrickGroups = null;


        if ($catLevel) {
            $category = $this->getCategoryByLevel($object, $catLevel);

            if ($category instanceof IFSEUProductCategory) {
                $selectedObjectBrickGroups = $category->getRelatedObjectBrick();
            } else {

                // if category does not exist then ignore
                // $objectBrickGroups = array();
            }
        } else {
            // TODO: confirm this, needs to be decided yet
            // if valid category level is not found using the full code length, then ?
            // $objectBrickGroups = array();
        }

        $baseSkeletonFertLevels = $this->getBaseSkeletonFertLevelsToUpdateForProductType($object->getProductType());

        if (is_array($selectedObjectBrickGroups)) {
            // if $objectBrickGroups array is empty with size  = 0 then following implementation will remove all the bricks
            foreach ($baseSkeletonFertLevels as $baseSkeletonFertLevel) {
                if ($baseSkeletonFertLevel) {
                    $this->manageBrickForProductAtLevel($object, $selectedObjectBrickGroups, $baseSkeletonFertLevel);
                }
            }
        }

    }

    /**
     * check if any of the SIOP relation fields was edited by the user
     *
     * @param Request $request
     * @return bool
     */
    public function isSIOPRelationChangedInSaveRequest(Request $request)
    {
        // TODO: inform team about this logic and config requirement
        // these fields are managed in config to keep the system from performance issue
        $siopRelationFieldNamesInProductClass = $this->getCategoryConfigForKey('siopRelationFieldsInProductClass');
        $siopRelationChanged = false;
        $changedData = null;

        // getting edited data from http request
        if ($request->get('data')) {
            $changedData = json_decode($request->get('data'), true);
            foreach ($siopRelationFieldNamesInProductClass as $fieldName) {
                if (array_key_exists($fieldName, $changedData)) {
                    $siopRelationChanged = true;
                    break;
                }
            }
        }

        return $siopRelationChanged;
    }

    /**
     * check if SIOP full code was edited by the user
     *
     * @param Request $request
     * @return bool
     */
    public function isSIOPFullCodeChangedInSaveRequest(Request $request){
        $siopFullCodeChanged = false;
        $changedData = null;
        $fieldName = "siopFullCode";

        // getting edited data from http request
        if ($request->get('data')) {
            $changedData = json_decode($request->get('data'), true);
                if (array_key_exists($fieldName, $changedData)) {
                    $siopFullCodeChanged = true;
                }
        }
        return $siopFullCodeChanged;
    }

    /**
     * get the level of the SIOP relational field for the given full code length
     *
     * @param string $fullCode
     * @return int : 1|2|3|4|5|6|7
     */
    private function getSIOPLevelBySIOPFullCode(?string $fullCode): ?int
    {
        // if fullcode is null then make it empty string
        if (!$fullCode) {
            $fullCode = '';
        }
        $codeLength = strlen($fullCode);

        $catLevelToLengthMapping = $this->getCategoryConfigForKey('levelLength');
        $catLevel = null;

        foreach ($catLevelToLengthMapping as $level => $length) {
            if ($length == $codeLength) {
                $catLevel = $level;
                break;
            }
        }
        return $catLevel;
    }

    /**
     *
     * @param string $level : base|skeleton|fert
     * @return string
     */
    private function getBrickFieldNameInProductByLevel(string $level): string
    {
        $levelToField = $this->getBrickMappingConfigForKey('product_type_to_product_brick_field_mapping');
        return $levelToField[$level];
    }

    /**
     * add or remove the bricks according to the requirement in business logic
     *
     * @param IFSEUProduct $product
     * @param array $selectedClassificationNames : selected object brick groups
     * @param string $level
     * @return IFSEUProduct
     * @throws \Exception
     */
    private function manageBrickForProductAtLevel(IFSEUProduct $product, array $selectedClassificationNames, string $level): IFSEUProduct
    {
        $shouldBeAttachedBrickKeys = $this->getMappedBrickKeys($selectedClassificationNames, $level);
        $brickFieldName = $this->getBrickFieldNameInProductByLevel($level);
        $brickFromProductGetter = "get" . ucfirst($brickFieldName);
        $brickCollectionData = $product->$brickFromProductGetter();

        $allAllowedBrickKeys = $brickCollectionData->getAllowedBrickTypes();

        $addedItems = $brickCollectionData->getItems();
        $addedBrickKeys = array();
        foreach ($addedItems as $item) {
            $addedBrickKeys[] = $item->getType();
        }

        foreach ($allAllowedBrickKeys as $allowedBrickKey) {
            if (in_array($allowedBrickKey, $shouldBeAttachedBrickKeys)) {
                // this brick key should be attached to the product
                if (!in_array($allowedBrickKey, $addedBrickKeys)) {
                    // but this is not attached to product yet
                    // so add it
                    $this->addBrickToProductByKeyAtLevel($product, $allowedBrickKey, $level);
                }
            } else {
                // this brick key should not be attached to the product
                // so if already added then remove it
                if (in_array($allowedBrickKey, $addedBrickKeys)) {
                    $this->removeBrickFromProductByKeyAtLevel($product, $allowedBrickKey, $level);
                }
            }
        }
        return $product;
    }

    /**
     * remove the given brick at the given level
     * MUST save the product after this operation
     *
     * @param IFSEUProduct $product
     * @param string $key
     * @param string $level
     * @throws \Exception
     */
    private function removeBrickFromProductByKeyAtLevel(IFSEUProduct $product, string $key, string $level)
    {
        $brickFieldName = $this->getBrickFieldNameInProductByLevel($level);
        $brickFromProductGetter = "get" . ucfirst($brickFieldName);
        $brickFromBricksCollectionGetter = "get" . ucfirst($key);

        $productBricks = $product->$brickFromProductGetter();
        $brick = $productBricks->$brickFromBricksCollectionGetter();

        if ($brick) {
            $brick->setDoDelete(true);
        }
    }

    private function addBrickToProductByKeyAtLevel(IFSEUProduct $product, string $key, string $level)
    {

        $brickFieldName = $this->getBrickFieldNameInProductByLevel($level);
        $brickFromProductGetter = "get" . ucfirst($brickFieldName);
        $brickToBricksCollectionSetter = "set" . ucfirst($key);

        $brickNameSpace = "\\Pimcore\\Model\\DataObject\\Objectbrick\\Data\\" . $key;

        $brickObject = new $brickNameSpace($product);
        $product->$brickFromProductGetter()->$brickToBricksCollectionSetter($brickObject);

    }


    /**
     * return the brick keys which should be attached at the given level
     *
     * @param array $selectedClassificationNames
     * @param string $level : base|skeleton|fert
     * @return array
     */
    public function getMappedBrickKeys(array $selectedClassificationNames, string $level): array
    {
        $returnValue = array();
        $groupToBrickMapping = $this->getBrickMappingConfigForKey('group_name_to_brick_suffix_mapping');
        //dd($groupToBrickMapping);
        foreach ($selectedClassificationNames as $classificationName) {
            $brickKeyIdentifier = $groupToBrickMapping[$classificationName];
            $returnValue[] = $brickKeyIdentifier . ucfirst($level);
        }
        //dd($returnValue);
        return $returnValue;
    }


    /**
     * get the category object at the given SIOP level
     *
     * @param IFSEUProduct $product
     * @param int $level :     1|2|3|4|5|6|7
     * @return null|ProductCategory
     * @throws \Exception
     */
    private function getCategoryByLevel(IFSEUProduct $product, int $level): ?IFSEUProductCategory
    {
        $categoryFieldName = $this->getCategoryFieldNameByCategoryLevel($level);
        $categoryGetter = "get" . ucfirst($categoryFieldName);

        return $product->$categoryGetter()[0];
    }

    /**
     * get the name of the SIOP category field for the given SIOP level
     *
     * @param int $level : 1|2|3|4|5|6|7
     * @return string
     */
    private function getCategoryFieldNameByCategoryLevel(int $level): string
    {
        return "SIOPLevel" . strval($level);
    }

    /**
     * get the levels to update for product type
     *
     * @param null|string $productType base|skeleton|fert
     * @return array
     */
    private function getBaseSkeletonFertLevelsToUpdateForProductType(?string $productType): array
    {
        $returnValue = array();

        if ($productType) {
            $returnValue = array($productType);
        }
        return $returnValue;

    }

    /**
     * get required config from category config file
     *
     * @param string $key
     * @return array
     */
    private function getCategoryConfigForKey(string $key): array
    {
        $categoryConfig = $this->configProviderService->getCategoryConfig();
        return $categoryConfig['parameters'][$key];
    }

    /**
     * get the required config from brick mapping cofig file
     *
     * @param string $key
     * @return array
     */
    private function getBrickMappingConfigForKey(string $key): array
    {
        $brickMappingConfig = $this->configProviderService->getBrickMappingConfig();
        return $brickMappingConfig[$key];
    }

}