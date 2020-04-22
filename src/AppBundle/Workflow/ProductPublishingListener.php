<?php
namespace AppBundle\Workflow;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\CompletedEvent;

class ProductPublishingListener implements EventSubscriberInterface
{
    public function completedEnrichProductEvent(CompletedEvent $event)
    {
        $proudct = $event->getSubject();
        $productId = $proudct->getId();

        $transition = $event->getTransition();
        if($transition->getName()=='start_processing') {
           /*  $mail = new \Pimcore\Mail();
            $mail->addTo('amit.sinha@pimcore.services');
            $mail->setDocument('/Workflow/Email Template/productReview');
            // $mail->setParams($params);
            $mail->send(); */
        }
        /* if (empty($title)) {
            // Block the transition "to_review" if the post has no title
            $event->setBlocked(true);
        } */
    }

    public function completedEnrichAgainProductEvent(CompletedEvent $event)
    {
        $proudct = $event->getSubject();
        $productId = $proudct->getId();

        $transition = $event->getTransition();
        $a = array($transition->getName(), $productId);
        // file_put_contents('trans.txt', $a);
        if($transition->getName()=='enrich_again') {
            
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
        if($transition->getName()=='publish') {
            
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
        if($transition->getName()=='unpublish') {
            
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