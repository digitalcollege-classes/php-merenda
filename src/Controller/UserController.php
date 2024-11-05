<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\User;
use App\Security\UserSecurity;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;
use App\Service\ValidationService;
use App\Factory\AbstractUserFactory;

class UserController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;
    private AbstractUserFactory $userFactory;

    public function __construct(AbstractUserFactory $userFactory)
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(User::class);
        $this->userFactory = $userFactory;
    }

    public function add(): void
    {
        if (true === ValidationService::foundErrors()) {
            $this->render('user/add');
            ValidationService::stop();
            return;
        }


        switch ($_POST['type']) {
            case 'admin':
                $user = $this->userFactory->createAdminUser();
                break;
            case 'customer':
                $user = $this->userFactory->createCustomerUser();
                break;
            case 'vendor':
                $user = $this->userFactory->createVendorUser();
                break;
            default:
                throw new \Exception("Tipo de usuário inválido.");
        }

        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setPassword(UserSecurity::encryptPassword($_POST['password']));
        $user->setPhoto('');
        $user->setCreatedAt(new \DateTime());
        $user->setUpdatedAt(new \DateTime());
        $user->setLastLogin(new \DateTime());

        $this->entityManager->persist($user);
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
        $repository = $this->entityManager->getRepository(User::class);
        $user = $repository->find($_GET['id']);


        if (!empty($_POST)) {
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setUpdatedAt(new \DateTime());

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            header('Location: /usuarios/listar');
            return;
        }


        $type = htmlspecialchars($user->getType());
        $displayType = '';

        if ($type === 'vendor') {
            $displayType = 'Lojista';
        } elseif ($type === 'admin') {
            $displayType = 'Administrador';
        } elseif ($type === 'customer') {
            $displayType = 'Cliente';
        } else {
            $displayType = 'Tipo desconhecido';
        }


        $this->render('user/edit', [
            'user' => $user,
            'displayType' => $displayType
        ]);
    }



    public function remove(): void
    {
        $userId = $_GET['id'] ?? null;
        $user = $this->repository->find($userId);

        if (!$user) {
            throw new \Exception("Usuário não encontrado.");
        }

        $this->entityManager->remove($user);
        $this->entityManager->flush();

        header('location: /usuarios/listar');
    }

    public function tipoUsuario(string $type): string
    {
        switch ($type) {
            case 'vendor':
                return 'Lojista';
            case 'admin':
                return 'Administrador';
            case 'customer':
                return 'Cliente';
            default:
                return 'Tipo desconhecido';
        }
    }
}
