<?php

namespace ContitechCS\ProductBundle\Workflow;

use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Symfony\Component\Workflow\Event\TransitionEvent;
use Symfony\Component\Workflow\Event\CompletedEvent as Event;
use Pimcore\Model\Element\ValidationException;


class ProductEnrichmentListener 
{
    private $config;
    private $transitionConfig;
    private $validationService;
    public function __construct() {
        $this->validationService = \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\MandatoryValidationService');
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


    public function checkIfChildsArchive($product, $transitionName) {
        $list = new DataObject\CSProducts\Listing();
        $list->setIgnoreLocalizedFields(true);
        $list->setCondition('o_path like '.$list->quote($product->getPath().$product->getKey()."%").' AND (`isArchived` is NULL OR `isArchived` = false) ');
        
        if (count($list)>0) {
            return ['success' => false, 'msg' => 'Not able to archive as all childs are not archived.'];
        } else {
            return ['success' => true];
        }
    }
    
    public function checkForMandatoryValidation($product, $transitionName) {
        $success = true;
        $msg = '';
        try {
            $validationApplicability = $this->validationService->checkValidationApplicability($product);
            if ($validationApplicability) {
                $reqAttributesByUser = [];
                if($transitionName != "publish_product") {
                    $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
                    $reqAttributesByUser = \ContitechCS\ProductBundle\Helper\CommonHelper::getEditableFieldsByUser($currentUser);
                }
                $this->validationService->checkForMandatoryValidation($product, $reqAttributesByUser);
            }
        } catch (\Exception $ex) {
            $success = false;
            $msg = $ex->getMessage();
        }
        return ['success' => $success, 'msg' => $msg];
    }
    
    public function checkIfParentUnPublished($product, $transitionName) {
        $success = true;
        $msg = '';
        try {
            $this->validationService->checkForParentUnpublishValidation($product);
        }  catch (\Exception $ex) {
            $success = false;
            $msg = $ex->getMessage();
        }
        return ['success' => $success, 'msg' => $msg];
    }
    
    public function csWorkflowActions(TransitionEvent $event) {
        $transition = $event->getTransition();
        $transitionName = $transition->getName();
        $product = $event->getSubject();
        if (!empty($transitionName) && !empty($this->transitionConfig) && !empty($this->transitionConfig[$transitionName])) {
            $transitionConfig = $this->transitionConfig[$transitionName];
            if (!empty($transitionConfig)) {
                if (!empty($transitionConfig['condition'])) {
                    $validationMethods = $transitionConfig['condition']['methods'];
                    foreach ($validationMethods as $method) {
                        $response = $this->$method($product, $transitionName);
                        if (empty($response['success'])) {
                            throw new ValidationException($response['msg']);
                        }
                    }
                }
                if (!empty($transitionConfig['action'])) {
                    \Pimcore\Model\Version::disable(); 
                        foreach($transitionConfig['action'] as $key => $value) {
                            $setter = "set".ucfirst($key);
                            $product->$setter($value);
                        }
                        $product->save(false);
                    \Pimcore\Model\Version::enable();
                }
            }
        }
    }
    
    public function csWorkflowNotification(Event $event) {
        $transition = $event->getTransition();
        
        $transitionName = $transition->getName();
        $product = $event->getSubject();
        $workflow = $event->getWorkflow();
        $deepLink = $this->getProductDeepLink($product);
        
        if (!empty($transitionName) && !empty($this->config) && !empty($this->config[$transitionName])) {
            $transitionConfig = $this->config[$transitionName];
            if (!empty($transitionConfig['action'])) {
                \Pimcore\Model\Version::disable(); 
                foreach($transitionConfig['action'] as $key => $value) {
                    $setter = "set".ucfirst($key);
                    $product->$setter($value);
                }
                $product->save(false);
                \Pimcore\Model\Version::enable();
            }
            $template = $transitionConfig['templatePath'];
            $to = $transitionConfig['notificationTo'];
            $cc = $transitionConfig['notificationCC'];
            $toEmails = $this->getUserEmailsListByRoles($to, $product);
            $ccEmails = $this->getUserEmailsListByRoles($cc, $product);
            $parentCategory = $product->getParentCategory();
            $categoryName = '';
            if (!empty($parentCategory) && count($parentCategory)>0) {
                $categoryName = $parentCategory[0]->getName();
            }
            $actionRemark = $this->getActionRemarks($product);
            $params = [
                'template' => $template,
                'toEmails' => $toEmails,
                'ccEmails' => $ccEmails,
                'params' => [
                    'deeplink' => $deepLink,
                    'productName' => $product->getName(),
                    'parentCategoryName' => $categoryName,
                    'actionRemark' => $actionRemark
                ]
            ];
            $this->sendMail($params);
        }
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
//                if (in_array('ProductOwner', $userRolesArray['users'])) {
//                    $userIds[] = $product->getProductOwner();
//                } 
//                if (in_array('UserOwner', $userRolesArray['users'])) {
//                    $userIds[] = $product->getUserOwner();
//                }
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
                $productOwnerFlag = false;
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