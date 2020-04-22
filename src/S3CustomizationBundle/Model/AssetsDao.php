<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 21/2/20
 * Time: 5:31 PM
 */

namespace S3CustomizationBundle\Model;

use Pimcore\Db;


class AssetsDao
{
    private $db;

    public function __construct()
    {
        $this->db = Db::get();
    }

    public function getCurrentParentIdForObjectById($pimcoreId){
        $sql = "SELECT parentId FROM assets";
        $sql .= " WHERE id = ".$pimcoreId;

        $result = $this->db->fetchOne($sql);
        return $result;
    }

    public function getPimcorePathByPimcoreId($pimcoreId){
        $sql = "SELECT CONCAT(`path`,`filename`) FROM assets";
        $sql .= " WHERE id = ".$pimcoreId;

        $result = $this->db->fetchOne($sql);
        return $result;
    }

}