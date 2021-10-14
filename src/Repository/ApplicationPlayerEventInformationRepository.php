<?php

namespace App\Repository;

use App\Entity\ApplicationPlayerEventInformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationPlayerEventInformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationPlayerEventInformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationPlayerEventInformation[]    findAll()
 * @method ApplicationPlayerEventInformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationPlayerEventInformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationPlayerEventInformation::class);
    }

    // /**
    //  * @return ApplicationPlayerEventInformation[] Returns an array of ApplicationPlayerEventInformation objects
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
    public function findOneBySomeField($value): ?ApplicationPlayerEventInformation
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
