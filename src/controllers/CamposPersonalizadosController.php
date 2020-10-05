<?php

namespace App\controllers;

use App\controllers\Controller;
use App\models\Campo;

class CamposPersonalizadosController extends Controller
{

    public function index($page = 1): void
    {
        $campos = new Campo();
        $data['campos'] = $campos->all($page, 10);
        $data['paginate'] = (object)$campos->getPaginate();
        $data['paginate']->controller = 'campos';
        $this->view->view('campos/list', $data);
    }

    public function create(): void
    {
        $this->view->view('campos/create');
    }

    public function edit(int $id): void
    {
        $campos = new Campo();
        $campos->findOne($id);
        $data['campo'] = $campos;
        $this->view->view('campos/edit', $data);
    }

    public function save(): void
    {
        $data = $_POST;
        $campos = new Campo();
        if ($campos->save($data)) {
            if ($campos::getMethodSave() == 'insert') {
                $this->msg->notifySuccess('Campo cadatrado com sucesso!');
            } else {
                $this->msg->notifySuccess('Campo atualizado com sucesso!');
            }

        } else {
            $this->msg->notifyError($campos::getError()[2]);
        }

        $this->saveSessionMessage();
        redirect('campos');
    }

    public function active($id): void
    {
        $campos = new Campo();
        $campos->findOne($id);
        $campos->ativo = 1;
        $data = get_object_vars($campos);
        if ($campos->save($data)) {
            $this->msg->notifySuccess('Campo ativado com sucesso!');
        } else {
            $this->msg->notifyError($campos::getError()[2]);
        }
        $this->saveSessionMessage();
        redirect('campos');
    }

    public function desactive($id): void
    {
        $campos = new Campo();
        $campos->findOne($id);
        $campos->ativo = 0;
        $data = get_object_vars($campos);
        if ($campos->save($data)) {
            $this->msg->notifyWarning('Campo desativado com sucesso!');
        } else {
            $this->msg->notifyError($campos::getError()[2]);
        }

        $this->saveSessionMessage();
        redirect('campos');
    }

    public function delete($id): void
    {
        $campos = new Campo();
        if ($campos->removeColumn($id)) {
            $this->msg->notifyWarning('Campo deletado com sucesso!');
        } else {
            $this->msg->notifyError($campos::getError()[2]);
        }

        $this->saveSessionMessage();
        redirect('campos');
    }

}