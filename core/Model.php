<?php

namespace core;

use core\DB;

abstract class Model
{
    protected $data = [];
    protected $conn;

    public function __construct() {}

    public function all($sql = null)
    {
        if ($sql === null) {
            $sql = "
                SELECT *
                FROM {$this->getEntity()}
            ORDER BY {$this->getKey()}
            ";
        }
        
        try {
            $this->beginTransaction();
            
            $query = $this->getConn()->prepare($sql);
            $query->execute();

            $users = $query->fetchAll();

            $this->close();

            if ($users !== false) {
                return $users;
            }
        } catch (\Exception $e) {
            $this->rollback();
            throw new \Exception($e->getMessage());
        }
		return null; 
    }

    public function find($id)
    {
        $sql = "
            SELECT *
              FROM {$this->getEntity()}
             WHERE {$this->getKey()} = {$id}
        ";
        try {
            $this->beginTransaction();

            $query = $this->getConn()->prepare($sql);
            $query->execute();
            $user = $query->fetch();

            $this->close();

            if ($user !== false) {
                return $user;
            }
        } catch (\Exception $e) {
            $this->rollback();
            throw new \Exception($e->getMessage());
        }
		return null;    
    }

    public function store()
    {
        if ($this->toArray() != null) {
            $sql = "
                INSERT INTO {$this->getEntity()} ({$this->getKeyColumns()})
                     VALUES ({$this->getDataColumns()})
            ";
            try {
                $this->beginTransaction();
    
                $query = $this->getConn()->prepare($sql);
                $query->execute();
                $user = $query->fetch();
    
                $this->close();
            } catch (\Exception $e) {
                $this->rollback();
                throw new \Exception($e->getMessage());
            }
            return null;  
        }
    }

    public function max()
    {
        $sql = "
            SELECT max({$this->getKey()}) AS max
              FROM {$this->getEntity()}
        ";

        try {
            $this->beginTransaction();

            $query = $this->getConn()->prepare($sql);
            $query->execute();
            $id = $query->fetch();

            $this->close();

            if ($id !== false) {
                return $id->max;
            }
        } catch (\Exception $e) {
            $this->rollback();
            throw new \Exception($e->getMessage());
        }
		return null; 
    }

    public function delete()
    {
        
    }

    protected function beginTransaction()
    {
        $this->conn = DB::begin();
    }

    protected function close()
    {
        $this->conn->commit();
        $this->conn = null;
    }

    protected function rollback()
    {
        $this->conn->rollBack();
        $this->conn = null;
    }

    protected function getConn()
    {
        return $this->conn;
    }

    public function getEntity()
	{
        return $this->tableName;
    }
    
    public function getKey()
	{
		return $this->pkey;
    }
    
    public function fromArray($data)
	{
		$this->data = $data;
    }
    
	public function toArray()
	{
		return $this->data;
    }

	public function __get($property)
	{
		return (isset($this->columns[$property])) 
			? $this->columns[$property]
			: null;
	}
}