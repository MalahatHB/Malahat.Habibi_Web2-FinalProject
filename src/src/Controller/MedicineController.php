<?php

namespace App\Controller;

use App\Entity\Medicine;
use App\Form\MedicineType;
use App\Medicine\SearchService;
use App\Repository\MedicineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/medicine')]
class MedicineController extends AbstractController
{
    #[Route('/', name: 'app_medicine_index', methods: ['GET'])]
    public function index(MedicineRepository $medicineRepository): Response
    {
        return $this->render('medicine/index.html.twig', [
            'medicines' => $medicineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medicine_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MedicineRepository $medicineRepository): Response
    {
        $medicine = new Medicine();
        $form = $this->createForm(MedicineType::class, $medicine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $medicineRepository->add($medicine, true);

            return $this->redirectToRoute('app_medicine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medicine/new.html.twig', [
            'medicine' => $medicine,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{_locale}/medicine/search", name="app_medicine_search", methods={"GET"}, defaults={"_locale":"en"}, requirements={"_locale":"en|de"})
     */
    public function search(Request $request, SearchService $medicineSearchService): Response {
        $query = $request->query->get('q');

        return $this->render('medicine/index.html.twig', [
            'q'      => $query,
            'medicines' => $medicineSearchService->search($query),
        ]);
    }

    #[Route('/{id}', name: 'app_medicine_show', methods: ['GET'])]
    public function show(Medicine $medicine): Response
    {
        return $this->render('medicine/show.html.twig', [
            'medicine' => $medicine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medicine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Medicine $medicine, MedicineRepository $medicineRepository): Response
    {
        $form = $this->createForm(MedicineType::class, $medicine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $medicineRepository->add($medicine, true);

            return $this->redirectToRoute('app_medicine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medicine/edit.html.twig', [
            'medicine' => $medicine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medicine_delete', methods: ['POST'])]
    public function delete(Request $request, Medicine $medicine, MedicineRepository $medicineRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicine->getId(), $request->request->get('_token'))) {
            $medicineRepository->remove($medicine, true);
        }

        return $this->redirectToRoute('app_medicine_index', [], Response::HTTP_SEE_OTHER);
    }
}
