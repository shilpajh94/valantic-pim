<?php

namespace App\Service\UniProductManagement;

use App\Elasticsearch\Index\UniProductManagement\UniBaseProductIndex;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastica\Query;
use Elastica\Query\AbstractQuery;
use Elastica\Query\BoolQuery;
use Elastica\Query\Terms;
use Elastica\Result;
use Valantic\ElasticaBridgeBundle\Document\DocumentInterface;

/*
@Author Arun Kumar
This service is created for querying Products data from Elastic Search
*/


class UniProductOutPutChannelExportService
{
    public function __construct(private readonly UniBaseProductIndex $productIndex) {}
	
	/**
     * @return array<array<string, mixed>>
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public function getAllProducts(): array
    {
        return $this->getProducts();
    }
	
	/**
     * @param int[] $ids
     *
     * @return array<array<string, mixed>>
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public function getProducts(): array
    {
        return $this->queryProductsPaginated(fn(Result $item) => $item->getData());
    }


  

    /**
     * @return array<mixed>
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    private function queryProductsPaginated(callable $callback): array // TODO Query signature
    {
        $result = [];
        $total = 0;

        do {
            $count = count($result);
			
			$query = [
				'query' => [
					'match_all' => (object) []  // This will fetch all documents
				]
			];

            $queryResult = $this->productIndex->getElasticaIndex()->search($query);
            $hits = $queryResult->getTotalHits();
            $total += $hits;
            $result[] = $queryResult->getResults();
        } while ($total < $hits);

        $result = array_merge(...$result);

        return array_map($callback, $result);
    }

}
