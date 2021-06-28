<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    public function index(): Response
    {
        $product1 = new Product('Cuve à gasoil', 250000, 'Farmitoo');
        $product2 = new Product('Nettoyant pour cuve', 5000, 'Farmitoo');
        $product3 = new Product('Piquet de clôture', 1000, 'Gallagher');

        $promotion1 = new Promotion(50000, 8, false);

        // Je passe une commande avec
        // Cuve à gasoil x1
        // Nettoyant pour cuve x3
        // Piquet de clôture x5

        return $this->render('front/shopping_cart.html.twig', [
        ]);

//        return new Response();
    }
}
