<?php

namespace App\Entity;

use App\Repository\PharmacyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Model\TimeLoggerInterface;
use App\Model\UserLoggerInterface;
use App\Model\TimeLoggerTrait;
use App\Model\UserLoggerTrait;

#[ORM\Entity(repositoryClass: PharmacyRepository::class)]
class Pharmacy implements TimeLoggerInterface, UserLoggerInterface
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

    #[ORM\Column(length: 512, nullable: true)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:3)]
    private ?string $address = null;

    #[ORM\ManyToOne]
    private ?City $city = null;

    #[ORM\ManyToOne]
    private ?PharmacyType $type = null;

    #[ORM\OneToMany(mappedBy: 'pharmacy', targetEntity: Inventory::class)]
    private Collection $inventory;

    public function __construct()
    {
        $this->inventory = new ArrayCollection();
    }

    public function __toString()
    {
        return "{$this->name} ( {$this->city} )";
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getType(): ?PharmacyType
    {
        return $this->type;
    }

    public function setType(?PharmacyType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Inventory>
     */
    public function getInventory(): Collection
    {
        return $this->inventory;
    }

    public function addInventory(Inventory $inventory): self
    {
        if (!$this->inventory->contains($inventory)) {
            $this->inventory->add($inventory);
            $inventory->setPharmacy($this);
        }

        return $this;
    }

    public function removeInventory(Inventory $inventory): self
    {
        if ($this->inventory->removeElement($inventory)) {
            // set the owning side to null (unless already changed)
            if ($inventory->getPharmacy() === $this) {
                $inventory->setPharmacy(null);
            }
        }

        return $this;
    }
}
