<?php

namespace PTGEU\ProductBundle\Workflow;

use Pimcore\Model\Document;
use Symfony\Component\Workflow\Event\TransitionEvent;
use Symfony\Component\Workflow\Event\CompletedEvent as Event;
use Pimcore\Model\Element\ValidationException;
use Pimcore\Model\DataObject;
use PTGEU\ProductBundle\Helper\CommonHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

class PTGEUProductEnrichmentListener
{
    private $config;
    private $validationService;
    private $transitionConfig;
    private $container;
    const ROLES_LIKE = ' OR `roles` like ';

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->validationService = $this->container->get(
            'PTGEU\ProductBundle\Services\PTGEUMandatoryValidationService'
        );
        $wfConfigData = $this->container->get(
            'PTGEU\ImportBundle\Services\ConfigProviderService'
        )->getPTGEUWorkflowConfig()['parameters'];
        $this->config = isset($wfConfigData['completed']) ? $wfConfigData['completed'] : false;
        $this->transitionConfig = isset($wfConfigData['transition']) ? $wfConfigData['transition'] : false;
    }

    private function getProductDeeplink($product)
    {
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
        $deepLink = $this->getProductDeepLink($product);
        if (!empty($transitionName) && !empty($this->config) && !empty($this->config[$transitionName])) {

            $transitionConfig = $this->config[$transitionName];
            $template = $transitionConfig['templatePath'];
            $to = $transitionConfig['notificationTo'];
            // $cc = $transitionConfig['notificationCC'];
            $toEmails = $this->getUserEmailsListByRoles($to, $product);
            // $ccEmails = $this->getUserEmailsListByRoles($cc, $product);
            $actionRemark = $this->getActionRemarks($product);
            $params = [
                'template' => $template,
                'toEmails' => $toEmails,
                // 'ccEmails' => $ccEmails,
                'params' => [
                    'deeplink' => $deepLink,
                    'actionRemark' => $actionRemark
                ]
            ];
            // $this->sendMail($params);
        }
    }

    public function getUserEmailsListByRoles($userRolesArray, $product)
    {

        $emailIds = [];
        if (!empty($userRolesArray)) {
            if (!empty($userRolesArray['users']) && count($userRolesArray['users']) > 0) {
                $userIds = [];
                foreach ($userRolesArray['users'] as $userField) {
                    if (!empty($userField)) {
                        $getter = "get" . ucfirst($userField);
                        $userIds[] = $product->$getter();
                    }
                }
                if (!empty($userIds)) {
                    $userList = new \Pimcore\Model\User\Listing();
                    $userList->setCondition("`id` IN (" . implode(", ", $userIds) . ")");
                    foreach ($userList as $user) {
                        if (!empty($user) && ($user instanceof \Pimcore\Model\User) && !empty($user->getEmail())) {
                            array_push($emailIds, $user->getEmail());
                        }
                    }
                }
            }
            if (!empty($userRolesArray['roles']) && count($userRolesArray['roles']) > 0) {
                $roleArray = $userRolesArray['roles'];
                $roleClass = new \Pimcore\Model\User\Role\Listing();
                $userRoles = $roleClass->getRoles();
                $roleIds = [];
                foreach ($userRoles as $role) {
                    if (in_array($role->getName(), $roleArray)) {
                        $roleIds[] = $role->getId();
                    }
                }
                if (!empty($roleIds)) {

                    $list = new \Pimcore\Model\User\Listing();
                    $conditionArr = [];
                    foreach ($roleIds as $roleId) {
                        $conditionArr[] = '( `roles` = ' . $list->quote($roleId) . self::ROLES_LIKE .
                            $list->quote("%," . $roleId) . self::ROLES_LIKE . $list->quote($roleId . ",%") .
                            self::ROLES_LIKE . $list->quote("%," . $roleId . ",%") . ' )';
                    }
                    if (!empty($conditionArr)) {
                        $list->setCondition(implode(" OR ", $conditionArr));
                    }
                    $users = $list->load();
                    if (!empty($users) && count($users) > 0) {
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

    public function getActionRemarks($product)
    {
        $db = \Pimcore\Db::get();
        $sql = "SELECT description FROM notes WHERE cid='" . $product->getId() . "' ORDER BY `date` DESC LIMIT 1";
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
            $mail->subject($document->getSubject());
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

    public function checkIfChildPublished($product)
    {
        $list = new DataObject\PTGEUProduct\Listing();
        $list->setIgnoreLocalizedFields(true);
        $list->setCondition('path like ' . $list->quote($product->getPath() .
            $product->getKey() . "%") . ' AND (`published` = 1) ');
        if (count($list) > 0) {
            return ['success' => false, 'msg' => 'Not able to archive/pause as all childs are not archived/paused.'];
        } else {
            return ['success' => true];
        }
    }

    public function checkForMandatoryValidation($product, $transitionName)
    {
        $success = true;
        $msg = '';
        try {
            $reqAttributesByUser = [];
            if ($transitionName != "approved") {
                $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
                $reqAttributesByUser = CommonHelper::getEditableFieldsByUser($currentUser);
            }
            $this->validationService->checkForMandatoryValidation($product, $reqAttributesByUser);
        } catch (\Exception $ex) {
            $success = false;
            $msg = $ex->getMessage();
        }
        return ['success' => $success, 'msg' => $msg];
    }

    public function checkIfParentUnPublished($product)
    {
        $success = true;
        $msg = '';
        try {
            $this->validationService->checkForParentUnpublishValidation($product);
        } catch (\Exception $ex) {
            $success = false;
            $msg = $ex->getMessage();
        }
        return ['success' => $success, 'msg' => $msg];
    }


    public function ptgEuWorkflowActions(TransitionEvent $event)
    {
        $transition = $event->getTransition();
        $transitionName = $transition->getName();
        $product = $event->getSubject();
        if (
            !empty($transitionName) && !empty($this->transitionConfig) &&
            !empty($this->transitionConfig[$transitionName])
        ) {
            $transitionConfig = $this->transitionConfig[$transitionName];
            if (!empty($transitionConfig)) {
                $this->transitionCondition($transitionConfig, $product, $transitionName);
                $this->transitionAction($transitionConfig, $product);
            }
        }
    }

    public function transitionCondition($transitionConfig, $product, $transitionName)
    {
        if (!empty($transitionConfig['condition'])) {
            $validationMethods = $transitionConfig['condition']['methods'];
            foreach ($validationMethods as $method) {
                $response = $this->$method($product, $transitionName);
                if (empty($response['success'])) {
                    throw new ValidationException($response['msg']);
                }
            }
        }
    }

    public function transitionAction($transitionConfig, $product)
    {
        if (!empty($transitionConfig['action'])) {
            \Pimcore\Model\Version::disable();
            foreach ($transitionConfig['action'] as $key => $value) {
                $setter = "set" . ucfirst($key);
                $product->$setter($value);
            }
            $product->save();
            \Pimcore\Model\Version::enable();
        }
    }
}
