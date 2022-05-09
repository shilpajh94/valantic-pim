<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;

class B2CHTTPResponseHandlerDao
{
    private $db;

    public function __construct(string $tempTable, string $masterTable)
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
        if($this->db->query($sql)){
            return true;
        }
        return false;
    }

}

