<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationPlayerDisponibility;
use App\Form\ApplicationPlayerDisponibilityType;
use App\Repository\ApplicationPlayerDisponibilityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/application/player/disponibility")
 */
class ApplicationPlayerDisponibilityController extends AbstractController
{
    /**
     * @Route("/", name="admin_application_player_disponibility_index", methods={"GET"})
     */
    public function index(ApplicationPlayerDisponibilityRepository $applicationPlayerDisponibilityRepository): Response
    {
        return $this->render('admin/application/player/disponibility/index.html.twig', [
            'application_player_disponibilities' => $applicationPlayerDisponibilityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_application_player_disponibility_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $applicationPlayerDisponibility = new ApplicationPlayerDisponibility();
        $form = $this->createForm(ApplicationPlayerDisponibilityType::class, $applicationPlayerDisponibility);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($applicationPlayerDisponibility);
            $entityManager->flush();

            return $this->redirectToRoute('admin_application_player_disponibility_index');
        }

        return $this->render('admin/application/player/disponibility/new.html.twig', [
            'application_player_disponibility' => $applicationPlayerDisponibility,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_player_disponibility_show", methods={"GET"})
     */
    public function show(ApplicationPlayerDisponibility $applicationPlayerDisponibility): Response
    {
        return $this->render('admin/application/player/disponibility/show.html.twig', [
            'application_player_disponibility' => $applicationPlayerDisponibility,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_application_player_disponibility_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApplicationPlayerDisponibility $applicationPlayerDisponibility): Response
    {
        $form = $this->createForm(ApplicationPlayerDisponibilityType::class, $applicationPlayerDisponibility);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_application_player_disponibility_index');
        }

        return $this->render('admin/application/player/disponibility/edit.html.twig', [
            'application_player_disponibility' => $applicationPlayerDisponibility,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_player_disponibility_delete", methods={"POST"})
     */
    public function delete(Request $request, ApplicationPlayerDisponibility $applicationPlayerDisponibility): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applicationPlayerDisponibility->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applicationPlayerDisponibility);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_application_player_disponibility_index');
    }
}
