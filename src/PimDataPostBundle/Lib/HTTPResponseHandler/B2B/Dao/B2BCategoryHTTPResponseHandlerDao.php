<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2B\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;

class B2BCategoryHTTPResponseHandlerDao
{
    private $db;

    public function __construct($tempTable , $masterTable)
    {
        $this->tempTable=$tempTable;
        $this->masterTable=$masterTable;
        $this->db = \Pimcore\Db::get();
    }


    public function moveTempToMaster(int $pimId): bool
    {
        $sql = "select * from ".$this->tempTable." where o_id = ".$pimId;
        $resultTemp = $this->db->fetchAll($sql); 
        foreach($resultTemp as $resultArr)
        {
        $id=$resultArr['id'];
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
            $values[] = "'" . $data[$key] . "'";
        }
        $fields = implode(",", $fields);
        $values = implode(",", $values);
        $sql = "REPLACE INTO `$table` ($fields) VALUES ($values)";
        if($this->db->query($sql))
        return true;
        else
        return false;
    }

}

