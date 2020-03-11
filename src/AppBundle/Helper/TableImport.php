<?php

namespace AppBundle\Helper;

use Pimcore\Db;
use ImportBundle\Services\ImportConstants;

class TableImport
{
    private $tempTable;
    private $masterTable;
    private $logTable;
    private $fileColumns;
    private $keyColumns;
    private $mappingCsvColumn;

    private $db;
    private $common;

    /**
     * Getting DB connection object
     */
    public function __construct()
    {
        $this->db = Db::get();
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
    }

    /**
     * Initilize table name
     */
    public function init($table)
    {
        $this->tempTable = $table['tempTable'];
        $this->masterTable = $table['masterTable'];
        $this->logTable = $table['logTable'];

        $this->fileColumns = $table['fileColumns'];
        $this->keyColumns = $table['keyColumns'];
        $this->$mappingCsvColumn = $table['mappingCsvColumn'];
    }


    private function createId($data)
    {
        $keyColumnValues = array();
        foreach($this->keyColumns as $key =>$keyColumn)
        {
            $column = $this->$mappingCsvColumn[$keyColumn];
            $columnValue = $this->common->getFieldValue($this->fileColumns,$data,$column);
            $keyColumnValues[] = $columnValue;
        }

        $id = implode(ImportConstants::IMPORT_TABLE_ID_SEPARATOR, $keyColumnValues);
        return $id;
    }

    public function insertDataInTemp($arrData)
    {
        $sql      = "INSERT INTO {$this->tempTable} (id, record, hash) VALUES";
        $values   = '';
        $update = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `hash` = `hash` ";
        foreach ($arrData as $data) {

            $id = $this->createId($data);
            $record = addslashes(json_encode($data, true));
            $hash   = md5($record);
            $values .= '("'.$id.'", "'.$record.'", "'.$hash.'"),';
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
            $sql   = "SELECT t.id, t.record FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id  WHERE t.hash != m.hash OR m.id IS NULL";
            $delta = $this->db->fetchAll($sql);

            return $delta;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to update master table
     */
    public function updateMaster()
    {        
        try {
            $sql = "REPLACE INTO {$this->masterTable} (id, record, hash) SELECT t.id, t.record, t.hash FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE t.hash != m.hash OR m.id IS NULL";
            $this->db->query($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to truncate article temp table
     */
    public function truncateTempTable()
    {
        try {
            $sql = "TRUNCATE TABLE {$this->tempTable}";
            $this->db->query($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to insert processed data to log table
     */
    public function insertDataToLogTable($data)
    {
        try {
            $sql = "INSERT INTO {$this->logTable} (id, record, statusCode, failedReason, createdAt) VALUES";
            foreach ($data as $dataKey => $dataValue) {
                $values .= '("'.$dataValue['id'].'", "'.addslashes($dataValue['record']).'", "'.$dataValue['statusCode'].'","'.$dataValue['failedReason'].'",now()),';
            }
            if($values)
            {
                $query = $sql.rtrim($values, ',') ;
                $this->db->query($query);
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
