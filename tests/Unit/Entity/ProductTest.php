<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductTest
 * @package App\Tests\Unit\Entity
 */
class ProductTest extends TestCase
{
    public function testGetTitle(): void
    {
        $product = new Product();
        $product->setTitle('Cuve à gasoil');

        self::assertSame('Cuve à gasoil', $product->getTitle());
    }
}
