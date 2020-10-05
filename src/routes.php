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
use App\models\Pedido;

return [

///////////////////////// ROUTAS DEFAULT  //////////////////////////////////

    [
        'name' => '/',
        'method' => 'GET',
        'controller' => HomeController::class,
        'action' => 'index'
    ],

    [
        'name' => 'painel',
        'method' => 'GET',
        'controller' => PainelController::class,
        'action' => 'index'
    ],

    [
        'name' => 'login/check',
        'method' => 'POST',
        'controller' => LoginController::class,
        'action' => 'check'
    ],

//////////////////////////   Usuarios   /////////////////////////////////

    [
        'name' => 'usuarios',
        'method' => 'GET',
        'controller' => UsuariosController::class,
        'action' => 'index'
    ],
    [
        'name' => 'usuarios/{id}',
        'method' => 'GET',
        'controller' => UsuariosController::class,
        'action' => 'index'
    ],
    [
        'name' => 'usuario/logout',
        'method' => 'GET',
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
        'name' => 'usuario/editar/{id}',
        'method' => 'GET',
        'controller' => UsuariosController::class,
        'action' => 'edit'
    ],
    [
        'name' => 'usuario/salvar',
        'method' => 'POST',
        'controller' => UsuariosController::class,
        'action' => 'save'
    ],

/////////////////////////    Revendedor  //////////////////////////////


    [
        'name' => 'revendedores',
        'method' => 'GET',
        'controller' => RevendedoresController::class,
        'action' => 'index'
    ],
    [
        'name' => 'revendedores/{id}',
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
        'name' => 'revendedor/salvar',
        'method' => 'POST',
        'controller' => RevendedoresController::class,
        'action' => 'save'
    ],
    [
        'name' => 'revendedor/editar/{id}',
        'method' => 'GET',
        'controller' => RevendedoresController::class,
        'action' => 'edit'
    ],

//////////////////////// Pedidos / //////////////////////////////

    [
        'name' => 'pedidos',
        'method' => 'GET',
        'controller' => PedidosController::class,
        'action' => 'index'
    ],
    [
        'name' => 'pedidos/{id}',
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
        'name' => 'pedido/editar{id}',
        'method' => 'GET',
        'controller' => PedidosController::class,
        'action' => 'edit'
    ],

    [
        'name' => 'pedido/salvar',
        'method' => 'POST',
        'controller' => PedidosController::class,
        'action' => 'save'
    ],

    //////////////////////// Produtos ///////////////////////////////

    [
        'name' => 'produtos',
        'method' => 'GET',
        'controller' => ProdutosController::class,
        'action' => 'index'
    ],
    [
        'name' => 'produtos/{id}',
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
        'name' => 'produto/editar/{id}',
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
