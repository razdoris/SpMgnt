<?php

namespace App\Controller;

use App\Entity\PresentationContactMessage;
use App\Entity\PresentationOfferDescription;
use App\Form\PresentationContactMessageType;
use App\Notification\EMailSender;
use App\Repository\PresentationBlogArticleRepository;
use App\Repository\PresentationContactSubjectRepository;
use App\Repository\PresentationOfferDescriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/", name="main_")
 */
class MainController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/offre", name="offre")
     */
    public function offre(PresentationOfferDescriptionRepository $offers): Response
    {
        $test="205,215,211,1";
        return $this->render('main/offre.html.twig',[
            'test'=>$test,
            'offersList'=>$offers->findAll()
        ]);
    }

    /**
     * @Route("/faq", name="faq")
     */
    public function faq(): Response
    {
        return $this->render('main/faq.html.twig');
    }

    /**
     * @Route("/contact/{id}", name="contact", requirements={"id"="\d+"})
     */
    public function contact(
        Request $request,
        EMailSender $eMailSender,
        PresentationContactSubjectRepository $subject,
        int $id=null
    ): Response
    {
        $contact = new PresentationContactMessage();
        $form = $this->createForm(PresentationContactMessageType::class, $contact);

        $form->handleRequest($request);

        if($id != null){
            $mailSubject = $subject->find($id);
            $form->get('subject')->setData($mailSubject);
            $form->get('firstName')->setData('test');
            return $this->render('main/contact.html.twig',[
                'formContactMessage' => $form->createView(),
                'subject'=>$subject
            ]);
        }

        if($form->isSubmitted() && $form->isValid())
        {

            dump($request);
            $eMailSender->sendMailToAdmin($contact);
            $this->addFlash('success', 'Votre email a été envoyé');
            return $this->redirectToRoute('main_contact');
        }

        return $this->render('main/contact.html.twig',[
            'formContactMessage' => $form->createView(),
        ]);
    }






}
