<?php

include dirname(__DIR__) . '/vendor/autoload.php';

use App\Entity\Category;
use App\Entity\Address;
use App\Entity\Customer;


//conexao com o DB atraves do doctrine
$entityManager = require dirname(__DIR__) . '/bootstrap.php';

//cadastrar automagicamente 10 categorias
for ($i = 1; $i <= 10; $i++) {
    $cat = new Category('Categoria teste ' . $i);
    $cat->setDescription('Descricao da categoria teste ' . $i);
    $cat->setImage('https://diariodonordeste.verdesmares.com.br/image/contentid/policy:1.3118939:1628126231/guarana-Wilson.jpg?f=default&$p$f=28c8729');

    $entityManager->persist($cat);
}

for ($i = 1; $i <= 10; $i++) {
    $end = new Address('Endereco teste '.$i);
    $end->setStreet('Rua Teste teste '.$i);
    $end->setNumber ('Rua Teste teste '.$i);
    $end->setDistrict('Bairro Teste '.$i);
    $end->setCity('Cidade Teste '.$i);
    $end->setState('Estado Teste '.$i);
    $end->setZipcode('6043114 '.$i);
    
    $end->createdAt = new DateTime();
    $end->updateAt = new DateTime();

    $entityManager->persist($end);
}

$entityManager->flush();

$i--;
echo "===============================".PHP_EOL;
echo "=== {$i} Categorias inseridas".PHP_EOL;
echo "===============================".PHP_EOL;

echo "===============================".PHP_EOL;
echo "=== {$i} Enderecos inseridos".PHP_EOL;
echo "===============================".PHP_EOL;

// Cadastrar automaticamente 10 customers
for ($i = 1; $i <= 10; $i++) {
    $customer = new Customer('Cliente teste ' . $i, '+55 (85) 99999-000' . $i);
    $customer->setEmail('cliente' . $i . '@exemplo.com');
    $customer->setPhoto('https://img.freepik.com/fotos-premium/retrato-de-feliz-bonito-homem-jovem-isolado_95419-1823.jpg' . $i . '.jpg'); // Foto fictícia, pode ser um link real ou você pode usar imagens locais.

    $entityManager->persist($customer);
}

$entityManager->flush();

$i--;
echo "===============================" . PHP_EOL;
echo "=== {$i} Customers inseridos ===" . PHP_EOL;
echo "===============================" . PHP_EOL;
