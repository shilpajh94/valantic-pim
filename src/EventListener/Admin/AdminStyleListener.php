<?php

namespace App\EventListener\Admin;

use App\Model\AdminStyle\ExternalStructureStyle;
use App\Model\AdminStyle\InternalStructureStyle;
use App\Model\DataObject\AbstractProductGroupSpecificData;
use Pimcore\Bundle\AdminBundle\Event\AdminEvents;
use Pimcore\Bundle\AdminBundle\Event\ElementAdminStyleEvent;
use Pimcore\Model\DataObject\UniBaseProduct;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminStyleListener implements EventSubscriberInterface
{
    public function onResolveElementAdminStyle(ElementAdminStyleEvent $event): void
    {
        $element = $event->getElement();

        if ($element instanceof UniBaseProduct || $element instanceof UniProductCategoryInternal || $element instanceof AbstractProductGroupSpecificData) {
            $event->setAdminStyle(new InternalStructureStyle($element));
        }

        if ($element instanceof UniProductCategoryExternal) {
            $event->setAdminStyle(new ExternalStructureStyle($element));
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AdminEvents::RESOLVE_ELEMENT_ADMIN_STYLE => 'onResolveElementAdminStyle',
        ];
    }
}
