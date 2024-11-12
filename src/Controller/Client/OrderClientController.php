<?php

declare(strict_types=1);

namespace App\Controller\Client;

use App\Entity\Order;
use App\Connection\Connection;
use Doctrine\ORM\EntityManager;

class OrderClientController extends AbstractClientController
{
    private EntityManager $entityManager;

    public function __construct() 
    {
        $this->entityManager = Connection::getEntityManager();
    }

    public function create(): void
    {
        //receber os dados via http request
        $dados = json_decode(
            file_get_contents('php://input')
        );

        //salvar os dados no banco
        $order = new Order();
        $order->setType($dados->type);
        $order->setItems($dados->items);
        $order->setCreatedAt(new \DateTime());
        $order->setUpdateAt(new \DateTime());
        $order->setStatus('Aguardando Pedido');
        $order->setCustomer($_SESSION['user_logged']['name']);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        //retornar uma response pro http client
        header('Content-Type: application/json');

        echo json_encode([
            'id' => $order->getId(),
            'createdAt' => $order->getCreatedAt(),
        ]);
    }
}
