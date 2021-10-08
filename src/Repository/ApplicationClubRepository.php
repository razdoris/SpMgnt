<?php

namespace App\Repository;

use App\Entity\ApplicationClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationClub[]    findAll()
 * @method ApplicationClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationClub::class);
    }

    // /**
    //  * @return ApplicationClub[] Returns an array of ApplicationClub objects
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
    public function findOneBySomeField($value): ?ApplicationClub
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
