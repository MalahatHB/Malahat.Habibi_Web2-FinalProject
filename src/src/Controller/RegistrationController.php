<?php

namespace App\Controller;

use App\Entity\DrugWarehouse;
use App\Entity\Pharmacy;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $role = $form->get('role')->getData();
//            $name = $form->get('name')->getData();
//            $address = $form->get('address')->getData();
//            $city = $form->get('city')->getData();
//            $type = $form->get('type')->getData();

            $user->setRoles([$role]);
//            if(in_array('ROLE_PHARMACY_MANAGER', $user->getRoles())){
//                $drugWarehouse = new DrugWarehouse();
//                $drugWarehouse->setName($name);
//                $drugWarehouse->setAddress($address);
//            } elseif (in_array('ROLE_WAREHOUSE_KEEPER', $user->getRoles())){
//                $pharmacy = new Pharmacy();
//                $pharmacy->setName($name);
//                $pharmacy->setAddress($address);
//                $pharmacy->setCity($city);
//                $pharmacy->setType($type);
//            }

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
