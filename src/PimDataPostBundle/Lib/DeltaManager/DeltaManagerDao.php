<?php

namespace PimDataPostBundle\Lib\DeltaManager;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
class DeltaManagerDao
{
    protected $db;    //database
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
            LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id
            WHERE t1.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." = t2.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()."
            AND t1.".$this->tempMasterTablesMeta->getRelationalhashColumnName()." = t2.".$this->tempMasterTablesMeta->getRelationalhashColumnName();
       
        if($this->db->query($sql))
        return true;
        else
        return false; 

       
    
    }
        // End  ---------

        // Start  # new data which is not in master table 
    public function getRecordsPresentInTempNotInMaster()
    {
       
       $sql="SELECT t1.o_id
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
            LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id
            WHERE t2.id IS NULL AND t1.epixFlag=1 AND t1.o_published=1";
       
       $result = $this->db->fetchCol($sql);
       return $result;

    }
       // End  ---------

       // Start  # get data which is exist in master table and BasicHash changed
    public function getHashChangedRecords()
    {
        $sql="SELECT t1.o_id
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
            LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id
            WHERE t1.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." != t2.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName();
       
        $result = $this->db->fetchAll($sql);
        return $result;

    }
       // End  --------

    
}

