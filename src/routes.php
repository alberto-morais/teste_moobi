<?php

use App\controllers\ErrorController;
use App\controllers\EstoqueController;
use App\controllers\HomeController;
use App\controllers\LoginController;
use App\controllers\PainelController;
use App\controllers\PedidosController;
use App\controllers\ProdutosController;
use App\controllers\RevendedoresController;
use App\controllers\UsuariosController;

return [
    [
        'name' => '/',
        'method' => 'GET',
        'controller' => HomeController::class,
        'action' => 'index'
    ],
    [
        'name' => 'login/check',
        'method' => 'POST',
        'controller' => LoginController::class,
        'action' => 'check'
    ],
    [
        'name' => 'usuarios',
        'method' => 'GET',
        'controller' => UsuariosController::class,
        'action' => 'index'
    ],
    [
        'name' => 'usuarios/logout',
        'method' => 'POST',
        'controller' => UsuariosController::class,
        'action' => 'logout'
    ],
    [
        'name' => 'usuario/novo',
        'method' => 'GET',
        'controller' => UsuariosController::class,
        'action' => 'create'
    ],
    [
        'name' => 'usuario/editar',
        'method' => 'GET',
        'controller' => UsuariosController::class,
        'action' => 'edit'
    ],
    [
        'name' => 'painel',
        'method' => 'POST',
        'controller' => PainelController::class,
        'action' => 'index'
    ],
    [
        'name' => 'revendedores',
        'method' => 'GET',
        'controller' => RevendedoresController::class,
        'action' => 'index'
    ],
    [
        'name' => 'revendedor/novo',
        'method' => 'GET',
        'controller' => RevendedoresController::class,
        'action' => 'create'
    ],
    [
        'name' => 'revendedor/editar',
        'method' => 'GET',
        'controller' => RevendedoresController::class,
        'action' => 'edit'
    ],
    [
        'name' => 'pedidos',
        'method' => 'GET',
        'controller' => PedidosController::class,
        'action' => 'index'
    ],
    [
        'name' => 'pedido/novo',
        'method' => 'GET',
        'controller' => PedidosController::class,
        'action' => 'create'
    ],
    [
        'name' => 'pedido/editar',
        'method' => 'GET',
        'controller' => PedidosController::class,
        'action' => 'edit'
    ],
    [
        'name' => 'produtos',
        'method' => 'GET',
        'controller' => ProdutosController::class,
        'action' => 'index'
    ],
    [
        'name' => 'produto/novo',
        'method' => 'GET',
        'controller' => ProdutosController::class,
        'action' => 'create'
    ],
    [
        'name' => 'produto/salvar',
        'method' => 'POST',
        'controller' => ProdutosController::class,
        'action' => 'save'
    ],
    [
        'name' => 'produto/editar',
        'method' => 'GET',
        'controller' => ProdutosController::class,
        'action' => 'edit'
    ],
    [
        'name' => 'error',
        'method' => 'GET',
        'controller' => ErrorController::class,
        'action' => 'index'
    ],
];
