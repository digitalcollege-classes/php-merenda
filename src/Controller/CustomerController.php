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
        $customer->setStatus(isset($_POST['status']) ? (bool)$_POST['status'] : false);


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
        $this->render('customer/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
