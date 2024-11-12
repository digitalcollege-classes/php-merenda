<?php

include dirname(__DIR__) . '/vendor/autoload.php';

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Order;
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
    $end = new Address('Endereco teste ' . $i);
    $end->setStreet('Rua Teste teste ' . $i);
    $end->setNumber('Rua Teste teste ' . $i);
    $end->setDistrict('Bairro Teste ' . $i);
    $end->setCity('Cidade Teste ' . $i);
    $end->setState('Estado Teste ' . $i);
    $end->setZipcode('6043114 ' . $i);

    $end->createdAt = new DateTime();
    $end->updateAt = new DateTime();

    $entityManager->persist($end);
}

$entityManager->flush();

$i--;
echo "===============================" . PHP_EOL;
echo "=== {$i} Categorias inseridas" . PHP_EOL;
echo "===============================" . PHP_EOL;


for ($i = 1; $i <= 10; $i++) {
    $prod = new Product('Produto teste ' . $i);
    $prod->setName('Nome do produto teste ' . $i);
    $prod->setQuantity('1');
    $prod->setPrice(1);
    $prod->setCategory($cat);
    $prod->setImages(['https://dcdn.mitiendanube.com/stores/002/905/426/products/69-cachaca-51-luxo-bruta-965ml-ca6f4e0825105be38816970366224183-640-0.webp']);
    $prod->setAvailable('Sim');
    $prod->setCreatedAt(new \DateTime());
    $prod->setUpdatedAt(new \DateTime());

    $entityManager->persist($prod);
}
//Cadastrar automatcamente 10 pedido.

for ($i = 1; $i <= 10; $i++) {
    $order = new Order();
    $order->setType('Tipo do pedido' . $i);
    $order->setItems(['Salsicha']);
    $order->setCustomer('O cliente que fez o pedido' . $i);
    $order->setStatus('Status do pedido' . $i);
    $order->setCreatedAt(new \DateTime());
    $order->setUpdateAt(new \DateTime());

    $entityManager->persist($order);
}

$entityManager->flush();

$i--;
echo "===============================" . PHP_EOL;
echo "=== {$i} Produtos inseridos" . PHP_EOL;
echo "===============================" . PHP_EOL;

echo "===============================" . PHP_EOL;
echo "=== {$i} Enderecos inseridos" . PHP_EOL;
echo "===============================" . PHP_EOL;

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
