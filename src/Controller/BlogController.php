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


class BlogController extends AbstractController
{
    /**
     * @Route("/blog/", name="blog_index")
     */
    public function blog(PresentationBlogArticleRepository $articles): Response
    {
        return $this->render('blog/blog.html.twig',[
            'articlesList'=>$articles->findall()
        ]);
    }

    /**
     * @Route("/blog/detail/{id}", name="blog_detail", requirements={"id"="\d+"})
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
     * @Route("/blog/new", name="admin_blog_new")
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
            $this->addFlash('success', 'l\'article à été ajouté');
            $this->redirectToRoute('blog_index');
        }


        return $this->render('blog/formArticle.html.twig',[
            'formArticle'=>$formNewArticle->createView()
        ]);
    }

    /**
     * @Route("blog/modify/{id}", name="admin_blog_detail", requirements={"id"="\d+"})
     */
    public function modifyArticle(
        Request $request,
        PresentationBlogArticleRepository $articles,
        int $id,
        EntityManagerInterface $entityManager
    ): Response
    {
        $article=$articles->find($id);
        if(!$article){
            throw $this->createNotFoundException("cet article n'existe pas");
        }
        $formModifyArticle = $this->createForm(PresentationBlogArticleType::class, $article);

        $formModifyArticle->handleRequest($request);

        if($formModifyArticle->isSubmitted() && $formModifyArticle->isValid())
        {
            $entityManager->persist($article);
            $entityManager->flush();
            $this->addFlash('success', 'l\'article à été modifié');
            $this->redirectToRoute('blog_index');
        }

        return $this->render('blog/formArticle.html.twig',[
            'formArticle'=>$formModifyArticle->createView()
        ]);
    }

    /**
     * @Route("blog/delete/{id}", name="admin_blog_delete", requirements={"id"="\d+"})
     */
    public function deleteArticle(
        Request $request,
        PresentationBlogArticleRepository $articles,
        int $id,
        EntityManagerInterface $entityManager
    ): Response
    {
        $article=$articles->find($id);
        if(!$article){
            throw $this->createNotFoundException("cet article n'existe pas");
        }
        $entityManager->remove($article);
        $entityManager->flush();
        $this->addFlash('success', 'l\'article à été supprimé');
        $this->redirectToRoute('blog_index');

        return $this->redirectToRoute('blog_index');
    }
}
