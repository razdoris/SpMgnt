<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationCalendarEventsSort;
use App\Form\ApplicationCalendarEventsSortType;
use App\Repository\ApplicationCalendarEventsSortRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/application/calendar/events/sort")
 */
class ApplicationCalendarEventsSortController extends AbstractController
{
    /**
     * @Route("/", name="admin_application_calendar_events_sort_index", methods={"GET"})
     */
    public function index(ApplicationCalendarEventsSortRepository $applicationCalendarEventsTypeRepository): Response
    {
        return $this->render('admin/application/calendar/events_sort/index.html.twig', [
            'application_calendar_events_sorts' => $applicationCalendarEventsTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_application_calendar_events_sort_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $applicationCalendarEventsSort = new ApplicationCalendarEventsSort();
        $form = $this->createForm(ApplicationCalendarEventsSortType::class, $applicationCalendarEventsSort);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($applicationCalendarEventsSort);
            $entityManager->flush();

            return $this->redirectToRoute('admin_application_calendar_events_sort_index');
        }

        return $this->render('admin/application/calendar/events_sort/new.html.twig', [
            'application_calendar_events_sort' => $applicationCalendarEventsSort,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_calendar_events_sort_show", methods={"GET"})
     */
    public function show(ApplicationCalendarEventsSort $applicationCalendarEventsSort): Response
    {
        return $this->render('admin/application/calendar/events_sort/show.html.twig', [
            'application_calendar_events_sort' => $applicationCalendarEventsSort,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_application_calendar_events_sort_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApplicationCalendarEventsSort $applicationCalendarEventsSort): Response
    {
        $form = $this->createForm(ApplicationCalendarEventsSortType::class, $applicationCalendarEventsSort);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_application_calendar_events_sort_index');
        }

        return $this->render('admin/application/calendar/events_sort/edit.html.twig', [
            'application_calendar_events_sort' => $applicationCalendarEventsSort,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_calendar_events_sort_delete", methods={"POST"})
     */
    public function delete(Request $request, ApplicationCalendarEventsSort $applicationCalendarEventsSort): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applicationCalendarEventsSort->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applicationCalendarEventsSort);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_application_calendar_events_sort_index');
    }
}
