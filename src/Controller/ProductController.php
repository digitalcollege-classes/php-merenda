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
            $this->render('product/add');
            return;
        }

        $product = new Product();
        $product->setName($_POST['name']);
        $product->setQuantity((int) $_POST['quantity']);
        $product->setPrice((float) $_POST['price']);
        $product->setAvailable((bool) $_POST['available']);
        $product->setImages(['/images/foto.jpg']);
        $product->setCreatedAt(new \DateTime());
        $product->setUpdatedAt(new \DateTime());
        
        $category = $this->entityManager
                         ->getRepository(Category::class)
                         ->find(2);

        $product->setCategory($category);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $file = $_FILES['image']['tmp_name'];

        $mime = mime_content_type($file);

        move_uploaded_file($file, 'images/foto.jpg');

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
