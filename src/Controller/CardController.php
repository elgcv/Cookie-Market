<?php


namespace App\Controller;


use App\Service\Card\CardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/list", name="card_index")
     * @param CardService $cardService
     * @return Response
     */
    public function index(CardService $cardService):Response
    {

        return $this->render('card/index.html.twig', [
            'items' => $cardService->getAllCard(),
        ]);
    }

    /**
     * @Route("/list/add/{id}", name="card_add")
     * @param $id
     * @param CardService $cardService
     * @return RedirectResponse
     */
    public function add($id, CardService $cardService)
    {
        $cardService->add($id);

        return $this->redirectToRoute('card_index');

    }

    /**
     * @Route("/list/delete/{id}", name="card_delete")
     * @param $id
     * @param CardService $cardService
     * @return Response
     */
    public function delete($id,CardService $cardService):Response
    {
        $cardService->delete($id);

        return $this->redirectToRoute('card_index');

    }

}