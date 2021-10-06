<?php

namespace App\Repository;

use App\Entity\ApplicationPlayerInjuryLocalisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationPlayerInjuryLocalisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationPlayerInjuryLocalisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationPlayerInjuryLocalisation[]    findAll()
 * @method ApplicationPlayerInjuryLocalisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationPlayerInjuryLocalisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationPlayerInjuryLocalisation::class);
    }

    // /**
    //  * @return ApplicationPlayerInjuryLocalisation[] Returns an array of ApplicationPlayerInjuryLocalisation objects
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
    public function findOneBySomeField($value): ?ApplicationPlayerInjuryLocalisation
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
