<?php

namespace App\Repository;

use App\Entity\ApplicationPlayerDisponibility;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationPlayerDisponibility|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationPlayerDisponibility|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationPlayerDisponibility[]    findAll()
 * @method ApplicationPlayerDisponibility[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationPlayerDisponibilityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationPlayerDisponibility::class);
    }

    // /**
    //  * @return ApplicationPlayerDisponibility[] Returns an array of ApplicationPlayerDisponibility objects
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
    public function findOneBySomeField($value): ?ApplicationPlayerDisponibility
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
