<?php

namespace App\Controller;

use App\Entity\DrugWarehouse;
use App\Repository\DrugWarehouseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(DrugWarehouseRepository $drugWarehouseRepository): Response
    {
        $drugWarehouseList = $drugWarehouseRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'drugWarehouseList' => $drugWarehouseList,
        ]);
    }

    #[Route('/drug-shop/{id}', name: 'app_drug_shop')]
    public function shopIndex(DrugWarehouse $drugWarehouse): Response
    {
        $inventories = $drugWarehouse->getInventory();

        return $this->render('home/drugWareHouseShop.html.twig', [
            'drugWarehouse' => $drugWarehouse,
            'inventories' => $inventories,
        ]);
    }
}
