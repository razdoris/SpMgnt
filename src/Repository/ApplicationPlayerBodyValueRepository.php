<?php

namespace App\Repository;

use App\Entity\ApplicationPlayerBodyValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationPlayerBodyValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationPlayerBodyValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationPlayerBodyValue[]    findAll()
 * @method ApplicationPlayerBodyValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationPlayerBodyValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationPlayerBodyValue::class);
    }

    // /**
    //  * @return ApplicationPlayerBodyValue[] Returns an array of ApplicationPlayerBodyValue objects
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
    public function findOneBySomeField($value): ?ApplicationPlayerBodyValue
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
