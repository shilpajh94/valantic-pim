<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2B;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;

class B2BHTTPResponseHandlerDao
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
        $sql = "select * from ".$this->tempTable." where id = ".$pimId;
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

}
