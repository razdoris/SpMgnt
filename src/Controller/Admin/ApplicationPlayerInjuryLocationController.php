<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationPlayerInjuryLocation;
use App\Form\ApplicationPlayerInjuryLocationType;
use App\Repository\ApplicationPlayerInjuryLocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/application/player/injury/location", name="admin_application_player_injury_location_")
 */
class ApplicationPlayerInjuryLocationController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ApplicationPlayerInjuryLocationRepository $applicationPlayerInjuryLocalisationRepository): Response
    {
        return $this->render('admin/application/player/injury_location/index.html.twig', [
            'application_player_injury_locations' => $applicationPlayerInjuryLocalisationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $applicationPlayerInjuryLocalisation = new ApplicationPlayerInjuryLocation();
        $form = $this->createForm(ApplicationPlayerInjuryLocationType::class, $applicationPlayerInjuryLocalisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            if($applicationPlayerInjuryLocalisation->getLateralite()=="both"){
                $applicationPlayerInjuryLocalisationGauche = new ApplicationPlayerInjuryLocation();
                $applicationPlayerInjuryLocalisationGauche->setLocalisation($applicationPlayerInjuryLocalisation->getLocalisation());
                $applicationPlayerInjuryLocalisationGauche->setLateralite('Gauche');
                $applicationPlayerInjuryLocalisation->setLateralite('Droit');
                $entityManager->persist($applicationPlayerInjuryLocalisationGauche);
            }
            $entityManager->persist($applicationPlayerInjuryLocalisation);
            $entityManager->flush();


            return $this->redirectToRoute('admin_application_player_injury_location_index');
        }

        return $this->render('admin/application/player/injury_location/new.html.twig', [
            'application_player_injury_location' => $applicationPlayerInjuryLocalisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(ApplicationPlayerInjuryLocation $applicationPlayerInjuryLocalisation): Response
    {
        return $this->render('admin/application/player/injury_location/show.html.twig', [
            'application_player_injury_location' => $applicationPlayerInjuryLocalisation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApplicationPlayerInjuryLocation $applicationPlayerInjuryLocalisation): Response
    {
        $form = $this->createForm(ApplicationPlayerInjuryLocationType::class, $applicationPlayerInjuryLocalisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_application_player_injury_location_index');
        }

        return $this->render('admin/application/player/injury_location/edit.html.twig', [
            'application_player_injury_location' => $applicationPlayerInjuryLocalisation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_player_injury_location_delete", methods={"POST"})
     */
    public function delete(Request $request, ApplicationPlayerInjuryLocation $applicationPlayerInjuryLocalisation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applicationPlayerInjuryLocalisation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applicationPlayerInjuryLocalisation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_application_player_injury_location_index');
    }
}
