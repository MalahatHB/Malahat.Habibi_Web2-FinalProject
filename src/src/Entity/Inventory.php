<?php

namespace App\Entity;

use App\Repository\InventoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Model\TimeLoggerInterface;
use App\Model\UserLoggerInterface;
use App\Model\TimeLoggerTrait;
use App\Model\UserLoggerTrait;

#[ORM\Entity(repositoryClass: InventoryRepository::class)]
class Inventory implements TimeLoggerInterface, UserLoggerInterface
{
    use UserLoggerTrait;
    use TimeLoggerTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Medicine $medicine = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    private ?int $total = null;

    #[ORM\ManyToOne(inversedBy: 'inventory')]
    private ?Pharmacy $pharmacy = null;

    #[ORM\ManyToOne(inversedBy: 'inventory')]
    private ?DrugWarehouse $drugWarehouse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicine(): ?Medicine
    {
        return $this->medicine;
    }

    public function setMedicine(?Medicine $medicine): self
    {
        $this->medicine = $medicine;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getPharmacy(): ?Pharmacy
    {
        return $this->pharmacy;
    }

    public function setPharmacy(?Pharmacy $pharmacy): self
    {
        $this->pharmacy = $pharmacy;

        return $this;
    }

    public function getDrugWarehouse(): ?DrugWarehouse
    {
        return $this->drugWarehouse;
    }

    public function setDrugWarehouse(?DrugWarehouse $drugWarehouse): self
    {
        $this->drugWarehouse = $drugWarehouse;

        return $this;
    }
}
