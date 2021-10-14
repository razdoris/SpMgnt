<?php

namespace App\Repository;

use App\Entity\ApplicationPlayerAptitude;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationPlayerAptitude|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationPlayerAptitude|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationPlayerAptitude[]    findAll()
 * @method ApplicationPlayerAptitude[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationPlayerAptitudeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationPlayerAptitude::class);
    }

    // /**
    //  * @return ApplicationPlayerAptitude[] Returns an array of ApplicationPlayerAptitude objects
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
    public function findOneBySomeField($value): ?ApplicationPlayerAptitude
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
