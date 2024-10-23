<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class ProductController extends AbstractController implements ControllerInterface
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Product::class);
    }

    public function add(): void
    {
        if (empty($_POST)) {
            $this->render('product/add');
            return;
        }

        echo '<pre>';
        var_dump($_POST);
        var_dump($_FILES);

        $file = $_FILES['image']['tmp_name'];

        var_dump(mime_content_type($file));

        move_uploaded_file($file, 'images/produto-123.jpg');

        echo '<br><br><br><br>';
    }

    public function list(): void
    {
        $this->render('product/list', [
            'products' => $this->repository->findAll(),
        ]);
    }

    public function edit(): void
    {
        $this->render('product/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
