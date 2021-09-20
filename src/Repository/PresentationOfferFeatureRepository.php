<?php

namespace App\Repository;

use App\Entity\PresentationOfferFeature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PresentationOfferFeature|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresentationOfferFeature|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresentationOfferFeature[]    findAll()
 * @method PresentationOfferFeature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentationOfferFeatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresentationOfferFeature::class);
    }

    // /**
    //  * @return PresentationOfferFeature[] Returns an array of PresentationOfferFeature objects
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
    public function findOneBySomeField($value): ?PresentationOfferFeature
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
