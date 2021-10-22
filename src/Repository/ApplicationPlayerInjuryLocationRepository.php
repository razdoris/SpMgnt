<?php

namespace App\Repository;

use App\Entity\ApplicationPlayerInjuryLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationPlayerInjuryLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationPlayerInjuryLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationPlayerInjuryLocation[]    findAll()
 * @method ApplicationPlayerInjuryLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationPlayerInjuryLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationPlayerInjuryLocation::class);
    }

    // /**
    //  * @return ApplicationPlayerInjuryLocation[] Returns an array of ApplicationPlayerInjuryLocation objects
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
    public function findOneBySomeField($value): ?ApplicationPlayerInjuryLocation
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
