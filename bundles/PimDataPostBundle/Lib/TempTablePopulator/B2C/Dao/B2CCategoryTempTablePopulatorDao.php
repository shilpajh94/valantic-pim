<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2C\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorDao;

class B2CCategoryTempTablePopulatorDao extends TempTablePopulatorDao
{
    private $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getDBInstance();
    }

    public function iterateMasterTableCategories($tableName)
    {
        $query = "SELECT `o_id` FROM {$tableName}";
        return $this->db->fetchFirstColumn($query);
    }

    public function productCategoryArrayFromProductMaster()
    {
        $query = "SELECT `o_id`, `B2CCategory` FROM ".Constants::B2C_PRODUCT_MASTER_TABLE_NAME." WHERE B2CStoreFlag = 1 AND o_published = 1";
        return $this->db->fetchAllAssociative($query);
    }

    public function productCategoryArrayFromRelation()
    {
        $query = "SELECT `productId`, `newValue` FROM salesforce_integration_b2c_product_relation_change WHERE attributeName = 'B2CCategory'";
        return $this->db->fetchAllAssociative($query);
    }

    public function isCategoryPresentInMasterTable($tableName, $categoryId)
    {
        $categoryId = trim($categoryId,',');
        $query = "SELECT o_id FROM {$tableName} where o_id = {$categoryId}";
        $resultSet =  $this->db->fetchFirstColumn($query);
        return ($resultSet) ? true : false;
    }

    public function isCategoryActiveInMasterTable($tableName, $categoryId)
    {
        $categoryId = trim($categoryId,',');
        $query = "SELECT o_id FROM {$tableName} where o_id = {$categoryId} AND onlineFlag = 1";
        $resultSet =  $this->db->fetchFirstColumn($query);
        return ($resultSet) ? true : false;
    }

    public function getValueForActiveFlag($tableName, $categoryIds)
    {
        $categoriesActiveInactiveList = [];
        if($categoryIds)
        {
            foreach ($categoryIds as $categoryId) {
                $columnName = "B2CCategory";
                $categoryId = trim($categoryId,',');
                $query = "SELECT COUNT(`o_id`) FROM {$tableName} WHERE (B2CStoreFlag = 1 AND o_published = 1) AND  {$columnName} = ',{$categoryId},' ";
                $resultSet =  $this->db->fetchOne($query);
                $categoriesActiveInactiveList[$categoryId] = ($resultSet) ? true : false;
            }
        }
        return $categoriesActiveInactiveList;
    }

    public function getObjectData(array $objectIds):array
    {
        if(empty($objectIds)){
            return [];
        }

        $sql = "SELECT o_id, o_parentId, o_type, o_className";
        $sql .= " FROM objects where o_id IN " . "(" . implode(",", $objectIds) . ")";
        return $this->db->fetchAssociative($sql);
    }
}