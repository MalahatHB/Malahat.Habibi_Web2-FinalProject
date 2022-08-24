<?php

namespace App\Medicine;

use App\Entity\Medicine;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class SearchService {

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {

        $this->entityManager = $entityManager;
    }

    /**
     * @param $medicineNameQuery
     *
     * @return Medicine[]
     */
    public function search($medicineNameQuery): array {

        /** @var \App\Repository\MedicineRepository $medicineRepository */
        $medicineRepository = $this->entityManager->getRepository(Medicine::class);
        return $medicineRepository->searchByName($medicineNameQuery);
    }
}