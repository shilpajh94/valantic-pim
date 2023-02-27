<?php

namespace IFSEU\ImportBundle\Model;

use Pimcore\Db;
use IFSEU\ImportBundle\Services\ImportConstants;
use Exception;

class PriceModel 
{
    private $tempTable;
    private $masterTable;
    private $logTable;
    private $db;

    /**
     * Function is constructor and set the db connection
     */
    public function __construct()
    {
        $this->db           = Db::get();
        $this->tempTable    = "ifseu_material_list_price_import_temp";
        $this->masterTable  = "ifseu_material_list_price_import_master";
        $this->logTable     = 'ifseu_material_list_price_import_log';
    }
    
    /**
     * Function to truncate temp table
     */
    public function truncateTempTable() {
        try {
            $sql = "TRUNCATE TABLE $this->tempTable";
            $this->db->query($sql);
        } catch (Exception $ex) {
            return ([
                "success" => false,
                "message" => $ex->getMessage()
            ]);
        }
    }
    
    /**
     * Function to insert data in temp table
     */
    public function insertDataInTemp($dataArray)
    {
        $consolidatedArray = [];
        foreach ($dataArray as $record) {
            $articleNumber = $record[0];
            $consolidatedArray[$articleNumber][] = $record;
        }
        $rowCount = 1;
        $sql      = "INSERT INTO {$this->tempTable} (id, record, hash) VALUES";
        $values   = '';
        $update = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `hash` = `hash` ";
        foreach ($consolidatedArray as $key => $data) {
            $valueArray = [];
            $record = (json_encode($data, true));
            $hash   = md5($record);
            $valueArray[] = $this->db->quote($key);
            $valueArray[] = $this->db->quote($record);
            $valueArray[] = $this->db->quote($hash);
            $values .= '('.implode(", ", $valueArray).'),';

            // inserting records in batch
            if ($rowCount % 500 == 0) {
                $query = $sql.rtrim($values, ',').$update;
                $this->db->query($query);
                $values = '';
            }
            $rowCount++;
        }
        if ($values) {
            $query = $sql.rtrim($values, ',').$update ;
            $this->db->query($query);
        }
    }
    
    /**
     * Function to find the Delta record(s)
     *
     * @return array
     */
    public function getDelta()
    {
        try {
            $sql   = "SELECT t.id, t.record FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE (t.hash != m.hash OR m.id is null) ";
            return $this->db->fetchAll($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    /**
     * Function to get deleted records
     */
    public function getDeletedPriceDataProducts() {
        $sql   = "SELECT m.id FROM {$this->masterTable} m LEFT JOIN {$this->tempTable} t ON t.id = m.id WHERE t.id IS NULL";
        return $this->db->fetchAll($sql);
    }
    
    /**
     * Function to get all products
     */
    public function getAllProducts() {
        $sql   = "SELECT oo_id, materialNumber, priceData FROM `object_query_IFSEUProduct` WHERE materialNumber IS NOT NULL";
        $queryData = $this->db->fetchAll($sql);

        return [
            'queryTableData' => $queryData
        ];
    }
    
    /**
     * Function to insert data into product query and store tables
     */
    public function insertDataIntoTable($dataArray, $tableName) {
        try {
            $rowCount = 1;
            $firstRec = $dataArray[0];
            $keys = array_keys($firstRec);
            $sql = "INSERT INTO {$tableName} ";
            $sqlColumns = [];
            $updateColumns = [];
            $valColumns = [];
            foreach ($keys as $key) {
                    $sqlColumns[] = "`".$key."`";
                    if ($key!='oo_id') {
                            $updateColumns[] = "`".$key."`= VALUES(`".$key."`)";
                    }
                    $valColumns[] = $key;
            }
            $sql = $sql." (".implode(",", $sqlColumns).") VALUES ";
            $update = " ON DUPLICATE KEY UPDATE ".implode(",", $updateColumns);
            $values = '';
            foreach ($dataArray as $data) {
                    $valueArray = [];
                    foreach ($valColumns as $key) {
                            $valueArray[] = $this->db->quote($data[$key]);
                    }
                $values .= '('.implode(",", $valueArray).'),';
                // inserting records in batch
                if ($rowCount % 500 == 0) {
                    $query = $sql.rtrim($values, ',').$update;
                    $this->db->query($query);
                    $values = '';
                }
                $rowCount++;
            }
            if (!empty($values)) {
                $query = $sql.rtrim($values, ',').$update ;
                $this->db->query($query);
            }
        } catch (\Exception $e) {
            echo $e->getMessage(); die;
        }
    }
    
    /**
     * Function to truncate master table
     */
    public function truncateMasterTable()
    {
        try {
            $sql = "TRUNCATE TABLE {$this->masterTable}";
            $this->db->query($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to update master table
     */
    public function updateMasterTable()
    {        
        try {
            $this->truncateMasterTable();
            $sql = "REPLACE INTO {$this->masterTable} (id, record, hash) SELECT t.id, t.record, t.hash FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE t.hash != m.hash OR m.id IS NULL";
            $this->db->query($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
