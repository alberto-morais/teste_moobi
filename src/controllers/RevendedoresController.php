<?php

namespace App\controllers;

class RevendedoresController extends Controller
{

    public function index()
    {
        $this->view->view('revendedores/list');
    }

    public function create()
    {
        $this->view->view('revendedores/create');
    }

    public function edit()
    {
        $this->view->view('revendedores/edit');
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