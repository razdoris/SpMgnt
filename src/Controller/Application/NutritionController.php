<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NutritionController extends AbstractController
{
    /**
     * @Route("/application/nutrition", name="application_nutrition")
     */
    public function index(): Response
    {
        return $this->render('application/nutrition/index.html.twig', [
            'controller_name' => 'NutritionController',
        ]);
    }
}
