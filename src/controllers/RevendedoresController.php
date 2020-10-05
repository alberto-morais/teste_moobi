<?php

namespace App\controllers;

use App\models\Produto;
use App\models\Revendedor;

class RevendedoresController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(isset($this->session['usuario']->revend)) redirect('/');
    }
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
                $this->msg->notifySuccess('Revendedor cadatrado com sucesso!');
            }else{
                $this->msg->notifySuccess('Revendedor atualizado com sucesso!');
            }
        }else{
            $this->msg->notifyError($revendedor::getError()[2]);
        }

        $this->saveSessionMessage();
        redirect('revendedores');
    }

    public function active($id): void
    {
        $revendedor = new Revendedor();
        $revendedor->findOne($id);
        $revendedor->ativo = 1;
        $data = get_object_vars($revendedor);
        if ($revendedor->save($data)) {
            $this->msg->notifySuccess('Revendedor ativado com sucesso!');
        } else {
            $this->msg->notifyError($revendedor::getError()[2]);
        }
        $this->saveSessionMessage();
        redirect('revendedores');
    }

    public function desactive($id): void
    {
        $revendedor = new Revendedor();
        $revendedor->findOne($id);
        $revendedor->ativo = 0;
        $data = get_object_vars($revendedor);
        if ($revendedor->save($data)) {
            $this->msg->notifyWarning('Revendedor desativado com sucesso!');
        } else {
            $this->msg->notifyError($revendedor::getError()[2]);
        }

        $this->saveSessionMessage();
        redirect('revendedores');
    }


}