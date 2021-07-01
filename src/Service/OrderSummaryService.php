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
    /**
     * Return cart data to display
     * @param Order $order
     * @param VatService $vat
     * @param DeliveryFeesService $deliveryFees
     * @return array
     */
    public function getSummaryData(Order $order, VatService $vat, DeliveryFeesService $deliveryFees): array
    {
        $result = [
            'subTotalNoVat' => 0,
            'promotion' => 0,
            'deliveryFees' => 0,
            'totalWithoutVat' => 0,
            'vat' => 0,
            'totalWithVat' => 0,
        ];

        foreach($order->getItems() as $item) {
            /** @var Item $item */
            $subTotalCurrentItem = $item->getProduct()->getPrice() * $item->getQuantity();

            $result['subTotalNoVat'] += $subTotalCurrentItem;
            $result['vat'] += $subTotalCurrentItem * $vat->getVatForProduct($item->getProduct()) / 100;
        }

        $result['promotion'] = 0;
        $result['deliveryFees'] = $deliveryFees->getDeliveryFeesForOrder($order);
        $result['totalWithoutVat'] = $result['subTotalNoVat'] + $result['promotion'] + $result['deliveryFees'];
        $result['totalWithVat'] = $result['subTotalNoVat'] + $result['vat'];

        return $result;
    }
}