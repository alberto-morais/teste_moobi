<?php

namespace App\controllers;

use App\core\Application;
use App\models\Login;

class LoginController extends Application
{

    public function check():bool
    {
        $login = new Login();
        $resp = $login->check();
        if ($login->check()){
            $this->session['usuario'] = $resp;
            $this->flash(['alert' => [
                    'message'=>'Login realisado com sucesso!'
                    ,'type' => 'success'
                ]
            ]);
            redirect('painel');
            return true;
        }

        redirect('/');
    }



}