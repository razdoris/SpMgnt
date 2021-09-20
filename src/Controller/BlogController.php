<?php

namespace App\Controller;

use App\Entity\PresentationBlogArticle;
use App\Form\PresentationBlogArticleType;
use App\Repository\PresentationBlogArticleRepository;

use Doctrine\ORM\EntityManagerInterface;
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
        return $this->render('blog/blog.html.twig',[
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

        return $this->render('blog/articleDetail.html.twig',[
            'article'=>$article
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function newArticle(
        Request $request,
        PresentationBlogArticleRepository $article,
        EntityManagerInterface $entityManager
    ): Response
    {
        $article= new PresentationBlogArticle();
        $article->setDate(new \DateTime());
        $article->setAuthor('nbeurel');
        $formNewArticle = $this->createForm(PresentationBlogArticleType::class, $article);

        $formNewArticle->handleRequest($request);

        if($formNewArticle->isSubmitted() && $formNewArticle->isValid())
        {
            $entityManager->persist($article);
            $entityManager->flush();
        }


        return $this->render('blog/newArticle.html.twig',[
            'formNewArticle'=>$formNewArticle->createView()
        ]);
    }
}
