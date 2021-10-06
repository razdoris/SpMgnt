<?php

namespace App\Controller\Application;

use App\Entity\ApplicationCalendarEventsSort;
use App\Repository\ApplicationCalendarEventsSortRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    /**
     * @Route("/application/calendar", name="application_calendar")
     */
    public function index(ApplicationCalendarEventsSortRepository $typesEvents): Response
    {
        $typesEventsList = $typesEvents->findAll();

        return $this->render('application/calendar/calendarIndex.html.twig', [
            'typesEventsList' => $typesEventsList,
        ]);
    }
}
