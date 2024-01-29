<?php

namespace PTGEU\ImportBundle\Model;

use Pimcore\Db;
use PTGEU\ImportBundle\Services\ImportConstants;

class PlantMaterialModel
{
    private $tempTable;
    private $masterTable;
    private $logTable;
    private $db;

    /**
     * Getting DB connection object
     */
    public function __construct()
    {
        $this->db = Db::get();
        $this->tempTable = 'ptgeu_material_plant_import_temp';
        $this->masterTable = 'ptgeu_material_plant_import_master';
        $this->logTable = 'ptgeu_material_plant_import_log';
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


    public function insertInObjects($data) {
    	try {
	        $sql      = "INSERT INTO `objects` (`o_parentId`, `o_type`, `o_key`, `o_path`,
             `o_published`, `o_classId`, `o_className`, `o_creationDate`, `o_modificationDate`) VALUES";
	        $update[] = " `o_parentId` = VALUES(`o_parentId`) ";
	        $update[] = " `o_type` = VALUES(`o_type`) ";
	        $update[] = " `o_key` = VALUES(`o_key`) ";
	        $update[] = " `o_path` = VALUES(`o_path`) ";
	        $update[] = " `o_published` = VALUES(`o_published`) ";
	        $update[] = " `o_classId` = VALUES(`o_classId`) ";
	        $update[] = " `o_className` = VALUES(`o_className`) ";
	        $update[] = " `o_modificationDate` = VALUES(`o_modificationDate`) ";
	        $update = " ON DUPLICATE KEY UPDATE ".implode(", ", $update);
	        $valuesArr[] = $this->db->quote($data['o_parentId']);
	        $valuesArr[] = $this->db->quote("object");
	        $valuesArr[] = $this->db->quote($data['o_key']);
	        $valuesArr[] = $this->db->quote($data['o_path']);
	        $valuesArr[] = $this->db->quote("1");
	        $valuesArr[] = $this->db->quote("40");
	        $valuesArr[] = $this->db->quote("PTGEUPlantMaterialMaster");
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
                $id = $tempData['SAPMaterialCode'].'$'.$tempData['DeliveringPlantCode'].'$'.
                $tempData['SalesOrgCode'].'$'.$tempData['DCCode'];
                unset($tempData);
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
            $sql   = "SELECT m.id FROM {$this->masterTable} m LEFT JOIN
             {$this->tempTable} t ON t.id = m.id WHERE t.id is null";
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
            $sql   = "SELECT t.id, t.record FROM {$this->tempTable} t
            LEFT JOIN {$this->masterTable} m ON t.id = m.id  WHERE t.hash != m.hash OR m.id IS NULL ORDER BY t.id ASC ";
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
                $values .= '("'.$dataValue['id'].'", "'.addslashes($dataValue['record']).'", "'.
                $dataValue['statusCode'].'","'.$dataValue['failedReason'].'","'.time().'"),';
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
    public function getCountries() {
        $query = "SELECT code, oo_id FROM `object_9` ";
        return \Pimcore\Db\Helper::fetchPairs($this->db, $query, ['code','oo_id']);
    }
    public function getSalessOrganization() {
        $query = "SELECT code, oo_id FROM `object_6` ";
        return \Pimcore\Db\Helper::fetchPairs($this->db, $query, ['code','oo_id']);
    }
    public function getDistributionChannel() {
        $query = "SELECT code, oo_id FROM `object_8` ";
        return \Pimcore\Db\Helper::fetchPairs($this->db, $query, ['code','oo_id']);
    }
}
