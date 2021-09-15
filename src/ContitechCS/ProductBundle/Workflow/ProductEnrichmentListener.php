<?php

namespace ContitechCS\ProductBundle\Workflow;

use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Symfony\Component\Workflow\Event\TransitionEvent;
use Symfony\Component\Workflow\Event\CompletedEvent as Event;


class ProductEnrichmentListener 
{
    private $config;
    private $transitionConfig;
    
    public function __construct() {
        
        $wfConfigData = \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\ConfigProviderService')->getWorkflowConfig()['parameters'];
        $this->config = isset($wfConfigData['completed']) ? $wfConfigData['completed'] : false;
        $this->transitionConfig = isset($wfConfigData['transition']) ? $wfConfigData['transition'] : false;
        
    }
    private function getProductDeeplink($product) {
        $link = \Pimcore\Tool::getHostUrl() . "/admin/login/deeplink?";
        if ($product->getType() == 'object') {
            $link .= 'object_' . $product->getId() . '_object';
        }
        return $link;
    }


    public function checkIfChildsArchive($product) {
        $list = new DataObject\CSProducts\Listing();
        $list->setIgnoreLocalizedFields(true);
        $list->setCondition('o_path like '.$list->quote($product->getPath().$product->getKey()."%").' AND (`isArchived` is NULL OR `isArchived` = false) ');
        
        if (count($list)>0) {
            return ['success' => false, 'msg' => 'Not able to archive as all childs are not archived.'];
        } else {
            return ['success' => true];
        }
    }
    
    public function makeRequiredChanges(TransitionEvent $event) {
        $transition = $event->getTransition();
        $transitionName = $transition->getName();
        $product = $event->getSubject();
        if (!empty($transitionName) && !empty($this->transitionConfig) && !empty($this->transitionConfig[$transitionName])) {
            $transitionConfig = $this->transitionConfig[$transitionName];
            if (!empty($transitionConfig)) {
                if (!empty($transitionConfig['condition'])) {
                    $validationMethods = $transitionConfig['condition']['methods'];
                    foreach ($validationMethods as $method) {
                        $response = $this->$method($product);
                        if (empty($response['success'])) {
                            throw new \Exception($response['msg']);
                        }
                    }
                }
                if (!empty($transitionConfig['action'])) {
                    foreach($transitionConfig['action'] as $key => $value) {
                        $setter = "set".ucfirst($key);
                        $product->$setter($value);
                    }
                }
            }
        }
    }
    
    public function csWorkflowTransitionNotification(Event $event) {
        $transition = $event->getTransition();
        $transitionName = $transition->getName();
        $product = $event->getSubject();
        $workflow = $event->getWorkflow();
        $deepLink = $this->getProductDeepLink($product);
        if (!empty($transitionName) && !empty($this->config) && !empty($this->config[$transitionName])) {
            $transitionConfig = $this->config[$transitionName];
            $template = $transitionConfig['templatePath'];
            $toRoles = $transitionConfig['notificationToRoles'];
            $ccRoles = $transitionConfig['notificationCCRoles'];
            $toEmails = $this->getUserEmailsListByRoles($toRoles, $product);
            $ccEmails = $this->getUserEmailsListByRoles($ccRoles, $product);
            $params = [
                'template' => $template,
                'toEmails' => $toEmails,
                'ccEmails' => $ccEmails,
                'params' => [
                    'deeplink' => $deepLink
                ]
            ];
            $this->sendMail($params);
        }
    }
    
    
    public function getUserEmailsListByRoles($roles, $product = []) {
        $emailIds = [];
        if (!empty($roles)) {
            $roleClass = new \Pimcore\Model\User\Role\Listing();
            $userRoles = $roleClass->getRoles(); 
            $roleIds = [];
            $productOwnerFlag = false;
            foreach($userRoles as $role) {
                if (in_array($role->getName(), $roles)) {
                    if ($role->getName() != 'ProductManagerCS') {
                        $roleIds[] = $role->getId();
                    } else {
                        $userId = $product->getProductOwner();
                        if (!empty($userId)) {
                            $user = \Pimcore\Model\User::getById($userId);
                            if (!empty($user) && ($user instanceof \Pimcore\Model\User) && !empty($user->getEmail())) {
                                array_push($emailIds, $user->getEmail());
                            } else {
                                $roleIds[] = $role->getId();
                            }
                        } else {
                            $roleIds[] = $role->getId();
                        }
                    }
                }
            }
            if (!empty($roleIds)) {
                $list = new \Pimcore\Model\User\Listing();
                $list->setCondition("`roles` IN (".implode(", ", $roleIds).")");
                $list->load();
                $users = $list->getUsers();
                if (!empty($users) && count($users)>0) {
                    
                    foreach ($users as $user) {
                        if (!empty($user->getEmail())) {
                            array_push($emailIds, $user->getEmail());
                        }
                    }
                    
                    return $emailIds;
                }
            }
        }
        return $emailIds;
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