<?php

namespace App\Service;

use App\Entity\Product;

/**
 * Class VatService
 * @package App\Service
 */
class VatService
{
    /**
     * Get vat for product, default is the brand vat
     * @param Product $product
     * @param string $country
     * @return float|int|null
     */
    public function getVatForProduct(Product $product, string $country = '')
    {
        switch ($country) {
            case 'be' :
            case 'es' :
            case 'nl' :
                return 21;
            case 'fr' :
                return 20;
            case 'de' :
                return 19;
            case 'gr' :
            case 'pt':
                return 23;
            case 'it' :
                return 22;
            default:
                return $product->getBrand()->getVat();
        }
    }
}