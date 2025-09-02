<?php

declare(strict_types=1);

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

/**
 * Customize object tree rendering for internal categories.
 *
 * Refer to the Pimcore documentation for more information:
 * https://docs.pimcore.com/platform/Pimcore/Tools_and_Features/Custom_Icons/
 */
class AdminStyleListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            AdminEvents::RESOLVE_ELEMENT_ADMIN_STYLE => 'onResolveElementAdminStyle',
        ];
    }

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
}
