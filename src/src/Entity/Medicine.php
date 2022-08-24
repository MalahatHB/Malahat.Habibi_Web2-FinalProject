<?php

namespace App\Entity;

use App\Repository\MedicineRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Model\TimeLoggerInterface;
use App\Model\UserLoggerInterface;
use App\Model\TimeLoggerTrait;
use App\Model\UserLoggerTrait;

#[ORM\Entity(repositoryClass: MedicineRepository::class)]
class Medicine implements TimeLoggerInterface, UserLoggerInterface
{
    use UserLoggerTrait;
    use TimeLoggerTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:3)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min:3)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(min:3)]
    private ?string $fullDescription = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Length(min:3)]
    private ?int $price = null;

    #[ORM\ManyToOne]
    private ?MedicineType $type = null;

    public function __toString()
    {
        return "{$this->name} ( {$this->type} )";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getType(): ?MedicineType
    {
        return $this->type;
    }

    public function setType(?MedicineType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
