<?php

namespace App\Repository;

use App\Entity\ApplicationAdresseDepartement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ApplicationAdresseDepartement|null find($id, $lockMode = null, $lockVersion = null)
 * @method ApplicationAdresseDepartement|null findOneBy(array $criteria, array $orderBy = null)
 * @method ApplicationAdresseDepartement[]    findAll()
 * @method ApplicationAdresseDepartement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationAdresseDepartementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationAdresseDepartement::class);
    }

    // /**
    //  * @return Departement[] Returns an array of Departement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Departement
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
