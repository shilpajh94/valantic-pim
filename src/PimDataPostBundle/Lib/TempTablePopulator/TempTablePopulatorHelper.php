<?php


namespace PimDataPostBundle\Lib\TempTablePopulator;


use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorDao;

class TempTablePopulatorHelper
{
    private $dao;

    public function __construct()
    {
        $this->dao = new TempTablePopulatorDao();
    }

    public function truncateTempTable(string $tableName): bool
    {
        return false;
    }

    public function filterIFSPTGProducts(array $productIds): array
    {
        return $this->dao->filterIFSPTGProducts($productIds);
    }

    private function getPimModifiedProductIdsWithProductType(string $productTableName): array
    {
        return $this->dao->getPimModifiedProductIdsWithProductType($productTableName);
    }

    public function getAllFertsToBeUpdatedForSalesforce(string $productTableName): array
    {
        $allModifiedProductIdsWithProductType = $this->getPimModifiedProductIdsWithProductType($productTableName);
        $returnValue = [];
        foreach($allModifiedProductIdsWithProductType as $productIdWithProductType){
            if($productIdWithProductType["ProductType"] == "base" ){
                $returnValue = array_merge($this->getFertIdsForBaseId($productIdWithProductType["o_id"]), $returnValue);
            }else if($productIdWithProductType["ProductType"] == "skeleton"){
                $returnValue = array_merge($this->getFertIdsForSkeletonId($productIdWithProductType["o_id"]), $returnValue);
            }else{
                $returnValue[] = $productIdWithProductType["o_id"];
            }
        }
        return $returnValue;
    }

    private function getFertIdsForBaseId(int $baseId): array
    {
        $skeletonIds = $this->dao->getChildrenObjectIds($baseId);
        $returnValue = [];
        foreach($skeletonIds as $skeletonId){
            $returnValue =  array_merge($this->getFertIdsForSkeletonId($skeletonId), $returnValue );
        }
        return $returnValue;
    }

    private function getFertIdsForSkeletonId(int $skeletonId): array
    {
        return $this->dao->getChildrenObjectIds($skeletonId);
    }

    public function getAllChildrenObjectsRecursively(array $parentIds, string $className)
    {
        $allChildren = [];
        $currentParents = $parentIds;

        while(!empty($currentParents)){
            $currentChildren = $this->dao->getAllImmediateChildrenData($currentParents);
            foreach($currentChildren as $children){
                if( $children["o_type"] === "object" && $children['o_className'] === $className ){
                    $allChildren[] = $children["o_id"];
                }
            }
            $currentParents = array_column($currentChildren,"o_id");
        }
        return $allChildren;
    }

    
}