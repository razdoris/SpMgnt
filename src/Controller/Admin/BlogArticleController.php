<?php

namespace App\Controller\Admin;

use App\Entity\PresentationBlogArticle;
use App\Entity\PresentationBlogCategory;
use App\Form\PresentationBlogArticleType;
use App\Form\PresentationBlogCategoryType;
use App\Repository\PresentationBlogArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin/blog/article", name="admin_blog_article_")
 */
class BlogArticleController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(
        PresentationBlogArticleRepository $presentationBlogArticleRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        //$articlesList = $presentationBlogArticleRepository->findAll();
        $articlesList= $paginator->paginate(
            $presentationBlogArticleRepository->findAllArticlesPaginate(),
            $request->query->getInt('page',1),
            5
        );

        return $this->render('admin/blog/blog_article/index.html.twig', [
            'presentation_blog_articles' => $articlesList
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $presentationBlogArticle = new PresentationBlogArticle();
        $form = $this->createForm(PresentationBlogArticleType::class, $presentationBlogArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($presentationBlogArticle);
            $entityManager->flush();

            return $this->redirectToRoute('admin_blog_article_index');
        }

        return $this->render('admin/blog/blog_article/new.html.twig', [
            'presentation_blog_article' => $presentationBlogArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(PresentationBlogArticle $presentationBlogArticle): Response
    {
        return $this->render('admin/blog/blog_article/show.html.twig', [
            'presentation_blog_article' => $presentationBlogArticle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PresentationBlogArticle $presentationBlogArticle): Response
    {
        $form = $this->createForm(PresentationBlogArticleType::class, $presentationBlogArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_blog_article_index');
        }

        return $this->render('admin/blog/blog_article/edit.html.twig', [
            'presentation_blog_article' => $presentationBlogArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, PresentationBlogArticle $presentationBlogArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presentationBlogArticle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($presentationBlogArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_blog_article_index');
    }
}
