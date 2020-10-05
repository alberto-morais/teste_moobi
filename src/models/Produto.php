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

    public function decrementar($quantidade, $id)
    {
        $this->findOne($id);
        if ($quantidade > $this->quantidade){
            return false;
        }
        $this->quantidade -= $quantidade;
        $data = get_object_vars($this);
        return $this->save($data);
    }
}