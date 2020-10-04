<?php

namespace App\core;

use App\core\DB_Query_Build;

class Model
{
    public $db;

    static protected $error;

    protected $table;

    public function __construct()
    {
        $this->db =  DB_Query_Build::getInstance();
    }

    public function all()
    {
       return $this->db->table($this->table)->get();
    }

    public function findOne($id = '', $where = null, $order = array(), $limit = '', $offset = null)
    {
        if (is_numeric($id)) {
            $where = $id;
        }

        if (!empty($order)) {
            foreach ($order as $key => $item) {
                $this->db->order_by($key, $item);
            }
        }
        $db = $this->db->table($this->table)->where($where);
        if(!empty($limit)){
            $db->limit($limit, $offset);

        }
        $result = $db->get()->first();
        if ($result instanceof Exception) {
            self::$error = $result;

        } elseif ($result == null) {
            return false;

        } else {
            $this->set((array)$result);
            return $this;
        }

        return false;
    }


    private function set($array)
    {
        foreach ($array as $propertyToSet => $value) {
            $this->{$propertyToSet} = $value;
        }
        return $this;
    }


    protected function insert($data)
    {
        $lastID = $this->db->insert($this->table, $data);
        if(!is_array($lastID)){
            return $this->findOne($lastID);
        }

        self::$error = $lastID;
        return false;

    }

    /**
     * @return mixed
     */
    public static function getError()
    {
        return self::$error;
    }



    protected function update($data)
    {
        $where = ['id' => $data->id];
        if($this->db->update($this->table, $data, $where)){
            return $this->findOne($data->id);
        }
        return false;
    }

    protected function save($data = false)
    {
        if (isset($data->id) and (!empty($data->id)) and (!$data == false)) {
            return self::update($data);
        } else {
            if (isset($data->id) && $data->id === NULL) unset($data->id);
            return self::insert($data);
        }
    }
}