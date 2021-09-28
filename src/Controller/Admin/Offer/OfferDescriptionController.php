<?php

namespace App\Controller\Admin\Offer;

use App\Entity\PresentationOfferDescription;
use App\Form\PresentationOfferDescriptionType;
use App\Repository\PresentationOfferDescriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/offer_description/description", name="admin_offer_offer_description_")
 */
class OfferDescriptionController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(PresentationOfferDescriptionRepository $presentationOfferDescriptionRepository): Response
    {
        return $this->render('admin/offer/offer_description/index.html.twig', [
            'presentation_offer_descriptions' => $presentationOfferDescriptionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $presentationOfferDescription = new PresentationOfferDescription();
        $form = $this->createForm(PresentationOfferDescriptionType::class, $presentationOfferDescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($presentationOfferDescription);
            $entityManager->flush();

            return $this->redirectToRoute('admin_offer_offer_description_index');
        }

        return $this->render('admin/offer/offer_description/new.html.twig', [
            'presentation_offer_description' => $presentationOfferDescription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(PresentationOfferDescription $presentationOfferDescription): Response
    {
        return $this->render('admin/offer/offer_description/show.html.twig', [
            'presentation_offer_description' => $presentationOfferDescription,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PresentationOfferDescription $presentationOfferDescription): Response
    {
        $form = $this->createForm(PresentationOfferDescriptionType::class, $presentationOfferDescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_offer_offer_description_index');
        }

        return $this->render('admin/offer/offer_description/edit.html.twig', [
            'presentation_offer_description' => $presentationOfferDescription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, PresentationOfferDescription $presentationOfferDescription): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presentationOfferDescription->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($presentationOfferDescription);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_offer_offer_description_index');
    }
}
