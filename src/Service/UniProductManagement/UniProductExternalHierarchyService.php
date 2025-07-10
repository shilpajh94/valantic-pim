<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use App\Elasticsearch\Index\UniProductManagement\UniBaseProductIndex;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastica\Query;
use Elastica\Query\AbstractQuery;
use Elastica\Query\BoolQuery;
use Elastica\Query\Terms;
use Elastica\Result;
use Pimcore\Model\DataObject\Fieldcollection\Data\UniPrInclCat;
use Pimcore\Model\DataObject\Fieldcollection\Data\UniPrInclPr;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Valantic\ElasticaBridgeBundle\Document\DocumentInterface;

class UniProductExternalHierarchyService
{
    public function __construct(private readonly UniBaseProductIndex $productIndex)
    {
    }

    /**
     * @return array<array<string, mixed>>
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public function getProductsForExternalCategory(UniProductCategoryExternal $categoryExternal): array
    {
        return $this->getProductsById($this->resolveProductFilter($categoryExternal));
    }

    /**
     * @param int[] $ids
     *
     * @return array<array<string, mixed>>
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public function getProductsById(array $ids): array
    {
        return $this->queryProductsPaginated(new Query(new Terms(DocumentInterface::META_ID, $ids)), fn (Result $item) => $item->getData());
    }

    /**
     * @return array<int>
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public function resolveProductFilter(UniProductCategoryExternal $categoryExternal): array
    {
        $includes = $categoryExternal->getProductInclude()?->getItems() ?? [];

        if (count($includes) === 0) {
            return [];
        }

        $mainQuery = (new BoolQuery())
            ->addMust($this->buildIncludeQuery($categoryExternal))
            ->addFilter($this->buildFilterQuery())
            ->addFilter($this->buildExcludeQuery())
        ;

        $searchQuery = (new Query($mainQuery))
            ->setSource(false)
        ;

        return $result = $this->queryProductsPaginated($searchQuery, fn (Result $item): int => (int) substr($item->getId(), 6));
        // TODO: To be determined: If parent has no product include rules, use included products of parent instead.
        //       Or create specific "products from parent" include rule and add it by default? What happens if this is missing?

        // $parent = $categoryExternal->getParent();

        // if (!$parent instanceof UniProductCategoryExternal) {
        //    return $result;
        // }

        // return array_values(array_intersect($this->resolveProductFilter($parent), $result));
    }

    private function buildIncludeQuery(UniProductCategoryExternal $categoryExternal): AbstractQuery
    {
        $query = new BoolQuery();

        foreach ($categoryExternal->getProductInclude()?->getItems() ?? [] as $item) {
            if ($item instanceof UniPrInclPr) {
                $productIds = array_map(fn (UniProductBase $product): ?int => $product->getId(), $item->getProducts());
                $query->addShould(new Terms(DocumentInterface::META_ID, $productIds));

                continue;
            }

            if ($item instanceof UniPrInclCat) {
                $productIds = array_map(fn (UniProductBase $product): ?int => $product->getId(), $this->resolveCategoryInternalProducts($item->getInternalCategory()));
                $query->addShould(new Terms(DocumentInterface::META_ID, $productIds));

                continue;
            }

            // Hint: Other rules currently not implemented in PoC
        }

        return $query;
    }

    private function buildFilterQuery(): AbstractQuery
    {
        // Hint: Not implemented in PoC
        return new BoolQuery();
    }

    private function buildExcludeQuery(): AbstractQuery
    {
        // Hint: Not implemented in PoC
        return new BoolQuery();
    }

    /**
     * @return array<mixed>
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    private function queryProductsPaginated(Query $query, callable $callback): array // TODO Query signature
    {
        $result = [];
        $total = 0;

        do {
            $count = count($result);
            $query->setFrom($count);

            $queryResult = $this->productIndex->getElasticaIndex()->search($query);
            $hits = $queryResult->getTotalHits();
            $total += $hits;
            $result[] = $queryResult->getResults();
        } while ($total < $hits);

        $result = array_merge(...$result);

        return array_map($callback, $result);
    }

    /**
     * @return UniProductBase[]
     */
    private function resolveCategoryInternalProducts(?UniProductCategoryInternal $category): array
    {
        $result = [];

        foreach ($category?->getChildren() ?? [] as $child) {
            if ($child instanceof UniProductBase) {
                $result[] = [$child];
            } elseif ($child instanceof UniProductCategoryInternal) {
                $result[] = $this->resolveCategoryInternalProducts($child);
            }
        }

        return array_merge(...$result);
    }
}
