<?php

namespace App\controllers;

use \App\controllers\Controller;

class PedidosController extends Controller
{

    public function index()
    {
        $this->view->view('pedidos/list');
    }


    public function create()
    {
        $this->view->view('pedidos/create');
    }

    public function edit()
    {
        $this->view->view('pedidos/edit');
    }

    public function save()
    {
    }

    public function active()
    {
    }

    public function desactive()
    {
    }

}