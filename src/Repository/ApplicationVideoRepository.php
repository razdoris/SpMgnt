<?php

namespace App\Repository;

use App\Entity\ApplicationVideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationVideo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationVideo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationVideo[]    findAll()
 * @method ApplicationVideo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationVideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationVideo::class);
    }

    // /**
    //  * @return ApplicationVideo[] Returns an array of ApplicationVideo objects
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
    public function findOneBySomeField($value): ?ApplicationVideo
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
