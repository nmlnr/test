<?php

namespace App\Service;

use App\Entity\Item;
use App\Entity\Order;

/**
 * Class VatService
 * @package App\Service
 */
class VatService
{
    /**
     * Return cart data to display
     * @param Order $order
     * @return array
     */
    public function getSummaryData(Order $order): array
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
            $result['vat'] += $subTotalCurrentItem * $item->getProduct()->getBrand()->getVat() / 100;
        }

        $result['totalWithVat'] = $result['subTotalNoVat'] + $result['vat'];

        return $result;
    }
}