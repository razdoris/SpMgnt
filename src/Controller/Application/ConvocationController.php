<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConvocationController extends AbstractController
{
    /**
     * @Route("/application/convocation", name="application_convocation")
     */
    public function index(): Response
    {
        return $this->render('application/convocation/index.html.twig', [
            'controller_name' => 'ConvocationController',
        ]);
    }
}
