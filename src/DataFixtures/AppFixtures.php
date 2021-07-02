<?php

namespace App\DataFixtures;

use App\DBAL\Types\EnumPromotionType;
use App\Entity\Brand;
use App\Entity\Item;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        // brands
        $brand1 = new Brand();
        $brand1->setName('Farmitoo');
        $brand1->setVat(20);

        $brand2 = new Brand();
        $brand2->setName('Gallagher');
        $brand2->setVat(5);

        $manager->persist($brand1);
        $manager->persist($brand2);

        // products
        $product1 = new Product();
        $product1->setTitle('Cuve à gasoil');
        $product1->setPrice(250000);
        $product1->setBrand($brand1);

        $product2 = new Product();
        $product2->setTitle('Nettoyant pour cuve');
        $product2->setPrice(5000);
        $product2->setBrand($brand1);

        $product3 = new Product();
        $product3->setTitle('Piquet de clôture');
        $product3->setPrice(1000);
        $product3->setBrand($brand2);

        $manager->persist($product1);
        $manager->persist($product2);
        $manager->persist($product3);

        // orders
        $order1 = new Order();
        $order1->setReference('TEST-ORDER');

        // items
        $item1 = new Item();
        $item1->setItemOrder($order1);
        $item1->setProduct($product1);
        $item1->setQuantity(1);

        $item2 = new Item();
        $item2->setItemOrder($order1);
        $item2->setProduct($product2);
        $item2->setQuantity(3);

        $item3 = new Item();
        $item3->setItemOrder($order1);
        $item3->setProduct($product3);
        $item3->setQuantity(5);

        $manager->persist($item1);
        $manager->persist($item2);
        $manager->persist($item3);

        // promotion
        $promotion1 = new Promotion();
        $promotion1->setAmount(50000);
        $promotion1->setReduction(8);
        $promotion1->setIsDeliveryFree(false);
        $promotion1->setType(EnumPromotionType::AMOUNT);

        $manager->persist($promotion1);

        // Save
        $manager->flush();
    }
}
