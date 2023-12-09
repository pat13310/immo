<?php

namespace App\Entity;

use App\Repository\ExtraRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtraRepository::class)]
class Extra
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $gift_code = null;

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $coupon_code = null;

    #[ORM\OneToOne(inversedBy: 'extra', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGiftCode(): ?string
    {
        return $this->gift_code;
    }

    public function setGiftCode(?string $gift_code): static
    {
        $this->gift_code = $gift_code;
        return $this;
    }

    public function getCouponCode(): ?string
    {
        return $this->coupon_code;
    }

    public function setCouponCode(?string $coupon_code): static
    {
        $this->coupon_code = $coupon_code;
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
