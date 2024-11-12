<?php

include dirname(__DIR__) . '/vendor/autoload.php';

use App\Entity\User;

$entityManager = require dirname(__DIR__) . '/bootstrap.php';

$senha = password_hash('12345', PASSWORD_BCRYPT);

for ($i = 1; $i <= 3; $i++) {
    $user = new User();
    $user->setName("Chiquim {$i} da Silva");
    $user->setEmail("chiquim{$i}@email.com");
    $user->setPassword($senha);
    $user->setPhoto("https://storage.googleapis.com/imperatriz.online/2023/02/89824b41-img-20230228-wa0073.jpg");
    $user->setType("Analista {$i}");
    $user->setCreatedAt(new \DateTime());
    $user->setUpdatedAt(new \DateTime());
    $user->setLastLogin(new \DateTime());

    $entityManager->persist($user);

    $user2 = new User();
    $user2->setName("Mariazinha {$i} Gomes");
    $user2->setEmail("mary{$i}@email.com");
    $user2->setPassword($senha);
    $user2->setPhoto("https://cdn.jornaldebrasilia.com.br/wp-content/uploads/2024/04/30071740/Captura-de-tela-2024-04-30-071731.png");
    $user2->setType("Engenheira {$i}");
    $user2->setCreatedAt(new \DateTime());
    $user2->setUpdatedAt(new \DateTime());
    $user2->setLastLogin(new \DateTime());

    $entityManager->persist($user2);
}

$entityManager->flush();