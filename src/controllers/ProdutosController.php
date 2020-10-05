<?php

namespace App\controllers;

use App\controllers\Controller;
use App\models\Produto;

class ProdutosController extends Controller
{

    public function index($page = 1):void
    {
        $produtos = new Produto();
        $data['produtos'] = $produtos->all($page, 10);
        $data['paginate'] = (object)$produtos->getPaginate();
        $data['paginate']->controller = 'produtos';
        $this->view->view('produtos/list', $data);
    }

    public function create():void
    {
        $this->view->view('produtos/create');
    }

    public function edit(int  $id):void
    {
        $produtos = new Produto();
        $produtos->findOne($id);
        $data['produto'] = $produtos;
        $this->view->view('produtos/edit', $data);
    }

    public function save():void
    {
        $data = $_POST;
        $data['preco'] = parseCurrencyToFloat($data['preco']);
        $data['descricao'] = trim($data['descricao']);
        if (isset($_POST['adicionar']) and $_POST['adicionar'] > 0){
            $data['quantidade'] = $data['quantidade'] + $_POST['adicionar'];
        }
        unset($data['adicionar']);
        $produtos = new Produto();
        if($produtos->save($data)){
            if($produtos::getMethodSave() == 'insert'){
                $this->flash(['alert' => [
                        'message'=>'Produto cadatrado com sucesso!',
                        'type' => 'success'
                    ]
                ]);
            }else{
                $this->flash(['alert' => [
                        'message'=>'Produto atualizado com sucesso!',
                        'type' => 'success'
                    ]
                ]);
            }
        }else{

            $this->flash(['alert' => [
                    'message'=> $produtos::getError()[2]
                    ,'type' => 'danger'
                ]
            ]);
        }

        redirect('produtos');
    }

    public function active():void
    {
    }

    public function desactive():void
    {
    }

}