<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;


class DashboardController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Category::class);
    }

    public function add(): void
    {
        $this->render('dashboard/add');
    }

    public function list(): void
    {

        $this->render('dashboard/list', [
            'categories' => count($this->repository->findAll()),
            'order' => count($this->repository->findAll()),
            'customer' => count($this->repository->findAll()),
            'product' => count($this->repository->findAll()),
        ]);
    }

    public function edit(): void
    {
        $this->render('dashboard/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
