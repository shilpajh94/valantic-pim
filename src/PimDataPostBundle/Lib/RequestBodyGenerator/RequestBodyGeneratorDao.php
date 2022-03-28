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

    public function getObjectType(int $objectId): string
    {
        $sql = "SELECT o_type FROM objects";
        $sql .= " WHERE o_id = :o_id";
        return $this->db->fetchOne($sql,["o_id" => $objectId]);
    }

    public function getParentId(int $objectId): int
    {
        $sql = "SELECT o_parentId FROM objects";
        $sql .= " WHERE o_id = :o_id";
        return $this->db->fetchOne($sql,["o_id" => $objectId]);
    }

}

