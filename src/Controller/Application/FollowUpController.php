<?php

namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FollowUpController extends AbstractController
{
    /**
     * @Route("/application/follow/up", name="application_follow_up")
     */
    public function index(): Response
    {
        return $this->render('application/follow_up/index.html.twig', [
            'controller_name' => 'FollowUpController',
        ]);
    }
}
