<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class UserController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(User::class);
    }
    public function add(): void
    {
        $this->render('user/add');
    }

    public function list(): void
    {
        $this->render('user/list', [
            'users' => $this->repository->findAll(),
        ]);
    }

    public function edit(): void
    {
        $this->render('user/edit');
    }

    public function remove(): void
    {
        $user = $this->repository->find($_GET['id']);

        $this->entityManager->remove($user);
        $this->entityManager->flush();

        header('location: /usuarios/listar');
    }
}
