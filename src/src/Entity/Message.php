<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Model\TimeLoggerInterface;
use App\Model\UserLoggerInterface;
use App\Model\TimeLoggerTrait;
use App\Model\UserLoggerTrait;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message implements TimeLoggerInterface, UserLoggerInterface
{
    use UserLoggerTrait;
    use TimeLoggerTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:3)]
    private ?string $message = null;

    #[ORM\Column(length: 255)]
    private ?string $sender = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;

        return $this;
    }
}
