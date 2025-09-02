<?php

declare(strict_types=1);

namespace App\EventListener\Admin\UniProductManagement;

use App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrBrand;
use App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrSkeleton;
use Pimcore\Bundle\AdminBundle\Event\AdminEvents;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Layout;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Element\ValidationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Special product listener for injecting skeleton and brand level data
 * to finished good product objects in the Pimcore admin context to support.
 */
class UniProductListener implements EventSubscriberInterface
{
    private const BRICK_NAMESPACE = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\';
    private const CATEGORY_LEVELS = [
        UniProductBase::FIELD_BRAND_DATA => AbstractUniPrBrand::class,
        UniProductBase::FIELD_SKELETON_DATA => AbstractUniPrSkeleton::class,
    ];

    public static function getSubscribedEvents(): array
    {
        return [
            AdminEvents::OBJECT_GET_PRE_SEND_DATA => 'addCategoryBricksToFinishedGood',
            AdminEvents::CLASS_OBJECTBRICK_LIST_PRE_SEND_DATA => 'processObjectbrickDefinitions',
            DataObjectEvents::PRE_ADD => 'validateObjectSave',
            DataObjectEvents::PRE_UPDATE => 'validateObjectSave',
        ];
    }

    public function addCategoryBricksToFinishedGood(GenericEvent $event): void
    {
        $obj = $event->getArgument('object');

        if (!$obj instanceof UniProductBase) {
            return;
        }

        $data = $event->getArgument('data');

        foreach (self::CATEGORY_LEVELS as $key => $class) {
            $brandParent = $obj->resolveAncestorCategoryByObjectBrick($class);
            $data['data'][$key] = $this->getCategoryBrickData($brandParent);
        }

        $event->setArgument('data', $data);
    }

    public function processObjectbrickDefinitions(GenericEvent $event): void
    {
        $obj = $event->getArgument('object');

        if (!$obj instanceof UniProductBase || !array_key_exists($event->getArgument('fieldName'), self::CATEGORY_LEVELS)) {
            return;
        }

        $layoutDefinitions = $event->getArgument('layoutDefinitions');
        $this->makeChildrenReadonly($layoutDefinitions);
        $event->setArgument('layoutDefinitions', $layoutDefinitions);
        $event->setArgument('list', []); // Remove add button
    }

    /**
     * The product group specific fields brandData and skeletonData are used for attaching
     * read-only copies of brand and skeleton data Objectbricks on-the-fly. This method
     * ensures that no user interaction or code tries to attach any data to those fields
     * to be stored.
     */
    public function validateObjectSave(DataObjectEvent $event): void
    {
        $obj = $event->getObject();

        if (!$obj instanceof UniProductBase) {
            return;
        }

        $brandData = $obj->getBrandData()?->getItems() ?? [];
        $skeletonData = $obj->getSkeletonData()?->getItems() ?? [];

        if ($brandData === [] && $skeletonData === []) {
            return;
        }

        throw new ValidationException(
            'Manually adding category data Objectbricks is not allowed. ' .
            'These get dynamically added as read-only elements for the admin view. ' .
            'Please remove Brand and Skeleton data Objectbricks and try again.',
        );
    }

    /** @return array<mixed>|null */
    private function getCategoryBrickData(?UniProductCategoryInternal $category): ?array
    {
        $fields = $category?->getClass()?->getFieldDefinitions()[UniProductCategoryInternal::FIELD_LEVEL_SPECIFIC_DATA] ?? null;

        if ($category === null || $fields === null) {
            return null;
        }

        return $fields->getDataForEditMode(
            $category->getLevelSpecificData(),
            $category,
            ['objectFromVersion' => false],
        );
    }

    /**
     * Ensure all attributes of brand and skeleton Objectbricks are read-only, as changing data from
     * the finished good level is not supported.
     *
     * @param array<Layout|Data> $layoutDefinitions
     */
    private function makeChildrenReadonly(array $layoutDefinitions, int $level = 0): void
    {
        foreach ($layoutDefinitions as $name => $layoutDefinition) {
            $shouldProcess = array_reduce(
                self::CATEGORY_LEVELS,
                static fn (?bool $carry, string $class): bool => $carry || is_a(self::BRICK_NAMESPACE . $name, $class, true),
            );

            if ($level === 0 && !$shouldProcess) {
                continue;
            }

            if ($layoutDefinition instanceof Data) {
                $layoutDefinition->setNoteditable(true);
            } elseif ($layoutDefinition instanceof Layout) {
                $this->makeChildrenReadonly($layoutDefinition->getChildren(), $level + 1);
            }
        }
    }
}
