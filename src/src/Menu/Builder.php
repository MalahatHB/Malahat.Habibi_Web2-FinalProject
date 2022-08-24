<?php

namespace App\Menu;

use App\Entity\Hotel;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class Builder {

    private $factory;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private EntityManagerInterface $entityManager;

    private TokenStorageInterface $tokenStorage;

    public function __construct(
        FactoryInterface $factory,
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage
    ) {
        $this->factory = $factory;
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
    }

    public function mainMenu(RequestStack $requestStack): ItemInterface {
        $menu = $this->factory->createItem('root');
        $token = $this->tokenStorage->getToken();
        /**@var User $user */
        $user = $token == null ? null : $this->tokenStorage->getToken()->getUser();

        $menu->addChild('Home', ['route' => 'app_home']);
        $menu->addChild('Contact us', ['route' => 'app_message_new']);
        if(!is_null($user) && in_array("ROLE_ADMIN", $user->getRoles())) {
            $menu->addChild('DrugWarehouse', ['route' => 'app_drug_warehouse_index']);
            $menu->addChild('Pharmacy', ['route' => 'app_pharmacy_index']);
            $menu->addChild('Inventory', ['route' => 'app_inventory_index']);
            $menu->addChild('Medicine', ['route' => 'app_medicine_index']);
            $menu->addChild('Medicine Type', ['route' => 'app_medicine_type_index']);
            $menu->addChild('Logout', ['route' => 'app_logout']);
        } else if(!is_null($user) && in_array("ROLE_WAREHOUSE_KEEPER", $user->getRoles())) {
            $menu->addChild('Inventory', ['route' => 'app_inventory_index']);
            $menu->addChild('Medicine', ['route' => 'app_medicine_index']);
            $menu->addChild('Medicine Type', ['route' => 'app_medicine_type_index']);
            $menu->addChild('Logout', ['route' => 'app_logout']);
        } else if (!is_null($user) && in_array("ROLE_PHARMACY_MANAGER", $user->getRoles())){
            $menu->addChild('Inventory', ['route' => 'app_inventory_index']);
            $menu->addChild('Logout', ['route' => 'app_logout']);
        } else {
            $menu->addChild('Login', ['route' => 'login']);
            $menu->addChild('Register', ['route' => 'app_register']);
        }

//        $menu->addChild('Hotels', ['route' => 'app_hotel_index']);


//        /** @var Hotel[] $hotels */
//        $hotels = $this->entityManager->getRepository(Hotel::class)->findAll();
//
//        foreach ($hotels as $hotel) {
//            $menu['Hotels']->addChild($hotel->getName(), [
//                'route'           => 'app_hotel_show',
//                'routeParameters' => ['id' => $hotel->getId()],
//            ]);
//        }

        return $menu;
    }
}