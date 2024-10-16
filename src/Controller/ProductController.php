<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class ProductController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Product::class);
    }
    public function add(): void
    {
        $this->render('product/add');
    }

    public function list(): void
    {
        $this->render('product/list', [
            'products' => $this->repository->findAll(),
        ]);
    }

    public function edit(): void
    {
        $this->render('product/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
