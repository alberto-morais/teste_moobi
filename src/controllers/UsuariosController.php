<?php

namespace App\controllers;

class UsuariosController extends Controller
{

    public function index()
    {
        $this->view->view('usuarios/list');
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

    public function edit()
    {
        $this->view->view('usuarios/edit');
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