<?php

namespace App\core;

use App\core\DB_Query_Build;

class Model
{
    protected $db;

    static protected $method_save;

    static protected $error;

    protected $paginate;

    protected $table;

    public function __construct()
    {
        $this->db = DB_Query_Build::getInstance();
    }

    public function all($page = false, $limit = false)
    {
        if ($page == false) {
            return $this->db->table($this->table)->get();
        }

        $resp = $this->db->table($this->table)->paginate($page, $limit);
        $this->paginate = $this->db->paginationInfo();
        return $resp;
    }

    public function getPaginate()
    {
        return $this->paginate;
    }

    public function paginationInfo()
    {
        $this->db->paginationInfo();
    }

    public function findOne($id = '', $where = null, $order = array())
    {
        if (is_numeric($id)) {
            $where = $id;
        }

        if (!empty($order)) {
            foreach ($order as $key => $item) {
                $this->db->order_by($key, $item);
            }
        }

        $result = $this->db->table($this->table)->where($id)->get()->first();

        if (!$result) {
            self::$error = $result;
        }else {
            $this->set((array)$result);
            return $this;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
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
        self::setMethodSave('insert');
        $lastID = $this->db->insert($this->table, $data);
        if (!is_array($lastID)) {
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
        self::setMethodSave('update');
        $where = $data['id'];
        if ($this->db->update($this->table, $data, $where)) {
            return $this->findOne($data['id']);
        }
        return false;
    }

    protected function delete($id)
    {
        return $this->db->delete($this->table,$id);

    }

    /**
     * @return mixed
     */
    public static function getMethodSave()
    {
        return self::$method_save;
    }

    /**
     * @param mixed $method_save
     */
    public static function setMethodSave($method_save): void
    {
        self::$method_save = $method_save;
    }

    protected function save($data = false)
    {
        $data = $this->clear($data);
        if ($data != false) $data = (array)$data;
        if (isset($data['id']) and (!empty($data['id'])) and (!$data == false)) {
            return self::update($data);
        } else {
            if (isset($data->id) && $data->id === NULL) unset($data->id);
            return self::insert($data);
        }
    }

    private function clear($data)
    {
        unset($data['db'], $data['table'], $data['paginate']);
        return $data;
    }

    public function __call($method, $args)
    {
        if (!method_exists($this, $method)) {
            throw new Exception("Method doesn't exist");
        }
        call_user_func_array([$this, $method], $args);
    }

}