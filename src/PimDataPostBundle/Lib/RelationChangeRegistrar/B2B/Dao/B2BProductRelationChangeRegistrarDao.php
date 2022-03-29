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
        
        return $this->db->fetchCol($sql);
    }

    public function fetchNewActiveRecordsInTempTable()
    {
        $sql = "SELECT t1.o_id FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1 ";
        $sql .= "LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id ";
        $sql .=  "WHERE t2.id IS NULL AND t1.epixFlag=1 AND t1.o_published=1";
       
        return $this->db->fetchCol($sql);
    }

    public function fetchRelationalAttributeData($config, $products)
    {
        $rowsToInsertInRelationalDb = [];

        if($config && $products)
        {
            $fieldKeys = array_keys($config);

            $selectFields = [];
            $selectFields[] = "t1.o_id";
            $selectFields[] = "t1.BusinessUnit";
            $selectFieldsString = "";

            foreach ($fieldKeys as $value) {
                $selectFields[] = "t1.{$value} AS t1_{$value}, t2.{$value} AS t2_{$value}";
            }

            if($selectFields)
            {
                $selectFieldsString = implode(", ", $selectFields);
            }
            
            $productIds = implode(', ', $products);
            
            $sql = "SELECT {$selectFieldsString} FROM ".$this->tempMasterTablesMeta->getTempTableName()." t1 ";
            $sql .= "LEFT JOIN ".$this->tempMasterTablesMeta->getMasterTableName()." t2 ON t2.o_id = t1.o_id ";
            $sql .=  "WHERE t1.o_id IN ({$productIds})";
            $result = $this->db->fetchAll($sql);

            $fieldKeys[] = "BusinessUnit";
            $rowsToInsertInRelationalDb = $this->prepareRelationalRecords($fieldKeys, $result);
            
        }
        return $rowsToInsertInRelationalDb;
    }

    public function prepareRelationalRecords($fieldKeys, $result){
        $rowsToInsertInRelationalDb = [];

        foreach ($fieldKeys as $key) {
            if($result)
            {
                foreach ($result as $resultValue) {

                    $tempKey = "t1_{$key}";
                    $masterKey = "t2_{$key}";

                    if(isset($resultValue[$tempKey]))
                    {
                        $oldValue = $resultValue[$masterKey];
                        $newValue = $resultValue[$tempKey];

                        if($oldValue != $newValue)
                        {
                            $data = [];
                            $data['productId'] = $resultValue['o_id'];
                            $data['attributeName'] = $key;
                            $data['oldValue'] = $resultValue['t2_'.$key];
                            $data['newValue'] = $resultValue['t1_'.$key];
    
                            $rowsToInsertInRelationalDb[] = $data;
                        }
                        
                        
                    }
                }
            }
        }

        return $rowsToInsertInRelationalDb;
    }
}

