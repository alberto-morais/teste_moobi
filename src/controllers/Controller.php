<?php


namespace App\controllers;
use App\core\Application;

class Controller extends Application
{
    public function __construct()
    {
        parent::__construct();
        if((!isset($this->session['usuario'])) && empty($this->session['usuario'])){
            redirect('/');
        }
    }
}