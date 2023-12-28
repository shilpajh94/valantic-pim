<?php

namespace PTGEU\ImportBundle\Model;
use Pimcore\Db;
use Exception;

class EditablesModel
{
    private $db;

    /**
     * Function is constructor and set the db connection
     */
    public function __construct()
    {
        $this->db  = Db::get();
    }
    /**
     * Function to get all products
     */
    public function getAllProducts() {
        $sql   = "SELECT oo_id, articleNumber FROM `object_query_38` WHERE articleNumber IS NOT NULL";
        $queryData = $this->db->fetchAllAssociative($sql);

        return [
            'queryTableData' => $queryData
        ];
    }
    
    /**
     * Function to insert data into product query and store tables
     */
    public function insertDataForEditablesIntoTable($dataArray, $tableName, $objId){
        $cols = array();

        foreach($dataArray as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE $tableName SET " . implode(', ', $cols) . " WHERE oo_id =  $objId";
        $this->db->executeQuery($sql);

        echo $objId;
        echo PHP_EOL;
    }

    /**
     * Function to inserts localized data into product localized tables
     */

    public function insertDataForLocalizedEditablesIntoTable($dataArray, $tableName, $objId){
        $cols = array();

        foreach($dataArray as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE $tableName SET " . implode(', ', $cols) . " WHERE ooo_id =  $objId";
        $this->db->executeQuery($sql);
    }
}
