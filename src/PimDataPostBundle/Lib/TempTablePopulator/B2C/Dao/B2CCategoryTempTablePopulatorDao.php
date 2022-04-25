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
        return $this->db->fetchCol($query);
    }

    public function isCategoryPresentInMasterTable($tableName, $categoryId)
    {
        $categoryId = trim($categoryId,',');
        $query = "SELECT o_id FROM {$tableName} where o_id = {$categoryId}";
        $resultSet =  $this->db->fetchCol($query);
        return ($resultSet) ? true : false;
    }

    public function isCategoryActiveInMasterTable($tableName, $categoryId)
    {
        $categoryId = trim($categoryId,',');
        $query = "SELECT o_id FROM {$tableName} where o_id = {$categoryId} AND onlineFlag = 1";
        $resultSet =  $this->db->fetchCol($query);
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
}