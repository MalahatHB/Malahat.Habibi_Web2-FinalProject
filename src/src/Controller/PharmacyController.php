<?php

namespace App\Controller;

use App\Entity\Pharmacy;
use App\Form\PharmacyType;
use App\Repository\PharmacyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pharmacy')]
class PharmacyController extends AbstractController
{
    #[Route('/', name: 'app_pharmacy_index', methods: ['GET'])]
    public function index(PharmacyRepository $pharmacyRepository): Response
    {
        return $this->render('pharmacy/index.html.twig', [
            'pharmacies' => $pharmacyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pharmacy_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PharmacyRepository $pharmacyRepository): Response
    {
        $pharmacy = new Pharmacy();
        $form = $this->createForm(PharmacyType::class, $pharmacy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pharmacyRepository->add($pharmacy, true);

            return $this->redirectToRoute('app_pharmacy_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pharmacy/new.html.twig', [
            'pharmacy' => $pharmacy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pharmacy_show', methods: ['GET'])]
    public function show(Pharmacy $pharmacy): Response
    {
        return $this->render('pharmacy/show.html.twig', [
            'pharmacy' => $pharmacy,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pharmacy_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pharmacy $pharmacy, PharmacyRepository $pharmacyRepository): Response
    {
        $form = $this->createForm(PharmacyType::class, $pharmacy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pharmacyRepository->add($pharmacy, true);

            return $this->redirectToRoute('app_pharmacy_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pharmacy/edit.html.twig', [
            'pharmacy' => $pharmacy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pharmacy_delete', methods: ['POST'])]
    public function delete(Request $request, Pharmacy $pharmacy, PharmacyRepository $pharmacyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pharmacy->getId(), $request->request->get('_token'))) {
            $pharmacyRepository->remove($pharmacy, true);
        }

        return $this->redirectToRoute('app_pharmacy_index', [], Response::HTTP_SEE_OTHER);
    }
}
