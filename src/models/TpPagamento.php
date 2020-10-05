<?php


namespace App\models;


use App\core\Model;

class TpPagamento extends Model
{
    protected $table = 'tp_pagamentos';

    public function save($data = false)
    {
        return parent::save($data);
    }
}