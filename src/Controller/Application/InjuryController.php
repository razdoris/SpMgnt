<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InjuryController extends AbstractController
{
    /**
     * @Route("/application/injury", name="application_injury")
     */
    public function index(): Response
    {
        return $this->render('application/injury/index.html.twig', [
            'controller_name' => 'InjuryController',
        ]);
    }
}
