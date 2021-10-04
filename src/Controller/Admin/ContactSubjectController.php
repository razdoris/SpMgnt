<?php

namespace App\Controller\Admin;

use App\Entity\PresentationContactSubject;
use App\Form\PresentationContactSubjectType;
use App\Repository\PresentationContactSubjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/contact/subject", name="admin_contact_subject_" )
 */
class ContactSubjectController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(PresentationContactSubjectRepository $contactSubjectRepository): Response
    {
        return $this->render('admin/contact_subject//index.html.twig', [
            'contact_subjects' => $contactSubjectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contactSubject = new PresentationContactSubject();
        $form = $this->createForm(PresentationContactSubjectType::class, $contactSubject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactSubject);
            $entityManager->flush();

            return $this->redirectToRoute('admin_contact_subject_index');
        }

        return $this->render('admin/contact_subject//new.html.twig', [
            'contact_subject' => $contactSubject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(PresentationContactSubject $contactSubject): Response
    {
        return $this->render('admin/contact_subject//show.html.twig', [
            'contact_subject' => $contactSubject,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PresentationContactSubject $contactSubject): Response
    {
        $form = $this->createForm(PresentationContactSubjectType::class, $contactSubject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_contact_subject_index');
        }

        return $this->render('admin/contact_subject//edit.html.twig', [
            'contact_subject' => $contactSubject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, PresentationContactSubject $contactSubject): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactSubject->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contactSubject);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_contact_subject_index');
    }
}
