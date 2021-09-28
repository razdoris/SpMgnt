<?php

namespace App\Controller\Admin\Blog;

use App\Entity\PresentationBlogCategorie;
use App\Form\PresentationBlogCategorieType;
use App\Repository\PresentationBlogCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/blog/categorie", name="admin_blog_blog_categorie_")
 */
class BlogCategorieController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(PresentationBlogCategorieRepository $presentationBlogCategorieRepository): Response
    {
        return $this->render('admin/blog/blog_categorie/index.html.twig', [
            'presentation_blog_categories' => $presentationBlogCategorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $presentationBlogCategorie = new PresentationBlogCategorie();
        $form = $this->createForm(PresentationBlogCategorieType::class, $presentationBlogCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($presentationBlogCategorie);
            $entityManager->flush();

            return $this->redirectToRoute('admin_blog_blog_categorie_index');
        }

        return $this->render('admin/blog/blog_categorie/new.html.twig', [
            'presentation_blog_categorie' => $presentationBlogCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(PresentationBlogCategorie $presentationBlogCategorie): Response
    {
        return $this->render('admin/blog/blog_categorie/show.html.twig', [
            'presentation_blog_categorie' => $presentationBlogCategorie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PresentationBlogCategorie $presentationBlogCategorie): Response
    {
        $form = $this->createForm(PresentationBlogCategorieType::class, $presentationBlogCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_blog_blog_categorie_index');
        }

        return $this->render('admin/blog/blog_categorie/edit.html.twig', [
            'presentation_blog_categorie' => $presentationBlogCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, PresentationBlogCategorie $presentationBlogCategorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presentationBlogCategorie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($presentationBlogCategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_blog_blog_categorie_index');
    }
}
