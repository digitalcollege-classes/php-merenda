<?php

// arquivo de configuração da conexão (doctrine)
use Doctrine\DBAL\DriverManager;    // Fazer Conexão
use Doctrine\ORM\EntityManager;     // Gerenciar os dados das tabelas (DataMapper)
use Doctrine\ORM\ORMSetup;          // Configuração da Conexão

require_once 'vendor/autoload.php';

// TODO: mover para um arquivo .env

$host = 'oo-mysql';         // endereço do banco de dados
$user = 'user';
$password = 'password';
$database = 'db_name';

// Configura onde estão as Entidades
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Entity'],
    isDevMode: true
);

// Abrir a Conexão
$connection = DriverManager::getConnection(
    [
        'driver' => 'pdo_mysql',
        'dbname' => $database,
        'user' => $user,
        'password' => $password,
        'host' => $host,
    ]
);

// Aqui a gente junta a configuração e a conexão e retorna 
// o objeto que vai gerenciar o bagulho todo
$entityManager = new EntityManager($connection, $config);

return $entityManager;
