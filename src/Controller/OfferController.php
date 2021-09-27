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

    /**
     * @Route("/new", name="admin_offer_new")
     */
    public function newOffer(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $offer = new PresentationOfferDescription();
        $formNewOffer = $this->createForm(PresentationOfferDescriptionType::class,$offer);

        $formNewOffer->handleRequest($request);

        if($formNewOffer->isSubmitted() && $formNewOffer->isValid())
        {
            $entityManager->persist($offer);
            $entityManager->flush();
            $this->addFlash('success', 'l\'offre a bien été créée');
            return $this->redirectToRoute('offer_index');

        }

        return $this->render('offer/formOffer.html.twig',[
            'formOffer'=>$formNewOffer->createView()
        ]);
    }

    /**
     * @Route("/modify/{id}", name="admin_offer_modify", requirements={"id"="\d+"})
     */
    public function modify(
        Request $request,
        PresentationOfferDescriptionRepository $offers,
        EntityManagerInterface $entityManager,
        int $id
    ): Response
    {
        $offer = $offers->find($id);
        if(!$offer){
            throw $this->createNotFoundException("cette offre n'existe pas");
        }
        $formNewOffer = $this->createForm(PresentationOfferDescriptionType::class,$offer);

        $formNewOffer->handleRequest($request);

        if($formNewOffer->isSubmitted() && $formNewOffer->isValid())
        {
            $entityManager->persist($offer);
            $entityManager->flush();
            $this->addFlash('success', 'l\'offre a bien été modifiée');
            return $this->redirectToRoute('offer_index');

        }

        return $this->render('offer/formOffer.html.twig',[
            'formOffer'=>$formNewOffer->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="admin_offer_delete", requirements={"id"="\d+"})
     */
    public function delete(
        PresentationOfferDescriptionRepository $offers,
        EntityManagerInterface $entityManager,
        int $id
    ): Response
    {
        $offer = $offers->find($id);
        if(!$offer){
            throw $this->createNotFoundException("cette offre n'existe pas");
        }
        $entityManager->remove($offer);
        $entityManager->flush();
        $this->addFlash('success', 'l\'offre a bien été supprimée');
        return $this->redirectToRoute('offer_index');

    }
}
