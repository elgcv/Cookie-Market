<?php


namespace App\DataFixtures;


use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    const PRODUCTS = [
        'The "Original" Cookies' => [
            'name'    => 'The "Original" Cookies',
            'type'    => 'chocolate chips',
            'picture' => 'https://zupimages.net/up/20/31/0r6b.jpg',
            'price'   => '1,80',
            'quantity'=> '2',
        ],
        'Almond Cookies' => [
            'name'     => 'Almond Cookies',
            'type'     => 'Nuts',
            'picture'  => 'https://zupimages.net/up/20/31/39we.jpg',
            'price'    => '2,70',
            'quantity' =>'2',
        ],
        'White chocolate Cranberry Cookies' => [
            'name'     => 'White chocolate Cranberry Cookies',
            'type'     => 'Other cookies',
            'picture'  => 'https://zupimages.net/up/20/31/ni48.jpg',
            'price'    => '2,10',
            'quantity' =>'2',
        ],
        'M&M\'s Cookies' => [
            'name'    => 'M&M\'s Cookies',
            'type'    => 'chocolate chips',
            'picture' => 'https://zupimages.net/up/20/31/sqmg.jpg',
            'price'   => '2,70',
            'quantity'=>'2',
        ],
        'Coconut Cookies' => [
            'name'    => 'Coconut Cookies',
            'type'    => 'Other Cookies',
            'picture' => 'https://zupimages.net/up/20/31/ct2r.jpg',
            'price'   => '2,30',
            'quantity'=> '2',
        ],
    ];


    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::PRODUCTS as $name => $data) {
            $product = new Product();
            $product->setName($data['name']);
            $product->setType($data['type']);
            $product->setPicture($data ['picture']);
            $product->setPrice($data['price']);
            $product->setQuantity($data['quantity']);
            $manager->persist($product);
            $this->addReference('product_' .$i, $product);
            $i++;
        }
        $manager->flush();
    }
}