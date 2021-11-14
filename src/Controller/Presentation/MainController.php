<?php

namespace App\Controller\Presentation;

use App\Entity\PresentationAppliDescription;
use App\Entity\PresentationContactMessage;
use App\Entity\PresentationOfferDescription;
use App\Entity\PresentationOfferFeature;
use App\Form\PresentationAppliDescriptionType;
use App\Form\PresentationContactMessageType;
use App\Notification\EMailSender;
use App\Repository\PresentationAppliDescriptionRepository;
use App\Repository\PresentationBlogArticleRepository;
use App\Repository\PresentationContactSubjectRepository;
use App\Repository\PresentationFaqQuestionRepository;
use App\Repository\PresentationOfferDescriptionRepository;
use App\Repository\PresentationOfferFeatureRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function index(
        PresentationBlogArticleRepository $articles,
        PresentationOfferFeatureRepository $feature

    ): Response
    {
        $articlesList = $articles->findSomeArticles();
        $featureList = $feature->findAll();

        return $this->render('presentation/main/index.html.twig',[
            'articlesList'=> $articlesList,
            'featureList' => $featureList
        ]);
    }


    /**
     * @Route("faq", name="faq")
     */
    public function faq(
        PresentationFaqQuestionRepository $question
    ): Response
    {
        $questionList = $question->findAll();
        return $this->render('presentation/main/faq.html.twig',[
            'questionList'=>$questionList
        ]);
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

        if($id != null && !$form->isSubmitted()){
            $mailSubject = $subject->find($id);
            $form->get('subject')->setData($mailSubject);
            return $this->render('presentation/main/contact.html.twig',[
                'formContactMessage' => $form->createView(),
                'subject'=>$subject
            ]);
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $eMailSender->sendContactMailToAdmin($contact);
            $this->addFlash('success', 'Votre email a été envoyé');
            return $this->redirectToRoute('main_index');
        }

        return $this->render('presentation/main/contact.html.twig',[
            'formContactMessage' => $form->createView(),
            'subject'=>null
        ]);
    }






}
