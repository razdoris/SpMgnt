<?php

namespace App\Controller;

use App\Entity\PresentationOfferDescription;
use App\Form\PresentationOfferDescriptionType;
use App\Repository\PresentationOfferDescriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offer", name="offer_")
 */
class OfferController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(PresentationOfferDescriptionRepository $offers): Response
    {
        $offersList=$offers->findAllOffers();

        return $this->render('offer/index.html.twig',[
            'offersList'=>$offersList
        ]);
    }
}
