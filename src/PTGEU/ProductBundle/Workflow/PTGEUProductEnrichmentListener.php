<?php

namespace PTGEU\ProductBundle\Workflow;

use Pimcore\Model\Document;
use Symfony\Component\Workflow\Event\CompletedEvent as Event;
use Pimcore\Model\DataObject;

class PTGEUProductEnrichmentListener 
{
    private $config;
    public function __construct() {

        $wfConfigData = \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\ConfigProviderService')->getPTGEUWorkflowConfig()['parameters'];
        $this->config = isset($wfConfigData['completed']) ? $wfConfigData['completed'] : false;
        
    }

    private function getProductDeeplink($product) {
        $link = \Pimcore\Tool::getHostUrl() . "/admin/login/deeplink?";
        if ($product->getType() == 'object') {
            $link .= 'object_' . $product->getId() . '_object';
        }
        return $link;
    }

    public function ptgEuWorkflowNotification(Event $event) 
    {
        $transition = $event->getTransition();
        $transitionName = $transition->getName();
        $product = $event->getSubject();
        $workflow = $event->getWorkflow();
        $deepLink = $this->getProductDeepLink($product);
        
        if (!empty($transitionName) && !empty($this->config) && !empty($this->config[$transitionName])) {
            
            $transitionConfig = $this->config[$transitionName];
            $template = $transitionConfig['templatePath'];
            $to = $transitionConfig['notificationTo'];
            $cc = $transitionConfig['notificationCC'];
            $toEmails = $this->getUserEmailsListByRoles($to, $product);
            $ccEmails = $this->getUserEmailsListByRoles($cc, $product);
            $actionRemark = $this->getActionRemarks($product);
            $params = [
                'template' => $template,
                'toEmails' => $toEmails,
                'ccEmails' => $ccEmails,
                'params' => [
                    'deeplink' => $deepLink,
                   // 'productName' => $product->getName(),
                    'actionRemark' => $actionRemark
                ]
            ];
            $this->sendMail($params);
        }

    }

    public function getUserEmailsListByRoles($userRolesArray, $product = []) {
      
        $emailIds = [];
        if (!empty($userRolesArray)) {
            if (!empty($userRolesArray['users']) && count($userRolesArray['users']) >0) {
                $userIds = [];
                foreach ($userRolesArray['users'] as $userField) {
                    if (!empty($userField)) {
                        $getter = "get".ucfirst($userField);
                        $userIds[] = $product->$getter();
                    }
                }
                if (count($userIds)>0) {
                    $userList = new \Pimcore\Model\User\Listing();
                    $userList->setCondition("`id` IN (".implode(", ", $userIds).")");
                    foreach($userList as $user) {
                        if (!empty($user) && ($user instanceof \Pimcore\Model\User) && !empty($user->getEmail())) {
                            array_push($emailIds, $user->getEmail());
                        }
                    }
                }
            }
        if (!empty($userRolesArray['roles']) && count($userRolesArray['roles']) >0) {
                $roleArray = $userRolesArray['roles'];
                $roleClass = new \Pimcore\Model\User\Role\Listing();
                $userRoles = $roleClass->getRoles(); 
                $roleIds = [];
                foreach($userRoles as $role) {
                    if (in_array($role->getName(), $roleArray)) {
                        $roleIds[] = $role->getId();
                    }
                }
                if (!empty($roleIds)) {
                  
                    $list = new \Pimcore\Model\User\Listing();
                    $conditionArr = [];
                    foreach ($roleIds as $roleId) {
                        $conditionArr[] = '( `roles` = '.$list->quote($roleId). ' OR `roles` like '.$list->quote("%,".$roleId). ' OR `roles` like '.$list->quote($roleId.",%"). ' OR `roles` like '.$list->quote("%,".$roleId.",%"). ' )';
                    }
                    if (!empty($conditionArr)) {
                        $list->setCondition(implode(" OR ", $conditionArr));
                    }
                    $users = $list->load();
                    if (!empty($users) && count($users)>0) {
                        foreach ($users as $user) {
                            if (!empty($user->getEmail())) {
                                array_push($emailIds, $user->getEmail());
                            }
                        }
                    }
                }
            }
        }
        return $emailIds;
    }

    public function getActionRemarks($product) {
        $db = \Pimcore\Db::get();
        $sql = "SELECT description FROM notes WHERE cid='".$product->getId()."' ORDER BY `date` DESC LIMIT 1";
        $result = $db->fetchOne($sql);
        if (!empty($result)) {
            return $result;
        }
        return '';
    }

    private function sendMail($params)
    {
        $mail = new \Pimcore\Mail();
        if (!empty($params['template'])) {

            $document = Document\Email::getByPath($params['template']);

            $mail->setDocument($document);
            $mail->setSubject($document->getSubject());
        }
        if (!empty($params['toEmails'])) {
            $mail->addTo($params['toEmails']);
        } else {
            return false;
        }
        
        if (!empty($params['ccEmails'])) {
            foreach ($params['ccEmails'] as $email) {
                $mail->addCc($email);
            }
        }
        if (!empty($params['params'])) {
            $mail->setParams($params['params']);
        }
        if ($mail->send()) {
            return true;
        }
        
        return false;
    }
}