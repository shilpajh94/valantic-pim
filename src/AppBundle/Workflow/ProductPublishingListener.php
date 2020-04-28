<?php

namespace AppBundle\Workflow;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\CompletedEvent;
use AppBundle\Workflow\Constants as WFConst;

class ProductPublishingListener implements EventSubscriberInterface
{
    /**
     * Product enrich completed event, When product enrich completed, then notify to publisher
     * @param event $workflow event
    */
    public function completedEnrichProductEvent(CompletedEvent $event)
    {
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $productManagers = $wfHelper->getUserByRole(WFConst::PB_PRODUCT_MANAGER_ROLE_NAME);

        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $product = $event->getSubject();
        $productId = $product->getId();
        $workflow = $event->getWorkflow();
        $deepLink = WFConst::ADMIN_URL.$wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_START_PROCESSING_ACTION_NAME) {
            $edEmail = $user->getEmail();
            $edFirstName = $user->getFirstname();
            $edLastName = $user->getLastname();
            $edFullName = $edFirstName . ' ' . $edLastName;
            $actionRemark = $wfHelper->getActionRemarksById($productId);
            if ($productManagers) {
                foreach ($productManagers as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_REVIEW_SUBJECT,
                        'templateName'  =>  WFConst::PB_PRODUCT_REVEIW_EMAIL_TEMPLATE_PATH,
                        'toEmails'      =>  array($user['email'] => $user['fullname']),
                        'ccEmails'      =>  array($edEmail => $edFullName),
                        'dataParams'    =>  array('pmFullName' => $user['fullname'], 'edFullName' => $edFullName, 'actionRemark'=>$actionRemark, 'deepLink'=>$deepLink, 'articleNumber' => $articleNumber)
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
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $productEditors = $wfHelper->getUserByRole(WFConst::PB_PRODUCT_EDITOR_ROLE_NAME);

        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $product = $event->getSubject();
        $productId = $product->getId();
        $deepLink = WFConst::ADMIN_URL.$wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_ENRICH_AGAIN_ACTION_NAME) {
            $cuEmail = $user->getEmail();
            $cuFirstName = $user->getFirstname();
            $cuLastName = $user->getLastname();
            $cuFullName = $cuFirstName . ' ' . $cuLastName;
            $actionRemark = $wfHelper->getActionRemarksById($productId);
            if ($productEditors) {
                foreach ($productEditors as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_ENRICH_SUBJECT,
                        'templateName'  =>  WFConst::PB_PRODUCT_ENRICH_EMAIL_TEMPLATE_PATH,
                        'toEmails'      =>  array($user['email'] => $user['fullname']),
                        'ccEmails'      =>  array($cuEmail => $cuFullName),
                        'dataParams'    =>  array('pmFullName' => $cuFullName, 'edFullName' => $user['fullname'], 'actionRemark'=>$actionRemark, 'deepLink'=>$deepLink, 'articleNumber' => $articleNumber)
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
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $productEditors = $wfHelper->getUserByRole(WFConst::PB_PRODUCT_EDITOR_ROLE_NAME);

        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $product = $event->getSubject();
        $productId = $product->getId();
        $deepLink = WFConst::ADMIN_URL.$wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_PUBLISH_ACTION_NAME) {
            $product->setPublished(1);
            $product->save();
            $cuEmail = $user->getEmail();
            $cuFirstName = $user->getFirstname();
            $cuLastName = $user->getLastname();
            $cuFullName = $cuFirstName . ' ' . $cuLastName;
            $actionRemark = $wfHelper->getActionRemarksById($productId);
            if ($productEditors) {
                foreach ($productEditors as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_PUBLISH_SUBJECT,
                        'templateName'  =>  WFConst::PB_PRODUCT_PUBLISH_EMAIL_TEMPLATE_PATH,
                        'toEmails'      =>  array($user['email'] => $user['fullname']),
                        'ccEmails'      =>  array($cuEmail => $cuFullName),
                        'dataParams'    =>  array('pmFullName' => $cuFullName,'pmEmail' => $cuEmail, 'edFullName' => $user['fullname'], 'pmTimestamp'=> $user['system_time'], 'actionRemark'=>$actionRemark, 'deepLink'=>$deepLink, 'articleNumber' => $articleNumber)
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
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $productEditors = $wfHelper->getUserByRole(WFConst::PB_PRODUCT_EDITOR_ROLE_NAME);

        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $product = $event->getSubject();
        $productId = $product->getId();
        $deepLink = WFConst::ADMIN_URL.$wfHelper->getDeepLink($productId);
        $transition = $event->getTransition();
        $articleNumber = $product->getArticleNumber();
        if ($transition->getName() == WFConst::PB_UNPUBLISH_ACTION_NAME) {
            $product->setPublished(0);
            $product->save();
            $cuEmail = $user->getEmail();
            $cuFirstName = $user->getFirstname();
            $cuLastName = $user->getLastname();
            $cuFullName = $cuFirstName . ' ' . $cuLastName;
            $actionRemark = $wfHelper->getActionRemarksById($productId);            
            if ($productEditors) {
                foreach ($productEditors as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_UNPUBLISH_SUBJECT,
                        'templateName'  =>  WFConst::PB_PRODUCT_UNPUBLISH_EMAIL_TEMPLATE_PATH,
                        'toEmails'      =>  array($user['email'] => $user['fullname']),
                        'ccEmails'      =>  array($cuEmail => $cuFullName),
                        'dataParams'    =>  array('pmFullName' => $cuFullName,'pmEmail' => $cuEmail, 'edFullName' => $user['fullname'], 'pmTimestamp'=> $user['system_time'], 'actionRemark'=>$actionRemark, 'deepLink'=>$deepLink, 'articleNumber' => $articleNumber)
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
        ];
    }
}
