<?php

namespace App\models;

use App\core\Model;

class Login extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check(){
        $email = $_POST['email'];
        $senha = md5($_POST['senha'].getenv('PASS'));
        $resp = $this->db->table('usuarios')
            ->select()
            ->where('email', $email)
            ->where('senha', $senha)
            ->one();

        if ($resp){
            return $resp;
        }

        return false;
    }


}