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
        $pedido = new Pedido();
        $data['pedidos'] = $pedido->all($page, 6);
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

    public function show($id)
    {
        $pedido = new Pedido();
        $pedido_produtos = new PeditosProdutos();
        $data['pedido'] = $pedido->orderResponsible($id);
        $data['list_produtos'] = $pedido_produtos->listItens($id);
        $this->view->view('pedidos/show', $data);
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
                $this->msg->notifySuccess('Pedido criado com sucesso!');
            }else{
                $this->msg->notifySuccess('Pedido criado com sucesso!');
            }
        }else{
            $this->msg->notifyError($pedido::getError()[2]);
        }

        $this->saveSessionMessage();

        if($this->sendSMS()){
            $this->msg->notifySuccess('SMS envida com sucesso!');
        }else{
            $this->msg->notifySuccess('Não foi possível enviar o SMS!');
        }

        if($this->sendEmail()){
            $this->msg->notifySuccess('Pedido criado com sucesso!');
        }else{
            $this->msg->notifySuccess('Não foi possível enviar o Email!');
        }

        redirect('pedidos');
    }

    public function sendEmail()
    {
        return rand(0, 1);
    }

    public function sendSMS()
    {
        return rand(0, 1);
    }

    public function active($id): void
    {
        $pedido = new Pedido();
        $pedido->findOne($id);
        $pedido->ativo = 1;
        $data = get_object_vars($pedido);
        if($pedido->save($data)){
            $this->msg->notifySuccess('Pedido ativado com sucesso!');
        }else{
            $this->msg->notifyError($pedido::getError()[2]);
        }
        $this->saveSessionMessage();
        redirect('pedidos');
    }

    public function desactive($id): void
    {
        $pedido = new Produto();
        $pedido->findOne($id);
        $pedido->ativo = 0;
        $data = get_object_vars($pedido);

        if($pedido->save($data)){
            $this->msg->notifySuccess('Pedido desativado com sucesso!');
        }else{
            $this->msg->notifyError($pedido::getError()[2]);
        }

        $this->saveSessionMessage();

        redirect('pedidos');
    }


}