<?php

namespace App\models;

use App\core\Model;

class Login extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check()
    {
        $email = $_POST['email'];
        $senha = md5($_POST['senha'] . getenv('PASS'));
        $resp = $this->db->table('usuarios')
            ->where('email', $email)
            ->where('senha', $senha)
            ->get()->first();
        if ($resp) {
            return $resp;
        }

        return false;
    }

    public function revendedorCheck()
    {
        $email = $_POST['email'];
        $senha = md5($_POST['senha'] . getenv('PASS'));
        $resp = $this->db->table('revendedores')
            ->where('email', $email)
            ->where('senha', $senha)
            ->get()->first();
        if ($resp) {
            return $resp;
        }

        return false;
    }


}