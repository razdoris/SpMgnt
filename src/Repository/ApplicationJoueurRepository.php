<?php

namespace App\Repository;

use App\Entity\ApplicationJoueur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationJoueur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationJoueur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationJoueur[]    findAll()
 * @method ApplicationJoueur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationJoueurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationJoueur::class);
    }

    // /**
    //  * @return ApplicationJoueur[] Returns an array of ApplicationJoueur objects
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
    public function findOneBySomeField($value): ?ApplicationJoueur
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
