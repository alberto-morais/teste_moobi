<?php

namespace App\controllers;

use App\controllers\Controller;

class PainelController extends Controller
{

    public function index()
    {
        $this->view->view('painel');
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
    }

    public function active()
    {
    }

    public function desactive()
    {
    }

}