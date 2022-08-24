<?php

namespace App\Controller;

use App\Entity\MedicineType;
use App\Form\MedicineTypeType;
use App\Repository\MedicineTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/medicine-type')]
class MedicineTypeController extends AbstractController
{
    #[Route('/', name: 'app_medicine_type_index', methods: ['GET'])]
    public function index(MedicineTypeRepository $medicineTypeRepository): Response
    {
        return $this->render('medicine_type/index.html.twig', [
            'medicine_types' => $medicineTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medicine_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MedicineTypeRepository $medicineTypeRepository): Response
    {
        $medicineType = new MedicineType();
        $form = $this->createForm(MedicineTypeType::class, $medicineType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $medicineTypeRepository->add($medicineType, true);

            return $this->redirectToRoute('app_medicine_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medicine_type/new.html.twig', [
            'medicine_type' => $medicineType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medicine_type_show', methods: ['GET'])]
    public function show(MedicineType $medicineType): Response
    {
        return $this->render('medicine_type/show.html.twig', [
            'medicine_type' => $medicineType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medicine_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MedicineType $medicineType, MedicineTypeRepository $medicineTypeRepository): Response
    {
        $form = $this->createForm(MedicineTypeType::class, $medicineType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $medicineTypeRepository->add($medicineType, true);

            return $this->redirectToRoute('app_medicine_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medicine_type/edit.html.twig', [
            'medicine_type' => $medicineType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medicine_type_delete', methods: ['POST'])]
    public function delete(Request $request, MedicineType $medicineType, MedicineTypeRepository $medicineTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicineType->getId(), $request->request->get('_token'))) {
            $medicineTypeRepository->remove($medicineType, true);
        }

        return $this->redirectToRoute('app_medicine_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
