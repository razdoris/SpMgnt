<?php

namespace App\Repository;

use App\Entity\ApplicationCalendarEventsSort;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationCalendarEventsSort|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationCalendarEventsSort|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationCalendarEventsSort[]    findAll()
 * @method ApplicationCalendarEventsSort[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationCalendarEventsTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationCalendarEventsSort::class);
    }

    // /**
    //  * @return ApplicationCalendarEventsType[] Returns an array of ApplicationCalendarEventsType objects
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
    public function findOneBySomeField($value): ?ApplicationCalendarEventsType
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
