<?php

namespace App\Service;

/**
 * Class OrderSummary
 * @package App\Service
 */
class OrderSummary
{
    /**
     * @return array
     */
    public function getSUmmaryData()
    {
        $result = [
            'subTotalNoVat' => 0,
            'promotion' => 0,
            'deliveryFees' => 0,
            'totalWithoutVat' => 0,
            'vat' => '0',
            'totalWithVat' => 0,
        ];

        return $result;
    }
}