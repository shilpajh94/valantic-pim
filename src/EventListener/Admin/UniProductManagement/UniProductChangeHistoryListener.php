<?php

declare(strict_types=1);

namespace App\EventListener\Admin\UniProductManagement;

use App\Entity\UniProductChangeHistory;
use App\Service\UniProductManagement\UniProductChangeTrackingService;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\ValidationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class UniProductChangeHistoryListener implements EventSubscriberInterface
{
    private EntityManagerInterface $entityManager;
    private TokenStorageInterface $tokenStorage;
    private UniProductChangeTrackingService $changeTrackingService;

    public function __construct(
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage,
        UniProductChangeTrackingService $changeTrackingService,
    ) {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
        $this->changeTrackingService = $changeTrackingService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::PRE_UPDATE => 'onPreUpdate',
        ];
    }

    public function onPreUpdate(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if ($this->shouldTrack($object)) {
            $changes = $this->changeTrackingService->computeChanges($object);

            if ($changes !== []) {
                $this->saveChangeHistory($object, $changes);
            }
        }
    }

    private function shouldTrack(AbstractObject $object): bool
    {
        return in_array($object::class, [
            UniProductCategoryInternal::class,
            UniProductBase::class,
        ], true);
    }

    /**
     * @param array<string, array{old: mixed, new: mixed}> $changes
     */
    private function saveChangeHistory(AbstractObject $object, array $changes): void
    {
        $previousValues = [];
        $newValues = [];
        $changeFields = [];

        foreach ($changes as $field => $change) {
            $changeFields[] = $field;
            $previousValues[$field] = $change['old'];
            $newValues[$field] = $change['new'];
        }

        $history = new UniProductChangeHistory();
        $history
            ->setObjectId((string) $object->getId())
            ->setFullObjectPath($object->getFullPath())
            ->setObjectClass($object::class)
            ->setTimestamp(Carbon::now())
            ->setChangeFields($changeFields)
            ->setUser($this->getCurrentUserName())
            ->setPreviousValue($previousValues)
            ->setNewValue($newValues)
        ;

        try {
            $this->entityManager->persist($history);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            throw new ValidationException('Saving Failed');
        }
    }

    private function getCurrentUserName(): string
    {
        $token = $this->tokenStorage->getToken();

        if ($token && $token->getUser()) {
            $user = $token->getUser();

            if ($user instanceof \Pimcore\Security\User\User) {
                return $user->getUser()->getName();
            }
        }

        return 'System';
    }
}
