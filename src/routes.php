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
    [
        'name' => 'usuario/active/{id}',
        'method' => 'GET',
        'controller' => UsuariosController::class,
        'action' => 'active'
    ],
    [
        'name' => 'usuario/desactive/{id}',
        'method' => 'GET',
        'controller' => UsuariosController::class,
        'action' => 'desactive'
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
    [
        'name' => 'revendedor/active/{id}',
        'method' => 'GET',
        'controller' => RevendedoresController::class,
        'action' => 'active'
    ],
    [
        'name' => 'revendedor/desactive/{id}',
        'method' => 'GET',
        'controller' => RevendedoresController::class,
        'action' => 'desactive'
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
        'name' => 'pedido/visualizar/{id}',
        'method' => 'GET',
        'controller' => PedidosController::class,
        'action' => 'show'
    ],

    [
        'name' => 'pedido/salvar',
        'method' => 'POST',
        'controller' => PedidosController::class,
        'action' => 'save'
    ],
    [
        'name' => 'pedido/active/{id}',
        'method' => 'GET',
        'controller' => PedidosController::class,
        'action' => 'active'
    ],
    [
        'name' => 'pedido/desactive/{id}',
        'method' => 'GET',
        'controller' => PedidosController::class,
        'action' => 'desactive'
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
        'name' => 'produto/campos',
        'method' => 'GET',
        'controller' => ProdutosController::class,
        'action' => 'custom'
    ],
    [
        'name' => 'produto/editar/{id}',
        'method' => 'GET',
        'controller' => ProdutosController::class,
        'action' => 'edit'
    ],
    [
        'name' => 'produto/active/{id}',
        'method' => 'GET',
        'controller' => ProdutosController::class,
        'action' => 'active'
    ],
    [
        'name' => 'produto/desactive/{id}',
        'method' => 'GET',
        'controller' => ProdutosController::class,
        'action' => 'desactive'
    ],

//////////////////////// ERRO //////////////////////////////

    [
        'name' => 'error',
        'method' => 'GET',
        'controller' => ErrorController::class,
        'action' => 'index'
    ],
];
