<?php

namespace App\Repository;

use App\Entity\Promotion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class PromotionRepository
 * @package App\Repository
 *
 * @method Promotion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Promotion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Promotion[]    findAll()
 * @method Promotion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PromotionRepository extends ServiceEntityRepository
{
    /**
     * PromotionRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Promotion::class);
    }

    /**
     * @return int|mixed|string
     */
    public function getActivePromotions()
    {
        $now = new \DateTimeImmutable();

        return $this->createQueryBuilder('p')
            ->where('p.updatedAt >= :nowStart')
            ->andWhere('p.updatedAt <= :nowEnd')
            ->setParameters(
                [
                    ':nowStart' => $now->format('Y-m-d 00:00:00'),
                    ':nowEnd' => $now->format('Y-m-d 23:59:59'),
                ]
            )
            ->getQuery()
            ->getResult();
    }
}
