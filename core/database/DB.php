<?php

namespace core\database;

use core\database\PDOFactory;

class DB
{
    private static $pdo;
    private $table;

    public function __construct($table) {
        $this->table = $table;
    }

    private function open()
    {

    }

    public function begin()
    {

    }

    public function commit()
    {

    }

    public function rollback()
    {

    }

    public function rawQuery($query)
    {

    }

    private function prepare()
    {

    }

    public function insert()
    {

    }

    public function delete()
    {

    }

    public function update()
    {

    }

    public function select()
    {
        
    }
}