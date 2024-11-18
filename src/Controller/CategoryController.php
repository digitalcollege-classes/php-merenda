<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Category;
use App\Mediator\NotificationMediator;
use App\Service\ValidationService;
use App\Enum\NotificationTypeEnum;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class CategoryController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;
    private NotificationMediator $mediator;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Category::class);
        $this->mediator = new NotificationMediator();
    }

    public function add(): void
    {
        if (true === ValidationService::foundErrors()) {
            $this->render('category/add');
            ValidationService::stop();
            return;
        }

        $object = new Category($_POST['name']);
        $object->setDescription($_POST['description']);
        $object->setImage($_POST['image']);

        $this->entityManager->persist($object);
        $this->entityManager->flush();

        $this->mediator->setFlashMessage(NotificationTypeEnum::Success, 'Categoria cadastrada com sucesso!');

        header('location: /categorias/listar');
    }

    public function list(): void
    {
        $this->mediator->getFlashMessage();

        $this->render('category/list', [
            'categories' => $this->repository->findAll(),
        ]);
    }

    public function edit(): void
    {
        $this->render('category/edit');
    }

    public function remove(): void
    {
        $category = $this->repository->find($_GET['id']);

        $this->entityManager->remove($category);
        $this->entityManager->flush();

        $this->mediator->setFlashMessage(NotificationTypeEnum::Success, 'Categoria removida com sucesso!');

        header('location: /categorias/listar');
    }
}