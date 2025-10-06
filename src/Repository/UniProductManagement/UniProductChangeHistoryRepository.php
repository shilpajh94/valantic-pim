<?php

declare(strict_types=1);

namespace App\Repository\UniProductManagement;

use App\Entity\UniProductManagement\UniProductChangeHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UniProductChangeHistory>
 */
class UniProductChangeHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UniProductChangeHistory::class);
    }

    /**
     * @param array<string, string> $orderBy
     *
     * @return array<int, UniProductChangeHistory>
     */
    public function findByObjectId(string $objectId, string $className, array $orderBy = []): array
    {
        return $this->findBy(
            [
                'objectId' => $objectId,
                'objectClass' => 'Pimcore\Model\DataObject\\' . $className,
            ],
            $orderBy,
        );
    }
}
