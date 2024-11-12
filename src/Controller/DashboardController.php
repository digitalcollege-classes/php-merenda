<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Category;
use App\Entity\Product; 
use App\Entity\Customer;
use App\Entity\Order;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class DashboardController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $categoryRepository;
    private ObjectRepository $productRepository;
    private ObjectRepository $customerRepository;
    private ObjectRepository $orderRepository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->categoryRepository = $this->entityManager->getRepository(Category::class);
        $this->productRepository = $this->entityManager->getRepository(Product::class);
        $this->customerRepository = $this->entityManager->getRepository(Customer::class);
        $this->orderRepository = $this->entityManager->getRepository(Order::class);

    }

    public function add(): void
    {
        $this->render('dashboard/add');
    }

    public function list(): void
    {
        $this->render('dashboard/list', [
            'categories' => $this->categoryRepository->count(), 
            'order' => $this->productRepository->count(),
            'customer' => $this->customerRepository->count(),
            'product' => $this->orderRepository->count(),
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
