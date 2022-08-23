<?php

namespace App\Controller\Admin;

use App\Entity\City;
use App\Entity\DrugWarehouse;
use App\Entity\Inventory;
use App\Entity\Medicine;
use App\Entity\MedicineType;
use App\Entity\Message;
use App\Entity\Pharmacy;
use App\Entity\PharmacyType;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Drug distribution');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::section('Menu'),
            MenuItem::linkToCrud('City', 'fa-solid fa-city', City::class),
            MenuItem::linkToCrud('Drug Warehouse', 'fa-solid fa-warehouse', DrugWarehouse::class),
            MenuItem::linkToCrud('Inventory', 'fa-solid fa-box', Inventory::class),
            MenuItem::linkToCrud('Medicine', 'fa-solid fa-capsules', Medicine::class),
            MenuItem::linkToCrud('Medicine Type', 'fa-solid fa-pills', MedicineType::class),
            MenuItem::linkToCrud('Pharmacy', 'fa-solid fa-house-medical', Pharmacy::class),
            MenuItem::linkToCrud('Pharmacy Type', 'fa-solid fa-hospital', PharmacyType::class),
            MenuItem::linkToCrud('Message', 'fa-solid fa-message', Message::class),
            MenuItem::linkToCrud('User', 'fa-solid fa-user', User::class),
        ];
    }
}
