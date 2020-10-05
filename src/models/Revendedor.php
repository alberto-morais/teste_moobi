<?php


namespace App\models;


use App\core\Model;

class Revendedor extends Model
{
    protected $table = 'revendedores';

    public function save($data = false)
    {
        return parent::save($data);
    }

}