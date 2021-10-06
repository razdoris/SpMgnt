<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationPlayerInjuryLocalisation;
use App\Form\ApplicationPlayerInjuryLocalisationType;
use App\Repository\ApplicationPlayerInjuryLocalisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/application/player/injury/localisation")
 */
class ApplicationPlayerInjuryLocalisationController extends AbstractController
{
    /**
     * @Route("/", name="admin_application_player_injury_localisation_index", methods={"GET"})
     */
    public function index(ApplicationPlayerInjuryLocalisationRepository $applicationPlayerInjuryLocalisationRepository): Response
    {
        return $this->render('admin/application/player/injury_localisation/index.html.twig', [
            'application_player_injury_localisations' => $applicationPlayerInjuryLocalisationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_application_player_injury_localisation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $applicationPlayerInjuryLocalisation = new ApplicationPlayerInjuryLocalisation();
        $form = $this->createForm(ApplicationPlayerInjuryLocalisationType::class, $applicationPlayerInjuryLocalisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($applicationPlayerInjuryLocalisation);
            $entityManager->flush();

            return $this->redirectToRoute('admin_application_player_injury_localisation_index');
        }

        return $this->render('admin/application/player/injury_localisation/new.html.twig', [
            'application_player_injury_localisation' => $applicationPlayerInjuryLocalisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_player_injury_localisation_show", methods={"GET"})
     */
    public function show(ApplicationPlayerInjuryLocalisation $applicationPlayerInjuryLocalisation): Response
    {
        return $this->render('admin/application/player/injury_localisation/show.html.twig', [
            'application_player_injury_localisation' => $applicationPlayerInjuryLocalisation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_application_player_injury_localisation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApplicationPlayerInjuryLocalisation $applicationPlayerInjuryLocalisation): Response
    {
        $form = $this->createForm(ApplicationPlayerInjuryLocalisationType::class, $applicationPlayerInjuryLocalisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_application_player_injury_localisation_index');
        }

        return $this->render('admin/application/player/injury_localisation/edit.html.twig', [
            'application_player_injury_localisation' => $applicationPlayerInjuryLocalisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_player_injury_localisation_delete", methods={"POST"})
     */
    public function delete(Request $request, ApplicationPlayerInjuryLocalisation $applicationPlayerInjuryLocalisation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applicationPlayerInjuryLocalisation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applicationPlayerInjuryLocalisation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_application_player_injury_localisation_index');
    }
}
