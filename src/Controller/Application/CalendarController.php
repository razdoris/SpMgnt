<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    /**
     * @Route("/application/calendar", name="application_calendar")
     */
    public function index(): Response
    {
        return $this->render('application/calendar/index.html.twig', [
            'controller_name' => 'CalendarController',
        ]);
    }
}
