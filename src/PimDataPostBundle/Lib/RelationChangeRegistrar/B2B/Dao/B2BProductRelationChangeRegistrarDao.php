<?php
namespace PimDataPostBundle\Lib\RelationChangeRegistrar\B2B\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\RelationChangeRegistrar\RelationChangeRegistrarDao;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;

class B2BProductRelationChangeRegistrarDao
{
    private $tempMasterTablesMeta;

    private $db;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->db = \Pimcore\Db::get();        
    }


    public function fetchRecordsWhereRelationHashChanged()
    {
        $sql =  "SELECT t1.o_id FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1 ";
        $sql .= "JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id ";
        $sql .= "WHERE t1.".$this->tempMasterTablesMeta->getRelationalhashColumnName();
        $sql .= " != t2.".$this->tempMasterTablesMeta->getRelationalhashColumnName();
    
        $result = $this->db->fetchAll($sql);
        return $result;
    }

    public function fetchNewActiveRecordsInTempTable()
    {
        $sql = "SELECT t1.o_id FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1 ";
        $sql .= "LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id ";
        $sql .=  "WHERE t2.id IS NULL AND t1.epixFlag=1 AND t1.o_published=1";
       
        $result = $this->db->fetchAll($sql);
        return $result;
    }
}

