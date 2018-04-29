<?php

namespace core\database;

use core\database\PDOFactory;

class DB
{
    private static $conn;
    private $table;

    public function __construct($table) {
        $this->table = $table;
    }

    public function begin()
    {
		self::$conn = PDOFactory::make($database);
		self::$conn->beginTransaction();
    }

    public function commit()
    {
		self::$conn->commit();
		self::$conn = null;
    }

    public function rollback()
    {
        self::$conn->rollback();
        self::$conn = null;
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

    public function get()
    {
        return self::$conn;
    }
}