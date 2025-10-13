<?php

declare(strict_types=1);

namespace App\CustomReport\Adapter\UniProductManagement;

use App\Enum\ProductManagement\ProductApprovalWorkflowPlace;
use Pimcore\Bundle\CustomReportsBundle\Tool\Adapter\AbstractAdapter;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal\Listing;

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
        $listing = $this->getBaseListing($sort, $dir, $offset, $limit);

        $this->prepareListingNewlyCreatedInternalCategories($listing, $sort, $dir);
        $this->prepareListingInternalCategoriesToEnrich($listing, $sort, $dir);
        $this->prepareListingPendingApproval($listing);
        $this->prepareListingRejectedInternalCategories($listing);
        $this->prepareListingUsersNotAssignedInternalCategories($listing);

        $data = $listing->getItems($offset, $limit);
        $formatDate = static fn (?int $timestamp): ?string => $timestamp === null ? null : date('Y-m-d H:i:s', $timestamp);

        $data = array_map(static fn (UniProductCategoryInternal $fg): array => [
            'oo_id' => $fg->getId(),
            'path' => $fg->getPath(),
            'fullPath' => $fg->getFullPath(),
            'ghpCode' => $fg->getGhpCode(),
            'hierarchyLevelDescription' => $fg->getHierarchyLevelDescription(),
            'approvalState' => $fg->getApprovalState() ?? ProductApprovalWorkflowPlace::CREATED->value,
            'modificationDate' => $formatDate($fg->getModificationDate()),
            'creationDate' => $formatDate($fg->getCreationDate()),
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
     * @param string|list<string>|null $sort
     * @param string|list<string>|null $dir
     */
    private function getBaseListing(string|array|null $sort, string|array|null $dir, ?int $offset, ?int $limit): Listing
    {
        return (new Listing())
            ->setLimit($limit)
            ->setOffset($offset)

            // By default, show last changed first, but still support custom sorting through UI
            ->setOrderKey($sort ?? 'modificationDate')
            ->setOrder($dir ?? ($sort === null ? 'DESC' : 'ASC'))
        ;
    }

    /**
     * See ONE-261.
     */
    private function prepareListingNewlyCreatedInternalCategories(Listing $listing, ?string $sort, ?string $dir): void
    {
        if ($this->config->filter !== self::TYPE_NEWLY_CREATED_INTERNAL_CATEGORIES) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            'approvalState = ? or approvalState IS NULL',
            [ProductApprovalWorkflowPlace::CREATED->value],
        );

        // Only show categories created in the last 21 days.
        $now = \Carbon\Carbon::now()
            ->sub(new \DateInterval('P21D'))
            ->setTime(0, 0, 0)
        ;
        $listing->filterbyCreationDate($now->getTimestamp(), '<=');

        // Ensure by default categories are sorted by creation date, but still support custom sorting
        $listing->setOrderKey($sort ?? 'creationDate');
        $listing->setOrder($dir ?? 'DESC');
    }

    /**
     * See ONE-262.
     */
    private function prepareListingInternalCategoriesToEnrich(Listing $listing, ?string $sort, ?string $dir): void
    {
        if ($this->config->filter !== self::TYPE_INTERNAL_CATEGORIES_TO_ENRICH) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            'approvalState in (?) or approvalState IS NULL',
            [[ProductApprovalWorkflowPlace::CREATED->value, ProductApprovalWorkflowPlace::DRAFT->value]],
        );

        $listing->setOrderKey($sort ?? 'creationDate');
        $listing->setOrder($dir ?? 'DESC');
    }

    /**
     * See ONE-263.
     */
    private function prepareListingPendingApproval(Listing $listing): void
    {
        if ($this->config->filter !== self::TYPE_PENDING_APPROVAL) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->filterByApprovalState(ProductApprovalWorkflowPlace::PENDING_APPROVAL->value);
    }

    /**
     * See ONE-264.
     */
    private function prepareListingRejectedInternalCategories(Listing $listing): void
    {
        if ($this->config->filter !== self::TYPE_REJECTED_INTERNAL_CATEGORIES) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->filterByApprovalState(ProductApprovalWorkflowPlace::REJECTED->value);
    }

    /**
     * See ONE-265.
     */
    private function prepareListingUsersNotAssignedInternalCategories(Listing $listing): void
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
