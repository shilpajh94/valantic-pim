<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;

class B2BCategoryDeltaManagerDao extends DeltaManagerDao
{
    private $db;    //database
    private $tempMasterTablesMeta;

    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta)
    {
        $this->db = \Pimcore\Db::get();
        $this->tempMasterTablesMeta=$tempMasterTablesMeta;

    }

    // Start  # delete data from temp which have same hash in master basic
    public function removeHashNotChangedRecordsFromTempTable()
    {

        $sql="DELETE t1
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
            LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.id = t1.id
            WHERE t1.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." = t2.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName();

        if($this->db->executeQuery($sql)) {
            return true;
        }
        return false;
    }
        // End  ---------

        // Start  # new data which is not in master table
    public function getRecordsPresentInTempNotInMaster()
    {

        $sql="SELECT t1.id FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
            LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.id = t1.id
            WHERE t2.id IS NULL  AND t1.ShowInMenu=1";
        return $this->db->fetchAssociative($sql);
    }
       // End  ---------

       // Start  # new data which is not in master table by level
    public function getRecordsPresentInTempNotInMasterByLevel($level)
    {
       $sql="SELECT t1.id
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
            LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.id = t1.id
            WHERE t1.Level = ".$level." AND t2.id IS NULL  AND t1.ShowInMenu=1";

        return $this->db->fetchFirstColumn($sql);
    }
       // End  ---------

       // Start  # get data which is exist in master table and BasicHash changed
    public function getHashChangedRecords()
    {
        $sql="SELECT t1.id
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
            JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.id = t1.id
            WHERE t1.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." != t2.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName();

        return $this->db->fetchFirstColumn($sql);
    }
       // End  --------
}
