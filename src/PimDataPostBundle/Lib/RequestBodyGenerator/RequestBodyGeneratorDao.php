<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

class RequestBodyGeneratorDao
{
    private $db;
    
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }
    
    public function fetchOne($sql) {
        try {
            if (!empty($sql)) {
                return $this->db->fetchOne($sql);
            }
            return null;
        } catch (Exception $ex) {

        }
    }
}

