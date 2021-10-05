<?php

namespace App\Repository;

use App\Entity\ApplicationAdresseVille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationAdresseVille|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationAdresseVille|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationAdresseVille[]    findAll()
 * @method ApplicationAdresseVille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationAdresseVilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationAdresseVille::class);
    }

    // /**
    //  * @return ApplicationAdresseVille[] Returns an array of ApplicationAdresseVille objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ApplicationAdresseVille
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
