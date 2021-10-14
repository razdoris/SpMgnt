<?php

namespace App\Repository;

use App\Entity\ApplicationTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationTest[]    findAll()
 * @method ApplicationTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationTest::class);
    }

    // /**
    //  * @return ApplicationTest[] Returns an array of ApplicationTest objects
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
    public function findOneBySomeField($value): ?ApplicationTest
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
