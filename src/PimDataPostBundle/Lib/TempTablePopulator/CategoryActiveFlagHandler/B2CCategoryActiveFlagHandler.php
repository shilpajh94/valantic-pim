<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler;

use PimDataPostBundle\Model\Types\ShopType;

class B2CCategoryActiveFlagHandler extends AbstractCategoryActiveFlagHandler
{

    private $helper;

    private $shopType;

    public function __construct()
    {
        $this->helper = new B2CCategoryActiveFlagHelper();
        $this->shopType = ShopType::B2C();
    }

    public function getShopType(): ShopType
    {
        return $this->shopType;
    }

    public function getAllCategoryIdsInMasterTable(): array
    {
        return $this->helper->getAllCategoryIdsInMasterTable();
    }

    public function getCategoryIdToCategoryLevelMapping(array $categoryIds): array
    {
        return $this->helper->getCategoryIdToCategoryLevelMapping($categoryIds);
    }

    /**
     * return the value of the active flag for categories according to the
     * current product data like this ->
     * if there is any active product for the category then the category should be active
     * other wise the category should be inactite
     */
    public function getValueForActiveFlag(array $categoryIds): array
    {
        return $this->helper->getValueForActiveFlag($categoryIds);
    }

    /**
     * Change the value only if the value in the category was different
     * If the value is equal to what is needed to be set then do not hit save on the category object
     */
    public function updateActiveFlagValue(array $idAndActiveFlagValueArray): void
    {
        $this->helper->updateActiveFlagValue($idAndActiveFlagValueArray);
    }

    public function getCategoryIdsWhereRelationWithProductChanged(): array
    {
        return $this->helper->getCategoryIdsWhereRelationWithProductChanged();
    }

    public function isCategoryPresentInMasterTable(string $categoryId): bool
    {
        return $this->helper->isCategoryPresentInMasterTable($categoryId);
    }

    public function isCategoryActiveInMasterTable(string $categoryId): bool
    {
        return $this->helper->isCategoryActiveInMasterTable($categoryId);
    }
}