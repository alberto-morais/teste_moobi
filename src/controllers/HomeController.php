<?php

namespace App\controllers;
use App\core\Application;

class HomeController extends Application
{

    public function index()
    {
        if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
            redirect('painel');
        }
        $this->view->view('login');
    }

}