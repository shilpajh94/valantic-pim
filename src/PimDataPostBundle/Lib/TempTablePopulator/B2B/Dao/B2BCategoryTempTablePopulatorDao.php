<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao;

use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorDao;

class B2BCategoryTempTablePopulatorDao extends TempTablePopulatorDao
{
    private $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getDBInstance();
    }

    public function iterateMasterTableCategories($tableName)
    {
        $query = "SELECT `oo_id` FROM {$tableName}";
        return $this->db->fetchCol($query);
    }

    public function isCategoryPresentInMasterTable($tableName, $categoryId)
    {
        $categoryId = trim($categoryId,',');
        $query = "SELECT oo_id FROM {$tableName} where oo_id = {$categoryId}";
        $resultSet =  $this->db->fetchCol($query);
        return ($resultSet) ? true : false;
    }

    public function isCategoryActiveInMasterTable($tableName, $categoryId)
    {
        $categoryId = trim($categoryId,',');
        $query = "SELECT oo_id FROM {$tableName} where oo_id = {$categoryId} AND ShowInMenu = 1";
        $resultSet =  $this->db->fetchCol($query);
        return ($resultSet) ? true : false;
    }

    public function getValueForActiveFlag($tableName, $categoryIds)
    {
        $categoriesActiveInactiveList = [];
        if($categoryIds)
        {
            foreach ($categoryIds as $categoryId) {
                $categoryId = trim($categoryId,',');
                $query = "SELECT `o_id` FROM {$tableName} WHERE (epixFlag = 1 AND o_published = 1) AND (TRIM(BOTH ',' FROM  SIOPLevel4) = {$categoryId}) ";
                $resultSet =  $this->db->fetchCol($query);
                $categoriesActiveInactiveList[$categoryId] = ($resultSet) ? true : false;
            }
        }
        return $categoriesActiveInactiveList;
    }
}