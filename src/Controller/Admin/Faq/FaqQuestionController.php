<?php

namespace App\Controller\Admin\Faq;

use App\Entity\PresentationFaqQuestion;
use App\Form\PresentationFaqQuestion1Type;
use App\Repository\PresentationFaqQuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/faq/question")
 */
class FaqQuestionController extends AbstractController
{
    /**
     * @Route("/", name="admin_faq_faq_question_index", methods={"GET"})
     */
    public function index(PresentationFaqQuestionRepository $presentationFaqQuestionRepository): Response
    {
        return $this->render('admin/faq/faq_question/index.html.twig', [
            'presentation_faq_questions' => $presentationFaqQuestionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_faq_faq_question_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $presentationFaqQuestion = new PresentationFaqQuestion();
        $form = $this->createForm(PresentationFaqQuestionType::class, $presentationFaqQuestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($presentationFaqQuestion);
            $entityManager->flush();

            return $this->redirectToRoute('admin_faq_faq_question_index');
        }

        return $this->render('admin/faq/faq_question/new.html.twig', [
            'presentation_faq_question' => $presentationFaqQuestion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_faq_faq_question_show", methods={"GET"})
     */
    public function show(PresentationFaqQuestion $presentationFaqQuestion): Response
    {
        return $this->render('admin/faq/faq_question/show.html.twig', [
            'presentation_faq_question' => $presentationFaqQuestion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_faq_faq_question_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PresentationFaqQuestion $presentationFaqQuestion): Response
    {
        $form = $this->createForm(PresentationFaqQuestionType::class, $presentationFaqQuestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_faq_faq_question_index');
        }

        return $this->render('admin/faq/faq_question/edit.html.twig', [
            'presentation_faq_question' => $presentationFaqQuestion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_faq_faq_question_delete", methods={"POST"})
     */
    public function delete(Request $request, PresentationFaqQuestion $presentationFaqQuestion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presentationFaqQuestion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($presentationFaqQuestion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_faq_faq_question_index');
    }
}
