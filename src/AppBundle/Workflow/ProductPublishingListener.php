<?php

namespace AppBundle\Workflow;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\CompletedEvent;
use AppBundle\Workflow\Constants as WFConst;

class ProductPublishingListener implements EventSubscriberInterface
{
    public function completedEnrichProductEvent(CompletedEvent $event)
    {
        $wfHelper = \Pimcore::getContainer()->get('app.workflow_helper');
        $productManagers = $wfHelper->getUserByRole(WFConst::PB_PRODUCT_MANAGER_NAME);

        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $proudct = $event->getSubject();
        $productId = $proudct->getId();
        $workflow = $event->getWorkflow();
        $a = array($productManagers, WFConst::PB_PRODUCT_MANAGER_NAME);
        
        $transition = $event->getTransition();
        $articleNumber = $proudct->getArticleNumber();
        if ($transition->getName() == 'start_processing') {
            $edEmail = $user->getEmail();
            $edFirstName = $user->getFirstname();
            $edLastName = $user->getLastname();
            $edFullName = $edFirstName . ' ' . $edLastName;
            if ($productManagers) {
                foreach ($productManagers as $user) {
                    $array = array(
                        'subject'       =>  WFConst::PB_REVIEW_SUBJECT,
                        'templateName'  =>  WFConst::PB_PRODUCT_REVEIW_EMAIL_TEMPLATE_PATH,
                        'toEmails'      =>  array($user['email'] => $user['fullname']),
                        'ccEmails'      =>  array($edEmail => $edFullName),
                        'dataParams'    =>  array('pmFullName' => $user['fullname'], 'edFullName' => $edFullName, 'articleNumber' => $articleNumber)
                    );
                    $email = \Pimcore::getContainer()->get('email.email_notification_service');
                    $email->sendNotificationsEmail($array);
                    unset($array);
                }
            }
        }
        /* if (empty($title)) {
            // Block the transition "to_review" if the post has no title
            $event->setBlocked(true);
        } */
        return true;
    }

    public function completedEnrichAgainProductEvent(CompletedEvent $event)
    {
        $proudct = $event->getSubject();
        $productId = $proudct->getId();

        $transition = $event->getTransition();
        $a = array($transition->getName(), $productId);
        // file_put_contents('trans.txt', $a);
        if ($transition->getName() == 'enrich_again') {
        }
        /* if (empty($title)) {
            // Block the transition "to_review" if the post has no title
            $event->setBlocked(true);
        } */
    }

    public function completedPublishProductEvent(CompletedEvent $event)
    {
        $proudct = $event->getSubject();
        $productId = $proudct->getId();

        $transition = $event->getTransition();
        $a = array($transition->getName(), $productId);
        // file_put_contents('trans.txt', $a);
        if ($transition->getName() == 'publish') {
        }
        /* if (empty($title)) {
            // Block the transition "to_review" if the post has no title
            $event->setBlocked(true);
        } */
    }

    public function completedUnpublishProductEvent(CompletedEvent $event)
    {
        $proudct = $event->getSubject();
        $productId = $proudct->getId();

        $transition = $event->getTransition();
        $a = array($transition->getName(), $productId);
        // file_put_contents('trans.txt', $a);
        if ($transition->getName() == 'unpublish') {
        }
        /* if (empty($title)) {
            // Block the transition "to_review" if the post has no title
            $event->setBlocked(true);
        } */
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
