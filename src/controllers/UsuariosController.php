<?php

namespace App\controllers;

use App\models\Usuario;

class UsuariosController extends Controller
{

    public function index($page = 1)
    {
        $limit = 5;
        $usuario = new Usuario();
        $data['usuarios'] = $usuario->all($page, $limit);
        $data['paginate'] = (object)$usuario->getPaginate();
        $data['paginate']->controller = 'usuarios';
        $this->view->view('usuarios/list', $data);
    }

    public function logout()
    {
        unset($this->session['usuario']);
        redirect('/');
    }

    public function create()
    {
        $this->view->view('usuarios/create');
    }

    public function edit(int $id):void
    {
        $usuario = new Usuario();
        $usuario->findOne($id);
        $data['usuario'] = $usuario;
        $this->view->view('usuarios/edit', $data);
    }


    public function save()
    {
        $data = $_POST;

        $usuario = new Usuario();
        if($usuario->save($data)){
            if($usuario::getMethodSave() == 'insert'){
                $this->msg->notifySuccess('Usuário cadatrado com sucesso!');
            }else{
                $this->msg->notifySuccess('Usuário atualizado com sucesso!');
            }
        }else{
            $this->msg->notifyErrror($usuario::getError()[2]);
        }
        $this->saveSessionMessage();
        redirect('usuarios');
    }

    public function active()
    {
    }

    public function desactive()
    {
    }

}