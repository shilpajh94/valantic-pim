<?php

namespace App\EventListener\Admin;

use App\Model\AdminStyle\InternalStructureStyle;
use Pimcore\Bundle\AdminBundle\Event\ElementAdminStyleEvent;
use Pimcore\Model\DataObject\UniBaseProduct;
use Pimcore\Model\DataObject\UniProductCategoryInternal;

class AdminStyleListener
{
    public function onResolveElementAdminStyle(ElementAdminStyleEvent $event): void
    {
        $element = $event->getElement();

        if ($element instanceof UniBaseProduct || $element instanceof UniProductCategoryInternal) {
            $event->setAdminStyle(new InternalStructureStyle($element));
        }
    }
}
