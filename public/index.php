<?php

include '../vendor/autoload.php';

session_start();

$routes = include '../config/routes.php';

date_default_timezone_set('America/Fortaleza');

use App\Controller\AuthController;
use App\Controller\PageErrorController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (false === isset($_SESSION['user_logged'])) {
    (new AuthController)->login();
    exit;
}

if (false === isset($routes[$url])) {
    (new PageErrorController())->notFound();
    exit;
}

$controller = $routes[$url][0];
$method = $routes[$url][1];

(new $controller())->$method();
