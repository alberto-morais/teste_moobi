<?php

namespace App\controllers;

use \App\controllers\Controller;
use App\models\Pedido;
use App\models\PeditosProdutos;
use App\models\Produto;
use App\models\Revendedor;
use App\models\TpPagamento;

class PedidosController extends Controller
{

    public function index($page =  1)
    {
        $limit = 10;
        $pedido = new Pedido();
        $data['pedidos'] = $pedido->all($page, $limit);
        $data['paginate'] = (object)$pedido->getPaginate();
        $data['paginate']->controller = 'pedidos';
        $this->view->view('pedidos/list', $data);
    }


    public function create()
    {
        $produtos = new Produto();
        $revendedores = new Revendedor();
        $formaPagamento = new TpPagamento();
        $data['produtos'] = $produtos->all();
        $data['revendedores'] = $revendedores->all();
        $data['formaPagamento'] = $formaPagamento->all();
        $this->view->view('pedidos/create', $data);
    }

    public function edit(int $id):void
    {
        $pedido = new Revendedor();
        $pedido->findOne($id);
        $data['pedido'] = $pedido;
        $this->view->view('pedidos/edit', $data);
    }

    public function save()
    {

        $pedido = new Pedido();
        $data = $pedido->validData();

        if(isset($data['error'])){
                $this->flash(['alert' => [
                    'message'=> $data['error']
                    ,'type' => 'danger'
                ]
            ]);
            redirect('pedidos');
            return;
        }

        if($pedido->save($data)){
            if($pedido::getMethodSave() == 'insert'){
                $msg['alert'][] = [
                    'message'=>'Pedido realizado com sucesso!',
                    'type' => 'success'
                ];
                $this->flash($msg);
            }else{
                $msg['alert'][] = [
                    'message'=>'Pedido atualizado com sucesso!',
                    'type' => 'success'
                ];
                $this->flash($msg);
            }
        }else{
            $msg['alert'][] = [
                'message'=> $pedido::getError()[2]
                ,'type' => 'danger'
            ];
            $this->flash($msg);
        }

        redirect('pedidos');
    }


    public function active()
    {
    }

    public function desactive()
    {
    }

}