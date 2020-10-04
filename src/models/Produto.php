<?php


namespace App\models;


use App\core\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    public function save($data = false)
    {
        return parent::save($data);
    }
}