<?php

namespace App\Repository;

use App\Entity\ApiStandings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApiStandings|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApiStandings|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApiStandings[]    findAll()
 * @method ApiStandings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiStandingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiStandings::class);
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
    //  * @return ApiStandings[] Returns an array of ApiStandings objects
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
    public function findOneBySomeField($value): ?ApiStandings
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
