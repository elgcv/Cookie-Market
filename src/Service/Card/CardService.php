<?php


namespace App\Service\Card;


use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardService
{
    protected $session;
    protected $productRepository;

    public function __construct(SessionInterface $session, ProductRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    public function add(int $id)
    {
        $list = $this->session->get('list', []);

        if(!empty($list[$id])) {
            $list[$id]++;
        }else {
            $list[$id] = 1;
        }

       $this->session->set('list', $list);
    }

    public  function delete(int $id)
    {
        $list = $this->session->get('list', []);

        if (!empty($list[$id])){
            unset($list[$id]);
        }
        $this->session->set('list', $list);
    }


    public function getAllCard() : array
    {
        $list = $this->session->get('list',[]);

        $listWithData = [];
        foreach ($list as $id => $quantity){
            $listWithData[] = [
                'product'=> $this->productRepository->find($id),
                'quantity'=> $quantity,
            ];
        }
        return $listWithData;

    }


}