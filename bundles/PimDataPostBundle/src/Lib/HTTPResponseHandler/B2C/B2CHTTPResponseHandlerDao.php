<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\TempTablePopulator\B2C\B2CProductTempTablePopulator;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;

class B2CHTTPResponseHandlerDao
{
    private $db;

    private $b2cProductTempTablePopulator;

    private $tempTable;

    private $masterTable;

    public function __construct(string $tempTable, string $masterTable)
    {
        $this->tempTable=$tempTable;
        $this->masterTable=$masterTable;
        $this->db = \Pimcore\Db::get();
        $this->b2cProductTempTablePopulator = new B2CProductTempTablePopulator();
    }


    public function moveTempToMaster(int $pimId): bool
    {
        $sql = "SELECT * FROM ".$this->tempTable." WHERE id = ".$pimId;
        $resultTemp = $this->db->fetchAllAssociative($sql);
        foreach($resultTemp as $resultArr)
        {
            unset($resultArr['id']);
            return $this->replaceMasterRow($this->masterTable,$resultArr);
        }
        return false;
    }

    public function replaceMasterRow(string $table, $data): bool
    {
        $fields = $values = array();
        foreach(array_keys($data) as $key )
        {
            $fields[] = "`$key`";
            $values[] =   $data[$key] === null ?  'NULL' : $this->db->quote($data[$key]);
        }

        $fields = implode(",", $fields);
        $values = implode(",", $values);
        $sql = "REPLACE INTO `$table` ($fields) VALUES ($values)";
        if($this->db->executeQuery($sql)){
            return true;
        }
        return false;
    }


    public function updateCategoryInProductMasterFromTemp(int $pimId)
    {
        $sql = "SELECT * FROM ".$this->masterTable." where id = ".$pimId;
        $resultMaster = $this->db->fetchAllAssociative($sql);
        foreach($resultMaster as $resultArr)
        {
            $sql = "SELECT * FROM ".$this->tempTable." where id = ".$pimId;
            $resultTemp = $this->db->fetchAllAssociative($sql);
            foreach($resultTemp as $resultArrTemp)
            {
                $newMasterArray = array();
                $newMasterArray['B2CCategory'] = $resultArr['B2CCategory'] = $resultArrTemp['B2CCategory'];
                $hashRelationArray = $this->b2cProductTempTablePopulator->addHashesToTempTableData([$resultArr]);
                $newMasterArray['relationalHash'] = $hashRelationArray[0]['relationalHash'];
                return $this->updateMasterRow($resultArr['id'], $newMasterArray);
            }
        }
        return false;
    }

    private function updateMasterRow(int $pimId, array $newMasterArray): bool
    {
        $updateColumn  = '';
        $index = 0;
        foreach(array_keys($newMasterArray) as $key )
        {
            $index++;
            $updateColumn .= $key ." = ";
            $updateColumn .=   $newMasterArray[$key] === null ?  'NULL' : $this->db->quote($newMasterArray[$key]);
            if($index != count($newMasterArray)){
                $updateColumn .= ", ";
            }
        }
        $updateColumn = trim($updateColumn, ",");
        $sql = "UPDATE `$this->masterTable` SET $updateColumn WHERE id = $pimId";
        if($this->db->executeQuery($sql)){
            return true;
        }
        return false;
    }

}
