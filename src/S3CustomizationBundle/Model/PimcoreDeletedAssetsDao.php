<?php


namespace S3CustomizationBundle\Model;


use Pimcore\Db;

/**
 * Responsible for handling the entries in a custom table.
 * This custom table maintains the assets which have been deleted from pimcore.
 *
 * Class PimcoreDeletedAssetsDao
 * @package S3CustomizationBundle\Model
 */
class PimcoreDeletedAssetsDao
{
    private $db;

    const TABLE_NAME = "pimcore_deleted_assets";
    const S3_TABLE_NAME = "pimcore_s3_path_mapping";

    public function __construct()
    {
        $this->db = Db::get();
    }
    public function insert(int $pimcoreObjectId,string $pimcorePath,string $s3Path, string $type)
    {
        $sql = "INSERT INTO " . self::TABLE_NAME;
        $sql .= " VALUES(".$pimcoreObjectId.",". $this->db->quote($pimcorePath).",".$this->db->quote($s3Path).",".$this->db->quote($type) ." ) ";

        return $this->db->exec($sql);
    }

    public function delete(string $id)
    {
        $sql = " DELETE FROM " . self::TABLE_NAME;
        $sql .= " WHERE pimcore_object_id = " . $id;

        return $this->db->executeUpdate($sql);
    }

    public function getAllEntries()
    {
        $sql = "SELECT * from " . self::TABLE_NAME;

        return $this->db->fetchAll($sql);
    }

    public function doesS3PathExist($s3Path){
        $sql = "SELECT pimcore_path FROM ".self::TABLE_NAME;
        $sql .= " WHERE s3_path = ".$this->db->quote($s3Path);

        $result = $this->db->fetchOne($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function doesAssetPathExistInTable($pimcoreAssetPath){
        $sql = "SELECT pimcore_path FROM ".self::S3_TABLE_NAME;
        $sql .= " where pimcore_path = ".$this->db->quote($pimcoreAssetPath);

        $result = $this->db->fetchOne($sql);
        if($result){
            return true;
        }
        return false;
    }

}
