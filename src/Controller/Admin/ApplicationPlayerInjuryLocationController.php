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
    public function index(ApplicationPlayerInjuryLocationRepository $applicationPlayerInjuryLocationRepository): Response
    {
        return $this->render('admin/application/player/injury_location/index.html.twig', [
            'application_player_injury_locations' => $applicationPlayerInjuryLocationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $applicationPlayerInjuryLocation = new ApplicationPlayerInjuryLocation();
        $form = $this->createForm(ApplicationPlayerInjuryLocationType::class, $applicationPlayerInjuryLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            if($applicationPlayerInjuryLocation->getLaterality()=="both"){
                $applicationPlayerInjuryLocationGauche = new ApplicationPlayerInjuryLocation();
                $applicationPlayerInjuryLocationGauche->setLocation($applicationPlayerInjuryLocation->getLocation());
                $applicationPlayerInjuryLocationGauche->setLaterality('Gauche');
                $applicationPlayerInjuryLocation->setLaterality('Droit');
                $entityManager->persist($applicationPlayerInjuryLocationGauche);
            }
            $entityManager->persist($applicationPlayerInjuryLocation);
            $entityManager->flush();


            return $this->redirectToRoute('admin_application_player_injury_location_index');
        }

        return $this->render('admin/application/player/injury_location/new.html.twig', [
            'application_player_injury_location' => $applicationPlayerInjuryLocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(ApplicationPlayerInjuryLocation $applicationPlayerInjuryLocation): Response
    {
        return $this->render('admin/application/player/injury_location/show.html.twig', [
            'application_player_injury_location' => $applicationPlayerInjuryLocation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApplicationPlayerInjuryLocation $applicationPlayerInjuryLocation): Response
    {
        $form = $this->createForm(ApplicationPlayerInjuryLocationType::class, $applicationPlayerInjuryLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_application_player_injury_location_index');
        }

        return $this->render('admin/application/player/injury_location/edit.html.twig', [
            'application_player_injury_location' => $applicationPlayerInjuryLocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, ApplicationPlayerInjuryLocation $applicationPlayerInjuryLocation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applicationPlayerInjuryLocation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applicationPlayerInjuryLocation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_application_player_injury_location_index');
    }
}
