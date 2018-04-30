<?php

namespace core\database;

use core\database\PDOFactory;

class DB
{
    private static $conn;
    private $table;
    private $query;

    public function __construct($table) {
        $this->table = $table;
        $this->query = "";
        self::$conn = null;
    }

    public function begin($mode)
    {
		self::$conn = PDOFactory::make($mode);
        self::$conn->beginTransaction();
        
        return $this;
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

    public function execute($mode, $return = null)
    {
        try {
            $this->begin($mode);

            $stm = $this->getCurrentConnection()->prepare($this->getQuery());
            $exec = $stm->execute();
        } catch(\PDOException $e) {
            $this->rollback();
            dump($e->getMessage());
        }

        $this->commit();

        if (strtolower($return) == 'all') {
            return $stm->fetchAll();
        } else if (strtolower($return) == 'first') {
            return $stm->fetch();
        }
        
        return $exec;
    }

    public function rawQuery($query)
    {
        $this->query = $query;
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

    public function select($columns = '*', $where = null)
    {
        $sql = 'SELECT '.$columns.' FROM '.$this->getTable();

        $this->query = (is_null($where)) ? $sql : $sql.' WHERE '.$where;

        return $this;
    }

    public function getCurrentConnection()
    {
        return self::$conn;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getQuery()
    {
        return $this->query;
    }
}