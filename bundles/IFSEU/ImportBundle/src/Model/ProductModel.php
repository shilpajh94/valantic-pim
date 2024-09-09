<?php

namespace IFSEU\ImportBundle\Model;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use IFSEU\ImportBundle\Services\ImportConstants;
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
        $this->common = $this->container->get('ifs_eu_import.common_helper');
        $this->createImportTables();
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

    public function checkIfArticleExists($materialNumber) {
        $sql = " SELECT `oo_id`, `parentId`, `path`, `materialNumber`, `oldMaterialCode`,`siopFullCode`,`key`  FROM `object_IFSEUProduct` WHERE `materialNumber` = ".$this->db->quote(trim($materialNumber)) ." AND `productType` = 'fert'";
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
            $valuesArr[] = $this->db->quote("IFSEUProduct");  // Class Identifier
            $valuesArr[] = $this->db->quote("IFSEUProduct"); // Class Name
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
                        $valueArray[] = isset($data[$key]) ? $this->db->quote($data[$key]) : "NULL";
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
            p_r($e);  die;
        }
    }

    public function insertDataInRelationalTable($dataArray, $tableName){
        foreach($dataArray as $eachRecord){
            $valuesArr = [];
            $srcId = $eachRecord['src_id'];
            $destId = $eachRecord['dest_id'];
            $fieldName = $this->db->quote($eachRecord['fieldname']);
            $sql = "SELECT id from $tableName where src_id = $srcId AND dest_id = $destId AND fieldname = $fieldName";
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

    public function insertDataInTemp($arrData)
    {
        $rowCount   = 1;
        $sql        = "INSERT INTO {$this->tempTable} (id, record, siopfullcode, hash) VALUES";
        $values     = '';
        $update     = " ON DUPLICATE KEY UPDATE `id` = `id`, `record` = `record`, `siopfullcode` = `siopfullcode`, `hash` = `hash` ";
        foreach ($arrData as $data) {
            $newData= $data;
            $id     = $data[0];
            $siopfullcode = isset($data[28]) ? $data[28] : '' ;
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
            $catLength  = 16;
            $sql        = "SELECT t.id, t.record, t.siopfullcode FROM {$this->tempTable} t LEFT JOIN {$this->masterTable} m ON t.id = m.id WHERE LENGTH(t.siopfullcode) = '".$catLength."' AND (t.hash != m.hash OR m.id is null) ";
            return $this->db->fetchAllAssociative($sql);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteRelationTableRecords($dataArray) {
        if (count($dataArray)>0) {
            foreach ($dataArray as $fieldName => $objectIds) {
                $ids = implode(", ", $objectIds);
                $sql = "Delete from `object_relations_IFSEUProduct` where `fieldname` = ".$this->db->quote($fieldName)." AND `src_id` IN (".$ids.")";
                try {
                    $this->db->executeQuery($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
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
        try {
            $rowCount   = 1;
            $sql        = "INSERT INTO {$this->logTable} (id, siopfullcode, record, statusCode, failedReason, createdAt) VALUES";
            $values     = '';
            foreach ($data as $dataValue) {
                $values .= '("'.$dataValue['id'].'", "'.$dataValue['siopfullcode'].'", "'.addslashes($dataValue['record']).'", "'.$dataValue['statusCode'].'","'.$dataValue['failedReason'].'","'. $this->time.'"),';
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
        $query = "SELECT oo_id, code, `key`, fullCode, RelatedObjectBrick, path, BusinessUnit, Level FROM `object_IFSEUProductCategory` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getMaterialGroupData() {
        $query = "SELECT oo_id, code FROM `object_IFSEUMaterialGroup` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getCountryOriginData() {
        $query = "SELECT oo_id, CountryName FROM `object_IFSEUCountries` ";
        return $this->db->fetchAllAssociative($query);
    }
    public function getCatagoryData() {
        $query = "SELECT oo_id, `key`,CategoryCode FROM `object_IFSEUCategory` ";
        return $this->db->fetchAllAssociative($query);
    }

    /**
    * Function for update the fields based on lanaguage start code Here
    */

    public function getCatagoryLanguageData($lang) {
        //dd($lang);
        $tbl="object_localized_IFSEUCategory_".$lang;
        $query = "SELECT oo_id, `key`,CategoryCode,CategoryName FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getMinimumOrderLanguageData() {
        $tbl="object_localized_IFSEUMinimumOrder_".'en';
        $query = "SELECT oo_id, `key`,MinimumOrder FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getConditionsData() {
        $tbl="object_localized_IFSEUConditions_".'en';
        $query = "SELECT oo_id, `key`,Conditions FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getShippingConditionsData() {
        $tbl="object_localized_IFSEUShippingConditions_".'en';
        $query = "SELECT oo_id, `key`,ShippingConditions FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getManufacturingLengthData() {
        $tbl="object_localized_IFSEUManufacturingLength_".'en';
        $query = "SELECT oo_id, `key`,ManufacturingLength FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getProductionLengthData() {
        $tbl="object_localized_IFSEUProductionLength_".'en';
        $query = "SELECT oo_id, `key`,ProductionLength FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getNoteInfoBelowTableData() {
        $tbl="object_localized_IFSEUNoteInformationBelowTable_".'en';
        $query = "SELECT oo_id, `key`,NoteInformationBelowtable FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getNoteInformationBelowTableData() {
        $tbl="object_localized_IFSEUNoteInformationBelowTable_".'en';
        $query = "SELECT oo_id, `key`,NoteInformationBelowTable FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }

    public function getPropertiesLanguageData($lang){
        $tbl="object_localized_IFSEUProperties_".$lang;
        $query = "SELECT oo_id,TypeName,`key`,PropertyName FROM ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getfieldsOfApplicationLanguageData($lang){
        $tbl="object_localized_IFSEUApplications_".$lang;
        $query = "SELECT oo_id,`key`,ApplicationName FROM  ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getflowMediumLanguageData($lang){
        $tbl="object_localized_IFSEUFlowMedium_".$lang;
        $query = "SELECT oo_id,`key`,FlowMedium FROM  ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }
    public function getstandardsLanguageData($lang){
        $tbl="object_localized_IFSEUNorm_".$lang;
        $query = "SELECT oo_id,`key`,Norm FROM  ".$tbl;
        return $this->db->fetchAllAssociative($query);
    }

    /**
    * Function for update the fields based on lanaguage End code Here
    */

    public function getPropertiesData(){
        $query = "SELECT oo_id,TypeName,`key` FROM `object_IFSEUProperties` ";
        return $this->db->fetchAllAssociative($query);
    }
    public function getfieldsOfApplicationData(){
        $query = "SELECT oo_id,`key` FROM `object_IFSEUApplications` ";
        return $this->db->fetchAllAssociative($query);
    }
    public function getflowMediumData(){
        $query = "SELECT oo_id,`key` FROM `object_IFSEUFlowMedium` ";
        return $this->db->fetchAllAssociative($query);
    }
    public function getstandardsData(){
        $query = "SELECT oo_id,`key` FROM `object_IFSEUNorm` ";
        return $this->db->fetchAllAssociative($query);
    }
    public function getBrandsData(){
        $query = "SELECT oo_id,`key` FROM `object_IFSEUBrand` ";
        return $this->db->fetchAllAssociative($query);
    }
    public function getSubCategoryData(){
        $query = "SELECT oo_id,`key` FROM `object_IFSEUSubCategory` ";
        return $this->db->fetchAllAssociative($query);
    }


    public function getProducts() {
        $query = "SELECT oo_id, `key`, path FROM `object_IFSEUProduct` ";
        return $this->db->fetchAllAssociative($query);
    }

    public function getObjectsTableData() {
        $query = "SELECT id, `key`, path FROM `objects` where type = 'object' AND classId = 'IFSEUProduct'";
        return $this->db->fetchAllAssociative($query);
    }

    public function processDeletedProducts() {
        $deletedProducts = $this->getDeletedProducts();
        if (!empty($deletedProducts) && count($deletedProducts)>0) {
            $keysArray = [];
            foreach ($deletedProducts as $product) {
                $keysArray[] = "'".$product['id']."'";
            }
            $obj = new DataObject\IFSEUProduct\Listing();
            $obj->setCondition("materialNumber IN (". implode(', ' , $keysArray).")");
            $obj->load();
            foreach($obj as $product) {
                echo "Mark Product unpublished for id = ".$product->getId()." and material number = ".$product->getMaterialNumber().PHP_EOL;
                $product->setPublished(false);
                $product->save();
            }
        }
    }

    public function checkHierarchyExistAtLevel($fullCode, $level=6) : bool
    {
        $sql = "SELECT `fullCode` FROM object_IFSEUProductCategory WHERE Level='".$level."' AND  fullCode = '".$fullCode."'";
        $resultArray = $this->db->fetchAllAssociative($sql);
        if(!empty($resultArray))
        {
            return true;
        }
        return false;
    }
    private function createImportTables(){
        {
            $query = "
            CREATE TABLE IF NOT EXISTS `ifseu_material_import_log` (
                `logId` bigint NOT NULL AUTO_INCREMENT,
                `id` varchar(30) NOT NULL,
                `siopfullcode` varchar(30) DEFAULT NULL,
                `record` longtext,
                `statusCode` char(10) DEFAULT NULL,
                `failedReason` varchar(255) DEFAULT NULL,
                `createdAt` int DEFAULT NULL,
                PRIMARY KEY (`logId`),
                UNIQUE KEY `logId` (`logId`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


            CREATE TABLE IF NOT EXISTS `ifseu_material_import_master` (
                `id` varchar(30) NOT NULL,
                `siopfullcode` varchar(30) DEFAULT NULL,
                `record` longtext,
                `hash` char(32) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


            CREATE TABLE IF NOT EXISTS `ifseu_material_import_temp` (
                `id` varchar(30) NOT NULL,
                `siopfullcode` varchar(30) DEFAULT NULL,
                `record` longtext,
                `hash` char(32) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
             $this->db->executeQuery($query);
        }
    }
        /**
     * Get failed records from ifseu_material_list_price_import_log table
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return array
     */ 
    public function getFailedRecordFromLogTable():array{
        return Common::getFailedRecordFromLogTable($this->logTable,$this->masterTable,'statusCode',  $this->time);       
    }
}
