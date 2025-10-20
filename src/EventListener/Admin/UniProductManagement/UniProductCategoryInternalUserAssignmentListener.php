<?php

declare(strict_types=1);

namespace App\EventListener\Admin\UniProductManagement;

use App\Enum\UniProductHierarchyLevel;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\ValidationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UniProductCategoryInternalUserAssignmentListener implements EventSubscriberInterface
{
    /**
     * Subscribes to data object events for handling internal category assignment logic.
     *
     * @return array<string, string>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::PRE_UPDATE => 'onPreAddOrUpdate',
            DataObjectEvents::PRE_ADD => 'onPreAddOrUpdate',
            DataObjectEvents::PRE_COPY => 'onPreCopy',
        ];
    }

    /**
     * Handles the `PRE_ADD` and `PRE_UPDATE` events for `UniProductCategoryInternal` objects.
     */
    public function onPreAddOrUpdate(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductCategoryInternal) {
            return;
        }

        $currentLevel = (int) $object->getLevel();
        $assignedUser = $object->getAssignedUser();

        $dirtyFields = $object->getDirtyFields();
        $assignedUserChanged = in_array(UniProductCategoryInternal::FIELD_ASSIGNED_USER, $dirtyFields, true);

        if ($assignedUserChanged && $assignedUser !== null && $currentLevel !== UniProductHierarchyLevel::CATEGORY->levelNumber()) {
            throw new ValidationException('Users can only be assigned on category level 2. Please remove the assigned user.');
        }

        if ($assignedUser !== null && $currentLevel !== UniProductHierarchyLevel::CATEGORY->levelNumber()) {
            $object->setAssignedUser(null);
        }
    }

    /**
     * Handles the `PRE_COPY` event for `UniProductCategoryInternal` objects.
     */
    public function onPreCopy(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductCategoryInternal) {
            return;
        }

        $currentLevel = (int) $object->getLevel();
        $assignedUser = $object->getAssignedUser();

        if ($currentLevel !== 2 && $assignedUser !== null) {
            $object->setAssignedUser(null);
        }
    }
}
