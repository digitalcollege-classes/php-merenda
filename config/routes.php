<?php

declare(strict_types=1);

use App\Controller\CategoryController;
use App\Controller\CustomerController;
<<<<<<< HEAD
use App\Controller\ProductController;
use App\Controller\UserController;
=======
>>>>>>> da98fe3 (ajuste na rota)
use App\Controller\OrderController;
use App\Controller\ProductController;

return [
    '/' => [CategoryController::class, 'list'],

    '/categorias/listar' => [CategoryController::class, 'list'],
    '/categorias/adicionar' => [CategoryController::class, 'add'],
    '/categorias/editar' => [CategoryController::class, 'edit'],
    '/categorias/remover' => [CategoryController::class, 'remove'],

    '/clientes/listar' => [CustomerController::class, 'list'],
    '/clientes/adicionar' => [CustomerController::class, 'add'],
    '/clientes/editar' => [CustomerController::class, 'edit'],
    '/clientes/remover' => [CustomerController::class, 'remove'],

    '/pedidos/listar' => [OrderController::class, 'list'],
   
    '/produtos/listar' => [ProductController::class, 'list'],
    '/produtos/adicionar' => [ProductController::class, 'add'],
    '/produtos/editar' => [ProductController::class, 'edit'],
    '/produtos/remover' => [ProductController::class, 'remove'],

    '/usuarios/listar' => [UserController::class, 'list'],
    '/usuarios/adicionar' => [UserController::class, 'add'],
    '/usuarios/editar' => [UserController::class, 'edit'],
    '/usuarios/remover' => [UserController::class, 'remove'],

];
