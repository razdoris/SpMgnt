<?php

namespace App\Controller;

use App\Entity\PresentationBlogArticle;
use App\Form\PresentationBlogArticleType;
use App\Repository\PresentationBlogArticleRepository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog", name="blog_")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function blog(PresentationBlogArticleRepository $articles): Response
    {

        $articlesList = $articles->findAllArticles();

        return $this->render('blog/blog.html.twig',[
            'articlesList'=>$articlesList
        ]);
    }

    /**
     * @Route("/detail/{id}", name="detail", requirements={"id"="\d+"})
     */
    public function Article(
        PresentationBlogArticleRepository $articles,
        int $id
    ): Response
    {
        $article=$articles->find($id);
        if(!$article){
            throw $this->createNotFoundException("cet article n'existe pas");
        }

        $similarArticles = $articles->findSimilarArticles($article);

        return $this->render('blog/articleDetail.html.twig',[
            'article'=>$article,
            'articlesList'=>$similarArticles
        ]);
    }

}
