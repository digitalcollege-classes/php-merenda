<?php

include dirname(__DIR__) . '/vendor/autoload.php';

use App\Entity\Category;
use App\Entity\Product;


//conexao com o DB atraves do doctrine
$entityManager = require dirname(__DIR__) . '/bootstrap.php';

//cadastrar automagicamente 10 categorias
for ($i = 1; $i <= 10; $i++) {
    $cat = new Category('Categoria teste '.$i);
    $cat->setDescription('Descricao da categoria teste '.$i);
    $cat->setImage('https://diariodonordeste.verdesmares.com.br/image/contentid/policy:1.3118939:1628126231/guarana-Wilson.jpg?f=default&$p$f=28c8729');

    $entityManager->persist($cat);
}

$entityManager->flush();

$i--;
echo "===============================".PHP_EOL;
echo "=== {$i} Categorias inseridas".PHP_EOL;
echo "===============================".PHP_EOL;


for ($i = 1; $i <= 10; $i++) {
    $prod = new Product('Produto teste '.$i);
    $prod->setName('Nome do produto teste '.$i);
    $prod->setQuantity('1');
    $prod->setPrice(1);
    $prod->setImages(['https://dcdn.mitiendanube.com/stores/002/905/426/products/69-cachaca-51-luxo-bruta-965ml-ca6f4e0825105be38816970366224183-640-0.webp']);
    $prod->setAvailable ('Sim');
    $prod->setCreatedAt(new \DateTime());
    $prod->setUpdatedAt(new \DateTime());

    $entityManager->persist($prod);
}

$entityManager->flush();

$i--;
echo "===============================".PHP_EOL;
echo "=== {$i} Produtos inseridos".PHP_EOL;
echo "===============================".PHP_EOL;
