<?php

namespace PimDataPostBundle\Lib\TempTablePopulator;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Model\UpdateWindow;

class TempTablePopulatorDao
{
    private $db;
    private $updateWindow;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
        $this->updateWindow = UpdateWindow::getInstance();
    }

    public function getDBInstance()
    {
        return $this->db;
    }

    public function truncate(string $tableName)
    {
        if(trim($tableName))
        {
            $sql = "TRUNCATE TABLE {$tableName}";
            $this->db->query($sql);
        }
    }
    
    public function getPimModifiedRecordIds($tableName)
    {
        if(trim($tableName))
        {
            $startTime = $this->updateWindow->getStartTimestamp();
            $endTime = $this->updateWindow->getEndTimestamp();

            $query = "SELECT `o_id` FROM {$tableName} WHERE (`o_modificationDate` >= {$startTime} AND `o_modificationDate` <= {$endTime})";
            $resultSet = $this->db->fetchCol($query);
        }
        
        return ($resultSet) ? $resultSet : [];
    }

    public function getPimModifiedRecordIdsWhichAreAlsoPresentInMaster(string $objectTableName, string $masterTableName): array
    {

        $startTime = $this->updateWindow->getStartTimestamp();
        $endTime = $this->updateWindow->getEndTimestamp();

        $query = "SELECT {$objectTableName}.`o_id` FROM {$objectTableName}" ;
        $query .= " JOIN {$masterTableName} ON {$objectTableName}.`o_id` = {$masterTableName}.`o_id`";
        $query .= " WHERE (`o_modificationDate` >= {$startTime} AND `o_modificationDate` <= {$endTime})";
        return $this->db->fetchCol($query);
    }
    
    public function getTempTableDataForIds(Array $attribute, Array $pimIDs, String $tableName): Array
    {
        if($pimIDs && $attribute && $tableName)
        {
            array_walk($pimIDs, create_function('&$val','$val = trim($val,",");'));

            $productIds = implode(",",$pimIDs);
            $selectArray = []; 
            $selectString = "";           
            $secondJoinOnArray = [];
            $joinOnArray = [];
            $joinOnString = "";

            foreach ($attribute as $tableKey => $value) {
                if($value['hashField'])
                {
                    continue;
                }

                if($tableKey == 'epixFlag' && $value['pim_attribute_name'] == 'epixFlag')
                {
                    continue;
                }

                if($value['conditionalFieldName'])
                {
                    $selectArray[] = $value['conditionalFieldName'];
                }
                else{
                    $selectArray[] = $value['pim_table_name'].".".$value['pim_attribute_name']. " AS {$tableKey}";
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

            $query = "SELECT {$selectString} FROM {$tableName} {$joinOnString} WHERE {$tableName}.o_id IN (".$productIds.")";
            $resultSet = $this->db->fetchAll($query);
        }
        return ($resultSet) ? $resultSet : [];
    }

    public function addHashesToTempTableData(Array $resultSet, Array $relationalFields): Array
    {
        $basicData = [];
        $relationalData = [];

        $dataInsert = [];

        if($resultSet)
        {
            foreach ($resultSet as $productArray) 
            {
                foreach ($productArray as $key => $value) {
                    if(array_key_exists($key,$relationalFields))
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
        }
        return $dataInsert;
    }

    public function quoteString(?string $str)
    {
        return $str === null ? 'NULL' : $this->db->quote($str);   
    }

    public function insertDataInTempTable($arrData, $tempTable)
    {
        if($arrData && trim($tempTable))
        {
            $insertArray = [];

            $keys = $arrData[0];

            foreach ($keys as $key => $value) {
                $insertArray[] = "`".$key."`";
            }

            $insertArrayString = implode(',',$insertArray);

            $rowCount = 1;
            $sql      = "REPLACE INTO `{$tempTable}` ({$insertArrayString}) VALUES";
            $values   = '';

            foreach ($arrData as $data) {
                $data = array_map([$this,"quoteString"],$data);

                $strData = implode(",",$data);
                
                $values .= "({$strData}),";

                // inserting records in batch
                if ($rowCount % Constants::INSERT_BATCH_SIZE == 0) {
                    $query = $sql.rtrim($values, ',');
                    $this->db->query($query);
                    $values = '';
                }
                $rowCount++;
                unset($newData);
            }
            if ($values) {
                $query = $sql.rtrim($values, ',');
                $query;
                $this->db->query($query);
            }
        }
    }

    public function filterIFSPTGProducts(array $productIds): array
    {
        if($productIds)
        {
            $ifsCategoriesFullSIOPCode = array_values(Constants::IFS_CATEGORIES);
            $ptgCategoriesFullSIOPCode = array_values(Constants::PTG_CATEGORIES);
            $allCategoriesFullSIOPCode = array_merge($ifsCategoriesFullSIOPCode, $ptgCategoriesFullSIOPCode);
            $allCategoriesFullSIOPCodeString = implode(',', $allCategoriesFullSIOPCode);
            
            // Get all the categories id on the basis of SIOP full code
            $query = "SELECT o_id FROM object_2 WHERE fullCode IN ($allCategoriesFullSIOPCodeString)";
            $categoryIds = $this->db->fetchCol($query);

            $categoryIdsString = implode(',', $categoryIds);
            $productIdsString = implode(',', $productIds);
            
            // Get all the product ids that are belongs to SIOPLevel2
            $query = "SELECT o_id FROM object_1 WHERE TRIM(BOTH ',' FROM SIOPLevel2) IN ($categoryIdsString) and o_id IN ($productIdsString)";
            $resultSet = $this->db->fetchCol($query);
        }
        
        return ($resultSet) ? $resultSet : [];
    }
    
}