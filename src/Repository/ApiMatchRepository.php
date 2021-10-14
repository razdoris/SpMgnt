<?php

namespace App\Repository;

use App\Entity\ApiMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApiMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiMatch[]    findAll()
 * @method ApiMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiMatch::class);
    }

    public function lastDay()
    {
        return $this
            ->createQueryBuilder('match')
            ->select('MAX(match.date)')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return ApiMatch[] Returns an array of ApiMatch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ApiMatch
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
