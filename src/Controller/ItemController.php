<?php

namespace App\Controller;

use App\Entity\Item;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainController
 * @package App\Controller
 *
 * @Route("/item", name="item_")
 */
class ItemController extends AbstractController
{
    /**
     * @Route("/ajax/delete/{id}", name="ajax_delete", requirements={"id"="\d+"}, methods={"POST"})
     * @param Item $item
     * @return Response
     */
    public function ajaxDelete(Item $item): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($item);
        $em->flush();

        return $this->json(['success' => true]);
    }
}
