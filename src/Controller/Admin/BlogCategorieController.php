<?php

namespace App\Controller\Admin;

use App\Entity\PresentationBlogCategory;
use App\Form\PresentationBlogCategoryType;
use App\Repository\PresentationBlogCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/blog/categorie", name="admin_blog_categorie_")
 */
class BlogCategorieController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(PresentationBlogCategoryRepository $presentationBlogCategoryRepository): Response
    {
        return $this->render('admin/blog/blog_categorie/index.html.twig', [
            'presentation_blog_categories' => $presentationBlogCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $presentationBlogCategory = new PresentationBlogCategory();
        $form = $this->createForm(PresentationBlogCategoryType::class, $presentationBlogCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($presentationBlogCategory);
            $entityManager->flush();

            return $this->redirectToRoute('admin_blog_categorie_index');
        }

        return $this->render('admin/blog/blog_categorie/new.html.twig', [
            'presentation_blog_categorie' => $presentationBlogCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(PresentationBlogCategory $presentationBlogCategory): Response
    {
        return $this->render('admin/blog/blog_categorie/show.html.twig', [
            'presentation_blog_categorie' => $presentationBlogCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PresentationBlogCategory $presentationBlogCategory): Response
    {
        $form = $this->createForm(PresentationBlogCategoryType::class, $presentationBlogCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_blog_categorie_index');
        }

        return $this->render('admin/blog/blog_categorie/edit.html.twig', [
            'presentation_blog_categorie' => $presentationBlogCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, PresentationBlogCategory $presentationBlogCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presentationBlogCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($presentationBlogCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_blog_categorie_index');
    }
}
