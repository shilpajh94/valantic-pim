<?php

namespace AppBundle\Helper;

use Pimcore\Db;
use ImportBundle\Services\ImportConstants;

class SalesMaterialImport
{
    private $tempTable;
    private $masterTable;
    private $logTable;
    private $fileColumns;
    private $keyColumns;
    private $mappingCsvColumn;
    private $db;

    /**
     * Getting DB connection object
     */
    public function __construct()
    {
        $this->db = Db::get();
        $this->tempTable = 'material_sales_import_temp';
        $this->masterTable = 'material_sales_import_master';
        $this->logTable = 'material_sales_import_log';
    }

    /**
     * Initilize table name
     */
    public function init($table)
    {
        $this->fileColumns = $table['fileColumns'];
        $this->keyColumns = $table['keyColumns'];
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
    	$update = " ON DUPLICATE KEY UPDATE ".implode(",", $updateColumns);
    	$values = '';
    	foreach ($dataArray as $data) {
    		$valueArray = [];
    		foreach ($valColumns as $key) {
    			$valueArray[] = $this->db->quote($data[$key]);
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
	        $update = " ON DUPLICATE KEY UPDATE ".implode(", ", $update);
	        $valuesArr[] = $this->db->quote($data['o_parentId']);
	        $valuesArr[] = $this->db->quote("object");
	        $valuesArr[] = $this->db->quote($data['o_key']);
	        $valuesArr[] = $this->db->quote($data['o_path']);
	        $valuesArr[] = $this->db->quote("1");
	        $valuesArr[] = $this->db->quote("10");
	        $valuesArr[] = $this->db->quote("SalesMaterialMaster");
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

    
    private function createId($data)
    {
        $keyColumnValues = array();
        foreach($this->keyColumns as $key =>$keyColumn)
        {
            $column = $this->mappingCsvColumn[$keyColumn];
            $keyColumnValues[] = $data[$column];
        }

        $id = implode(ImportConstants::IMPORT_TABLE_ID_SEPARATOR, $keyColumnValues);
        return $id;
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
                // $id = $this->createId($tempData);
                $id = $tempData['Material'].'$'.$tempData['Sales Org'].'$'.$tempData['Distribution Channel'];
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
            $delta = $this->db->fetchAllAssociative($sql);

            return $delta;
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
            $delta = $this->db->fetchAllAssociative($sql);

            return $delta;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function getSalesMaterialRecordsByMaterial($materialObjId) {
        $sql = "SELECT * from object_query_10 where `Material` = ".$this->db->quote(",".$materialObjId.","); //." AND deletedFlagAtDistributionChainLevel != 0 AND deletedFlagAtDistributionChainLevel != '' AND deletedFlagAtDistributionChainLevel IS NOT NULL";
        $salesData = $this->db->fetchAllAssociative($sql);
        $flag = true;
        foreach ($salesData as $rec) {
            if (empty($rec['deletedFlagAtDistributionChainLevel'])) {
                $flag = false;
                break;
            }
        }
        return $flag;
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
        $values = '';
        try {
            $rowCount = 1;
            $sql = "INSERT INTO {$this->logTable} (id, record, statusCode, failedReason, createdAt) VALUES";
            foreach ($data as $dataKey => $dataValue) {
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
    
    public function getSalessOrganization() {
        $query = "SELECT code, oo_id FROM `object_6` ";
        return $this->db->fetchPairs($query, ['code','oo_id']);
    }
    public function getDistributionChannel() {
        $query = "SELECT code, oo_id FROM `object_8` ";
        return $this->db->fetchPairs($query, ['code','oo_id']);
    }
}
