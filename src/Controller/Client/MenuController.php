<?php

declare(strict_types=1);

namespace App\Controller\Client;

use App\Connection\Connection;
use App\Entity\Product;

class MenuController extends AbstractClientController
{
    public function index(): void
    {
        //acesso ao banco de dados
        $entityManager = Connection::getEntityManager();

        // SELECT * FROM Products
        $products = $entityManager->getRepository(Product::class)->findAll();

        $this->render('_client/menu/index', [
            'products' => $products,
        ]);
    }
}