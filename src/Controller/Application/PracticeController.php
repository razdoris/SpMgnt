<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PracticeController extends AbstractController
{
    /**
     * @Route("/application/practice", name="application_practice")
     */
    public function index(): Response
    {
        return $this->render('application/practice/index.html.twig', [
            'controller_name' => 'PracticeController',
        ]);
    }
}
