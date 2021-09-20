<?php

namespace App\Repository;

use App\Entity\PresentationOfferDescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PresentationOfferDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresentationOfferDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresentationOfferDescription[]    findAll()
 * @method PresentationOfferDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentationOfferDescriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresentationOfferDescription::class);
    }

    // /**
    //  * @return PresentationOfferDescription[] Returns an array of PresentationOfferDescription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PresentationOfferDescription
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
