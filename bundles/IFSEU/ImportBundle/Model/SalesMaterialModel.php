<?php

namespace IFSEU\ImportBundle\Model;

use Pimcore\Db;
use IFSEU\ImportBundle\Services\ImportConstants;

class SalesMaterialModel
{
    private $tempTable;
    private $masterTable;
    private $logTable;
    private $fileColumns;
    private $mappingCsvColumn;
    private $db;
    const ON_DUPLICATE_KEY_UPDATE = " ON DUPLICATE KEY UPDATE ";

    /**
     * Getting DB connection object
     */
    public function __construct()
    {
        $this->db = Db::get();
        $this->tempTable = 'ifseu_material_sales_import_temp';
        $this->masterTable = 'ifseu_material_sales_import_master';
        $this->logTable = 'ifseu_material_sales_import_log';
    }

    /**
     * Initilize table name
     */
    public function init($table)
    {
        $this->fileColumns = $table['fileColumns'];
        $this->mappingCsvColumn = $table['mappingCsvColumn'];
    }

    public function insertIntoSalesTable($dataArray, $tableName) {
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
    	$update = self::ON_DUPLICATE_KEY_UPDATE.implode(",", $updateColumns);
    	$values = '';
    	foreach ($dataArray as $data) {
    		$valueArray = [];
    		foreach ($valColumns as $key) {
    			$valueArray[] = $data[$key] == '' ? 'null' : $this->db->quote($data[$key]);
    		}
            

            $values .= '('.implode(",", $valueArray).'),';
            // inserting records in batch
            if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
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
    }


    public function insertInObjects($data) {
    	try {
	        $sql      = "INSERT INTO `objects` (`o_parentId`, `o_type`, `o_key`, `o_path`, `o_published`, `o_classId`, `o_className`, `o_creationDate`, `o_modificationDate`) VALUES";
	        $update[] = " `o_parentId` = VALUES(`o_parentId`) ";
	        $update[] = " `o_type` = VALUES(`o_type`) ";
	        $update[] = " `o_key` = VALUES(`o_key`) ";
	        $update[] = " `o_path` = VALUES(`o_path`) ";
	        $update[] = " `o_published` = VALUES(`o_published`) ";
	        $update[] = " `o_classId` = VALUES(`o_classId`) ";
	        $update[] = " `o_className` = VALUES(`o_className`) ";
	        $update[] = " `o_modificationDate` = VALUES(`o_modificationDate`) ";
	        $update   = self::ON_DUPLICATE_KEY_UPDATE.implode(", ", $update);
	        $valuesArr[] = $this->db->quote($data['o_parentId']);
	        $valuesArr[] = $this->db->quote("object");
	        $valuesArr[] = $this->db->quote($data['o_key']);
	        $valuesArr[] = $this->db->quote($data['o_path']);
	        $valuesArr[] = $this->db->quote("1");
	        $valuesArr[] = $this->db->quote("IFSEUSalesMaterialMaster");
	        $valuesArr[] = $this->db->quote("IFSEUSalesMaterialMaster");
	        $valuesArr[] = $this->db->quote(time());
	        $valuesArr[] = $this->db->quote(time());
	        $values = " (".implode(', ', $valuesArr).") ";
	        $query = $sql.$values.$update;
	        $this->db->query($query);
	        $lastId = $this->db->lastInsertId();

	        $data = $values = $query = null;
    	} catch(\Exception $e) {
    		print_r($e->getMessage()); die;
    	}
        return $lastId;
    }

    public function updateProductPath($dataArray) {
        $rowCount = 1;
        $firstRec = $dataArray[0];
        $keys = array_keys($firstRec);
        $sql = "INSERT INTO `objects` ";
        $sqlColumns = [];
        $updateColumns = [];
        $valColumns = [];
        foreach ($keys as $key) {
            $sqlColumns[] = "`".$key."`";
            if ($key!='o_id') {
                $updateColumns[] = "`".$key."`= VALUES(`".$key."`)";
            }
            $valColumns[] = $key;
        }
        $sql = $sql." (".implode(",", $sqlColumns).") VALUES ";
        $update = self::ON_DUPLICATE_KEY_UPDATE.implode(",", $updateColumns);
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
    }

    public function insertDataInTemp($arrData, $fileColumns)
    {
        try {
            $rowCount = 1;
            $sql      = "INSERT INTO {$this->tempTable} (id, record, hash) VALUES";
            $values   = '';
            $update   = self::ON_DUPLICATE_KEY_UPDATE."`id` = `id`, `record` = `record`, `hash` = `hash` ";
            foreach ($arrData as $data) {
                $tempData = array_combine($fileColumns, $data);

                $id = $tempData['Material'].'$'.$tempData['Sales Org'].'$'.$tempData['Distribution Channel'].'$'.$tempData['PLANT'];
                unset($tempData);
                $record = addslashes(json_encode($data, true));
                $hash   = md5($record);
                $values .= '("'.$id.'", "'.$record.'", "'.$hash.'"),';
                // inserting records in batch
                if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
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
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to find the Deleted record(s)
     *
     * @return array
     */
    public function getDeletedRecords()
    {
        try {
            $sql   = "SELECT m.id FROM {$this->masterTable} m LEFT JOIN {$this->tempTable} t ON t.id = m.id WHERE t.id is null";
            return $this->db->fetchAll($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function deleteFailedRecordsFromMaster($failedRecords) {
        try {
            if (!empty($failedRecords) && count($failedRecords)>0) {
                $sql = "DELETE FROM {$this->masterTable} WHERE `id` IN (";                
                if (count($failedRecords)>0) {
                    $str = "'" . implode ( "', '", $failedRecords ) . "'";
                    $query = $sql.$str." )";
                    $this->db->query($query);
                }
            }
        }  catch (\Exception $ex) {
            echo $ex->getMessage();
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
            $sql   = "SELECT t.id, t.record FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id  WHERE t.hash != m.hash OR m.id IS NULL ORDER BY t.id ASC ";
            return  $this->db->fetchAll($sql);
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
            $this->db->query("TRUNCATE {$this->masterTable}");
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
            $this->db->query("TRUNCATE {$this->tempTable}");
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
            $rowCount = 1;
            $sql = "INSERT INTO {$this->logTable} (id, record, statusCode, failedReason, createdAt) VALUES";
            $values = '';
            foreach ($data as $dataValue) {
                $values .= '("'.$dataValue['id'].'", "'.addslashes($dataValue['record']).'", "'.$dataValue['statusCode'].'","'.$dataValue['failedReason'].'","'.time().'"),';
                // inserting records in batch
                if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
                    $query = $sql.rtrim($values, ',');
                    $this->db->query($query);
                    $values = '';
                }
                $rowCount++;

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

    public function createSalesMaterialTable()
    {

        $query = "
        CREATE TABLE IF NOT EXISTS `ifseu_material_sales_import_log` (
          `logId` bigint(20) NOT NULL AUTO_INCREMENT,
          `id` varchar(30) NOT NULL,
          `record` longtext,
          `statusCode` char(10) DEFAULT NULL,
          `failedReason` varchar(255) DEFAULT NULL,
          `createdAt` int(11) DEFAULT NULL,
          PRIMARY KEY (`logId`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        
        
        CREATE TABLE IF NOT EXISTS `ifseu_material_sales_import_master` (
          `id` varchar(30) NOT NULL,
          `record` longtext,
          `hash` char(32) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        
        
        CREATE TABLE IF NOT EXISTS `ifseu_material_sales_import_temp` (
          `id` varchar(30) NOT NULL,
          `record` longtext,
          `hash` char(32) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($query);
    }
}
