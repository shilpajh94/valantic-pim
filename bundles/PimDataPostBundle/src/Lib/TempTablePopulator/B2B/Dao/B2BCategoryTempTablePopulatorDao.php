<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao;

use PimDataPostBundle\Lib\Constants;
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
        $query = "SELECT `id` FROM {$tableName}";
        return $this->db->fetchFirstColumn($query);
    }

    public function getCategoryIdToCategoryLevelMapping(array $categoryIds): array
    {
        if(empty($categoryIds)){
            return [];
        }
        $returnValue = [];

        $categoryIds = array_map(function(string $categoryIdWithComma){
            return trim($categoryIdWithComma,",");
        },$categoryIds);

        $query = "SELECT `id`,`Level` FROM " . Constants::B2B_CATEGORY_OBJECT_TABLE_NAME;
        $query .= " WHERE `id` IN " . "(" . implode(",",$categoryIds) . ")";

        $resultSet =  $this->db->fetchAllAssociative($query);
        foreach($resultSet as $index){
            $returnValue[$index["id"]] = $index["Level"];
        }
        return $returnValue;
    }

    public function isCategoryPresentInMasterTable($tableName, $categoryId)
    {
        $categoryId = trim($categoryId,',');
        $query = "SELECT id FROM {$tableName} where id = {$categoryId}";
        $resultSet =  $this->db->fetchFirstColumn($query);
        return ($resultSet) ? true : false;
    }

    public function isCategoryActiveInMasterTable($tableName, $categoryId)
    {
        $categoryId = trim($categoryId,',');
        $query = "SELECT id FROM {$tableName} where id = {$categoryId} AND ShowInMenu = 1";
        $resultSet =  $this->db->fetchFirstColumn($query);
        return ($resultSet) ? true : false;
    }

    public function getValueForActiveFlag($tableName, $categoryIds)
    {
        $categoriesActiveInactiveList = [];
        if($categoryIds)
        {
            foreach ($categoryIds as $categoryId => $categoryLevel) {
                $columnName = "SIOPLevel" . $categoryLevel;
                $categoryId = trim($categoryId,',');
                $query = "SELECT COUNT(`id`) FROM {$tableName} WHERE (epixFlag = 1 AND published = 1) AND  {$columnName} = ',{$categoryId},' ";
                $resultSet =  $this->db->fetchOne($query);
                $categoriesActiveInactiveList[$categoryId] = ($resultSet) ? true : false;
            }
        }
        return $categoriesActiveInactiveList;
    }
}