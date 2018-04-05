<?php

namespace core;

use core\PDOFactory;

class DB
{    
    private static $dbname = 'database';
    
    private function __construct() {}
        
	public static function begin()
	{
		$conn = PDOFactory::make(self::$dbname);

		$conn->beginTransaction();

		return $conn;
    }
    
	public static function get($database = null)
	{
		return 
			($database === null)
			? PDOFactory::make(self::$dbname)
			: PDOFactory::make($database);
    }
}