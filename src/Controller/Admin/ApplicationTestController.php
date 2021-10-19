<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationTest;
use App\Entity\ApplicationTestTestValue;
use App\Form\ApplicationTestTestValueType;
use App\Form\ApplicationTestType;
use App\Repository\ApplicationTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/application/test/test")
 */
class ApplicationTestController extends AbstractController
{
    /**
     * @Route("/", name="admin_application_test_test_index", methods={"GET"})
     */
    public function index(ApplicationTestRepository $applicationTestRepository): Response
    {
        return $this->render('admin/application/test/test/index.html.twig', [
            'application_tests' => $applicationTestRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_application_test_test_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $applicationTest = new ApplicationTest();
        $data= new ApplicationTestTestValue();
        $data ->setName('essai de data');
        $data ->setTest($applicationTest);

        $applicationTest->setTestName("essai de test");
        $applicationTest->addApplicationTestTestValue($data);
        dump($applicationTest);
        $form = $this->createForm(ApplicationTestType::class, $applicationTest);
        $form->handleRequest($request);
        dump($form);




        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($applicationTest);
            $entityManager->flush();

            return $this->redirectToRoute('admin_application_test_test_index');
        }

        return $this->render('admin/application/test/test/new.html.twig', [
            'application_test' => $applicationTest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_test_test_show", methods={"GET"})
     */
    public function show(ApplicationTest $applicationTest): Response
    {
        return $this->render('admin/application/test/test/show.html.twig', [
            'application_test' => $applicationTest,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_application_test_test_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApplicationTest $applicationTest): Response
    {
        $form = $this->createForm(ApplicationTestType::class, $applicationTest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_application_test_test_index');
        }

        return $this->render('admin/application/test/test/edit.html.twig', [
            'application_test' => $applicationTest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_test_test_delete", methods={"POST"})
     */
    public function delete(Request $request, ApplicationTest $applicationTest): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applicationTest->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applicationTest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_application_test_test_index');
    }
}
