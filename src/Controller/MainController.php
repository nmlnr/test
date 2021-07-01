<?php

namespace App\Controller;

use App\Entity\Order;
use App\Service\OrderSummaryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainController
 * @package App\Controller
 */
class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(OrderSummaryService $orderSummary): Response
    {
        $em = $this->getDoctrine()->getManager();

        if (!$testOrder = $em->getRepository(Order::class)->findOneBy(['reference' => 'TEST-ORDER'])) {
            throw new NotFoundHttpException("La commande de test n'a pas été générée en ligne de commandes");
        }

        return $this->render('front/shopping_cart.html.twig', [
            'testOrder' => $testOrder,
            'orderSummaryData' => $orderSummary->getSummaryData($testOrder)
        ]);
    }
}
