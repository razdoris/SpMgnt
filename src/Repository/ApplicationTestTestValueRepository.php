<?php

namespace App\Repository;

use App\Entity\ApplicationTestTestValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationTestTestValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationTestTestValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationTestTestValue[]    findAll()
 * @method ApplicationTestTestValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationTestTestValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationTestTestValue::class);
    }

    // /**
    //  * @return ApplicationTestTestValue[] Returns an array of ApplicationTestTestValue objects
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
    public function findOneBySomeField($value): ?ApplicationTestTestValue
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
