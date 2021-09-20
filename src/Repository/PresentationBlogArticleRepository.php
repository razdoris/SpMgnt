<?php

namespace App\Repository;

use App\Entity\PresentationBlogArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PresentationBlogArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresentationBlogArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresentationBlogArticle[]    findAll()
 * @method PresentationBlogArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentationBlogArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresentationBlogArticle::class);
    }

    // /**
    //  * @return PresentationBlogArticle[] Returns an array of PresentationBlogArticle objects
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
    public function findOneBySomeField($value): ?PresentationBlogArticle
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
