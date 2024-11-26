<?php

declare(strict_types=1);

use App\Controller\AddressController;
use App\Controller\CategoryController;
use App\Controller\CustomerController;
use App\Controller\OrderController;
use App\Controller\ProductController;
use App\Controller\UserController;
use App\Controller\AuthController;
use App\Controller\DashboardController;
use App\Controller\Client\MenuController;
use App\Controller\Client\OrderClientController;

return [
    '/' => [DashboardController::class, 'list'],

    '/categorias/listar' => [CategoryController::class, 'list'],
    '/categorias/adicionar' => [CategoryController::class, 'add'],
    '/categorias/editar' => [CategoryController::class, 'edit'],
    '/categorias/remover' => [CategoryController::class, 'remove'],

    '/clientes/listar' => [CustomerController::class, 'list'],
    '/clientes/adicionar' => [CustomerController::class, 'add'],
    '/clientes/editar' => [CustomerController::class, 'edit'],
    '/clientes/remover' => [CustomerController::class, 'remove'],

    '/enderecos/listar' => [AddressController::class, 'list'],
    '/enderecos/adicionar' => [AddressController::class, 'add'],

    '/pedidos/listar' => [OrderController::class, 'list'],
    '/pedidos/editar' => [OrderController::class, 'edit'],

    '/produtos/listar' => [ProductController::class, 'list'],
    '/produtos/adicionar' => [ProductController::class, 'add'],
    '/produtos/editar' => [ProductController::class, 'edit'],
    '/produtos/remover' => [ProductController::class, 'remove'],

    '/usuarios/listar' => [UserController::class, 'list'],
    '/usuarios/adicionar' => [UserController::class, 'add'],
    '/usuarios/editar' => [UserController::class, 'edit'],
    '/usuarios/remover' => [UserController::class, 'remove'],

    // -- ROTAS DO USUARIO FINAL (QUE COMPRA) --
    '/cardapio' => [MenuController::class, 'index'],
    '/cardapio/pedidos' => [MenuController::class, 'orders'],

    '/api/pedidos/novo' => [OrderClientController::class, 'create'],
    '/api/pedidos/list' => [OrderClientController::class, 'list'],


    // -- FIM DAS ROTAS DO USUARIO FINAL --


    '/login' => [AuthController::class, 'login'],
    '/logout' => [AuthController::class, 'logout'],
];
