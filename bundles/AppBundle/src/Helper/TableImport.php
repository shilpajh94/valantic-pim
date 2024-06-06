<?php

namespace AppBundle\Helper;

use Pimcore\Db;
use ImportBundle\Services\ImportConstants;
use Symfony\Component\DependencyInjection\ContainerInterface;

class TableImport
{
    private $tempTable;
    private $masterTable;
    private $logTable;
    private $fileColumns;
    private $keyColumns;
    private $mappingCsvColumn;
    private $container;

    private $db;
    private $common;

    /**
     * Getting DB connection object
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->db = Db::get();
        $this->common = $this->container->get('app.common_helper');
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
        $this->mappingCsvColumn = $table['mappingCsvColumn'];
    }


    private function createId($data)
    {
        $keyColumnValues = array();
        foreach($this->keyColumns as $key =>$keyColumn)
        {
            $column = $this->mappingCsvColumn[$keyColumn];
            $columnValue = $this->common->getFieldValue($this->fileColumns,$data,$column);
            $keyColumnValues[] = $columnValue;

        }

        $id = implode(ImportConstants::IMPORT_TABLE_ID_SEPARATOR, $keyColumnValues);
        return $id;
    }

    public function insertDataInTemp($arrData)
    {
        $rowCount = 1;
        $sql      = "INSERT INTO {$this->tempTable} (id, record, siopfullcode, hash) VALUES";
        $values   = '';
        $update = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `siopfullcode` = `siopfullcode`, `hash` = `hash` ";
        foreach ($arrData as $data) {

            $id = $this->createId($data);
            $record = addslashes(json_encode($data, true));
            $siopfullcode = $data['4'];
            $hash   = md5($record);
            $values .= '("'.$id.'", "'.$record.'", "'.$siopfullcode.'", "'.$hash.'"),';
            // inserting records in batch
            if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
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

    public function insertDataInSalesTemp($arrData)
    {
        $rowCount = 1;
        $sql      = "INSERT INTO {$this->tempTable} (id, record, hash) VALUES";
        $values   = '';
        $update = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `hash` = `hash` ";
        foreach ($arrData as $data) {

            $id = $data[4].'$'.$data[0].'$'.$data[2];
            $record = addslashes(json_encode($data, true));
            $hash   = md5($record);
            $values .= '("'.$id.'", "'.$record.'", "'.$hash.'"),';
            // inserting records in batch
            if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
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

    public function insertDataInPlantTemp($arrData)
    {
        $rowCount = 1;
        $sql      = "INSERT INTO {$this->tempTable} (id, record, hash) VALUES";
        $values   = '';
        $update = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `hash` = `hash` ";
        foreach ($arrData as $data) {

            $id = $this->createId($data); //$data[4].'$'.$data[0].'$'.$data[2];
            $record = addslashes(json_encode($data, true));
            $hash   = md5($record);
            $values .= '("'.$id.'", "'.$record.'", "'.$hash.'"),';
            // inserting records in batch
            if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
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
            $sql   = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE ( LENGTH(t.siopfullcode) = 16 OR LENGTH(t.siopfullcode) = 18 OR LENGTH(t.siopfullcode) = 13) AND (t.siopfullcode LIKE '043000%') AND (t.hash != m.hash OR m.id is null)";
            $delta = $this->db->fetchAllAssociative($sql);

            return $delta;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to find the Delta record(s)
     *
     * @return array
     */
    public function getSalesDelta()
    {
        try {
            $sql   = "SELECT t.id, t.record FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE (t.id=20041945 OR t.id=20019862 OR t.id=20012857 OR t.id=20012472) AND (t.hash != m.hash OR m.id is null)";
            $delta = $this->db->fetchAllAssociative($sql);

            return $delta;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to find the Delta record(s)
     *
     * @return array
     */
    public function getPlantDelta()
    {
        try {
            $sql   = "SELECT t.id, t.record FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE (t.id like '%20041945%' OR t.id like '%20012857%' OR t.id like '%20012472%' OR t.id like '%20019862%') AND (t.hash != m.hash OR m.id is null)";
            $delta = $this->db->fetchAllAssociative($sql);

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
            $this->db->executeQuery($sql);
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
            $this->db->executeQuery($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to insert processed data to log table
     */
    public function insertDataToLogTable($data)
    {
        $values = '';
        try {
            $rowCount = 1;
            $sql = "INSERT INTO {$this->logTable} (id, record, statusCode, failedReason, createdAt) VALUES";
            foreach ($data as $dataKey => $dataValue) {
                $values .= '("'.$dataValue['id'].'", "'.addslashes($dataValue['record']).'", "'.$dataValue['statusCode'].'","'.$dataValue['failedReason'].'",now()),';
                // inserting records in batch
                if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
                    $query = $sql.rtrim($values, ',');
                    $this->db->executeQuery($query);
                    $values = '';
                }
                $rowCount++;

            }
            if($values)
            {
                $query = $sql.rtrim($values, ',') ;
                $this->db->executeQuery($query);
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
