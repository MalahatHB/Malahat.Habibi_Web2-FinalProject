<?php

namespace App\Controller;

use App\Entity\DrugWarehouse;
use App\Entity\Inventory;
use App\Entity\Pharmacy;
use App\Entity\User;
use App\Form\InventoryType;
use App\Repository\DrugWarehouseRepository;
use App\Repository\InventoryRepository;
use App\Repository\PharmacyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/inventory')]
class InventoryController extends AbstractController
{
    #[Route('/', name: 'app_inventory_index', methods: ['GET'])]
    public function index(InventoryRepository $inventoryRepository): Response
    {
        return $this->render('inventory/index.html.twig', [
            'inventories' => $inventoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_inventory_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InventoryRepository $inventoryRepository, DrugWarehouseRepository $drugWarehouseRepository, PharmacyRepository $pharmacyRepository): Response
    {
        $inventory = new Inventory();
        $form = $this->createForm(InventoryType::class, $inventory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//        /** @var User $user */
//        if(in_array('ROLE_PHARMACY_MANAGER', $user->getRoles())){
//            /** @var Pharmacy $pharmacy */
//            $pharmacy = $pharmacyRepository->findBy(['createdUser' => $user]);
//            $pharmacy->addInventory($inventory);
//            $entityManager->persist($pharmacy);
//        } elseif (in_array('ROLE_WAREHOUSE_KEEPER', $user->getRoles())){
//            /** @var DrugWarehouse $drugWarehouse */
//            $drugWarehouse = $drugWarehouseRepository->findBy(['createdUser' => $user]);
//            $drugWarehouse->addInventory($inventory);
//            $entityManager->persist($drugWarehouse);
//        }
//        $entityManager->flush();

            $inventoryRepository->add($inventory, true);

            return $this->redirectToRoute('app_inventory_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('inventory/new.html.twig', [
            'inventory' => $inventory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_inventory_show', methods: ['GET'])]
    public function show(Inventory $inventory): Response
    {
        return $this->render('inventory/show.html.twig', [
            'inventory' => $inventory,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_inventory_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Inventory $inventory, InventoryRepository $inventoryRepository): Response
    {
        $form = $this->createForm(InventoryType::class, $inventory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $inventoryRepository->add($inventory, true);

            return $this->redirectToRoute('app_inventory_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('inventory/edit.html.twig', [
            'inventory' => $inventory,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_inventory_delete', methods: ['POST'])]
    public function delete(Request $request, Inventory $inventory, InventoryRepository $inventoryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$inventory->getId(), $request->request->get('_token'))) {
            $inventoryRepository->remove($inventory, true);
        }

        return $this->redirectToRoute('app_inventory_index', [], Response::HTTP_SEE_OTHER);
    }
}
