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
        $sql = "SELECT u1.id, u1.type, u1.firstname, u1.lastname, concat_ws(u1.firstname, u1.lastname) fullname, 
        u1.email, concat(now(), ' ',@@system_time_zone) as system_time FROM `users` u1 
        JOIN `users` u2 ON(u1.roles REGEXP u2.id AND u2.type='role' AND u2.name=".$this->db->quote($roleName).") ";
        return $this->db->fetchAll($sql);
    }

    public function getArrayColumn($data, $index) {
        if(!empty($data) && isset($data[0]['email'])) {
            return array_column($data, $index);
        }
        return false;
    }

    public function getActionRemarksById($id) {
        $sql = "SELECT n.description FROM notes n  
        WHERE n.cid=$id ORDER BY n.`date` DESC LIMIT 1";
        $results = $this->db->fetchAll($sql);
        if(count($results)) {
            foreach ($results as $row) {
                return $row['description'];
            }
        }
        return '';
    }

    public function getDeepLink($id, $type="object") {
        $link = "login/deeplink?";
        if($type=='object') {
            $link .= 'object_'.$id.'_object';
        }
        return $link;
    }

}