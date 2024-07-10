<?php

namespace IFSEU\ImportBundle\Model;

use Pimcore\Db;
use IFSEU\ImportBundle\Services\ImportConstants;
use AppBundle\Helper\Common;

class PlantMaterialModel
{
    private $tempTable;
    private $masterTable;
    private $logTable;
    private $db;
    private $time;

    /**
     * Getting DB connection object
     */
    public function __construct()
    {
        $this->db = Db::get();
        $this->tempTable = 'ifseu_material_plant_import_temp';
        $this->masterTable = 'ifseu_material_plant_import_master';
        $this->logTable = 'ifseu_material_plant_import_log';
        $this->time = time();
    }

    public function insertIntoMaterialTable($dataArray, $tableName) {
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
                $valueArray[] = $data[$key] == '' ? 'null' : $this->db->quote($data[$key]);
    		}
            $values .= '('.implode(",", $valueArray).'),';
            // inserting records in batch
            if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
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
    }

    public function insertDataInRelationalTable($dataArray, $tableName){
        foreach($dataArray as $eachRecord){
            $valuesArr = [];
            $srcId = $eachRecord['src_id'] ? $eachRecord['src_id'] : 'NULL';
            $destId = $eachRecord['dest_id'] ? $eachRecord['dest_id'] : 'NULL';
            $sql = "SELECT id from $tableName where src_id = $srcId AND dest_id = $destId";
            $checkIfRecordAlreadyExists = $this->db->fetchAllAssociative($sql);
            if($checkIfRecordAlreadyExists){
                //relation record already exists in relational table
            }
            else{
                $insertQuery = "INSERT into $tableName (`src_id`,`dest_id`,`type`,`fieldname`,`index`,`ownertype`,`position`) VALUES";
                $valuesArr[] = $this->db->quote($eachRecord['src_id']);
                $valuesArr[] = $this->db->quote($eachRecord['dest_id']);
                $valuesArr[] = $this->db->quote('object');
                $valuesArr[] = $this->db->quote($eachRecord['fieldname']);
                $valuesArr[] = $this->db->quote(0);
                $valuesArr[] = $this->db->quote('object');
                $valuesArr[] = $this->db->quote(0);
                $values = " (".implode(', ', $valuesArr).") ";
                $query = $insertQuery.$values;
                    $this->db->executeQuery($query);

            }
        }

    }

    public function insertInObjects($data) {
    	try {
	        $sql      = "INSERT INTO `objects` (`parentId`, `type`, `key`, `path`, `published`, `classId`, `className`, `creationDate`, `modificationDate`) VALUES";
	        $update[] = " `parentId` = VALUES(`parentId`) ";
	        $update[] = " `type` = VALUES(`type`) ";
	        $update[] = " `key` = VALUES(`key`) ";
	        $update[] = " `path` = VALUES(`path`) ";
	        $update[] = " `published` = VALUES(`published`) ";
	        $update[] = " `classId` = VALUES(`classId`) ";
	        $update[] = " `className` = VALUES(`className`) ";
	        $update[] = " `modificationDate` = VALUES(`modificationDate`) ";
	        $update = " ON DUPLICATE KEY UPDATE ".implode(", ", $update);
	        $valuesArr[] = $this->db->quote($data['parentId']);
	        $valuesArr[] = $this->db->quote("object");
	        $valuesArr[] = $this->db->quote($data['key']);
	        $valuesArr[] = $this->db->quote($data['path']);
	        $valuesArr[] = $this->db->quote("1");
	        $valuesArr[] = $this->db->quote("IFSEUPlantMaterialMaster");
	        $valuesArr[] = $this->db->quote("IFSEUPlantMaterialMaster");
	        $valuesArr[] = $this->db->quote(time());
	        $valuesArr[] = $this->db->quote(time());
	        $values = " (".implode(', ', $valuesArr).") ";
	        $query = $sql.$values.$update;
	        $this->db->executeQuery($query);
	        $lastId = $this->db->lastInsertId();
	        $data = $values = $query = null;
    	} catch(\Exception $e) {
    		print_r($e->getMessage()); die;
    	}
        return $lastId;
    }

    public function deleteFailedRecordsFromMaster($failedRecords) {
        try {
            if (!empty($failedRecords) && count($failedRecords)>0) {
                $sql = "DELETE FROM {$this->masterTable} WHERE `id` IN (";
                if (count($failedRecords)>0) {
                    $str = "'" . implode ( "', '", $failedRecords ) . "'";
                    $query = $sql.$str." )";
                    $this->db->executeQuery($query);
                }
            }
        }  catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function insertDataInTemp($arrData, $fileColumns)
    {
        try {
            $rowCount = 1;
            $sql      = "INSERT INTO {$this->tempTable} (id, record, hash) VALUES";
            $values   = '';
            $update = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `hash` = `hash` ";
            foreach ($arrData as $data) {
                $tempData = array_combine($fileColumns, $data);
                $id = $tempData['Material'].'$'.$tempData['Plant'].'$'.$tempData['Sales Organization'].'$'.$tempData['Distribution Channel'];
                unset($tempData);
                $record = addslashes(json_encode($data, true));
                $hash   = md5($record);
                $values .= '("'.$id.'", "'.$record.'", "'.$hash.'"),';
                // inserting records in batch
                if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
                    echo $query = $sql.rtrim($values, ',').$update;
                    $this->db->executeQuery($query);
                    $values = '';
                }
                $rowCount++;

            }
            if ($values) {
                $query = $sql.rtrim($values, ',').$update ;
                $this->db->executeQuery($query);
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
            return $this->db->fetchAllAssociative($sql);
        } catch (\Exception $ex) {
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
            return $this->db->fetchAllAssociative($sql);
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
            $this->db->executeQuery("TRUNCATE {$this->masterTable}");
            $sql = "INSERT INTO {$this->masterTable} SELECT * FROM {$this->tempTable};";
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
            $this->db->executeQuery("TRUNCATE {$this->tempTable}");
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
                $values .= '("'.$dataValue['id'].'", "'.addslashes($dataValue['record']).'", "'.$dataValue['statusCode'].'","'.$dataValue['failedReason'].'","'. $this->time.'"),';
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

    public function createPlantMaterialTable()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS `ifseu_material_plant_import_log` (
          `logId` bigint(20) NOT NULL AUTO_INCREMENT,
          `id` varchar(30) NOT NULL,
          `record` longtext,
          `statusCode` char(10) DEFAULT NULL,
          `failedReason` varchar(255) DEFAULT NULL,
          `createdAt` int(11) DEFAULT NULL,
          PRIMARY KEY (`logId`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


        CREATE TABLE IF NOT EXISTS `ifseu_material_plant_import_master` (
          `id` varchar(30) NOT NULL,
          `record` longtext,
          `hash` char(32) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


        CREATE TABLE IF NOT EXISTS `ifseu_material_plant_import_temp` (
          `id` varchar(30) NOT NULL,
          `record` longtext,
          `hash` char(32) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->executeQuery($query);
    }

    /**
     * Get failed records from ifseu_material_plant_import_log table
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return array
     */ 
    public function getFailedRecordFromLogTable():array{
        return Common::getFailedRecordFromLogTable($this->logTable,$this->masterTable,'statusCode', $this->time);
       
    }

}
