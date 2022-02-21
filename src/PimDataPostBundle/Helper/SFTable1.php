<?php

namespace PimDataPostBundle\Helper;

use Pimcore\Db;

class SFTable1
{

    private $tableName;
    private $db;

    /**
     * Getting DB connection object
     */
    public function __construct()
    {
        $this->db = Db::get();
        $this->tableName = 'article_import_to_salesforce';
    }
    
    public function insertRecrodIntoTable($object_id, $update_type, $relation_attr_name, $old_data, $operation_type, $relation_update_status) {
        try {
            $values  = '("'.$object_id.'", "'.$update_type.'", "'.$relation_attr_name.'", "'.$old_data.'", "'.$operation_type.'", "'.$relation_update_status.'", 0);';
            $query     = "INSERT INTO {$this->tableName} (`object_id`, `update_type`, `relation_attr_name`, `old_data`, `operation_type`, `relation_update_status`, `process_status`) VALUES ". $values;
            $this->db->query($query);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getRelationalAttrId($object_id, $relation_attr_name) {
        try {
            $query = "SELECT {$relation_attr_name} FROM object_query_1 WHERE oo_id ='{$object_id}'";
            return $this->db->fetchColumn($query);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function checkAlreadyEntryExist($object_id, $relation_attr_name, $relation_update_status) {
        try {
            $query = "SELECT `id` FROM {$this->tableName} WHERE (`object_id` ='{$object_id}' AND `relation_attr_name` ='{$relation_attr_name}' AND `relation_update_status`= '{$relation_update_status}')";
            return $this->db->fetchRow($query);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function setRelationalUpdateStatusFlag($object_id, $relation_attr_name, $relation_update_status) {
        try {
            $query = "UPDATE {$this->tableName} SET `relation_update_status` = {$relation_update_status} WHERE `object_id` ='{$object_id}' AND `relation_attr_name` = '{$relation_attr_name}' ORDER BY `created_date` DESC LIMIT 1";
            $this->db->query($query);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
}
