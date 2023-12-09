<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $numberCard = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $expireDate = null;

    #[ORM\Column]
    private ?int $crypto = null;

    #[ORM\Column(length: 16)]
    private ?string $cp = null;

    #[ORM\ManyToOne(inversedBy: 'card', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberCard(): ?string
    {
        return $this->numberCard;
    }

    public function setNumberCard(string $numberCard): static
    {
        $this->numberCard = $numberCard;

        return $this;
    }

    public function getExpireDate(): ?\DateTimeInterface
    {
        return $this->expireDate;
    }

    public function setExpireDate(?\DateTimeInterface $expireDate): static
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    public function getCrypto(): ?int
    {
        return $this->crypto;
    }

    public function setCrypto(int $crypto): static
    {
        $this->crypto = $crypto;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $relation): static
    {
        $this->user = $relation;
        return $this;
    }
}
