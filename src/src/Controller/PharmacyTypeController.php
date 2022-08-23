<?php

namespace App\Controller;

use App\Entity\PharmacyType;
use App\Form\PharmacyTypeType;
use App\Repository\PharmacyTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pharmacy/type')]
class PharmacyTypeController extends AbstractController
{
    #[Route('/', name: 'app_pharmacy_type_index', methods: ['GET'])]
    public function index(PharmacyTypeRepository $pharmacyTypeRepository): Response
    {
        return $this->render('pharmacy_type/index.html.twig', [
            'pharmacy_types' => $pharmacyTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pharmacy_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PharmacyTypeRepository $pharmacyTypeRepository): Response
    {
        $pharmacyType = new PharmacyType();
        $form = $this->createForm(PharmacyTypeType::class, $pharmacyType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pharmacyTypeRepository->add($pharmacyType, true);

            return $this->redirectToRoute('app_pharmacy_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pharmacy_type/new.html.twig', [
            'pharmacy_type' => $pharmacyType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pharmacy_type_show', methods: ['GET'])]
    public function show(PharmacyType $pharmacyType): Response
    {
        return $this->render('pharmacy_type/show.html.twig', [
            'pharmacy_type' => $pharmacyType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pharmacy_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PharmacyType $pharmacyType, PharmacyTypeRepository $pharmacyTypeRepository): Response
    {
        $form = $this->createForm(PharmacyTypeType::class, $pharmacyType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pharmacyTypeRepository->add($pharmacyType, true);

            return $this->redirectToRoute('app_pharmacy_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pharmacy_type/edit.html.twig', [
            'pharmacy_type' => $pharmacyType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pharmacy_type_delete', methods: ['POST'])]
    public function delete(Request $request, PharmacyType $pharmacyType, PharmacyTypeRepository $pharmacyTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pharmacyType->getId(), $request->request->get('_token'))) {
            $pharmacyTypeRepository->remove($pharmacyType, true);
        }

        return $this->redirectToRoute('app_pharmacy_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
