<?php

declare(strict_types=1);

namespace App\CustomReport\Adapter\UniProductManagement;

use App\Enum\ProductManagement\UniProductManagementApprovalWorkflowPlace;
use Pimcore\Bundle\CustomReportsBundle\Tool\Adapter\AbstractAdapter;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\DataObject\Listing\Concrete as ConcreteListing;

class UniInternalCategories extends AbstractAdapter
{
    public const TYPE_INTERNAL_CATEGORIES_TO_ENRICH = 'INTERNAL_CATEGORIES_TO_ENRICH';
    public const TYPE_NEWLY_CREATED_INTERNAL_CATEGORIES = 'NEWLY_CREATED_INTERNAL_CATEGORIES';
    public const TYPE_PENDING_APPROVAL = 'PENDING_APPROVAL';
    public const TYPE_REJECTED_INTERNAL_CATEGORIES = 'REJECTED_INTERNAL_CATEGORIES';
    public const TYPE_INTERNAL_CATEGORIES_USERS_NOT_ASSIGNED = 'INTERNAL_CATEGORIES_USERS_NOT_ASSIGNED';

    /**
     * @param ?list<mixed> $filters
     * @param ?list<mixed> $fields
     * @param ?array<string, mixed> $drillDownFilters
     *
     * @return array<string, list<array<string, mixed>>|int>
     */
    public function getData(?array $filters, ?string $sort, ?string $dir, ?int $offset, ?int $limit, ?array $fields = null, ?array $drillDownFilters = null): array
    {
        // Determine which listing type to use based on filter
        $useUniProductCategoryInternal = $this->shouldUseUniProductCategoryInternal();

        if ($useUniProductCategoryInternal) {
            return $this->getDataForUniProductCategoryInternal($sort, $dir, $offset, $limit);
        }

        // Default to UniProductBase for L5-L6
        return $this->getDataForUniProductBase($sort, $dir, $offset, $limit);
    }

    /**
     * Determine if we should use UniProductCategoryInternal (L1-L4)
     */
    private function shouldUseUniProductCategoryInternal(): bool
    {
        // Add L1-L4 filters
        return in_array($this->config->filter, [
            self::TYPE_INTERNAL_CATEGORIES_USERS_NOT_ASSIGNED,
        ], true);
    }

    /**
     * Get data for UniProductCategoryInternal (L1-L4)
     *
     * @return array<string, list<array<string, mixed>>|int>
     */
    private function getDataForUniProductCategoryInternal(?string $sort, ?string $dir, ?int $offset, ?int $limit): array
    {
        $listing = $this->createListing(UniProductCategoryInternal\Listing::class, $sort, $dir, $offset, $limit);

        // Apply filters for UniProductCategoryInternal & Add more prepare methods for L1-L4
        $this->prepareListingUsersNotAssignedInternalCategories($listing);

        return $this->formatListingData($listing, $offset, $limit);
    }

    /**
     * Get data for UniProductBase (L5-L6)
     *
     * @return array<string, list<array<string, mixed>>|int>
     */
    private function getDataForUniProductBase(?string $sort, ?string $dir, ?int $offset, ?int $limit): array
    {
        $listing = $this->createListing(UniProductBase\Listing::class, $sort, $dir, $offset, $limit);

        // Apply filters for UniProductBase & Add more prepare methods for L5-L6
        $this->prepareListingNewlyCreatedInternalCategories($listing, $sort, $dir);
        $this->prepareListingInternalCategoriesToEnrich($listing, $sort, $dir);
        $this->prepareListingPendingApproval($listing);
        $this->prepareListingRejectedInternalCategories($listing);

        return $this->formatListingData($listing, $offset, $limit);
    }

    /**
     * Create and configure a listing instance
     *
     * @template T of ConcreteListing
     * @param class-string<T> $listingClass
     * @return T
     */
    private function createListing(string $listingClass, ?string $sort, ?string $dir, ?int $offset, ?int $limit): ConcreteListing
    {
        $listing = new $listingClass();
        $listing->setLimit($limit);
        $listing->setOffset($offset);
        $listing->setOrderKey($sort ?? 'modificationDate');
        $listing->setOrder($dir ?? ($sort === null ? 'DESC' : 'ASC'));

        return $listing;
    }

    /**
     * Format listing data into standardized array structure
     *
     * @param UniProductCategoryInternal\Listing|UniProductBase\Listing $listing
     * @return array<string, list<array<string, mixed>>|int>
     */
    private function formatListingData(ConcreteListing $listing, ?int $offset, ?int $limit): array
    {
        $data = $listing->getItems($offset, $limit);
        $formatDate = static fn(?int $timestamp): ?string => $timestamp === null ? null : date('Y-m-d H:i:s', $timestamp);

        $data = array_map(static fn(UniProductCategoryInternal|UniProductBase $item): array => [
            'oo_id' => $item->getId(),
            'path' => $item->getPath(),
            'fullPath' => $item->getFullPath(),
            'ghpCode' => $item->getGhpCode(),
            'hierarchyLevelDescription' => $item->getHierarchyLevelDescription(),
            'approvalState' => $item->getApprovalState() ?? UniProductManagementApprovalWorkflowPlace::CREATED->value,
            'modificationDate' => $formatDate($item->getModificationDate()),
            'creationDate' => $formatDate($item->getCreationDate()),
        ], $data);

        return [
            'data' => $data,
            'total' => $listing->count(),
        ];
    }

    /**
     * @return list<string>
     */
    public function getColumns(?\stdClass $configuration): array
    {
        return ['oo_id', 'path', 'fullPath', 'ghpCode', 'hierarchyLevelDescription', 'approvalState', 'modificationDate', 'creationDate'];
    }

    /**
     * @param array<string, mixed> $filters
     * @param array<string, mixed> $drillDownFilters
     *
     * @return array<string, array<string, mixed>>
     */
    public function getAvailableOptions(array $filters, string $field, array $drillDownFilters): array
    {
        return ['data' => []];
    }

    /**
     * See ONE-261.
     * For UniProductBase (L5-L6)
     */
    private function prepareListingNewlyCreatedInternalCategories(UniProductBase\Listing $listing, ?string $sort, ?string $dir): void
    {
        if ($this->config->filter !== self::TYPE_NEWLY_CREATED_INTERNAL_CATEGORIES) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            '(approvalState = ? OR approvalState IS NULL) AND level IN (?)',
            [
                UniProductManagementApprovalWorkflowPlace::CREATED->value,
                ['5', '6']
            ],
        );

        // Only show categories created in the last 21 days.
        $now = \Carbon\Carbon::now()
            ->sub(new \DateInterval('P21D'))
            ->setTime(0, 0, 0);
        $listing->filterbyCreationDate($now->getTimestamp(), '<=');

        // Ensure by default categories are sorted by creation date, but still support custom sorting
        $listing->setOrderKey($sort ?? 'creationDate');
        $listing->setOrder($dir ?? 'DESC');
    }

    /**
     * See ONE-262.
     * For UniProductBase (L5-L6)
     */
    private function prepareListingInternalCategoriesToEnrich(UniProductBase\Listing $listing, ?string $sort, ?string $dir): void
    {
        if ($this->config->filter !== self::TYPE_INTERNAL_CATEGORIES_TO_ENRICH) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            '(approvalState IN (?) OR approvalState IS NULL) AND level IN (?)',
            [
                [UniProductManagementApprovalWorkflowPlace::CREATED->value, UniProductManagementApprovalWorkflowPlace::DRAFT->value],
                ['5', '6']
            ],
        );

        $listing->setOrderKey($sort ?? 'modificationDate');
        $listing->setOrder($dir ?? 'DESC');
    }

    /**
     * See ONE-263.
     * For UniProductBase (L5-L6)
     */
    private function prepareListingPendingApproval(UniProductBase\Listing $listing): void
    {
        if ($this->config->filter !== self::TYPE_PENDING_APPROVAL) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            'approvalState = ? AND level IN (?)',
            [
                UniProductManagementApprovalWorkflowPlace::PENDING_APPROVAL->value,
                ['5', '6']
            ]
        );
    }

    /**
     * See ONE-264.
     * For UniProductBase (L5-L6)
     */
    private function prepareListingRejectedInternalCategories(UniProductBase\Listing $listing): void
    {
        if ($this->config->filter !== self::TYPE_REJECTED_INTERNAL_CATEGORIES) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            'approvalState = ? AND level IN (?)',
            [
                UniProductManagementApprovalWorkflowPlace::REJECTED->value,
                ['5', '6']
            ]
        );
    }

    /**
     * See ONE-265.
     * For UniProductCategoryInternal (L2)
     */
    private function prepareListingUsersNotAssignedInternalCategories(UniProductCategoryInternal\Listing $listing): void
    {
        if ($this->config->filter !== self::TYPE_INTERNAL_CATEGORIES_USERS_NOT_ASSIGNED) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            '(assignedUser IS NULL OR assignedUser = "") AND level = ?',
            ['2'],
        );
    }
}
