<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MarketController extends AbstractController
{
    /**
     * @Route("/", name="market_index")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
}