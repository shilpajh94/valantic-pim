<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2C\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\AttributeConfigProvider\B2C\B2CProductAttributeConfigProvider;

class B2CProductDeltaManagerDao extends DeltaManagerDao
{

    private $db;    //database

    private $tempMasterTablesMeta;

    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta)
    {
        $this->db = \Pimcore\Db::get();
        $this->tempMasterTablesMeta=$tempMasterTablesMeta;
        $this->attributeConfigProvider= new B2CProductAttributeConfigProvider();
    }

    public function getUpdatedMasterIds($masterClassName): array
    {
        $sql = "SELECT id FROM objects";
        $sql .= " WHERE className = :className";
        $sql .= " AND modificationDate BETWEEN :updateWindowStartTime AND :updateWindowEndTime";
        return $this->db->fetchFirstColumn($sql,["className" => $masterClassName,
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
        $sql = "SELECT id FROM " . $masterTableName;
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
        return $this->db->fetchFirstColumn($sql);
    }

        // Start  # delete data from temp which have same hash in master basic
    public function removeHashNotChangedRecordsFromTempTable()
    {
        $sql="DELETE t1
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
             LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.id = t1.id
             WHERE t1.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." = t2.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()."
             AND t1.".$this->tempMasterTablesMeta->getRelationalhashColumnName()." = t2.".$this->tempMasterTablesMeta->getRelationalhashColumnName();

        if($this->db->executeQuery($sql)){
            return true;
        }
        return false;
    }
            // End  ---------

            // Start  # new data which is not in master table
    public function getRecordsPresentInTempNotInMaster()
    {
        $sql="SELECT t1.id
             FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
             LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.id = t1.id
             WHERE t2.id IS NULL AND t1.B2CStoreFlag=1 AND t1.published=1";
        return $this->db->fetchFirstColumn($sql);
    }
           // End  ---------

           // Start  # get data which is exist in master table and BasicHash changed
    public function getHashChangedRecords()
    {
        $sql="SELECT t1.id
            FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1
            LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.id = t1.id
            WHERE t1.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName()." != t2.".$this->tempMasterTablesMeta->getNonRelationalhashColumnName();

            return $this->db->fetchFirstColumn($sql);
    }
           // End  --------

     public function getProductIdsByUpdatedAsset(int $assetId): array
    {
        $sql = "SELECT id FROM ".Constants::B2C_PRODUCT_MASTER_TABLE_NAME;
        $sql .= " WHERE Document LIKE '%|".$assetId.",%'";
        $result = $this->db->fetchAllAssociative($sql);
        $returnArray = [];
        if( count($result) > 0 ){
            $returnArray = array_merge($returnArray, array_column($result , 'id'));
        }
        return $returnArray;
    }

    public function getProductIdsByDeletedAsset(int $assetId): array
    {
        $attributesArray = $this->attributeConfigProvider->getMediaAttributeConfig();
        $returnArray = [];
        foreach($attributesArray as $key => $attributesRow)
        {
            $sql = "SELECT id FROM ".Constants::B2C_PRODUCT_MASTER_TABLE_NAME;
            if($key == 'Document')
            {
                $sql .= " WHERE ".$key." LIKE '%|".$assetId.",%'";
            }
            else
            {
                $sql .= " WHERE ".$key." = '".$assetId."'";
            }
            $result = $this->db->fetchAllAssociative($sql);
            if( count($result) >0 ){
                $returnArray = array_merge($returnArray, array_column($result , 'id'));
            }
        }
        return $returnArray;
    }
}
