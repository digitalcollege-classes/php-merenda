<?php

include dirname(__DIR__) . '/vendor/autoload.php';

use App\Entity\Category;
use App\Entity\Order;

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



//Cadastrar automatcamente 10 pedido.

for($i = 1; $i <= 10; $i++) {
    $order = new Order();
    $order->setType('Tipo do pedido'.$i);
    $order->setItems(['Salsicha']);
    $order->setCustomer('O cliente que fez o pedido'.$i);
    $order->setStatus('Status do pedido'.$i);
    $order->setCreatedAt(new \DateTime());
    $order->setUpdateAt(new \DateTime());

    $entityManager->persist($order);
}

$entityManager->flush();