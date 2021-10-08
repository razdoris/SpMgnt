<?php

namespace App\Repository;

use App\Entity\ApplicationSeance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationSeance|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationSeance|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationSeance[]    findAll()
 * @method ApplicationSeance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationSeanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationSeance::class);
    }

    // /**
    //  * @return ApplicationSeance[] Returns an array of ApplicationSeance objects
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
    public function findOneBySomeField($value): ?ApplicationSeance
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
