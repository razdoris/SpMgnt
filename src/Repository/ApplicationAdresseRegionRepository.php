<?php

namespace App\Repository;

use App\Entity\ApplicationAdresseRegion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationAdresseRegion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationAdresseRegion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationAdresseRegion[]    findAll()
 * @method ApplicationAdresseRegion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationAdresseRegionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationAdresseRegion::class);
    }

    // /**
    //  * @return ApplicationAdresseRegion[] Returns an array of ApplicationAdresseRegion objects
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
    public function findOneBySomeField($value): ?ApplicationAdresseRegion
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
