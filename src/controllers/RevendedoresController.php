<?php

namespace App\controllers;

use App\models\Revendedor;

class RevendedoresController extends Controller
{

    public function index($page = 1):void
    {
        $revendedor = new Revendedor();
        $data['revendedores'] = $revendedor->all($page, 10);
        $data['paginate'] = (object)$revendedor->getPaginate();
        $data['paginate']->controller = 'revendedores';
        $this->view->view('revendedores/list', $data);
    }

    public function create():void
    {
        $this->view->view('revendedores/create');
    }

    public function edit(int $id):void
    {
        $revendedor = new Revendedor();
        $revendedor->findOne($id);
        $data['revendedor'] = $revendedor;
        $this->view->view('revendedores/edit', $data);
    }

    public function save():void
    {
        $data = $_POST;

        if (empty($data['senha'])){
            unset($data['senha']);
        } else{
            $data['senha'] = md5($data['senha'].getenv('PASS'));
        }

        $revendedor = new Revendedor();
        if($revendedor->save($data)){
            if($revendedor::getMethodSave() == 'insert'){
                $this->flash(['alert' => [
                    'message'=>'Revendedor cadatrado com sucesso!',
                    'type' => 'success'
                ]
                ]);
            }else{
                $this->flash(['alert' => [
                    'message'=>'Revendedor atualizado com sucesso!',
                    'type' => 'success'
                ]
                ]);
            }
        }else{
            $this->flash(['alert' => [
                'message'=> $revendedor::getError()[2]
                ,'type' => 'danger'
            ]
            ]);
        }

        redirect('revendedores');
    }

    public function active():void
    {
    }

    public function desactive():void
    {
    }

}