<?php

namespace PTGEU\ImportBundle\Model;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use PTGEU\ImportBundle\Services\ImportConstants;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Helper\Common;

class ProductModel
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
    private $time;

    /**
     * Getting DB connection object
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->db = Db::get();
        $this->common = $this->container->get('import.common_helper');
        $this->time = time();
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
        $sql = " SELECT `oo_id`, `parentId`, `path`, `articleNumber`, `oldMaterialCode`
          FROM `object_38` WHERE `articleNumber` = ".$this->db->quote(trim($articleNumber))
          ." AND `productType` = 'fert'";
        return $this->db->fetchAllAssociative($sql);
    }

    public function insertInObjects($data) {
    	try {
            $valuesArr = [];
            if (!empty($data['id'])) {
                $insertColumns[] = "`id`";
                $update[] = " `id` = VALUES(`id`) ";
                $valuesArr[] = $this->db->quote($data['id']);
            }
            $insertColumns[] = "`parentId`";
            $insertColumns[] = "`type`";
            $insertColumns[] = "`key`";
            $insertColumns[] = "`path`";
            $insertColumns[] = "`published`";
            $insertColumns[] = "`classId`";
            $insertColumns[] = "`className`";
            $insertColumns[] = "`creationDate`";
            $insertColumns[] = "`modificationDate`";
            $sql      = "INSERT INTO `objects` (".implode(", ", $insertColumns).") VALUES";
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
            $valuesArr[] = $this->db->quote("38");
            $valuesArr[] = $this->db->quote("PTGEUProduct");
            $valuesArr[] = $this->db->quote(time());
            $valuesArr[] = $this->db->quote(time());
            $values = " (".implode(', ', $valuesArr).") ";
            $query = $sql.$values.$update;
            $this->db->executeQuery($query);
            $lastId = $this->db->lastInsertId();
            if (!empty($data['id'])) {
                $lastId = $data['id'];
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
                        if (is_null($data[$key]) || $data[$key] == '') {
                            $valueArray[] = "NULL";
                        } else {
                            $valueArray[] = $this->db->quote($data[$key]);
                        }
                    }
                $values .= '('.implode(",", $valueArray).'),';
                // inserting records in batch
                if ($rowCount % 1000 == 0) {
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

    public function insertDataInTemp($arrData)
    {
        $rowCount   = 1;
        $sql        = "INSERT INTO {$this->tempTable} (id, record, siopfullcode, hash) VALUES";
        $values     = '';
        $update     = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`,
         `siopfullcode` = `siopfullcode`, `hash` = `hash` ";
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
                $this->db->executeQuery($query);
                $values = '';
            }
            $rowCount++;
            unset($newData);
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
            $catLength  = 18;
            $sql        = "SELECT t.id, t.record, t.siopfullcode FROM
            {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id
            WHERE LENGTH(t.siopfullcode) = '".$catLength."' AND (t.hash != m.hash OR m.id is null) ";
            return $this->db->fetchAllAssociative($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteRelationTableRecords($dataArray) {
        if (count($dataArray)>0) {
            foreach ($dataArray as $fieldName => $objectIds) {
                $ids = implode(", ", $objectIds);
                $sql = "Delete from `object_relations_38` where `fieldname` = ".
                $this->db->quote($fieldName)." AND `src_id` IN (".$ids.")";
                try {
                    $this->db->executeQuery($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    public function getDeletedProducts() {
        $sql   = "SELECT m.id FROM {$this->masterTable} m
        LEFT JOIN {$this->tempTable} t ON t.id = m.id WHERE t.id is null";
        return $this->db->fetchAllAssociative($sql);
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

    public function removeArticlesFromMaster($articles) {
        try {
            if (!empty($articles) && count($articles)>0) {
                $sql = "DELETE FROM {$this->masterTable} WHERE `id` IN ('";
                $artNoArray = array_keys($articles);
                if (count($artNoArray)>0) {
                    $query = $sql.implode("', '", $artNoArray)."')";
                    $this->db->executeQuery($query);
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
            $sql = "REPLACE INTO {$this->masterTable} (id, siopfullcode, record, hash)
             SELECT t.id, t.siopfullcode, t.record, t.hash FROM {$this->tempTable} t
              LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE t.hash != m.hash OR m.id IS NULL";
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
        try {
            $rowCount   = 1;
            $sql        = "INSERT INTO {$this->logTable} (id, siopfullcode, record,
             statusCode, failedReason, createdAt) VALUES";
            $values     = '';
            foreach ($data as $dataValue) {
                $values .= '("'.$dataValue['id'].'", "'.$dataValue['siopfullcode'].
                '", "'.addslashes($dataValue['record']).'", "'.$dataValue['statusCode'].
                '","'.$dataValue['failedReason'].'","'.$this->time.'"),';
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

    public function getCategories() {
        $query = "SELECT oo_id, code, `key`, fullCode, RelatedObjectBrick,
         `path`, businessUnit, Level FROM `object_39` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getMaterialGroupData() {
        $query = "SELECT oo_id, code FROM `object_PTGEUMaterialGroup` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getProducts() {
        $query = "SELECT oo_id, `key`, `path` FROM `object_38` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getObjectsTableData() {
        $query = "SELECT id, `key`, `path` FROM `objects` where type = 'object' AND classId = '38'";
        return $this->db->fetchAllAssociative($query);
    }

    public function processDeletedProducts() {
        $deletedProducts = $this->getDeletedProducts();
        if (!empty($deletedProducts) && count($deletedProducts)>0) {
            echo count($deletedRecords).' records found to be unpublished'.PHP_EOL;
            $keysArray = [];
            foreach ($deletedProducts as $product) {
                $keysArray[] = "'".$product['id']."'";
            }
            $obj = new DataObject\PTGEUProduct\Listing();
            $obj->setCondition("articleNumber IN (". implode(', ' , $keysArray).")");
            $obj->load();
            foreach($obj as $product) {
                echo "Mark Product unpublished for id = ".$product->getId().
                " and article number = ".$product->getArticleNumber().PHP_EOL;
                $product->setPublished(false);
                $product->save();
            }
        }
    }

    public function checkHierarchyExistAtLevel($fullCode, $level=5) : bool
    {
        $sql = "SELECT `fullCode` FROM object_39 WHERE Level='".$level."' AND  fullCode = '".$fullCode."'";
        $resultArray = $this->db->fetchAllAssociative($sql);
        if(!empty($resultArray))
        {
            return true;
        }
        return false;
    }

        /**
     * Get failed records from ptgeu_material_import_log table
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return array
     */ 
    public function getFailedRecordFromLogTable():array{
        return Common::getFailedRecordFromLogTable($this->logTable , $this->masterTable,'statusCode',$this->time);
    }

    public function storeRecordsInPimcoreSaveTable($updatedArticlesIdArray, $bu){
        try{
            $now = time();
            $chunks = array_chunk($updatedArticlesIdArray, 100);
            foreach ($chunks as $chunk) {
                $values = [];
                foreach ($chunk as $row) {
                    $id = $row;
                    $values[] = "($id, '$bu', '0', $now, 'PTGEU', 'object_38')";
                }

                $sql = "INSERT INTO pimcore_save
                        (oo_id, businessUnit, status, creationDate, className, objectTableName)
                        VALUES " . implode(", ", $values) . "
                        ON DUPLICATE KEY UPDATE
                            businessUnit = VALUES(businessUnit),
                            status = VALUES(status),
                            creationDate = VALUES(creationDate),
                            className = VALUES(className),
                            objectTableName = VALUES(objectTableName)";
                
                $this->db->executeQuery($sql);
                
            }
        }catch(Exception $ex){
            p_r($ex);
        }
    }

    public function deleteBuRecordsInPimcoreSaveTable($bu){

        $sql = "SELECT oo_id from pimcore_save where status = 0 and businessUnit = '$bu'" ;
        $result = $this->db->fetchAllAssociative($sql);
        if(count($result) == 0){
            $deleteQuery = "DELETE from pimcore_save where businessUnit = '$bu'";
            $this->db->executeQuery($deleteQuery);
            echo "Deleted all records for ".$bu. " from pimcore_save table";
        }
    }

    public function changeStatusFromPimcoreSaveTableForRecords($objId){
        $sql = "UPDATE pimcore_save set status = 1 where oo_id = $objId";
        $this->db->executeQuery($sql);
    }
}
