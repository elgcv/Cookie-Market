<?php


namespace App\Controller;


use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MarketController extends AbstractController
{
    /**
     * @Route("/", name="market_index")
     * @param ProductRepository $productRepository
     * @param Request $request
     * @return Response
     */
    public function index(ProductRepository $productRepository, Request $request): Response
    {
        $product = $productRepository->findAll();


        return $this->render('index.html.twig',[
            'product' => $product
            ]);
    }
}