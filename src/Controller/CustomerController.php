<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;


class CustomerController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = (new Connection())->getEntityManager();

        $this->repository = $this->entityManager->getRepository(Customer::class);
    }

    public function add(): void
    {
        if (true === empty($_POST)) {
            $this->render('customer/add');
            return;
        }

        if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email'])) {
            echo "Por favor, preencha todos os campos obrigatórios.";
            return;
        }

        $customer = new Customer($_POST['name'], $_POST['phone']);
        $customer->setEmail($_POST['email']);
        $customer->setPhoto($_POST['photo']); // Define o caminho da foto

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        header('location: /clientes/listar');
    }

    public function list(): void
    {
        $customers = $this->entityManager->getRepository(Customer::class)->findAll();

        $this->render('customer/list', [
            'customers' => $customers
        ]);
    }

    public function edit(): void
    {
        $repository = $this->entityManager->getRepository(Customer::class);

        $customer = $repository->find($_GET['id']);

        if (!empty($_POST)) {
            $customer->setName($_POST['name']);
            $customer->setEmail($_POST['email']);
            $customer->setPhone($_POST['phone']);
            $customer->setPhoto($_POST['photo']);
            $status = $_POST['status'] === '1' ? true : false;
            $customer->setStatus($status);

            $this->entityManager->flush();

            header('location: /clientes/listar');
            return;
        }

        $this->render('customer/edit', [
            'customer' => $customer
        ]);
    }

    public function remove(): void
    {
        $customers = $this->repository->find($_GET['id']);

        $this->entityManager->remove($customers);
        $this->entityManager->flush();

        header('location: /clientes/listar');
    }
}
