<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\User;
use App\Security\UserSecurity;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;
use App\Service\ValidationService;

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
        if (true === ValidationService::foundErrors()) {
            $this->render('user/add');
            ValidationService::stop();
            return;
        }
        


        $object = new User(); ## IMPLEMENTAR A FABRICA AQUI!!
        $object->setName($_POST['name']);
        $object->setEmail($_POST['email']);
        $object->setPassword(
            UserSecurity::encryptPassword($_POST['password'])
        );

        $object->setPhoto('');
        $object->setType('');
        
        $object->setCreatedAt(new \DateTime());

        $object->setUpdatedAt(new \DateTime());
        $object->setLastLogin(new \DateTime());

        $this->entityManager->persist($object);
        $this->entityManager->flush();

        header('location: /usuarios/listar');
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
