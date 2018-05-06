<?php

namespace core\application;

use core\database\DB;

abstract class Model
{
    protected $columns = [];
    private $db;

    public function __construct($id = null)
    {
        $this->db = new DB(
            $this->getEntity(),
            $this->getPkeyColumn()
        );

        if (!is_null($id)) {
            $this->load($id);
        }
    }

    private function load($id)
    {
        $obj = $this->db
            ->select('*', "{$this->getPkeyColumn()} = {$id}")
            ->execute();
        dump($obj);
    }

    public function getEntity()
    {
        return $this->table_name;
    }

    public function getPkeyColumn()
    {
        return $this->pkey;
    }

    public function store()
    {
        if (isset($this->getData()[$this->getPkeyColumn()])) $this->delete();

        $id = (isset($this->getData()[$this->getPkeyColumn()]))
            ? $this->getData()[$this->getPkeyColumn()] // Update
            : $this->max() + 1; // Insert

        $this->db
            ->insert($id, $this->getData())
            ->execute();
    }

    public function delete()
    {

    }

    public function all($mode = 'obj', $columns = '*', $where = '1 = 1')
    {
        return $this->db
            ->select((is_array($columns) ? implode(', ', $columns) : $columns), $where)
            ->execute('all', $mode);
    }
    
    public function max()
    {
        $obj = $this->db
            ->select("max({$this->getPkeyColumn()}) as max")
            ->execute();
            
        return $obj->max;
    }

    public function fromArray($arr, $merge = null)
    {
        $this->columns = ($merge) 
            ? array_merge($this->columns, $arr)
            : $arr;
    }

    public function getData()
    {
        return $this->columns;
    }

}