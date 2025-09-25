<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UniProductChangeHistory;
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
}
