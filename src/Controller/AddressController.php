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
        if (empty($_POST)) {
            $address = $this->entityManager
                               ->getRepository(Address::class)
                               ->findAll();

            $this->render('address/add', [
                'address' => $address,
            ]);

            return;
        }



        $address = new Address();
        $address->setStreet($_POST['street']);
        $address->setNumber($_POST['number']);
        $address->setDistrict($_POST['district']);
        $address->setCity($_POST['city']);
        $address->setState($_POST['state']);
        $address->setZipcode($_POST['zipcode']);
        $address->setCreatedAt(new \DateTime());
        $address->setUpdatedAt(new \DateTime());
       

        $this->entityManager->persist($address);
        $this->entityManager->flush();

        header('location: /enderecos/adicionar');
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