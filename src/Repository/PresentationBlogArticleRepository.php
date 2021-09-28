<?php

namespace App\Repository;

use App\Entity\PresentationBlogArticle;
use App\Entity\PresentationBlogCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;
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

    public function findAllArticles()
    {
         $query= $this
             ->createQueryBuilder('article')
             ->leftJoin('article.categorie','category')
             ->select('article','category')
             ->orderBy('article.date', 'desc')
             ->getQuery()
             ->getResult();

        return $query;
    }

    public function findAllArticlesPaginate(): Query
    {
        $query= $this
            ->createQueryBuilder('article')
            ->leftJoin('article.categorie','category')
            ->select('article','category')
            ->getQuery();

        return $query;
    }


    public function findSimilarArticles(PresentationBlogArticle $article)
    {

        $idArt = $article->getId();
        $idCat=$article->getCategorie()->getId();

         $query = $this
             ->createQueryBuilder('article')
             ->leftJoin('article.categorie','category')
             ->select('article','category')
             ->where('category.id = :idCat')
             ->setParameter('idCat',$idCat)
             ->andWhere('article.id != :idArt')
             ->setParameter('idArt',$idArt)
             ->orderBy('article.date', 'desc')
             ->setMaxResults(4)
             ->getQuery();


        $paginator = new Paginator($query);
         return $paginator;
    }

    public function findSomeArticles()
    {

        $query= $this
            ->createQueryBuilder('article')
            ->leftJoin('article.categorie','category')
            ->select('article','category')
            ->orderBy('article.date', 'desc')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();

        return $query;
    }
}
