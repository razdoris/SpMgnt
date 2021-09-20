<?php

namespace App\Controller;

use App\Repository\PresentationBlogArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('main/blog.html.twig',[
            'articlesList'=>$articles->findall()
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

        return $this->render('main/article.html.twig',[
            'article'=>$article
        ]);
    }
}
