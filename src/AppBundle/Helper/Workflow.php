<?php
namespace AppBundle\Helper;
use Pimcore\Db;
class Workflow {

    private $db;
    public function __construct()
    {
        $this->db = Db::get();
    }

    /* public function getUserByRole($roleName) {
        $sql = "SELECT u1.id, u1.type, u1.firstname, u1.lastname, concat_ws(u1.firstname, u1.lastname) fullname, 
        u1.email, concat(now(), ' ',@@system_time_zone) as system_time FROM `users` u1 
        JOIN `users` u2 ON(u1.roles REGEXP u2.id AND u2.type='role' AND u2.name=".$this->db->quote($roleName).") ";
        return $this->db->fetchAll($sql);
    } */
    

    /**
     * It will return last notes on workflow transition
     * @param object id
    */
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

    /**
     * Return object deeplink
     * @param int object id
     * @param object type
    */
    public function getDeepLink($id, $type="object") {
        $link = \Pimcore\Tool::getHostUrl()."/admin/login/deeplink?";
        if($type=='object') {
            $link .= 'object_'.$id.'_object';
        }
        return $link;
    }

    /**
     * Get user list belong to given group
     * @param Int $roleId, $groupId
    */
    public function getUserByRoleAndGroup($roleId, $groupIds) {
        $users = new \Pimcore\Model\DataObject\Users\Listing;
        $rId = $this->getOppositeUserRoleIdByRoleId($roleId);
        if(!empty($rId)) {
            $users->setCondition("userType LIKE '%$rId%'");
        }
        if(!empty($groupIds)) {
            foreach($groupIds as $groupObj) {                
                $users->setCondition("MaterialGroupAccess LIKE '%".$groupObj->getId()."%'");
            }            
        }
        $users->load();
        unset($rId);
        return $users;
    }

    /**
     * It will return editor or product manager role id, If role id belong to editor, then it will return product manager role id else editor role id
     * @param Int $roldId
    */
    public function getOppositeUserRoleIdByRoleId($roleId) {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig();
        if($roleId==$wfConfigData['roles']['editor']['id']) {
            return $wfConfigData['roles']['productManager']['id'];
        } else {
            return $wfConfigData['roles']['editor']['id'];
        }
    }


    public function getDateTime() {
        return date('m/d/Y h:i:s A ').' '.date_default_timezone_get();
    }
}