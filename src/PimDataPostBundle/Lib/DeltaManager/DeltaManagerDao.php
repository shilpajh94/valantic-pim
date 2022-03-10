<?php

namespace PimDataPostBundle\Lib\DeltaManager;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
class DeltaManagerDao
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
           
        $sql = "DELETE FROM ".$this->tempMasterTablesMeta->getTempTableName()." WHERE EXISTS (SELECT o_id FROM ".$this->tempMasterTablesMeta->getMasterTableName()." WHERE ".$this->tempMasterTablesMeta->getTempTableName().".o_id = ".$this->tempMasterTablesMeta->getMasterTableName().".o_id AND ".$this->tempMasterTablesMeta->getTempTableName().".".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." = ".$this->tempMasterTablesMeta->getMasterTableName().".".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." AND ".$this->tempMasterTablesMeta->getTempTableName().".".$this->rel_hash." = ".$this->tempMasterTablesMeta->getMasterTableName().".".$this->rel_hash.")";
       return  $result = $this->db->fetchAll($sql);
       
    
    }
        // End  ---------

        // Start  # new data which is not in master table 
    public function getRecordsPresentInTempNotInMaster()
    {
       
       $sql = "SELECT o_id FROM ".$this->tempMasterTablesMeta->getTempTableName()." WHERE NOT EXISTS (SELECT o_id FROM ".$this->tempMasterTablesMeta->getMasterTableName()." WHERE ".$this->tempMasterTablesMeta->getTempTableName().".o_id = ".$this->tempMasterTablesMeta->getMasterTableName().".o_id) AND ".$this->tempMasterTablesMeta->getTempTableName().".epixFlag=1  AND ".$this->tempMasterTablesMeta->getTempTableName().".o_published=1";
       $result = $this->db->fetchAll($sql);
       return $result;

    }
       // End  ---------

       // Start  # get data which is exist in master table and BasicHash changed
    public function getHashChangedRecords()
    {
       
        $sql = "SELECT o_id FROM ".$this->tempMasterTablesMeta->getTempTableName()." WHERE EXISTS (SELECT o_id FROM ".$this->tempMasterTablesMeta->getMasterTableName()." WHERE ".$this->tempMasterTablesMeta->getTempTableName().".o_id = ".$this->tempMasterTablesMeta->getMasterTableName().".o_id AND ".$this->tempMasterTablesMeta->getTempTableName().".".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." != ".$this->tempMasterTablesMeta->getMasterTableName().".".$this->tempMasterTablesMeta->getNonRelationalhashColumnName().")";
        $result = $this->db->fetchAll($sql);
        return $result;

    }
       // End  --------

    
}

