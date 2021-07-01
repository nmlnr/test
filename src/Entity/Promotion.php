<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $amount;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $reduction;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isDeliveryFree;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbUses;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbProducts;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $startDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\Column(type="EnumPromotionType")
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction(?float $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getIsDeliveryFree(): ?bool
    {
        return $this->isDeliveryFree;
    }

    public function setIsDeliveryFree(?bool $isDeliveryFree): self
    {
        $this->isDeliveryFree = $isDeliveryFree;

        return $this;
    }

    public function getNbUses(): ?int
    {
        return $this->nbUses;
    }

    public function setNbUses(?int $nbUses): self
    {
        $this->nbUses = $nbUses;

        return $this;
    }

    public function getNbProducts(): ?int
    {
        return $this->nbProducts;
    }

    public function setNbProducts(?int $nbProducts): self
    {
        $this->nbProducts = $nbProducts;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }
}
