<?php

namespace PTGEU\ImportBundle\Model;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use PTGEU\ImportBundle\Services\ImportConstants;

class ProductModel
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
        $this->common = \Pimcore::getContainer()->get('import.common_helper');
    }
    
    /**
     * Initilize table name
     */
    public function init($table)
    {
        $this->tempTable    = $table['tempTable'];
        $this->masterTable  = $table['masterTable'];
        $this->logTable     = $table['logTable'];

        $this->fileColumns  = $table['fileColumns'];
        $this->keyColumns   = $table['keyColumns'];
        $this->mappingCsvColumn = $table['mappingCsvColumn'];
    }
    
    public function checkIfArticleExists($articleNumber) {
        $sql = " SELECT `oo_id`, `o_parentId`, `o_path`, `articleNumber`, `oldMaterialCode`  FROM `object_38` WHERE `articleNumber` = ".$this->db->quote(trim($articleNumber)) ." AND `productType` = 'fert'";
        return $this->db->fetchAll($sql);
    }

    public function insertInObjects($data) {
    	try {
            $valuesArr = [];
            if (!empty($data['o_id'])) {
                $insertColumns[] = "`o_id`";
                $update[] = " `o_id` = VALUES(`o_id`) ";
                $valuesArr[] = $this->db->quote($data['o_id']);
            }
            $insertColumns[] = "`o_parentId`";
            $insertColumns[] = "`o_type`";
            $insertColumns[] = "`o_key`";
            $insertColumns[] = "`o_path`";
            $insertColumns[] = "`o_published`"; 
            $insertColumns[] = "`o_classId`"; 
            $insertColumns[] = "`o_className`"; 
            $insertColumns[] = "`o_creationDate`"; 
            $insertColumns[] = "`o_modificationDate`";
            $sql      = "INSERT INTO `objects` (".implode(", ", $insertColumns).") VALUES";
            $update[] = " `o_parentId` = VALUES(`o_parentId`) ";
            $update[] = " `o_type` = VALUES(`o_type`) ";
            $update[] = " `o_key` = VALUES(`o_key`) ";
            $update[] = " `o_path` = VALUES(`o_path`) ";
            $update[] = " `o_published` = VALUES(`o_published`) ";
            $update[] = " `o_classId` = VALUES(`o_classId`) ";
            $update[] = " `o_className` = VALUES(`o_className`) ";
            $update[] = " `o_modificationDate` = VALUES(`o_modificationDate`) ";
            $update = " ON DUPLICATE KEY UPDATE ".implode(", ", $update);
            $valuesArr[] = $this->db->quote($data['parentId']);
            $valuesArr[] = $this->db->quote("object");
            $valuesArr[] = $this->db->quote($data['o_key']);
            $valuesArr[] = $this->db->quote($data['path']);
            $valuesArr[] = $this->db->quote("1");
            $valuesArr[] = $this->db->quote("38");
            $valuesArr[] = $this->db->quote("PTGEUProduct");
            $valuesArr[] = $this->db->quote(time());
            $valuesArr[] = $this->db->quote(time());
            $values = " (".implode(', ', $valuesArr).") ";
            $query = $sql.$values.$update;
            $this->db->query($query);
            $lastId = $this->db->lastInsertId();
            if (!empty($data['o_id'])) {
                $lastId = $data['o_id'];
            }
            $data = $values = $query = $update = $valuesArr = null;
    	} catch(\Exception $e) {
            return [false, addslashes($e->getMessage())];
    	}
        return $lastId;
    }

    public function insertIntoProductTable($dataArray, $tableName) {
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
                if ($rowCount % 1000 == 0) {
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

    public function insertDataInTemp($arrData)
    {
        $rowCount   = 1;
        $sql        = "INSERT INTO {$this->tempTable} (id, record, siopfullcode, hash) VALUES";
        $values     = '';
        $update     = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `siopfullcode` = `siopfullcode`, `hash` = `hash` ";
        foreach ($arrData as $data) {
            $newData= $data;
            $id     = $data[0];
            $siopfullcode = $data[6];
            $record = addslashes(json_encode($newData, true));
            $hash   = md5($record);
            $values.= '("'.$id.'", "'.$record.'", "'.$siopfullcode.'", "'.$hash.'"),';
            // inserting records in batch
            if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
                $query = $sql.rtrim($values, ',').$update;
                $this->db->query($query);
                $values = '';
            }
            $rowCount++;
            unset($newData);
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
            $catLength  = 18;
            $sql        = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE LENGTH(t.siopfullcode) = '".$catLength."' AND (t.hash != m.hash OR m.id is null) ";
            return $this->db->fetchAll($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function deleteRelationTableRecords($dataArray) {
        if (count($dataArray)>0) {
            foreach ($dataArray as $fieldName => $objectIds) {
                $ids = implode(", ", $objectIds);
                $sql = "Delete from `object_relations_38` where `fieldname` = ".$this->db->quote($fieldName)." AND `src_id` IN (".$ids.")";
                try {
                    $this->db->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
    
    public function getDeletedProducts() {
        $sql   = "SELECT m.id FROM {$this->masterTable} m LEFT JOIN {$this->tempTable} t ON t.id = m.id WHERE t.id is null";
        return $this->db->fetchAll($sql);
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
     * Function to truncate article temp table
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
    
    public function removeArticlesFromMaster($articles) {
        try {
            if (!empty($articles) && count($articles)>0) {
                $sql = "DELETE FROM {$this->masterTable} WHERE `id` IN (";
                $artNoArray = array_keys($articles);
                if (count($artNoArray)>0) {
                    $query = $sql.implode(", ", $artNoArray)." )";
                    $this->db->query($query);
                }
            }
        }  catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Function to update master table
     */
    public function updateMaster()
    {        
        try {
            $this->truncateMasterTable();
            $sql = "REPLACE INTO {$this->masterTable} (id, siopfullcode, record, hash) SELECT t.id, t.siopfullcode, t.record, t.hash FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE t.hash != m.hash OR m.id IS NULL";
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
            $rowCount   = 1;
            $sql        = "INSERT INTO {$this->logTable} (id, siopfullcode, record, statusCode, failedReason, createdAt) VALUES";
            $values     = '';
            foreach ($data as $dataValue) {
                $values .= '("'.$dataValue['id'].'", "'.$dataValue['siopfullcode'].'", "'.addslashes($dataValue['record']).'", "'.$dataValue['statusCode'].'","'.$dataValue['failedReason'].'","'.time().'"),';
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

    public function getCategories() {
        $query = "SELECT oo_id, code, o_key, fullCode, RelatedObjectBrick, o_path, businessUnit, Level FROM `object_39` ";
        return $this->db->fetchAll($query);
    }

    public function getMaterialGroupData() {
        $query = "SELECT oo_id, code FROM `object_21` ";
        return $this->db->fetchAll($query);
    }
    
    public function getProducts() {
        $query = "SELECT oo_id, o_key, o_path FROM `object_38` ";
        return $this->db->fetchAll($query);
    }
    
    public function getObjectsTableData() {
        $query = "SELECT o_id, o_key, o_path FROM `objects` where o_type = 'object' AND o_classId = '38'";
        return $this->db->fetchAll($query);
    }

    public function processDeletedProducts() {
        $deletedProducts = $this->getDeletedProducts();
        if (!empty($deletedProducts) && count($deletedProducts)>0) {
            $keysArray = [];
            foreach ($deletedProducts as $product) {
                $keysArray[] = $product['id'];
            }
            $obj = new DataObject\PTGEUProduct\Listing();
            $obj->setCondition("articleNumber IN (". implode(', ' , $keysArray).")");
            $obj->load();
            foreach($obj as $product) {
                echo "Mark Product unpublished for id = ".$product->getId()." and article number = ".$product->getArticleNumber().PHP_EOL;
                $product->setPublished(false);
                $product->save();
            }
        }
    }

    public function saveProducts($updatedArticlesArray) {
        foreach ($updatedArticlesArray as $objectId) {
            if (!empty($objectId)) {
                $object = DataObject\PTGEUProduct::getById($objectId, true);
                if (!empty($object) && $object instanceof \Pimcore\Model\DataObject\PTGEUProduct) {
                    $object->save();
                }
            }
        }
    }
}