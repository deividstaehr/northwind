<?php

namespace core\database;

use core\database\PDOFactory;

class DB
{
    private static $conn;
    private $table;
    private $pkey;
    private $query;

    public function __construct($table, $pkey) {
        $this->table = $table;
        $this->pkey = $pkey;
        $this->query = "";
        self::$conn = null;
    }

    public function begin($mode)
    {
        self::$conn = PDOFactory::make();
        
        if ($mode == 'array') {
            self::$conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_NUM);
        }

        self::$conn->beginTransaction();
        
        return $this;
    }

    public function commit()
    {
        if (self::$conn != null) {
            self::$conn->commit();
            self::$conn = null;
        }
    }

    public function rollback()
    {
        if (self::$conn != null) {
            self::$conn->rollback();
            self::$conn = null;
        }
    }

    public function execute($return = null, $mode = null)
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

        if ($return != null && $return != 'no-return') {
            return $stm->fetchAll();
        } else if (strtolower($return) == 'no-return') {
            return $exec;
        } 
        
        return $stm->fetch();
    }

    public function bind($value)
    {
        return "'{$value}'";
    }

    public function rawQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    public function select($columns = '*', $where = null)
    {
        $sql = 'SELECT '.$columns.' FROM '.$this->getTable();

        $this->query = (is_null($where)) ? $sql : $sql.' WHERE '.$where;

        return $this;
    }

    public function insert($id, $data)
    {
        $keys = implode(', ', array_keys($data));

        $values = '';
        foreach ($data as $value) {
            $values .= ", {$this->bind($value)}";
        }

        $sql = "INSERT INTO {$this->getTable()} ({$this->getPkey()}, ";
        $sql .= "{$keys}) VALUES ({$this->bind($id)}{$values})";

        $this->query = $sql;
        
        return $this;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->getTable()}";

        $this->query = "{$sql} WHERE {$this->getPkey()} = {$this->bind($id)}";

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

    public function getPkey()
    {
        return $this->pkey;
    }

    public function getQuery()
    {
        return $this->query;
    }
}