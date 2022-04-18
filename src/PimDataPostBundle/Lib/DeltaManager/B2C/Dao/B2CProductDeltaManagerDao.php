<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2C\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;

class B2CProductDeltaManagerDao extends DeltaManagerDao
{

    private $db;    //database
    private $tempMasterTablesMeta;  
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta)
    {
        $this->db = \Pimcore\Db::get();
        $this->tempMasterTablesMeta=$tempMasterTablesMeta;
    }

    public function getUpdatedMasterIds($masterClassName): array
    {
        $sql = "SELECT o_id FROM objects";
        $sql .= " WHERE o_className = :className";
        $sql .= " AND o_modificationDate BETWEEN :updateWindowStartTime AND :updateWindowEndTime";
        return $this->db->fetchCol($sql,["className" => $masterClassName, 
                                    "updateWindowStartTime" => Util::getUpdateWindow()->getStartTimestamp(),
                                    "updateWindowEndTime" => Util::getUpdateWindow()->getEndTimestamp()]);
    }

    public function getProductIdsForUpdatedMasterIds(array $updatedMasterIds, 
                                                        string $productAttributeNameInMasterTable, 
                                                        string $pimAttributeType,
                                                        string $masterTableName): array
    {
        if(empty($updatedMasterIds)){
            return [];
        }
        $sql = "SELECT o_id FROM " . $masterTableName;
        if($pimAttributeType === strval(PimFieldType::SELECT())){
            $updatedMasterIdsString = "(" . implode(",", $updatedMasterIds) . ")";
            $sql .= " WHERE " . $productAttributeNameInMasterTable . " IN " . $updatedMasterIdsString;
        }elseif($pimAttributeType === strval(PimFieldType::MULTISELECT()) || 
                    $pimAttributeType === strval(PimFieldType::ADVANCED_MANY_TO_MANY_OBJECT_RELATION())){
            $sql .= " WHERE ";
            $queryPart = [];
            foreach($updatedMasterIds as $masterId){
                $queryPart[] = " " . $productAttributeNameInMasterTable . " LIKE " . "'%," . $masterId . ",%'";
            }
            $sql .= implode(" OR ", $queryPart);
        }else{
            // @TODO: throw exception, this type is not handled
            return [];
        }
        return $this->db->fetchCol($sql);
    }

        // Start  # delete data from temp which have same hash in master basic  
    public function removeHashNotChangedRecordsFromTempTable()
    {
        $sql="DELETE t1
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1 
             LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id
             WHERE t1.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." = t2.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()."
             AND t1.".$this->tempMasterTablesMeta->getRelationalhashColumnName()." = t2.".$this->tempMasterTablesMeta->getRelationalhashColumnName();
           
        if($this->db->query($sql)){
            return true;
        }
        return false;
    }
            // End  ---------
    
            // Start  # new data which is not in master table 
    public function getRecordsPresentInTempNotInMaster()
    {
        $sql="SELECT t1.o_id
             FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
             LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id
             WHERE t2.id IS NULL AND t1.B2CStoreFlag=1 AND t1.o_published=1";
        return $this->db->fetchCol($sql);
    }
           // End  ---------
    
           // Start  # get data which is exist in master table and BasicHash changed
    public function getHashChangedRecords()
    {
        $sql="SELECT t1.o_id
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
            LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id
            WHERE t1.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." != t2.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName();
           
        return $this->db->fetchAll($sql);
    }
           // End  --------


}

