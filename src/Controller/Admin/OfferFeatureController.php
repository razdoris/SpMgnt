<?php

namespace App\Controller\Admin;

use App\Entity\PresentationOfferFeature;
use App\Form\PresentationOfferFeatureType;
use App\Repository\PresentationOfferFeatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/offer_description/feature", name="admin_offer_feature_")
 */
class OfferFeatureController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(PresentationOfferFeatureRepository $presentationOfferFeatureRepository): Response
    {
        return $this->render('admin/offer/offer_feature/index.html.twig', [
            'presentation_offer_features' => $presentationOfferFeatureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $presentationOfferFeature = new PresentationOfferFeature();
        $form = $this->createForm(PresentationOfferFeatureType::class, $presentationOfferFeature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($presentationOfferFeature);
            $entityManager->flush();

            return $this->redirectToRoute('admin_offer_feature_index');
        }

        return $this->render('admin/offer/offer_feature/new.html.twig', [
            'presentation_offer_feature' => $presentationOfferFeature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(PresentationOfferFeature $presentationOfferFeature): Response
    {
        return $this->render('admin/offer/offer_feature/show.html.twig', [
            'presentation_offer_feature' => $presentationOfferFeature,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PresentationOfferFeature $presentationOfferFeature): Response
    {
        $form = $this->createForm(PresentationOfferFeatureType::class, $presentationOfferFeature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_offer_feature_index');
        }

        return $this->render('admin/offer/offer_feature/edit.html.twig', [
            'presentation_offer_feature' => $presentationOfferFeature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, PresentationOfferFeature $presentationOfferFeature): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presentationOfferFeature->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($presentationOfferFeature);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_offer_feature_index');
    }
}
