<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Item;
use App\Entity\Order;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

/**
 * Class OrderTest
 * @package App\Tests\Unit\Entity
 */
class OrderTest extends TestCase
{
    public function testOrderNotEmpty(): void
    {
        $product = new Order();
        $productTest = new Product();
        $itemTest = new Item();
        $product->addItem($itemTest);

        self::assertNotEmpty($product->getItems());
    }
}
