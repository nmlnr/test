<?php

namespace App\Service;

use App\DBAL\Types\EnumPromotionType;
use App\Entity\Order;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class PromotionService
 * @package App\Service
 */
class PromotionService
{
    /** @var EntityManagerInterface $em */
    private $em;

    /**
     * PromotionService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Reduction in percent !
     * @param Order $order
     * @param float $totalAMountNoVat
     * @param int $countProducts
     * @return float|int
     */
    public function getReductionToApply(Order $order, float $totalAMountNoVat, int $countProducts)
    {
        $reduction = 0;

        if (!$listActivePromotions = $this->em->getRepository(Promotion::class)->getActivePromotions()) {
            return $reduction;
        }

        foreach ($listActivePromotions as $promotion) {
            $reduction += $this->calculateReduction($promotion, $totalAMountNoVat, $countProducts);
        }

        return $reduction;
    }

    /**
     * @param int $countProducts
     * @param string $totalAMountNoVat
     * @param Promotion $promotion
     * @return float|int
     */
    public function calculateReduction(Promotion $promotion, string $totalAMountNoVat, int $countProducts)
    {
        switch ($promotion->getType()) {
            case EnumPromotionType::AMOUNT :
                if ($totalAMountNoVat >= $promotion->getAmount()) {
                    return $totalAMountNoVat * $promotion->getReduction() / 100;
                }
                break;
            case EnumPromotionType::PRODUCTS :
                if ($countProducts >= $promotion->getNbProducts()) {
                    return $totalAMountNoVat * $promotion->getReduction() / 100;
                }
                break;
            case EnumPromotionType::USES:
                if ($this->em->getRepository(Promotion::class)->countUsesPromotion($promotion) < $promotion->getNbUses()) {
                    return $totalAMountNoVat * $promotion->getReduction() / 100;
                }
                break;
            default:
                return 0;
        }
    }
}