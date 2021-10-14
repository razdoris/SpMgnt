<?php

namespace App\Repository;

use App\Entity\ApplicationPlayerInjury;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationPlayerInjury|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationPlayerInjury|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationPlayerInjury[]    findAll()
 * @method ApplicationPlayerInjury[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationPlayerInjuryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationPlayerInjury::class);
    }

    // /**
    //  * @return ApplicationPlayerInjury[] Returns an array of ApplicationPlayerInjury objects
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
    public function findOneBySomeField($value): ?ApplicationPlayerInjury
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
