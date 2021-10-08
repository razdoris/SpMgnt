<?php

namespace App\Repository;

use App\Entity\ApplicationMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationMatch[]    findAll()
 * @method ApplicationMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationMatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationMatch::class);
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
    //  * @return ApplicationMatch[] Returns an array of ApplicationMatch objects
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
    public function findOneBySomeField($value): ?ApplicationMatch
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
