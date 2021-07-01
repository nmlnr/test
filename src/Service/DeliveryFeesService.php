<?php

namespace App\Service;

use App\Entity\Order;

/**
 * Class DeliveryFeesService
 * @package App\Service
 */
class DeliveryFeesService
{
    /**
     * @param Order $order
     * @return float|int
     */
    public function getDeliveryFeesForOrder(Order $order)
    {
        $countProductsByBrand = [];
        $feesForOrder = 0;

        foreach ($order->getItems() as $item) {

            if (!isset($countProductsByBrand[$item->getProduct()->getBrand()->getName()])) {
                $countProductsByBrand[$item->getProduct()->getBrand()->getName()] = 0;
            }
            $countProductsByBrand[$item->getProduct()->getBrand()->getName()] += $item->getQuantity();
        }

        foreach ($countProductsByBrand as $brandName => $countProducts) {
            $feesForOrder += $this->calculateFees($brandName, $countProducts);
        }

        return $feesForOrder;
    }

    /**
     * @param string $brandName
     * @param int $countProducts
     * @return float|int
     */
    public function calculateFees(string $brandName, int $countProducts)
    {
        switch (strtolower($brandName)) {
            case 'farmitoo':
                $quotient = intdiv($countProducts, 3);
                $rest = $countProducts % 3;
                return $quotient * 20 + ($rest ? $rest * 20 : 0);
            case 'gallagher':
                return 15;
            default:
                return 0;
        }
    }
}