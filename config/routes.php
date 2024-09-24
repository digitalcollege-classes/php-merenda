<?php

declare(strict_types=1);

use App\Controller\CategoryController;
use App\Controller\CustomerController;
use App\Controller\OrderController;

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
   
];

