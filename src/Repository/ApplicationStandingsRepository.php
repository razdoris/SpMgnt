<?php

namespace App\Repository;

use App\Entity\ApplicationStandings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationStandings|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationStandings|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationStandings[]    findAll()
 * @method ApplicationStandings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationStandingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationStandings::class);
    }

    public function findByIdApi($idApi)
    {
        $query = $this
            ->createQueryBuilder('club')
            ->where('club.idApi = :idApi')
            ->setParameter('idApi', $idApi)
            ->getQuery()
            ->getResult();
        return $query;
    }

    public function deleteAll()
    {
        $query = $this
            ->createQueryBuilder('club')
            ->delete()
            ->getQuery()
            ->getResult();
        return $query;
    }
    // /**
    //  * @return ApplicationStandings[] Returns an array of ApplicationStandings objects
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
    public function findOneBySomeField($value): ?ApplicationStandings
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
