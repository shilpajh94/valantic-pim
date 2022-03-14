<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler;

use PimDataPostBundle\Model\Types\ShopType;
use Pimcore\Model\DataObject;

class B2BCategoryActiveFlagHandler extends AbstractCategoryActiveFlagHandler
{

    private $helper;

    private $shopType;

    public function __construct()
    {
        $this->helper = new CategoryActiveFlagHelper();
        $this->shopType = ShopType::B2B();
    }

    public function getShopType(): ShopType
    {
        return $this->shopType;
    }

    public function getAllCategoryIdsInMasterTable(): array
    {
        return $this->helper->getAllCategoryIdsInMasterTable($this->getShopType());
    }

    public function getValueForActiveFlag(array $categoryIds): array
    {

    }

    /**
     * Change the value only if the value in the category was different
     * If the value is equal to what is needed to be set then do not hit save on the category object
     */
    public function updateActiveFlagValue(array $idAndActiveFlagValueArray): void
    {

    }

    public function getCategoryIdsWhereRelationWithProductChanged(): array
    {
        return $this->helper->getCategoryIdsWhereRelationWithProductChanged($this->getShopType());
    }

    public function isCategoryPresentInMasterTable(int $categoryId): bool
    {
        return $this->helper->isCategoryPresentInMasterTable($this->getShopType(), $categoryId);
    }

    public function isCategoryActiveInMasterTable(int $categoryId): bool
    {
        return $this->helper->isCategoryActiveInMasterTable($this->getShopType(), $categoryId);
    }

    public function isAnyActiveProductPresentInProductMasterForGivenCategory(int $categoryId): bool
    {
        return $this->helper->isAnyActiveProductPresentInProductMasterForGivenCategory($this->getShopType(), $categoryId);
    }

    // public function updateRelationalPIMCategories($allRelationCategories)
    // {
    //     if($allRelationCategories)
    //     {
    //         p_r($allRelationCategories);
    //         $categoriesForTemp = [];
    //         foreach ($allRelationCategories as $categoryId) {
    //             $categoryData = $this->helper->isCategoryPresentInMasterTable($this->getShopType(),$categoryId);
    //             // p_r($categoryData);
    //             if($categoryData)
    //             {
    //                 if(!$categoryData[$categoryId])
    //                 {
    //                     $this->updateShowInMenuFlagInPIM($categoryId,$available);
    //                 }   
    //             }
    //             else{
    //                 $this->updateShowInMenuFlagInPIM($categoryId, false);
    //                 $categoriesForTemp[] = $categoryId;
    //             }

    //         }

    //         if($categoriesForTemp)
    //         {
    //             $this->addCategoriesInTemp($categoriesForTemp,$B2CB2BAttributeArray);
    //         }
            
    //     }

    // }

    // public function addCategoriesInTemp()
    // {
    //     $resultSetCategoriesDetail = $b2bCategoryTempTablePopulator->getTempTableDataForIds($resultSet);
    //     $resultSetCategoriesDetailWithHashData = $b2bCategoryTempTablePopulator->addHashesToTempTableData($resultSetCategoriesDetail);
    //     $b2bCategoryTempTablePopulator->insertDataInTempTable($resultSetCategoriesDetailWithHashData);
    // }

    public function updateShowInMenuFlagInPIM($catId, $showInMenu)
    {
        $showInMenu = ($showInMenu) ? 1 : 0;

        $hierarchyObj = DataObject\ProductCategory::getById($catId);
        if($hierarchyObj->getShowInMenu() != $showInMenu)
        {
            $hierarchyObj->setShowInMenu($showInMenu);
            $hierarchyObj->save();  
        }
        unset($hierarchyObj);
    }

    public function updatePIMCategories()
    {
        $masterTableCategories = $this->getAllCategoryIdsInMasterTable();

        if($masterTableCategories)
        {
            foreach ($masterTableCategories as $categoryId) {
                $isActiveProduct = $this->isAnyActiveProductPresentInProductMasterForGivenCategory($categoryId);
                $this->updateShowInMenuFlagInPIM($categoryId, $isActiveProduct);
            }
        }
    }
}