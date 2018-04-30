<?php

namespace core\application;

use core\database\DB;

abstract class Model
{
    protected $columns = [];
    private $db;

    public function __construct($id = null)
    {
        $this->db = new DB($this->getEntity());

        if (!is_null($id)) {
            $this->load($id);
        }
    }

    private function load($id)
    {

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

    }

    public function delete()
    {

    }

    public function find($id)
    {

    }

    public function all($mode = 'obj', $columns = '*')
    {


        return $this->db
            ->select((is_array($columns) ? implode(', ', $columns) : $columns))
            ->execute($mode, 'all');
    }

    public function getData()
    {
        return $this->columns;
    }

}