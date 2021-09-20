<?php

namespace App\Repository;

use App\Entity\PresentationContactSubject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PresentationContactSubject|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresentationContactSubject|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresentationContactSubject[]    findAll()
 * @method PresentationContactSubject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentationContactSubjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresentationContactSubject::class);
    }

    // /**
    //  * @return PresentationContactSubject[] Returns an array of PresentationContactSubject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PresentationContactSubject
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
