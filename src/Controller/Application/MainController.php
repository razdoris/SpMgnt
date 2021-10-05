<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/application/main", name="application_main")
     */
    public function index(): Response
    {
        return $this->render('application/main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
