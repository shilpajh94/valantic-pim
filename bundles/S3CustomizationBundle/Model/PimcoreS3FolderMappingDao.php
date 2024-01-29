<?php

namespace S3CustomizationBundle\Model;


use Pimcore\Db;

class PimcoreS3FolderMappingDao
{
    private $db;

    const MAPPING_TABLE_NAME = "pimcore_s3_path_mapping";

    public function __construct()
    {
        $this->db = Db::get();
    }

    public function getS3PathForPimcorePath($pimcorePath){
        $sql = "SELECT s3_path FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_path =".$this->db->quote($pimcorePath);
        return $this->db->fetchOne($sql);
    }


    public function insertEntry($pimcorePath,$s3Path,$pimcoreObjectId = null){

        if($pimcoreObjectId){
            $sql = "INSERT INTO ".self::MAPPING_TABLE_NAME."(pimcore_object_id,pimcore_path,s3_path)";
            $sql .= " VALUES(".$pimcoreObjectId.",". $this->db->quote($pimcorePath).",".$this->db->quote($s3Path).") ";
        }else{
            $sql = "INSERT INTO ".self::MAPPING_TABLE_NAME."(pimcore_path,s3_path)";
            $sql .= " VALUES(".$this->db->quote($pimcorePath).",".$this->db->quote($s3Path)."".") ";
        }

        return $this->db->exec($sql);
    }

    public function doesS3PathExist($s3Path){
        $sql = "SELECT pimcore_path FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE s3_path = ".$this->db->quote($s3Path);

        $result = $this->db->fetchOne($sql);
        if($result){
            return true;
        }
        return false;
    }


    public function updatePathsForFolderAndChilds($oldFolderPath,$newFolderPath){

        $oldFolderPathLen = strlen($oldFolderPath);

//        $sql = "UPDATE ".self::MAPPING_TABLE_NAME;
//        $sql .= " SET pimcore_path = REPLACE(pimcore_path,"."'".$oldFolderPath."','".$newFolderPath."')";
//        this is because we don't want to replace all occurrences of $oldFolderPathLen in pimcore_path
//        we just want to replace the first occurrence
//        $sql .= " SET pimcore_path = CONCAT(" . $this->db->quote($newFolderPath) . ",SUBSTRING(pimcore_path,".($oldFolderPathLen + 1)."))";
//        $sql .= " WHERE pimcore_path LIKE ".$this->db->quote($oldFolderPath."%");

        /**
         * changing the path of the renamed folder
         */
        $sql = "UPDATE ".self::MAPPING_TABLE_NAME;
        $sql .= " SET pimcore_path = " . $this->db->quote($newFolderPath);
        $sql .= " WHERE pimcore_path = ".$this->db->quote($oldFolderPath);

        $this->db->executeStatement($sql);

        /**
         * changing the path of all the children
         * making the dependency on the slash in path so that
         * only children are updated not the siblings
         */
        $slashesCountInOldPath = substr_count($oldFolderPath,"/");

        $sql = "UPDATE ".self::MAPPING_TABLE_NAME;
        $sql .= " SET pimcore_path = CONCAT(" . $this->db->quote($newFolderPath) . ",SUBSTRING(pimcore_path,".($oldFolderPathLen + 1)."))";
        $sql .= " WHERE pimcore_path LIKE ".$this->db->quote($oldFolderPath."/%");
//        $sql .= " AND (LENGTH(`pimcore_path`) - LENGTH(REPLACE(`pimcore_path`, '/', ''))) > " . $slashesCountInOldPath;

        $this->db->executeStatement($sql);
        return true;
    }

    public function addPimcoreIdForPimcorePath($pimcoreFolderPath,$folderId){
        $sql = "UPDATE ".self::MAPPING_TABLE_NAME;
        $sql .= " SET pimcore_object_id=".$folderId;
        $sql .= " WHERE pimcore_path = ". $this->db->quote($pimcoreFolderPath);

        return $this->db->executeStatement($sql);
    }

    public function getPimcorePathForPimcoreFolderId($pimcoreFolderId){
        $sql = "SELECT pimcore_path from ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_object_id =  ".$pimcoreFolderId;

        return $this->db->fetchOne($sql);
    }

    public function deleteOldEntriesForGivenPimcoreObjectIdAndNewPath($pimcoreObjectId,$newPath){
        $sql = " DELETE FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_object_id = ".$pimcoreObjectId;
        $sql .= " AND pimcore_path != ". $this->db->quote($newPath);

        return $this->db->executeStatement($sql);
    }

    public function deleteEntriesForPimcoreObjectId($pimcoreObjectId){
        $sql = "DELETE FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_object_id = ".$pimcoreObjectId;

        return $this->db->executeStatement($sql);
    }

    public function deleteEntryForPimcorePath($pimcorePath){
        $sql = "DELETE FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_path = ". $this->db->quote($pimcorePath);

        return $this->db->executeStatement($sql);
    }

    public function deleteParentChildEntriesForParentPimcorePath($pimcorePath){
        $sql = "DELETE FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_path LIKE ".$this->db->quote($pimcorePath."%");

        return $this->db->executeStatement($sql);
    }

    public function getPimcorePathForS3Path($s3_path){
        $sql = "SELECT  pimcore_path  FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE s3_path=".$this->db->quote($s3_path);

        return $this->db->fetchOne($sql);
    }

    public function getEntryByObjectId(int $objectId)
    {
        $sql = "SELECT pimcore_object_id,pimcore_path,s3_path FROM " . self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_object_id = " . $objectId;

        return $this->db->fetchAssociative($sql);
    }

    public function getEntriesWithOlderPimcorePathsByObjectId(int $objectId, string $currentPimcorePath)
    {
        $sql = "SELECT pimcore_object_id,pimcore_path,s3_path FROM " . self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_object_id = " . $objectId;
        $sql .= " AND pimcore_path != " . $this->db->quote($currentPimcorePath);

        return $this->db->fetchAllAssociative($sql);
    }
}