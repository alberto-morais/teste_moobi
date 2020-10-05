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
        if ($resp){
            $this->session['usuario'] = (object)get_object_vars ( $resp );
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

    public function revendedorCheck():bool
    {
        $login = new Login();
        $resp = $login->revendedorCheck();
        $resp->revend = 1;
        $resp->nome = $resp->revendedor;
        if ($resp){
            $this->session['usuario'] = (object)get_object_vars ( $resp );
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