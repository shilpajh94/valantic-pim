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
        $result = $this->db->fetchOne($sql);
        return $result;
    }


    public function insertEntry($pimcorePath,$s3Path,$pimcoreObjectId = null){

        if($pimcoreObjectId){
            $sql = "INSERT INTO ".self::MAPPING_TABLE_NAME."(pimcore_object_id,pimcore_path,s3_path)";
            $sql .= " VALUES(".$pimcoreObjectId.",". $this->db->quote($pimcorePath).",".$this->db->quote($s3Path).") ";
        }else{
            $sql = "INSERT INTO ".self::MAPPING_TABLE_NAME."(pimcore_path,s3_path)";
            $sql .= " VALUES(".$this->db->quote($pimcorePath).",".$this->db->quote($s3Path)."".") ";
        }

        $result = $this->db->exec($sql);
        return $result;
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

        $sql = "UPDATE ".self::MAPPING_TABLE_NAME;
//        $sql .= " SET pimcore_path = REPLACE(pimcore_path,"."'".$oldFolderPath."','".$newFolderPath."')";
//        this is because we don't want to replace all occurrences of $oldFolderPathLen in pimcore_path
//        we just want to replace the first occurrence
        $sql .= " SET pimcore_path = CONCAT(" . $this->db->quote($newFolderPath) . ",SUBSTRING(pimcore_path,".($oldFolderPathLen + 1)."))";
        $sql .= " WHERE pimcore_path LIKE ".$this->db->quote($oldFolderPath."%");

        $result = $this->db->executeUpdate($sql);
        return $result;
    }

    public function addPimcoreIdForPimcorePath($pimcoreFolderPath,$folderId){
        $sql = "UPDATE ".self::MAPPING_TABLE_NAME;
        $sql .= " SET pimcore_object_id=".$folderId;
        $sql .= " WHERE pimcore_path = ". $this->db->quote($pimcoreFolderPath);

        $result = $this->db->executeUpdate($sql);
        return $result;
    }

    public function getPimcorePathForPimcoreFolderId($pimcoreFolderId){
        $sql = "SELECT pimcore_path from ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_object_id =  ".$pimcoreFolderId;

        $result = $this->db->fetchOne($sql);
        return $result;
    }

    public function deleteOldEntriesForGivenPimcoreObjectIdAndNewPath($pimcoreObjectId,$newPath){
        $sql = " DELETE FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_object_id = ".$pimcoreObjectId;
        $sql .= " AND pimcore_path != ". $this->db->quote($newPath);

        $result = $this->db->executeUpdate($sql);
        return $result;
    }

    public function deleteEntriesForPimcoreObjectId($pimcoreObjectId){
        $sql = "DELETE FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_object_id = ".$pimcoreObjectId;

        $result = $this->db->executeUpdate($sql);
        return $result;
    }

    public function deleteEntryForPimcorePath($pimcorePath){
        $sql = "DELETE FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_path = ". $this->db->quote($pimcorePath);

        $result = $this->db->executeUpdate($sql);
        return $result;
    }

    public function deleteParentChildEntriesForParentPimcorePath($pimcorePath){
        $sql = "DELETE FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE pimcore_path LIKE ".$this->db->quote($pimcorePath."%");

        $result = $this->db->executeUpdate($sql);
        return $result;
    }

    public function getPimcorePathForS3Path($s3_path){
        $sql = "SELECT  pimcore_path  FROM ".self::MAPPING_TABLE_NAME;
        $sql .= " WHERE s3_path=".$this->db->quote($s3_path);

        $result = $this->db->fetchOne($sql);
        return $result;
    }
}