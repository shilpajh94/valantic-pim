<?php

namespace AppBundle\EventListener;

use Pimcore\Model\DataObject;

class AdminStyleListener
{
    public function onResolveElementAdminStyle(\Pimcore\Bundle\AdminBundle\Event\ElementAdminStyleEvent $event): void
    {
        $element = $event->getElement();
        // decide which default styles you want to override
        if ($element instanceof \Pimcore\Model\DataObject\Product) {
            $event->setAdminStyle(new \AppBundle\Model\Product\AdminStyle\Product($element));
        }
    }
}
