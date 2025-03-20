<?php

namespace App\EventListener\Admin;

use App\Model\AdminStyle\UniProductStructureExternalStyle;
use App\Model\AdminStyle\UniProductStructureInternalStyle;
use App\Model\DataObject\UniProductManagement\AbstractUniProductGroupSpecificData;
use Pimcore\Bundle\AdminBundle\Event\AdminEvents;
use Pimcore\Bundle\AdminBundle\Event\ElementAdminStyleEvent;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminStyleListener implements EventSubscriberInterface
{
    public function onResolveElementAdminStyle(ElementAdminStyleEvent $event): void
    {
        $element = $event->getElement();

        if ($element instanceof UniProductBase || $element instanceof UniProductCategoryInternal || $element instanceof AbstractUniProductGroupSpecificData) {
            $event->setAdminStyle(new UniProductStructureInternalStyle($element));
        }

        if ($element instanceof UniProductCategoryExternal) {
            $event->setAdminStyle(new UniProductStructureExternalStyle($element));
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AdminEvents::RESOLVE_ELEMENT_ADMIN_STYLE => 'onResolveElementAdminStyle',
        ];
    }
}
