<?php

namespace App\Repository;

use App\Entity\PresentationFaqQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PresentationFaqQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresentationFaqQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresentationFaqQuestion[]    findAll()
 * @method PresentationFaqQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentationFaqQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresentationFaqQuestion::class);
    }

    // /**
    //  * @return PresentationFaqQuestion[] Returns an array of PresentationFaqQuestion objects
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
    public function findOneBySomeField($value): ?PresentationFaqQuestion
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
