<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchController extends AbstractController
{
    /**
     * @Route("/application/match", name="application_match")
     */
    public function index(): Response
    {
        return $this->render('application/match/index.html.twig', [
            'controller_name' => 'MatchController',
        ]);
    }
}
