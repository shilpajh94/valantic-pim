<?php

namespace AppBundle\Helper;

use Pimcore\Db;
use ImportBundle\Services\ImportConstants;
use mysqli;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductImport
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

    Const STATUS_CODE = 'Failed';


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

    public function getDistributionChainFlagByMaterial($materialObjId) {
        $sql = "SELECT * from object_query_10 where `Material` = ".$this->db->quote(",".$materialObjId.","); //." AND deletedFlagAtDistributionChainLevel != 0 AND deletedFlagAtDistributionChainLevel != '' AND deletedFlagAtDistributionChainLevel IS NOT NULL";
        $salesData = $this->db->fetchAllAssociative($sql);
        $flag = true;
        if (count($salesData) > 0) {
            foreach ($salesData as $rec) {
                if (empty($rec['deletedFlagAtDistributionChainLevel'])) {
                    $flag = false;
                    break;
                }
            }
        } else {
            $flag = false;
        }
        return $flag;
    }

    public function getFittingFamilyFlagByMaterial($materialObjId) {
        $sql = "SELECT * from object_brick_query_HydFittingsFert_1 where `id` = ".$this->db->quote($materialObjId)." AND (`HydFittingFamily` is not null OR `HydFittingFamily` != '') ";
        $data = $this->db->fetchAllAssociative($sql);
        $flag = false;
        if (count($data)>0) {
            $flag = true;
        }
        return $flag;
    }

    public function checkIfArticleExists($articleNumber) {
        $sql = " SELECT `oo_id`, `parentId`, `path`, `articleNumber`, `oldMaterialCode`  FROM `object_1` WHERE `articleNumber` = ".$this->db->quote(trim($articleNumber)) ." AND `ProductType` = 'fert'";
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
            $parentId = $data['parentId'];
            $valuesArr[] = "$parentId";
            $valuesArr[] = $this->db->quote("object");
            $valuesArr[] = $this->db->quote($data['key']);
            $valuesArr[] = $this->db->quote($data['path']);
            $valuesArr[] = $this->db->quote("1");
            $valuesArr[] = $this->db->quote("1");
            $valuesArr[] = $this->db->quote("Product");
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
                            $valueArray[] = $this->db->quote($data[$key]);
                    }
                $values .= '('.implode(",", $valueArray).'),';
                // inserting records in batch
                if ($rowCount % 1000 == 0) {
                    $query = $sql.rtrim($values, ',').$update;
                    $this->db->executeQuery($query);
                    sleep(0.60);
                    $values = '';
                }
                $rowCount++;
            }
            if (!empty($values)) {
                $query = $sql.rtrim($values, ',').$update ;
                $this->db->executeQuery($query);
                sleep(0.60);
            }
        } catch (\Exception $e) {
            echo $e->getMessage(); die;
        }
    }

    public function insertDataInTemp($arrData)
    {
        $rowCount = 1;
        $sql      = "INSERT INTO {$this->tempTable} (id, record, siopfullcode, hash) VALUES";
        $values   = '';
        $update = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `siopfullcode` = `siopfullcode`, `hash` = `hash` ";
        foreach ($arrData as $data) {
            $newData = $data;
            $id = $data[0];
            $siopfullcode = $data['4'];
            if (empty($siopfullcode)) {
                if (!empty($data[17])) {
                    $siopfullcode = $data[17];
                } elseif (!empty($data[13])) {
                    $siopfullcode = $data[13];
                }
            }
            $newData[4] = $siopfullcode;
            $record = addslashes(json_encode($newData, true));
            $hash   = md5($record);
            $values .= '("'.$id.'", "'.$record.'", "'.$siopfullcode.'", "'.$hash.'"),';
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
    public function getDelta($bu)
    {
        try {
            if ($bu == 'ptg') {
                $catLength18 = 18;
                $catLength16 = 16;
                $catLength13 = 13;
                $sql   = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE (LENGTH(t.siopfullcode) = '".$catLength13."' OR LENGTH(t.siopfullcode) = '".$catLength16."' OR LENGTH(t.siopfullcode) = '".$catLength18."') AND (t.siopFullCode LIKE '043000%') AND (t.hash != m.hash OR m.id is null) ";
            }
            elseif($bu == 'ifs'){
                $catLength = 13;
                $sql   = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE LENGTH(t.siopfullcode) = '".$catLength."' AND (t.siopFullCode NOT LIKE '043000%') AND (t.siopFullCode NOT LIKE '05%') AND (t.hash != m.hash OR m.id is null) ";
            }
            elseif($bu == 'cs'){
                $catLength = 13;
                $sql   = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE LENGTH(t.siopfullcode) <= '".$catLength."' AND (t.siopFullCode LIKE '05%') AND (t.hash != m.hash OR m.id is null) ";

            }
            return $this->db->fetchAllAssociative($sql);

        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteRelationTableRecords($dataArray) {
        if (count($dataArray)>0) {
            foreach ($dataArray as $fieldName => $objectIds) {
                $ids = implode(", ", $objectIds);
                $sql = "Delete from `object_relations_1` where `fieldname` = ".$this->db->quote($fieldName)." AND `src_id` IN (".$ids.")";
                try {
                    $this->db->executeQuery($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
    /**
     * Function to find the Delta record(s)
     *
     * @return array
     */
    public function getIFSLoad()
    {
        try {
            // galti not check condition for auto hose ifs
            $sql = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t WHERE LENGTH(t.siopfullcode) = '13' AND (t.siopFullCode NOT LIKE '043000%')";
            return $this->db->fetchAllAssociative($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getCSLoad()
    {
        try {
            $sql = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t WHERE LENGTH(t.siopfullcode) = '13' AND (t.siopFullCode LIKE '05%')";
            return $this->db->fetchAllAssociative($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getBaseSiopMapping() {
        $sql = "SELECT Substring(`oldMaterialCode`,1,6) as materialCode, siopFullCode from object_query_1 where oldMaterialCode != '' AND oldMaterialCode != 'NA' AND oldMaterialCode != 'N/A' AND (siopFullCode like '041000%' OR siopFullCode like '041500%')";
        $mappingData = $this->db->fetchAllAssociative($sql);
        $mappingArray = [];
        foreach ($mappingData as $data) {
            $materialCode = $data['materialCode'];
            if (empty($mappingArray[$materialCode])) {
                $mappingArray[$materialCode] = $data['siopFullCode'];
            }
        }
        return $mappingArray;
    }

    public function getDeletedProducts() {
        $sql   = "SELECT m.id FROM {$this->masterTable} m LEFT JOIN {$this->tempTable} t ON t.id = m.id WHERE t.id is null";
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
                $sql = "DELETE FROM {$this->masterTable} WHERE `id` IN (";
                $artNoArray = array_keys($articles);
                if (count($artNoArray)>0) {
                    $query = $sql.implode(", ", $artNoArray)." )";
                    $this->db->executeQuery($query);
                }
            }
        }  catch (\Exception $ex) {
            p_r($ex);
        }
    }

    public function getAllBaseProducts() {
        try {
            $sql   = "SELECT * FROM `object_1` WHERE `BusinessUnit` = 'IFS' AND  (`ProductType` = 'base' OR `ProductType` = 'skeleton') AND (`siopfullcode` like '041000%' OR `siopfullcode` like '041500%') ";
            $data = $this->db->fetchAllAssociative($sql);
            $recordArray = [];
            foreach ($data as $record) {
                $recordArray[$record['key']] = $record['id'];
            }
            return $recordArray;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

    }

    public function getRecordsSiopCodeDigitsNot13And16And18()
    {
        $sql = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t WHERE LENGTH(t.siopfullcode) NOT IN (13,18,16) AND t.siopfullcode NOT LIKE '05%'";
        $record = $this->db->fetchAllAssociative($sql);
        $this->insertSiopDigitsNot13And16And18DataToLogTable($record);
        $this->deleteSiopCodeDigitsNot13And16And18FromTemp($record);
    }

  public function insertSiopDigitsNot13And16And18DataToLogTable($data)
   {
        try {
            $value='';
            $rowCount = 1;
            $sql = "INSERT INTO {$this->logTable} (id, siopfullcode, record, statusCode, failedReason, createdAt) VALUES";
            foreach ($data as $dataValue) {
                $value .= '("'.$dataValue['id'].'", "'.$dataValue['siopfullcode'].'", "'.addslashes($dataValue['record']).'","'.self::STATUS_CODE.'","Length of SIOP full code is neither 13 nor 16 nor 18","'.time().'"),';
            // inserting records in batch
                if ($rowCount % ImportConstants::IMPORT_BATCH_SIZE == 0) {
                    $query = $sql.rtrim($value, ',');
                    $this->db->executeQuery($query);
                    $value = '';
                }
                $rowCount++;
            }
            if($value)
            {
                $query = $sql.rtrim($value, ',') ;
                $this->db->executeQuery($query);
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
   }

   public function deleteSiopCodeDigitsNot13And16And18FromTemp($record)
   {
        foreach ($record as $deletedRecords) {
            $deletedRecordsId = $deletedRecords['id'];
            $sql = "DELETE FROM {$this->tempTable} WHERE id = '$deletedRecordsId'";
            $this->db->executeQuery($sql);
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
            $sql = "INSERT INTO {$this->logTable} (id, siopfullcode, record, statusCode, failedReason, createdAt) VALUES";
            foreach ($data as $dataValue) {
                $values .= '("'.$dataValue['id'].'", "'.$dataValue['siopfullcode'].'", "'.addslashes($dataValue['record']).'", "'.$dataValue['statusCode'].'","'.$dataValue['failedReason'].'","'.time().'"),';
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
        $query = "SELECT oo_id, code, `key`, fullCode, RelatedObjectBrick, `path`, BusinessUnit, Level FROM `object_2` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getMaterialGroupData() {
        $query = "SELECT oo_id, code FROM `object_21` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getProducts() {
        $query = "SELECT oo_id, `key`, `path` FROM `object_1` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getObjectsTableData() {
        $query = "SELECT id, `key`, `path` FROM `objects` where type = 'object' AND classId = '1'";
        return $this->db->fetchAllAssociative($query);
    }

    public function getMrpControllerValueForAllPublishedPlantsMapped($articleNumber){

        $sql = "SELECT object_1.oo_id,
        object_1.articleNumber,
        object_12.mrpController
        from object_1
        join
        object_relations_12
        ON
        object_1.oo_id = object_relations_12.dest_id
        JOIN
        object_12
        ON
        object_relations_12.src_id = object_12.oo_id
        where
        object_12.published = 1
        and
        object_1.published = 1
        and
        object_1.articleNumber = $articleNumber
        ";

        return  $this->db->fetchAllAssociative($sql);
    }

    public function unpublishProductWhichContainsObsValueInMrpControllerForAllMappedPlants($id){

        $updateQuery = "UPDATE objects set `published` = 0 where `id` = $id";
        $this->db->executeQuery($updateQuery);
    }

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
                    $values[] = "($id, '$bu', '0', $now, 'Product', 'object_1')";
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
