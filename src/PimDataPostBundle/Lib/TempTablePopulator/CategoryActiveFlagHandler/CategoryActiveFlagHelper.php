<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler;

use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao\B2BCategoryTempTablePopulatorDao;
use PimDataPostBundle\Lib\Constants;
// use Pimcore\Model\DataObject\B2BProductRelationChange;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
// use PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2BProductRelationChange;

class CategoryActiveFlagHelper
{
    private $dao;
    // private $commonHelper;
    // private $b2bProductAttributeConfigProvider;

    public function __construct()
    {
        $this->dao = new B2BCategoryTempTablePopulatorDao();
        // $this->commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        // $this->b2bProductAttributeConfigProvider = new B2BProductAttributeConfigProvider();
    }

    public function getAllCategoryIdsInMasterTable(ShopType $shopType): array
    {
        return $this->dao->iterateMasterTableCategories(Constants::B2B_CATEGORY_MASTER_TABLE_NAME);
    }

    public function getCategoryIdsWhereRelationWithProductChanged(ShopType $shopType): array
    {
        $list = new B2BProductRelationChange\Listing();
        $list->setCondition("attributeName = 'SIOPLevel4'");

        $categories = [];
        
        foreach($list as $obj){
            $categories[] = $obj->getNewValue();
        }
        return array_unique($categories);
    }

    public function isCategoryPresentInMasterTable(ShopType $shopType, int $categoryId): bool
    {
        return $this->dao->isCategoryPresentInMasterTable(Constants::B2B_CATEGORY_MASTER_TABLE_NAME, $categoryId);
    }

    public function isCategoryActiveInMasterTable(ShopType $shopType, int $categoryId): bool
    {
        return $this->dao->isCategoryActiveInMasterTable(Constants::B2B_CATEGORY_MASTER_TABLE_NAME, $categoryId);
    }

    public function isAnyActiveProductPresentInProductMasterForGivenCategory(ShopType $shopType, int $categoryId): bool
    {
        return $this->dao->isAnyActiveProductPresentInProductMasterForGivenCategory(Constants::B2B_PRODUCT_MASTER_TABLE_NAME, $categoryId);
    }
}