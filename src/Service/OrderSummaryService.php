<?php

namespace App\Service;

use App\Entity\Item;
use App\Entity\Order;

/**
 * Class OrderSummary
 * @package App\Service
 */
class OrderSummaryService
{
    /** @var VatService $vat */
    private $vat;

    /** @var DeliveryFeesService $deliveryFees */
    private $deliveryFees;

    /** @var PromotionService $promotion */
    private $promotion;

    /**
     * OrderSummaryService constructor.
     * @param VatService $vat
     * @param DeliveryFeesService $deliveryFees
     */
    public function __construct(VatService $vat, DeliveryFeesService $deliveryFees, PromotionService $promotion)
    {
        $this->vat = $vat;
        $this->deliveryFees = $deliveryFees;
        $this->promotion = $promotion;
    }

    /**
     * Return cart data to display
     * @param Order $order
     * @return array
     */
    public function getSummaryData(Order $order): array
    {
        $result = [
            'subTotalNoVat' => 0,
            'reduction' => 0,
            'deliveryFees' => 0,
            'totalWithoutVat' => 0,
            'vat' => 0,
            'totalWithVat' => 0,
            'countProducts' => 0,
        ];

        foreach($order->getItems() as $item) {
            /** @var Item $item */
            $subTotalCurrentItem = $item->getProduct()->getPrice() * $item->getQuantity();
            $result['countProducts'] += $item->getQuantity();

            $result['subTotalNoVat'] += $subTotalCurrentItem;
            $result['vat'] += $subTotalCurrentItem * $this->vat->getVatForProduct($item->getProduct()) / 100;
        }

        $result['reduction'] = $this->promotion->getReductionToApply($order, $result['subTotalNoVat'], $result['countProducts']);
        $result['deliveryFees'] = $this->deliveryFees->getDeliveryFeesForOrder($order);
        $result['totalWithoutVat'] = $result['subTotalNoVat'] - $result['reduction'] + $result['deliveryFees'];
        $result['totalWithVat'] = $result['totalWithoutVat'] + $result['vat'];

        return $result;
    }
}