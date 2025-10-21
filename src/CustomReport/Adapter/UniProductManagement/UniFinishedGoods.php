<?php

declare(strict_types=1);

namespace App\CustomReport\Adapter\UniProductManagement;

use App\Enum\ProductManagement\UniProductManagementApprovalWorkflowPlace;
use Pimcore\Bundle\CustomReportsBundle\Tool\Adapter\AbstractAdapter;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductBase\Listing;

class UniFinishedGoods extends AbstractAdapter
{
    public const TYPE_FINISHED_GOODS_TO_ENRICH = 'FINISHED_GOODS_TO_ENRICH';
    public const TYPE_NEWLY_CREATED_PRODUCTS = 'NEWLY_CREATED_PRODUCTS';
    public const TYPE_PENDING_APPROVAL = 'PENDING_APPROVAL';
    public const TYPE_REJECTED_FINISHED_GOODS = 'REJECTED_FINISHED_GOODS';

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

        $this->prepareListingFinishedGoodsToEnrich($listing);
        $this->prepareListingNewlyCreatedProducts($listing, $sort, $dir);
        $this->prepareListingPendingApproval($listing);
        $this->prepareListingRejectedFinishedGoods($listing);

        $data = $listing->getItems($offset, $limit);
        $formatDate = static fn (?int $timestamp): ?string => $timestamp === null ? null : date('Y-m-d H:i:s', $timestamp);

        $data = array_map(static fn (UniProductBase $fg): array => [
            'oo_id' => $fg->getId(),
            'path' => $fg->getPath(),
            'fullPath' => $fg->getFullPath(),
            'sapMaterialNumber' => $fg->getSapMaterialNumber(),
            'sapDescription' => $fg->getSapDescription(),
            'approvalState' => $fg->getApprovalState() ?? UniProductManagementApprovalWorkflowPlace::CREATED->value,
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
        return ['oo_id', 'path', 'fullPath', 'sapMaterialNumber', 'sapDescription', 'approvalState', 'modificationDate', 'creationDate'];
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
     * See ONE-217.
     */
    private function prepareListingFinishedGoodsToEnrich(Listing $listing): void
    {
        if ($this->config->filter !== self::TYPE_FINISHED_GOODS_TO_ENRICH) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            'approvalState in (?) or approvalState IS NULL',
            [[UniProductManagementApprovalWorkflowPlace::CREATED->value, UniProductManagementApprovalWorkflowPlace::DRAFT->value]],
        );
    }

    /**
     * See ONE-240.
     */
    private function prepareListingNewlyCreatedProducts(Listing $listing, ?string $sort, ?string $dir): void
    {
        if ($this->config->filter !== self::TYPE_NEWLY_CREATED_PRODUCTS) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->setCondition(
            'approvalState = ? or approvalState IS NULL',
            [UniProductManagementApprovalWorkflowPlace::CREATED->value],
        );

        // Only show products created in the last 21 days.
        $now = \Carbon\Carbon::now()
            ->sub(new \DateInterval('P21D'))
            ->setTime(0, 0, 0)
        ;
        $listing->filterbyCreationDate($now->getTimestamp(), '<=');

        // Ensure by default products are sorted by creation date, but still support custom sorting
        $listing->setOrderKey($sort ?? 'creationDate');
        $listing->setOrder($dir ?? 'DESC');
    }

    /**
     * See ONE-241.
     */
    private function prepareListingPendingApproval(Listing $listing): void
    {
        if ($this->config->filter !== self::TYPE_PENDING_APPROVAL) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->filterByApprovalState(UniProductManagementApprovalWorkflowPlace::PENDING_APPROVAL->value);
    }

    /**
     * See ONE-241.
     */
    private function prepareListingRejectedFinishedGoods(Listing $listing): void
    {
        if ($this->config->filter !== self::TYPE_REJECTED_FINISHED_GOODS) {
            return;
        }

        $listing->setUnpublished(true);
        $listing->filterByApprovalState(UniProductManagementApprovalWorkflowPlace::REJECTED->value);
    }
}
