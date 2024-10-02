<?php
//arquivo de configuracao da conexao (doctrine)

use Doctrine\DBAL\DriverManager; //fazer a conexao
use Doctrine\ORM\EntityManager; //gerenciar os dados das tabelas (DataMapper)
use Doctrine\ORM\ORMSetup; //configurar a conexao

require_once 'vendor/autoload.php';

// TODO: mover para um arquivo .env
$host = 'oo-mysql'; //o endereco do banco de dados
$user = 'user';
$password = 'password';
$database = 'db_name';

//configura onde estao as entidades
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__.'/src/Entity'],
    isDevMode: true
);

//abrir a conexao
$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'dbname' => $database,
    'user' => $user,
    'password' => $password,
    'host' => $host,
]); 

//aqui a gente junta a configuracao e a conexao e retorna 
//o objeto que vai gerenciar o bagulho todo
$entityManager = new EntityManager($connection, $config);

return $entityManager;

