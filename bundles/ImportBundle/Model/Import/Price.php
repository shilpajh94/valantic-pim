<?php

namespace ImportBundle\Model\Import;


use ImportBundle\Services\ImportConstants;
use Exception;

/**
 * Description of Price
 *
 */
class Price {

    private $db;
    private $tempTable;
    private $masterTable;
    /**
     * Function is constructor and set the db connection
     */
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
        $this->tempTable = "material_list_price_import_temp";
        $this->masterTable = "material_list_price_import_master";
    }

    public function truncateTempTable() {
        try {
            $sql = "TRUNCATE TABLE $this->tempTable";
            $this->db->executeQuery($sql);
        } catch (Exception $ex) {
            //$this->logger->error($ex->getMessage());
            return ([
                "success" => false,
                "message" => $ex->getMessage()
            ]);
        }
    }


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
                $this->db->executeQuery($query);
                $values = '';
            }
            $rowCount++;
        }
        if ($values) {
            $query = $sql.rtrim($values, ',').$update ;
            $this->db->executeQuery($query);
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
            $delta = $this->db->fetchAllAssociative($sql);

            return $delta;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function getDeletedPriceDataProducts() {
        $sql   = "SELECT m.id FROM {$this->masterTable} m LEFT JOIN {$this->tempTable} t ON t.id = m.id WHERE t.id is null";
        return $this->db->fetchAllAssociative($sql);
    }

    public function fetchArticles() {
        $sql   = "select oo_id, articleNumber, priceData from `object_query_1` where articleNumber is not null";
        $queryData = $this->db->fetchAllAssociative($sql);

        return [
            'queryTableData' => $queryData
            //'storeTableData' => $storeData
        ];
    }

    public function insertDataIntoTable($dataArray, $tableName) {
        try {
            $rowCount = 1;
            $firstRec = $dataArray[0];
            $keys = array_keys($firstRec);
            $sql = "INSERT INTO `".$tableName."` ";
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
                    $this->db->executeQuery($query);
                    $values = '';
                }
                $rowCount++;
            }
            if (!empty($values)) {
                $query = $sql.rtrim($values, ',').$update ;
                $this->db->executeQuery($query);
            }
        } catch (\Exception $e) {
            echo $e->getMessage(); die;
        }
    }

    /**
     * Function to truncate article temp table
     */
    public function truncateMasterTable()
    {
        try {
            $sql = "TRUNCATE TABLE {$this->masterTable}";
            $this->db->executeQuery($sql);
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
            $this->db->executeQuery($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
