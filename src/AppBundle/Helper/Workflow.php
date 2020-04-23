<?php
namespace AppBundle\Helper;
use Pimcore\Db;
class Workflow {

    private $db;
    public function __construct()
    {
        $this->db = Db::get();
    }

    public function getUserByRole($roleName) {
        $users = new \Pimcore\Model\User\Listing;
        $sql = "SELECT u1.id, u1.type, u1.firstname, u1.lastname, concat(u1.firstname, u1.lastname) fullname, u1.email, concat(now(), ' ',@@system_time_zone) as system_time FROM `users` u1 JOIN `users` u2 ON(u1.roles REGEXP u2.id AND u2.type='role' AND u2.name=".$this->db->quote($roleName).") ";
        return $this->db->fetchAll($sql);
    }

    public function getArrayColumn($data, $index) {
        if(!empty($data) && isset($data[0]['email'])) {
            return array_column($data, $index);
        }
        return false;
    }

}