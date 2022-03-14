<?php

namespace PimDataPostBundle\Lib\TempTablePopulator;

class TempTablePopulatorDao
{
    private $db;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }

    public function truncate(string $tableName)
    {
        $sql = "TRUNCATE TABLE {$tableName}";
        $this->db->query($sql);
    }

    public function getTodaysSaleMasterModifiedRecords()
    {
        $query = "SELECT TRIM(BOTH ',' FROM  object_10.Material) AS o_id FROM object_10 WHERE  DATE(from_unixtime(`o_modificationDate`)) = CURDATE();";
        return $this->db->fetchCol($query);
    }

    public function getTodaysProductModifiedRecords()
    {
        $query = "SELECT `o_id` FROM object_1 WHERE  DATE(from_unixtime(`o_modificationDate`)) = CURDATE();";
        return $this->db->fetchCol($query);
    }
    
    public function getTodaysCategoryPimModifiedRecordIds()
    {
        $query = "SELECT `o_id` FROM object_2 WHERE  DATE(from_unixtime(`o_modificationDate`)) = CURDATE();";
        return $this->db->fetchCol($query);
    }

    public function prepareQueryAndFetchDbData(Array $attribute, Array $pimIDs): Array
    {
        echo "\n Preparing SQL query.";
        $productIds = implode(",",$pimIDs);
        $selectArray = []; 
        $selectString = "";           
        $secondJoinOnArray = [];
        $joinOnArray = [];
        $joinOnString = "";

        foreach ($attribute as $value) {
            if($value['hashField'])
            {
                continue;
            }

            if($value['conditionalFieldName'])
            {
                $selectArray[] = $value['conditionalFieldName'];
            }
            else{
                $selectArray[] = $value['pim_table_name'].".".$value['fieldName'];
            }
            
            
            if($value['joinOn'] && !in_array($value['joinOn'], $joinOnArray))
            {
                $joinOnArray[] = $value['joinOn'];
            }

            if($value['addOnJoin'] && !in_array($value['addOnJoin'], $secondJoinOnArray))
            {
                $secondJoinOnArray[] = $value['addOnJoin'];
            }
        }

        $joinOnArray = array_merge($joinOnArray, $secondJoinOnArray);

        $selectString = implode(', ', $selectArray);
        $joinOnString = implode(' ', $joinOnArray);

        echo "\n Fetch data.";

        $query = "SELECT {$selectString} FROM object_1 {$joinOnString} WHERE object_1.o_id IN (".$productIds.")";
        return $this->db->fetchAll($query);
    }

    public function prepareCategoryQueryAndFetchDbData(Array $attribute, Array $pimIDs): Array
    {
        echo "\n Category Preparing SQL query.";
        $productIds = implode(",",$pimIDs);
        $selectArray = []; 
        $selectString = "";           
        $secondJoinOnArray = [];
        $joinOnArray = [];
        $joinOnString = "";

        foreach ($attribute as $value) {
            if($value['hashField'])
            {
                continue;
            }

            if($value['conditionalFieldName'])
            {
                $selectArray[] = $value['conditionalFieldName'];
            }
            else{
                $selectArray[] = $value['pim_table_name'].".".$value['fieldName'];
            }
            
            
            if($value['joinOn'] && !in_array($value['joinOn'], $joinOnArray))
            {
                $joinOnArray[] = $value['joinOn'];
            }

            if($value['addOnJoin'] && !in_array($value['addOnJoin'], $secondJoinOnArray))
            {
                $secondJoinOnArray[] = $value['addOnJoin'];
            }
        }

        $joinOnArray = array_merge($joinOnArray, $secondJoinOnArray);

        $selectString = implode(', ', $selectArray);
        $joinOnString = implode(' ', $joinOnArray);

        echo "\n Fetch data.";

        $query = "SELECT {$selectString} FROM object_2 {$joinOnString} WHERE object_2.oo_id IN (".$productIds.")";
        return $this->db->fetchAll($query);
    }

    public function createHashData(Array $resultSet, Array $relationalFields): Array
    {
        $basicData = [];
        $relationalData = [];

        $dataInsert = [];

        foreach ($resultSet as $productArray) 
        {
            foreach ($productArray as $key => $value) {
                if(in_array($key,$relationalFields))
                {
                    $relationalData[$key] = $value;
                }
                else
                {
                    $basicData[$key] = $value;
                }
            }
            
            $basicHash = md5(json_encode($basicData, true));
            $relationalHash = md5(json_encode($relationalData, true));
    
            $data = array_merge($basicData,$relationalData);
            $data['basicHash'] = $basicHash;
            $data['relationalHash'] = $relationalHash;

            $dataInsert[] = $data;
        }

        return $dataInsert;
    }

    public function insertDataInTemp($arrData, $tempTable)
    {
        $insertArray = [];

        $keys = $arrData[0];

        foreach ($keys as $key => $value) {
            $insertArray[] = "`".$key."`";
        }

        $insertArrayString = implode(',',$insertArray);

        $rowCount = 1;
        $sql      = "INSERT INTO `{$tempTable}` ({$insertArrayString}) VALUES";
        $values   = '';

        foreach ($arrData as $data) {
            $strData = implode("','",$data);
            
            $values .= "('{$strData}'),";

            // inserting records in batch
            if ($rowCount % 50 == 0) {
                $query = $sql.rtrim($values, ',');
                $this->db->query($query);
                $values = '';
            }
            $rowCount++;
            unset($newData);
        }
        if ($values) {
            $query = $sql.rtrim($values, ',');
            $this->db->query($query);
        }
    }
    
    public function iterateMasterTableCategories($tableName)
    {
        $query = "SELECT `oo_id` FROM {$tableName}";
        return $this->db->fetchCol($query);
    }

    public function isCategoryPresentInMasterTable($tableName, $categoryId)
    {
        $query = "SELECT oo_id FROM {$tableName} where oo_id = {$categoryId}";
        $resultSet =  $this->db->fetchCol($query);
        return ($resultSet) ? true : false;
    }

    public function isCategoryActiveInMasterTable($tableName, $categoryId)
    {
        $query = "SELECT oo_id FROM {$tableName} where oo_id = {$categoryId} AND ShowInMenu = 1";
        $resultSet =  $this->db->fetchCol($query);
        return ($resultSet) ? true : false;
    }

    public function isAnyActiveProductPresentInProductMasterForGivenCategory($tableName, $categoryId)
    {
        $query = "SELECT `o_id` FROM {$tableName} WHERE (epixFlag = 1 AND o_published = 1) AND (TRIM(BOTH ',' FROM  SIOPLevel4) = {$categoryId}) ";
        $resultSet =  $this->db->fetchCol($query);
        return ($resultSet) ? true : false;
    }
    
}