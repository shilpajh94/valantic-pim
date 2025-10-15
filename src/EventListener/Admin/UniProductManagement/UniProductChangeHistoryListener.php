<?php

declare(strict_types=1);

namespace App\EventListener\Admin\UniProductManagement;

use App\Service\UniProductManagement\UniProductChangeTrackingService;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class UniProductChangeHistoryListener implements EventSubscriberInterface
{
    public function __construct(
        private readonly UniProductChangeTrackingService $changeTrackingService,
        private readonly RequestStack $requestStack,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::PRE_UPDATE => 'onPreUpdate',
            DataObjectEvents::PRE_UPDATE_VALIDATION_EXCEPTION => 'onPreUpdateValidationException',
        ];
    }

    public function onPreUpdateValidationException(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$this->shouldTrack($object)) {
            return;
        }

         $request = $this->requestStack->getCurrentRequest();

        if ($request === null) {
            return;
        }

        $task = $request->get('task');

        if ($task === 'version') {
            return;
        }

         if ($event->getArgument('validationExceptions')) {
            return;
        }

        $this->changeTrackingService->trackAndSaveChanges($object);
    }

    public function onPreUpdate(DataObjectEvent $event): void
    {
       
        $object = $event->getObject();

        if (!$this->shouldTrack($object)) {
            return;
        }

        $request = $this->requestStack->getCurrentRequest();

        if ($request === null) {
            return;
        }

        $task = $request->get('task');

        if ($task === 'publish') {
            return;
        }

        $this->changeTrackingService->trackAndSaveChanges($object);
    }

    private function shouldTrack(AbstractObject $object): bool
    {
        return in_array($object::class, [
            UniProductCategoryInternal::class,
            UniProductBase::class,
        ], true);
    }
}
