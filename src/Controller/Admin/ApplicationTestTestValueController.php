<?php

namespace App\Controller\Admin;

use App\Entity\ApplicationTestTestValue;
use App\Form\ApplicationTestTestValueType;
use App\Repository\ApplicationTestTestValueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/application/test/link")
 */
class ApplicationTestTestValueController extends AbstractController
{
    /**
     * @Route("/", name="admin_application_test_link_index", methods={"GET"})
     */
    public function index(ApplicationTestTestValueRepository $applicationTestTestValueRepository): Response
    {
        return $this->render('admin/application/test/link/index.html.twig', [
            'application_test_test_values' => $applicationTestTestValueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_application_test_link_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $applicationTestTestValue = new ApplicationTestTestValue();
        $form = $this->createForm(ApplicationTestTestValueType::class, $applicationTestTestValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($applicationTestTestValue);
            $entityManager->flush();

            return $this->redirectToRoute('admin_application_test_link_index');
        }

        return $this->render('admin/application/test/link/new.html.twig', [
            'application_test_test_value' => $applicationTestTestValue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_test_link_show", methods={"GET"})
     */
    public function show(ApplicationTestTestValue $applicationTestTestValue): Response
    {
        return $this->render('admin/application/test/link/show.html.twig', [
            'application_test_test_value' => $applicationTestTestValue,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_application_test_link_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApplicationTestTestValue $applicationTestTestValue): Response
    {
        $form = $this->createForm(ApplicationTestTestValueType::class, $applicationTestTestValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_application_test_link_index');
        }

        return $this->render('admin/application/test/link/edit.html.twig', [
            'application_test_test_value' => $applicationTestTestValue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_application_test_link_delete", methods={"POST"})
     */
    public function delete(Request $request, ApplicationTestTestValue $applicationTestTestValue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$applicationTestTestValue->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($applicationTestTestValue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_application_test_link_index');
    }
}
