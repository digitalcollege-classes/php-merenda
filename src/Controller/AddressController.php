<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Address;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class AddressController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Address::class);
    }

    public function add(): void
    {
        $this->render('address/add');
    }

    public function list(): void
    {
        $this->render('address/list', [
            'enderecos' => $this->repository->findAll(),
        ]);
    }

    public function edit(): void
    {
        $this->render('address/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}