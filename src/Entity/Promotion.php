<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Promotion
 * @package App\Entity
 *
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
     * @ORM\Column(type="float")
     */
    private $minAmount;

    /**
     * @ORM\Column(type="float")
     */
    private $reduction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $freeDelivery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinAmount(): ?float
    {
        return $this->minAmount;
    }

    public function setMinAmount(float $minAmount): self
    {
        $this->minAmount = $minAmount;

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction(float $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getFreeDelivery(): ?bool
    {
        return $this->freeDelivery;
    }

    public function setFreeDelivery(bool $freeDelivery): self
    {
        $this->freeDelivery = $freeDelivery;

        return $this;
    }
}
