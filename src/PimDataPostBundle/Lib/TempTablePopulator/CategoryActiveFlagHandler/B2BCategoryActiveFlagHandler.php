<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler;

use PimDataPostBundle\Model\Types\ShopType;

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
        return $this->helper->getAllCategoryIdsInMasterTable();
    }

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

    public function isCategoryPresentInMasterTable(int $categoryId): bool
    {
        return $this->helper->isCategoryPresentInMasterTable($categoryId);
    }

    public function isCategoryActiveInMasterTable(int $categoryId): bool
    {
        return $this->helper->isCategoryActiveInMasterTable($categoryId);
    }
}