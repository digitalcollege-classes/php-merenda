<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Category;
use App\Service\ValidationService;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

use App\Model\Form\FormDirector;
use App\Model\Form\Builder\FormBuilder;

class CategoryController extends AbstractController implements ControllerInterface
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
        if (ValidationService::foundErrors()) {
            $builder = new FormBuilder();
            $director = new FormDirector($builder);

            $form = $director->buildCategoryForm($_POST);

            $this->render('category/add', ['form' => $form]);
            ValidationService::stop();
            return;
        }

        $object = new Category();
        $object->setName($_POST['name']);
        $object->setDescription($_POST['description']);
        $object->setImage($_POST['image']);

        $this->entityManager->persist($object);
        $this->entityManager->flush();

        header('location: /categorias/listar');
    }
    public function list(): void
    {
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

        header('location: /categorias/listar');
    }
}
