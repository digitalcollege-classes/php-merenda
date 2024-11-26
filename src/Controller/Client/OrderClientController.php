<?php

declare(strict_types=1);

namespace App\Controller\Client;

use App\Entity\Order;
use App\Connection\Connection;
use Doctrine\ORM\EntityManager;
use App\Enum\OrderTypeEnum;

class OrderClientController extends AbstractClientController
{
    private EntityManager $entityManager;

    public function __construct() 
    {
        //retornar uma response pro http client
        header('Content-Type: application/json');

        $this->entityManager = Connection::getEntityManager();
    }

    public function list(): void
    {
        $repository = $this->entityManager->getRepository(Order::class);
        $customer = $_SESSION['user_logged']['name'];

        $data = $repository->findBy([
            'customer' => $customer,
        ]);

        $data = array_map(
            fn ($item) => $item->getPublicInfo(), 
            $data
        );

        echo json_encode($data);
    }

    public function create(): void
    {
        //receber os dados via http request
        $dados = json_decode(
            file_get_contents('php://input')
        );

        $type = OrderTypeEnum::fromName($dados->type);

        //salvar os dados no banco
        $order = new Order();
        $order->setType($type->value);
        $order->setItems($dados->items);
        $order->setCreatedAt(new \DateTime());
        $order->setUpdateAt(new \DateTime());
        $order->setStatus('Aguardando Pedido');
        $order->setCustomer($_SESSION['user_logged']['name']);

        $total = 0;
        foreach ($dados->items as $item) {
            $total += (float) $item->price;
        }

        

        $order->setPrice($total);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        echo json_encode([
            'id' => $order->getId(),
            'createdAt' => $order->getCreatedAt(),
        ]);
    }
}
