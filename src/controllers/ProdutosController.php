<?php

namespace App\controllers;

use App\controllers\Controller;
use App\models\Produto;

class ProdutosController extends Controller
{

    public function index($page = 1): void
    {
        $produtos = new Produto();
        $data['produtos'] = $produtos->all($page, 10);
        $data['paginate'] = (object)$produtos->getPaginate();
        $data['paginate']->controller = 'produtos';
        $this->view->view('produtos/list', $data);
    }

    public function create(): void
    {
        $this->view->view('produtos/create');
    }

    public function custom()
    {
        $this->view->view('produtos/create');
    }

    public function edit(int $id): void
    {
        $produtos = new Produto();
        $produtos->findOne($id);
        $data['produto'] = $produtos;
        $this->view->view('produtos/edit', $data);
    }

    public function save(): void
    {
        $data = $_POST;
        $data['preco'] = parseCurrencyToFloat($data['preco']);
        $data['descricao'] = trim($data['descricao']);
        if (isset($_POST['adicionar']) and $_POST['adicionar'] > 0) {
            $data['quantidade'] = $data['quantidade'] + $_POST['adicionar'];
        }
        unset($data['adicionar']);
        $produtos = new Produto();
        if ($produtos->save($data)) {

            if ($produtos::getMethodSave() == 'insert') {
                $this->msg->notifySuccess('Produto cadatrado com sucesso!');
            } else {
                $this->msg->notifySuccess('Produto atualizado com sucesso!');
            }

        } else {
            $this->msg->notifyError($produtos::getError()[2]);
        }

        $this->saveSessionMessage();
        redirect('produtos');
    }

    public function active($id): void
    {
        $produtos = new Produto();
        $produtos->findOne($id);
        $produtos->ativo = 1;
        $data = get_object_vars($produtos);
        if ($produtos->save($data)) {
            $this->msg->notifySuccess('Pedido ativado com sucesso!');
        } else {
            $this->msg->notifyError($produtos::getError()[2]);
        }
        $this->saveSessionMessage();
        redirect('produtos');
    }

    public function desactive($id): void
    {
        $produtos = new Produto();
        $produtos->findOne($id);
        $produtos->ativo = 0;
        $data = get_object_vars($produtos);
        if ($produtos->save($data)) {
            $this->msg->notifyWarning('Pedido desativado com sucesso!');
        } else {
            $this->msg->notifyError($produtos::getError()[2]);
        }

        $this->saveSessionMessage();
        redirect('produtos');
    }

}