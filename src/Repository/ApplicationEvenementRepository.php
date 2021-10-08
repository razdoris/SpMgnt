<?php

namespace App\Repository;

use App\Entity\ApplicationEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationEvenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationEvenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationEvenement[]    findAll()
 * @method ApplicationEvenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationEvenement::class);
    }

    // /**
    //  * @return ApplicationEvenement[] Returns an array of ApplicationEvenement objects
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
    public function findOneBySomeField($value): ?ApplicationEvenement
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
