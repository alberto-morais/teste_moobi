<?php

namespace App\controllers;

use App\controllers\Controller;
use App\models\Produto;

class ProdutosController extends Controller
{

    public function index()
    {
        $produtos = new Produto();
        $data['produtos'] = $produtos->all();
        $this->view->view('produtos/list', $data);
    }

    public function create()
    {
        $this->view->view('produtos/create');
    }

    public function edit()
    {
        $this->view->view('produtos/edit');
    }

    public function save()
    {
        $data = $_POST;
        $data['preco'] = parseCurrencyToFloat($data['preco']);
        $data['descricao'] = trim($data['descricao']);
        $produtos = new Produto();
        if($produtos->save($data)){
            $this->flash(['alert' => [
                    'message'=>'Produto cadatrado com sucesso!',
                    'type' => 'success'
                ]
            ]);
        }
        $this->flash(['alert' => [
                'message'=> $produtos::getError()
                ,'type' => 'success'
            ]
        ]);

        redirect('produtos');
    }

    public function active()
    {
    }

    public function desactive()
    {
    }

}