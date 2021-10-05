<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatController extends AbstractController
{
    /**
     * @Route("/application/stat", name="application_stat")
     */
    public function index(): Response
    {
        return $this->render('application/stat/index.html.twig', [
            'controller_name' => 'StatController',
        ]);
    }
}
