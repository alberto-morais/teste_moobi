<?php


namespace App\models;


use App\core\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    public function save($data = false)
    {
        return parent::save($data);
    }
}