<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationTestValue;
use App\Form\ApplicationTestValueType;
use App\Repository\ApplicationTestValueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/application/test/value")
 */
class ApplicationTestValueController extends AbstractController
{
    /**
     * @Route("/", name="admin_application_test_value_index", methods={"GET"})
     */
    public function index(ApplicationTestValueRepository $applicationTestValueRepository): Response
    {
        return $this->render('admin/application/test/value/index.html.twig', [
            'application_test_values' => $applicationTestValueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_application_test_value_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $applicationTestValue = new ApplicationTestValue();
        $form = $this->createForm(ApplicationTestValueType::class, $applicationTestValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($applicationTestValue);
            $entityManager->flush();

            return $this->redirectToRoute('admin_application_test_value_index');
        }

        return $this->render('admin/application/test/value/new.html.twig', [
            'application_test_value' => $applicationTestValue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_test_value_show", methods={"GET"})
     */
    public function show(ApplicationTestValue $applicationTestValue): Response
    {
        return $this->render('admin/application/test/value/show.html.twig', [
            'application_test_value' => $applicationTestValue,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_application_test_value_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApplicationTestValue $applicationTestValue): Response
    {
        $form = $this->createForm(ApplicationTestValueType::class, $applicationTestValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_application_test_value_index');
        }

        return $this->render('admin/application/test/value/edit.html.twig', [
            'application_test_value' => $applicationTestValue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_test_value_delete", methods={"POST"})
     */
    public function delete(Request $request, ApplicationTestValue $applicationTestValue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applicationTestValue->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applicationTestValue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_application_test_value_index');
    }
}
