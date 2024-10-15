<?php

include dirname(__DIR__) . '/vendor/autoload.php';

use App\Entity\Category;

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
