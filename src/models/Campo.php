<?php


namespace App\models;


use App\core\Model;

class Campo extends Model
{
    protected $table = 'campos_personalizados';

    public function save($data = false)
    {
        $this->db->query('begin');
        if(isset($data['id'])){
            $this->findOne($data['id']);
            $this->db->query("alter table produtos drop column {$this->nome_coluna}");
        }
        $data['nome_coluna'] = nameColumnDB($data['nome']);
        $resp = parent::save($data);
        if ($resp) {
            $data['nome'] = $data['nome_coluna'];
            if($this->createCollumn($data)){
                $this->db->query('commit');
                return true;
            }
        }
        $this->db->query('rollback');
        return false;
    }

    public function createCollumn($item)
    {
        $collumn = nameColumnDB($item['nome']);
        if ($item['type'] == 'text'){
            $flag = $this->db->query("alter table produtos add {$collumn} varchar(256) null");
        }

        if ($item['type'] == 'textarea'){
            $flag = $this->db->query("alter table produtos add {$collumn} text null");
        }

        if ($item['type'] == 'number'){
            $flag = $this->db->query("alter table produtos add {$collumn} int null");
        }

        if ($item['type'] == 'date'){
            $flag = $this->db->query("alter table produtos add {$collumn} date null");
        }
        return $flag;
    }

    public function removeColumn($id)
    {
        $this->findOne($id);
        $this->db->query('begin');
        $resp = $this->db->query("alter table produtos drop column {$this->nome_coluna}");
        if($resp){
            $this->delete($id);
            $this->db->query('commit');
            return true;
        }
        $this->db->query('rollback');
        return false;
    }

    public function decrementar($quantidade, $id)
    {
        $this->findOne($id);
        if ($quantidade > $this->quantidade) {
            return false;
        }
        $this->quantidade -= $quantidade;
        $data = get_object_vars($this);
        return $this->save($data);
    }
}