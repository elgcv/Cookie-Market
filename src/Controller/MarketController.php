<?php


namespace App\Controller;


use App\Form\ProductType;
use App\Form\ProgramSearchType;
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
     * @return Response
     */
    public function index(ProductRepository $productRepository, Request $request): Response
    {
        $product = $productRepository->findAll();

        if (!$product) {
            throw $this->createNotFoundException(
                'No cookies found.'
            );
        };
        $form = $this->createForm(ProductType::class, null, [
                'method' => Request::METHOD_GET
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $product = $productRepository
                ->findAll();
        }

        return $this->render('index.html.twig',[
            'product' => $product
            ]);
    }
}