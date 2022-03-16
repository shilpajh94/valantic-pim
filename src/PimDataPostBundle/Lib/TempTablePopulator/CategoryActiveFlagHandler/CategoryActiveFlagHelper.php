<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler;

use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao\B2BCategoryTempTablePopulatorDao;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
use Pimcore\Model\DataObject;

class CategoryActiveFlagHelper
{
    private $dao;

    public function __construct()
    {
        $this->dao = new B2BCategoryTempTablePopulatorDao();
    }

    public function getAllCategoryIdsInMasterTable(): array
    {
        return $this->dao->iterateMasterTableCategories(Constants::B2B_CATEGORY_MASTER_TABLE_NAME);
    }

    public function getCategoryIdsWhereRelationWithProductChanged(): array
    {
        $list = new B2BProductRelationChange\Listing();
        $list->setCondition("attributeName = 'SIOPLevel4'");

        $categories = [];
        
        foreach($list as $obj){
            $categories[] = $obj->getNewValue();
        }
        return array_unique($categories);
    }

    public function isCategoryPresentInMasterTable(int $categoryId): bool
    {
        return $this->dao->isCategoryPresentInMasterTable(Constants::B2B_CATEGORY_MASTER_TABLE_NAME, $categoryId);
    }

    public function isCategoryActiveInMasterTable(int $categoryId): bool
    {
        return $this->dao->isCategoryActiveInMasterTable(Constants::B2B_CATEGORY_MASTER_TABLE_NAME, $categoryId);
    }

    public function getValueForActiveFlag(array $categoryIds): array
    {
        return $this->dao->getValueForActiveFlag(Constants::B2B_PRODUCT_MASTER_TABLE_NAME, $categoryIds);
    }

    public function updateActiveFlagValue(array $idAndActiveFlagValueArray): void
    {
        foreach ($idAndActiveFlagValueArray as $categoryId => $flag) {

            $hierarchyObj = DataObject\ProductCategory::getById($categoryId);

            $showInMenu = $hierarchyObj->getShowInMenu();
            $showInMenu = ($showInMenu) ? true : false;

            if($showInMenu != $flag)
            {
                $hierarchyObj->setShowInMenu($flag);
                $hierarchyObj->save();  
            }
        }
    }
}