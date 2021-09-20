<?php

namespace App\Controller;

use App\Repository\PresentationFaqQuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/faq", name="faq_")
 */
class FaqController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(
        PresentationFaqQuestionRepository $question
    ): Response
    {
        return $this->render('faq/index.html.twig',[
            'questionList'=>$question->findAll()
        ]);
    }



    /**
     * @Route("/faq", name="faq")
     */
    /*
    public function faq(): Response
    {
        return $this->render('main/faq.html.twig');
    }*/
}
