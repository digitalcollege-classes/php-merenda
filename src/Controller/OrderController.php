<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Order;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

// use App\Connection\Connection;
// use App\Entity\Category;
// use Doctrine\ORM\EntityManager;
// use Doctrine\Persistence\ObjectRepository;


class OrderController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;
    
    public function  __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Order::class);
    }

    public function add(): void
    {
        $this->render('order/add');
    }

    public function list(): void
    {
        $this->render('order/list', [
            'orders' => $this->repository->findAll(),
        ]);
    }

    public function edit(): void
    {
        $this->render('order/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
