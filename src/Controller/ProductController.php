<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\Connection;
use App\Entity\Product;
use App\Entity\Category;
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
            $categories = $this->entityManager
                               ->getRepository(Category::class)
                               ->findAll();

            $this->render('product/add', [
                'categories' => $categories,
            ]);

            return;
        }

        $category = $this->entityManager
                        ->getRepository(Category::class)
                        ->find((int) $_POST['category']);

        $file = $_FILES['image']['tmp_name'];
        $extension = explode('/', mime_content_type($file))[1];

        //if $extension === 'jpeg','png','gif'

        $path = strtolower("images/product/{$category->getName()}");
        $filename = str_replace(
            ' ', 
            '_', 
            strtolower($_POST['name'].'.'.$extension)
        );

        if (false === is_dir($path)) {
            mkdir($path, recursive: true);
        }

        move_uploaded_file($file, "{$path}/{$filename}");

        $product = new Product();
        $product->setName($_POST['name']);
        $product->setQuantity((int) $_POST['quantity']);
        $product->setPrice((float) $_POST['price']);
        $product->setAvailable((bool) $_POST['available']);
        $product->setImages(["/{$path}/{$filename}"]);
        $product->setCreatedAt(new \DateTime());
        $product->setUpdatedAt(new \DateTime());
        $product->setCategory($category);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        header('location: /produtos/listar');
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
