<?php

include '../vendor/autoload.php';

session_start();

$routes = include '../config/routes.php';

use App\Controller\AuthController;
use App\Controller\PageErrorController;
use App\Factory\UserConcreteFactory; // Certifique-se de que o nome e o namespace estão corretos

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (false === isset($_SESSION['user_logged'])) {
    (new AuthController())->login();
    exit;
}

if (false === isset($routes[$url])) {
    (new PageErrorController())->notFound();
    exit;
}

$controller = $routes[$url][0];
$method = $routes[$url][1];

if ($controller === 'App\Controller\UserController') {
    $userFactory = new UserConcreteFactory(); // Instancie a fábrica concreta
    $controllerInstance = new $controller($userFactory); // Passe a dependência para o controlador
} else {
    $controllerInstance = new $controller(); // Para controladores sem dependências
}

$controllerInstance->$method();
