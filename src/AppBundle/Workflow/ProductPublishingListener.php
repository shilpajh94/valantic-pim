<?php

namespace AppBundle\Workflow;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\CompletedEvent;
use AppBundle\Workflow\Constants as WFConst;

class ProductPublishingListener implements EventSubscriberInterface
{
    
    public function getProductSIOP($product) {
        $siopArray = [];
        if (!empty($product->getSIOPLevel4())) {
            $siopArray[] = $product->getSIOPLevel4()[0]->getId();
        }
        return $siopArray;
    }
    /**
     * Product enrich completed event, When product enrich completed, then notify to publisher
     * @param event $workflow event
     */
    public function completedEnrichProductEvent(CompletedEvent $event)
    {
        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $edEmail = '';
        $edFirstName = '';
        $edLastName = '';
        $edFullName = '';
        $actionRemarkInfo = array();
        $actionRemark = '';
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $userInfo = \Pimcore\Model\DataObject\Users::getByAdminReference($user->getId(), ['limit' => 1]);
        if (empty($userInfo)) {
            return true;
        }
        $product = $event->getSubject();
        
        $productManagers = $wfHelper->getUserByRoleAndGroup($userInfo->getUserType(), $this->getProductSIOP($product));
        $productId = $product->getId();
        $workflow = $event->getWorkflow();
        $deepLink = $wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_START_PROCESSING_ACTION_NAME) {
            $edEmail = $user->getEmail();
            $edFirstName = $user->getFirstname();
            $edLastName = $user->getLastname();
            $edFullName = $edFirstName . ' ' . $edLastName;
            $actionRemarkInfo = $wfHelper->getActionRemarksById($productId);
            $actionRemark = $actionRemarkInfo['description'];
            unset($user);            
            if (!empty($productManagers) && !empty($productManagers->getObjects())) {
                foreach ($productManagers->getObjects() as $k => $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_REVIEW_SUBJECT,
                        'templateName'  =>  $wfHelper->getTemplatePath(WFConst::PB_START_PROCESSING_ACTION_NAME, $actionRemarkInfo['optionName'], $actionRemarkInfo['priorityType']),
                        'toEmails'      =>  array($user->getEmail() => $user->getFirstname() . ' ' . $user->getLastname()),
                        'ccEmails'      =>  array($edEmail => $edFullName),
                        'dataParams'    =>  array('pmFullName' => $user->getFirstname() . ' ' . $user->getLastname(), 'edFullName' => $edFullName, 'actionRemark' => $actionRemark, 'deepLink' => $deepLink, 'articleNumber' => $articleNumber)
                    );

                    $email = \Pimcore::getContainer()->get('email.email_notification_service');
                    $email->sendNotificationsEmail($array);
                    unset($array);
                }
            }
        }
        return true;
    }

    /**
     * Product Enrich Again Event, When publisher reject the product and ask to editor to enrich the product again
     * @param event $workflow event
     */

    public function completedEnrichAgainProductEvent(CompletedEvent $event)
    {
        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $cuEmail = '';
        $cuFirstName = '';
        $cuLastName = '';
        $cuFullName = '';
        $actionRemarkInfo = array();
        $actionRemark = '';
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $userInfo = \Pimcore\Model\DataObject\Users::getByAdminReference($user->getId(), ['limit' => 1]);
        if (empty($userInfo)) {
            return true;
        }
        $product = $event->getSubject();
        $productEditors = $wfHelper->getUserByRoleAndGroup($userInfo->getUserType(), $this->getProductSIOP($product));
        
        $productId = $product->getId();
        $deepLink = $wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_ENRICH_AGAIN_ACTION_NAME) {
            $cuEmail = $user->getEmail();
            $cuFirstName = $user->getFirstname();
            $cuLastName = $user->getLastname();
            $cuFullName = $cuFirstName . ' ' . $cuLastName;
            $actionRemarkInfo = $wfHelper->getActionRemarksById($productId);
            $actionRemark = $actionRemarkInfo['description'];
            unset($user);
            if (!empty($productEditors) && !empty($productEditors->getObjects())) {
                foreach ($productEditors->getObjects() as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_ENRICH_SUBJECT,
                        'templateName'  =>  $wfHelper->getTemplatePath(WFConst::PB_ENRICH_AGAIN_ACTION_NAME, $actionRemarkInfo['optionName'], $actionRemarkInfo['priorityType']),
                        'toEmails'      =>  array($user->getEmail() => $user->getFirstname() . ' ' . $user->getLastname()),
                        'ccEmails'      =>  array($cuEmail => $cuFullName),
                        'dataParams'    =>  array('pmFullName' => $cuFullName, 'edFullName' => $user->getFirstname() . ' ' . $user->getLastname(), 'actionRemark' => $actionRemark, 'deepLink' => $deepLink, 'articleNumber' => $articleNumber)
                    );
                    $email = \Pimcore::getContainer()->get('email.email_notification_service');
                    $email->sendNotificationsEmail($array);
                    unset($array);
                }
            }
        }
        return true;
    }

    /**
     * Product published event, When product got publish, then notify to editor
     * @param event $workflow event
     */

    public function completedPublishProductEvent(CompletedEvent $event)
    {
        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $cuEmail = '';
        $cuFirstName = '';
        $cuLastName = '';
        $cuFullName = '';
        $actionRemarkInfo = array();
        $actionRemark = '';
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $userInfo = \Pimcore\Model\DataObject\Users::getByAdminReference($user->getId(), ['limit' => 1]);
        if (empty($userInfo)) {
            return true;
        }
        $product = $event->getSubject();
        $productEditors = $wfHelper->getUserByRoleAndGroup($userInfo->getUserType(), $this->getProductSIOP($product));
        
        $productId = $product->getId();
        $deepLink = $wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_PUBLISH_ACTION_NAME) {
//            $product->setPublished(1);
//            $product->save();
            $cuEmail = $user->getEmail();
            $cuFirstName = $user->getFirstname();
            $cuLastName = $user->getLastname();
            $cuFullName = $cuFirstName . ' ' . $cuLastName;
            $actionRemarkInfo = $wfHelper->getActionRemarksById($productId);
            $actionRemark = $actionRemarkInfo['description'];
            unset($user);
            if (!empty($productEditors) && !empty($productEditors->getObjects())) {
                foreach ($productEditors->getObjects() as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_PUBLISH_SUBJECT,
                        'templateName'  =>  $wfHelper->getTemplatePath(WFConst::PB_PUBLISH_ACTION_NAME, $actionRemarkInfo['optionName'], $actionRemarkInfo['priorityType']),
                        'toEmails'      =>  array($user->getEmail() => $user->getFirstname() . ' ' . $user->getLastname()),
                        'ccEmails'      =>  array($cuEmail => $cuFullName),
                        'dataParams'    =>  array('pmFullName' => $cuFullName, 'pmEmail' => $cuEmail, 'edFullName' => $user->getFirstname() . ' ' . $user->getLastname(), 'pmTimestamp' => $wfHelper->getDateTime(), 'actionRemark' => $actionRemark, 'deepLink' => $deepLink, 'articleNumber' => $articleNumber)
                    );
                    $email = \Pimcore::getContainer()->get('email.email_notification_service');
                    $email->sendNotificationsEmail($array);
                    unset($array);
                }
            }
        }
        return true;
    }

    /**
     * Product unpublished event, When product enrich completed, then notify to publisher
     * @param event $workflow event
     */

    public function completedUnpublishProductEvent(CompletedEvent $event)
    {
        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $cuEmail = '';
        $cuFirstName = '';
        $cuLastName = '';
        $cuFullName = '';
        $actionRemarkInfo = array();
        $actionRemark = '';
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $userInfo = \Pimcore\Model\DataObject\Users::getByAdminReference($user->getId(), ['limit' => 1]);
        if (empty($userInfo)) {
            return true;
        }
        $product = $event->getSubject();
        $productEditors = $wfHelper->getUserByRoleAndGroup($userInfo->getUserType(), $this->getProductSIOP($product));
        
        $product = $event->getSubject();
        $productId = $product->getId();
        $deepLink = $wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_UNPUBLISH_ACTION_NAME) {
            $product->setPublished(false);
            $product->save();
            $cuEmail = $user->getEmail();
            $cuFirstName = $user->getFirstname();
            $cuLastName = $user->getLastname();
            $cuFullName = $cuFirstName . ' ' . $cuLastName;
            $actionRemarkInfo = $wfHelper->getActionRemarksById($productId);
            $actionRemark = $actionRemarkInfo['description'];
            unset($user);
            if (!empty($productEditors) && !empty($productEditors->getObjects())) {
                foreach ($productEditors->getObjects() as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_UNPUBLISH_SUBJECT,
                        'templateName'  =>  $wfHelper->getTemplatePath(WFConst::PB_UNPUBLISH_ACTION_NAME, $actionRemarkInfo['optionName'], $actionRemarkInfo['priorityType']),
                        'toEmails'      =>  array($user->getEmail() => $user->getFirstname() . ' ' . $user->getLastname()),
                        'ccEmails'      =>  array($cuEmail => $cuFullName),
                        'dataParams'    =>  array('pmFullName' => $cuFullName, 'pmEmail' => $cuEmail, 'edFullName' => $user->getFirstname() . ' ' . $user->getLastname(), 'pmTimestamp' => $wfHelper->getDateTime(), 'actionRemark' => $actionRemark, 'deepLink' => $deepLink, 'articleNumber' => $articleNumber)
                    );
                    $email = \Pimcore::getContainer()->get('email.email_notification_service');
                    $email->sendNotificationsEmail($array);
                    unset($array);
                }
            }
        }
        return true;
    }

    public function completedReopenProductEvent(CompletedEvent $event)
    {
        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $cuEmail = '';
        $cuFirstName = '';
        $cuLastName = '';
        $cuFullName = '';
        $actionRemarkInfo = array();
        $actionRemark = '';
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $userInfo = \Pimcore\Model\DataObject\Users::getByAdminReference($user->getId(), ['limit' => 1]);
        if (empty($userInfo)) {
            return true;
        }
        $product = $event->getSubject();
        $productEditors = $wfHelper->getUserByRoleAndGroup($userInfo->getUserType(), $this->getProductSIOP($product));
        
        $productId = $product->getId();
        $deepLink = $wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_REOPEN_ACTION_NAME) {
            // $product->setPublished(0);
            // $product->save();
            $cuEmail = $user->getEmail();
            $cuFirstName = $user->getFirstname();
            $cuLastName = $user->getLastname();
            $cuFullName = $cuFirstName . ' ' . $cuLastName;
            $actionRemarkInfo = $wfHelper->getActionRemarksById($productId);
            $actionRemark = $actionRemarkInfo['description'];
            unset($user);
            if (!empty($productEditors) && !empty($productEditors->getObjects())) {
                foreach ($productEditors->getObjects() as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_UNPUBLISH_SUBJECT,
                        'templateName'  =>  $wfHelper->getTemplatePath(WFConst::PB_REOPEN_ACTION_NAME, $actionRemarkInfo['optionName'], $actionRemarkInfo['priorityType']),
                        'toEmails'      =>  array($user->getEmail() => $user->getFirstname() . ' ' . $user->getLastname()),
                        'ccEmails'      =>  array($cuEmail => $cuFullName),
                        'dataParams'    =>  array('pmFullName' => $cuFullName, 'pmEmail' => $cuEmail, 'edFullName' => $user->getFirstname() . ' ' . $user->getLastname(), 'pmTimestamp' => $wfHelper->getDateTime(), 'actionRemark' => $actionRemark, 'deepLink' => $deepLink, 'articleNumber' => $articleNumber)
                    );
                    $email = \Pimcore::getContainer()->get('email.email_notification_service');
                    $email->sendNotificationsEmail($array);
                    unset($array);
                }
            }
        }
        return true;
    }

    public static function getSubscribedEvents()
    {
        return [
            'workflow.product_publishing.completed.start_processing' => ['completedEnrichProductEvent'],
            'workflow.product_publishing.completed.enrich_again' => ['completedEnrichAgainProductEvent'],
            'workflow.product_publishing.completed.publish' => ['completedPublishProductEvent'],
            'workflow.product_publishing.completed.unpublish' => ['completedUnpublishProductEvent'],
            'workflow.product_publishing.completed.reopen' => ['completedReopenProductEvent']
        ];
    }
}
