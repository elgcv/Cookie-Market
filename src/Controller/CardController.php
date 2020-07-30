<?php


namespace App\Controller;


use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/list", name="card_index")
     * @param SessionInterface $session
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function index(SessionInterface $session, ProductRepository $productRepository):Response
    {
        $list = $session->get('list',[]);

        $listWithData = [];
        foreach ($list as $id => $quantity){
            $listWithData[] = [
               'product'=> $productRepository->find($id),
               'quantity'=> $quantity,
            ];
        }


        return $this->render('card/index.html.twig', [
            'items' => $listWithData,
        ]);
    }

    /**
     * @Route("/list/add/{id}", name="card_add")
     * @param $id
     * @param SessionInterface $session
     */
    public function add($id, SessionInterface $session)
    {

        $list = $session->get('list', []);

        if(!empty($list[$id])) {
            $list[$id]++;
        }else {
            $list[$id] = 1;
        }

        $session->set('list', $list);

        return $this->redirectToRoute('card_index');

    }

    /**
     * @Route("/list/delete/{id}", name="card_delete")
     * @param $id
     * @param SessionInterface $session
     * @return Response
     */
    public function delete($id, SessionInterface $session):Response
    {   $list = $session->get('list', []);

        if (!empty($list[$id])){
            unset($list[$id]);
        }
        $session->set('list', $list);

        return $this->redirectToRoute('card_index');

    }

}