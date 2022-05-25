<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2C;

use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Lib\TempTablePopulator\B2C\Dao\B2CCategoryTempTablePopulatorDao;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;
use Pimcore\Model\DataObject;

class B2CCategoryActiveFlagHelper
{
    private $dao;

    public function __construct()
    {
        $this->dao = new B2CCategoryTempTablePopulatorDao();
    }

    public function getAllCategoryIdsInMasterTable(): array
    {
        return $this->dao->iterateMasterTableCategories(Constants::B2C_CATEGORY_MASTER_TABLE_NAME);
    }

    public function getAllAssociatesActiveCategories(): array
    {
        $productCategoryArrayFromProductMaster = $this->productCategoryArrayFromProductMaster();
        $productCategoryArrayFromRelation= $this->productCategoryArrayFromRelation();
        $finalArray = array_replace($productCategoryArrayFromProductMaster, $productCategoryArrayFromRelation);
        $activeCategories = array_values($finalArray);
        array_unique($activeCategories);
        return $this->trimIdsInArray($activeCategories);
    }

    public function trimIdsInArray(array $activeCategories): array
    {
        $returnArray = [];
        foreach($activeCategories as $val){
            if($val!='') {
                $returnArray[] =  trim($val,',');
            }
        }
        return $returnArray;
    }

    public function productCategoryArrayFromProductMaster(): array
    {
        $masterArray = $this->dao->productCategoryArrayFromProductMaster();
        $o_id = array_column($masterArray, 'o_id');
        $category = array_column($masterArray, 'B2CCategory');
        return array_combine($o_id, $category);
    }

    public function productCategoryArrayFromRelation(): array
    {
        $relationArray = $this->dao->productCategoryArrayFromRelation();
        $productId = array_column($relationArray, 'productId');
        $newValue = array_column($relationArray, 'newValue');
        return array_combine($productId, $newValue);
    }

    public function getCategoryIdsWhereRelationWithProductChanged(): array
    {
        $list = new B2CProductRelationChange\Listing();

        $categories = [];
        
        foreach($list as $obj){
            $categories[] = $obj->getNewValue();
        }
        return array_values(array_unique($categories));
    }

    public function isCategoryPresentInMasterTable(string $categoryId): bool
    {
        return $this->dao->isCategoryPresentInMasterTable(Constants::B2C_CATEGORY_MASTER_TABLE_NAME, $categoryId);
    }

    public function isCategoryActiveInMasterTable(string $categoryId): bool
    {
        return $this->dao->isCategoryActiveInMasterTable(Constants::B2C_CATEGORY_MASTER_TABLE_NAME, $categoryId);
    }

    public function getValueForActiveFlag(array $categoryIds): array
    {
        return $this->dao->getValueForActiveFlag(Constants::B2C_PRODUCT_MASTER_TABLE_NAME, $categoryIds);
    }

    public function updateActiveFlagValue(array $idAndActiveFlagValueArray): void
    {
        if($idAndActiveFlagValueArray)
        {
            foreach ($idAndActiveFlagValueArray as $categoryId => $flag) {
                $categoryId = trim($categoryId, ',');
                $hierarchyObj = DataObject\B2CCategory::getById($categoryId);
                $hierarchyObj->setGetInheritedValues(false);

                $onlineFlag = $hierarchyObj->getOnlineFlag();
                $onlineFlag = ($onlineFlag) ? true : false;

                if($onlineFlag != $flag)
                {
                    $hierarchyObj->setOnlineFlag($flag);
                    $hierarchyObj->save();  
                }
            }
        }
    }

    public function getUniqueParentIdsForObjectIdOfGivenClass(string $className, array $objectIds): array
    {
        $parentObjectIds = [];
        return $this->getParentIdsForObjects($className, $objectIds, $parentObjectIds);
    }

    private function getParentIdsForObjects(string $className, array $objectIds, array $parentObjectIds): array
    {
        $objectIdsForNextIteration = [];

        if(empty($objectIds)){
            return $parentObjectIds;
        }

        $categoryData = $this->dao->getObjectData($objectIds);

        foreach($categoryData as $data){

            if($data["o_className"] === $className){
                $parentObjectIds[] = $data["o_id"];
            }

            if($data["o_parentId"] !== "1" && !in_array($data["o_parentId"], $parentObjectIds) ){
                $objectIdsForNextIteration[] = $data["o_parentId"];
            }
        }

        return $this->getParentIdsForObjects($className, $objectIdsForNextIteration, $parentObjectIds);
    }
}