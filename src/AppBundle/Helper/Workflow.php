<?php

namespace AppBundle\Helper;

use Pimcore\Db;

class Workflow
{

    private $db;
    public function __construct()
    {
        $this->db = Db::get();
    }


    /**
     * It will return last notes on workflow transition
     * @param object id
     */
    public function getActionRemarksById($id)
    {
        $sql = "SELECT n.description, nd.name optionname, nd.data prioritytype FROM notes n LEFT JOIN notes_data nd ON(nd.id=n.id) 
        WHERE n.cid=$id ORDER BY n.`date` DESC LIMIT 1";
        $results = $this->db->fetchAll($sql);
        if (count($results)) {
            foreach ($results as $row) {
                return array(
                    'description'   =>  $row['description'],
                    'optionName'    =>  !empty($row['optionname']) ? strtolower($row['optionname']) : NULL,
                    'priorityType'  =>  !empty($row['prioritytype']) ? strtolower($row['prioritytype']) : NULL
                );
            }
        }
        return '';
    }

    public function getTemplatePath($transitionName, $optionName = "", $optionVal = "")
    {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig()['parameters'];
        $transitions = isset($wfConfigData['transitions']) ? $wfConfigData['transitions'] : false;

        if (!empty($optionName) && !empty($optionVal)) {
            return $transitions[$transitionName][$optionName][$optionVal]['templatePath'];
        } else {
            return $transitions[$transitionName]['defaultTemplatePath'];
        }
    }

    public function getReminderTemplatePath($placeName)
    {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig()['parameters'];
        $reminder = isset($wfConfigData['reminder']) ? $wfConfigData['reminder'] : false;
        return $reminder['places'][$placeName]['templatePath'];        
    }

    public function getBUAdminTemplatePath()
    {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig()['parameters'];
        $reminder = isset($wfConfigData['reminder']) ? $wfConfigData['reminder'] : false;
        return $reminder['places']['buAdminTemplatePath'];        
    }

    public function getReminderInterval($placeName) {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig()['parameters'];
        $reminder = isset($wfConfigData['reminder']) ? $wfConfigData['reminder'] : false;
        return $reminder['places'][$placeName]['reminderIntervalDay'];
    }

    public function getBUAdminReminderInterval($placeName) {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig()['parameters'];
        $reminder = isset($wfConfigData['reminder']) ? $wfConfigData['reminder'] : false;
        return $reminder['places'][$placeName]['reminderToBUAdminIntervalDay'];
    }

    public function getReminderSubject($placeName) {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig()['parameters'];
        $reminder = isset($wfConfigData['reminder']) ? $wfConfigData['reminder'] : false;
        return $reminder['places'][$placeName]['subject'];
    }



    /**
     * Return object deeplink
     * @param int object id
     * @param object type
     */
    public function getDeepLink($id, $type = "object")
    {
        $link = \Pimcore\Tool::getHostUrl() . "/admin/login/deeplink?";
        if ($type == 'object') {
            $link .= 'object_' . $id . '_object';
        }
        return $link;
    }

    /**
     * Return deeplink
     * @param int object id
     * @param object type
     */
    public function getDeepLinkByCommandLine($id, $type = "object")
    {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig()['parameters'];
        $link = $wfConfigData['host']. "/admin/login/deeplink?";
        if ($type == 'object') {
            $link .= 'object_' . $id . '_object';
        }
        return $link;
    }

    /**
     * Get user list belong to given group
     * @param Int $roleId, $groupId
     */
    public function getUserByRoleAndGroup($roleId, $groupIds)
    {
        $users = new \Pimcore\Model\DataObject\Users\Listing;
        $roleId = is_array($roleId) ? $roleId[0] : $roleId;
        $rId = $this->getOppositeUserRoleIdByRoleId($roleId);

        if (!empty($rId)) {
            $users->setCondition("userType LIKE '%$rId%'");
        }
        if (!empty($groupIds)) {
            foreach ($groupIds as $groupObj) {
                $users->addConditionParam("MaterialGroupAccess = ?", $groupObj->getId(), "OR");
            }
        }
        $users->load();
        foreach ($users as $user) {
            $fn = $user->getFirstname() . '.txt';
        }
        unset($rId);
        return $users;
    }

    /**
     * It will return editor or product manager role id, If role id belong to editor, then it will return product manager role id else editor role id
     * @param Int $roldId
     */
    public function getOppositeUserRoleIdByRoleId($roleId)
    {
        $wfConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getWorkFlowConfig()['parameters'];
        if ($roleId == $wfConfigData['roles']['editor']['id']) {
            return $wfConfigData['roles']['productManager']['id'];
        } else {
            return $wfConfigData['roles']['editor']['id'];
        }
    }


    public function getDateTime()
    {
        return date('m/d/Y h:i:s A ') . ' ' . date_default_timezone_get();
    }
}
