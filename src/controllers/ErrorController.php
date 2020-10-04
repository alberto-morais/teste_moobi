<?php

namespace App\controllers;

class ErrorController extends Controller
{

    public function index()
    {
        $this->view->view('error');
    }

}